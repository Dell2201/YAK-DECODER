$ErrorActionPreference = 'Stop'
$scriptRoot = Split-Path -Parent $MyInvocation.MyCommand.Path
. (Join-Path $scriptRoot 'native_process.ps1')
$root = Split-Path -Parent $scriptRoot          # project root (contains lib/, examples/, tests/)
$localPhp = Join-Path $root 'runtime\php\php.exe'
if (Test-Path $localPhp) { $php = $localPhp } else { $php = 'php' }
$work = Join-Path $scriptRoot '_work'
New-Item -ItemType Directory -Force $work | Out-Null
$ok = $true

function Check($cond, $label) {
    if($cond){ Write-Output "PASS  $label" } else { Write-Output "FAIL  $label"; $script:ok = $false }
}

# 1. php -l on modified sources
& $php -n -l (Join-Path $root 'lib\decoder\Deobfuscator.php') | Out-Null
Check ($LASTEXITCODE -eq 0) 'lint Deobfuscator.php'
& $php -n -l (Join-Path $root 'lib\decoder\CfgStructurer.php') | Out-Null
Check ($LASTEXITCODE -eq 0) 'lint CfgStructurer.php'

# 2. main stress example: 403 -> 0 + behavior
& $php -n (Join-Path $root 'tests\diag.php') (Join-Path $root 'examples\stress-yak-obfuscated.php') (Join-Path $work 'out.php') > (Join-Path $work 'log')
Check ($LASTEXITCODE -eq 0) 'decoder process exit code'
Check ((Get-Content (Join-Path $work 'log') | Select-String 'after: 0') -ne $null) 'stress 403 -> 0'
& $php -n -l (Join-Path $work 'out.php') | Out-Null
Check ($LASTEXITCODE -eq 0) 'stress output lint'
foreach($seed in 0,2,7,42,99){
    Check (Test-FixtureBehavior -Php $php -Before (Join-Path $root 'examples\stress-yak-obfuscated.php') -After (Join-Path $work 'out.php') -InputArguments @("$seed")) "stress seed $seed behavior"
}

# 3. latch-branch fixture (TemplateFormatCleaner::isSafePath, real module)
& $php -n (Join-Path $root 'tests\diag.php') (Join-Path $root 'tests\cases\regressions\tfc-latch-obfuscated.php') (Join-Path $work 'out.php') > (Join-Path $work 'log')
Check ($LASTEXITCODE -eq 0) 'decoder process exit code'
Check ((Get-Content (Join-Path $work 'log') | Select-String 'after: 0') -ne $null) 'tfc-latch -> 0'
& $php -n -l (Join-Path $work 'out.php') | Out-Null
Check ($LASTEXITCODE -eq 0) 'tfc-latch lint'
Check (Test-FixtureBehavior -Php $php -Before (Join-Path $root 'tests\cases\regressions\tfc-latch-obfuscated.php') -After (Join-Path $work 'out.php')) 'tfc-latch behavior'

# 4. example.txt
& $php -n (Join-Path $root 'tests\diag.php') (Join-Path $root 'public\assets\example.txt') (Join-Path $work 'out.php') > (Join-Path $work 'log')
Check ($LASTEXITCODE -eq 0) 'decoder process exit code'
Check ((Get-Content (Join-Path $work 'log') | Select-String 'after: 0') -ne $null) 'example.txt -> 0'
Check (Test-FixtureBehavior -Php $php -Before (Join-Path $root 'public\assets\example.txt') -After (Join-Path $work 'out.php')) 'example.txt behavior'

# 5. crosslevel safety net
& $php -n (Join-Path $root 'tests\diag.php') (Join-Path $root 'tests\cases\regressions\crosslevel-test.php') (Join-Path $work 'out.php') > (Join-Path $work 'log')
Check ($LASTEXITCODE -eq 0) 'decoder process exit code'
Check (Test-FixtureBehavior -Php $php -Before (Join-Path $root 'tests\cases\regressions\crosslevel-test.php') -After (Join-Path $work 'out.php')) 'crosslevel behavior'

# 6. clean source passthrough
& $php -n (Join-Path $root 'tests\diag.php') (Join-Path $root 'examples\stress-original.php') (Join-Path $work 'out.php') > (Join-Path $work 'log')
Check ($LASTEXITCODE -eq 0) 'decoder process exit code'
Check ((Get-Content (Join-Path $work 'log') | Select-String 'goto before: 0') -ne $null) 'clean source passthrough'

$resolvedWork = [IO.Path]::GetFullPath($work)
if ($resolvedWork -ne [IO.Path]::GetFullPath((Join-Path $scriptRoot '_work'))) { throw 'Unexpected work directory' }
Remove-Item -LiteralPath $resolvedWork -Recurse -Force -ErrorAction SilentlyContinue
Write-Output ''
if($ok){ Write-Output '=== ALL FINAL CHECKS PASSED ===' } else { Write-Output '=== SOME CHECKS FAILED ===' }

if (-not $ok) { exit 1 }
