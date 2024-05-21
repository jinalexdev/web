CREATE DATABASE  IF NOT EXISTS `proyecto_aviones` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `proyecto_aviones`;
-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: proyecto_aviones
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
  `id_Asiento` int(11) NOT NULL AUTO_INCREMENT,
  `id_Avion` int(11) DEFAULT NULL,
  `numero_Asiento` varchar(45) DEFAULT NULL,
  `fila` varchar(45) DEFAULT NULL,
  `seccion` varchar(45) DEFAULT NULL,
  `ocupado` tinyint(1) DEFAULT NULL,
  `id_Vuelo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_Asiento`),
  KEY `id_Avion` (`id_Avion`),
  KEY `id_Vuelo` (`id_Vuelo`),
  CONSTRAINT `asientos_ibfk_1` FOREIGN KEY (`id_Vuelo`) REFERENCES `vuelos` (`id_Vuelo`),
  CONSTRAINT `asientos_ibfk_2` FOREIGN KEY (`id_Vuelo`) REFERENCES `vuelos` (`id_Vuelo`),
  CONSTRAINT `asientos_ibfk_3` FOREIGN KEY (`id_Vuelo`) REFERENCES `vuelos` (`id_Vuelo`),
  CONSTRAINT `id_Avion` FOREIGN KEY (`id_Avion`) REFERENCES `aviones` (`id_Avion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asientos`
--

LOCK TABLES `asientos` WRITE;
/*!40000 ALTER TABLE `asientos` DISABLE KEYS */;
INSERT INTO `asientos` VALUES (1,1,'1A','1','Primera Clase',1,1),(2,1,'2B','2','Primera Clase',0,1),(3,1,'3C','3','Primera Clase',0,1),(4,1,'4D','4','Turista',0,1),(5,1,'5E','5','Turista',0,1),(6,1,'6F','6','Turista',0,1),(7,2,'1A','1','Primera Clase',0,1),(8,2,'2B','2','Primera Clase',0,2),(9,2,'3C','3','Primera Clase',0,2),(10,2,'4D','4','Turista',0,2),(11,2,'5E','5','Turista',0,2),(12,2,'6F','6','Turista',0,2),(13,3,'1A','1','Primera Clase',0,3),(14,3,'2B','2','Primera Clase',0,3),(15,3,'3C','3','Primera Clase',0,3),(16,3,'4D','4','Turista',0,3),(17,3,'5E','5','Turista',0,3),(18,3,'6F','6','Turista',0,3),(19,4,'1A','1','Primera Clase',0,4),(20,4,'2B','2','Primera Clase',0,4),(21,4,'3C','3','Primera Clase',0,4),(22,4,'4D','4','Turista',0,4),(23,4,'5E','5','Turista',0,4),(24,4,'6F','6','Turista',0,4),(25,5,'1A','1','Primera Clase',0,5),(26,5,'2B','2','Primera Clase',0,5),(27,5,'3C','3','Primera Clase',0,5),(28,5,'4D','4','Turista',0,5),(29,5,'5E','5','Turista',0,5),(30,5,'6F','6','Turista',0,5),(31,6,'1A','1','Primera Clase',0,5),(32,6,'2B','2','Primera Clase',0,6),(33,6,'3C','3','Primera Clase',0,6),(34,6,'4D','4','Turista',0,6),(35,6,'5E','5','Turista',0,6),(36,6,'6F','6','Turista',0,6),(37,7,'1A','1','Primera Clase',0,7),(38,7,'2B','2','Primera Clase',0,7),(39,7,'3C','3','Primera Clase',0,7),(40,7,'4D','4','Turista',0,7),(41,7,'5E','5','Turista',0,7),(42,7,'6F','6','Turista',0,7),(43,8,'1A','1','Primera Clase',0,8),(44,8,'2B','2','Primera Clase',0,8),(45,8,'3C','3','Primera Clase',0,8),(46,8,'4D','4','Turista',0,8),(47,8,'5E','5','Turista',0,8),(48,8,'6F','6','Turista',0,8),(49,9,'1A','1','Primera Clase',0,10),(50,9,'2B','2','Primera Clase',0,10),(51,9,'3C','3','Primera Clase',1,10),(52,9,'4D','4','Turista',0,10),(53,9,'5E','5','Turista',0,10),(54,9,'6F','6','Turista',1,10),(55,10,'1A','1','Primera Clase',0,9),(56,10,'2B','2','Primera Clase',0,9),(57,10,'3C','3','Primera Clase',0,9),(58,10,'4D','4','Turista',0,9),(59,10,'5E','5','Turista',0,9),(60,10,'6F','6','Turista',0,9);
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

-- Dump completed on 2024-05-21 14:45:31
