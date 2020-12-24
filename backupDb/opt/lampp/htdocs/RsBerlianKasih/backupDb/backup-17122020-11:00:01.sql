-- MariaDB dump 10.17  Distrib 10.4.14-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: Berlian
-- ------------------------------------------------------
-- Server version	10.4.14-MariaDB

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
-- Table structure for table `asset`
--

DROP TABLE IF EXISTS `asset`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asset` (
  `id_asset` varchar(128) NOT NULL,
  `nama_k_asset` varchar(128) NOT NULL,
  `nama_asset` varchar(128) NOT NULL,
  `merk` varchar(128) NOT NULL,
  `nama_lokasi` varchar(128) NOT NULL,
  `tahun_perolehan` varchar(128) NOT NULL,
  `harga` varchar(128) NOT NULL,
  `foto` varchar(128) NOT NULL,
  PRIMARY KEY (`id_asset`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asset`
--

LOCK TABLES `asset` WRITE;
/*!40000 ALTER TABLE `asset` DISABLE KEYS */;
INSERT INTO `asset` VALUES ('Ast-001','Kendaraan','Ambulan Z 7808 AB','Toyota GrandMax','R Satpam','2019','80000000','ambulan.jpg');
/*!40000 ALTER TABLE `asset` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dokter`
--

DROP TABLE IF EXISTS `dokter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dokter` (
  `id_dokter` varchar(11) NOT NULL,
  `nama_dokter` varchar(40) NOT NULL,
  `tanggal_lahir` varchar(128) NOT NULL,
  `jenis_kelamin` varchar(12) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `spesialisasi` varchar(20) NOT NULL,
  `lokasi_praktek` varchar(20) NOT NULL,
  `jam_praktek` varchar(20) NOT NULL,
  `foto` varchar(40) NOT NULL,
  PRIMARY KEY (`id_dokter`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dokter`
--

LOCK TABLES `dokter` WRITE;
/*!40000 ALTER TABLE `dokter` DISABLE KEYS */;
/*!40000 ALTER TABLE `dokter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gaji`
--

DROP TABLE IF EXISTS `gaji`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gaji` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_slip` varchar(10) DEFAULT NULL,
  `tgl_slip` varchar(20) DEFAULT NULL,
  `gaji_pokok` int(11) DEFAULT NULL,
  `tunj_jabatan` int(11) DEFAULT NULL,
  `potongan` int(11) DEFAULT NULL,
  `gaji_bersih` int(11) DEFAULT NULL,
  `nip` varchar(9) DEFAULT NULL,
  `id_user` varchar(5) DEFAULT NULL,
  `nama_pegawai` varchar(128) NOT NULL,
  `keterangan` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `no_slip` (`no_slip`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gaji`
--

LOCK TABLES `gaji` WRITE;
/*!40000 ALTER TABLE `gaji` DISABLE KEYS */;
INSERT INTO `gaji` VALUES (20,'sl_e2op/11','11/26/2020',2000,0,0,2000,'Z0004','1','Chef Zuna',''),(21,'sl_2tyw/11','11/26/2020',2000000,1500000,0,3500000,'A0009','1','Agus Anang Suherly',''),(22,'sl_3vjm/11','11/26/2020',1500000,1000000,0,2500000,'K0002','1','Nenden Kalipa',''),(23,'sl_iooh/11','11/26/2020',1500000,1000000,0,2500000,'K0002','1','Nenden Rahayu',''),(24,'sl_6i7n/11','11/26/2020',2000000,1500000,0,3500000,'P0002','1','Intan Rahayu Winata',''),(25,'sl_x8nz/11','11/26/2020',2000000,1500000,0,3500000,'Z00002','1','Moh Zamaludin R',''),(26,'sl_kmli/11','11/26/2020',2000,0,0,2000,'Z0004','1','Chef Zuna',''),(27,'sl_l708/11','11/30/2020',2000000,1500000,20000,3480000,'A0009','1','Agus Anang Suherly','');
/*!40000 ALTER TABLE `gaji` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jabatan`
--

DROP TABLE IF EXISTS `jabatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jabatan` (
  `id_jabatan` varchar(10) NOT NULL,
  `nama_jabatan` varchar(32) DEFAULT NULL,
  `gaji_pokok` int(11) DEFAULT NULL,
  `tunj_jabatan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jabatan`
--

LOCK TABLES `jabatan` WRITE;
/*!40000 ALTER TABLE `jabatan` DISABLE KEYS */;
INSERT INTO `jabatan` VALUES ('J0001','HRD',2000000,1500000),('J0002','KOKI',1500000,1000000),('J0004','Coki',8000,0),('K0002','Security',2000,0);
/*!40000 ALTER TABLE `jabatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kasur`
--

DROP TABLE IF EXISTS `kasur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kasur` (
  `id_kasur` varchar(11) NOT NULL,
  `id_ruangan` varchar(11) NOT NULL,
  `nama_ruangan` varchar(20) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `tarif` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id_kasur`),
  KEY `id_ruangan` (`id_ruangan`),
  KEY `nama_ruangan` (`nama_ruangan`),
  CONSTRAINT `kasur_ibfk_1` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan` (`id_ruangan`),
  CONSTRAINT `kasur_ibfk_2` FOREIGN KEY (`nama_ruangan`) REFERENCES `ruangan` (`nama_ruangan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kasur`
--

LOCK TABLES `kasur` WRITE;
/*!40000 ALTER TABLE `kasur` DISABLE KEYS */;
INSERT INTO `kasur` VALUES ('K0009','L1A001','R. Amaryllis','3','1000','1'),('R0001','L1A001','R. Amaryllis','3','2000','1'),('R0002','L1A001','R. Amaryllis','3','2000','0'),('R0004','L1A001','R. Amaryllis','3','5000','0');
/*!40000 ALTER TABLE `kasur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori_asset`
--

DROP TABLE IF EXISTS `kategori_asset`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategori_asset` (
  `id_k_asset` varchar(128) NOT NULL,
  `nama_k_asset` varchar(128) NOT NULL,
  `update_time` varchar(128) NOT NULL,
  PRIMARY KEY (`id_k_asset`),
  UNIQUE KEY `nama_k_asset` (`nama_k_asset`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori_asset`
--

LOCK TABLES `kategori_asset` WRITE;
/*!40000 ALTER TABLE `kategori_asset` DISABLE KEYS */;
INSERT INTO `kategori_asset` VALUES ('AKB','Alat Kebersihan','2020-12-07'),('ATK','Alat Tulis Kantor','2020-12-07'),('FNT','Furniture','2020-12-07'),('GDG','Gedung','2020-12-07'),('KND','Kendaraan','2020-12-07'),('TI','IT','2020-12-08');
/*!40000 ALTER TABLE `kategori_asset` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lokasi`
--

DROP TABLE IF EXISTS `lokasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lokasi` (
  `id_lokasi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lokasi` varchar(128) NOT NULL,
  PRIMARY KEY (`id_lokasi`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lokasi`
--

LOCK TABLES `lokasi` WRITE;
/*!40000 ALTER TABLE `lokasi` DISABLE KEYS */;
INSERT INTO `lokasi` VALUES (11,'Ruang Server	'),(12,'Ruang Lobby'),(15,'Ciwaruga'),(16,'R Satpam'),(17,'Ruang Flamboyan');
/*!40000 ALTER TABLE `lokasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pegawai`
--

DROP TABLE IF EXISTS `pegawai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pegawai` (
  `nip` varchar(9) NOT NULL,
  `nama_pegawai` varchar(32) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` varchar(128) DEFAULT NULL,
  `jenis_kelamin` varchar(15) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `tgl_masuk` varchar(128) DEFAULT NULL,
  `status_pernikahan` varchar(25) DEFAULT NULL,
  `jumlah_anak` int(11) DEFAULT NULL,
  `id_jabatan` varchar(10) NOT NULL,
  `poto` varchar(128) NOT NULL DEFAULT 'default.jpg',
  PRIMARY KEY (`nip`),
  KEY `id_jabatan` (`id_jabatan`),
  CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pegawai`
--

LOCK TABLES `pegawai` WRITE;
/*!40000 ALTER TABLE `pegawai` DISABLE KEYS */;
INSERT INTO `pegawai` VALUES ('K001','Nindi Silalahi','Bandung','07-12-2020','Wanita','Perum GrandPark Cimalaka Blok G 10 Rt 5 Rw 10 Cimalaka Sumedang','08127845649','15-12-2020','Menikah',4,'J0001','serly.jpg');
/*!40000 ALTER TABLE `pegawai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ruangan`
--

DROP TABLE IF EXISTS `ruangan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ruangan` (
  `id_ruangan` varchar(11) NOT NULL,
  `nama_ruangan` varchar(30) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `kelas` varchar(30) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  PRIMARY KEY (`id_ruangan`),
  KEY `nama_ruangan` (`nama_ruangan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ruangan`
--

LOCK TABLES `ruangan` WRITE;
/*!40000 ALTER TABLE `ruangan` DISABLE KEYS */;
INSERT INTO `ruangan` VALUES ('L1A001','R. Amaryllis',8,'3','Rawat Inap Anak-Anak'),('L1A002','R Asoka',8,'3','Rawat Inap'),('L1A003','R Kembang Sepatu Kuda',8,'3','Rawat Inap'),('L2A001','R. Kamboja',5,'1','Orang tuaku');
/*!40000 ALTER TABLE `ruangan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spesialisasi`
--

DROP TABLE IF EXISTS `spesialisasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spesialisasi` (
  `id_spesialisasi` varchar(128) NOT NULL,
  `nama_spesialisasi` varchar(128) NOT NULL,
  PRIMARY KEY (`id_spesialisasi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spesialisasi`
--

LOCK TABLES `spesialisasi` WRITE;
/*!40000 ALTER TABLE `spesialisasi` DISABLE KEYS */;
INSERT INTO `spesialisasi` VALUES ('AS001','Kandungan'),('BD001','Bedah Anak'),('BD002','Paru Paru'),('BD003','Persalinan');
/*!40000 ALTER TABLE `spesialisasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_created` varchar(128) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (2,'agus','','9fab6755cd2e8817d3e73b0978ca54a6',2,'2020-11-17'),(3,'hasbi','','e10adc3949ba59abbe56e057f20f883e',1,'2020-11-17');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(128) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role`
--

LOCK TABLES `user_role` WRITE;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` VALUES (1,'Admin'),(2,'Perawat'),(3,'Apotek'),(4,'Kasir');
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-17 11:00:01
