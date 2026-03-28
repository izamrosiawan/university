-- MySQL dump 10.13  Distrib 8.0.42, for Win64 (x86_64)
--
-- Host: localhost    Database: rumah_sakit
-- ------------------------------------------------------
-- Server version	8.0.42

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
-- Table structure for table `obat`
--

DROP TABLE IF EXISTS `obat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `obat` (
  `id_obat` int NOT NULL,
  `nama_obat` varchar(100) DEFAULT NULL,
  `jenis_obat` varchar(50) DEFAULT NULL,
  `ukuran` varchar(20) DEFAULT NULL,
  `jumlah` int DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id_obat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `obat`
--

LOCK TABLES `obat` WRITE;
/*!40000 ALTER TABLE `obat` DISABLE KEYS */;
INSERT INTO `obat` VALUES (1,'Betadine','Cair','30 ml',689,25000.00),(2,'Amoxicillin','Kapsul','500 mg',267,3000.00),(3,'Cetirizine','Tablet','10 mg',460,4500.00),(4,'Ibuprofen','Tablet','400 mg',987,5000.00),(5,'Paracetamol','Tablet','500 mg',122,2500.00),(6,'Loratadine','Tablet','10 mg',823,6000.00),(7,'Amoxicillin','Kapsul','500 mg',624,3000.00),(8,'Betadine','Cair','30 ml',188,25000.00),(9,'OBH Combi','Sirup','100 ml',626,15000.00),(10,'Vitamin C','Tablet Hisap','500 mg',782,1000.00),(11,'Vitamin C','Tablet Hisap','500 mg',532,1000.00),(12,'Paracetamol','Tablet','500 mg',934,2500.00),(13,'Vitamin C','Tablet Hisap','500 mg',282,1000.00),(14,'OBH Combi','Sirup','100 ml',139,15000.00),(15,'Ibuprofen','Tablet','400 mg',566,5000.00),(16,'Amoxicillin','Kapsul','500 mg',991,3000.00),(17,'Betadine','Cair','30 ml',260,25000.00),(18,'OBH Combi','Sirup','100 ml',789,15000.00),(19,'Amoxicillin','Kapsul','500 mg',265,3000.00),(20,'Betadine','Cair','30 ml',316,25000.00),(21,'Loratadine','Tablet','10 mg',489,6000.00),(22,'Vitamin C','Tablet Hisap','500 mg',721,1000.00),(23,'Amoxicillin','Kapsul','500 mg',247,3000.00),(24,'Cetirizine','Tablet','10 mg',436,4500.00),(25,'Ibuprofen','Tablet','400 mg',617,5000.00),(26,'Cetirizine','Tablet','10 mg',299,4500.00),(27,'Cetirizine','Tablet','10 mg',666,4500.00),(28,'Paracetamol','Tablet','500 mg',981,2500.00),(29,'Betadine','Cair','30 ml',661,25000.00),(30,'Betadine','Cair','30 ml',740,25000.00),(31,'Vitamin C','Tablet Hisap','500 mg',522,1000.00),(32,'Vitamin C','Tablet Hisap','500 mg',397,1000.00),(33,'Loratadine','Tablet','10 mg',169,6000.00),(34,'Betadine','Cair','30 ml',922,25000.00),(35,'Betadine','Cair','30 ml',277,25000.00),(36,'Betadine','Cair','30 ml',517,25000.00),(37,'Ibuprofen','Tablet','400 mg',834,5000.00),(38,'Paracetamol','Tablet','500 mg',746,2500.00),(39,'Vitamin C','Tablet Hisap','500 mg',878,1000.00),(40,'Amoxicillin','Kapsul','500 mg',824,3000.00),(41,'Paracetamol','Tablet','500 mg',355,2500.00),(42,'Vitamin C','Tablet Hisap','500 mg',775,1000.00),(43,'Paracetamol','Tablet','500 mg',987,2500.00),(44,'Betadine','Cair','30 ml',193,25000.00),(45,'Cetirizine','Tablet','10 mg',623,4500.00),(46,'Vitamin C','Tablet Hisap','500 mg',635,1000.00),(47,'OBH Combi','Sirup','100 ml',517,15000.00),(48,'Vitamin C','Tablet Hisap','500 mg',901,1000.00),(49,'Paracetamol','Tablet','500 mg',462,2500.00),(50,'Cetirizine','Tablet','10 mg',575,4500.00),(51,'Cetirizine','Tablet','10 mg',127,4500.00),(52,'Ibuprofen','Tablet','400 mg',725,5000.00),(53,'Loratadine','Tablet','10 mg',568,6000.00),(54,'Amoxicillin','Kapsul','500 mg',129,3000.00),(55,'Ibuprofen','Tablet','400 mg',114,5000.00),(56,'Betadine','Cair','30 ml',494,25000.00),(57,'Vitamin C','Tablet Hisap','500 mg',733,1000.00),(58,'Betadine','Cair','30 ml',312,25000.00),(59,'Cetirizine','Tablet','10 mg',118,4500.00),(60,'OBH Combi','Sirup','100 ml',441,15000.00),(61,'Loratadine','Tablet','10 mg',365,6000.00),(62,'Amoxicillin','Kapsul','500 mg',403,3000.00),(63,'Cetirizine','Tablet','10 mg',559,4500.00),(64,'Ibuprofen','Tablet','400 mg',972,5000.00),(65,'Cetirizine','Tablet','10 mg',291,4500.00),(66,'Paracetamol','Tablet','500 mg',462,2500.00),(67,'Paracetamol','Tablet','500 mg',1000,2500.00),(68,'Loratadine','Tablet','10 mg',138,6000.00),(69,'Paracetamol','Tablet','500 mg',862,2500.00),(70,'Paracetamol','Tablet','500 mg',329,2500.00),(71,'Cetirizine','Tablet','10 mg',777,4500.00),(72,'Paracetamol','Tablet','500 mg',956,2500.00),(73,'Paracetamol','Tablet','500 mg',210,2500.00),(74,'Cetirizine','Tablet','10 mg',658,4500.00),(75,'Loratadine','Tablet','10 mg',135,6000.00),(76,'OBH Combi','Sirup','100 ml',337,15000.00),(77,'Loratadine','Tablet','10 mg',575,6000.00),(78,'Loratadine','Tablet','10 mg',150,6000.00),(79,'Vitamin C','Tablet Hisap','500 mg',282,1000.00),(80,'Loratadine','Tablet','10 mg',512,6000.00),(81,'Paracetamol','Tablet','500 mg',344,2500.00),(82,'Amoxicillin','Kapsul','500 mg',818,3000.00),(83,'Cetirizine','Tablet','10 mg',469,4500.00),(84,'Vitamin C','Tablet Hisap','500 mg',854,1000.00),(85,'Ibuprofen','Tablet','400 mg',970,5000.00),(86,'Ibuprofen','Tablet','400 mg',287,5000.00),(87,'Vitamin C','Tablet Hisap','500 mg',384,1000.00),(88,'Cetirizine','Tablet','10 mg',819,4500.00),(89,'Paracetamol','Tablet','500 mg',890,2500.00),(90,'OBH Combi','Sirup','100 ml',939,15000.00),(91,'OBH Combi','Sirup','100 ml',647,15000.00),(92,'OBH Combi','Sirup','100 ml',960,15000.00),(93,'Cetirizine','Tablet','10 mg',749,4500.00),(94,'OBH Combi','Sirup','100 ml',270,15000.00),(95,'Betadine','Cair','30 ml',626,25000.00),(96,'Paracetamol','Tablet','500 mg',167,2500.00),(97,'Paracetamol','Tablet','500 mg',425,2500.00),(98,'Cetirizine','Tablet','10 mg',378,4500.00),(99,'Ibuprofen','Tablet','400 mg',250,5000.00),(100,'Vitamin C','Tablet Hisap','500 mg',715,1000.00);
/*!40000 ALTER TABLE `obat` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-05-31  8:45:38
