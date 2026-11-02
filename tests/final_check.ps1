$scriptRoot = Split-Path -Parent $MyInvocation.MyCommand.Path
$root = Split-Path -Parent $scriptRoot          # project root (contains lib/, examples/, tests/)
$localPhp = Join-Path $root 'runtime\php\php.exe'
if (Test-Path $localPhp) { $php = $localPhp } else { $php = 'C:\Users\Dell\Downloads\Yak-pro\runtime\php\php.exe' }
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
Check ((Get-Content (Join-Path $work 'log') | Select-String 'after: 0') -ne $null) 'stress 403 -> 0'
& $php -n -l (Join-Path $work 'out.php') | Out-Null
Check ($LASTEXITCODE -eq 0) 'stress output lint'
foreach($seed in 0,2,7,42,99){
    cmd /c "`"$php`" -n `"$root\examples\stress-yak-obfuscated.php`" $seed > `"$work\a.json`"" | Out-Null
    cmd /c "`"$php`" -n `"$work\out.php`" $seed > `"$work\b.json`"" | Out-Null
    $r = & $php -n (Join-Path $root 'tests\cmp_json.php') (Join-Path $work 'a.json') (Join-Path $work 'b.json') | Select-Object -Last 1
    Check ($r -eq 'IDENTICAL') "stress seed $seed behavior"
}

# 3. fixtures
foreach($n in 'ww','sw','tri'){
    & $php -n (Join-Path $root 'tests\diag.php') (Join-Path $root "tests\fixtures\mini-$n-obfuscated.php") (Join-Path $work 'out.php') > (Join-Path $work 'log')
    Check ((Get-Content (Join-Path $work 'log') | Select-String 'after: 0') -ne $null) "mini-$n -> 0"
    & $php -n -l (Join-Path $work 'out.php') | Out-Null
    Check ($LASTEXITCODE -eq 0) "mini-$n lint"
    $a = & $php -n (Join-Path $root "tests\fixtures\mini-$n-obfuscated.php")
    $b = & $php -n (Join-Path $work 'out.php')
    Check ("$a" -eq "$b") "mini-$n behavior"
}

# 3b. latch-branch fixture (TemplateFormatCleaner::isSafePath, real module)
& $php -n (Join-Path $root 'tests\diag.php') (Join-Path $root 'tests\fixtures\tfc-latch-obfuscated.php') (Join-Path $work 'out.php') > (Join-Path $work 'log')
Check ((Get-Content (Join-Path $work 'log') | Select-String 'after: 0') -ne $null) 'tfc-latch -> 0'
& $php -n -l (Join-Path $work 'out.php') | Out-Null
Check ($LASTEXITCODE -eq 0) 'tfc-latch lint'
$a = & $php -n (Join-Path $root 'tests\fixtures\tfc-latch-obfuscated.php')
$b = & $php -n (Join-Path $work 'out.php')
Check ("$a" -eq "$b") 'tfc-latch behavior'

# 4. example.txt
& $php -n (Join-Path $root 'tests\diag.php') (Join-Path $root 'public\assets\example.txt') (Join-Path $work 'out.php') > (Join-Path $work 'log')
Check ((Get-Content (Join-Path $work 'log') | Select-String 'after: 0') -ne $null) 'example.txt -> 0'
$a = & $php -n (Join-Path $root 'public\assets\example.txt')
$b = & $php -n (Join-Path $work 'out.php')
Check ("$a" -eq "$b") 'example.txt behavior'

# 5. crosslevel safety net
& $php -n (Join-Path $root 'tests\diag.php') (Join-Path $root 'tests\fixtures\crosslevel-test.php') (Join-Path $work 'out.php') > (Join-Path $work 'log')
$a = & $php -n (Join-Path $root 'tests\fixtures\crosslevel-test.php')
$b = & $php -n (Join-Path $work 'out.php')
Check ("$a" -eq "$b") 'crosslevel behavior'

# 6. clean source passthrough
& $php -n (Join-Path $root 'tests\diag.php') (Join-Path $root 'examples\stress-original.php') (Join-Path $work 'out.php') > (Join-Path $work 'log')
Check ((Get-Content (Join-Path $work 'log') | Select-String 'goto before: 0') -ne $null) 'clean source passthrough'

Remove-Item $work -Recurse -Force -ErrorAction SilentlyContinue
Write-Output ''
if($ok){ Write-Output '=== ALL FINAL CHECKS PASSED ===' } else { Write-Output '=== SOME CHECKS FAILED ===' }
