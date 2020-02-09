# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.35-MariaDB)
# Database: skripsi_nanda
# Generation Time: 2019-02-14 10:51:32 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table alternatifs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `alternatifs`;

CREATE TABLE `alternatifs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `alternatif` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `alternatifs` WRITE;
/*!40000 ALTER TABLE `alternatifs` DISABLE KEYS */;

INSERT INTO `alternatifs` (`id`, `alternatif`, `keterangan`, `deleted_at`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_by`)
VALUES
	(1,'Warga 1','A1',NULL,'2019-02-14 10:40:30','2019-02-14 10:40:30',1,NULL,NULL),
	(2,'Warga 2','A2',NULL,'2019-02-14 10:40:30','2019-02-14 10:40:30',1,NULL,NULL),
	(3,'Warga 3','A3',NULL,'2019-02-14 10:40:30','2019-02-14 10:40:30',1,NULL,NULL),
	(4,'Warga 4','A4',NULL,'2019-02-14 10:40:30','2019-02-14 10:40:30',1,NULL,NULL),
	(5,'Warga 5','A5',NULL,'2019-02-14 10:40:30','2019-02-14 10:40:30',1,NULL,NULL),
	(6,'Warga 6','A6',NULL,'2019-02-14 10:40:30','2019-02-14 10:40:30',1,NULL,NULL),
	(7,'Warga 7','A7',NULL,'2019-02-14 10:40:30','2019-02-14 10:40:30',1,NULL,NULL),
	(8,'Warga 8','A8',NULL,'2019-02-14 10:40:30','2019-02-14 10:40:30',1,NULL,NULL),
	(9,'Warga 9','A9',NULL,'2019-02-14 10:40:30','2019-02-14 10:40:30',1,NULL,NULL),
	(10,'Warga 10','A10',NULL,'2019-02-14 10:40:30','2019-02-14 10:40:30',1,NULL,NULL);

/*!40000 ALTER TABLE `alternatifs` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table configs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `configs`;

CREATE TABLE `configs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `config_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `configs` WRITE;
/*!40000 ALTER TABLE `configs` DISABLE KEYS */;

INSERT INTO `configs` (`id`, `config_name`, `key`, `value`, `description`, `deleted_at`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_by`)
VALUES
	(1,'Application Name','app_name','Cokibase','Laravel CRUD + API Generator by Cokilabs',NULL,'2019-01-06 15:32:39','2019-01-06 16:14:03',NULL,NULL,NULL),
	(2,'Application Icon','app_icon','app/logo.png','Application Logo For Branding',NULL,'2019-01-06 16:14:33','2019-01-06 16:16:49',NULL,NULL,NULL),
	(3,'Application Description','app_desc','Long Description of the Application','Desc Here','2019-01-06 16:27:47','2019-01-06 16:24:19','2019-01-06 16:27:47',NULL,NULL,NULL),
	(4,'Application Description','app_desc','Description of the Application','Try Desc Application','2019-01-06 18:10:36','2019-01-06 18:09:04','2019-01-06 18:10:36',NULL,NULL,NULL),
	(5,'Application Description','app_desc','Description of the Application','Cek','2019-01-06 18:11:34','2019-01-06 18:11:30','2019-01-06 18:11:34',NULL,NULL,NULL),
	(6,'Application Description','app_desc','Description of the Application','Description',NULL,'2019-01-06 18:19:29','2019-01-06 23:28:41',NULL,NULL,NULL),
	(7,'Application Developer','app_developer','Cokilabs','Application Developer',NULL,'2019-01-07 01:53:15','2019-01-07 01:53:15',NULL,NULL,NULL),
	(8,'Application Color','app_color','#777','White Color Background','2019-01-07 02:59:41','2019-01-07 02:59:11','2019-01-07 02:59:41',1,1,1),
	(9,'Application Skin','app_skin','skin-default','Default',NULL,'2019-01-07 02:59:11',NULL,1,NULL,NULL);

/*!40000 ALTER TABLE `configs` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table evaluasis
# ------------------------------------------------------------

DROP TABLE IF EXISTS `evaluasis`;

CREATE TABLE `evaluasis` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `alternatif_id` int(10) NOT NULL,
  `kriteria_id` int(10) NOT NULL,
  `nilai` float DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `evaluasis` WRITE;
/*!40000 ALTER TABLE `evaluasis` DISABLE KEYS */;

INSERT INTO `evaluasis` (`id`, `alternatif_id`, `kriteria_id`, `nilai`, `deleted_at`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_by`)
VALUES
	(1,1,1,1,NULL,'2019-02-14 10:42:46','2019-02-14 10:42:46',1,NULL,NULL),
	(2,1,2,0,NULL,'2019-02-14 10:42:46','2019-02-14 10:42:46',1,NULL,NULL),
	(3,1,3,1,NULL,'2019-02-14 10:42:46','2019-02-14 10:42:46',1,NULL,NULL),
	(4,1,4,1,NULL,'2019-02-14 10:42:46','2019-02-14 10:42:46',1,NULL,NULL),
	(5,1,5,0,NULL,'2019-02-14 10:42:46','2019-02-14 10:42:46',1,NULL,NULL),
	(6,1,6,1,NULL,'2019-02-14 10:42:46','2019-02-14 10:42:46',1,NULL,NULL),
	(7,2,1,0,NULL,'2019-02-14 10:43:07','2019-02-14 10:43:07',1,NULL,NULL),
	(8,2,2,1,NULL,'2019-02-14 10:43:07','2019-02-14 10:43:07',1,NULL,NULL),
	(9,2,3,1,NULL,'2019-02-14 10:43:07','2019-02-14 10:43:07',1,NULL,NULL),
	(10,2,4,0,NULL,'2019-02-14 10:43:07','2019-02-14 10:43:07',1,NULL,NULL),
	(11,2,5,1,NULL,'2019-02-14 10:43:07','2019-02-14 10:43:07',1,NULL,NULL),
	(12,2,6,1,NULL,'2019-02-14 10:43:07','2019-02-14 10:43:07',1,NULL,NULL),
	(13,3,1,0,NULL,'2019-02-14 10:43:23','2019-02-14 10:43:23',1,NULL,NULL),
	(14,3,2,0,NULL,'2019-02-14 10:43:23','2019-02-14 10:43:23',1,NULL,NULL),
	(15,3,3,1,NULL,'2019-02-14 10:43:23','2019-02-14 10:43:23',1,NULL,NULL),
	(16,3,4,0,NULL,'2019-02-14 10:43:24','2019-02-14 10:43:24',1,NULL,NULL),
	(17,3,5,1,NULL,'2019-02-14 10:43:24','2019-02-14 10:43:24',1,NULL,NULL),
	(18,3,6,1,NULL,'2019-02-14 10:43:24','2019-02-14 10:43:24',1,NULL,NULL),
	(19,4,1,1,NULL,'2019-02-14 10:43:44','2019-02-14 10:43:44',1,NULL,NULL),
	(20,4,2,1,NULL,'2019-02-14 10:43:44','2019-02-14 10:43:44',1,NULL,NULL),
	(21,4,3,1,NULL,'2019-02-14 10:43:44','2019-02-14 10:43:44',1,NULL,NULL),
	(22,4,4,1,NULL,'2019-02-14 10:43:44','2019-02-14 10:43:44',1,NULL,NULL),
	(23,4,5,0,NULL,'2019-02-14 10:43:44','2019-02-14 10:43:44',1,NULL,NULL),
	(24,4,6,1,NULL,'2019-02-14 10:43:44','2019-02-14 10:43:44',1,NULL,NULL),
	(25,5,1,1,NULL,'2019-02-14 10:44:00','2019-02-14 10:44:00',1,NULL,NULL),
	(26,5,2,1,NULL,'2019-02-14 10:44:00','2019-02-14 10:44:00',1,NULL,NULL),
	(27,5,3,0,NULL,'2019-02-14 10:44:00','2019-02-14 10:44:00',1,NULL,NULL),
	(28,5,4,1,NULL,'2019-02-14 10:44:00','2019-02-14 10:44:00',1,NULL,NULL),
	(29,5,5,1,NULL,'2019-02-14 10:44:00','2019-02-14 10:44:00',1,NULL,NULL),
	(30,5,6,0,NULL,'2019-02-14 10:44:00','2019-02-14 10:44:00',1,NULL,NULL),
	(31,6,1,0,NULL,'2019-02-14 10:44:22','2019-02-14 10:44:22',1,NULL,NULL),
	(32,6,2,1,NULL,'2019-02-14 10:44:22','2019-02-14 10:44:22',1,NULL,NULL),
	(33,6,3,0,NULL,'2019-02-14 10:44:22','2019-02-14 10:44:22',1,NULL,NULL),
	(34,6,4,1,NULL,'2019-02-14 10:44:22','2019-02-14 10:44:22',1,NULL,NULL),
	(35,6,5,1,NULL,'2019-02-14 10:44:22','2019-02-14 10:44:22',1,NULL,NULL),
	(36,6,6,1,NULL,'2019-02-14 10:44:22','2019-02-14 10:44:22',1,NULL,NULL),
	(37,7,1,1,NULL,'2019-02-14 10:44:41','2019-02-14 10:44:41',1,NULL,NULL),
	(38,7,2,1,NULL,'2019-02-14 10:44:41','2019-02-14 10:44:41',1,NULL,NULL),
	(39,7,3,1,NULL,'2019-02-14 10:44:41','2019-02-14 10:44:41',1,NULL,NULL),
	(40,7,4,0,NULL,'2019-02-14 10:44:41','2019-02-14 10:44:41',1,NULL,NULL),
	(41,7,5,1,NULL,'2019-02-14 10:44:41','2019-02-14 10:44:41',1,NULL,NULL),
	(42,7,6,1,NULL,'2019-02-14 10:44:41','2019-02-14 10:44:41',1,NULL,NULL),
	(43,8,1,0,NULL,'2019-02-14 10:44:56','2019-02-14 10:44:56',1,NULL,NULL),
	(44,8,2,1,NULL,'2019-02-14 10:44:56','2019-02-14 10:44:56',1,NULL,NULL),
	(45,8,3,0,NULL,'2019-02-14 10:44:56','2019-02-14 10:44:56',1,NULL,NULL),
	(46,8,4,1,NULL,'2019-02-14 10:44:56','2019-02-14 10:44:56',1,NULL,NULL),
	(47,8,5,1,NULL,'2019-02-14 10:44:56','2019-02-14 10:44:56',1,NULL,NULL),
	(48,8,6,1,NULL,'2019-02-14 10:44:56','2019-02-14 10:44:56',1,NULL,NULL),
	(49,9,1,1,NULL,'2019-02-14 10:45:18','2019-02-14 10:45:18',1,NULL,NULL),
	(50,9,2,0,NULL,'2019-02-14 10:45:18','2019-02-14 10:45:18',1,NULL,NULL),
	(51,9,3,1,NULL,'2019-02-14 10:45:18','2019-02-14 10:45:18',1,NULL,NULL),
	(52,9,4,1,NULL,'2019-02-14 10:45:18','2019-02-14 10:45:18',1,NULL,NULL),
	(53,9,5,0,NULL,'2019-02-14 10:45:18','2019-02-14 10:45:18',1,NULL,NULL),
	(54,9,6,1,NULL,'2019-02-14 10:45:18','2019-02-14 10:45:18',1,NULL,NULL),
	(55,10,1,0,NULL,'2019-02-14 10:45:40','2019-02-14 10:45:40',1,NULL,NULL),
	(56,10,2,1,NULL,'2019-02-14 10:45:40','2019-02-14 10:45:40',1,NULL,NULL),
	(57,10,3,0,NULL,'2019-02-14 10:45:40','2019-02-14 10:45:40',1,NULL,NULL),
	(58,10,4,1,NULL,'2019-02-14 10:45:40','2019-02-14 10:45:40',1,NULL,NULL),
	(59,10,5,1,NULL,'2019-02-14 10:45:40','2019-02-14 10:45:40',1,NULL,NULL),
	(60,10,6,1,NULL,'2019-02-14 10:45:40','2019-02-14 10:45:40',1,NULL,NULL);

/*!40000 ALTER TABLE `evaluasis` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table group_menus
# ------------------------------------------------------------

DROP TABLE IF EXISTS `group_menus`;

CREATE TABLE `group_menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `group_menus` WRITE;
/*!40000 ALTER TABLE `group_menus` DISABLE KEYS */;

INSERT INTO `group_menus` (`id`, `group_name`, `icon`, `deleted_at`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_by`)
VALUES
	(1,'Application Configs','fa fa-gears',NULL,'2019-01-06 16:38:48','2019-01-06 16:38:48',NULL,NULL,NULL),
	(2,'User Menus','fa fa-desktop',NULL,'2019-01-06 16:41:22','2019-01-06 16:41:22',NULL,NULL,NULL);

/*!40000 ALTER TABLE `group_menus` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table kriterias
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kriterias`;

CREATE TABLE `kriterias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kriteria` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bobot` float DEFAULT NULL,
  `atribut` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `kriterias` WRITE;
/*!40000 ALTER TABLE `kriterias` DISABLE KEYS */;

INSERT INTO `kriterias` (`id`, `kriteria`, `bobot`, `atribut`, `deleted_at`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_by`)
VALUES
	(1,'Belum pernah mendapat bantuan',25,'benefit',NULL,'2019-02-14 10:38:42','2019-02-14 10:38:42',1,NULL,NULL),
	(2,'Pendapatan perbulan kurang dari 1 juta',25,'benefit',NULL,'2019-02-14 10:38:55','2019-02-14 10:38:55',1,NULL,NULL),
	(3,'Rumah tidak layak huni',20,'benefit',NULL,'2019-02-14 10:39:10','2019-02-14 10:39:10',1,NULL,NULL),
	(4,'Sanggup mengelola dengan dana swadaya',10,'benefit',NULL,'2019-02-14 10:39:37','2019-02-14 10:39:37',1,NULL,NULL),
	(5,'Sebagai warga asli Jogoloyo Demak',10,'benefit',NULL,'2019-02-14 10:39:52','2019-02-14 10:39:52',1,NULL,NULL),
	(6,'Sanggup menyelesaikan kekurangan dengan dana swadaya',10,'benefit',NULL,'2019-02-14 10:40:11','2019-02-14 10:40:11',1,NULL,NULL);

/*!40000 ALTER TABLE `kriterias` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table levels
# ------------------------------------------------------------

DROP TABLE IF EXISTS `levels`;

CREATE TABLE `levels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `level` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `levels` WRITE;
/*!40000 ALTER TABLE `levels` DISABLE KEYS */;

INSERT INTO `levels` (`id`, `level`, `icon`, `description`, `deleted_at`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_by`)
VALUES
	(1,'Root','fa fa-user-md','Root User Role',NULL,'2019-01-06 17:13:47','2019-01-06 17:13:47',NULL,NULL,NULL),
	(2,'Admin','fa fa-user-circle-o','Program Administrator',NULL,'2019-01-06 17:14:32','2019-01-06 17:14:32',NULL,NULL,NULL);

/*!40000 ALTER TABLE `levels` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table logs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `logs`;

CREATE TABLE `logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `table` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `row_id` int(11) DEFAULT NULL,
  `action` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;

INSERT INTO `logs` (`id`, `user_id`, `table`, `row_id`, `action`, `description`, `deleted_at`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_by`)
VALUES
	(1,1,'users',2,'store','User ID 1 menambah data users dengan ID 2',NULL,'2019-01-06 17:35:09','2019-01-06 17:35:09',NULL,NULL,NULL),
	(2,1,'configs',4,'store','User dengan ID = 1 menambah data Config dengan ID = 4 via Web',NULL,'2019-01-06 18:09:04','2019-01-06 18:09:04',NULL,NULL,NULL),
	(3,1,'configs',4,'store','User dengan ID = 1 mengubah data Config dengan ID = 4 via Web',NULL,'2019-01-06 18:10:16','2019-01-06 18:10:16',NULL,NULL,NULL),
	(4,1,'configs',5,'store','User dengan ID = 1 menambah data Config dengan ID = 5 via Web',NULL,'2019-01-06 18:11:30','2019-01-06 18:11:30',NULL,NULL,NULL),
	(5,1,'configs',5,'store','User dengan ID = 1 menghapus data Config dengan ID = 5 via Web',NULL,'2019-01-06 18:11:34','2019-01-06 18:11:34',NULL,NULL,NULL),
	(6,1,'configs',6,'store','User dengan ID = 1 menambah data Config dengan ID = 6 via Web',NULL,'2019-01-06 18:19:29','2019-01-06 18:19:29',NULL,NULL,NULL),
	(7,1,'configs',6,'store','User dengan ID = 1 mengubah data Config dengan ID = 6 via Web',NULL,'2019-01-06 23:28:41','2019-01-06 23:28:41',NULL,NULL,NULL),
	(8,1,'userlevels',1,'store','User dengan ID = 1 menambah data UserLevel dengan ID = 1 via Web',NULL,'2019-01-07 00:50:24','2019-01-07 00:50:24',NULL,NULL,NULL),
	(9,1,'userlevels',2,'store','User dengan ID = 1 menambah data UserLevel dengan ID = 2 via Web',NULL,'2019-01-07 01:03:00','2019-01-07 01:03:00',NULL,NULL,NULL),
	(10,1,'modules',1,'store','User dengan ID = 1 menambah data Module dengan ID = 1 via Web',NULL,'2019-01-07 01:12:37','2019-01-07 01:12:37',NULL,NULL,NULL),
	(11,1,'modules',1,'update','User dengan ID = 1 mengubah data Module dengan ID = 1 via Web',NULL,'2019-01-07 01:15:26','2019-01-07 01:15:26',NULL,NULL,NULL),
	(12,1,'modules',2,'store','User dengan ID = 1 menambah data Module dengan ID = 2 via Web',NULL,'2019-01-07 01:20:02','2019-01-07 01:20:02',NULL,NULL,NULL),
	(13,1,'modules',3,'store','User dengan ID = 1 menambah data Module dengan ID = 3 via Web',NULL,'2019-01-07 01:20:48','2019-01-07 01:20:48',NULL,NULL,NULL),
	(14,1,'configs',7,'store','User dengan ID = 1 menambah data Config dengan ID = 7 via Web',NULL,'2019-01-07 01:53:15','2019-01-07 01:53:15',NULL,NULL,NULL),
	(15,1,'privileges',1,'store','User dengan ID = 1 menambah data Privilege dengan ID = 1 via Web',NULL,'2019-01-07 02:03:42','2019-01-07 02:03:42',NULL,NULL,NULL),
	(16,1,'userlevels',3,'store','User dengan ID = 1 menambah data UserLevel dengan ID = 3 via Web',NULL,'2019-01-07 02:12:23','2019-01-07 02:12:23',NULL,NULL,NULL),
	(17,1,'modules',4,'store','User dengan ID = 1 menambah data Module dengan ID = 4 via Web',NULL,'2019-01-07 02:22:38','2019-01-07 02:22:38',NULL,NULL,NULL),
	(18,1,'modules',5,'store','User dengan ID = 1 menambah data Module dengan ID = 5 via Web',NULL,'2019-01-07 02:24:27','2019-01-07 02:24:27',NULL,NULL,NULL),
	(19,1,'modules',6,'store','User dengan ID = 1 menambah data Module dengan ID = 6 via Web',NULL,'2019-01-07 02:25:13','2019-01-07 02:25:13',NULL,NULL,NULL),
	(20,1,'modules',7,'store','User dengan ID = 1 menambah data Module dengan ID = 7 via Web',NULL,'2019-01-07 02:28:15','2019-01-07 02:28:15',NULL,NULL,NULL),
	(21,1,'modules',8,'store','User dengan ID = 1 menambah data Module dengan ID = 8 via Web',NULL,'2019-01-07 02:29:09','2019-01-07 02:29:09',NULL,NULL,NULL),
	(22,1,'modules',9,'store','User dengan ID = 1 menambah data Module dengan ID = 9 via Web',NULL,'2019-01-07 02:32:05','2019-01-07 02:32:05',NULL,NULL,NULL),
	(23,1,'privileges',2,'store','User dengan ID = 1 menambah data Privilege dengan ID = 2 via Web',NULL,'2019-01-07 02:33:40','2019-01-07 02:33:40',NULL,NULL,NULL),
	(24,1,'privileges',3,'store','User dengan ID = 1 menambah data Privilege dengan ID = 3 via Web',NULL,'2019-01-07 02:33:59','2019-01-07 02:33:59',NULL,NULL,NULL),
	(25,1,'privileges',4,'store','User dengan ID = 1 menambah data Privilege dengan ID = 4 via Web',NULL,'2019-01-07 02:34:17','2019-01-07 02:34:17',NULL,NULL,NULL),
	(26,1,'privileges',4,'update','User dengan ID = 1 mengubah data Privilege dengan ID = 4 via Web',NULL,'2019-01-07 02:34:31','2019-01-07 02:34:31',NULL,NULL,NULL),
	(27,1,'privileges',5,'store','User dengan ID = 1 menambah data Privilege dengan ID = 5 via Web',NULL,'2019-01-07 02:34:50','2019-01-07 02:34:50',NULL,NULL,NULL),
	(28,1,'privileges',6,'store','User dengan ID = 1 menambah data Privilege dengan ID = 6 via Web',NULL,'2019-01-07 02:35:12','2019-01-07 02:35:12',NULL,NULL,NULL),
	(29,1,'privileges',7,'store','User dengan ID = 1 menambah data Privilege dengan ID = 7 via Web',NULL,'2019-01-07 02:37:30','2019-01-07 02:37:30',NULL,NULL,NULL),
	(30,1,'privileges',8,'store','User dengan ID = 1 menambah data Privilege dengan ID = 8 via Web',NULL,'2019-01-07 02:37:54','2019-01-07 02:37:54',NULL,NULL,NULL),
	(31,1,'privileges',9,'store','User dengan ID = 1 menambah data Privilege dengan ID = 9 via Web',NULL,'2019-01-07 02:38:14','2019-01-07 02:38:14',NULL,NULL,NULL),
	(32,1,'privileges',10,'store','User dengan ID = 1 menambah data Privilege dengan ID = 10 via Web',NULL,'2019-01-07 02:38:33','2019-01-07 02:38:33',NULL,NULL,NULL),
	(33,1,'configs',8,'store','User dengan ID = 1 menambah data Config dengan ID = 8 via Web',NULL,'2019-01-07 02:59:11','2019-01-07 02:59:11',NULL,NULL,NULL),
	(34,1,'configs',8,'store','User dengan ID = 1 mengubah data Config dengan ID = 8 via Web',NULL,'2019-01-07 02:59:33','2019-01-07 02:59:33',NULL,NULL,NULL),
	(35,1,'configs',8,'store','User dengan ID = 1 menghapus data Config dengan ID = 8 via Web',NULL,'2019-01-07 02:59:41','2019-01-07 02:59:41',NULL,NULL,NULL),
	(36,1,'modules',10,'store','User dengan ID = 1 menambah data Module dengan ID = 10 via Web',NULL,'2019-01-07 04:32:39','2019-01-07 04:32:39',1,NULL,NULL),
	(37,1,'privileges',11,'store','User dengan ID = 1 menambah data Privilege dengan ID = 11 via Web',NULL,'2019-01-07 04:46:50','2019-01-07 04:46:50',1,NULL,NULL),
	(38,1,'privileges',12,'store','User dengan ID = 1 menambah data Privilege dengan ID = 12 via Web',NULL,'2019-01-07 04:47:01','2019-01-07 04:47:01',1,NULL,NULL),
	(39,1,'privileges',10,'update','User dengan ID = 1 mengubah data Privilege dengan ID = 10 via Web',NULL,'2019-01-07 08:54:43','2019-01-07 08:54:43',1,NULL,NULL),
	(40,1,'modules',11,'store','User dengan ID = 1 menambah data Module dengan ID = 11 via Web',NULL,'2019-02-07 05:08:16','2019-02-07 05:08:16',1,NULL,NULL),
	(41,1,'privileges',13,'store','User dengan ID = 1 menambah data Privilege dengan ID = 13 via Web',NULL,'2019-02-07 05:12:12','2019-02-07 05:12:12',1,NULL,NULL),
	(42,1,'modules',11,'update','User dengan ID = 1 mengubah data Module dengan ID = 11 via Web',NULL,'2019-02-07 05:18:32','2019-02-07 05:18:32',1,NULL,NULL),
	(43,1,'configs',1,'store','User dengan ID = 1 mengubah data Menu dengan ID = 1 via Web',NULL,'2019-02-10 09:22:36','2019-02-10 09:22:36',1,NULL,NULL),
	(44,1,'configs',11,'store','User dengan ID = 1 menambah data menu dengan ID = 11 via Web',NULL,'2019-02-13 23:22:58','2019-02-13 23:22:58',1,NULL,NULL),
	(45,1,'configs',12,'store','User dengan ID = 1 menambah data menu dengan ID = 12 via Web',NULL,'2019-02-13 23:23:26','2019-02-13 23:23:26',1,NULL,NULL),
	(46,1,'configs',13,'store','User dengan ID = 1 menambah data menu dengan ID = 13 via Web',NULL,'2019-02-13 23:24:13','2019-02-13 23:24:13',1,NULL,NULL),
	(47,1,'configs',14,'store','User dengan ID = 1 menambah data menu dengan ID = 14 via Web',NULL,'2019-02-13 23:24:50','2019-02-13 23:24:50',1,NULL,NULL),
	(48,1,'modules',11,'store','User dengan ID = 1 menambah data Module dengan ID = 11 via Web',NULL,'2019-02-13 23:25:40','2019-02-13 23:25:40',1,NULL,NULL),
	(49,1,'modules',12,'store','User dengan ID = 1 menambah data Module dengan ID = 12 via Web',NULL,'2019-02-13 23:26:00','2019-02-13 23:26:00',1,NULL,NULL),
	(50,1,'modules',13,'store','User dengan ID = 1 menambah data Module dengan ID = 13 via Web',NULL,'2019-02-13 23:26:21','2019-02-13 23:26:21',1,NULL,NULL),
	(51,1,'privileges',13,'store','User dengan ID = 1 menambah data Privilege dengan ID = 13 via Web',NULL,'2019-02-13 23:26:52','2019-02-13 23:26:52',1,NULL,NULL),
	(52,1,'kriterias',1,'store','User dengan ID = 1 menambah data Kriteria dengan ID = 1 via Web',NULL,'2019-02-13 23:37:48','2019-02-13 23:37:48',1,NULL,NULL),
	(53,1,'kriterias',2,'store','User dengan ID = 1 menambah data Kriteria dengan ID = 2 via Web',NULL,'2019-02-13 23:38:26','2019-02-13 23:38:26',1,NULL,NULL),
	(54,1,'kriterias',3,'store','User dengan ID = 1 menambah data Kriteria dengan ID = 3 via Web',NULL,'2019-02-13 23:38:43','2019-02-13 23:38:43',1,NULL,NULL),
	(55,1,'kriterias',4,'store','User dengan ID = 1 menambah data Kriteria dengan ID = 4 via Web',NULL,'2019-02-13 23:39:04','2019-02-13 23:39:04',1,NULL,NULL),
	(56,1,'kriterias',5,'store','User dengan ID = 1 menambah data Kriteria dengan ID = 5 via Web',NULL,'2019-02-13 23:39:25','2019-02-13 23:39:25',1,NULL,NULL),
	(57,1,'alternatifs',1,'store','User dengan ID = 1 menambah data Alternatif dengan ID = 1 via Web',NULL,'2019-02-13 23:40:31','2019-02-13 23:40:31',1,NULL,NULL),
	(58,1,'alternatifs',2,'store','User dengan ID = 1 menambah data Alternatif dengan ID = 2 via Web',NULL,'2019-02-13 23:40:43','2019-02-13 23:40:43',1,NULL,NULL),
	(59,1,'alternatifs',3,'store','User dengan ID = 1 menambah data Alternatif dengan ID = 3 via Web',NULL,'2019-02-13 23:40:56','2019-02-13 23:40:56',1,NULL,NULL),
	(60,1,'evaluasis',1,'store','User dengan ID = 1 menambah data Evaluasi untuk Alternatif dengan ID = 1 via Web',NULL,'2019-02-14 00:28:11','2019-02-14 00:28:11',1,NULL,NULL),
	(61,1,'evaluasis',2,'store','User dengan ID = 1 menambah data Evaluasi untuk Alternatif dengan ID = 2 via Web',NULL,'2019-02-14 03:01:40','2019-02-14 03:01:40',1,NULL,NULL),
	(62,1,'evaluasis',1,'update','User dengan ID = 1 mengubah data Evaluasi dengan ID Alternatif = 1 via Web',NULL,'2019-02-14 05:18:10','2019-02-14 05:18:10',1,NULL,NULL),
	(63,1,'evaluasis',1,'update','User dengan ID = 1 mengubah data Evaluasi dengan ID Alternatif = 1 via Web',NULL,'2019-02-14 05:18:34','2019-02-14 05:18:34',1,NULL,NULL),
	(64,1,'evaluasis',1,'update','User dengan ID = 1 mengubah data Evaluasi dengan ID Alternatif = 1 via Web',NULL,'2019-02-14 05:19:18','2019-02-14 05:19:18',1,NULL,NULL),
	(65,1,'evaluasis',1,'store','User dengan ID = 1 menghapus data Evaluasi dengan ID Alternatif = 1 via Web',NULL,'2019-02-14 05:21:19','2019-02-14 05:21:19',1,NULL,NULL),
	(66,1,'evaluasis',1,'store','User dengan ID = 1 menambah data Evaluasi untuk Alternatif dengan ID = 1 via Web',NULL,'2019-02-14 05:21:48','2019-02-14 05:21:48',1,NULL,NULL),
	(67,1,'evaluasis',3,'store','User dengan ID = 1 menambah data Evaluasi untuk Alternatif dengan ID = 3 via Web',NULL,'2019-02-14 05:22:25','2019-02-14 05:22:25',1,NULL,NULL),
	(68,1,'evaluasis',4,'store','User dengan ID = 1 menambah data Evaluasi untuk Alternatif dengan ID = 4 via Web',NULL,'2019-02-14 05:22:51','2019-02-14 05:22:51',1,NULL,NULL),
	(69,1,'evaluasis',5,'store','User dengan ID = 1 menambah data Evaluasi untuk Alternatif dengan ID = 5 via Web',NULL,'2019-02-14 05:26:52','2019-02-14 05:26:52',1,NULL,NULL),
	(70,1,'evaluasis',6,'store','User dengan ID = 1 menambah data Evaluasi untuk Alternatif dengan ID = 6 via Web',NULL,'2019-02-14 05:27:20','2019-02-14 05:27:20',1,NULL,NULL),
	(71,1,'evaluasis',7,'store','User dengan ID = 1 menambah data Evaluasi untuk Alternatif dengan ID = 7 via Web',NULL,'2019-02-14 05:27:48','2019-02-14 05:27:48',1,NULL,NULL),
	(72,1,'evaluasis',8,'store','User dengan ID = 1 menambah data Evaluasi untuk Alternatif dengan ID = 8 via Web',NULL,'2019-02-14 05:28:21','2019-02-14 05:28:21',1,NULL,NULL),
	(73,1,'evaluasis',9,'store','User dengan ID = 1 menambah data Evaluasi untuk Alternatif dengan ID = 9 via Web',NULL,'2019-02-14 05:28:46','2019-02-14 05:28:46',1,NULL,NULL),
	(74,1,'evaluasis',10,'store','User dengan ID = 1 menambah data Evaluasi untuk Alternatif dengan ID = 10 via Web',NULL,'2019-02-14 05:29:10','2019-02-14 05:29:10',1,NULL,NULL),
	(75,1,'kriterias',1,'store','User dengan ID = 1 menambah data Kriteria dengan ID = 1 via Web',NULL,'2019-02-14 10:38:42','2019-02-14 10:38:42',1,NULL,NULL),
	(76,1,'kriterias',2,'store','User dengan ID = 1 menambah data Kriteria dengan ID = 2 via Web',NULL,'2019-02-14 10:38:55','2019-02-14 10:38:55',1,NULL,NULL),
	(77,1,'kriterias',3,'store','User dengan ID = 1 menambah data Kriteria dengan ID = 3 via Web',NULL,'2019-02-14 10:39:10','2019-02-14 10:39:10',1,NULL,NULL),
	(78,1,'kriterias',4,'store','User dengan ID = 1 menambah data Kriteria dengan ID = 4 via Web',NULL,'2019-02-14 10:39:37','2019-02-14 10:39:37',1,NULL,NULL),
	(79,1,'kriterias',5,'store','User dengan ID = 1 menambah data Kriteria dengan ID = 5 via Web',NULL,'2019-02-14 10:39:52','2019-02-14 10:39:52',1,NULL,NULL),
	(80,1,'kriterias',6,'store','User dengan ID = 1 menambah data Kriteria dengan ID = 6 via Web',NULL,'2019-02-14 10:40:11','2019-02-14 10:40:11',1,NULL,NULL),
	(81,1,'alternatifs',1,'store','User dengan ID = 1 menambah data Alternatif dengan ID = 1 via Web',NULL,'2019-02-14 10:40:30','2019-02-14 10:40:30',1,NULL,NULL),
	(82,1,'evaluasis',1,'store','User dengan ID = 1 menambah data Evaluasi untuk Alternatif dengan ID = 1 via Web',NULL,'2019-02-14 10:42:46','2019-02-14 10:42:46',1,NULL,NULL),
	(83,1,'evaluasis',2,'store','User dengan ID = 1 menambah data Evaluasi untuk Alternatif dengan ID = 2 via Web',NULL,'2019-02-14 10:43:07','2019-02-14 10:43:07',1,NULL,NULL),
	(84,1,'evaluasis',3,'store','User dengan ID = 1 menambah data Evaluasi untuk Alternatif dengan ID = 3 via Web',NULL,'2019-02-14 10:43:24','2019-02-14 10:43:24',1,NULL,NULL),
	(85,1,'evaluasis',4,'store','User dengan ID = 1 menambah data Evaluasi untuk Alternatif dengan ID = 4 via Web',NULL,'2019-02-14 10:43:44','2019-02-14 10:43:44',1,NULL,NULL),
	(86,1,'evaluasis',5,'store','User dengan ID = 1 menambah data Evaluasi untuk Alternatif dengan ID = 5 via Web',NULL,'2019-02-14 10:44:00','2019-02-14 10:44:00',1,NULL,NULL),
	(87,1,'evaluasis',6,'store','User dengan ID = 1 menambah data Evaluasi untuk Alternatif dengan ID = 6 via Web',NULL,'2019-02-14 10:44:22','2019-02-14 10:44:22',1,NULL,NULL),
	(88,1,'evaluasis',7,'store','User dengan ID = 1 menambah data Evaluasi untuk Alternatif dengan ID = 7 via Web',NULL,'2019-02-14 10:44:41','2019-02-14 10:44:41',1,NULL,NULL),
	(89,1,'evaluasis',8,'store','User dengan ID = 1 menambah data Evaluasi untuk Alternatif dengan ID = 8 via Web',NULL,'2019-02-14 10:44:56','2019-02-14 10:44:56',1,NULL,NULL),
	(90,1,'evaluasis',9,'store','User dengan ID = 1 menambah data Evaluasi untuk Alternatif dengan ID = 9 via Web',NULL,'2019-02-14 10:45:18','2019-02-14 10:45:18',1,NULL,NULL),
	(91,1,'evaluasis',10,'store','User dengan ID = 1 menambah data Evaluasi untuk Alternatif dengan ID = 10 via Web',NULL,'2019-02-14 10:45:40','2019-02-14 10:45:40',1,NULL,NULL);

/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table menus
# ------------------------------------------------------------

DROP TABLE IF EXISTS `menus`;

CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_menu_id` int(10) NOT NULL,
  `menu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;

INSERT INTO `menus` (`id`, `group_menu_id`, `menu`, `icon`, `priority`, `deleted_at`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_by`)
VALUES
	(1,1,'Configs','fa fa-gears',1,NULL,'2019-01-06 16:53:28','2019-02-10 09:22:36',NULL,1,NULL),
	(2,2,'Users','fa fa-users',1,NULL,'2019-01-06 17:01:07','2019-01-06 17:01:07',NULL,NULL,NULL),
	(3,1,'Level','fa fa-align-center',2,NULL,'2019-01-07 01:19:16','2019-01-07 01:19:16',NULL,NULL,NULL),
	(4,1,'User Level','fa fa-align-center',3,NULL,'2019-01-07 02:04:33','2019-01-07 02:04:33',NULL,NULL,NULL),
	(5,1,'Privilege','fa fa-user-times',7,NULL,'2019-01-07 02:14:23','2019-01-07 02:17:28',NULL,NULL,NULL),
	(6,1,'Module','fa fa-dashboard',6,NULL,'2019-01-07 02:15:42','2019-01-07 02:16:19',NULL,NULL,NULL),
	(7,1,'Menu','fa fa-dashboard',5,NULL,'2019-01-07 02:16:14','2019-01-07 02:16:14',NULL,NULL,NULL),
	(8,1,'Group Menu','fa fa-window-restore',4,NULL,'2019-01-07 02:16:57','2019-01-07 02:17:06',NULL,NULL,NULL),
	(9,1,'Log','fa fa-warning',8,NULL,'2019-01-07 02:19:00','2019-01-07 02:19:00',NULL,NULL,NULL),
	(10,2,'Home','fa fa-dashboard',0,NULL,'2019-01-07 04:30:46','2019-01-07 04:30:46',1,NULL,NULL),
	(11,2,'Kriteria','fa fa-tags',4,NULL,'2019-02-13 23:22:58','2019-02-13 23:22:58',1,NULL,NULL),
	(12,2,'Alternatif','fa fa-user-circle-o',5,NULL,'2019-02-13 23:23:26','2019-02-13 23:23:26',1,NULL,NULL),
	(13,2,'Evaluasi','fa fa-balance-scale',6,NULL,'2019-02-13 23:24:13','2019-02-13 23:24:13',1,NULL,NULL),
	(14,2,'Perhitungan','fa fa-code',7,NULL,'2019-02-13 23:24:50','2019-02-13 23:24:50',1,NULL,NULL);

/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1),
	(3,'2019_01_04_100614_create_products_table',2),
	(4,'2019_01_04_105343_create_productas_table',2),
	(5,'2019_01_04_110728_create_productbs_table',2),
	(6,'2019_01_04_110856_create_productcs_table',2),
	(7,'2019_01_04_111005_create_productds_table',2),
	(8,'2019_01_04_111408_create_productes_table',2),
	(9,'2019_01_04_111506_create_productfs_table',2),
	(10,'2019_01_04_113809_create_producths_table',2),
	(11,'2019_01_04_113935_create_productis_table',2),
	(12,'2019_01_04_114646_create_productjs_table',2),
	(13,'2019_01_04_135326_create_logs_table',2),
	(14,'2019_01_06_120449_create_contohs_table',3),
	(15,'2019_01_06_120716_create_configs_table',4),
	(16,'2019_01_06_121011_create_configs_table',5),
	(17,'2019_01_06_121634_create_group_menus_table',6),
	(18,'2019_01_06_122245_create_logs_table',7),
	(19,'2019_01_06_122427_create_group_menus_table',8),
	(20,'2019_01_06_123046_create_group_menus_table',9),
	(21,'2019_01_06_123242_create_groupmenus_table',10),
	(22,'2019_01_06_123333_create_groupmenus_table',11),
	(23,'2019_01_06_130512_create_userlevels_table',12),
	(24,'2019_01_06_145502_create_userlevels_table',13),
	(25,'2019_01_06_150711_create_user_levels_table',14),
	(26,'2019_01_06_151613_create_user_levels_table',15),
	(27,'2019_01_06_152158_create_user_levels_table',16),
	(28,'2019_01_06_152433_create_user_levels_table',17),
	(29,'2019_01_06_152709_create_configs_table',18),
	(30,'2019_01_06_163656_create_group_menus_table',19),
	(31,'2019_01_06_164202_create_menus_table',20),
	(32,'2019_01_06_170941_create_levels_table',21),
	(33,'2019_01_06_173403_create_logs_table',22),
	(34,'2019_01_07_003855_create_user_levels_table',23),
	(35,'2019_01_07_010430_create_modules_table',24),
	(36,'2019_01_07_012921_create_privileges_table',25),
	(37,'2019_01_07_013635_create_privileges_table',26),
	(38,'2019_02_07_050038_create_pesanans_table',27),
	(39,'2019_02_13_231737_create_kriterias_table',28),
	(40,'2019_02_13_231856_create_kriterias_table',29),
	(41,'2019_02_13_231908_create_alternatifs_table',30),
	(42,'2019_02_13_231918_create_evaluasis_table',31);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table modules
# ------------------------------------------------------------

DROP TABLE IF EXISTS `modules`;

CREATE TABLE `modules` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `route` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `modules` WRITE;
/*!40000 ALTER TABLE `modules` DISABLE KEYS */;

INSERT INTO `modules` (`id`, `menu_id`, `module`, `route`, `icon`, `priority`, `deleted_at`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_by`)
VALUES
	(1,'2','User','user','fa fa-users',1,NULL,'2019-01-07 01:12:37','2019-01-07 01:12:37',NULL,NULL,NULL),
	(2,'1','Config','config','fa fa-gear',1,NULL,'2019-01-07 01:20:02','2019-01-07 01:20:02',NULL,NULL,NULL),
	(3,'3','Level','level','fa fa-gear',1,NULL,'2019-01-07 01:20:48','2019-01-07 01:20:48',NULL,NULL,NULL),
	(4,'4','User Level','user-level','fa fa-align-center',1,NULL,'2019-01-07 02:22:38','2019-01-07 02:22:38',NULL,NULL,NULL),
	(5,'5','Privilege','privilege','fa fa-window-close',1,NULL,'2019-01-07 02:24:27','2019-01-07 02:24:27',NULL,NULL,NULL),
	(6,'6','Module','module','fa fa-window-restore',1,NULL,'2019-01-07 02:25:13','2019-01-07 02:25:13',NULL,NULL,NULL),
	(7,'7','Menu','menu','fa fa-dashboard',1,NULL,'2019-01-07 02:28:15','2019-01-07 02:28:15',NULL,NULL,NULL),
	(8,'8','Group Menu','group-menu','fa fa-window-restore',1,NULL,'2019-01-07 02:29:09','2019-01-07 02:29:09',NULL,NULL,NULL),
	(9,'9','Log','log','fa fa-warning',1,NULL,'2019-01-07 02:32:05','2019-01-07 02:32:05',NULL,NULL,NULL),
	(10,'10','Home','home','fa fa-dashboard',1,NULL,'2019-01-07 04:32:39','2019-01-07 04:32:39',1,NULL,NULL),
	(11,'11','Kriteria','kriteria','fa fa-tags',1,NULL,'2019-02-13 23:25:40','2019-02-13 23:25:40',1,NULL,NULL),
	(12,'12','Alternatif','alternatif','fa fa-user-circle-o',1,NULL,'2019-02-13 23:26:00','2019-02-13 23:26:00',1,NULL,NULL),
	(13,'13','Evaluasi','evaluasi','fa fa-balance-scale',1,NULL,'2019-02-13 23:26:21','2019-02-13 23:26:21',1,NULL,NULL);

/*!40000 ALTER TABLE `modules` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table privileges
# ------------------------------------------------------------

DROP TABLE IF EXISTS `privileges`;

CREATE TABLE `privileges` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `level_id` int(10) NOT NULL,
  `module_id` int(10) NOT NULL,
  `index` int(1) NOT NULL,
  `show` int(1) NOT NULL DEFAULT '0',
  `create` int(1) NOT NULL,
  `store` int(1) NOT NULL,
  `edit` int(1) NOT NULL,
  `update` int(1) NOT NULL,
  `destroy` int(1) NOT NULL,
  `custom` int(1) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `privileges` WRITE;
/*!40000 ALTER TABLE `privileges` DISABLE KEYS */;

INSERT INTO `privileges` (`id`, `level_id`, `module_id`, `index`, `show`, `create`, `store`, `edit`, `update`, `destroy`, `custom`, `deleted_at`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_by`)
VALUES
	(1,1,1,1,1,1,1,1,1,1,1,NULL,'2019-01-07 02:03:42','2019-01-07 02:03:42',NULL,NULL,NULL),
	(2,1,4,1,1,1,1,1,1,1,1,NULL,'2019-01-07 02:33:40','2019-01-07 02:33:40',NULL,NULL,NULL),
	(3,1,3,1,1,1,1,1,1,1,1,NULL,'2019-01-07 02:33:59','2019-01-07 02:33:59',NULL,NULL,NULL),
	(4,1,2,1,1,1,1,1,1,1,1,NULL,'2019-01-07 02:34:17','2019-01-07 02:34:31',NULL,NULL,NULL),
	(5,1,5,1,1,1,1,1,1,1,1,NULL,'2019-01-07 02:34:50','2019-01-07 02:34:50',NULL,NULL,NULL),
	(6,1,6,1,1,1,1,1,1,1,1,NULL,'2019-01-07 02:35:12','2019-01-07 02:35:12',NULL,NULL,NULL),
	(7,1,7,1,1,1,1,1,1,1,1,NULL,'2019-01-07 02:37:30','2019-01-07 02:37:30',NULL,NULL,NULL),
	(8,1,8,1,1,1,1,1,1,1,1,NULL,'2019-01-07 02:37:54','2019-01-07 02:37:54',NULL,NULL,NULL),
	(9,1,9,1,1,1,1,1,1,1,1,NULL,'2019-01-07 02:38:14','2019-01-07 02:38:14',NULL,NULL,NULL),
	(10,2,1,1,1,1,1,1,0,0,1,NULL,'2019-01-07 02:38:33','2019-01-07 08:54:43',NULL,1,NULL),
	(11,1,10,1,1,0,0,0,0,0,0,NULL,'2019-01-07 04:46:50','2019-01-07 04:46:50',1,NULL,NULL),
	(12,2,10,1,1,0,0,0,0,0,0,NULL,'2019-01-07 04:47:01','2019-01-07 04:47:01',1,NULL,NULL),
	(13,1,11,1,1,1,1,1,1,1,1,NULL,'2019-02-13 23:26:52','2019-02-13 23:26:52',1,NULL,NULL),
	(14,1,12,1,1,1,1,1,1,1,1,NULL,'2019-02-13 23:26:52','2019-02-13 23:26:52',1,NULL,NULL),
	(15,1,13,1,1,1,1,1,1,1,1,NULL,'2019-02-13 23:26:52','2019-02-13 23:26:52',1,NULL,NULL);

/*!40000 ALTER TABLE `privileges` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_levels
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_levels`;

CREATE TABLE `user_levels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `user_levels` WRITE;
/*!40000 ALTER TABLE `user_levels` DISABLE KEYS */;

INSERT INTO `user_levels` (`id`, `user_id`, `level_id`, `deleted_at`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_by`)
VALUES
	(1,'1','1',NULL,'2019-01-07 00:50:24','2019-01-07 00:50:24',NULL,NULL,NULL),
	(2,'1','2',NULL,'2019-01-07 01:03:00','2019-01-07 01:03:00',NULL,NULL,NULL),
	(3,'2','2',NULL,'2019-01-07 02:12:23','2019-01-07 02:12:23',NULL,NULL,NULL);

/*!40000 ALTER TABLE `user_levels` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`)
VALUES
	(1,'root','Root','root@mail.com',NULL,'$2y$10$z/ZFg.YbOmI44Y8jaBlbf.YjYNOxhtuC6I5QA4wCMB9pjdoaAiBiS','FfVBg99LKpXPe4pEaMpOjvDO9c7T58DWqxMthbviCser7Mt9kKoGi29wGNq0',NULL,'2018-07-04 11:44:27',NULL,NULL,NULL,NULL),
	(2,'admin','Admin','admin@mail.com',NULL,'$2y$10$GryG6aldEwSuMXNrDh3B0eiVb0RxxRen2PSCNVhe4PH0Hh03Mm8vm','Ni4y5AanllMea3F4OiqOCIE8r3Ch6mEg8MD5t5AcTFRQTrIcRRVJ13pEubdl','2019-01-06 17:21:34','2019-01-06 17:26:38',NULL,NULL,NULL,NULL),
	(3,'cabang','Admin Cabang','cabang@mail.com',NULL,'$2y$10$Bh0z3hsX1mpucAaXul8NGOwwxVMOP55iiUcmqwOwH/YbKVyH1tE36',NULL,'2019-01-07 08:56:28','2019-01-07 08:56:28',NULL,2,NULL,NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
