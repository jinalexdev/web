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
-- Table structure for table `vuelos`
--

DROP TABLE IF EXISTS `vuelos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vuelos` (
  `id_Vuelo` int(11) NOT NULL AUTO_INCREMENT,
  `id_Avion` int(11) DEFAULT NULL,
  `aerolinea` varchar(45) DEFAULT NULL,
  `origen` varchar(45) DEFAULT NULL,
  `destino` varchar(45) DEFAULT NULL,
  `fecha_salida` datetime DEFAULT NULL,
  `fecha_llegada` datetime DEFAULT NULL,
  `duracion` varchar(45) DEFAULT NULL,
  `precio` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`id_Vuelo`),
  KEY `id_Avion` (`id_Avion`),
  CONSTRAINT `vuelos_ibfk_1` FOREIGN KEY (`id_Avion`) REFERENCES `aviones` (`id_Avion`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vuelos`
--

LOCK TABLES `vuelos` WRITE;
/*!40000 ALTER TABLE `vuelos` DISABLE KEYS */;
INSERT INTO `vuelos` VALUES (1,1,'aerolinea1','Barcelona','Las palmas','2024-05-18 08:00:00','2024-05-19 11:00:00','3',50.00),(2,2,'aerolinea2','Madrid','Paris','2024-05-19 10:00:00','2024-05-20 12:00:00','2',100.00),(3,3,'aerolinea3','Londres','Nueva York','2024-05-20 14:00:00','2024-05-21 19:00:00','5',200.00),(4,4,'aerolinea4','Roma','Berlín','2024-05-21 08:30:00','2024-05-22 12:30:00','4',150.00),(5,5,'aerolinea5','Amsterdam','Tokio','2024-05-22 09:00:00','2024-05-23 16:00:00','7',300.00),(6,6,'aerolinea6','Moscow','Sidney','2024-05-23 13:00:00','2024-05-24 23:00:00','10',400.00),(7,7,'aerolinea7','Viena','Atenas','2024-05-24 07:00:00','2024-05-25 09:00:00','2',200.00),(8,8,'aerolinea8','Estambul','Dubai','2024-05-25 11:30:00','2024-05-26 16:30:00','5',250.00),(9,9,'aerolinea9','Seúl','Singapur','2024-05-26 08:45:00','2024-05-27 14:45:00','6',350.00),(10,9,'aerolinea1','Barcelona','Las palmas','2024-05-18 08:00:00','2024-05-19 12:00:00','3',50.00);
/*!40000 ALTER TABLE `vuelos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-20 14:46:32
