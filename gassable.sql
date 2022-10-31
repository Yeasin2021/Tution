-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table gassable.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping data for table gassable.migrations: ~5 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(7, '2022_07_22_075238_create_php_mail_hosts_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping data for table gassable.password_resets: ~2 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
	('yeasin@gmail.com', '$2y$10$p8KRByV8CN7yuKck4uCk7eGaL8Ev4ubF.p8iljVa5/1KJrQwkXh.O', '2022-06-15 17:46:29'),
	('yeasin18801@gmail.com', '$2y$10$QlCBh0lmZQXX8OKVwWMOUeGTffzaxjJH1cPKD/zPics9F4B99FJri', '2022-06-22 07:54:31');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping data for table gassable.personal_access_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping data for table gassable.php_mail_hosts: ~1 rows (approximately)
/*!40000 ALTER TABLE `php_mail_hosts` DISABLE KEYS */;
INSERT INTO `php_mail_hosts` (`id`, `host`, `user_name`, `password`, `encription`, `port`, `email_id_name`, `created_at`, `updated_at`) VALUES
	(1, 'smtp.gmail.com', 'phpdevel299@gmail.com', 'pkhikmgwpyaymsjc', 'tls', 587, 'PHP Developer', '2022-07-22 19:02:19', '2022-07-22 19:02:21');
/*!40000 ALTER TABLE `php_mail_hosts` ENABLE KEYS */;

-- Dumping data for table gassable.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(2, 'Yeasin_Hossain', 'phpdevel299@gmail.com', NULL, '$2y$10$A8Zgqh8zdmmqfMH2h2mpGuRHUP/FxicTh69LCOlVhxx69EVGhUWwy', 'snN6ZolWrkcVG5PM3fXgCZ25UGNPCFqpSg8iGbqKcqexkJrW7j7O5XyLcFLE', '2022-06-22 06:31:05', '2022-07-14 10:11:57');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
