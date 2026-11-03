"""Check authored PHP 7.4/8.x stress programs, never arbitrary module code."""
from test_support import require, validate_manifest, publish_snapshots
from pathlib import Path
import json
import subprocess
import tempfile
import sys
from collections import defaultdict

ROOT = Path(__file__).resolve().parent.parent
FIXTURES = ROOT / 'tests/cases/stress-b'
SEEDS = [-7, -1, 0, 1, 3, 11, 42]


def run(php, *args):
    return subprocess.run([str(php), '-n', *map(str, args)], capture_output=True, timeout=40)


def main():
    require(not ('--quick' in sys.argv and '--update-snapshots' in sys.argv), 'Snapshot updates require the full corpus')
    manifest = json.loads((FIXTURES / 'manifest.json').read_text())
    validate_manifest(manifest, FIXTURES, {'7.4': 25, '8.1': 25, '8.2': 25, '8.3': 25})
    snapshots = {}
    if '--quick' in sys.argv:
        manifest = list({item['php']: item for item in manifest}.values())
    totals = defaultdict(lambda: {'files': 0, 'partial': 0, 'gotoBefore': 0, 'gotoAfter': 0, 'comparisons': 0, 'counterMismatches': 0, 'coverage': set()})
    with tempfile.TemporaryDirectory(prefix='yak-php8-stress-') as temp:
        for index, item in enumerate(manifest):
            version = item['php']
            php = ROOT / 'runtime' / ('php' if version == '7.4' else 'php' + version.replace('.', '')) / 'php.exe'
            source = FIXTURES / item['source']
            require(source.resolve().is_relative_to(FIXTURES.resolve()))
            decoded = Path(temp) / item['decoded']
            response = run(ROOT / 'runtime/php/php.exe', ROOT / 'tests/decode_version_fixture.php', source, decoded, version)
            require(response.returncode == 0, response.stderr)
            data = json.loads(response.stdout)
            require(data.get('ok') and data.get('syntaxChecked') and (data.get('syntaxPhpVersion') == version), data)
            require(run(php, '-l', source).returncode == 0)
            require(run(php, '-l', decoded).returncode == 0)
            t = totals[version]
            t['files'] += 1
            t['partial'] += int(data['gotoAfter'] > 0)
            counter = run(php, ROOT / 'tests/count_fixture_gotos.php', source, decoded)
            require(counter.returncode == 0, counter.stderr)
            actual_counts = json.loads(counter.stdout)
            require(actual_counts[1] == 0, (item['source'], 'remaining goto', actual_counts[1]))
            require(actual_counts == [data['gotoBefore'], data['gotoAfter']], (item['source'], 'incorrect goto statistics', data, actual_counts))
            t['gotoBefore'] += actual_counts[0]
            t['gotoAfter'] += actual_counts[1]
            t['counterMismatches'] += int(actual_counts != [data['gotoBefore'], data['gotoAfter']])
            for seed in SEEDS:
                before = run(php, source, seed)
                after = run(php, decoded, seed)
                require(before.returncode == after.returncode == 0, (item, seed, before.stdout, before.stderr, after.stdout, after.stderr))
                require(before.stdout == after.stdout and before.stderr == after.stderr, (item, seed, 'behavior mismatch'))
                parsed = json.loads(before.stdout)
                require(len(parsed['rows']) == 6)
                t['coverage'].update(parsed['coverage'])
                t['comparisons'] += 1
            if '--update-snapshots' in sys.argv:
                snapshots[item['decoded']] = decoded.read_bytes()
                item.update(ok=True, gotoBefore=data['gotoBefore'], gotoAfter=data['gotoAfter'],
                            runtimeGotoBefore=actual_counts[0], runtimeGotoAfter=actual_counts[1],
                            equal=len(SEEDS), error=None)
            if (index + 1) % 25 == 0:
                print(f"PHP {version}: {t['files']} files, {t['comparisons']} comparisons, {t['partial']} partial", flush=True)
    result = {v: {**t, 'coverage': sorted(t['coverage'])} for v, t in totals.items()}
    import re
    for version, t in result.items():
        original = ROOT / 'tests/cases/stress-b' / ('php' + version.replace('.', '') + '-stress-original.php')
        declared = set(re.findall(r"hit\('([^']+)'", original.read_text(encoding='utf8')))
        require(declared == set(t['coverage']), (version, 'unreached markers', declared - set(t['coverage'])))
    if '--update-snapshots' in sys.argv:
        publish_snapshots(FIXTURES, snapshots, manifest)
    print(json.dumps(result, ensure_ascii=False, indent=2))
    print('All behavior, lint, zero-goto and goto-counter checks passed.')


if __name__ == '__main__':
    main()
