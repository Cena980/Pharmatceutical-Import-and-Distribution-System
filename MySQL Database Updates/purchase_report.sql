CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `drugwholesale`.`purchase_report` AS
    SELECT 
        `drugwholesale`.`drugs`.`Drug_Name` AS `Drug_Name`,
        `drugwholesale`.`vendors`.`name` AS `Vendor_Name`,
        `drugwholesale`.`purchases`.`purchase_id` AS `purchase_ID`,
        `drugwholesale`.`purchases`.`price` AS `price`,
        `drugwholesale`.`purchases`.`quantity` AS `quantity`,
        `drugwholesale`.`purchases`.`Discount` AS `discount`,
        `drugwholesale`.`purchases`.`total_amount` AS `total_amount`,
        `drugwholesale`.`purchases`.`amount_paid` AS `amount_paid`
    FROM
        ((`drugwholesale`.`purchases`
        JOIN `drugwholesale`.`drugs` ON ((`drugwholesale`.`purchases`.`drug_id` = `drugwholesale`.`drugs`.`Drug_ID`)))
        JOIN `drugwholesale`.`vendors` ON ((`drugwholesale`.`purchases`.`vendor_id` = `drugwholesale`.`vendors`.`vendor_id`)))