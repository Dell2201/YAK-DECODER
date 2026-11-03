"""Explicit checks shared by the command-line test runners."""
from collections import Counter
import json
from pathlib import Path


def require(condition, detail='Check failed'):
    if not condition:
        raise AssertionError(detail)


def validate_manifest(manifest, fixtures, expected):
    require(isinstance(manifest, list) and manifest, 'Manifest must contain test cases')
    counts = Counter()
    sources, outputs = set(), set()
    for item in manifest:
        require(isinstance(item, dict), 'Invalid manifest entry')
        version = item.get('php')
        require(version in expected, ('Unexpected PHP version', version))
        counts[version] += 1
        for key, seen in [('source', sources), ('decoded', outputs)]:
            value = item.get(key)
            require(isinstance(value, str) and value, ('Missing path', key))
            relative = Path(value)
            target = (fixtures / relative).resolve()
            require(not relative.is_absolute() and target.is_relative_to(fixtures.resolve()), ('Invalid path', value))
            require(target not in seen, ('Duplicate path', value))
            seen.add(target)
            if key == 'source':
                require(target.is_file(), ('Missing input', value))
    require(dict(counts) == expected, ('Incomplete test corpus', dict(counts), expected))
    require(not sources.intersection(outputs), 'Snapshot would overwrite an input')


def publish_snapshots(fixtures, snapshots, manifest):
    """Call only after all cases and all coverage checks have passed."""
    for relative, contents in snapshots.items():
        (fixtures / relative).write_bytes(contents)
    (fixtures / 'manifest.json').write_text(json.dumps(manifest, ensure_ascii=False, indent=2) + '\n', encoding='utf8')
