<?php
// Define variables
$User = 'root';
$Password = 'cena_980';
$Database = 'drugwholesale';
$BackupDir = 'C:\\projects\\Pharmatceutical-Import-and-Distribution-System\\MySQL Database Updates\\backups';
$Timestamp = date('Y-m-d_H-i-s');
$BackupFile = "$BackupDir\\{$Database}_backup_$Timestamp.sql";

// Prepare the PowerShell command
$command = "powershell -Command \"";
$command .= "\$User = '$User'; ";
$command .= "\$Password = '$Password'; ";
$command .= "\$Database = '$Database'; ";
$command .= "\$BackupDir = '$BackupDir'; ";
$command .= "if (-not (Test-Path \$BackupDir)) { New-Item -ItemType Directory -Path \$BackupDir }; ";
$command .= "\$BackupFile = '$BackupFile'; ";

// Use Out-File with UTF-8 encoding (no BOM)
$command .= "& 'C:\\Program Files\\MySQL\\MySQL Server 9.1\\bin\\mysqldump.exe' ";
$command .= "--default-auth=mysql_native_password -u \$User --password=\$Password \$Database ";
$command .= "| Out-File -Encoding UTF8 \$BackupFile; ";

$command .= "if (\$?) { Write-Host 'Backup successful: \$BackupFile' -ForegroundColor Green } else { Write-Host 'Backup failed!' -ForegroundColor Red }";
$command .= "\"";

// Execute the command
exec($command, $output, $return_var);

// Check result
if ($return_var === 0) {
    echo "<p style='color: green; width: 200px; margin: auto; margin-bottom:20px'>Backup created: $BackupFile </p>";
} else {
    echo "<p style='color: red; width: 200px; margin: auto; margin-bottom:20px'>Backup failed. Error output:\n" . implode("\n", $output) . "\n </p>";
    echo "<p style='color: red; width: 200px; margin: auto; margin-bottom:20px'>Return code: $return_var\n </p>";
}
?>