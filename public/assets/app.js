(() => {
'use strict';
const code = document.getElementById('code');
const decodeButton = document.getElementById('decode-button');
const decodeLabel = document.getElementById('decode-label');
const copyButton = document.getElementById('copy-button');
const exampleButton = document.getElementById('example-button');
const clearButton = document.getElementById('clear-button');
const restoreButton = document.getElementById('restore-button');
const mode = document.getElementById('editor-mode');
const status = document.getElementById('status');
const statusText = document.getElementById('status-text');
const lineNumbers = document.getElementById('line-numbers');
const metrics = document.getElementById('code-metrics');
const requireYakSignature = document.getElementById('require-yak-signature');
const yakSignature = 'Obfuscated by YAK Pro - Php Obfuscator';
const encoder = new TextEncoder();
let original = null;
let busy = false;
let batchBusy = false;

function setStatus(message, type = '') {
  status.className = 'status' + (type ? ' ' + type : '');
  statusText.textContent = message;
}

function updateEditor() {
  const lines = code.value ? code.value.split('\n').length : 0;
  lineNumbers.textContent = Array.from({length: Math.max(1, lines)}, (_, i) => i + 1).join('\n');
  const bytes = encoder.encode(code.value).length;
  const size = bytes >= 1048576 ? (bytes / 1048576).toFixed(2) + ' МБ' : bytes >= 1024 ? (bytes / 1024).toFixed(1) + ' КБ' : bytes + ' Б';
  metrics.textContent = 'Строк: ' + lines.toLocaleString('ru-RU') + ' · ' + size;
  copyButton.disabled = busy || !code.value;
  lineNumbers.style.transform = `translateY(${-code.scrollTop}px)`;
}

function setBusy(value) {
  busy = value;
  updateBusyControls();
  document.dispatchEvent(new CustomEvent('yak:single-busy', {detail: value}));
}

function updateBusyControls() {
  const locked = busy || batchBusy;
  decodeButton.disabled = locked;
  exampleButton.disabled = locked;
  clearButton.disabled = locked;
  restoreButton.disabled = locked;
  requireYakSignature.disabled = locked;
  code.readOnly = busy;
  code.setAttribute('aria-busy', String(busy));
  decodeButton.classList.toggle('loading', busy);
  decodeLabel.textContent = busy ? 'Декодируем…' : 'Декодировать';
  updateEditor();
}

document.addEventListener('yak:batch-busy', event => {
  batchBusy = !!event.detail;
  updateBusyControls();
});

async function decode() {
  if (busy || batchBusy) return;
  if (!code.value.trim()) {
    setStatus('Сначала вставьте PHP-код в поле выше.', 'error');
    code.focus();
    return;
  }
  if (encoder.encode(code.value).length > 2 * 1024 * 1024) {
    setStatus('Код слишком большой. Допустимый размер — 2 МБ.', 'error');
    return;
  }
  if (requireYakSignature.checked && !code.value.includes(yakSignature)) {
    setStatus(`В коде не найдена подпись «${yakSignature}». Снимите флажок, чтобы разрешить обработку без подписи.`, 'error');
    code.focus();
    return;
  }
  const submitted = code.value;
  setBusy(true);
  setStatus('Восстанавливаем структуру кода…');
  const controller = new AbortController();
  const timeout = window.setTimeout(() => controller.abort(), 35000);
  try {
    const response = await fetch('decode.php', {
      method: 'POST',
      headers: {'Content-Type': 'application/json', 'Accept': 'application/json'},
      body: JSON.stringify({code: submitted, requireYakSignature: requireYakSignature.checked}),
      signal: controller.signal,
      cache: 'no-store'
    });
    const data = await response.json();
    if (!response.ok || !data.ok) throw new Error(data.error || 'Не удалось декодировать код.');
    if (typeof data.code !== 'string') throw new Error('Сервер вернул некорректный ответ.');
    if (data.syntaxChecked !== true) throw new Error('Результат не прошёл обязательную проверку синтаксиса.');
    original = submitted;
    code.value = data.code;
    code.scrollTop = 0;
    code.scrollLeft = 0;
    mode.textContent = 'Результат';
    restoreButton.hidden = false;
    updateEditor();
    if (data.gotoAfter > 0) {
      setStatus(`Синтаксис проверен. Осталось goto: ${data.gotoAfter}. Часть структуры не удалось восстановить.`, 'warning');
    } else if (data.gotoBefore > 0) {
      setStatus(`Готово. Синтаксис проверен. Все переходы goto удалены: ${data.gotoBefore} → 0.`, 'success');
    } else {
      setStatus('Готово. Синтаксис проверен. Код отформатирован; переходов goto не найдено.', 'success');
    }
  } catch (error) {
    let message = error.name === 'AbortError' ? 'Обработка заняла слишком много времени. Попробуйте меньший фрагмент.' : error.message;
    if (error instanceof SyntaxError || error instanceof TypeError) message = 'Сервер недоступен. Проверьте, что сайт запущен через PHP.';
    setStatus(message, 'error');
  } finally {
    window.clearTimeout(timeout);
    setBusy(false);
  }
}

decodeButton.addEventListener('click', decode);
code.addEventListener('input', () => {
  mode.textContent = 'Исходный код';
  updateEditor();
});
code.addEventListener('scroll', () => { lineNumbers.style.transform = `translateY(${-code.scrollTop}px)`; });
document.addEventListener('keydown', event => {
  if ((event.ctrlKey || event.metaKey) && event.key === 'Enter') {
    event.preventDefault();
    decode();
  }
});
clearButton.addEventListener('click', () => {
  original = null;
  restoreButton.hidden = true;
  code.value = '';
  mode.textContent = 'Исходный код';
  updateEditor();
  setStatus('Поле очищено. Можно вставить новый код.');
  code.focus();
});
restoreButton.addEventListener('click', () => {
  if (original === null) return;
  code.value = original;
  original = null;
  restoreButton.hidden = true;
  mode.textContent = 'Исходный код';
  code.scrollTop = 0;
  updateEditor();
  setStatus('Исходный код восстановлен.');
});
exampleButton.addEventListener('click', async () => {
  exampleButton.disabled = true;
  try {
    const response = await fetch('assets/example.txt', {cache: 'no-store'});
    if (!response.ok) throw new Error('Не удалось загрузить пример.');
    code.value = await response.text();
    original = null;
    restoreButton.hidden = true;
    mode.textContent = 'Исходный код';
    code.scrollTop = 0;
    updateEditor();
    setStatus('Пример загружен. Нажмите «Декодировать».');
    code.focus();
  } catch (error) {
    setStatus('Не удалось загрузить пример. Проверьте, что сайт запущен через PHP.', 'error');
  } finally {
    exampleButton.disabled = false;
  }
});
copyButton.addEventListener('click', async () => {
  try {
    await navigator.clipboard.writeText(code.value);
    setStatus('Код скопирован в буфер обмена.', 'success');
  } catch (error) {
    code.focus();
    code.select();
    setStatus('Код выделен. Нажмите Ctrl+C, чтобы скопировать его.');
  }
});
updateEditor();

})();
