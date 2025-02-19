CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `drugwholesale`.`drug_sales_summary` AS
    SELECT 
        `d`.`Drug_Name` AS `drug_name`,
        `d`.`Ingredient` AS `Ingredient`,
        MAX(`i`.`Price`) AS `Price`,
        COALESCE(SUM(`s`.`Quantity`), 0) AS `total_sales`
    FROM
        ((`drugwholesale`.`drugs` `d`
        JOIN `drugwholesale`.`inventory` `i` ON ((`d`.`Drug_ID` = `i`.`Drug_ID`)))
        LEFT JOIN `drugwholesale`.`sales` `s` ON ((`i`.`Inventory_ID` = `s`.`Inventory_ID`)))
    GROUP BY `d`.`Drug_Name` , `d`.`Ingredient`