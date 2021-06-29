-- MySQL dump 10.13  Distrib 8.0.23, for Linux (x86_64)
--
-- Host: localhost    Database: example_database
-- ------------------------------------------------------
-- Server version	8.0.23-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alumnos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_paterno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_materno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_grupo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_nacimiento` datetime DEFAULT NULL,
  `equipo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observacion` text COLLATE utf8mb4_unicode_ci,
  `correo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumnos`
--

LOCK TABLES `alumnos` WRITE;
/*!40000 ALTER TABLE `alumnos` DISABLE KEYS */;
INSERT INTO `alumnos` VALUES (2,'Prof. Jacklyn Thompson III','Kira Kerluke II','Fuga ab ad molestias cumque. Sed ipsa alias voluptates ex doloremque corrupti quo ullam. Ea molestiae harum incidunt voluptatum doloremque voluptatem est.','Magnam accusantium excepturi reiciendis saepe aut dolor. Ad rerum veritatis modi tenetur. Et tempora perferendis beatae non.','2021-03-21 01:26:24',NULL,'Nihil vero sequi non maxime ipsum sit delectus. Voluptatem quod enim consequatur adipisci. Reiciendis velit optio accusantium excepturi quod. Expedita aspernatur et vitae.','mavis44@example.org',NULL,'2021-03-21 07:26:24','2021-03-21 07:26:24'),(3,'Joaquin Wisoky','Levi Hamill','Aliquid omnis veniam cupiditate nihil. Doloribus perferendis autem aut quaerat deleniti. Quia dicta culpa odio et omnis.','Doloribus quibusdam dignissimos ut consectetur soluta totam. Maxime sunt cupiditate ut qui quia dicta consequatur. Vel deleniti totam et architecto porro.','2021-03-21 01:26:24',NULL,'Itaque sequi cum vero saepe sit odio. Sequi est facilis aliquam quos qui iure unde ut. Natus molestiae omnis minima autem. Quidem et quasi nulla voluptas et et.','liliane31@example.com',NULL,'2021-03-21 07:26:24','2021-03-21 07:26:24'),(4,'Nelda Dicki','Seamus Bogisich','Quisquam possimus laboriosam consequatur ab quia sapiente. Maiores praesentium est ducimus illo. Illum aspernatur voluptatem aut. Voluptas nulla natus et modi architecto magni.','Et eius eveniet et debitis corporis aperiam. Incidunt id eos ut quos. Distinctio voluptas rerum enim odio.','2021-03-21 01:26:24',NULL,'Aut et quo perferendis autem officia quae. Odit cumque occaecati sunt.','mlowe@example.net',NULL,'2021-03-21 07:26:24','2021-03-21 07:26:24'),(5,'Dr. Maxine Olson PhD','Shaniya Volkman','Modi aspernatur quia qui modi. Illo quia ratione est dolorem voluptatem. Ut aperiam voluptate vitae quae ex optio veritatis.','Qui numquam sit expedita natus exercitationem debitis. Autem ut et dolor et. Debitis aut dicta eligendi consequatur optio dolorem est voluptatem. Autem a quis qui laboriosam in quisquam eius.','2021-03-21 01:26:24',NULL,'Esse adipisci pariatur aut nobis mollitia. Eum a in incidunt aliquam. Facilis culpa dolorum aspernatur dignissimos. Suscipit corporis ullam delectus explicabo.','aylin75@example.org',NULL,'2021-03-21 07:26:24','2021-03-21 07:26:24'),(6,'Brennan O\'Conner','Nikita Kub','Quas impedit fuga esse velit. Omnis assumenda corporis quis impedit harum ut distinctio. Molestiae et autem doloremque harum voluptas assumenda maxime. Et est ut non voluptas eum quasi in pariatur.','Aut sit vel id ratione magni. Blanditiis voluptas magnam occaecati adipisci recusandae numquam perspiciatis. Sit repellendus sed qui. Reiciendis in voluptatum qui et dolor expedita.','2021-03-21 01:26:24',NULL,'Error sint voluptas animi quo. Veritatis corporis blanditiis accusantium eum ratione molestiae. Aut beatae sint modi.','roselyn.zieme@example.com',NULL,'2021-03-21 07:26:25','2021-03-21 07:26:25'),(7,'Kamren Stroman','Stephen Kunde V','Perspiciatis sequi dolores ut. Vel iste neque id id. Autem et quia et ea. Sint repellat libero mollitia et tenetur a commodi.','Ut ipsa ipsa debitis corporis molestiae sunt dolorem. Facilis error quis sed voluptate. Temporibus accusantium facilis deserunt et. Corporis omnis qui labore eos debitis dolor similique nam.','2021-03-21 01:26:24',NULL,'Adipisci qui ullam enim delectus sed ut. Ut enim velit velit blanditiis voluptates cupiditate qui. Laboriosam voluptas delectus exercitationem laudantium.','fmuller@example.net',NULL,'2021-03-21 07:26:25','2021-03-21 07:26:25'),(8,'Zena Prosacco','Eldora Hoeger','Omnis aperiam corporis modi delectus assumenda id. Molestiae impedit molestiae reprehenderit ullam. Aut excepturi iure iste in qui nesciunt ullam. Velit magni et ad quibusdam ea rem qui dicta.','Explicabo deleniti sunt incidunt quia. Repellat fugit et magni commodi eligendi. Deleniti nobis veniam et explicabo.','2021-03-21 01:26:24',NULL,'Et in dolor facilis debitis. Numquam ut blanditiis eius aut cumque. Laborum recusandae dignissimos ipsa.','rath.brayan@example.com',NULL,'2021-03-21 07:26:25','2021-03-21 07:26:25'),(9,'Toy Yost','Jack Leuschke DDS','Voluptatem ea cumque debitis ipsum laudantium. Est sunt incidunt pariatur praesentium unde. Laborum at facilis rerum.','Officia deleniti cumque non. Error aliquam et est voluptas dolor. Iusto qui aut mollitia culpa. Sapiente quis officia et id.','2021-03-21 01:26:24',NULL,'Consequatur error est rerum omnis in mollitia. Provident ut quia praesentium dolores et. Sapiente unde vel voluptas dolores nostrum impedit.','oliver.reinger@example.com',NULL,'2021-03-21 07:26:25','2021-03-21 07:26:25'),(10,'Jesus Schuppe','Prof. Lyda Torp II','Corporis autem commodi nihil et ad. Eligendi sunt in blanditiis beatae. Laudantium laborum quia molestiae tempora eos. Assumenda inventore fugiat qui omnis ut.','Modi nisi enim laudantium veritatis ut in sed. Quis omnis eligendi sit molestiae aperiam nobis et. Et est sit delectus et nesciunt. Et vitae provident dolores voluptatem atque nisi rerum.','2021-03-21 01:26:24',NULL,'Nihil blanditiis provident tempore deserunt odio sit facere. Aperiam pariatur eum corporis quod reprehenderit pariatur sed ad. Culpa eius culpa est illum. Voluptatem et non voluptas dolorem.','goodwin.adriel@example.com',NULL,'2021-03-21 07:26:25','2021-03-21 07:26:25'),(11,'alumnos.create','alumnos.create','alumnos.create',NULL,'2021-03-23 00:00:00','alumnos.create','alumnos.create','alumnos.create',NULL,'2021-03-24 04:34:02','2021-03-24 04:34:02'),(12,'alumnos.create','alumnos.create','alumnos.create',NULL,'2021-03-24 00:00:00','alumnos.create','alumnos.create','alumnos.create',NULL,'2021-03-24 09:47:24','2021-03-24 09:47:24'),(13,'111','alumnos.create¿','alumnos.create',NULL,'2021-03-25 00:00:00','alumnos.create','alumnos.create¿','alumnos.create',NULL,'2021-03-24 09:49:34','2021-03-24 10:58:50'),(14,'alumnos.create','alumnos.create¿','alumnos.create¿','111','2021-03-26 00:00:00','alumnos.create¿','alumnos.create¿','alumnos.create¿',NULL,'2021-03-24 11:09:26','2021-03-24 11:10:03');
/*!40000 ALTER TABLE `alumnos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manufacturas`
--

DROP TABLE IF EXISTS `manufacturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `manufacturas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modelo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_modelo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cantidad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bandera` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `talla` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manufacturas`
--

LOCK TABLES `manufacturas` WRITE;
/*!40000 ALTER TABLE `manufacturas` DISABLE KEYS */;
/*!40000 ALTER TABLE `manufacturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2014_10_12_200000_add_two_factor_columns_to_users_table',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2019_12_14_000001_create_personal_access_tokens_table',1),(6,'2020_05_21_100000_create_teams_table',1),(7,'2020_05_21_200000_create_team_user_table',1),(8,'2020_05_21_300000_create_team_invitations_table',1),(9,'2021_03_20_185356_create_sessions_table',1),(12,'2021_03_20_221009_create_alumnos_table',2),(35,'2021_03_28_062114_create_manufacturas_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('40UALXGB1eGkASM5SEG0vTGRWIKbcyIA9oewZsZE',1,'127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:87.0) Gecko/20100101 Firefox/87.0','YTo2OntzOjY6Il90b2tlbiI7czo0MDoiVVVDYk5YdEp5WDNJSlVpbWpTU3diMnVFZnNWQXRVWHhmdnZzVHJOQyI7czozOiJ1cmwiO2E6MDp7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRHQW9UL1p3RTdSU25RVHNUN2dQekl1OGxreW1nVU1HWFRnQy9Kamc1amh4QVNzRFR0QWMweSI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkR0FvVC9ad0U3UlNuUVRzVDdnUHpJdThsa3ltZ1VNR1hUZ0MvSmpnNWpoeEFTc0RUdEFjMHkiO30=',1617595141),('zv1kHh06SQK13HJHzkIOr2cq9m0uFieKK8cvcjLo',1,'127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:87.0) Gecko/20100101 Firefox/87.0','YTo3OntzOjY6Il90b2tlbiI7czo0MDoiNWJRY2tWczh4cVpnUmtob0RCSjY1SnpPcjVucDJ1VjhBSEU5UUFoViI7czozOiJ1cmwiO2E6MDp7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRHQW9UL1p3RTdSU25RVHNUN2dQekl1OGxreW1nVU1HWFRnQy9Kamc1amh4QVNzRFR0QWMweSI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkR0FvVC9ad0U3UlNuUVRzVDdnUHpJdThsa3ltZ1VNR1hUZ0MvSmpnNWpoeEFTc0RUdEFjMHkiO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM0OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvbWFudWZhY3R1cmFzIjt9fQ==',1617514280);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team_invitations`
--

DROP TABLE IF EXISTS `team_invitations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `team_invitations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `team_id` bigint unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`),
  CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_invitations`
--

LOCK TABLES `team_invitations` WRITE;
/*!40000 ALTER TABLE `team_invitations` DISABLE KEYS */;
/*!40000 ALTER TABLE `team_invitations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team_user`
--

DROP TABLE IF EXISTS `team_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `team_user` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `team_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_user`
--

LOCK TABLES `team_user` WRITE;
/*!40000 ALTER TABLE `team_user` DISABLE KEYS */;
INSERT INTO `team_user` VALUES (1,4,1,'editor','2021-03-24 11:28:30','2021-03-24 11:28:30'),(2,3,3,'editor','2021-03-26 09:28:28','2021-03-26 09:28:28');
/*!40000 ALTER TABLE `team_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teams` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teams_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` VALUES (1,1,'jonathan\'s Team',1,'2021-03-21 02:31:52','2021-03-21 02:31:52'),(2,1,'Dos',0,'2021-03-21 02:41:43','2021-03-21 02:41:43'),(3,2,'jhon\'s Team',1,'2021-03-24 11:26:34','2021-03-24 11:26:34'),(4,2,'Cliente',0,'2021-03-24 11:27:02','2021-03-24 11:27:02'),(5,3,'shyrlei\'s Team',1,'2021-03-26 09:27:59','2021-03-26 09:27:59');
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint unsigned DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'jonathan parra','jon.you@hotmail.com',NULL,'$2y$10$GAoT/ZwE7RSnQTsT7gPzIu8lkymgUMGXTgC/Jjg5jhxASsDTtAc0y',NULL,NULL,NULL,2,NULL,'2021-03-21 02:31:52','2021-03-26 09:57:55'),(2,'jhon','jhon.you@hotmail.com',NULL,'$2y$10$x4zdH/rQR6BxTvW/.XgVRO1uS6paI2mBTpAnQnobAFnFRl/K3A/wi',NULL,NULL,NULL,3,NULL,'2021-03-24 11:26:34','2021-03-24 12:11:04'),(3,'shyrlei','shyrlei.you@hotmail.com',NULL,'$2y$10$DbcKewwb6rHzz5OVflJZaOIN2MLXrfr7.F/LXZt1YB5TJ1Jsu4RJG',NULL,NULL,'3VA0DL2rXuRbvxZSlnvqGR3OtrMdl9OxZ5iO6MzavdnFGYMkNZGosacH1mr3',3,NULL,'2021-03-26 09:27:59','2021-03-28 05:03:42');
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

-- Dump completed on 2021-04-06 13:21:00
