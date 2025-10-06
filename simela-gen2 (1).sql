-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 03, 2025 at 07:20 AM
-- Server version: 10.6.22-MariaDB-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simela-gen2`
--

-- --------------------------------------------------------

--
-- Table structure for table `branding`
--

CREATE TABLE `branding` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `subnote` varchar(255) DEFAULT NULL,
  `background` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Dumping data for table `branding`
--

INSERT INTO `branding` (`id`, `nama`, `subnote`, `background`, `logo`, `favicon`) VALUES
(1, 'Simela Gen2', 'Simela Gen2', 'assets/img/branding/vbbbbb.png', 'assets/img/branding/pxfuel.jpg', 'assets/img/branding/pngtree-hilarious-3d-animated-yellow-figure-image_3813808-removebg-preview_(1).png');

-- --------------------------------------------------------

--
-- Table structure for table `fungsi`
--

CREATE TABLE `fungsi` (
  `id` int(11) NOT NULL,
  `urut` int(11) DEFAULT NULL,
  `namafungsi` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Dumping data for table `fungsi`
--

INSERT INTO `fungsi` (`id`, `urut`, `namafungsi`, `status`) VALUES
(1, 2, 'fddd2221', 'Tidak Aktif'),
(2, 11, 'tryhtrh', 'Tidak Aktif'),
(4, 0, 'ssdsad', 'Aktif'),
(5, 0, 'ssdddfdsfdsf', 'Aktif'),
(6, 0, 'fdsggsdf111', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `indikatorpd`
--

CREATE TABLE `indikatorpd` (
  `id` int(11) DEFAULT NULL,
  `tipe` enum('Tujuan','Sasaran','Program','Kegiatan','Subkegiatan') DEFAULT NULL,
  `kode` int(11) DEFAULT NULL COMMENT 'kode tujuan, sasaran, program, kegiatan, subkegiatan',
  `satuan` varchar(50) DEFAULT NULL,
  `kondisiawal` varchar(50) DEFAULT NULL,
  `formulasi` text DEFAULT NULL,
  `target1` varbinary(50) DEFAULT NULL,
  `target2` varbinary(50) DEFAULT NULL,
  `target3` varbinary(50) DEFAULT NULL,
  `target4` varbinary(50) DEFAULT NULL,
  `target5` varbinary(50) DEFAULT NULL,
  `status` varbinary(50) DEFAULT NULL,
  `mode` enum('Y','N') DEFAULT NULL COMMENT 'mode y = akumulatif (jan+feb+mar dst till des)\r\nmode n = non akumulatif angka berdiri sendiri'
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `indikatorrpjmd`
--

CREATE TABLE `indikatorrpjmd` (
  `id` int(11) DEFAULT NULL,
  `tipe` enum('sasaran','tujuan') DEFAULT NULL,
  `kode` int(11) DEFAULT NULL COMMENT 'kode sasaran / tujuan rpjmd',
  `satuan` varchar(50) DEFAULT NULL,
  `kondisiawal` varchar(50) DEFAULT NULL,
  `formulasi` text DEFAULT NULL,
  `target1` varbinary(50) DEFAULT NULL,
  `target2` varbinary(50) DEFAULT NULL,
  `target3` varbinary(50) DEFAULT NULL,
  `target4` varbinary(50) DEFAULT NULL,
  `target5` varbinary(50) DEFAULT NULL,
  `status` varbinary(50) DEFAULT NULL,
  `mode` enum('Y','N') DEFAULT NULL COMMENT 'mode y = akumulatif (jan+feb+mar dst till des)\r\nmode n = non akumulatif angka berdiri sendiri'
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatanpd`
--

CREATE TABLE `kegiatanpd` (
  `id` int(11) DEFAULT NULL,
  `idopd` int(11) DEFAULT NULL,
  `programpd` int(11) DEFAULT NULL,
  `kode` int(11) DEFAULT NULL,
  `urut` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `misi`
--

CREATE TABLE `misi` (
  `id` int(11) NOT NULL,
  `urut` int(11) DEFAULT NULL,
  `visiinduk` int(11) DEFAULT NULL,
  `misi` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Dumping data for table `misi`
--

INSERT INTO `misi` (`id`, `urut`, `visiinduk`, `misi`, `status`) VALUES
(1, 0, 33, 'sdffdsf', 1),
(2, 0, 34, 'dsfffdsffdsf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

CREATE TABLE `mitra` (
  `id` int(11) NOT NULL,
  `urut` int(11) DEFAULT NULL,
  `namamitra` varchar(50) DEFAULT NULL,
  `kepala` varchar(50) DEFAULT NULL,
  `nipkepala` varchar(50) DEFAULT NULL,
  `pangkepala` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Dumping data for table `mitra`
--

INSERT INTO `mitra` (`id`, `urut`, `namamitra`, `kepala`, `nipkepala`, `pangkepala`, `jabatan`, `status`) VALUES
(4, 11, 'sandi', 'PLT122', 'dsfewfewf', 'dddgfdsf', '45gt5477773434', 'Aktif'),
(7, 0, 'junn', '', '', '', '', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `nilaipd`
--

CREATE TABLE `nilaipd` (
  `id` int(11) DEFAULT NULL,
  `kodeindikatorrpjmd` int(11) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `bulan` int(11) DEFAULT NULL,
  `nilai` decimal(20,3) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `nilairpjmd`
--

CREATE TABLE `nilairpjmd` (
  `id` int(11) DEFAULT NULL,
  `kodeindikatorrpjmd` int(11) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `bulan` int(11) DEFAULT NULL,
  `nilai` decimal(20,3) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `opd`
--

CREATE TABLE `opd` (
  `id` int(11) NOT NULL,
  `urut` int(11) DEFAULT NULL,
  `namaopd` varchar(50) DEFAULT NULL,
  `mitra` varchar(50) DEFAULT NULL,
  `kepala` varchar(50) DEFAULT NULL,
  `nipkepala` varchar(50) DEFAULT NULL,
  `pangkepala` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Dumping data for table `opd`
--

INSERT INTO `opd` (`id`, `urut`, `namaopd`, `mitra`, `kepala`, `nipkepala`, `pangkepala`, `jabatan`, `status`) VALUES
(1, 0, 'rrgreg', '7', 'PLT122', '', '', '', 'Aktif'),
(2, 2, 'reegv4  fewrf', '4', 'segr', 'erge', 'regre', 'regre', 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `periodeanggaran`
--

CREATE TABLE `periodeanggaran` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) DEFAULT NULL,
  `periodeannagaran` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `keterangan` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Dumping data for table `periodeanggaran`
--

INSERT INTO `periodeanggaran` (`id`, `kode`, `periodeannagaran`, `status`, `keterangan`) VALUES
(1, 'ffffffffffff', NULL, 'Aktif', 'dsfffdsffffwf fffffffffffff'),
(2, 'dsff', NULL, 'Tidak Aktif', 'ffferggefwwef'),
(3, 'ergfewf', NULL, 'Aktif', 'reger');

-- --------------------------------------------------------

--
-- Table structure for table `periodegrouping`
--

CREATE TABLE `periodegrouping` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jmlbulan` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Dumping data for table `periodegrouping`
--

INSERT INTO `periodegrouping` (`id`, `nama`, `jmlbulan`, `status`) VALUES
(1, 'saddsa', 2, 'Tidak Aktif'),
(2, 'fdggregre', 1, 'Aktif'),
(3, 'dsfffewfew', 2, 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `ploting-anggaran`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `kode` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `urusan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `programpd`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `rpjmd`
--

CREATE TABLE `rpjmd` (
  `id` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `thawal` year(4) DEFAULT NULL,
  `thakhir` year(4) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `sasaranpd`
--

CREATE TABLE `sasaranpd` (
  `id` int(11) DEFAULT NULL,
  `idopd` int(11) DEFAULT NULL,
  `tujuanpd` int(11) DEFAULT NULL,
  `kode` int(11) DEFAULT NULL,
  `urut` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `sasaranrpjmd`
--

CREATE TABLE `sasaranrpjmd` (
  `id` int(11) DEFAULT NULL,
  `urut` int(11) DEFAULT NULL,
  `tujuan` varchar(50) DEFAULT NULL,
  `sasaran` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `serapan-anggaran`
--

CREATE TABLE `serapan-anggaran` (
  `id` int(11) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `bulan` int(11) DEFAULT NULL,
  `subkegiatan` int(11) DEFAULT NULL,
  `serapan` decimal(20,2) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `subkegiatanpd`
--

CREATE TABLE `subkegiatanpd` (
  `id` int(11) DEFAULT NULL,
  `idopd` int(11) DEFAULT NULL,
  `kegiatanpd` int(11) DEFAULT NULL,
  `kode` int(11) DEFAULT NULL,
  `urut` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tujuanpd`
--

CREATE TABLE `tujuanpd` (
  `id` int(11) DEFAULT NULL,
  `idopd` int(11) DEFAULT NULL,
  `sasaranrpjmd` int(11) DEFAULT NULL,
  `kode` int(11) DEFAULT NULL,
  `urut` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `tujuanrpjmd`
--

CREATE TABLE `tujuanrpjmd` (
  `id` int(11) DEFAULT NULL,
  `urut` int(11) DEFAULT NULL,
  `misi` varchar(50) DEFAULT NULL,
  `tujuan` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `urusan`
--

CREATE TABLE `urusan` (
  `id` int(11) NOT NULL,
  `urut` int(11) DEFAULT NULL,
  `fungsi` int(11) DEFAULT NULL,
  `kode` varchar(50) DEFAULT NULL,
  `urusan` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Dumping data for table `urusan`
--

INSERT INTO `urusan` (`id`, `urut`, `fungsi`, `kode`, `urusan`, `status`) VALUES
(2, NULL, 1, '2', 'trhtrh', 'Tidak Aktif'),
(3, NULL, 1, '1', 'ggergre', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `opd` varchar(10) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `role`, `opd`, `status`) VALUES
(0, '6555555u655', '$2y$10$FqHSSzHwEf/0h9wmrdc33ubWYfHa.84CKjkeZbIyGVO', 'tyujytu', 'monev', '', 'active'),
(1, 'ewggg', '$2y$10$/CPvTd2fop99aBIZ/iySDepHTMnyxCZd2EE8ajAcHeb', 'errgewrrrrrrrrrrrr', 'admin', '1', 'active'),
(2, 'dsffsdf', '$2y$10$hsKOAbv5mmp0pL1xlO/zSupZ1MQi6we6CHY3AIjQx1d', 'fffffffffffffffff', 'mitra', '1', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `visi`
--

CREATE TABLE `visi` (
  `id` int(11) NOT NULL,
  `visi` varchar(500) DEFAULT NULL,
  `status` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Dumping data for table `visi`
--

INSERT INTO `visi` (`id`, `visi`, `status`) VALUES
(27, 'a33', 0),
(28, 'a1', 0),
(29, 'a2', 0),
(30, 'gfdhhhdfgg3333333333', 0),
(31, 'llllllllll', 0),
(32, 'iiiiiiiiii', 1),
(33, 'dsffdsg', 1),
(34, 'aaaaaaaaaaaaaaaaaa', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branding`
--
ALTER TABLE `branding`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fungsi`
--
ALTER TABLE `fungsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `misi`
--
ALTER TABLE `misi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_misi_visi_id` (`visiinduk`);

--
-- Indexes for table `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opd`
--
ALTER TABLE `opd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `periodeanggaran`
--
ALTER TABLE `periodeanggaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `periodegrouping`
--
ALTER TABLE `periodegrouping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_program_urusan_id` (`urusan`);

--
-- Indexes for table `urusan`
--
ALTER TABLE `urusan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_urusan_fungsi_id` (`fungsi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visi`
--
ALTER TABLE `visi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branding`
--
ALTER TABLE `branding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fungsi`
--
ALTER TABLE `fungsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `misi`
--
ALTER TABLE `misi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `opd`
--
ALTER TABLE `opd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `periodeanggaran`
--
ALTER TABLE `periodeanggaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `periodegrouping`
--
ALTER TABLE `periodegrouping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `urusan`
--
ALTER TABLE `urusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `visi`
--
ALTER TABLE `visi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `misi`
--
ALTER TABLE `misi`
  ADD CONSTRAINT `FK_misi_visi_id` FOREIGN KEY (`visiinduk`) REFERENCES `visi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `FK_program_urusan_id` FOREIGN KEY (`urusan`) REFERENCES `urusan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `urusan`
--
ALTER TABLE `urusan`
  ADD CONSTRAINT `FK_urusan_fungsi_id` FOREIGN KEY (`fungsi`) REFERENCES `fungsi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
