-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: drugwholesale
-- ------------------------------------------------------
-- Server version	9.1.0

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
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `accounts` (
  `Account_ID` int NOT NULL AUTO_INCREMENT,
  `Customer_ID` int NOT NULL,
  `Balance` int DEFAULT NULL,
  PRIMARY KEY (`Account_ID`),
  KEY `FK-customer_ID_idx` (`Customer_ID`),
  CONSTRAINT `FK-customer_ID` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `companies` (
  `Comp_ID` int NOT NULL AUTO_INCREMENT,
  `Comp_Name` varchar(255) NOT NULL,
  `Head_Quarters` varchar(255) DEFAULT NULL,
  `Phone` char(20) DEFAULT NULL,
  `Email` char(100) DEFAULT NULL,
  PRIMARY KEY (`Comp_ID`),
  UNIQUE KEY `Phone` (`Phone`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer` (
  `customer_id` int NOT NULL AUTO_INCREMENT,
  `customer_shop` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `useful_info` longtext,
  `balance` int DEFAULT NULL,
  PRIMARY KEY (`customer_id`),
  UNIQUE KEY `phone_UNIQUE` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=1002 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `debtors`
--

DROP TABLE IF EXISTS `debtors`;
/*!50001 DROP VIEW IF EXISTS `debtors`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `debtors` AS SELECT 
 1 AS `customer_shop`,
 1 AS `total_debt`,
 1 AS `total_received`,
 1 AS `total_balance`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `demography`
--

DROP TABLE IF EXISTS `demography`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `demography` (
  `Demo_ID` int NOT NULL AUTO_INCREMENT,
  `Demo_Class` varchar(255) NOT NULL,
  PRIMARY KEY (`Demo_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `drug_type`
--

DROP TABLE IF EXISTS `drug_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `drug_type` (
  `Type_ID` int NOT NULL AUTO_INCREMENT,
  `Drug_Type` varchar(255) NOT NULL,
  PRIMARY KEY (`Type_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `drugs`
--

DROP TABLE IF EXISTS `drugs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `drugs` (
  `Drug_ID` int NOT NULL AUTO_INCREMENT,
  `Comp_ID` int NOT NULL,
  `Drug_Name` varchar(255) NOT NULL,
  `Ingredient` varchar(255) NOT NULL,
  `Tablet_PB` int DEFAULT NULL,
  `Type_ID` int DEFAULT NULL,
  `Demo_ID` int DEFAULT NULL,
  PRIMARY KEY (`Drug_ID`),
  KEY `Comp_ID` (`Comp_ID`),
  KEY `Type_ID` (`Type_ID`),
  KEY `Demo_ID` (`Demo_ID`),
  CONSTRAINT `drugs_ibfk_1` FOREIGN KEY (`Comp_ID`) REFERENCES `companies` (`Comp_ID`),
  CONSTRAINT `drugs_ibfk_2` FOREIGN KEY (`Type_ID`) REFERENCES `drug_type` (`Type_ID`),
  CONSTRAINT `drugs_ibfk_3` FOREIGN KEY (`Demo_ID`) REFERENCES `demography` (`Demo_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=189 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `emp_cut`
--

DROP TABLE IF EXISTS `emp_cut`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `emp_cut` (
  `Cut_ID` int NOT NULL AUTO_INCREMENT,
  `Emp_ID` int NOT NULL,
  `Rate` int NOT NULL,
  `Descript` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Cut_ID`),
  KEY `Emp_ID` (`Emp_ID`),
  CONSTRAINT `emp_cut_ibfk_1` FOREIGN KEY (`Emp_ID`) REFERENCES `employees` (`Emp_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employees` (
  `Emp_ID` int NOT NULL AUTO_INCREMENT,
  `Tazkira` int NOT NULL,
  `Emp_Name` varchar(255) NOT NULL,
  `Emp_Last_Name` varchar(255) NOT NULL,
  `Job_ID` int NOT NULL,
  `Salary_ID` int NOT NULL,
  PRIMARY KEY (`Emp_ID`),
  KEY `Job_ID` (`Job_ID`),
  KEY `Salary_ID` (`Salary_ID`),
  CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`Job_ID`) REFERENCES `job` (`Job_ID`),
  CONSTRAINT `employees_ibfk_2` FOREIGN KEY (`Salary_ID`) REFERENCES `salary` (`Salary_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `expensecategories`
--

DROP TABLE IF EXISTS `expensecategories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `expensecategories` (
  `category_id` int NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `expenses`
--

DROP TABLE IF EXISTS `expenses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `expenses` (
  `expense_id` int NOT NULL,
  `category_id` int DEFAULT NULL,
  `vendor_id` int DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `expense_date` date DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`expense_id`),
  KEY `category_id` (`category_id`),
  KEY `vendor_id` (`vendor_id`),
  CONSTRAINT `expenses_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `expensecategories` (`category_id`),
  CONSTRAINT `expenses_ibfk_2` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`vendor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inventory` (
  `Inventory_ID` int NOT NULL AUTO_INCREMENT,
  `Drug_ID` int NOT NULL,
  `Expiration` date NOT NULL,
  `Cost` double DEFAULT NULL,
  `Price` double DEFAULT NULL,
  `Initial_Amount` int DEFAULT NULL,
  PRIMARY KEY (`Inventory_ID`),
  KEY `Drug_ID` (`Drug_ID`),
  CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`Drug_ID`) REFERENCES `drugs` (`Drug_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=43544 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `inventorystockstatus`
--

DROP TABLE IF EXISTS `inventorystockstatus`;
/*!50001 DROP VIEW IF EXISTS `inventorystockstatus`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `inventorystockstatus` AS SELECT 
 1 AS `Inventory_ID`,
 1 AS `Drug_ID`,
 1 AS `Drug_Name`,
 1 AS `Initial_Amount`,
 1 AS `Remaining_Stock`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoices` (
  `invoice_id` int NOT NULL AUTO_INCREMENT,
  `customer_id` int NOT NULL,
  `note` varchar(45) DEFAULT NULL,
  `date` date NOT NULL,
  `sales_officer` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`invoice_id`),
  KEY `FK-customer_id_idx` (`customer_id`),
  CONSTRAINT `FK-invoices-customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `job`
--

DROP TABLE IF EXISTS `job`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job` (
  `Job_ID` int NOT NULL AUTO_INCREMENT,
  `Job_Name` varchar(255) NOT NULL,
  `Job_Description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Job_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `main`
--

DROP TABLE IF EXISTS `main`;
/*!50001 DROP VIEW IF EXISTS `main`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `main` AS SELECT 
 1 AS `Inventory_ID`,
 1 AS `Drug_ID`,
 1 AS `drug_name`,
 1 AS `Expiration`,
 1 AS `Ingredient`,
 1 AS `Price`,
 1 AS `Cost`,
 1 AS `Initial_Amount`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `purchases`
--

DROP TABLE IF EXISTS `purchases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `purchases` (
  `purchase_id` int NOT NULL AUTO_INCREMENT,
  `vendor_id` int DEFAULT NULL,
  `drug_id` int NOT NULL,
  `price` double NOT NULL,
  `quantity` int DEFAULT NULL,
  `Discount` decimal(10,2) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `amount_paid` double DEFAULT NULL,
  PRIMARY KEY (`purchase_id`),
  KEY `vendor_id` (`vendor_id`),
  KEY `drug_id` (`drug_id`),
  CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`vendor_id`),
  CONSTRAINT `purchases_ibfk_2` FOREIGN KEY (`drug_id`) REFERENCES `drugs` (`Drug_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `salary`
--

DROP TABLE IF EXISTS `salary`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `salary` (
  `Salary_ID` int NOT NULL AUTO_INCREMENT,
  `Scale` int NOT NULL,
  `Bonouses` int DEFAULT NULL,
  `Tax_ID` int NOT NULL,
  `Post_TaxSal` int DEFAULT NULL,
  PRIMARY KEY (`Salary_ID`),
  KEY `Tax_ID` (`Tax_ID`),
  CONSTRAINT `salary_ibfk_1` FOREIGN KEY (`Tax_ID`) REFERENCES `tax` (`Tax_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sales` (
  `Sales_ID` int NOT NULL AUTO_INCREMENT,
  `Inventory_ID` int NOT NULL,
  `Sale_Date` date NOT NULL,
  `Quantity` int NOT NULL,
  `Discount` decimal(5,2) DEFAULT NULL,
  `Price` double NOT NULL,
  `Cut_ID` int DEFAULT NULL,
  `Customer_ID` int DEFAULT NULL,
  `Total_Price` double DEFAULT NULL,
  `Amount_Received` double DEFAULT NULL,
  `Note` mediumtext,
  `invoice_no` int DEFAULT NULL,
  PRIMARY KEY (`Sales_ID`),
  KEY `Cut_ID` (`Cut_ID`),
  KEY `fk_sales_customer_id` (`Customer_ID`),
  KEY `fk_sales_inventory_id_idx` (`Inventory_ID`),
  KEY `fk_invoice_no_idx` (`invoice_no`),
  CONSTRAINT `fk_invoice_no` FOREIGN KEY (`invoice_no`) REFERENCES `invoices` (`invoice_id`),
  CONSTRAINT `fk_sales_customer_id` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`customer_id`),
  CONSTRAINT `fk_sales_inventory` FOREIGN KEY (`Inventory_ID`) REFERENCES `inventory` (`Inventory_ID`),
  CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`Cut_ID`) REFERENCES `emp_cut` (`Cut_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=34573 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `sales_bill`
--

DROP TABLE IF EXISTS `sales_bill`;
/*!50001 DROP VIEW IF EXISTS `sales_bill`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `sales_bill` AS SELECT 
 1 AS `Type`,
 1 AS `Name`,
 1 AS `Quantity`,
 1 AS `Price`,
 1 AS `Discount`,
 1 AS `Total_Price`,
 1 AS `Amount_Received`,
 1 AS `Invoice_No`,
 1 AS `Date`,
 1 AS `Customer_Shop`,
 1 AS `Balance`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `share_holding`
--

DROP TABLE IF EXISTS `share_holding`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `share_holding` (
  `Share_HID` int NOT NULL AUTO_INCREMENT,
  `Share_ID` int NOT NULL,
  `Comp_ID` int NOT NULL,
  `Share_Percentage` int NOT NULL,
  `Investment` int DEFAULT NULL,
  PRIMARY KEY (`Share_HID`),
  KEY `Share_ID` (`Share_ID`),
  KEY `Comp_ID` (`Comp_ID`),
  CONSTRAINT `share_holding_ibfk_1` FOREIGN KEY (`Share_ID`) REFERENCES `shareholders` (`Share_ID`),
  CONSTRAINT `share_holding_ibfk_2` FOREIGN KEY (`Comp_ID`) REFERENCES `companies` (`Comp_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `shareholders`
--

DROP TABLE IF EXISTS `shareholders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shareholders` (
  `Share_ID` int NOT NULL AUTO_INCREMENT,
  `Holder_Name` varchar(255) NOT NULL,
  `Phone` char(20) DEFAULT NULL,
  PRIMARY KEY (`Share_ID`),
  UNIQUE KEY `Phone` (`Phone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tax`
--

DROP TABLE IF EXISTS `tax`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tax` (
  `Tax_ID` int NOT NULL AUTO_INCREMENT,
  `Scale_Tax` decimal(20,2) NOT NULL,
  PRIMARY KEY (`Tax_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `vendordebts`
--

DROP TABLE IF EXISTS `vendordebts`;
/*!50001 DROP VIEW IF EXISTS `vendordebts`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vendordebts` AS SELECT 
 1 AS `purchase_id`,
 1 AS `vendor_id`,
 1 AS `vendor_name`,
 1 AS `drug_name`,
 1 AS `total_amount`,
 1 AS `amount_paid`,
 1 AS `balance`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `vendors`
--

DROP TABLE IF EXISTS `vendors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vendors` (
  `vendor_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `drug_type` text,
  `address` text,
  `phone_number` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `payment_terms` varchar(100) DEFAULT NULL,
  `notes` text,
  PRIMARY KEY (`vendor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `view_inventory`
--

DROP TABLE IF EXISTS `view_inventory`;
/*!50001 DROP VIEW IF EXISTS `view_inventory`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `view_inventory` AS SELECT 
 1 AS `inventory_id`,
 1 AS `drug_id`,
 1 AS `drug_name`,
 1 AS `expiration`,
 1 AS `cost`,
 1 AS `price`,
 1 AS `initial_amount`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `debtors`
--

/*!50001 DROP VIEW IF EXISTS `debtors`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `debtors` AS select `customer`.`customer_shop` AS `customer_shop`,sum(`sales`.`Total_Price`) AS `total_debt`,sum(`sales`.`Amount_Received`) AS `total_received`,sum((`sales`.`Total_Price` - `sales`.`Amount_Received`)) AS `total_balance` from (`sales` left join `customer` on((`customer`.`customer_id` = `sales`.`Customer_ID`))) where ((`sales`.`Total_Price` - `sales`.`Amount_Received`) <> 0) group by `customer`.`customer_shop` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `inventorystockstatus`
--

/*!50001 DROP VIEW IF EXISTS `inventorystockstatus`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `inventorystockstatus` AS select `inventory`.`Inventory_ID` AS `Inventory_ID`,`inventory`.`Drug_ID` AS `Drug_ID`,`drugs`.`Drug_Name` AS `Drug_Name`,`inventory`.`Initial_Amount` AS `Initial_Amount`,(`inventory`.`Initial_Amount` - coalesce(sum(`sales`.`Quantity`),0)) AS `Remaining_Stock` from ((`inventory` left join `sales` on((`inventory`.`Inventory_ID` = `sales`.`Inventory_ID`))) left join `drugs` on((`inventory`.`Drug_ID` = `drugs`.`Drug_ID`))) group by `inventory`.`Inventory_ID`,`inventory`.`Drug_ID`,`drugs`.`Drug_Name`,`inventory`.`Initial_Amount` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `main`
--

/*!50001 DROP VIEW IF EXISTS `main`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `main` AS select `inventory`.`Inventory_ID` AS `Inventory_ID`,`drugs`.`Drug_ID` AS `Drug_ID`,`drugs`.`Drug_Name` AS `drug_name`,`inventory`.`Expiration` AS `Expiration`,`drugs`.`Ingredient` AS `Ingredient`,`inventory`.`Price` AS `Price`,`inventory`.`Cost` AS `Cost`,`inventory`.`Initial_Amount` AS `Initial_Amount` from (`inventory` join `drugs` on((`inventory`.`Drug_ID` = `drugs`.`Drug_ID`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `sales_bill`
--

/*!50001 DROP VIEW IF EXISTS `sales_bill`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `sales_bill` AS select `drug_type`.`Drug_Type` AS `Type`,`drugs`.`Drug_Name` AS `Name`,`sales`.`Quantity` AS `Quantity`,`sales`.`Price` AS `Price`,`sales`.`Discount` AS `Discount`,`sales`.`Total_Price` AS `Total_Price`,`sales`.`Amount_Received` AS `Amount_Received`,`sales`.`invoice_no` AS `Invoice_No`,`invoices`.`date` AS `Date`,`customer`.`customer_shop` AS `Customer_Shop`,`customer`.`balance` AS `Balance` from (((((`sales` join `inventory` on((`sales`.`Inventory_ID` = `inventory`.`Inventory_ID`))) join `drugs` on((`inventory`.`Drug_ID` = `drugs`.`Drug_ID`))) join `customer` on((`sales`.`Customer_ID` = `customer`.`customer_id`))) join `drug_type` on((`drugs`.`Type_ID` = `drug_type`.`Type_ID`))) join `invoices` on((`sales`.`invoice_no` = `invoices`.`invoice_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vendordebts`
--

/*!50001 DROP VIEW IF EXISTS `vendordebts`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vendordebts` AS select `purchases`.`purchase_id` AS `purchase_id`,`purchases`.`vendor_id` AS `vendor_id`,`vendors`.`name` AS `vendor_name`,`drugs`.`Drug_Name` AS `drug_name`,`purchases`.`total_amount` AS `total_amount`,`purchases`.`amount_paid` AS `amount_paid`,(`purchases`.`total_amount` - `purchases`.`amount_paid`) AS `balance` from ((`purchases` left join `vendors` on((`purchases`.`vendor_id` = `vendors`.`vendor_id`))) left join `drugs` on((`purchases`.`drug_id` = `drugs`.`Drug_ID`))) where ((`purchases`.`total_amount` - `purchases`.`amount_paid`) <> 0) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_inventory`
--

/*!50001 DROP VIEW IF EXISTS `view_inventory`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_inventory` AS select `inventory`.`Inventory_ID` AS `inventory_id`,`inventory`.`Drug_ID` AS `drug_id`,`drugs`.`Drug_Name` AS `drug_name`,`inventory`.`Expiration` AS `expiration`,`inventory`.`Cost` AS `cost`,`inventory`.`Price` AS `price`,`inventory`.`Initial_Amount` AS `initial_amount` from (`inventory` left join `drugs` on((`drugs`.`Drug_ID` = `inventory`.`Drug_ID`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-01-21 11:32:11
