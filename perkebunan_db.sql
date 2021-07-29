-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.19-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table perkebunan_db.fruit_criterias
CREATE TABLE IF NOT EXISTS `fruit_criterias` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `createby` varchar(20) DEFAULT NULL,
  `lastby` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table perkebunan_db.fruit_criterias: ~5 rows (approximately)
DELETE FROM `fruit_criterias`;
/*!40000 ALTER TABLE `fruit_criterias` DISABLE KEYS */;
INSERT INTO `fruit_criterias` (`id`, `name`, `createby`, `lastby`, `created_at`, `updated_at`) VALUES
	(2, 'Matang', 'admin', 'admin', '2021-07-28 21:37:19', '2021-07-28 21:37:19'),
	(3, 'Lewat Matang', 'admin', 'admin', '2021-07-28 21:37:31', '2021-07-28 21:37:31'),
	(4, 'Busuk', 'admin', 'admin', '2021-07-28 21:37:41', '2021-07-28 21:37:41'),
	(5, 'Tangkai Panjang', 'admin', 'admin', '2021-07-28 21:37:49', '2021-07-28 21:37:49'),
	(6, 'Buah Keras', 'admin', 'admin', '2021-07-28 21:37:57', '2021-07-28 21:37:57');
/*!40000 ALTER TABLE `fruit_criterias` ENABLE KEYS */;

-- Dumping structure for table perkebunan_db.transaction_details
CREATE TABLE IF NOT EXISTS `transaction_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notrans` varchar(20) DEFAULT NULL,
  `idbuah` int(1) DEFAULT NULL,
  `jumlah` int(1) DEFAULT NULL,
  `lastby` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table perkebunan_db.transaction_details: ~1 rows (approximately)
DELETE FROM `transaction_details`;
/*!40000 ALTER TABLE `transaction_details` DISABLE KEYS */;
INSERT INTO `transaction_details` (`id`, `notrans`, `idbuah`, `jumlah`, `lastby`, `created_at`, `updated_at`) VALUES
	(1, 'xxxx22213213', 5, 3, 'admin', '2021-07-29 01:23:14', '2021-07-29 01:34:57');
/*!40000 ALTER TABLE `transaction_details` ENABLE KEYS */;

-- Dumping structure for table perkebunan_db.transaction_headers
CREATE TABLE IF NOT EXISTS `transaction_headers` (
  `notrans` varchar(20) NOT NULL,
  `tanggal` varchar(20) DEFAULT NULL,
  `divisi` int(1) DEFAULT NULL,
  `totalbuah` int(1) DEFAULT NULL,
  `createby` varchar(20) DEFAULT NULL,
  `lastby` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`notrans`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table perkebunan_db.transaction_headers: ~1 rows (approximately)
DELETE FROM `transaction_headers`;
/*!40000 ALTER TABLE `transaction_headers` DISABLE KEYS */;
INSERT INTO `transaction_headers` (`notrans`, `tanggal`, `divisi`, `totalbuah`, `createby`, `lastby`, `created_at`, `updated_at`) VALUES
	('xxxx22213213', '08/03/2021', 2, 4, 'admin', 'admin', '2021-07-29 01:23:47', '2021-07-29 01:30:31');
/*!40000 ALTER TABLE `transaction_headers` ENABLE KEYS */;

-- Dumping structure for table perkebunan_db.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `createby` varchar(20) DEFAULT NULL,
  `lastby` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table perkebunan_db.users: ~2 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `createby`, `lastby`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', 'admin', NULL, NULL),
	(3, 'staff', '6ccb4b7c39a6e77f76ecfa935a855c6c46ad5611', NULL, 'admin', '2021-07-28 21:22:57', '2021-07-28 21:28:55');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
