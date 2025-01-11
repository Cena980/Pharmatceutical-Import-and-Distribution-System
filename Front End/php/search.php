<?php
// Get the search query
$query = isset($_GET['query']) ? $_GET['query'] : '';
if (!$query) {
    echo "No search term provided.";
    exit;
}

include 'connection.php';
$sql = "SELECT table_name, column_name FROM INFORMATION_SCHEMA. COLUMNS WHERE column_name LIKE '%$query%'";
$res = mysqli_query($connect, $sql);

$num_rows = mysqli_num_rows($res);
if($num_rows>0){
    echo "<table border='1' id='tblreport'>";
    echo "<tr>
                <th>Type ID</th><th>Drug Type</th>
            </tr>";
    while ($r = mysqli_fetch_assoc($res)) {
        echo "<tr>";
        echo "<td>" . $r['Type_ID'] . "</td>";
        echo "<td>" . $r['Drug_Type'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No records found.";  
}
?>
