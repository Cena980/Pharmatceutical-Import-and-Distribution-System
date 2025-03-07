SELECT * FROM drugwholesale.sales;
use drugwholesale;
UPDATE sales
SET amount_received = 0
WHERE customer_id != 0 
  AND amount_received is null;
  
call UpdatePayment(1, 199530);

Select * from sales where customer_id = 4;
select sum(total_price), sum(amount_received), sum(total_price) - sum(amount_received) 
as total_debt from sales
where customer_id = 1;
select * from sales where customer_id = 1 and amount_received = 0 and sale_date = '2025-01-09' and sales_id >= 34760;


drop procedure UpdatePayment;
DELIMITER $$

CREATE PROCEDURE UpdatePayment (
    IN p_customer_id INT,
    IN p_payment_amount DECIMAL(10, 2)
)
BEGIN
    DECLARE remaining_amount DECIMAL(10, 2);
    DECLARE current_payment DECIMAL(10, 2);
    DECLARE v_id INT;
    DECLARE v_total_price DECIMAL(10, 2);
    DECLARE v_amount_received DECIMAL(10, 2);
    DECLARE no_more_rows BOOLEAN DEFAULT FALSE;

    -- Cursor to iterate over unpaid or partially paid sales
    DECLARE sales_cursor CURSOR FOR 
        SELECT sales_id, total_price, amount_received 
        FROM sales 
        WHERE customer_id = p_customer_id AND amount_received < total_price 
        ORDER BY sale_date; -- Process oldest sales first (or modify the order as needed)

    -- Declare a handler for the end of the cursor
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET no_more_rows = TRUE;

    -- Initialize the remaining payment amount
    SET remaining_amount = p_payment_amount;

    -- Open the cursor
    OPEN sales_cursor;

    sales_loop: LOOP
        -- Fetch the next row
        FETCH sales_cursor INTO v_id, v_total_price, v_amount_received;

        -- Exit the loop if there are no more rows
        IF no_more_rows THEN
            LEAVE sales_loop;
        END IF;

        -- Calculate payment for the current record
        SET current_payment = LEAST(v_total_price - v_amount_received, remaining_amount);

        -- Update the sales record
        UPDATE sales
        SET amount_received = amount_received + current_payment
        WHERE sales_id = v_id;

        -- Deduct the payment from the remaining amount
        SET remaining_amount = remaining_amount - current_payment;

        -- Exit the loop if the payment is fully allocated
        IF remaining_amount <= 0 THEN
            LEAVE sales_loop;
        END IF;
    END LOOP;

    -- Close the cursor
    CLOSE sales_cursor;
END$$

DELIMITER ;

DELIMITER $$

CREATE PROCEDURE AddSalesRecord(
    IN p_sale_date DATE,
    IN p_customer_id INT,
    IN p_sales_list JSON
)
BEGIN
    DECLARE saleIndex INT DEFAULT 0;
    DECLARE totalSales INT DEFAULT JSON_LENGTH(p_sales_list);
    DECLARE p_inventory_id INT;
    DECLARE p_quantity INT;
    DECLARE p_price DECIMAL(10, 2);
    DECLARE p_discount DECIMAL(10, 2) DEFAULT NULL;
    DECLARE p_amount_received DECIMAL(10, 2) DEFAULT NULL;
    DECLARE p_total_price DECIMAL(10, 2);

    WHILE saleIndex < totalSales DO
        -- Extract fields from the JSON sales list
        SET p_inventory_id = JSON_UNQUOTE(JSON_EXTRACT(p_sales_list, CONCAT('$[', saleIndex, '].inventory_id')));
        SET p_quantity = JSON_UNQUOTE(JSON_EXTRACT(p_sales_list, CONCAT('$[', saleIndex, '].quantity')));
        SET p_price = JSON_UNQUOTE(JSON_EXTRACT(p_sales_list, CONCAT('$[', saleIndex, '].price')));
        SET p_discount = JSON_UNQUOTE(JSON_EXTRACT(p_sales_list, CONCAT('$[', saleIndex, '].discount')));
        SET p_amount_received = JSON_UNQUOTE(JSON_EXTRACT(p_sales_list, CONCAT('$[', saleIndex, '].amount_received')));

        -- Calculate total price
        SET p_total_price = ((p_quantity * p_price) - p_discount);

        -- Insert record into the sales table
        INSERT INTO sales (
            inventory_id, 
            sale_date, 
            quantity, 
            discount, 
            price, 
            customer_id, 
            total_price, 
            amount_received
        )
        VALUES (
            p_inventory_id,
            p_sale_date,
            p_quantity,
            p_discount,
            p_price,
            p_customer_id,
            p_total_price,
            p_amount_received
        );

        -- Move to the next sale in the JSON array
        SET saleIndex = saleIndex + 1;
    END WHILE;
END$$

DELIMITER ;

drop procedure AddSalesRecord;

DELIMITER $$

CREATE PROCEDURE AddSalesRecord(
    IN p_sale_date DATE,
    IN p_customer_id INT,
    IN p_total_paid DECIMAL(10, 2),
    IN p_sales_list JSON
)
BEGIN
    -- Variables for processing sales list
    DECLARE saleIndex INT DEFAULT 0;
    DECLARE totalSales INT DEFAULT JSON_LENGTH(p_sales_list);
    DECLARE p_inventory_id INT;
    DECLARE p_quantity INT;
    DECLARE p_price DECIMAL(10, 2);
    DECLARE p_discount DECIMAL(10, 2) DEFAULT NULL;
    DECLARE p_cut_id INT DEFAULT NULL;
    DECLARE p_note TEXT DEFAULT NULL;
    DECLARE p_total_price DECIMAL(10, 2);

    -- Variables for payment distribution
    DECLARE remaining_payment DECIMAL(10, 2) DEFAULT p_total_paid;
    DECLARE current_sale_id INT;
    DECLARE current_total_price DECIMAL(10, 2);
    DECLARE current_amount_received DECIMAL(10, 2);
    DECLARE owed_amount DECIMAL(10, 2);

    -- Cursor for payment distribution
    DECLARE sales_cursor CURSOR FOR
        SELECT s.Sales_ID, s.Total_Price, s.Amount_Received
        FROM sales s
        INNER JOIN temp_sales_ids t ON s.Sales_ID = t.Sales_ID
        ORDER BY s.Sales_ID;

    -- Handler for end of cursor
    DECLARE CONTINUE HANDLER FOR NOT FOUND CLOSE sales_cursor;

    -- Create temporary table to track new sales
    CREATE TEMPORARY TABLE temp_sales_ids (
        Sales_ID INT PRIMARY KEY
    );

    -- Insert new sales records
    WHILE saleIndex < totalSales DO
        -- Extract fields from the JSON sales list
        SET p_inventory_id = JSON_UNQUOTE(JSON_EXTRACT(p_sales_list, CONCAT('$[', saleIndex, '].inventory_id')));
        SET p_quantity = JSON_UNQUOTE(JSON_EXTRACT(p_sales_list, CONCAT('$[', saleIndex, '].quantity')));
        SET p_price = JSON_UNQUOTE(JSON_EXTRACT(p_sales_list, CONCAT('$[', saleIndex, '].price')));
        SET p_discount = JSON_UNQUOTE(JSON_EXTRACT(p_sales_list, CONCAT('$[', saleIndex, '].discount')));
        SET p_cut_id = JSON_UNQUOTE(JSON_EXTRACT(p_sales_list, CONCAT('$[', saleIndex, '].cut_id')));
        SET p_note = JSON_UNQUOTE(JSON_EXTRACT(p_sales_list, CONCAT('$[', saleIndex, '].note')));

        -- Fetch price from inventory table if not provided
        IF p_price IS NULL THEN
            SELECT price INTO p_price
            FROM inventory
            WHERE inventory_id = p_inventory_id;

            IF p_price IS NULL THEN
                SIGNAL SQLSTATE '45000'
                SET MESSAGE_TEXT = 'Price not found for the provided inventory_id';
            END IF;
        END IF;

        -- Calculate total price
        SET p_total_price = (p_quantity * p_price) - IFNULL(p_discount, 0);

        -- Insert record into the sales table
        INSERT INTO sales (
            inventory_id, 
            sale_date, 
            quantity, 
            discount, 
            price, 
            customer_id, 
            total_price, 
            amount_received,
            cut_id,
            note
        )
        VALUES (
            p_inventory_id,
            p_sale_date,
            p_quantity,
            p_discount,
            p_price,
            p_customer_id,
            p_total_price,
            NULL,
            p_cut_id,
            p_note
        );

        -- Capture the inserted Sale_ID
        INSERT INTO temp_sales_ids (Sales_ID)
        VALUES (LAST_INSERT_ID());

        -- Move to the next sale in the JSON array
        SET saleIndex = saleIndex + 1;
    END WHILE;

    -- Distribute payment across current sales records
    OPEN sales_cursor;

    read_loop: LOOP
        -- Fetch the next sale
        FETCH sales_cursor INTO current_sale_id, current_total_price, current_amount_received;

        -- Exit if no remaining payment
        IF remaining_payment <= 0 THEN
            LEAVE read_loop;
        END IF;

        -- Calculate owed amount
        IF current_amount_received IS NULL THEN
            SET owed_amount = current_total_price;
        ELSE
            SET owed_amount = current_total_price - current_amount_received;
        END IF;

        -- Allocate payment to the current sale
        IF remaining_payment >= owed_amount THEN
            -- Fully pay this sale
            UPDATE sales
            SET Amount_Received = Total_Price
            WHERE Sales_ID = current_sale_id;

            -- Subtract owed amount from remaining payment
            SET remaining_payment = remaining_payment - owed_amount;
        ELSE
            -- Partially pay this sale
            UPDATE sales
            SET Amount_Received = IFNULL(Amount_Received, 0) + remaining_payment
            WHERE Sales_ID = current_sale_id;

            -- Remaining payment is now zero
            SET remaining_payment = 0;
            LEAVE read_loop;
        END IF;
    END LOOP;

    CLOSE sales_cursor;

    -- Drop the temporary table
    DROP TEMPORARY TABLE temp_sales_ids;
END$$

DELIMITER ;

use drugwholesale;
select * from sales;
DROP TABLE IF EXISTS temp_sales_ids;

CALL AddSalesRecord(
    '2025-01-08', 
    1,
    0,
'[{"inventory_id": 53, "quantity": 30},
  {"inventory_id": 150, "quantity": 100},
  {"inventory_id": 124, "quantity": 50},
  {"inventory_id": 325, "quantity": 5},
  {"inventory_id": 16, "quantity": 5},
  {"inventory_id": 184, "quantity": 10},
  {"inventory_id": 39, "quantity": 10},
  {"inventory_id": 175, "quantity": 20},
  {"inventory_id": 136, "quantity": 10},
  {"inventory_id": 104, "quantity": 60},
  {"inventory_id": 119, "quantity": 3},
  {"inventory_id": 326, "quantity": 12},
  {"inventory_id": 50, "quantity": 10},
  {"inventory_id": 34, "quantity": 20},
  {"inventory_id": 131, "quantity": 200},
  {"inventory_id": 168, "quantity": 40},
  {"inventory_id": 30, "quantity": 5},
  {"inventory_id": 98, "quantity": 60},
  {"inventory_id": 172, "quantity": 30},
  {"inventory_id": 219, "quantity": 10},
  {"inventory_id": 92, "quantity": 50},
  {"inventory_id": 81, "quantity": 24},
  {"inventory_id": 132, "quantity": 40},
  {"inventory_id": 180, "quantity": 10},
  {"inventory_id": 48, "quantity": 10},
  {"inventory_id": 25, "quantity": 10},
  {"inventory_id": 327, "quantity": 10},
  {"inventory_id": 87, "quantity": 60},
  {"inventory_id": 54, "quantity": 20},
  {"inventory_id": 101, "quantity": 10},
  {"inventory_id": 83, "quantity": 20},
  {"inventory_id": 328, "quantity": 50},
  {"inventory_id": 329, "quantity": 5},
  {"inventory_id": 67, "quantity": 20},
  {"inventory_id": 290, "quantity": 10},
  {"inventory_id": 36, "quantity": 50},
  {"inventory_id": 111, "quantity": 1},
  {"inventory_id": 122, "quantity": 40},
  {"inventory_id": 86, "quantity": 40},
  {"inventory_id": 330, "quantity": 50},
  {"inventory_id": 115, "quantity": 1},
  {"inventory_id": 331, "quantity": 5},
  {"inventory_id": 70, "quantity": 10},
  {"inventory_id": 6, "quantity": 40},
  {"inventory_id": 27, "quantity": 10},
  {"inventory_id": 332, "quantity": 30},
  {"inventory_id": 99, "quantity": 50},
  {"inventory_id": 203, "quantity": 50},
  {"inventory_id": 200, "quantity": 50},
  {"inventory_id": 333, "quantity": 5},
  {"inventory_id": 4, "quantity": 5},
  {"inventory_id": 14, "quantity": 20},
  {"inventory_id": 52, "quantity": 30},
  {"inventory_id": 74, "quantity": 30},
  {"inventory_id": 13, "quantity": 20},
  {"inventory_id": 130, "quantity": 10},
  {"inventory_id": 202, "quantity": 1},
  {"inventory_id": 321, "quantity": 20},
  {"inventory_id": 89, "quantity": 50},
  {"inventory_id": 80, "quantity": 66}]'
);
