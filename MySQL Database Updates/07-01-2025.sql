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
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companies`
--

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` VALUES (1,'Pars Darou','Iran','021_74373','www.parsdarou.ir'),(2,'Atco','Pakistan',NULL,NULL),(3,'Hilton Pharma','Pakistan',NULL,NULL),(4,'Sanovel','Turkey',NULL,NULL),(5,'ROUTE2HEALTH','Pakistan',NULL,NULL),(6,'Symbiosis','India',NULL,NULL),(7,'Akson','Turkey',NULL,NULL),(8,'Marham Daru','Iran',NULL,NULL),(9,'Jalinous','Iran',NULL,NULL),(10,'Athens','India',NULL,NULL),(11,'Werrick','Pakistan',NULL,NULL),(12,'Sanofi','Pakistan',NULL,NULL),(13,'HIGHNOON','Pakistan',NULL,NULL),(14,'GLITZ Pharma','Pakistan',NULL,NULL),(15,'OVATION REMEDIES','India',NULL,NULL),(16,'Medicraft','Pakistan',NULL,NULL),(17,'Searle','Pakistan',NULL,NULL),(18,'AMBROSIA','Pakistan',NULL,NULL),(19,'Scotmann','Pakistan',NULL,NULL),(20,'AGP','Pakistan',NULL,NULL),(21,'ABL Plus','China',NULL,NULL),(22,'Shanxi Federal','China',NULL,NULL),(23,'TAOLIGHT Pharma','China',NULL,NULL),(24,'Unimax','India',NULL,NULL),(25,'Platinum','Pakistan',NULL,NULL),(26,'GSK','Pakistan',NULL,NULL),(27,'LCI','Pakistan',NULL,NULL),(28,'Getz','Pakistan',NULL,NULL),(29,'Aspin Pharma','Pakistan',NULL,NULL),(30,'Martin Dow','Pakistan',NULL,NULL),(31,'Pfizer','Pakistan',NULL,NULL),(32,'UniMark','Pakistan',NULL,NULL),(33,'Sami','Pakistan',NULL,NULL),(34,'Abbott','Pakistan',NULL,NULL),(35,'Pharmedic','Pakistan',NULL,NULL),(36,'Zafa','Pakistan',NULL,NULL),(37,'Alliance','Pakistan',NULL,NULL),(38,'Maple','Pakistan',NULL,NULL),(39,'Medisynth','Pakistan',NULL,NULL),(40,'CoreVita','India',NULL,NULL),(41,'Incepta','Bangladesh',NULL,NULL),(42,'Univentis Medicare','India',NULL,NULL),(43,'Lark','India',NULL,NULL),(44,'Combitic','India',NULL,NULL),(45,'Zagros','Iran',NULL,NULL),(46,'GUFIC','India',NULL,NULL),(47,'Nobel','Turkey',NULL,NULL),(48,'Novartis','Pakistan',NULL,NULL),(49,'AsianContinental','Pakistan',NULL,NULL),(50,'KGMP','Korea',NULL,NULL),(51,'Hansel','Pakistan',NULL,NULL),(52,'Sobhan','Iran',NULL,NULL),(53,'Mez','India',NULL,NULL),(54,'Natural Health','UK',NULL,NULL),(55,'Euro','Bangladesh',NULL,NULL),(56,'Radicon','India',NULL,'www.radiconlab.com'),(57,'ModHike','India',NULL,'www.modhike.com'),(58,'Life Pharma','UAE',NULL,NULL),(59,'Amin Pharma','Iran',NULL,NULL),(60,'Mehr Darou','Iran',NULL,NULL),(61,'Leeford Healthcare','India',NULL,NULL),(62,'Ridley Life Sciences','India',NULL,NULL),(63,'Cipla','India',NULL,NULL),(64,'Ducross','India',NULL,NULL),(65,'Knoll Healthcare','India',NULL,NULL),(66,'PharmaKing','India',NULL,NULL),(67,'ARBRO','India',NULL,'arbro@arbropharma.com'),(68,'Kharazmi','Iran',NULL,NULL),(69,'PT Sanbe Farma','Indonesia',NULL,NULL),(70,'Pinewood Healthcare','Ireland',NULL,NULL),(71,'Sunlife','Germany',NULL,NULL),(72,'Firooz','Iran',NULL,NULL),(73,'Royal Surgicare','India',NULL,NULL),(74,'Innova Captab','India',NULL,NULL),(75,'Sydler Remedies','India',NULL,NULL),(76,'Nexus Times','UAE',NULL,NULL),(77,'Torrvis','India',NULL,NULL),(78,'GoldenGate','UAE',NULL,NULL),(79,'IndoFarma','Indonesia',NULL,NULL),(80,'Health Plus','China',NULL,NULL),(81,'Dorsa','Iran',NULL,NULL),(82,'General','Bangladesh',NULL,NULL),(83,'OBS','Pakistan',NULL,NULL),(84,'Indus Pharma','Pakistan',NULL,NULL),(85,'Banson','India',NULL,NULL),(86,'Ruxall','India',NULL,NULL),(87,'Kaizen','Pakistan',NULL,NULL),(88,'Atabay','Turkey',NULL,NULL),(89,'Ferozsons','Pakistan',NULL,NULL),(90,'Astamed Healthcare','India',NULL,NULL),(91,'Biofarma','Turkey',NULL,NULL),(92,'Renata','Bangladesh',NULL,NULL),(93,'Milli Shifa','Afghanistan',NULL,'Sales.mspafg@gmail.com');
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
  PRIMARY KEY (`customer_id`),
  UNIQUE KEY `phone_UNIQUE` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=1002 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'Muhebi Pharmacy','Asad Muhebi','Mohib Square','0773737181','Main Customer'),(2,'Sayed Saboor Naqshbandi',NULL,'Mazar Hotel',NULL,NULL),(3,'Kaihan Bik',NULL,'Mazar Hotel',NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drug_type`
--

LOCK TABLES `drug_type` WRITE;
/*!40000 ALTER TABLE `drug_type` DISABLE KEYS */;
INSERT INTO `drug_type` VALUES (1,'Tablet'),(2,'Capsule'),(3,'Syrup'),(4,'Injection'),(5,'Pomad');
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
-- Dumping data for table `drugs`
--

LOCK TABLES `drugs` WRITE;
/*!40000 ALTER TABLE `drugs` DISABLE KEYS */;
INSERT INTO `drugs` VALUES (1,3,'Lerace 30','Levetiracetam 100mg/ml',1,3,4),(2,2,'Ascard 75','Aspirin BP 75 mg',30,1,3),(3,4,'Ator 20','Atorvastatin',30,1,3),(4,7,'CalciPower Plus','Multivitamin',1,3,20),(5,18,'Cardinol 10','Propranolol Hydrochloride BP',50,1,3),(6,16,'Clik 20','Citalopram 20mg',14,1,1),(7,17,'Serenace 1.5','Haloperidol',50,1,1),(8,11,'Epitab XR 200','Carbamazepine 200mg',50,1,4),(9,19,'Jingle 50','Atenolol 50mg',30,1,3),(10,24,'Selazid-D','Lansoprazole & Domeridone 30mg + 10 mg',10,2,5),(11,1,'Amitriptyline 10','Amitriptyline 10mg',100,1,1),(12,13,'Loprin 150','Aspirin 150mg',30,1,3),(13,20,'Maxna 500','Tranexamic Acid 500mg',20,2,22),(14,5,'Melatonin 5','Melatonin 5mg',30,1,1),(15,10,'Opanto 40','Pantoprazole 40mg',30,1,5),(16,10,'Osar Plus','Losartan Potassium & Hydrochlorothiazide',20,1,3),(17,23,'Paracetamol','Paracetamol',100,4,17),(18,12,'Phenergan','Promethazine HCL',1,3,1),(19,6,'Pirasym','Piracetam 500mg/150ml ',1,3,3),(20,10,'Pram 10','Escitalopram 10mg',30,1,NULL),(21,14,'Procye 5','Procyclidine HCL',100,1,NULL),(22,4,'Selectra 100','Sertraline 100mg',28,1,NULL),(23,21,'Syringe 10','Syring 10ml',100,4,NULL),(24,9,'Vitamin B6','Vitamin B6',100,1,NULL),(25,22,'Water','Water for Injection',100,4,NULL),(26,25,'Seizunil 200','Carbamazepine 200mg',50,1,NULL),(27,25,'Ceregin 1.5','Co-dergocrine mesilates',30,1,NULL),(28,17,'Serenace 5','Serenace 5mg',25,4,NULL),(29,17,'Sinemet 25/250','Carbidopa/Levodopa 25/250 mg',100,1,NULL),(30,26,'Panadol CF','Paracetamol, Pseudoephedrine HCL & Chlorpheniramine Maleate',100,1,NULL),(31,27,'Tenormin 50','Atenolol 50mg',21,1,NULL),(32,27,'Tenormin 25','Atenolol 25mg',21,1,NULL),(33,26,'Augmentin BD 1000','Co-amoxiclav 1000',6,1,NULL),(34,28,'Cefiget 100','Cefixime 100mg/5ml',1,3,NULL),(35,28,'Cefiget 200','Cefixime 200mg/5ml',1,3,NULL),(36,2,'Bronkal 2mg/5ml','Salbutamol Oral Solution',1,3,NULL),(37,29,'Stugeron 25','Cinnarizine 25mg',50,1,NULL),(38,30,'Sangobion','Iron, Folic Acid, Vitamin C & B12',30,2,NULL),(39,31,'Feldene 20','Piroxicam 20mg',40,2,NULL),(40,27,'Inderal 10','Propranolol 10mg',50,1,NULL),(41,27,'Inderal 40','Propranolol 40mg',50,1,NULL),(42,26,'FefolVit','Iron & Vitamins + Folic Acid',56,2,NULL),(43,30,'Pcam','Piroxicam',5,4,NULL),(44,32,'Carsel 25','Metoprolol 25mg',30,1,NULL),(45,32,'Carsel 50','Metoprolol 50mg ',30,1,NULL),(46,30,'Polybion Z','Zinc + Vitamin C',30,2,NULL),(47,30,'Buscopan Plus','Hyoscine Butylbromide + Paracetamol',100,1,NULL),(48,33,'Trimetabol','Appetizer',1,3,NULL),(49,34,'Surbex Z','Zinc, Folic Acid + Vitamins',30,1,NULL),(50,35,'Sensival 25','Nortriptyline HCL',20,1,NULL),(51,12,'Stemetil 5','Prochlorperazine Maleate',300,1,NULL),(52,11,'Epitab XR 400','Carbamazepine 400mg',20,1,NULL),(53,34,'Epival 500','Divalproex Sodium 500mg',100,1,NULL),(54,34,'Epival 250','Divalproex Sodium 250mg',100,1,NULL),(55,36,'Cardace 5','Enalapril Maleate 5mg',20,1,NULL),(56,36,'Zodip 5','Amlodipine 5mg',20,1,NULL),(57,25,'Seizunil 100mg/5ml','Carbamazepine 100mg/5ml',1,3,NULL),(58,30,'Polybion Forte','High Potency + B-Complex',1,3,NULL),(59,30,'Evion','Vitamin E',100,2,NULL),(60,30,'Glucovance 500/2.5','Metformin + Glibenclamide 500/2.5 mg',30,1,NULL),(61,11,'Nervin 0.25','Alprazolam 0.25mg',30,1,NULL),(62,11,'Nervin 0.5','Alprazolam 0.5mg',30,1,NULL),(63,37,'Partin 20','Paroxetine 20mg',10,1,NULL),(64,28,'Risek 20','Omeprazole 20mg',21,2,NULL),(65,38,'Mornig','Doxylamine Succinate + Pyridoxine HCL',30,1,NULL),(66,33,'Breeky','Misoprostol 200',10,1,NULL),(67,26,'Chewcal','Calcium + Vitamin D3',30,1,NULL),(68,26,'Kemadrin','Procyclidine HCL',100,1,NULL),(69,30,'Glucophage 500','Metformin HCL',50,1,NULL),(70,17,'Tryptanol 25','Amitriptyline HCL 25mg',100,1,NULL),(71,39,'Olsa 5','Olanzapine 5mg',10,1,NULL),(72,39,'Olsa 10','Olanzapine 10mg',10,1,NULL),(73,8,'Trifluoperazine 2','Trifluoperazine 2mg',100,1,NULL),(74,15,'Ketrol 30','Ketrolac Tromethamine',5,4,NULL),(75,13,'Skilax 30','Sodium Picosulfate',1,3,NULL),(76,40,'Tropex 50','Topiramate 50mg',30,1,NULL),(77,41,'Calvimax Plus','Calcium, Vitamin D & Multimineral',30,1,NULL),(78,6,'Ecit 10','Escitalopram 10mg',30,1,NULL),(79,42,'Epitira 500','Levetiracetam 500mg',200,1,NULL),(80,43,'Pantolar DSR','Pantoprazole & Domperidone',100,2,NULL),(81,44,'Pantocure D Forte','Domperidone & Pantoprazole',200,2,NULL),(82,45,'Folic Acid 1','Folic Acid 1mg',100,1,NULL),(83,46,'Puretrig 5000 IU','Chorionic Gonadotrophin 5000',1,4,NULL),(84,43,'Medlar','Paracetamol, Meloxicam, Domperidone & Caffeine',120,1,NULL),(85,47,'Tylol','Paracetamol 500mg',30,1,NULL),(86,2,'Atcopram 10','Escitalopram',NULL,NULL,NULL),(87,36,'Cardace 10','Enalapril Maleate 10mg',20,1,NULL),(88,34,'Duphaston 10','Dydrogesterone 10mg',20,1,NULL),(89,30,'Teril 200','Carbamazepine 200mg',50,1,NULL),(90,28,'Amclav 1g','Co-Amoxiclav 1g',6,1,NULL),(91,13,'Loprin 75','Aspirin 75mg',30,1,NULL),(92,20,'Sinaxamol Extra','Paracetamol/Orphenadrine Citrate 650mg/50mg',30,1,NULL),(93,12,'Flagyl 400','Metronidazole 400mg',200,1,NULL),(94,30,'Rivotril 0.5','Clonazepam 0.5mg',50,1,NULL),(95,48,'Tegral 200','Carbamazepine 200mg',50,1,NULL),(96,3,'Alp 0.5','Alprazolam 0.5 mg',30,1,NULL),(97,49,'Cardiolite 50','Atenolol 50mg',100,1,NULL),(98,50,'Prime Amoxi 500','Amoxicillin 500mg',20,2,NULL),(99,34,'Prothiaden 75','Dosulepin HCL 75mg',30,1,NULL),(100,78,'IV Cannula Shaheen','IV Cannula',100,4,NULL),(101,36,'Hexidyl 2','Trihexyphenidyl HCL',100,1,NULL),(102,30,'Rivotril 2.5','Clonazepam 2.5mg/ml',1,3,NULL),(103,51,'Roxitin 20','Paroxetine',10,1,NULL),(104,52,'Clonazepam 1','Clonazepam 1mg',100,1,NULL),(105,52,'Clonazepam 2','Clonazepam 2mg',100,1,NULL),(106,53,'Zofest M','Flupenthixol & Melitracen',30,1,NULL),(107,10,'Tralin 100','Sertraline 100mg',30,1,NULL),(108,10,'Tralin 50','Sertraline 50mg',30,1,NULL),(109,10,'Pregafix 75','Pregabalin 75mg',14,2,NULL),(110,10,'MNC Plus','Pregabalin & Methulcobalamin',20,2,NULL),(111,14,'Seitam 60','Levetiracetam 100mg/ml',1,3,NULL),(112,14,'Ozip 10','Olanzapine 10mg',10,1,NULL),(113,14,'Mamgit 10','Memantine HCL',10,1,NULL),(114,14,'Qutia 100','Quetiapine 100mg',30,1,NULL),(115,54,'Ginkoba','Ginkgo Biloba',30,2,NULL),(116,55,'Penticin','Fluepentixol 0.5mg & Melitracen 10mg',30,1,NULL),(117,56,'Omecon 20','Omeprazole 20mg',100,2,NULL),(118,57,'Sertania 100','Sertraline HCL 100mg',100,1,NULL),(119,58,'Panalife 500','Paracetamol 500mg',24,1,NULL),(120,59,'Ammorel 100','Amantadine 100mg',100,2,NULL),(121,60,'Nitrofurantoin 100','Nitrofurantoin 100mg',100,1,NULL),(122,57,'Zaptaaz 7.5','Mirtazapine 7.5mg',100,1,NULL),(123,43,'Onocid D','Omeprazole & Domperidone',100,2,NULL),(124,57,'Escapaam 20','Escitalopram 20mg',200,1,NULL),(125,56,'Ascitopaam 10','Escitalopram Oxalate 10mg',200,1,NULL),(126,43,'Clomifene 50','Clomiphene Citrate',100,1,NULL),(127,61,'Wellamo AT','Amlodipine & Atenolol 5mg + 50mg',280,1,NULL),(128,62,'Velsiplus 200','Sodium Valporate 200mg',100,1,NULL),(129,63,'LQuin 750','Levofloxacin 750mg',50,1,NULL),(130,64,'Escape 20','Escitalopram Oxalate 20mg',100,1,NULL),(131,65,'Dulexit 30','Duloxetine HCL 30mg',200,2,NULL),(132,57,'Olanzya 5','Olanzapine 5mg',200,1,NULL),(133,57,'Olanzya 10','Olanzapine 10mg',200,1,NULL),(134,57,'Zaptaaz 15','Mirtazapine 15mg',100,1,NULL),(135,64,'Dunixit','Flupentixol & Melitracen',100,1,NULL),(136,43,'Clomifene 25','Clomiphene Citrate 25mg',100,1,NULL),(137,66,'Pantaking D','Domperidone & Pantoprazole',200,1,NULL),(138,43,'Lanocid','Lansoprazole Delayed Release',100,2,NULL),(139,67,'Glu V Plex','GLU-V-PLEX',1,3,NULL),(140,65,'Tryptinol 25','Amitriptline HCL 25',200,1,NULL),(141,68,'Vitarol','Vitamin D3',1,3,NULL),(142,69,'Sanaflu','Cold/Flu',1,3,NULL),(143,67,'Milkmag','Antacid/Laxative',1,3,NULL),(144,70,'Neurozin','Multi-Glycerophosphate',1,3,NULL),(145,72,'Cleansing Gel','Intimate Cleansing Gel',1,5,NULL),(146,73,'IV Cannula','IV Cannul',100,4,NULL),(147,71,'Vitamin C','Vitamin C',240,1,NULL),(148,24,'Dynalid PT','Nimesulide, Paracetamol & Tizanidine',100,1,NULL),(149,43,'Ibular PC','Ibuprofen, Paracetamol & Caffeine',100,2,NULL),(150,24,'MaxiCold','Cold/Flu',100,1,NULL),(151,24,'TufCold','Cold/Flu',100,2,NULL),(152,74,'Amster D3','Cholecalciferol 600',40,2,NULL),(153,67,'Zinc Sulphate 20','Zinc Sulphate Dispersible 20mg',100,1,NULL),(154,42,'Fepadol 650','Paracetamol 650mg',100,1,NULL),(155,75,'Stripttol','Throat & Cough',120,1,NULL),(156,75,'Sorasil Lemon','Throat',80,1,NULL),(157,76,'Uni Rovigon','Vitamin A+ E',30,1,NULL),(158,24,'Tufhist MK','Levocetrizine HCL & Montelukast',200,1,NULL),(159,77,'Ginkotor','Ginkgo Biloba',1,3,NULL),(160,24,'Dynalid P','Nimuslide & Paracetamol',100,1,NULL),(161,44,'Zovigravit','Multivitamin & Minerals',20,1,NULL),(162,44,'Lancid','Lansoprazole 30mg',10,2,NULL),(163,79,'Indomag','Ant Acid',1,3,NULL),(164,80,'Syringe 5','Syringe 5ml',100,4,NULL),(165,81,'Propranolol 10','Propranolol HCL 10mg',100,1,NULL),(166,82,'Amit 10','Amitriptyline HCL 10mg',20,1,NULL),(167,48,'Mosegor','Pizotifen',1,3,NULL),(168,83,'Primolut N','Norethisterone',30,1,NULL),(169,84,'Bromalex 3','Bromazepam',30,1,NULL),(170,14,'Qutia 100','Quetiapine 100mg',30,1,NULL),(171,44,'Pantocure D','Domperidone & Pantoprazole',10,1,NULL),(172,85,'Koldene','Cold/Flu',4,1,NULL),(173,86,'Ruxipram 10','Escitalopram 10mg',30,1,NULL),(174,41,'Ticoflex 500','Naproxen 500mg',50,1,NULL),(175,87,'Divalpro CR 500','Divalproex Sodium 500mg',50,1,NULL),(176,88,'Suprafen 400','Ibuprofen 400mg',100,1,NULL),(177,89,'Bronochol','Chesty Coughs',1,3,NULL),(178,90,'Relief','Cold/Flu',10,1,NULL),(179,91,'Famoser 40','Famotidine',30,1,NULL),(180,41,'Vinsetine 5','Vinpocetine 5mg',10,1,NULL),(181,28,'Getryl 1','Glimepiride 1mg',30,1,NULL),(182,28,'Getryl 2','Glimepiride 2mg',30,1,NULL),(183,92,'Orcef 400','Cefixime Trihydrate 400mg',5,1,NULL),(184,36,'Hydroxyprogesterone 250','Hydroxyprogesterone Caproate 250',3,4,NULL),(185,91,'Gabaset 300','Gabapentin 300mg',50,2,NULL),(186,43,'Onocid 20','Omeprazole 20mg',10,2,NULL),(187,18,'Cardinol 40','Propranolol',50,1,NULL),(188,93,'Milli-Sol NS NaCl','NaCl',1,4,NULL);
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
  PRIMARY KEY (`Inventory_ID`),
  KEY `Drug_ID` (`Drug_ID`),
  CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`Drug_ID`) REFERENCES `drugs` (`Drug_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=43544 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory`
--

LOCK TABLES `inventory` WRITE;
/*!40000 ALTER TABLE `inventory` DISABLE KEYS */;
INSERT INTO `inventory` VALUES (1,18,'2026-02-01',38,50,96),(2,46,'2025-11-19',84.5,NULL,600),(3,39,'2025-11-30',212,NULL,40),(4,37,'2027-07-30',45,NULL,488),(5,55,'2026-03-30',18,NULL,200),(6,38,'2026-07-02',49.5,55,720),(7,66,'2026-06-30',51,NULL,200),(8,56,'2027-08-30',18.5,NULL,128),(9,34,'2025-05-30',62,65,144),(10,43,'2026-09-30',52.5,NULL,200),(11,144,'2026-12-30',185,190,240),(12,87,'2026-08-30',39,NULL,200),(13,48,'2025-11-30',54,NULL,480),(14,49,'2025-09-17',39,NULL,26),(15,58,'2025-05-30',39,NULL,50),(16,33,'2026-08-30',35,70,180),(17,64,'2026-11-30',122,128,136),(18,32,'2026-02-28',38,NULL,300),(19,31,'2026-04-30',67,NULL,300),(20,65,'2027-06-30',43,NULL,300),(21,57,'2026-04-30',55,NULL,100),(22,42,'2026-01-30',105,115,166),(23,69,'2027-03-30',49,NULL,150),(24,75,'2027-05-30',28.5,NULL,50),(25,41,'2025-11-30',62,NULL,600),(26,67,'2026-08-30',51,NULL,150),(27,26,'2027-03-30',103,NULL,902),(28,70,'2027-07-30',58,NULL,300),(29,30,'2026-05-30',260,280,80),(30,54,'2026-06-30',228,NULL,122),(31,51,'2026-07-30',108,NULL,50),(32,50,'2027-03-30',37,NULL,200),(33,63,'2025-08-30',30,NULL,1000),(34,52,'2026-01-30',123,NULL,1000),(35,72,'2025-09-30',21,NULL,420),(36,71,'2025-09-30',19,NULL,547),(37,8,'2027-04-30',136,NULL,110),(38,29,'2026-11-30',560,NULL,30),(39,45,'2026-10-30',48,NULL,100),(40,44,'2027-03-30',40,NULL,100),(41,60,'2027-02-16',52,NULL,150),(42,62,'2025-11-30',55,NULL,50),(43,61,'2025-10-30',53,NULL,100),(44,59,'2026-02-21',230,NULL,96),(45,53,'2026-08-17',545,NULL,108),(46,68,'2029-02-20',72,NULL,100),(47,47,'2027-07-25',295,NULL,20),(48,40,'2026-07-09',39,NULL,600),(49,86,'2026-01-30',80,85,756),(50,8,'2026-10-30',136,NULL,313),(51,88,'2027-09-30',300,310,108),(52,89,'2026-12-11',98.5,NULL,1000),(53,90,'2025-11-30',66,90,144),(54,91,'2026-08-30',18,NULL,306),(55,92,'2027-06-30',56,NULL,288),(56,93,'2027-07-30',198,NULL,90),(57,94,'2025-09-04',80,88,200),(58,95,'2026-05-30',145,NULL,170),(59,96,'2026-07-30',69,NULL,50),(60,97,'2025-12-30',229,NULL,30),(61,98,'2027-07-30',78,NULL,100),(62,99,'2025-08-17',60,NULL,100),(63,51,'2027-01-30',108,NULL,50),(64,101,'2028-11-30',50,NULL,180),(65,102,'2026-04-30',68,74,100),(66,83,'2028-09-30',217,NULL,100),(67,62,'2025-10-30',55,NULL,95),(68,42,'2025-11-30',105,115,33),(69,42,'2026-02-28',105,115,144),(70,103,'2026-02-28',35,NULL,1000),(71,76,'2027-04-24',105,120,400),(72,110,'2027-08-30',168,180,200),(73,109,'2027-06-30',84,89,200),(74,107,'2027-06-30',164.5,173,400),(75,35,'2025-08-30',72,75,144),(76,111,'2026-03-30',84,NULL,86),(77,112,'2026-09-30',47,NULL,400),(78,113,'2026-02-28',80,NULL,500),(79,114,'2026-02-28',180,NULL,100),(80,106,'2027-07-30',NULL,NULL,504),(81,115,'2026-10-20',108,NULL,480),(82,116,'2026-08-30',82,NULL,30),(83,84,'2025-12-30',16,18,720),(84,70,'2025-06-30',7,NULL,100),(85,137,'2026-06-30',9,NULL,1800),(86,80,'2027-07-30',24,26,1200),(87,138,'2027-07-30',18,NULL,600),(88,134,'2027-06-30',25,NULL,1440),(89,122,'2027-06-30',35,NULL,480),(90,117,'2025-12-30',13,NULL,960),(91,123,'2027-04-30',23,NULL,600),(92,139,'2026-05-30',30,33,1000),(93,135,'2026-05-30',21,NULL,2400),(94,132,'2026-01-30',17,NULL,480),(95,133,'2026-01-30',19,NULL,960),(96,126,'2025-05-30',17,NULL,500),(97,125,'2026-04-30',17,NULL,620),(98,124,'2026-01-30',17,NULL,100),(99,118,'2027-06-30',32,NULL,960),(100,128,'2026-05-30',13,NULL,5000),(101,129,'2026-12-30',35,NULL,150),(102,127,'2025-11-30',16,NULL,1090),(103,130,'2025-11-30',20,NULL,960),(104,131,'2026-04-30',44,NULL,195),(105,136,'2025-05-30',17,NULL,100),(106,141,'2026-12-30',36,NULL,44),(107,142,'2026-09-27',70,NULL,48),(108,143,'2027-09-30',31,NULL,50),(109,114,'2026-12-30',185,NULL,240),(110,145,'2027-09-30',50,NULL,240),(111,119,'2026-12-30',40,NULL,240),(112,120,'2027-07-14',155,NULL,30),(114,142,'2026-09-30',70,NULL,48),(115,83,'2028-09-30',168,175,240),(116,146,'2028-02-28',580,NULL,20),(117,147,'2026-10-30',77,NULL,144),(118,121,'2027-02-28',350,NULL,10),(119,148,'2028-06-30',248,NULL,90),(120,149,'2026-09-30',20,25,600),(121,150,'2027-01-30',128,NULL,160),(122,81,'2027-06-30',15.8,NULL,1100),(123,151,'2028-08-30',280,NULL,216),(124,152,'2027-06-30',15.8,20,1000),(125,153,'2025-10-30',14.8,NULL,50),(126,154,'2026-01-30',72,NULL,192),(127,155,'2028-01-30',170,NULL,56),(128,156,'2028-07-30',170,NULL,60),(129,157,'2028-03-30',74.5,NULL,50),(130,158,'2027-04-30',31.5,NULL,600),(131,79,'2026-06-30',41.5,45,1200),(132,159,'2025-05-30',47.5,NULL,120),(133,100,'2029-03-30',770,780,20),(134,160,'2027-08-30',69,NULL,50),(135,10,'2026-12-30',11.9,NULL,3000),(136,175,'2026-01-30',151,NULL,80),(137,106,'2027-07-30',84,NULL,504);
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
 1 AS `Initial_Amount`,
 1 AS `Remaining_Stock`*/;
SET character_set_client = @saved_cs_client;

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
-- Table structure for table `purchases`
--

DROP TABLE IF EXISTS `purchases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `purchases` (
  `purchase_id` int NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchases`
--

LOCK TABLES `purchases` WRITE;
/*!40000 ALTER TABLE `purchases` DISABLE KEYS */;
INSERT INTO `purchases` VALUES (1,19,76,105,400,NULL,'2025-01-01',42000,12000),(2,18,86,80,756,NULL,'2024-12-31',60480,0),(3,18,110,240,200,0.30,'2024-12-31',33600,0),(4,18,109,120,200,0.30,'2024-12-31',16800,0),(5,18,107,235,400,0.30,'2024-12-31',65800,0),(6,20,111,84,86,NULL,'2024-12-31',7224,0),(7,20,112,47,400,NULL,'2024-12-31',18800,0),(8,20,113,80,500,NULL,'2024-12-31',40000,0),(9,20,114,180,100,NULL,'2024-12-31',18000,15000),(10,21,115,108,480,NULL,'2025-01-01',51840,0),(11,22,116,82,30,NULL,'2025-01-01',2460,0);
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
  `Discount` decimal(5,2) DEFAULT NULL,
  `Price` double NOT NULL,
  `Cut_ID` int DEFAULT NULL,
  `Customer_ID` int DEFAULT NULL,
  `Total_Price` double DEFAULT NULL,
  `Amount_Received` double DEFAULT NULL,
  `Note` mediumtext,
  PRIMARY KEY (`Sales_ID`),
  KEY `Cut_ID` (`Cut_ID`),
  KEY `fk_sales_customer_id` (`Customer_ID`),
  KEY `fk_sales_inventory_id_idx` (`Inventory_ID`),
  CONSTRAINT `fk_sales_customer_id` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`customer_id`),
  CONSTRAINT `fk_sales_inventory` FOREIGN KEY (`Inventory_ID`) REFERENCES `inventory` (`Inventory_ID`),
  CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`Cut_ID`) REFERENCES `emp_cut` (`Cut_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=34544 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES (1,1,'2024-12-31',10,0.00,45,NULL,NULL,450,450,NULL),(2,1,'2024-12-31',5,0.00,40,NULL,NULL,200,200,NULL),(3,1,'2024-12-31',1,0.00,60,NULL,NULL,60,60,NULL),(4,49,'2024-12-31',50,0.00,85,NULL,1,4250,0,NULL),(5,71,'2025-01-01',100,0.00,110,NULL,1,11000,0,NULL),(6,57,'2025-01-04',30,NULL,83,NULL,2,2490,2490,NULL),(7,57,'2025-01-02',5,NULL,88,NULL,1,440,0,NULL),(8,1,'2025-01-04',4,NULL,50,NULL,NULL,200,200,NULL),(9,1,'2025-01-04',5,NULL,50,NULL,2,250,0,'Loan'),(10,50,'2025-01-04',100,NULL,136,NULL,3,13600,0,'Loan'),(11,68,'2024-12-29',10,NULL,110,NULL,1,1100,0,NULL),(12,136,'2025-01-07',2,NULL,780,NULL,NULL,1560,1560,NULL),(13,34,'2024-12-29',20,NULL,130,NULL,1,2600,0,NULL),(14,51,'2024-12-29',10,NULL,310,NULL,1,3100,0,NULL),(15,6,'2024-12-30',20,NULL,55,NULL,1,1100,0,NULL),(16,86,'2024-12-31',50,NULL,20,NULL,1,1000,0,NULL),(17,92,'2025-01-01',25,NULL,33,NULL,1,825,0,NULL),(18,115,'2025-01-01',10,NULL,175,NULL,1,1750,0,NULL),(19,86,'2025-01-01',50,NULL,26,NULL,1,1300,0,NULL),(20,83,'2025-01-01',20,NULL,16,NULL,1,320,0,NULL),(21,131,'2025-01-01',100,NULL,47,NULL,1,4700,0,NULL),(22,49,'2025-01-01',100,NULL,85,NULL,1,8500,0,NULL),(23,17,'2025-01-01',5,NULL,128,NULL,1,640,0,NULL),(24,57,'2025-01-01',5,NULL,88,NULL,1,440,0,NULL),(25,124,'2025-01-02',50,NULL,20,NULL,1,1000,0,NULL),(26,16,'2025-01-02',30,NULL,70,NULL,1,2100,0,NULL),(27,53,'2025-01-02',20,NULL,90,NULL,1,1800,0,NULL);
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

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
INSERT INTO `vendors` VALUES (1,'Wazir Ahmad','Pakistani','Kandahar, Ayub Shefa Market','0700757490',NULL,'Cash','All'),(2,'Ehsan Nazari','Pakistani','Kandahar','0703100662',NULL,'Cash','Drugs'),(3,'Abdul Samad','Ansari Market','Kandahar','0705651268',NULL,'Cash','Drugs'),(4,'Malal','Pakistani','Kandahar','0703350313',NULL,'Cash','Drugs'),(5,'Kakar','Pakistani','Kandahar','0700787736',NULL,'Cash','Drugs'),(6,'Hafez','Pakistani','Kandahar','0704661221',NULL,'Cash','Drugs'),(7,'Mukhtar Ahmad Faiz','Pakistani','Kandahar','0700342668',NULL,'Cash','Drugs'),(8,'Zaheer','Pakistani','Kandahar','0706968632',NULL,'Cash','Drugs'),(9,'Haris Obaid','Pakistani','Kandahar','0700142929',NULL,'Cash','Drugs'),(10,'Salman','Indian','Kandahar','0700064138',NULL,'Cash','Drugs'),(11,'Qudratullah','Pakistani','Kandahar','0795800092',NULL,'Cash','Drugs'),(12,'Hussain Zada','Pakistani','Kandahar','0700341564',NULL,'Cash','Drugs'),(13,'AlHekmat Motasem','Pakistani','Kandahar','0708204653',NULL,'Cash','Drugs'),(14,'Khairullah Insaf','Pakistani','Kandahar','0700556584',NULL,'Cash','Drugs'),(15,'Masih Samim','Indian','Kabul','0784608000',NULL,'Cash','All'),(16,'Esmatullah Noori','Indian','Kabul','0795989999',NULL,'Cash','Karwan Sehat'),(17,'Nasratullah Saleh','Indian','Kabul','0799800944',NULL,'Cash',NULL),(18,'Ferdaws Iqbal','Company','Mazar Hotel','0780600914','Ferdaws.iqbalmzr@gmail.com','Cash','All'),(19,'Abdul Fatah Qarizada','Common','Mazar Hotel','0729529529',NULL,'Both',NULL),(20,'Salehi Brothers','Glitzer & Pfizer','Mazar Hotel','0788825404',NULL,'Credit','No. 175'),(21,'Ajmal Halim','Natural Health','Mazar Hotel','0792886688',NULL,'Credit',NULL),(22,'Ibn Sina','Euro','Mazar Hotel','070054026','ibnsina0006@gmail.com','Credit','No 187'),(973,'Sina','email','Dehbori','76876876','sina@gmail.com','30n','Smart');
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

-- Dump completed on 2025-01-07 16:23:56
