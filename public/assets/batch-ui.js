(() => {
  'use strict';
  const core = window.YakBatch;
  const zone = document.getElementById('batch-dropzone');
  const start = document.getElementById('batch-decode');
  const reset = document.getElementById('batch-reset');
  const cancel = document.getElementById('batch-cancel');
  const signature = document.getElementById('require-yak-signature');
  const policy = document.getElementById('batch-policy');
  const status = document.getElementById('batch-status');
  const selection = document.getElementById('batch-selection');
  const progress = document.getElementById('batch-progress');
  const table = document.getElementById('batch-log');
  const rows = document.getElementById('batch-log-body');
  const result = document.getElementById('batch-result');
  const download = document.getElementById('batch-download');
  const summary = document.getElementById('batch-summary');
  let entries = [], active = false, singleBusy = false, controller = null, objectUrl = null;

  function setStatus(message, type = '') {
    status.textContent = message;
    status.className = 'batch-status' + (type ? ' ' + type : '');
  }
  function updateControls() {
    start.disabled = active || singleBusy || !entries.length;
    reset.disabled = active || singleBusy || !entries.length;
    cancel.hidden = !active;
    zone.setAttribute('aria-busy', String(active));
  }
  function setBusy(value) {
    active = value;
    updateControls();
    document.dispatchEvent(new CustomEvent('yak:batch-busy', {detail: value}));
  }
  function clearResult() {
    if (objectUrl) URL.revokeObjectURL(objectUrl);
    objectUrl = null;
    download.removeAttribute('href');
    result.hidden = true;
    table.hidden = true;
    rows.replaceChildren();
    progress.value = 0;
  }
  function updatePolicy() {
    policy.classList.toggle('signature-disabled', !signature.checked);
    policy.textContent = signature.checked ? 'Флажок выше включён: обрабатывать только PHP с подписью YAK Pro.' : 'Флажок выше выключен: обрабатывать все PHP-файлы.';
  }
  function setEntries(list) {
    clearResult();
    entries = list;
    const files = list.filter(entry => !entry.directory);
    const bytes = files.reduce((sum, entry) => sum + entry.file.size, 0);
    const rootNames = [...new Set(list.map(entry => entry.path.split('/')[0]))];
    selection.textContent = list.length ? `${rootNames.join(', ')} · файлов: ${files.length} · ${(bytes / 1048576).toFixed(2)} МБ` : 'Папка не выбрана';
    setStatus(list.length ? 'Папка готова к обработке. Исходные файлы не изменяются.' : 'В выбранной папке файлы не найдены.');
    updateControls();
  }
  async function scan(collect) {
    if (active || singleBusy) return;
    controller = new AbortController();
    setBusy(true);
    setStatus('Читаем структуру папки…');
    try { setEntries(await collect(controller.signal)); }
    catch (error) { setStatus(error.name === 'AbortError' ? 'Выбор папки отменён.' : error.message, 'error'); }
    finally { controller = null; setBusy(false); }
  }

  zone.addEventListener('dragover', event => {
    if (![...event.dataTransfer.types].includes('Files')) return;
    event.preventDefault();
    if (!active && !singleBusy) zone.classList.add('dragging');
  });
  zone.addEventListener('dragleave', event => { if (!zone.contains(event.relatedTarget)) zone.classList.remove('dragging'); });
  zone.addEventListener('drop', event => {
    event.preventDefault();
    zone.classList.remove('dragging');
    // collectDrop captures FileSystemEntry objects synchronously before its first await.
    scan(signal => core.collectDrop(event.dataTransfer, signal));
  });
  reset.addEventListener('click', () => setEntries([]));
  cancel.addEventListener('click', () => { if (controller) controller.abort(); });
  signature.addEventListener('change', () => { updatePolicy(); clearResult(); if (entries.length) setStatus('Настройка изменена. Можно запустить обработку папки.'); });
  document.addEventListener('yak:single-busy', event => { singleBusy = !!event.detail; updateControls(); });

  async function decodeFile(text, options) {
    const request = new AbortController();
    const abort = () => request.abort();
    options.signal.addEventListener('abort', abort, {once: true});
    const timer = setTimeout(abort, 35000);
    try {
      const response = await fetch('decode.php', {
        method: 'POST', headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({code: text, requireYakSignature: options.requireYakSignature, completeFile: true}),
        signal: request.signal, cache: 'no-store'
      });
      const data = await response.json();
      if (typeof data.ok !== 'boolean') throw new Error('Сервер вернул некорректный ответ.');
      return data;
    } catch (error) {
      if (options.signal.aborted) throw error;
      if (error.name === 'AbortError') return {ok: false, error: 'Превышено время обработки файла.'};
      throw new Error('Не удалось связаться с PHP-сервером. Запустите сайт через start.cmd и повторите обработку.');
    } finally {
      clearTimeout(timer);
      options.signal.removeEventListener('abort', abort);
    }
  }

  function appendResult(file) {
    const labels = {decoded: 'Декодирован', partial: 'Частично', kept: 'Без изменений', warning: 'Исходник', error: 'Ошибка · исходник'};
    const row = document.createElement('tr');
    for (const [text, className] of [[file.path, 'batch-path'], [labels[file.status], 'batch-state ' + file.status], [file.message, 'batch-message']]) {
      const cell = document.createElement('td');
      cell.textContent = text;
      cell.className = className;
      row.appendChild(cell);
    }
    rows.appendChild(row);
    table.scrollTop = table.scrollHeight;
  }

  start.addEventListener('click', async () => {
    if (active || singleBusy || !entries.length) return;
    clearResult();
    controller = new AbortController();
    const startedAt = performance.now();
    const options = {requireYakSignature: signature.checked, signal: controller.signal};
    setBusy(true);
    table.hidden = false;
    try {
      const files = await core.decodeEntries(entries, options, decodeFile, event => {
        progress.max = Math.max(1, event.total);
        progress.value = event.done;
        setStatus(`Обработано ${event.done} / ${event.total}: ${event.path}`);
        if (event.result) appendResult(event.result);
      });
      if (controller.signal.aborted) return;
      setStatus('Собираем ZIP с исходной структурой папок…');
      // Let the progress text paint before calculating the archive CRCs.
      await new Promise(resolve => requestAnimationFrame(() => setTimeout(resolve, 0)));
      if (controller.signal.aborted) return;
      const blob = core.buildZip(files);
      objectUrl = URL.createObjectURL(blob);
      download.href = objectUrl;
      download.download = core.archiveName(entries);
      const count = state => files.filter(file => file.status === state).length;
      const errors = count('error'), warnings = count('partial') + count('warning');
      const statistics = [
        ['Всего файлов', files.filter(file => !file.directory).length],
        ['Папок сохранено', count('directory')],
        ['Декодировано', count('decoded')],
        ['Частично декодировано', count('partial')],
        ['Без изменений', count('kept')],
        ['Исходник с предупреждением', count('warning')],
        ['Ошибок · сохранён исходник', errors],
        ['Время обработки', ((performance.now() - startedAt) / 1000).toFixed(1) + ' с'],
        ['Размер ZIP', (blob.size / 1048576).toFixed(2) + ' МБ']
      ];
      summary.replaceChildren();
      const heading = document.createElement('h3');
      heading.textContent = 'Статистика обработки';
      summary.appendChild(heading);
      for (const [label, value] of statistics) {
        const card = document.createElement('div');
        card.className = 'batch-stat';
        const number = document.createElement('strong');
        number.textContent = String(value);
        const caption = document.createElement('span');
        caption.textContent = label;
        card.append(number, caption);
        summary.appendChild(card);
      }
      result.hidden = false;
      progress.value = progress.max;
      setStatus(errors || warnings ? 'ZIP собран с предупреждениями. Проверьте таблицу результатов; ошибочные файлы сохранены в исходном виде.' : 'Готово. Структура папки сохранена, ZIP отправлен на скачивание.', errors || warnings ? 'warning' : 'success');
      download.click();
    } catch (error) {
      setStatus(error.name === 'AbortError' ? 'Обработка отменена. Архив не создан; исходные файлы не изменены.' : error.message, 'error');
    } finally {
      if (controller && controller.signal.aborted && result.hidden) setStatus('Обработка отменена. Архив не создан; исходные файлы не изменены.', 'warning');
      controller = null;
      setBusy(false);
    }
  });
  updatePolicy();
  updateControls();
})();
