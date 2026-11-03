"""Run against the locally started site: python tests/http_test.py."""
from test_support import require
import json
from pathlib import Path
import sys
import tempfile
import urllib.error
import urllib.request

BASE = sys.argv[1].rstrip('/') + '/' if len(sys.argv) > 1 else 'http://127.0.0.1:18090/'
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
        require(response.status == 200 and 'YAK' in response.read().decode())
    print('PASS page loads')

    status, result = request((ROOT / 'public/assets/example.txt').read_text(encoding='utf8'), require_yak_signature=True)
    require(status == 200 and result['gotoBefore'] > 0 and (result['gotoAfter'] == 0))
    require('for' in result['code'] and 'Count: ' in result['code'])
    require(result['syntaxChecked'] is True)
    print('PASS sample is decoded')

    for code, expected in [('', 422), ('<?php if (', 422), ('a' * 5242881, 413)]:
        status, result = request(code)
        require(status == expected and result['ok'] is False)
        print('PASS invalid/oversized code rejected:', status)

    # Transport regression: valid code under 5 MB whose escaped JSON body
    # exceeds the old 8 MB transport cap (backslashes double) must pass.
    bulky = '<?php /* ' + '\\' * 4500000 + ' */ echo 1;'
    status, result = request(bulky)
    require(status == 200 and result['syntaxChecked'] is True and ('echo 1' in result['code']))
    print('PASS bulky-but-valid code with 9 MB JSON body accepted')

    for body, content_type, expected in [(b'{broken', 'application/json', 400),
                                          (b'{}', 'text/plain', 415),
                                          (b'{"code":[]}', 'application/json', 400)]:
        status, result = request(data=body, content_type=content_type)
        require(status == expected and result['ok'] is False)
        print('PASS invalid request rejected:', status)

    require(request(method='GET')[0] == 405)
    print('PASS method validation')
    status, result = request('$n = 1; echo $n;')
    require(status == 200 and result['code'].startswith('<?php'))
    print('PASS opening tag added')

    # PHP-Parser accepts these ASTs, but PHP's compile-time syntax check rejects them.
    for invalid_output in ['<?php break;',
                           '<?php function duplicate() {} function duplicate() {}']:
        status, result = request(invalid_output)
        require(status == 422 and result['ok'] is False)
        require('--syntax-check' in result['error'] and 'code' not in result)
        require('yak_syntax_' not in result['error'])
        print('PASS invalid output blocked by PHP syntax check')

    status, result = request('<?php echo missing_runtime_function(); exit(99);')
    require(status == 200 and result['syntaxChecked'] is True)
    print('PASS syntax check does not execute PHP')

    with tempfile.TemporaryDirectory() as directory:
        marker = Path(directory) / 'must-not-exist.txt'
        code = "<?php file_put_contents('" + marker.as_posix() + "', 'executed'); echo '<script>alert(1)</script>';"
        status, result = request(code)
        require(status == 200 and (not marker.exists()) and ('<script>' in result['code']))
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
    require(status == 200 and result['gotoAfter'] > 0)
    require(result['syntaxChecked'] is True)
    print('PASS incomplete conversion reported')

    signature = 'Obfuscated by YAK Pro - Php Obfuscator'
    signed = '<?php /* ' + signature + ' 2.0.14 */ echo "signed";'
    unsigned = '<?php echo "unsigned";'
    for code, required, expected in [(signed, True, 200), (signed, False, 200),
                                      (unsigned, True, 422), (unsigned, False, 200)]:
        status, result = request(code, require_yak_signature=required)
        require(status == expected)
        if expected == 200:
            require(result['ok'] is True and result['syntaxChecked'] is True)
        else:
            require(result['errorCode'] == 'yak_signature_missing' and 'code' not in result)
        print('PASS signature present/absent, checkbox on/off')

    for marker in ['Obfuscated by YAK Pro', signature.lower()]:
        status, result = request('<?php /* ' + marker + ' */ echo 1;', require_yak_signature=True)
        require(status == 422 and result['errorCode'] == 'yak_signature_missing')
        print('PASS exact signature required')

    for invalid_flag in ['true', 'false', 1, None, []]:
        body = json.dumps({'code': signed, 'requireYakSignature': invalid_flag}).encode()
        status, result = request(data=body)
        require(status == 400 and result['ok'] is False)
        print('PASS signature option type validated')
    html_php = '<p><?php echo "template"; ?></p>'
    status, result = request(data=json.dumps({'code': html_php, 'completeFile': True}).encode())
    require(status == 200 and result['syntaxChecked'] is True and ('<p>' in result['code']))
    print('PASS full file preserves mixed HTML/PHP context')
    status, result = request(data=json.dumps({'code': signed, 'completeFile': 'yes'}).encode())
    require(status == 400)
    print('PASS full-file flag type validated')
    print('29 HTTP checks passed')


if __name__ == '__main__':
    main()
