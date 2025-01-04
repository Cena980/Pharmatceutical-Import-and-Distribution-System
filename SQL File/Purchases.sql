SELECT * FROM drugwholesale.purchases;

CREATE VIEW VendorDebts AS
SELECT
    purchases.purchase_id,
    purchases.vendor_id,
    vendors.name AS vendor_name,
    drugs.drug_name,
    purchases.total_amount,
    purchases.amount_paid,
    (purchases.total_amount - purchases.amount_paid) AS balance
FROM
    purchases
LEFT JOIN
    vendors
ON
    purchases.vendor_id = vendors.vendor_id
LEFT JOIN
    drugs
ON
    purchases.drug_id = drugs.drug_id
WHERE
    (purchases.total_amount - purchases.amount_paid) != 0;

select * from vendordebts;