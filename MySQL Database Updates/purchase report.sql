CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `drugwholesale`.`purchase_report` AS
    SELECT 
        `drugwholesale`.`purchases`.`purchase_id` AS `purchase_ID`,
        `drugwholesale`.`drugs`.`Drug_ID` AS `Drug_ID`,
        `drugwholesale`.`drugs`.`Drug_Name` AS `Drug_Name`,
        `drugwholesale`.`vendors`.`vendor_id` AS `Vendor_ID`,
        `drugwholesale`.`vendors`.`name` AS `Vendor_Name`,
        `drugwholesale`.`purchases`.`price` AS `price`,
        `drugwholesale`.`purchases`.`quantity` AS `quantity`,
        `drugwholesale`.`purchases`.`Discount` AS `discount`,
        `drugwholesale`.`purchases`.`selling_price` AS `selling_price`,
        `drugwholesale`.`purchases`.`Expiration` AS `expiration`,
        `drugwholesale`.`purchases`.`total_amount` AS `total_amount`,
        `drugwholesale`.`purchases`.`purchase_date` AS `purchase_date`,
        `drugwholesale`.`purchases`.`po_id` AS `po_id`
    FROM
        ((`drugwholesale`.`purchases`
        JOIN `drugwholesale`.`drugs` ON ((`drugwholesale`.`purchases`.`drug_id` = `drugwholesale`.`drugs`.`Drug_ID`)))
        JOIN `drugwholesale`.`vendors` ON ((`drugwholesale`.`purchases`.`vendor_id` = `drugwholesale`.`vendors`.`vendor_id`)))
    ORDER BY `drugwholesale`.`purchases`.`purchase_id` DESC