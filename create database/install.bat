@echo off
cls
@echo creating database.....
c:\xampp\mysql\bin\mysql.exe -u root -e "source %userprofile%\Downloads\hair_application\create_database.sql"
pause