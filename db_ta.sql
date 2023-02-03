/*
SQLyog Ultimate
MySQL - 10.4.17-MariaDB : Database - taposyandu
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`taposyandu` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

/*Table structure for table `admin` */

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL AUTO_INCREMENT,
  `namaadmin` varchar(225) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  `username` varchar(225) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`idadmin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `admin` */

/*Table structure for table `anak` */

CREATE TABLE `anak` (
  `nik` char(16) NOT NULL,
  `anaknama` varchar(225) DEFAULT NULL,
  `tmptlhr` varchar(100) DEFAULT NULL,
  `tgllhr` date DEFAULT NULL,
  `jk` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `namatmptlhr` varchar(100) DEFAULT NULL,
  `nokk` char(16) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`nik`),
  KEY `anak_kk` (`nokk`),
  CONSTRAINT `anak_kk` FOREIGN KEY (`nokk`) REFERENCES `keluarga` (`nokk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `anak` */

insert  into `anak`(`nik`,`anaknama`,`tmptlhr`,`tgllhr`,`jk`,`namatmptlhr`,`nokk`,`created_at`,`updated_at`,`deleted_at`) values 
('3506102212100001','Galang Lintang Widyatna','Kediri','2010-12-21','Laki-laki','RS Pare','350610210411001',NULL,NULL,NULL);

/*Table structure for table `auth_activation_attempts` */

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `auth_activation_attempts` */

/*Table structure for table `auth_groups` */

CREATE TABLE `auth_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `auth_groups` */

insert  into `auth_groups`(`id`,`name`,`description`) values 
(1,'admin','Kepala Posyandu'),
(2,'kader','Pengelola data master'),
(3,'masyarakat','pengunjung web');

/*Table structure for table `auth_groups_permissions` */

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) unsigned NOT NULL DEFAULT 0,
  `permission_id` int(11) unsigned NOT NULL DEFAULT 0,
  KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  KEY `group_id_permission_id` (`group_id`,`permission_id`),
  CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `auth_groups_permissions` */

insert  into `auth_groups_permissions`(`group_id`,`permission_id`) values 
(1,1),
(1,2),
(1,3),
(2,2),
(2,4),
(3,2);

/*Table structure for table `auth_groups_users` */

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) unsigned NOT NULL DEFAULT 0,
  `user_id` int(11) unsigned NOT NULL DEFAULT 0,
  KEY `auth_groups_users_user_id_foreign` (`user_id`),
  KEY `group_id_user_id` (`group_id`,`user_id`),
  CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `auth_groups_users` */

insert  into `auth_groups_users`(`group_id`,`user_id`) values 
(1,1),
(2,2),
(3,3),
(3,4);

/*Table structure for table `auth_logins` */

CREATE TABLE `auth_logins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

/*Data for the table `auth_logins` */

insert  into `auth_logins`(`id`,`ip_address`,`email`,`user_id`,`date`,`success`) values 
(1,'::1','nurulmulfi423',NULL,'2023-01-16 01:52:58',0),
(2,'::1','nmmldn.130nmm12@gmail.com',11,'2023-01-16 01:53:57',1),
(3,'::1','nmmldn.130nmm12@gmail.com',1,'2023-01-16 02:14:00',1),
(4,'::1','nmmldn.130nmm12@gmail.com',1,'2023-01-16 02:48:46',1),
(5,'::1','nmmldn.130nmm12@gmail.com',1,'2023-01-16 03:11:42',1),
(6,'::1','nmmldn.130nmm12@gmail.com',1,'2023-01-16 04:08:21',1),
(7,'::1','nmmldn.130nmm12@gmail.com',1,'2023-01-16 04:26:57',1),
(8,'::1','ruwi123ruwi@gmail.com',2,'2023-01-16 04:55:01',1),
(9,'::1','nmmldn.130nmm12@gmail.com',1,'2023-01-16 07:27:14',1),
(10,'::1','ruwi123ruwi@gmail.com',2,'2023-01-16 07:43:06',1),
(11,'::1','ruwi123ruwi@gmail.com',2,'2023-01-16 07:46:01',1),
(12,'::1','nmmldn.130nmm12@gmail.com',1,'2023-01-16 08:18:54',1),
(13,'::1','nmmldn.130nmm12@gmail.com',1,'2023-01-16 08:20:25',1),
(14,'::1','nmmldn.130nmm12@gmail.com',1,'2023-01-16 23:12:16',1),
(15,'::1','nmmldn.130nmm12@gmail.com',1,'2023-01-17 00:28:49',1),
(16,'::1','nmmldn.130nmm12@gmail.com',1,'2023-01-17 00:29:42',1),
(17,'::1','nmmldn.130nmm12@gmail.com',1,'2023-01-17 00:37:33',1),
(18,'::1','ruwi123ruwi@gmail.com',2,'2023-01-17 00:44:10',1),
(19,'::1','nurulmufida612@gmail.com',3,'2023-01-17 00:46:47',1),
(20,'::1','nurulmufida612@gmail.com',3,'2023-01-17 00:55:39',1),
(21,'::1','nmmldn.130nmm12@gmail.com',1,'2023-01-17 00:59:05',1),
(22,'::1','R',NULL,'2023-01-17 01:17:55',0),
(23,'::1','ruwi123ruwi@gmail.com',2,'2023-01-17 01:18:11',1),
(24,'::1','nurulmufida612@gmail.com',3,'2023-01-17 01:19:34',1),
(25,'::1','nmmldn.130nmm12@gmail.com',1,'2023-01-18 09:33:25',1),
(26,'::1','Admin Posyandu',NULL,'2023-01-28 10:42:28',0),
(27,'::1','Admin Posyandu',NULL,'2023-01-28 10:43:03',0),
(28,'::1','Admin Posyandu',NULL,'2023-01-28 10:44:57',0),
(29,'::1','Ruwiyati',NULL,'2023-01-28 10:45:19',0),
(30,'::1','Admin Posyandu',NULL,'2023-01-28 10:47:41',0),
(31,'::1','Admin Posyandu',NULL,'2023-01-29 08:56:43',0),
(32,'::1','Admin Posyandu',NULL,'2023-01-29 20:38:23',0),
(33,'::1','Admin Posyandu',NULL,'2023-01-29 21:59:05',0),
(34,'::1','nmmldn.130nmm12@gmail.com',1,'2023-01-29 22:02:07',1),
(35,'::1','ruwi123ruwi@gmail.com',2,'2023-01-29 22:09:23',1),
(36,'::1','nmmldn.130nmm12@gmail.com',1,'2023-01-29 22:12:15',1),
(37,'::1','nmmldn.130nmm12@gmail.com',1,'2023-01-29 22:45:45',1),
(38,'::1','ruwi123ruwi@gmail.com',2,'2023-01-29 22:51:42',1),
(39,'::1','nurulmufida612@gmail.com',3,'2023-01-29 22:54:12',1),
(40,'::1','nmmldn.130nmm12@gmail.com',1,'2023-01-29 23:03:05',1),
(41,'::1','nmmldn.130nmm12@gmail.com',1,'2023-01-30 06:20:20',1),
(42,'::1','ruwi123ruwi@gmail.com',2,'2023-01-30 10:32:57',1),
(43,'::1','nmmldn.130nmm12@gmail.com',1,'2023-01-30 11:26:49',1),
(44,'::1','nmmldn.130nmm12@gmail.com',1,'2023-01-30 11:33:07',1),
(45,'::1','nurulmufida612@gmail.com',3,'2023-01-30 11:38:35',1),
(46,'::1','nmmldn.130nmm12@gmail.com',1,'2023-01-30 22:08:42',1),
(47,'::1','ruwi123ruwi@gmail.com',2,'2023-01-31 00:09:41',1),
(48,'::1','nmmldn.130nmm12@gmail.com',1,'2023-01-31 01:35:59',1),
(49,'::1','nmmldn.130nmm12@gmail.com',1,'2023-01-31 02:52:49',1),
(50,'::1','ruwi123ruwi@gmail.com',2,'2023-01-31 02:56:22',1),
(51,'::1','nurulmufida612@gmail.com',3,'2023-01-31 02:58:02',1),
(52,'::1','nmmldn.130nmm12@gmail.com',1,'2023-01-31 03:00:25',1),
(53,'::1','nmmldn.130nmm12@gmail.com',1,'2023-02-01 06:05:21',1);

/*Table structure for table `auth_permissions` */

CREATE TABLE `auth_permissions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `auth_permissions` */

insert  into `auth_permissions`(`id`,`name`,`description`) values 
(1,'manage-users','Manage All Users'),
(2,'manage-profile','Manage user\'s profile'),
(3,'manage-data-global','Manage data umum'),
(4,'manage-data','Manage data master');

/*Table structure for table `auth_reset_attempts` */

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `auth_reset_attempts` */

/*Table structure for table `auth_tokens` */

CREATE TABLE `auth_tokens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_tokens_user_id_foreign` (`user_id`),
  KEY `selector` (`selector`),
  CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `auth_tokens` */

/*Table structure for table `auth_users_permissions` */

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) unsigned NOT NULL DEFAULT 0,
  `permission_id` int(11) unsigned NOT NULL DEFAULT 0,
  KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  KEY `user_id_permission_id` (`user_id`,`permission_id`),
  CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `auth_users_permissions` */

insert  into `auth_users_permissions`(`user_id`,`permission_id`) values 
(1,1),
(1,2),
(1,3),
(2,2),
(2,4),
(3,2),
(4,2);

/*Table structure for table `bidan` */

CREATE TABLE `bidan` (
  `idbidan` int(11) NOT NULL AUTO_INCREMENT,
  `bidannama` varchar(225) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idbidan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `bidan` */

insert  into `bidan`(`idbidan`,`bidannama`,`alamat`,`foto`,`nohp`,`created_at`,`updated_at`,`deleted_at`) values 
(1,' Lisa Khafifah','Gempolan, Kec. Gurah, Kab. Kediri','default.png','082233538197113',NULL,NULL,NULL);

/*Table structure for table `bumil` */

CREATE TABLE `bumil` (
  `nik` char(16) NOT NULL,
  `bumilnama` varchar(225) DEFAULT NULL,
  `anakke` varchar(5) DEFAULT NULL,
  `nokk` char(16) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`nik`),
  KEY `bumil_keluarga` (`nokk`),
  CONSTRAINT `bumil_keluarga` FOREIGN KEY (`nokk`) REFERENCES `keluarga` (`nokk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `bumil` */

insert  into `bumil`(`nik`,`bumilnama`,`anakke`,`nokk`,`created_at`,`updated_at`,`deleted_at`) values 
('3506106807830003','Ari Yulianik Dwi Rahayu','3','350610210411001',NULL,NULL,NULL);

/*Table structure for table `imunisasi` */

CREATE TABLE `imunisasi` (
  `idimunisasi` int(11) NOT NULL AUTO_INCREMENT,
  `hb` varchar(20) DEFAULT NULL,
  `usia` varchar(20) DEFAULT NULL,
  `tglimun` date DEFAULT NULL,
  `jenisimun` varchar(50) DEFAULT NULL,
  `ket` varchar(30) DEFAULT NULL,
  `nik` char(16) DEFAULT NULL,
  `idposyandu` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idimunisasi`),
  KEY `imun_anak` (`nik`),
  KEY `imun_pos` (`idposyandu`),
  CONSTRAINT `imun_anak` FOREIGN KEY (`nik`) REFERENCES `anak` (`nik`),
  CONSTRAINT `imun_pos` FOREIGN KEY (`idposyandu`) REFERENCES `posyandu` (`idposyandu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `imunisasi` */

/*Table structure for table `kader` */

CREATE TABLE `kader` (
  `idkader` int(11) NOT NULL AUTO_INCREMENT,
  `kadernama` varchar(225) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  PRIMARY KEY (`idkader`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `kader` */

insert  into `kader`(`idkader`,`kadernama`,`jabatan`,`alamat`,`username`,`email`,`password`,`fullname`,`nohp`,`created_at`,`updated_at`,`deleted_at`,`id`) values 
(1,'Ruwiyati','Kader Posyandu Sehati','Gempolan, Kec. Gurah, Kab. Kediri',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `kb` */

CREATE TABLE `kb` (
  `idkb` int(11) NOT NULL AUTO_INCREMENT,
  `tgl` date DEFAULT NULL,
  `jeniskb` varchar(50) DEFAULT NULL,
  `nokk` char(16) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idkb`),
  KEY `kb_kk` (`nokk`),
  CONSTRAINT `kb_kk` FOREIGN KEY (`nokk`) REFERENCES `keluarga` (`nokk`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `kb` */

insert  into `kb`(`idkb`,`tgl`,`jeniskb`,`nokk`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'2022-11-22','Pil','350610210411001',NULL,NULL,NULL);

/*Table structure for table `kegiatan` */

CREATE TABLE `kegiatan` (
  `idkegiatan` int(11) NOT NULL AUTO_INCREMENT,
  `namakeg` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `idposyandu` int(11) DEFAULT NULL,
  `idkb` int(11) DEFAULT NULL,
  PRIMARY KEY (`idkegiatan`),
  KEY `keg_pos` (`idposyandu`),
  KEY `keg_kb` (`idkb`),
  CONSTRAINT `keg_kb` FOREIGN KEY (`idkb`) REFERENCES `kb` (`idkb`),
  CONSTRAINT `keg_pos` FOREIGN KEY (`idposyandu`) REFERENCES `posyandu` (`idposyandu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `kegiatan` */

/*Table structure for table `keluarga` */

CREATE TABLE `keluarga` (
  `nokk` char(16) NOT NULL,
  `ayahnik` char(16) DEFAULT NULL,
  `ayahnama` varchar(225) DEFAULT NULL,
  `ayahtmptlhr` varchar(50) DEFAULT NULL,
  `ayahtgllhr` date DEFAULT NULL,
  `ayahagama` enum('Islam','Kristen Katolik','Kristen Protestan','Hindu','Budha','Konghucu') DEFAULT NULL,
  `ayahpendidikan` enum('SD','SMP','SMA','D1/D2','D3','D4/S1','S2','S3','Tidak Bersekolah') DEFAULT NULL,
  `ayahpekerjaan` varchar(100) DEFAULT NULL,
  `ayahnohp` varchar(15) DEFAULT NULL,
  `ibunik` char(16) DEFAULT NULL,
  `ibunama` varchar(225) DEFAULT NULL,
  `ibutmptlhr` varchar(50) DEFAULT NULL,
  `ibutgllhr` date DEFAULT NULL,
  `ibuagama` enum('Islam','Kristen Katolik','Kristen Protestan','Hindu','Budha','Konghucu') DEFAULT NULL,
  `ibupendidikan` enum('SD','SMP','SMA','D1/D2','D3','D4/S1','S2','S3','Tidak bersekolah') DEFAULT NULL,
  `ibugoldar` enum('O','A','B','AB') DEFAULT NULL,
  `ibupekerjaan` varchar(100) DEFAULT NULL,
  `ibunohp` varchar(15) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `jmlhanak` int(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`nokk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `keluarga` */

insert  into `keluarga`(`nokk`,`ayahnik`,`ayahnama`,`ayahtmptlhr`,`ayahtgllhr`,`ayahagama`,`ayahpendidikan`,`ayahpekerjaan`,`ayahnohp`,`ibunik`,`ibunama`,`ibutmptlhr`,`ibutgllhr`,`ibuagama`,`ibupendidikan`,`ibugoldar`,`ibupekerjaan`,`ibunohp`,`alamat`,`jmlhanak`,`created_at`,`updated_at`,`deleted_at`) values 
('350610210411001','3506102008780003','Agus Widodo Saputro','Kediri','1978-08-20','Islam','D4/S1','Karyawan Swasta','08227613213012','3506106807830003','Ari Yulianik Dwi Rahayu','Kediri','1983-07-28','Islam','D1/D2','B','Ibu Rumah Tangga','0851412391232','Ds. Gempolan RT/RW 02/01 Kec. Gurah Kab. Kediri',3,NULL,NULL,NULL);

/*Table structure for table `kesbumil` */

CREATE TABLE `kesbumil` (
  `idkesbumil` int(11) NOT NULL AUTO_INCREMENT,
  `tgl` date DEFAULT NULL,
  `umurkandungan` int(5) DEFAULT NULL,
  `bb` varchar(10) DEFAULT NULL,
  `keluhan` varchar(50) DEFAULT NULL,
  `lila` int(5) DEFAULT NULL,
  `tekanandrh` varchar(20) DEFAULT NULL,
  `tinggifundus` varchar(20) DEFAULT NULL,
  `letakjanin` varchar(50) DEFAULT NULL,
  `deyutjantung` varchar(20) DEFAULT NULL,
  `bengkakkaki` varchar(20) DEFAULT NULL,
  `periksalabo` varchar(50) DEFAULT NULL,
  `tindakan` varchar(50) DEFAULT NULL,
  `nasihatsaran` text DEFAULT NULL,
  `nokk` char(16) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idkesbumil`),
  KEY `bumil_kk` (`nokk`),
  CONSTRAINT `bumil_kk` FOREIGN KEY (`nokk`) REFERENCES `keluarga` (`nokk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `kesbumil` */

/*Table structure for table `laporan` */

CREATE TABLE `laporan` (
  `idlaporan` int(11) NOT NULL AUTO_INCREMENT,
  `namalpn` varchar(225) DEFAULT NULL,
  `jenislpn` enum('Bulan','Tahun','Imunisasi','KB','KesIbu','KesAnak') DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idlaporan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `laporan` */

/*Table structure for table `migrations` */

CREATE TABLE `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`version`,`class`,`group`,`namespace`,`time`,`batch`) values 
(1,'2017-11-20-223112','Myth\\Auth\\Database\\Migrations\\CreateAuthTables','default','Myth\\Auth',1673800962,1);

/*Table structure for table `perkembangan_anak` */

CREATE TABLE `perkembangan_anak` (
  `idgizi` int(11) NOT NULL AUTO_INCREMENT,
  `tglperiksa` date DEFAULT NULL,
  `bb` varchar(10) DEFAULT NULL,
  `tb` varchar(10) DEFAULT NULL,
  `riwayatpenyakit` varchar(50) DEFAULT NULL,
  `ket` varchar(50) DEFAULT NULL,
  `nik` char(16) DEFAULT NULL,
  PRIMARY KEY (`idgizi`),
  KEY `gizi_anak` (`nik`),
  CONSTRAINT `gizi_anak` FOREIGN KEY (`nik`) REFERENCES `anak` (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `perkembangan_anak` */

/*Table structure for table `posyandu` */

CREATE TABLE `posyandu` (
  `idposyandu` int(11) NOT NULL AUTO_INCREMENT,
  `posyandu` varbinary(50) DEFAULT NULL,
  `kategori` enum('Balita','Ibu Hamil','KB') DEFAULT NULL,
  `posalamat` text DEFAULT NULL,
  `posnohp` char(15) DEFAULT NULL,
  `ketuapos` varchar(225) DEFAULT NULL,
  `idbidan` int(11) DEFAULT NULL,
  `idkader` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idposyandu`),
  KEY `pos_bidan` (`idbidan`),
  KEY `pos_kader` (`idkader`),
  CONSTRAINT `pos_bidan` FOREIGN KEY (`idbidan`) REFERENCES `bidan` (`idbidan`),
  CONSTRAINT `pos_kader` FOREIGN KEY (`idkader`) REFERENCES `kader` (`idkader`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `posyandu` */

insert  into `posyandu`(`idposyandu`,`posyandu`,`kategori`,`posalamat`,`posnohp`,`ketuapos`,`idbidan`,`idkader`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Sehati','Balita','Ds. Gempolan, Kec. Gurah, Kab. Kediri','0851123482312','Lailatul Khoiriyah',1,1,NULL,NULL,NULL);

/*Table structure for table `puskesmas` */

CREATE TABLE `puskesmas` (
  `idpuskesmas` int(11) NOT NULL AUTO_INCREMENT,
  `puskesmas` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  `idposyandu` int(11) DEFAULT NULL,
  PRIMARY KEY (`idpuskesmas`),
  KEY `kes_pos` (`idposyandu`),
  CONSTRAINT `kes_pos` FOREIGN KEY (`idposyandu`) REFERENCES `posyandu` (`idposyandu`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `puskesmas` */

insert  into `puskesmas`(`idpuskesmas`,`puskesmas`,`alamat`,`nohp`,`idposyandu`) values 
(1,'UPTD Puskesmas Adan-Adan','Jln. Soekarno Hatta, Ds. Adan-Adan, Kec. Gurah, Kab. Kediri','(0354) 7415023',1);

/*Table structure for table `users` */

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`email`,`password_hash`,`fullname`,`nohp`,`reset_hash`,`reset_at`,`reset_expires`,`activate_hash`,`status`,`status_message`,`active`,`force_pass_reset`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Admin Posyandu','nmmldn.130nmm12@gmail.com','$2y$10$vRKfJIgLnLku3PwRCmsOc.h/aQkn.PXZ4XjasuhA4wo7m1Vd.g2eC','Lailatul Khoiriyah',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2023-01-16 01:51:57','2023-01-16 01:51:57',NULL),
(2,'Ruwiyati','ruwi123ruwi@gmail.com','$2y$10$IxoOFYSBtrkVEOLSjwu70ekfh7iLdXOZnwRxpPzSqDBIw7qmfGswC','Ruwiyati',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2023-01-16 04:54:28','2023-01-16 04:54:28',NULL),
(3,'Nurul ','nurulmufida612@gmail.com','$2y$10$3eYY/8Ynq4vl.75xHfi.4ufGGXpwWgUnlObxatJ7yeW.vzwoWgUs6','Nurul ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2023-01-17 00:46:32','2023-01-17 00:46:32',NULL),
(4,'Sriana Marnia','sriana13241@gmail.com','$2y$10$DBhxOYXGT0Ad5L8HK/pge..uppNNg7kzwqoF5E/4vL11wvY771C6i','Sriana Marnia',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2023-01-29 22:01:28','2023-01-29 22:01:28',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
