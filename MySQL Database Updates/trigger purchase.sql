SELECT * FROM drugwholesale.purchases;

DELIMITER //

CREATE TRIGGER after_purchase_update
AFTER UPDATE ON purchases
FOR EACH ROW
BEGIN
    DECLARE existing_inventory INT;

    -- Revert the old purchase quantities from inventory
    UPDATE inventory
    SET Initial_Amount = Initial_Amount - OLD.quantity,
        Amount_Left = Amount_Left - OLD.quantity
    WHERE Drug_ID = OLD.drug_id AND Expiration = OLD.Expiration;

    -- Check if an inventory with the same drug_id and expiration exists for the new values
    SELECT Inventory_ID INTO existing_inventory
    FROM inventory
    WHERE Drug_ID = NEW.drug_id AND Expiration = NEW.Expiration
    LIMIT 1;

    IF existing_inventory IS NOT NULL THEN
        -- Scenario 1: Update existing inventory with new values
        UPDATE inventory
        SET Cost = NEW.price,
            Initial_Amount = Initial_Amount + NEW.quantity,
            Amount_Left = Amount_Left + NEW.quantity
        WHERE Inventory_ID = existing_inventory;

    ELSE
        -- Check if an inventory with the same drug_id exists but amount_left is 0
        SELECT Inventory_ID INTO existing_inventory
        FROM inventory
        WHERE Drug_ID = NEW.drug_id AND Amount_Left = 0
        LIMIT 1;

        IF existing_inventory IS NOT NULL THEN
            -- Scenario 2: Replace expiration and cost, and update quantities
            UPDATE inventory
            SET Expiration = NEW.Expiration,
                Cost = NEW.price,
                Initial_Amount = Initial_Amount + NEW.quantity,
                Amount_Left = Amount_Left + NEW.quantity
            WHERE Inventory_ID = existing_inventory;

        ELSE
            -- Scenario 3: Insert a new inventory row
            INSERT INTO inventory (Drug_ID, Cost, Expiration, Initial_Amount, Amount_Left)
            VALUES (NEW.drug_id, NEW.price, NEW.Expiration, NEW.quantity, NEW.quantity);
        END IF;
    END IF;
END; //

DELIMITER ;

DELIMITER //

CREATE TRIGGER after_purchase_delete
AFTER DELETE ON purchases
FOR EACH ROW
BEGIN
    -- Revert the deleted purchase quantities from inventory
    UPDATE inventory
    SET Initial_Amount = Initial_Amount - OLD.quantity,
        Amount_Left = Amount_Left - OLD.quantity
    WHERE Drug_ID = OLD.drug_id AND Expiration = OLD.Expiration;

    -- Optional: Delete the inventory row if Amount_Left becomes 0
    DELETE FROM inventory
    WHERE Drug_ID = OLD.drug_id AND Amount_Left = 0;
END; //

DELIMITER ;