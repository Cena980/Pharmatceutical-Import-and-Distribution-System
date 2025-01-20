CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `drugwholesale`.`sales_bill` AS
    SELECT 
        `drugwholesale`.`drug_type`.`Drug_Type` AS `Drug_Type`,
        `drugwholesale`.`drugs`.`Drug_Name` AS `Drug_Name`,
        `drugwholesale`.`sales`.`Quantity` AS `Quantity`,
        `drugwholesale`.`sales`.`Price` AS `Price`,
        `drugwholesale`.`sales`.`Discount` AS `Discount`,
        `drugwholesale`.`sales`.`Total_Price` AS `Total_Price`,
        `drugwholesale`.`sales`.`Amount_Received` AS `Amount_Received`,
        `drugwholesale`.`sales`.`invoice_no` AS `invoice_no`,
        `drugwholesale`.`customer`.`customer_name` AS `customer_name`,
        `drugwholesale`.`customer`.`balance` AS `balance`
    FROM
        ((((`drugwholesale`.`sales`
        JOIN `drugwholesale`.`inventory` ON ((`drugwholesale`.`sales`.`Inventory_ID` = `drugwholesale`.`inventory`.`Inventory_ID`)))
        JOIN `drugwholesale`.`drugs` ON ((`drugwholesale`.`inventory`.`Drug_ID` = `drugwholesale`.`drugs`.`Drug_ID`)))
        JOIN `drugwholesale`.`customer` ON ((`drugwholesale`.`sales`.`Customer_ID` = `drugwholesale`.`customer`.`customer_id`)))
        JOIN `drugwholesale`.`drug_type` ON ((`drugwholesale`.`drugs`.`Type_ID` = `drugwholesale`.`drug_type`.`Type_ID`)))