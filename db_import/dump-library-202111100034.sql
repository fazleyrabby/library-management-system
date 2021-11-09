-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: library
-- ------------------------------------------------------
-- Server version	5.7.33

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
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `book_name` varchar(240) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isbn` bigint(20) DEFAULT NULL,
  `author` varchar(240) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publisher` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active_status` int(11) DEFAULT '1' COMMENT '1=active,0=not active',
  `stock` int(11) DEFAULT NULL,
  `category` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (1,'The Nature of Space and Time',691037914,'Stephen W. Hawking; Roger Penrose','Princeton University Press., Princeton, N. J. 1996',1,15,NULL,'2019-05-28 13:01:47','2019-05-28 01:01:47'),(2,'The Inflationary Universe',201328402,'Guth, Alan','Basic Books 1998',1,13,NULL,'2019-05-28 13:02:44','2019-05-28 01:02:44'),(3,'Combinatorial Algorithms: An Update.',898712319,'Wilf, Herbert S','Soc. for Indust. Mathematics, Philadelphia, PA. 1989',1,10,NULL,'2019-05-28 14:00:45','2019-05-28 02:00:45'),(4,'Giant Molecules. From Nylon to Nanotubes',199550026,'Gratzer, Walter','Oxford University Press, Oxford 2009',1,10,NULL,'2019-05-28 14:14:16','2019-05-28 02:14:16');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `borrow`
--

DROP TABLE IF EXISTS `borrow`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `borrow` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `copies` int(11) DEFAULT NULL COMMENT 'number of books',
  `fine` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `borrow_date` date DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `status` int(11) DEFAULT '1' COMMENT '0=not active,1=borrowed,2=returned,3=not returned at time',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `borrow`
--

LOCK TABLES `borrow` WRITE;
/*!40000 ALTER TABLE `borrow` DISABLE KEYS */;
INSERT INTO `borrow` VALUES (1,1,3,1,NULL,'2019-07-16','2019-07-26','2019-07-10',2,'2019-07-09 13:17:00','2019-07-09 01:17:00'),(2,1,3,1,NULL,'2019-07-16','2019-07-26','2019-07-23',2,'2019-07-16 18:33:03','2019-07-16 06:33:03');
/*!40000 ALTER TABLE `borrow` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` tinyint(4) DEFAULT NULL COMMENT '1=superadmin,2=subadmin,3=staff,4=member',
  `status` int(11) DEFAULT '1' COMMENT '1=active,0=inactive,2=deleted',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (1,'admin','81dc9bdb52d04dc20036dbd8313ed055',1,1,'2019-05-26 00:40:00','2019-05-25 12:40:00'),(2,'subadmin','81dc9bdb52d04dc20036dbd8313ed055',2,1,'2019-07-23 11:49:58',NULL);
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(240) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact` varchar(240) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(240) COLLATE utf8_unicode_ci DEFAULT NULL,
  `student_id` varchar(240) COLLATE utf8_unicode_ci DEFAULT NULL,
  `department` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `active_status` int(11) NOT NULL DEFAULT '1' COMMENT '0=not active,1=active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (1,'Hamidul Islam ','0987654321','hamid@gmail.com','CSE01306219','CSE','2019-05-28 00:47:42','2019-05-27 12:47:42',1),(2,'Md. Mohiuddin ','0987654321','mohiuddin@gmail.com','EEE01104647','EEE','2019-05-28 01:00:36','2019-05-27 13:00:36',1),(3,'Anwarul Ajim','0987654321','ajim@gmail.com','EEE01207645','EEE','2019-05-28 01:22:05','2019-05-27 13:22:05',1),(4,'Anwar Hossain','0987654321','anwar@gmail.com','CSE01104565','CSE','2019-05-28 01:25:30','2019-05-27 13:25:30',1),(5,'Monsur Ali','0987654321','monsur@gmail.com','CSE01307654','CSE','2019-05-28 01:29:51','2019-05-27 13:29:51',1),(6,'Md. Fazley Rabbi','01954137632','fazley111@gmail.com','CSE01306242','CSE','2019-05-28 11:13:17','2019-05-27 23:13:17',1),(7,'Saiful Islam','0987654321','saiful@gmail.com','LLB01204534','LLB','2019-05-28 11:15:24','2019-05-27 23:15:24',1);
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'library'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-10  0:34:44
