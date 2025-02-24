CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `drugwholesale`.`main` AS
    SELECT 
        `drugwholesale`.`inventory`.`Inventory_ID` AS `Inventory_ID`,
        `drugwholesale`.`drugs`.`Drug_ID` AS `Drug_ID`,
        `drugwholesale`.`drugs`.`Drug_Name` AS `drug_name`,
        `drugwholesale`.`inventory`.`Expiration` AS `Expiration`,
        `drugwholesale`.`drugs`.`Ingredient` AS `Ingredient`,
        `drugwholesale`.`inventory`.`Price` AS `Price`,
        `drugwholesale`.`inventory`.`Cost` AS `Cost`,
        `drugwholesale`.`inventory`.`Initial_Amount` AS `Initial_Amount`,
        `drugwholesale`.`inventory`.`Amount_Left` AS `Amount_Left`
    FROM
        (`drugwholesale`.`inventory`
        JOIN `drugwholesale`.`drugs` ON ((`drugwholesale`.`inventory`.`Drug_ID` = `drugwholesale`.`drugs`.`Drug_ID`)))