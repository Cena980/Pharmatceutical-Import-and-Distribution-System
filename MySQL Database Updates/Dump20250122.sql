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
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companies`
--

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` VALUES (1,'Pars Darou','Iran','021_74373','www.parsdarou.ir'),(2,'Atco','Pakistan',NULL,NULL),(3,'Hilton Pharma','Pakistan',NULL,NULL),(4,'Sanovel','Turkey',NULL,NULL),(5,'ROUTE2HEALTH','Pakistan',NULL,NULL),(6,'Symbiosis','India',NULL,NULL),(7,'Akson','Turkey',NULL,NULL),(8,'Marham Daru','Iran',NULL,NULL),(9,'Jalinous','Iran',NULL,NULL),(10,'Athens','India',NULL,NULL),(11,'Werrick','Pakistan',NULL,NULL),(12,'Sanofi','Pakistan',NULL,NULL),(13,'HIGHNOON','Pakistan',NULL,NULL),(14,'GLITZ Pharma','Pakistan',NULL,NULL),(15,'OVATION REMEDIES','India',NULL,NULL),(16,'Medicraft','Pakistan',NULL,NULL),(17,'Searle','Pakistan',NULL,NULL),(18,'AMBROSIA','Pakistan',NULL,NULL),(19,'Scotmann','Pakistan',NULL,NULL),(20,'AGP','Pakistan',NULL,NULL),(21,'ABL Plus','China',NULL,NULL),(22,'Shanxi Federal','China',NULL,NULL),(23,'TAOLIGHT Pharma','China',NULL,NULL),(24,'Unimax','India',NULL,NULL),(25,'Platinum','Pakistan',NULL,NULL),(26,'GSK','Pakistan',NULL,NULL),(27,'LCI','Pakistan',NULL,NULL),(28,'Getz','Pakistan',NULL,NULL),(29,'Aspin Pharma','Pakistan',NULL,NULL),(30,'Martin Dow','Pakistan',NULL,NULL),(31,'Pfizer','Pakistan',NULL,NULL),(32,'UniMark','Pakistan',NULL,NULL),(33,'Sami','Pakistan',NULL,NULL),(34,'Abbott','Pakistan',NULL,NULL),(35,'Pharmedic','Pakistan',NULL,NULL),(36,'Zafa','Pakistan',NULL,NULL),(37,'Alliance','Pakistan',NULL,NULL),(38,'Maple','Pakistan',NULL,NULL),(39,'Medisynth','Pakistan',NULL,NULL),(40,'CoreVita','India',NULL,NULL),(41,'Incepta','Bangladesh',NULL,NULL),(42,'Univentis Medicare','India',NULL,NULL),(43,'Lark','India',NULL,NULL),(44,'Combitic','India',NULL,NULL),(45,'Zagros','Iran',NULL,NULL),(46,'GUFIC','India',NULL,NULL),(47,'Nobel','Turkey',NULL,NULL),(48,'Novartis','Pakistan',NULL,NULL),(49,'AsianContinental','Pakistan',NULL,NULL),(50,'KGMP','Korea',NULL,NULL),(51,'Hansel','Pakistan',NULL,NULL),(52,'Sobhan','Iran',NULL,NULL),(53,'Mez','India',NULL,NULL),(54,'Natural Health','UK',NULL,NULL),(55,'Euro','Bangladesh',NULL,NULL),(56,'Radicon','India',NULL,'www.radiconlab.com'),(57,'ModHike','India',NULL,'www.modhike.com'),(58,'Life Pharma','UAE',NULL,NULL),(59,'Amin Pharma','Iran',NULL,NULL),(60,'Mehr Darou','Iran',NULL,NULL),(61,'Leeford Healthcare','India',NULL,NULL),(62,'Ridley Life Sciences','India',NULL,NULL),(63,'Cipla','India',NULL,NULL),(64,'Ducross','India',NULL,NULL),(65,'Knoll Healthcare','India',NULL,NULL),(66,'PharmaKing','India',NULL,NULL),(67,'ARBRO','India',NULL,'arbro@arbropharma.com'),(68,'Kharazmi','Iran',NULL,NULL),(69,'PT Sanbe Farma','Indonesia',NULL,NULL),(70,'Pinewood Healthcare','Ireland',NULL,NULL),(71,'Sunlife','Germany',NULL,NULL),(72,'Firooz','Iran',NULL,NULL),(73,'Royal Surgicare','India',NULL,NULL),(74,'Innova Captab','India',NULL,NULL),(75,'Sydler Remedies','India',NULL,NULL),(76,'Nexus Times','UAE',NULL,NULL),(77,'Torrvis','India',NULL,NULL),(78,'GoldenGate','UAE',NULL,NULL),(79,'IndoFarma','Indonesia',NULL,NULL),(80,'Health Plus','China',NULL,NULL),(81,'Dorsa','Iran',NULL,NULL),(82,'General','Bangladesh',NULL,NULL),(83,'OBS','Pakistan',NULL,NULL),(84,'Indus Pharma','Pakistan',NULL,NULL),(85,'Banson','India',NULL,NULL),(86,'Ruxall','India',NULL,NULL),(87,'Kaizen','Pakistan',NULL,NULL),(88,'Atabay','Turkey',NULL,NULL),(89,'Ferozsons','Pakistan',NULL,NULL),(90,'Astamed Healthcare','India',NULL,NULL),(91,'Biofarma','Turkey',NULL,NULL),(92,'Renata','Bangladesh',NULL,NULL),(93,'Milli Shifa','Afghanistan',NULL,'Sales.mspafg@gmail.com'),(94,'Ashrafsons Pharmaceuticals','Pakistan',NULL,NULL),(95,'Jiangxi Xierkangtai','China',NULL,NULL),(96,'Changzhou Holinx','China',NULL,NULL),(97,'Yiwu Medco Health Care','China',NULL,NULL),(98,'Le Mendoza','Pakistan',NULL,NULL),(99,'Menarini','Turkey',NULL,NULL),(100,'HLL Lifecare','India',NULL,NULL),(101,'Paramount','Pakistan',NULL,NULL),(102,'Assos Pharmaceuticals','Turkey',NULL,NULL),(103,'Reckitt Benkiser','Pakistan',NULL,NULL),(104,'WnsFeild Pharmaceuticals','Pakistan',NULL,NULL),(105,'Genetics','Pakistan',NULL,NULL),(106,'Caspian Tamin','Iran',NULL,NULL),(107,'TV.Pharm','Vietnam',NULL,NULL),(108,'Orison','India',NULL,NULL),(109,'Pharmatec','Pakistan',NULL,NULL),(110,'ISIS','Pakistan',NULL,NULL),(111,'Unknown',NULL,NULL,NULL),(112,'Square','Bangladesh',NULL,NULL),(113,'Iran Najo','Iran',NULL,NULL),(114,'Alborz Darou','Iran',NULL,NULL),(115,'Exir Pharmaceuticals','Iran',NULL,NULL),(116,'Aburaihan','Iran',NULL,NULL),(117,'Loghman Pharma','Iran',NULL,NULL),(118,'Rouz Darou','Iran',NULL,NULL),(119,'Pamir Pharmaceutical','Afghanistan',NULL,NULL);
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;

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
INSERT INTO `customer` VALUES (1,'Muhebi Pharmacy','Asad Muhebi','Mohib Square','0773737181','Main Customer',NULL),(2,'Sayed Saboor Naqshbandi',NULL,'Mazar Hotel',NULL,NULL,NULL),(3,'Kaihan Bik',NULL,'Mazar Hotel',NULL,NULL,NULL),(4,'Paron',NULL,NULL,NULL,NULL,NULL),(5,'Haider Mujib',NULL,NULL,NULL,NULL,NULL),(6,'Salehi Brothers',NULL,NULL,NULL,NULL,NULL),(7,'Nawi Sehat',NULL,NULL,NULL,NULL,NULL),(8,'Muhammad Mehraban',NULL,NULL,NULL,NULL,NULL),(9,'Bashir Sadeqi',NULL,NULL,NULL,NULL,NULL),(10,'Qari Salim',NULL,'Mazar Hotel',NULL,'Shop No. 40',NULL),(11,'Qaderi Brothers',NULL,'Mazar Hotel',NULL,NULL,NULL),(12,'Shams Pharmacy',NULL,'Bahar Continental',NULL,NULL,NULL),(13,'Hazrat Mawlana Pharmacy',NULL,'Aria Market Back',NULL,NULL,NULL),(14,'Damage','Ehsan Zafar','Baba Yadgar',NULL,NULL,NULL),(15,'Fayez Khojazada',NULL,'Mazar Hotel',NULL,NULL,NULL);
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drug_type`
--

LOCK TABLES `drug_type` WRITE;
/*!40000 ALTER TABLE `drug_type` DISABLE KEYS */;
INSERT INTO `drug_type` VALUES (1,'Tablet'),(2,'Capsule'),(3,'Syrup'),(4,'Injection'),(5,'Pomad'),(6,'Surgical'),(7,'Lotion'),(8,'Other'),(9,'Sanitation'),(10,'Suppository');
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
) ENGINE=InnoDB AUTO_INCREMENT=339 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drugs`
--

LOCK TABLES `drugs` WRITE;
/*!40000 ALTER TABLE `drugs` DISABLE KEYS */;
INSERT INTO `drugs` VALUES (1,3,'Lerace 30','Levetiracetam 100mg/ml',1,3,4),(2,2,'Ascard 75','Aspirin BP 75 mg',30,1,3),(3,4,'Ator 20','Atorvastatin',30,1,3),(4,7,'CalciPower Plus','Multivitamin',1,3,20),(5,18,'Cardinol 10','Propranolol Hydrochloride BP',50,1,3),(6,16,'Clik 20','Citalopram 20mg',14,1,1),(7,17,'Serenace 1.5','Haloperidol',50,1,1),(8,11,'Epitab XR 200','Carbamazepine 200mg',50,1,4),(9,19,'Jingle 50','Atenolol 50mg',30,1,3),(10,24,'Selazid-D','Lansoprazole & Domeridone 30mg + 10 mg',10,2,5),(11,1,'Amitriptyline 10','Amitriptyline 10mg',100,1,1),(12,13,'Loprin 150','Aspirin 150mg',30,1,3),(13,20,'Maxna 500','Tranexamic Acid 500mg',20,2,22),(14,5,'Melatonin 5','Melatonin 5mg',30,1,1),(15,10,'Opanto 40','Pantoprazole 40mg',30,1,5),(16,10,'Osar Plus','Losartan Potassium & Hydrochlorothiazide',20,1,3),(17,23,'Paracetamol','Paracetamol',100,4,17),(18,12,'Phenergan','Promethazine HCL',1,3,1),(19,6,'Pirasym','Piracetam 500mg/150ml ',1,3,3),(20,10,'Pram 10','Escitalopram 10mg',30,1,NULL),(21,14,'Procye 5','Procyclidine HCL',100,1,NULL),(22,4,'Selectra 100','Sertraline 100mg',28,1,NULL),(23,21,'Syringe 10','Syring 10ml',100,4,NULL),(24,9,'Vitamin B6','Vitamin B6',100,1,NULL),(25,22,'Water','Water for Injection',100,4,NULL),(26,25,'Seizunil 200','Carbamazepine 200mg',50,1,NULL),(27,25,'Ceregin 1.5','Co-dergocrine mesilates',30,1,NULL),(28,17,'Serenace 5','Serenace 5mg',25,4,NULL),(29,17,'Sinemet 25/250','Carbidopa/Levodopa 25/250 mg',100,1,NULL),(30,26,'Panadol CF','Paracetamol, Pseudoephedrine HCL & Chlorpheniramine Maleate',100,1,NULL),(31,27,'Tenormin 50','Atenolol 50mg',21,1,NULL),(32,27,'Tenormin 25','Atenolol 25mg',21,1,NULL),(33,26,'Augmentin BD 1000','Co-amoxiclav 1000',6,1,NULL),(34,28,'Cefiget 100','Cefixime 100mg/5ml',1,3,NULL),(35,28,'Cefiget 200','Cefixime 200mg/5ml',1,3,NULL),(36,2,'Bronkal 2mg/5ml','Salbutamol Oral Solution',1,3,NULL),(37,29,'Stugeron 25','Cinnarizine 25mg',50,1,NULL),(38,30,'Sangobion','Iron, Folic Acid, Vitamin C & B12',30,2,NULL),(39,31,'Feldene 20','Piroxicam 20mg',40,2,NULL),(40,27,'Inderal 10','Propranolol 10mg',50,1,NULL),(41,27,'Inderal 40','Propranolol 40mg',50,1,NULL),(42,26,'FefolVit','Iron & Vitamins + Folic Acid',56,2,NULL),(43,30,'Pcam','Piroxicam',5,4,NULL),(44,32,'Carsel 25','Metoprolol 25mg',30,1,NULL),(45,32,'Carsel 50','Metoprolol 50mg ',30,1,NULL),(46,30,'Polybion Z','Zinc + Vitamin C',30,2,NULL),(47,30,'Buscopan Plus','Hyoscine Butylbromide + Paracetamol',100,1,NULL),(48,33,'Trimetabol','Appetizer',1,3,NULL),(49,34,'Surbex Z','Zinc, Folic Acid + Vitamins',30,1,NULL),(50,35,'Sensival 25','Nortriptyline HCL',20,1,NULL),(51,12,'Stemetil 5','Prochlorperazine Maleate',300,1,NULL),(52,11,'Epitab XR 400','Carbamazepine 400mg',20,1,NULL),(53,34,'Epival 500','Divalproex Sodium 500mg',100,1,NULL),(54,34,'Epival 250','Divalproex Sodium 250mg',100,1,NULL),(55,36,'Cardace 5','Enalapril Maleate 5mg',20,1,NULL),(56,36,'Zodip 5','Amlodipine 5mg',20,1,NULL),(57,25,'Seizunil 100mg/5ml','Carbamazepine 100mg/5ml',1,3,NULL),(58,30,'Polybion Forte','High Potency + B-Complex',1,3,NULL),(59,30,'Evion','Vitamin E',100,2,NULL),(60,30,'Glucovance 500/2.5','Metformin + Glibenclamide 500/2.5 mg',30,1,NULL),(61,11,'Nervin 0.25','Alprazolam 0.25mg',30,1,NULL),(62,11,'Nervin 0.5','Alprazolam 0.5mg',30,1,NULL),(63,37,'Partin 20','Paroxetine 20mg',10,1,NULL),(64,28,'Risek 20','Omeprazole 20mg',21,2,NULL),(65,38,'Mornig','Doxylamine Succinate + Pyridoxine HCL',30,1,NULL),(66,33,'Breeky','Misoprostol 200',10,1,NULL),(67,26,'Chewcal','Calcium + Vitamin D3',30,1,NULL),(68,26,'Kemadrin','Procyclidine HCL',100,1,NULL),(69,30,'Glucophage 500','Metformin HCL',50,1,NULL),(70,17,'Tryptanol 25','Amitriptyline HCL 25mg',100,1,NULL),(71,39,'Olsa 5','Olanzapine 5mg',10,1,NULL),(72,39,'Olsa 10','Olanzapine 10mg',10,1,NULL),(73,8,'Trifluoperazine 2','Trifluoperazine 2mg',100,1,NULL),(74,15,'Ketrol 30','Ketrolac Tromethamine',5,4,NULL),(75,13,'Skilax 30','Sodium Picosulfate',1,3,NULL),(76,40,'Tropex 50','Topiramate 50mg',30,1,NULL),(77,41,'Calvimax Plus','Calcium, Vitamin D & Multimineral',30,1,NULL),(78,6,'Ecit 10','Escitalopram 10mg',30,1,NULL),(79,42,'Epitira 500','Levetiracetam 500mg',200,1,NULL),(80,43,'Pantolar DSR','Pantoprazole & Domperidone',100,2,NULL),(81,44,'Pantocure D Forte','Domperidone & Pantoprazole',200,2,NULL),(82,45,'Folic Acid 1','Folic Acid 1mg',100,1,NULL),(83,46,'Puretrig 5000 IU','Chorionic Gonadotrophin 5000',1,4,NULL),(84,43,'Medlar','Paracetamol, Meloxicam, Domperidone & Caffeine',120,1,NULL),(85,47,'Tylol','Paracetamol 500mg',30,1,NULL),(86,2,'Atcopram 10','Escitalopram',NULL,NULL,NULL),(87,36,'Cardace 10','Enalapril Maleate 10mg',20,1,NULL),(88,34,'Duphaston 10','Dydrogesterone 10mg',20,1,NULL),(89,30,'Teril 200','Carbamazepine 200mg',50,1,NULL),(90,28,'Amclav 1g','Co-Amoxiclav 1g',6,1,NULL),(91,13,'Loprin 75','Aspirin 75mg',30,1,NULL),(92,20,'Sinaxamol Extra','Paracetamol/Orphenadrine Citrate 650mg/50mg',30,1,NULL),(93,12,'Flagyl 400','Metronidazole 400mg',200,1,NULL),(94,30,'Rivotril 0.5','Clonazepam 0.5mg',50,1,NULL),(95,48,'Tegral 200','Carbamazepine 200mg',50,1,NULL),(96,3,'Alp 0.5','Alprazolam 0.5 mg',30,1,NULL),(97,49,'Cardiolite 50','Atenolol 50mg',100,1,NULL),(98,50,'Prime Amoxi 500','Amoxicillin 500mg',20,2,NULL),(99,34,'Prothiaden 75','Dosulepin HCL 75mg',30,1,NULL),(100,78,'IV Cannula Shaheen','IV Cannula',100,4,NULL),(101,36,'Hexidyl 2','Trihexyphenidyl HCL',100,1,NULL),(102,30,'Rivotril 2.5','Clonazepam 2.5mg/ml',1,3,NULL),(103,51,'Roxitin 20','Paroxetine',10,1,NULL),(104,52,'Clonazepam 1','Clonazepam 1mg',100,1,NULL),(105,52,'Clonazepam 2','Clonazepam 2mg',100,1,NULL),(106,53,'Zofest M','Flupenthixol & Melitracen',30,1,NULL),(107,10,'Tralin 100','Sertraline 100mg',30,1,NULL),(108,10,'Tralin 50','Sertraline 50mg',30,1,NULL),(109,10,'Pregafix 75','Pregabalin 75mg',14,2,NULL),(110,10,'MNC Plus','Pregabalin & Methulcobalamin',20,2,NULL),(111,14,'Seitam 60','Levetiracetam 100mg/ml',1,3,NULL),(112,14,'Ozip 10','Olanzapine 10mg',10,1,NULL),(113,14,'Mamgit 10','Memantine HCL',10,1,NULL),(114,14,'Qutia 100','Quetiapine 100mg',30,1,NULL),(115,54,'Ginkoba','Ginkgo Biloba',30,2,NULL),(116,55,'Penticin','Fluepentixol 0.5mg & Melitracen 10mg',30,1,NULL),(117,56,'Omecon 20','Omeprazole 20mg',100,2,NULL),(118,57,'Sertania 100','Sertraline HCL 100mg',100,1,NULL),(119,58,'Panalife 500','Paracetamol 500mg',24,1,NULL),(120,59,'Ammorel 100','Amantadine 100mg',100,2,NULL),(121,60,'Nitrofurantoin 100','Nitrofurantoin 100mg',100,1,NULL),(122,57,'Zaptaaz 7.5','Mirtazapine 7.5mg',100,1,NULL),(123,43,'Onocid D','Omeprazole & Domperidone',100,2,NULL),(124,57,'Escapaam 20','Escitalopram 20mg',200,1,NULL),(125,56,'Ascitopaam 10','Escitalopram Oxalate 10mg',200,1,NULL),(126,43,'Clomifene 50','Clomiphene Citrate',100,1,NULL),(127,61,'Wellamo AT','Amlodipine & Atenolol 5mg + 50mg',280,1,NULL),(128,62,'Velsiplus 200','Sodium Valporate 200mg',100,1,NULL),(129,63,'LQuin 750','Levofloxacin 750mg',50,1,NULL),(130,64,'Escape 20','Escitalopram Oxalate 20mg',100,1,NULL),(131,65,'Dulexit 30','Duloxetine HCL 30mg',200,2,NULL),(132,57,'Olanzya 5','Olanzapine 5mg',200,1,NULL),(133,57,'Olanzya 10','Olanzapine 10mg',200,1,NULL),(134,57,'Zaptaaz 15','Mirtazapine 15mg',100,1,NULL),(135,64,'Dunixit','Flupentixol & Melitracen',100,1,NULL),(136,43,'Clomifene 25','Clomiphene Citrate 25mg',100,1,NULL),(137,66,'Pantaking D','Domperidone & Pantoprazole',200,1,NULL),(138,43,'Lanocid','Lansoprazole Delayed Release',100,2,NULL),(139,67,'Glu V Plex','GLU-V-PLEX',1,3,NULL),(140,65,'Tryptinol 25','Amitriptline HCL 25',200,1,NULL),(141,68,'Vitarol','Vitamin D3',1,3,NULL),(142,69,'Sanaflu','Cold/Flu',1,3,NULL),(143,67,'Milkmag','Antacid/Laxative',1,3,NULL),(144,70,'Neurozin','Multi-Glycerophosphate',1,3,NULL),(145,72,'Cleansing Gel','Intimate Cleansing Gel',1,5,NULL),(146,73,'IV Cannula','IV Cannul',100,4,NULL),(147,71,'Vitamin C','Vitamin C',240,1,NULL),(148,24,'Dynalid PT','Nimesulide, Paracetamol & Tizanidine',100,1,NULL),(149,43,'Ibular PC','Ibuprofen, Paracetamol & Caffeine',100,2,NULL),(150,24,'MaxiCold','Cold/Flu',100,1,NULL),(151,24,'TufCold','Cold/Flu',100,2,NULL),(152,74,'Amster D3','Cholecalciferol 600',40,2,NULL),(153,67,'Zinc Sulphate 20','Zinc Sulphate Dispersible 20mg',100,1,NULL),(154,42,'Fepadol 650','Paracetamol 650mg',100,1,NULL),(155,75,'Stripttol','Throat & Cough',120,1,NULL),(156,75,'Sorasil Lemon','Throat',80,1,NULL),(157,76,'Uni Rovigon','Vitamin A+ E',30,1,NULL),(158,24,'Tufhist MK','Levocetrizine HCL & Montelukast',200,1,NULL),(159,77,'Ginkotor','Ginkgo Biloba',1,3,NULL),(160,24,'Dynalid P','Nimuslide & Paracetamol',100,1,NULL),(161,44,'Zovigravit','Multivitamin & Minerals',20,1,NULL),(162,44,'Lancid','Lansoprazole 30mg',10,2,NULL),(163,79,'Indomag','Ant Acid',1,3,NULL),(164,80,'Syringe 5','Syringe 5ml',100,4,NULL),(165,81,'Propranolol 10','Propranolol HCL 10mg',100,1,NULL),(166,82,'Amit 10','Amitriptyline HCL 10mg',20,1,NULL),(167,48,'Mosegor','Pizotifen',1,3,NULL),(168,83,'Primolut N','Norethisterone',30,1,NULL),(169,84,'Bromalex 3','Bromazepam',30,1,NULL),(171,44,'Pantocure D','Domperidone & Pantoprazole',10,1,NULL),(172,85,'Koldene','Cold/Flu',4,1,NULL),(173,86,'Ruxipram 10','Escitalopram 10mg',30,1,NULL),(174,41,'Ticoflex 500','Naproxen 500mg',50,1,NULL),(175,87,'Divalpro CR 500','Divalproex Sodium 500mg',50,1,NULL),(176,88,'Suprafen 400','Ibuprofen 400mg',100,1,NULL),(177,89,'Bronochol','Chesty Coughs',1,3,NULL),(178,90,'Relief','Cold/Flu',10,1,NULL),(179,91,'Famoser 40','Famotidine',30,1,NULL),(180,41,'Vinsetine 5','Vinpocetine 5mg',10,1,NULL),(181,28,'Getryl 1','Glimepiride 1mg',30,1,NULL),(182,28,'Getryl 2','Glimepiride 2mg',30,1,NULL),(183,92,'Orcef 400','Cefixime Trihydrate 400mg',5,1,NULL),(184,36,'Hydroxyprogesterone 250','Hydroxyprogesterone Caproate 250',3,4,NULL),(185,91,'Gabaset 300','Gabapentin 300mg',50,2,NULL),(186,43,'Onocid 20','Omeprazole 20mg',10,2,NULL),(187,18,'Cardinol 40','Propranolol',50,1,NULL),(188,93,'Milli-Sol NS NaCl 1000','NaCl 1000',1,4,NULL),(189,79,'OBH','Cough',1,3,NULL),(190,88,'Parol 500','Paracetamol 500mg',30,1,NULL),(191,94,'Safesol RL','Ringer Lactate Solution',1,4,NULL),(192,15,'Dalox 30','Duloxetine 30mg',10,1,NULL),(193,15,'Ovacit 10','Escitalopram 10mg',20,1,NULL),(194,65,'Mirzat 7.5','Mirtazapine 7.5mg',100,1,NULL),(195,81,'Propranolol 40','Propranolol 40mg',100,1,NULL),(196,17,'Spiromide 50/20','Spironolactone BP & Furosemide',20,1,NULL),(197,95,'Hero Infusion Set','Set Serum',1,4,NULL),(198,96,'Healthplast Master Tape','Loco Plaster',12,4,NULL),(199,97,'IV Dressing','Cannula Plaster',50,4,NULL),(200,26,'Ventolin','Salbutamol',1,3,NULL),(201,98,'Camozyme','Enzymes + Vitamin Compound',1,3,NULL),(202,14,'Arigit 10','Aripiprazole 10mg',30,1,NULL),(203,41,'Valex 200/5','Sodium Valporate 200mg/5ml',1,3,NULL),(204,99,'Remoxil 1','Amoxicillin 1g',16,1,NULL),(205,41,'Tadalis 1o','Tadalafil 10mg',10,1,NULL),(206,100,'Khoshi','Contraceptive',28,1,NULL),(207,101,'Helen 20','Fluoxetine HCl',14,2,NULL),(208,10,'Osar 50','Losartan Potassium 50mg',20,1,NULL),(209,111,'Novafen','Novafen',10,2,NULL),(210,20,'Xiton 1','Risperidone 1mg',10,1,NULL),(211,47,'Depres 20','Fluoxetine 20mg',16,2,NULL),(212,102,'Ludiomil 25','Maprotilin HCl 25mg',30,1,NULL),(213,30,'Neurobion','Vitamin B1 + B6 + B12',100,1,NULL),(214,30,'Esidep 10','Escitalopram 10mg',14,1,NULL),(215,20,'Algocin 500','Ciprofloxacin 500mg',10,1,NULL),(216,103,'Gaviscon','Alginate Compound',1,3,NULL),(217,99,'IESEF 1','Ceftriaxone 1g',1,4,NULL),(218,34,'Duphalac','Lactulose',1,3,NULL),(219,34,'Levelanz','Levetiracetam 250',10,1,NULL),(220,61,'Migrafen','Migraine',6,1,NULL),(221,33,'Mabil 500','Mecobalamin 500mcg/ml',10,4,NULL),(222,20,'Rigix 10','Cetrizine HCl',30,1,NULL),(223,28,'Zetro 500','Azithromycin 500mg ',6,1,NULL),(224,34,'Epival','Divalpro',1,3,NULL),(225,104,'Mirtawin 30','Mirtazapine 30',20,1,NULL),(226,105,'Donep 5','Donepezil 5mg',20,1,NULL),(227,106,'Akinidic','Biperiden 5mg',10,4,NULL),(228,107,'Piracetam 800','Piracetam 800mg',60,1,NULL),(229,90,'Panzium DSR','Pantoprazole & Domperidone 40/30 mg',14,2,NULL),(230,2,'Atco Flox 500','Levofloxacin 500mg',10,1,NULL),(231,2,'Betagenic','Betamethasonen + Gentamicin',1,5,NULL),(232,9,'Cyproheptadine 4','Cyproheptadine 4mg',100,1,NULL),(233,108,'Tamsin','Tamsulosin HCl',300,2,NULL),(234,17,'Relispa 40','Drotaverine HCl 40mg',20,1,NULL),(235,52,'Haloperidol 0.5','Haloperidol 0.5mg',100,1,NULL),(236,17,'Aldomet 250','Methyldopa 250mg',100,1,NULL),(237,26,'Lanoxin 0.25','Digoxin 0.25mg',25,1,NULL),(238,82,'Riscord 1','Risperidone 1mg',10,1,NULL),(239,82,'Riscord 4','Risperidone 4mg',10,1,NULL),(240,109,'Valmo 5/160','Amlodipine besylate/Valsartan 5/160 mg',14,1,NULL),(241,110,'Lignocaine 2','Lignocaine gel 2%',1,5,NULL),(242,17,'Spiromide 40','Spironolactone & Furosemide',30,1,NULL),(243,112,'Famotack 40','Famotidine 40mg',30,1,NULL),(244,111,'Vitamin K','Vitamin K',10,4,NULL),(245,111,'Amplodipine 5','Amplodipine 5',NULL,1,NULL),(246,111,'Avil','Avil',NULL,1,NULL),(247,111,'Avonum 25','Promethazine 25mg',NULL,1,NULL),(248,115,'Betametasone LA','Betametasone 3mg',NULL,4,NULL),(249,111,'Celbox 200','Celbox',NULL,1,NULL),(250,111,'Glove','Glove',NULL,NULL,NULL),(251,111,'Moxiflux','Moxiflux',NULL,1,NULL),(252,119,'Oil Gominol 5%','Oil Gominol',10,3,NULL),(253,111,'Phenorbarbital 100','Phenorbarbital 100',100,1,NULL),(254,111,'Ambroxol','Ambroxol',NULL,3,NULL),(255,28,'Amclav 650','Co-Amoxiclav 650mg',6,1,NULL),(256,111,'Amoxi 500 Indonesian','Amoxicillin',NULL,2,NULL),(257,111,'Amoxil 250','Amoxicillin',NULL,3,NULL),(258,111,'Amoxil 500','Amoxicillin',NULL,3,NULL),(259,111,'Amoxil 500 Korean','Amoxicillin',NULL,2,NULL),(260,111,'Ampiclox','Ampiclox',NULL,3,NULL),(261,111,'Ampiclox 250','Ampiclox',NULL,2,NULL),(262,111,'Anside','Anside',NULL,1,NULL),(263,111,'Back Plaster 24','Back Plaster',NULL,6,NULL),(264,111,'Benzyl B','Benzyl',NULL,7,NULL),(265,111,'Besucodyl','Besucodyl',NULL,1,NULL),(266,111,'Boiled Jawar','Boiled Jawar',NULL,8,NULL),(267,111,'Brufen 400 ISI','Ibuprofen',NULL,1,NULL),(268,111,'Calpol','Calpol',NULL,1,NULL),(269,111,'IV Cannula China','Cannula',NULL,4,NULL),(270,111,'Cefetec 1','Cefetec',NULL,4,NULL),(271,111,'Cetrizine','Cetrizine',NULL,3,NULL),(272,111,'Ciproflux','Ciproflux',NULL,1,NULL),(273,111,'Comak',NULL,NULL,3,NULL),(274,111,'Entamazol','Entamazol',NULL,1,NULL),(275,111,'Fingers Plaster','Fingers Plaster',NULL,6,NULL),(276,111,'Gauze Pad','Gauze Pad',NULL,6,NULL),(277,111,'Genta 20','Genta',NULL,4,NULL),(278,111,'Genta 80','Genta',NULL,4,NULL),(279,111,'Ginseng','Ginseng',NULL,2,NULL),(280,111,'Kecord','Kecord',NULL,4,NULL),(281,111,'M Colt',NULL,NULL,NULL,NULL),(282,111,'Maxolan',NULL,NULL,NULL,NULL),(283,111,'Metodine Searle','Metronidazole 400mg',NULL,NULL,NULL),(284,111,'Mobil K 100',NULL,NULL,NULL,NULL),(285,111,'Mobil K 75',NULL,NULL,NULL,NULL),(286,111,'Mouth Wash',NULL,NULL,NULL,NULL),(287,111,'Naproxen 500',NULL,NULL,NULL,NULL),(288,111,'Nawnehal',NULL,NULL,NULL,NULL),(289,111,'Needle 24ml',NULL,NULL,NULL,NULL),(290,111,'Neuro B',NULL,NULL,NULL,NULL),(291,111,'Neuro B',NULL,NULL,NULL,NULL),(292,111,'Nubral Forte',NULL,NULL,NULL,NULL),(293,111,'Nystatine',NULL,NULL,NULL,NULL),(294,111,'Panadol 500',NULL,NULL,NULL,NULL),(295,111,'Plaster Original',NULL,NULL,NULL,NULL),(296,111,'Plaster Sherchap',NULL,NULL,NULL,NULL),(297,111,'Promethazine',NULL,NULL,NULL,NULL),(298,111,'Semogel',NULL,NULL,NULL,NULL),(299,111,'Serum Metro',NULL,NULL,NULL,NULL),(300,111,'Serum Paracetamol',NULL,NULL,NULL,NULL),(301,111,'Wax Gam',NULL,NULL,NULL,NULL),(302,111,'Decadron',NULL,NULL,4,NULL),(303,111,'Estradiol',NULL,NULL,4,NULL),(304,111,'Nemova',NULL,NULL,1,NULL),(305,111,'Pepzime',NULL,NULL,1,NULL),(306,111,'Serc 8','Betahistatine 8mg',NULL,1,NULL),(307,111,'Xynosine',NULL,NULL,3,NULL),(308,52,'Risperidone 1','Risperidone 1mg',100,1,NULL),(309,52,'Risperidone 2','Risperidone 2mg',100,1,NULL),(310,113,'Tetracycline 1% Najo','Tetracycline 1%',1,5,NULL),(311,52,'Haloperidol 5','Haloperidol 5mg',100,1,NULL),(312,114,'Metoclopramide 10','Metoclopramide 5mg/1ml',10,4,NULL),(313,116,'Dexamethasone 0.5','Dexamethasone 0.5',100,1,NULL),(314,117,'Phenytoin Compound','Phenytoin Sodium 100mg + Phenorbarbital 50mg',100,1,NULL),(315,118,'Lamotrigine 50','Lamotrigine 50mg',100,1,NULL),(316,9,'Folic Acid 1 Jalinous','Folic Acid 1mg',100,1,NULL),(317,20,'Xedexo 3/25','Olanzapine + Fluoxetine 3mg/25mg',14,2,NULL),(318,20,'Xedexo 6/25','Olanzapine + Fluoxetine 6mg/25mg',14,2,NULL),(319,20,'Novafol 400','L-Methylfolate 400mcg',30,1,NULL),(320,111,'Anti Hemorrhoide','Anti Hemorrhoide',NULL,10,NULL),(321,111,'Enoxaparin','Enoxaparin',NULL,2,NULL),(322,111,'Lamotrigine 100','Lamotrigine 100mg',NULL,1,NULL),(323,111,'Mitrazin 15','Mirtazapine 15mg',NULL,1,NULL),(324,111,'Motival','Motival',NULL,1,NULL),(325,111,'Pregnancy Test','Test',NULL,8,NULL),(326,111,'Ponstan Forte','Ponstan Forte',NULL,1,NULL),(327,111,'IDA V Cure','IDA V Cure',NULL,1,NULL),(328,10,'Athors 10','Atorvastatine 10mg',NULL,1,NULL),(329,111,'Sulpride','Sulpride',NULL,2,NULL),(330,111,'Flagyl','Metronidazole',NULL,3,NULL),(331,35,'Modrin','Nortypline + Fluphenazine HCl',100,1,NULL),(332,35,'Amotrip 25','Amotrip 25mg',NULL,1,NULL),(333,111,'Aldomet','Aldomet',NULL,1,NULL),(334,2,'Atcoflox 500','Levofloxacin',NULL,1,NULL),(335,111,'Betagenic','Betagenic',NULL,5,NULL),(336,111,'Cyproheptadine','Cyproheptadine',NULL,1,NULL),(337,111,'Lanoxin','Lanoxin',NULL,1,NULL),(338,111,'Lignocaine','Lignocaine',NULL,5,NULL);
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
  `Expiration` date NOT NULL,
  `Cost` double DEFAULT NULL,
  `Price` double DEFAULT NULL,
  `Initial_Amount` int DEFAULT NULL,
  `Amount_Left` int DEFAULT NULL,
  PRIMARY KEY (`Inventory_ID`),
  KEY `Drug_ID` (`Drug_ID`),
  CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`Drug_ID`) REFERENCES `drugs` (`Drug_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=43547 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory`
--

LOCK TABLES `inventory` WRITE;
/*!40000 ALTER TABLE `inventory` DISABLE KEYS */;
INSERT INTO `inventory` VALUES (1,18,'2026-02-01',38,50,96,NULL),(2,46,'2025-11-19',84.5,90,600,NULL),(3,39,'2025-11-30',212,NULL,40,NULL),(4,37,'2027-07-30',45,55,488,NULL),(5,55,'2026-03-30',18,22,200,NULL),(6,38,'2026-07-02',49.5,55,720,NULL),(7,66,'2026-06-30',51,60,200,NULL),(8,56,'2027-08-30',18.5,21,128,NULL),(9,34,'2025-05-30',62,65,144,NULL),(10,43,'2026-09-30',52.5,55,200,NULL),(11,144,'2026-12-30',185,190,240,NULL),(12,87,'2026-08-30',39,NULL,200,NULL),(13,48,'2025-11-30',54,60,480,NULL),(14,49,'2025-09-17',89,90,26,NULL),(15,58,'2025-05-30',39,40,50,NULL),(16,33,'2026-08-30',85,90,180,NULL),(17,64,'2026-11-30',122,128,136,NULL),(18,32,'2026-02-28',38,44,300,NULL),(19,31,'2026-04-30',67,NULL,300,NULL),(20,65,'2027-06-30',43,NULL,300,NULL),(21,57,'2026-04-30',55,NULL,100,NULL),(22,42,'2026-01-30',105,115,166,NULL),(23,69,'2027-03-30',49,55,150,NULL),(24,75,'2027-05-30',28.5,32,50,NULL),(25,41,'2025-11-30',62,68,600,NULL),(26,67,'2026-08-30',51,58,150,NULL),(27,26,'2027-03-30',103,120,1000,NULL),(28,70,'2027-07-30',58,NULL,300,NULL),(29,30,'2026-05-30',260,280,80,NULL),(30,54,'2026-06-30',228,250,122,NULL),(31,51,'2026-07-30',108,115,50,NULL),(32,50,'2027-03-30',37,40,200,NULL),(33,63,'2025-08-30',30,33,1000,NULL),(34,52,'2026-01-30',123,130,1000,NULL),(35,72,'2025-09-30',21,26,420,NULL),(36,71,'2025-09-30',19,22,547,NULL),(37,8,'2027-04-30',136,150,110,NULL),(38,29,'2026-11-30',560,600,30,NULL),(39,45,'2026-10-30',48,55,100,NULL),(40,44,'2027-03-30',40,43,100,NULL),(41,60,'2027-02-16',52,60,150,NULL),(42,62,'2025-11-30',55,NULL,50,NULL),(43,61,'2025-10-30',53,NULL,100,NULL),(44,59,'2026-02-21',230,235,96,NULL),(45,53,'2026-08-17',545,600,108,NULL),(46,68,'2029-02-20',72,NULL,100,NULL),(47,47,'2027-07-25',295,315,20,NULL),(48,40,'2026-07-09',39,44,600,NULL),(49,86,'2026-01-30',80,85,756,NULL),(50,8,'2026-10-30',136,150,313,NULL),(51,88,'2027-09-30',300,315,108,NULL),(52,89,'2026-12-11',98.5,110,1000,NULL),(53,90,'2025-11-30',66,70,144,NULL),(54,91,'2026-08-30',18,22,306,NULL),(55,92,'2027-06-30',56,65,288,NULL),(56,93,'2027-07-30',198,210,90,NULL),(57,94,'2025-09-04',80,88,200,NULL),(58,95,'2026-05-30',145,180,170,NULL),(59,96,'2026-07-30',69,78,50,NULL),(60,97,'2025-12-30',229,NULL,30,NULL),(61,98,'2027-07-30',78,76,100,NULL),(62,99,'2025-08-17',60,NULL,100,NULL),(63,51,'2027-01-30',108,115,50,NULL),(64,101,'2028-11-30',50,NULL,180,NULL),(65,102,'2026-04-30',68,75,100,NULL),(66,83,'2028-09-30',217,NULL,100,NULL),(67,62,'2025-10-30',55,60,120,NULL),(68,42,'2025-11-30',105,115,33,NULL),(69,42,'2026-02-28',105,115,144,NULL),(70,103,'2026-02-28',35,40,1000,NULL),(71,76,'2027-04-24',105,115,400,NULL),(72,110,'2027-08-30',168,180,200,NULL),(73,109,'2027-06-30',84,89,200,NULL),(74,107,'2027-06-30',164.5,177,400,NULL),(75,35,'2025-08-30',72,75,144,NULL),(76,111,'2026-03-30',84,88,86,NULL),(77,112,'2026-09-30',47,NULL,400,NULL),(78,113,'2026-02-28',80,85,500,NULL),(79,114,'2026-02-28',180,NULL,100,NULL),(80,106,'2027-07-30',84,90,504,NULL),(81,115,'2026-10-20',108,115,480,NULL),(82,116,'2026-08-30',82,NULL,30,NULL),(83,84,'2025-12-30',16,16,720,NULL),(84,70,'2025-06-30',7,NULL,100,NULL),(85,137,'2026-06-30',9,14,1800,NULL),(86,80,'2027-07-30',24,26,1200,NULL),(87,138,'2027-07-30',18,22,600,NULL),(88,134,'2027-06-30',35,40,1440,NULL),(89,122,'2027-06-30',25,28,480,NULL),(90,117,'2025-12-30',13,20,960,NULL),(91,123,'2027-04-30',23,25,600,NULL),(92,139,'2026-05-30',30,33,1000,NULL),(93,135,'2026-05-30',21,30,2400,NULL),(94,132,'2026-01-30',17,21,480,NULL),(95,133,'2026-01-30',19,26,960,NULL),(96,126,'2025-05-30',17,25,500,NULL),(97,125,'2026-04-30',17,27,620,NULL),(98,124,'2026-01-30',17,25,100,NULL),(99,118,'2027-06-30',32,38,960,NULL),(100,128,'2026-05-30',13,18,5000,NULL),(101,129,'2026-12-30',35,40,150,NULL),(102,127,'2025-11-30',16,25,1090,NULL),(103,130,'2025-11-30',20,25,960,NULL),(104,131,'2026-04-30',44,50,195,NULL),(105,136,'2025-05-30',17,NULL,100,NULL),(106,141,'2026-12-30',36,NULL,44,NULL),(107,142,'2026-09-27',70,73,48,NULL),(108,143,'2027-09-30',31,35,50,NULL),(109,114,'2026-12-30',185,NULL,240,NULL),(110,145,'2027-09-30',50,55,240,NULL),(111,119,'2026-12-30',40,45,240,NULL),(112,120,'2027-07-14',155,NULL,30,NULL),(114,162,'2026-09-30',NULL,NULL,60,NULL),(115,83,'2028-09-30',168,175,240,NULL),(116,146,'2028-02-28',580,600,20,NULL),(117,147,'2026-10-30',77,80,144,NULL),(118,121,'2027-02-28',350,NULL,10,NULL),(119,148,'2028-06-30',248,255,90,NULL),(120,149,'2026-09-30',20,25,600,NULL),(121,150,'2027-01-30',128,140,160,NULL),(122,81,'2027-06-30',15.8,25,1100,NULL),(123,151,'2028-08-30',280,285,216,NULL),(124,152,'2027-06-30',15.8,20,1000,NULL),(125,153,'2025-10-30',14.8,20,50,NULL),(126,154,'2026-01-30',7.2,9,1920,NULL),(127,155,'2028-01-30',170,NULL,56,NULL),(128,156,'2028-07-30',170,175,60,NULL),(129,157,'2028-03-30',74.5,NULL,50,NULL),(130,158,'2027-04-30',31.5,35,600,NULL),(131,79,'2026-06-30',41.5,47,1200,NULL),(132,159,'2025-05-30',47.5,60,120,NULL),(133,100,'2029-03-30',770,780,20,NULL),(134,160,'2027-08-30',69,NULL,50,NULL),(135,10,'2026-12-30',11.9,17,3000,NULL),(136,175,'2026-01-30',151,180,80,NULL),(137,83,'2026-01-30',NULL,NULL,10,NULL),(138,161,'2026-01-30',NULL,NULL,10,NULL),(139,10,'2024-01-28',NULL,NULL,100,NULL),(140,171,'2024-01-28',NULL,NULL,50,NULL),(141,84,'2024-01-28',NULL,NULL,20,NULL),(142,209,'2024-01-28',NULL,NULL,50,NULL),(143,163,'2024-01-28',NULL,88,20,NULL),(144,31,'2024-01-28',NULL,NULL,30,NULL),(145,94,'2025-01-09',NULL,NULL,5,NULL),(146,164,'2024-12-28',NULL,150,3,NULL),(147,197,'2024-12-28',NULL,NULL,50,NULL),(148,41,'2024-12-28',NULL,NULL,10,NULL),(149,165,'2024-12-28',NULL,NULL,10,NULL),(150,166,'2024-12-28',NULL,32,50,NULL),(151,168,'2024-12-29',NULL,NULL,20,NULL),(152,152,'2024-12-29',NULL,NULL,50,NULL),(153,167,'2024-12-29',NULL,NULL,30,NULL),(154,33,'2024-12-29',NULL,NULL,40,NULL),(155,98,'2024-12-29',NULL,NULL,10,NULL),(156,91,'2024-12-29',NULL,NULL,20,NULL),(157,115,'2024-12-29',NULL,NULL,30,NULL),(158,114,'2024-12-29',NULL,NULL,20,NULL),(159,112,'2024-12-29',NULL,NULL,50,NULL),(160,169,'2024-12-29',NULL,60,10,NULL),(161,64,'2024-12-30',NULL,NULL,10,NULL),(162,81,'2024-12-30',NULL,NULL,40,NULL),(163,172,'2024-12-30',NULL,NULL,1,NULL),(164,173,'2024-12-30',NULL,NULL,45,NULL),(165,40,'2024-12-30',NULL,NULL,10,NULL),(166,56,'2024-12-30',NULL,NULL,20,NULL),(167,176,'2024-12-30',NULL,290,2,NULL),(168,224,'2024-12-30',NULL,58,40,NULL),(169,178,'2024-12-30',NULL,NULL,1,NULL),(170,150,'2024-12-30',NULL,NULL,1,NULL),(171,180,'2024-12-30',NULL,NULL,10,NULL),(172,179,'2024-12-30',NULL,80,30,NULL),(173,182,'2024-12-30',NULL,NULL,5,NULL),(174,181,'2024-12-30',NULL,NULL,5,NULL),(175,27,'2024-12-30',NULL,110,40,NULL),(176,154,'2024-12-30',NULL,NULL,30,NULL),(177,146,'2024-12-30',NULL,NULL,1,NULL),(178,106,'2024-12-30',NULL,NULL,82,NULL),(179,77,'2024-12-31',NULL,NULL,20,NULL),(180,184,'2024-12-31',NULL,85,10,NULL),(181,183,'2025-01-01',NULL,NULL,20,NULL),(182,185,'2025-01-01',NULL,NULL,10,NULL),(183,186,'2025-01-01',NULL,NULL,30,NULL),(184,177,'2025-01-01',NULL,30,10,NULL),(185,119,'2025-01-01',NULL,NULL,20,NULL),(186,85,'2025-01-01',NULL,NULL,40,NULL),(187,5,'2025-01-02',NULL,NULL,30,NULL),(188,1,'2025-01-02',NULL,95,32,NULL),(189,189,'2025-01-02',NULL,85,10,NULL),(190,188,'2025-01-02',NULL,NULL,20,NULL),(191,191,'2025-01-02',NULL,NULL,26,NULL),(192,190,'2025-01-02',NULL,NULL,20,NULL),(193,3,'2025-01-03',NULL,NULL,5,NULL),(194,193,'2025-01-03',NULL,82,110,NULL),(195,2,'2025-01-03',NULL,NULL,14,NULL),(196,37,'2025-01-03',NULL,NULL,10,NULL),(197,194,'2025-01-03',NULL,NULL,100,NULL),(198,20,'2025-01-03',NULL,NULL,30,NULL),(199,195,'2025-01-03',NULL,50,10,NULL),(200,196,'2025-01-03',NULL,75,5,NULL),(201,198,'2025-01-03',NULL,NULL,5,NULL),(202,25,'2025-01-03',NULL,270,1,NULL),(203,197,'2025-01-03',NULL,7.5,50,NULL),(204,199,'2025-01-03',NULL,NULL,1,NULL),(205,7,'2025-01-04',NULL,NULL,10,NULL),(206,202,'2025-01-04',NULL,NULL,50,NULL),(207,201,'2025-01-04',NULL,32,10,NULL),(208,203,'2025-01-04',NULL,94,20,NULL),(209,204,'2025-01-04',NULL,210,5,NULL),(210,205,'2025-01-04',NULL,102,10,NULL),(211,207,'2025-01-04',NULL,48.5,50,NULL),(212,206,'2025-01-04',NULL,27,20,NULL),(213,192,'2026-07-30',64.4,70,450,NULL),(214,193,'2027-02-28',77,82,308,NULL),(215,225,'2026-01-30',NULL,175,20,NULL),(216,226,'2026-01-30',NULL,NULL,12,NULL),(217,228,'2025-08-25',NULL,NULL,80,NULL),(218,208,'2025-08-25',NULL,88,50,NULL),(219,82,'2025-01-11',NULL,30,10,NULL),(220,210,'2025-01-11',NULL,30,50,NULL),(221,211,'2025-01-11',NULL,93,50,NULL),(222,212,'2025-01-06',NULL,195,50,NULL),(223,214,'2025-01-06',NULL,100,10,NULL),(224,215,'2025-01-06',NULL,100,10,NULL),(225,229,'2027-06-30',32.6,35,669,NULL),(226,216,'2025-01-06',NULL,54,10,NULL),(227,217,'2025-01-06',NULL,75,50,NULL),(228,218,'2025-01-06',NULL,40,10,NULL),(229,219,'2025-01-06',NULL,70,20,NULL),(230,221,'2025-01-06',NULL,170,5,NULL),(231,220,'2025-01-06',NULL,40,20,NULL),(232,213,'2025-01-06',NULL,300,5,NULL),(233,222,'2025-01-06',NULL,70,20,NULL),(234,23,'2025-01-06',NULL,250,5,NULL),(235,243,'2026-05-06',74,NULL,360,NULL),(236,244,'2025-01-06',NULL,3,20,NULL),(237,223,'2025-01-06',NULL,105,20,NULL),(238,245,'2025-01-06',NULL,85,NULL,NULL),(239,246,'2025-01-06',NULL,120,NULL,NULL),(240,247,'2025-01-06',NULL,150,10,NULL),(241,248,'2025-01-06',NULL,170,5,NULL),(242,249,'2025-01-06',NULL,170,10,NULL),(243,250,'2025-01-06',NULL,700,1,NULL),(244,251,'2025-01-06',NULL,128,10,NULL),(245,252,'2025-01-06',NULL,22,24,NULL),(246,253,'2025-01-06',NULL,380,3,NULL),(247,28,'2027-03-30',310,340,20,NULL),(248,108,'2025-01-06',NULL,140,50,NULL),(249,200,'2025-01-06',NULL,34,5,NULL),(250,254,'2025-01-06',NULL,75,5,NULL),(251,255,'2025-01-08',NULL,52,10,NULL),(252,256,'2025-01-08',NULL,380,2,NULL),(253,257,'2025-01-08',NULL,48,10,NULL),(254,258,'2025-01-08',NULL,38,10,NULL),(255,259,'2025-01-08',NULL,340,2,NULL),(256,260,'2025-01-08',NULL,66,5,NULL),(257,261,'2025-01-08',NULL,260,1,NULL),(258,262,'2025-01-08',NULL,86,5,NULL),(259,263,'2025-01-08',NULL,90,2,NULL),(260,264,'2025-01-08',NULL,20,5,NULL),(261,265,'2025-01-08',NULL,50,2,NULL),(262,266,'2025-01-08',NULL,160,2,NULL),(263,267,'2025-01-08',NULL,310,2,NULL),(264,268,'2025-01-08',NULL,170,2,NULL),(265,269,'2025-01-08',NULL,500,1,NULL),(266,270,'2025-01-08',NULL,53,20,NULL),(267,271,'2025-01-08',NULL,18,10,NULL),(268,272,'2025-01-08',NULL,70,10,NULL),(269,273,'2025-01-08',NULL,95,5,NULL),(270,274,'2025-01-08',NULL,70,5,NULL),(271,275,'2025-01-08',NULL,40,5,NULL),(272,276,'2025-01-08',NULL,85,5,NULL),(273,277,'2025-01-08',NULL,30,10,NULL),(274,278,'2025-01-08',NULL,8,10,NULL),(275,279,'2025-01-08',NULL,110,2,NULL),(276,280,'2025-01-08',NULL,34,10,NULL),(277,74,'2025-01-08',NULL,30,10,NULL),(278,281,'2025-01-08',NULL,18,10,NULL),(279,282,'2025-01-08',NULL,75,1,NULL),(280,283,'2025-01-08',NULL,330,2,NULL),(281,284,'2025-01-08',NULL,24,10,NULL),(282,285,'2025-01-08',NULL,20,10,NULL),(283,286,'2025-01-08',NULL,25,10,NULL),(284,287,'2025-01-08',NULL,78,10,NULL),(285,288,'2025-01-08',NULL,35,5,NULL),(286,289,'2025-01-08',NULL,60,5,NULL),(287,290,'2025-01-08',NULL,180,1,NULL),(288,291,'2025-01-08',NULL,150,2,NULL),(289,292,'2025-01-08',NULL,45,5,NULL),(290,293,'2025-01-08',NULL,43,5,NULL),(291,294,'2025-01-08',NULL,170,2,NULL),(292,295,'2025-01-08',NULL,4.5,96,NULL),(293,296,'2025-01-08',NULL,90,2,NULL),(294,297,'2025-01-08',NULL,70,2,NULL),(295,298,'2025-01-08',NULL,31,10,NULL),(296,299,'2025-01-08',NULL,22,20,NULL),(297,300,'2025-01-08',NULL,40,20,NULL),(299,301,'2025-01-08',NULL,80,1,NULL),(300,11,'2025-01-08',NULL,60,10,NULL),(301,302,'2025-01-08',NULL,180,1,NULL),(302,303,'2025-01-08',NULL,220,1,NULL),(303,304,'2025-01-08',NULL,90,50,NULL),(304,305,'2025-01-08',NULL,150,5,NULL),(305,306,'2025-01-08',NULL,130,12,NULL),(306,307,'2025-01-08',NULL,25,10,NULL),(307,308,'2027-07-30',85,NULL,450,NULL),(308,309,'2027-09-30',85,NULL,300,NULL),(309,310,'2025-11-30',17.5,NULL,100,NULL),(310,235,'2029-04-30',61,85,120,NULL),(311,311,'2027-07-30',126,NULL,120,NULL),(312,312,'2027-01-13',120,NULL,10,NULL),(313,248,'2026-05-31',170,NULL,30,NULL),(314,313,'2025-12-30',41,NULL,120,NULL),(315,314,'2028-04-30',230,NULL,20,NULL),(316,105,'2026-04-30',60,NULL,400,NULL),(317,104,'2026-12-26',70,80,500,NULL),(318,315,'2027-07-31',155,NULL,100,NULL),(319,252,'2025-12-30',100,NULL,10,NULL),(320,214,'2026-06-30',89,NULL,336,NULL),(321,317,'2026-04-30',69,70,110,NULL),(322,318,'2025-04-30',66,NULL,100,NULL),(323,215,'2027-05-30',94,NULL,100,NULL),(324,319,'2025-09-30',74,NULL,100,NULL),(325,320,'2025-09-30',NULL,70,5,NULL),(326,321,'2025-09-30',NULL,75,12,NULL),(327,322,'2025-09-30',NULL,250,10,NULL),(328,323,'2025-09-30',NULL,72,50,NULL),(329,324,'2025-09-30',NULL,140,5,NULL),(330,325,'2025-09-30',NULL,140,1,NULL),(331,309,'2025-09-30',NULL,75,10,NULL),(332,22,'2025-09-30',NULL,300,50,NULL),(333,242,'2025-09-30',NULL,90,5,NULL),(334,323,'2025-01-11',NULL,220,2,NULL),(335,327,'2025-01-11',NULL,295,10,NULL),(336,227,'2025-01-11',NULL,350,1,NULL),(337,328,'2025-01-11',NULL,144,39,NULL),(338,329,'2025-01-11',NULL,5,100,NULL),(339,330,'2025-01-16',NULL,30,5,NULL),(340,331,'2027-04-30',100,110,20,NULL),(341,332,'2025-01-16',76,80,20,NULL),(342,326,'2025-01-16',NULL,220,2,NULL),(343,333,'2025-01-16',NULL,300,2,NULL),(344,334,'2025-01-16',NULL,95,20,NULL),(345,335,'2025-01-16',NULL,27,10,NULL),(346,336,'2025-01-16',NULL,60,2,NULL),(43545,337,'2025-01-16',NULL,34,5,NULL),(43546,338,'2025-01-16',NULL,25,10,NULL);
/*!40000 ALTER TABLE `inventory` ENABLE KEYS */;
UNLOCK TABLES;

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
 1 AS `Expiration`,
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
  KEY `customer_id_idx` (`customer_id`),
  CONSTRAINT `customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoices`
--

LOCK TABLES `invoices` WRITE;
/*!40000 ALTER TABLE `invoices` DISABLE KEYS */;
INSERT INTO `invoices` VALUES (1,1,NULL,'2025-01-11',''),(2,13,NULL,'2025-01-12','');
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchases`
--

LOCK TABLES `purchases` WRITE;
/*!40000 ALTER TABLE `purchases` DISABLE KEYS */;
INSERT INTO `purchases` VALUES (1,19,76,105,400,NULL,'2025-01-01',42000,12000),(2,18,86,80,756,NULL,'2024-12-31',60480,0),(3,18,110,240,200,0.30,'2024-12-31',33600,0),(4,18,109,120,200,0.30,'2024-12-31',16800,0),(5,18,107,235,400,0.30,'2024-12-31',65800,0),(6,20,111,84,86,NULL,'2024-12-31',7224,0),(7,20,112,47,400,NULL,'2024-12-31',18800,0),(8,20,113,80,500,NULL,'2024-12-31',40000,0),(9,20,114,180,100,NULL,'2024-12-31',18000,15000),(10,21,115,108,480,NULL,'2025-01-01',51840,0),(11,22,116,82,30,NULL,'2025-01-01',2460,0),(12,23,192,92,450,0.30,'2025-01-11',28980,0),(13,23,193,110,308,0.30,'2025-01-11',23716,0),(14,20,228,148,80,NULL,'2025-01-11',11840,0);
/*!40000 ALTER TABLE `purchases` ENABLE KEYS */;
UNLOCK TABLES;

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
  `Amount_Received` double NOT NULL DEFAULT '0',
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
) ENGINE=InnoDB AUTO_INCREMENT=35054 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES (1,1,'2024-12-31',10,0.00,45,NULL,NULL,450,450,NULL,NULL),(2,1,'2024-12-31',5,0.00,40,NULL,NULL,200,200,NULL,NULL),(3,1,'2024-12-31',1,0.00,60,NULL,NULL,60,60,NULL,NULL),(4,49,'2024-12-31',50,0.00,85,NULL,1,4250,4250,NULL,NULL),(5,71,'2025-01-01',100,0.00,110,NULL,1,11000,11000,NULL,NULL),(6,57,'2025-01-04',30,NULL,83,NULL,2,2490,2490,NULL,NULL),(7,57,'2025-01-02',5,NULL,88,NULL,1,440,440,NULL,NULL),(8,1,'2025-01-04',4,NULL,50,NULL,NULL,200,200,NULL,NULL),(9,1,'2025-01-04',5,NULL,50,NULL,2,250,0,'Loan',NULL),(10,50,'2025-01-04',100,NULL,136,NULL,3,13600,0,'Loan',NULL),(11,68,'2024-12-29',10,NULL,110,NULL,1,1100,1100,NULL,NULL),(12,136,'2025-01-07',2,NULL,780,NULL,NULL,1560,1560,NULL,NULL),(13,34,'2024-12-29',20,NULL,130,NULL,1,2600,2600,NULL,NULL),(14,51,'2024-12-29',10,NULL,310,NULL,1,3100,3100,NULL,NULL),(15,6,'2024-12-30',20,NULL,55,NULL,1,1100,1100,NULL,NULL),(16,86,'2024-12-31',50,NULL,20,NULL,1,1000,1000,NULL,NULL),(17,92,'2025-01-01',25,NULL,33,NULL,1,825,825,NULL,NULL),(18,115,'2025-01-01',10,NULL,175,NULL,1,1750,1750,NULL,NULL),(19,86,'2025-01-01',50,NULL,26,NULL,1,1300,1300,NULL,NULL),(20,83,'2025-01-01',20,NULL,16,NULL,1,320,320,NULL,NULL),(21,131,'2025-01-01',100,NULL,47,NULL,1,4700,4700,NULL,NULL),(22,49,'2025-01-01',100,NULL,85,NULL,1,8500,8500,NULL,NULL),(23,17,'2025-01-01',5,NULL,128,NULL,1,640,640,NULL,NULL),(24,57,'2025-01-01',5,NULL,88,NULL,1,440,440,NULL,NULL),(25,124,'2025-01-02',50,NULL,20,NULL,1,1000,1000,NULL,NULL),(26,16,'2025-01-02',30,NULL,70,NULL,1,2100,2100,NULL,NULL),(27,53,'2025-01-02',20,NULL,90,NULL,1,1800,1800,NULL,NULL),(28,65,'2025-01-01',10,NULL,80,NULL,1,800,800,NULL,NULL),(29,111,'2025-01-01',20,NULL,45,NULL,1,900,900,NULL,NULL),(30,71,'2025-01-01',100,NULL,110,NULL,1,11000,11000,NULL,NULL),(31,2,'2025-01-01',10,NULL,90,NULL,1,900,900,NULL,NULL),(32,68,'2025-01-01',5,NULL,110,NULL,1,550,550,NULL,NULL),(33,27,'2025-01-01',30,NULL,120,NULL,1,3600,3600,NULL,NULL),(34,89,'2025-01-02',50,NULL,28,NULL,1,1400,1400,NULL,NULL),(35,33,'2025-01-02',50,NULL,33,NULL,1,1650,1650,NULL,NULL),(36,34,'2025-01-02',20,NULL,130,NULL,1,2600,2600,NULL,NULL),(37,49,'2025-01-02',30,NULL,85,NULL,1,2550,2550,NULL,NULL),(38,83,'2025-01-02',20,NULL,16,NULL,1,320,320,NULL,NULL),(39,55,'2025-01-02',10,NULL,65,NULL,1,650,650,NULL,NULL),(40,5,'2025-01-02',10,NULL,22,NULL,1,220,220,NULL,NULL),(41,12,'2025-01-02',10,NULL,42,NULL,1,420,420,NULL,NULL),(42,92,'2025-01-02',25,NULL,33,NULL,1,825,825,NULL,NULL),(43,121,'2025-01-02',1,NULL,150,NULL,1,150,150,NULL,NULL),(44,86,'2025-01-02',50,NULL,25,NULL,1,1250,1250,NULL,NULL),(45,51,'2025-01-03',10,NULL,310,NULL,1,3100,3100,NULL,NULL),(46,115,'2025-01-03',10,NULL,175,NULL,1,1750,1750,NULL,NULL),(47,6,'2025-01-03',20,NULL,55,NULL,1,1100,1100,NULL,NULL),(48,68,'2025-01-03',5,NULL,110,NULL,1,550,550,NULL,NULL),(49,13,'2025-01-03',10,NULL,60,NULL,1,600,600,NULL,NULL),(50,45,'2025-01-03',5,NULL,600,NULL,1,3000,3000,NULL,NULL),(51,56,'2025-01-03',4,NULL,210,NULL,1,840,840,NULL,NULL),(52,31,'2025-01-03',5,NULL,115,NULL,1,575,575,NULL,NULL),(53,35,'2025-01-03',50,NULL,26,NULL,1,1300,1300,NULL,NULL),(54,49,'2025-01-03',50,NULL,85,NULL,1,4250,4250,NULL,NULL),(55,83,'2025-01-03',20,NULL,16,NULL,1,320,320,NULL,NULL),(56,18,'2025-01-03',20,NULL,45,NULL,1,900,900,NULL,NULL),(57,111,'2025-01-03',20,NULL,45,NULL,1,900,900,NULL,NULL),(58,116,'2025-01-03',1,NULL,780,NULL,1,780,780,NULL,NULL),(59,92,'2025-01-03',50,NULL,33,NULL,1,1650,1650,NULL,NULL),(60,83,'2025-01-03',16,NULL,40,NULL,1,640,640,NULL,NULL),(61,84,'2025-01-03',100,NULL,10,NULL,1,1000,1000,NULL,NULL),(62,70,'2025-01-03',40,NULL,40,NULL,1,1600,1600,NULL,NULL),(63,80,'2025-01-03',28,NULL,90,NULL,1,2520,2520,NULL,NULL),(64,104,'2025-01-03',80,NULL,50,NULL,1,4000,4000,NULL,NULL),(65,101,'2025-01-03',20,NULL,40,NULL,1,800,800,NULL,NULL),(66,81,'2025-01-03',12,NULL,115,NULL,1,1380,1380,NULL,NULL),(67,124,'2025-01-05',100,NULL,20,NULL,1,2000,2000,NULL,NULL),(68,16,'2025-01-05',20,NULL,70,NULL,1,1400,1400,NULL,NULL),(69,45,'2025-01-05',5,NULL,600,NULL,1,3000,3000,NULL,NULL),(70,54,'2025-01-05',10,NULL,22,NULL,1,220,220,NULL,NULL),(71,90,'2025-01-05',50,NULL,20,NULL,1,1000,1000,NULL,NULL),(72,86,'2025-01-05',50,NULL,25,NULL,1,1250,1250,NULL,NULL),(73,122,'2025-01-05',40,NULL,20,NULL,1,800,800,NULL,NULL),(74,88,'2025-01-05',50,NULL,40,NULL,1,2000,2000,NULL,NULL),(75,74,'2025-01-05',30,NULL,177,NULL,1,5310,5310,NULL,NULL),(76,120,'2025-01-05',50,NULL,25,NULL,1,1250,1250,NULL,NULL),(77,131,'2025-01-05',200,NULL,47,NULL,1,9400,9400,NULL,NULL),(78,111,'2025-01-05',20,NULL,45,NULL,1,900,900,NULL,NULL),(79,15,'2025-01-05',10,NULL,40,NULL,1,400,400,NULL,NULL),(80,137,'2024-01-28',5,NULL,175,NULL,1,875,875,NULL,NULL),(81,138,'2024-01-28',10,NULL,38,NULL,1,380,380,NULL,NULL),(82,114,'2024-01-28',60,NULL,13,NULL,1,780,780,NULL,NULL),(83,139,'2024-01-28',100,NULL,19,NULL,1,1900,1900,NULL,NULL),(84,140,'2024-01-28',50,NULL,14,NULL,1,700,700,NULL,NULL),(85,141,'2024-01-28',20,NULL,16,NULL,1,320,320,NULL,NULL),(86,142,'2024-01-28',50,NULL,25,NULL,1,1250,1250,NULL,NULL),(87,143,'2024-01-28',20,NULL,83,NULL,1,1660,1660,NULL,NULL),(88,144,'2024-01-28',30,NULL,74,NULL,1,2220,2220,NULL,NULL),(89,107,'2025-01-09',40,NULL,72,NULL,4,2880,1251,NULL,NULL),(90,75,'2025-01-09',58,NULL,73,NULL,4,4234,4234,NULL,NULL),(91,29,'2025-01-09',20,NULL,268,NULL,4,5360,0,NULL,NULL),(92,123,'2025-01-09',2,NULL,280,NULL,4,560,0,NULL,NULL),(93,57,'2025-01-09',2,NULL,85,NULL,4,170,0,NULL,NULL),(94,133,'2025-01-09',2,NULL,780,NULL,4,1560,0,NULL,NULL),(95,38,'2025-01-09',5,NULL,580,NULL,6,2900,2900,NULL,NULL),(96,69,'2025-01-09',50,NULL,110,NULL,6,5500,5500,NULL,NULL),(97,68,'2025-01-09',5,NULL,110,NULL,9,550,550,NULL,NULL),(98,8,'2025-01-09',3,NULL,74,NULL,8,222,222,NULL,NULL),(99,5,'2025-01-09',5,NULL,53,NULL,5,265,265,NULL,NULL),(100,4,'2025-01-09',100,NULL,50,NULL,7,5000,5000,NULL,NULL),(101,145,'2024-12-28',5,NULL,88,NULL,1,440,440,NULL,NULL),(102,146,'2024-12-28',3,NULL,155,NULL,1,465,465,NULL,NULL),(103,147,'2024-12-28',50,NULL,28,NULL,1,1400,1400,NULL,NULL),(104,148,'2024-12-28',10,NULL,70,NULL,1,700,700,NULL,NULL),(105,149,'2024-12-28',10,NULL,40,NULL,1,400,400,NULL,NULL),(106,150,'2024-12-28',50,NULL,40,NULL,1,2000,2000,NULL,NULL),(107,137,'2024-12-29',5,NULL,175,NULL,1,875,875,NULL,NULL),(108,151,'2024-12-29',20,NULL,95,NULL,1,1900,1900,NULL,NULL),(109,152,'2024-12-29',50,NULL,20,NULL,1,1000,1000,NULL,NULL),(110,153,'2024-12-29',30,NULL,46,NULL,1,1380,1380,NULL,NULL),(111,154,'2024-12-29',40,NULL,70,NULL,1,2800,2800,NULL,NULL),(112,155,'2024-12-29',10,NULL,72,NULL,1,720,720,NULL,NULL),(113,156,'2024-12-29',20,NULL,22,NULL,1,440,440,NULL,NULL),(114,157,'2024-12-29',30,NULL,138,NULL,1,4140,4140,NULL,NULL),(115,158,'2024-12-29',20,NULL,200,NULL,1,4000,4000,NULL,NULL),(116,159,'2024-12-29',50,NULL,50,NULL,1,2500,2500,NULL,NULL),(117,160,'2024-12-29',10,NULL,60,NULL,1,600,600,NULL,NULL),(118,161,'2024-12-30',10,NULL,128,NULL,1,1280,1280,NULL,NULL),(119,162,'2024-12-30',40,NULL,20,NULL,1,800,800,NULL,NULL),(120,163,'2024-12-30',1,NULL,130,NULL,1,130,130,NULL,NULL),(121,164,'2024-12-30',45,NULL,60,NULL,1,2700,2700,NULL,NULL),(122,150,'2024-12-30',200,NULL,32,NULL,1,6400,6400,NULL,NULL),(123,165,'2024-12-30',10,NULL,44,NULL,1,440,440,NULL,NULL),(124,166,'2024-12-30',20,NULL,75,NULL,1,1500,1500,NULL,NULL),(125,167,'2024-12-30',2,NULL,290,NULL,1,580,580,NULL,NULL),(126,168,'2024-12-30',40,NULL,40,NULL,1,1600,1600,NULL,NULL),(127,157,'2024-12-30',10,NULL,30,NULL,1,300,300,NULL,NULL),(128,169,'2024-12-30',1,NULL,250,NULL,1,250,250,NULL,NULL),(129,170,'2024-12-30',1,NULL,150,NULL,1,150,150,NULL,NULL),(130,171,'2024-12-30',10,NULL,85,NULL,1,850,850,NULL,NULL),(131,172,'2024-12-30',30,NULL,85,NULL,1,2550,2550,NULL,NULL),(132,173,'2024-12-30',5,NULL,134,NULL,1,670,670,NULL,NULL),(133,174,'2024-12-30',5,NULL,75,NULL,1,375,375,NULL,NULL),(134,175,'2024-12-30',40,NULL,110,NULL,1,4400,4400,NULL,NULL),(135,157,'2024-12-30',20,NULL,138,NULL,1,2760,2760,NULL,NULL),(136,140,'2024-12-30',50,NULL,20,NULL,1,1000,1000,NULL,NULL),(137,176,'2024-12-30',30,NULL,9,NULL,1,270,270,NULL,NULL),(138,177,'2024-12-30',1,NULL,780,NULL,1,780,780,NULL,NULL),(139,178,'2024-12-30',82,NULL,85,NULL,1,6970,6970,NULL,NULL),(140,179,'2024-12-31',20,NULL,122,NULL,1,2440,2440,NULL,NULL),(141,139,'2024-12-31',100,NULL,19,NULL,1,1900,1900,NULL,NULL),(142,180,'2024-12-31',10,NULL,85,NULL,1,850,850,NULL,NULL),(143,138,'2024-12-31',5,NULL,30,NULL,1,150,150,NULL,NULL),(144,181,'2025-01-01',20,NULL,80,NULL,1,1600,1600,NULL,NULL),(145,157,'2025-01-01',30,NULL,138,NULL,1,4140,4140,NULL,NULL),(146,182,'2025-01-01',10,NULL,80,NULL,1,800,800,NULL,NULL),(147,160,'2025-01-01',10,NULL,60,NULL,1,600,600,NULL,NULL),(148,162,'2025-01-01',40,NULL,20,NULL,1,800,800,NULL,NULL),(149,139,'2025-01-01',30,NULL,25,NULL,1,750,750,NULL,NULL),(150,183,'2025-01-01',30,NULL,20,NULL,1,600,600,NULL,NULL),(151,168,'2024-12-30',40,NULL,40,NULL,1,1600,1600,NULL,NULL),(152,184,'2025-01-01',10,NULL,30,NULL,1,300,300,NULL,NULL),(153,176,'2025-01-01',20,NULL,45,NULL,1,900,900,NULL,NULL),(154,186,'2025-01-01',40,NULL,45,NULL,1,2600,2600,NULL,NULL),(155,178,'2025-01-02',50,NULL,65,NULL,1,3250,3250,NULL,NULL),(156,164,'2025-01-02',45,NULL,60,NULL,1,2700,2700,NULL,NULL),(157,187,'2025-01-02',30,NULL,60,NULL,1,1800,1800,NULL,NULL),(158,150,'2025-01-02',10,NULL,60,NULL,1,600,600,NULL,NULL),(159,188,'2025-01-02',32,NULL,95,NULL,1,3040,3040,NULL,NULL),(160,184,'2025-01-02',10,NULL,30,NULL,1,300,300,NULL,NULL),(161,189,'2025-01-02',10,NULL,85,NULL,1,850,850,NULL,NULL),(162,190,'2025-01-02',20,NULL,32,NULL,1,640,640,NULL,NULL),(163,191,'2025-01-02',26,NULL,37,NULL,1,740,740,NULL,NULL),(164,157,'2025-01-02',49,NULL,75,NULL,1,3675,3675,NULL,NULL),(165,192,'2025-01-02',20,NULL,74,NULL,1,1480,1480,NULL,NULL),(166,172,'2025-01-03',20,NULL,85,NULL,1,1700,1700,NULL,NULL),(167,180,'2025-01-03',5,NULL,250,NULL,1,1250,1250,NULL,NULL),(168,143,'2025-01-03',20,NULL,83,NULL,1,1660,1660,NULL,NULL),(169,193,'2025-01-03',5,NULL,185,NULL,1,925,925,NULL,NULL),(170,104,'2025-01-03',150,NULL,70,NULL,1,10500,10500,NULL,NULL),(171,194,'2025-01-03',110,NULL,83,NULL,1,9130,9130,NULL,NULL),(172,195,'2025-01-03',14,NULL,30,NULL,1,420,420,NULL,NULL),(173,196,'2025-01-03',10,NULL,50,NULL,1,500,500,NULL,NULL),(174,139,'2025-01-03',100,NULL,19,NULL,1,1900,1900,NULL,NULL),(175,197,'2025-01-03',100,NULL,28,NULL,1,2800,2800,NULL,NULL),(176,159,'2025-01-03',50,NULL,50,NULL,1,2500,2500,NULL,NULL),(177,198,'2025-01-03',30,NULL,136,NULL,1,4080,4080,NULL,NULL),(178,149,'2025-01-03',10,NULL,40,NULL,1,400,400,NULL,NULL),(179,199,'2025-01-03',10,NULL,50,NULL,1,500,500,NULL,NULL),(180,200,'2025-01-03',5,NULL,78,NULL,1,390,390,NULL,NULL),(181,201,'2025-01-03',5,NULL,65,NULL,1,325,325,NULL,NULL),(182,202,'2025-01-03',1,NULL,160,NULL,1,160,160,NULL,NULL),(183,203,'2025-01-03',50,NULL,8,NULL,1,400,400,NULL,NULL),(184,204,'2025-01-03',1,NULL,240,NULL,1,240,240,NULL,NULL),(185,178,'2025-01-03',30,NULL,85,NULL,1,2550,2550,NULL,NULL),(186,143,'2025-01-04',30,NULL,83,NULL,1,2490,2490,NULL,NULL),(187,138,'2025-01-04',10,NULL,30,NULL,1,300,300,NULL,NULL),(188,175,'2025-01-04',20,NULL,110,NULL,1,2200,2200,NULL,NULL),(189,193,'2025-01-04',10,NULL,185,NULL,1,1850,1850,NULL,NULL),(190,205,'2025-01-04',10,NULL,115,NULL,1,1150,1150,NULL,NULL),(191,139,'2025-01-04',60,NULL,19,NULL,1,1140,1140,NULL,NULL),(192,176,'2025-01-04',50,NULL,55,NULL,1,2750,2750,NULL,NULL),(193,206,'2025-01-04',50,NULL,65,NULL,1,3250,3250,NULL,NULL),(194,188,'2025-01-04',20,NULL,95,NULL,1,1900,1900,NULL,NULL),(195,207,'2025-01-04',10,NULL,28,NULL,1,280,280,NULL,NULL),(34544,93,'2025-01-06',100,0.00,30,NULL,1,3000,3000,NULL,NULL),(34545,124,'2025-01-06',50,0.00,20,NULL,1,1000,1000,NULL,NULL),(34546,6,'2025-01-06',10,0.00,55,NULL,1,550,550,NULL,NULL),(34547,208,'2025-01-06',20,NULL,94,NULL,1,1880,1880,NULL,NULL),(34548,209,'2025-01-06',5,NULL,210,NULL,1,1050,1050,NULL,NULL),(34549,210,'2025-01-06',10,NULL,102,NULL,1,1020,1020,NULL,NULL),(34550,211,'2025-01-06',50,NULL,48.5,NULL,1,2425,2425,NULL,NULL),(34551,212,'2025-01-06',20,NULL,27,NULL,1,540,540,NULL,NULL),(34552,172,'2025-01-06',30,NULL,85,NULL,1,1700,1700,NULL,NULL),(34553,13,'2025-01-06',10,NULL,60,NULL,1,600,600,NULL,NULL),(34554,53,'2025-01-06',20,NULL,70,NULL,1,1400,1400,NULL,NULL),(34555,218,'2025-01-06',50,NULL,88,NULL,1,4400,4400,NULL,NULL),(34556,175,'2025-01-06',10,NULL,115,NULL,1,1150,1150,NULL,NULL),(34557,219,'2025-01-06',10,NULL,30,NULL,1,300,300,NULL,NULL),(34558,104,'2025-01-06',80,NULL,50,NULL,1,4000,4000,NULL,NULL),(34559,81,'2025-01-06',12,NULL,115,NULL,1,1380,1380,NULL,NULL),(34560,4,'2025-01-06',10,NULL,55,NULL,1,550,550,NULL,NULL),(34561,160,'2025-01-06',20,NULL,60,NULL,1,1200,1200,NULL,NULL),(34562,16,'2025-01-06',5,NULL,90,NULL,1,450,450,NULL,NULL),(34563,86,'2025-01-06',30,NULL,26,NULL,1,780,780,NULL,NULL),(34564,220,'2025-01-06',50,NULL,30,NULL,1,1500,1500,NULL,NULL),(34565,80,'2025-01-06',50,NULL,90,NULL,1,4500,4500,NULL,NULL),(34566,52,'2025-01-06',40,NULL,110,NULL,1,4400,4400,NULL,NULL),(34567,221,'2025-01-06',50,NULL,93,NULL,1,4650,4650,NULL,NULL),(34568,58,'2025-01-06',10,NULL,180,NULL,1,1800,1800,NULL,NULL),(34569,126,'2025-01-06',50,NULL,9,NULL,1,450,450,NULL,NULL),(34570,55,'2025-01-06',10,NULL,65,NULL,1,650,650,NULL,NULL),(34571,222,'2025-01-06',50,NULL,195,NULL,1,9750,9750,NULL,NULL),(34572,25,'2025-01-06',10,NULL,70,NULL,1,700,700,NULL,NULL),(34573,188,'2025-01-06',20,NULL,95,NULL,1,1900,1900,NULL,NULL),(34574,184,'2025-01-06',10,NULL,30,NULL,1,300,300,NULL,NULL),(34575,202,'2025-01-06',1,NULL,260,NULL,1,260,260,NULL,NULL),(34576,92,'2025-01-06',50,NULL,33,NULL,1,1650,1650,NULL,NULL),(34577,83,'2025-01-06',20,NULL,16,NULL,1,320,320,NULL,NULL),(34578,223,'2025-01-06',10,NULL,100,NULL,1,1000,1000,NULL,NULL),(34579,224,'2025-01-06',10,NULL,100,NULL,1,1000,1000,NULL,NULL),(34580,65,'2025-01-12',3,0.00,80,NULL,NULL,240,240,NULL,NULL),(34581,123,'2025-01-09',1,0.00,280,NULL,1,280,0,NULL,NULL),(34582,97,'2025-01-06',80,NULL,27,NULL,1,2160,2160,NULL,NULL),(34583,184,'2025-01-06',10,NULL,30,NULL,1,300,300,NULL,NULL),(34584,26,'2025-01-06',10,NULL,58,NULL,1,580,580,NULL,NULL),(34585,136,'2025-01-06',10,NULL,180,NULL,1,1800,1800,NULL,NULL),(34586,126,'2025-01-06',530,NULL,9,NULL,1,4770,4770,NULL,NULL),(34587,226,'2025-01-06',10,NULL,54,NULL,1,540,540,NULL,NULL),(34588,81,'2025-01-06',24,NULL,115,NULL,1,2760,2760,NULL,NULL),(34589,132,'2025-01-06',40,NULL,60,NULL,1,2400,2400,NULL,NULL),(34590,227,'2025-01-06',50,NULL,75,NULL,1,3750,3750,NULL,NULL),(34591,228,'2025-01-06',10,NULL,74,NULL,1,740,740,NULL,NULL),(34592,229,'2025-01-06',20,NULL,70,NULL,1,1400,1400,NULL,NULL),(34593,101,'2025-01-06',10,NULL,40,NULL,1,400,400,NULL,NULL),(34594,230,'2025-01-06',5,NULL,170,NULL,1,850,850,NULL,NULL),(34595,121,'2025-01-06',2,NULL,150,NULL,1,300,300,NULL,NULL),(34596,231,'2025-01-06',20,NULL,40,NULL,1,800,800,NULL,NULL),(34597,232,'2025-01-06',5,NULL,300,NULL,1,1500,1500,NULL,NULL),(34598,95,'2025-01-06',60,NULL,26,NULL,1,1560,1560,NULL,NULL),(34599,94,'2025-01-06',40,NULL,21,NULL,1,840,840,NULL,NULL),(34600,86,'2025-01-06',50,NULL,26,NULL,1,1300,1300,NULL,NULL),(34601,115,'2025-01-06',10,NULL,175,NULL,1,1750,1750,NULL,NULL),(34602,233,'2025-01-06',20,NULL,70,NULL,1,1400,1400,NULL,NULL),(34603,17,'2025-01-06',5,NULL,128,NULL,1,640,640,NULL,NULL),(34604,234,'2025-01-06',5,NULL,270,NULL,1,1350,1350,NULL,NULL),(34605,146,'2025-01-06',5,NULL,170,NULL,1,850,850,NULL,NULL),(34606,18,'2025-01-06',10,NULL,44,NULL,1,440,440,NULL,NULL),(34607,74,'2025-01-06',10,NULL,178,NULL,1,1780,1780,NULL,NULL),(34608,13,'2025-01-06',10,NULL,60,NULL,1,600,600,NULL,NULL),(34609,236,'2025-01-06',20,NULL,3,NULL,1,60,60,NULL,NULL),(34610,102,'2025-01-06',80,NULL,25,NULL,1,2000,2000,NULL,NULL),(34611,237,'2025-01-06',20,NULL,105,NULL,1,2100,2100,NULL,NULL),(34612,238,'2025-01-07',20,NULL,85,NULL,1,1700,1700,NULL,NULL),(34613,49,'2025-01-07',100,NULL,85,NULL,1,8500,8500,NULL,NULL),(34614,239,'2025-01-07',1,NULL,120,NULL,1,120,120,NULL,NULL),(34615,240,'2025-01-07',10,NULL,150,NULL,1,1500,1500,NULL,NULL),(34616,241,'2025-01-07',5,NULL,170,NULL,1,850,850,NULL,NULL),(34617,242,'2025-01-07',10,NULL,170,NULL,1,1700,1700,NULL,NULL),(34618,96,'2025-01-07',20,NULL,25,NULL,1,500,500,NULL,NULL),(34619,34,'2025-01-07',20,NULL,130,NULL,1,2600,2600,NULL,NULL),(34620,223,'2025-01-07',168,NULL,100,NULL,1,16800,16800,NULL,NULL),(34621,68,'2025-01-07',8,NULL,115,NULL,1,920,920,NULL,NULL),(34622,22,'2025-01-07',2,NULL,115,NULL,1,230,230,NULL,NULL),(34623,243,'2025-01-07',1,NULL,700,NULL,1,700,700,NULL,NULL),(34624,120,'2025-01-07',40,NULL,25,NULL,1,1000,1000,NULL,NULL),(34625,48,'2025-01-07',10,NULL,44,NULL,1,440,440,NULL,NULL),(34626,78,'2025-01-07',50,NULL,85,NULL,1,4250,4250,NULL,NULL),(34627,83,'2025-01-07',40,NULL,16,NULL,1,640,640,NULL,NULL),(34628,108,'2025-01-07',5,NULL,35,NULL,1,175,175,NULL,NULL),(34629,244,'2025-01-07',10,NULL,128,NULL,1,1280,1280,NULL,NULL),(34630,11,'2025-01-07',12,NULL,195,NULL,1,2340,2340,NULL,NULL),(34631,245,'2025-01-07',24,NULL,22,NULL,1,528,528,NULL,NULL),(34632,111,'2025-01-07',20,NULL,45,NULL,1,900,900,NULL,NULL),(34633,85,'2025-01-07',50,NULL,14,NULL,1,700,700,NULL,NULL),(34634,246,'2025-01-07',3,NULL,100,NULL,1,300,300,NULL,NULL),(34635,61,'2025-01-07',10,NULL,76,NULL,1,760,760,NULL,NULL),(34636,27,'2025-01-07',50,NULL,120,NULL,1,6000,6000,NULL,NULL),(34637,247,'2025-01-07',2,NULL,340,NULL,1,680,680,NULL,NULL),(34638,248,'2025-01-07',50,NULL,140,NULL,1,7000,7000,NULL,NULL),(34639,123,'2025-01-07',5,NULL,285,NULL,1,1425,1425,NULL,NULL),(34640,249,'2025-01-07',5,NULL,34,NULL,1,170,170,NULL,NULL),(34641,88,'2025-01-07',50,NULL,40,NULL,1,2000,2000,NULL,NULL),(34642,26,'2025-01-13',4,0.00,55,NULL,NULL,220,220,NULL,NULL),(34643,13,'2025-01-13',2,0.00,54,NULL,14,108,0,'Damage',NULL),(34644,123,'2025-01-13',20,0.00,280,NULL,11,5600,5600,NULL,NULL),(34645,123,'2025-01-13',20,0.00,280,NULL,NULL,5600,5600,NULL,NULL),(34646,59,'2025-01-08',10,NULL,78,NULL,12,780,780,NULL,NULL),(34647,250,'2025-01-08',5,NULL,75,NULL,12,375,375,NULL,NULL),(34648,251,'2025-01-08',10,NULL,52,NULL,12,520,520,NULL,NULL),(34649,252,'2025-01-08',2,NULL,380,NULL,12,760,760,NULL,NULL),(34650,253,'2025-01-08',10,NULL,48,NULL,12,480,480,NULL,NULL),(34651,254,'2025-01-08',10,NULL,38,NULL,12,380,380,NULL,NULL),(34652,255,'2025-01-08',2,NULL,340,NULL,12,680,680,NULL,NULL),(34653,256,'2025-01-08',5,NULL,66,NULL,12,330,330,NULL,NULL),(34654,257,'2025-01-08',1,NULL,260,NULL,12,260,260,NULL,NULL),(34655,258,'2025-01-08',5,NULL,86,NULL,12,430,430,NULL,NULL),(34656,259,'2025-01-08',2,NULL,90,NULL,12,180,180,NULL,NULL),(34657,260,'2025-01-08',5,NULL,20,NULL,12,100,100,NULL,NULL),(34658,261,'2025-01-08',2,NULL,50,NULL,12,100,100,NULL,NULL),(34659,262,'2025-01-08',2,NULL,160,NULL,12,320,320,NULL,NULL),(34660,263,'2025-01-08',2,NULL,310,NULL,12,620,620,NULL,NULL),(34661,264,'2025-01-08',2,NULL,170,NULL,12,340,340,NULL,NULL),(34662,207,'2025-01-08',10,NULL,32,NULL,12,320,320,NULL,NULL),(34663,265,'2025-01-08',1,NULL,500,NULL,12,500,500,NULL,NULL),(34664,40,'2025-01-08',5,NULL,43,NULL,12,215,215,NULL,NULL),(34665,266,'2025-01-08',20,NULL,53,NULL,12,1060,1060,NULL,NULL),(34666,9,'2025-01-08',10,NULL,63,NULL,12,630,630,NULL,NULL),(34667,75,'2025-01-08',10,NULL,73,NULL,12,730,730,NULL,NULL),(34668,267,'2025-01-08',10,NULL,18,NULL,12,180,180,NULL,NULL),(34669,268,'2025-01-08',10,NULL,70,NULL,12,700,700,NULL,NULL),(34670,269,'2025-01-08',5,NULL,95,NULL,12,475,475,NULL,NULL),(34671,270,'2025-01-08',5,NULL,70,NULL,12,350,350,NULL,NULL),(34672,271,'2025-01-08',5,NULL,40,NULL,12,200,200,NULL,NULL),(34673,56,'2025-01-08',2,NULL,210,NULL,12,420,420,NULL,NULL),(34674,272,'2025-01-08',5,NULL,85,NULL,12,425,425,NULL,NULL),(34675,273,'2025-01-08',10,NULL,30,NULL,12,300,300,NULL,NULL),(34676,274,'2025-01-08',10,NULL,8,NULL,12,80,80,NULL,NULL),(34677,275,'2025-01-08',2,NULL,110,NULL,12,220,220,NULL,NULL),(34678,143,'2025-01-08',5,NULL,88,NULL,12,440,440,NULL,NULL),(34679,276,'2025-01-08',10,NULL,34,NULL,12,340,340,NULL,NULL),(34680,277,'2025-01-08',10,NULL,30,NULL,12,300,300,NULL,NULL),(34681,228,'2025-01-08',10,NULL,74,NULL,12,400,400,NULL,NULL),(34682,278,'2025-01-08',10,NULL,18,NULL,12,180,180,NULL,NULL),(34683,279,'2025-01-08',1,NULL,75,NULL,12,75,75,NULL,NULL),(34684,280,'2025-01-08',2,NULL,330,NULL,12,660,493,NULL,NULL),(34685,281,'2025-01-08',10,NULL,24,NULL,12,240,0,NULL,NULL),(34686,282,'2025-01-08',10,NULL,20,NULL,12,200,0,NULL,NULL),(34687,283,'2025-01-08',10,NULL,25,NULL,12,250,0,NULL,NULL),(34688,284,'2025-01-08',10,NULL,78,NULL,12,780,0,NULL,NULL),(34689,285,'2025-01-08',5,NULL,35,NULL,12,175,0,NULL,NULL),(34690,286,'2025-01-08',5,NULL,60,NULL,12,300,0,NULL,NULL),(34691,67,'2025-01-08',10,NULL,60,NULL,12,600,0,NULL,NULL),(34692,287,'2025-01-08',1,NULL,180,NULL,12,180,0,NULL,NULL),(34693,288,'2025-01-08',2,NULL,150,NULL,12,300,0,NULL,NULL),(34694,232,'2025-01-08',2,NULL,270,NULL,12,540,0,NULL,NULL),(34695,289,'2025-01-08',5,NULL,45,NULL,12,225,0,NULL,NULL),(34696,290,'2025-01-08',5,NULL,43,NULL,12,215,0,NULL,NULL),(34697,291,'2025-01-08',2,NULL,170,NULL,12,340,0,NULL,NULL),(34698,292,'2025-01-08',96,NULL,4.5,NULL,12,432,0,NULL,NULL),(34699,293,'2025-01-08',2,NULL,90,NULL,12,180,0,NULL,NULL),(34700,294,'2025-01-08',2,NULL,70,NULL,12,140,0,NULL,NULL),(34701,57,'2025-01-08',5,NULL,85,NULL,12,425,0,NULL,NULL),(34702,295,'2025-01-08',10,NULL,31,NULL,12,310,0,NULL,NULL),(34703,296,'2025-01-08',20,NULL,22,NULL,12,440,0,NULL,NULL),(34704,297,'2025-01-08',20,NULL,40,NULL,12,800,0,NULL,NULL),(34705,203,'2025-01-08',50,NULL,6,NULL,12,300,0,NULL,NULL),(34706,24,'2025-01-08',5,NULL,32,NULL,12,160,0,NULL,NULL),(34707,200,'2025-01-08',5,NULL,78,NULL,12,390,0,NULL,NULL),(34708,234,'2025-01-08',2,NULL,250,NULL,12,500,0,NULL,NULL),(34709,146,'2025-01-08',2,NULL,150,NULL,12,300,0,NULL,NULL),(34710,52,'2025-01-08',5,NULL,110,NULL,12,550,0,NULL,NULL),(34711,299,'2025-01-08',1,NULL,80,NULL,12,80,0,NULL,NULL),(34712,100,'2025-01-13',10,0.00,18,NULL,NULL,180,180,NULL,NULL),(34713,9,'2025-01-08',48,NULL,63,NULL,13,3024,3024,NULL,NULL),(34714,75,'2025-01-08',48,NULL,73,NULL,13,3504,3504,NULL,NULL),(34715,56,'2025-01-08',5,NULL,205,NULL,13,1025,1025,NULL,NULL),(34716,54,'2025-01-08',20,NULL,21,NULL,13,420,420,NULL,NULL),(34717,29,'2025-01-08',2,NULL,275,NULL,13,550,550,NULL,NULL),(34718,11,'2025-01-08',20,NULL,190,NULL,13,3800,3800,NULL,NULL),(34719,44,'2025-01-08',5,NULL,235,NULL,13,1175,1175,NULL,NULL),(34720,6,'2025-01-08',10,NULL,53,NULL,13,530,530,NULL,NULL),(34721,8,'2025-01-08',10,NULL,21,NULL,13,210,210,NULL,NULL),(34722,57,'2025-01-08',10,NULL,85,NULL,13,850,850,NULL,NULL),(34723,33,'2025-01-08',40,NULL,32,NULL,13,1280,1280,NULL,NULL),(34724,300,'2025-01-08',10,NULL,60,NULL,1,600,600,NULL,NULL),(34725,7,'2025-01-08',20,NULL,60,NULL,1,1200,1200,NULL,NULL),(34726,47,'2025-01-08',1,NULL,315,NULL,1,315,315,NULL,NULL),(34727,96,'2025-01-08',10,NULL,25,NULL,1,250,250,NULL,NULL),(34728,301,'2025-01-08',1,NULL,180,NULL,1,180,180,NULL,NULL),(34729,51,'2025-01-08',10,NULL,315,NULL,1,3150,3150,NULL,NULL),(34730,302,'2025-01-08',1,NULL,220,NULL,1,220,220,NULL,NULL),(34731,81,'2025-01-08',12,NULL,115,NULL,1,1380,1380,NULL,NULL),(34732,23,'2025-01-08',10,NULL,55,NULL,1,550,550,NULL,NULL),(34733,180,'2025-01-08',5,NULL,260,NULL,1,1300,1300,NULL,NULL),(34734,116,'2025-01-08',1,NULL,600,NULL,1,600,600,NULL,NULL),(34735,188,'2025-01-08',20,NULL,95,NULL,1,1900,1900,NULL,NULL),(34736,303,'2025-01-08',50,NULL,90,NULL,1,4500,4500,NULL,NULL),(34737,232,'2025-01-08',1,NULL,300,NULL,1,300,300,NULL,NULL),(34738,189,'2025-01-08',5,NULL,85,NULL,1,425,425,NULL,NULL),(34739,91,'2025-01-08',50,NULL,25,NULL,1,1250,1250,NULL,NULL),(34740,86,'2025-01-08',50,NULL,26,NULL,1,1300,1300,NULL,NULL),(34741,304,'2025-01-08',5,NULL,150,NULL,1,750,750,NULL,NULL),(34742,246,'2025-01-08',5,NULL,380,NULL,1,1900,1900,NULL,NULL),(34743,15,'2025-01-08',10,NULL,40,NULL,1,400,400,NULL,NULL),(34744,73,'2025-01-08',30,NULL,90,NULL,1,2700,2700,NULL,NULL),(34745,65,'2025-01-08',10,NULL,75,NULL,1,750,750,NULL,NULL),(34746,57,'2025-01-08',10,NULL,88,NULL,1,880,880,NULL,NULL),(34747,76,'2025-01-08',10,NULL,88,NULL,1,880,880,NULL,NULL),(34748,32,'2025-01-08',20,NULL,40,NULL,1,800,800,NULL,NULL),(34749,305,'2025-01-08',12,NULL,130,NULL,1,1560,1560,NULL,NULL),(34750,99,'2025-01-08',50,NULL,38,NULL,1,1900,1407,NULL,NULL),(34751,123,'2025-01-08',1,NULL,285,NULL,1,285,0,NULL,NULL),(34752,306,'2025-01-08',10,NULL,25,NULL,1,250,0,NULL,NULL),(34753,16,'2025-01-14',30,0.00,88,NULL,NULL,2640,2640,NULL,NULL),(34754,38,'2025-01-14',1,0.00,590,NULL,NULL,590,590,NULL,NULL),(34755,88,'2025-01-14',2,0.00,40,NULL,NULL,80,80,NULL,NULL),(34756,47,'2025-01-14',2,0.00,310,NULL,9,620,620,NULL,NULL),(34757,13,'2025-01-15',10,0.00,777,NULL,4,7770,0,NULL,NULL),(34758,189,'2025-01-15',20,0.00,85,NULL,4,1700,0,NULL,NULL),(34759,69,'2025-01-15',5,0.00,110,NULL,5,550,550,NULL,NULL),(34909,53,'2025-01-09',30,NULL,70,NULL,1,2100,0,NULL,NULL),(34910,150,'2025-01-09',100,NULL,32,NULL,1,3200,0,NULL,NULL),(34911,124,'2025-01-09',50,NULL,20,NULL,1,1000,0,NULL,NULL),(34912,325,'2025-01-09',5,NULL,70,NULL,1,350,0,NULL,NULL),(34913,16,'2025-01-09',5,NULL,90,NULL,1,450,0,NULL,NULL),(34914,184,'2025-01-09',10,NULL,30,NULL,1,300,0,NULL,NULL),(34915,39,'2025-01-09',10,NULL,55,NULL,1,550,0,NULL,NULL),(34916,175,'2025-01-09',20,NULL,110,NULL,1,2200,0,NULL,NULL),(34917,136,'2025-01-09',10,NULL,180,NULL,1,1800,0,NULL,NULL),(34918,104,'2025-01-09',60,NULL,50,NULL,1,3000,0,NULL,NULL),(34919,119,'2025-01-09',3,NULL,255,NULL,1,765,0,NULL,NULL),(34920,326,'2025-01-09',12,NULL,75,NULL,1,900,0,NULL,NULL),(34921,50,'2025-01-09',10,NULL,150,NULL,1,1500,0,NULL,NULL),(34922,34,'2025-01-09',20,NULL,130,NULL,1,2600,0,NULL,NULL),(34923,131,'2025-01-09',200,NULL,47,NULL,1,9400,0,NULL,NULL),(34924,168,'2025-01-09',40,NULL,58,NULL,1,2320,0,NULL,NULL),(34925,30,'2025-01-09',5,NULL,250,NULL,1,1250,0,NULL,NULL),(34926,98,'2025-01-09',60,NULL,25,NULL,1,1500,0,NULL,NULL),(34927,172,'2025-01-09',30,NULL,80,NULL,1,2400,0,NULL,NULL),(34928,219,'2025-01-09',10,NULL,30,NULL,1,300,0,NULL,NULL),(34929,92,'2025-01-09',50,NULL,33,NULL,1,1650,0,NULL,NULL),(34930,81,'2025-01-09',24,NULL,115,NULL,1,2760,0,NULL,NULL),(34931,132,'2025-01-09',40,NULL,60,NULL,1,2400,0,NULL,NULL),(34932,180,'2025-01-09',10,NULL,85,NULL,1,850,0,NULL,NULL),(34933,48,'2025-01-09',10,NULL,44,NULL,1,440,0,NULL,NULL),(34934,25,'2025-01-09',10,NULL,68,NULL,1,680,0,NULL,NULL),(34935,327,'2025-01-09',10,NULL,250,NULL,1,2500,0,NULL,NULL),(34936,87,'2025-01-09',60,NULL,22,NULL,1,1320,0,NULL,NULL),(34937,54,'2025-01-09',20,NULL,22,NULL,1,440,0,NULL,NULL),(34938,101,'2025-01-09',10,NULL,40,NULL,1,400,0,NULL,NULL),(34939,83,'2025-01-09',20,NULL,16,NULL,1,320,0,NULL,NULL),(34940,328,'2025-01-09',50,NULL,72,NULL,1,3600,0,NULL,NULL),(34941,329,'2025-01-09',5,NULL,140,NULL,1,700,0,NULL,NULL),(34942,67,'2025-01-09',20,NULL,60,NULL,1,1200,0,NULL,NULL),(34943,290,'2025-01-09',10,NULL,25,NULL,1,250,0,NULL,NULL),(34944,36,'2025-01-09',50,NULL,22,NULL,1,1100,0,NULL,NULL),(34945,111,'2025-01-09',40,NULL,45,NULL,1,1800,0,NULL,NULL),(34946,122,'2025-01-09',40,NULL,18,NULL,1,720,0,NULL,NULL),(34947,86,'2025-01-09',50,NULL,26,NULL,1,1300,0,NULL,NULL),(34948,330,'2025-01-09',1,NULL,140,NULL,1,140,0,NULL,NULL),(34949,115,'2025-01-09',5,NULL,175,NULL,1,875,0,NULL,NULL),(34950,331,'2025-01-09',10,NULL,75,NULL,1,750,0,NULL,NULL),(34951,70,'2025-01-09',40,NULL,40,NULL,1,1600,0,NULL,NULL),(34952,6,'2025-01-09',10,NULL,55,NULL,1,550,0,NULL,NULL),(34953,27,'2025-01-09',30,NULL,120,NULL,1,3600,0,NULL,NULL),(34954,332,'2025-01-09',50,NULL,191,NULL,1,9550,0,NULL,NULL),(34955,99,'2025-01-09',50,NULL,38,NULL,1,1900,0,NULL,NULL),(34956,203,'2025-01-09',50,NULL,7.5,NULL,1,375,0,NULL,NULL),(34957,200,'2025-01-09',5,NULL,75,NULL,1,375,0,NULL,NULL),(34958,333,'2025-01-09',5,NULL,90,NULL,1,450,0,NULL,NULL),(34959,4,'2025-01-09',20,NULL,55,NULL,1,1100,0,NULL,NULL),(34960,14,'2025-01-09',30,NULL,90,NULL,1,2700,0,NULL,NULL),(34961,52,'2025-01-09',30,NULL,110,NULL,1,3300,0,NULL,NULL),(34962,74,'2025-01-09',20,NULL,177,NULL,1,3540,0,NULL,NULL),(34963,13,'2025-01-09',10,NULL,60,NULL,1,600,0,NULL,NULL),(34964,130,'2025-01-09',20,NULL,35,NULL,1,700,0,NULL,NULL),(34965,202,'2025-01-09',1,NULL,270,NULL,1,270,0,NULL,NULL),(34966,321,'2025-01-09',20,NULL,70,NULL,1,1400,0,NULL,NULL),(34967,89,'2025-01-09',50,NULL,28,NULL,1,1400,0,NULL,NULL),(34968,80,'2025-01-09',66,NULL,90,NULL,1,5940,0,NULL,NULL),(34969,4,'2025-01-16',30,0.00,55,NULL,6,1650,0,NULL,NULL),(34970,10,'2025-01-16',30,0.00,60,NULL,6,1800,0,NULL,NULL),(34971,57,'2025-01-16',1,0.00,85,NULL,NULL,85,85,NULL,NULL),(34972,9,'2025-01-16',1,0.00,65,NULL,NULL,65,65,NULL,NULL),(34973,316,'2025-01-16',1,0.00,65,NULL,NULL,65,65,NULL,NULL),(34974,189,'2025-01-16',1,0.00,85,NULL,NULL,85,85,NULL,NULL),(34975,51,'2025-01-16',10,0.00,308,NULL,NULL,3080,3080,NULL,NULL),(34976,123,'2025-01-16',1,0.00,280,NULL,10,280,280,NULL,NULL),(34977,61,'2025-01-16',1,0.00,80,NULL,NULL,80,80,NULL,NULL),(34984,342,'2025-01-11',2,0.00,220,NULL,1,440,0,NULL,NULL),(34985,66,'2025-01-11',5,0.00,175,NULL,1,875,0,NULL,NULL),(34986,26,'2025-01-11',10,0.00,58,NULL,1,580,0,NULL,NULL),(34987,22,'2025-01-11',10,0.00,115,NULL,1,1150,0,NULL,NULL),(34988,53,'2025-01-11',20,0.00,70,NULL,1,1400,0,NULL,NULL),(34989,335,'2025-01-11',10,0.00,295,NULL,1,2950,0,'',NULL),(34990,45,'2025-01-18',5,0.00,600,NULL,1,3000,0,NULL,NULL),(34991,136,'2025-01-11',5,0.00,180,NULL,1,900,0,NULL,NULL),(34992,336,'2025-01-11',1,0.00,350,NULL,1,350,0,NULL,NULL),(34993,189,'2025-01-11',10,0.00,86,NULL,13,860,860,NULL,NULL),(34994,337,'2025-01-11',39,0.00,144,NULL,1,5616,0,NULL,NULL),(34995,38,'2025-01-11',5,0.00,600,NULL,1,3000,0,NULL,NULL),(34999,213,'2025-01-11',60,0.00,70,NULL,1,4200,0,NULL,NULL),(35000,123,'2025-01-19',6,0.00,280,NULL,10,1680,0,NULL,NULL),(35001,194,'2025-01-11',22,0.00,82,NULL,1,1804,0,NULL,NULL),(35002,81,'2025-01-11',12,0.00,115,NULL,1,1380,0,NULL,NULL),(35003,22,'2025-01-19',5,0.00,110,NULL,9,550,0,NULL,NULL),(35004,73,'2025-01-19',1,0.00,100,NULL,NULL,100,100,NULL,NULL),(35005,119,'2025-01-19',1,0.00,250,NULL,4,250,0,NULL,NULL),(35006,234,'2025-01-20',1,0.00,250,NULL,NULL,250,250,NULL,NULL),(35007,14,'2025-01-20',5,0.00,92,NULL,13,460,460,NULL,NULL),(35008,59,'2025-01-11',20,0.00,80,NULL,1,1600,0,NULL,NULL),(35009,132,'2025-01-11',80,0.00,60,NULL,1,4800,0,NULL,NULL),(35010,227,'2025-01-20',20,0.00,76,NULL,10,1520,1520,NULL,NULL),(35011,215,'2025-01-20',20,0.00,175,NULL,1,3500,0,NULL,NULL),(35013,93,'2025-01-11',50,0.00,25,NULL,1,1250,0,NULL,NULL),(35015,10,'2025-01-11',10,0.00,55,NULL,1,550,0,NULL,NULL),(35016,103,'2025-01-11',50,0.00,25,NULL,1,1250,0,'',NULL),(35018,123,'2025-01-20',3,0.00,280,NULL,10,840,0,NULL,NULL),(35019,227,'2025-01-21',10,0.00,76,NULL,NULL,760,760,NULL,NULL),(35020,75,'2025-01-21',1,0.00,80,NULL,NULL,80,80,NULL,NULL),(35023,55,'2025-01-21',10,0.00,65,NULL,NULL,650,0,NULL,NULL),(35024,25,'2025-01-21',10,0.00,68,NULL,NULL,680,0,'',NULL),(35025,184,'2025-01-11',40,0.00,30,NULL,1,1200,0,NULL,1),(35026,199,'2025-01-11',10,0.00,50,NULL,1,500,0,'',1),(35027,200,'2025-01-11',10,0.00,75,NULL,1,750,0,'',1),(35028,71,'2025-01-11',30,0.00,120,NULL,1,3600,0,'',1),(35029,40,'2025-01-11',10,0.00,45,NULL,1,450,0,'',1),(35030,102,'2025-01-11',60,0.00,25,NULL,1,1500,0,'',1),(35031,338,'2025-01-11',5,0.00,5,NULL,1,25,0,'',1),(35032,167,'2025-01-11',2,0.00,290,NULL,1,580,0,'',1),(35033,24,'2025-01-11',10,0.00,33,NULL,1,330,0,'',1),(35034,339,'2025-01-11',5,0.00,30,NULL,1,150,0,'',1),(35035,33,'2025-01-11',50,0.00,33,NULL,1,1650,0,'',1),(35036,340,'2025-01-11',10,0.00,110,NULL,1,1100,0,'',1),(35037,341,'2025-01-11',20,0.00,80,NULL,1,1600,0,'',1),(35038,119,'2025-01-12',5,0.00,252,NULL,13,1260,1260,NULL,2),(35039,131,'2025-01-12',100,0.00,45,NULL,13,4500,4500,'',2),(35040,126,'2025-01-12',20,0.00,8,NULL,13,160,160,'',2),(35041,110,'2025-01-12',24,0.00,54,NULL,13,1296,1296,'',2),(35042,87,'2025-01-12',20,0.00,20,NULL,13,400,400,'',2),(35043,121,'2025-01-12',5,0.00,133,NULL,13,665,665,'',2),(35044,83,'2025-01-12',60,0.00,16,NULL,13,960,960,'',2),(35045,91,'2025-01-12',20,0.00,25,NULL,13,500,500,'',2),(35046,111,'2025-01-12',20,0.00,43,NULL,13,860,860,'',2),(35047,86,'2025-01-12',100,0.00,25,NULL,13,2500,2500,'',2),(35048,135,'2025-01-12',20,0.00,15,NULL,13,300,300,'',2),(35049,128,'2025-01-12',4,0.00,175,NULL,13,700,700,'',2),(35050,123,'2025-01-12',5,0.00,280,NULL,13,1400,1400,'',2),(35051,130,'2025-01-12',40,0.00,35,NULL,13,1400,1400,'',2),(35052,117,'2025-01-12',24,0.00,79,NULL,13,1896,1896,'',2),(35053,125,'2025-01-12',3,0.00,20,NULL,13,60,60,'',2);
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `vendors`
--

LOCK TABLES `vendors` WRITE;
/*!40000 ALTER TABLE `vendors` DISABLE KEYS */;
INSERT INTO `vendors` VALUES (1,'Wazir Ahmad','Pakistani','Kandahar, Ayub Shefa Market','0700757490',NULL,'Cash','All'),(2,'Ehsan Nazari','Pakistani','Kandahar','0703100662',NULL,'Cash','Drugs'),(3,'Abdul Samad','Ansari Market','Kandahar','0705651268',NULL,'Cash','Drugs'),(4,'Malal','Pakistani','Kandahar','0703350313',NULL,'Cash','Drugs'),(5,'Kakar','Pakistani','Kandahar','0700787736',NULL,'Cash','Drugs'),(6,'Hafez','Pakistani','Kandahar','0704661221',NULL,'Cash','Drugs'),(7,'Mukhtar Ahmad Faiz','Pakistani','Kandahar','0700342668',NULL,'Cash','Drugs'),(8,'Zaheer','Pakistani','Kandahar','0706968632',NULL,'Cash','Drugs'),(9,'Haris Obaid','Pakistani','Kandahar','0700142929',NULL,'Cash','Drugs'),(10,'Salman','Indian','Kandahar','0700064138',NULL,'Cash','Drugs'),(11,'Qudratullah','Pakistani','Kandahar','0795800092',NULL,'Cash','Drugs'),(12,'Hussain Zada','Pakistani','Kandahar','0700341564',NULL,'Cash','Drugs'),(13,'AlHekmat Motasem','Pakistani','Kandahar','0708204653',NULL,'Cash','Drugs'),(14,'Khairullah Insaf','Pakistani','Kandahar','0700556584',NULL,'Cash','Drugs'),(15,'Masih Samim','Indian','Kabul','0784608000',NULL,'Cash','All'),(16,'Esmatullah Noori','Indian','Kabul','0795989999',NULL,'Cash','Karwan Sehat'),(17,'Nasratullah Saleh','Indian','Kabul','0799800944',NULL,'Cash',NULL),(18,'Ferdaws Iqbal','Company','Mazar Hotel','0780600914','Ferdaws.iqbalmzr@gmail.com','Cash','All'),(19,'Abdul Fatah Qarizada','Common','Mazar Hotel','0729529529',NULL,'Both',NULL),(20,'Salehi Brothers','Vietnamese','Mazar Hotel','0788825404',NULL,'Credit','No. 175'),(21,'Ajmal Halim','Natural Health','Mazar Hotel','0792886688',NULL,'Credit',NULL),(22,'Ibn Sina','Euro','Mazar Hotel','070054026','ibnsina0006@gmail.com','Credit','No 187'),(23,'Blue Uranus Trading Company','Indian','Nawaiee Market','0729870114',NULL,'Credit',NULL),(973,'Sina','email','Dehbori','76876876','sina@gmail.com','30n','Smart');
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
 1 AS `initial_amount`*/;
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
/*!50001 VIEW `inventorystockstatus` AS select `inventory`.`Inventory_ID` AS `Inventory_ID`,`inventory`.`Drug_ID` AS `Drug_ID`,`drugs`.`Drug_Name` AS `Drug_Name`,`inventory`.`Expiration` AS `Expiration`,`inventory`.`Initial_Amount` AS `Initial_Amount`,(`inventory`.`Initial_Amount` - coalesce(sum(`sales`.`Quantity`),0)) AS `Remaining_Stock` from ((`inventory` left join `sales` on((`inventory`.`Inventory_ID` = `sales`.`Inventory_ID`))) left join `drugs` on((`inventory`.`Drug_ID` = `drugs`.`Drug_ID`))) group by `inventory`.`Inventory_ID`,`inventory`.`Drug_ID`,`drugs`.`Drug_Name`,`inventory`.`Initial_Amount` */;
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

-- Dump completed on 2025-01-22 12:51:16
