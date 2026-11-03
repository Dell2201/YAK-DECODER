"""Verify Node-generated archives with Python's independent ZIP reader and PHP CLI."""
from test_support import require
import json
from pathlib import Path
import subprocess
import sys
import zipfile

OUTPUT = Path(sys.argv[1])
ROOT = Path(__file__).resolve().parent.parent
PHP = ROOT / 'runtime/php/php.exe'
manifest = json.loads((OUTPUT / 'manifest.json').read_text(encoding='utf8'))
require(len(manifest) == 8, 'Expected both signature modes for all four PHP versions')
require({(b['phpVersion'], b['name'].split('-', 1)[1]) for b in manifest} == {(v, mode) for v in ['7.4', '8.1', '8.2', '8.3'] for mode in ['signed-only', 'all-php']}, 'Incomplete batch matrix')
for batch in manifest:
    php_folder = {'7.4': 'php', '8.1': 'php81', '8.2': 'php82', '8.3': 'php83'}[batch['phpVersion']]
    PHP = ROOT / 'runtime' / php_folder / 'php.exe'
    with zipfile.ZipFile(OUTPUT / (batch['name'] + '.zip')) as archive:
        require(archive.testzip() is None)
        require(len(archive.namelist()) == len(set(archive.namelist())), 'Duplicate ZIP entries')
        expected = {row['path'] for row in batch['results']}
        issues = [row for row in batch['results'] if row['status'] in {'partial', 'warning', 'error'}]
        if issues:
            used = {path.rstrip('/').lower() for path in expected}
            report_name, suffix = 'yak-decoder-report.txt', 2
            while report_name.lower() in used:
                report_name = f'yak-decoder-report-{suffix}.txt'
                suffix += 1
            expected.add(report_name)
            report = archive.read(report_name).decode('utf-8-sig')
            require(report.startswith('ОТЧЁТ О ПАКЕТНОМ ДЕКОДИРОВАНИИ'))
            require(('Версия PHP для проверки синтаксиса: ' + batch['phpVersion']) in report, 'Wrong PHP version in report')
            for row in issues:
                require(row['path'] in report, row)
        require(set(archive.namelist()) == expected)
        for row in batch['results']:
            info = archive.getinfo(row['path'])
            require(info.is_dir() == row['directory'])
            require(info.flag_bits & 2048)  # UTF-8 names, including Cyrillic.
            if row['directory']:
                continue
            data = archive.read(row['path'])
            if row['status'] in {'kept', 'warning', 'error'}:
                require(data == (OUTPUT / 'fixture' / row['path']).read_bytes())
            if row['status'] in {'decoded', 'partial'}:
                checked = subprocess.run([str(PHP), '-n', '--syntax-check'], input=data,
                                         capture_output=True, timeout=10)
                require(checked.returncode == 0, (row['path'], checked.stderr))
    print('PASS independent ZIP CRC, paths, empty directories, binary bytes and output PHP lint:', batch['name'])
