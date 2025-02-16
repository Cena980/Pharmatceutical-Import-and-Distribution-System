SELECT * FROM drugwholesale.inventory;

UPDATE inventory
SET 
    Initial_Amount = Initial_Amount + ABS(Amount_Left),
    Amount_Left = 0
WHERE 
    Amount_Left < 0 and inventory_id > 1;