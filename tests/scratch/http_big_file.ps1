param([Parameter(Mandatory = $true)][string]$InputFile)
# End-to-end HTTP and execution comparison for an authored, safe PHP fixture.
$ErrorActionPreference = 'Stop'
$root = Split-Path -Parent (Split-Path -Parent $PSScriptRoot)
$php = Join-Path $root 'runtime\php\php.exe'
$big = (Resolve-Path -LiteralPath $InputFile).Path
. (Join-Path $root 'tests\native_process.ps1')

# start a test server (same flags as start.cmd)
$proc = Start-Process -FilePath $php -ArgumentList @('-n','-d','display_errors=0','-d','memory_limit=256M','-d','post_max_size=32M','-S','127.0.0.1:8091','-t',('"' + $root + '\public"')) -PassThru -WindowStyle Hidden
try {
    Start-Sleep -Seconds 2
    $code = [IO.File]::ReadAllText($big)
    Write-Output ("input bytes: " + ([Text.Encoding]::UTF8.GetByteCount($code)))
    $body = @{ code = $code } | ConvertTo-Json -Compress
    Write-Output ("json body bytes: " + ([Text.Encoding]::UTF8.GetByteCount($body)))
    $resp = Invoke-WebRequest -Uri 'http://127.0.0.1:8091/decode.php' -Method Post -ContentType 'application/json; charset=utf-8' -Body ([Text.Encoding]::UTF8.GetBytes($body)) -TimeoutSec 120 -UseBasicParsing
    $json = $resp.Content | ConvertFrom-Json
    Write-Output ("http status: " + $resp.StatusCode)
    Write-Output ("ok: " + $json.ok)
    Write-Output ("syntaxChecked: " + $json.syntaxChecked)
    Write-Output ("gotoBefore: " + $json.gotoBefore + ", gotoAfter: " + $json.gotoAfter)
    if ($resp.StatusCode -ne 200 -or $json.ok -ne $true -or $json.syntaxChecked -ne $true -or $null -eq $json.gotoAfter -or $json.gotoAfter -ne 0) { throw 'HTTP decode did not produce complete, syntax-checked output' }
    $out = Join-Path $env:TEMP 'yak-http-out.php'
    [IO.File]::WriteAllText($out, $json.code, (New-Object System.Text.UTF8Encoding($false)))
    $lint = Invoke-TestPhp -Php $php -Arguments @('-n', '-l', $out)
    if ($lint.ExitCode -ne 0) { throw ('Output lint failed: ' + $lint.Output + $lint.Error) }
    if (-not (Test-FixtureBehavior -Php $php -Before $big -After $out)) { throw 'Behavior mismatch or nonzero exit code' }
    Write-Output 'PASS HTTP, zero goto, lint and exact behavior comparison'
} finally {
    if($proc -and -not $proc.HasExited){ Stop-Process -Id $proc.Id -Force }
}
