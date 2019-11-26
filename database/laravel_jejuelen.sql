-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Nov 2019 pada 03.11
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_jejuelen`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `farmers`
--

CREATE TABLE `farmers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` bigint(20) NOT NULL,
  `status` enum('menikah','single') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenisKelamin` enum('laki-laki','perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kewarganegaraan` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ttl` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fotoKtp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `farmers`
--

INSERT INTO `farmers` (`id`, `name`, `nohp`, `email`, `alamat`, `nik`, `status`, `jenisKelamin`, `agama`, `kewarganegaraan`, `ttl`, `image`, `fotoKtp`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'romi', '08232324234', 'romi@test.test', 'kabupaten jember', 162410101098, 'menikah', 'laki-laki', 'islam', 'indonesia', '25-09-1999', 'https://img00.deviantart.net/abf8/i/2017/028/d/3/souma_yukihira__shokugeki_no_souma__vector_by_greenmapple17-d9titiu.png', 'https://res.cloudinary.com/teepublic/image/private/s--MXaEnIYq--/t_Preview/b_rgb:484849,c_limit,f_jpg,h_630,q_90,w_630/v1465719853/production/designs/541177_1.jpg', 14, '2018-09-22 02:32:31', '2018-09-22 02:32:31'),
(3, 'bpk lnkn', '08223232323', 'bpk@test.test', 'jalan nias', 162410101098, 'menikah', 'perempuan', 'islam', 'indonesia', '25-09-1999', 'https://img00.deviantart.net/abf8/i/2017/028/d/3/souma_yukihira__shokugeki_no_souma__vector_by_greenmapple17-d9titiu.png', 'https://res.cloudinary.com/teepublic/image/private/s--MXaEnIYq--/t_Preview/b_rgb:484849,c_limit,f_jpg,h_630,q_90,w_630/v1465719853/production/designs/541177_1.jpg', 17, '2018-09-22 02:39:02', '2018-11-24 05:56:58'),
(4, 'josua', '08223232323', 'josua@test.test', 'jalan nias', 162410101098, 'single', 'laki-laki', 'islam', 'indonesia', '13-12-1997', 'https://www.gravatar.com/avatar/2d89fc6df7da157c73aab7b923be8fb0?d=monsterid', 'https://res.cloudinary.com/teepublic/image/private/s--MXaEnIYq--/t_Preview/b_rgb:484849,c_limit,f_jpg,h_630,q_90,w_630/v1465719853/production/designs/541177_1.jpg', 45, '2018-09-29 03:43:55', '2018-09-29 03:43:55'),
(5, 'jihan', '08232324234', 'jihan@test.test', 'jalan nias', 162410101098, 'single', 'perempuan', 'islam', 'indonesia', '25-09-1999', 'https://www.gravatar.com/avatar/590c6a026e5eb2081cefba509d4b6193?d=monsterid', 'https://res.cloudinary.com/teepublic/image/private/s--MXaEnIYq--/t_Preview/b_rgb:484849,c_limit,f_jpg,h_630,q_90,w_630/v1465719853/production/designs/541177_1.jpg', 46, '2018-09-29 03:51:07', '2018-09-29 03:51:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga_fix`
--

CREATE TABLE `harga_fix` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hargaBuah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `harga_fix`
--

INSERT INTO `harga_fix` (`id`, `nama`, `hargaBuah`, `created_at`, `updated_at`) VALUES
(1, 'apel', 12000, '2018-10-02 18:20:34', '2018-10-13 08:54:03'),
(2, 'semangka', 12000, '2018-10-02 18:20:45', '2018-10-13 08:53:47'),
(3, 'nanas', 20000, '2018-10-02 18:21:04', '2018-10-13 08:53:25'),
(4, 'sirsak', 40000, '2018-10-09 19:43:44', '2018-10-15 01:01:16'),
(5, 'jagung manis', 8000, '2018-11-24 14:23:07', '2018-11-24 14:23:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsumen_mitra`
--

CREATE TABLE `konsumen_mitra` (
  `id` int(10) UNSIGNED NOT NULL,
  `namaCv` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `konsumen_mitra`
--

INSERT INTO `konsumen_mitra` (`id`, `namaCv`, `nohp`, `email`, `alamat`, `image`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'roby', '08223232323', 'robi@test.test', 'jalan nias', 'https://img00.deviantart.net/abf8/i/2017/028/d/3/souma_yukihira__shokugeki_no_souma__vector_by_greenmapple17-d9titiu.png', 23, '2018-09-22 03:14:46', '2018-09-22 03:14:46'),
(2, 'jejen', '08232324234', 'jejen@test.test', 'jalan nias', 'https://img00.deviantart.net/abf8/i/2017/028/d/3/souma_yukihira__shokugeki_no_souma__vector_by_greenmapple17-d9titiu.png', 24, '2018-09-22 03:17:04', '2018-09-22 03:17:04'),
(21, 'hoho', '08232324234', 'hoho@test.test', 'jalan nias', 'https://www.gravatar.com/avatar/a8d431cc5deb168e173d0bf2f7679fb9?d=monsterid', 44, '2018-09-24 06:04:22', '2018-09-24 06:04:22'),
(22, 'berbisyalalal', '36547568', 'din@gmail.com', 'jhkjg.k', 'https://www.gravatar.com/avatar/1a338d6298482e91624cf2ef648b338d?d=monsterid', 48, '2018-10-08 01:39:02', '2018-10-08 01:39:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsumen_umum`
--

CREATE TABLE `konsumen_umum` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `konsumen_umum`
--

INSERT INTO `konsumen_umum` (`id`, `name`, `nohp`, `email`, `alamat`, `image`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'jun', '23232343243', 'joko@test.test', 'jalan nias', 'https://img00.deviantart.net/abf8/i/2017/028/d/3/souma_yukihira__shokugeki_no_souma__vector_by_greenmapple17-d9titiu.png', 5, '2018-09-21 22:19:21', '2018-09-21 22:19:21'),
(3, 'lazuardi', '08232324234', 'lazu@test.test', 'jalan nias', 'https://img00.deviantart.net/abf8/i/2017/028/d/3/souma_yukihira__shokugeki_no_souma__vector_by_greenmapple17-d9titiu.png', 6, '2018-09-21 22:24:06', '2018-09-21 22:24:06'),
(4, 'nad', '165765', 'nad@gmail.com', 'dfwrgv3', 'https://www.gravatar.com/avatar/6efc8de6cb59375cb95b6ff79cebcf12?d=monsterid', 47, '2018-10-08 01:35:44', '2018-10-08 01:35:44'),
(7, 'nadia', '02338283829', 'nadia@test.test', 'jl nias', 'https://www.gravatar.com/avatar/9c8bbf0c70fa184b263366e10ec3e25f?d=monsterid', 55, '2018-10-23 19:36:17', '2018-10-23 19:36:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_status_beli_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2018_09_20_052650_create_farmers_table', 1),
(5, '2018_09_20_052842_create_konsumen_umum_table', 1),
(6, '2018_09_20_052907_create_konsumen_mitra_table', 1),
(7, '2018_09_20_053745_create_harga_fix_table', 1),
(8, '2018_09_20_054432_create_produk_kg_table', 1),
(9, '2018_09_20_054525_create_produk_lahan_table', 1),
(10, '2018_09_20_054552_create_pesanan_table', 1),
(11, '2018_09_20_054617_create_pengiriman_table', 1),
(12, '2018_09_20_054637_create_pembayaran_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(10) UNSIGNED NOT NULL,
  `norekening` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pembayaran` enum('verifikasi','pengiriman','sampai') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'verifikasi',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `norekening`, `image`, `status_pembayaran`, `created_at`, `updated_at`) VALUES
(3, '1234-5543-3456-7654', '1541635961-100 Manfaat dan Efek Samping Buah Sirsak Lengkap.jpg', 'sampai', '2018-11-07 17:12:41', '2018-11-15 18:59:05'),
(4, '5679-7654-6789-9876', '1541636044-Semangka-1.jpg', 'pengiriman', '2018-11-07 17:14:05', '2019-03-31 23:34:17'),
(5, '5544-6656-6565-4445', '1541913203-Screenshot_2.jpg', 'verifikasi', '2018-11-10 22:13:23', '2018-11-15 18:38:28'),
(7, '4564-4554-6777-7754', '1541914962-Screenshot_2.jpg', 'pengiriman', '2018-11-10 22:42:42', '2018-11-15 18:29:30'),
(8, '5675-4466-8866-5335', '1542003302-Screenshot_3.jpg', 'sampai', '2018-11-11 23:15:02', '2018-11-16 17:28:03'),
(9, '3637-2782-8233-7223', '1542003809-Screenshot_3.jpg', 'sampai', '2018-11-11 23:23:29', '2018-11-16 17:55:07'),
(10, '2322-3311-2333-1212', '1542386365-images.jpg', 'sampai', '2018-11-16 16:39:25', '2018-11-16 16:44:35'),
(11, '3223-4553-3211-3456', '1543042892-images.jpg', 'verifikasi', '2018-11-24 07:01:32', '2018-11-24 07:01:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id` int(10) UNSIGNED NOT NULL,
  `pesanan_id` int(10) UNSIGNED NOT NULL,
  `tanggalAntar` timestamp NULL DEFAULT NULL,
  `tanggalSampai` timestamp NULL DEFAULT NULL,
  `status` enum('belum diantar','onproses','done') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `produkLahan_id` int(10) UNSIGNED DEFAULT NULL,
  `produkKg_id` int(10) UNSIGNED DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `hargaTot` int(11) NOT NULL,
  `status` enum('terbayar','tidak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'tidak',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `user_id`, `produkLahan_id`, `produkKg_id`, `jumlah`, `hargaTot`, `status`, `created_at`, `updated_at`) VALUES
(5, 5, NULL, 7, 70, 2800000, 'terbayar', '2018-10-22 21:40:09', '2018-11-11 23:23:01'),
(6, 5, NULL, 4, 10, 200000, 'terbayar', '2018-10-22 21:48:19', '2018-11-16 16:35:38'),
(7, 44, NULL, 7, 20, 1200000, 'terbayar', '2018-10-23 10:42:58', '2018-11-10 22:33:43'),
(10, 44, NULL, 5, 16, 640000, 'terbayar', '2018-10-23 17:52:07', '2018-11-07 17:13:26'),
(11, 44, 1, NULL, 2501000, 2501000, 'terbayar', '2018-10-23 18:18:45', '2018-11-10 22:12:29'),
(12, 55, NULL, 7, 5, 200000, 'tidak', '2018-10-23 19:37:29', '2018-10-23 19:37:29'),
(13, 44, 3, NULL, 3501000, 3501000, 'terbayar', '2018-10-23 19:40:31', '2018-11-07 16:54:44'),
(14, 5, NULL, 5, 2, 80000, 'terbayar', '2018-11-01 23:36:12', '2018-11-11 23:23:01'),
(15, 44, NULL, 7, 6, 240000, 'terbayar', '2018-11-10 22:32:54', '2018-11-10 22:42:27'),
(17, 44, NULL, 4, 5, 100000, 'terbayar', '2018-11-11 23:13:37', '2018-11-11 23:13:56'),
(18, 5, NULL, 7, 5, 200000, 'terbayar', '2018-11-11 23:23:58', '2018-11-16 16:37:54'),
(21, 44, NULL, 5, 10, 400000, 'tidak', '2018-11-16 17:52:05', '2018-11-16 17:52:05'),
(22, 55, NULL, 5, 5, 200000, 'tidak', '2018-11-24 07:00:50', '2018-11-24 07:00:50'),
(23, 55, NULL, 4, 1, 20000, 'terbayar', '2018-11-24 07:00:58', '2018-11-24 07:01:07'),
(24, 44, NULL, 7, 2, 80000, 'tidak', '2018-11-24 13:01:49', '2018-11-24 13:01:49'),
(25, 44, NULL, 16, 10, 400000, 'tidak', '2018-11-25 22:23:04', '2018-11-25 22:23:04'),
(26, 47, NULL, 17, 7, 84000, 'tidak', '2018-11-25 22:26:38', '2018-11-25 22:26:50'),
(27, 5, NULL, 12, 8, 96000, 'terbayar', '2019-04-03 02:56:42', '2019-04-03 02:57:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_kg`
--

CREATE TABLE `produk_kg` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int(11) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hargaFix_id` int(10) UNSIGNED NOT NULL,
  `farmers_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produk_kg`
--

INSERT INTO `produk_kg` (`id`, `nama`, `stok`, `image`, `slug`, `deskripsi`, `hargaFix_id`, `farmers_id`, `created_at`, `updated_at`) VALUES
(4, 'nanas', 34, '1540035272-Semangka-1.jpg', 'nanas', '<p>peroduk bari lurrr</p>', 3, 1, '2018-10-20 04:34:33', '2018-11-24 07:00:58'),
(5, 'sirsak', 55, '1540365101-maxresdefault.jpg', 'sirsak', '<p>masih dalam proses editing</p>', 4, 1, '2018-10-20 06:37:18', '2018-11-24 07:00:50'),
(7, 'sirsak', 28, '1540043512-100 Manfaat dan Efek Samping Buah Sirsak Lengkap.jpg', 'sirsak-1540043512', '<p style=\"font-family: \'Noto Sans\', sans-serif; text-size-adjust: 100%; background-image: none; background-position: 0px 0px; background-size: initial; background-repeat: repeat; background-attachment: scroll; background-origin: initial; background-clip: initial; border: 0px none; font-size: 16px; margin: 0px 0px 30px; outline: none 0px; padding: 0px; box-sizing: border-box; line-height: 1.8em;\"><strong style=\"text-size-adjust: 100%; background: none 0px 0px repeat scroll transparent; border: 0px none; margin: 0px; outline: none 0px; padding: 0px; box-sizing: border-box;\">Merdeka.com -&nbsp;</strong><strong style=\"text-size-adjust: 100%; background: none 0px 0px repeat scroll transparent; border: 0px none; margin: 0px; outline: none 0px; padding: 0px; box-sizing: border-box;\"><a style=\"font-family: arial; text-size-adjust: 100%; background: none 0px 0px repeat scroll transparent; border: 0px none; margin: 0px; outline: none medium; padding: 0px; box-sizing: border-box; color: #2b67a2; text-decoration: none;\" href=\"https://www.merdeka.com/sehat/8-manfaat-rebusan-daun-sirsak-untuk-kesehatan-dan-cara-pengolahannya-kln.html\">sirsak</a></strong>,&nbsp;<strong style=\"text-size-adjust: 100%; background: none 0px 0px repeat scroll transparent; border: 0px none; margin: 0px; outline: none 0px; padding: 0px; box-sizing: border-box;\"><a style=\"font-family: arial; text-size-adjust: 100%; background: none 0px 0px repeat scroll transparent; border: 0px none; margin: 0px; outline: none medium; padding: 0px; box-sizing: border-box; color: #2b67a2; text-decoration: none;\" href=\"https://www.merdeka.com/gaya/cara-membuat-es-buah-segar-dengan-susu-yang-enak-dan-mudah-kln.html\">buah</a></strong>&nbsp;berwarna hijau berduri yang banyak ditemukan di daerah tropis ini memiliki&nbsp;<strong style=\"text-size-adjust: 100%; background: none 0px 0px repeat scroll transparent; border: 0px none; margin: 0px; outline: none 0px; padding: 0px; box-sizing: border-box;\"><a style=\"font-family: arial; text-size-adjust: 100%; background: none 0px 0px repeat scroll transparent; border: 0px none; margin: 0px; outline: none medium; padding: 0px; box-sizing: border-box; color: #2b67a2; text-decoration: none;\" href=\"https://www.merdeka.com/gaya/resep-semur-daging-kln.html\">daging</a></strong>&nbsp;yang lembut dan berair. Belakangan ini buah dengan rasa asam manis tersebut menuai popularitas karena khasiat daunnya untuk mengobati kanker. Penelitian telah menunjukkan bahwa sirsak dapat membunuh sel kanker hingga 10 kali, lebih efektif dibandingkan kemoterapi. Ternyata buah ini memang sudah lama menjadi bagian dari pengobatan tradisional.</p>\r\n<p style=\"font-family: \'Noto Sans\', sans-serif; text-size-adjust: 100%; background-image: none; background-position: 0px 0px; background-size: initial; background-repeat: repeat; background-attachment: scroll; background-origin: initial; background-clip: initial; border: 0px none; font-size: 16px; margin: 0px 0px 30px; outline: none 0px; padding: 0px; box-sizing: border-box; line-height: 1.8em;\">Tetapi ternyata bukan hanya itu manfaat sirsak. Sirsak juga memiliki banyak khasiat untuk kecantikan&nbsp;<strong style=\"text-size-adjust: 100%; background: none 0px 0px repeat scroll transparent; border: 0px none; margin: 0px; outline: none 0px; padding: 0px; box-sizing: border-box;\"><a style=\"font-family: arial; text-size-adjust: 100%; background: none 0px 0px repeat scroll transparent; border: 0px none; margin: 0px; outline: none medium; padding: 0px; box-sizing: border-box; color: #2b67a2; text-decoration: none;\" href=\"https://www.merdeka.com/gaya/20-cara-memutihkan-kulit-secara-alami-tanpa-efek-samping-terbukti-ampuh-kln.html\">kulit</a></strong>&nbsp;dan&nbsp;<strong style=\"text-size-adjust: 100%; background: none 0px 0px repeat scroll transparent; border: 0px none; margin: 0px; outline: none 0px; padding: 0px; box-sizing: border-box;\"><a style=\"font-family: arial; text-size-adjust: 100%; background: none 0px 0px repeat scroll transparent; border: 0px none; margin: 0px; outline: none medium; padding: 0px; box-sizing: border-box; color: #2b67a2; text-decoration: none;\" href=\"https://www.merdeka.com/sehat/cara-menghilangkan-kutu-rambut-kln.html\">rambut</a></strong>. Mau tahu apa saja? Berikut ini kami tampilkan khasiat-khasiat buah dan daun sirsak untuk kecantikan yang dikutip dari Stylecraze.</p>\r\n<p style=\"font-family: \'Noto Sans\', sans-serif; text-size-adjust: 100%; background-image: none; background-position: 0px 0px; background-size: initial; background-repeat: repeat; background-attachment: scroll; background-origin: initial; background-clip: initial; border: 0px none; font-size: 16px; margin: 0px 0px 30px; outline: none 0px; padding: 0px; box-sizing: border-box; line-height: 1.8em;\"><strong style=\"font-family: arial; text-size-adjust: 100%; background: none 0px 0px repeat scroll transparent; border: 0px none; margin: 0px; outline: none 0px; padding: 0px; box-sizing: border-box;\">1. Menyembuhkan gangguan pada kulit</strong></p>\r\n<p style=\"font-family: \'Noto Sans\', sans-serif; text-size-adjust: 100%; background-image: none; background-position: 0px 0px; background-size: initial; background-repeat: repeat; background-attachment: scroll; background-origin: initial; background-clip: initial; border: 0px none; font-size: 16px; margin: 0px 0px 30px; outline: none 0px; padding: 0px; box-sizing: border-box; line-height: 1.8em;\">Daun sirsak memiliki kualitas penyembuhan yang efektif, karena itu cocok digunakan untuk mengobati berbagai masalah kulit. Jika Anda menempelkan daun sirsak segar pada kulit Anda yang bermasalah, maka penyakit kulit akan lebih cepat sembuh.</p>\r\n<p style=\"font-family: \'Noto Sans\', sans-serif; text-size-adjust: 100%; background-image: none; background-position: 0px 0px; background-size: initial; background-repeat: repeat; background-attachment: scroll; background-origin: initial; background-clip: initial; border: 0px none; font-size: 16px; margin: 0px 0px 30px; outline: none 0px; padding: 0px; box-sizing: border-box; line-height: 1.8em;\"><strong style=\"font-family: arial; text-size-adjust: 100%; background: none 0px 0px repeat scroll transparent; border: 0px none; margin: 0px; outline: none 0px; padding: 0px; box-sizing: border-box;\">2. Melawan tanda penuaan</strong></p>\r\n<p style=\"font-family: \'Noto Sans\', sans-serif; text-size-adjust: 100%; background-image: none; background-position: 0px 0px; background-size: initial; background-repeat: repeat; background-attachment: scroll; background-origin: initial; background-clip: initial; border: 0px none; font-size: 16px; margin: 0px 0px 30px; outline: none 0px; padding: 0px; box-sizing: border-box; line-height: 1.8em;\">Buah sirsak mengandung asam askorbat dan vitamin C yang tinggi. Kedua kandungan itu berfungsi antioksidan dalam tubuh kita yang dapat membantu mengurangi tanda-tanda penuaan seperti keriput, garis-garis halus dan pigmentasi pada kulit.</p>\r\n<p style=\"font-family: \'Noto Sans\', sans-serif; text-size-adjust: 100%; background-image: none; background-position: 0px 0px; background-size: initial; background-repeat: repeat; background-attachment: scroll; background-origin: initial; background-clip: initial; border: 0px none; font-size: 16px; margin: 0px 0px 30px; outline: none 0px; padding: 0px; box-sizing: border-box; line-height: 1.8em;\"><strong style=\"font-family: arial; text-size-adjust: 100%; background: none 0px 0px repeat scroll transparent; border: 0px none; margin: 0px; outline: none 0px; padding: 0px; box-sizing: border-box;\">3. Mengatasi kutu</strong></p>\r\n<p style=\"font-family: \'Noto Sans\', sans-serif; text-size-adjust: 100%; background-image: none; background-position: 0px 0px; background-size: initial; background-repeat: repeat; background-attachment: scroll; background-origin: initial; background-clip: initial; border: 0px none; font-size: 16px; margin: 0px 0px 30px; outline: none 0px; padding: 0px; box-sizing: border-box; line-height: 1.8em;\">Siapa sangka kalau daun sirsak juga bisa berfungsi sebagai obat anti-kutu rambut? Untuk mengatasi kutu yang bersarang di rambut, gunakan daun sirsak yang sudah dilumatkan untuk creambath. Usapkan hingga merata di seluruh bagian rambut dan kulit kepala. Setelah itu bungkus kepala dengan handuk hangat dan diamkan selama 30 menit.</p>\r\n<p style=\"font-family: \'Noto Sans\', sans-serif; text-size-adjust: 100%; background-image: none; background-position: 0px 0px; background-size: initial; background-repeat: repeat; background-attachment: scroll; background-origin: initial; background-clip: initial; border: 0px none; font-size: 16px; margin: 0px 0px 30px; outline: none 0px; padding: 0px; box-sizing: border-box; line-height: 1.8em;\"><strong style=\"font-family: arial; text-size-adjust: 100%; background: none 0px 0px repeat scroll transparent; border: 0px none; margin: 0px; outline: none 0px; padding: 0px; box-sizing: border-box;\">4. Mencegah rambut rontok</strong></p>\r\n<p style=\"font-family: \'Noto Sans\', sans-serif; text-size-adjust: 100%; background-image: none; background-position: 0px 0px; background-size: initial; background-repeat: repeat; background-attachment: scroll; background-origin: initial; background-clip: initial; border: 0px none; font-size: 16px; margin: 0px 0px 30px; outline: none 0px; padding: 0px; box-sizing: border-box; line-height: 1.8em;\">Sirsak, dengan kandungan vitamin C yang tinggi di dalamnya dapat membantu mencegah dan mengatasi rambut rontok. Rajin mengonsunsi buah sirsak akan menjadikan rambut lebih sehat dan kuat.</p>\r\n<p style=\"font-family: \'Noto Sans\', sans-serif; text-size-adjust: 100%; background-image: none; background-position: 0px 0px; background-size: initial; background-repeat: repeat; background-attachment: scroll; background-origin: initial; background-clip: initial; border: 0px none; font-size: 16px; margin: 0px 0px 30px; outline: none 0px; padding: 0px; box-sizing: border-box; line-height: 1.8em;\"><strong style=\"font-family: arial; text-size-adjust: 100%; background: none 0px 0px repeat scroll transparent; border: 0px none; margin: 0px; outline: none 0px; padding: 0px; box-sizing: border-box;\">5. Mengurangi&nbsp;<strong style=\"font-family: \'Noto Sans\', sans-serif; text-size-adjust: 100%; background: none 0px 0px repeat scroll transparent; border: 0px none; margin: 0px; outline: none 0px; padding: 0px; box-sizing: border-box;\"><a style=\"font-family: arial; text-size-adjust: 100%; background: none 0px 0px repeat scroll transparent; border: 0px none; margin: 0px; outline: none medium; padding: 0px; box-sizing: border-box; color: #2b67a2; text-decoration: none;\" href=\"https://www.merdeka.com/gaya/10-cara-menghilangkan-ketombe-secara-alami-cepat-dan-permanen-kln.html\">ketombe</a></strong></strong></p>\r\n<p style=\"font-family: \'Noto Sans\', sans-serif; text-size-adjust: 100%; background-image: none; background-position: 0px 0px; background-size: initial; background-repeat: repeat; background-attachment: scroll; background-origin: initial; background-clip: initial; border: 0px none; font-size: 16px; margin: 0px 0px 30px; outline: none 0px; padding: 0px; box-sizing: border-box; line-height: 1.8em;\">Daun sirsak mengandung bahan yang bersifat anti-parasit. Jika dioleskan pada kulit kepala kandungan anti-parasit tadi akan membantu melawan ketombe beserta gejala yang ditimbulkan, termasuk kulit kepala gatal dan kering&nbsp;<strong style=\"font-family: arial; text-size-adjust: 100%; background: none 0px 0px repeat scroll transparent; border: 0px none; margin: 0px; outline: none 0px; padding: 0px; box-sizing: border-box;\">[tsr]</strong></p>', 4, 1, '2018-10-20 06:51:52', '2018-11-24 13:01:49'),
(8, 'semangka', 15, '1543069316-no-one-cares-795980-unsplash.jpg', 'semangka', '<p>semangka kualitas terbaik</p>', 1, 3, '2018-11-24 14:21:57', '2018-11-24 14:21:57'),
(9, 'jagung manis', 15, '1543069455-jagung-manis-2.jpg', 'jagung-manis', '<p>Kulitas Baikk</p>', 5, 3, '2018-11-24 14:24:15', '2018-11-24 14:24:15'),
(10, 'sirsak', 30, '1543069487-1540042638-100 Manfaat dan Efek Samping Buah Sirsak Lengkap.jpg', 'sirsak-1543069487', '<p>manis murni nasional</p>', 4, 3, '2018-11-24 14:24:47', '2018-11-24 14:24:47'),
(11, 'jagung manis', 44, '1543069554-no-one-cares-795980-unsplash.jpg', 'jagung-manis-1543069554', '<p>itu lahannya lur</p>', 5, 4, '2018-11-24 14:25:54', '2018-11-24 14:25:54'),
(12, 'semangka', 12, '1543069587-1540035272-Semangka-1.jpg', 'semangka-1543069586', '<p>Manis udah di ujicoba di ITB dan IPB</p>', 1, 4, '2018-11-24 14:26:27', '2019-04-03 02:56:42'),
(13, 'sirsak', 10, '1543069618-1540042638-100 Manfaat dan Efek Samping Buah Sirsak Lengkap.jpg', 'sirsak-1543069618', '<p>Hijau banget pasti Manis</p>', 4, 4, '2018-11-24 14:26:58', '2018-11-24 14:26:58'),
(14, 'jagung manis', 19, '1543069888-jagung-manis-2.jpg', 'jagung-manis-1543069888', '<p>jangung manis banget cocok untuk lauk makan</p>', 5, 5, '2018-11-24 14:31:28', '2018-11-24 14:31:28'),
(15, 'apel', 30, '1543069910-1540035272-Semangka-1.jpg', 'apel', '<p>podo merae</p>', 1, 5, '2018-11-24 14:31:50', '2018-11-24 14:31:50'),
(16, 'sirsak', 0, '1543069934-1540042638-100 Manfaat dan Efek Samping Buah Sirsak Lengkap.jpg', 'sirsak-1543069934', '<p>bengong mau nulis apaan</p>', 4, 5, '2018-11-24 14:32:14', '2018-11-25 22:23:04'),
(17, 'semangka', 26, '1543069966-1540035272-Semangka-1.jpg', 'semangka-1543069966', '<p>sundul gan</p>', 1, 5, '2018-11-24 14:32:46', '2018-11-25 22:26:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_lahan`
--

CREATE TABLE `produk_lahan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stokAwal` int(11) NOT NULL,
  `stokAkhir` int(11) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `masatanam` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `perkiraanPanen` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `farmers_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produk_lahan`
--

INSERT INTO `produk_lahan` (`id`, `nama`, `stokAwal`, `stokAkhir`, `image`, `slug`, `deskripsi`, `masatanam`, `perkiraanPanen`, `harga`, `farmers_id`, `created_at`, `updated_at`) VALUES
(1, 'apel', 12, 100, '1539454119-note.png', 'apel', 'iioasioaosdns', '17-10-2018', '21-02-2019', 5002000, 1, '2018-10-13 11:08:39', '2018-10-13 11:08:39'),
(2, 'sirsak new model', 15, 150, '1540043593-100 Manfaat dan Efek Samping Buah Sirsak Lengkap.jpg', 'sirsak-new-model', '<p style=\"font-family: \'Noto Sans\', sans-serif; text-size-adjust: 100%; background-image: none; background-position: 0px 0px; background-size: initial; background-repeat: repeat; background-attachment: scroll; background-origin: initial; background-clip: initial; border: 0px none; font-size: 16px; margin: 0px 0px 30px; outline: none 0px; padding: 0px; box-sizing: border-box; line-height: 1.8em;\"><strong style=\"text-size-adjust: 100%; background: none 0px 0px repeat scroll transparent; border: 0px none; margin: 0px; outline: none 0px; padding: 0px; box-sizing: border-box;\">Merdeka.com -&nbsp;</strong><strong style=\"text-size-adjust: 100%; background: none 0px 0px repeat scroll transparent; border: 0px none; margin: 0px; outline: none 0px; padding: 0px; box-sizing: border-box;\"><a style=\"font-family: arial; text-size-adjust: 100%; background: none 0px 0px repeat scroll transparent; border: 0px none; margin: 0px; outline: none medium; padding: 0px; box-sizing: border-box; color: #2b67a2; text-decoration: none;\" href=\"https://www.merdeka.com/sehat/8-manfaat-rebusan-daun-sirsak-untuk-kesehatan-dan-cara-pengolahannya-kln.html\">sirsak</a></strong>,&nbsp;<strong style=\"text-size-adjust: 100%; background: none 0px 0px repeat scroll transparent; border: 0px none; margin: 0px; outline: none 0px; padding: 0px; box-sizing: border-box;\"><a style=\"font-family: arial; text-size-adjust: 100%; background: none 0px 0px repeat scroll transparent; border: 0px none; margin: 0px; outline: none medium; padding: 0px; box-sizing: border-box; color: #2b67a2; text-decoration: none;\" href=\"https://www.merdeka.com/gaya/cara-membuat-es-buah-segar-dengan-susu-yang-enak-dan-mudah-kln.html\">buah</a></strong>&nbsp;berwarna hijau berduri yang banyak ditemukan di daerah tropis ini memiliki&nbsp;<strong style=\"text-size-adjust: 100%; background: none 0px 0px repeat scroll transparent; border: 0px none; margin: 0px; outline: none 0px; padding: 0px; box-sizing: border-box;\"><a style=\"font-family: arial; text-size-adjust: 100%; background: none 0px 0px repeat scroll transparent; border: 0px none; margin: 0px; outline: none medium; padding: 0px; box-sizing: border-box; color: #2b67a2; text-decoration: none;\" href=\"https://www.merdeka.com/gaya/resep-semur-daging-kln.html\">daging</a></strong>&nbsp;yang lembut dan berair. Belakangan ini buah dengan rasa asam manis tersebut menuai popularitas karena khasiat daunnya untuk mengobati kanker. Penelitian telah menunjukkan bahwa sirsak dapat membunuh sel kanker hingga 10 kali, lebih efektif dibandingkan kemoterapi. Ternyata buah ini memang sudah lama menjadi bagian dari pengobatan tradisional.</p>\r\n<p style=\"font-family: \'Noto Sans\', sans-serif; text-size-adjust: 100%; background-image: none; background-position: 0px 0px; background-size: initial; background-repeat: repeat; background-attachment: scroll; background-origin: initial; background-clip: initial; border: 0px none; font-size: 16px; margin: 0px 0px 30px; outline: none 0px; padding: 0px; box-sizing: border-box; line-height: 1.8em;\">Tetapi ternyata bukan hanya itu manfaat sirsak. Sirsak juga memiliki banyak khasiat untuk kecantikan&nbsp;<strong style=\"text-size-adjust: 100%; background: none 0px 0px repeat scroll transparent; border: 0px none; margin: 0px; outline: none 0px; padding: 0px; box-sizing: border-box;\"><a style=\"font-family: arial; text-size-adjust: 100%; background: none 0px 0px repeat scroll transparent; border: 0px none; margin: 0px; outline: none medium; padding: 0px; box-sizing: border-box; color: #2b67a2; text-decoration: none;\" href=\"https://www.merdeka.com/gaya/20-cara-memutihkan-kulit-secara-alami-tanpa-efek-samping-terbukti-ampuh-kln.html\">kulit</a></strong>&nbsp;dan&nbsp;<strong style=\"text-size-adjust: 100%; background: none 0px 0px repeat scroll transparent; border: 0px none; margin: 0px; outline: none 0px; padding: 0px; box-sizing: border-box;\"><a style=\"font-family: arial; text-size-adjust: 100%; background: none 0px 0px repeat scroll transparent; border: 0px none; margin: 0px; outline: none medium; padding: 0px; box-sizing: border-box; color: #2b67a2; text-decoration: none;\" href=\"https://www.merdeka.com/sehat/cara-menghilangkan-kutu-rambut-kln.html\">rambut</a></strong>. Mau tahu apa saja? Berikut ini kami tampilkan khasiat-khasiat buah dan daun sirsak untuk kecantikan yang dikutip dari Stylecraze.</p>\r\n<p style=\"font-family: \'Noto Sans\', sans-serif; text-size-adjust: 100%; background-image: none; background-position: 0px 0px; background-size: initial; background-repeat: repeat; background-attachment: scroll; background-origin: initial; background-clip: initial; border: 0px none; font-size: 16px; margin: 0px 0px 30px; outline: none 0px; padding: 0px; box-sizing: border-box; line-height: 1.8em;\"><strong style=\"font-family: arial; text-size-adjust: 100%; background: none 0px 0px repeat scroll transparent; border: 0px none; margin: 0px; outline: none 0px; padding: 0px; box-sizing: border-box;\">1. Menyembuhkan gangguan pada kulit</strong></p>\r\n<p style=\"font-family: \'Noto Sans\', sans-serif; text-size-adjust: 100%; background-image: none; background-position: 0px 0px; background-size: initial; background-repeat: repeat; background-attachment: scroll; background-origin: initial; background-clip: initial; border: 0px none; font-size: 16px; margin: 0px 0px 30px; outline: none 0px; padding: 0px; box-sizing: border-box; line-height: 1.8em;\">Daun sirsak memiliki kualitas penyembuhan yang efektif, karena itu cocok digunakan untuk mengobati berbagai masalah kulit. Jika Anda menempelkan daun sirsak segar pada kulit Anda yang bermasalah, maka penyakit kulit akan lebih cepat sembuh.</p>\r\n<p style=\"font-family: \'Noto Sans\', sans-serif; text-size-adjust: 100%; background-image: none; background-position: 0px 0px; background-size: initial; background-repeat: repeat; background-attachment: scroll; background-origin: initial; background-clip: initial; border: 0px none; font-size: 16px; margin: 0px 0px 30px; outline: none 0px; padding: 0px; box-sizing: border-box; line-height: 1.8em;\"><strong style=\"font-family: arial; text-size-adjust: 100%; background: none 0px 0px repeat scroll transparent; border: 0px none; margin: 0px; outline: none 0px; padding: 0px; box-sizing: border-box;\">2. Melawan tanda penuaan</strong></p>\r\n<p style=\"font-family: \'Noto Sans\', sans-serif; text-size-adjust: 100%; background-image: none; background-position: 0px 0px; background-size: initial; background-repeat: repeat; background-attachment: scroll; background-origin: initial; background-clip: initial; border: 0px none; font-size: 16px; margin: 0px 0px 30px; outline: none 0px; padding: 0px; box-sizing: border-box; line-height: 1.8em;\">Buah sirsak mengandung asam askorbat dan vitamin C yang tinggi. Kedua kandungan itu berfungsi antioksidan dalam tubuh kita yang dapat membantu mengurangi tanda-tanda penuaan seperti keriput, garis-garis halus dan pigmentasi pada kulit.</p>\r\n<p style=\"font-family: \'Noto Sans\', sans-serif; text-size-adjust: 100%; background-image: none; background-position: 0px 0px; background-size: initial; background-repeat: repeat; background-attachment: scroll; background-origin: initial; background-clip: initial; border: 0px none; font-size: 16px; margin: 0px 0px 30px; outline: none 0px; padding: 0px; box-sizing: border-box; line-height: 1.8em;\"><strong style=\"font-family: arial; text-size-adjust: 100%; background: none 0px 0px repeat scroll transparent; border: 0px none; margin: 0px; outline: none 0px; padding: 0px; box-sizing: border-box;\">3. Mengatasi kutu</strong></p>\r\n<p style=\"font-family: \'Noto Sans\', sans-serif; text-size-adjust: 100%; background-image: none; background-position: 0px 0px; background-size: initial; background-repeat: repeat; background-attachment: scroll; background-origin: initial; background-clip: initial; border: 0px none; font-size: 16px; margin: 0px 0px 30px; outline: none 0px; padding: 0px; box-sizing: border-box; line-height: 1.8em;\">Siapa sangka kalau daun sirsak juga bisa berfungsi sebagai obat anti-kutu rambut? Untuk mengatasi kutu yang bersarang di rambut, gunakan daun sirsak yang sudah dilumatkan untuk creambath. Usapkan hingga merata di seluruh bagian rambut dan kulit kepala. Setelah itu bungkus kepala dengan handuk hangat dan diamkan selama 30 menit.</p>\r\n<p style=\"font-family: \'Noto Sans\', sans-serif; text-size-adjust: 100%; background-image: none; background-position: 0px 0px; background-size: initial; background-repeat: repeat; background-attachment: scroll; background-origin: initial; background-clip: initial; border: 0px none; font-size: 16px; margin: 0px 0px 30px; outline: none 0px; padding: 0px; box-sizing: border-box; line-height: 1.8em;\"><strong style=\"font-family: arial; text-size-adjust: 100%; background: none 0px 0px repeat scroll transparent; border: 0px none; margin: 0px; outline: none 0px; padding: 0px; box-sizing: border-box;\">4. Mencegah rambut rontok</strong></p>\r\n<p style=\"font-family: \'Noto Sans\', sans-serif; text-size-adjust: 100%; background-image: none; background-position: 0px 0px; background-size: initial; background-repeat: repeat; background-attachment: scroll; background-origin: initial; background-clip: initial; border: 0px none; font-size: 16px; margin: 0px 0px 30px; outline: none 0px; padding: 0px; box-sizing: border-box; line-height: 1.8em;\">Sirsak, dengan kandungan vitamin C yang tinggi di dalamnya dapat membantu mencegah dan mengatasi rambut rontok. Rajin mengonsunsi buah sirsak akan menjadikan rambut lebih sehat dan kuat.</p>\r\n<p style=\"font-family: \'Noto Sans\', sans-serif; text-size-adjust: 100%; background-image: none; background-position: 0px 0px; background-size: initial; background-repeat: repeat; background-attachment: scroll; background-origin: initial; background-clip: initial; border: 0px none; font-size: 16px; margin: 0px 0px 30px; outline: none 0px; padding: 0px; box-sizing: border-box; line-height: 1.8em;\"><strong style=\"font-family: arial; text-size-adjust: 100%; background: none 0px 0px repeat scroll transparent; border: 0px none; margin: 0px; outline: none 0px; padding: 0px; box-sizing: border-box;\">5. Mengurangi&nbsp;<strong style=\"font-family: \'Noto Sans\', sans-serif; text-size-adjust: 100%; background: none 0px 0px repeat scroll transparent; border: 0px none; margin: 0px; outline: none 0px; padding: 0px; box-sizing: border-box;\"><a style=\"font-family: arial; text-size-adjust: 100%; background: none 0px 0px repeat scroll transparent; border: 0px none; margin: 0px; outline: none medium; padding: 0px; box-sizing: border-box; color: #2b67a2; text-decoration: none;\" href=\"https://www.merdeka.com/gaya/10-cara-menghilangkan-ketombe-secara-alami-cepat-dan-permanen-kln.html\">ketombe</a></strong></strong></p>\r\n<p style=\"font-family: \'Noto Sans\', sans-serif; text-size-adjust: 100%; background-image: none; background-position: 0px 0px; background-size: initial; background-repeat: repeat; background-attachment: scroll; background-origin: initial; background-clip: initial; border: 0px none; font-size: 16px; margin: 0px 0px 30px; outline: none 0px; padding: 0px; box-sizing: border-box; line-height: 1.8em;\">Daun sirsak mengandung bahan yang bersifat anti-parasit. Jika dioleskan pada kulit kepala kandungan anti-parasit tadi akan membantu melawan ketombe beserta gejala yang ditimbulkan, termasuk kulit kepala gatal dan kering&nbsp;<strong style=\"font-family: arial; text-size-adjust: 100%; background: none 0px 0px repeat scroll transparent; border: 0px none; margin: 0px; outline: none 0px; padding: 0px; box-sizing: border-box;\">[tsr]</strong></p>', '20-10-2018', '18-01-2019', 1302000, 1, '2018-10-20 06:53:13', '2018-10-20 06:53:13'),
(3, 'Buah naga', 15, 300, '1540195229-15.jpg', 'buah-naga', '<p><span style=\"color: #222222; font-family: arial, sans-serif; font-size: small;\"><strong>Buah naga</strong> adalah buah dari beberapa jenis kaktus dari marga Hylocereus dan Selenicereus. Buah ini berasal dari Meksiko, Amerika Tengah dan Amerika Selatan namun sekarang juga dibudidayakan di negara-negara Asia seperti Taiwan, Vietnam, Filipina, Indonesia dan Malaysia.</span></p>', '22-10-2018', '25-01-2019', 7002000, 3, '2018-10-22 01:00:29', '2018-10-22 01:00:29'),
(4, 'Lahan jangung manis', 16, 300, '1543069687-jagung-manis-2.jpg', 'lahan-jangung-manis', '<p>Lahan jangung dengan menggnkan benih terbaik di jajarannya</p>', '07-11-2018', '18-04-2019', 10002000, 4, '2018-11-24 14:28:08', '2018-11-24 14:28:08'),
(5, 'Mangga Rujak', 30, 500, '1543069818-1540042638-100 Manfaat dan Efek Samping Buah Sirsak Lengkap.jpg', 'mangga-rujak', '<p>yahh mangka legen</p>', '24-11-2018', '12-04-2019', 1002000, 4, '2018-11-24 14:30:18', '2018-11-24 14:30:18'),
(6, 'Singkong', 15, 400, '1543070019-luca-bravo-177552-unsplash .jpg', 'singkong', '<p>yahh di balek nya itu gambarnya</p>', '24-11-2018', '09-01-2019', 1002000, 5, '2018-11-24 14:33:39', '2018-11-24 14:33:39'),
(7, 'nanas manis', 10, 100, '1543070102-1540035272-Semangka-1.jpg', 'nanas-manis', '<p>yah yahh manis kok</p>', '08-11-2018', '08-02-2019', 2502000, 5, '2018-11-24 14:35:02', '2018-11-24 14:35:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `statistik`
--

CREATE TABLE `statistik` (
  `id` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `hargaBuah` int(11) NOT NULL,
  `hargafix_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `statistik`
--

INSERT INTO `statistik` (`id`, `nama`, `hargaBuah`, `hargafix_id`, `created_at`, `updated_at`) VALUES
(1, 'sirsak', 10000, 4, '2018-10-13 00:18:45', '2018-10-13 00:18:45'),
(2, 'sirsak', 15000, 4, '2018-10-13 00:19:01', '2018-10-13 00:19:01'),
(3, 'sirsak', 20000, 4, '2018-10-13 00:19:12', '2018-10-13 00:19:12'),
(4, 'sirsak', 25000, 4, '2018-10-13 00:19:23', '2018-10-13 00:19:23'),
(5, 'sirsak', 10000, 4, '2018-10-13 00:19:37', '2018-10-13 00:19:37'),
(6, 'nanas', 20000, 3, '2018-10-13 08:53:25', '2018-10-13 08:53:25'),
(7, 'semangka', 30000, 2, '2018-10-13 08:53:37', '2018-10-13 08:53:37'),
(8, 'semangka', 12000, 2, '2018-10-13 08:53:46', '2018-10-13 08:53:46'),
(9, 'apel', 2000, 1, '2018-10-13 08:53:56', '2018-10-13 08:53:56'),
(10, 'apel', 12000, 1, '2018-10-13 08:54:03', '2018-10-13 08:54:03'),
(11, 'sirsak', 1000, 4, '2018-10-13 08:59:41', '2018-10-13 08:59:41'),
(12, 'sirsak', 15000, 4, '2018-10-13 08:59:50', '2018-10-13 08:59:50'),
(13, 'sirsak', 25000, 4, '2018-10-13 08:59:56', '2018-10-13 08:59:56'),
(14, 'sirsak', 35000, 4, '2018-10-13 23:20:31', '2018-10-13 23:20:31'),
(15, 'sirsak', 40000, 4, '2018-10-15 01:01:15', '2018-10-15 01:01:15'),
(16, 'jagung manis', 8000, 5, '2018-11-24 14:23:07', '2018-11-24 14:23:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_beli`
--

CREATE TABLE `status_beli` (
  `id` int(10) UNSIGNED NOT NULL,
  `keterangan` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `status_beli`
--

INSERT INTO `status_beli` (`id`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'mitra', NULL, NULL),
(2, 'umum', NULL, NULL),
(3, 'petani', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_pesanan` int(10) UNSIGNED NOT NULL,
  `id_pembayaran` int(10) UNSIGNED DEFAULT NULL,
  `totalPembayaran` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_pesanan`, `id_pembayaran`, `totalPembayaran`, `created_at`, `updated_at`) VALUES
(13, 7, 3, 3901000, '2018-11-08 00:12:41', '2018-11-07 17:12:41'),
(14, 13, 3, 3901000, '2018-11-08 00:12:42', '2018-11-07 17:12:42'),
(15, 10, 4, 640000, '2018-11-08 00:14:05', '2018-11-07 17:14:05'),
(16, 11, 5, 2501000, '2018-11-11 05:13:23', '2018-11-10 22:13:23'),
(17, 15, 7, 240000, '2018-11-11 05:42:43', '2018-11-10 22:42:43'),
(18, 17, 8, 100000, '2018-11-12 06:15:03', '2018-11-11 23:15:03'),
(19, 5, 9, 2880000, '2018-11-12 06:23:29', '2018-11-11 23:23:29'),
(20, 14, 9, 2880000, '2018-11-12 06:23:29', '2018-11-11 23:23:29'),
(21, 6, 10, 400000, '2018-11-16 16:39:25', '2018-11-16 16:39:25'),
(22, 18, 10, 400000, '2018-11-16 16:39:25', '2018-11-16 16:39:25'),
(23, 23, 11, 20000, '2018-11-24 07:01:32', '2018-11-24 07:01:32'),
(24, 27, NULL, 96000, '2019-04-03 02:57:18', '2019-04-03 02:57:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT '0',
  `status_id` int(10) UNSIGNED DEFAULT NULL,
  `status` enum('setuju','tidak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'setuju',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `level`, `status_id`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'ardi_anto', 'ardi@test.test', '$2y$10$pl8OumcSbcgPoBbol64tz.n4k8wdWVbqetQxzB.JDobdraNq1GxMW', 0, NULL, 'setuju', 'fPgdRQzDWUcS0eBLmxvXkcHmoRXjF9L3YdlEYJBpBbX9jkj2diZEhOij3BVS', '2018-09-21 22:16:04', '2018-09-21 22:16:04'),
(5, 'joko', 'joko@test.test', '$2y$10$1ZXeDLZNz11NGH0gJGuYYOsFbJzvLx5FTAt5ZZind35UKf6fAmJZW', 3, 2, 'setuju', '4h0urrct3mONelVaMxTuGsMyo9cUByr4SyTyFeyHDnSrm5qaeNX807jgTyFh', '2018-09-21 22:19:21', '2018-09-21 22:19:21'),
(6, 'ardi_lala', 'lazu@test.test', '$2y$10$aYJ7vDYA1Vbs9VUKuCeo5e5.pxnbNiPgsbvEK1APdoe/4DrC2KYUm', 3, 2, 'setuju', 'NTGw2oqznG6ArIrlLVhc62rPJGMClmB4qjgL8RPlHloJle8sqlAV1ItGsyVm', '2018-09-21 22:24:06', '2018-09-21 22:24:06'),
(14, 'romi_awwa', 'romi@test.test', '$2y$10$XmBo5iKH/kFz6DDcUbST3.rNlk6A3cLMZXx7nZ1/ddApu2CzCqv6G', 1, 3, 'setuju', 'ZtINXXwifUELa8wW2xrHnvLVaHTT58lfus5FPYUfl6dk98BYRzokYbMCOhNL', '2018-09-22 02:32:31', '2018-09-22 02:32:31'),
(17, 'bpk', 'bpk@test.test', '$2y$10$S4zG4/dIksmNwQJWK1h4n.KW06JiEBte/lYG1OvFFE3rOSnJbdAZ.', 1, 3, 'setuju', '93U0eANvIxeJ2vGa2RL0awGf6ZwbBTJknKq1d5eUSaYmd8ieK6hTHSJOSQP9', '2018-09-22 02:39:02', '2018-11-24 06:28:46'),
(23, 'robi_wahyu', 'robi@test.test', '$2y$10$uQr4RTeytmwB.SQTYZdQRe6kVWfNomixpVr7bLof984txklBPNwAO', 2, 1, 'tidak', 'BfRXxcaB85Uaq4x5nc7PgMmmibRBkJeM0nV16drHGuSr1KrfFEuWLNiNtzei', '2018-09-22 03:14:46', '2018-09-22 03:14:46'),
(24, 'jejen', 'jejen@test.test', '$2y$10$zerJvi6yx5z3xVg8VAJlaeUIW1QjxZTWzK2rE9mDacTq9eIOCbfp2', 2, 1, 'tidak', 'Ah0F9KAWm9WlwoxBOjW1QcfAfi33VAIQeww1qoioZ0tgy5uSmT3qKSnusQza', '2018-09-22 03:17:04', '2018-09-22 03:17:04'),
(44, 'hoho', 'hoho@test.test', '$2y$10$kl8xw3YxmYWDHBLey32dEugHAXpDKRkHM.jpWW8.0C156NOVQSQSa', 2, 1, 'setuju', 'kASVyhqzPIf2jREVi6z6m4nQZ3Ux48JxHgZHFKkYjJ0hQu5SBvY1SsHRdOiR', '2018-09-24 06:04:22', '2018-09-24 06:04:22'),
(45, 'josua', 'josua@test.test', '$2y$10$Lxn1dWOsJzUm7KpggTjhGuCUPW2ADbmLiEMy9gLTJ4UO9/xuDiK1e', 1, 3, 'setuju', 'ipzRRT0qx531hmnm5q7jCtvMMSCWVriLtcLwQu5zeHa0lAmXsIyGPbzzrDme', '2018-09-29 03:43:55', '2018-09-29 03:43:55'),
(46, 'jihan', 'jihan@test.test', '$2y$10$cGVZQd2J.ttw3F8OPBuBbOOa9ljU7nZF5WlAZX5w3kRlW2SztQJ1O', 1, 3, 'setuju', 'a8R6cFnWQ9RdxxXlH8Pc3f92g8KhPmjycv9GwWigTW90edGFZAklBkk693ax', '2018-09-29 03:51:07', '2018-11-24 13:24:42'),
(47, 'nananana', 'nad@gmail.com', '$2y$10$R8NByo0E.WVyULK11yusBehFBpHB1mFpsH1zQgz/l3PZttOLH4XKW', 3, 2, 'setuju', 'Ix3VtlBH7sFKv3twdWMsb8u9uXxxb17LmcuNYjBbwf4uMELnzWNhOgzHxAd4', '2018-10-08 01:35:44', '2018-10-08 01:35:44'),
(48, 'din', 'din@gmail.com', '$2y$10$vUbFT4.cxce6QRGekNO5OeoUQJTagTTCBGL.9LaPZCC49CItXJeVe', 2, 1, 'tidak', 'jmi0ny1v2PM5lIpmasCvRcdYfy30ZJc8lHt6z8xvTnnuOEaveENOU3bw3SkO', '2018-10-08 01:39:02', '2018-10-08 01:39:02'),
(55, 'nadia', 'nadia@test.test', '$2y$10$jE9E1QOR13qFvegZpXdW1.qULwQm0qP.ZCgWxS1b8pymgaRgVLnyC', 3, 2, 'setuju', '46X1zlLRPcv4gpTw0Vxw5mpN8EUzH2zC4cQc3rtWwXfmnio2wNWM8icm85sG', '2018-10-23 19:36:17', '2018-10-23 19:36:17');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `farmers`
--
ALTER TABLE `farmers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `farmers_email_unique` (`email`),
  ADD KEY `farmers_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `harga_fix`
--
ALTER TABLE `harga_fix`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `konsumen_mitra`
--
ALTER TABLE `konsumen_mitra`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `konsumen_mitra_email_unique` (`email`),
  ADD KEY `konsumen_mitra_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `konsumen_umum`
--
ALTER TABLE `konsumen_umum`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `konsumen_umum_email_unique` (`email`),
  ADD KEY `konsumen_umum_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengiriman_pesanan_id_foreign` (`pesanan_id`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesanan_produklahan_id_foreign` (`produkLahan_id`),
  ADD KEY `pesanan_produkkg_id_foreign` (`produkKg_id`),
  ADD KEY `pesanan_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `produk_kg`
--
ALTER TABLE `produk_kg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produk_kg_hargafix_id_foreign` (`hargaFix_id`),
  ADD KEY `produk_kg_farmers_id_foreign` (`farmers_id`);

--
-- Indeks untuk tabel `produk_lahan`
--
ALTER TABLE `produk_lahan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produk_lahan_farmers_id_foreign` (`farmers_id`);

--
-- Indeks untuk tabel `statistik`
--
ALTER TABLE `statistik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hargafix_id` (`hargafix_id`);

--
-- Indeks untuk tabel `status_beli`
--
ALTER TABLE `status_beli`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pesanan` (`id_pesanan`),
  ADD KEY `id_pembayaran` (`id_pembayaran`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_status_id_foreign` (`status_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `farmers`
--
ALTER TABLE `farmers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `harga_fix`
--
ALTER TABLE `harga_fix`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `konsumen_mitra`
--
ALTER TABLE `konsumen_mitra`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `konsumen_umum`
--
ALTER TABLE `konsumen_umum`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `produk_kg`
--
ALTER TABLE `produk_kg`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `produk_lahan`
--
ALTER TABLE `produk_lahan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `statistik`
--
ALTER TABLE `statistik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `status_beli`
--
ALTER TABLE `status_beli`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `farmers`
--
ALTER TABLE `farmers`
  ADD CONSTRAINT `farmers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `konsumen_mitra`
--
ALTER TABLE `konsumen_mitra`
  ADD CONSTRAINT `konsumen_mitra_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `konsumen_umum`
--
ALTER TABLE `konsumen_umum`
  ADD CONSTRAINT `konsumen_umum_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_pesanan_id_foreign` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_produkkg_id_foreign` FOREIGN KEY (`produkKg_id`) REFERENCES `produk_kg` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pesanan_produklahan_id_foreign` FOREIGN KEY (`produkLahan_id`) REFERENCES `produk_lahan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pesanan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `produk_kg`
--
ALTER TABLE `produk_kg`
  ADD CONSTRAINT `produk_kg_farmers_id_foreign` FOREIGN KEY (`farmers_id`) REFERENCES `farmers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `produk_kg_hargafix_id_foreign` FOREIGN KEY (`hargaFix_id`) REFERENCES `harga_fix` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `produk_lahan`
--
ALTER TABLE `produk_lahan`
  ADD CONSTRAINT `produk_lahan_farmers_id_foreign` FOREIGN KEY (`farmers_id`) REFERENCES `farmers` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `statistik`
--
ALTER TABLE `statistik`
  ADD CONSTRAINT `statistik_ibfk_1` FOREIGN KEY (`hargafix_id`) REFERENCES `harga_fix` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_pembayaran`) REFERENCES `pembayaran` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status_beli` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
