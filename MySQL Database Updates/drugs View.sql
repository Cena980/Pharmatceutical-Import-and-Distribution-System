CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `drugwholesale`.`drugs_view` AS
    SELECT 
        `drugwholesale`.`drugs`.`Drug_ID` AS `drug_id`,
        `drugwholesale`.`drugs`.`Drug_Name` AS `drug_name`,
        `drugwholesale`.`drugs`.`Ingredient` AS `ingredient`,
        `drugwholesale`.`drugs`.`Tablet_PB` AS `PB`,
        `drugwholesale`.`companies`.`Comp_Name` AS `company`,
        `drugwholesale`.`drug_type`.`Drug_Type` AS `type`,
        `drugwholesale`.`demography`.`Demo_Class` AS `demo`,
        `drugwholesale`.`inventory`.`Expiration` AS `expiration`,
        `drugwholesale`.`inventory`.`Amount_Left` AS `amount`,
        `drugwholesale`.`inventory`.`Cost` AS `cost`
    FROM
        ((((`drugwholesale`.`drugs`
        LEFT JOIN `drugwholesale`.`companies` ON ((`drugwholesale`.`drugs`.`Comp_ID` = `drugwholesale`.`companies`.`Comp_ID`)))
        LEFT JOIN `drugwholesale`.`drug_type` ON ((`drugwholesale`.`drugs`.`Type_ID` = `drugwholesale`.`drug_type`.`Type_ID`)))
        LEFT JOIN `drugwholesale`.`demography` ON ((`drugwholesale`.`drugs`.`Demo_ID` = `drugwholesale`.`demography`.`Demo_ID`)))
        LEFT JOIN `drugwholesale`.`inventory` ON ((`drugwholesale`.`drugs`.`Drug_ID` = `drugwholesale`.`inventory`.`Drug_ID`)))