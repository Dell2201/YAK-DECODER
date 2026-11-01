"""Run against the locally started site: python tests/http_test.py."""
import json
from pathlib import Path
import sys
import tempfile
import urllib.error
import urllib.request

BASE = sys.argv[1].rstrip('/') + '/' if len(sys.argv) > 1 else 'http://127.0.0.1:8090/'
ROOT = Path(__file__).resolve().parent.parent


def request(code=None, *, method='POST', data=None, content_type='application/json', require_yak_signature=None):
    if data is None and code is not None:
        payload = {'code': code}
        if require_yak_signature is not None:
            payload['requireYakSignature'] = require_yak_signature
        data = json.dumps(payload).encode()
    request = urllib.request.Request(BASE + 'decode.php', data=data, method=method,
                                     headers={'Content-Type': content_type})
    try:
        with urllib.request.urlopen(request, timeout=35) as response:
            return response.status, json.load(response)
    except urllib.error.HTTPError as error:
        return error.code, json.load(error)


def main():
    with urllib.request.urlopen(BASE, timeout=5) as response:
        assert response.status == 200 and 'YAK' in response.read().decode()
    print('PASS page loads')

    status, result = request((ROOT / 'public/assets/example.txt').read_text(encoding='utf8'), require_yak_signature=True)
    assert status == 200 and result['gotoBefore'] > 0 and result['gotoAfter'] == 0
    assert 'while' in result['code'] and 'Count: ' in result['code']
    assert result['syntaxChecked'] is True
    print('PASS sample is decoded')

    for code, expected in [('', 422), ('<?php if (', 422), ('a' * 2097153, 413)]:
        status, result = request(code)
        assert status == expected and result['ok'] is False
        print('PASS invalid/oversized code rejected:', status)

    for body, content_type, expected in [(b'{broken', 'application/json', 400),
                                          (b'{}', 'text/plain', 415),
                                          (b'{"code":[]}', 'application/json', 400)]:
        status, result = request(data=body, content_type=content_type)
        assert status == expected and result['ok'] is False
        print('PASS invalid request rejected:', status)

    assert request(method='GET')[0] == 405
    print('PASS method validation')
    status, result = request('$n = 1; echo $n;')
    assert status == 200 and result['code'].startswith('<?php')
    print('PASS opening tag added')

    # PHP-Parser accepts these ASTs, but PHP's compile-time syntax check rejects them.
    for invalid_output in ['<?php break;',
                           '<?php function duplicate() {} function duplicate() {}']:
        status, result = request(invalid_output)
        assert status == 422 and result['ok'] is False
        assert '--syntax-check' in result['error'] and 'code' not in result
        assert 'yak_syntax_' not in result['error']
        print('PASS invalid output blocked by PHP syntax check')

    status, result = request('<?php echo missing_runtime_function(); exit(99);')
    assert status == 200 and result['syntaxChecked'] is True
    print('PASS syntax check does not execute PHP')

    with tempfile.TemporaryDirectory() as directory:
        marker = Path(directory) / 'must-not-exist.txt'
        code = "<?php file_put_contents('" + marker.as_posix() + "', 'executed'); echo '<script>alert(1)</script>';"
        status, result = request(code)
        assert status == 200 and not marker.exists() and '<script>' in result['code']
    print('PASS submitted PHP is never executed')

    irreducible = '''<?php
foreach ([false, true] as $flag) {
    $i = 0;
    if ($flag) goto left;
    goto right;
    left: echo "L"; $i++; if ($i < 3) goto right; goto end;
    right: echo "R"; $i++; if ($i < 3) goto left;
    end: echo "E";
}'''
    status, result = request(irreducible)
    assert status == 200 and result['gotoAfter'] > 0
    assert result['syntaxChecked'] is True
    print('PASS incomplete conversion reported')

    signature = 'Obfuscated by YAK Pro - Php Obfuscator'
    signed = '<?php /* ' + signature + ' 2.0.14 */ echo "signed";'
    unsigned = '<?php echo "unsigned";'
    for code, required, expected in [(signed, True, 200), (signed, False, 200),
                                      (unsigned, True, 422), (unsigned, False, 200)]:
        status, result = request(code, require_yak_signature=required)
        assert status == expected
        if expected == 200:
            assert result['ok'] is True and result['syntaxChecked'] is True
        else:
            assert result['errorCode'] == 'yak_signature_missing' and 'code' not in result
        print('PASS signature present/absent, checkbox on/off')

    for marker in ['Obfuscated by YAK Pro', signature.lower()]:
        status, result = request('<?php /* ' + marker + ' */ echo 1;', require_yak_signature=True)
        assert status == 422 and result['errorCode'] == 'yak_signature_missing'
        print('PASS exact signature required')

    for invalid_flag in ['true', 'false', 1, None, []]:
        body = json.dumps({'code': signed, 'requireYakSignature': invalid_flag}).encode()
        status, result = request(data=body)
        assert status == 400 and result['ok'] is False
        print('PASS signature option type validated')
    html_php = '<p><?php echo "template"; ?></p>'
    status, result = request(data=json.dumps({'code': html_php, 'completeFile': True}).encode())
    assert status == 200 and result['syntaxChecked'] is True and '<p>' in result['code']
    print('PASS full file preserves mixed HTML/PHP context')
    status, result = request(data=json.dumps({'code': signed, 'completeFile': 'yes'}).encode())
    assert status == 400
    print('PASS full-file flag type validated')
    print('28 HTTP checks passed')


if __name__ == '__main__':
    main()
