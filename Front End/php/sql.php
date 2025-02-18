<?php
// Define the directory to scan
$directory = 'C:\projects\Pharmatceutical-Import-and-Distribution-System\MySQL Database Updates\backups'; // Replace with your folder path

// Check if the directory exists
if (is_dir($directory)) {
    // Scan the directory for files
    $files = scandir($directory);

    // Filter out only .sql files
    $sqlFiles = array_filter($files, function($file) {
        return pathinfo($file, PATHINFO_EXTENSION) === 'sql';
    });

    // Check if there are any .sql files
    if (count($sqlFiles) > 0) {
        echo "<table id='tblreport'>";
        foreach ($sqlFiles as $file) {
            $fileUrl = urlencode($directory . '/' . $file); // Make it URL friendly
            echo "<tr>";
            echo "<td><a href='$directory/$file' download>Download $file</a></td>";
            echo "<td><a href='mailto:?subject=Backup File&body=Here is the backup file: $fileUrl' target='_blank'>Share via Email</a></td>";
            echo "<td><a href='https://api.whatsapp.com/send?text=Backup%20File:%20$fileUrl' target='_blank'>Share via WhatsApp</a></td>";
            echo "<td>
                <form method='post' action='../php/restore.php'>
                    <input type='hidden' id='backup_file' name='backup_file' value='$file'>
                    <button type='submit' class='btn-link'>Restore</button>
                </form>
            </td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='color: red; width: 200px; margin: auto; margin-bottom:20px'>No SQL files found in the directory.</p>";
    }
} else {
    echo "<p style='color: red; width: 200px; margin: auto; margin-bottom:20px'>The directory '$directory' does not exist.</p>";
}
?>