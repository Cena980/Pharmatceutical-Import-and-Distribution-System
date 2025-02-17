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
            echo "<tr>";
            echo "<td><a href='$directory/$file' download>$file</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No SQL files found in the directory.</p>";
    }
} else {
    echo "<p>The directory '$directory' does not exist.</p>";
}
?>