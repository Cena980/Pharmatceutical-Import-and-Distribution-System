<?php
// Define the directory to scan
$directory = 'C:\projects\Pharmatceutical-Import-and-Distribution-System\MySQL Database Updates\backups'; // Replace with your folder path

// Check if the directory exists
if (!is_dir($directory)) {
    die("<p style='color: red; width: 200px; margin: auto; margin-bottom:20px'>The directory '$directory' does not exist.</p>");
}

// Function to filter files by name or date
function filterFiles($files, $searchQuery, $searchBy) {
    $filteredFiles = [];
    foreach ($files as $file) {
        $fileName = pathinfo($file, PATHINFO_FILENAME); // Get file name without extension
        $fileDate = substr($fileName, -19); // Extract date part (assuming format: backup_yyyy-MM-dd_HH-mm-ss)

        // Search by name
        if ($searchBy === 'name' && stripos($fileName, $searchQuery) !== false) {
            $filteredFiles[] = $file;
        }
        // Search by date
        elseif ($searchBy === 'date' && stripos($fileDate, $searchQuery) !== false) {
            $filteredFiles[] = $file;
        }
    }
    return $filteredFiles;
}

// Get search query and criteria from the URL
$searchQuery = $_GET['query'] ?? '';
$searchBy = $_GET['searchBy'] ?? 'name'; // Default to searching by name

// Scan the directory for .sql files
$files = scandir($directory);
$sqlFiles = array_filter($files, function($file) {
    return pathinfo($file, PATHINFO_EXTENSION) === 'sql';
});

// Filter files based on search criteria
if (!empty($searchQuery)) {
    $sqlFiles = filterFiles($sqlFiles, $searchQuery, $searchBy);
}

// Display the list of files with download and share options
if (count($sqlFiles) > 0) {
    echo "<table id='tblreport'>";
    foreach ($sqlFiles as $file) {
        // Generate file URL for sharing
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
    echo "<p style='color: red; width: 200px; margin: auto; margin-bottom:20px';>No matching SQL files found.</p>";
}
?>
