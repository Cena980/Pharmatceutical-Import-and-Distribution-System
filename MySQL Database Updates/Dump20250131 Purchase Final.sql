CREATE DATABASE  IF NOT EXISTS `drugwholesale` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `drugwholesale`;
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
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companies`
--

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` VALUES (1,'Pars Darou','Iran','021_74373','www.parsdarou.ir'),(2,'Atco','Pakistan',NULL,NULL),(3,'Hilton Pharma','Pakistan',NULL,NULL),(4,'Sanovel','Turkey',NULL,NULL),(5,'ROUTE2HEALTH','Pakistan',NULL,NULL),(6,'Symbiosis','India',NULL,NULL),(7,'Akson','Turkey',NULL,NULL),(8,'Marham Daru','Iran',NULL,NULL),(9,'Jalinous','Iran',NULL,NULL),(10,'Athens','India',NULL,NULL),(11,'Werrick','Pakistan',NULL,NULL),(12,'Sanofi','Pakistan',NULL,NULL),(13,'HIGHNOON','Pakistan',NULL,NULL),(14,'GLITZ Pharma','Pakistan',NULL,NULL),(15,'OVATION REMEDIES','India',NULL,NULL),(16,'Medicraft','Pakistan',NULL,NULL),(17,'Searle','Pakistan',NULL,NULL),(18,'AMBROSIA','Pakistan',NULL,NULL),(19,'Scotmann','Pakistan',NULL,NULL),(20,'AGP','Pakistan',NULL,NULL),(21,'ABL Plus','China',NULL,NULL),(22,'Shanxi Federal','China',NULL,NULL),(23,'TAOLIGHT Pharma','China',NULL,NULL),(24,'Unimax','India',NULL,NULL),(25,'Platinum','Pakistan',NULL,NULL),(26,'GSK','Pakistan',NULL,NULL),(27,'LCI','Pakistan',NULL,NULL),(28,'Getz','Pakistan',NULL,NULL),(29,'Aspin Pharma','Pakistan',NULL,NULL),(30,'Martin Dow','Pakistan',NULL,NULL),(31,'Pfizer','Pakistan',NULL,NULL),(32,'UniMark','Pakistan',NULL,NULL),(33,'Sami','Pakistan',NULL,NULL),(34,'Abbott','Pakistan',NULL,NULL),(35,'Pharmedic','Pakistan',NULL,NULL),(36,'Zafa','Pakistan',NULL,NULL),(37,'Alliance','Pakistan',NULL,NULL),(38,'Maple','Pakistan',NULL,NULL),(39,'Medisynth','Pakistan',NULL,NULL),(40,'CoreVita','India',NULL,NULL),(41,'Incepta','Bangladesh',NULL,NULL),(42,'Univentis Medicare','India',NULL,NULL),(43,'Lark','India',NULL,NULL),(44,'Combitic','India',NULL,NULL),(45,'Zagros','Iran',NULL,NULL),(46,'GUFIC','India',NULL,NULL),(47,'Nobel','Turkey',NULL,NULL),(48,'Novartis','Pakistan',NULL,NULL),(49,'AsianContinental','Pakistan',NULL,NULL),(50,'KGMP','Korea',NULL,NULL),(51,'Hansel','Pakistan',NULL,NULL),(52,'Sobhan','Iran',NULL,NULL),(53,'Mez','India',NULL,NULL),(54,'Natural Health','UK',NULL,NULL),(55,'Euro','Bangladesh',NULL,NULL),(56,'Radicon','India',NULL,'www.radiconlab.com'),(57,'ModHike','India',NULL,'www.modhike.com'),(58,'Life Pharma','UAE',NULL,NULL),(59,'Amin Pharma','Iran',NULL,NULL),(60,'Mehr Darou','Iran',NULL,NULL),(61,'Leeford Healthcare','India',NULL,NULL),(62,'Ridley Life Sciences','India',NULL,NULL),(63,'Cipla','India',NULL,NULL),(64,'Ducross','India',NULL,NULL),(65,'Knoll Healthcare','India',NULL,NULL),(66,'PharmaKing','India',NULL,NULL),(67,'ARBRO','India',NULL,'arbro@arbropharma.com'),(68,'Kharazmi','Iran',NULL,NULL),(69,'PT Sanbe Farma','Indonesia',NULL,NULL),(70,'Pinewood Healthcare','Ireland',NULL,NULL),(71,'Sunlife','Germany',NULL,NULL),(72,'Firooz','Iran',NULL,NULL),(73,'Royal Surgicare','India',NULL,NULL),(74,'Innova Captab','India',NULL,NULL),(75,'Sydler Remedies','India',NULL,NULL),(76,'Nexus Times','UAE',NULL,NULL),(77,'Torrvis','India',NULL,NULL),(78,'GoldenGate','UAE',NULL,NULL),(79,'IndoFarma','Indonesia',NULL,NULL),(80,'Health Plus','China',NULL,NULL),(81,'Dorsa','Iran',NULL,NULL),(82,'General','Bangladesh',NULL,NULL),(83,'OBS','Pakistan',NULL,NULL),(84,'Indus Pharma','Pakistan',NULL,NULL),(85,'Banson','India',NULL,NULL),(86,'Ruxall','India',NULL,NULL),(87,'Kaizen','Pakistan',NULL,NULL),(88,'Atabay','Turkey',NULL,NULL),(89,'Ferozsons','Pakistan',NULL,NULL),(90,'Astamed Healthcare','India',NULL,NULL),(91,'Biofarma','Turkey',NULL,NULL),(92,'Renata','Bangladesh',NULL,NULL),(93,'Milli Shifa','Afghanistan',NULL,'Sales.mspafg@gmail.com'),(94,'Ashrafsons Pharmaceuticals','Pakistan',NULL,NULL),(95,'Jiangxi Xierkangtai','China',NULL,NULL),(96,'Changzhou Holinx','China',NULL,NULL),(97,'Yiwu Medco Health Care','China',NULL,NULL),(98,'Le Mendoza','Pakistan',NULL,NULL),(99,'Menarini','Turkey',NULL,NULL),(100,'HLL Lifecare','India',NULL,NULL),(101,'Paramount','Pakistan',NULL,NULL),(102,'Assos Pharmaceuticals','Turkey',NULL,NULL),(103,'Reckitt Benkiser','Pakistan',NULL,NULL),(104,'WnsFeild Pharmaceuticals','Pakistan',NULL,NULL),(105,'Genetics','Pakistan',NULL,NULL),(106,'Caspian Tamin','Iran',NULL,NULL),(107,'TV.Pharm','Vietnam',NULL,NULL),(108,'Orison','India',NULL,NULL),(109,'Pharmatec','Pakistan',NULL,NULL),(110,'ISIS','Pakistan',NULL,NULL),(111,'Unknown',NULL,NULL,NULL),(112,'Square','Bangladesh',NULL,NULL),(113,'Iran Najo','Iran',NULL,NULL),(114,'Alborz Darou','Iran',NULL,NULL),(115,'Exir Pharmaceuticals','Iran',NULL,NULL),(116,'Aburaihan','Iran',NULL,NULL),(117,'Loghman Pharma','Iran',NULL,NULL),(118,'Rouz Darou','Iran',NULL,NULL),(119,'Pamir Pharmaceutical','Afghanistan',NULL,NULL),(120,'Kaap Pharmaceuticals','Pakistan',NULL,NULL),(121,'Laborate','India',NULL,NULL),(122,'Deeva Light Pharma','India',NULL,NULL);
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `company_sales_report`
--

DROP TABLE IF EXISTS `company_sales_report`;
/*!50001 DROP VIEW IF EXISTS `company_sales_report`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `company_sales_report` AS SELECT 
 1 AS `comp_id`,
 1 AS `comp_name`,
 1 AS `head_quarters`,
 1 AS `total_quantity_sold`,
 1 AS `total_amount_sold`*/;
SET character_set_client = @saved_cs_client;

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
  `balance` double DEFAULT NULL,
  PRIMARY KEY (`customer_id`),
  UNIQUE KEY `phone_UNIQUE` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=1002 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'Muhebi Hospital','Asad Muhebi','Mohib Square','0773737181','Main Customer',0),(2,'Sayed Saboor Naqshbandi',NULL,'Mazar Hotel',NULL,NULL,NULL),(3,'Kaihan Bik',NULL,'Mazar Hotel',NULL,NULL,NULL),(4,'Paron',NULL,NULL,NULL,NULL,-2280),(5,'Haider Mujib',NULL,NULL,NULL,NULL,NULL),(6,'Salehi Brothers',NULL,NULL,NULL,NULL,-16040),(7,'Nawi Sehat',NULL,NULL,NULL,NULL,NULL),(8,'Muhammad Mehraban',NULL,NULL,NULL,NULL,0),(9,'Bashir Sadeqi',NULL,NULL,NULL,NULL,-2545),(10,'Qari Salim',NULL,'Mazar Hotel',NULL,'Shop No. 40',-4300),(11,'Qaderi Brothers',NULL,'Mazar Hotel',NULL,NULL,NULL),(12,'Shams Pharmacy',NULL,'Bahar Continental',NULL,NULL,-8869),(13,'Hazrat Mawlana Pharmacy',NULL,'Aria Market Back',NULL,NULL,-11254),(14,'Damage','Ehsan Zafar','Baba Yadgar',NULL,NULL,NULL),(15,'Fayez Khojazada',NULL,'Aria Market',NULL,NULL,-1250),(16,'Wasih Zada',NULL,'Alokozay Square',NULL,NULL,0),(17,'Younus Brothers',NULL,'Mazar Hotel',NULL,NULL,-1200),(18,'Samir Pharmacy',NULL,'Muheb Square',NULL,NULL,-5900),(19,'Depo 28',NULL,'Aria Market',NULL,NULL,-500);
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `demography`
--

LOCK TABLES `demography` WRITE;
/*!40000 ALTER TABLE `demography` DISABLE KEYS */;
INSERT INTO `demography` VALUES (1,'Psychiatric'),(2,'Gynecology and Obsterics'),(3,'Cardiovascular'),(4,'Neurology'),(5,'Gastroenterology'),(6,'Pulmonology'),(7,'Infectious Diseases'),(8,'Orthopedics'),(9,'Dermatology'),(10,'Ophthalmology'),(11,'ENT'),(12,'Nephrology'),(13,'Urology'),(14,'Pediatrics'),(15,'Geriatrics'),(16,'Immunology'),(17,'Pain Management'),(18,'Rehabilitation and Physical Therapy'),(19,'Addiction'),(20,'Nutrition and Metabolism'),(21,'Emergency'),(22,'Hematology');
/*!40000 ALTER TABLE `demography` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drug_type`
--

LOCK TABLES `drug_type` WRITE;
/*!40000 ALTER TABLE `drug_type` DISABLE KEYS */;
INSERT INTO `drug_type` VALUES (1,'Tablet'),(2,'Capsule'),(3,'Syrup'),(4,'Injection'),(5,'Pomad'),(6,'Surgical'),(7,'Lotion'),(8,'Other'),(9,'Sanitation'),(10,'Suppository'),(11,'Drop');
/*!40000 ALTER TABLE `drug_type` ENABLE KEYS */;
UNLOCK TABLES;

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
  `Ingredient` varchar(255) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=366 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drugs`
--

LOCK TABLES `drugs` WRITE;
/*!40000 ALTER TABLE `drugs` DISABLE KEYS */;
INSERT INTO `drugs` VALUES (1,3,'Lerace 30','Levetiracetam 100mg/ml',1,3,4),(2,2,'Ascard 75','Aspirin BP 75 mg',30,1,3),(3,4,'Ator 20','Atorvastatin',30,1,3),(4,7,'CalciPower Plus','Multivitamin',1,3,20),(5,18,'Cardinol 10','Propranolol Hydrochloride BP',50,1,3),(6,16,'Clik 20','Citalopram 20mg',14,1,1),(7,17,'Serenace 1.5','Haloperidol',50,1,1),(8,11,'Epitab XR 200','Carbamazepine 200mg',50,1,4),(9,19,'Jingle 50','Atenolol 50mg',30,1,3),(10,24,'Selazid-D','Lansoprazole & Domeridone 30mg + 10 mg',10,2,5),(11,1,'Amitriptyline 10','Amitriptyline 10mg',100,1,1),(12,13,'Loprin 150','Aspirin 150mg',30,1,3),(13,20,'Maxna 500','Tranexamic Acid 500mg',20,2,22),(14,5,'Melatonin 5','Melatonin 5mg',30,1,1),(15,10,'Opanto 40','Pantoprazole 40mg',30,1,5),(16,10,'Osar Plus','Losartan Potassium & Hydrochlorothiazide',20,1,3),(17,23,'Paracetamol','Paracetamol',100,4,17),(18,12,'Phenergan','Promethazine HCL',1,3,1),(19,6,'Pirasym','Piracetam 500mg/150ml ',1,3,3),(20,10,'Pram 10','Escitalopram 10mg',30,1,NULL),(21,14,'Procye 5','Procyclidine HCL',100,1,NULL),(22,4,'Selectra 100','Sertraline 100mg',28,1,NULL),(23,21,'Syringe 10','Syring 10ml',100,4,NULL),(24,9,'Vitamin B6','Vitamin B6',100,1,NULL),(25,22,'Water','Water for Injection',100,4,NULL),(26,25,'Seizunil 200','Carbamazepine 200mg',50,1,NULL),(27,25,'Ceregin 1.5','Co-dergocrine mesilates',30,1,NULL),(28,17,'Serenace 5','Serenace 5mg',25,4,NULL),(29,17,'Sinemet 25/250','Carbidopa/Levodopa 25/250 mg',100,1,NULL),(30,26,'Panadol CF','Paracetamol, Pseudoephedrine HCL & Chlorpheniramine Maleate',100,1,NULL),(31,27,'Tenormin 50','Atenolol 50mg',21,1,NULL),(32,27,'Tenormin 25','Atenolol 25mg',21,1,NULL),(33,26,'Augmentin BD 1000','Co-amoxiclav 1000',6,1,NULL),(34,28,'Cefiget 100','Cefixime 100mg/5ml',1,3,NULL),(35,28,'Cefiget 200','Cefixime 200mg/5ml',1,3,NULL),(36,2,'Bronkal 2mg/5ml','Salbutamol Oral Solution',1,3,NULL),(37,29,'Stugeron 25','Cinnarizine 25mg',50,1,NULL),(38,30,'Sangobion','Iron, Folic Acid, Vitamin C & B12',30,2,NULL),(39,31,'Feldene 20','Piroxicam 20mg',40,2,NULL),(40,27,'Inderal 10','Propranolol 10mg',50,1,NULL),(41,27,'Inderal 40','Propranolol 40mg',50,1,NULL),(42,26,'FefolVit','Iron & Vitamins + Folic Acid',56,2,NULL),(43,30,'Pcam','Piroxicam',5,4,NULL),(44,32,'Carsel 25','Metoprolol 25mg',30,1,NULL),(45,32,'Carsel 50','Metoprolol 50mg ',30,1,NULL),(46,30,'Polybion Z','Zinc + Vitamin C',30,2,NULL),(47,30,'Buscopan Plus','Hyoscine Butylbromide + Paracetamol',100,1,NULL),(48,33,'Trimetabol','Appetizer',1,3,NULL),(49,34,'Surbex Z','Zinc, Folic Acid + Vitamins',30,1,NULL),(50,35,'Sensival 25','Nortriptyline HCL',20,1,NULL),(51,12,'Stemetil 5','Prochlorperazine Maleate',300,1,NULL),(52,11,'Epitab XR 400','Carbamazepine 400mg',20,1,NULL),(53,34,'Epival 500','Divalproex Sodium 500mg',100,1,NULL),(54,34,'Epival 250','Divalproex Sodium 250mg',100,1,NULL),(55,36,'Cardace 5','Enalapril Maleate 5mg',20,1,NULL),(56,36,'Zodip 5','Amlodipine 5mg',20,1,NULL),(57,25,'Seizunil 100mg/5ml','Carbamazepine 100mg/5ml',1,3,NULL),(58,30,'Polybion Forte','High Potency + B-Complex',1,3,NULL),(59,30,'Evion','Vitamin E',100,2,NULL),(60,30,'Glucovance 500/2.5','Metformin + Glibenclamide 500/2.5 mg',30,1,NULL),(61,11,'Nervin 0.25','Alprazolam 0.25mg',30,1,NULL),(62,11,'Nervin 0.5','Alprazolam 0.5mg',30,1,NULL),(63,37,'Partin 20','Paroxetine 20mg',10,1,NULL),(64,28,'Risek 20','Omeprazole 20mg',21,2,NULL),(65,38,'Mornig','Doxylamine Succinate + Pyridoxine HCL',30,1,NULL),(66,33,'Breeky','Misoprostol 200',10,1,NULL),(67,26,'Chewcal','Calcium + Vitamin D3',30,1,NULL),(68,26,'Kemadrin','Procyclidine HCL',100,1,NULL),(69,30,'Glucophage 500','Metformin HCL',50,1,NULL),(70,17,'Tryptanol 25','Amitriptyline HCL 25mg',100,1,NULL),(71,39,'Olsa 5','Olanzapine 5mg',10,1,NULL),(72,39,'Olsa 10','Olanzapine 10mg',10,1,NULL),(73,8,'Trifluoperazine 2','Trifluoperazine 2mg',100,1,NULL),(74,15,'Ketrol 30','Ketrolac Tromethamine',5,4,NULL),(75,13,'Skilax 30','Sodium Picosulfate',1,3,NULL),(76,40,'Tropex 50','Topiramate 50mg',30,1,NULL),(77,41,'Calvimax Plus','Calcium, Vitamin D & Multimineral',30,1,NULL),(78,6,'Ecit 10','Escitalopram 10mg',30,1,NULL),(79,42,'Epitira 500','Levetiracetam 500mg',200,1,NULL),(80,43,'Pantolar DSR','Pantoprazole & Domperidone',100,2,NULL),(81,44,'Pantocure D Forte','Domperidone & Pantoprazole',200,2,NULL),(82,45,'Folic Acid 1','Folic Acid 1mg',100,1,NULL),(83,46,'Puretrig 5000 IU','Chorionic Gonadotrophin 5000',1,4,NULL),(84,43,'Medlar','Paracetamol, Meloxicam, Domperidone & Caffeine',120,1,NULL),(85,47,'Tylol','Paracetamol 500mg',30,1,NULL),(86,2,'Atcopram 10','Escitalopram',NULL,NULL,NULL),(87,36,'Cardace 10','Enalapril Maleate 10mg',20,1,NULL),(88,34,'Duphaston 10','Dydrogesterone 10mg',20,1,NULL),(89,30,'Teril 200','Carbamazepine 200mg',50,1,NULL),(90,28,'Amclav 1g','Co-Amoxiclav 1g',6,1,NULL),(91,13,'Loprin 75','Aspirin 75mg',30,1,NULL),(92,20,'Sinaxamol Extra','Paracetamol/Orphenadrine Citrate 650mg/50mg',30,1,NULL),(93,12,'Flagyl 400','Metronidazole 400mg',200,1,NULL),(94,30,'Rivotril 0.5','Clonazepam 0.5mg',50,1,NULL),(95,48,'Tegral 200','Carbamazepine 200mg',50,1,NULL),(96,3,'Alp 0.5','Alprazolam 0.5 mg',30,1,NULL),(97,49,'Cardiolite 50','Atenolol 50mg',100,1,NULL),(98,50,'Prime Amoxi 500','Amoxicillin 500mg',20,2,NULL),(99,34,'Prothiaden 75','Dosulepin HCL 75mg',30,1,NULL),(100,78,'IV Cannula Shaheen','IV Cannula',100,4,NULL),(101,36,'Hexidyl 2','Trihexyphenidyl HCL',100,1,NULL),(102,30,'Rivotril 2.5','Clonazepam 2.5mg/ml',1,3,NULL),(103,51,'Roxitin 20','Paroxetine',10,1,NULL),(104,52,'Clonazepam 1','Clonazepam 1mg',100,1,NULL),(105,52,'Clonazepam 2','Clonazepam 2mg',100,1,NULL),(106,53,'Zofest M','Flupenthixol & Melitracen',30,1,NULL),(107,10,'Tralin 100','Sertraline 100mg',30,1,NULL),(108,10,'Tralin 50','Sertraline 50mg',30,1,NULL),(109,10,'Pregafix 75','Pregabalin 75mg',14,2,NULL),(110,10,'MNC Plus','Pregabalin & Methulcobalamin',20,2,NULL),(111,14,'Seitam 60','Levetiracetam 100mg/ml',1,3,NULL),(112,14,'Ozip 10','Olanzapine 10mg',10,1,NULL),(113,14,'Mamgit 10','Memantine HCL',10,1,NULL),(114,14,'Qutia 100','Quetiapine 100mg',30,1,NULL),(115,54,'Ginkoba','Ginkgo Biloba',30,2,NULL),(116,55,'Penticin','Fluepentixol 0.5mg & Melitracen 10mg',30,1,NULL),(117,56,'Omecon 20','Omeprazole 20mg',100,2,NULL),(118,57,'Sertania 100','Sertraline HCL 100mg',100,1,NULL),(119,58,'Panalife 500','Paracetamol 500mg',24,1,NULL),(120,59,'Ammorel 100','Amantadine 100mg',100,2,NULL),(121,60,'Nitrofurantoin 100','Nitrofurantoin 100mg',100,1,NULL),(122,57,'Zaptaaz 7.5','Mirtazapine 7.5mg',100,1,NULL),(123,43,'Onocid D','Omeprazole & Domperidone',100,2,NULL),(124,57,'Escapaam 20','Escitalopram 20mg',200,1,NULL),(125,56,'Ascitopaam 10','Escitalopram Oxalate 10mg',200,1,NULL),(126,43,'Clomifene 50','Clomiphene Citrate',100,1,NULL),(127,61,'Wellamo AT','Amlodipine & Atenolol 5mg + 50mg',280,1,NULL),(128,62,'Velsiplus 200','Sodium Valporate 200mg',100,1,NULL),(129,63,'LQuin 750','Levofloxacin 750mg',50,1,NULL),(130,64,'Escape 20','Escitalopram Oxalate 20mg',100,1,NULL),(131,65,'Dulexit 30','Duloxetine HCL 30mg',200,2,NULL),(132,57,'Olanzya 5','Olanzapine 5mg',200,1,NULL),(133,57,'Olanzya 10','Olanzapine 10mg',200,1,NULL),(134,57,'Zaptaaz 15','Mirtazapine 15mg',100,1,NULL),(135,64,'Dunixit','Flupentixol & Melitracen',100,1,NULL),(136,43,'Clomifene 25','Clomiphene Citrate 25mg',100,1,NULL),(137,66,'Pantaking D','Domperidone & Pantoprazole',200,1,NULL),(138,43,'Lanocid','Lansoprazole Delayed Release',100,2,NULL),(139,67,'Glu V Plex','GLU-V-PLEX',1,3,NULL),(141,68,'Vitarol','Vitamin D3',1,3,NULL),(142,69,'Sanaflu','Cold/Flu',1,3,NULL),(143,67,'Milkmag','Antacid/Laxative',1,3,NULL),(144,70,'Neurozin','Multi-Glycerophosphate',1,3,NULL),(145,72,'Cleansing Gel','Intimate Cleansing Gel',1,5,NULL),(146,73,'IV Cannula','IV Cannul',100,4,NULL),(147,71,'Vitamin C','Vitamin C',240,1,NULL),(148,24,'Dynalid PT','Nimesulide, Paracetamol & Tizanidine',100,1,NULL),(149,43,'Ibular PC','Ibuprofen, Paracetamol & Caffeine',100,2,NULL),(150,24,'MaxiCold','Cold/Flu',100,1,NULL),(151,24,'TufCold','Cold/Flu',100,2,NULL),(152,74,'Amster D3','Cholecalciferol 600',40,2,NULL),(153,67,'Zinc Sulphate 20','Zinc Sulphate Dispersible 20mg',100,1,NULL),(154,42,'Fepadol 650','Paracetamol 650mg',100,1,NULL),(155,75,'Stripttol','Throat & Cough',120,1,NULL),(156,75,'Sorasil Lemon','Throat',80,1,NULL),(157,76,'Uni Rovigon','Vitamin A+ E',30,1,NULL),(158,24,'Tufhist MK','Levocetrizine HCL & Montelukast',200,1,NULL),(159,77,'Ginkotor','Ginkgo Biloba',1,3,NULL),(160,24,'Dynalid P','Nimuslide & Paracetamol',100,1,NULL),(161,44,'Zovigravit','Multivitamin & Minerals',20,1,NULL),(162,44,'Lancid','Lansoprazole 30mg',10,2,NULL),(163,79,'Indomag','Ant Acid',1,3,NULL),(164,80,'Syringe 5','Syringe 5ml',100,4,NULL),(165,81,'Propranolol 10','Propranolol HCL 10mg',100,1,NULL),(166,82,'Amit 10','Amitriptyline HCL 10mg',20,1,NULL),(167,48,'Mosegor','Pizotifen',1,3,NULL),(168,83,'Primolut N','Norethisterone',30,1,NULL),(169,84,'Bromalex 3','Bromazepam',30,1,NULL),(171,44,'Pantocure D','Domperidone & Pantoprazole',10,1,NULL),(172,85,'Koldene','Cold/Flu',4,1,NULL),(173,86,'Ruxipram 10','Escitalopram 10mg',30,1,NULL),(174,41,'Ticoflex 500','Naproxen 500mg',50,1,NULL),(175,87,'Divalpro CR 500','Divalproex Sodium 500mg',50,1,NULL),(176,88,'Suprafen 400','Ibuprofen 400mg',100,1,NULL),(177,89,'Bronochol','Chesty Coughs',1,3,NULL),(178,90,'Relief','Cold/Flu',10,1,NULL),(179,91,'Famoser 40','Famotidine',30,1,NULL),(180,41,'Vinsetine 5','Vinpocetine 5mg',10,1,NULL),(181,28,'Getryl 1','Glimepiride 1mg',30,1,NULL),(182,28,'Getryl 2','Glimepiride 2mg',30,1,NULL),(183,92,'Orcef 400','Cefixime Trihydrate 400mg',5,1,NULL),(184,36,'Hydroxyprogesterone 250','Hydroxyprogesterone Caproate 250',3,4,NULL),(185,91,'Gabaset 300','Gabapentin 300mg',50,2,NULL),(186,43,'Onocid 20','Omeprazole 20mg',10,2,NULL),(187,18,'Cardinol 40','Propranolol',50,1,NULL),(188,93,'Milli-Sol NS NaCl 1000','NaCl 1000',1,4,NULL),(189,79,'OBH','Cough',1,3,NULL),(190,88,'Parol 500','Paracetamol 500mg',30,1,NULL),(191,94,'Safesol RL','Ringer Lactate Solution',1,4,NULL),(192,15,'Dalox 30','Duloxetine 30mg',10,1,NULL),(193,15,'Ovacit 10','Escitalopram 10mg',20,1,NULL),(194,65,'Mirzat 7.5','Mirtazapine 7.5mg',100,1,NULL),(195,81,'Propranolol 40','Propranolol 40mg',100,1,NULL),(196,17,'Spiromide 50/20','Spironolactone BP & Furosemide',20,1,NULL),(197,95,'Hero Infusion Set','Set Serum',1,4,NULL),(198,96,'Healthplast Master Tape','Loco Plaster',12,4,NULL),(199,97,'IV Dressing','Cannula Plaster',50,4,NULL),(200,26,'Ventolin','Salbutamol',1,3,NULL),(201,98,'Camozyme','Enzymes + Vitamin Compound',1,3,NULL),(202,14,'Arigit 10','Aripiprazole 10mg',30,1,NULL),(203,41,'Valex 200/5','Sodium Valporate 200mg/5ml',1,3,NULL),(204,99,'Remoxil 1','Amoxicillin 1g',16,1,NULL),(205,41,'Tadalis 1o','Tadalafil 10mg',10,1,NULL),(206,100,'Khoshi','Contraceptive',28,1,NULL),(207,101,'Helen 20','Fluoxetine HCl',14,2,NULL),(208,10,'Osar 50','Losartan Potassium 50mg',20,1,NULL),(209,111,'Novafen','Novafen',10,2,NULL),(210,20,'Xiton 1','Risperidone 1mg',10,1,NULL),(211,47,'Depres 20','Fluoxetine 20mg',16,2,NULL),(212,102,'Ludiomil 25','Maprotilin HCl 25mg',30,1,NULL),(213,30,'Neurobion','Vitamin B1 + B6 + B12',100,1,NULL),(214,30,'Esidep 10','Escitalopram 10mg',14,1,NULL),(215,20,'Algocin 500','Ciprofloxacin 500mg',10,1,NULL),(216,103,'Gaviscon','Alginate Compound',1,3,NULL),(217,99,'IESEF 1','Ceftriaxone 1g',1,4,NULL),(218,34,'Duphalac','Lactulose',1,3,NULL),(219,34,'Levelanz','Levetiracetam 250',10,1,NULL),(220,61,'Migrafen','Migraine',6,1,NULL),(221,33,'Mabil 500','Mecobalamin 500mcg/ml',10,4,NULL),(222,20,'Rigix 10','Cetrizine HCl',30,1,NULL),(223,28,'Zetro 500','Azithromycin 500mg ',6,1,NULL),(224,34,'Epival','Divalpro',1,3,NULL),(225,104,'Mirtawin 30','Mirtazapine 30',20,1,NULL),(226,105,'Donep 5','Donepezil 5mg',20,1,NULL),(227,106,'Akinidic','Biperiden 5mg',10,4,NULL),(228,107,'Piracetam 800','Piracetam 800mg',60,1,NULL),(229,90,'Panzium DSR','Pantoprazole & Domperidone 40/30 mg',14,2,NULL),(231,2,'Betagenic','Betamethasonen + Gentamicin',1,5,NULL),(232,9,'Cyproheptadine 4','Cyproheptadine 4mg',100,1,NULL),(233,108,'Tamsin','Tamsulosin HCl',300,2,NULL),(234,17,'Relispa 40','Drotaverine HCl 40mg',20,1,NULL),(235,52,'Haloperidol 0.5','Haloperidol 0.5mg',100,1,NULL),(236,17,'Aldomet 250','Methyldopa 250mg',100,1,NULL),(237,26,'Lanoxin 0.25','Digoxin 0.25mg',25,1,NULL),(238,82,'Riscord 1','Risperidone 1mg',10,1,NULL),(239,82,'Riscord 4','Risperidone 4mg',10,1,NULL),(240,109,'Valmo 5/160','Amlodipine besylate/Valsartan 5/160 mg',14,1,NULL),(241,110,'Lignocaine 2','Lignocaine gel 2%',1,5,NULL),(242,17,'Spiromide 40','Spironolactone & Furosemide',30,1,NULL),(243,112,'Famotack 40','Famotidine 40mg',30,1,NULL),(244,111,'Vitamin K','Vitamin K',10,4,NULL),(245,111,'Amplodipine 5','Amplodipine 5',NULL,1,NULL),(246,111,'Avil','Avil',NULL,1,NULL),(247,111,'Avonum 25','Promethazine 25mg',NULL,1,NULL),(248,115,'Betametasone LA','Betametasone 3mg',NULL,4,NULL),(249,111,'Celbox 200','Celbox',NULL,1,NULL),(250,111,'Glove','Glove',NULL,NULL,NULL),(251,111,'Moxiflux','Moxiflux',NULL,1,NULL),(252,119,'Oil Gominol 5%','Oil Gominol',10,3,NULL),(253,111,'Phenorbarbital 100','Phenorbarbital 100',100,1,NULL),(254,111,'Ambroxol','Ambroxol',NULL,3,NULL),(255,28,'Amclav 650','Co-Amoxiclav 650mg',6,1,NULL),(256,111,'Amoxi 500 Indonesian','Amoxicillin',NULL,2,NULL),(257,111,'Amoxil 250','Amoxicillin',NULL,3,NULL),(258,111,'Amoxil 500','Amoxicillin',NULL,3,NULL),(259,111,'Amoxil 500 Korean','Amoxicillin',NULL,2,NULL),(260,111,'Ampiclox','Ampiclox',NULL,3,NULL),(261,111,'Ampiclox 250','Ampiclox',NULL,2,NULL),(262,111,'Anside','Anside',NULL,1,NULL),(263,111,'Back Plaster 24','Back Plaster',NULL,6,NULL),(264,111,'Benzyl B','Benzyl',NULL,7,NULL),(265,111,'Besucodyl','Besucodyl',NULL,1,NULL),(266,111,'Boiled Jawar','Boiled Jawar',NULL,8,NULL),(267,111,'Brufen 400 ISI','Ibuprofen',NULL,1,NULL),(268,111,'Calpol','Calpol',NULL,1,NULL),(269,111,'IV Cannula China','Cannula',NULL,4,NULL),(270,111,'Cefetec 1','Cefetec',NULL,4,NULL),(271,111,'Cetrizine','Cetrizine',NULL,3,NULL),(272,111,'Ciproflux','Ciproflux',NULL,1,NULL),(273,111,'Comak',NULL,NULL,3,NULL),(274,111,'Entamazol','Entamazol',NULL,1,NULL),(275,111,'Fingers Plaster','Fingers Plaster',NULL,6,NULL),(276,111,'Gauze Pad','Gauze Pad',NULL,6,NULL),(277,111,'Genta 20','Genta',NULL,4,NULL),(278,111,'Genta 80','Genta',NULL,4,NULL),(279,111,'Ginseng','Ginseng',NULL,2,NULL),(280,111,'Kecord','Kecord',NULL,4,NULL),(281,111,'M Colt',NULL,NULL,NULL,NULL),(282,111,'Maxolan',NULL,NULL,NULL,NULL),(283,17,'Metodine Searle','Metronidazole 400mg',NULL,NULL,NULL),(284,111,'Mobil K 100',NULL,NULL,NULL,NULL),(285,111,'Mobil K 75',NULL,NULL,NULL,NULL),(286,111,'Mouth Wash',NULL,NULL,NULL,NULL),(288,111,'Nawnehal',NULL,NULL,NULL,NULL),(289,111,'Needle 24ml',NULL,NULL,NULL,NULL),(290,111,'Neuro B',NULL,NULL,NULL,NULL),(292,111,'Nubral Forte',NULL,NULL,NULL,NULL),(293,111,'Nystatine',NULL,NULL,NULL,NULL),(294,111,'Panadol 500',NULL,NULL,NULL,NULL),(295,111,'Plaster Original',NULL,NULL,NULL,NULL),(296,111,'Plaster Sherchap',NULL,NULL,NULL,NULL),(297,111,'Promethazine',NULL,NULL,NULL,NULL),(298,111,'Semogel',NULL,NULL,NULL,NULL),(299,111,'Serum Metro',NULL,NULL,NULL,NULL),(300,111,'Serum Paracetamol',NULL,NULL,NULL,NULL),(301,111,'Wax Gam',NULL,NULL,NULL,NULL),(302,111,'Decadron',NULL,NULL,4,NULL),(303,111,'Estradiol',NULL,NULL,4,NULL),(304,111,'Nemova',NULL,NULL,1,NULL),(305,111,'Pepzime',NULL,NULL,1,NULL),(306,111,'Serc 8','Betahistatine 8mg',NULL,1,NULL),(307,111,'Xynosine',NULL,NULL,3,NULL),(308,52,'Risperidone 1','Risperidone 1mg',100,1,NULL),(309,52,'Risperidone 2','Risperidone 2mg',100,1,NULL),(310,113,'Tetracycline 1% Najo','Tetracycline 1%',1,5,NULL),(311,52,'Haloperidol 5','Haloperidol 5mg',100,1,NULL),(312,114,'Metoclopramide 10','Metoclopramide 5mg/1ml',10,4,NULL),(313,116,'Dexamethasone 0.5','Dexamethasone 0.5',100,1,NULL),(314,117,'Phenytoin Compound','Phenytoin Sodium 100mg + Phenorbarbital 50mg',100,1,NULL),(315,118,'Lamotrigine 50','Lamotrigine 50mg',100,1,NULL),(316,9,'Folic Acid 1 Jalinous','Folic Acid 1mg',100,1,NULL),(317,20,'Xedexo 3/25','Olanzapine + Fluoxetine 3mg/25mg',14,2,NULL),(318,20,'Xedexo 6/25','Olanzapine + Fluoxetine 6mg/25mg',14,2,NULL),(319,20,'Novafol 400','L-Methylfolate 400mcg',30,1,NULL),(320,111,'Anti Hemorrhoide','Anti Hemorrhoide',NULL,10,NULL),(321,111,'Enoxaparin','Enoxaparin',NULL,2,NULL),(322,111,'Lamotrigine 100','Lamotrigine 100mg',NULL,1,NULL),(323,111,'Mitrazin 15','Mirtazapine 15mg',NULL,1,NULL),(324,111,'Motival','Motival',NULL,1,NULL),(325,111,'Pregnancy Test','Test',NULL,8,NULL),(326,111,'Ponstan Forte','Ponstan Forte',NULL,1,NULL),(327,111,'IDA V Cure','IDA V Cure',NULL,1,NULL),(328,10,'Athors 10','Atorvastatine 10mg',NULL,1,NULL),(329,111,'Sulpride','Sulpride',NULL,2,NULL),(330,111,'Flagyl','Metronidazole',NULL,3,NULL),(331,35,'Modrin','Nortypline + Fluphenazine HCl',100,1,NULL),(332,35,'Amotrip 25','Amotrip 25mg',NULL,1,NULL),(333,111,'Aldomet','Aldomet',NULL,1,NULL),(334,2,'Atcoflox 500','Levofloxacin',NULL,1,NULL),(339,19,'Ginkob 120','Ginkgo Biloba',NULL,3,NULL),(340,82,'Piratam Solution 100','Piracetam',1,3,NULL),(341,120,'eeton','Appetiser',1,3,NULL),(342,111,'Lotrix',NULL,NULL,5,NULL),(343,111,'Korozine',NULL,NULL,1,NULL),(344,111,'Trix',NULL,NULL,1,NULL),(345,111,'Norplat S',NULL,NULL,1,NULL),(346,111,'Nipidol 10','Amlodipine 10mg',NULL,1,NULL),(347,111,'A One Cold',NULL,NULL,3,NULL),(348,111,'Clomopramine',NULL,NULL,1,NULL),(349,111,'Arivan 1','Lorazepam 1',NULL,1,NULL),(350,48,'Mosegor Tab','Appetiser',NULL,1,NULL),(351,121,'Memory Plus','B-Complex',NULL,3,NULL),(352,111,'Brufen Syrup','Brufen',NULL,3,NULL),(353,122,'Daline 100','Sertlaine',NULL,1,NULL),(354,111,'Diazepam 5','Diazepam',NULL,1,NULL),(355,111,'Imipramine 25','Imipramine 25mg',NULL,1,NULL),(356,111,'Lysovit','Lysovit',NULL,3,NULL),(357,4,'Cedrina 100','Quetiapine 100mg',15,1,NULL),(358,4,'Cedrina 25','Quetiapine 25mg',15,1,NULL),(359,4,'Nimes 100','Nimesulide 100mg',15,1,NULL),(360,4,'Cardofix 10',NULL,NULL,1,NULL),(361,4,'Cardofix 5',NULL,NULL,1,NULL),(362,17,'Gravinate','Gravinate',NULL,1,NULL),(363,111,'Methaclor',NULL,NULL,11,NULL),(364,111,'Nipidol 5',NULL,NULL,1,NULL),(365,30,'Sangobion Syrup',NULL,NULL,3,NULL);
/*!40000 ALTER TABLE `drugs` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `emp_cut`
--

LOCK TABLES `emp_cut` WRITE;
/*!40000 ALTER TABLE `emp_cut` DISABLE KEYS */;
INSERT INTO `emp_cut` VALUES (71,31,2,NULL);
/*!40000 ALTER TABLE `emp_cut` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (31,32432,'Bashir','Arsine',41,61);
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `expensecategories`
--

LOCK TABLES `expensecategories` WRITE;
/*!40000 ALTER TABLE `expensecategories` DISABLE KEYS */;
INSERT INTO `expensecategories` VALUES (69,'Salaries','Payment');
/*!40000 ALTER TABLE `expensecategories` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `expenses`
--

LOCK TABLES `expenses` WRITE;
/*!40000 ALTER TABLE `expenses` DISABLE KEYS */;
INSERT INTO `expenses` VALUES (479832,69,973,234324.00,'2024-12-16','we ate');
/*!40000 ALTER TABLE `expenses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inventory` (
  `Inventory_ID` int NOT NULL AUTO_INCREMENT,
  `Drug_ID` int NOT NULL,
  `Cost` double DEFAULT NULL,
  `Price` double DEFAULT NULL,
  `Expiration` char(7) DEFAULT NULL,
  `Initial_Amount` int DEFAULT NULL,
  `Amount_Left` int DEFAULT NULL,
  PRIMARY KEY (`Inventory_ID`),
  KEY `Drug_ID` (`Drug_ID`),
  CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`Drug_ID`) REFERENCES `drugs` (`Drug_ID`),
  CONSTRAINT `chk_expiration_format` CHECK (regexp_like(`Expiration`,_utf8mb4'^[0-9]{4}-[0-9]{2}$'))
) ENGINE=InnoDB AUTO_INCREMENT=43585 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory`
--

LOCK TABLES `inventory` WRITE;
/*!40000 ALTER TABLE `inventory` DISABLE KEYS */;
INSERT INTO `inventory` VALUES (1,18,38,50,'2026-02',96,71),(2,46,84.5,90,'2025-11',600,590),(3,39,212,NULL,'2025-11',40,40),(4,37,45,55,'2027-07',488,303),(5,55,18,22,'2026-03',200,185),(6,38,49.5,55,'2026-07',720,635),(7,66,51,60,'2026-06',200,180),(8,56,18.5,21,'2027-08',128,105),(9,34,62,65,'2025-05',144,75),(10,43,52.5,55,'2026-09',200,160),(11,144,185,190,'2026-12',240,184),(12,87,39,NULL,'2026-08',200,190),(13,48,54,60,'2025-11',480,353),(14,49,89,90,'2025-09',26,-30),(15,58,39,40,'2025-05',50,30),(16,33,85,90,'2026-08',180,90),(17,64,122,128,'2026-11',136,96),(18,32,38,44,'2026-02',300,270),(19,31,67,NULL,'2026-04',300,290),(20,65,43,NULL,'2027-06',300,300),(21,57,55,NULL,'2026-04',100,91),(22,42,105,115,'2026-01',166,143),(23,69,49,55,'2027-03',150,140),(24,75,28.5,35,'2027-05',50,30),(25,41,62,68,'2025-11',600,550),(26,67,51,58,'2026-08',150,126),(27,26,103,120,'2027-03',1000,880),(28,70,58,70,'2027-07',300,290),(29,30,260,280,'2026-05',80,56),(30,54,228,250,'2026-06',122,105),(31,51,108,115,'2026-07',50,40),(32,50,37,40,'2027-03',200,180),(33,63,30,33,'2025-08',1000,860),(34,52,123,130,'2026-01',1000,920),(35,72,21,26,'2025-09',420,340),(36,71,19,22,'2025-09',547,497),(37,8,136,150,'2027-04',110,110),(38,29,560,600,'2026-11',30,18),(39,45,48,55,'2026-10',100,80),(40,44,40,43,'2027-03',100,65),(41,60,52,60,'2027-02',150,145),(42,62,55,60,'2025-11',50,50),(43,61,53,58,'2025-10',100,90),(44,59,230,235,'2026-02',96,43),(45,53,545,600,'2026-08',108,83),(46,68,72,NULL,'2029-02',100,100),(47,47,295,315,'2027-07',20,16),(48,40,39,44,'2026-07',600,550),(49,86,80,85,'2026-01',756,326),(50,8,136,150,'2026-10',813,701),(51,88,300,315,'2027-09',108,63),(52,89,98.5,110,'2026-12',1000,915),(53,90,66,70,'2025-11',864,754),(54,91,18,22,'2026-08',306,245),(55,92,56,65,'2027-06',288,228),(56,93,198,210,'2027-07',90,69),(57,94,80,88,'2025-09',200,121),(58,95,145,180,'2026-05',170,159),(59,96,69,78,'2026-07',50,20),(60,97,229,250,'2025-12',30,24),(61,98,78,76,'2027-07',100,69),(62,99,60,NULL,'2025-08',100,100),(63,51,108,115,'2027-01',50,50),(64,101,50,NULL,'2028-11',180,180),(65,102,68,78,'2026-04',100,57),(66,83,170,175,'2028-09',100,95),(67,62,55,60,'2025-10',120,79),(68,42,105,115,'2025-11',33,0),(69,42,105,115,'2026-02',144,39),(70,103,35,40,'2026-02',1000,830),(71,76,105,115,'2027-04',400,170),(72,110,168,180,'2027-08',200,150),(73,109,84,89,'2027-06',200,169),(74,107,164.5,177,'2027-06',400,310),(75,35,72,75,'2025-12',240,113),(76,111,84,88,'2026-03',86,76),(77,112,47,NULL,'2026-09',400,400),(78,113,80,85,'2026-02',500,450),(80,106,84,90,'2027-07',504,332),(81,115,108,115,'2026-10',480,358),(82,116,70,85,'2026-08',147,147),(83,84,16,16,'2025-12',720,364),(84,70,7,NULL,'2025-06',100,0),(85,137,9,14,'2026-06',1800,1666),(86,80,24,26,'2027-07',1200,560),(87,138,18,22,'2027-07',600,470),(88,134,35,40,'2027-06',1440,1338),(89,122,25,28,'2027-06',480,330),(90,117,13,20,'2025-12',960,850),(91,123,23,25,'2027-04',600,510),(92,139,30,33,'2026-05',1000,750),(93,135,21,30,'2026-05',2400,2100),(94,132,17,21,'2026-01',480,440),(95,133,19,26,'2026-01',960,900),(96,126,17,25,'2025-05',500,430),(97,125,17,27,'2026-04',620,440),(98,124,17,25,'2026-01',100,40),(99,118,32,38,'2027-06',960,710),(100,128,13,18,'2026-05',5000,4890),(101,129,35,40,'2026-12',150,80),(102,127,16,25,'2025-11',1090,950),(103,130,20,25,'2025-11',960,910),(104,131,44,50,'2026-04',195,-175),(105,136,17,NULL,'2025-05',100,100),(106,141,36,NULL,'2026-12',44,44),(107,142,70,73,'2026-09',48,0),(108,143,31,35,'2027-09',50,35),(110,145,50,55,'2027-09',240,204),(111,119,40,45,'2026-12',240,70),(112,120,155,NULL,'2027-07',30,30),(114,162,NULL,NULL,'2026-09',60,0),(115,83,168,175,'2028-09',240,139),(116,146,580,600,'2028-02',20,18),(117,147,77,80,'2026-10',144,120),(118,121,350,NULL,'2027-02',10,10),(119,148,248,260,'2028-06',90,58),(120,149,20,25,'2026-09',600,460),(121,150,128,140,'2027-01',160,146),(122,81,15.8,25,'2027-06',1100,980),(123,151,280,285,'2028-08',216,62),(124,152,15.8,20,'2027-06',1000,749),(125,153,14.8,20,'2025-10',50,42),(126,154,7.2,9,'2026-01',1920,1270),(127,155,170,NULL,'2028-01',56,52),(128,156,170,175,'2028-07',60,51),(129,157,74.5,85,'2028-03',50,40),(130,158,31.5,35,'2027-04',600,540),(131,79,41.5,50,'2026-06',1200,500),(132,159,47.5,60,'2025-05',120,-40),(133,100,770,795,'2029-03',20,13),(134,160,69,NULL,'2027-08',50,47),(135,10,11.9,17,'2026-12',3000,2949),(136,175,151,180,'2026-01',80,41),(137,83,NULL,NULL,'2026-01',10,0),(138,161,NULL,NULL,'2026-01',10,-15),(139,10,NULL,NULL,'2024-01',100,-290),(140,171,NULL,NULL,'2024-01',50,-50),(141,84,NULL,NULL,'2024-01',20,0),(142,209,NULL,NULL,'2024-01',50,0),(143,163,NULL,88,'2024-01',20,-65),(144,31,NULL,NULL,'2024-01',30,0),(145,94,NULL,NULL,'2025-01',5,0),(146,164,NULL,150,'2024-12',3,-8),(147,197,NULL,NULL,'2024-12',50,-50),(148,41,NULL,NULL,'2024-12',10,0),(149,165,NULL,NULL,'2024-12',10,-10),(150,166,NULL,32,'2024-12',50,-460),(151,168,NULL,NULL,'2024-12',20,-20),(152,152,NULL,NULL,'2024-12',50,0),(153,167,NULL,NULL,'2024-12',30,0),(154,33,NULL,NULL,'2024-12',40,0),(156,91,NULL,NULL,'2024-12',20,0),(157,115,NULL,NULL,'2024-12',30,-109),(158,114,NULL,NULL,'2024-12',240,210),(159,112,NULL,NULL,'2024-12',50,-50),(160,169,NULL,60,'2024-12',10,-30),(161,64,NULL,NULL,'2024-12',10,0),(162,81,NULL,NULL,'2024-12',40,-40),(163,172,NULL,NULL,'2024-12',1,0),(164,173,NULL,NULL,'2024-12',45,-45),(165,40,NULL,NULL,'2024-12',10,0),(166,56,NULL,NULL,'2024-12',20,0),(167,176,NULL,290,'2024-12',2,-2),(168,224,NULL,58,'2024-12',40,-80),(169,178,NULL,NULL,'2024-12',1,0),(170,150,NULL,NULL,'2024-12',1,0),(171,180,NULL,NULL,'2024-12',10,0),(172,179,NULL,80,'2024-12',30,-104),(173,182,NULL,NULL,'2024-12',5,0),(174,181,NULL,NULL,'2024-12',5,0),(175,27,NULL,110,'2024-12',40,-51),(176,154,NULL,NULL,'2024-12',30,-70),(177,146,NULL,NULL,'2024-12',1,0),(178,106,NULL,NULL,'2024-12',82,-80),(179,77,NULL,115,'2024-12',20,-20),(180,184,NULL,85,'2024-12',10,-20),(181,183,NULL,NULL,'2025-01',20,0),(182,185,NULL,NULL,'2025-01',10,0),(183,186,NULL,NULL,'2025-01',30,0),(184,177,NULL,30,'2025-01',10,-80),(185,119,NULL,NULL,'2025-01',20,20),(186,85,NULL,NULL,'2025-01',40,0),(187,5,NULL,NULL,'2025-01',30,0),(188,1,NULL,95,'2025-01',32,-75),(189,189,NULL,85,'2025-01',10,-56),(190,188,NULL,NULL,'2025-01',20,0),(191,191,NULL,NULL,'2025-01',26,0),(192,190,NULL,NULL,'2025-01',20,0),(193,3,171,185,'2025-01',65,50),(194,193,NULL,82,'2025-01',110,-22),(195,2,NULL,27,'2025-01',14,-30),(196,37,NULL,NULL,'2025-01',10,0),(197,194,NULL,NULL,'2025-01',100,0),(198,20,NULL,NULL,'2025-01',200,200),(199,195,NULL,50,'2025-01',10,-10),(200,196,NULL,75,'2025-01',5,-30),(201,198,NULL,NULL,'2025-01',5,0),(202,25,NULL,270,'2025-01',1,-4),(203,197,NULL,7.5,'2025-01',50,-100),(204,199,NULL,NULL,'2025-01',1,0),(205,7,NULL,NULL,'2025-01',10,0),(206,202,NULL,NULL,'2025-01',50,0),(207,201,NULL,32,'2025-01',10,-10),(208,203,NULL,94,'2025-01',20,0),(209,204,NULL,210,'2025-01',5,0),(210,205,NULL,102,'2025-01',10,0),(211,207,NULL,48.5,'2025-01',50,0),(212,206,NULL,27,'2025-01',20,0),(213,192,64.4,70,'2026-07',870,750),(214,193,77,82,'2027-02',362,256),(215,225,NULL,175,'2026-01',20,0),(216,226,NULL,NULL,'2026-01',12,12),(217,228,NULL,NULL,'2025-08',80,80),(218,208,NULL,88,'2025-08',50,0),(219,82,NULL,30,'2025-01',10,-30),(220,210,NULL,30,'2025-01',50,0),(221,211,NULL,93,'2025-01',50,0),(222,212,NULL,195,'2025-01',50,0),(223,214,NULL,100,'2025-01',10,-168),(224,215,NULL,100,'2025-01',10,0),(225,229,32.6,35,'2027-06',669,580),(226,216,NULL,54,'2025-01',10,-10),(227,217,NULL,75,'2025-01',50,-158),(228,218,NULL,40,'2025-01',10,-10),(229,219,NULL,70,'2025-01',20,0),(230,221,NULL,170,'2025-01',5,0),(231,220,NULL,40,'2025-01',20,0),(232,213,NULL,300,'2025-01',5,-8),(233,222,NULL,70,'2025-01',20,-20),(234,23,NULL,250,'2025-01',5,-3),(235,243,74,NULL,'2026-05',360,360),(236,244,NULL,3,'2025-01',20,0),(237,223,NULL,105,'2025-01',20,0),(238,245,NULL,85,'2025-01',NULL,NULL),(239,246,NULL,120,'2025-01',NULL,NULL),(240,247,NULL,150,'2025-01',10,0),(241,248,NULL,170,'2025-01',5,0),(242,249,NULL,170,'2025-01',10,0),(243,250,NULL,700,'2025-01',1,0),(244,251,NULL,128,'2025-01',10,0),(245,252,NULL,22,'2025-01',24,0),(246,253,NULL,380,'2025-01',3,-5),(247,28,310,340,'2027-03',20,13),(248,108,NULL,140,'2025-01',50,0),(249,200,NULL,34,'2025-01',5,0),(250,254,NULL,75,'2025-01',5,0),(251,255,NULL,52,'2025-01',10,0),(252,256,NULL,380,'2025-01',2,0),(253,257,NULL,48,'2025-01',10,0),(254,258,NULL,38,'2025-01',10,0),(255,259,NULL,340,'2025-01',2,0),(256,260,NULL,66,'2025-01',5,0),(257,261,NULL,260,'2025-01',1,0),(258,262,NULL,86,'2025-01',5,0),(259,263,NULL,90,'2025-01',2,0),(260,264,NULL,20,'2025-01',5,0),(261,265,NULL,50,'2025-01',2,0),(262,266,NULL,160,'2025-01',2,0),(263,267,NULL,310,'2025-01',2,0),(264,268,NULL,170,'2025-01',2,0),(265,269,NULL,500,'2025-01',1,0),(266,270,NULL,53,'2025-01',20,0),(267,271,NULL,18,'2025-01',10,0),(268,272,NULL,70,'2025-01',10,0),(269,273,NULL,95,'2025-01',5,0),(270,274,NULL,70,'2025-01',5,0),(271,275,NULL,40,'2025-01',5,0),(272,276,NULL,85,'2025-01',5,0),(273,277,NULL,30,'2025-01',10,0),(274,278,NULL,8,'2025-01',10,0),(275,279,NULL,110,'2025-01',2,0),(276,280,NULL,34,'2025-01',10,0),(277,74,NULL,30,'2025-01',10,0),(278,281,NULL,18,'2025-01',10,0),(279,282,NULL,75,'2025-01',1,0),(280,283,NULL,330,'2025-01',2,-5),(281,284,NULL,24,'2025-01',10,0),(282,285,NULL,20,'2025-01',10,0),(283,286,NULL,25,'2025-01',10,0),(284,174,NULL,78,'2025-01',10,-10),(285,288,NULL,35,'2025-01',5,0),(286,289,NULL,60,'2025-01',5,0),(287,290,NULL,180,'2025-01',1,-2),(289,292,NULL,45,'2025-01',5,-5),(290,293,NULL,43,'2025-01',5,-10),(291,294,NULL,170,'2025-01',2,0),(292,295,NULL,4.5,'2025-01',96,0),(293,296,NULL,90,'2025-01',2,0),(294,297,NULL,70,'2025-01',2,0),(295,298,NULL,31,'2025-01',10,0),(296,299,NULL,22,'2025-01',20,0),(297,300,NULL,40,'2025-01',20,0),(299,301,NULL,80,'2025-01',1,0),(300,11,NULL,60,'2025-01',10,0),(301,302,NULL,180,'2025-01',1,0),(302,303,NULL,220,'2025-01',1,0),(303,304,NULL,90,'2025-01',50,0),(304,305,NULL,150,'2025-01',5,0),(305,306,NULL,130,'2025-01',12,0),(306,307,NULL,25,'2025-01',10,0),(307,308,85,NULL,'2027-07',450,450),(308,309,85,NULL,'2027-09',300,300),(309,310,17.5,NULL,'2025-11',100,100),(310,235,61,85,'2029-04',120,115),(311,311,126,NULL,'2027-07',120,120),(312,312,120,NULL,'2027-01',10,10),(313,248,170,NULL,'2026-05',30,24),(314,313,41,NULL,'2025-12',120,120),(315,314,230,NULL,'2028-04',20,20),(316,105,60,NULL,'2026-04',400,399),(317,104,70,80,'2026-12',500,485),(318,315,155,NULL,'2027-07',100,100),(319,252,100,NULL,'2025-12',10,10),(320,214,89,90,'2026-06',336,286),(321,317,69,70,'2026-04',110,90),(322,318,66,70,'2025-04',100,100),(323,215,94,NULL,'2027-05',100,100),(324,319,74,90,'2025-09',100,70),(325,320,NULL,70,'2025-09',5,0),(326,321,NULL,75,'2025-09',12,0),(327,322,NULL,250,'2025-09',10,0),(328,323,NULL,72,'2025-09',50,0),(329,324,NULL,140,'2025-09',5,0),(330,325,NULL,140,'2025-09',1,0),(331,309,NULL,75,'2025-09',10,0),(332,22,NULL,300,'2025-09',50,0),(333,242,NULL,90,'2025-09',5,-5),(334,323,NULL,220,'2025-01',2,2),(335,327,NULL,295,'2025-01',10,0),(336,227,NULL,350,'2025-01',1,0),(337,328,NULL,144,'2025-01',39,0),(338,329,NULL,5,'2025-01',100,95),(339,330,NULL,30,'2025-01',5,0),(340,331,100,110,'2027-04',20,10),(341,332,76,80,'2025-01',20,0),(342,326,NULL,220,'2025-01',2,0),(344,334,NULL,95,'2025-01',20,0),(345,231,NULL,27,'2025-01',10,0),(346,232,NULL,60,'2025-01',2,0),(43545,237,NULL,34,'2025-01',5,0),(43546,241,NULL,25,'2025-01',10,0),(43547,234,NULL,27,'2025-01',10,0),(43548,239,NULL,56,'2025-01',50,0),(43549,233,NULL,38,'2025-01',20,0),(43550,339,NULL,70,'2026-09',1156,1154),(43551,340,142.5,152,'2025-12',80,80),(43552,4,NULL,120,'2027-04',44,38),(43553,14,NULL,280,'2027-04',100,97),(43554,236,NULL,300,'2027-04',2,0),(43555,341,70,75,'2025-12',55,55),(43556,342,NULL,38,NULL,10,0),(43557,343,NULL,130,NULL,3,0),(43558,344,NULL,13,NULL,30,0),(43559,345,NULL,36,NULL,10,-10),(43560,346,NULL,65,NULL,10,-50),(43561,347,NULL,35,NULL,9,0),(43562,348,NULL,200,NULL,20,0),(43563,349,NULL,95,NULL,5,0),(43564,350,NULL,130,NULL,5,0),(43569,351,70,70,NULL,40,40),(43570,352,NULL,33,NULL,10,0),(43572,353,NULL,147,NULL,20,0),(43573,354,NULL,90,NULL,2,0),(43574,355,NULL,120,NULL,10,0),(43575,356,NULL,36,NULL,10,0),(43576,357,161,165,'2025-10',134,134),(43577,358,65,70,'2025-10',140,140),(43578,359,54,61,'2026-02',50,50),(43579,360,198,198,'2025-10',30,30),(43580,361,178,178,'2025-10',30,30),(43581,362,NULL,170,'2025-10',5,0),(43582,363,NULL,15,'2025-10',10,0),(43583,364,NULL,45,'2025-10',50,0),(43584,365,NULL,35,'2025-10',10,0);
/*!40000 ALTER TABLE `inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `invoice`
--

DROP TABLE IF EXISTS `invoice`;
/*!50001 DROP VIEW IF EXISTS `invoice`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `invoice` AS SELECT 
 1 AS `invoice_id`,
 1 AS `customer_id`,
 1 AS `customer_shop`,
 1 AS `note`,
 1 AS `date`,
 1 AS `sales_officer`,
 1 AS `received`,
 1 AS `owed`,
 1 AS `total_sales`*/;
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
  `received` double DEFAULT NULL,
  `owed` double DEFAULT NULL,
  `total_sales` double DEFAULT NULL,
  PRIMARY KEY (`invoice_id`),
  KEY `customer_id_idx` (`customer_id`),
  CONSTRAINT `customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoices`
--

LOCK TABLES `invoices` WRITE;
/*!40000 ALTER TABLE `invoices` DISABLE KEYS */;
INSERT INTO `invoices` VALUES (1,1,NULL,'2025-01-11','',NULL,NULL,NULL),(2,13,NULL,'2025-01-12','',NULL,NULL,NULL),(3,1,NULL,'2025-01-12','',NULL,NULL,NULL),(4,16,NULL,'2025-01-22','',NULL,NULL,NULL),(5,4,NULL,'2025-01-23','',NULL,NULL,NULL),(6,10,NULL,'2025-01-23','',1400,-1400,1400),(7,13,NULL,'2025-01-23','',340,0,340),(8,17,NULL,'2025-01-23','',0,-1200,1200),(9,6,NULL,'2025-01-26','',0,-16040,16040),(10,15,NULL,'2025-01-26','Bashir Arsine',0,-250,250),(11,4,NULL,'2025-01-25','',0,-2280,2280),(12,10,NULL,'2025-01-26','',0,-4300,2900),(13,10,NULL,'2025-01-25','',5600,-4300,5600),(14,16,NULL,'2025-01-26','',820,0,820),(15,13,NULL,'2025-01-26','',4152,-11254,15404),(16,17,NULL,'2025-01-26','',280,-1200,280),(17,8,NULL,'2025-01-26','',200,0,200),(18,1,NULL,'2025-01-26','',62694,0,62694),(19,18,NULL,'2025-01-27','',0,-2950,2950),(20,9,NULL,'2025-01-27','',0,-590,590),(21,12,NULL,'2025-01-13','',0,-8869,8869),(22,1,NULL,'2025-01-13','',NULL,NULL,NULL),(23,1,NULL,'2025-01-28','',32880,0,32880),(24,9,NULL,'2025-01-28','',960,-2250,2620),(25,9,NULL,'2025-01-29','',0,-2545,295),(26,19,NULL,'2025-01-29','',0,-500,500),(27,16,NULL,'2025-01-30','',480,0,480),(28,1,NULL,'2025-01-14','',85357,0,85357);
/*!40000 ALTER TABLE `invoices` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `job`
--

LOCK TABLES `job` WRITE;
/*!40000 ALTER TABLE `job` DISABLE KEYS */;
INSERT INTO `job` VALUES (41,'General Manager',NULL);
/*!40000 ALTER TABLE `job` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Table structure for table `purchase order`
--

DROP TABLE IF EXISTS `purchase order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `purchase order` (
  `po_id` int NOT NULL AUTO_INCREMENT,
  `vendor_id` int NOT NULL,
  `po_date` date NOT NULL,
  `ordered_by` varchar(255) DEFAULT NULL,
  `Total_amount` double DEFAULT NULL,
  `Amount_Paid` double DEFAULT NULL,
  `Remaining_Debt` double DEFAULT NULL,
  PRIMARY KEY (`po_id`),
  KEY `vendor_id_idx` (`vendor_id`),
  CONSTRAINT `vendor_id` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`vendor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase order`
--

LOCK TABLES `purchase order` WRITE;
/*!40000 ALTER TABLE `purchase order` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `purchase_report`
--

DROP TABLE IF EXISTS `purchase_report`;
/*!50001 DROP VIEW IF EXISTS `purchase_report`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `purchase_report` AS SELECT 
 1 AS `Drug_Name`,
 1 AS `Vendor_Name`,
 1 AS `purchase_ID`,
 1 AS `price`,
 1 AS `quantity`,
 1 AS `discount`,
 1 AS `total_amount`*/;
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
  `Expiration` char(7) NOT NULL,
  `price` double NOT NULL,
  `quantity` int DEFAULT NULL,
  `Discount` decimal(10,2) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `po_id` int DEFAULT NULL,
  PRIMARY KEY (`purchase_id`),
  KEY `vendor_id` (`vendor_id`),
  KEY `drug_id` (`drug_id`),
  KEY `po_id_idx` (`po_id`),
  CONSTRAINT `po_id` FOREIGN KEY (`po_id`) REFERENCES `purchase order` (`po_id`),
  CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`vendor_id`),
  CONSTRAINT `purchases_ibfk_2` FOREIGN KEY (`drug_id`) REFERENCES `drugs` (`Drug_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchases`
--

LOCK TABLES `purchases` WRITE;
/*!40000 ALTER TABLE `purchases` DISABLE KEYS */;
INSERT INTO `purchases` VALUES (1,19,76,'',105,400,NULL,'2025-01-01',42000,NULL),(2,18,86,'',80,756,NULL,'2024-12-31',60480,NULL),(3,18,110,'',240,200,0.30,'2024-12-31',33600,NULL),(4,18,109,'',120,200,0.30,'2024-12-31',16800,NULL),(5,18,107,'',235,400,0.30,'2024-12-31',65800,NULL),(6,20,111,'',84,86,NULL,'2024-12-31',7224,NULL),(7,20,112,'',47,400,NULL,'2024-12-31',18800,NULL),(8,20,113,'',80,500,NULL,'2024-12-31',40000,NULL),(9,20,114,'',180,100,NULL,'2024-12-31',18000,NULL),(10,21,115,'',108,480,NULL,'2025-01-01',51840,NULL),(11,22,116,'',82,30,NULL,'2025-01-01',2460,NULL),(12,23,192,'',92,450,0.30,'2025-01-11',28980,NULL),(13,23,193,'',110,308,0.30,'2025-01-11',23716,NULL),(14,20,228,'',148,80,NULL,'2025-01-11',11840,NULL);
/*!40000 ALTER TABLE `purchases` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `after_purchase_insert` AFTER INSERT ON `purchases` FOR EACH ROW BEGIN
    DECLARE existing_inventory INT;

    -- Check if an inventory with the same drug_id and expiration exists
    SELECT Inventory_ID INTO existing_inventory
    FROM inventory
    WHERE Drug_ID = NEW.drug_id AND Expiration = NEW.Expiration
    LIMIT 1;

    IF existing_inventory IS NOT NULL THEN
        -- Scenario 1: Update existing inventory
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
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `after_purchase_update` AFTER UPDATE ON `purchases` FOR EACH ROW BEGIN
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
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `after_purchase_delete` AFTER DELETE ON `purchases` FOR EACH ROW BEGIN
    -- Revert the deleted purchase quantities from inventory
    UPDATE inventory
    SET Initial_Amount = Initial_Amount - OLD.quantity,
        Amount_Left = Amount_Left - OLD.quantity
    WHERE Drug_ID = OLD.drug_id AND Expiration = OLD.Expiration;

    -- Optional: Delete the inventory row if Amount_Left becomes 0
    DELETE FROM inventory
    WHERE Drug_ID = OLD.drug_id AND Amount_Left = 0;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

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
-- Dumping data for table `salary`
--

LOCK TABLES `salary` WRITE;
/*!40000 ALTER TABLE `salary` DISABLE KEYS */;
INSERT INTO `salary` VALUES (61,1000,NULL,51,NULL);
/*!40000 ALTER TABLE `salary` ENABLE KEYS */;
UNLOCK TABLES;

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
  `Discount` decimal(5,2) DEFAULT '0.00',
  `Price` double NOT NULL,
  `Cut_ID` int DEFAULT NULL,
  `Customer_ID` int DEFAULT NULL,
  `Total_Price` double NOT NULL,
  `Note` mediumtext,
  `invoice_no` int DEFAULT NULL,
  PRIMARY KEY (`Sales_ID`),
  KEY `Cut_ID` (`Cut_ID`),
  KEY `fk_sales_customer_id` (`Customer_ID`),
  KEY `fk_sales_inventory_id_idx` (`Inventory_ID`),
  KEY `invoice_no_idx` (`invoice_no`),
  CONSTRAINT `fk_sales_customer_id` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`customer_id`),
  CONSTRAINT `fk_sales_inventory` FOREIGN KEY (`Inventory_ID`) REFERENCES `inventory` (`Inventory_ID`),
  CONSTRAINT `invoice_no` FOREIGN KEY (`invoice_no`) REFERENCES `invoices` (`invoice_id`),
  CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`Cut_ID`) REFERENCES `emp_cut` (`Cut_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=35297 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES (1,1,'2024-12-31',10,0.00,45,NULL,NULL,450,NULL,NULL),(2,1,'2024-12-31',5,0.00,40,NULL,NULL,200,NULL,NULL),(3,1,'2024-12-31',1,0.00,60,NULL,NULL,60,NULL,NULL),(4,49,'2024-12-31',50,0.00,85,NULL,1,4250,NULL,NULL),(5,71,'2025-01-01',100,0.00,110,NULL,1,11000,NULL,NULL),(6,57,'2025-01-04',30,NULL,83,NULL,2,2490,NULL,NULL),(7,57,'2025-01-02',5,NULL,88,NULL,1,440,NULL,NULL),(8,1,'2025-01-04',4,NULL,50,NULL,NULL,200,NULL,NULL),(9,1,'2025-01-04',5,NULL,50,NULL,2,250,'Loan',NULL),(10,50,'2025-01-04',100,NULL,136,NULL,3,13600,'Loan',NULL),(11,68,'2024-12-29',10,NULL,110,NULL,1,1100,NULL,NULL),(12,136,'2025-01-07',2,NULL,780,NULL,NULL,1560,NULL,NULL),(13,34,'2024-12-29',20,NULL,130,NULL,1,2600,NULL,NULL),(14,51,'2024-12-29',10,NULL,310,NULL,1,3100,NULL,NULL),(15,6,'2024-12-30',20,NULL,55,NULL,1,1100,NULL,NULL),(16,86,'2024-12-31',50,NULL,20,NULL,1,1000,NULL,NULL),(17,92,'2025-01-01',25,NULL,33,NULL,1,825,NULL,NULL),(18,115,'2025-01-01',10,NULL,175,NULL,1,1750,NULL,NULL),(19,86,'2025-01-01',50,NULL,26,NULL,1,1300,NULL,NULL),(20,83,'2025-01-01',20,NULL,16,NULL,1,320,NULL,NULL),(21,131,'2025-01-01',100,NULL,47,NULL,1,4700,NULL,NULL),(22,49,'2025-01-01',100,NULL,85,NULL,1,8500,NULL,NULL),(23,17,'2025-01-01',5,NULL,128,NULL,1,640,NULL,NULL),(24,57,'2025-01-01',5,NULL,88,NULL,1,440,NULL,NULL),(25,124,'2025-01-02',50,NULL,20,NULL,1,1000,NULL,NULL),(26,16,'2025-01-02',30,NULL,70,NULL,1,2100,NULL,NULL),(27,53,'2025-01-02',20,NULL,90,NULL,1,1800,NULL,NULL),(28,65,'2025-01-01',10,NULL,80,NULL,1,800,NULL,NULL),(29,111,'2025-01-01',20,NULL,45,NULL,1,900,NULL,NULL),(30,71,'2025-01-01',100,NULL,110,NULL,1,11000,NULL,NULL),(31,2,'2025-01-01',10,NULL,90,NULL,1,900,NULL,NULL),(32,68,'2025-01-01',5,NULL,110,NULL,1,550,NULL,NULL),(33,27,'2025-01-01',30,NULL,120,NULL,1,3600,NULL,NULL),(34,89,'2025-01-02',50,NULL,28,NULL,1,1400,NULL,NULL),(35,33,'2025-01-02',50,NULL,33,NULL,1,1650,NULL,NULL),(36,34,'2025-01-02',20,NULL,130,NULL,1,2600,NULL,NULL),(37,49,'2025-01-02',30,NULL,85,NULL,1,2550,NULL,NULL),(38,83,'2025-01-02',20,NULL,16,NULL,1,320,NULL,NULL),(39,55,'2025-01-02',10,NULL,65,NULL,1,650,NULL,NULL),(40,5,'2025-01-02',10,NULL,22,NULL,1,220,NULL,NULL),(41,12,'2025-01-02',10,NULL,42,NULL,1,420,NULL,NULL),(42,92,'2025-01-02',25,NULL,33,NULL,1,825,NULL,NULL),(43,121,'2025-01-02',1,NULL,150,NULL,1,150,NULL,NULL),(44,86,'2025-01-02',50,NULL,25,NULL,1,1250,NULL,NULL),(45,51,'2025-01-03',10,NULL,310,NULL,1,3100,NULL,NULL),(46,115,'2025-01-03',10,NULL,175,NULL,1,1750,NULL,NULL),(47,6,'2025-01-03',20,NULL,55,NULL,1,1100,NULL,NULL),(48,68,'2025-01-03',5,NULL,110,NULL,1,550,NULL,NULL),(49,13,'2025-01-03',10,NULL,60,NULL,1,600,NULL,NULL),(50,45,'2025-01-03',5,NULL,600,NULL,1,3000,NULL,NULL),(51,56,'2025-01-03',4,NULL,210,NULL,1,840,NULL,NULL),(52,31,'2025-01-03',5,NULL,115,NULL,1,575,NULL,NULL),(53,35,'2025-01-03',50,NULL,26,NULL,1,1300,NULL,NULL),(54,49,'2025-01-03',50,NULL,85,NULL,1,4250,NULL,NULL),(55,83,'2025-01-03',20,NULL,16,NULL,1,320,NULL,NULL),(56,18,'2025-01-03',20,NULL,45,NULL,1,900,NULL,NULL),(57,111,'2025-01-03',20,NULL,45,NULL,1,900,NULL,NULL),(58,116,'2025-01-03',1,NULL,780,NULL,1,780,NULL,NULL),(59,92,'2025-01-03',50,NULL,33,NULL,1,1650,NULL,NULL),(60,83,'2025-01-03',16,NULL,40,NULL,1,640,NULL,NULL),(61,84,'2025-01-03',100,NULL,10,NULL,1,1000,NULL,NULL),(62,70,'2025-01-03',40,NULL,40,NULL,1,1600,NULL,NULL),(63,80,'2025-01-03',28,NULL,90,NULL,1,2520,NULL,NULL),(64,104,'2025-01-03',80,NULL,50,NULL,1,4000,NULL,NULL),(65,101,'2025-01-03',20,NULL,40,NULL,1,800,NULL,NULL),(66,81,'2025-01-03',12,NULL,115,NULL,1,1380,NULL,NULL),(67,124,'2025-01-05',100,NULL,20,NULL,1,2000,NULL,NULL),(68,16,'2025-01-05',20,NULL,70,NULL,1,1400,NULL,NULL),(69,45,'2025-01-05',5,NULL,600,NULL,1,3000,NULL,NULL),(70,54,'2025-01-05',10,NULL,22,NULL,1,220,NULL,NULL),(71,90,'2025-01-05',50,NULL,20,NULL,1,1000,NULL,NULL),(72,86,'2025-01-05',50,NULL,25,NULL,1,1250,NULL,NULL),(73,122,'2025-01-05',40,NULL,20,NULL,1,800,NULL,NULL),(74,88,'2025-01-05',50,NULL,40,NULL,1,2000,NULL,NULL),(75,74,'2025-01-05',30,NULL,177,NULL,1,5310,NULL,NULL),(76,120,'2025-01-05',50,NULL,25,NULL,1,1250,NULL,NULL),(77,131,'2025-01-05',200,NULL,47,NULL,1,9400,NULL,NULL),(78,111,'2025-01-05',20,NULL,45,NULL,1,900,NULL,NULL),(79,15,'2025-01-05',10,NULL,40,NULL,1,400,NULL,NULL),(80,137,'2024-01-28',5,NULL,175,NULL,1,875,NULL,NULL),(81,138,'2024-01-28',10,NULL,38,NULL,1,380,NULL,NULL),(82,114,'2024-01-28',60,NULL,13,NULL,1,780,NULL,NULL),(83,139,'2024-01-28',100,NULL,19,NULL,1,1900,NULL,NULL),(84,140,'2024-01-28',50,NULL,14,NULL,1,700,NULL,NULL),(85,141,'2024-01-28',20,NULL,16,NULL,1,320,NULL,NULL),(86,142,'2024-01-28',50,NULL,25,NULL,1,1250,NULL,NULL),(87,143,'2024-01-28',20,NULL,83,NULL,1,1660,NULL,NULL),(88,144,'2024-01-28',30,NULL,74,NULL,1,2220,NULL,NULL),(89,107,'2025-01-09',40,NULL,72,NULL,4,2880,NULL,NULL),(90,75,'2025-01-09',58,NULL,73,NULL,4,4234,NULL,NULL),(91,29,'2025-01-09',20,NULL,268,NULL,4,5360,NULL,NULL),(92,123,'2025-01-09',2,NULL,280,NULL,4,560,NULL,NULL),(93,57,'2025-01-09',2,NULL,85,NULL,4,170,NULL,NULL),(94,133,'2025-01-09',2,NULL,780,NULL,4,1560,NULL,NULL),(95,38,'2025-01-09',5,NULL,580,NULL,6,2900,NULL,NULL),(96,69,'2025-01-09',50,NULL,110,NULL,6,5500,NULL,NULL),(97,68,'2025-01-09',5,NULL,110,NULL,9,550,NULL,NULL),(98,8,'2025-01-09',3,NULL,74,NULL,8,222,NULL,NULL),(99,5,'2025-01-09',5,NULL,53,NULL,5,265,NULL,NULL),(100,4,'2025-01-09',100,NULL,50,NULL,7,5000,NULL,NULL),(101,145,'2024-12-28',5,NULL,88,NULL,1,440,NULL,NULL),(102,146,'2024-12-28',3,NULL,155,NULL,1,465,NULL,NULL),(103,147,'2024-12-28',50,NULL,28,NULL,1,1400,NULL,NULL),(104,148,'2024-12-28',10,NULL,70,NULL,1,700,NULL,NULL),(105,149,'2024-12-28',10,NULL,40,NULL,1,400,NULL,NULL),(106,150,'2024-12-28',50,NULL,40,NULL,1,2000,NULL,NULL),(107,137,'2024-12-29',5,NULL,175,NULL,1,875,NULL,NULL),(108,151,'2024-12-29',20,NULL,95,NULL,1,1900,NULL,NULL),(109,152,'2024-12-29',50,NULL,20,NULL,1,1000,NULL,NULL),(110,153,'2024-12-29',30,NULL,46,NULL,1,1380,NULL,NULL),(111,154,'2024-12-29',40,NULL,70,NULL,1,2800,NULL,NULL),(112,61,'2024-12-29',10,NULL,72,NULL,1,720,NULL,NULL),(113,156,'2024-12-29',20,NULL,22,NULL,1,440,NULL,NULL),(114,157,'2024-12-29',30,NULL,138,NULL,1,4140,NULL,NULL),(115,158,'2024-12-29',20,NULL,200,NULL,1,4000,NULL,NULL),(116,159,'2024-12-29',50,NULL,50,NULL,1,2500,NULL,NULL),(117,160,'2024-12-29',10,NULL,60,NULL,1,600,NULL,NULL),(118,161,'2024-12-30',10,NULL,128,NULL,1,1280,NULL,NULL),(119,162,'2024-12-30',40,NULL,20,NULL,1,800,NULL,NULL),(120,163,'2024-12-30',1,NULL,130,NULL,1,130,NULL,NULL),(121,164,'2024-12-30',45,NULL,60,NULL,1,2700,NULL,NULL),(122,150,'2024-12-30',200,NULL,32,NULL,1,6400,NULL,NULL),(123,165,'2024-12-30',10,NULL,44,NULL,1,440,NULL,NULL),(124,166,'2024-12-30',20,NULL,75,NULL,1,1500,NULL,NULL),(125,167,'2024-12-30',2,NULL,290,NULL,1,580,NULL,NULL),(126,168,'2024-12-30',40,NULL,40,NULL,1,1600,NULL,NULL),(127,157,'2024-12-30',10,NULL,30,NULL,1,300,NULL,NULL),(128,169,'2024-12-30',1,NULL,250,NULL,1,250,NULL,NULL),(129,170,'2024-12-30',1,NULL,150,NULL,1,150,NULL,NULL),(130,171,'2024-12-30',10,NULL,85,NULL,1,850,NULL,NULL),(131,172,'2024-12-30',30,NULL,85,NULL,1,2550,NULL,NULL),(132,173,'2024-12-30',5,NULL,134,NULL,1,670,NULL,NULL),(133,174,'2024-12-30',5,NULL,75,NULL,1,375,NULL,NULL),(134,175,'2024-12-30',40,NULL,110,NULL,1,4400,NULL,NULL),(135,157,'2024-12-30',20,NULL,138,NULL,1,2760,NULL,NULL),(136,140,'2024-12-30',50,NULL,20,NULL,1,1000,NULL,NULL),(137,176,'2024-12-30',30,NULL,9,NULL,1,270,NULL,NULL),(138,177,'2024-12-30',1,NULL,780,NULL,1,780,NULL,NULL),(139,178,'2024-12-30',82,NULL,85,NULL,1,6970,NULL,NULL),(140,179,'2024-12-31',20,NULL,122,NULL,1,2440,NULL,NULL),(141,139,'2024-12-31',100,NULL,19,NULL,1,1900,NULL,NULL),(142,180,'2024-12-31',10,NULL,85,NULL,1,850,NULL,NULL),(143,138,'2024-12-31',5,NULL,30,NULL,1,150,NULL,NULL),(144,181,'2025-01-01',20,NULL,80,NULL,1,1600,NULL,NULL),(145,157,'2025-01-01',30,NULL,138,NULL,1,4140,NULL,NULL),(146,182,'2025-01-01',10,NULL,80,NULL,1,800,NULL,NULL),(147,160,'2025-01-01',10,NULL,60,NULL,1,600,NULL,NULL),(148,162,'2025-01-01',40,NULL,20,NULL,1,800,NULL,NULL),(149,139,'2025-01-01',30,NULL,25,NULL,1,750,NULL,NULL),(150,183,'2025-01-01',30,NULL,20,NULL,1,600,NULL,NULL),(151,168,'2024-12-30',40,NULL,40,NULL,1,1600,NULL,NULL),(152,184,'2025-01-01',10,NULL,30,NULL,1,300,NULL,NULL),(153,176,'2025-01-01',20,NULL,45,NULL,1,900,NULL,NULL),(154,186,'2025-01-01',40,NULL,45,NULL,1,2600,NULL,NULL),(155,178,'2025-01-02',50,NULL,65,NULL,1,3250,NULL,NULL),(156,164,'2025-01-02',45,NULL,60,NULL,1,2700,NULL,NULL),(157,187,'2025-01-02',30,NULL,60,NULL,1,1800,NULL,NULL),(158,150,'2025-01-02',10,NULL,60,NULL,1,600,NULL,NULL),(159,188,'2025-01-02',32,NULL,95,NULL,1,3040,NULL,NULL),(160,184,'2025-01-02',10,NULL,30,NULL,1,300,NULL,NULL),(161,189,'2025-01-02',10,NULL,85,NULL,1,850,NULL,NULL),(162,190,'2025-01-02',20,NULL,32,NULL,1,640,NULL,NULL),(163,191,'2025-01-02',26,NULL,37,NULL,1,740,NULL,NULL),(164,157,'2025-01-02',49,NULL,75,NULL,1,3675,NULL,NULL),(165,192,'2025-01-02',20,NULL,74,NULL,1,1480,NULL,NULL),(166,172,'2025-01-03',20,NULL,85,NULL,1,1700,NULL,NULL),(167,180,'2025-01-03',5,NULL,250,NULL,1,1250,NULL,NULL),(168,143,'2025-01-03',20,NULL,83,NULL,1,1660,NULL,NULL),(169,193,'2025-01-03',5,NULL,185,NULL,1,925,NULL,NULL),(170,104,'2025-01-03',150,NULL,70,NULL,1,10500,NULL,NULL),(171,194,'2025-01-03',110,NULL,83,NULL,1,9130,NULL,NULL),(172,195,'2025-01-03',14,NULL,30,NULL,1,420,NULL,NULL),(173,196,'2025-01-03',10,NULL,50,NULL,1,500,NULL,NULL),(174,139,'2025-01-03',100,NULL,19,NULL,1,1900,NULL,NULL),(175,197,'2025-01-03',100,NULL,28,NULL,1,2800,NULL,NULL),(176,159,'2025-01-03',50,NULL,50,NULL,1,2500,NULL,NULL),(177,198,'2025-01-03',30,NULL,136,NULL,1,4080,NULL,NULL),(178,149,'2025-01-03',10,NULL,40,NULL,1,400,NULL,NULL),(179,199,'2025-01-03',10,NULL,50,NULL,1,500,NULL,NULL),(180,200,'2025-01-03',5,NULL,78,NULL,1,390,NULL,NULL),(181,201,'2025-01-03',5,NULL,65,NULL,1,325,NULL,NULL),(182,202,'2025-01-03',1,NULL,160,NULL,1,160,NULL,NULL),(183,203,'2025-01-03',50,NULL,8,NULL,1,400,NULL,NULL),(184,204,'2025-01-03',1,NULL,240,NULL,1,240,NULL,NULL),(185,178,'2025-01-03',30,NULL,85,NULL,1,2550,NULL,NULL),(186,143,'2025-01-04',30,NULL,83,NULL,1,2490,NULL,NULL),(187,138,'2025-01-04',10,NULL,30,NULL,1,300,NULL,NULL),(188,175,'2025-01-04',20,NULL,110,NULL,1,2200,NULL,NULL),(189,193,'2025-01-04',10,NULL,185,NULL,1,1850,NULL,NULL),(190,205,'2025-01-04',10,NULL,115,NULL,1,1150,NULL,NULL),(191,139,'2025-01-04',60,NULL,19,NULL,1,1140,NULL,NULL),(192,176,'2025-01-04',50,NULL,55,NULL,1,2750,NULL,NULL),(193,206,'2025-01-04',50,NULL,65,NULL,1,3250,NULL,NULL),(194,188,'2025-01-04',20,NULL,95,NULL,1,1900,NULL,NULL),(195,207,'2025-01-04',10,NULL,28,NULL,1,280,NULL,NULL),(34544,93,'2025-01-06',100,0.00,30,NULL,1,3000,NULL,NULL),(34545,124,'2025-01-06',50,0.00,20,NULL,1,1000,NULL,NULL),(34546,6,'2025-01-06',10,0.00,55,NULL,1,550,NULL,NULL),(34547,208,'2025-01-06',20,NULL,94,NULL,1,1880,NULL,NULL),(34548,209,'2025-01-06',5,NULL,210,NULL,1,1050,NULL,NULL),(34549,210,'2025-01-06',10,NULL,102,NULL,1,1020,NULL,NULL),(34550,211,'2025-01-06',50,NULL,48.5,NULL,1,2425,NULL,NULL),(34551,212,'2025-01-06',20,NULL,27,NULL,1,540,NULL,NULL),(34552,172,'2025-01-06',30,NULL,85,NULL,1,1700,NULL,NULL),(34553,13,'2025-01-06',10,NULL,60,NULL,1,600,NULL,NULL),(34554,53,'2025-01-06',20,NULL,70,NULL,1,1400,NULL,NULL),(34555,218,'2025-01-06',50,NULL,88,NULL,1,4400,NULL,NULL),(34556,175,'2025-01-06',10,NULL,115,NULL,1,1150,NULL,NULL),(34557,219,'2025-01-06',10,NULL,30,NULL,1,300,NULL,NULL),(34558,104,'2025-01-06',80,NULL,50,NULL,1,4000,NULL,NULL),(34559,81,'2025-01-06',12,NULL,115,NULL,1,1380,NULL,NULL),(34560,4,'2025-01-06',10,NULL,55,NULL,1,550,NULL,NULL),(34561,160,'2025-01-06',20,NULL,60,NULL,1,1200,NULL,NULL),(34562,16,'2025-01-06',5,NULL,90,NULL,1,450,NULL,NULL),(34563,86,'2025-01-06',30,NULL,26,NULL,1,780,NULL,NULL),(34564,220,'2025-01-06',50,NULL,30,NULL,1,1500,NULL,NULL),(34565,80,'2025-01-06',50,NULL,90,NULL,1,4500,NULL,NULL),(34566,52,'2025-01-06',40,NULL,110,NULL,1,4400,NULL,NULL),(34567,221,'2025-01-06',50,NULL,93,NULL,1,4650,NULL,NULL),(34568,58,'2025-01-06',10,NULL,180,NULL,1,1800,NULL,NULL),(34569,126,'2025-01-06',50,NULL,9,NULL,1,450,NULL,NULL),(34570,55,'2025-01-06',10,NULL,65,NULL,1,650,NULL,NULL),(34571,222,'2025-01-06',50,NULL,195,NULL,1,9750,NULL,NULL),(34572,25,'2025-01-06',10,NULL,70,NULL,1,700,NULL,NULL),(34573,188,'2025-01-06',20,NULL,95,NULL,1,1900,NULL,NULL),(34574,184,'2025-01-06',10,NULL,30,NULL,1,300,NULL,NULL),(34575,202,'2025-01-06',1,NULL,260,NULL,1,260,NULL,NULL),(34576,92,'2025-01-06',50,NULL,33,NULL,1,1650,NULL,NULL),(34577,83,'2025-01-06',20,NULL,16,NULL,1,320,NULL,NULL),(34578,223,'2025-01-06',10,NULL,100,NULL,1,1000,NULL,NULL),(34579,224,'2025-01-06',10,NULL,100,NULL,1,1000,NULL,NULL),(34580,65,'2025-01-12',3,0.00,80,NULL,NULL,240,NULL,NULL),(34581,123,'2025-01-09',1,0.00,280,NULL,1,280,NULL,NULL),(34582,97,'2025-01-06',80,NULL,27,NULL,1,2160,NULL,NULL),(34583,184,'2025-01-06',10,NULL,30,NULL,1,300,NULL,NULL),(34584,26,'2025-01-06',10,NULL,58,NULL,1,580,NULL,NULL),(34585,136,'2025-01-06',10,NULL,180,NULL,1,1800,NULL,NULL),(34586,126,'2025-01-06',530,NULL,9,NULL,1,4770,NULL,NULL),(34587,226,'2025-01-06',10,NULL,54,NULL,1,540,NULL,NULL),(34588,81,'2025-01-06',24,NULL,115,NULL,1,2760,NULL,NULL),(34589,132,'2025-01-06',40,NULL,60,NULL,1,2400,NULL,NULL),(34590,227,'2025-01-06',50,NULL,75,NULL,1,3750,NULL,NULL),(34591,228,'2025-01-06',10,NULL,74,NULL,1,740,NULL,NULL),(34592,229,'2025-01-06',20,NULL,70,NULL,1,1400,NULL,NULL),(34593,101,'2025-01-06',10,NULL,40,NULL,1,400,NULL,NULL),(34594,230,'2025-01-06',5,NULL,170,NULL,1,850,NULL,NULL),(34595,121,'2025-01-06',2,NULL,150,NULL,1,300,NULL,NULL),(34596,231,'2025-01-06',20,NULL,40,NULL,1,800,NULL,NULL),(34597,232,'2025-01-06',5,NULL,300,NULL,1,1500,NULL,NULL),(34598,95,'2025-01-06',60,NULL,26,NULL,1,1560,NULL,NULL),(34599,94,'2025-01-06',40,NULL,21,NULL,1,840,NULL,NULL),(34600,86,'2025-01-06',50,NULL,26,NULL,1,1300,NULL,NULL),(34601,115,'2025-01-06',10,NULL,175,NULL,1,1750,NULL,NULL),(34602,233,'2025-01-06',20,NULL,70,NULL,1,1400,NULL,NULL),(34603,17,'2025-01-06',5,NULL,128,NULL,1,640,NULL,NULL),(34604,234,'2025-01-06',5,NULL,270,NULL,1,1350,NULL,NULL),(34605,146,'2025-01-06',5,NULL,170,NULL,1,850,NULL,NULL),(34606,18,'2025-01-06',10,NULL,44,NULL,1,440,NULL,NULL),(34607,74,'2025-01-06',10,NULL,178,NULL,1,1780,NULL,NULL),(34608,13,'2025-01-06',10,NULL,60,NULL,1,600,NULL,NULL),(34609,236,'2025-01-06',20,NULL,3,NULL,1,60,NULL,NULL),(34610,102,'2025-01-06',80,NULL,25,NULL,1,2000,NULL,NULL),(34611,237,'2025-01-06',20,NULL,105,NULL,1,2100,NULL,NULL),(34612,238,'2025-01-07',20,NULL,85,NULL,1,1700,NULL,NULL),(34613,49,'2025-01-07',100,NULL,85,NULL,1,8500,NULL,NULL),(34614,239,'2025-01-07',1,NULL,120,NULL,1,120,NULL,NULL),(34615,240,'2025-01-07',10,NULL,150,NULL,1,1500,NULL,NULL),(34616,241,'2025-01-07',5,NULL,170,NULL,1,850,NULL,NULL),(34617,242,'2025-01-07',10,NULL,170,NULL,1,1700,NULL,NULL),(34618,96,'2025-01-07',20,NULL,25,NULL,1,500,NULL,NULL),(34619,34,'2025-01-07',20,NULL,130,NULL,1,2600,NULL,NULL),(34620,223,'2025-01-07',168,NULL,100,NULL,1,16800,NULL,NULL),(34621,68,'2025-01-07',8,NULL,115,NULL,1,920,NULL,NULL),(34622,22,'2025-01-07',2,NULL,115,NULL,1,230,NULL,NULL),(34623,243,'2025-01-07',1,NULL,700,NULL,1,700,NULL,NULL),(34624,120,'2025-01-07',40,NULL,25,NULL,1,1000,NULL,NULL),(34625,48,'2025-01-07',10,NULL,44,NULL,1,440,NULL,NULL),(34626,78,'2025-01-07',50,NULL,85,NULL,1,4250,NULL,NULL),(34627,83,'2025-01-07',40,NULL,16,NULL,1,640,NULL,NULL),(34628,108,'2025-01-07',5,NULL,35,NULL,1,175,NULL,NULL),(34629,244,'2025-01-07',10,NULL,128,NULL,1,1280,NULL,NULL),(34630,11,'2025-01-07',12,NULL,195,NULL,1,2340,NULL,NULL),(34631,245,'2025-01-07',24,NULL,22,NULL,1,528,NULL,NULL),(34632,111,'2025-01-07',20,NULL,45,NULL,1,900,NULL,NULL),(34633,85,'2025-01-07',50,NULL,14,NULL,1,700,NULL,NULL),(34634,246,'2025-01-07',3,NULL,100,NULL,1,300,NULL,NULL),(34635,61,'2025-01-07',10,NULL,76,NULL,1,760,NULL,NULL),(34636,27,'2025-01-07',50,NULL,120,NULL,1,6000,NULL,NULL),(34637,247,'2025-01-07',2,NULL,340,NULL,1,680,NULL,NULL),(34638,248,'2025-01-07',50,NULL,140,NULL,1,7000,NULL,NULL),(34639,123,'2025-01-07',5,NULL,285,NULL,1,1425,NULL,NULL),(34640,249,'2025-01-07',5,NULL,34,NULL,1,170,NULL,NULL),(34641,88,'2025-01-07',50,NULL,40,NULL,1,2000,NULL,NULL),(34642,26,'2025-01-13',4,0.00,55,NULL,NULL,220,NULL,NULL),(34643,13,'2025-01-13',2,0.00,54,NULL,14,108,'Damage',NULL),(34644,123,'2025-01-13',20,0.00,280,NULL,11,5600,NULL,NULL),(34645,123,'2025-01-13',20,0.00,280,NULL,NULL,5600,NULL,NULL),(34646,59,'2025-01-08',10,NULL,78,NULL,12,780,NULL,NULL),(34647,250,'2025-01-08',5,NULL,75,NULL,12,375,NULL,NULL),(34648,251,'2025-01-08',10,NULL,52,NULL,12,520,NULL,NULL),(34649,252,'2025-01-08',2,NULL,380,NULL,12,760,NULL,NULL),(34650,253,'2025-01-08',10,NULL,48,NULL,12,480,NULL,NULL),(34651,254,'2025-01-08',10,NULL,38,NULL,12,380,NULL,NULL),(34652,255,'2025-01-08',2,NULL,340,NULL,12,680,NULL,NULL),(34653,256,'2025-01-08',5,NULL,66,NULL,12,330,NULL,NULL),(34654,257,'2025-01-08',1,NULL,260,NULL,12,260,NULL,NULL),(34655,258,'2025-01-08',5,NULL,86,NULL,12,430,NULL,NULL),(34656,259,'2025-01-08',2,NULL,90,NULL,12,180,NULL,NULL),(34657,260,'2025-01-08',5,NULL,20,NULL,12,100,NULL,NULL),(34658,261,'2025-01-08',2,NULL,50,NULL,12,100,NULL,NULL),(34659,262,'2025-01-08',2,NULL,160,NULL,12,320,NULL,NULL),(34660,263,'2025-01-08',2,NULL,310,NULL,12,620,NULL,NULL),(34661,264,'2025-01-08',2,NULL,170,NULL,12,340,NULL,NULL),(34662,207,'2025-01-08',10,NULL,32,NULL,12,320,NULL,NULL),(34663,265,'2025-01-08',1,NULL,500,NULL,12,500,NULL,NULL),(34664,40,'2025-01-08',5,NULL,43,NULL,12,215,NULL,NULL),(34665,266,'2025-01-08',20,NULL,53,NULL,12,1060,NULL,NULL),(34666,9,'2025-01-08',10,NULL,63,NULL,12,630,NULL,NULL),(34667,75,'2025-01-08',10,NULL,73,NULL,12,730,NULL,NULL),(34668,267,'2025-01-08',10,NULL,18,NULL,12,180,NULL,NULL),(34669,268,'2025-01-08',10,NULL,70,NULL,12,700,NULL,NULL),(34670,269,'2025-01-08',5,NULL,95,NULL,12,475,NULL,NULL),(34671,270,'2025-01-08',5,NULL,70,NULL,12,350,NULL,NULL),(34672,271,'2025-01-08',5,NULL,40,NULL,12,200,NULL,NULL),(34673,56,'2025-01-08',2,NULL,210,NULL,12,420,NULL,NULL),(34674,272,'2025-01-08',5,NULL,85,NULL,12,425,NULL,NULL),(34675,273,'2025-01-08',10,NULL,30,NULL,12,300,NULL,NULL),(34676,274,'2025-01-08',10,NULL,8,NULL,12,80,NULL,NULL),(34677,275,'2025-01-08',2,NULL,110,NULL,12,220,NULL,NULL),(34678,143,'2025-01-08',5,NULL,88,NULL,12,440,NULL,NULL),(34679,276,'2025-01-08',10,NULL,34,NULL,12,340,NULL,NULL),(34680,277,'2025-01-08',10,NULL,30,NULL,12,300,NULL,NULL),(34681,228,'2025-01-08',10,NULL,74,NULL,12,400,NULL,NULL),(34682,278,'2025-01-08',10,NULL,18,NULL,12,180,NULL,NULL),(34683,279,'2025-01-08',1,NULL,75,NULL,12,75,NULL,NULL),(34684,280,'2025-01-08',2,NULL,330,NULL,12,660,NULL,NULL),(34685,281,'2025-01-08',10,NULL,24,NULL,12,240,NULL,NULL),(34686,282,'2025-01-08',10,NULL,20,NULL,12,200,NULL,NULL),(34687,283,'2025-01-08',10,NULL,25,NULL,12,250,NULL,NULL),(34688,284,'2025-01-08',10,NULL,78,NULL,12,780,NULL,NULL),(34689,285,'2025-01-08',5,NULL,35,NULL,12,175,NULL,NULL),(34690,286,'2025-01-08',5,NULL,60,NULL,12,300,NULL,NULL),(34691,67,'2025-01-08',10,NULL,60,NULL,12,600,NULL,NULL),(34692,287,'2025-01-08',1,NULL,180,NULL,12,180,NULL,NULL),(34693,287,'2025-01-08',2,NULL,150,NULL,12,300,NULL,NULL),(34694,232,'2025-01-08',2,NULL,270,NULL,12,540,NULL,NULL),(34695,289,'2025-01-08',5,NULL,45,NULL,12,225,NULL,NULL),(34696,290,'2025-01-08',5,NULL,43,NULL,12,215,NULL,NULL),(34697,291,'2025-01-08',2,NULL,170,NULL,12,340,NULL,NULL),(34698,292,'2025-01-08',96,NULL,4.5,NULL,12,432,NULL,NULL),(34699,293,'2025-01-08',2,NULL,90,NULL,12,180,NULL,NULL),(34700,294,'2025-01-08',2,NULL,70,NULL,12,140,NULL,NULL),(34701,57,'2025-01-08',5,NULL,85,NULL,12,425,NULL,NULL),(34702,295,'2025-01-08',10,NULL,31,NULL,12,310,NULL,NULL),(34703,296,'2025-01-08',20,NULL,22,NULL,12,440,NULL,NULL),(34704,297,'2025-01-08',20,NULL,40,NULL,12,800,NULL,NULL),(34705,203,'2025-01-08',50,NULL,6,NULL,12,300,NULL,NULL),(34706,24,'2025-01-08',5,NULL,32,NULL,12,160,NULL,NULL),(34707,200,'2025-01-08',5,NULL,78,NULL,12,390,NULL,NULL),(34708,234,'2025-01-08',2,NULL,250,NULL,12,500,NULL,NULL),(34709,146,'2025-01-08',2,NULL,150,NULL,12,300,NULL,NULL),(34710,52,'2025-01-08',5,NULL,110,NULL,12,550,NULL,NULL),(34711,299,'2025-01-08',1,NULL,80,NULL,12,80,NULL,NULL),(34712,100,'2025-01-13',10,0.00,18,NULL,NULL,180,NULL,NULL),(34713,9,'2025-01-08',48,NULL,63,NULL,13,3024,NULL,NULL),(34714,75,'2025-01-08',48,NULL,73,NULL,13,3504,NULL,NULL),(34715,56,'2025-01-08',5,NULL,205,NULL,13,1025,NULL,NULL),(34716,54,'2025-01-08',20,NULL,21,NULL,13,420,NULL,NULL),(34717,29,'2025-01-08',2,NULL,275,NULL,13,550,NULL,NULL),(34718,11,'2025-01-08',20,NULL,190,NULL,13,3800,NULL,NULL),(34719,44,'2025-01-08',5,NULL,235,NULL,13,1175,NULL,NULL),(34720,6,'2025-01-08',10,NULL,53,NULL,13,530,NULL,NULL),(34721,8,'2025-01-08',10,NULL,21,NULL,13,210,NULL,NULL),(34722,57,'2025-01-08',10,NULL,85,NULL,13,850,NULL,NULL),(34723,33,'2025-01-08',40,NULL,32,NULL,13,1280,NULL,NULL),(34724,300,'2025-01-08',10,NULL,60,NULL,1,600,NULL,NULL),(34725,7,'2025-01-08',20,NULL,60,NULL,1,1200,NULL,NULL),(34726,47,'2025-01-08',1,NULL,315,NULL,1,315,NULL,NULL),(34727,96,'2025-01-08',10,NULL,25,NULL,1,250,NULL,NULL),(34728,301,'2025-01-08',1,NULL,180,NULL,1,180,NULL,NULL),(34729,51,'2025-01-08',10,NULL,315,NULL,1,3150,NULL,NULL),(34730,302,'2025-01-08',1,NULL,220,NULL,1,220,NULL,NULL),(34731,81,'2025-01-08',12,NULL,115,NULL,1,1380,NULL,NULL),(34732,23,'2025-01-08',10,NULL,55,NULL,1,550,NULL,NULL),(34733,180,'2025-01-08',5,NULL,260,NULL,1,1300,NULL,NULL),(34734,116,'2025-01-08',1,NULL,600,NULL,1,600,NULL,NULL),(34735,188,'2025-01-08',20,NULL,95,NULL,1,1900,NULL,NULL),(34736,303,'2025-01-08',50,NULL,90,NULL,1,4500,NULL,NULL),(34737,232,'2025-01-08',1,NULL,300,NULL,1,300,NULL,NULL),(34738,189,'2025-01-08',5,NULL,85,NULL,1,425,NULL,NULL),(34739,91,'2025-01-08',50,NULL,25,NULL,1,1250,NULL,NULL),(34740,86,'2025-01-08',50,NULL,26,NULL,1,1300,NULL,NULL),(34741,304,'2025-01-08',5,NULL,150,NULL,1,750,NULL,NULL),(34742,246,'2025-01-08',5,NULL,380,NULL,1,1900,NULL,NULL),(34743,15,'2025-01-08',10,NULL,40,NULL,1,400,NULL,NULL),(34744,73,'2025-01-08',30,NULL,90,NULL,1,2700,NULL,NULL),(34745,65,'2025-01-08',10,NULL,75,NULL,1,750,NULL,NULL),(34746,57,'2025-01-08',10,NULL,88,NULL,1,880,NULL,NULL),(34747,76,'2025-01-08',10,NULL,88,NULL,1,880,NULL,NULL),(34748,32,'2025-01-08',20,NULL,40,NULL,1,800,NULL,NULL),(34749,305,'2025-01-08',12,NULL,130,NULL,1,1560,NULL,NULL),(34750,99,'2025-01-08',50,NULL,38,NULL,1,1900,NULL,NULL),(34751,123,'2025-01-08',1,NULL,285,NULL,1,285,NULL,NULL),(34752,306,'2025-01-08',10,NULL,25,NULL,1,250,NULL,NULL),(34753,16,'2025-01-14',30,0.00,88,NULL,NULL,2640,NULL,NULL),(34754,38,'2025-01-14',1,0.00,590,NULL,NULL,590,NULL,NULL),(34755,88,'2025-01-14',2,0.00,40,NULL,NULL,80,NULL,NULL),(34756,47,'2025-01-14',2,0.00,310,NULL,9,620,NULL,NULL),(34757,13,'2025-01-15',10,0.00,777,NULL,4,7770,NULL,NULL),(34758,189,'2025-01-15',20,0.00,85,NULL,4,1700,NULL,NULL),(34759,69,'2025-01-15',5,0.00,110,NULL,5,550,NULL,NULL),(34909,53,'2025-01-09',30,NULL,70,NULL,1,2100,NULL,NULL),(34910,150,'2025-01-09',100,NULL,32,NULL,1,3200,NULL,NULL),(34911,124,'2025-01-09',50,NULL,20,NULL,1,1000,NULL,NULL),(34912,325,'2025-01-09',5,NULL,70,NULL,1,350,NULL,NULL),(34913,16,'2025-01-09',5,NULL,90,NULL,1,450,NULL,NULL),(34914,184,'2025-01-09',10,NULL,30,NULL,1,300,NULL,NULL),(34915,39,'2025-01-09',10,NULL,55,NULL,1,550,NULL,NULL),(34916,175,'2025-01-09',20,NULL,110,NULL,1,2200,NULL,NULL),(34917,136,'2025-01-09',10,NULL,180,NULL,1,1800,NULL,NULL),(34918,104,'2025-01-09',60,NULL,50,NULL,1,3000,NULL,NULL),(34919,119,'2025-01-09',3,NULL,255,NULL,1,765,NULL,NULL),(34920,326,'2025-01-09',12,NULL,75,NULL,1,900,NULL,NULL),(34921,50,'2025-01-09',10,NULL,150,NULL,1,1500,NULL,NULL),(34922,34,'2025-01-09',20,NULL,130,NULL,1,2600,NULL,NULL),(34923,131,'2025-01-09',200,NULL,47,NULL,1,9400,NULL,NULL),(34924,168,'2025-01-09',40,NULL,58,NULL,1,2320,NULL,NULL),(34925,30,'2025-01-09',5,NULL,250,NULL,1,1250,NULL,NULL),(34926,98,'2025-01-09',60,NULL,25,NULL,1,1500,NULL,NULL),(34927,172,'2025-01-09',30,NULL,80,NULL,1,2400,NULL,NULL),(34928,219,'2025-01-09',10,NULL,30,NULL,1,300,NULL,NULL),(34929,92,'2025-01-09',50,NULL,33,NULL,1,1650,NULL,NULL),(34930,81,'2025-01-09',24,NULL,115,NULL,1,2760,NULL,NULL),(34931,132,'2025-01-09',40,NULL,60,NULL,1,2400,NULL,NULL),(34932,180,'2025-01-09',10,NULL,85,NULL,1,850,NULL,NULL),(34933,48,'2025-01-09',10,NULL,44,NULL,1,440,NULL,NULL),(34934,25,'2025-01-09',10,NULL,68,NULL,1,680,NULL,NULL),(34935,327,'2025-01-09',10,NULL,250,NULL,1,2500,NULL,NULL),(34936,87,'2025-01-09',60,NULL,22,NULL,1,1320,NULL,NULL),(34937,54,'2025-01-09',20,NULL,22,NULL,1,440,NULL,NULL),(34938,101,'2025-01-09',10,NULL,40,NULL,1,400,NULL,NULL),(34939,83,'2025-01-09',20,NULL,16,NULL,1,320,NULL,NULL),(34940,328,'2025-01-09',50,NULL,72,NULL,1,3600,NULL,NULL),(34941,329,'2025-01-09',5,NULL,140,NULL,1,700,NULL,NULL),(34942,67,'2025-01-09',20,NULL,60,NULL,1,1200,NULL,NULL),(34943,290,'2025-01-09',10,NULL,25,NULL,1,250,NULL,NULL),(34944,36,'2025-01-09',50,NULL,22,NULL,1,1100,NULL,NULL),(34945,111,'2025-01-09',40,NULL,45,NULL,1,1800,NULL,NULL),(34946,122,'2025-01-09',40,NULL,18,NULL,1,720,NULL,NULL),(34947,86,'2025-01-09',50,NULL,26,NULL,1,1300,NULL,NULL),(34948,330,'2025-01-09',1,NULL,140,NULL,1,140,NULL,NULL),(34949,115,'2025-01-09',5,NULL,175,NULL,1,875,NULL,NULL),(34950,331,'2025-01-09',10,NULL,75,NULL,1,750,NULL,NULL),(34951,70,'2025-01-09',40,NULL,40,NULL,1,1600,NULL,NULL),(34952,6,'2025-01-09',10,NULL,55,NULL,1,550,NULL,NULL),(34953,27,'2025-01-09',30,NULL,120,NULL,1,3600,NULL,NULL),(34954,332,'2025-01-09',50,NULL,191,NULL,1,9550,NULL,NULL),(34955,99,'2025-01-09',50,NULL,38,NULL,1,1900,NULL,NULL),(34956,203,'2025-01-09',50,NULL,7.5,NULL,1,375,NULL,NULL),(34957,200,'2025-01-09',5,NULL,75,NULL,1,375,NULL,NULL),(34958,333,'2025-01-09',5,NULL,90,NULL,1,450,NULL,NULL),(34959,4,'2025-01-09',20,NULL,55,NULL,1,1100,NULL,NULL),(34960,14,'2025-01-09',30,NULL,90,NULL,1,2700,NULL,NULL),(34961,52,'2025-01-09',30,NULL,110,NULL,1,3300,NULL,NULL),(34962,74,'2025-01-09',20,NULL,177,NULL,1,3540,NULL,NULL),(34963,13,'2025-01-09',10,NULL,60,NULL,1,600,NULL,NULL),(34964,130,'2025-01-09',20,NULL,35,NULL,1,700,NULL,NULL),(34965,202,'2025-01-09',1,NULL,270,NULL,1,270,NULL,NULL),(34966,321,'2025-01-09',20,NULL,70,NULL,1,1400,NULL,NULL),(34967,89,'2025-01-09',50,NULL,28,NULL,1,1400,NULL,NULL),(34968,80,'2025-01-09',66,NULL,90,NULL,1,5940,NULL,NULL),(34969,4,'2025-01-16',30,0.00,55,NULL,6,1650,NULL,NULL),(34970,10,'2025-01-16',30,0.00,60,NULL,6,1800,NULL,NULL),(34971,57,'2025-01-16',1,0.00,85,NULL,NULL,85,NULL,NULL),(34972,9,'2025-01-16',1,0.00,65,NULL,NULL,65,NULL,NULL),(34973,316,'2025-01-16',1,0.00,65,NULL,NULL,65,NULL,NULL),(34974,189,'2025-01-16',1,0.00,85,NULL,NULL,85,NULL,NULL),(34975,51,'2025-01-16',10,0.00,308,NULL,NULL,3080,NULL,NULL),(34976,123,'2025-01-16',1,0.00,280,NULL,10,280,NULL,NULL),(34977,61,'2025-01-16',1,0.00,80,NULL,NULL,80,NULL,NULL),(34984,342,'2025-01-11',2,0.00,220,NULL,1,440,NULL,NULL),(34985,66,'2025-01-11',5,0.00,175,NULL,1,875,NULL,NULL),(34986,26,'2025-01-11',10,0.00,58,NULL,1,580,NULL,NULL),(34987,22,'2025-01-11',10,0.00,115,NULL,1,1150,NULL,NULL),(34988,53,'2025-01-11',20,0.00,70,NULL,1,1400,NULL,NULL),(34989,335,'2025-01-11',10,0.00,295,NULL,1,2950,'',NULL),(34990,45,'2025-01-18',5,0.00,600,NULL,1,3000,NULL,NULL),(34991,136,'2025-01-11',5,0.00,180,NULL,1,900,NULL,NULL),(34992,336,'2025-01-11',1,0.00,350,NULL,1,350,NULL,NULL),(34993,189,'2025-01-11',10,0.00,86,NULL,13,860,NULL,NULL),(34994,337,'2025-01-11',39,0.00,144,NULL,1,5616,NULL,NULL),(34995,38,'2025-01-11',5,0.00,600,NULL,1,3000,NULL,NULL),(34999,213,'2025-01-11',60,0.00,70,NULL,1,4200,NULL,NULL),(35000,123,'2025-01-19',6,0.00,280,NULL,10,1680,NULL,NULL),(35001,194,'2025-01-11',22,0.00,82,NULL,1,1804,NULL,NULL),(35002,81,'2025-01-11',12,0.00,115,NULL,1,1380,NULL,NULL),(35003,22,'2025-01-19',5,0.00,110,NULL,9,550,NULL,NULL),(35004,73,'2025-01-19',1,0.00,100,NULL,NULL,100,NULL,NULL),(35005,119,'2025-01-19',1,0.00,250,NULL,4,250,NULL,NULL),(35006,234,'2025-01-20',1,0.00,250,NULL,NULL,250,NULL,NULL),(35007,14,'2025-01-20',5,0.00,92,NULL,13,460,NULL,NULL),(35008,59,'2025-01-11',20,0.00,80,NULL,1,1600,NULL,NULL),(35009,132,'2025-01-11',80,0.00,60,NULL,1,4800,NULL,NULL),(35010,227,'2025-01-20',20,0.00,76,NULL,10,1520,NULL,NULL),(35011,215,'2025-01-20',20,0.00,175,NULL,1,3500,NULL,NULL),(35013,93,'2025-01-11',50,0.00,25,NULL,1,1250,NULL,NULL),(35015,10,'2025-01-11',10,0.00,55,NULL,1,550,NULL,NULL),(35016,103,'2025-01-11',50,0.00,25,NULL,1,1250,'',NULL),(35018,123,'2025-01-20',3,0.00,280,NULL,10,840,NULL,NULL),(35019,227,'2025-01-21',10,0.00,76,NULL,NULL,760,NULL,NULL),(35020,75,'2025-01-21',1,0.00,80,NULL,NULL,80,NULL,NULL),(35023,55,'2025-01-21',10,0.00,65,NULL,NULL,650,NULL,NULL),(35024,25,'2025-01-21',10,0.00,68,NULL,NULL,680,'',NULL),(35025,184,'2025-01-11',40,0.00,30,NULL,1,1200,NULL,1),(35026,199,'2025-01-11',10,0.00,50,NULL,1,500,'',1),(35027,200,'2025-01-11',10,0.00,75,NULL,1,750,'',1),(35028,71,'2025-01-11',30,0.00,120,NULL,1,3600,'',1),(35029,40,'2025-01-11',10,0.00,45,NULL,1,450,'',1),(35030,102,'2025-01-11',60,0.00,25,NULL,1,1500,'',1),(35031,338,'2025-01-11',5,0.00,5,NULL,1,25,'',1),(35032,167,'2025-01-11',2,0.00,290,NULL,1,580,'',1),(35033,24,'2025-01-11',10,0.00,33,NULL,1,330,'',1),(35034,339,'2025-01-11',5,0.00,30,NULL,1,150,'',1),(35035,33,'2025-01-11',50,0.00,33,NULL,1,1650,'',1),(35036,340,'2025-01-11',10,0.00,110,NULL,1,1100,'',1),(35037,341,'2025-01-11',20,0.00,80,NULL,1,1600,'',1),(35038,119,'2025-01-12',5,0.00,252,NULL,13,1260,NULL,2),(35039,131,'2025-01-12',100,0.00,45,NULL,13,4500,'',2),(35040,126,'2025-01-12',20,0.00,8,NULL,13,160,'',2),(35041,110,'2025-01-12',24,0.00,54,NULL,13,1296,'',2),(35042,87,'2025-01-12',20,0.00,20,NULL,13,400,'',2),(35043,121,'2025-01-12',5,0.00,133,NULL,13,665,'',2),(35044,83,'2025-01-12',60,0.00,16,NULL,13,960,'',2),(35045,91,'2025-01-12',20,0.00,25,NULL,13,500,'',2),(35046,111,'2025-01-12',20,0.00,43,NULL,13,860,'',2),(35047,86,'2025-01-12',100,0.00,25,NULL,13,2500,'',2),(35048,135,'2025-01-12',20,0.00,15,NULL,13,300,'',2),(35049,128,'2025-01-12',4,0.00,175,NULL,13,700,'',2),(35050,123,'2025-01-12',5,0.00,280,NULL,13,1400,'',2),(35051,130,'2025-01-12',40,0.00,35,NULL,13,1400,'',2),(35052,117,'2025-01-12',24,0.00,79,NULL,13,1896,'',2),(35053,125,'2025-01-12',3,0.00,20,NULL,13,60,'',2),(35054,227,'2025-01-22',10,0.00,78,NULL,16,780,NULL,4),(35055,128,'2025-01-22',1,0.00,175,NULL,16,175,'',4),(35056,135,'2025-01-22',10,0.00,15,NULL,16,150,'',4),(35057,54,'2025-01-22',10,0.00,22,NULL,16,220,'',4),(35058,57,'2025-01-22',1,0.00,80,NULL,NULL,80,NULL,NULL),(35060,11,'2025-01-23',12,0.00,93,NULL,4,1116,NULL,5),(35061,123,'2025-01-23',5,0.00,280,NULL,10,1400,NULL,6),(35062,189,'2025-01-23',10,0.00,87,NULL,NULL,870,NULL,NULL),(35063,121,'2025-01-23',1,0.00,135,NULL,NULL,135,'',NULL),(35064,136,'2025-01-23',2,0.00,170,NULL,13,340,NULL,7),(35065,45,'2025-01-23',2,0.00,590,NULL,15,1180,NULL,NULL),(35066,30,'2025-01-23',5,0.00,240,NULL,NULL,1200,'',NULL),(35067,27,'2025-01-23',10,0.00,120,NULL,17,1200,NULL,8),(35068,13,'2025-01-25',5,0.00,57,NULL,NULL,285,NULL,NULL),(35069,43552,'2025-01-25',5,0.00,120,NULL,NULL,600,'',NULL),(35070,81,'2025-01-25',2,0.00,120,NULL,NULL,240,NULL,NULL),(35071,47,'2025-01-25',1,0.00,310,NULL,NULL,310,'',NULL),(35072,54,'2025-01-25',1,0.00,22,NULL,NULL,22,NULL,NULL),(35073,43553,'2025-01-25',1,0.00,180,NULL,NULL,180,'',NULL),(35074,22,'2025-01-25',1,0.00,110,NULL,NULL,110,NULL,NULL),(35075,124,'2025-01-25',1,0.00,20,NULL,NULL,20,'',NULL),(35076,227,'2025-01-26',48,0.00,78,NULL,NULL,3744,NULL,NULL),(35077,24,'2025-01-26',5,0.00,32,NULL,NULL,160,'',NULL),(35078,44,'2025-01-25',48,0.00,233,NULL,NULL,11184,NULL,NULL),(35079,50,'2025-01-25',2,0.00,140,NULL,NULL,280,'',NULL),(35080,123,'2025-01-25',20,0.00,280,NULL,NULL,5600,'',NULL),(35081,43550,'2025-01-25',1,0.00,70,NULL,NULL,70,'',NULL),(35082,38,'2025-01-25',1,0.00,590,NULL,NULL,590,'',NULL),(35083,135,'2025-01-25',1,0.00,1,NULL,NULL,1,'',NULL),(35084,123,'2025-01-26',20,0.00,288,NULL,NULL,5760,NULL,NULL),(35085,133,'2025-01-26',5,0.00,780,NULL,NULL,3900,NULL,NULL),(35086,4,'2025-01-26',5,0.00,56,NULL,NULL,280,'',NULL),(35087,119,'2025-01-26',20,0.00,257.5,NULL,NULL,5150,'',NULL),(35088,65,'2025-01-26',10,0.00,77,NULL,6,770,NULL,9),(35089,247,'2025-01-26',5,0.00,350,NULL,6,1750,'',9),(35090,69,'2025-01-26',50,0.00,110,NULL,6,5500,'',9),(35094,96,'2025-01-26',10,0.00,25,NULL,15,250,NULL,10),(35099,13,'2025-01-25',20,0.00,57,NULL,4,1140,NULL,11),(35101,123,'2025-01-26',5,0.00,290,NULL,NULL,1450,NULL,NULL),(35102,123,'2025-01-26',10,0.00,290,NULL,10,2900,NULL,12),(35103,123,'2025-01-25',20,0.00,280,NULL,10,5600,NULL,13),(35104,227,'2025-01-26',10,0.00,82,NULL,16,820,NULL,14),(35105,13,'2025-01-26',10,0.00,59,NULL,13,590,NULL,15),(35106,52,'2025-01-26',10,0.00,105,NULL,13,1050,'',15),(35107,14,'2025-01-26',10,0.00,92,NULL,13,920,'',15),(35108,65,'2025-01-26',10,0.00,77,NULL,13,770,'',15),(35109,9,'2025-01-26',10,0.00,65,NULL,13,650,'',15),(35110,75,'2025-01-26',10,0.00,80,NULL,13,800,'',15),(35111,123,'2025-01-26',2,0.00,290,NULL,13,580,'',15),(35112,45,'2025-01-26',3,0.00,580,NULL,13,1740,'',15),(35113,115,'2025-01-26',24,0.00,173,NULL,13,4152,NULL,15),(35114,115,'2025-01-26',24,0.00,173,NULL,13,4152,NULL,15),(35115,21,'2025-01-26',4,0.00,70,NULL,17,280,NULL,16),(35116,85,'2025-01-26',4,0.00,15,NULL,NULL,60,NULL,NULL),(35117,175,'2025-01-26',1,0.00,100,NULL,8,100,NULL,17),(35119,58,'2025-01-26',1,0.00,150,NULL,NULL,150,NULL,NULL),(35120,43554,'2025-01-26',2,0.00,300,NULL,1,600,NULL,18),(35121,150,'2025-01-26',100,0.00,32,NULL,1,3200,'',18),(35122,61,'2025-01-26',10,0.00,76,NULL,1,760,'',18),(35123,97,'2025-01-26',100,0.00,25,NULL,1,2500,'',18),(35124,344,'2025-01-26',20,0.00,95,NULL,1,1900,'',18),(35125,49,'2025-01-26',50,0.00,85,NULL,1,4250,'',18),(35126,345,'2025-01-26',10,0.00,27,NULL,1,270,'',18),(35127,96,'2025-01-26',30,0.00,25,NULL,1,750,'',18),(35128,317,'2025-01-26',5,0.00,80,NULL,1,400,'',18),(35129,346,'2025-01-26',2,0.00,60,NULL,1,120,'',18),(35130,213,'2025-01-26',60,0.00,70,NULL,1,4200,'',18),(35131,93,'2025-01-26',100,0.00,25,NULL,1,2500,'',18),(35132,30,'2025-01-26',5,0.00,250,NULL,1,1250,'',18),(35133,56,'2025-01-26',5,0.00,215,NULL,1,1075,'',18),(35134,81,'2025-01-26',12,0.00,115,NULL,1,1380,'',18),(35135,41,'2025-01-26',5,0.00,60,NULL,1,300,'',18),(35136,310,'2025-01-26',5,0.00,85,NULL,1,425,'',18),(35137,120,'2025-01-26',50,0.00,25,NULL,1,1250,'',18),(35138,48,'2025-01-26',10,0.00,44,NULL,1,440,'',18),(35139,25,'2025-01-26',10,0.00,68,NULL,1,680,'',18),(35140,43545,'2025-01-26',5,0.00,34,NULL,1,170,'',18),(35141,43546,'2025-01-26',10,0.00,25,NULL,1,250,'',18),(35142,101,'2025-01-26',10,0.00,40,NULL,1,400,'',18),(35143,83,'2025-01-26',100,0.00,16,NULL,1,1600,'',18),(35144,35,'2025-01-26',30,0.00,26,NULL,1,780,'',18),(35145,214,'2025-01-26',40,0.00,83,NULL,1,3320,'',18),(35146,85,'2025-01-26',20,0.00,14,NULL,1,280,'',18),(35147,86,'2025-01-26',50,0.00,26,NULL,1,1300,'',18),(35148,225,'2025-01-26',59,0.00,35,NULL,1,2065,'',18),(35149,158,'2025-01-26',10,0.00,200,NULL,1,2000,'',18),(35150,43547,'2025-01-26',10,0.00,27,NULL,1,270,'',18),(35151,233,'2025-01-26',20,0.00,80,NULL,1,1600,'',18),(35152,43548,'2025-01-26',50,0.00,56,NULL,1,2800,'',18),(35153,129,'2025-01-26',10,0.00,85,NULL,1,850,'',18),(35154,70,'2025-01-26',40,0.00,40,NULL,1,1600,'',18),(35155,107,'2025-01-26',8,0.00,73,NULL,1,584,'',18),(35156,6,'2025-01-26',5,0.00,55,NULL,1,275,'',18),(35157,21,'2025-01-26',5,0.00,85,NULL,1,425,'',18),(35158,99,'2025-01-26',50,0.00,38,NULL,1,1900,'',18),(35159,55,'2025-01-26',10,0.00,65,NULL,1,650,'',18),(35160,333,'2025-01-26',5,0.00,95,NULL,1,475,'',18),(35161,43549,'2025-01-26',20,0.00,38,NULL,1,760,'',18),(35162,74,'2025-01-26',30,0.00,177,NULL,1,5310,'',18),(35163,13,'2025-01-26',20,0.00,60,NULL,1,1200,'',18),(35164,28,'2025-01-26',10,0.00,70,NULL,1,700,'',18),(35165,100,'2025-01-26',100,0.00,15,NULL,1,1500,'',18),(35166,125,'2025-01-26',5,0.00,20,NULL,1,100,'',18),(35167,17,'2025-01-26',10,0.00,128,NULL,1,1280,'',18),(35168,45,'2025-01-27',5,0.00,590,NULL,18,2950,NULL,19),(35170,67,'2025-01-27',1,0.00,60,NULL,NULL,60,NULL,NULL),(35171,188,'2025-01-27',5,0.00,96,NULL,NULL,480,NULL,NULL),(35172,123,'2025-01-27',2,0.00,295,NULL,9,590,NULL,20),(35173,121,'2025-01-13',5,0.00,133,NULL,12,665,NULL,21),(35174,123,'2025-01-13',3,0.00,280,NULL,12,840,'',21),(35175,119,'2025-01-13',3,0.00,252,NULL,12,756,'',21),(35176,134,'2025-01-13',2,0.00,74,NULL,12,148,'',21),(35177,86,'2025-01-13',20,0.00,25,NULL,12,500,'',21),(35178,128,'2025-01-13',3,0.00,175,NULL,12,525,'',21),(35179,127,'2025-01-13',3,0.00,175,NULL,12,525,'',21),(35180,126,'2025-01-13',50,0.00,8,NULL,12,400,'',21),(35181,108,'2025-01-13',10,0.00,34,NULL,12,340,'',21),(35182,90,'2025-01-13',20,0.00,16,NULL,12,320,'',21),(35183,91,'2025-01-13',20,0.00,25,NULL,12,500,'',21),(35184,87,'2025-01-13',20,0.00,20,NULL,12,400,'',21),(35185,135,'2025-01-13',20,0.00,15,NULL,12,300,'',21),(35186,83,'2025-01-13',20,0.00,16,NULL,12,320,'',21),(35187,147,'2025-01-13',50,0.00,7,NULL,12,350,'',21),(35188,43556,'2025-01-13',10,0.00,38,NULL,12,380,'',21),(35189,172,'2025-01-13',24,0.00,10,NULL,12,240,'',21),(35190,43557,'2025-01-13',3,0.00,130,NULL,12,390,'',21),(35191,43558,'2025-01-13',30,0.00,13,NULL,12,390,'',21),(35192,43559,'2025-01-13',10,0.00,36,NULL,12,360,'',21),(35193,289,'2025-01-13',5,0.00,44,NULL,12,220,'',21),(35194,83,'2025-01-28',20,0.00,16.5,NULL,NULL,330,NULL,NULL),(35195,86,'2025-01-28',10,0.00,26,NULL,NULL,260,'',NULL),(35196,128,'2025-01-28',1,0.00,180,NULL,NULL,180,'',NULL),(35197,14,'2025-01-28',1,0.00,90,NULL,NULL,90,NULL,NULL),(35198,43553,'2025-01-28',2,0.00,280,NULL,NULL,560,'',NULL),(35199,53,'2025-01-28',20,0.00,70,NULL,1,1400,NULL,23),(35200,43560,'2025-01-28',10,0.00,65,NULL,1,650,'',23),(35201,43561,'2025-01-28',9,0.00,35,NULL,1,315,'',23),(35202,195,'2025-01-28',10,0.00,27,NULL,1,270,'',23),(35203,40,'2025-01-28',20,0.00,43,NULL,1,860,'',23),(35204,39,'2025-01-28',10,0.00,50,NULL,1,500,'',23),(35205,43562,'2025-01-28',20,0.00,200,NULL,1,4000,'',23),(35206,92,'2025-01-28',50,0.00,33,NULL,1,1650,'',23),(35207,48,'2025-01-28',10,0.00,44,NULL,1,440,'',23),(35208,25,'2025-01-28',10,0.00,68,NULL,1,680,'',23),(35209,43563,'2025-01-28',5,0.00,95,NULL,1,475,'',23),(35210,280,'2025-01-28',5,0.00,87,NULL,1,435,'',23),(35211,72,'2025-01-28',20,0.00,177,NULL,1,3540,'',23),(35212,43564,'2025-01-28',5,0.00,130,NULL,1,650,'',23),(35213,43,'2025-01-28',10,0.00,58,NULL,1,580,'',23),(35214,43559,'2025-01-28',10,0.00,35,NULL,1,350,'',23),(35215,90,'2025-01-28',20,0.00,20,NULL,1,400,'',23),(35216,111,'2025-01-28',30,0.00,45,NULL,1,1350,'',23),(35217,86,'2025-01-28',80,0.00,26,NULL,1,2080,'',23),(35218,115,'2025-01-28',18,0.00,175,NULL,1,3150,'',23),(35219,57,'2025-01-28',10,0.00,88,NULL,1,880,'',23),(35220,99,'2025-01-28',100,0.00,38,NULL,1,3800,'',23),(35221,200,'2025-01-28',10,0.00,75,NULL,1,750,'',23),(35222,31,'2025-01-28',5,0.00,115,NULL,1,575,'',23),(35223,4,'2025-01-28',20,0.00,55,NULL,1,1100,'',23),(35224,13,'2025-01-28',20,0.00,60,NULL,1,1200,'',23),(35225,317,'2025-01-28',10,0.00,80,NULL,1,800,'',23),(35228,60,'2025-01-28',1,0.00,300,NULL,NULL,300,NULL,NULL),(35229,43552,'2025-01-28',1,0.00,120,NULL,NULL,120,'',NULL),(35230,43550,'2025-01-28',1,0.00,100,NULL,NULL,100,'',NULL),(35232,123,'2025-01-28',2,0.00,295,NULL,9,590,NULL,24),(35233,56,'2025-01-28',5,0.00,214,NULL,9,1070,'',24),(35234,8,'2025-01-28',10,0.00,20,NULL,9,200,NULL,24),(35235,127,'2025-01-28',1,0.00,170,NULL,9,170,'',24),(35236,22,'2025-01-28',5,0.00,118,NULL,9,590,'',24),(35238,123,'2025-01-29',1,0.00,295,NULL,9,295,NULL,25),(35239,30,'2025-01-29',2,0.00,250,NULL,19,500,NULL,26),(35240,313,'2025-01-30',1,0.00,220,NULL,16,220,NULL,27),(35241,134,'2025-01-30',1,0.00,90,NULL,16,90,'',27),(35242,146,'2025-01-30',1,0.00,170,NULL,16,170,'',27),(35243,202,'2025-01-30',2,0.00,300,NULL,NULL,600,'',NULL),(35244,14,'2025-01-30',10,0.00,94,NULL,NULL,940,'',NULL),(35245,150,'2025-01-14',50,0.00,32,NULL,1,1600,'',28),(35246,195,'2025-01-14',20,0.00,30,NULL,1,600,'',28),(35247,49,'2025-01-14',50,0.00,85,NULL,1,4250,'',28),(35248,313,'2025-01-14',5,0.00,170,NULL,1,850,'',28),(35249,43570,'2025-01-14',10,0.00,33,NULL,1,330,'',28),(35250,179,'2025-01-14',20,0.00,115,NULL,1,2300,'',28),(35251,60,'2025-01-14',5,0.00,250,NULL,1,1250,'',28),(35252,110,'2025-01-14',12,0.00,55,NULL,1,660,'',28),(35253,43572,'2025-01-14',20,0.00,147,NULL,1,2940,'',28),(35254,43573,'2025-01-14',2,0.00,90,NULL,1,180,'',28),(35255,136,'2025-01-14',10,0.00,180,NULL,1,1800,'',28),(35256,93,'2025-01-14',50,0.00,25,NULL,1,1250,'',28),(35257,51,'2025-01-14',5,0.00,315,NULL,1,1575,'',28),(35258,131,'2025-01-14',100,0.00,47,NULL,1,4700,'',28),(35259,320,'2025-01-14',50,0.00,90,NULL,1,4500,'',28),(35260,219,'2025-01-14',20,0.00,26,NULL,1,520,'',28),(35261,226,'2025-01-14',10,0.00,54,NULL,1,540,'',28),(35262,81,'2025-01-14',12,0.00,115,NULL,1,1380,'',28),(35263,43581,'2025-01-14',5,0.00,170,NULL,1,850,'',28),(35264,227,'2025-01-14',60,0.00,77,NULL,1,4620,'',28),(35265,43574,'2025-01-14',10,0.00,120,NULL,1,1200,'',28),(35266,48,'2025-01-14',10,0.00,44,NULL,1,440,'',28),(35267,143,'2025-01-14',10,0.00,85,NULL,1,850,'',28),(35268,87,'2025-01-14',30,0.00,21,NULL,1,630,'',28),(35269,188,'2025-01-14',10,0.00,95,NULL,1,950,'',28),(35270,101,'2025-01-14',20,0.00,40,NULL,1,800,'',28),(35271,43575,'2025-01-14',10,0.00,36,NULL,1,360,'',28),(35272,43582,'2025-01-14',10,0.00,15,NULL,1,150,'',28),(35273,72,'2025-01-14',30,0.00,180,NULL,1,5400,'',28),(35274,284,'2025-01-14',10,0.00,215,NULL,1,2150,'',28),(35275,67,'2025-01-14',10,0.00,60,NULL,1,600,'',28),(35276,232,'2025-01-14',5,0.00,300,NULL,1,1500,'',28),(35277,11,'2025-01-14',12,0.00,190,NULL,1,2280,'',28),(35278,43560,'2025-01-14',50,0.00,65,NULL,1,3250,'',28),(35279,43583,'2025-01-14',50,0.00,45,NULL,1,2250,'',28),(35280,324,'2025-01-14',30,0.00,90,NULL,1,2700,'',28),(35281,189,'2025-01-14',10,0.00,85,NULL,1,850,'',28),(35282,90,'2025-01-14',20,0.00,20,NULL,1,400,'',28),(35283,214,'2025-01-14',66,0.00,82,NULL,1,5412,'',28),(35284,29,'2025-01-14',2,0.00,280,NULL,1,560,'',28),(35285,85,'2025-01-14',60,0.00,14,NULL,1,840,'',28),(35286,122,'2025-01-14',40,0.00,18,NULL,1,720,'',28),(35287,225,'2025-01-14',30,0.00,35,NULL,1,1050,'',28),(35288,151,'2025-01-14',20,0.00,95,NULL,1,1900,'',28),(35289,17,'2025-01-14',20,0.00,128,NULL,1,2560,'',28),(35290,70,'2025-01-14',50,0.00,40,NULL,1,2000,'',28),(35291,43584,'2025-01-14',10,0.00,35,NULL,1,350,'',28),(35292,6,'2025-01-14',10,0.00,55,NULL,1,550,'',28),(35293,55,'2025-01-14',20,0.00,65,NULL,1,1300,'',28),(35294,19,'2025-01-14',10,0.00,74,NULL,1,740,'',28),(35295,89,'2025-01-14',50,0.00,28,NULL,1,1400,'',28),(35296,80,'2025-01-14',28,0.00,90,NULL,1,2520,'',28);
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `after_sales_insert` AFTER INSERT ON `sales` FOR EACH ROW BEGIN
    -- Reduce the inventory for the newly inserted sale
    UPDATE inventory
    SET amount_left = amount_left - NEW.Quantity
    WHERE inventory_id = NEW.inventory_id;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `after_sales_update` AFTER UPDATE ON `sales` FOR EACH ROW BEGIN
    -- Reverse the effect of the old quantity
    UPDATE inventory
    SET amount_left = amount_left + OLD.Quantity
    WHERE inventory_id = OLD.inventory_id;

    -- Apply the effect of the new quantity
    UPDATE inventory
    SET amount_left = amount_left - NEW.Quantity
    WHERE inventory_id = NEW.inventory_id;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `after_sales_delete` AFTER DELETE ON `sales` FOR EACH ROW BEGIN
    -- Restore the inventory for the deleted sale
    UPDATE inventory
    SET amount_left = amount_left + OLD.Quantity
    WHERE inventory_id = OLD.inventory_id;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

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
 1 AS `Invoice_No`,
 1 AS `Date`,
 1 AS `Customer_Shop`,
 1 AS `Balance`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `sales_view`
--

DROP TABLE IF EXISTS `sales_view`;
/*!50001 DROP VIEW IF EXISTS `sales_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `sales_view` AS SELECT 
 1 AS `Sales_ID`,
 1 AS `Inventory_ID`,
 1 AS `drug_name`,
 1 AS `Sale_Date`,
 1 AS `Quantity`,
 1 AS `Discount`,
 1 AS `Price`,
 1 AS `Cut_ID`,
 1 AS `Customer_ID`,
 1 AS `Total_Price`,
 1 AS `Note`,
 1 AS `invoice_no`*/;
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
-- Dumping data for table `share_holding`
--

LOCK TABLES `share_holding` WRITE;
/*!40000 ALTER TABLE `share_holding` DISABLE KEYS */;
/*!40000 ALTER TABLE `share_holding` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `shareholders`
--

LOCK TABLES `shareholders` WRITE;
/*!40000 ALTER TABLE `shareholders` DISABLE KEYS */;
/*!40000 ALTER TABLE `shareholders` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `tax`
--

LOCK TABLES `tax` WRITE;
/*!40000 ALTER TABLE `tax` DISABLE KEYS */;
INSERT INTO `tax` VALUES (51,2.00);
/*!40000 ALTER TABLE `tax` ENABLE KEYS */;
UNLOCK TABLES;

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
  `Debt` double DEFAULT NULL,
  PRIMARY KEY (`vendor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendors`
--

LOCK TABLES `vendors` WRITE;
/*!40000 ALTER TABLE `vendors` DISABLE KEYS */;
INSERT INTO `vendors` VALUES (1,'Wazir Ahmad','Pakistani','Kandahar, Ayub Shefa Market','0700757490',NULL,'Cash','All',NULL),(2,'Ehsan Nazari','Pakistani','Kandahar','0703100662',NULL,'Cash','Drugs',NULL),(3,'Abdul Samad','Ansari Market','Kandahar','0705651268',NULL,'Cash','Drugs',NULL),(4,'Malal','Pakistani','Kandahar','0703350313',NULL,'Cash','Drugs',NULL),(5,'Kakar','Pakistani','Kandahar','0700787736',NULL,'Cash','Drugs',NULL),(6,'Hafez','Pakistani','Kandahar','0704661221',NULL,'Cash','Drugs',NULL),(7,'Mukhtar Ahmad Faiz','Pakistani','Kandahar','0700342668',NULL,'Cash','Drugs',NULL),(8,'Zaheer','Pakistani','Kandahar','0706968632',NULL,'Cash','Drugs',NULL),(9,'Haris Obaid','Pakistani','Kandahar','0700142929',NULL,'Cash','Drugs',NULL),(10,'Salman','Indian','Kandahar','0700064138',NULL,'Cash','Drugs',NULL),(11,'Qudratullah','Pakistani','Kandahar','0795800092',NULL,'Cash','Drugs',NULL),(12,'Hussain Zada','Pakistani','Kandahar','0700341564',NULL,'Cash','Drugs',NULL),(13,'AlHekmat Motasem','Pakistani','Kandahar','0708204653',NULL,'Cash','Drugs',NULL),(14,'Khairullah Insaf','Pakistani','Kandahar','0700556584',NULL,'Cash','Drugs',NULL),(15,'Masih Samim','Indian','Kabul','0784608000',NULL,'Cash','All',NULL),(16,'Esmatullah Noori','Indian','Kabul','0795989999',NULL,'Cash','Karwan Sehat',NULL),(17,'Nasratullah Saleh','Indian','Kabul','0799800944',NULL,'Cash',NULL,NULL),(18,'Ferdaws Iqbal','Company','Mazar Hotel','0780600914','Ferdaws.iqbalmzr@gmail.com','Cash','All',NULL),(19,'Abdul Fatah Qarizada','Common','Mazar Hotel','0729529529',NULL,'Both',NULL,NULL),(20,'Salehi Brothers','Vietnamese','Mazar Hotel','0788825404',NULL,'Credit','No. 175',NULL),(21,'Ajmal Halim','Natural Health','Mazar Hotel','0792886688',NULL,'Credit',NULL,NULL),(22,'Ibn Sina','Euro','Mazar Hotel','070054026','ibnsina0006@gmail.com','Credit','No 187',NULL),(23,'Blue Uranus Trading Company','Indian','Nawaiee Market','0729870114',NULL,'Credit',NULL,NULL),(24,'Sayed Jamal','Mix','Kabul','0700278366',NULL,NULL,NULL,NULL),(973,'Sina','email','Dehbori','76876876','sina@gmail.com','30n','Smart',NULL);
/*!40000 ALTER TABLE `vendors` ENABLE KEYS */;
UNLOCK TABLES;

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
 1 AS `initial_amount`,
 1 AS `amount_left`*/;
SET character_set_client = @saved_cs_client;

--
-- Dumping events for database 'drugwholesale'
--

--
-- Dumping routines for database 'drugwholesale'
--
/*!50003 DROP PROCEDURE IF EXISTS `AddSalesRecord` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `AddSalesRecord`(
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
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
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
/*!50003 DROP PROCEDURE IF EXISTS `UpdatePayment` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdatePayment`(
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
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `company_sales_report`
--

/*!50001 DROP VIEW IF EXISTS `company_sales_report`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `company_sales_report` AS select `c`.`Comp_ID` AS `comp_id`,`c`.`Comp_Name` AS `comp_name`,`c`.`Head_Quarters` AS `head_quarters`,sum(`s`.`Quantity`) AS `total_quantity_sold`,sum(`s`.`Total_Price`) AS `total_amount_sold` from (((`sales` `s` join `inventory` `i` on((`s`.`Inventory_ID` = `i`.`Inventory_ID`))) join `drugs` `d` on((`i`.`Drug_ID` = `d`.`Drug_ID`))) join `companies` `c` on((`d`.`Comp_ID` = `c`.`Comp_ID`))) group by `c`.`Comp_ID`,`c`.`Comp_Name` order by `total_quantity_sold` desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `invoice`
--

/*!50001 DROP VIEW IF EXISTS `invoice`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `invoice` AS select `invoices`.`invoice_id` AS `invoice_id`,`invoices`.`customer_id` AS `customer_id`,`customer`.`customer_shop` AS `customer_shop`,`invoices`.`note` AS `note`,`invoices`.`date` AS `date`,`invoices`.`sales_officer` AS `sales_officer`,`invoices`.`received` AS `received`,`invoices`.`owed` AS `owed`,`invoices`.`total_sales` AS `total_sales` from (`invoices` left join `customer` on((`invoices`.`customer_id` = `customer`.`customer_id`))) order by `invoices`.`date` desc */;
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
-- Final view structure for view `purchase_report`
--

/*!50001 DROP VIEW IF EXISTS `purchase_report`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `purchase_report` AS select `drugs`.`Drug_Name` AS `Drug_Name`,`vendors`.`name` AS `Vendor_Name`,`purchases`.`purchase_id` AS `purchase_ID`,`purchases`.`price` AS `price`,`purchases`.`quantity` AS `quantity`,`purchases`.`Discount` AS `discount`,`purchases`.`total_amount` AS `total_amount` from ((`purchases` join `drugs` on((`purchases`.`drug_id` = `drugs`.`Drug_ID`))) join `vendors` on((`purchases`.`vendor_id` = `vendors`.`vendor_id`))) */;
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
/*!50001 VIEW `sales_bill` AS select `drug_type`.`Drug_Type` AS `Type`,`drugs`.`Drug_Name` AS `Name`,`sales`.`Quantity` AS `Quantity`,`sales`.`Price` AS `Price`,`sales`.`Discount` AS `Discount`,`sales`.`Total_Price` AS `Total_Price`,`sales`.`invoice_no` AS `Invoice_No`,`invoices`.`date` AS `Date`,`customer`.`customer_shop` AS `Customer_Shop`,`customer`.`balance` AS `Balance` from (((((`sales` join `inventory` on((`sales`.`Inventory_ID` = `inventory`.`Inventory_ID`))) join `drugs` on((`inventory`.`Drug_ID` = `drugs`.`Drug_ID`))) join `customer` on((`sales`.`Customer_ID` = `customer`.`customer_id`))) join `drug_type` on((`drugs`.`Type_ID` = `drug_type`.`Type_ID`))) join `invoices` on((`sales`.`invoice_no` = `invoices`.`invoice_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `sales_view`
--

/*!50001 DROP VIEW IF EXISTS `sales_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `sales_view` AS select `s`.`Sales_ID` AS `Sales_ID`,`s`.`Inventory_ID` AS `Inventory_ID`,`d`.`Drug_Name` AS `drug_name`,`s`.`Sale_Date` AS `Sale_Date`,`s`.`Quantity` AS `Quantity`,`s`.`Discount` AS `Discount`,`s`.`Price` AS `Price`,`s`.`Cut_ID` AS `Cut_ID`,`s`.`Customer_ID` AS `Customer_ID`,`s`.`Total_Price` AS `Total_Price`,`s`.`Note` AS `Note`,`s`.`invoice_no` AS `invoice_no` from ((`sales` `s` join `inventory` `i` on((`s`.`Inventory_ID` = `i`.`Inventory_ID`))) join `drugs` `d` on((`i`.`Drug_ID` = `d`.`Drug_ID`))) order by `s`.`Sales_ID` */;
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
/*!50001 VIEW `view_inventory` AS select `inventory`.`Inventory_ID` AS `inventory_id`,`inventory`.`Drug_ID` AS `drug_id`,`drugs`.`Drug_Name` AS `drug_name`,`inventory`.`Expiration` AS `expiration`,`inventory`.`Cost` AS `cost`,`inventory`.`Price` AS `price`,`inventory`.`Initial_Amount` AS `initial_amount`,`inventory`.`Amount_Left` AS `amount_left` from (`inventory` left join `drugs` on((`drugs`.`Drug_ID` = `inventory`.`Drug_ID`))) */;
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

-- Dump completed on 2025-01-31 12:11:49
