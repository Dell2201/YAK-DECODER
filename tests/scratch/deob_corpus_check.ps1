param(
    [Parameter(Mandatory = $true)][string]$CorpusRoot,
    [string]$ProjectRoot
)
# Executes the corpus as PHP programs: use authored, safe test fixtures only.
$ErrorActionPreference = 'Stop'
if (-not $ProjectRoot) {
    $ProjectRoot = Split-Path -Parent (Split-Path -Parent $PSScriptRoot)
}
$root = (Resolve-Path -LiteralPath $CorpusRoot).Path.TrimEnd('\')
$lib = (Resolve-Path -LiteralPath $ProjectRoot).Path
$php = Join-Path $lib 'runtime\php\php.exe'
$scratch = Join-Path $lib 'tests\scratch'
. (Join-Path $lib 'tests\native_process.ps1')
$outRoot = Join-Path $env:TEMP ('yak-corpus-' + [guid]::NewGuid().ToString('N'))
New-Item -ItemType Directory -Force -Path $outRoot | Out-Null
$files = Get-ChildItem $root -Recurse -File -Include *.php,*.php0,*.php1,*.php2,*.php3,*.php4,*.php5,*.php6,*.php7,*.php8,*.php9,*.phtml,*.inc | Sort-Object FullName
$badGoto = @(); $badLint = @(); $diff = @(); $i = 0
foreach($f in $files){
    $i++
    $rel = $f.FullName.Substring($root.Length + 1)
    $tmpOut = Join-Path $outRoot ($i.ToString('000') + '.php')
    if(Test-Path $tmpOut){ Remove-Item $tmpOut -Force }
    $decode = Invoke-TestPhp -Php $php -Arguments @('-n', '-d', 'memory_limit=2048M', (Join-Path $scratch 'decode_with.php'), (Join-Path $lib 'lib\decoder'), $f.FullName, $tmpOut)
    if ($decode.ExitCode -ne 0 -or -not (Test-Path -LiteralPath $tmpOut)) { $badLint += "$rel : decode failed"; continue }
    $counter = Invoke-TestPhp -Php $php -Arguments @('-n', (Join-Path $lib 'tests\count_fixture_gotos.php'), $tmpOut)
    if ($counter.ExitCode -ne 0) { $badLint += "$rel : token counter failed"; continue }
    $counts = @($counter.Output | ConvertFrom-Json)
    if ($counts.Count -ne 1) { $badLint += "$rel : invalid token count"; continue }
    $after = $counts[0]
    $lint = Invoke-TestPhp -Php $php -Arguments @('-n', '-l', $tmpOut)
    if ($lint.ExitCode -ne 0) { $badLint += $rel; continue }
    if($after -gt 0){ $badGoto += "$rel : $after goto"; continue }
    # behavior differential: run both as CLI scripts, compare output
    if (-not (Test-FixtureBehavior -Php $php -Before $f.FullName -After $tmpOut)) { $diff += $rel }
}
Write-Output "files: $($files.Count)"
Write-Output "lint FAIL: $($badLint.Count)";  $badLint  | ForEach-Object { "  $_" }
Write-Output "goto remain: $($badGoto.Count)"; $badGoto | ForEach-Object { "  $_" }
Write-Output "behavior diff: $($diff.Count)";  $diff  | ForEach-Object { "  $_" }
if ($files.Count -eq 0 -or $badLint.Count -gt 0 -or $badGoto.Count -gt 0 -or $diff.Count -gt 0) { exit 1 }
