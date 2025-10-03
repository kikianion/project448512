-- ========================================
-- Master Fungsi Table Structure
-- ========================================

-- Create master_fungsi table
CREATE TABLE IF NOT EXISTS `master_fungsi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `namafungsi` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `urut` int(11) DEFAULT 1,
  `status` enum('Aktif','Tidak Aktif') DEFAULT 'Aktif',
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_namafungsi` (`namafungsi`),
  KEY `idx_status` (`status`),
  KEY `idx_urut` (`urut`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert sample data
INSERT INTO `master_fungsi` (`namafungsi`, `deskripsi`, `urut`, `status`, `created_at`, `updated_at`) VALUES
('Fungsi Kesehatan', 'Fungsi pemerintahan di bidang kesehatan masyarakat', 1, 'Aktif', NOW(), NOW()),
('Fungsi Pendidikan', 'Fungsi pemerintahan di bidang pendidikan dan kebudayaan', 2, 'Aktif', NOW(), NOW()),
('Fungsi Infrastruktur', 'Fungsi pemerintahan di bidang infrastruktur dan pekerjaan umum', 3, 'Aktif', NOW(), NOW()),
('Fungsi Ekonomi', 'Fungsi pemerintahan di bidang ekonomi dan perdagangan', 4, 'Aktif', NOW(), NOW()),
('Fungsi Sosial', 'Fungsi pemerintahan di bidang sosial dan kemasyarakatan', 5, 'Tidak Aktif', NOW(), NOW())
ON DUPLICATE KEY UPDATE 
  `deskripsi` = VALUES(`deskripsi`),
  `urut` = VALUES(`urut`),
  `status` = VALUES(`status`),
  `updated_at` = NOW();

-- ========================================
-- Related Tables (for reference)
-- ========================================

-- Create master_urusan table (depends on master_fungsi)
CREATE TABLE IF NOT EXISTS `master_urusan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `namaurusan` varchar(100) NOT NULL,
  `kode` varchar(20) DEFAULT NULL,
  `fungsi_id` int(11) DEFAULT NULL,
  `urut` int(11) DEFAULT 1,
  `status` enum('Aktif','Tidak Aktif') DEFAULT 'Aktif',
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_namaurusan` (`namaurusan`),
  KEY `idx_fungsi_id` (`fungsi_id`),
  KEY `idx_status` (`status`),
  KEY `idx_urut` (`urut`),
  CONSTRAINT `fk_urusan_fungsi` FOREIGN KEY (`fungsi_id`) REFERENCES `master_fungsi` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Create master_program table (depends on master_urusan)
CREATE TABLE IF NOT EXISTS `master_program` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `namaprogram` varchar(100) NOT NULL,
  `kode` varchar(20) DEFAULT NULL,
  `urusan_id` int(11) DEFAULT NULL,
  `urut` int(11) DEFAULT 1,
  `status` enum('Aktif','Tidak Aktif') DEFAULT 'Aktif',
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_namaprogram` (`namaprogram`),
  KEY `idx_urusan_id` (`urusan_id`),
  KEY `idx_status` (`status`),
  KEY `idx_urut` (`urut`),
  CONSTRAINT `fk_program_urusan` FOREIGN KEY (`urusan_id`) REFERENCES `master_urusan` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Create periode_rpjmd table
CREATE TABLE IF NOT EXISTS `periode_rpjmd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `namaperiode` varchar(100) NOT NULL,
  `tahun_awal` int(4) NOT NULL,
  `tahun_akhir` int(4) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') DEFAULT 'Aktif',
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_namaperiode` (`namaperiode`),
  KEY `idx_status` (`status`),
  KEY `idx_tahun` (`tahun_awal`, `tahun_akhir`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Create master_misi table (if not exists)
CREATE TABLE IF NOT EXISTS `master_misi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `namamisi` varchar(200) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `urut` int(11) DEFAULT 1,
  `status` enum('Aktif','Tidak Aktif') DEFAULT 'Aktif',
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_status` (`status`),
  KEY `idx_urut` (`urut`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Create tujuan_rpjmd table
CREATE TABLE IF NOT EXISTS `tujuan_rpjmd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tujuan` varchar(200) NOT NULL,
  `misi_id` int(11) DEFAULT NULL,
  `urut` int(11) DEFAULT 1,
  `status` enum('Aktif','Tidak Aktif') DEFAULT 'Aktif',
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_misi_id` (`misi_id`),
  KEY `idx_status` (`status`),
  KEY `idx_urut` (`urut`),
  CONSTRAINT `fk_tujuan_misi` FOREIGN KEY (`misi_id`) REFERENCES `master_misi` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Create sasaran_rpjmd table
CREATE TABLE IF NOT EXISTS `sasaran_rpjmd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sasaran` varchar(200) NOT NULL,
  `tujuan_id` int(11) DEFAULT NULL,
  `urut` int(11) DEFAULT 1,
  `status` enum('Aktif','Tidak Aktif') DEFAULT 'Aktif',
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_tujuan_id` (`tujuan_id`),
  KEY `idx_status` (`status`),
  KEY `idx_urut` (`urut`),
  CONSTRAINT `fk_sasaran_tujuan` FOREIGN KEY (`tujuan_id`) REFERENCES `tujuan_rpjmd` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Create indikator_tujuan_rpjmd table
CREATE TABLE IF NOT EXISTS `indikator_tujuan_rpjmd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `indikator` varchar(200) NOT NULL,
  `tujuan_id` int(11) DEFAULT NULL,
  `satuan` varchar(50) DEFAULT NULL,
  `kondisi_awal` decimal(15,2) DEFAULT NULL,
  `formulasi` text DEFAULT NULL,
  `target_1` decimal(15,2) DEFAULT NULL,
  `target_2` decimal(15,2) DEFAULT NULL,
  `target_3` decimal(15,2) DEFAULT NULL,
  `target_4` decimal(15,2) DEFAULT NULL,
  `target_5` decimal(15,2) DEFAULT NULL,
  `status` enum('Aktif','Tidak Aktif') DEFAULT 'Aktif',
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_tujuan_id` (`tujuan_id`),
  KEY `idx_status` (`status`),
  CONSTRAINT `fk_indikator_tujuan_tujuan` FOREIGN KEY (`tujuan_id`) REFERENCES `tujuan_rpjmd` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Create indikator_sasaran_rpjmd table
CREATE TABLE IF NOT EXISTS `indikator_sasaran_rpjmd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `indikator` varchar(200) NOT NULL,
  `sasaran_id` int(11) DEFAULT NULL,
  `satuan` varchar(50) DEFAULT NULL,
  `kondisi_awal` decimal(15,2) DEFAULT NULL,
  `formulasi` text DEFAULT NULL,
  `target_1` decimal(15,2) DEFAULT NULL,
  `target_2` decimal(15,2) DEFAULT NULL,
  `target_3` decimal(15,2) DEFAULT NULL,
  `target_4` decimal(15,2) DEFAULT NULL,
  `target_5` decimal(15,2) DEFAULT NULL,
  `status` enum('Aktif','Tidak Aktif') DEFAULT 'Aktif',
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_sasaran_id` (`sasaran_id`),
  KEY `idx_status` (`status`),
  CONSTRAINT `fk_indikator_sasaran_sasaran` FOREIGN KEY (`sasaran_id`) REFERENCES `sasaran_rpjmd` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Create master_periode_anggaran table
CREATE TABLE IF NOT EXISTS `master_periode_anggaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(20) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') DEFAULT 'Aktif',
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_kode` (`kode`),
  KEY `idx_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Create master_grouping_periode table
CREATE TABLE IF NOT EXISTS `master_grouping_periode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `namagroup` varchar(50) NOT NULL,
  `jumlah_bulan` int(2) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') DEFAULT 'Aktif',
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_namagroup` (`namagroup`),
  KEY `idx_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Create master_branding table
CREATE TABLE IF NOT EXISTS `master_branding` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_aplikasi` varchar(100) DEFAULT 'Simela Gen2',
  `subnote` varchar(200) DEFAULT 'Sistem Informasi Monitoring dan Evaluasi Lamongan Generasi 2',
  `background` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert default branding data
INSERT INTO `master_branding` (`nama_aplikasi`, `subnote`) VALUES
('Simela Gen2', 'Sistem Informasi Monitoring dan Evaluasi Lamongan Generasi 2')
ON DUPLICATE KEY UPDATE 
  `updated_at` = NOW();

-- ========================================
-- Sample Data for Testing
-- ========================================

-- Insert sample urusan data
INSERT INTO `master_urusan` (`namaurusan`, `kode`, `fungsi_id`, `urut`, `status`) VALUES
('Urusan Kesehatan', '01', 1, 1, 'Aktif'),
('Urusan Pendidikan', '02', 2, 2, 'Aktif'),
('Urusan Pekerjaan Umum', '03', 3, 3, 'Aktif')
ON DUPLICATE KEY UPDATE 
  `kode` = VALUES(`kode`),
  `fungsi_id` = VALUES(`fungsi_id`),
  `urut` = VALUES(`urut`),
  `status` = VALUES(`status`),
  `updated_at` = NOW();

-- Insert sample program data
INSERT INTO `master_program` (`namaprogram`, `kode`, `urusan_id`, `urut`, `status`) VALUES
('Program Pelayanan Kesehatan', 'P01', 1, 1, 'Aktif'),
('Program Pendidikan Dasar', 'P02', 2, 2, 'Aktif'),
('Program Infrastruktur Jalan', 'P03', 3, 3, 'Aktif')
ON DUPLICATE KEY UPDATE 
  `kode` = VALUES(`kode`),
  `urusan_id` = VALUES(`urusan_id`),
  `urut` = VALUES(`urut`),
  `status` = VALUES(`status`),
  `updated_at` = NOW();

-- Insert sample periode RPJMD
INSERT INTO `periode_rpjmd` (`namaperiode`, `tahun_awal`, `tahun_akhir`, `status`) VALUES
('RPJMD 2024-2029', 2024, 2029, 'Aktif')
ON DUPLICATE KEY UPDATE 
  `tahun_awal` = VALUES(`tahun_awal`),
  `tahun_akhir` = VALUES(`tahun_akhir`),
  `status` = VALUES(`status`),
  `updated_at` = NOW();

-- Insert sample periode anggaran
INSERT INTO `master_periode_anggaran` (`kode`, `keterangan`, `status`) VALUES
('2024-0', 'TA 2024 Murni', 'Tidak Aktif'),
('2024-1', 'TA 2024 Perubahan 1', 'Aktif'),
('2025-0', 'TA 2025 Murni', 'Aktif')
ON DUPLICATE KEY UPDATE 
  `keterangan` = VALUES(`keterangan`),
  `status` = VALUES(`status`),
  `updated_at` = NOW();

-- Insert sample grouping periode
INSERT INTO `master_grouping_periode` (`namagroup`, `jumlah_bulan`, `status`) VALUES
('Triwulan', 3, 'Aktif'),
('Semester', 6, 'Aktif'),
('Tahunan', 12, 'Aktif')
ON DUPLICATE KEY UPDATE 
  `jumlah_bulan` = VALUES(`jumlah_bulan`),
  `status` = VALUES(`status`),
  `updated_at` = NOW();
