-- Master Urusan Table Creation Script
-- This script creates the master_urusan table for the SIMELA2 application

CREATE TABLE IF NOT EXISTS `master_urusan` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `namaurusan` varchar(100) NOT NULL,
    `kode` varchar(20) DEFAULT NULL,
    `fungsi_id` int(11) DEFAULT NULL,
    `status` enum('Aktif','Tidak Aktif') DEFAULT 'Aktif',
    `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `unique_namaurusan` (`namaurusan`),
    UNIQUE KEY `unique_kode` (`kode`),
    KEY `idx_status` (`status`),
    KEY `idx_fungsi_id` (`fungsi_id`),
    CONSTRAINT `fk_urusan_fungsi` FOREIGN KEY (`fungsi_id`) REFERENCES `fungsi` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Sample data for master_urusan
INSERT INTO `master_urusan` (`namaurusan`, `kode`, `fungsi_id`, `status`, `created_at`, `updated_at`) VALUES
('Urusan Kesehatan', '01', 1, 'Aktif', NOW(), NOW()),
('Urusan Pendidikan', '02', 2, 'Aktif', NOW(), NOW()),
('Urusan Pekerjaan Umum dan Penataan Ruang', '03', 3, 'Aktif', NOW(), NOW()),
('Urusan Perumahan dan Kawasan Permukiman', '04', 4, 'Aktif', NOW(), NOW()),
('Urusan Ketentraman dan Ketertiban Umum', '05', 5, 'Tidak Aktif', NOW(), NOW())
ON DUPLICATE KEY UPDATE 
    `namaurusan` = VALUES(`namaurusan`),
    `kode` = VALUES(`kode`),
    `fungsi_id` = VALUES(`fungsi_id`),
    `status` = VALUES(`status`),
    `updated_at` = NOW();
