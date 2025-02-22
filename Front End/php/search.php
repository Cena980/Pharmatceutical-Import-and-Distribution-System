<?php
include 'connection.php';
if (isset($_GET['query'])) {
    $query = mysqli_real_escape_string($connect, $_GET['query']); // Escape special characters for SQL
} else {
    echo "No search term provided.";
    exit;
}

$sql = "SELECT * from drugs_view 
    WHERE drug_name LIKE '%$query%' 
    or company like '%$query%'
    or ingredient like '%$query%'
    or demo like '%$query%'
    or type like '%$query%' 
    order by drug_name asc ";
$res = mysqli_query($connect, $sql);

$num_rows = mysqli_num_rows($res);
if($num_rows>0){
    echo "<table id='tblsearch'>";
    echo "<thead><tr>
                <th data-key='drug-id'>Drug ID</th>
                    <th data-key='drug-name'>Name</th>
                    <th data-key='ingredients'>Ingredients</th>
                    <th data-key='quantity-pb'>PB</th>
                    <th data-key='company-name'>Company Name</th>
                    <th data-key='type'>Type</th>
                    <th data-key='demo'>Demography</th>
            </tr></thead><tbody>";
    while ($r = mysqli_fetch_assoc($res)) {
        echo "<tr>";
            echo "<td>" . $r['drug_id'] . "</td>";
            echo "<td>" . $r['drug_name'] . "</td>";
            echo "<td>" . $r['ingredient'] . "</td>";
            echo "<td>" . $r['PB'] . "</td>";
            echo "<td>" . $r['company'] . "</td>";
            echo "<td>" . $r['type'] . "</td>";
            echo "<td>" . $r['demo'] . "</td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
} else {
    echo "<div class='alerts' style = 'color:red;'>No records found.</div>";  
}
?>
