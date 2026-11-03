# Capture bytes from both streams; compare exit codes separately.
function Invoke-TestPhp {
    param([string]$Php, [string[]]$Arguments)
    $info = New-Object System.Diagnostics.ProcessStartInfo
    $info.FileName = $Php
    $quoted = foreach ($argument in $Arguments) {
        '"' + [regex]::Replace([regex]::Replace($argument, '(\\*)"', '$1$1\"'), '(\\+)$', '$1$1') + '"'
    }
    $info.Arguments = $quoted -join ' '
    $info.UseShellExecute = $false
    $info.CreateNoWindow = $true
    $info.RedirectStandardOutput = $true
    $info.RedirectStandardError = $true
    $process = New-Object System.Diagnostics.Process
    $process.StartInfo = $info
    $stdout = New-Object System.IO.MemoryStream
    $stderr = New-Object System.IO.MemoryStream
    try {
        if (-not $process.Start()) { throw 'PHP process could not start' }
        $outTask = $process.StandardOutput.BaseStream.CopyToAsync($stdout)
        $errTask = $process.StandardError.BaseStream.CopyToAsync($stderr)
        if (-not $process.WaitForExit(45000)) {
            $process.Kill()
            throw 'PHP test process timed out'
        }
        [void]$outTask.GetAwaiter().GetResult()
        [void]$errTask.GetAwaiter().GetResult()
        [pscustomobject]@{
            ExitCode = $process.ExitCode
            Stdout = [Convert]::ToBase64String($stdout.ToArray())
            Stderr = [Convert]::ToBase64String($stderr.ToArray())
            Output = [Text.Encoding]::UTF8.GetString($stdout.ToArray())
            Error = [Text.Encoding]::UTF8.GetString($stderr.ToArray())
        }
    } finally {
        $stdout.Dispose()
        $stderr.Dispose()
        $process.Dispose()
    }
}

function Test-FixtureBehavior {
    param([string]$Php, [string]$Before, [string]$After, [string[]]$InputArguments = @())
    $first = Invoke-TestPhp -Php $Php -Arguments (@('-n', $Before) + $InputArguments)
    $second = Invoke-TestPhp -Php $Php -Arguments (@('-n', $After) + $InputArguments)
    return ($first.ExitCode -eq 0 -and $second.ExitCode -eq 0 -and
        $first.Stdout -ceq $second.Stdout -and $first.Stderr -ceq $second.Stderr)
}
