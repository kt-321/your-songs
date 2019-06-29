-- MySQL dump 10.13  Distrib 5.5.62, for Linux (x86_64)
--
-- Host: localhost    Database: your-songs
-- ------------------------------------------------------
-- Server version	5.5.62

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
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `song_id` int(10) unsigned NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_user_id_index` (`user_id`),
  KEY `comments_song_id_index` (`song_id`),
  CONSTRAINT `comments_song_id_foreign` FOREIGN KEY (`song_id`) REFERENCES `songs` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,32,63,'fdfdfdf','2019-06-17 16:12:24','2019-06-17 16:12:24'),(2,33,64,'hbhhhhh','2019-06-18 10:21:02','2019-06-18 10:21:02');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `favorites`
--

DROP TABLE IF EXISTS `favorites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `favorites` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `song_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `favorites_user_id_index` (`user_id`),
  KEY `favorites_song_id_index` (`song_id`),
  CONSTRAINT `favorites_song_id_foreign` FOREIGN KEY (`song_id`) REFERENCES `songs` (`id`) ON DELETE CASCADE,
  CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `favorites`
--

LOCK TABLES `favorites` WRITE;
/*!40000 ALTER TABLE `favorites` DISABLE KEYS */;
INSERT INTO `favorites` VALUES (1,32,63,'2019-06-17 16:12:05','2019-06-17 16:12:05'),(4,32,1,'2019-06-17 16:14:58','2019-06-17 16:14:58'),(5,33,64,'2019-06-18 10:21:55','2019-06-18 10:21:55'),(6,33,1,'2019-06-18 10:23:35','2019-06-18 10:23:35');
/*!40000 ALTER TABLE `favorites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (40,'2014_10_12_000000_create_users_table',1),(41,'2014_10_12_100000_create_password_resets_table',1),(42,'2019_04_22_173724_create_songs_table',1),(43,'2019_05_02_153308_add_columns_to_users_table',1),(44,'2019_05_05_175357_create_user_follow_table',1),(45,'2019_05_11_142253_create_favorites_table',1),(46,'2019_05_26_153448_create_comments_table',1),(47,'2019_06_13_173720_add_column_role_users_table',1),(48,'2019_06_16_151617_add_column_soft_deletes_songs_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `songs`
--

DROP TABLE IF EXISTS `songs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `songs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `song_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artist_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `music_age` int(11) NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `songs_user_id_index` (`user_id`),
  CONSTRAINT `songs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `songs`
--

LOCK TABLES `songs` WRITE;
/*!40000 ALTER TABLE `songs` DISABLE KEYS */;
INSERT INTO `songs` VALUES (1,2,'song1','artist1',1980,'descriptiondescriptiondescriptiondescription1',NULL,NULL,NULL,'2019-06-17 13:00:29',NULL),(2,3,'song2','artist2',1990,'descriptiondescriptiondescriptiondescription2',NULL,NULL,NULL,NULL,NULL),(3,4,'song3','artist3',2000,'descriptiondescriptiondescriptiondescription3',NULL,NULL,NULL,NULL,NULL),(4,5,'song4','artist4',2010,'descriptiondescriptiondescriptiondescription4',NULL,NULL,NULL,NULL,NULL),(5,6,'song5','artist5',1970,'descriptiondescriptiondescriptiondescription5',NULL,NULL,NULL,NULL,NULL),(6,7,'song6','artist6',1980,'descriptiondescriptiondescriptiondescription6',NULL,NULL,NULL,NULL,NULL),(7,8,'song7','artist7',1990,'descriptiondescriptiondescriptiondescription7',NULL,NULL,NULL,NULL,NULL),(8,9,'song8','artist8',2000,'descriptiondescriptiondescriptiondescription8',NULL,NULL,NULL,NULL,NULL),(9,10,'song9','artist9',2010,'descriptiondescriptiondescriptiondescription9',NULL,NULL,NULL,NULL,NULL),(10,11,'song10','artist10',1970,'descriptiondescriptiondescriptiondescription10',NULL,NULL,NULL,NULL,NULL),(11,12,'song11','artist11',1980,'descriptiondescriptiondescriptiondescription11',NULL,NULL,NULL,NULL,NULL),(12,13,'song12','artist12',1990,'descriptiondescriptiondescriptiondescription12',NULL,NULL,NULL,NULL,NULL),(13,14,'song13','artist13',2000,'descriptiondescriptiondescriptiondescription13',NULL,NULL,NULL,NULL,NULL),(14,15,'song14','artist14',2010,'descriptiondescriptiondescriptiondescription14',NULL,NULL,NULL,NULL,NULL),(15,16,'song15','artist15',1970,'descriptiondescriptiondescriptiondescription15',NULL,NULL,NULL,NULL,NULL),(16,17,'song16','artist16',1980,'descriptiondescriptiondescriptiondescription16',NULL,NULL,NULL,NULL,NULL),(17,18,'song17','artist17',1990,'descriptiondescriptiondescriptiondescription17',NULL,NULL,NULL,'2019-06-17 21:25:54',NULL),(18,19,'song18','artist18',2000,'descriptiondescriptiondescriptiondescription18',NULL,NULL,NULL,NULL,NULL),(19,20,'song19','artist19',2010,'descriptiondescriptiondescriptiondescription19',NULL,NULL,NULL,NULL,NULL),(20,21,'song20','artist20',1970,'descriptiondescriptiondescriptiondescription20',NULL,NULL,NULL,NULL,NULL),(21,22,'song21','artist21',1980,'descriptiondescriptiondescriptiondescription21',NULL,NULL,NULL,NULL,NULL),(22,23,'song22','artist22',1990,'descriptiondescriptiondescriptiondescription22',NULL,NULL,NULL,NULL,NULL),(23,24,'song23','artist23',2000,'descriptiondescriptiondescriptiondescription23',NULL,NULL,NULL,NULL,NULL),(24,25,'song24','artist24',2010,'descriptiondescriptiondescriptiondescription24',NULL,NULL,NULL,NULL,NULL),(25,26,'song25','artist25',1970,'descriptiondescriptiondescriptiondescription25',NULL,NULL,NULL,NULL,NULL),(26,27,'song26','artist26',1980,'descriptiondescriptiondescriptiondescription26',NULL,NULL,NULL,NULL,NULL),(27,28,'song27','artist27',1990,'descriptiondescriptiondescriptiondescription27',NULL,NULL,NULL,NULL,NULL),(28,29,'song28','artist28',2000,'descriptiondescriptiondescriptiondescription28',NULL,NULL,NULL,NULL,NULL),(29,30,'song29','artist29',2010,'descriptiondescriptiondescriptiondescription29',NULL,NULL,NULL,NULL,NULL),(30,1,'song30','artist30',1970,'descriptiondescriptiondescriptiondescription30',NULL,NULL,NULL,NULL,NULL),(31,2,'song31','artist31',1980,'descriptiondescriptiondescriptiondescription31',NULL,NULL,NULL,NULL,NULL),(32,3,'song32','artist32',1990,'descriptiondescriptiondescriptiondescription32',NULL,NULL,NULL,NULL,NULL),(33,4,'song33','artist33',2000,'descriptiondescriptiondescriptiondescription33',NULL,NULL,NULL,NULL,NULL),(34,5,'song34','artist34',2010,'descriptiondescriptiondescriptiondescription34',NULL,NULL,NULL,NULL,NULL),(35,6,'song35','artist35',1970,'descriptiondescriptiondescriptiondescription35',NULL,NULL,NULL,NULL,NULL),(36,7,'song36','artist36',1980,'descriptiondescriptiondescriptiondescription36',NULL,NULL,NULL,NULL,NULL),(37,8,'song37','artist37',1990,'descriptiondescriptiondescriptiondescription37',NULL,NULL,NULL,NULL,NULL),(38,9,'song38','artist38',2000,'descriptiondescriptiondescriptiondescription38',NULL,NULL,NULL,NULL,NULL),(39,10,'song39','artist39',2010,'descriptiondescriptiondescriptiondescription39',NULL,NULL,NULL,NULL,NULL),(40,11,'song40','artist40',1970,'descriptiondescriptiondescriptiondescription40',NULL,NULL,NULL,NULL,NULL),(41,12,'song41','artist41',1980,'descriptiondescriptiondescriptiondescription41',NULL,NULL,NULL,NULL,NULL),(42,13,'song42','artist42',1990,'descriptiondescriptiondescriptiondescription42',NULL,NULL,NULL,NULL,NULL),(43,14,'song43','artist43',2000,'descriptiondescriptiondescriptiondescription43',NULL,NULL,NULL,NULL,NULL),(44,15,'song44','artist44',2010,'descriptiondescriptiondescriptiondescription44',NULL,NULL,NULL,NULL,NULL),(45,16,'song45','artist45',1970,'descriptiondescriptiondescriptiondescription45',NULL,NULL,NULL,NULL,NULL),(46,17,'song46','artist46',1980,'descriptiondescriptiondescriptiondescription46',NULL,NULL,NULL,NULL,NULL),(47,18,'song47','artist47',1990,'descriptiondescriptiondescriptiondescription47',NULL,NULL,NULL,NULL,NULL),(48,19,'song48','artist48',2000,'descriptiondescriptiondescriptiondescription48',NULL,NULL,NULL,NULL,NULL),(49,20,'song49','artist49',2010,'descriptiondescriptiondescriptiondescription49',NULL,NULL,NULL,NULL,NULL),(50,21,'song50','artist50',1970,'descriptiondescriptiondescriptiondescription50',NULL,NULL,NULL,NULL,NULL),(51,22,'song51','artist51',1980,'descriptiondescriptiondescriptiondescription51',NULL,NULL,NULL,NULL,NULL),(52,23,'song52','artist52',1990,'descriptiondescriptiondescriptiondescription52',NULL,NULL,NULL,NULL,NULL),(53,24,'song53','artist53',2000,'descriptiondescriptiondescriptiondescription53',NULL,NULL,NULL,NULL,NULL),(54,25,'song54','artist54',2010,'descriptiondescriptiondescriptiondescription54',NULL,NULL,NULL,NULL,NULL),(55,26,'song55','artist55',1970,'descriptiondescriptiondescriptiondescription55',NULL,NULL,NULL,NULL,NULL),(56,27,'song56','artist56',1980,'descriptiondescriptiondescriptiondescription56',NULL,NULL,NULL,NULL,NULL),(57,28,'song57','artist57',1990,'descriptiondescriptiondescriptiondescription57',NULL,NULL,NULL,NULL,NULL),(58,29,'song58','artist58',2000,'descriptiondescriptiondescriptiondescription58',NULL,NULL,NULL,NULL,NULL),(59,30,'song59','artist59',2010,'descriptiondescriptiondescriptiondescription59',NULL,NULL,NULL,NULL,NULL),(60,1,'song60','artist60',1970,'descriptiondescriptiondescriptiondescription60',NULL,NULL,NULL,NULL,NULL),(61,32,'ffffffffff','fffffff',1970,'fdfd',NULL,NULL,'2019-06-17 15:58:47','2019-06-17 15:58:47',NULL),(62,32,'fdfdf','dfdfd',1970,'dfdfdfdf',NULL,NULL,'2019-06-17 15:58:54','2019-06-17 15:58:54',NULL),(63,32,'t','fgfg',1980,'gfg','https://original-yoursongs.s3.ap-northeast-1.amazonaws.com/GRoJGySbbUOrCYNqGo9KmhZJ5QccJjbbXz6ZC6Ti.jpeg',NULL,'2019-06-17 16:11:49','2019-06-17 16:12:28','2019-06-17 16:12:28'),(64,33,'ffffff','dddddddd',1980,'dfdf','https://original-yoursongs.s3.ap-northeast-1.amazonaws.com/5Ebp5l1KMSLLQTkdaPIn2QFuULBDnkB1VVytd4MM.jpeg',NULL,'2019-06-18 10:14:52','2019-06-18 10:22:59','2019-06-18 10:22:59'),(65,33,'ffffff','fffffffff',1980,'dfdf','https://original-yoursongs.s3.ap-northeast-1.amazonaws.com/bZNwbbunwUjlvXKqrf0AIqvtKZnEZjKXy0nZ0cwT.jpeg',NULL,'2019-06-18 10:17:33','2019-06-18 10:20:25','2019-06-18 10:20:25');
/*!40000 ALTER TABLE `songs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_follow`
--

DROP TABLE IF EXISTS `user_follow`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_follow` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `follow_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_follow_user_id_follow_id_unique` (`user_id`,`follow_id`),
  KEY `user_follow_user_id_index` (`user_id`),
  KEY `user_follow_follow_id_index` (`follow_id`),
  CONSTRAINT `user_follow_follow_id_foreign` FOREIGN KEY (`follow_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_follow_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_follow`
--

LOCK TABLES `user_follow` WRITE;
/*!40000 ALTER TABLE `user_follow` DISABLE KEYS */;
INSERT INTO `user_follow` VALUES (2,33,4,'2019-06-18 10:23:19','2019-06-18 10:23:19'),(3,33,2,'2019-06-18 10:23:25','2019-06-18 10:23:25');
/*!40000 ALTER TABLE `user_follow` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '10' COMMENT 'ロール',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favorite_music_age` int(11) DEFAULT NULL,
  `favorite_artist` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `index_role` (`role`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'test user1','1@gmail.com','$2y$10$.Ui6Avl9/HRKzavPURSOhuMgZWV.qHQWV1VC7Sq.apiZuUbtBg01W',10,NULL,NULL,NULL,20,'2',NULL,NULL,NULL,NULL),(2,'test user2','2@gmail.com','$2y$10$TUb7W/HGIKOHDvRcljiOh.P.VBcY0PSMyvalX0QTn8ngGBdm4cKS2',10,NULL,NULL,NULL,30,'1',NULL,NULL,NULL,NULL),(3,'test user3','3@gmail.com','$2y$10$tLpJ/K1Ej5beaYFQlMoelOAOtURd4Y/3nziLJkgPn.5wEgAc0Jwna',10,NULL,NULL,NULL,40,'2',NULL,NULL,NULL,NULL),(4,'test user4','4@gmail.com','$2y$10$Jq7UrRcaeljQNTueUb0oGOSO1o4pHrgqlXz2UMo7OYkNJoeAFgEWy',10,NULL,NULL,NULL,50,'1',NULL,NULL,NULL,NULL),(5,'test user5','5@gmail.com','$2y$10$8dRWnM3zrONgHC1NbAZ9MeDc8WleuQgSRb9VpTSqkYQLNfkIkD7ua',10,NULL,NULL,NULL,60,'2',NULL,NULL,NULL,NULL),(6,'test user6','6@gmail.com','$2y$10$fgZbq3NGYH5XCy7oAfCpiucjRAUE1KQb4Z69aLTj7UrRZy4FzeLAW',10,NULL,NULL,NULL,70,'1',NULL,NULL,NULL,NULL),(7,'test user7','7@gmail.com','$2y$10$lGolcvsk3hqTQzJ1pMAov.5T32qDbjifaUUE4UP6xABlep/yhEWRO',10,NULL,NULL,NULL,10,'2',NULL,NULL,NULL,NULL),(8,'test user8','8@gmail.com','$2y$10$cams6Pc7aekrJWomP.VhbuMoBJVqLHhvmhwHBerI2tqAp0Ni6NVU.',10,NULL,NULL,NULL,20,'1',NULL,NULL,NULL,NULL),(9,'test user9','9@gmail.com','$2y$10$kBHHcUl0eqx47BjskXlgWOWDukrgCqaCfP8RvvXIdC6IiZNunsVC2',10,NULL,NULL,NULL,30,'2',NULL,NULL,NULL,NULL),(10,'test user10','10@gmail.com','$2y$10$m5BgSMUNxW4NlH5y0wtGPedPC7YaWVGDI/k/VLb9mNR1LaJbTfyPK',10,NULL,NULL,NULL,40,'1',NULL,NULL,NULL,NULL),(11,'test user11','11@gmail.com','$2y$10$HHP/bHii6s0xIUtueZ.Z7.l8nEZY15qx0YtOTFKOXdjWEnsyQdpYG',10,NULL,NULL,NULL,50,'2',NULL,NULL,NULL,NULL),(12,'test user12','12@gmail.com','$2y$10$uCEQUPzD.BTb9Nghu300AORYNxzSxABe9MW83.5cmqGt0KOWCL2Ba',10,NULL,NULL,NULL,60,'1',NULL,NULL,NULL,NULL),(13,'test user13','13@gmail.com','$2y$10$lC8NHzpxI7qR6PSKrQAiM.IuM.DXTCG.5DiclS1bS82BQhemg5FhO',10,NULL,NULL,NULL,70,'2',NULL,NULL,NULL,NULL),(14,'test user14','14@gmail.com','$2y$10$1J/bZRLSerd1y2Iveg3yQOVgvGLp6p3OX0Y84TRZNwI0vdYMmHWiq',10,NULL,NULL,NULL,10,'1',NULL,NULL,NULL,NULL),(15,'test user15','15@gmail.com','$2y$10$EvfluhAweLiLtWP/gwJpFuYqRXm9XupLXOABsu1U.B0Iqscn41TyG',10,NULL,NULL,NULL,20,'2',NULL,NULL,NULL,NULL),(16,'test user16','16@gmail.com','$2y$10$UC.K6BMYZE8zowLv6kr4mu758DSwoSExzEJLY0ZOD45bAQygKxb2e',10,NULL,NULL,NULL,30,'1',NULL,NULL,NULL,NULL),(17,'test user17','17@gmail.com','$2y$10$6USfKOf9nWrRcqVpqrQE5.hwimGy.8ntkJvj0GeClle2AcrJfiNV6',10,NULL,NULL,NULL,40,'2',NULL,NULL,NULL,NULL),(18,'test user18','18@gmail.com','$2y$10$7D3gY/F8E7aw9egAvO.Cl.ZeyuOJTr3p/nK67eJO9CsDXq.U8OynC',10,NULL,NULL,NULL,50,'1',NULL,NULL,NULL,NULL),(19,'test user19','19@gmail.com','$2y$10$yvO.qQ/qR7BWkq3v74RY4ODIIyRuGNfEOk5Vxl0PRpDfj.LLDy2He',10,NULL,NULL,NULL,60,'2',NULL,NULL,NULL,NULL),(20,'test user20','20@gmail.com','$2y$10$mIm.4b8yiZLMn5A8Us42deRSCW9LG1U8HTIAIgPbpvV9u94LDUAiy',10,NULL,NULL,NULL,70,'1',NULL,NULL,NULL,NULL),(21,'test user21','21@gmail.com','$2y$10$SuhycAPoY9LqFz1hAk1Uouuu.eB59WNplIwyFH7X9trsrUz0p8/Y2',10,NULL,NULL,NULL,10,'2',NULL,NULL,NULL,NULL),(22,'test user22','22@gmail.com','$2y$10$d/PsHloWH6MxjH/y0SoN3uSbJ8GGHUbq.jOtE3yAinzb1ArWmt2dO',10,NULL,NULL,NULL,20,'1',NULL,NULL,NULL,NULL),(23,'test user23','23@gmail.com','$2y$10$vIM0MAzVJ0KRN92gTqx7SeHgYsQs2l3cLK1czqQOwobZWFExeY2yK',10,NULL,NULL,NULL,30,'2',NULL,NULL,NULL,NULL),(24,'test user24','24@gmail.com','$2y$10$lM/orRYeM2Z32R3rM1sjo.t9yovV.8RrNCsk8yssqwWqOQYR0ijjq',10,NULL,NULL,NULL,40,'1',NULL,NULL,NULL,NULL),(25,'test user25','25@gmail.com','$2y$10$e0lV..Anu7DWXzqbvfvObOw/.8gOC.9PyVq4MCdDWTSANchX/zrQu',10,NULL,NULL,NULL,50,'2',NULL,NULL,NULL,NULL),(26,'test user26','26@gmail.com','$2y$10$FvezJtXsZ5AOgp/isrbuue.9WaSpiCIS6u.We5zILDeZlQ/tETaVa',10,NULL,NULL,NULL,60,'1',NULL,NULL,NULL,NULL),(27,'test user27','27@gmail.com','$2y$10$HGYlMWHTBG0lLPaFDOcRyORlusKSaMXD1ENZf3BBreUlPvqeMwgze',10,NULL,NULL,NULL,70,'2',NULL,NULL,NULL,NULL),(28,'test user28','28@gmail.com','$2y$10$AXM8bAd4Oxe3CCWBKy6kx.XGML4j3oIV3a8PpzCKXGBMZ.53b8TK6',10,NULL,NULL,NULL,10,'1',NULL,NULL,NULL,NULL),(29,'test user29','29@gmail.com','$2y$10$y1KOLEv7DNa8I5D08n0zD.cz/.0XFmhQVZJyKwNKiypBttO.jYnXq',10,NULL,NULL,NULL,20,'2',NULL,NULL,NULL,NULL),(30,'test user30','30@gmail.com','$2y$10$PFXE/Gw8RBz/mAtPL6FlU.d1I1Nqo0qp9cAILY/c5RTlZTb2W1nSa',10,NULL,NULL,NULL,30,'1',NULL,NULL,NULL,NULL),(31,'admin','admin@gmail.com','$2y$10$3Nu88keynsVm9/HUpDklvOO2S9kHq42hAMNbbHNyGX1tHJXUEIxjW',5,NULL,NULL,NULL,10,'1',NULL,NULL,NULL,NULL),(32,'l','l@gmail.com','$2y$10$3MP8bW0f.Pi1QW4cOtXPx.oczl6x8ScBbN4LFUONZh.E90aaUKWRW',10,NULL,'2019-06-17 15:47:54','2019-06-17 15:47:54',20,'2',NULL,1970,NULL,NULL),(33,'m','m@gmail.com','$2y$10$vEZZdGijgxOQZptfsdCnWOTZRm0m/57G2V8.a1UqmufMOyyF6n.de',10,'aeUWW6SVnq5Pc3jXQcEn5ndRiZ1aOObacdqqictSKiW1vKBEdrwFNZbBGwyM','2019-06-18 10:10:43','2019-06-18 10:15:58',30,'1','https://original-yoursongs.s3.ap-northeast-1.amazonaws.com/w9msY5rFWxCJzTseOfLKlGSx7hRgcfTCWvOxDdFc.png',NULL,NULL,NULL);
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

-- Dump completed on 2019-06-18  3:04:16
