param([Parameter(Mandatory = $true)][string]$InputFile)
# End-to-end HTTP and execution comparison for an authored, safe PHP fixture.
$ErrorActionPreference = 'Stop'
$root = Split-Path -Parent (Split-Path -Parent $PSScriptRoot)
$php = Join-Path $root 'runtime\php\php.exe'
$big = (Resolve-Path -LiteralPath $InputFile).Path

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
    $out = Join-Path $env:TEMP 'yak-http-out.php'
    [IO.File]::WriteAllText($out, $json.code, (New-Object System.Text.UTF8Encoding($false)))
    & $php -n -l $out
    $a = & $php -n -d error_reporting=E_ALL -d display_errors=0 $big 2>&1 | Out-String
    $b = & $php -n -d error_reporting=E_ALL -d display_errors=0 $out 2>&1 | Out-String
    Write-Output ("behavior identical: " + ($a -eq $b))
} finally {
    if($proc -and -not $proc.HasExited){ Stop-Process -Id $proc.Id -Force }
}
