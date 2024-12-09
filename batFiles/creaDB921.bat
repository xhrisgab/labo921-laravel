@echo off
REM Configuración de variables
set DB_NAME=LABO921
set TABLE_NAME=ENLACES
set MYSQL_USER=root
::set MYSQL_PASSWORD=

REM Comandos SQL para crear la base de datos y la tabla
set SQL_COMMANDS="CREATE DATABASE IF NOT EXISTS %DB_NAME%; USE %DB_NAME%; CREATE TABLE IF NOT EXISTS %TABLE_NAME% ( id INT AUTO_INCREMENT PRIMARY KEY, fecha DATE NOT NULL, hora TIME NOT NULL, ping INT, enlace CHAR(20) );"

REM Ejecutar los comandos en MySQL
echo Creando la base de datos %DB_NAME% y la tabla %TABLE_NAME%...

mysql -u%MYSQL_USER% -e %SQL_COMMANDS%

REM Verificar si el comando anterior tuvo éxito
if %ERRORLEVEL% equ 0 (
    echo Base de datos %DB_NAME% y tabla %TABLE_NAME% creadas exitosamente.
) else (
    echo Error al crear la base de datos o la tabla.
)

pause
