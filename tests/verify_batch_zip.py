"""Verify Node-generated archives with Python's independent ZIP reader and PHP CLI."""
import json
from pathlib import Path
import subprocess
import sys
import zipfile

OUTPUT = Path(sys.argv[1])
ROOT = Path(__file__).resolve().parent.parent
PHP = ROOT / 'runtime/php/php.exe'
manifest = json.loads((OUTPUT / 'manifest.json').read_text(encoding='utf8'))
for batch in manifest:
    with zipfile.ZipFile(OUTPUT / (batch['name'] + '.zip')) as archive:
        assert archive.testzip() is None
        assert set(archive.namelist()) == {row['path'] for row in batch['results']}
        for row in batch['results']:
            info = archive.getinfo(row['path'])
            assert info.is_dir() == row['directory']
            assert info.flag_bits & 0x800  # UTF-8 names, including Cyrillic.
            if row['directory']:
                continue
            data = archive.read(row['path'])
            if row['status'] in {'kept', 'warning', 'error'}:
                assert data == (OUTPUT / 'fixture' / row['path']).read_bytes()
            if row['status'] in {'decoded', 'partial'}:
                checked = subprocess.run([str(PHP), '-n', '--syntax-check'], input=data,
                                         capture_output=True, timeout=10)
                assert checked.returncode == 0, (row['path'], checked.stderr)
    print('PASS independent ZIP CRC, paths, empty directories, binary bytes and output PHP lint:', batch['name'])
