CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `sales_view` AS
    SELECT 
        `s`.`Sales_ID` AS `Sales_ID`,
        `s`.`Inventory_ID` AS `Inventory_ID`,
        `d`.`Drug_Name` AS `drug_name`,
        `s`.`Sale_Date` AS `Sale_Date`,
        `s`.`Quantity` AS `Quantity`,
        `s`.`Discount` AS `Discount`,
        `s`.`Price` AS `Price`,
        `s`.`Cut_ID` AS `Cut_ID`,
        `c`.`customer_shop` AS `Customer`,
        `s`.`Total_Price` AS `Total_Price`,
        `s`.`Note` AS `Note`,
        `s`.`invoice_no` AS `invoice_no`
    FROM
        (((`sales` `s`
        JOIN `inventory` `i` ON ((`s`.`Inventory_ID` = `i`.`Inventory_ID`)))
        JOIN `drugs` `d` ON ((`i`.`Drug_ID` = `d`.`Drug_ID`)))
        JOIN `customer` `c` ON ((`s`.`Customer_ID` = `c`.`customer_id`)))
    ORDER BY `s`.`Sales_ID`