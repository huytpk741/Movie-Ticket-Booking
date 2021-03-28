CREATE DATABASE  IF NOT EXISTS `bookingv5` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `bookingv5`;
-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bookingv5
-- ------------------------------------------------------
-- Server version	8.0.23

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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `picture` text NOT NULL,
  `role` enum('super_admin','movie_manager') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'Admin','admin@gmail.com','$2y$10$BqCGHI7Tr1nWxX5p.4RleeKPshxUv6WFpf25fWZCkyClA.N6TVjTm','','super_admin'),(3,'Ali','ali@gmail.com','$2y$10$M6G.EFk7dRgmQ1P4On7LV.VCdUsTWPzkL/B9fPCmqLHaNogzga33W','','movie_manager');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (3,'Action'),(6,'Fantasy'),(7,'Comedy');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `celebrities`
--

DROP TABLE IF EXISTS `celebrities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `celebrities` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text,
  `picture` text,
  `description` text,
  `height` text,
  `weight` text,
  `eye_color` text,
  `hair_color` text,
  `birthday` date DEFAULT NULL,
  `facebook` text,
  `twitter` text,
  `youtube` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `celebrities`
--

LOCK TABLES `celebrities` WRITE;
/*!40000 ALTER TABLE `celebrities` DISABLE KEYS */;
INSERT INTO `celebrities` VALUES (4,'Robert Pattinson','uploads/celebrities/1598544397-MV5BNzk0MDQ5OTUxMV5BMl5BanBnXkFtZTcwMDM5ODk5Mg@@._V1_UY317_CR12,0,214,317_AL_.jpg','','6.0','75 kg','Blue','Golden Brown','1986-05-13','https://facebook.com/','https://twitter.com/','https://youtube.com/'),(5,'Mark Ruffalo','uploads/celebrities/1598545220-MV5BNDQyNzMzZTMtYjlkNS00YzFhLWFhMTctY2M4YmQ1NmRhODBkXkEyXkFqcGdeQXVyNjcyNzgyOTE@._V1_UY317_CR20,0,214,317_AL_.jpg','','5.8','72 kg','Dark Brown','Black','1967-11-22','https://facebook.com/','https://twitter.com/','https://youtube.com/'),(6,'Chris Evans','uploads/celebrities/1598545236-MV5BMTU2NTg1OTQzMF5BMl5BanBnXkFtZTcwNjIyMjkyMg@@._V1_UY317_CR6,0,214,317_AL_.jpg','','6.0','88 kg','Blue','Light Brown','1981-06-13','https://facebook.com/','https://twitter.com/','https://youtube.com/'),(7,'Robert Downey Jr.','uploads/celebrities/1598545248-MV5BNzg1MTUyNDYxOF5BMl5BanBnXkFtZTgwNTQ4MTE2MjE@._V1_UX214_CR0,0,214,317_AL_.jpg','','5.8','78 kg','Dark Brown','Dark Brown','1965-04-04','https://facebook.com/','https://twitter.com/','https://youtube.com/'),(8,'Margot Robbie','uploads/celebrities/1598554735-MV5BMTgxNDcwMzU2Nl5BMl5BanBnXkFtZTcwNDc4NzkzOQ@@._V1_UY317_CR12,0,214,317_AL_.jpg','','5.6','57 kg','Blue','Blonde','1990-07-02','https://facebook.com/','https://twitter.com/','https://youtube.com/'),(9,'Leonardo DiCaprio','uploads/celebrities/1598554749-MV5BMjI0MTg3MzI0M15BMl5BanBnXkFtZTcwMzQyODU2Mw@@._V1_UY317_CR10,0,214,317_AL_.jpg','','6.0','75 kg','Blue','Blond','1974-11-11','https://facebook.com/','https://twitter.com/','https://youtube.com/'),(10,'Brad Pitt','uploads/celebrities/1598554765-MV5BMjA1MjE2MTQ2MV5BMl5BanBnXkFtZTcwMjE5MDY0Nw@@._V1_UX214_CR0,0,214,317_AL_.jpg','','5.11','78 kg','Blue','Blonde','1963-12-18','https://facebook.com/','https://twitter.com/','https://youtube.com/'),(11,'Benedict Cumberbatch','uploads/celebrities/1598556304-MV5BMjE0MDkzMDQwOF5BMl5BanBnXkFtZTgwOTE1Mjg1MzE@._V1_UY317_CR2,0,214,317_AL_.jpg','Benedict Timothy Carlton Cumberbatch was born and raised in London, England. His parents, Wanda Ventham and Timothy Carlton (born Timothy Carlton Congdon Cumberbatch), are both actors. He is a grandson of submarine commander Henry Carlton Cumberbatch, and a great-grandson of diplomat Henry Arnold Cumberbatch CMG. Cumberbatch attended Brambletye','6.0','79 kg','Black','Black','1976-07-19','https://facebook.com/','https://twitter.com/','https://youtube.com/'),(12,'Samuel L. Jackson','uploads/celebrities/1598558793-MV5BMTQ1NTQwMTYxNl5BMl5BanBnXkFtZTYwMjA1MzY1._V1_UX214_CR0,0,214,317_AL_.jpg','Samuel L. Jackson is an American producer and highly prolific actor, having appeared in over 100 films, including Die Hard: With a Vengeance (1995), Unbreakable (2000), Shaft (2000), The 51st State (2001), Black Snake Moan (2006), Snakes on a Plane (2006), and the Star Wars prequel trilogy (1999-2005), as well as the Marvel Cinematic Universe.','6.2','83 kg','Black','Bald','1948-12-21','https://facebook.com/','https://twitter.com/','https://youtube.com/'),(13,'Brie Larson','uploads/celebrities/1598558810-MV5BMjExODkxODU3NF5BMl5BanBnXkFtZTgwNTM0MTk3NjE@._V1_UY317_CR7,0,214,317_AL_.jpg','Brie Larson has built an impressive career as an acclaimed television actress, rising feature film star and emerging recording artist. A native of Sacramento, Brie started studying drama at the early age of 6, as the youngest student ever to attend the American Conservatory Theater in San Francisco. She starred in one of Disney Channel\'s most ','5.7','59 kg','Black','Blond','1989-10-01','https://facebook.com/','https://twitter.com/','https://youtube.com/');
/*!40000 ALTER TABLE `celebrities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cinemas`
--

DROP TABLE IF EXISTS `cinemas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cinemas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cinemas`
--

LOCK TABLES `cinemas` WRITE;
/*!40000 ALTER TABLE `cinemas` DISABLE KEYS */;
INSERT INTO `cinemas` VALUES (2,'iMax'),(3,'Cantt');
/*!40000 ALTER TABLE `cinemas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text,
  `email` text,
  `phone` text,
  `message` text,
  `movie_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comments_movie_id` (`movie_id`),
  CONSTRAINT `fk_comments_movie_id` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,'Tran Quoc Huy','huytpk741@gmail.com','0961587958','Hello',12);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coupon_codes`
--

DROP TABLE IF EXISTS `coupon_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coupon_codes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `movie_id` int NOT NULL,
  `coupon_code` text NOT NULL,
  `discount` double NOT NULL,
  `valid_till` datetime NOT NULL,
  `created_by` int NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `movie_id` (`movie_id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `coupon_codes_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `coupon_codes_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coupon_codes`
--

LOCK TABLES `coupon_codes` WRITE;
/*!40000 ALTER TABLE `coupon_codes` DISABLE KEYS */;
INSERT INTO `coupon_codes` VALUES (6,12,'EF75',13,'2021-03-31 20:02:40',1,'2021-03-23 07:22:09'),(7,12,'HAYGHE',10,'2021-03-31 10:25:54',3,'2021-03-25 10:25:56');
/*!40000 ALTER TABLE `coupon_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movie_cast`
--

DROP TABLE IF EXISTS `movie_cast`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `movie_cast` (
  `id` int NOT NULL AUTO_INCREMENT,
  `movie_id` int NOT NULL,
  `cast_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `movie_cast_cast_id` (`cast_id`),
  KEY `movie_cast_movie_id` (`movie_id`),
  CONSTRAINT `movie_cast_cast_id` FOREIGN KEY (`cast_id`) REFERENCES `celebrities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `movie_cast_movie_id` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movie_cast`
--

LOCK TABLES `movie_cast` WRITE;
/*!40000 ALTER TABLE `movie_cast` DISABLE KEYS */;
INSERT INTO `movie_cast` VALUES (98,12,8),(99,12,9),(100,12,10);
/*!40000 ALTER TABLE `movie_cast` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movie_categories`
--

DROP TABLE IF EXISTS `movie_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `movie_categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `movie_id` int NOT NULL,
  `category_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_movie_categories_category_id` (`category_id`),
  KEY `fk_movie_categories_movie_id` (`movie_id`),
  CONSTRAINT `fk_movie_categories_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_movie_categories_movie_id` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movie_categories`
--

LOCK TABLES `movie_categories` WRITE;
/*!40000 ALTER TABLE `movie_categories` DISABLE KEYS */;
INSERT INTO `movie_categories` VALUES (78,12,6);
/*!40000 ALTER TABLE `movie_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movie_cinemas`
--

DROP TABLE IF EXISTS `movie_cinemas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `movie_cinemas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `movie_id` int NOT NULL,
  `cinema_id` int NOT NULL,
  `movie_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_movie_cinemas_cinema_id` (`cinema_id`),
  KEY `fk_movie_cinemas_movie_id` (`movie_id`),
  CONSTRAINT `fk_movie_cinemas_cinema_id` FOREIGN KEY (`cinema_id`) REFERENCES `cinemas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_movie_cinemas_movie_id` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movie_cinemas`
--

LOCK TABLES `movie_cinemas` WRITE;
/*!40000 ALTER TABLE `movie_cinemas` DISABLE KEYS */;
INSERT INTO `movie_cinemas` VALUES (102,12,3,'2021-03-31 07:11:00'),(103,12,3,'2021-03-27 15:52:00');
/*!40000 ALTER TABLE `movie_cinemas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movie_ratings`
--

DROP TABLE IF EXISTS `movie_ratings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `movie_ratings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `movie_id` int NOT NULL,
  `user_id` int NOT NULL,
  `ratings` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `movie_ratings_movie_id` (`movie_id`),
  KEY `movie_ratings_user_id` (`user_id`),
  CONSTRAINT `movie_ratings_movie_id` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `movie_ratings_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movie_ratings`
--

LOCK TABLES `movie_ratings` WRITE;
/*!40000 ALTER TABLE `movie_ratings` DISABLE KEYS */;
/*!40000 ALTER TABLE `movie_ratings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movie_thumbnails`
--

DROP TABLE IF EXISTS `movie_thumbnails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `movie_thumbnails` (
  `id` int NOT NULL AUTO_INCREMENT,
  `movie_id` int DEFAULT NULL,
  `file_path` text,
  PRIMARY KEY (`id`),
  KEY `fk_movie_thumbnails_movie_id` (`movie_id`),
  CONSTRAINT `fk_movie_thumbnails_movie_id` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movie_thumbnails`
--

LOCK TABLES `movie_thumbnails` WRITE;
/*!40000 ALTER TABLE `movie_thumbnails` DISABLE KEYS */;
INSERT INTO `movie_thumbnails` VALUES (26,12,'uploads/movie_thumbnails/1616464613-IMG_0505.JPG');
/*!40000 ALTER TABLE `movie_thumbnails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `movies` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text,
  `description` text,
  `writer` text,
  `director` text,
  `duration` text,
  `release_date` datetime DEFAULT NULL,
  `languages` text,
  `price_per_ticket` int DEFAULT NULL,
  `created_by` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `movies_ibfk_1` (`created_by`),
  CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movies`
--

LOCK TABLES `movies` WRITE;
/*!40000 ALTER TABLE `movies` DISABLE KEYS */;
INSERT INTO `movies` VALUES (12,'test','asd','asd','zxc','1h35m','2021-03-31 00:00:00','english',10,3);
/*!40000 ALTER TABLE `movies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `movie_id` int NOT NULL,
  `coupon_code_id` int NOT NULL,
  `created_at` datetime NOT NULL,
  `orderscol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `movie_id` (`movie_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (96,13,12,0,'2021-03-28 00:20:34',NULL),(97,13,12,0,'2021-03-28 00:33:14',NULL),(98,13,12,0,'2021-03-28 00:33:38',NULL),(99,13,12,7,'2021-03-28 00:37:24',NULL),(100,13,12,7,'2021-03-28 00:39:42',NULL),(101,13,12,0,'2021-03-28 00:40:13',NULL),(102,13,12,0,'2021-03-28 00:43:12',NULL),(103,13,12,0,'2021-03-28 00:45:54',NULL),(104,13,12,0,'2021-03-28 00:48:22',NULL),(105,13,12,7,'2021-03-28 01:00:59',NULL),(106,13,12,7,'2021-03-28 01:05:31',NULL),(107,13,12,7,'2021-03-28 01:06:33',NULL),(108,13,12,7,'2021-03-28 01:07:27',NULL),(109,13,12,0,'2021-03-28 01:13:45',NULL);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `type` text NOT NULL,
  `status` text NOT NULL,
  `is_confirm` text,
  `payment_id` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (55,96,'Online Payment','Pending','e67a7d5493b3c4e8644a5a880a8a03ef',NULL),(56,97,'Online Payment','Pending','2aa8af9b5e1ad88007f1c4b31be4dc4c',NULL),(57,98,'Cash in Hand','Confirmed',NULL,NULL),(58,99,'Online Payment (Stripe)','Paid',NULL,NULL),(59,100,'Online Payment (Stripe)','Paid',NULL,NULL),(60,101,'Online Payment (Paypal)','Paid',NULL,NULL),(61,102,'Online Payment','Pending','7ecbf89aface068185fa476d700646bd',NULL),(62,103,'Online Payment (Stripe)','Paid',NULL,'pi_1IZgEMAUBnKCtMsZdxEqE6zW'),(63,104,'Online Payment (Paypal)','Paid',NULL,'PAYID-MBPW75Y10K52301VH203744R'),(64,105,'Online Payment (Stripe)','Paid',NULL,'pi_1IZgUUAUBnKCtMsZKSJytpiK'),(65,106,'Online Payment (Stripe)','Paid',NULL,'pi_1IZgVyAUBnKCtMsZi8HZiQYD'),(66,107,'Online Payment (Paypal)','Paid',NULL,'PAYID-MBPXIOQ71L966764T057400U'),(67,108,'Online Payment (Stripe)','Paid',NULL,'pi_1IZgXrAUBnKCtMsZeLAKk08L'),(68,109,'Cash in Hand','Pending','ca80f755da51e6dd255d318f28fa97a2',NULL);
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscribers`
--

DROP TABLE IF EXISTS `subscribers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subscribers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscribers`
--

LOCK TABLES `subscribers` WRITE;
/*!40000 ALTER TABLE `subscribers` DISABLE KEYS */;
INSERT INTO `subscribers` VALUES (1,'adnan1@gmail.com'),(2,'huytpk741@gmail.com');
/*!40000 ALTER TABLE `subscribers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tickets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `movie_id` int NOT NULL,
  `user_id` int NOT NULL,
  `cinema_id` int NOT NULL,
  `ticket_location` text NOT NULL,
  `movie_time` datetime NOT NULL,
  `movie_cinema_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `movie_cinema_id` (`movie_cinema_id`),
  KEY `order_id` (`order_id`),
  KEY `movie_id` (`movie_id`),
  KEY `user_id` (`user_id`),
  KEY `cinema_id` (`cinema_id`),
  CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`movie_cinema_id`) REFERENCES `movie_cinemas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tickets_ibfk_3` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tickets_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tickets_ibfk_5` FOREIGN KEY (`cinema_id`) REFERENCES `cinemas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
INSERT INTO `tickets` VALUES (113,96,12,13,3,'E7','2021-03-31 07:11:00',102),(114,96,12,13,3,'E8','2021-03-31 07:11:00',102),(115,97,12,13,3,'E9','2021-03-31 07:11:00',102),(116,98,12,13,3,'E10','2021-03-31 07:11:00',102),(117,99,12,13,3,'E6','2021-03-31 07:11:00',102),(118,100,12,13,3,'E11','2021-03-31 07:11:00',102),(119,101,12,13,3,'E12','2021-03-31 07:11:00',102),(120,102,12,13,3,'E13','2021-03-31 07:11:00',102),(121,103,12,13,3,'E14','2021-03-31 07:11:00',102),(122,104,12,13,3,'E15','2021-03-31 07:11:00',102),(123,105,12,13,3,'E4','2021-03-31 07:11:00',102),(124,105,12,13,3,'E5','2021-03-31 07:11:00',102),(125,106,12,13,3,'E3','2021-03-31 07:11:00',102),(126,107,12,13,3,'E2','2021-03-31 07:11:00',102),(127,108,12,13,3,'D1','2021-03-31 07:11:00',102),(128,108,12,13,3,'D2','2021-03-31 07:11:00',102),(129,108,12,13,3,'D3','2021-03-31 07:11:00',102),(130,108,12,13,3,'D4','2021-03-31 07:11:00',102),(131,108,12,13,3,'D5','2021-03-31 07:11:00',102),(132,108,12,13,3,'E1','2021-03-31 07:11:00',102),(133,109,12,13,3,'D6','2021-03-31 07:11:00',102);
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trailers`
--

DROP TABLE IF EXISTS `trailers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trailers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `movie_id` int NOT NULL,
  `file_path` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_trailers_movie_id` (`movie_id`),
  CONSTRAINT `fk_trailers_movie_id` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trailers`
--

LOCK TABLES `trailers` WRITE;
/*!40000 ALTER TABLE `trailers` DISABLE KEYS */;
INSERT INTO `trailers` VALUES (29,12,'uploads/movie_trailers/1616464613-recording.mov');
/*!40000 ALTER TABLE `trailers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `mobile_number` text NOT NULL,
  `verification_code` text NOT NULL,
  `verified_at` datetime DEFAULT NULL,
  `reset_password` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (7,'Adnan Afzal','adnan@gmail.com','$2y$10$HUi/noe1BHjR967b3t08junj5Kl0ZJ6VisGUYhtMAOyKc//GJvinC','1233','183898','2020-08-27 00:48:47','d882a17502cdc2bdf4848e6a553d18e4'),(8,'Ali','ali@gmail.com','$2y$10$fs2vVOunF7VEddTqvzH5JOPCbe/gTo9RyhgY53iN4kL27FGxy13PC','123456','952753','2020-08-29 11:03:19',NULL),(9,'Ahmad','ahmad@gmail.com','$2y$10$yeVfM3yz.jSQYIe3gO20ZeY2nt6cLxKTl4EWS9KyFStOg5waNe2DS','123456','316037','2020-08-29 11:03:51',NULL),(10,'Yasir','yasir@gmail.com','$2y$10$7gWks2rF/99/Esc1YqbLDOI1kzPQN71A31UAnU4j3.tfKS4DcsZAW','123456','302568','2020-08-29 11:05:19',NULL),(11,'Jinnah','jinnah@gmail.com','$2y$10$uolwHENemBrUhkIPogymT.ZaziF5klBPe7FWwF9O0d3c8hdNaDZoG','1234567','250193','2020-08-29 11:05:17',NULL),(12,'Adnan','adnanafzal565@gmail.com','$2y$10$xe2gqMvJG2WSqQToeOZPueSTi7OYV.d0HD8lb1JuD/1xHuy.vRCcC','12345','206111',NULL,NULL),(13,'Tran Quoc Huy','huytpk741@gmail.com','$2y$10$WtRfvqDxdbYK3XgEWeX.1.biqGQ9ilqoUvHMY7RKZriGyAWYjGzYW','5333335','239053','2021-03-25 11:27:42','829f82a55afaaceadd4fd519260f88b7');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-28 10:47:49
