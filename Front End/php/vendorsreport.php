<?php

    include 'connection.php';
    $query = "select * from vendors order by name asc";
    $res = mysqli_query($connect, $query);

    $num_rows = mysqli_num_rows($res);
    if($num_rows>0){
        echo "<div class='alerts'>". $num_rows. " Records</div>";
        echo "<table border='1' id='tblreport'>";
        echo "<thead><tr>
                    <th data-key='vendor-id'>Vendor ID</th>
                    <th data-key='name'>Name</th>
                    <th data-key='country'>Drug Made</th>
                    <th data-key='address'>Address</th>
                    <th data-key='phone'>Phone</th>
                    <th data-key='email'>Email</th>
                    <th data-key='payment-terms'>Payment Terms</th>
                    <th data-key='debt'>Debt</th>
                    <th data-key='note'>Note</th>
                    <th data-key='actions' colspan='2'>Actions</th>
                </tr></thead></tbody>";
        while ($r = mysqli_fetch_assoc($res)) {
            echo "<tr>";
            echo "<td>" . $r['vendor_id'] . "</td>";
            echo "<td>" . $r['name'] . "</td>";
            echo "<td>" . $r['drug_type'] . "</td>";
            echo "<td>" . $r['address'] . "</td>";
            echo "<td>" . $r['phone_number'] . "</td>";
            echo "<td>" . $r['email'] . "</td>";
            echo "<td>" . $r['payment_terms'] . "</td>";
            echo "<td>" . $r['Debt'] . "</td>";
            echo "<td>" . $r['notes'] . "</td>";
            echo "<td>
            <form action='updatevendors.php' method='GET'>
                <input type='hidden' name='vendor_id' value='" . $r['vendor_id'] . "'>
                <input type='hidden' name='name' value='" . $r['name'] . "'>
                <input type='hidden' name='drug_type' value='" . $r['drug_type'] . "'>
                <input type='hidden' name='address' value='" . $r['address'] . "'>
                <input type='hidden' name='phone_number' value='" . $r['phone_number'] . "'>
                <input type='hidden' name='email' value='" . $r['email'] . "'>
                <input type='hidden' name='payment_terms' value='" . $r['payment_terms'] . "'>
                <input type='hidden' name='Debt' value='" . $r['Debt'] . "'>
                <input type='hidden' name='notes' value='" . $r['notes'] . "'>

                <button data-key='update-button' type='submit' class=' btn-link'>Update</button>
            </form>
          </td>";
            echo "<td>
            <form action='updatevendors.php' method='GET'>
                <input type='hidden' name='vendor_id' value='" . $r['vendor_id'] . "'>
                <input type='hidden' name='name' value='" . $r['name'] . "'>
                <input type='hidden' name='drug_type' value='" . $r['drug_type'] . "'>
                <input type='hidden' name='address' value='" . $r['address'] . "'>
                <input type='hidden' name='phone_number' value='" . $r['phone_number'] . "'>
                <input type='hidden' name='email' value='" . $r['email'] . "'>
                <input type='hidden' name='payment_terms' value='" . $r['payment_terms'] . "'>
                <input type='hidden' name='Debt' value='" . $r['Debt'] . "'>
                <input type='hidden' name='notes' value='" . $r['notes'] . "'>
                <button data-key='delete-button' type='submit' class=' btn-link'>Delete</button>
            </form>
          </td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "No records found.";  
    }
?>