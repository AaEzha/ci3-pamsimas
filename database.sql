-- MariaDB dump 10.18  Distrib 10.4.17-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: pamsimas
-- ------------------------------------------------------
-- Server version	10.4.17-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `kas_harian`
--

DROP TABLE IF EXISTS `kas_harian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kas_harian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `ket` varchar(128) NOT NULL,
  `debet` varchar(128) NOT NULL,
  `kredit` varchar(128) NOT NULL,
  `jumlah` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kas_harian`
--

LOCK TABLES `kas_harian` WRITE;
/*!40000 ALTER TABLE `kas_harian` DISABLE KEYS */;
INSERT INTO `kas_harian` VALUES (6,'2021-05-01','Diiterima iuran bulan mei','Rp. 1000.000','-','Rp. 1.000.000'),(11,'2021-05-07','Bayar piutang','-','Rp. 200.000','Rp. 800.000'),(17,'2021-05-08','Beli Perlengkapan ','-','Rp. 100.000','Rp. 700.000');
/*!40000 ALTER TABLE `kas_harian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `bulan` tinyint(2) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `date` date NOT NULL,
  `biaya` varchar(128) NOT NULL,
  `denda` varchar(128) NOT NULL,
  `tagihan` varchar(128) NOT NULL,
  `bukti` varchar(128) NOT NULL,
  `status` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
INSERT INTO `payment` VALUES (5,28,'Yolla Azura Sasmita','Pandam',2,2021,'2021-05-24','15000','2000','17000','payments/octocat.png',0),(6,28,'Yolla Azura Sasmita, S.Kom.','Pandam A',3,2021,'2021-05-31','123','123','123','payments/octocat.png',0),(7,NULL,'Ega Melgia Sasmita','Kp. Ambacang',6,2021,'2021-06-17','15000','20000','35000','payments/1d90d61eb35eef6ad50f8abba74cdef0.png',3),(8,28,'Ega Melgia Sasmita','Kp. Ambacang',6,2021,'2021-06-17','15000','20000','35000','payments/224b3fd47128a98fceecfe42f9cc82c6.png',0);
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pelanggan`
--

DROP TABLE IF EXISTS `pelanggan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `nik` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `pekerjaan` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pelanggan`
--

LOCK TABLES `pelanggan` WRITE;
/*!40000 ALTER TABLE `pelanggan` DISABLE KEYS */;
INSERT INTO `pelanggan` VALUES (13,'yollaazura@gmail.com','Yolla Azura Sasmita','0800987678900011','Pandam A','Pengusaha'),(14,'member@gmail.com','Ega Melgia Sasmita','0800987678900010','Kp. Ambacang','Pegawai Negeri'),(15,'admin@gmail.com','Yolla Azura Sasmita','0800987678900011','Pandam A','Pengusaha');
/*!40000 ALTER TABLE `pelanggan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (27,'Yolla Azura Sasmita, S.Kom.','yollaazura@gmail.com','rsz_1img_8037_mr1617100388892-min.jpg','$2y$10$TdUOJTmnXStTjVx4LX9GkOZkaBdCBwPF3KFtczDsXi8n390u.DlZ2',1,1,1619961876),(28,'Ega Melgia Sasmita','member@gmail.com','default.jpg','$2y$10$d7IkeGlBq6RCENz0r/1a..DoWygJvmQDgQDfG9pkAaoSvuNxqJJS6',2,1,1619962931),(29,'Ferdi Febriansah','koor@gmail.com','default.jpg','$2y$10$KVUMmqwFIRHwaKUruxoniOimMQV2BMz8utAoPsZSF3ST9/ufA2DLK',3,1,1620314884),(30,'Yolla Azura Sasmita, S.Kom.','admin@gmail.com','rsz_1img_8037_mr1617100388892-min.jpg','$2y$10$TdUOJTmnXStTjVx4LX9GkOZkaBdCBwPF3KFtczDsXi8n390u.DlZ2',1,1,1619961876);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_access_menu`
--

DROP TABLE IF EXISTS `user_access_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_access_menu`
--

LOCK TABLES `user_access_menu` WRITE;
/*!40000 ALTER TABLE `user_access_menu` DISABLE KEYS */;
INSERT INTO `user_access_menu` VALUES (1,1,1),(3,2,2),(7,3,4),(8,1,2),(9,1,4),(10,4,2),(11,4,3),(12,4,4);
/*!40000 ALTER TABLE `user_access_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_menu`
--

DROP TABLE IF EXISTS `user_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_menu`
--

LOCK TABLES `user_menu` WRITE;
/*!40000 ALTER TABLE `user_menu` DISABLE KEYS */;
INSERT INTO `user_menu` VALUES (1,'Admin'),(2,'User'),(3,'menu'),(4,'Koordinator');
/*!40000 ALTER TABLE `user_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role`
--

LOCK TABLES `user_role` WRITE;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` VALUES (1,'administrator'),(2,'member'),(3,'koordinator');
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_sub_menu`
--

DROP TABLE IF EXISTS `user_sub_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_sub_menu`
--

LOCK TABLES `user_sub_menu` WRITE;
/*!40000 ALTER TABLE `user_sub_menu` DISABLE KEYS */;
INSERT INTO `user_sub_menu` VALUES (1,1,'Dashboard','admin','fas fa-fw fa-tachometer-alt',1),(2,2,'My Profile','user','fas fa-fw fa-user',1),(3,2,'Edit Profile','user/edit','fas fa-fw fa-user-edit',1),(4,3,'Menu Management','menu','fas fa-fw fa-folder',1),(6,3,'Submenu Management','menu/submenu','fas fa-fw fa-folder-open',1),(8,1,'Role','admin/role','far fa-fw fa-circle',1),(9,2,'Change Password','user/changepassword','fas fa-fw fa-key',1),(12,1,'Kas Harian','admin/kasharian','fas fa-fw fa-wallet',1),(17,2,'Isi Data Pelanggan','user/isipelanggan','fas fa-fw fa-user-plus',1),(18,2,'Pembayaran','user/list','fas fa-fw fa-cash-register',1),(25,1,'Pelanggan','admin/pelanggan','fas fa-fw fa-users',1),(26,1,'Payment','admin/payment','far fa-fw fa-credit-card',1),(27,4,'Dashboard','koordinator','fas fa-fw fa-tachometer-alt',1),(28,4,'Report','koordinator/report','fas  fa-fw fa-chart-line',1);
/*!40000 ALTER TABLE `user_sub_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'pamsimas'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-04 17:12:45
