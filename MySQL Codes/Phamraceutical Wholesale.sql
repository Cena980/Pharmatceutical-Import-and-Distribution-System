
create database DrugWholesale;
use DrugWholesale;

create table Companies(
Comp_ID int primary key not null auto_increment,
Comp_Name varchar(255) not null,
Head_Quarters varchar(255),
Phone char(20) unique,
Email char(100) unique
);

create table Drug_Type(
Type_ID int primary key not null auto_increment,
Drug_Type varchar(255) not null
);

create table Demography(
Demo_ID int primary key not null auto_increment,
Demo_Class varchar(255) not null
);

create table Drugs(
Drug_ID int primary key not null auto_increment,
Comp_ID int not null,
Drug_Name varchar(255) not null,
Ingredient varchar(255) not null,
Expiration date,
Type_ID int,
Demo_ID int,
foreign key(Comp_ID) references Companies(Comp_ID),
foreign key(Type_ID) references Drug_Type(Type_ID),
foreign key(Demo_ID) references Demography(Demo_ID)
);
select * from Drugs;
alter table Drugs
Add column Tablet_PB int not null after Ingredient;

create table Inventory(
Inventory_ID int primary key not null auto_increment,
Drug_ID int not null,
Amount_Sold int,
Initial_Amount int,
Stock int,
foreign key(Drug_ID) references Drugs(Drug_ID)
);

create table Location(
Loc_ID int primary key not null auto_increment,
Area varchar(255) not null
);

create table Shareholders(
Share_ID int primary key not null auto_increment,
Holder_Name varchar(255) not null,
Phone char(20) unique
);

create table Share_Holding(
Share_HID int primary key not null auto_increment,
Share_ID int not null,
Comp_ID int not null,
Share_Percentage int not null,
foreign key(Share_ID) references Shareholders(Share_ID),
foreign key(Comp_ID) references Companies(Comp_ID)
);
use DrugWholesale;
alter table share_holding
add column Investment int after Share_Percentage;

create table Tax(
Tax_ID int primary key not null auto_increment,
Scale_Tax decimal(20,2) not null
);

create table Salary(
Salary_ID int primary key not null auto_increment,
Scale int not null,
Bonouses int,
Tax_ID int not null,
Post_TaxSal int,
foreign key(Tax_ID) references Tax(Tax_ID)
);

create table Job(
Job_ID int primary key not null auto_increment,
Job_Name varchar(255) not null,
Job_Description varchar(255)
);

create table Employees(
Emp_ID int primary key not null auto_increment,
Tazkira int not null,
Emp_Name varchar(255) not null,
Emp_Last_Name varchar(255) not null,
Job_ID int not null,
Salary_ID int not null,
foreign key(Job_ID) references Job(Job_ID),
foreign key(Salary_ID) references Salary(Salary_ID)
);

create table Emp_Cut(
Cut_ID int primary key not null auto_increment,
Emp_ID int not null,
Rate int not null,
Descript varchar(255),
foreign key(Emp_ID) references Employees(Emp_ID)
);

create table Sales(
Sales_ID int primary key not null auto_increment,
Drug_ID int not null,
Sale_Date date not null,
Quantity int not null,
Price int not null,
Cut_ID int,
Loc_ID int,
Revenue int,
foreign key(Cut_ID) references Emp_Cut(Cut_ID),
foreign key(Loc_ID) references Location(Loc_ID)
);

Alter table Sales
rename column Revenue to Total_Price;


alter table sales
add column Discount decimal(5,2) after Quantity;



-- Vendors Table
CREATE TABLE Vendors (
    vendor_id INT PRIMARY KEY not null,
    name VARCHAR(255) NOT NULL,
    contact_info TEXT,
    address TEXT,
    phone_number VARCHAR(50),
    email VARCHAR(255),
    payment_terms VARCHAR(100),
    notes TEXT
);



-- Purchases Table
CREATE TABLE Purchases (
    purchase_id INT PRIMARY KEY not null,
    vendor_id INT,
    drug_id INT not null,
    quantity INT,
    purchase_date DATE,
    total_amount DECIMAL(10, 2),
    FOREIGN KEY (vendor_id) REFERENCES Vendors(vendor_id),
    FOREIGN KEY (Drug_ID) REFERENCES drugs(Drug_ID)
);

CREATE TABLE ExpenseCategories (
    category_id INT PRIMARY KEY not null,
    category_name VARCHAR(255) NOT NULL,
    description TEXT
);

CREATE TABLE Expenses (
    expense_id INT PRIMARY KEY not null,
    category_id INT,
    vendor_id INT,
    amount DECIMAL(10, 2),
    expense_date DATE,
    description TEXT,
    FOREIGN KEY (category_id) REFERENCES ExpenseCategories(category_id),
    FOREIGN KEY (vendor_id) REFERENCES Vendors(vendor_id)
);

drop procedure GetBalanceSheet;

DELIMITER //


CREATE PROCEDURE GetBalanceSheet(IN start_date DATE)
BEGIN
    DECLARE totalSales DECIMAL(10, 2);
    DECLARE totalPurchases DECIMAL(10, 2);
    DECLARE totalExpenses DECIMAL(10, 2);
    DECLARE netIncome DECIMAL(10, 2);
    
    -- Calculate totals
    SELECT COALESCE(SUM(Total_Price), 0) INTO totalSales FROM sales WHERE Sale_Date >= start_date;
    SELECT COALESCE(SUM(total_amount), 0) INTO totalPurchases FROM purchases WHERE purchase_date >= start_date;
    SELECT COALESCE(SUM(amount), 0) INTO totalExpenses FROM expenses WHERE expense_date >= start_date;
    
    
    -- Calculate net income
    SET netIncome = totalSales - totalPurchases - totalExpenses;
    
    
    SELECT 
        start_date AS StartDate,
        totalSales AS TotalSales,
        totalPurchases AS TotalPurchases,
        totalExpenses AS TotalExpenses,
        netIncome AS NetIncome;
END //

DELIMITER ;


call getbalancesheet('2023-01-01');

drop procedure BalanceSheet;

DELIMITER //


CREATE PROCEDURE BalanceSheet(IN start_date DATE)
BEGIN
    DECLARE totalSales DECIMAL(10, 2);
    DECLARE totalPurchases DECIMAL(10, 2);
    DECLARE totalExpenses DECIMAL(10, 2);
    DECLARE netIncome DECIMAL(10, 2);
    
    -- Calculate totals
    SELECT COALESCE(SUM(total_price), 0) INTO totalSales FROM sales WHERE Sale_Date >= start_date AND MOD(Sales_ID, 2) = 1;
    SELECT COALESCE(SUM(total_amount), 0) INTO totalPurchases FROM purchases WHERE purchase_date >= start_date;
    SELECT COALESCE(SUM(amount), 0) INTO totalExpenses FROM expenses WHERE expense_date >= start_date;
    

    
    -- Calculate net income
    SET netIncome = totalSales - totalPurchases - totalExpenses;
    
   
    SELECT 
        start_date AS StartDate,
        totalSales AS TotalSales,
        totalPurchases AS TotalPurchases,
        totalExpenses AS TotalExpenses,
        netIncome AS NetIncome;
END //

DELIMITER ;

call balancesheet('2023-01-01');

drop procedure CompanyRevenue;

DELIMITER //

CREATE PROCEDURE CompanyRevenue(
    IN start_date DATE,
    IN shareholder_name VARCHAR(255)
)
BEGIN
    DECLARE temp_table_name VARCHAR(255);
    SET temp_table_name = CONCAT('ShareholderRevenue_', UUID_SHORT());

    -- Drop temporary table if it exists
    SET @sql = CONCAT('DROP TEMPORARY TABLE IF EXISTS ', temp_table_name);
    PREPARE stmt FROM @sql;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;

    -- Create a temporary table to store results
    SET @sql = CONCAT('CREATE TEMPORARY TABLE ', temp_table_name, ' (
        CompanyName VARCHAR(255),
        ShareholderName VARCHAR(255),
        SharePercentage DECIMAL(5, 2),
        TotalSales DECIMAL(10, 2),
        Expenses DECIMAL(10, 2),
        Revenue DECIMAL(10, 2),
        Investment DECIMAL(10, 2),
        Profit DECIMAL(10, 2),
        ArsineCut DECIMAL(10, 2),
        ZafarCut DECIMAL(10, 2),
        PureProfit DECIMAL(10, 2)
    )');
    PREPARE stmt FROM @sql;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;

    -- Drop temporary tables if they exist
    DROP TEMPORARY TABLE IF EXISTS TotalExpenses;
    DROP TEMPORARY TABLE IF EXISTS CompanyCount;
    DROP TEMPORARY TABLE IF EXISTS CompanyExpenses;

    -- Calculate total expenses and number of companies involved in sales
    CREATE TEMPORARY TABLE TotalExpenses AS
    SELECT COALESCE(SUM(e.amount), 0) AS TotalExpense
    FROM Expenses e
    WHERE e.expense_date >= start_date;

    CREATE TEMPORARY TABLE CompanyCount AS
    SELECT COUNT(DISTINCT sh.Comp_ID) AS CompanyCount
    FROM Share_Holding sh
    LEFT JOIN Drugs d ON sh.Comp_ID = d.Comp_ID
    LEFT JOIN Sales s ON d.Drug_ID = s.Drug_ID AND s.Sale_Date >= start_date;

    -- Calculate expenses per company
    CREATE TEMPORARY TABLE CompanyExpenses AS
    SELECT sh.Comp_ID, 
           (te.TotalExpense / cc.CompanyCount) AS ExpensePerCompany
    FROM Share_Holding sh
    CROSS JOIN (SELECT TotalExpense FROM TotalExpenses) te
    CROSS JOIN (SELECT CompanyCount FROM CompanyCount) cc
    GROUP BY sh.Comp_ID, te.TotalExpense, cc.CompanyCount;

    -- Calculate revenue and profit for the specified shareholder or all shareholders
    SET @sql = CONCAT('
        INSERT INTO ', temp_table_name, ' (CompanyName, ShareholderName, SharePercentage, TotalSales, Expenses, Revenue, Investment, Profit, ArsineCut, ZafarCut, PureProfit)
        SELECT c.Comp_Name, shs.Holder_Name, sh.Share_Percentage, 
               COALESCE(SUM(s.total_price), 0) AS TotalSales,
               COALESCE(ce.ExpensePerCompany, 0) AS Expenses,
               COALESCE((COALESCE(SUM(s.total_price), 0) - COALESCE(ce.ExpensePerCompany, 0)), 0) AS Revenue,
               sh.Investment,
               COALESCE((COALESCE(SUM(s.total_price), 0) - COALESCE(ce.ExpensePerCompany, 0)), 0) - sh.Investment AS Profit,
               CASE
                   WHEN COALESCE((COALESCE(SUM(s.total_price), 0) - COALESCE(ce.ExpensePerCompany, 0)), 0) - sh.Investment > 0 THEN
                       (COALESCE((COALESCE(SUM(s.total_price), 0) - COALESCE(ce.ExpensePerCompany, 0)), 0) - sh.Investment) * 0.05
                   ELSE 0
               END AS ArsineCut,
               CASE
                   WHEN COALESCE((COALESCE(SUM(s.total_price), 0) - COALESCE(ce.ExpensePerCompany, 0)), 0) - sh.Investment > 0 THEN
                       (COALESCE((COALESCE(SUM(s.total_price), 0) - COALESCE(ce.ExpensePerCompany, 0)), 0) - sh.Investment) * 0.05
                   ELSE 0
               END AS ZafarCut,
               COALESCE((COALESCE((COALESCE(SUM(s.total_price), 0) - COALESCE(ce.ExpensePerCompany, 0)), 0) - sh.Investment), 0) - CASE
                   WHEN COALESCE((COALESCE(SUM(s.total_price), 0) - COALESCE(ce.ExpensePerCompany, 0)), 0) - sh.Investment > 0 THEN
                       (COALESCE((COALESCE(SUM(s.total_price), 0) - COALESCE(ce.ExpensePerCompany, 0)), 0) - sh.Investment) * 0.1
                   ELSE 0
               END AS PureProfit
        FROM Share_Holding sh
        LEFT JOIN Drugs d ON sh.Comp_ID = d.Comp_ID
        LEFT JOIN Sales s ON d.Drug_ID = s.Drug_ID AND s.Sale_Date >= "', start_date, '"
        LEFT JOIN Companies c ON sh.Comp_ID = c.Comp_ID
        LEFT JOIN Shareholders shs ON sh.Share_ID = shs.Share_ID
        LEFT JOIN CompanyExpenses ce ON sh.Comp_ID = ce.Comp_ID
        WHERE (shs.Holder_Name = "', shareholder_name, '" OR "', shareholder_name, '" = "")
        GROUP BY c.Comp_Name, shs.Holder_Name, sh.Share_Percentage, sh.Investment, ce.ExpensePerCompany');
    PREPARE stmt FROM @sql;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;

    -- Select results from the temporary table
    SET @sql = CONCAT('SELECT * FROM ', temp_table_name);
    PREPARE stmt FROM @sql;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;

    -- Drop the temporary tables
    DROP TEMPORARY TABLE IF EXISTS TotalExpenses;
    DROP TEMPORARY TABLE IF EXISTS CompanyCount;
    DROP TEMPORARY TABLE IF EXISTS CompanyExpenses;
    DROP TEMPORARY TABLE IF EXISTS temp_table_name;

END //

DELIMITER ;




call CompanyRevenue('2022-01-01', '');

select * from expenses;

-- Find the name of the foreign key constraint in the Sales table
SELECT CONSTRAINT_NAME
FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
WHERE TABLE_NAME = 'Sales' AND COLUMN_NAME = 'Loc_ID';

ALTER TABLE `drugwholesale`.`location` 
RENAME TO  `drugwholesale`.`customer` ;

ALTER TABLE `drugwholesale`.`sales` 
CHANGE COLUMN `Loc_ID` `Customer_ID` INT NULL DEFAULT NULL ;

ALTER TABLE `customer`
CHANGE COLUMN `Loc_ID` `customer_id` INT NOT NULL AUTO_INCREMENT,
CHANGE COLUMN `Area` `customer_shop` VARCHAR(255) CHARACTER SET 'armscii8' NOT NULL,
ADD COLUMN `customer_name` VARCHAR(255) NULL AFTER `customer_shop`,
ADD COLUMN `address` VARCHAR(255) NULL AFTER `customer_name`,
ADD COLUMN `phone` VARCHAR(255) NULL AFTER `address`,
ADD COLUMN `useful_info` LONGTEXT NULL AFTER `phone`,
ADD UNIQUE INDEX `phone_UNIQUE` (`phone` ASC);

ALTER TABLE Sales
ADD CONSTRAINT fk_sales_customer_id
FOREIGN KEY (Customer_ID) REFERENCES customer(customer_id);

