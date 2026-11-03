from pathlib import Path
import subprocess,json,re,argparse,sys
D=Path(__file__).resolve().parent
ROOT=D.parents[2]
parser=argparse.ArgumentParser()
parser.add_argument('--yakpro', type=Path, help='Regenerate fixtures using this YAK Pro 2.x entry point; otherwise check saved inputs')
args=parser.parse_args()
PHP=ROOT/'runtime/php/php.exe'
YAK=args.yakpro.resolve() if args.yakpro else None
SEEDS=[-7,-1,0,1,3,11,42]
def run(args,timeout=40):
 return subprocess.run([str(x) for x in args],capture_output=True,timeout=timeout)
def execute(php,path,seed):
 r=run([php,'-n',path,str(seed)]);return (r.returncode,r.stdout,r.stderr)
results=[]
failures=[]
for name in ['graph-nested','clone-retry']:
 source=D/(name+'.original.php')
 assert run([PHP,'-n','-l',source]).returncode==0,name
 adapted={seed:execute(PHP,source,seed) for seed in SEEDS}
 for seed in SEEDS:
  assert adapted[seed][0]==0,(name,'source execution',seed)
 coverage=set()
 for run_id in range(25):
  obf=D/(name+'-%02d.obfuscated.php'%run_id);decoded=D/(name+'-%02d.decoded.php'%run_id)
  if YAK is not None:
   cmd=[PHP,'-n',YAK,source.as_posix(),'--config-file',(D/'yakpro-2.cnf').as_posix(),'-o',obf.as_posix()]
   yak=run(cmd);assert yak.returncode==0,(name,run_id,yak.stdout,yak.stderr)
  assert obf.is_file(),(name,run_id,'missing obfuscated input')
  assert run([PHP,'-n','-l',obf]).returncode==0,(name,run_id,'obfuscated lint')
  dec=run([PHP,'-n',ROOT/'tests/diag.php',obf,decoded],timeout=60);assert dec.returncode==0 and decoded.is_file(),(name,run_id,dec.stderr)
  log=dec.stdout.decode(errors='replace');match=re.search(r'goto before: (\d+), after: (\d+)',log);assert match,log
  lint=run([PHP,'-n','-l',decoded]); assert lint.returncode==0,(name,run_id,lint.stdout,lint.stderr)
  differences=[];upstream=[]
  for seed in SEEDS:
   before=execute(PHP,obf,seed);after=execute(PHP,decoded,seed)
   if before[0]!=0 or before!=after:differences.append(seed)
   if adapted[seed]!=before:upstream.append(seed)
   if before[0]==0:coverage.update(json.loads(before[1])['coverage'])
  results.append({'scenario':name,'variant':run_id,'gotoBefore':int(match[1]),'gotoAfter':int(match[2]),'behaviorMismatch':differences,'yakDifferences':upstream})
  if int(match[2])!=0:failures.append(f'{name} variant {run_id}: {match[2]} goto remain')
  if differences:failures.append(f'{name} variant {run_id}: decoded behavior mismatch for seeds {differences}')
  if upstream:failures.append(f'{name} variant {run_id}: YAK behavior mismatch for seeds {upstream}')
  print(name,run_id,'goto',match[1],'=>',match[2],'mismatch',differences,'yak',upstream,flush=True)
 declared=set(re.findall(r"hit\('([^']+)'",source.read_text(encoding='utf8')));print('coverage',name,len(coverage),'/',len(declared),'missing',sorted(declared-coverage),flush=True)
 if declared-coverage:failures.append(f'{name}: unreached coverage markers {sorted(declared-coverage)}')
(D/'results.json').write_text(json.dumps(results,indent=2)+'\n',encoding='utf8')
print('SUMMARY',json.dumps({'files':len(results),'partial':sum(x['gotoAfter']>0 for x in results),'mismatched':sum(bool(x['behaviorMismatch']) for x in results),'yakChanged':sum(bool(x['yakDifferences']) for x in results),'comparisons':len(results)*len(SEEDS)}),flush=True)
if failures:
 for failure in failures:print('FAIL',failure,file=sys.stderr,flush=True)
 sys.exit(1)
print('PASS all zero-goto, behavior and coverage checks',flush=True)
