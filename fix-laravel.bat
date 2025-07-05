@echo off
echo Clearing Laravel cache...

echo.
echo 1. Clearing config cache...
C:\laragon\bin\php\php-8.1.10-Win32-vs16-x64\php.exe artisan config:clear

echo.
echo 2. Clearing route cache...
C:\laragon\bin\php\php-8.1.10-Win32-vs16-x64\php.exe artisan route:clear

echo.
echo 3. Clearing view cache...
C:\laragon\bin\php\php-8.1.10-Win32-vs16-x64\php.exe artisan view:clear

echo.
echo 4. Clearing application cache...
C:\laragon\bin\php\php-8.1.10-Win32-vs16-x64\php.exe artisan cache:clear

echo.
echo 5. Generating new APP_KEY...
C:\laragon\bin\php\php-8.1.10-Win32-vs16-x64\php.exe artisan key:generate

echo.
echo 6. Regenerating composer autoload...
C:\laragon\bin\composer\composer.bat dump-autoload

echo.
echo Done! Try accessing your application now.
pause
