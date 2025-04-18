SELECT * FROM drugwholesale.sales;
use drugwholesale;

create View Debtors as select
customer.customer_shop,
sales.total_price,
sales.amount_received,
(sales.total_price - sales.amount_received) as balance
from
customer
right join
sales
on
customer.customer_id = sales.customer_id
where
(sales.total_price - sales.amount_received) !=0;

select * from debtors;

use drugwholesale;
create view view_Inventory as select inventory.inventory_id, inventory.drug_id, drugs.drug_name, inventory.expiration, inventory.cost, inventory.price, inventory.initial_amount
from inventory
left join drugs
on drugs.drug_id = inventory.drug_id;

CREATE VIEW InventoryStockStatus AS
SELECT 
    inventory.Inventory_ID,
    inventory.Drug_ID,
    drugs.Drug_Name,
    inventory.Initial_Amount,
    (inventory.Initial_Amount - COALESCE(SUM(sales.Quantity), 0)) AS Remaining_Stock
FROM 
    inventory
LEFT JOIN 
    sales
ON 
    inventory.Inventory_ID = sales.Inventory_ID
LEFT JOIN 
    drugs
ON 
    inventory.Drug_ID = drugs.Drug_ID
GROUP BY 
    inventory.Inventory_ID, 
    inventory.Drug_ID, 
    drugs.Drug_Name, 
    inventory.Initial_Amount;
    
    select * from InventoryStockStatus;

CREATE VIEW Debtors AS
SELECT
    customer.customer_shop,
    SUM(sales.total_price) AS total_debt,
    SUM(sales.amount_received) AS total_received,
    SUM(sales.total_price - sales.amount_received) AS total_balance
FROM
    customer
RIGHT JOIN
    sales
ON
    customer.customer_id = sales.customer_id
WHERE
    (sales.total_price - sales.amount_received) != 0
GROUP BY
    customer.customer_shop;
    
select * from Debtors;
