@echo off
cd /d "C:\Users\abdul\Documents\Arsine\Front End"
powershell -WindowStyle Hidden -Command "Start-Process 'C:\Program Files\PHP\php.exe' -ArgumentList '-S localhost:8000 -t \"C:\Users\abdul\Documents\Arsine\Front End\"' -NoNewWindow"
start "" http://localhost:8000/home.php
