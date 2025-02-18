<?php
// Database configuration
$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'cena_980';
$db_name = 'drugwholesale';

// Backup directory
$backup_dir = 'C:\\projects\\Pharmatceutical-Import-and-Distribution-System\\MySQL Database Updates\\backups\\';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input to prevent directory traversal
    $backup_file = basename($_POST['backup_file']);
    $backup_file_path = $backup_dir . $backup_file;

    if (!file_exists($backup_file_path)) {
        die("<p style='color: red; width: 200px; margin: auto; margin-bottom:20px'>Backup file does not exist.</p>");
    }

    // Connect to MySQL
    $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
    if ($mysqli->connect_error) {
        die("<p style='color: red; width: 200px; margin: auto; margin-bottom:20px'>Connection failed: " . $mysqli->connect_error . "</p>");
    }

    // Read SQL file
    $sql = file_get_contents($backup_file_path);

    // Remove BOM if present
    if (substr($sql, 0, 3) === "\xEF\xBB\xBF") {
        $sql = substr($sql, 3);
    }

    // Execute SQL
    if ($mysqli->multi_query($sql)) {
        echo "<p style='color: green; width: 200px; margin: auto; margin-bottom:20px'>Database restored from: $backup_file </p>";
        echo "<div style='width: 100px; margin: auto; margin-bottom:20px'>";

        echo "
            <style>
            button {
                background-color: orange;
                color: white;
                cursor: pointer;
                width: 100px; 
                height:50px; 
                font-weight:bold; 
                cursor:pointer; 
                hover: scale(1.1); 
                font-size:20px; 
                margin: auto;
                border: none;
                border-radius: 15px;
                transition: transform 0.3s ease;
            }

            button:hover {
                transform: scale(1.1);
            }
            </style>
            <button style='' onclick='GoBack()'>Go Back</button>";
        echo "</div>";
        echo "
        <script>
            function GoBack(){
                history.back();}
        </script>
                ";
    } else {
        echo "<p style='color: red; width: 200px; margin: auto; margin-bottom:20px'>Error: " . $mysqli->error;
    }

    $mysqli->close();
} else {
    echo "<p style='color: red; width: 200px; margin: auto; margin-bottom:20px'>Invalid request.</p>";
}
?>
