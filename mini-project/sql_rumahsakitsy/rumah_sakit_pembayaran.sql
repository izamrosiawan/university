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
-- Table structure for table `pembayaran`
--

DROP TABLE IF EXISTS `pembayaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pembayaran` (
  `id_pembayaran` int NOT NULL,
  `id_registrasi` int DEFAULT NULL,
  `id_kasir` int DEFAULT NULL,
  `total_biaya` decimal(12,2) DEFAULT NULL,
  `metode_pembayaran` varchar(20) DEFAULT NULL,
  `tipe_pembayaran` varchar(20) DEFAULT NULL,
  `status_pembayaran` varchar(20) DEFAULT NULL,
  `tanggal_pembayaran` date DEFAULT NULL,
  PRIMARY KEY (`id_pembayaran`),
  KEY `id_registrasi` (`id_registrasi`),
  KEY `id_kasir` (`id_kasir`),
  CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_registrasi`) REFERENCES `registrasi` (`id_registrasi`),
  CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_kasir`) REFERENCES `kasir` (`id_kasir`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembayaran`
--

LOCK TABLES `pembayaran` WRITE;
/*!40000 ALTER TABLE `pembayaran` DISABLE KEYS */;
INSERT INTO `pembayaran` VALUES (1,1,8,247000.00,'Debit','Umum','Lunas','2025-01-17'),(2,2,77,244000.00,'QRIS','Umum','Lunas','2025-03-12'),(3,3,23,332000.00,'QRIS','Asuransi','Lunas','2024-12-12'),(4,4,49,446000.00,'QRIS','Asuransi','Lunas','2024-06-13'),(5,5,8,172000.00,'Tunai','Asuransi','Lunas','2024-06-30'),(6,6,71,287000.00,'Debit','Umum','Lunas','2024-07-24'),(7,7,55,101000.00,'Debit','Asuransi','Lunas','2025-04-03'),(8,8,72,432000.00,'QRIS','Asuransi','Lunas','2025-03-07'),(9,9,69,105000.00,'QRIS','Asuransi','Lunas','2024-10-01'),(10,10,60,408000.00,'QRIS','Asuransi','Lunas','2025-03-06'),(11,11,17,375000.00,'QRIS','Asuransi','Lunas','2025-05-22'),(12,12,60,101000.00,'QRIS','Umum','Lunas','2024-11-09'),(13,13,60,184000.00,'QRIS','Asuransi','Lunas','2025-01-18'),(14,14,44,442000.00,'Tunai','Umum','Lunas','2024-06-13'),(15,15,54,217000.00,'QRIS','Umum','Lunas','2025-04-14'),(16,16,66,244000.00,'Debit','Asuransi','Lunas','2024-09-13'),(17,17,11,440000.00,'Debit','Umum','Lunas','2025-04-21'),(18,18,61,86000.00,'QRIS','Asuransi','Lunas','2025-01-05'),(19,19,58,234000.00,'Tunai','Asuransi','Lunas','2025-04-30'),(20,20,83,197000.00,'Tunai','Umum','Lunas','2024-07-29'),(21,21,19,310000.00,'Debit','Umum','Lunas','2024-07-20'),(22,22,74,445000.00,'Tunai','Umum','Lunas','2025-03-01'),(23,23,27,196000.00,'Debit','Asuransi','Lunas','2025-05-02'),(24,24,20,475000.00,'QRIS','Asuransi','Lunas','2025-03-18'),(25,25,20,161000.00,'Debit','Asuransi','Lunas','2025-05-21'),(26,26,75,472000.00,'Debit','Asuransi','Lunas','2024-06-25'),(27,27,29,484000.00,'Tunai','Umum','Lunas','2024-07-12'),(28,28,50,147000.00,'Debit','Asuransi','Lunas','2024-11-02'),(29,29,16,266000.00,'Debit','Umum','Lunas','2025-03-15'),(30,30,38,165000.00,'Tunai','Umum','Lunas','2024-07-22'),(31,31,94,490000.00,'Debit','Umum','Lunas','2024-10-21'),(32,32,67,405000.00,'Tunai','Asuransi','Lunas','2024-12-31'),(33,33,30,389000.00,'QRIS','Umum','Lunas','2024-10-01'),(34,34,89,133000.00,'Debit','Asuransi','Lunas','2025-05-14'),(35,35,32,92000.00,'Debit','Asuransi','Lunas','2025-05-01'),(36,36,3,123000.00,'Tunai','Asuransi','Lunas','2025-03-31'),(37,37,73,427000.00,'Debit','Umum','Lunas','2025-03-14'),(38,38,28,157000.00,'Debit','Asuransi','Lunas','2024-12-11'),(39,39,55,407000.00,'QRIS','Umum','Lunas','2024-09-06'),(40,40,38,152000.00,'QRIS','Umum','Lunas','2025-03-10'),(41,41,89,385000.00,'QRIS','Asuransi','Lunas','2025-01-15'),(42,42,66,381000.00,'Tunai','Asuransi','Lunas','2024-11-25'),(43,43,13,484000.00,'Tunai','Asuransi','Lunas','2025-04-07'),(44,44,60,433000.00,'Debit','Asuransi','Lunas','2024-06-10'),(45,45,4,166000.00,'Tunai','Asuransi','Lunas','2025-01-18'),(46,46,52,429000.00,'Debit','Umum','Lunas','2025-05-05'),(47,47,94,415000.00,'Tunai','Umum','Lunas','2025-03-30'),(48,48,44,389000.00,'Debit','Umum','Lunas','2024-11-12'),(49,49,67,487000.00,'QRIS','Umum','Lunas','2024-09-12'),(50,50,2,239000.00,'QRIS','Umum','Lunas','2025-05-16'),(51,51,7,295000.00,'Debit','Asuransi','Lunas','2025-04-20'),(52,52,98,88000.00,'Tunai','Umum','Lunas','2025-04-28'),(53,53,79,353000.00,'Debit','Asuransi','Lunas','2024-08-10'),(54,54,99,417000.00,'QRIS','Umum','Lunas','2025-01-15'),(55,55,57,186000.00,'Debit','Asuransi','Lunas','2024-12-22'),(56,56,46,434000.00,'Debit','Asuransi','Lunas','2024-07-30'),(57,57,81,312000.00,'Debit','Asuransi','Lunas','2024-08-25'),(58,58,74,323000.00,'QRIS','Asuransi','Lunas','2024-09-12'),(59,59,15,236000.00,'Tunai','Asuransi','Lunas','2024-12-13'),(60,60,76,323000.00,'Debit','Asuransi','Lunas','2025-02-27'),(61,61,21,154000.00,'QRIS','Umum','Lunas','2024-10-10'),(62,62,59,496000.00,'Tunai','Umum','Lunas','2025-03-31'),(63,63,36,445000.00,'Tunai','Asuransi','Lunas','2025-05-27'),(64,64,53,166000.00,'QRIS','Umum','Lunas','2024-09-08'),(65,65,48,369000.00,'QRIS','Umum','Lunas','2025-01-25'),(66,66,47,204000.00,'Debit','Asuransi','Lunas','2024-06-20'),(67,67,88,212000.00,'Tunai','Umum','Lunas','2024-06-28'),(68,68,78,173000.00,'Tunai','Asuransi','Lunas','2024-06-03'),(69,69,47,264000.00,'Tunai','Asuransi','Lunas','2024-07-26'),(70,70,68,293000.00,'QRIS','Umum','Lunas','2025-03-16'),(71,71,100,251000.00,'Tunai','Umum','Lunas','2024-07-07'),(72,72,86,268000.00,'QRIS','Umum','Lunas','2024-11-21'),(73,73,14,233000.00,'Debit','Umum','Lunas','2025-05-14'),(74,74,8,143000.00,'QRIS','Umum','Lunas','2025-05-04'),(75,75,53,420000.00,'Debit','Umum','Lunas','2025-05-22'),(76,76,17,270000.00,'Tunai','Asuransi','Lunas','2025-02-25'),(77,77,44,168000.00,'QRIS','Asuransi','Lunas','2024-07-19'),(78,78,76,355000.00,'Tunai','Asuransi','Lunas','2024-12-28'),(79,79,1,236000.00,'QRIS','Asuransi','Lunas','2024-06-14'),(80,80,74,80000.00,'Debit','Umum','Lunas','2024-11-07'),(81,81,11,491000.00,'QRIS','Umum','Lunas','2024-07-26'),(82,82,38,224000.00,'Tunai','Umum','Lunas','2025-01-23'),(83,83,59,153000.00,'Tunai','Umum','Lunas','2025-04-26'),(84,84,74,237000.00,'QRIS','Umum','Lunas','2024-12-03'),(85,85,29,88000.00,'QRIS','Umum','Lunas','2025-02-26'),(86,86,31,143000.00,'Debit','Asuransi','Lunas','2024-08-30'),(87,87,91,179000.00,'Debit','Asuransi','Lunas','2024-11-09'),(88,88,79,468000.00,'Tunai','Umum','Lunas','2025-02-05'),(89,89,94,494000.00,'QRIS','Umum','Lunas','2024-07-21'),(90,90,23,325000.00,'Debit','Asuransi','Lunas','2024-12-28'),(91,91,81,449000.00,'Tunai','Umum','Lunas','2025-01-23'),(92,92,86,113000.00,'Debit','Asuransi','Lunas','2024-12-29'),(93,93,24,297000.00,'Tunai','Umum','Lunas','2025-04-23'),(94,94,99,444000.00,'QRIS','Asuransi','Lunas','2025-03-28'),(95,95,81,122000.00,'Debit','Asuransi','Lunas','2024-10-01'),(96,96,15,372000.00,'Tunai','Asuransi','Lunas','2025-05-23'),(97,97,86,186000.00,'Debit','Umum','Lunas','2025-04-19'),(98,98,60,78000.00,'Tunai','Umum','Lunas','2024-09-28'),(99,99,61,281000.00,'QRIS','Umum','Lunas','2024-12-10'),(100,100,10,296000.00,'QRIS','Asuransi','Lunas','2024-07-09');
/*!40000 ALTER TABLE `pembayaran` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-05-31  8:45:39
