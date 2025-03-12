<?php
    include 'connection.php';

    // Start transaction
mysqli_begin_transaction($connect);

try {
    $date=$_POST['Date_1'];
    if (isset($_POST['Date_1'])) {
        $Date = new DateTime($_POST['Date_1']); // Get the posted date
        $Date->modify('+7 days'); // Add 7 days to the date
        $dueDate = $Date->format('Y-m-d'); // Format the new date
    }

    $customer_shop = $_POST['Customer_Shop_1'];
    $Sales_Officer= $_POST['Sales_Officer'] ?? '';
    // Validate input
    $invoice_ID = isset($_POST['invoice_id']) ? intval($_POST['invoice_id']) : null;
    if (!$invoice_ID) throw new Exception("Missing invoice ID");

    // 1. Fetch original invoice data
    $invoice_query = "SELECT * FROM invoices WHERE invoice_id = ?";
    $stmt = $connect->prepare($invoice_query);
    $stmt->bind_param("i", $invoice_ID);
    $stmt->execute();
    $invoice = $stmt->get_result()->fetch_assoc();
    if (!$invoice) throw new Exception("Invoice not found");

    // 2. Get original sales records
    $sales_query = "SELECT * FROM sales WHERE invoice_no = ?";
    $stmt = $connect->prepare($sales_query);
    $stmt->bind_param("i", $invoice_ID);
    $stmt->execute();
    $existing_sales = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

    // 3. Restore inventory and calculate original values
    $original_total = $invoice['total_sales'];
    $original_received = $invoice['received'];
    $customerID = $invoice['customer_id'];
    $Owed = $invoice['owed'];

    // 4. Reverse original balance impact (corrected)
    $balance_query = "UPDATE customer 
    SET balance = balance - ?
    WHERE customer_id = ?";
    $stmt = $connect->prepare($balance_query);
    // Correct parameter order: original_total, original_received
    $stmt->bind_param("di",  $owed, $customerID);
    


    // 5. Delete old sales records
    $delete_query = "DELETE FROM sales WHERE invoice_no = ?";
    $stmt = $connect->prepare($delete_query);
    $stmt->bind_param("i", $invoice_ID);
    if (!$stmt->execute()) {
        throw new Exception("Failed to clear old sales records");
    }

    // 6. Process new sales data
    $rowCount = intval($_POST['qnt']);

    for ($i = 1; $i <= $rowCount; $i++) {
        // Input validation
        $required = ["Drug_Name_$i", "Quantity_$i", "Price_$i", "Total_$i"];
        foreach ($required as $field) {
            if (empty($_POST[$field])) {
                throw new Exception("Missing required field in row $i");
            }
        }

        // Inventory check
        $drugName = $_POST["Drug_Name_$i"];
        $quantity = intval($_POST["Quantity_$i"]);
        // Get inventory ID with prepared statement
        $inv_query = "SELECT i.Inventory_ID 
                     FROM inventory i
                     JOIN drugs d ON i.Drug_ID = d.Drug_ID
                     WHERE d.Drug_Name = ?";
        $stmt = $connect->prepare($inv_query);
        $stmt->bind_param("s", $drugName);
        $stmt->execute();
        $invResult = $stmt->get_result();
        
        if ($invResult->num_rows === 0) {
            throw new Exception("Inventory not found for $drugName");
        }
        $invRow = $invResult->fetch_assoc();
        $Inventory_ID = $invRow['Inventory_ID'];
    }

    // Deleting Invoice
    $update_invoice = "delete from invoices
                       WHERE invoice_id = ?";
    $stmt = $connect->prepare($update_invoice);
    $stmt->bind_param("i",
        $invoice_ID
    );
    
    if (!$stmt->execute()) {
        throw new Exception("Invoice deletion failed: " . $stmt->error);
    }

    // Commit transaction
    mysqli_commit($connect);

    // Display success
    echo "<div class='alerts'>Deletion successful!</div>";
    
    } catch (Exception $e) {
        mysqli_rollback($connect);
        echo "<div class='alerts'>Error: " . $e->getMessage() . "</div>";
    }
?>