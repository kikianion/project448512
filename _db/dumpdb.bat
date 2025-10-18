@echo off
REM --- Get current date and time and format it ---
set TIMESTAMP=%DATE:~10,4%-%DATE:~4,2%-%DATE:~7,2%_%TIME:~0,2%.%TIME:~3,2%

REM --- Replace spaces and colons with periods/dashes if necessary (Windows Time settings vary) ---
set TIMESTAMP=%TIMESTAMP: =0%
set TIMESTAMP=%TIMESTAMP::=.%

REM --- Define the output filename with the timestamp ---
set FILENAME=simela-gen2_%TIMESTAMP%.sql

REM --- The actual mysqldump command ---
"K:\xampp7.4.26-1,simela\mysql\bin\mysqldump.exe" --no-data -h db1.vm1.dev -u root -p1 simela-gen2 > %FILENAME%

echo Schema dumped to %FILENAME%