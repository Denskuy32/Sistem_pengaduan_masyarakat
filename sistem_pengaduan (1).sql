-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2025 at 08:40 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_pengaduan`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_muhammaddenif32@gmail.com|127.0.0.1', 'i:1;', 1741595576),
('laravel_cache_muhammaddenif32@gmail.com|127.0.0.1:timer', 'i:1741595576;', 1741595576);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dukungan`
--

CREATE TABLE `dukungan` (
  `id_dukungan` int(11) NOT NULL,
  `id_pengaduan` int(11) DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dukungan`
--

INSERT INTO `dukungan` (`id_dukungan`, `id_pengaduan`, `id_pengguna`, `created_at`, `updated_at`) VALUES
(7, 4, 5, '2025-03-26 00:42:28', '2025-03-26 00:42:28'),
(10, 4, 1, '2025-03-26 00:43:20', '2025-03-26 00:43:20'),
(14, 8, 5, '2025-03-28 01:55:23', '2025-03-28 01:55:23'),
(15, 8, 7, '2025-03-29 05:33:37', '2025-03-29 05:33:37'),
(16, 8, 8, '2025-04-06 19:04:13', '2025-04-06 19:04:13'),
(17, 10, 8, '2025-04-07 21:30:26', '2025-04-07 21:30:26'),
(20, 2, 9, '2025-04-14 00:19:15', '2025-04-14 00:19:15');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instansi`
--

CREATE TABLE `instansi` (
  `id_instansi` int(11) NOT NULL,
  `nama_instansi` varchar(100) NOT NULL,
  `kontak` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instansi`
--

INSERT INTO `instansi` (`id_instansi`, `nama_instansi`, `kontak`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Dinas Tenaga Kerja Kota Batam', '089789768765', 'Jl. Raja Haji No. 1, Kelurahan Sungai Harapan, Kecamatan Sekupang', '2025-03-02 20:32:37', '2025-03-02 21:16:36'),
(2, 'Dewan Perwakilan Rakyat Daerah (DPRD) Kota Batam', '(0778) 326551', 'Jl. Engku Putri I, Batam Center', '2025-03-04 19:32:00', '2025-03-04 19:32:30'),
(3, 'Polresta Barelang', '0778 458330', 'Jl. Jenderal Sudirman, Baloi', '2025-03-16 21:42:20', '2025-03-16 21:42:46'),
(4, 'Dinas Kesehatan Kota Batam', 'Informasi nomor telepon tidak tersedia', 'Jl. Raja Ali Haji, Sekupang', '2025-03-27 00:20:39', '2025-03-27 00:20:39'),
(5, 'Badan Pengawas Kota Batam', '0778-461813', 'Jl. Engku Putri I, Batam Center', '2025-03-27 00:22:54', '2025-03-27 00:22:54'),
(6, 'Badan Pengusahaan (BP) Batam', '0778-462047', 'Jl. Jenderal Ibnu Sutowo No. 1, Batam Centre', '2025-03-28 00:19:37', '2025-03-28 00:19:37'),
(7, 'Dinas Tenaga Kerja Kota Batam', '[Informasi nomor telepon tidak tersedia]', 'Jl. Raja Haji No. 1, Kel. Sungai Harapan, Kec. Sekupang', '2025-03-28 00:20:40', '2025-03-28 00:20:40'),
(8, 'dinas kebersihan dan likungan hidup', '987797708009', 'Jl. Engku Putri I, Batam Center', '2025-04-14 01:47:42', '2025-04-14 01:47:42');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `deskripsi`, `created_at`, `updated_at`) VALUES
(2, 'Ketertiban & Keamanan', 'Pengaduan terkait pelanggaran ketertiban umum seperti parkir liar, kemacetan, kebisingan, dan gangguan ketertiban lainnya di lingkungan masyarakat.', '2025-03-05 00:10:22', '2025-03-05 00:10:22'),
(3, 'Infrastruktur & Fasilitas Umum', 'Keluhan terkait jalan rusak, lampu jalan mati, trotoar yang tidak layak, fasilitas publik yang rusak (halte, taman, tempat sampah, dll.).', '2025-03-06 01:03:14', '2025-03-06 01:03:14'),
(4, 'Sampah dan Lingkungan', 'Laporan mengenai sampah yang menumpuk, pencemaran lingkungan, kebersihan kota, atau ilegal dumping.', '2025-03-11 20:14:12', '2025-03-11 20:14:12'),
(5, 'Transportasi dan Lalu Lintas', 'Keluhan tentang kemacetan, angkutan umum yang tidak memadai, marka jalan yang hilang, atau rambu lalu lintas yang rusak.', '2025-03-11 20:15:13', '2025-03-11 20:15:13'),
(6, 'Korupsi dan Penyalahgunaan Jabatan', 'Laporan mengenai dugaan korupsi, pungutan liar (pungli), atau penyalahgunaan wewenang oleh pejabat publik.', '2025-03-11 20:23:03', '2025-03-11 20:23:03'),
(7, 'Kesehatan dan Kesejahteraan', 'Pengaduan terkait masalah kesehatan masyarakat, pelayanan rumah sakit, penyebaran penyakit, atau fasilitas kesehatan yang kurang memadai.', '2025-03-11 20:34:53', '2025-03-11 20:34:53'),
(8, 'pelayanan publik', 'Pelayanan publik adalah kegiatan yang dilakukan untuk memenuhi kebutuhan masyarakat atas barang, jasa, dan pelayanan administratif. Pelayanan publik merupakan hak setiap warga negara dan penduduk', '2025-03-27 21:03:04', '2025-03-27 21:03:04');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_pengaduan` int(11) DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `isi_komentar` text DEFAULT NULL,
  `tanggal_komentar` datetime DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_pengaduan`, `id_pengguna`, `isi_komentar`, `tanggal_komentar`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'iya pak tolongin 😥', '2025-03-07 13:55:56', '2025-03-06 23:55:56', '2025-03-07 00:08:18'),
(2, 4, 1, 'wkwkwkwkwk', '2025-03-26 04:27:45', '2025-03-25 21:27:45', '2025-03-25 21:27:45'),
(3, 8, 10, 'iya tempat saya sama banyak sampah bererakan', '2025-03-28 08:54:37', '2025-03-28 01:54:37', '2025-03-28 01:54:37'),
(4, 11, 5, 'p', '2025-04-12 12:53:53', '2025-04-12 05:53:53', '2025-04-12 05:53:53'),
(5, 3, 9, 'p', '2025-04-12 16:45:12', '2025-04-12 09:45:12', '2025-04-12 09:45:12'),
(6, 2, 9, 'tes', '2025-04-14 07:19:09', '2025-04-14 00:19:09', '2025-04-14 00:19:09');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` int(11) NOT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `pesan_notifikasi` text NOT NULL,
  `status` enum('Dibaca','Belum Dibaca') DEFAULT 'Belum Dibaca',
  `tanggal_kirim` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id_notifikasi`, `id_pengguna`, `id_pengaduan`, `pesan_notifikasi`, `status`, `tanggal_kirim`, `created_at`, `updated_at`) VALUES
(5, 5, 4, 'Status pengaduan Anda dengan judul \'perkelahian di alun alun\' telah diubah menjadi \'Diverifikasi\'.', 'Belum Dibaca', '2025-03-18 01:29:23', '2025-03-17 18:29:23', '2025-03-17 18:29:23'),
(7, 5, 4, 'Pengaduan Anda dengan judul \'perkelahian di alun alun\' telah diteruskan ke instansi terkait dan statusnya diubah menjadi \'Diproses\'.', 'Belum Dibaca', '2025-03-19 02:20:09', '2025-03-18 19:20:09', '2025-03-18 19:20:09'),
(11, 5, 4, 'denif anandika mengomentari laporan Anda: \"perkelahian di alun alun\"', 'Belum Dibaca', '2025-03-26 04:27:45', '2025-03-25 21:27:45', '2025-03-25 21:27:45'),
(14, 5, 4, 'denif anandika mendukung laporan Anda: \"perkelahian di alun alun\"', 'Belum Dibaca', '2025-03-26 07:43:20', '2025-03-26 00:43:20', '2025-03-26 00:43:20'),
(15, 7, 2, 'Status pengaduan Anda dengan judul \'Jalan Berlubang di Jalan Merdeka Membahayakan Pengendara\' telah diubah dari \'Pending\' menjadi \'Diverifikasi\'.', 'Belum Dibaca', '2025-03-27 03:43:23', '2025-03-26 20:43:23', '2025-03-26 20:43:23'),
(16, 6, 3, 'Status pengaduan Anda dengan judul \'Sampah Menumpuk di Pasar Tradisional,\' telah diubah dari \'Pending\' menjadi \'Diverifikasi\'.', 'Belum Dibaca', '2025-03-27 03:43:29', '2025-03-26 20:43:29', '2025-03-26 20:43:29'),
(17, 5, 6, 'Status pengaduan Anda dengan judul \'jalan rusak\' telah diubah dari \'Pending\' menjadi \'Diverifikasi\'.', 'Belum Dibaca', '2025-03-27 03:51:08', '2025-03-26 20:51:08', '2025-03-26 20:51:08'),
(18, 6, 3, 'miyabi32 mendukung laporan Anda: \"Sampah Menumpuk di Pasar Tradisional,\"', 'Belum Dibaca', '2025-03-28 03:11:48', '2025-03-27 20:11:48', '2025-03-27 20:11:48'),
(19, 5, 8, 'Status pengaduan Anda dengan judul \'Sampah Menumpuk di Perumahan Bukit Indah, Batam\' telah diubah dari \'Pending\' menjadi \'Diverifikasi\'.', 'Belum Dibaca', '2025-03-28 03:40:52', '2025-03-27 20:40:52', '2025-03-27 20:40:52'),
(20, 6, 3, 'miyabi32 mendukung laporan Anda: \"Sampah Menumpuk di Pasar Tradisional,\"', 'Belum Dibaca', '2025-03-28 07:53:36', '2025-03-28 00:53:36', '2025-03-28 00:53:36'),
(21, 10, 10, 'Status pengaduan Anda dengan judul \'pembuangan sampah depan sekolah\' telah diubah dari \'Pending\' menjadi \'Diverifikasi\'.', 'Belum Dibaca', '2025-03-28 08:52:46', '2025-03-28 01:52:46', '2025-03-28 01:52:46'),
(22, 5, 8, 'pak misriyadi mengomentari laporan Anda: \"Sampah Menumpuk di Perumahan Bukit Indah, Batam\"', 'Belum Dibaca', '2025-03-28 08:54:37', '2025-03-28 01:54:37', '2025-03-28 01:54:37'),
(23, 5, 8, 'denskuy mendukung laporan Anda: \"Sampah Menumpuk di Perumahan Bukit Indah, Batam\"', 'Belum Dibaca', '2025-03-29 12:33:37', '2025-03-29 05:33:37', '2025-03-29 05:33:37'),
(24, 5, 8, 'adi bengkel mendukung laporan Anda: \"Sampah Menumpuk di Perumahan Bukit Indah, Batam\"', 'Belum Dibaca', '2025-04-07 02:04:13', '2025-04-06 19:04:13', '2025-04-06 19:04:13'),
(25, 10, 10, 'Pengaduan Anda dengan judul \'pembuangan sampah depan sekolah\' telah diteruskan ke 2 instansi terkait.', 'Belum Dibaca', '2025-04-07 06:37:11', '2025-04-06 23:37:11', '2025-04-06 23:37:11'),
(26, 10, 10, 'Status pengaduan Anda dengan judul \'pembuangan sampah depan sekolah\' telah diubah dari \'Diproses\' menjadi \'Selesai\'.', 'Belum Dibaca', '2025-04-07 06:40:24', '2025-04-06 23:40:24', '2025-04-06 23:40:24'),
(27, 10, 10, 'adi bengkel mendukung laporan Anda: \"pembuangan sampah depan sekolah\"', 'Belum Dibaca', '2025-04-08 04:30:26', '2025-04-07 21:30:26', '2025-04-07 21:30:26'),
(28, 9, 9, 'Status pengaduan Anda dengan judul \'Pelayanan di Kantor Kelurahan Lambat dan Kurang Ramah\' telah diubah dari \'Pending\' menjadi \'Diverifikasi\'.', 'Belum Dibaca', '2025-04-10 02:52:08', '2025-04-09 19:52:08', '2025-04-09 19:52:08'),
(29, 9, 9, 'Pengaduan Anda dengan judul \'Pelayanan di Kantor Kelurahan Lambat dan Kurang Ramah\' telah diteruskan ke 1 instansi terkait.', 'Belum Dibaca', '2025-04-10 02:59:17', '2025-04-09 19:59:17', '2025-04-09 19:59:17'),
(32, 5, 4, 'Terdapat tanggapan baru untuk pengaduan \'perkelahian di alun alun\'.', 'Belum Dibaca', '2025-04-12 10:13:37', '2025-04-12 03:13:37', '2025-04-12 03:13:37'),
(33, 6, 3, 'Terdapat tanggapan baru untuk pengaduan \'Sampah Menumpuk di Pasar Tradisional,\'.', 'Belum Dibaca', '2025-04-12 11:19:05', '2025-04-12 04:19:05', '2025-04-12 04:19:05'),
(34, 6, 3, 'Terdapat tanggapan baru untuk pengaduan \'Sampah Menumpuk di Pasar Tradisional,\'.', 'Belum Dibaca', '2025-04-12 12:29:28', '2025-04-12 05:29:28', '2025-04-12 05:29:28'),
(37, 6, 3, 'wise legowo mengomentari laporan Anda: \"Sampah Menumpuk di Pasar Tradisional,\"', 'Belum Dibaca', '2025-04-12 16:45:12', '2025-04-12 09:45:12', '2025-04-12 09:45:12'),
(38, 6, 3, 'Pengaduan Anda dengan judul \'Sampah Menumpuk di Pasar Tradisional,\' telah diteruskan ke 1 instansi terkait.', 'Belum Dibaca', '2025-04-14 03:25:57', '2025-04-13 20:25:57', '2025-04-13 20:25:57'),
(39, 6, 3, 'Terdapat tanggapan baru untuk pengaduan \'Sampah Menumpuk di Pasar Tradisional,\'.', 'Belum Dibaca', '2025-04-14 03:26:17', '2025-04-13 20:26:17', '2025-04-13 20:26:17'),
(40, 5, 6, 'Pengaduan Anda dengan judul \'jalan rusak\' telah diteruskan ke 1 instansi terkait.', 'Belum Dibaca', '2025-04-14 03:27:28', '2025-04-13 20:27:28', '2025-04-13 20:27:28'),
(41, 5, 6, 'Terdapat tanggapan baru untuk pengaduan \'jalan rusak\'.', 'Belum Dibaca', '2025-04-14 03:27:46', '2025-04-13 20:27:46', '2025-04-13 20:27:46'),
(42, 6, 3, 'Status pengaduan Anda dengan judul \'Sampah Menumpuk di Pasar Tradisional,\' telah diubah dari \'Diproses\' menjadi \'Selesai\'.', 'Belum Dibaca', '2025-04-14 03:28:29', '2025-04-13 20:28:29', '2025-04-13 20:28:29'),
(43, 6, 3, 'Terdapat tanggapan baru untuk pengaduan \'Sampah Menumpuk di Pasar Tradisional,\'.', 'Belum Dibaca', '2025-04-14 03:29:49', '2025-04-13 20:29:49', '2025-04-13 20:29:49'),
(44, 5, 8, 'Pengaduan Anda dengan judul \'Sampah Menumpuk di Perumahan Bukit Indah, Batam\' telah diteruskan ke 1 instansi terkait.', 'Belum Dibaca', '2025-04-14 03:30:41', '2025-04-13 20:30:41', '2025-04-13 20:30:41'),
(45, 5, 8, 'Terdapat tanggapan baru untuk pengaduan \'Sampah Menumpuk di Perumahan Bukit Indah, Batam\'.', 'Belum Dibaca', '2025-04-14 03:31:09', '2025-04-13 20:31:09', '2025-04-13 20:31:09'),
(46, 5, 8, 'Status pengaduan Anda dengan judul \'Sampah Menumpuk di Perumahan Bukit Indah, Batam\' telah diubah dari \'Diproses\' menjadi \'Selesai\'.', 'Belum Dibaca', '2025-04-14 03:31:25', '2025-04-13 20:31:25', '2025-04-13 20:31:25'),
(47, 7, 2, 'wise legowo mendukung laporan Anda: \"Jalan Berlubang di Jalan Merdeka Membahayakan Pengendara\"', 'Belum Dibaca', '2025-04-14 06:49:17', '2025-04-13 23:49:17', '2025-04-13 23:49:17'),
(48, 9, 12, 'Status pengaduan Anda dengan judul \'Lampu Jalan Mati di Perumahan\' telah diubah dari \'Pending\' menjadi \'Diverifikasi\'.', 'Belum Dibaca', '2025-04-14 07:02:10', '2025-04-14 00:02:10', '2025-04-14 00:02:10'),
(49, 9, 12, 'Terdapat tanggapan baru untuk pengaduan \'Lampu Jalan Mati di Perumahan\'.', 'Belum Dibaca', '2025-04-14 07:02:34', '2025-04-14 00:02:34', '2025-04-14 00:02:34'),
(50, 7, 2, 'wise legowo mengomentari laporan Anda: \"Jalan Berlubang di Jalan Merdeka Membahayakan Pengendara\"', 'Belum Dibaca', '2025-04-14 07:19:09', '2025-04-14 00:19:09', '2025-04-14 00:19:09'),
(51, 7, 2, 'wise legowo mendukung laporan Anda: \"Jalan Berlubang di Jalan Merdeka Membahayakan Pengendara\"', 'Belum Dibaca', '2025-04-14 07:19:15', '2025-04-14 00:19:15', '2025-04-14 00:19:15'),
(52, 7, 2, 'Pengaduan Anda dengan judul \'Jalan Berlubang di Jalan Merdeka Membahayakan Pengendara\' telah diteruskan ke 1 instansi terkait.', 'Belum Dibaca', '2025-04-14 08:42:00', '2025-04-14 01:42:00', '2025-04-14 01:42:00'),
(53, 7, 2, 'Status pengaduan Anda dengan judul \'Jalan Berlubang di Jalan Merdeka Membahayakan Pengendara\' telah diubah dari \'Diproses\' menjadi \'Selesai\'.', 'Belum Dibaca', '2025-04-14 08:42:05', '2025-04-14 01:42:05', '2025-04-14 01:42:05'),
(54, 7, 2, 'Terdapat tanggapan baru untuk pengaduan \'Jalan Berlubang di Jalan Merdeka Membahayakan Pengendara\'.', 'Belum Dibaca', '2025-04-14 08:42:50', '2025-04-14 01:42:50', '2025-04-14 01:42:50'),
(55, 10, 13, 'Status pengaduan Anda dengan judul \'banjir dikawasan kepri mall\' telah diubah dari \'Pending\' menjadi \'Diverifikasi\'.', 'Belum Dibaca', '2025-04-14 08:46:50', '2025-04-14 01:46:50', '2025-04-14 01:46:50'),
(56, 10, 13, 'Pengaduan Anda dengan judul \'banjir dikawasan kepri mall\' telah diteruskan ke 1 instansi terkait.', 'Belum Dibaca', '2025-04-14 08:47:54', '2025-04-14 01:47:54', '2025-04-14 01:47:54'),
(57, 10, 13, 'Terdapat tanggapan baru untuk pengaduan \'banjir dikawasan kepri mall\'.', 'Belum Dibaca', '2025-04-14 08:48:44', '2025-04-14 01:48:44', '2025-04-14 01:48:44'),
(58, 10, 13, 'Status pengaduan Anda dengan judul \'banjir dikawasan kepri mall\' telah diubah dari \'Diproses\' menjadi \'Selesai\'.', 'Belum Dibaca', '2025-04-14 08:48:59', '2025-04-14 01:48:59', '2025-04-14 01:48:59'),
(59, 10, 13, 'Terdapat tanggapan baru untuk pengaduan \'banjir dikawasan kepri mall\'.', 'Belum Dibaca', '2025-04-14 08:49:33', '2025-04-14 01:49:33', '2025-04-14 01:49:33');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `judul_pengaduan` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `lokasi` text DEFAULT NULL,
  `lampiran` varchar(255) DEFAULT NULL,
  `tanggal_pengaduan` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('Pending','Diverifikasi','Diproses','Selesai') DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `id_pengguna`, `id_kategori`, `judul_pengaduan`, `deskripsi`, `lokasi`, `lampiran`, `tanggal_pengaduan`, `status`, `created_at`, `updated_at`) VALUES
(2, 7, 3, 'Jalan Berlubang di Jalan Merdeka Membahayakan Pengendara', 'aya ingin melaporkan kondisi jalan di Jalan Merdeka, Kecamatan X, yang mengalami kerusakan parah dengan banyak lubang besar. Kondisi ini sangat membahayakan pengendara, terutama di malam hari karena minimnya penerangan jalan. Sudah banyak pengendara motor yang jatuh akibat terperosok ke dalam lubang ini.\r\n\r\nSaya berharap pihak terkait dapat segera memperbaiki jalan ini untuk menghindari kecelakaan yang lebih fatal.', 'Jalan Merdeka, Kecamatan X, Kota Y', 'C:\\xampp\\tmp\\php2644.tmp', '2025-03-12 04:32:13', 'Selesai', '2025-03-11 21:32:13', '2025-04-14 01:42:05'),
(3, 6, 4, 'Sampah Menumpuk di Pasar Tradisional,', 'Saya ingin melaporkan kondisi Pasar Tradisional Kota Z, di mana sampah menumpuk dan tidak diangkut selama beberapa hari. Akibatnya, lingkungan pasar menjadi kotor, berbau tidak sedap, dan mengundang banyak lalat serta tikus. Hal ini sangat mengganggu para pedagang dan pembeli yang beraktivitas di pasar.\r\n\r\nMohon agar pihak yang berwenang segera menindaklanjuti masalah ini dengan meningkatkan jadwal pengangkutan sampah dan membersihkan area pasar secara rutin.', 'Pasar Tradisional Kota Z, Kecamatan Y', 'C:\\xampp\\tmp\\phpC4E4.tmp', '2025-03-12 08:01:29', 'Selesai', '2025-01-12 01:01:29', '2025-04-13 20:28:29'),
(4, 5, 2, 'perkelahian di alun alun', 'fnjsanjasjnjdsjadksajkldjljasldksal', 'alun alun batam center', 'C:\\xampp\\tmp\\php5D40.tmp', '2025-03-13 02:57:02', 'Diproses', '2025-03-12 19:57:02', '2025-03-18 19:20:09'),
(6, 5, 3, 'jalan rusak', 'jalan rusak di batamm center dekat lampu merah', 'Batam Center', NULL, '2025-03-27 03:48:53', 'Diproses', '2025-03-26 20:48:53', '2025-04-13 20:27:28'),
(8, 5, 4, 'Sampah Menumpuk di Perumahan Bukit Indah, Batam', 'Saya ingin melaporkan adanya tumpukan sampah yang tidak diangkut selama lebih dari seminggu di lingkungan Perumahan Bukit Indah, Batam. Sampah yang menumpuk ini menimbulkan bau tidak sedap dan berisiko menjadi sumber penyakit. Beberapa warga sudah mencoba melaporkan ke petugas kebersihan, tetapi belum ada tindakan yang dilakukan.\r\n\r\nKami berharap dinas terkait segera menangani masalah ini agar lingkungan tetap bersih dan sehat bagi warga sekitar.', 'Perumahan Bukit Indah, Batam', 'lampiran_pengaduan/bLoF7h4QJxMbhQ4I3Ni7USyTd2ZuCPeKjfhSrwTF.jpg', '2025-03-28 03:35:50', 'Selesai', '2025-03-27 20:35:50', '2025-04-13 20:31:25'),
(9, 9, 8, 'Pelayanan di Kantor Kelurahan Lambat dan Kurang Ramah', 'Saya ingin menyampaikan keluhan mengenai pelayanan di Kantor Kelurahan Lubuk Baja, Batam. Proses pengurusan surat menyurat sangat lama, bahkan saya harus menunggu lebih dari 3 jam hanya untuk legalisasi dokumen. Selain itu, beberapa petugas kurang ramah dalam melayani masyarakat.\r\n\r\nSaya berharap agar pelayanan di kantor kelurahan dapat ditingkatkan, baik dari segi kecepatan maupun sikap petugas dalam melayani warga.', 'Kantor Kelurahan Lubuk Baja, Batam', NULL, '2025-03-28 04:04:18', 'Diproses', '2025-03-27 21:04:18', '2025-04-09 19:59:17'),
(10, 10, 4, 'pembuangan sampah depan sekolah', 'saya melihat si a membuang sampah sembarangan di depan sekolah', 'batam center', 'lampiran_pengaduan/frvnM11RcnYqfzI1dXKyiqoRkKfeh9tk0jBGxcid.jpg', '2025-03-28 08:52:26', 'Diverifikasi', '2025-03-28 01:52:26', '2025-04-07 06:42:50'),
(12, 9, 3, 'Lampu Jalan Mati di Perumahan', 'Saya ingin melaporkan bahwa lampu jalan di blok C Perumahan Taman Indah, tepatnya di depan rumah nomor C12, sudah mati selama lebih dari 2 minggu. Akibatnya, jalan tersebut menjadi sangat gelap dan rawan tindakan kriminal saat malam hari.\r\nMohon segera dilakukan perbaikan demi keamanan warga.', 'di blok C Perumahan Taman Indah', 'lampiran_pengaduan/HbDIGYkHSnZ60HQf0a1HfAjqDyQWwIwFjXUOnQbz.jpg', '2025-04-14 06:57:39', 'Diverifikasi', '2025-04-13 23:57:39', '2025-04-14 00:02:10'),
(13, 10, 4, 'banjir dikawasan kepri mall', 'air nya deras ,saluran air kesumnbat dan banyak sampah berserakan dimana mana', 'simpang kepri mall,batam center', 'lampiran_pengaduan/F0yHRTV9TXctPMYpt08ZUF37oD0BknkfLwCmeXHd.jpg', '2025-04-14 08:46:02', 'Selesai', '2025-04-14 01:46:02', '2025-04-14 01:48:59');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan_instansi`
--

CREATE TABLE `pengaduan_instansi` (
  `id_pengaduan` int(11) DEFAULT NULL,
  `id_instansi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengaduan_instansi`
--

INSERT INTO `pengaduan_instansi` (`id_pengaduan`, `id_instansi`) VALUES
(4, 3),
(9, 2),
(3, 5),
(6, 2),
(8, 2),
(2, 5),
(13, 8);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `nomor_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto_profil` varchar(255) DEFAULT NULL,
  `role` enum('Masyarakat','Admin') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nik`, `nama`, `email`, `nomor_hp`, `alamat`, `password`, `foto_profil`, `role`, `created_at`, `updated_at`) VALUES
(1, '2171089712311234', 'denif anandika', 'denif@gmail.com', '0895385201491', 'taman yasmin kebun rt 03 rw 14', '$2y$12$8qqUfKlwFI/aIokahpwhsuD9AVdWPt1/ftMmwJJNv6Y.AeHFa09.i', 'profile_photos/cJGixnS5tgqvle9suhE7HZFsenSt8KW7QQkgh8Ai.jpg', 'Masyarakat', '2025-03-02 23:46:56', '2025-03-25 21:27:08'),
(5, '313719837192783', 'miyabi32', 'miyabi@gmail.com', '0895385201491', 'Taman Yasmin Kebun', '$2y$12$6bF58fk5fPY6fPFsDfZPtusnht/aVsiB8QVLQ5j/GJ1Lj23ECHzri', 'profile_photos/ZivhfS0BwxcY7UTl4d4CQH2EFpYP3TUNA7pN593J.jpg', 'Masyarakat', '2025-03-04 21:08:55', '2025-03-23 23:22:22'),
(6, '2171042212069401', 'rtx', 'bro@gmail.com', '0895385201491', 'Taman Yasmin Kebun', '$2y$12$oJVa/kLCzh73NjwjoXgs2ez7brNfco0ufMEoWXSDOuaPSRAnBisWe', 'profile_photos/EZAQGDxGY1yv8LtfpmMrGMo1pFgWxGdsxF9KnqSr.jpg', 'Admin', '2025-03-09 18:40:58', '2025-03-23 19:02:48'),
(7, '2171042672069001', 'denskuy', 'muhammaddenif32@gmail.com', '0895385201491', 'batam center', '$2y$12$A5v5SQfxOwe7C.stsOGDcu.OflbW5gkDXn8ij4qWRmBQRp.nXrsh6', 'profile_photos/yRZWg3QZTC0sasqSkbilmkdkQjtlwT27ykpjWKa4.jpg', 'Masyarakat', '2025-03-10 19:43:56', '2025-03-29 05:33:26'),
(8, '3137198371927831', 'adi bengkel', 'adibengkel@gmail.com', '089748576745', 'Batu Aji, Batam', '$2y$12$R93f4QOaxJ.BgkLzyY3A0..MfhUcaEaesamdNEPZF3UeJi96KQnkS', NULL, 'Masyarakat', '2025-03-27 20:49:49', '2025-03-27 20:49:49'),
(9, '3137198371927948', 'wise legowo', 'wise@gmail.com', '089793217312', 'Lubuk Baja, Batam', '$2y$12$DxRa6HM5oMxISx5OPgCF0.70p2eCDfJZb4Yj7ts9C7saldWZWKS5K', 'profile_photos/0b4f1G2WuT1gl2f6R3VCNv30D2b3A1RxlRSYo1FA.jpg', 'Masyarakat', '2025-03-27 20:55:42', '2025-03-27 20:56:49'),
(10, '5454645433424322', 'pak misriyadi', 'misriyadi@gmail.com', '0895385201491', 'Taman Yasmin Kebun', '$2y$12$kkvCvH9a823tD0Y8Zhd5C.velbniscTEtEPx4YTflIxK8d26FzE8K', NULL, 'Masyarakat', '2025-03-28 01:50:56', '2025-03-28 01:50:56');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('FfbuspkfspeWvUnw1fJMC78aYpXtpt8GX694nUgg', 9, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiTTB2Z0tzTkZrYzVVUlo5ekRZM0d3ckd0d3FYTjdqR0JDVUd4N1NXRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wZW5nYWR1YW4vMTMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6OTt9', 1744620574),
('umkVbngp4MlSppBARqgdzcVcYNmBHZ9SUKae7eFF', 10, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiT1Z3MW1nQmg0NkpLd09FV1VydVdadm45RGhPOER0eUxxUXNNNFUzTiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iZXJhbmRhIjt9czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjEwO30=', 1744621000);

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `isi_tanggapan` text NOT NULL,
  `lampiran` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `isi_tanggapan`, `lampiran`, `created_at`, `updated_at`) VALUES
(1, 3, 'akan segera kami tindak lanjut', NULL, '2025-04-13 20:26:17', '2025-04-13 20:26:17'),
(2, 6, 'baik akn segera kami tindak lanjutkan', NULL, '2025-04-13 20:27:46', '2025-04-13 20:27:46'),
(3, 3, 'pandawara group sudah bersihkan sampah yang meneumpuk', 'lampiran_tanggapan/wPAgHfFyKv9HZeCvxpCmpjiAwfoHLY6cUoIBcXRa.jpg', '2025-04-13 20:29:49', '2025-04-13 20:29:49'),
(4, 8, 'pandawara group sudah membersihkan sampah yang menumpuk', 'lampiran_tanggapan/sDdaSi6zI8kSSAJZmaM3jbjH0CulkuKJKcPNUen8.jpg', '2025-04-13 20:31:09', '2025-04-13 20:31:09'),
(5, 12, 'akan segera kami tindak lanjut', NULL, '2025-04-14 00:02:34', '2025-04-14 00:02:34'),
(6, 2, 'sudah kami perbaiki jalan yang rusak', 'lampiran_tanggapan/eFQdmJ6SkobGqRihliqMN0hpdT4d9ZtTbVbw9oeq.jpg', '2025-04-14 01:42:50', '2025-04-14 01:42:50'),
(7, 13, 'baik atas laporanya ,akan segera kami tindak lanjuti', NULL, '2025-04-14 01:48:44', '2025-04-14 01:48:44'),
(8, 13, 'sudah kami tindak lanjuti banjir di kepri mall', 'lampiran_tanggapan/ZZ8eLMwLqY134S7cdOFv8dInRHlzG4DshC86QuTb.jpg', '2025-04-14 01:49:33', '2025-04-14 01:49:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `dukungan`
--
ALTER TABLE `dukungan`
  ADD PRIMARY KEY (`id_dukungan`),
  ADD KEY `id_pengaduan` (`id_pengaduan`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`id_instansi`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_pengaduan` (`id_pengaduan`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`),
  ADD KEY `id_pengaduan` (`id_pengaduan`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `pengaduan_instansi`
--
ALTER TABLE `pengaduan_instansi`
  ADD KEY `id_pengaduan` (`id_pengaduan`),
  ADD KEY `id_instansi` (`id_instansi`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`),
  ADD KEY `id_pengaduan` (`id_pengaduan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dukungan`
--
ALTER TABLE `dukungan`
  MODIFY `id_dukungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instansi`
--
ALTER TABLE `instansi`
  MODIFY `id_instansi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dukungan`
--
ALTER TABLE `dukungan`
  ADD CONSTRAINT `dukungan_ibfk_1` FOREIGN KEY (`id_pengaduan`) REFERENCES `pengaduan` (`id_pengaduan`) ON DELETE CASCADE,
  ADD CONSTRAINT `dukungan_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`);

--
-- Constraints for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `notifikasi_ibfk_3` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`);

--
-- Constraints for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengaduan_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE;

--
-- Constraints for table `pengaduan_instansi`
--
ALTER TABLE `pengaduan_instansi`
  ADD CONSTRAINT `pengaduan_instansi_ibfk_2` FOREIGN KEY (`id_instansi`) REFERENCES `instansi` (`id_instansi`) ON DELETE CASCADE;

--
-- Constraints for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD CONSTRAINT `tanggapan_ibfk_1` FOREIGN KEY (`id_pengaduan`) REFERENCES `pengaduan` (`id_pengaduan`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
