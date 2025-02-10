CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `drugwholesale`.`invoice` AS
    SELECT 
        `drugwholesale`.`invoices`.`invoice_id` AS `invoice_id`,
        `drugwholesale`.`invoices`.`customer_id` AS `customer_id`,
        `drugwholesale`.`customer`.`customer_shop` AS `customer_shop`,
        `drugwholesale`.`invoices`.`note` AS `note`,
        `drugwholesale`.`invoices`.`date` AS `date`,
        `drugwholesale`.`invoices`.`sales_officer` AS `sales_officer`,
        `drugwholesale`.`invoices`.`received` AS `received`,
        `drugwholesale`.`invoices`.`owed` AS `owed`,
        `drugwholesale`.`invoices`.`total_sales` AS `total_sales`,
        `drugwholesale`.`invoices`.`sales_data` AS `sales_data`
    FROM
        (`drugwholesale`.`invoices`
        LEFT JOIN `drugwholesale`.`customer` ON ((`drugwholesale`.`invoices`.`customer_id` = `drugwholesale`.`customer`.`customer_id`)))
    ORDER BY `drugwholesale`.`invoices`.`date` DESC