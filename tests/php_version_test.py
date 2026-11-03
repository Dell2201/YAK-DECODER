"""Check bundled PHP selection, signature filtering and version-specific syntax; no submitted PHP execution."""
from pathlib import Path
import subprocess,socket,time,json,urllib.request,urllib.error
ROOT=Path(__file__).resolve().parent.parent

def main():
 sock=socket.socket();sock.bind(('127.0.0.1',0));port=sock.getsockname()[1];sock.close()
 server=subprocess.Popen([str(ROOT/'runtime/php/php.exe'),'-n','-d','post_max_size=32M','-S',f'127.0.0.1:{port}','-t',str(ROOT/'public')],stdout=subprocess.DEVNULL,stderr=subprocess.DEVNULL)
 checks=0
 def request(payload):
  body=json.dumps(payload).encode();req=urllib.request.Request(f'http://127.0.0.1:{port}/decode.php',data=body,headers={'Content-Type':'application/json'})
  try:
   res=urllib.request.urlopen(req,timeout=40);return res.status,json.load(res)
  except urllib.error.HTTPError as e:return e.code,json.load(e)
 def check(payload,status):
  nonlocal checks
  actual,data=request(payload);assert actual==status,(actual,data);checks+=1;return data
 try:
  for _ in range(50):
   try:urllib.request.urlopen(f'http://127.0.0.1:{port}/',timeout=1);break
   except OSError:time.sleep(.1)
  samples=[('7.4','<?php echo 1;'),('8.1','<?php class C { public readonly int $x; }'),('8.2','<?php readonly class C { public int $x; }'),('8.3','<?php class C { const string NAME = "x"; }')]
  for version,code in samples:
   d=check({'code':code,'phpVersion':version},200);assert d['syntaxChecked'] and d['syntaxPhpVersion']==version
   if version!='7.4':check({'code':code,'phpVersion':'7.4'},422)
   for flag in [False,True]:
    for signed in [False,True]:
     code='<?php '+('/* Obfuscated by YAK Pro - Php Obfuscator */ ' if signed else '')+'echo 1;'
     check({'code':code,'phpVersion':version,'requireYakSignature':flag,'completeFile':True},422 if flag and not signed else 200)
  for value in [None,False,83,[],{},'8.0','../../php','8.3;echo 1']:
   check({'code':'<?php echo 1;','phpVersion':value},400)
  d=check({'code':'<?php echo 1;'},200);assert d['syntaxPhpVersion']=='7.4'
  # Fixed synthetic programs only: verify meaning, not merely successful lint.
  import tempfile
  cases = [
   ('<?php $x = "1" . 2 + 3; echo gettype($x), ":", $x;', ['7.4','8.1','8.2','8.3']),
   ('<?php class Readonly {} echo "OK";', ['7.4']),
   ('<?php try { goto a; bad: echo "BAD"; a: throw new Exception("E"); echo "DEAD"; } catch (Exception $e) { echo $e->getMessage(); }', ['7.4','8.1','8.2','8.3']),
   ('<?php try { $i=0; goto h; h: if ($i>=3) goto end; $i++; if ($i===2) goto fail; echo $i; goto h; fail: throw new Exception("E"); end: echo "END"; } catch (Exception $e) { echo $e->getMessage(); }', ['7.4','8.1','8.2','8.3']),
   ('<?php $x=match(2){1=>"A",2=>"B"}; echo $x;', ['8.1','8.2','8.3']),
   ('<?php enum E: string { case A="a"; } echo E::A->value;', ['8.1','8.2','8.3']),
   ('<?php readonly class C { public function __construct(public int $x){} } echo (new C(3))->x;', ['8.2','8.3']),
   ('<?php class C { const string X="x"; } echo C::X;', ['8.3'])
  ]
  cases.append(((ROOT / 'tests/cases/regressions/foreach-finally-continue.php').read_text(encoding='utf8'), ['7.4','8.1','8.2','8.3']))
  cases.append(((ROOT / 'tests/cases/regressions/try-catch-loop-controls.php').read_text(encoding='utf8'), ['7.4','8.1','8.2','8.3']))
  cases.append(('<?php class C { const string LABEL="goto hidden;"; } $key="LABEL"; echo C::{$key}; goto end; echo "dead"; end: echo "ok";', ['8.3']))
  with tempfile.TemporaryDirectory() as temp:
   for code,versions in cases:
    for version in versions:
     data=check({'code':code,'phpVersion':version},200)
     if 'Regression: goto to the increment' in code: assert data['gotoAfter'] == 0, data
     if 'Regression: try/catch' in code: assert data['gotoBefore'] > 0 and data['gotoAfter'] == 0, data
     if 'goto hidden;' in code: assert data['gotoBefore'] == 1 and data['gotoAfter'] == 0, data
     runtime=ROOT/'runtime'/({'7.4':'php','8.1':'php81','8.2':'php82','8.3':'php83'}[version])/'php.exe'
     a=Path(temp)/'input.php';b=Path(temp)/'decoded.php';a.write_text(code,encoding='utf8');b.write_text(data['code'],encoding='utf8')
     before=subprocess.run([str(runtime),'-n',str(a)],capture_output=True,timeout=5)
     after=subprocess.run([str(runtime),'-n',str(b)],capture_output=True,timeout=5)
     assert before.returncode==after.returncode==0 and before.stdout==after.stdout and before.stderr==after.stderr,(version,code,before.stdout,after.stdout)
  print(f'{checks} PHP-version/signature/semantics checks passed')
 finally:server.terminate();server.wait(timeout=5)
if __name__=='__main__':main()
