-- MariaDB dump 10.19  Distrib 10.4.22-MariaDB, for Win64 (AMD64)
--
-- Host: db1.vm1.dev    Database: simela-gen2
-- ------------------------------------------------------
-- Server version	10.6.22-MariaDB-0ubuntu0.22.04.1

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
-- Table structure for table `_master_11__mitra`
--

DROP TABLE IF EXISTS `_master_11__mitra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_master_11__mitra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `urut` int(11) DEFAULT NULL,
  `nama` varchar(50) NOT NULL COMMENT 'masukkan nama mitra::8',
  `pimpinan` varchar(50) NOT NULL,
  `nipkepala` varchar(50) DEFAULT NULL,
  `pangkepala` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin COMMENT='Mitra Kab lamongan';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `_master_12__opd`
--

DROP TABLE IF EXISTS `_master_12__opd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_master_12__opd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `urut` int(11) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `mitra___id___nama` int(11) NOT NULL,
  `kepala` varchar(50) DEFAULT NULL,
  `nipkepala` varchar(50) DEFAULT NULL,
  `pangkepala` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `_master_13__user`
--

DROP TABLE IF EXISTS `_master_13__user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_master_13__user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL,
  `opd___id___nama` varchar(10) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `_master_21__visi`
--

DROP TABLE IF EXISTS `_master_21__visi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_master_21__visi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `visi` varchar(500) NOT NULL,
  `status` varchar(50) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `_master_22__misi`
--

DROP TABLE IF EXISTS `_master_22__misi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_master_22__misi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `urut` int(11) DEFAULT NULL,
  `visi___id___visi` int(11) NOT NULL,
  `misi` varchar(50) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_misi_visi_id` (`visi___id___visi`),
  CONSTRAINT `FK_misi_visi_id` FOREIGN KEY (`visi___id___visi`) REFERENCES `_master_21__visi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `_master_31__periode_anggaran`
--

DROP TABLE IF EXISTS `_master_31__periode_anggaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_master_31__periode_anggaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(50) DEFAULT NULL,
  `periodeannagaran` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `keterangan` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `_master_32__grup_periode`
--

DROP TABLE IF EXISTS `_master_32__grup_periode`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_master_32__grup_periode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `jmlbulan` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `_master_51__fungsi`
--

DROP TABLE IF EXISTS `_master_51__fungsi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_master_51__fungsi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `urut` int(11) DEFAULT NULL,
  `fungsi` varchar(50) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `_master_52__urusan`
--

DROP TABLE IF EXISTS `_master_52__urusan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_master_52__urusan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `urut` int(11) DEFAULT NULL,
  `fungsi___id___fungsi` int(11) NOT NULL,
  `kode` varchar(50) DEFAULT NULL,
  `urusan` varchar(50) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_urusan_fungsi_id` (`fungsi___id___fungsi`),
  CONSTRAINT `FK_urusan_fungsi_id` FOREIGN KEY (`fungsi___id___fungsi`) REFERENCES `_master_51__fungsi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `_master_53__program`
--

DROP TABLE IF EXISTS `_master_53__program`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_master_53__program` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `program` varchar(255) NOT NULL,
  `kode` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `urusan___id___urusan` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_program_urusan_id` (`urusan___id___urusan`),
  CONSTRAINT `FK_program_urusan_id` FOREIGN KEY (`urusan___id___urusan`) REFERENCES `_master_52__urusan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `_master_61__Periode_RPJMD`
--

DROP TABLE IF EXISTS `_master_61__Periode_RPJMD`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_master_61__Periode_RPJMD` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `awal` int(11) NOT NULL,
  `akhir` int(11) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `_master_62__tujuan_RPJMD`
--

DROP TABLE IF EXISTS `_master_62__tujuan_RPJMD`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_master_62__tujuan_RPJMD` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `urut` int(11) DEFAULT NULL,
  `misi___id___misi` int(11) DEFAULT NULL,
  `tujuan` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `_master_63__sasaran_RPJMD`
--

DROP TABLE IF EXISTS `_master_63__sasaran_RPJMD`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_master_63__sasaran_RPJMD` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `urut` int(11) DEFAULT NULL,
  `tujuan_RPJMD___id___tujuan` int(11) NOT NULL,
  `sasaran` varchar(50) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `_master_81__tujuan_perangkat_daerah`
--

DROP TABLE IF EXISTS `_master_81__tujuan_perangkat_daerah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_master_81__tujuan_perangkat_daerah` (
  `id` int(11) DEFAULT NULL,
  `idopd` int(11) DEFAULT NULL,
  `sasaranrpjmd` int(11) DEFAULT NULL,
  `kode` int(11) DEFAULT NULL,
  `urut` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `_master_83__sasaran_perangkat_daerah`
--

DROP TABLE IF EXISTS `_master_83__sasaran_perangkat_daerah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_master_83__sasaran_perangkat_daerah` (
  `id` int(11) DEFAULT NULL,
  `idopd` int(11) DEFAULT NULL,
  `tujuanpd` int(11) DEFAULT NULL,
  `kode` int(11) DEFAULT NULL,
  `urut` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `_master_99__branding`
--

DROP TABLE IF EXISTS `_master_99__branding`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_master_99__branding` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `subnote` varchar(255) DEFAULT NULL,
  `background` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `indikator_RPJMD`
--

DROP TABLE IF EXISTS `indikator_RPJMD`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `indikator_RPJMD` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipe` enum('Sasaran','Tujuan') NOT NULL,
  `kode` int(11) NOT NULL COMMENT 'kode sasaran / tujuan rpjmd',
  `indikator` varchar(255) NOT NULL,
  `satuan` varchar(50) DEFAULT NULL,
  `kondisiawal` varchar(50) DEFAULT NULL,
  `formulasi` text DEFAULT NULL,
  `target1` varbinary(50) DEFAULT NULL,
  `target2` varbinary(50) DEFAULT NULL,
  `target3` varbinary(50) DEFAULT NULL,
  `target4` varbinary(50) DEFAULT NULL,
  `target5` varbinary(50) DEFAULT NULL,
  `status` varbinary(50) DEFAULT NULL,
  `mode` enum('Y','N') DEFAULT NULL COMMENT 'mode y = akumulatif (jan+feb+mar dst till des)\r\nmode n = non akumulatif angka berdiri sendiri',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `indikator_perangkat_daerah`
--

DROP TABLE IF EXISTS `indikator_perangkat_daerah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `indikator_perangkat_daerah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipe` enum('Tujuan','Sasaran','Program','Kegiatan','Subkegiatan') DEFAULT NULL,
  `kode` int(11) NOT NULL COMMENT 'kode tujuan, sasaran, program, kegiatan, subkegiatan',
  `satuan` varchar(50) DEFAULT NULL,
  `kondisiawal` varchar(50) DEFAULT NULL,
  `formulasi` text DEFAULT NULL,
  `target1` varbinary(50) DEFAULT NULL,
  `target2` varbinary(50) DEFAULT NULL,
  `target3` varbinary(50) DEFAULT NULL,
  `target4` varbinary(50) DEFAULT NULL,
  `target5` varbinary(50) DEFAULT NULL,
  `status` varbinary(50) DEFAULT NULL,
  `mode` enum('Y','N') DEFAULT NULL COMMENT 'mode y = akumulatif (jan+feb+mar dst till des)\r\nmode n = non akumulatif angka berdiri sendiri',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `kegiatanpd`
--

DROP TABLE IF EXISTS `kegiatanpd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kegiatanpd` (
  `id` int(11) DEFAULT NULL,
  `idopd` int(11) DEFAULT NULL,
  `programpd` int(11) DEFAULT NULL,
  `kode` int(11) DEFAULT NULL,
  `urut` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `nilaipd`
--

DROP TABLE IF EXISTS `nilaipd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nilaipd` (
  `id` int(11) DEFAULT NULL,
  `kodeindikatorrpjmd` int(11) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `bulan` int(11) DEFAULT NULL,
  `nilai` decimal(20,3) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `nilairpjmd`
--

DROP TABLE IF EXISTS `nilairpjmd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nilairpjmd` (
  `id` int(11) DEFAULT NULL,
  `kodeindikatorrpjmd` int(11) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `bulan` int(11) DEFAULT NULL,
  `nilai` decimal(20,3) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ploting-anggaran`
--

DROP TABLE IF EXISTS `ploting-anggaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ploting-anggaran` (
  `id` int(11) DEFAULT NULL,
  `periodeanggaran` int(11) DEFAULT NULL,
  `subkegiatan` int(11) DEFAULT NULL,
  `anggaran` decimal(20,2) DEFAULT NULL,
  `target` int(11) DEFAULT NULL,
  `satuantarget` int(11) DEFAULT NULL,
  `nilaitarget` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `programpd`
--

DROP TABLE IF EXISTS `programpd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `programpd` (
  `id` int(11) DEFAULT NULL,
  `idopd` int(11) DEFAULT NULL,
  `sasaranpd` int(11) DEFAULT NULL,
  `urusan` int(11) DEFAULT NULL,
  `kode` int(11) DEFAULT NULL,
  `urut` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `rpjmd`
--

DROP TABLE IF EXISTS `rpjmd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rpjmd` (
  `id` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `thawal` year(4) DEFAULT NULL,
  `thakhir` year(4) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `serapan-anggaran`
--

DROP TABLE IF EXISTS `serapan-anggaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `serapan-anggaran` (
  `id` int(11) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `bulan` int(11) DEFAULT NULL,
  `subkegiatan` int(11) DEFAULT NULL,
  `serapan` decimal(20,2) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `subkegiatanpd`
--

DROP TABLE IF EXISTS `subkegiatanpd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subkegiatanpd` (
  `id` int(11) DEFAULT NULL,
  `idopd` int(11) DEFAULT NULL,
  `kegiatanpd` int(11) DEFAULT NULL,
  `kode` int(11) DEFAULT NULL,
  `urut` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-10-18 11:31:24
