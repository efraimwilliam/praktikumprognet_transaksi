/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 10.4.19-MariaDB-log : Database - db_praktikum_prognet_new
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_praktikum_prognet_new` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_praktikum_prognet_new`;

/*Table structure for table `admins` */

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `admins` */

insert  into `admins`(`id`,`username`,`password`,`name`,`profile_image`,`phone`,`remember_token`,`created_at`,`updated_at`) values 
(1,'admin','$2y$10$OB9WlsJ7XHvt4XGHW3tOe.VhkOZhXhSxS95JlNke3cGXHy6xTOZAi','admin',NULL,NULL,NULL,'2022-05-23 11:54:30','2022-05-23 11:54:33');

/*Table structure for table `chart` */

DROP TABLE IF EXISTS `chart`;

CREATE TABLE `chart` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_produk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(10) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `chart` */

insert  into `chart`(`id`,`id_user`,`id_produk`,`qty`,`created_at`,`updated_at`) values 
(4,'1','2',1,'2022-05-29 16:40:30','2022-05-29 16:40:30');

/*Table structure for table `checkout` */

DROP TABLE IF EXISTS `checkout`;

CREATE TABLE `checkout` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ongkir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('valid','expired','waiting','sampai_tujuan','dalam_pengiriman','reviewed','sudah_transfer') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timeout` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `checkout` */

insert  into `checkout`(`id`,`id_user`,`alamat`,`ongkir`,`total`,`bukti_pembayaran`,`status`,`timeout`,`created_at`,`updated_at`) values 
(1,'1','hadeh','40000','5040000',NULL,'reviewed','2022-05-30 23:21:47','2022-05-29 22:21:47','2022-05-29 22:31:49'),
(2,'1','zxzzz','38000','188000',NULL,'reviewed','2022-05-30 23:22:33','2022-05-29 22:22:33','2022-05-29 22:26:47'),
(3,'1','asdasd','295000','5295000',NULL,'reviewed','2022-05-30 23:29:02','2022-05-29 22:29:02','2022-05-29 22:33:38');

/*Table structure for table `couriers` */

DROP TABLE IF EXISTS `couriers`;

CREATE TABLE `couriers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `courier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `couriers` */

insert  into `couriers`(`id`,`courier`,`created_at`,`updated_at`) values 
(1,'jne','2022-05-23 03:55:34','2022-05-23 03:55:34'),
(2,'sicepat','2022-05-23 03:55:40','2022-05-23 03:55:40');

/*Table structure for table `detail_checkouts` */

DROP TABLE IF EXISTS `detail_checkouts`;

CREATE TABLE `detail_checkouts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_checkout` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diskon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `detail_checkouts` */

insert  into `detail_checkouts`(`id`,`id_checkout`,`id_produk`,`qty`,`diskon`,`harga_produk`,`created_at`,`updated_at`) values 
(1,'1','1','1',NULL,'5000000','2022-05-29 22:21:47','2022-05-29 22:21:47'),
(2,'2','3','1',NULL,'150000','2022-05-29 22:22:33','2022-05-29 22:22:33'),
(3,'3','1','1',NULL,'5000000','2022-05-29 22:29:02','2022-05-29 22:29:02');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2021_12_03_083029_create_kategoris_table',1),
(6,'2021_12_03_083522_create_produks_table',1),
(7,'2021_12_03_094524_create_produk_images_table',1),
(8,'2022_03_02_144714_create_admins_table',1),
(9,'2022_03_23_074016_create_couriers_table',1),
(10,'2022_03_23_083403_create_product_kategori_details_table',1),
(11,'2022_05_21_020406_create_checkout_table',1),
(12,'2022_05_22_143214_create_product_reviews_table',1),
(13,'2022_05_22_221928_create_response_table',1),
(14,'2020_02_21_103241_create_province',2),
(15,'2020_02_21_103658_create_city',2),
(16,'2020_06_17_114209_create_subdistrict',2),
(17,'2022_05_24_190711_create_chart_table',3),
(18,'2022_05_24_191832_create_detail_checkouts_table',4);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `product_categories` */

DROP TABLE IF EXISTS `product_categories`;

CREATE TABLE `product_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product_categories` */

insert  into `product_categories`(`id`,`category_name`,`created_at`,`updated_at`) values 
(1,'makanan','2022-05-23 03:55:19','2022-05-23 03:56:37'),
(2,'handphone','2022-05-23 03:55:25','2022-05-23 03:56:29');

/*Table structure for table `product_images` */

DROP TABLE IF EXISTS `product_images`;

CREATE TABLE `product_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_images_product_id_foreign` (`product_id`),
  CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product_images` */

insert  into `product_images`(`id`,`product_id`,`image_name`,`created_at`,`updated_at`) values 
(1,1,'images/images_1653487932.jpg','2022-05-25 21:47:36','2022-05-25 21:12:12'),
(2,2,'images/images_1653487938.jpeg','2022-05-25 21:47:48','2022-05-25 21:12:18'),
(3,3,'images/images_1653487947.jpg','2022-05-25 21:47:53','2022-05-25 21:12:27'),
(4,4,'images/images_1653487951.jpg','2022-05-25 21:48:01','2022-05-25 21:12:31');

/*Table structure for table `product_kategori_details` */

DROP TABLE IF EXISTS `product_kategori_details`;

CREATE TABLE `product_kategori_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_kategori_details_product_id_foreign` (`product_id`),
  KEY `product_kategori_details_category_id_foreign` (`category_id`),
  CONSTRAINT `product_kategori_details_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`),
  CONSTRAINT `product_kategori_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product_kategori_details` */

insert  into `product_kategori_details`(`id`,`product_id`,`category_id`,`created_at`,`updated_at`) values 
(1,1,2,'2022-05-23 03:57:51','2022-05-23 03:57:51'),
(2,2,1,'2022-05-23 03:57:56','2022-05-23 03:57:56');

/*Table structure for table `product_reviews` */

DROP TABLE IF EXISTS `product_reviews`;

CREATE TABLE `product_reviews` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `star` int(11) NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product_reviews` */

insert  into `product_reviews`(`id`,`id_user`,`id_produk`,`star`,`content`,`created_at`,`updated_at`) values 
(1,'1','1',3,'hp nya bagus','2022-05-23 11:59:48','2022-05-23 11:59:50'),
(2,'1','1',5,'hp aku','2022-05-23 12:01:32','2022-05-23 12:01:33'),
(3,'1','1',4,'saya suka barang ini','2022-05-23 04:17:11','2022-05-23 04:17:11'),
(4,'1','[{\"id\":1,\"id_checkout\":\"1\",\"id_produk\":\"1\",\"qty\":\"1\",\"diskon\":null,\"harga_produk\":\"5000000\",\"created_at\":\"2022-05-29T12:58:46.000000Z\",\"updated_at\":\"2022-05-29T12:58:46.000000Z\"}]',5,'asasd','2022-05-29 20:07:24','2022-05-29 20:07:24'),
(5,'1','1',4,'ascxascasc','2022-05-29 20:08:58','2022-05-29 20:08:58'),
(6,'1','2',4,'nasi padangnya enak','2022-05-29 20:17:37','2022-05-29 20:17:37'),
(7,'1','1',2,'hhh','2022-05-29 22:15:58','2022-05-29 22:15:58'),
(8,'1','1',5,'bagus saya suka','2022-05-29 22:16:19','2022-05-29 22:16:19'),
(9,'1','1',3,'saya suka','2022-05-29 22:17:48','2022-05-29 22:17:48'),
(10,'1','3',4,'barangnya bagus','2022-05-29 22:20:25','2022-05-29 22:20:25'),
(11,'1','1',4,'barang bagus','2022-05-29 22:22:25','2022-05-29 22:22:25'),
(12,'1','3',5,'saya suka barangnnya','2022-05-29 22:23:03','2022-05-29 22:23:03'),
(13,'1','3',4,'s','2022-05-29 22:23:16','2022-05-29 22:23:16'),
(14,'1','{\"id\":3,\"produk_name\":\"Arak Bali\",\"price\":150000,\"description\":\"Arak asli Bali. Harga di atas merupakan harga per botol.\",\"product_rate\":5,\"stock\":93,\"weight\":500,\"created_at\":\"2022-05-22T21:28:38.000000Z\",\"updated_at\":\"2022-05-29T15:22:47.000000Z\"}',4,'s','2022-05-29 22:23:47','2022-05-29 22:23:47'),
(15,'1','{\"id\":2,\"id_user\":\"1\",\"alamat\":\"zxzzz\",\"ongkir\":\"38000\",\"total\":\"188000\",\"bukti_pembayaran\":null,\"status\":\"sampai_tujuan\",\"timeout\":\"2022-05-30 23:22:33\",\"created_at\":\"2022-05-29T15:22:33.000000Z\",\"updated_at\":\"2022-05-29T15:22:47.000000Z\"}',4,'s','2022-05-29 22:25:48','2022-05-29 22:25:48'),
(16,'1','2',4,'s','2022-05-29 22:25:59','2022-05-29 22:25:59'),
(17,'1','2',4,'s','2022-05-29 22:26:47','2022-05-29 22:26:47'),
(18,'1','1',3,'xx','2022-05-29 22:29:41','2022-05-29 22:29:41'),
(19,'1','1',3,'xx','2022-05-29 22:31:49','2022-05-29 22:31:49'),
(20,'1','1',3,'xx','2022-05-29 22:33:38','2022-05-29 22:33:38');

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `produk_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_rate` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products` */

insert  into `products`(`id`,`produk_name`,`price`,`description`,`product_rate`,`stock`,`weight`,`created_at`,`updated_at`) values 
(1,'iphone xr',5000000,'ini adalah hp saya untuk main pubg',5,-10,500,'2022-05-23 03:57:14','2022-05-29 22:29:19'),
(2,'nasi padang',20000,'ini adalah nasi padang terenak yang pernah ada',5,94,200,'2022-05-23 03:57:38','2022-05-29 20:17:08'),
(3,'Arak Bali',150000,'Arak asli Bali. Harga di atas merupakan harga per botol.',5,93,500,'2022-05-23 04:28:38','2022-05-29 22:22:47'),
(4,'Tuak Manis',50000,'Tuak manis premium, harga untuk per botol 300 gr',5,18,500,'2022-05-23 04:30:50','2022-05-28 20:07:58');

/*Table structure for table `response` */

DROP TABLE IF EXISTS `response`;

CREATE TABLE `response` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_review` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_admin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `response` */

insert  into `response`(`id`,`id_review`,`id_admin`,`content`,`created_at`,`updated_at`) values 
(2,'1','1','iyaa emang','2022-05-23 04:24:49','2022-05-23 04:24:49'),
(3,'2','1','memang','2022-05-29 22:40:25','2022-05-29 22:40:25'),
(4,'3','1','saya juga suka','2022-05-29 22:43:18','2022-05-29 22:43:18'),
(5,'2','1','sszz','2022-05-29 22:45:31','2022-05-29 22:45:31'),
(6,'2','1','sszz','2022-05-29 22:45:52','2022-05-29 22:45:52'),
(7,'3','1','saya juga pakai hp  ini','2022-05-29 22:48:21','2022-05-29 22:48:21');

/*Table structure for table `ro_city` */

DROP TABLE IF EXISTS `ro_city`;

CREATE TABLE `ro_city` (
  `city_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_name` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `ro_city` */

insert  into `ro_city`(`city_id`,`province_id`,`province`,`type`,`city_name`,`postal_code`,`created_at`,`updated_at`) values 
('1','21','Nanggroe Aceh Darussalam (NAD)','Kabupaten','Aceh Barat','23681',NULL,NULL),
('10','21','Nanggroe Aceh Darussalam (NAD)','Kabupaten','Aceh Timur','24454',NULL,NULL),
('100','19','Maluku','Kabupaten','Buru Selatan','97351',NULL,NULL),
('101','30','Sulawesi Tenggara','Kabupaten','Buton','93754',NULL,NULL),
('102','30','Sulawesi Tenggara','Kabupaten','Buton Utara','93745',NULL,NULL),
('103','9','Jawa Barat','Kabupaten','Ciamis','46211',NULL,NULL),
('104','9','Jawa Barat','Kabupaten','Cianjur','43217',NULL,NULL),
('105','10','Jawa Tengah','Kabupaten','Cilacap','53211',NULL,NULL),
('106','3','Banten','Kota','Cilegon','42417',NULL,NULL),
('107','9','Jawa Barat','Kota','Cimahi','40512',NULL,NULL),
('108','9','Jawa Barat','Kabupaten','Cirebon','45611',NULL,NULL),
('109','9','Jawa Barat','Kota','Cirebon','45116',NULL,NULL),
('11','21','Nanggroe Aceh Darussalam (NAD)','Kabupaten','Aceh Utara','24382',NULL,NULL),
('110','34','Sumatera Utara','Kabupaten','Dairi','22211',NULL,NULL),
('111','24','Papua','Kabupaten','Deiyai (Deliyai)','98784',NULL,NULL),
('112','34','Sumatera Utara','Kabupaten','Deli Serdang','20511',NULL,NULL),
('113','10','Jawa Tengah','Kabupaten','Demak','59519',NULL,NULL),
('114','1','Bali','Kota','Denpasar','80227',NULL,NULL),
('115','9','Jawa Barat','Kota','Depok','16416',NULL,NULL),
('116','32','Sumatera Barat','Kabupaten','Dharmasraya','27612',NULL,NULL),
('117','24','Papua','Kabupaten','Dogiyai','98866',NULL,NULL),
('118','22','Nusa Tenggara Barat (NTB)','Kabupaten','Dompu','84217',NULL,NULL),
('119','29','Sulawesi Tengah','Kabupaten','Donggala','94341',NULL,NULL),
('12','32','Sumatera Barat','Kabupaten','Agam','26411',NULL,NULL),
('120','26','Riau','Kota','Dumai','28811',NULL,NULL),
('121','33','Sumatera Selatan','Kabupaten','Empat Lawang','31811',NULL,NULL),
('122','23','Nusa Tenggara Timur (NTT)','Kabupaten','Ende','86351',NULL,NULL),
('123','28','Sulawesi Selatan','Kabupaten','Enrekang','91719',NULL,NULL),
('124','25','Papua Barat','Kabupaten','Fakfak','98651',NULL,NULL),
('125','23','Nusa Tenggara Timur (NTT)','Kabupaten','Flores Timur','86213',NULL,NULL),
('126','9','Jawa Barat','Kabupaten','Garut','44126',NULL,NULL),
('127','21','Nanggroe Aceh Darussalam (NAD)','Kabupaten','Gayo Lues','24653',NULL,NULL),
('128','1','Bali','Kabupaten','Gianyar','80519',NULL,NULL),
('129','7','Gorontalo','Kabupaten','Gorontalo','96218',NULL,NULL),
('13','23','Nusa Tenggara Timur (NTT)','Kabupaten','Alor','85811',NULL,NULL),
('130','7','Gorontalo','Kota','Gorontalo','96115',NULL,NULL),
('131','7','Gorontalo','Kabupaten','Gorontalo Utara','96611',NULL,NULL),
('132','28','Sulawesi Selatan','Kabupaten','Gowa','92111',NULL,NULL),
('133','11','Jawa Timur','Kabupaten','Gresik','61115',NULL,NULL),
('134','10','Jawa Tengah','Kabupaten','Grobogan','58111',NULL,NULL),
('135','5','DI Yogyakarta','Kabupaten','Gunung Kidul','55812',NULL,NULL),
('136','14','Kalimantan Tengah','Kabupaten','Gunung Mas','74511',NULL,NULL),
('137','34','Sumatera Utara','Kota','Gunungsitoli','22813',NULL,NULL),
('138','20','Maluku Utara','Kabupaten','Halmahera Barat','97757',NULL,NULL),
('139','20','Maluku Utara','Kabupaten','Halmahera Selatan','97911',NULL,NULL),
('14','19','Maluku','Kota','Ambon','97222',NULL,NULL),
('140','20','Maluku Utara','Kabupaten','Halmahera Tengah','97853',NULL,NULL),
('141','20','Maluku Utara','Kabupaten','Halmahera Timur','97862',NULL,NULL),
('142','20','Maluku Utara','Kabupaten','Halmahera Utara','97762',NULL,NULL),
('143','13','Kalimantan Selatan','Kabupaten','Hulu Sungai Selatan','71212',NULL,NULL),
('144','13','Kalimantan Selatan','Kabupaten','Hulu Sungai Tengah','71313',NULL,NULL),
('145','13','Kalimantan Selatan','Kabupaten','Hulu Sungai Utara','71419',NULL,NULL),
('146','34','Sumatera Utara','Kabupaten','Humbang Hasundutan','22457',NULL,NULL),
('147','26','Riau','Kabupaten','Indragiri Hilir','29212',NULL,NULL),
('148','26','Riau','Kabupaten','Indragiri Hulu','29319',NULL,NULL),
('149','9','Jawa Barat','Kabupaten','Indramayu','45214',NULL,NULL),
('15','34','Sumatera Utara','Kabupaten','Asahan','21214',NULL,NULL),
('150','24','Papua','Kabupaten','Intan Jaya','98771',NULL,NULL),
('151','6','DKI Jakarta','Kota','Jakarta Barat','11220',NULL,NULL),
('152','6','DKI Jakarta','Kota','Jakarta Pusat','10540',NULL,NULL),
('153','6','DKI Jakarta','Kota','Jakarta Selatan','12230',NULL,NULL),
('154','6','DKI Jakarta','Kota','Jakarta Timur','13330',NULL,NULL),
('155','6','DKI Jakarta','Kota','Jakarta Utara','14140',NULL,NULL),
('156','8','Jambi','Kota','Jambi','36111',NULL,NULL),
('157','24','Papua','Kabupaten','Jayapura','99352',NULL,NULL),
('158','24','Papua','Kota','Jayapura','99114',NULL,NULL),
('159','24','Papua','Kabupaten','Jayawijaya','99511',NULL,NULL),
('16','24','Papua','Kabupaten','Asmat','99777',NULL,NULL),
('160','11','Jawa Timur','Kabupaten','Jember','68113',NULL,NULL),
('161','1','Bali','Kabupaten','Jembrana','82251',NULL,NULL),
('162','28','Sulawesi Selatan','Kabupaten','Jeneponto','92319',NULL,NULL),
('163','10','Jawa Tengah','Kabupaten','Jepara','59419',NULL,NULL),
('164','11','Jawa Timur','Kabupaten','Jombang','61415',NULL,NULL),
('165','25','Papua Barat','Kabupaten','Kaimana','98671',NULL,NULL),
('166','26','Riau','Kabupaten','Kampar','28411',NULL,NULL),
('167','14','Kalimantan Tengah','Kabupaten','Kapuas','73583',NULL,NULL),
('168','12','Kalimantan Barat','Kabupaten','Kapuas Hulu','78719',NULL,NULL),
('169','10','Jawa Tengah','Kabupaten','Karanganyar','57718',NULL,NULL),
('17','1','Bali','Kabupaten','Badung','80351',NULL,NULL),
('170','1','Bali','Kabupaten','Karangasem','80819',NULL,NULL),
('171','9','Jawa Barat','Kabupaten','Karawang','41311',NULL,NULL),
('172','17','Kepulauan Riau','Kabupaten','Karimun','29611',NULL,NULL),
('173','34','Sumatera Utara','Kabupaten','Karo','22119',NULL,NULL),
('174','14','Kalimantan Tengah','Kabupaten','Katingan','74411',NULL,NULL),
('175','4','Bengkulu','Kabupaten','Kaur','38911',NULL,NULL),
('176','12','Kalimantan Barat','Kabupaten','Kayong Utara','78852',NULL,NULL),
('177','10','Jawa Tengah','Kabupaten','Kebumen','54319',NULL,NULL),
('178','11','Jawa Timur','Kabupaten','Kediri','64184',NULL,NULL),
('179','11','Jawa Timur','Kota','Kediri','64125',NULL,NULL),
('18','13','Kalimantan Selatan','Kabupaten','Balangan','71611',NULL,NULL),
('180','24','Papua','Kabupaten','Keerom','99461',NULL,NULL),
('181','10','Jawa Tengah','Kabupaten','Kendal','51314',NULL,NULL),
('182','30','Sulawesi Tenggara','Kota','Kendari','93126',NULL,NULL),
('183','4','Bengkulu','Kabupaten','Kepahiang','39319',NULL,NULL),
('184','17','Kepulauan Riau','Kabupaten','Kepulauan Anambas','29991',NULL,NULL),
('185','19','Maluku','Kabupaten','Kepulauan Aru','97681',NULL,NULL),
('186','32','Sumatera Barat','Kabupaten','Kepulauan Mentawai','25771',NULL,NULL),
('187','26','Riau','Kabupaten','Kepulauan Meranti','28791',NULL,NULL),
('188','31','Sulawesi Utara','Kabupaten','Kepulauan Sangihe','95819',NULL,NULL),
('189','6','DKI Jakarta','Kabupaten','Kepulauan Seribu','14550',NULL,NULL),
('19','15','Kalimantan Timur','Kota','Balikpapan','76111',NULL,NULL),
('190','31','Sulawesi Utara','Kabupaten','Kepulauan Siau Tagulandang Biaro (Sitaro)','95862',NULL,NULL),
('191','20','Maluku Utara','Kabupaten','Kepulauan Sula','97995',NULL,NULL),
('192','31','Sulawesi Utara','Kabupaten','Kepulauan Talaud','95885',NULL,NULL),
('193','24','Papua','Kabupaten','Kepulauan Yapen (Yapen Waropen)','98211',NULL,NULL),
('194','8','Jambi','Kabupaten','Kerinci','37167',NULL,NULL),
('195','12','Kalimantan Barat','Kabupaten','Ketapang','78874',NULL,NULL),
('196','10','Jawa Tengah','Kabupaten','Klaten','57411',NULL,NULL),
('197','1','Bali','Kabupaten','Klungkung','80719',NULL,NULL),
('198','30','Sulawesi Tenggara','Kabupaten','Kolaka','93511',NULL,NULL),
('199','30','Sulawesi Tenggara','Kabupaten','Kolaka Utara','93911',NULL,NULL),
('2','21','Nanggroe Aceh Darussalam (NAD)','Kabupaten','Aceh Barat Daya','23764',NULL,NULL),
('20','21','Nanggroe Aceh Darussalam (NAD)','Kota','Banda Aceh','23238',NULL,NULL),
('200','30','Sulawesi Tenggara','Kabupaten','Konawe','93411',NULL,NULL),
('201','30','Sulawesi Tenggara','Kabupaten','Konawe Selatan','93811',NULL,NULL),
('202','30','Sulawesi Tenggara','Kabupaten','Konawe Utara','93311',NULL,NULL),
('203','13','Kalimantan Selatan','Kabupaten','Kotabaru','72119',NULL,NULL),
('204','31','Sulawesi Utara','Kota','Kotamobagu','95711',NULL,NULL),
('205','14','Kalimantan Tengah','Kabupaten','Kotawaringin Barat','74119',NULL,NULL),
('206','14','Kalimantan Tengah','Kabupaten','Kotawaringin Timur','74364',NULL,NULL),
('207','26','Riau','Kabupaten','Kuantan Singingi','29519',NULL,NULL),
('208','12','Kalimantan Barat','Kabupaten','Kubu Raya','78311',NULL,NULL),
('209','10','Jawa Tengah','Kabupaten','Kudus','59311',NULL,NULL),
('21','18','Lampung','Kota','Bandar Lampung','35139',NULL,NULL),
('210','5','DI Yogyakarta','Kabupaten','Kulon Progo','55611',NULL,NULL),
('211','9','Jawa Barat','Kabupaten','Kuningan','45511',NULL,NULL),
('212','23','Nusa Tenggara Timur (NTT)','Kabupaten','Kupang','85362',NULL,NULL),
('213','23','Nusa Tenggara Timur (NTT)','Kota','Kupang','85119',NULL,NULL),
('214','15','Kalimantan Timur','Kabupaten','Kutai Barat','75711',NULL,NULL),
('215','15','Kalimantan Timur','Kabupaten','Kutai Kartanegara','75511',NULL,NULL),
('216','15','Kalimantan Timur','Kabupaten','Kutai Timur','75611',NULL,NULL),
('217','34','Sumatera Utara','Kabupaten','Labuhan Batu','21412',NULL,NULL),
('218','34','Sumatera Utara','Kabupaten','Labuhan Batu Selatan','21511',NULL,NULL),
('219','34','Sumatera Utara','Kabupaten','Labuhan Batu Utara','21711',NULL,NULL),
('22','9','Jawa Barat','Kabupaten','Bandung','40311',NULL,NULL),
('220','33','Sumatera Selatan','Kabupaten','Lahat','31419',NULL,NULL),
('221','14','Kalimantan Tengah','Kabupaten','Lamandau','74611',NULL,NULL),
('222','11','Jawa Timur','Kabupaten','Lamongan','64125',NULL,NULL),
('223','18','Lampung','Kabupaten','Lampung Barat','34814',NULL,NULL),
('224','18','Lampung','Kabupaten','Lampung Selatan','35511',NULL,NULL),
('225','18','Lampung','Kabupaten','Lampung Tengah','34212',NULL,NULL),
('226','18','Lampung','Kabupaten','Lampung Timur','34319',NULL,NULL),
('227','18','Lampung','Kabupaten','Lampung Utara','34516',NULL,NULL),
('228','12','Kalimantan Barat','Kabupaten','Landak','78319',NULL,NULL),
('229','34','Sumatera Utara','Kabupaten','Langkat','20811',NULL,NULL),
('23','9','Jawa Barat','Kota','Bandung','40111',NULL,NULL),
('230','21','Nanggroe Aceh Darussalam (NAD)','Kota','Langsa','24412',NULL,NULL),
('231','24','Papua','Kabupaten','Lanny Jaya','99531',NULL,NULL),
('232','3','Banten','Kabupaten','Lebak','42319',NULL,NULL),
('233','4','Bengkulu','Kabupaten','Lebong','39264',NULL,NULL),
('234','23','Nusa Tenggara Timur (NTT)','Kabupaten','Lembata','86611',NULL,NULL),
('235','21','Nanggroe Aceh Darussalam (NAD)','Kota','Lhokseumawe','24352',NULL,NULL),
('236','32','Sumatera Barat','Kabupaten','Lima Puluh Koto/Kota','26671',NULL,NULL),
('237','17','Kepulauan Riau','Kabupaten','Lingga','29811',NULL,NULL),
('238','22','Nusa Tenggara Barat (NTB)','Kabupaten','Lombok Barat','83311',NULL,NULL),
('239','22','Nusa Tenggara Barat (NTB)','Kabupaten','Lombok Tengah','83511',NULL,NULL),
('24','9','Jawa Barat','Kabupaten','Bandung Barat','40721',NULL,NULL),
('240','22','Nusa Tenggara Barat (NTB)','Kabupaten','Lombok Timur','83612',NULL,NULL),
('241','22','Nusa Tenggara Barat (NTB)','Kabupaten','Lombok Utara','83711',NULL,NULL),
('242','33','Sumatera Selatan','Kota','Lubuk Linggau','31614',NULL,NULL),
('243','11','Jawa Timur','Kabupaten','Lumajang','67319',NULL,NULL),
('244','28','Sulawesi Selatan','Kabupaten','Luwu','91994',NULL,NULL),
('245','28','Sulawesi Selatan','Kabupaten','Luwu Timur','92981',NULL,NULL),
('246','28','Sulawesi Selatan','Kabupaten','Luwu Utara','92911',NULL,NULL),
('247','11','Jawa Timur','Kabupaten','Madiun','63153',NULL,NULL),
('248','11','Jawa Timur','Kota','Madiun','63122',NULL,NULL),
('249','10','Jawa Tengah','Kabupaten','Magelang','56519',NULL,NULL),
('25','29','Sulawesi Tengah','Kabupaten','Banggai','94711',NULL,NULL),
('250','10','Jawa Tengah','Kota','Magelang','56133',NULL,NULL),
('251','11','Jawa Timur','Kabupaten','Magetan','63314',NULL,NULL),
('252','9','Jawa Barat','Kabupaten','Majalengka','45412',NULL,NULL),
('253','27','Sulawesi Barat','Kabupaten','Majene','91411',NULL,NULL),
('254','28','Sulawesi Selatan','Kota','Makassar','90111',NULL,NULL),
('255','11','Jawa Timur','Kabupaten','Malang','65163',NULL,NULL),
('256','11','Jawa Timur','Kota','Malang','65112',NULL,NULL),
('257','16','Kalimantan Utara','Kabupaten','Malinau','77511',NULL,NULL),
('258','19','Maluku','Kabupaten','Maluku Barat Daya','97451',NULL,NULL),
('259','19','Maluku','Kabupaten','Maluku Tengah','97513',NULL,NULL),
('26','29','Sulawesi Tengah','Kabupaten','Banggai Kepulauan','94881',NULL,NULL),
('260','19','Maluku','Kabupaten','Maluku Tenggara','97651',NULL,NULL),
('261','19','Maluku','Kabupaten','Maluku Tenggara Barat','97465',NULL,NULL),
('262','27','Sulawesi Barat','Kabupaten','Mamasa','91362',NULL,NULL),
('263','24','Papua','Kabupaten','Mamberamo Raya','99381',NULL,NULL),
('264','24','Papua','Kabupaten','Mamberamo Tengah','99553',NULL,NULL),
('265','27','Sulawesi Barat','Kabupaten','Mamuju','91519',NULL,NULL),
('266','27','Sulawesi Barat','Kabupaten','Mamuju Utara','91571',NULL,NULL),
('267','31','Sulawesi Utara','Kota','Manado','95247',NULL,NULL),
('268','34','Sumatera Utara','Kabupaten','Mandailing Natal','22916',NULL,NULL),
('269','23','Nusa Tenggara Timur (NTT)','Kabupaten','Manggarai','86551',NULL,NULL),
('27','2','Bangka Belitung','Kabupaten','Bangka','33212',NULL,NULL),
('270','23','Nusa Tenggara Timur (NTT)','Kabupaten','Manggarai Barat','86711',NULL,NULL),
('271','23','Nusa Tenggara Timur (NTT)','Kabupaten','Manggarai Timur','86811',NULL,NULL),
('272','25','Papua Barat','Kabupaten','Manokwari','98311',NULL,NULL),
('273','25','Papua Barat','Kabupaten','Manokwari Selatan','98355',NULL,NULL),
('274','24','Papua','Kabupaten','Mappi','99853',NULL,NULL),
('275','28','Sulawesi Selatan','Kabupaten','Maros','90511',NULL,NULL),
('276','22','Nusa Tenggara Barat (NTB)','Kota','Mataram','83131',NULL,NULL),
('277','25','Papua Barat','Kabupaten','Maybrat','98051',NULL,NULL),
('278','34','Sumatera Utara','Kota','Medan','20228',NULL,NULL),
('279','12','Kalimantan Barat','Kabupaten','Melawi','78619',NULL,NULL),
('28','2','Bangka Belitung','Kabupaten','Bangka Barat','33315',NULL,NULL),
('280','8','Jambi','Kabupaten','Merangin','37319',NULL,NULL),
('281','24','Papua','Kabupaten','Merauke','99613',NULL,NULL),
('282','18','Lampung','Kabupaten','Mesuji','34911',NULL,NULL),
('283','18','Lampung','Kota','Metro','34111',NULL,NULL),
('284','24','Papua','Kabupaten','Mimika','99962',NULL,NULL),
('285','31','Sulawesi Utara','Kabupaten','Minahasa','95614',NULL,NULL),
('286','31','Sulawesi Utara','Kabupaten','Minahasa Selatan','95914',NULL,NULL),
('287','31','Sulawesi Utara','Kabupaten','Minahasa Tenggara','95995',NULL,NULL),
('288','31','Sulawesi Utara','Kabupaten','Minahasa Utara','95316',NULL,NULL),
('289','11','Jawa Timur','Kabupaten','Mojokerto','61382',NULL,NULL),
('29','2','Bangka Belitung','Kabupaten','Bangka Selatan','33719',NULL,NULL),
('290','11','Jawa Timur','Kota','Mojokerto','61316',NULL,NULL),
('291','29','Sulawesi Tengah','Kabupaten','Morowali','94911',NULL,NULL),
('292','33','Sumatera Selatan','Kabupaten','Muara Enim','31315',NULL,NULL),
('293','8','Jambi','Kabupaten','Muaro Jambi','36311',NULL,NULL),
('294','4','Bengkulu','Kabupaten','Muko Muko','38715',NULL,NULL),
('295','30','Sulawesi Tenggara','Kabupaten','Muna','93611',NULL,NULL),
('296','14','Kalimantan Tengah','Kabupaten','Murung Raya','73911',NULL,NULL),
('297','33','Sumatera Selatan','Kabupaten','Musi Banyuasin','30719',NULL,NULL),
('298','33','Sumatera Selatan','Kabupaten','Musi Rawas','31661',NULL,NULL),
('299','24','Papua','Kabupaten','Nabire','98816',NULL,NULL),
('3','21','Nanggroe Aceh Darussalam (NAD)','Kabupaten','Aceh Besar','23951',NULL,NULL),
('30','2','Bangka Belitung','Kabupaten','Bangka Tengah','33613',NULL,NULL),
('300','21','Nanggroe Aceh Darussalam (NAD)','Kabupaten','Nagan Raya','23674',NULL,NULL),
('301','23','Nusa Tenggara Timur (NTT)','Kabupaten','Nagekeo','86911',NULL,NULL),
('302','17','Kepulauan Riau','Kabupaten','Natuna','29711',NULL,NULL),
('303','24','Papua','Kabupaten','Nduga','99541',NULL,NULL),
('304','23','Nusa Tenggara Timur (NTT)','Kabupaten','Ngada','86413',NULL,NULL),
('305','11','Jawa Timur','Kabupaten','Nganjuk','64414',NULL,NULL),
('306','11','Jawa Timur','Kabupaten','Ngawi','63219',NULL,NULL),
('307','34','Sumatera Utara','Kabupaten','Nias','22876',NULL,NULL),
('308','34','Sumatera Utara','Kabupaten','Nias Barat','22895',NULL,NULL),
('309','34','Sumatera Utara','Kabupaten','Nias Selatan','22865',NULL,NULL),
('31','11','Jawa Timur','Kabupaten','Bangkalan','69118',NULL,NULL),
('310','34','Sumatera Utara','Kabupaten','Nias Utara','22856',NULL,NULL),
('311','16','Kalimantan Utara','Kabupaten','Nunukan','77421',NULL,NULL),
('312','33','Sumatera Selatan','Kabupaten','Ogan Ilir','30811',NULL,NULL),
('313','33','Sumatera Selatan','Kabupaten','Ogan Komering Ilir','30618',NULL,NULL),
('314','33','Sumatera Selatan','Kabupaten','Ogan Komering Ulu','32112',NULL,NULL),
('315','33','Sumatera Selatan','Kabupaten','Ogan Komering Ulu Selatan','32211',NULL,NULL),
('316','33','Sumatera Selatan','Kabupaten','Ogan Komering Ulu Timur','32312',NULL,NULL),
('317','11','Jawa Timur','Kabupaten','Pacitan','63512',NULL,NULL),
('318','32','Sumatera Barat','Kota','Padang','25112',NULL,NULL),
('319','34','Sumatera Utara','Kabupaten','Padang Lawas','22763',NULL,NULL),
('32','1','Bali','Kabupaten','Bangli','80619',NULL,NULL),
('320','34','Sumatera Utara','Kabupaten','Padang Lawas Utara','22753',NULL,NULL),
('321','32','Sumatera Barat','Kota','Padang Panjang','27122',NULL,NULL),
('322','32','Sumatera Barat','Kabupaten','Padang Pariaman','25583',NULL,NULL),
('323','34','Sumatera Utara','Kota','Padang Sidempuan','22727',NULL,NULL),
('324','33','Sumatera Selatan','Kota','Pagar Alam','31512',NULL,NULL),
('325','34','Sumatera Utara','Kabupaten','Pakpak Bharat','22272',NULL,NULL),
('326','14','Kalimantan Tengah','Kota','Palangka Raya','73112',NULL,NULL),
('327','33','Sumatera Selatan','Kota','Palembang','30111',NULL,NULL),
('328','28','Sulawesi Selatan','Kota','Palopo','91911',NULL,NULL),
('329','29','Sulawesi Tengah','Kota','Palu','94111',NULL,NULL),
('33','13','Kalimantan Selatan','Kabupaten','Banjar','70619',NULL,NULL),
('330','11','Jawa Timur','Kabupaten','Pamekasan','69319',NULL,NULL),
('331','3','Banten','Kabupaten','Pandeglang','42212',NULL,NULL),
('332','9','Jawa Barat','Kabupaten','Pangandaran','46511',NULL,NULL),
('333','28','Sulawesi Selatan','Kabupaten','Pangkajene Kepulauan','90611',NULL,NULL),
('334','2','Bangka Belitung','Kota','Pangkal Pinang','33115',NULL,NULL),
('335','24','Papua','Kabupaten','Paniai','98765',NULL,NULL),
('336','28','Sulawesi Selatan','Kota','Parepare','91123',NULL,NULL),
('337','32','Sumatera Barat','Kota','Pariaman','25511',NULL,NULL),
('338','29','Sulawesi Tengah','Kabupaten','Parigi Moutong','94411',NULL,NULL),
('339','32','Sumatera Barat','Kabupaten','Pasaman','26318',NULL,NULL),
('34','9','Jawa Barat','Kota','Banjar','46311',NULL,NULL),
('340','32','Sumatera Barat','Kabupaten','Pasaman Barat','26511',NULL,NULL),
('341','15','Kalimantan Timur','Kabupaten','Paser','76211',NULL,NULL),
('342','11','Jawa Timur','Kabupaten','Pasuruan','67153',NULL,NULL),
('343','11','Jawa Timur','Kota','Pasuruan','67118',NULL,NULL),
('344','10','Jawa Tengah','Kabupaten','Pati','59114',NULL,NULL),
('345','32','Sumatera Barat','Kota','Payakumbuh','26213',NULL,NULL),
('346','25','Papua Barat','Kabupaten','Pegunungan Arfak','98354',NULL,NULL),
('347','24','Papua','Kabupaten','Pegunungan Bintang','99573',NULL,NULL),
('348','10','Jawa Tengah','Kabupaten','Pekalongan','51161',NULL,NULL),
('349','10','Jawa Tengah','Kota','Pekalongan','51122',NULL,NULL),
('35','13','Kalimantan Selatan','Kota','Banjarbaru','70712',NULL,NULL),
('350','26','Riau','Kota','Pekanbaru','28112',NULL,NULL),
('351','26','Riau','Kabupaten','Pelalawan','28311',NULL,NULL),
('352','10','Jawa Tengah','Kabupaten','Pemalang','52319',NULL,NULL),
('353','34','Sumatera Utara','Kota','Pematang Siantar','21126',NULL,NULL),
('354','15','Kalimantan Timur','Kabupaten','Penajam Paser Utara','76311',NULL,NULL),
('355','18','Lampung','Kabupaten','Pesawaran','35312',NULL,NULL),
('356','18','Lampung','Kabupaten','Pesisir Barat','35974',NULL,NULL),
('357','32','Sumatera Barat','Kabupaten','Pesisir Selatan','25611',NULL,NULL),
('358','21','Nanggroe Aceh Darussalam (NAD)','Kabupaten','Pidie','24116',NULL,NULL),
('359','21','Nanggroe Aceh Darussalam (NAD)','Kabupaten','Pidie Jaya','24186',NULL,NULL),
('36','13','Kalimantan Selatan','Kota','Banjarmasin','70117',NULL,NULL),
('360','28','Sulawesi Selatan','Kabupaten','Pinrang','91251',NULL,NULL),
('361','7','Gorontalo','Kabupaten','Pohuwato','96419',NULL,NULL),
('362','27','Sulawesi Barat','Kabupaten','Polewali Mandar','91311',NULL,NULL),
('363','11','Jawa Timur','Kabupaten','Ponorogo','63411',NULL,NULL),
('364','12','Kalimantan Barat','Kabupaten','Pontianak','78971',NULL,NULL),
('365','12','Kalimantan Barat','Kota','Pontianak','78112',NULL,NULL),
('366','29','Sulawesi Tengah','Kabupaten','Poso','94615',NULL,NULL),
('367','33','Sumatera Selatan','Kota','Prabumulih','31121',NULL,NULL),
('368','18','Lampung','Kabupaten','Pringsewu','35719',NULL,NULL),
('369','11','Jawa Timur','Kabupaten','Probolinggo','67282',NULL,NULL),
('37','10','Jawa Tengah','Kabupaten','Banjarnegara','53419',NULL,NULL),
('370','11','Jawa Timur','Kota','Probolinggo','67215',NULL,NULL),
('371','14','Kalimantan Tengah','Kabupaten','Pulang Pisau','74811',NULL,NULL),
('372','20','Maluku Utara','Kabupaten','Pulau Morotai','97771',NULL,NULL),
('373','24','Papua','Kabupaten','Puncak','98981',NULL,NULL),
('374','24','Papua','Kabupaten','Puncak Jaya','98979',NULL,NULL),
('375','10','Jawa Tengah','Kabupaten','Purbalingga','53312',NULL,NULL),
('376','9','Jawa Barat','Kabupaten','Purwakarta','41119',NULL,NULL),
('377','10','Jawa Tengah','Kabupaten','Purworejo','54111',NULL,NULL),
('378','25','Papua Barat','Kabupaten','Raja Ampat','98489',NULL,NULL),
('379','4','Bengkulu','Kabupaten','Rejang Lebong','39112',NULL,NULL),
('38','28','Sulawesi Selatan','Kabupaten','Bantaeng','92411',NULL,NULL),
('380','10','Jawa Tengah','Kabupaten','Rembang','59219',NULL,NULL),
('381','26','Riau','Kabupaten','Rokan Hilir','28992',NULL,NULL),
('382','26','Riau','Kabupaten','Rokan Hulu','28511',NULL,NULL),
('383','23','Nusa Tenggara Timur (NTT)','Kabupaten','Rote Ndao','85982',NULL,NULL),
('384','21','Nanggroe Aceh Darussalam (NAD)','Kota','Sabang','23512',NULL,NULL),
('385','23','Nusa Tenggara Timur (NTT)','Kabupaten','Sabu Raijua','85391',NULL,NULL),
('386','10','Jawa Tengah','Kota','Salatiga','50711',NULL,NULL),
('387','15','Kalimantan Timur','Kota','Samarinda','75133',NULL,NULL),
('388','12','Kalimantan Barat','Kabupaten','Sambas','79453',NULL,NULL),
('389','34','Sumatera Utara','Kabupaten','Samosir','22392',NULL,NULL),
('39','5','DI Yogyakarta','Kabupaten','Bantul','55715',NULL,NULL),
('390','11','Jawa Timur','Kabupaten','Sampang','69219',NULL,NULL),
('391','12','Kalimantan Barat','Kabupaten','Sanggau','78557',NULL,NULL),
('392','24','Papua','Kabupaten','Sarmi','99373',NULL,NULL),
('393','8','Jambi','Kabupaten','Sarolangun','37419',NULL,NULL),
('394','32','Sumatera Barat','Kota','Sawah Lunto','27416',NULL,NULL),
('395','12','Kalimantan Barat','Kabupaten','Sekadau','79583',NULL,NULL),
('396','28','Sulawesi Selatan','Kabupaten','Selayar (Kepulauan Selayar)','92812',NULL,NULL),
('397','4','Bengkulu','Kabupaten','Seluma','38811',NULL,NULL),
('398','10','Jawa Tengah','Kabupaten','Semarang','50511',NULL,NULL),
('399','10','Jawa Tengah','Kota','Semarang','50135',NULL,NULL),
('4','21','Nanggroe Aceh Darussalam (NAD)','Kabupaten','Aceh Jaya','23654',NULL,NULL),
('40','33','Sumatera Selatan','Kabupaten','Banyuasin','30911',NULL,NULL),
('400','19','Maluku','Kabupaten','Seram Bagian Barat','97561',NULL,NULL),
('401','19','Maluku','Kabupaten','Seram Bagian Timur','97581',NULL,NULL),
('402','3','Banten','Kabupaten','Serang','42182',NULL,NULL),
('403','3','Banten','Kota','Serang','42111',NULL,NULL),
('404','34','Sumatera Utara','Kabupaten','Serdang Bedagai','20915',NULL,NULL),
('405','14','Kalimantan Tengah','Kabupaten','Seruyan','74211',NULL,NULL),
('406','26','Riau','Kabupaten','Siak','28623',NULL,NULL),
('407','34','Sumatera Utara','Kota','Sibolga','22522',NULL,NULL),
('408','28','Sulawesi Selatan','Kabupaten','Sidenreng Rappang/Rapang','91613',NULL,NULL),
('409','11','Jawa Timur','Kabupaten','Sidoarjo','61219',NULL,NULL),
('41','10','Jawa Tengah','Kabupaten','Banyumas','53114',NULL,NULL),
('410','29','Sulawesi Tengah','Kabupaten','Sigi','94364',NULL,NULL),
('411','32','Sumatera Barat','Kabupaten','Sijunjung (Sawah Lunto Sijunjung)','27511',NULL,NULL),
('412','23','Nusa Tenggara Timur (NTT)','Kabupaten','Sikka','86121',NULL,NULL),
('413','34','Sumatera Utara','Kabupaten','Simalungun','21162',NULL,NULL),
('414','21','Nanggroe Aceh Darussalam (NAD)','Kabupaten','Simeulue','23891',NULL,NULL),
('415','12','Kalimantan Barat','Kota','Singkawang','79117',NULL,NULL),
('416','28','Sulawesi Selatan','Kabupaten','Sinjai','92615',NULL,NULL),
('417','12','Kalimantan Barat','Kabupaten','Sintang','78619',NULL,NULL),
('418','11','Jawa Timur','Kabupaten','Situbondo','68316',NULL,NULL),
('419','5','DI Yogyakarta','Kabupaten','Sleman','55513',NULL,NULL),
('42','11','Jawa Timur','Kabupaten','Banyuwangi','68416',NULL,NULL),
('420','32','Sumatera Barat','Kabupaten','Solok','27365',NULL,NULL),
('421','32','Sumatera Barat','Kota','Solok','27315',NULL,NULL),
('422','32','Sumatera Barat','Kabupaten','Solok Selatan','27779',NULL,NULL),
('423','28','Sulawesi Selatan','Kabupaten','Soppeng','90812',NULL,NULL),
('424','25','Papua Barat','Kabupaten','Sorong','98431',NULL,NULL),
('425','25','Papua Barat','Kota','Sorong','98411',NULL,NULL),
('426','25','Papua Barat','Kabupaten','Sorong Selatan','98454',NULL,NULL),
('427','10','Jawa Tengah','Kabupaten','Sragen','57211',NULL,NULL),
('428','9','Jawa Barat','Kabupaten','Subang','41215',NULL,NULL),
('429','21','Nanggroe Aceh Darussalam (NAD)','Kota','Subulussalam','24882',NULL,NULL),
('43','13','Kalimantan Selatan','Kabupaten','Barito Kuala','70511',NULL,NULL),
('430','9','Jawa Barat','Kabupaten','Sukabumi','43311',NULL,NULL),
('431','9','Jawa Barat','Kota','Sukabumi','43114',NULL,NULL),
('432','14','Kalimantan Tengah','Kabupaten','Sukamara','74712',NULL,NULL),
('433','10','Jawa Tengah','Kabupaten','Sukoharjo','57514',NULL,NULL),
('434','23','Nusa Tenggara Timur (NTT)','Kabupaten','Sumba Barat','87219',NULL,NULL),
('435','23','Nusa Tenggara Timur (NTT)','Kabupaten','Sumba Barat Daya','87453',NULL,NULL),
('436','23','Nusa Tenggara Timur (NTT)','Kabupaten','Sumba Tengah','87358',NULL,NULL),
('437','23','Nusa Tenggara Timur (NTT)','Kabupaten','Sumba Timur','87112',NULL,NULL),
('438','22','Nusa Tenggara Barat (NTB)','Kabupaten','Sumbawa','84315',NULL,NULL),
('439','22','Nusa Tenggara Barat (NTB)','Kabupaten','Sumbawa Barat','84419',NULL,NULL),
('44','14','Kalimantan Tengah','Kabupaten','Barito Selatan','73711',NULL,NULL),
('440','9','Jawa Barat','Kabupaten','Sumedang','45326',NULL,NULL),
('441','11','Jawa Timur','Kabupaten','Sumenep','69413',NULL,NULL),
('442','8','Jambi','Kota','Sungaipenuh','37113',NULL,NULL),
('443','24','Papua','Kabupaten','Supiori','98164',NULL,NULL),
('444','11','Jawa Timur','Kota','Surabaya','60119',NULL,NULL),
('445','10','Jawa Tengah','Kota','Surakarta (Solo)','57113',NULL,NULL),
('446','13','Kalimantan Selatan','Kabupaten','Tabalong','71513',NULL,NULL),
('447','1','Bali','Kabupaten','Tabanan','82119',NULL,NULL),
('448','28','Sulawesi Selatan','Kabupaten','Takalar','92212',NULL,NULL),
('449','25','Papua Barat','Kabupaten','Tambrauw','98475',NULL,NULL),
('45','14','Kalimantan Tengah','Kabupaten','Barito Timur','73671',NULL,NULL),
('450','16','Kalimantan Utara','Kabupaten','Tana Tidung','77611',NULL,NULL),
('451','28','Sulawesi Selatan','Kabupaten','Tana Toraja','91819',NULL,NULL),
('452','13','Kalimantan Selatan','Kabupaten','Tanah Bumbu','72211',NULL,NULL),
('453','32','Sumatera Barat','Kabupaten','Tanah Datar','27211',NULL,NULL),
('454','13','Kalimantan Selatan','Kabupaten','Tanah Laut','70811',NULL,NULL),
('455','3','Banten','Kabupaten','Tangerang','15914',NULL,NULL),
('456','3','Banten','Kota','Tangerang','15111',NULL,NULL),
('457','3','Banten','Kota','Tangerang Selatan','15435',NULL,NULL),
('458','18','Lampung','Kabupaten','Tanggamus','35619',NULL,NULL),
('459','34','Sumatera Utara','Kota','Tanjung Balai','21321',NULL,NULL),
('46','14','Kalimantan Tengah','Kabupaten','Barito Utara','73881',NULL,NULL),
('460','8','Jambi','Kabupaten','Tanjung Jabung Barat','36513',NULL,NULL),
('461','8','Jambi','Kabupaten','Tanjung Jabung Timur','36719',NULL,NULL),
('462','17','Kepulauan Riau','Kota','Tanjung Pinang','29111',NULL,NULL),
('463','34','Sumatera Utara','Kabupaten','Tapanuli Selatan','22742',NULL,NULL),
('464','34','Sumatera Utara','Kabupaten','Tapanuli Tengah','22611',NULL,NULL),
('465','34','Sumatera Utara','Kabupaten','Tapanuli Utara','22414',NULL,NULL),
('466','13','Kalimantan Selatan','Kabupaten','Tapin','71119',NULL,NULL),
('467','16','Kalimantan Utara','Kota','Tarakan','77114',NULL,NULL),
('468','9','Jawa Barat','Kabupaten','Tasikmalaya','46411',NULL,NULL),
('469','9','Jawa Barat','Kota','Tasikmalaya','46116',NULL,NULL),
('47','28','Sulawesi Selatan','Kabupaten','Barru','90719',NULL,NULL),
('470','34','Sumatera Utara','Kota','Tebing Tinggi','20632',NULL,NULL),
('471','8','Jambi','Kabupaten','Tebo','37519',NULL,NULL),
('472','10','Jawa Tengah','Kabupaten','Tegal','52419',NULL,NULL),
('473','10','Jawa Tengah','Kota','Tegal','52114',NULL,NULL),
('474','25','Papua Barat','Kabupaten','Teluk Bintuni','98551',NULL,NULL),
('475','25','Papua Barat','Kabupaten','Teluk Wondama','98591',NULL,NULL),
('476','10','Jawa Tengah','Kabupaten','Temanggung','56212',NULL,NULL),
('477','20','Maluku Utara','Kota','Ternate','97714',NULL,NULL),
('478','20','Maluku Utara','Kota','Tidore Kepulauan','97815',NULL,NULL),
('479','23','Nusa Tenggara Timur (NTT)','Kabupaten','Timor Tengah Selatan','85562',NULL,NULL),
('48','17','Kepulauan Riau','Kota','Batam','29413',NULL,NULL),
('480','23','Nusa Tenggara Timur (NTT)','Kabupaten','Timor Tengah Utara','85612',NULL,NULL),
('481','34','Sumatera Utara','Kabupaten','Toba Samosir','22316',NULL,NULL),
('482','29','Sulawesi Tengah','Kabupaten','Tojo Una-Una','94683',NULL,NULL),
('483','29','Sulawesi Tengah','Kabupaten','Toli-Toli','94542',NULL,NULL),
('484','24','Papua','Kabupaten','Tolikara','99411',NULL,NULL),
('485','31','Sulawesi Utara','Kota','Tomohon','95416',NULL,NULL),
('486','28','Sulawesi Selatan','Kabupaten','Toraja Utara','91831',NULL,NULL),
('487','11','Jawa Timur','Kabupaten','Trenggalek','66312',NULL,NULL),
('488','19','Maluku','Kota','Tual','97612',NULL,NULL),
('489','11','Jawa Timur','Kabupaten','Tuban','62319',NULL,NULL),
('49','10','Jawa Tengah','Kabupaten','Batang','51211',NULL,NULL),
('490','18','Lampung','Kabupaten','Tulang Bawang','34613',NULL,NULL),
('491','18','Lampung','Kabupaten','Tulang Bawang Barat','34419',NULL,NULL),
('492','11','Jawa Timur','Kabupaten','Tulungagung','66212',NULL,NULL),
('493','28','Sulawesi Selatan','Kabupaten','Wajo','90911',NULL,NULL),
('494','30','Sulawesi Tenggara','Kabupaten','Wakatobi','93791',NULL,NULL),
('495','24','Papua','Kabupaten','Waropen','98269',NULL,NULL),
('496','18','Lampung','Kabupaten','Way Kanan','34711',NULL,NULL),
('497','10','Jawa Tengah','Kabupaten','Wonogiri','57619',NULL,NULL),
('498','10','Jawa Tengah','Kabupaten','Wonosobo','56311',NULL,NULL),
('499','24','Papua','Kabupaten','Yahukimo','99041',NULL,NULL),
('5','21','Nanggroe Aceh Darussalam (NAD)','Kabupaten','Aceh Selatan','23719',NULL,NULL),
('50','8','Jambi','Kabupaten','Batang Hari','36613',NULL,NULL),
('500','24','Papua','Kabupaten','Yalimo','99481',NULL,NULL),
('501','5','DI Yogyakarta','Kota','Yogyakarta','55111',NULL,NULL),
('51','11','Jawa Timur','Kota','Batu','65311',NULL,NULL),
('52','34','Sumatera Utara','Kabupaten','Batu Bara','21655',NULL,NULL),
('53','30','Sulawesi Tenggara','Kota','Bau-Bau','93719',NULL,NULL),
('54','9','Jawa Barat','Kabupaten','Bekasi','17837',NULL,NULL),
('55','9','Jawa Barat','Kota','Bekasi','17121',NULL,NULL),
('56','2','Bangka Belitung','Kabupaten','Belitung','33419',NULL,NULL),
('57','2','Bangka Belitung','Kabupaten','Belitung Timur','33519',NULL,NULL),
('58','23','Nusa Tenggara Timur (NTT)','Kabupaten','Belu','85711',NULL,NULL),
('59','21','Nanggroe Aceh Darussalam (NAD)','Kabupaten','Bener Meriah','24581',NULL,NULL),
('6','21','Nanggroe Aceh Darussalam (NAD)','Kabupaten','Aceh Singkil','24785',NULL,NULL),
('60','26','Riau','Kabupaten','Bengkalis','28719',NULL,NULL),
('61','12','Kalimantan Barat','Kabupaten','Bengkayang','79213',NULL,NULL),
('62','4','Bengkulu','Kota','Bengkulu','38229',NULL,NULL),
('63','4','Bengkulu','Kabupaten','Bengkulu Selatan','38519',NULL,NULL),
('64','4','Bengkulu','Kabupaten','Bengkulu Tengah','38319',NULL,NULL),
('65','4','Bengkulu','Kabupaten','Bengkulu Utara','38619',NULL,NULL),
('66','15','Kalimantan Timur','Kabupaten','Berau','77311',NULL,NULL),
('67','24','Papua','Kabupaten','Biak Numfor','98119',NULL,NULL),
('68','22','Nusa Tenggara Barat (NTB)','Kabupaten','Bima','84171',NULL,NULL),
('69','22','Nusa Tenggara Barat (NTB)','Kota','Bima','84139',NULL,NULL),
('7','21','Nanggroe Aceh Darussalam (NAD)','Kabupaten','Aceh Tamiang','24476',NULL,NULL),
('70','34','Sumatera Utara','Kota','Binjai','20712',NULL,NULL),
('71','17','Kepulauan Riau','Kabupaten','Bintan','29135',NULL,NULL),
('72','21','Nanggroe Aceh Darussalam (NAD)','Kabupaten','Bireuen','24219',NULL,NULL),
('73','31','Sulawesi Utara','Kota','Bitung','95512',NULL,NULL),
('74','11','Jawa Timur','Kabupaten','Blitar','66171',NULL,NULL),
('75','11','Jawa Timur','Kota','Blitar','66124',NULL,NULL),
('76','10','Jawa Tengah','Kabupaten','Blora','58219',NULL,NULL),
('77','7','Gorontalo','Kabupaten','Boalemo','96319',NULL,NULL),
('78','9','Jawa Barat','Kabupaten','Bogor','16911',NULL,NULL),
('79','9','Jawa Barat','Kota','Bogor','16119',NULL,NULL),
('8','21','Nanggroe Aceh Darussalam (NAD)','Kabupaten','Aceh Tengah','24511',NULL,NULL),
('80','11','Jawa Timur','Kabupaten','Bojonegoro','62119',NULL,NULL),
('81','31','Sulawesi Utara','Kabupaten','Bolaang Mongondow (Bolmong)','95755',NULL,NULL),
('82','31','Sulawesi Utara','Kabupaten','Bolaang Mongondow Selatan','95774',NULL,NULL),
('83','31','Sulawesi Utara','Kabupaten','Bolaang Mongondow Timur','95783',NULL,NULL),
('84','31','Sulawesi Utara','Kabupaten','Bolaang Mongondow Utara','95765',NULL,NULL),
('85','30','Sulawesi Tenggara','Kabupaten','Bombana','93771',NULL,NULL),
('86','11','Jawa Timur','Kabupaten','Bondowoso','68219',NULL,NULL),
('87','28','Sulawesi Selatan','Kabupaten','Bone','92713',NULL,NULL),
('88','7','Gorontalo','Kabupaten','Bone Bolango','96511',NULL,NULL),
('89','15','Kalimantan Timur','Kota','Bontang','75313',NULL,NULL),
('9','21','Nanggroe Aceh Darussalam (NAD)','Kabupaten','Aceh Tenggara','24611',NULL,NULL),
('90','24','Papua','Kabupaten','Boven Digoel','99662',NULL,NULL),
('91','10','Jawa Tengah','Kabupaten','Boyolali','57312',NULL,NULL),
('92','10','Jawa Tengah','Kabupaten','Brebes','52212',NULL,NULL),
('93','32','Sumatera Barat','Kota','Bukittinggi','26115',NULL,NULL),
('94','1','Bali','Kabupaten','Buleleng','81111',NULL,NULL),
('95','28','Sulawesi Selatan','Kabupaten','Bulukumba','92511',NULL,NULL),
('96','16','Kalimantan Utara','Kabupaten','Bulungan (Bulongan)','77211',NULL,NULL),
('97','8','Jambi','Kabupaten','Bungo','37216',NULL,NULL),
('98','29','Sulawesi Tengah','Kabupaten','Buol','94564',NULL,NULL),
('99','19','Maluku','Kabupaten','Buru','97371',NULL,NULL);

/*Table structure for table `ro_province` */

DROP TABLE IF EXISTS `ro_province`;

CREATE TABLE `ro_province` (
  `province_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`province_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `ro_province` */

insert  into `ro_province`(`province_id`,`province`,`created_at`,`updated_at`) values 
('1','Bali',NULL,NULL),
('10','Jawa Tengah',NULL,NULL),
('11','Jawa Timur',NULL,NULL),
('12','Kalimantan Barat',NULL,NULL),
('13','Kalimantan Selatan',NULL,NULL),
('14','Kalimantan Tengah',NULL,NULL),
('15','Kalimantan Timur',NULL,NULL),
('16','Kalimantan Utara',NULL,NULL),
('17','Kepulauan Riau',NULL,NULL),
('18','Lampung',NULL,NULL),
('19','Maluku',NULL,NULL),
('2','Bangka Belitung',NULL,NULL),
('20','Maluku Utara',NULL,NULL),
('21','Nanggroe Aceh Darussalam (NAD)',NULL,NULL),
('22','Nusa Tenggara Barat (NTB)',NULL,NULL),
('23','Nusa Tenggara Timur (NTT)',NULL,NULL),
('24','Papua',NULL,NULL),
('25','Papua Barat',NULL,NULL),
('26','Riau',NULL,NULL),
('27','Sulawesi Barat',NULL,NULL),
('28','Sulawesi Selatan',NULL,NULL),
('29','Sulawesi Tengah',NULL,NULL),
('3','Banten',NULL,NULL),
('30','Sulawesi Tenggara',NULL,NULL),
('31','Sulawesi Utara',NULL,NULL),
('32','Sumatera Barat',NULL,NULL),
('33','Sumatera Selatan',NULL,NULL),
('34','Sumatera Utara',NULL,NULL),
('4','Bengkulu',NULL,NULL),
('5','DI Yogyakarta',NULL,NULL),
('6','DKI Jakarta',NULL,NULL),
('7','Gorontalo',NULL,NULL),
('8','Jambi',NULL,NULL),
('9','Jawa Barat',NULL,NULL);

/*Table structure for table `ro_subdistrict` */

DROP TABLE IF EXISTS `ro_subdistrict`;

CREATE TABLE `ro_subdistrict` (
  `subdistrict_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subdistrict_name` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`subdistrict_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `ro_subdistrict` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('aktif','tidak aktif') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`profile_image`,`status`,`email_verified_at`,`password`,`alamat`,`remember_token`,`created_at`,`updated_at`) values 
(1,'william','william@gmail.com',NULL,'aktif',NULL,'$2y$10$OB9WlsJ7XHvt4XGHW3tOe.VhkOZhXhSxS95JlNke3cGXHy6xTOZAi',NULL,NULL,'2022-05-23 02:59:37','2022-05-23 02:59:37'),
(2,'Alexa','lexy@gmail.com',NULL,NULL,NULL,'$2y$10$OB9WlsJ7XHvt4XGHW3tOe.VhkOZhXhSxS95JlNke3cGXHy6xTOZAi',NULL,NULL,'2022-05-23 04:35:07','2022-05-23 04:35:07');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
