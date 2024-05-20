-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: proyecto_aviones
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
-- Table structure for table `asientos`
--

DROP TABLE IF EXISTS `asientos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asientos` (
  `id_asiento` int NOT NULL AUTO_INCREMENT,
  `id_Avion` int DEFAULT NULL,
  `numero_asiento` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fila` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `seccion` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ocupado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_asiento`),
  KEY `id_Avion` (`id_Avion`),
  CONSTRAINT `id_Avion` FOREIGN KEY (`id_Avion`) REFERENCES `aviones` (`id_Avion`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asientos`
--

LOCK TABLES `asientos` WRITE;
/*!40000 ALTER TABLE `asientos` DISABLE KEYS */;
INSERT INTO `asientos` VALUES (1,1,'1A','1','Primera Clase',0),(2,1,'2B','2','Primera Clase',0),(3,1,'3C','3','Primera Clase',0),(4,1,'4D','4','Turista',0),(5,1,'5E','5','Turista',0),(6,1,'6F','6','Turista',0),(7,2,'1A','1','Primera Clase',0),(8,2,'2B','2','Primera Clase',0),(9,2,'3C','3','Primera Clase',0),(10,2,'4D','4','Turista',0),(11,2,'5E','5','Turista',0),(12,2,'6F','6','Turista',0),(13,3,'1A','1','Primera Clase',0),(14,3,'2B','2','Primera Clase',0),(15,3,'3C','3','Primera Clase',0),(16,3,'4D','4','Turista',0),(17,3,'5E','5','Turista',0),(18,3,'6F','6','Turista',0),(19,4,'1A','1','Primera Clase',0),(20,4,'2B','2','Primera Clase',0),(21,4,'3C','3','Primera Clase',0),(22,4,'4D','4','Turista',0),(23,4,'5E','5','Turista',0),(24,4,'6F','6','Turista',0),(25,5,'1A','1','Primera Clase',0),(26,5,'2B','2','Primera Clase',0),(27,5,'3C','3','Primera Clase',0),(28,5,'4D','4','Turista',0),(29,5,'5E','5','Turista',0),(30,5,'6F','6','Turista',0),(37,6,'1A','1','Primera Clase',0),(38,6,'2B','2','Primera Clase',0),(39,6,'3C','3','Primera Clase',0),(40,6,'4D','4','Turista',0),(41,6,'5E','5','Turista',0),(42,6,'6F','6','Turista',0),(43,7,'1A','1','Primera Clase',0),(44,7,'2B','2','Primera Clase',0),(45,7,'3C','3','Primera Clase',0),(46,7,'4D','4','Turista',0),(47,7,'5E','5','Turista',0),(48,7,'6F','6','Turista',0),(49,8,'1A','1','Primera Clase',0),(50,8,'2B','2','Primera Clase',0),(51,8,'3C','3','Primera Clase',0),(52,8,'4D','4','Turista',0),(53,8,'5E','5','Turista',0),(54,8,'6F','6','Turista',0),(55,9,'1A','1','Primera Clase',0),(56,9,'2B','2','Primera Clase',0),(57,9,'3C','3','Primera Clase',0),(58,9,'4D','4','Turista',0),(59,9,'5E','5','Turista',0),(60,9,'6F','6','Turista',0),(61,10,'1A','1','Primera Clase',0),(62,10,'2B','2','Primera Clase',0),(63,10,'3C','3','Primera Clase',0),(64,10,'4D','4','Turista',0),(65,10,'5E','5','Turista',0),(66,10,'6F','6','Turista',0);
/*!40000 ALTER TABLE `asientos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-20  7:52:10
