/* Folder traversal, per-file decoding and UTF-8 ZIP creation. No external services. */
(function (root, factory) {
  if (typeof module === 'object' && module.exports) module.exports = factory();
  else root.YakBatch = factory();
})(typeof self !== 'undefined' ? self : this, function () {
  'use strict';
  const SIGNATURE = 'Obfuscated by YAK Pro - Php Obfuscator';
  const LIMITS = {entries: 10000, files: 5000, input: 100 * 1024 * 1024, output: 150 * 1024 * 1024, php: 5 * 1024 * 1024};
  const encoder = new TextEncoder();

  function checkCancelled(signal) {
    if (signal && signal.aborted) {
      const error = new Error('Обработка отменена.');
      error.name = 'AbortError';
      throw error;
    }
  }

  function validatePath(path, directory) {
    if (typeof path !== 'string' || path.length > 4096 || /[\x00-\x1f\x7f:]/.test(path)) {
      throw new Error('Недопустимый путь в выбранной папке.');
    }
    path = path.replace(/\\/g, '/');
    if (directory && path.endsWith('/')) path = path.slice(0, -1);
    if (!path || path.split('/').some(part => !part || part === '.' || part === '..')) {
      throw new Error('Недопустимый относительный путь: ' + path);
    }
    if (encoder.encode(path).length > 65534) throw new Error('Слишком длинный путь в архиве.');
    return path + (directory ? '/' : '');
  }

  // Include every file, including .htaccess and dot-directories. Never flatten paths.
  function prepareEntries(entries) {
    const output = new Map();
    const filePaths = new Set();
    let files = 0;
    let bytes = 0;
    function directory(path) {
      path = validatePath(path, true);
      if (filePaths.has(path.slice(0, -1))) throw new Error('Файл и папка имеют одинаковый путь.');
      if (!output.has(path)) output.set(path, {path, directory: true});
    }
    for (const entry of entries) {
      const path = validatePath(entry.path, !!entry.directory);
      const parts = path.replace(/\/$/, '').split('/');
      for (let i = 1; i < parts.length; i++) directory(parts.slice(0, i).join('/'));
      if (entry.directory) {
        directory(path);
      } else {
        if (output.has(path) || output.has(path + '/')) throw new Error('Повторяющийся путь: ' + path);
        if (!entry.file || !Number.isSafeInteger(entry.file.size) || entry.file.size < 0) throw new Error('Не удалось прочитать размер файла.');
        filePaths.add(path);
        output.set(path, {...entry, path, directory: false});
        files++;
        bytes += entry.file.size;
      }
      if (files > LIMITS.files || output.size > LIMITS.entries) throw new Error('В папке слишком много файлов или вложенных папок. Лимит — 5000 файлов.');
      if (bytes > LIMITS.input) throw new Error('Папка слишком большая. Лимит — 100 МБ.');
    }
    return [...output.values()].sort((a, b) => a.path < b.path ? -1 : a.path > b.path ? 1 : 0);
  }

  function collectFiles(files) {
    return prepareEntries([...files].map(file => ({path: file.webkitRelativePath || file.relativePath || file.name, file})));
  }

  // Read until the empty batch: Chromium returns at most 100 children at a time.
  async function collectDrop(transfer, signal) {
    const roots = [...(transfer.items || [])].map(item => item.webkitGetAsEntry ? item.webkitGetAsEntry() : null).filter(Boolean);
    if (!roots.length) return collectFiles(transfer.files || []);
    const entries = [];
    let bytes = 0;
    async function walk(node, prefix) {
      checkCancelled(signal);
      const path = validatePath(prefix + node.name, node.isDirectory);
      if (node.isDirectory) {
        entries.push({path, directory: true});
        const reader = node.createReader();
        while (true) {
          const children = await new Promise((resolve, reject) => reader.readEntries(resolve, reject));
          if (!children.length) break;
          for (const child of children) await walk(child, path);
        }
      } else if (node.isFile) {
        const file = await new Promise((resolve, reject) => node.file(resolve, reject));
        bytes += file.size;
        if (bytes > LIMITS.input) throw new Error('Папка слишком большая. Лимит — 100 МБ.');
        entries.push({path, file});
      }
      if (entries.length > LIMITS.entries) throw new Error('В папке слишком много записей.');
    }
    for (const root of roots) await walk(root, '');
    return prepareEntries(entries);
  }

  function isPhpPath(path) {
    return /\.(php[0-9]?|phtml|inc|tpl)$/i.test(path);
  }

  async function decodeEntries(entries, options, decode, onProgress) {
    entries = prepareEntries(entries);
    const results = [];
    const total = entries.filter(entry => !entry.directory).length;
    let done = 0;
    let outputSize = 0;
    for (const entry of entries) {
      checkCancelled(options.signal);
      if (entry.directory) {
        results.push({...entry, data: new Uint8Array(), status: 'directory'});
        continue;
      }
      if (onProgress) onProgress({done, total, path: entry.path, result: null});
      const data = new Uint8Array(await entry.file.arrayBuffer());
      checkCancelled(options.signal);
      const result = {path: entry.path, data, mtime: entry.file.lastModified, status: 'kept', message: 'Файл другого типа — без изменений.'};
      if (isPhpPath(entry.path)) {
        if (data.length > LIMITS.php) {
          result.status = 'warning';
          result.message = 'Больше 5 МБ — сохранён исходник.';
        } else {
          let text;
          try { text = new TextDecoder('utf-8', {fatal: true}).decode(data); }
          catch (error) {
            result.status = 'warning';
            result.message = 'Кодировка отличается от UTF-8 — сохранён исходник.';
          }
          if (text !== undefined) {
            if (!text.trim()) result.message = 'Пустой файл — без изменений.';
            else if (!/<\?(?:php\b|=)/i.test(text)) result.message = 'Файл без PHP-тегов — без изменений.';
            else if (options.requireYakSignature && !text.includes(SIGNATURE)) result.message = 'Нет подписи YAK Pro — без изменений.';
            else {
              const response = await decode(text, {requireYakSignature: !!options.requireYakSignature, signal: options.signal});
              checkCancelled(options.signal);
              if (!response.ok || response.syntaxChecked !== true || typeof response.code !== 'string') {
                result.status = 'error';
                result.message = (response.error || 'Выходной код не прошёл проверку синтаксиса.') + ' В архиве сохранён исходник.';
              } else {
                result.data = encoder.encode(response.code);
                result.status = response.gotoAfter > 0 ? 'partial' : 'decoded';
                result.message = response.gotoAfter > 0
                  ? `Синтаксис проверен. Осталось goto: ${response.gotoAfter}.`
                  : `Синтаксис проверен. goto: ${response.gotoBefore} → 0.`;
              }
            }
          }
        }
      }
      outputSize += result.data.length;
      if (outputSize > LIMITS.output) throw new Error('Результат превышает 150 МБ. Выберите папку меньшего размера.');
      results.push(result);
      done++;
      if (onProgress) onProgress({done, total, path: entry.path, result});
    }
    return results;
  }

  const crcTable = Uint32Array.from({length: 256}, (_, n) => {
    let c = n;
    for (let bit = 0; bit < 8; bit++) c = c & 1 ? 0xedb88320 ^ (c >>> 1) : c >>> 1;
    return c >>> 0;
  });
  function crc32(bytes) {
    let c = 0xffffffff;
    for (const byte of bytes) c = crcTable[(c ^ byte) & 255] ^ (c >>> 8);
    return (c ^ 0xffffffff) >>> 0;
  }

  function reportEntry(results) {
    const sections = [
      ['partial', 'Остались переходы goto — файл обработан частично'],
      ['warning', 'Не обработано — сохранён исходный файл'],
      ['error', 'Ошибка обработки — сохранён исходный файл']
    ];
    if (!results.some(file => sections.some(([status]) => file.status === status))) return null;
    const used = new Set(results.map(file => file.path.replace(/\/$/, '').toLowerCase()));
    let name = 'yak-decoder-report.txt', suffix = 2;
    while (used.has(name.toLowerCase())) name = `yak-decoder-report-${suffix++}.txt`;
    const lines = ['ОТЧЁТ О ПАКЕТНОМ ДЕКОДИРОВАНИИ', ''];
    for (const [status, title] of sections) {
      const items = results.filter(file => file.status === status);
      lines.push(`${title}: ${items.length}`, '');
      if (!items.length) lines.push('Нет файлов.');
      for (const file of items) {
        lines.push(file.path);
        if (file.message) lines.push(`  ${file.message.replace(/[\r\n]+/g, ' ')}`);
      }
      lines.push('');
    }
    return {path: name, data: encoder.encode('\ufeff' + lines.join('\r\n')), mtime: Date.now()};
  }

  // ZIP STORE: exact bytes, UTF-8 names, directory records, no external libraries.
  function buildZip(results) {
    const report = reportEntry(results);
    if (report) results = [...results, report];
    const local = [], central = [], names = new Set();
    let offset = 0, centralSize = 0;
    if (results.length > LIMITS.entries) throw new Error('Слишком много записей ZIP.');
    for (const file of results) {
      const path = validatePath(file.path, !!file.directory);
      if (names.has(path)) throw new Error('Повторяющийся путь ZIP: ' + path);
      names.add(path);
      const name = encoder.encode(path);
      const bytes = file.data;
      const crc = crc32(bytes);
      const stamp = new Date(file.mtime || Date.now());
      const year = Math.min(2107, Math.max(1980, stamp.getFullYear()));
      const time = (stamp.getHours() << 11) | (stamp.getMinutes() << 5) | Math.floor(stamp.getSeconds() / 2);
      const date = ((year - 1980) << 9) | ((stamp.getMonth() + 1) << 5) | stamp.getDate();
      const header = new Uint8Array(30), h = new DataView(header.buffer);
      h.setUint32(0, 0x04034b50, true); h.setUint16(4, 20, true); h.setUint16(6, 0x0800, true);
      h.setUint16(10, time, true); h.setUint16(12, date, true); h.setUint32(14, crc, true);
      h.setUint32(18, bytes.length, true); h.setUint32(22, bytes.length, true); h.setUint16(26, name.length, true);
      local.push(header, name, bytes);
      const record = new Uint8Array(46), c = new DataView(record.buffer);
      c.setUint32(0, 0x02014b50, true); c.setUint16(4, 20, true); c.setUint16(6, 20, true); c.setUint16(8, 0x0800, true);
      c.setUint16(12, time, true); c.setUint16(14, date, true); c.setUint32(16, crc, true);
      c.setUint32(20, bytes.length, true); c.setUint32(24, bytes.length, true); c.setUint16(28, name.length, true);
      c.setUint32(38, file.directory ? 16 : 0, true); c.setUint32(42, offset, true);
      central.push(record, name);
      centralSize += 46 + name.length;
      offset += 30 + name.length + bytes.length;
    }
    const end = new Uint8Array(22), e = new DataView(end.buffer);
    e.setUint32(0, 0x06054b50, true); e.setUint16(8, results.length, true); e.setUint16(10, results.length, true);
    e.setUint32(12, centralSize, true); e.setUint32(16, offset, true);
    return new Blob([...local, ...central, end], {type: 'application/zip'});
  }

  function archiveName(entries) {
    const roots = new Set(entries.map(entry => entry.path.split('/')[0]));
    const name = roots.size === 1 ? [...roots][0] : 'yak';
    return name.replace(/[<>:"/\\|?*\x00-\x1f]/g, '_') + '-decoded.zip';
  }

  return {SIGNATURE, LIMITS, collectFiles, collectDrop, prepareEntries, decodeEntries, buildZip, archiveName};
});
