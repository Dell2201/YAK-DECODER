"""Execute only the authored PHP8 stress corpus, never arbitrary module code."""
from test_support import require, validate_manifest
from pathlib import Path
import json
import subprocess
import tempfile
import re
from collections import defaultdict

ROOT = Path(__file__).resolve().parent.parent
FIXTURES = ROOT / 'tests/cases/stress-a'
SEEDS = [-3, -1, 0, 1, 2, 7, 42]


def run(php, *args):
    return subprocess.run([str(php), '-n', *map(str, args)], capture_output=True, timeout=40)


def main():
    manifest = json.loads((FIXTURES / 'manifest.json').read_text())
    validate_manifest(manifest, FIXTURES, {'8.1': 25, '8.2': 25, '8.3': 25})
    totals = defaultdict(lambda: {'files': 0, 'partial': 0, 'gotoBefore': 0, 'gotoAfter': 0, 'comparisons': 0, 'coverage': set()})
    with tempfile.TemporaryDirectory(prefix='yak-php8-stress-') as temp:
        for index, item in enumerate(manifest):
            version = item['php']
            php = ROOT / 'runtime' / ('php' + version.replace('.', '')) / 'php.exe'
            source = FIXTURES / item['source']
            require(source.resolve().is_relative_to(FIXTURES.resolve()))
            decoded = Path(temp) / item['decoded']
            response = run(ROOT / 'runtime/php/php.exe', ROOT / 'tests/decode_version_fixture.php', source, decoded, version)
            require(response.returncode == 0, response.stderr)
            data = json.loads(response.stdout)
            require(data.get('ok') and data.get('syntaxChecked') and (data.get('syntaxPhpVersion') == version), data)
            require(data['gotoAfter'] == 0, (item, data))
            counter = run(php, ROOT / 'tests/count_fixture_gotos.php', source, decoded)
            require(counter.returncode == 0, counter.stderr)
            counts = json.loads(counter.stdout)
            require(counts == [data['gotoBefore'], data['gotoAfter']] and counts[1] == 0, (item, counts, data))
            require(run(php, '-l', source).returncode == 0)
            require(run(php, '-l', decoded).returncode == 0)
            t = totals[version]
            t['files'] += 1
            t['partial'] += int(data['gotoAfter'] > 0)
            t['gotoBefore'] += data['gotoBefore']
            t['gotoAfter'] += data['gotoAfter']
            for seed in SEEDS:
                before = run(php, source, seed)
                after = run(php, decoded, seed)
                require(before.returncode == after.returncode == 0, (item, seed, before.stdout, before.stderr, after.stdout, after.stderr))
                require(before.stdout == after.stdout and before.stderr == after.stderr, (item, seed, 'behavior mismatch'))
                parsed = json.loads(before.stdout)
                require(len(parsed['rows']) == 24)
                t['coverage'].update(parsed['coverage'])
                t['comparisons'] += 1
            if (index + 1) % 25 == 0:
                print(f"PHP {version}: {t['files']} files, {t['comparisons']} comparisons, {t['partial']} partial", flush=True)
    result = {v: {**t, 'coverage': sorted(t['coverage'])} for v, t in totals.items()}
    for version, t in result.items():
        original = FIXTURES / ('php' + version.replace('.', '') + '-stress-original.php')
        declared = set(re.findall(r"hit\('([^']+)'", original.read_text(encoding='utf8')))
        require(declared == set(t['coverage']), (version, 'coverage mismatch', declared - set(t['coverage']), set(t['coverage']) - declared))
    print(json.dumps(result, ensure_ascii=False, indent=2))
    print('All behavior, lint and zero-goto checks passed.')


if __name__ == '__main__':
    main()
