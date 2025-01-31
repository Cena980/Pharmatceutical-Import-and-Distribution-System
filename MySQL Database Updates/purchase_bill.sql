CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `drugwholesale`.`purchase_bill` AS
    SELECT 
        `dt`.`Drug_Type` AS `Type`,
        `d`.`Drug_Name` AS `Drug_Name`,
        `p`.`quantity` AS `Quantity`,
        `p`.`price` AS `Price`,
        `p`.`Discount` AS `Discount`,
        `p`.`total_amount` AS `Total_Price`,
        `p`.`po_id` AS `po_id`,
        `po`.`po_date` AS `Purchase_Date`,
        `po`.`Remaining_Debt` AS `Remaining_Debt`,
        `v`.`name` AS `Vendor_Name`
    FROM
        ((((`drugwholesale`.`purchases` `p`
        JOIN `drugwholesale`.`purchase order` `po` ON ((`p`.`po_id` = `po`.`po_id`)))
        JOIN `drugwholesale`.`drugs` `d` ON ((`p`.`drug_id` = `d`.`Drug_ID`)))
        JOIN `drugwholesale`.`vendors` `v` ON ((`p`.`vendor_id` = `v`.`vendor_id`)))
        JOIN `drugwholesale`.`drug_type` `dt` ON ((`d`.`Type_ID` = `dt`.`Type_ID`)))