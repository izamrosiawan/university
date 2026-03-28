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
-- Table structure for table `detail_resep`
--

DROP TABLE IF EXISTS `detail_resep`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detail_resep` (
  `id_detail_resep` int NOT NULL,
  `id_resep` int DEFAULT NULL,
  `id_obat` int DEFAULT NULL,
  `dosis` varchar(50) DEFAULT NULL,
  `jumlah` int DEFAULT NULL,
  PRIMARY KEY (`id_detail_resep`),
  KEY `id_resep` (`id_resep`),
  KEY `id_obat` (`id_obat`),
  CONSTRAINT `detail_resep_ibfk_1` FOREIGN KEY (`id_resep`) REFERENCES `resep` (`id_resep`),
  CONSTRAINT `detail_resep_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_resep`
--

LOCK TABLES `detail_resep` WRITE;
/*!40000 ALTER TABLE `detail_resep` DISABLE KEYS */;
INSERT INTO `detail_resep` VALUES (1,1,26,'2x sehari',10),(2,1,61,'1x sehari',20),(3,2,86,'1x sehari',10),(4,3,14,'1x sehari',1),(5,3,81,'1x sehari',10),(6,3,67,'1x sehari',20),(7,4,49,'2x sehari',20),(8,5,61,'1x sehari',20),(9,5,59,'1x sehari',10),(10,6,4,'3x sehari',20),(11,7,16,'1x sehari',20),(12,7,32,'2x sehari',20),(13,7,20,'3x sehari',1),(14,8,82,'1x sehari',20),(15,8,58,'1x sehari',2),(16,8,69,'2x sehari',10),(17,9,93,'1x sehari',10),(18,9,14,'1x sehari',1),(19,10,31,'3x sehari',20),(20,11,21,'3x sehari',10),(21,11,22,'2x sehari',20),(22,12,79,'1x sehari',20),(23,12,73,'2x sehari',10),(24,13,87,'3x sehari',20),(25,14,31,'3x sehari',10),(26,14,8,'3x sehari',2),(27,14,51,'3x sehari',10),(28,15,57,'3x sehari',10),(29,16,39,'1x sehari',20),(30,16,38,'1x sehari',10),(31,16,85,'1x sehari',20),(32,17,59,'3x sehari',20),(33,17,36,'3x sehari',1),(34,18,45,'3x sehari',10),(35,18,92,'1x sehari',1),(36,19,6,'1x sehari',20),(37,20,85,'3x sehari',10),(38,20,20,'2x sehari',1),(39,20,51,'2x sehari',10),(40,21,77,'2x sehari',20),(41,21,6,'1x sehari',20),(42,22,31,'2x sehari',20),(43,23,11,'3x sehari',20),(44,23,67,'3x sehari',20),(45,24,69,'3x sehari',10),(46,24,2,'2x sehari',20),(47,24,60,'1x sehari',1),(48,25,72,'2x sehari',20),(49,25,60,'1x sehari',2),(50,26,4,'2x sehari',20),(51,26,24,'3x sehari',10),(52,27,59,'3x sehari',20),(53,27,31,'1x sehari',10),(54,27,68,'1x sehari',10),(55,28,40,'3x sehari',20),(56,29,99,'2x sehari',10),(57,29,29,'3x sehari',2),(58,30,46,'2x sehari',20),(59,30,99,'3x sehari',10),(60,31,42,'2x sehari',10),(61,32,48,'1x sehari',20),(62,32,51,'2x sehari',10),(63,33,4,'1x sehari',10),(64,33,100,'3x sehari',20),(65,34,95,'2x sehari',1),(66,34,52,'3x sehari',10),(67,34,63,'3x sehari',10),(68,35,76,'3x sehari',2),(69,35,4,'1x sehari',20),(70,36,92,'2x sehari',1),(71,36,27,'2x sehari',20),(72,36,55,'3x sehari',10),(73,37,95,'3x sehari',1),(74,38,56,'2x sehari',2),(75,38,29,'2x sehari',2),(76,38,26,'2x sehari',20),(77,39,42,'2x sehari',10),(78,39,47,'3x sehari',2),(79,39,49,'2x sehari',10),(80,40,64,'3x sehari',10),(81,40,71,'1x sehari',10),(82,40,40,'1x sehari',10),(83,41,57,'1x sehari',10),(84,41,52,'1x sehari',10),(85,42,79,'3x sehari',20),(86,43,47,'2x sehari',1),(87,44,26,'3x sehari',10),(88,44,3,'3x sehari',20),(89,45,43,'3x sehari',20),(90,46,2,'3x sehari',20),(91,46,67,'3x sehari',20),(92,46,91,'1x sehari',1),(93,47,92,'1x sehari',2),(94,47,11,'3x sehari',20),(95,47,93,'2x sehari',20),(96,48,88,'1x sehari',10),(97,48,81,'1x sehari',20),(98,48,81,'3x sehari',10),(99,49,7,'1x sehari',20),(100,50,64,'1x sehari',10),(101,50,22,'1x sehari',20),(102,51,27,'2x sehari',10),(103,51,41,'2x sehari',20),(104,51,84,'1x sehari',20),(105,52,75,'2x sehari',20),(106,52,68,'1x sehari',10),(107,52,52,'1x sehari',10),(108,53,19,'2x sehari',10),(109,53,54,'1x sehari',20),(110,53,24,'1x sehari',10),(111,54,23,'1x sehari',20),(112,55,63,'3x sehari',10),(113,55,18,'3x sehari',1),(114,55,43,'2x sehari',20),(115,56,25,'1x sehari',10),(116,57,22,'1x sehari',20),(117,57,34,'1x sehari',2),(118,57,80,'2x sehari',10),(119,58,32,'3x sehari',10),(120,59,44,'3x sehari',2),(121,60,31,'2x sehari',10),(122,60,89,'3x sehari',10),(123,60,27,'3x sehari',10),(124,61,14,'1x sehari',1),(125,61,4,'3x sehari',10),(126,61,38,'3x sehari',10),(127,62,10,'2x sehari',20),(128,62,84,'3x sehari',10),(129,63,89,'3x sehari',20),(130,63,67,'1x sehari',20),(131,64,34,'2x sehari',2),(132,64,12,'1x sehari',20),(133,65,60,'3x sehari',1),(134,65,76,'1x sehari',2),(135,66,74,'1x sehari',20),(136,66,32,'2x sehari',10),(137,66,26,'2x sehari',20),(138,67,58,'2x sehari',1),(139,68,64,'3x sehari',10),(140,69,75,'1x sehari',20),(141,69,95,'2x sehari',1),(142,70,85,'3x sehari',10),(143,70,73,'1x sehari',20),(144,71,29,'3x sehari',2),(145,71,69,'3x sehari',20),(146,71,55,'1x sehari',20),(147,72,82,'1x sehari',10),(148,72,28,'3x sehari',20),(149,73,82,'2x sehari',20),(150,74,81,'1x sehari',20),(151,75,83,'2x sehari',10),(152,75,73,'1x sehari',20),(153,75,53,'1x sehari',20),(154,76,73,'1x sehari',10),(155,77,23,'2x sehari',10),(156,77,43,'2x sehari',20),(157,78,62,'2x sehari',10),(158,78,32,'3x sehari',20),(159,79,30,'3x sehari',1),(160,79,63,'1x sehari',10),(161,79,10,'2x sehari',10),(162,80,83,'3x sehari',10),(163,81,76,'3x sehari',1),(164,81,33,'1x sehari',10),(165,82,90,'1x sehari',1),(166,82,74,'3x sehari',10),(167,83,21,'2x sehari',10),(168,84,50,'1x sehari',20),(169,84,3,'2x sehari',10),(170,84,29,'3x sehari',2),(171,85,37,'1x sehari',10),(172,85,52,'3x sehari',20),(173,86,63,'2x sehari',10),(174,86,100,'1x sehari',10),(175,87,78,'1x sehari',20),(176,87,75,'2x sehari',20),(177,87,83,'1x sehari',10),(178,88,35,'2x sehari',1),(179,88,28,'1x sehari',10),(180,88,72,'2x sehari',20),(181,89,14,'1x sehari',1),(182,89,99,'2x sehari',20),(183,89,83,'3x sehari',10),(184,90,39,'1x sehari',20),(185,90,31,'3x sehari',20),(186,91,74,'2x sehari',10),(187,91,42,'2x sehari',20),(188,92,23,'3x sehari',10),(189,93,69,'3x sehari',10),(190,94,61,'3x sehari',20),(191,95,66,'2x sehari',10),(192,95,43,'2x sehari',10),(193,95,34,'1x sehari',2),(194,96,52,'1x sehari',20),(195,96,57,'3x sehari',20),(196,97,63,'3x sehari',20),(197,97,52,'2x sehari',20),(198,97,17,'3x sehari',1),(199,98,12,'2x sehari',10),(200,98,25,'2x sehari',20),(201,99,9,'1x sehari',2),(202,99,52,'2x sehari',10),(203,100,89,'3x sehari',20),(204,100,33,'2x sehari',20);
/*!40000 ALTER TABLE `detail_resep` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-05-31  8:45:37
