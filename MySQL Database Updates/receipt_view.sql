CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `drugwholesale`.`receipt_view` AS
    SELECT 
        `drugwholesale`.`receipt`.`receipt_id` AS `receipt_id`,
        `drugwholesale`.`receipt`.`customer_id` AS `customer_id`,
        `drugwholesale`.`customer`.`customer_shop` AS `customer_shop`,
        `drugwholesale`.`receipt`.`payment_amount` AS `payment_amount`,
        `drugwholesale`.`receipt`.`old_balance` AS `old_balance`,
        `drugwholesale`.`receipt`.`new_balance` AS `new_balance`,
        `drugwholesale`.`receipt`.`payment_date` AS `payment_date`,
        `drugwholesale`.`receipt`.`recorded_by` AS `recorded_by`,
        `drugwholesale`.`receipt`.`notes` AS `notes`,
        `drugwholesale`.`currency`.`currency_code` AS `currency_code`,
        `drugwholesale`.`currency`.`currency_id` AS `currency_id`
    FROM
        ((`drugwholesale`.`receipt`
        LEFT JOIN `drugwholesale`.`currency` ON ((`drugwholesale`.`receipt`.`currency_id` = `drugwholesale`.`currency`.`currency_id`)))
        JOIN `drugwholesale`.`customer` ON ((`drugwholesale`.`receipt`.`customer_id` = `drugwholesale`.`customer`.`customer_id`)))