<?php

// Define variables
$User = 'root';
$Password = 'cena_980';
$Database = 'drugwholesale';
$BackupDir = 'C:\projects\Pharmatceutical-Import-and-Distribution-System\MySQL Database Updates\backups'; // Use double backslashes for Windows paths
$Timestamp = date('Y-m-d_H-i-s'); // Use PHP to generate the timestamp
$BackupFile = "$BackupDir\\{$Database}_backup_$Timestamp.sql";

// Prepare the PowerShell command
$command = "powershell -Command \"";
$command .= "\$User = '$User'; ";
$command .= "\$Password = '$Password'; ";
$command .= "\$Database = '$Database'; ";
$command .= "\$BackupDir = '$BackupDir'; ";
$command .= "if (!(Test-Path \$BackupDir)) { New-Item -ItemType Directory -Path \$BackupDir }; ";
$command .= "\$BackupFile = '$BackupFile'; ";
$command .= "& 'C:\\Program Files\\MySQL\\MySQL Server 9.1\\bin\\mysqldump.exe' --default-auth=mysql_native_password -u \$User --password=\$Password \$Database > \$BackupFile; ";
$command .= "if (\$?) { Write-Host 'Backup successful: \$BackupFile' -ForegroundColor Green } else { Write-Host 'Backup failed!' -ForegroundColor Red }";
$command .= "\"";

// Execute the command and capture output
exec($command, $output, $return_var);

// Log detailed error if the backup failed
if ($return_var === 0) {
    echo "Backup created: $BackupFile";
} else {
    // Print the command output and return value for debugging
    echo "Backup failed. Error output:\n" . implode("\n", $output) . "\n";
    echo "Return code: $return_var\n";
}

?>