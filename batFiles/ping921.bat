@echo off
 
Set "IP=%1"
set "LogFile=.\Ping.txt"
Set /A MaxFails=1
Set /A Fails=0
 
:: Asigna una IP predeterminada si no se proporciona
If "%IP%"=="" (
    set "IP=8.8.8.8"
)

:Ping
Ping.exe "%IP%">temp.txt || (Set /A Fails+=1)
If %Fails% EQU %MaxFails% (Goto :OnError)

FOR /F "tokens=3 delims=, " %%A IN ('FINDSTR /C:"Maximum" temp.txt') DO SET max_ping=%%A
ECHO %DATE% %TIME% rtt max=%max_ping%, Equipo: %IP%> "%LogFile%"

Goto :endBat
 
:OnError
:: Hacer cosas...
echo %DATE% %TIME% Paquetes perdidos - %IP%> "%LogFile%"

:endBat
del /f/q "temp.txt"

Exit