CREATE DATABASE  IF NOT EXISTS `dnmrn` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `dnmrn`;
-- MySQL dump 10.13  Distrib 5.6.27, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: dnmrn
-- ------------------------------------------------------
-- Server version	5.7.9

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
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
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `companies` (
  `id_companies` int(11) NOT NULL AUTO_INCREMENT,
  `companies_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `companies_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_companies`),
  UNIQUE KEY `companies_name_UNIQUE` (`companies_name`),
  UNIQUE KEY `companies_users_id_index` (`companies_user_id`),
  CONSTRAINT `companies_users_id_foreign` FOREIGN KEY (`companies_user_id`) REFERENCES `users` (`id_users`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companies`
--

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` VALUES (1,'CSCL',2),(2,'OOCL',1),(3,'Hapag-Lloyd',3);
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `types` (
  `id_types` int(11) NOT NULL AUTO_INCREMENT,
  `types_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_types`),
  UNIQUE KEY `types_name_UNIQUE` (`types_name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `types`
--

LOCK TABLES `types` WRITE;
/*!40000 ALTER TABLE `types` DISABLE KEYS */;
INSERT INTO `types` VALUES (4,'Barque'),(7,'Barquentine'),(5,'Caravel'),(6,'Cog'),(3,'Galley'),(2,'Junk'),(1,'Longship');
/*!40000 ALTER TABLE `types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id_users` int(11) NOT NULL AUTO_INCREMENT,
  `users_f_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `users_l_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `users_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `users_password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_users`),
  UNIQUE KEY `users_email_UNIQUE` (`users_email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Lula','Luettgen','Kadin58@hotmail.com','$2y$10$yok5VjNFARcbl1wL0TF4EO/GyoOU/deSR8FjhDnzkSxRzfS9uDzBa'),(2,'Carmine','Roob','Magali31@yahoo.com','$2y$10$usFekiKJV79IdbbsZTPmFOq4jsNb15LO11kpiEgYyd0ve6dVrTQoe'),(3,'Maximillian','Keeling','Jedediah.Marvin@yahoo.com','$2y$10$7Tx235BHtsYtSZKG8aRHpuLDzNgNq78qLnoqqjSbeHwMNnnz.xPK.'),(4,'Rene','Kreiger','cBeahan@yahoo.com','$2y$10$KVEGrWjJ3ishgtYD4.KjwOIH4M4ZGW7buw1h9tZx.uJr/yIkdv0Jm');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vessels`
--

DROP TABLE IF EXISTS `vessels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vessels` (
  `id_vessels` int(11) NOT NULL AUTO_INCREMENT,
  `vessels_imo` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `vessels_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `vessels_type_id` int(11) DEFAULT NULL,
  `vessels_company_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_vessels`),
  UNIQUE KEY `vessels_imo_UNIQUE` (`vessels_imo`),
  UNIQUE KEY `vessels_name_UNIQUE` (`vessels_name`),
  KEY `types_vessels_id_index` (`vessels_type_id`),
  KEY `companies_vessels_id_index` (`vessels_company_id`),
  CONSTRAINT `types_vessels_id_foreign` FOREIGN KEY (`vessels_type_id`) REFERENCES `types` (`id_types`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vessels`
--

LOCK TABLES `vessels` WRITE;
/*!40000 ALTER TABLE `vessels` DISABLE KEYS */;
INSERT INTO `vessels` VALUES (1,'IMO3262729','RMS Titanic',7,3),(2,'IMO4809272','HMS Ark Royal',1,1),(3,'IMO5464252','SS Andrea Doria',4,2),(4,'IMO3758792','Ariel',7,3),(5,'IMO2503071','MS Oranje',1,3),(6,'IMO3877967','MS Achille Lauro',7,3),(7,'IMO1491571','SS Baychimo',2,3),(8,'IMO9104057','HMHS Britannic',5,2),(9,'IMO7546395','USS Constitution',1,2),(10,'IMO2111889','HMS Victory',7,1),(11,'IMO6271680','USS Monitor',5,1),(12,'IMO3606549','USS Arizona',4,1),(13,'IMO7772932','HMAV Titanic',3,3),(14,'IMO8725700','HMAV',7,2),(15,'IMO5111082','German battleship Bismarck',3,2),(16,'IMO6617866','Bluenose',2,1),(17,'IMO927695','Japanese battleship Yamato',3,1);
/*!40000 ALTER TABLE `vessels` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-12-18  4:01:46
