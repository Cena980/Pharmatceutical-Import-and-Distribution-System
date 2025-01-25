<?php
include 'connection.php';
$query = $_POST['query'];

$sql = "SELECT drug_name, Price, Initial_Amount, Amount_Left FROM main WHERE drug_name LIKE '%$query%'";
$res = mysqli_query($connect, $sql);

$num_rows = mysqli_num_rows($res);
if($num_rows>0){
    echo "<table border='1' id='tblreport'>";
    echo "<tr>
                <th>Drug Name</th><th>Price</th><th>Initial Amount</th><th>Amount Left</th>
            </tr>";
    while ($r = mysqli_fetch_assoc($res)) {
        echo "<tr>";
        echo "<td>" . $r['drug_name'] . "</td>";
        echo "<td>" . $r['Price'] . "</td>";
        echo "<td>" . $r['Initial_Amount'] . "</td>";
        echo "<td>" . $r['Amount_Left'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No records found.";  
}
?>
