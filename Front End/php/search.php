<?php
// Get the search query
$query = isset($_GET['query']) ? $_GET['query'] : '';
if (!$query) {
    echo "No search term provided.";
    exit;
}

// Define the directory to search in
$directory = './'; // Adjust this to the root directory of your project

// Function to recursively search files
function searchFiles($dir, $query) {
    $results = [];
    $files = scandir($dir);

    foreach ($files as $file) {
        // Skip special files
        if ($file === '.' || $file === '..') continue;

        $path = $dir . DIRECTORY_SEPARATOR . $file;

        // If it's a directory, search recursively
        if (is_dir($path)) {
            $results = array_merge($results, searchFiles($path, $query));
        } elseif (is_file($path)) {
            // Check if the file contains the query (in its name or contents)
            if (stripos($file, $query) !== false || stripos(file_get_contents($path), $query) !== false) {
                $results[] = $path;
            }
        }
    }
    return $results;
}

// Search for files
$matches = searchFiles($directory, $query);

// Display results
if (count($matches) > 0) {
    echo "<div class="popup">"
        echo "<h2>Search Results:</h2><ul>";
        foreach ($matches as $match) {
            $relativePath = str_replace($_SERVER['DOCUMENT_ROOT'], '', $match);
            echo "<li><a href='$relativePath'>$relativePath</a></li>";
        }
        echo "</ul>";
        echo "</div>"
} else {
    echo "No results found for '$query'.";
}
?>
