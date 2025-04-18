CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `main` AS
    SELECT 
        `drugs`.`Drug_Name` AS `drug_name`,
        `drugs`.`Ingredient` AS `Ingredient`,
        `inventory`.`Price` AS `Price`,
        `inventory`.`Expiration` AS `Expiration`,
        `inventory`.`Stock` AS `Stock`
    FROM
        (`inventory`
        JOIN `drugs` ON (`inventory`.`Drug_ID` = `drugs`.`Drug_ID`))