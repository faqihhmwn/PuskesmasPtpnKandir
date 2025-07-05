@echo off
echo Updating Database Structure...

echo.
echo 1. Running new migration...
C:\laragon\bin\php\php-8.1.10-Win32-vs16-x64\php.exe artisan migrate --force

echo.
echo 2. Seeding sample data...
C:\laragon\bin\php\php-8.1.10-Win32-vs16-x64\php.exe artisan db:seed --class=ObatSeeder

echo.
echo 3. Clearing all cache...
C:\laragon\bin\php\php-8.1.10-Win32-vs16-x64\php.exe artisan config:clear
C:\laragon\bin\php\php-8.1.10-Win32-vs16-x64\php.exe artisan route:clear
C:\laragon\bin\php\php-8.1.10-Win32-vs16-x64\php.exe artisan view:clear
C:\laragon\bin\php\php-8.1.10-Win32-vs16-x64\php.exe artisan cache:clear

echo.
echo Database updated! Try accessing your application now.
echo URL: http://localhost/klinik-web/PuskesmasPtpnKandir/public/obat/dashboard
pause
