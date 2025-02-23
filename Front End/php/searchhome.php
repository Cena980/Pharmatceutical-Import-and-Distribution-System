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
                    <th data-key='actions' colspan='2'>Actions</th>
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
            echo "<td>
                <form action='drugs/updatedrugs.php' method='GET'>
                    <input type='hidden' name='Drug_ID' value='" . $r['drug_id'] . "'>
                    <input type='hidden' name='Drug_Name' value='" . $r['drug_name'] . "'>
                    <input type='hidden' name='Ingredient' value='" . $r['ingredient'] . "'>
                    <input type='hidden' name='Tablet_PB' value='" . $r['PB'] . "'>
                    <input type='hidden' name='Comp' value='" . $r['company'] . "'>
                    <input type='hidden' name='Type' value='" . $r['type'] . "'>
                    <input type='hidden' name='Demo' value='" . $r['demo'] . "'>
                    <button type='submit' class=' btn-link'>Update</button>
                </form>
            </td>";
            echo "<td>
                <form action='drugs/updatedrugs.php' method='GET'>
                    <input type='hidden' name='Drug_ID' value='" . $r['drug_id'] . "'>
                    <input type='hidden' name='Drug_Name' value='" . $r['drug_name'] . "'>
                    <input type='hidden' name='Ingredient' value='" . $r['ingredient'] . "'>
                    <input type='hidden' name='Tablet_PB' value='" . $r['PB'] . "'>
                    <input type='hidden' name='Comp' value='" . $r['company'] . "'>
                    <input type='hidden' name='Type' value='" . $r['type'] . "'>
                    <input type='hidden' name='Demo' value='" . $r['demo'] . "'>
                    <button type='submit' class=' btn-link'>Delete</button>
                </form>
              </td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
} else {
    echo "<div class='alerts' style = 'color:red;'>No records found.</div>";  
}
?>
