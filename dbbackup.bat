@ECHO OFF

set TIMESTAMP=%DATE:~10,4%%DATE:~4,2%%DATE:~7,2%
REM set TIMESTAMP=%DATE:~10,4%%DATE:~4,2%%DATE:~7,2%

REM Export all databases into file C:\path\backup\databases.[year][month][day].sql
  REM "C:\xampp\mysql\bin\mysqldump.exe" --all-databases --result-file="C:\test\backup\databases.%TIMESTAMP%.sql" --user=root --password=""

REM Export specific database into file C:\
 "C:\xampp\mysql\bin\mysqldump.exe" --databases cis_db --result-file="C:\test\backup\cis_db.%TIMESTAMP%.sql" --user=root --password=""

REM Change working directory to the location of the DB dump file.
REM C:
REM CD \test\backup\

REM Compress DB dump file into CAB file use "EXPAND file.cab" to decompress.
REM MAKECAB "databases.%TIMESTAMP%.sql" "databases.%TIMESTAMP%.sql.cab"

REM Delete uncompressed DB dump file.
REM DEL /q /f "databases.%TIMESTAMP%.sql"

