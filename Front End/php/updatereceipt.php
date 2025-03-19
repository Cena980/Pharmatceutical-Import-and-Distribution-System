<?php
    include 'connection.php';

    // Retrieve and sanitize input values
    $date = $_POST['Date_1'];
    $Currency_ID = $_POST['currency'];
    $customerID = $_POST['Customer_Shop_1'];
    $old_balance = $_POST['customer_balance_1'];
    $note = $_POST['note'];
    $amount = $_POST['Amount_Received_1'];
    $c_rate = $_POST['conversion_rate'];
    $officer = $_POST['Sales_Officer'];
    $receipt_ID = $_POST['receipt'];

    // Calculate new balance
    $new_balance = $old_balance - $amount;

    // Prepare the update statement
    $sql = "UPDATE receipt 
            SET payment_date = ?, 
                currency_id = ?, 
                customer_id = ?, 
                old_balance = ?, 
                new_balance = ?, 
                payment_amount = ?, 
                recorded_by = ?, 
                notes = ? 
            WHERE receipt_id = ?";

    if ($stmt = mysqli_prepare($connect, $sql)) {
        // Bind parameters (date, string, int, double, double, double, string, string, int)
        mysqli_stmt_bind_param($stmt, "sisdddsdi", $date, $Currency_ID, $customerID, $old_balance, $new_balance, $amount, $officer, $note, $receipt_ID);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            echo "Record has been updated successfully";
            #update Customer Balance
            $sql = "UPDATE customer SET balance = ? WHERE customer_id = ?";
            $stmt = $connect->prepare($sql);
            $stmt->bind_param("di", $new_balance, $customerID);

            if ($stmt->execute()) {
                // echo "balance updated successfully!";
                $customer_name = "SELECT balance FROM customer WHERE customer_id = '$customerID'";
                $customer_name_results = mysqli_query($connect, $customer_name);
                
                if ($customer_name_results && mysqli_num_rows($customer_name_results) > 0) {
                    $customer_name_row = mysqli_fetch_assoc($customer_name_results);
                    $Balance_Current = $customer_name_row['balance'];
                    echo "New Balance is: $Balance_Current";
                } else {
                    $Balance_Current = 0;
                }
            } else {
                echo "Error: " . $stmt->error;
            }
        } else {
            echo "Failed to update record: " . mysqli_stmt_error($stmt);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
        
    } else {
        echo "Failed to prepare statement: " . mysqli_error($connect);
    }

    // Close the database connection
    mysqli_close($connect);
?>
