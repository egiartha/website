/*
SQLyog Enterprise v12.09 (64 bit)
MySQL - 10.4.8-MariaDB : Database - db_pengaduan_masyarakat
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_pengaduan_masyarakat` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_pengaduan_masyarakat`;

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `komentar` */

DROP TABLE IF EXISTS `komentar`;

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `komentar` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `id_pengaduan` varchar(120) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `komentar` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_100000_create_password_resets_table',1),(2,'2019_08_19_000000_create_failed_jobs_table',1),(3,'2020_03_17_061649_create_users_table',1),(4,'2020_03_17_062041_create_pengaduan_table',1),(5,'2020_03_23_044724_create_settings_table',1),(6,'2020_03_26_125056_create_penggunas_table',1),(7,'2020_03_26_125116_create_telepons_table',1);

/*Table structure for table `notifikasi` */

DROP TABLE IF EXISTS `notifikasi`;

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deskripsi` varchar(120) DEFAULT NULL,
  `id_pengaduan` varchar(120) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `notifikasi` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `penggunas` */

DROP TABLE IF EXISTS `penggunas`;

CREATE TABLE `penggunas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `penggunas` */

/*Table structure for table `settings` */

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id_settings` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_aplikasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_aplikasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_settings`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `settings` */

insert  into `settings`(`id_settings`,`nama_aplikasi`,`deskripsi_aplikasi`,`created_at`,`updated_at`) values (1,'DISHUB','Sistem Layanan Penerangan Jalan Umum',NULL,NULL);

/*Table structure for table `tb_pengaduan` */

DROP TABLE IF EXISTS `tb_pengaduan`;

CREATE TABLE `tb_pengaduan` (
  `kode_pengaduan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `isi_laporan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggapan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `foto_pengaduan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` enum('pengajuan','aspirasi') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','proses','diterima','ditolak','selesai') COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_selesai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `longitude` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  PRIMARY KEY (`kode_pengaduan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_pengaduan` */

insert  into `tb_pengaduan`(`kode_pengaduan`,`tgl_pengaduan`,`tgl_tanggapan`,`user_id`,`isi_laporan`,`alamat`,`desa`,`kecamatan`,`tanggapan`,`foto_pengaduan`,`kategori`,`status`,`foto_selesai`,`created_at`,`updated_at`,`longitude`,`latitude`,`id_petugas`) values ('KDP - 1','2021-07-13','2021-07-13',4,'hfgjh','','','','njkmk sudah se;lesao','1626186159_download (2).jpg','pengajuan','0','',NULL,NULL,NULL,NULL,NULL),('KDP - 2','2021-07-26','2021-07-26',4,'lampu jalan','','','','x','1627295120_83abc-3428.jpg','pengajuan','selesai','',NULL,NULL,NULL,NULL,NULL),('KDP - 3','2021-07-29','2021-07-29',4,'ee','dee','ee','Sambas','dssfs','1627536322_images (4).jpg','pengajuan','selesai','',NULL,NULL,NULL,NULL,NULL),('KDP - 4','2021-07-29','2021-07-29',4,'zss','ss','a','Sambas','scsc','1627536364_images (3).jpg','pengajuan','diterima','download (9).png',NULL,NULL,NULL,NULL,NULL),('KDP - 5','2021-08-12','2021-08-12',9,'Laporan Edit lagi','Jl. Prof. M. Yamin GG Usaha Bersama 1','Desa','Subah','0','1628784874_2f8e7d25-7251-4ce8-9ac6-d5521557bf8f.jpg','pengajuan','0',NULL,NULL,NULL,'109.31914687156679','-0.04817246823201907',NULL);

/*Table structure for table `tbl_lokasi` */

DROP TABLE IF EXISTS `tbl_lokasi`;

CREATE TABLE `tbl_lokasi` (
  `id_lokasi` int(5) NOT NULL,
  `namalokasi` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `lat` varchar(10) NOT NULL,
  `lng` varchar(10) NOT NULL,
  PRIMARY KEY (`id_lokasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_lokasi` */

/*Table structure for table `telepons` */

DROP TABLE IF EXISTS `telepons`;

CREATE TABLE `telepons` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nomor_telepon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengguna_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `telepons` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nik` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_profil` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`nik`,`nama`,`username`,`email`,`alamat`,`email_verified_at`,`password`,`telp`,`level`,`foto_profil`,`remember_token`,`created_at`,`updated_at`) values (1,'1170615811706158','Karim Ardana','petugas','petugas@gmail.com','',NULL,'$2y$10$StNgm4.d1UIbNOi/KKsRaOw8h362YA4kax0xiKeH74u4b0ZERCxbG','081317520732','petugas','0',NULL,'2021-07-05 04:56:40','2021-07-05 04:56:40'),(2,'1170615711706157','Andri Maulanan','admin','admin@gmail.com','',NULL,'$2y$10$vPTbcoEYjUSga/RkpAUQ3eV799tSe3sWEwlotcnBzuQaXXwQBBYYa','081317520733','admin','0',NULL,'2021-07-05 04:56:40','2021-07-05 04:56:40'),(3,'1170615911706159','Hendra Andrianto','masyarakat','masyarakat@gmail.com','',NULL,'$2y$10$nzfAiE0IyudAh0hbfdpTHOvWWgt45PYRNfVE.qMUnvd8L4z2mESCu','081317520734','masyarakat','0',NULL,'2021-07-05 04:56:40','2021-07-05 04:56:40'),(4,'6101041010660004','Egi Artha Putri','egi','arthatria18@gmail.com','sf',NULL,'$2y$10$HJ7goTVMNAYUKBUyYRNKUO1v20MELJpAUbSE3A55rWDm5C0oqhyme','083856098814','masyarakat','1626186969_download (4).jpg',NULL,'2021-07-05 05:08:40','2021-07-05 05:08:40'),(6,'1234567890123456','reni','reni','mellynia.mn80@gmail.com','jkl',NULL,'$2y$10$gMg8QON49BJKkSjBtS5bLeJ0aWM0.M56B1Kj6N4VpUzvUk2W4N8E6','081234567898','masyarakat','0',NULL,'2021-07-13 15:49:45','2021-07-13 15:49:45'),(7,'6101045808000022','anii','ani','mellynia80@gmail.com','ser',NULL,'$2y$10$FjLHQmHxMPxguZ/hPj/LAOyndxQTTXajmRZ7.NxrPNx4G36XOdfEq','111111111111','masyarakat','0',NULL,'2021-07-26 07:47:28','2021-07-26 07:47:28'),(9,'1231231231231000','Bima febriansyah','bima','bimafebriansyah1002@gmail.com','Jl. Prof. M. Yamin GG Usaha Bersama 1',NULL,'$2y$10$StNgm4.d1UIbNOi/KKsRaOw8h362YA4kax0xiKeH74u4b0ZERCxbG','089793912312','masyarakat','0',NULL,'2021-08-12 14:38:58','2021-08-12 14:38:58');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
