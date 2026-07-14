@echo off
REM Local preview server: http://localhost:8090
REM Requires PHP on PATH (winget install PHP.PHP.8.5)
cd /d "%~dp0"
echo Serving http://localhost:8090 (Ctrl+C to stop)
php -S 127.0.0.1:8090 -t "%~dp0" "%~dp0dev-router.php"
