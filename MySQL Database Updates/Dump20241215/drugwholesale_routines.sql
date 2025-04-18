-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: drugwholesale
-- ------------------------------------------------------
-- Server version	8.0.36

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping routines for database 'drugwholesale'
--
/*!50003 DROP PROCEDURE IF EXISTS `BalanceSheet` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `BalanceSheet`(IN start_date DATE)
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
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `CompanyRevenue` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `CompanyRevenue`(
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

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `GetBalanceSheet` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetBalanceSheet`(IN start_date DATE)
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
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-15 21:01:36
