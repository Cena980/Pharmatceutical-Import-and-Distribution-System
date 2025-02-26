@echo off
cd C:\projects\Pharmatceutical-Import-and-Distribution-System
start "" php -S localhost:8000
timeout /t 2 >nul
start http://localhost:8000/Front%%20End/home.php