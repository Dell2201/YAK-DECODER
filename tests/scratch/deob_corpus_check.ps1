$ErrorActionPreference = 'Stop'
$root = 'C:\Users\Dell\Downloads\DEOB'
$php  = 'C:\Users\Dell\Downloads\Yak-pro v2\runtime\php\php.exe'
$lib  = 'C:\Users\Dell\AppData\Roaming\AutoClaw-oversea-official\accounts\2e5dcecdcb60e1bb0d5ae031952401806409ff8c815766bcd714534acb6ec6b8\projects\Default\yak-pro'
if($args.Count -ge 1){ $lib = $args[0] }
if($args.Count -ge 2){ $root = $args[1] }
$scratch = 'C:\Users\Dell\AppData\Roaming\AutoClaw-oversea-official\accounts\2e5dcecdcb60e1bb0d5ae031952401806409ff8c815766bcd714534acb6ec6b8\projects\Default\yak-pro\tests\scratch'
$outRoot = Join-Path $env:TEMP 'deob-check'
New-Item -ItemType Directory -Force -Path $outRoot | Out-Null
$files = Get-ChildItem $root -Recurse -File -Include *.php,*.php0,*.php1,*.php2,*.php3,*.php4,*.php5,*.php6,*.php7,*.php8,*.php9,*.phtml,*.inc | Sort-Object FullName
$badGoto = @(); $badLint = @(); $diff = @(); $i = 0
foreach($f in $files){
    $i++
    $rel = $f.FullName.Substring($root.Length + 1)
    $tmpOut = Join-Path $outRoot ($i.ToString('000') + '.php')
    if(Test-Path $tmpOut){ Remove-Item $tmpOut -Force }
    & $php -n -d memory_limit=2048M (Join-Path $scratch 'decode_with.php') (Join-Path $lib 'lib\decoder') $f.FullName $tmpOut 2>$null | Out-Null
    if(-not (Test-Path $tmpOut)){ $badLint += "$rel : decode produced no output"; continue }
    $after = (Select-String -Path $tmpOut -Pattern 'goto ' -AllMatches | ForEach-Object { $_.Matches.Count } | Measure-Object -Sum).Sum
    if(-not $after){ $after = 0 }
    & $php -n -l $tmpOut 2>$null | Out-Null
    if($LASTEXITCODE -ne 0){ $badLint += $rel; continue }
    if($after -gt 0){ $badGoto += "$rel : $after goto"; continue }
    # behavior differential: run both as CLI scripts, compare output
    $o1 = & $php -n -d error_reporting=E_ALL -d display_errors=0 $f.FullName 2>&1 | Out-String
    $o2 = & $php -n -d error_reporting=E_ALL -d display_errors=0 $tmpOut 2>&1 | Out-String
    if($o1 -ne $o2){ $diff += $rel }
}
Write-Output "files: $($files.Count)"
Write-Output "lint FAIL: $($badLint.Count)";  $badLint  | ForEach-Object { "  $_" }
Write-Output "goto remain: $($badGoto.Count)"; $badGoto | ForEach-Object { "  $_" }
Write-Output "behavior diff: $($diff.Count)";  $diff  | ForEach-Object { "  $_" }
