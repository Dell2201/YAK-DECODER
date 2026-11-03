"""Check external PHP folders with the application decoder; never execute their code."""
import argparse
from concurrent.futures import ThreadPoolExecutor, as_completed
import json
from pathlib import Path
import subprocess
import sys
import tempfile

ROOT = Path(__file__).resolve().parent.parent
PHP = ROOT / 'runtime/php/php.exe'
BRIDGE = ROOT / 'tests/decode_version_fixture.php'
COUNTER = ROOT / 'tests/count_fixture_gotos.php'



def run(*args):
    return subprocess.run([str(PHP), '-n', *map(str, args)], capture_output=True, timeout=45)


def check(root, source):
    result = {'path': str(source.relative_to(root))}
    try:
        with tempfile.TemporaryDirectory(prefix='yak-no-goto-') as temp:
            decoded = Path(temp) / 'decoded.php'
            process = run(BRIDGE, source, decoded, '7.4')
            if process.returncode:
                raise RuntimeError('decoder process failed: ' + process.stderr.decode('utf-8', 'replace')[:1000])
            data = json.loads(process.stdout)
            if not data.get('ok') or not data.get('syntaxChecked') or data.get('syntaxPhpVersion') != '7.4':
                raise RuntimeError(data.get('error', 'decode or PHP 7.4 syntax check failed'))
            counter = run(COUNTER, source, decoded)
            if counter.returncode:
                raise RuntimeError('token counter failed: ' + counter.stderr.decode('utf-8', 'replace')[:1000])
            before, after = json.loads(counter.stdout)
            result.update(before=before, after=after, reported_before=data.get('gotoBefore'),
                          reported_after=data.get('gotoAfter'))
            if [before, after] != [data.get('gotoBefore'), data.get('gotoAfter')]:
                result.update(status='error', error='goto counter mismatch')
            else:
                result['status'] = 'pass' if after == 0 else 'goto'
    except (OSError, ValueError, RuntimeError, subprocess.TimeoutExpired) as error:
        result.update(status='error', error=str(error))
    return result


def main():
    parser = argparse.ArgumentParser(description=__doc__)
    parser.add_argument('folders', nargs='+', help='PHP folders to inspect without executing their code')
    parser.add_argument('--report', type=Path, required=True)
    parser.add_argument('--workers', type=int, default=2)
    args = parser.parse_args()
    if args.workers < 1:
        parser.error('--workers must be positive')
    roots = [Path(path).resolve() for path in args.folders]
    for root in roots:
        if not root.is_dir():
            parser.error('folder not found: ' + str(root))
    groups = [{'root': str(root), 'files': []} for root in roots]
    jobs = [(index, root, path) for index, root in enumerate(roots)
            for path in sorted(root.rglob('*')) if path.is_file() and path.suffix.lower() == '.php']
    if not jobs:
        parser.error('no PHP files found')
    with ThreadPoolExecutor(max_workers=args.workers) as pool:
        futures = {pool.submit(check, root, path): index for index, root, path in jobs}
        for number, future in enumerate(as_completed(futures), 1):
            groups[futures[future]]['files'].append(future.result())
            if number % 25 == 0 or number == len(jobs):
                print('{}/{}'.format(number, len(jobs)), flush=True)
    for group in groups:
        group['files'].sort(key=lambda item: item['path'])
        group['summary'] = {status: sum(item['status'] == status for item in group['files'])
                            for status in ('pass', 'goto', 'error')}
        group['summary']['total'] = len(group['files'])
    args.report.parent.mkdir(parents=True, exist_ok=True)
    args.report.write_text(json.dumps({'php_version': '7.4', 'groups': groups}, ensure_ascii=False, indent=2), encoding='utf-8')
    for group in groups:
        print(group['root'], group['summary'], flush=True)
    return int(any(item['status'] != 'pass' for group in groups for item in group['files'])
               or any(not group['files'] for group in groups))


if __name__ == '__main__':
    sys.exit(main())
