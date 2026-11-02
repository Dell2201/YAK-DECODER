'use strict';
const assert = require('node:assert/strict');
const fs = require('node:fs/promises');
const path = require('node:path');
const core = require('../public/assets/batch-core.js');
const ROOT = path.resolve(__dirname, '..');
const OUTPUT = path.resolve(process.argv[2] || path.join(require('node:os').tmpdir(), 'yak-batch-tests-' + Date.now()));
const URL = process.argv[3] || 'http://127.0.0.1:8090/decode.php';
const signature = '/* ' + core.SIGNATURE + ' 2.0.14 */';

function file(name, data) {
  data = Buffer.from(data);
  return {name: path.basename(name), webkitRelativePath: name, size: data.length, lastModified: 1700000000000,
    arrayBuffer: async () => data.buffer.slice(data.byteOffset, data.byteOffset + data.byteLength)};
}

function droppedDirectory(name, children, counter) {
  return {name, isDirectory: true, isFile: false, createReader() {
    let index = 0;
    return {readEntries(resolve) { counter.calls++; const batch = children.slice(index, index + 100); index += 100; queueMicrotask(() => resolve(batch)); }};
  }};
}
function droppedFile(name) { return {name, isFile: true, isDirectory: false, file(resolve) { resolve(file(name, 'asset')); }}; }

async function main() {
  await fs.mkdir(OUTPUT, {recursive: true});
  for (const bad of ['../escape.php', '/absolute', 'a/../escape', 'C:/escape', '\\server\\share', '', 'a//b', 'a/./b', 'a\0b', 'x'.repeat(4097)]) {
    assert.throws(() => core.collectFiles([file(bad, '')]));
  }
  assert.throws(() => core.collectFiles([file('m/a.php', ''), file('m/a.php', '')]));
  assert.throws(() => core.collectFiles([file('m/a', ''), file('m/a/b', '')]));
  assert.throws(() => core.collectFiles([{name: 'huge.bin', size: core.LIMITS.input + 1}]));
  assert.throws(() => core.collectFiles(Array.from({length: 5001}, (_, i) => file('many/' + i, ''))));
  console.log('PASS unsafe/duplicate paths, collisions, size and file-count limits');

  const fromInput = core.collectFiles([file('Модуль/admin/a.php', 'a'), file('Модуль/.htaccess', 'deny')]);
  assert(fromInput.some(entry => entry.path === 'Модуль/admin/'));
  assert(fromInput.some(entry => entry.path === 'Модуль/.htaccess'));
  const emptyCounter = {calls: 0};
  const emptyRoot = droppedDirectory('Модуль', [droppedDirectory('empty', [], emptyCounter)], emptyCounter);
  const withEmpty = await core.collectDrop({items: [{webkitGetAsEntry: () => emptyRoot}]});
  assert(withEmpty.some(entry => entry.path === 'Модуль/empty/' && entry.directory));
  console.log('PASS nested paths, hidden files and empty dropped directories');

  const counter = {calls: 0};
  const dropRoot = droppedDirectory('module', Array.from({length: 205}, (_, i) => droppedFile('f' + i)), counter);
  const fromDrop = await core.collectDrop({items: [{webkitGetAsEntry: () => dropRoot}]});
  assert.equal(fromDrop.filter(entry => !entry.directory).length, 205);
  assert.equal(counter.calls, 4);
  let captures = 0;
  const manyRoots = [{webkitGetAsEntry() { captures++; return droppedFile('a'); }}, {webkitGetAsEntry() { captures++; return droppedFile('b'); }}];
  const collecting = core.collectDrop({items: manyRoots});
  assert.equal(captures, 2);
  await collecting;
  const aborted = new AbortController(); aborted.abort();
  await assert.rejects(core.collectDrop({items: [{webkitGetAsEntry: () => droppedDirectory('m', [], {calls:0})}]}, aborted.signal), {name: 'AbortError'});
  console.log('PASS recursive drop reads all >100 entries and supports cancellation');

  const sample = await fs.readFile(path.join(ROOT, 'public/assets/example.txt'));
  const fixtures = [
    ['Модуль Пример/admin/controller/extension/module/signed.php', sample],
    ['Модуль Пример/catalog/model/plain.php', '<?php $n = 7; echo $n;'],
    ['Модуль Пример/admin/view/template/native.tpl', '<p><?php echo "template"; ?></p>'],
    ['Модуль Пример/admin/view/template/plain.tpl', '<p>Plain HTML</p>'],
    ['Модуль Пример/admin/view/template/file.twig', '{{ untouched }}'],
    ['Модуль Пример/system/broken.php', '<?php ' + signature + ' break;'],
    ['Модуль Пример/system/syntax-error.php', '<?php ' + signature + ' if ('],
    ['Модуль Пример/system/partial.php', '<?php ' + signature + '\nforeach ([false,true] as $flag) { $i=0; if ($flag) goto left; goto right; left: echo "L"; $i++; if ($i<3) goto right; goto end; right: echo "R"; $i++; if ($i<3) goto left; end: echo "E"; }'],
    ['Модуль Пример/catalog/language/ru-ru/cp1251.inc', Buffer.from([60, 63, 112, 104, 112, 32, 255])],
    ['Модуль Пример/catalog/empty.php', ''],
    ['Модуль Пример/image/logo.png', Buffer.from([0, 255, 137, 80, 78, 71, 13, 10, 0])],
    ['Модуль Пример/.htaccess', 'Deny from all\r\n'],
    ['Модуль Пример/.hidden/config.json', '{"keep":true}\r\n'],
    ['Модуль Пример/install.xml', '<modification>keep exactly</modification>'],
    ['Модуль Пример/module.lic', 'fixture-license-token'],
    ['Модуль Пример/system/oversize.php', '<?php ' + ' '.repeat(core.LIMITS.php)],
  ];
  const inputs = core.prepareEntries([...fixtures.map(([name, data]) => ({path: name, file: file(name, data)})), {path: 'Модуль Пример/пустая папка/', directory: true}]);
  const source = new Map(fixtures.map(([name, data]) => [name, Buffer.from(data)]));
  const manifests = [];
  for (const required of [true, false]) {
    let calls = 0;
    const results = await core.decodeEntries(inputs, {requireYakSignature: required}, async (code, options) => {
      calls++;
      const response = await fetch(URL, {method: 'POST', headers: {'Content-Type': 'application/json'}, body: JSON.stringify({code, requireYakSignature: options.requireYakSignature, completeFile: true})});
      return response.json();
    });
    const get = name => results.find(result => result.path.endsWith(name));
    assert.equal(get('/signed.php').status, 'decoded');
    assert.equal(get('/plain.php').status, required ? 'kept' : 'decoded');
    assert.equal(get('/native.tpl').status, required ? 'kept' : 'decoded');
    assert.equal(get('/broken.php').status, 'error');
    assert.equal(get('/syntax-error.php').status, 'error');
    assert.equal(get('/partial.php').status, 'partial');
    assert.equal(get('/cp1251.inc').status, 'warning');
    assert.equal(get('/oversize.php').status, 'warning');
    assert.equal(calls, required ? 4 : 6);
    for (const result of results) {
      if (['kept', 'warning', 'error'].includes(result.status)) assert.deepEqual(Buffer.from(result.data), source.get(result.path));
    }
    const zip = core.buildZip(results);
    const name = required ? 'signed-only' : 'all-php';
    await fs.writeFile(path.join(OUTPUT, name + '.zip'), Buffer.from(await zip.arrayBuffer()));
    manifests.push({name, calls, results: results.map(result => ({path: result.path, directory: !!result.directory, status: result.status, message: result.message}))});
    console.log('PASS real PHP batch; signature filter:', required, '; decoder requests:', calls);
  }
  await fs.writeFile(path.join(OUTPUT, 'manifest.json'), JSON.stringify(manifests, null, 2));
  await fs.mkdir(path.join(OUTPUT, 'fixture'), {recursive: true});
  for (const [name, data] of source) {
    const target = path.join(OUTPUT, 'fixture', name);
    await fs.mkdir(path.dirname(target), {recursive: true});
    await fs.writeFile(target, data);
  }
  await fs.mkdir(path.join(OUTPUT, 'fixture', 'Модуль Пример', 'пустая папка'), {recursive: true});
  const one = core.collectFiles([file('m/a.php', '<?php echo 1;')]);
  const noLint = await core.decodeEntries(one, {}, async () => ({ok: true, code: '<?php echo 2;', syntaxChecked: false}));
  assert.equal(noLint.find(entry => !entry.directory).status, 'error');
  assert.equal(Buffer.from(noLint.find(entry => !entry.directory).data).toString(), '<?php echo 1;');
  await assert.rejects(core.decodeEntries(one, {}, async () => { throw new Error('network failure'); }), /network failure/);
  const cancel = new AbortController();
  await assert.rejects(core.decodeEntries(one, {signal: cancel.signal}, async () => { cancel.abort(); return {ok:true, code:'<?php', syntaxChecked:true}; }), {name:'AbortError'});
  assert.equal(core.archiveName(inputs), 'Модуль Пример-decoded.zip');
  assert.throws(() => core.buildZip([{path: '../escape', data: new Uint8Array()}]));
  console.log('PASS lint failures, transport errors, cancellation and ZIP path checks');
  console.log('Batch checks passed. ZIP artifacts:', OUTPUT);
}
main().catch(error => { console.error(error); process.exitCode = 1; });
