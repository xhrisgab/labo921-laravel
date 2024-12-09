@echo off
 
Set "IP=%1"
::set "LogFile=.\Ping.txt"
Set /A MaxFails=1
Set /A Fails=0

set MYSQL_USER=root
::set MYSQL_PASSWORD=
 
call creaDB921.bat

:: Asigna una IP predeterminada si no se proporciona
If "%IP%"=="" (
    set "IP=8.8.8.8"
)

:Ping
Ping.exe "%IP%">temp921.txt || (Set /A Fails+=1)
If %Fails% EQU %MaxFails% (Goto :OnError)

FOR /F "tokens=7 delims==ms " %%A IN ('FINDSTR /C:"Maximum" temp921.txt') DO SET max_ping=%%A
set SQL_COMMANDS="USE LABO921; INSERT INTO ENLACES (fecha,hora,ping,enlace) VALUES ( SYSDATE(), '%TIME%', '%max_ping%', '%IP%' );"

mysql -u%MYSQL_USER% -e %SQL_COMMANDS%

REM Verificar si el comando anterior tuvo éxito
if %ERRORLEVEL% equ 0 (
    echo Insert correctocreadas exitosamente.
    Goto :endBat
) else (
    echo Error al crear la base de datos o la tabla.
    Goto :endBat
)

Goto :endBat
 
:OnError
:: Hacer cosas...
echo %DATE% %TIME% Paquetes perdidos - %IP%>> "%LogFile%"

:endBat
del /f/q "temp921.txt"

Exit