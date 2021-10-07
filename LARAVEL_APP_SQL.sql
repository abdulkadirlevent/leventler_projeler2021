-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 07 Eki 2021, 18:16:17
-- Sunucu sürümü: 5.7.33
-- PHP Sürümü: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `vemto`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `caris`
--

CREATE TABLE `caris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticari_unvani` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cari_kodu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soyadi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vergi_dairesi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vergi_no` int(11) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `caris`
--

INSERT INTO `caris` (`id`, `ticari_unvani`, `cari_kodu`, `adi`, `soyadi`, `vergi_dairesi`, `vergi_no`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(15, 'Leventler Asansör', 'CRM403', 'Abdulkadir', 'LEVENT', 'ikitelli', 123, 22, '2021-10-07 12:09:45', '2021-10-07 12:12:05', NULL),
(16, 'BUGA OTIS ASANSÖR', 'CRMBUGA', 'Otis', 'Asamsör', 'Bogaziçi', 1, 23, '2021-10-07 12:09:45', '2021-10-07 12:21:32', NULL),
(17, 'Hyundai asansör servis ticaret a.ş.', 'HYUNDAI123', 'Hyundai', 'ASansör', 'Başka biryer', 0, 24, '2021-10-07 12:09:45', '2021-10-07 14:08:03', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_10_07_000001_create_caris_table', 1),
(6, '2021_10_07_000002_create_projelers_table', 1),
(7, '2021_10_07_000003_create_tesisatlars_table', 1),
(8, '2021_10_07_000004_create_tesisat_is_adimlaris_table', 1),
(9, '2021_10_07_009001_add_foreigns_to_caris_table', 1),
(10, '2021_10_07_009002_add_foreigns_to_projelers_table', 1),
(11, '2021_10_07_009003_add_foreigns_to_tesisatlars_table', 1),
(12, '2021_10_07_009005_add_foreigns_to_tesisat_is_adimlaris_table', 1),
(13, '2021_10_07_150559_create_sessions_table', 1),
(14, '2021_10_07_150615_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 22),
(2, 'App\\Models\\User', 22),
(3, 'App\\Models\\User', 22),
(3, 'App\\Models\\User', 23),
(1, 'App\\Models\\User', 24),
(2, 'App\\Models\\User', 24),
(3, 'App\\Models\\User', 24);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'list caris', 'web', '2021-10-07 12:09:39', '2021-10-07 12:09:39'),
(2, 'view caris', 'web', '2021-10-07 12:09:39', '2021-10-07 12:09:39'),
(3, 'create caris', 'web', '2021-10-07 12:09:39', '2021-10-07 12:09:39'),
(4, 'update caris', 'web', '2021-10-07 12:09:39', '2021-10-07 12:09:39'),
(5, 'delete caris', 'web', '2021-10-07 12:09:39', '2021-10-07 12:09:39'),
(6, 'list tesisatisadimlaris', 'web', '2021-10-07 12:09:39', '2021-10-07 12:09:39'),
(7, 'view tesisatisadimlaris', 'web', '2021-10-07 12:09:39', '2021-10-07 12:09:39'),
(8, 'create tesisatisadimlaris', 'web', '2021-10-07 12:09:39', '2021-10-07 12:09:39'),
(9, 'update tesisatisadimlaris', 'web', '2021-10-07 12:09:39', '2021-10-07 12:09:39'),
(10, 'delete tesisatisadimlaris', 'web', '2021-10-07 12:09:39', '2021-10-07 12:09:39'),
(11, 'list tesisatlars', 'web', '2021-10-07 12:09:39', '2021-10-07 12:09:39'),
(12, 'view tesisatlars', 'web', '2021-10-07 12:09:39', '2021-10-07 12:09:39'),
(13, 'create tesisatlars', 'web', '2021-10-07 12:09:39', '2021-10-07 12:09:39'),
(14, 'update tesisatlars', 'web', '2021-10-07 12:09:39', '2021-10-07 12:09:39'),
(15, 'delete tesisatlars', 'web', '2021-10-07 12:09:39', '2021-10-07 12:09:39'),
(16, 'list projelers', 'web', '2021-10-07 12:09:39', '2021-10-07 12:09:39'),
(17, 'view projelers', 'web', '2021-10-07 12:09:39', '2021-10-07 12:09:39'),
(18, 'create projelers', 'web', '2021-10-07 12:09:39', '2021-10-07 12:09:39'),
(19, 'update projelers', 'web', '2021-10-07 12:09:39', '2021-10-07 12:09:39'),
(20, 'delete projelers', 'web', '2021-10-07 12:09:39', '2021-10-07 12:09:39'),
(21, 'list roles', 'web', '2021-10-07 12:09:40', '2021-10-07 12:09:40'),
(22, 'view roles', 'web', '2021-10-07 12:09:40', '2021-10-07 12:09:40'),
(23, 'create roles', 'web', '2021-10-07 12:09:40', '2021-10-07 12:09:40'),
(24, 'update roles', 'web', '2021-10-07 12:09:40', '2021-10-07 12:09:40'),
(25, 'delete roles', 'web', '2021-10-07 12:09:40', '2021-10-07 12:09:40'),
(26, 'list permissions', 'web', '2021-10-07 12:09:40', '2021-10-07 12:09:40'),
(27, 'view permissions', 'web', '2021-10-07 12:09:40', '2021-10-07 12:09:40'),
(28, 'create permissions', 'web', '2021-10-07 12:09:40', '2021-10-07 12:09:40'),
(29, 'update permissions', 'web', '2021-10-07 12:09:40', '2021-10-07 12:09:40'),
(30, 'delete permissions', 'web', '2021-10-07 12:09:40', '2021-10-07 12:09:40'),
(31, 'list users', 'web', '2021-10-07 12:09:40', '2021-10-07 12:09:40'),
(32, 'view users', 'web', '2021-10-07 12:09:40', '2021-10-07 12:09:40'),
(33, 'create users', 'web', '2021-10-07 12:09:40', '2021-10-07 12:09:40'),
(34, 'update users', 'web', '2021-10-07 12:09:41', '2021-10-07 12:09:41'),
(35, 'delete users', 'web', '2021-10-07 12:09:41', '2021-10-07 12:09:41');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `projelers`
--

CREATE TABLE `projelers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cari_id` bigint(20) UNSIGNED NOT NULL,
  `proje_adi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sozlezme_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `baslama_tarihi` timestamp NOT NULL,
  `teslim_tarihi` timestamp NOT NULL,
  `birim_fiyati` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `projelers`
--

INSERT INTO `projelers` (`id`, `cari_id`, `proje_adi`, `sozlezme_no`, `image`, `baslama_tarihi`, `teslim_tarihi`, `birim_fiyati`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 17, 'BDDK', '12', 'public/MRzUdUdjxR9RaXvnreM40FcW0xh7aLfgM8oXbZP1.jpg', '2000-04-29 21:00:00', '1971-11-03 21:00:00', '50.00', '2021-10-07 12:09:44', '2021-10-07 14:45:31', NULL),
(7, 17, 'GOP PLEVNE', '345', 'public/t9zIpQIv4WmBAN1O5ntl2uiazokYuCkeMrTTht35.jpg', '1996-12-13 21:00:00', '1975-07-18 21:00:00', '43.00', '2021-10-07 12:09:44', '2021-10-07 14:45:43', NULL),
(8, 17, 'MINT OLIVE', '234', 'public/eCVuKtsVmvbfqniIcpBb8OmHeQldC7JMrEpGWi8y.jpg', '2011-06-12 21:00:00', '1996-12-29 21:00:00', '21.00', '2021-10-07 12:09:44', '2021-10-07 14:45:58', NULL),
(10, 15, 'DENEME PROJE', '123456', 'public/ptGFfELFOcH51JUZmerTX3RGn03hG5U2QCTlXhPL.jpg', '1991-07-18 21:00:00', '2020-04-11 21:00:00', '16.00', '2021-10-07 12:09:45', '2021-10-07 14:44:26', NULL),
(11, 15, 'PROJE2', '12121', 'public/cniI4HOTGmyjq1cMpyyOodwRCshPDJYxVRMU7bt0.jpg', '2015-10-16 21:00:00', '2015-01-24 21:00:00', '41.00', '2021-10-07 12:09:45', '2021-10-07 14:44:39', NULL),
(12, 16, 'GALATAPORT', '12', 'public/T3Qw6ddsUssZemDYXR9WGCpUceTpvY9CYN3xcB4z.jpg', '2012-08-11 21:00:00', '2011-04-11 21:00:00', '39.00', '2021-10-07 12:09:45', '2021-10-07 14:44:48', NULL),
(13, 16, 'HALKGYO', '3656', 'public/5bPypsYE0WjbTOWopYdDQs7EoyWsrDrDzRBH0Vyr.jpg', '1977-11-21 21:00:00', '2009-05-14 21:00:00', '19.00', '2021-10-07 12:09:45', '2021-10-07 14:45:00', NULL),
(14, 16, 'Fisa Fiske', '345', 'public/XwUWV8D9mNlFZkvpTFWMjgrXfmrVqFzr9YajNtmJ.jpg', '2016-09-06 21:00:00', '1987-07-01 21:00:00', '70.00', '2021-10-07 12:09:45', '2021-10-07 14:45:15', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'user', 'web', '2021-10-07 12:09:39', '2021-10-07 12:09:39'),
(2, 'super-admin', 'web', '2021-10-07 12:09:41', '2021-10-07 12:09:41'),
(3, 'Personel', 'web', '2021-10-07 13:44:52', '2021-10-07 13:44:52');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(1, 3),
(2, 3),
(11, 3),
(12, 3),
(16, 3),
(17, 3),
(31, 3),
(32, 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('w5MiZRheNWA9sQDnT22zo9v4w0pZgJo5rAj5FMeF', 22, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.71 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiUUVIY2VqcURucUpaMEZIUFY3T1k4T1BKVHRhZkFtejlJV3BPOFV5OSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sZXZlbnRsZXJfcHJvamVsZXIudGVzdC91c2VycyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjIyO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkR3RpRk5vczlRTzFaT1MwczFhVWRwdUNWaFlxb0FMWFFDQVpkajZaWVkwNGtHbXlvWnBIcmEiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJEd0aUZOb3M5UU8xWk9TMHMxYVVkcHVDVmhZcW9BTFhRQ0FaZGo2WllZMDRrR215b1pwSHJhIjt9', 1633630523);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tesisatlars`
--

CREATE TABLE `tesisatlars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tesisat_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `baslama_tarihi` timestamp NOT NULL,
  `teslim_tarihi` timestamp NOT NULL,
  `projeler_id` bigint(20) UNSIGNED NOT NULL,
  `birim_fiyati` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `tesisatlars`
--

INSERT INTO `tesisatlars` (`id`, `tesisat_no`, `baslama_tarihi`, `teslim_tarihi`, `projeler_id`, `birim_fiyati`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '16004', '1998-01-14 21:00:00', '1998-02-05 21:00:00', 11, '49.00', '2021-10-07 12:09:43', '2021-10-07 12:18:56', NULL),
(2, '17001', '1970-10-01 21:00:00', '2018-06-17 21:00:00', 13, '60.00', '2021-10-07 12:09:43', '2021-10-07 12:24:39', NULL),
(3, '17002', '2003-08-03 21:00:00', '1992-07-22 21:00:00', 13, '6.00', '2021-10-07 12:09:43', '2021-10-07 12:24:53', NULL),
(4, '17003', '1972-10-11 21:00:00', '1971-11-21 21:00:00', 13, '45.00', '2021-10-07 12:09:43', '2021-10-07 12:25:03', NULL),
(5, '17005', '1972-10-19 21:00:00', '1977-02-20 21:00:00', 6, '64.00', '2021-10-07 12:09:43', '2021-10-07 14:27:32', NULL),
(6, '15001', '2006-10-15 21:00:00', '2020-10-10 21:00:00', 10, '67.00', '2021-10-07 12:09:45', '2021-10-07 12:15:27', NULL),
(7, '15002', '1975-10-12 21:00:00', '1970-09-18 21:00:00', 10, '3.00', '2021-10-07 12:09:45', '2021-10-07 12:15:47', NULL),
(8, '16001', '2005-01-25 21:00:00', '2019-05-15 21:00:00', 11, '89.00', '2021-10-07 12:09:45', '2021-10-07 12:18:00', NULL),
(9, '16002', '1991-01-02 21:00:00', '1997-04-05 21:00:00', 11, '67.00', '2021-10-07 12:09:45', '2021-10-07 12:18:15', NULL),
(10, '16003', '1972-06-15 21:00:00', '1971-11-25 21:00:00', 10, '77.00', '2021-10-07 12:09:45', '2021-10-07 12:18:37', NULL),
(11, '17006', '2021-10-07 21:00:00', '2021-10-23 21:00:00', 13, '45000.00', '2021-10-07 12:26:27', '2021-10-07 12:26:27', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tesisat_is_adimlaris`
--

CREATE TABLE `tesisat_is_adimlaris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `data_key` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahmin_zaman` double NOT NULL,
  `gerceklesen_zaman` double NOT NULL,
  `kayip_zaman` double NOT NULL,
  `aciklama` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordering` int(11) NOT NULL,
  `tesisatlar_id` bigint(20) UNSIGNED NOT NULL,
  `state` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `tesisat_is_adimlaris`
--

INSERT INTO `tesisat_is_adimlaris` (`id`, `data_key`, `title`, `tahmin_zaman`, `gerceklesen_zaman`, `kayip_zaman`, `aciklama`, `ordering`, `tesisatlar_id`, `state`, `created_at`, `updated_at`) VALUES
(1, 0, 'Kapı montajı', 46, 43, 71, '', 0, 1, 1, '2021-10-07 12:09:44', '2021-10-07 12:09:44'),
(2, 0, 'Tesisat', 24, 27, 19, 'makina tesisatı', 0, 2, 1, '2021-10-07 12:09:44', '2021-10-07 12:09:44'),
(3, 0, 'Makina', 40, 8, 52, '', 0, 3, 2, '2021-10-07 12:09:44', '2021-10-07 12:09:44'),
(4, 0, 'Roleve', 26, 72, 61, '', 0, 4, 2, '2021-10-07 12:09:44', '2021-10-07 12:09:44'),
(5, 0, 'ray montajı', 6, 40, 17, 'montaj tamamlandı', 0, 5, 1, '2021-10-07 12:09:44', '2021-10-07 14:02:46');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(22, 'Abdulkadir LEVENT', 'abdulkadirlevent@hotmail.com', '2021-10-07 12:09:45', '$2y$10$GtiFNos9QO1ZOS0s1aUdpuCVhYqoALXQCAZdj6ZYY04kGmyoZpHra', '5zEUpX8de1bHnLwdVM1R7DUsUoezCRdqGoHDspgitgijhun47DgbazbtSacB', 'public/dHVIKccCv38XG7QlE5rwa42zYkWefNcTRUyVMIJb.jpg', '2021-10-07 12:09:46', '2021-10-07 13:30:25', NULL),
(23, 'OTIS', 'otis@otis.com', '2021-10-07 12:09:46', '$2y$10$GtiFNos9QO1ZOS0s1aUdpuCVhYqoALXQCAZdj6ZYY04kGmyoZpHra', 'fOYCpxgzBuCXDgW2ibSUhsMEB993ERZKQpZ6Y1rM2PVuPsoVbuQcsza10WBL', 'public/8Ky1V6CVnf5rAmzt6UncRoTFM4aLpCL8tbMhEA4u.jpg', '2021-10-07 12:09:46', '2021-10-07 14:03:30', NULL),
(24, 'HYUNDAI', 'magnolia.price@gmail.com', '2021-10-07 12:09:46', '$2y$10$ePv1nLF84wopVu2CLGmAkO/DX/Fvi1DLtC/mYIBboTP3YViQhYt1e', 'r1tUHSbLn0', 'public/Zx64w3QzbGny4xHsOSrO2ncl7IzAw9bwohv6soLk.jpg', '2021-10-07 12:09:46', '2021-10-07 14:07:01', NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `caris`
--
ALTER TABLE `caris`
  ADD PRIMARY KEY (`id`),
  ADD KEY `caris_user_id_foreign` (`user_id`);

--
-- Tablo için indeksler `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Tablo için indeksler `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Tablo için indeksler `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Tablo için indeksler `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Tablo için indeksler `projelers`
--
ALTER TABLE `projelers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projelers_cari_id_foreign` (`cari_id`);

--
-- Tablo için indeksler `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Tablo için indeksler `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Tablo için indeksler `tesisatlars`
--
ALTER TABLE `tesisatlars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tesisatlars_projeler_id_foreign` (`projeler_id`);

--
-- Tablo için indeksler `tesisat_is_adimlaris`
--
ALTER TABLE `tesisat_is_adimlaris`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tesisat_is_adimlaris_tesisatlar_id_foreign` (`tesisatlar_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `caris`
--
ALTER TABLE `caris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Tablo için AUTO_INCREMENT değeri `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Tablo için AUTO_INCREMENT değeri `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `projelers`
--
ALTER TABLE `projelers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `tesisatlars`
--
ALTER TABLE `tesisatlars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `tesisat_is_adimlaris`
--
ALTER TABLE `tesisat_is_adimlaris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `caris`
--
ALTER TABLE `caris`
  ADD CONSTRAINT `caris_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `projelers`
--
ALTER TABLE `projelers`
  ADD CONSTRAINT `projelers_cari_id_foreign` FOREIGN KEY (`cari_id`) REFERENCES `caris` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `tesisatlars`
--
ALTER TABLE `tesisatlars`
  ADD CONSTRAINT `tesisatlars_projeler_id_foreign` FOREIGN KEY (`projeler_id`) REFERENCES `projelers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `tesisat_is_adimlaris`
--
ALTER TABLE `tesisat_is_adimlaris`
  ADD CONSTRAINT `tesisat_is_adimlaris_tesisatlar_id_foreign` FOREIGN KEY (`tesisatlar_id`) REFERENCES `tesisatlars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
