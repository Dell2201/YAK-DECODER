"""Check bundled PHP and run HTTP tests without a system PHP in PATH."""
import base64
import json
import os
from pathlib import Path
import socket
import subprocess
import sys
import tempfile
import time
import urllib.request

ROOT = Path(__file__).resolve().parent.parent
PHP = ROOT / 'runtime/php/php.exe'


def main():
    environment = os.environ.copy()
    system_root = environment.get('SystemRoot', r'C:\Windows')
    environment['PATH'] = str(Path(system_root) / 'System32') + os.pathsep + system_root
    environment['YAK_PHP_BINARY'] = str(ROOT / 'missing-system-php.exe')
    environment['PHPRC'] = str(ROOT / 'missing-system-php.ini')
    environment['PHP_INI_SCAN_DIR'] = str(ROOT / 'missing-ini-directory')
    metadata = subprocess.check_output([
        str(PHP), '-n', '-r',
        'echo json_encode(["version"=>PHP_VERSION,"binary"=>base64_encode(PHP_BINARY),"ini"=>php_ini_loaded_file()]);'
    ], env=environment, cwd=ROOT)
    metadata = json.loads(metadata)
    assert metadata['version'] == '7.4.33'
    # PHP 7.4 exposes PHP_BINARY in the Windows ANSI code page.
    binary_path = base64.b64decode(metadata['binary']).decode('mbcs')
    assert Path(binary_path).resolve() == PHP.resolve()
    assert metadata['ini'] is False
    print('PASS bundled PHP 7.4.33; system configuration ignored', flush=True)

    with socket.socket() as connection:
        connection.bind(('127.0.0.1', 0))
        port = connection.getsockname()[1]
    url = f'http://127.0.0.1:{port}/'
    with tempfile.TemporaryFile() as log:
        server = subprocess.Popen([
            str(PHP), '-n', '-d', 'display_errors=0', '-d', 'memory_limit=256M',
            '-S', f'127.0.0.1:{port}', '-t', str(ROOT / 'public')
        ], env=environment, cwd=ROOT, stdout=subprocess.DEVNULL, stderr=log,
            creationflags=subprocess.CREATE_NO_WINDOW)
        try:
            deadline = time.monotonic() + 8
            while True:
                if server.poll() is not None:
                    log.seek(0)
                    raise RuntimeError(log.read().decode(errors='replace'))
                try:
                    with urllib.request.urlopen(url, timeout=1) as response:
                        assert response.status == 200
                    break
                except OSError:
                    if time.monotonic() > deadline:
                        raise RuntimeError('Bundled PHP server did not start')
                    time.sleep(0.1)
            result = subprocess.run([sys.executable, str(ROOT / 'tests/http_test.py'), url],
                                    env=environment, cwd=ROOT)
            assert result.returncode == 0
        finally:
            server.terminate()
            server.wait(timeout=10)
    print('PASS portable site, decoder and output syntax check without system PHP', flush=True)


if __name__ == '__main__':
    main()
