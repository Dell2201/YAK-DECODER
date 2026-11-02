@echo off
setlocal
cd /d "%~dp0"
set "YAK_PHP_BINARY=%~dp0runtime\php\php.exe"
if not exist "%YAK_PHP_BINARY%" (
  echo Bundled PHP was not found: runtime\php\php.exe
  echo Extract the complete Yak-pro archive and try again.
  pause
  exit /b 1
)
"%YAK_PHP_BINARY%" -n -r "exit(PHP_VERSION === '7.4.33' ? 0 : 1);" >nul 2>nul
if errorlevel 1 (
  echo Bundled PHP 7.4.33 could not start. Check that all runtime files were extracted.
  pause
  exit /b 1
)
echo YAK Decode: http://127.0.0.1:18090
echo Keep this window open. Press Ctrl+C to stop the server.
start "" "http://127.0.0.1:18090"
"%YAK_PHP_BINARY%" -n -d display_errors=0 -d memory_limit=256M -d post_max_size=32M -S 127.0.0.1:18090 -t public
pause
