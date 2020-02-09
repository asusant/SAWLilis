# ************************************************************
# Sequel Pro SQL dump
# Version 5446
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.4.6-MariaDB)
# Database: saw
# Generation Time: 2020-02-09 04:30:50 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table alternatifs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `alternatifs`;

CREATE TABLE `alternatifs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `section_id` int(10) NOT NULL,
  `nip` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alternatif` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `alternatifs` (`id`, `section_id`, `nip`, `alternatif`, `keterangan`, `deleted_at`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_by`)
VALUES
	(1,1,'123456789','Peg HR','Ket',NULL,'2020-02-09 01:10:29','2020-02-09 01:10:29',1,NULL,NULL),
	(2,2,'12356789','Peg IT','Ket',NULL,'2020-02-09 02:01:51','2020-02-09 02:01:51',1,NULL,NULL),
	(3,3,'23654','Peg FA','Ket',NULL,'2020-02-09 03:58:57','2020-02-09 03:58:57',1,NULL,NULL);

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
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
	(1,'Application Name','app_name','SAW','Laravel CRUD + API Generator by Cokilabs',NULL,'2019-01-06 15:32:39','2020-02-09 00:05:19',NULL,1,NULL),
	(2,'Application Icon','app_icon','assets/PNPM.jpg','Application Logo For Branding',NULL,'2019-01-06 16:14:33','2019-02-18 13:30:22',NULL,1,NULL),
	(3,'Application Description','app_desc','Long Description of the Application','Desc Here','2019-01-06 16:27:47','2019-01-06 16:24:19','2019-01-06 16:27:47',NULL,NULL,NULL),
	(4,'Application Description','app_desc','Description of the Application','Try Desc Application','2019-01-06 18:10:36','2019-01-06 18:09:04','2019-01-06 18:10:36',NULL,NULL,NULL),
	(5,'Application Description','app_desc','Description of the Application','Cek','2019-01-06 18:11:34','2019-01-06 18:11:30','2019-01-06 18:11:34',NULL,NULL,NULL),
	(6,'Application Description','app_desc','Description of the Application','Description',NULL,'2019-01-06 18:19:29','2019-01-06 23:28:41',NULL,NULL,NULL),
	(7,'Application Developer','app_developer','Lilis','Application Developer',NULL,'2019-01-07 01:53:15','2020-02-09 00:06:10',NULL,1,NULL),
	(8,'Application Color','app_color','#777','White Color Background','2019-01-07 02:59:41','2019-01-07 02:59:11','2019-01-07 02:59:41',1,1,1),
	(9,'Application Skin','app_skin','skin-default','Default',NULL,'2019-01-07 02:59:11','2020-02-09 02:46:58',1,1,NULL),
	(10,'Home Contents','home_contents','Sistem Pendukung Keputusan SAW untuk Pemilihan Penerima BLM Warga Kelurahan Jogoloyo Demak','isi Home',NULL,'2019-02-24 02:17:39','2019-02-24 02:22:26',1,1,NULL),
	(11,'Peneliti','peneliti','Lilis - Teknik Informatika 2015 | Universitas Islam Sultan Agung','Untuk nama peneliti di halaman Home',NULL,'2019-02-24 02:32:54','2020-02-09 00:06:46',1,1,NULL);

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
	(1,1,1,3,NULL,'2020-02-09 02:02:15','2020-02-09 02:02:15',1,NULL,NULL),
	(2,1,2,3,NULL,'2020-02-09 02:02:15','2020-02-09 02:02:15',1,NULL,NULL),
	(3,1,3,5,NULL,'2020-02-09 02:02:15','2020-02-09 02:02:15',1,NULL,NULL),
	(4,1,4,4,NULL,'2020-02-09 02:02:15','2020-02-09 02:02:15',1,NULL,NULL),
	(5,1,5,3,NULL,'2020-02-09 02:02:15','2020-02-09 02:02:15',1,NULL,NULL),
	(6,1,7,5,NULL,'2020-02-09 02:02:15','2020-02-09 02:02:15',1,NULL,NULL),
	(7,1,8,4,NULL,'2020-02-09 02:02:15','2020-02-09 02:02:15',1,NULL,NULL),
	(8,1,9,3,NULL,'2020-02-09 02:02:15','2020-02-09 02:02:15',1,NULL,NULL),
	(9,1,10,3,NULL,'2020-02-09 02:02:15','2020-02-09 02:02:15',1,NULL,NULL),
	(10,1,11,5,NULL,'2020-02-09 02:02:15','2020-02-09 02:02:15',1,NULL,NULL),
	(11,1,12,3,NULL,'2020-02-09 02:02:15','2020-02-09 02:02:15',1,NULL,NULL),
	(12,1,13,2,NULL,'2020-02-09 02:02:15','2020-02-09 02:02:15',1,NULL,NULL),
	(13,2,1,2,NULL,'2020-02-09 02:02:37','2020-02-09 02:02:37',1,NULL,NULL),
	(14,2,2,4,NULL,'2020-02-09 02:02:37','2020-02-09 02:02:37',1,NULL,NULL),
	(15,2,3,4,NULL,'2020-02-09 02:02:37','2020-02-09 02:02:37',1,NULL,NULL),
	(16,2,4,3,NULL,'2020-02-09 02:02:37','2020-02-09 02:02:37',1,NULL,NULL),
	(17,2,5,5,NULL,'2020-02-09 02:02:37','2020-02-09 02:02:37',1,NULL,NULL),
	(18,2,7,4,NULL,'2020-02-09 02:02:37','2020-02-09 02:02:37',1,NULL,NULL),
	(19,2,8,3,NULL,'2020-02-09 02:02:37','2020-02-09 02:02:37',1,NULL,NULL),
	(20,2,9,3,NULL,'2020-02-09 02:02:37','2020-02-09 02:02:37',1,NULL,NULL),
	(21,2,10,4,NULL,'2020-02-09 02:02:37','2020-02-09 02:02:37',1,NULL,NULL),
	(22,2,11,3,NULL,'2020-02-09 02:02:37','2020-02-09 02:02:37',1,NULL,NULL),
	(23,2,12,2,NULL,'2020-02-09 02:02:37','2020-02-09 02:02:37',1,NULL,NULL),
	(24,2,13,2,NULL,'2020-02-09 02:02:37','2020-02-09 02:02:37',1,NULL,NULL),
	(25,3,1,3,NULL,'2020-02-09 03:59:24','2020-02-09 04:16:58',1,1,NULL),
	(26,3,2,5,NULL,'2020-02-09 03:59:24','2020-02-09 04:16:58',1,1,NULL),
	(27,3,3,2,NULL,'2020-02-09 03:59:24','2020-02-09 04:16:58',1,1,NULL),
	(28,3,4,4,NULL,'2020-02-09 03:59:24','2020-02-09 04:16:58',1,1,NULL),
	(29,3,5,3,NULL,'2020-02-09 03:59:24','2020-02-09 04:16:58',1,1,NULL),
	(30,3,7,3,NULL,'2020-02-09 03:59:24','2020-02-09 04:16:58',1,1,NULL),
	(31,3,8,3,NULL,'2020-02-09 03:59:24','2020-02-09 04:16:58',1,1,NULL),
	(32,3,9,1,NULL,'2020-02-09 03:59:24','2020-02-09 04:16:58',1,1,NULL),
	(33,3,10,1,NULL,'2020-02-09 03:59:24','2020-02-09 04:16:58',1,1,NULL),
	(34,3,11,2,NULL,'2020-02-09 03:59:24','2020-02-09 04:16:58',1,1,NULL),
	(35,3,12,3,NULL,'2020-02-09 03:59:24','2020-02-09 04:16:58',1,1,NULL),
	(36,3,13,3,NULL,'2020-02-09 03:59:24','2020-02-09 04:16:58',1,1,NULL);

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
  `kode_kriteria` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `kriterias` (`id`, `kode_kriteria`, `kriteria`, `bobot`, `atribut`, `deleted_at`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_by`)
VALUES
	(1,'K1','Standar kualitas pada sistem baru',5,'benefit',NULL,'2019-02-14 10:38:42','2020-02-09 00:20:01',1,1,NULL),
	(2,'K2','Jangka waktu pengembalian',5,'cost',NULL,'2019-02-14 10:38:55','2020-02-09 00:21:42',1,1,NULL),
	(3,'K3','Peningkatan keamanan dari standar  yang ada',5,'benefit',NULL,'2019-02-14 10:39:10','2020-02-09 00:22:11',1,1,NULL),
	(4,'K4','Pendisiplinan operator',5,'benefit',NULL,'2019-02-14 10:39:37','2020-02-09 00:22:31',1,1,NULL),
	(5,'K5','Level kontribusi',5,'cost',NULL,'2019-02-14 10:39:52','2020-02-09 00:22:52',1,1,NULL),
	(7,'K6','Area kerja',5,'benefit',NULL,'2020-02-09 00:23:11','2020-02-09 00:23:11',1,NULL,NULL),
	(8,'K7','Peringatan kesalahan pada sistem  baru',10,'benefit',NULL,'2020-02-09 00:23:26','2020-02-09 00:23:26',1,NULL,NULL),
	(9,'K8','Penghematan biaya',10,'benefit',NULL,'2020-02-09 00:23:40','2020-02-09 00:23:40',1,NULL,NULL),
	(10,'K9','Standar keamanan pada sistem baru',10,'benefit',NULL,'2020-02-09 00:23:55','2020-02-09 00:23:55',1,NULL,NULL),
	(11,'K10','Mempermudah kerja operator',10,'benefit',NULL,'2020-02-09 00:24:12','2020-02-09 00:24:12',1,NULL,NULL),
	(12,'K11','Penghematan waktu',15,'benefit',NULL,'2020-02-09 00:24:25','2020-02-09 00:24:25',1,NULL,NULL),
	(13,'K12','Manpower saving',15,'benefit',NULL,'2020-02-09 00:24:38','2020-02-09 00:24:38',1,NULL,NULL);

/*!40000 ALTER TABLE `kriterias` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table levels
# ------------------------------------------------------------

DROP TABLE IF EXISTS `levels`;

CREATE TABLE `levels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `level` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
	(2,'Admin','fa fa-user-circle-o','Program Administrator',NULL,'2019-01-06 17:14:32','2019-01-06 17:14:32',NULL,NULL,NULL),
	(3,'Atasan','fa fa-user','Level untuk Atasan',NULL,'2019-03-10 10:04:54','2020-02-09 02:47:48',1,1,NULL);

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
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
	(91,1,'evaluasis',10,'store','User dengan ID = 1 menambah data Evaluasi untuk Alternatif dengan ID = 10 via Web',NULL,'2019-02-14 10:45:40','2019-02-14 10:45:40',1,NULL,NULL),
	(92,1,'alternatifs',11,'store','User dengan ID = 1 menambah data Alternatif dengan ID = 11 via Web',NULL,'2019-02-16 04:07:31','2019-02-16 04:07:31',1,NULL,NULL),
	(93,1,'alternatifs',11,'store','User dengan ID = 1 menghapus data Alternatif dengan ID = 11 via Web',NULL,'2019-02-16 04:07:57','2019-02-16 04:07:57',1,NULL,NULL),
	(94,1,'userlevels',4,'store','User dengan ID = 1 menambah data UserLevel dengan ID = 4 via Web',NULL,'2019-03-09 02:27:30','2019-03-09 02:27:30',1,NULL,NULL),
	(95,1,'privileges',10,'update','User dengan ID = 1 mengubah data Privilege dengan ID = 10 via Web',NULL,'2019-03-10 10:03:10','2019-03-10 10:03:10',1,NULL,NULL),
	(96,1,'privileges',16,'store','User dengan ID = 1 menambah data Privilege dengan ID = 16 via Web',NULL,'2019-03-10 10:03:36','2019-03-10 10:03:36',1,NULL,NULL),
	(97,1,'privileges',17,'store','User dengan ID = 1 menambah data Privilege dengan ID = 17 via Web',NULL,'2019-03-10 10:04:10','2019-03-10 10:04:10',1,NULL,NULL),
	(98,1,'privileges',18,'store','User dengan ID = 1 menambah data Privilege dengan ID = 18 via Web',NULL,'2019-03-10 10:04:33','2019-03-10 10:04:33',1,NULL,NULL),
	(99,1,'configs',3,'store','User dengan ID = 1 menambah data Config dengan ID = 3 via Web',NULL,'2019-03-10 10:04:54','2019-03-10 10:04:54',1,NULL,NULL),
	(100,1,'privileges',19,'update','User dengan ID = 1 mengubah data Privilege dengan ID = 19 via Web',NULL,'2019-03-10 10:06:26','2019-03-10 10:06:26',1,NULL,NULL),
	(101,1,'configs',9,'store','User dengan ID = 1 mengubah data Config dengan ID = 9 via Web',NULL,'2019-03-10 10:30:02','2019-03-10 10:30:02',1,NULL,NULL),
	(102,1,'configs',9,'store','User dengan ID = 1 mengubah data Config dengan ID = 9 via Web',NULL,'2019-03-10 10:30:11','2019-03-10 10:30:11',1,NULL,NULL),
	(103,1,'configs',9,'store','User dengan ID = 1 mengubah data Config dengan ID = 9 via Web',NULL,'2019-03-10 10:30:19','2019-03-10 10:30:19',1,NULL,NULL),
	(104,1,'configs',9,'store','User dengan ID = 1 mengubah data Config dengan ID = 9 via Web',NULL,'2019-03-10 10:31:11','2019-03-10 10:31:11',1,NULL,NULL),
	(105,1,'configs',9,'store','User dengan ID = 1 mengubah data Config dengan ID = 9 via Web',NULL,'2019-03-10 10:31:18','2019-03-10 10:31:18',1,NULL,NULL),
	(106,1,'kriterias',2,'update','User dengan ID = 1 mengubah data Kriteria dengan ID = 2 via Web',NULL,'2019-03-15 07:44:27','2019-03-15 07:44:27',1,NULL,NULL),
	(107,1,'alternatifs',12,'store','User dengan ID = 1 menambah data Alternatif dengan ID = 12 via Web',NULL,'2019-03-17 23:09:53','2019-03-17 23:09:53',1,NULL,NULL),
	(108,1,'alternatifs',13,'store','User dengan ID = 1 menambah data Alternatif dengan ID = 13 via Web',NULL,'2019-03-17 23:12:04','2019-03-17 23:12:04',1,NULL,NULL),
	(109,1,'alternatifs',14,'store','User dengan ID = 1 menambah data Alternatif dengan ID = 14 via Web',NULL,'2019-03-17 23:14:28','2019-03-17 23:14:28',1,NULL,NULL),
	(110,1,'alternatifs',15,'store','User dengan ID = 1 menambah data Alternatif dengan ID = 15 via Web',NULL,'2019-03-17 23:16:06','2019-03-17 23:16:06',1,NULL,NULL),
	(111,1,'alternatifs',1,'store','User dengan ID = 1 menghapus data Alternatif dengan ID = 1 via Web',NULL,'2019-03-17 23:16:28','2019-03-17 23:16:28',1,NULL,NULL),
	(112,1,'alternatifs',2,'store','User dengan ID = 1 menghapus data Alternatif dengan ID = 2 via Web',NULL,'2019-03-17 23:16:33','2019-03-17 23:16:33',1,NULL,NULL),
	(113,1,'alternatifs',3,'store','User dengan ID = 1 menghapus data Alternatif dengan ID = 3 via Web',NULL,'2019-03-17 23:16:38','2019-03-17 23:16:38',1,NULL,NULL),
	(114,1,'alternatifs',4,'store','User dengan ID = 1 menghapus data Alternatif dengan ID = 4 via Web',NULL,'2019-03-17 23:16:44','2019-03-17 23:16:44',1,NULL,NULL),
	(115,1,'alternatifs',5,'store','User dengan ID = 1 menghapus data Alternatif dengan ID = 5 via Web',NULL,'2019-03-17 23:16:50','2019-03-17 23:16:50',1,NULL,NULL),
	(116,1,'alternatifs',6,'store','User dengan ID = 1 menghapus data Alternatif dengan ID = 6 via Web',NULL,'2019-03-17 23:16:56','2019-03-17 23:16:56',1,NULL,NULL),
	(117,1,'alternatifs',7,'store','User dengan ID = 1 menghapus data Alternatif dengan ID = 7 via Web',NULL,'2019-03-17 23:17:02','2019-03-17 23:17:02',1,NULL,NULL),
	(118,1,'alternatifs',8,'store','User dengan ID = 1 menghapus data Alternatif dengan ID = 8 via Web',NULL,'2019-03-17 23:17:07','2019-03-17 23:17:07',1,NULL,NULL),
	(119,1,'alternatifs',9,'store','User dengan ID = 1 menghapus data Alternatif dengan ID = 9 via Web',NULL,'2019-03-17 23:17:12','2019-03-17 23:17:12',1,NULL,NULL),
	(120,1,'alternatifs',12,'update','User dengan ID = 1 mengubah data Alternatif dengan ID = 12 via Web',NULL,'2019-03-17 23:17:46','2019-03-17 23:17:46',1,NULL,NULL),
	(121,1,'alternatifs',13,'update','User dengan ID = 1 mengubah data Alternatif dengan ID = 13 via Web',NULL,'2019-03-17 23:18:13','2019-03-17 23:18:13',1,NULL,NULL),
	(122,1,'alternatifs',10,'store','User dengan ID = 1 menghapus data Alternatif dengan ID = 10 via Web',NULL,'2019-03-17 23:18:22','2019-03-17 23:18:22',1,NULL,NULL),
	(123,1,'alternatifs',16,'store','User dengan ID = 1 menambah data Alternatif dengan ID = 16 via Web',NULL,'2019-03-17 23:20:24','2019-03-17 23:20:24',1,NULL,NULL),
	(124,1,'alternatifs',17,'store','User dengan ID = 1 menambah data Alternatif dengan ID = 17 via Web',NULL,'2019-03-17 23:21:28','2019-03-17 23:21:28',1,NULL,NULL),
	(125,1,'alternatifs',18,'store','User dengan ID = 1 menambah data Alternatif dengan ID = 18 via Web',NULL,'2019-03-17 23:23:42','2019-03-17 23:23:42',1,NULL,NULL),
	(126,1,'alternatifs',19,'store','User dengan ID = 1 menambah data Alternatif dengan ID = 19 via Web',NULL,'2019-03-17 23:24:51','2019-03-17 23:24:51',1,NULL,NULL),
	(127,1,'alternatifs',20,'store','User dengan ID = 1 menambah data Alternatif dengan ID = 20 via Web',NULL,'2019-03-17 23:26:06','2019-03-17 23:26:06',1,NULL,NULL),
	(128,1,'alternatifs',21,'store','User dengan ID = 1 menambah data Alternatif dengan ID = 21 via Web',NULL,'2019-03-17 23:27:13','2019-03-17 23:27:13',1,NULL,NULL),
	(129,1,'evaluasis',12,'update','User dengan ID = 1 mengubah data Evaluasi dengan ID Alternatif = 12 via Web',NULL,'2019-03-17 23:29:47','2019-03-17 23:29:47',1,NULL,NULL),
	(130,1,'evaluasis',13,'update','User dengan ID = 1 mengubah data Evaluasi dengan ID Alternatif = 13 via Web',NULL,'2019-03-17 23:30:14','2019-03-17 23:30:14',1,NULL,NULL),
	(131,1,'evaluasis',14,'update','User dengan ID = 1 mengubah data Evaluasi dengan ID Alternatif = 14 via Web',NULL,'2019-03-17 23:30:30','2019-03-17 23:30:30',1,NULL,NULL),
	(132,1,'evaluasis',15,'update','User dengan ID = 1 mengubah data Evaluasi dengan ID Alternatif = 15 via Web',NULL,'2019-03-17 23:30:47','2019-03-17 23:30:47',1,NULL,NULL),
	(133,1,'evaluasis',16,'update','User dengan ID = 1 mengubah data Evaluasi dengan ID Alternatif = 16 via Web',NULL,'2019-03-17 23:31:10','2019-03-17 23:31:10',1,NULL,NULL),
	(134,1,'evaluasis',17,'update','User dengan ID = 1 mengubah data Evaluasi dengan ID Alternatif = 17 via Web',NULL,'2019-03-17 23:31:37','2019-03-17 23:31:37',1,NULL,NULL),
	(135,1,'evaluasis',18,'update','User dengan ID = 1 mengubah data Evaluasi dengan ID Alternatif = 18 via Web',NULL,'2019-03-17 23:32:00','2019-03-17 23:32:00',1,NULL,NULL),
	(136,1,'evaluasis',19,'update','User dengan ID = 1 mengubah data Evaluasi dengan ID Alternatif = 19 via Web',NULL,'2019-03-17 23:32:20','2019-03-17 23:32:20',1,NULL,NULL),
	(137,1,'evaluasis',20,'update','User dengan ID = 1 mengubah data Evaluasi dengan ID Alternatif = 20 via Web',NULL,'2019-03-17 23:32:42','2019-03-17 23:32:42',1,NULL,NULL),
	(138,1,'evaluasis',21,'update','User dengan ID = 1 mengubah data Evaluasi dengan ID Alternatif = 21 via Web',NULL,'2019-03-17 23:33:03','2019-03-17 23:33:03',1,NULL,NULL),
	(139,1,'kriterias',6,'store','User dengan ID = 1 menghapus data Kriteria dengan ID = 6 via Web',NULL,'2019-04-13 12:22:21','2019-04-13 12:22:21',1,NULL,NULL),
	(140,1,'kriterias',5,'update','User dengan ID = 1 mengubah data Kriteria dengan ID = 5 via Web',NULL,'2019-04-14 06:49:23','2019-04-14 06:49:23',1,NULL,NULL),
	(141,1,'configs',1,'store','User dengan ID = 1 mengubah data Config dengan ID = 1 via Web',NULL,'2020-02-09 00:05:19','2020-02-09 00:05:19',1,NULL,NULL),
	(142,1,'configs',7,'store','User dengan ID = 1 mengubah data Config dengan ID = 7 via Web',NULL,'2020-02-09 00:06:10','2020-02-09 00:06:10',1,NULL,NULL),
	(143,1,'configs',11,'store','User dengan ID = 1 mengubah data Config dengan ID = 11 via Web',NULL,'2020-02-09 00:06:46','2020-02-09 00:06:46',1,NULL,NULL),
	(144,1,'kriterias',1,'update','User dengan ID = 1 mengubah data Kriteria dengan ID = 1 via Web',NULL,'2020-02-09 00:15:51','2020-02-09 00:15:51',1,NULL,NULL),
	(145,1,'kriterias',1,'update','User dengan ID = 1 mengubah data Kriteria dengan ID = 1 via Web',NULL,'2020-02-09 00:17:46','2020-02-09 00:17:46',1,NULL,NULL),
	(146,1,'kriterias',1,'update','User dengan ID = 1 mengubah data Kriteria dengan ID = 1 via Web',NULL,'2020-02-09 00:20:01','2020-02-09 00:20:01',1,NULL,NULL),
	(147,1,'kriterias',2,'update','User dengan ID = 1 mengubah data Kriteria dengan ID = 2 via Web',NULL,'2020-02-09 00:21:42','2020-02-09 00:21:42',1,NULL,NULL),
	(148,1,'kriterias',3,'update','User dengan ID = 1 mengubah data Kriteria dengan ID = 3 via Web',NULL,'2020-02-09 00:22:11','2020-02-09 00:22:11',1,NULL,NULL),
	(149,1,'kriterias',4,'update','User dengan ID = 1 mengubah data Kriteria dengan ID = 4 via Web',NULL,'2020-02-09 00:22:31','2020-02-09 00:22:31',1,NULL,NULL),
	(150,1,'kriterias',5,'update','User dengan ID = 1 mengubah data Kriteria dengan ID = 5 via Web',NULL,'2020-02-09 00:22:52','2020-02-09 00:22:52',1,NULL,NULL),
	(151,1,'kriterias',7,'store','User dengan ID = 1 menambah data Kriteria dengan ID = 7 via Web',NULL,'2020-02-09 00:23:11','2020-02-09 00:23:11',1,NULL,NULL),
	(152,1,'kriterias',8,'store','User dengan ID = 1 menambah data Kriteria dengan ID = 8 via Web',NULL,'2020-02-09 00:23:26','2020-02-09 00:23:26',1,NULL,NULL),
	(153,1,'kriterias',9,'store','User dengan ID = 1 menambah data Kriteria dengan ID = 9 via Web',NULL,'2020-02-09 00:23:40','2020-02-09 00:23:40',1,NULL,NULL),
	(154,1,'kriterias',10,'store','User dengan ID = 1 menambah data Kriteria dengan ID = 10 via Web',NULL,'2020-02-09 00:23:55','2020-02-09 00:23:55',1,NULL,NULL),
	(155,1,'kriterias',11,'store','User dengan ID = 1 menambah data Kriteria dengan ID = 11 via Web',NULL,'2020-02-09 00:24:12','2020-02-09 00:24:12',1,NULL,NULL),
	(156,1,'kriterias',12,'store','User dengan ID = 1 menambah data Kriteria dengan ID = 12 via Web',NULL,'2020-02-09 00:24:25','2020-02-09 00:24:25',1,NULL,NULL),
	(157,1,'kriterias',13,'store','User dengan ID = 1 menambah data Kriteria dengan ID = 13 via Web',NULL,'2020-02-09 00:24:38','2020-02-09 00:24:38',1,NULL,NULL),
	(158,1,'configs',15,'store','User dengan ID = 1 menambah data menu dengan ID = 15 via Web',NULL,'2020-02-09 00:44:48','2020-02-09 00:44:48',1,NULL,NULL),
	(159,1,'modules',14,'store','User dengan ID = 1 menambah data Module dengan ID = 14 via Web',NULL,'2020-02-09 00:46:06','2020-02-09 00:46:06',1,NULL,NULL),
	(160,1,'privileges',22,'store','User dengan ID = 1 menambah data Privilege dengan ID = 22 via Web',NULL,'2020-02-09 00:46:38','2020-02-09 00:46:38',1,NULL,NULL),
	(161,1,'sections',1,'store','User dengan ID = 1 menambah data Section dengan ID = 1 via Web',NULL,'2020-02-09 00:47:27','2020-02-09 00:47:27',1,NULL,NULL),
	(162,1,'sections',2,'store','User dengan ID = 1 menambah data Section dengan ID = 2 via Web',NULL,'2020-02-09 00:47:38','2020-02-09 00:47:38',1,NULL,NULL),
	(163,1,'sections',3,'store','User dengan ID = 1 menambah data Section dengan ID = 3 via Web',NULL,'2020-02-09 00:47:55','2020-02-09 00:47:55',1,NULL,NULL),
	(164,1,'sections',4,'store','User dengan ID = 1 menambah data Section dengan ID = 4 via Web',NULL,'2020-02-09 00:48:10','2020-02-09 00:48:10',1,NULL,NULL),
	(165,1,'sections',5,'store','User dengan ID = 1 menambah data Section dengan ID = 5 via Web',NULL,'2020-02-09 00:48:20','2020-02-09 00:48:20',1,NULL,NULL),
	(166,1,'alternatifs',1,'store','User dengan ID = 1 menambah data Alternatif dengan ID = 1 via Web',NULL,'2020-02-09 01:10:29','2020-02-09 01:10:29',1,NULL,NULL),
	(167,1,'alternatifs',2,'store','User dengan ID = 1 menambah data Alternatif dengan ID = 2 via Web',NULL,'2020-02-09 02:01:52','2020-02-09 02:01:52',1,NULL,NULL),
	(168,1,'evaluasis',1,'store','User dengan ID = 1 menambah data Evaluasi untuk Alternatif dengan ID = 1 via Web',NULL,'2020-02-09 02:02:15','2020-02-09 02:02:15',1,NULL,NULL),
	(169,1,'evaluasis',2,'store','User dengan ID = 1 menambah data Evaluasi untuk Alternatif dengan ID = 2 via Web',NULL,'2020-02-09 02:02:37','2020-02-09 02:02:37',1,NULL,NULL),
	(170,1,'configs',9,'store','User dengan ID = 1 mengubah data Config dengan ID = 9 via Web',NULL,'2020-02-09 02:46:46','2020-02-09 02:46:46',1,NULL,NULL),
	(171,1,'configs',9,'store','User dengan ID = 1 mengubah data Config dengan ID = 9 via Web',NULL,'2020-02-09 02:46:58','2020-02-09 02:46:58',1,NULL,NULL),
	(172,1,'configs',3,'store','User dengan ID = 1 menambah data Config dengan ID = 3 via Web',NULL,'2020-02-09 02:47:48','2020-02-09 02:47:48',1,NULL,NULL),
	(173,1,'userlevels',4,'store','User dengan ID = 1 menghapus data UserLevel dengan ID = 4 via Web',NULL,'2020-02-09 02:50:29','2020-02-09 02:50:29',1,NULL,NULL),
	(174,1,'userlevels',5,'update','User dengan ID = 1 mengubah data UserLevel dengan ID = 5 via Web',NULL,'2020-02-09 02:50:55','2020-02-09 02:50:55',1,NULL,NULL),
	(175,1,'userlevels',6,'store','User dengan ID = 1 menambah data UserLevel dengan ID = 6 via Web',NULL,'2020-02-09 02:52:56','2020-02-09 02:52:56',1,NULL,NULL),
	(176,1,'nilaikriterias',1,'store','User dengan ID = 1 menambah data NilaiKriteria dengan ID = 1 via Web',NULL,'2020-02-09 03:31:55','2020-02-09 03:31:55',1,NULL,NULL),
	(177,1,'nilaikriterias',2,'store','User dengan ID = 1 menambah data NilaiKriteria dengan ID = 2 via Web',NULL,'2020-02-09 03:33:24','2020-02-09 03:33:24',1,NULL,NULL),
	(178,1,'nilaikriterias',2,'update','User dengan ID = 1 mengubah data NilaiKriteria dengan ID = 2 via Web',NULL,'2020-02-09 03:40:42','2020-02-09 03:40:42',1,NULL,NULL),
	(179,1,'nilaikriterias',3,'store','User dengan ID = 1 menambah data NilaiKriteria dengan ID = 3 via Web',NULL,'2020-02-09 03:41:01','2020-02-09 03:41:01',1,NULL,NULL),
	(180,1,'nilaikriterias',4,'store','User dengan ID = 1 menambah data NilaiKriteria dengan ID = 4 via Web',NULL,'2020-02-09 03:41:15','2020-02-09 03:41:15',1,NULL,NULL),
	(181,1,'nilaikriterias',5,'store','User dengan ID = 1 menambah data NilaiKriteria dengan ID = 5 via Web',NULL,'2020-02-09 03:41:48','2020-02-09 03:41:48',1,NULL,NULL),
	(182,1,'nilaikriterias',56,'update','User dengan ID = 1 mengubah data NilaiKriteria dengan ID = 56 via Web',NULL,'2020-02-09 03:58:23','2020-02-09 03:58:23',1,NULL,NULL),
	(183,1,'alternatifs',3,'store','User dengan ID = 1 menambah data Alternatif dengan ID = 3 via Web',NULL,'2020-02-09 03:58:57','2020-02-09 03:58:57',1,NULL,NULL),
	(184,1,'evaluasis',3,'store','User dengan ID = 1 menambah data Evaluasi untuk Alternatif dengan ID = 3 via Web',NULL,'2020-02-09 03:59:24','2020-02-09 03:59:24',1,NULL,NULL),
	(185,1,'evaluasis',3,'update','User dengan ID = 1 mengubah data Evaluasi dengan ID Alternatif = 3 via Web',NULL,'2020-02-09 04:16:59','2020-02-09 04:16:59',1,NULL,NULL),
	(186,1,'privileges',19,'update','User dengan ID = 1 mengubah data Privilege dengan ID = 19 via Web',NULL,'2020-02-09 04:21:11','2020-02-09 04:21:11',1,NULL,NULL),
	(187,1,'privileges',20,'update','User dengan ID = 1 mengubah data Privilege dengan ID = 20 via Web',NULL,'2020-02-09 04:21:21','2020-02-09 04:21:21',1,NULL,NULL);

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
	(14,2,'Perhitungan','fa fa-code',7,NULL,'2019-02-13 23:24:50','2019-02-13 23:24:50',1,NULL,NULL),
	(15,2,'Section','fa fa-flag',3,NULL,'2020-02-09 00:44:48','2020-02-09 00:44:48',1,NULL,NULL);

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
	(42,'2019_02_13_231918_create_evaluasis_table',31),
	(43,'2020_02_09_002826_create_section_table',32),
	(44,'2020_02_09_025805_create_nilai_kriterias_table',33);

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
	(13,'13','Evaluasi','evaluasi','fa fa-balance-scale',1,NULL,'2019-02-13 23:26:21','2019-02-13 23:26:21',1,NULL,NULL),
	(14,'15','Section','section','fa fa-flag',1,NULL,'2020-02-09 00:46:06','2020-02-09 00:46:06',1,NULL,NULL);

/*!40000 ALTER TABLE `modules` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table nilai_kriterias
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nilai_kriterias`;

CREATE TABLE `nilai_kriterias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kriteria_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `nilai_kriterias` WRITE;
/*!40000 ALTER TABLE `nilai_kriterias` DISABLE KEYS */;

INSERT INTO `nilai_kriterias` (`id`, `kriteria_id`, `deskripsi`, `nilai`, `deleted_at`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_by`)
VALUES
	(1,'1','Tidak ada Peningkatan',1,NULL,'2020-02-09 03:31:55','2020-02-09 03:31:55',1,NULL,NULL),
	(2,'1','Perlu Ditingkatkan',2,NULL,'2020-02-09 03:33:24','2020-02-09 03:40:42',1,1,NULL),
	(3,'1','Memenuhi Standar',3,NULL,'2020-02-09 03:41:01','2020-02-09 03:41:01',1,NULL,NULL),
	(4,'1','Baik',4,NULL,'2020-02-09 03:41:15','2020-02-09 03:41:15',1,NULL,NULL),
	(5,'1','Sangat Baik',5,NULL,'2020-02-09 03:41:48','2020-02-09 03:41:48',1,NULL,NULL),
	(6,'2','Tidak ada Peningkatan',1,NULL,'2020-02-09 03:31:55','2020-02-09 03:31:55',1,NULL,NULL),
	(7,'2','Perlu Ditingkatkan',2,NULL,'2020-02-09 03:33:24','2020-02-09 03:40:42',1,1,NULL),
	(8,'2','Memenuhi Standar',3,NULL,'2020-02-09 03:41:01','2020-02-09 03:41:01',1,NULL,NULL),
	(9,'2','Baik',4,NULL,'2020-02-09 03:41:15','2020-02-09 03:41:15',1,NULL,NULL),
	(10,'2','Sangat Baik',5,NULL,'2020-02-09 03:41:48','2020-02-09 03:41:48',1,NULL,NULL),
	(11,'3','Tidak ada Peningkatan',1,NULL,'2020-02-09 03:31:55','2020-02-09 03:31:55',1,NULL,NULL),
	(12,'3','Perlu Ditingkatkan',2,NULL,'2020-02-09 03:33:24','2020-02-09 03:40:42',1,1,NULL),
	(13,'3','Memenuhi Standar',3,NULL,'2020-02-09 03:41:01','2020-02-09 03:41:01',1,NULL,NULL),
	(14,'3','Baik',4,NULL,'2020-02-09 03:41:15','2020-02-09 03:41:15',1,NULL,NULL),
	(15,'3','Sangat Baik',5,NULL,'2020-02-09 03:41:48','2020-02-09 03:41:48',1,NULL,NULL),
	(16,'4','Tidak ada Peningkatan',1,NULL,'2020-02-09 03:31:55','2020-02-09 03:31:55',1,NULL,NULL),
	(17,'4','Perlu Ditingkatkan',2,NULL,'2020-02-09 03:33:24','2020-02-09 03:40:42',1,1,NULL),
	(18,'4','Memenuhi Standar',3,NULL,'2020-02-09 03:41:01','2020-02-09 03:41:01',1,NULL,NULL),
	(19,'4','Baik',4,NULL,'2020-02-09 03:41:15','2020-02-09 03:41:15',1,NULL,NULL),
	(20,'4','Sangat Baik',5,NULL,'2020-02-09 03:41:48','2020-02-09 03:41:48',1,NULL,NULL),
	(21,'5','Tidak ada Peningkatan',1,NULL,'2020-02-09 03:31:55','2020-02-09 03:31:55',1,NULL,NULL),
	(22,'5','Perlu Ditingkatkan',2,NULL,'2020-02-09 03:33:24','2020-02-09 03:40:42',1,1,NULL),
	(23,'5','Memenuhi Standar',3,NULL,'2020-02-09 03:41:01','2020-02-09 03:41:01',1,NULL,NULL),
	(24,'5','Baik',4,NULL,'2020-02-09 03:41:15','2020-02-09 03:41:15',1,NULL,NULL),
	(25,'5','Sangat Baik',5,NULL,'2020-02-09 03:41:48','2020-02-09 03:41:48',1,NULL,NULL),
	(26,'7','Tidak ada Peningkatan',1,NULL,'2020-02-09 03:31:55','2020-02-09 03:31:55',1,NULL,NULL),
	(27,'7','Perlu Ditingkatkan',2,NULL,'2020-02-09 03:33:24','2020-02-09 03:40:42',1,1,NULL),
	(28,'7','Memenuhi Standar',3,NULL,'2020-02-09 03:41:01','2020-02-09 03:41:01',1,NULL,NULL),
	(29,'7','Baik',4,NULL,'2020-02-09 03:41:15','2020-02-09 03:41:15',1,NULL,NULL),
	(30,'7','Sangat Baik',5,NULL,'2020-02-09 03:41:48','2020-02-09 03:41:48',1,NULL,NULL),
	(31,'8','Tidak ada Peningkatan',1,NULL,'2020-02-09 03:31:55','2020-02-09 03:31:55',1,NULL,NULL),
	(32,'8','Perlu Ditingkatkan',2,NULL,'2020-02-09 03:33:24','2020-02-09 03:40:42',1,1,NULL),
	(33,'8','Memenuhi Standar',3,NULL,'2020-02-09 03:41:01','2020-02-09 03:41:01',1,NULL,NULL),
	(34,'8','Baik',4,NULL,'2020-02-09 03:41:15','2020-02-09 03:41:15',1,NULL,NULL),
	(35,'8','Sangat Baik',5,NULL,'2020-02-09 03:41:48','2020-02-09 03:41:48',1,NULL,NULL),
	(36,'9','Tidak ada Peningkatan',1,NULL,'2020-02-09 03:31:55','2020-02-09 03:31:55',1,NULL,NULL),
	(37,'9','Perlu Ditingkatkan',2,NULL,'2020-02-09 03:33:24','2020-02-09 03:40:42',1,1,NULL),
	(38,'9','Memenuhi Standar',3,NULL,'2020-02-09 03:41:01','2020-02-09 03:41:01',1,NULL,NULL),
	(39,'9','Baik',4,NULL,'2020-02-09 03:41:15','2020-02-09 03:41:15',1,NULL,NULL),
	(40,'9','Sangat Baik',5,NULL,'2020-02-09 03:41:48','2020-02-09 03:41:48',1,NULL,NULL),
	(41,'10','Tidak ada Peningkatan',1,NULL,'2020-02-09 03:31:55','2020-02-09 03:31:55',1,NULL,NULL),
	(42,'10','Perlu Ditingkatkan',2,NULL,'2020-02-09 03:33:24','2020-02-09 03:40:42',1,1,NULL),
	(43,'10','Memenuhi Standar',3,NULL,'2020-02-09 03:41:01','2020-02-09 03:41:01',1,NULL,NULL),
	(44,'10','Baik',4,NULL,'2020-02-09 03:41:15','2020-02-09 03:41:15',1,NULL,NULL),
	(45,'10','Sangat Baik',5,NULL,'2020-02-09 03:41:48','2020-02-09 03:41:48',1,NULL,NULL),
	(46,'11','Tidak ada Peningkatan',1,NULL,'2020-02-09 03:31:55','2020-02-09 03:31:55',1,NULL,NULL),
	(47,'11','Perlu Ditingkatkan',2,NULL,'2020-02-09 03:33:24','2020-02-09 03:40:42',1,1,NULL),
	(48,'11','Memenuhi Standar',3,NULL,'2020-02-09 03:41:01','2020-02-09 03:41:01',1,NULL,NULL),
	(49,'11','Baik',4,NULL,'2020-02-09 03:41:15','2020-02-09 03:41:15',1,NULL,NULL),
	(50,'11','Sangat Baik',5,NULL,'2020-02-09 03:41:48','2020-02-09 03:41:48',1,NULL,NULL),
	(51,'12','Tidak ada Peningkatan',1,NULL,'2020-02-09 03:31:55','2020-02-09 03:31:55',1,NULL,NULL),
	(52,'12','Perlu Ditingkatkan',2,NULL,'2020-02-09 03:33:24','2020-02-09 03:40:42',1,1,NULL),
	(53,'12','Memenuhi Standar',3,NULL,'2020-02-09 03:41:01','2020-02-09 03:41:01',1,NULL,NULL),
	(54,'12','Baik',4,NULL,'2020-02-09 03:41:15','2020-02-09 03:41:15',1,NULL,NULL),
	(55,'12','Sangat Baik',5,NULL,'2020-02-09 03:41:48','2020-02-09 03:41:48',1,NULL,NULL),
	(56,'13','Save 1 Operator',1,NULL,'2020-02-09 03:31:55','2020-02-09 03:58:23',1,1,NULL),
	(57,'13','Perlu Ditingkatkan',2,NULL,'2020-02-09 03:33:24','2020-02-09 03:40:42',1,1,NULL),
	(58,'13','Memenuhi Standar',3,NULL,'2020-02-09 03:41:01','2020-02-09 03:41:01',1,NULL,NULL),
	(59,'13','Baik',4,NULL,'2020-02-09 03:41:15','2020-02-09 03:41:15',1,NULL,NULL),
	(60,'13','Sangat Baik',5,NULL,'2020-02-09 03:41:48','2020-02-09 03:41:48',1,NULL,NULL);

/*!40000 ALTER TABLE `nilai_kriterias` ENABLE KEYS */;
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
  `show` int(1) NOT NULL DEFAULT 0,
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
	(10,2,1,1,1,1,1,1,1,1,1,NULL,'2019-01-07 02:38:33','2019-03-10 10:03:10',NULL,1,NULL),
	(11,1,10,1,1,0,0,0,0,0,0,NULL,'2019-01-07 04:46:50','2019-01-07 04:46:50',1,NULL,NULL),
	(12,2,10,1,1,0,0,0,0,0,0,NULL,'2019-01-07 04:47:01','2019-01-07 04:47:01',1,NULL,NULL),
	(13,1,11,1,1,1,1,1,1,1,1,NULL,'2019-02-13 23:26:52','2019-02-13 23:26:52',1,NULL,NULL),
	(14,1,12,1,1,1,1,1,1,1,1,NULL,'2019-02-13 23:26:52','2019-02-13 23:26:52',1,NULL,NULL),
	(15,1,13,1,1,1,1,1,1,1,1,NULL,'2019-02-13 23:26:52','2019-02-13 23:26:52',1,NULL,NULL),
	(16,2,11,1,1,1,1,1,1,1,1,NULL,'2019-03-10 10:03:36','2019-03-10 10:03:36',1,NULL,NULL),
	(17,2,12,1,1,1,1,1,1,1,1,NULL,'2019-03-10 10:04:10','2019-03-10 10:04:10',1,NULL,NULL),
	(18,2,13,1,1,1,1,1,1,1,1,NULL,'2019-03-10 10:04:33','2019-03-10 10:04:33',1,NULL,NULL),
	(19,3,10,1,1,0,0,0,0,0,0,NULL,'2019-03-10 10:03:36','2020-02-09 04:21:11',1,1,NULL),
	(20,3,12,0,0,0,0,0,0,0,0,NULL,'2019-03-10 10:04:10','2020-02-09 04:21:21',1,1,NULL),
	(21,3,13,1,1,1,1,1,1,1,1,NULL,'2019-03-10 10:04:33','2019-03-10 10:04:33',1,NULL,NULL),
	(22,1,14,1,1,1,1,1,1,1,1,NULL,'2020-02-09 00:46:38','2020-02-09 00:46:38',1,NULL,NULL),
	(23,2,14,1,1,1,1,1,1,1,1,NULL,'2020-02-09 00:46:38','2020-02-09 00:46:38',1,NULL,NULL),
	(24,2,4,1,1,1,1,1,1,1,1,NULL,'2019-01-07 02:33:40','2019-01-07 02:33:40',NULL,NULL,NULL);

/*!40000 ALTER TABLE `privileges` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sections
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sections`;

CREATE TABLE `sections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode_section` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `sections` WRITE;
/*!40000 ALTER TABLE `sections` DISABLE KEYS */;

INSERT INTO `sections` (`id`, `kode_section`, `section`, `deleted_at`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_by`)
VALUES
	(1,'HR','Human Resource',NULL,'2020-02-09 00:47:27','2020-02-09 00:47:27',1,NULL,NULL),
	(2,'IT','Information Technology',NULL,'2020-02-09 00:47:38','2020-02-09 00:47:38',1,NULL,NULL),
	(3,'FA','Finance & Accounting',NULL,'2020-02-09 00:47:55','2020-02-09 00:47:55',1,NULL,NULL),
	(4,'GA','General Affairs',NULL,'2020-02-09 00:48:10','2020-02-09 00:48:10',1,NULL,NULL),
	(5,'TRN','Traning',NULL,'2020-02-09 00:48:20','2020-02-09 00:48:20',1,NULL,NULL),
	(6,'SHE','Safety Human Environmet',NULL,'2020-02-09 00:48:20','2020-02-09 00:48:20',1,NULL,NULL),
	(7,'PD','Production Design',NULL,'2020-02-09 00:48:20','2020-02-09 00:48:20',1,NULL,NULL),
	(8,'PP','Production Preparation',NULL,'2020-02-09 00:48:20','2020-02-09 00:48:20',1,NULL,NULL),
	(9,'PPAP','Production Part Approval Process',NULL,'2020-02-09 00:48:20','2020-02-09 00:48:20',1,NULL,NULL),
	(10,'EXIM','Export & Import',NULL,'2020-02-09 00:48:20','2020-02-09 00:48:20',1,NULL,NULL),
	(11,'PPC','Production Planning Control',NULL,'2020-02-09 00:48:20','2020-02-09 00:48:20',1,NULL,NULL),
	(12,'MPC','Material Planning Control',NULL,'2020-02-09 00:48:20','2020-02-09 00:48:20',1,NULL,NULL),
	(13,'WHS','Warehouse',NULL,'2020-02-09 00:48:20','2020-02-09 00:48:20',1,NULL,NULL),
	(14,'L. DOCK','Loading Dock',NULL,'2020-02-09 00:48:20','2020-02-09 00:48:20',1,NULL,NULL),
	(15,'MTP','Manufacture Tooling Procurement',NULL,'2020-02-09 00:48:20','2020-02-09 00:48:20',1,NULL,NULL),
	(16,'MTC','Maintenance',NULL,'2020-02-09 00:48:20','2020-02-09 00:48:20',1,NULL,NULL),
	(17,'CT','Connection Techonology',NULL,'2020-02-09 00:48:20','2020-02-09 00:48:20',1,NULL,NULL),
	(18,'JBP','Jig Board Preparation',NULL,'2020-02-09 00:48:20','2020-02-09 00:48:20',1,NULL,NULL),
	(19,'CBP','Checker Board Preparation',NULL,'2020-02-09 00:48:20','2020-02-09 00:48:20',1,NULL,NULL),
	(20,'WKS','Workshop',NULL,'2020-02-09 00:48:20','2020-02-09 00:48:20',1,NULL,NULL),
	(21,'RCV','Receiving Inspection',NULL,'2020-02-09 00:48:20','2020-02-09 00:48:20',1,NULL,NULL),
	(22,'QA','Quality Assurance',NULL,'2020-02-09 00:48:20','2020-02-09 00:48:20',1,NULL,NULL),
	(23,'QP','Quality Preparation',NULL,'2020-02-09 00:48:20','2020-02-09 00:48:20',1,NULL,NULL),
	(24,'QS','Quality System',NULL,'2020-02-09 00:48:20','2020-02-09 00:48:20',1,NULL,NULL),
	(25,'CTP','CUTTING TUBE & PROJECT',NULL,'2020-02-09 00:48:20','2020-02-09 00:48:20',1,NULL,NULL),
	(26,'PAD','PRE ASSY DAIHATSU',NULL,'2020-02-09 00:48:20','2020-02-09 00:48:20',1,NULL,NULL),
	(27,'PAH','PRE ASSY HONDA',NULL,'2020-02-09 00:48:20','2020-02-09 00:48:20',1,NULL,NULL),
	(28,'PAM','PRE ASSY MAZDA',NULL,'2020-02-09 00:48:20','2020-02-09 00:48:20',1,NULL,NULL),
	(29,'PAS','PRE ASSY SUBARU',NULL,'2020-02-09 00:48:20','2020-02-09 00:48:20',1,NULL,NULL),
	(30,'PAT','PRE ASSY TOYOTA',NULL,'2020-02-09 00:48:20','2020-02-09 00:48:20',1,NULL,NULL),
	(31,'FAD','FINAL ASSY DAIHATSU',NULL,'2020-02-09 00:48:20','2020-02-09 00:48:20',1,NULL,NULL),
	(32,'FAH','FINAL ASSY HONDA',NULL,'2020-02-09 00:48:20','2020-02-09 00:48:20',1,NULL,NULL),
	(33,'FAM','FINAL ASSY MAZDA',NULL,'2020-02-09 00:48:20','2020-02-09 00:48:20',1,NULL,NULL),
	(34,'FAS','FINAL ASSY SUBARU',NULL,'2020-02-09 00:48:20','2020-02-09 00:48:20',1,NULL,NULL),
	(35,'FAT','FINAL ASSY TOYOTA',NULL,'2020-02-09 00:48:20','2020-02-09 00:48:20',1,NULL,NULL);

/*!40000 ALTER TABLE `sections` ENABLE KEYS */;
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
	(3,'2','2',NULL,'2019-01-07 02:12:23','2019-01-07 02:12:23',NULL,NULL,NULL),
	(4,'5','2','2020-02-09 02:50:29','2019-03-09 02:27:30','2020-02-09 02:50:29',1,NULL,1),
	(5,'4','3',NULL,'2019-03-09 02:27:30','2020-02-09 02:50:55',1,1,NULL),
	(6,'1','3',NULL,'2020-02-09 02:52:56','2020-02-09 02:52:56',1,NULL,NULL);

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
	(1,'root','Root','root@mail.com',NULL,'$2y$10$z/ZFg.YbOmI44Y8jaBlbf.YjYNOxhtuC6I5QA4wCMB9pjdoaAiBiS','bZhOOundpMT5ajjkzSw5QcbWeuJV8VItXgiL4O13fNEbr30E5qLmRdOLAzxR',NULL,'2018-07-04 11:44:27',NULL,NULL,NULL,NULL),
	(2,'admin','Admin','admin@mail.com',NULL,'$2y$10$GryG6aldEwSuMXNrDh3B0eiVb0RxxRen2PSCNVhe4PH0Hh03Mm8vm','h6LzQfimpNGwceC1ffYurgmF4R0UxHNrGbOleXnOClg4wAkFJLNbQwgZxLfi','2019-01-06 17:21:34','2019-01-06 17:26:38',NULL,NULL,NULL,NULL),
	(3,'cabang','Admin Cabang','cabang@mail.com',NULL,'$2y$10$Bh0z3hsX1mpucAaXul8NGOwwxVMOP55iiUcmqwOwH/YbKVyH1tE36',NULL,'2019-01-07 08:56:28','2019-02-16 04:19:10','2019-02-16 04:19:10',2,NULL,1),
	(4,'atasan','Atasan','atasan@mail.com',NULL,'$2y$10$F1ob22IBZureurD.Fkxhq.Dzz/jdTysjmM4CFH4/OvptJe560itiS','aQywlnYftdaZUBSrFHixMxWr1dgjZFwWJ2QunMqFWmmbEAtb4JZa0gHaBUyw','2019-02-16 04:14:42','2020-02-09 02:48:58',NULL,1,1,NULL),
	(5,'Oper','Operator','ator@mail.com',NULL,'$2y$10$Dj9P7TQRstnm5ccYmCFQT.NDi.lwc.UDmj3pxIU3gFgo9cdsCPP4i','nzKp25jbLbufbpICiMV3Pa6Nm9iGCZ45Vy2yFRMYwaxOICNdzaaaxfDKtJQC','2019-03-09 02:26:26','2020-02-09 02:49:17','2019-02-16 04:19:10',1,1,1);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
