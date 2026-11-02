$ErrorActionPreference = 'Stop'
# End-to-end HTTP check: big real file (2.2 MiB, earlier rejected by the site's 2 MiB limit)
$root = 'C:\Users\Dell\AppData\Roaming\AutoClaw-oversea-official\accounts\2e5dcecdcb60e1bb0d5ae031952401806409ff8c815766bcd714534acb6ec6b8\projects\Default\yak-pro'
$php  = "$root\runtime\..\..\runtime\php\php.exe"  # resolved below
$php  = 'C:\Users\Dell\Downloads\Yak-pro v2\runtime\php\php.exe'
$big  = 'C:\Users\Dell\Downloads\social_login-opencart-2.3-3.x-v4.0.236.ocmod\upload\catalog\controller\extension\social_login\kernel.php'

# start a test server (same flags as start.cmd)
$proc = Start-Process -FilePath $php -ArgumentList @('-n','-d','display_errors=0','-d','memory_limit=256M','-d','post_max_size=32M','-S','127.0.0.1:8091','-t',"$root\public") -PassThru -WindowStyle Hidden
try {
    Start-Sleep -Seconds 2
    $code = [IO.File]::ReadAllText($big)
    Write-Output ("input bytes: " + $code.Length)
    $body = @{ code = $code } | ConvertTo-Json -Compress
    Write-Output ("json body bytes: " + ([Text.Encoding]::UTF8.GetByteCount($body)))
    $resp = Invoke-WebRequest -Uri 'http://127.0.0.1:8091/decode.php' -Method Post -ContentType 'application/json; charset=utf-8' -Body ([Text.Encoding]::UTF8.GetBytes($body)) -TimeoutSec 120 -UseBasicParsing
    $json = $resp.Content | ConvertFrom-Json
    Write-Output ("http status: " + $resp.StatusCode)
    Write-Output ("ok: " + $json.ok)
    Write-Output ("syntaxChecked: " + $json.syntaxChecked)
    Write-Output ("gotoBefore: " + $json.gotoBefore + ", gotoAfter: " + $json.gotoAfter)
    $out = "$env:TEMP\kernel_http_out.php"
    [IO.File]::WriteAllText($out, $json.code, (New-Object System.Text.UTF8Encoding($false)))
    & $php -n -l $out
    $a = & $php -n -d error_reporting=E_ALL -d display_errors=0 $big 2>&1 | Out-String
    $b = & $php -n -d error_reporting=E_ALL -d display_errors=0 $out 2>&1 | Out-String
    Write-Output ("behavior identical: " + ($a -eq $b))
} finally {
    if($proc -and -not $proc.HasExited){ Stop-Process -Id $proc.Id -Force }
}
