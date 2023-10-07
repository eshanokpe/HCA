-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2023 at 12:38 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hca`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `role` varchar(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `admin`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@hca.com', '$2y$10$TJRdb1WS1Si/ah4jS2zp.uozZPOTIjcbDAESFkxbY0teB8/V7VYg.', 2, '2', '2023-08-27 02:57:59', '2023-08-27 02:57:59');

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
-- Table structure for table `hca_worker`
--

CREATE TABLE `hca_worker` (
  `id` int(11) NOT NULL,
  `username` varchar(250) DEFAULT NULL,
  `title` varchar(225) DEFAULT NULL,
  `fullname` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `phone` varchar(225) DEFAULT NULL,
  `address` varchar(225) DEFAULT NULL,
  `next_of_kin` varchar(225) DEFAULT NULL,
  `phone2` varchar(225) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `shift` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hca_worker`
--

INSERT INTO `hca_worker` (`id`, `username`, `title`, `fullname`, `email`, `phone`, `address`, `next_of_kin`, `phone2`, `password`, `role`, `shift`, `created_at`, `updated_at`) VALUES
(1, 'HCA1', '', 'HCA1', 'oladokundamiloladaniel@gmail.com', '', '', '', '', '$2y$10$.TXBY6zJFfLpU1MnHwpIaOwB9vMvzu3LOCIZr.62cjgW2o2imJPMG', '4', NULL, '2023-10-07 17:13:11', '2023-08-28 15:54:21'),
(2, 'HCA2', '', 'HCA2', 'odd.cr8tives@gmail.com', '', '', '', '', '$2y$10$14c/HZzDt6FSa8p6pA8VVevUR2j8ppjXfUjlDxsaEokPA23raFsLy', '4', NULL, '2023-10-07 17:13:15', '2023-08-28 18:40:06'),
(3, 'HCA3', '', 'HCA3', 'user@gmail.com', '', '', '', '', '$2y$10$VYZQsRa/Rzo5N7McT3aoEO3/IVvAjulTNH0XMgPkSO0iPjZYqNM5S', '4', NULL, '2023-10-07 17:13:19', '2023-08-28 21:20:50'),
(4, 'HCA4', '', 'HCA4', 'fait@gmail.com', '', '', '', '', '$2y$10$rnixwPiIVnwcDNXzFbtYh.hHDzJDl1RXczi4cia.8Jfe0Vq9KTt82', '4', NULL, '2023-10-07 17:13:25', '2023-09-08 20:40:13'),
(5, 'HCA5', '', 'HCA5', 'dan@gmail.com', '', '', '', '', '$2y$10$eoKWg8xUu.ESjfR/trZNEu9qViWQLykfr16Ebj2iQubiAULLyHuJa', '4', NULL, '2023-10-07 17:13:28', '2023-09-08 20:51:07'),
(6, 'HCA6', 'Mr', 'HCA6', 'oladokundamiloladaniel@gmail.com', '08109422607', 'Ikordu, Lagos State', 'Demola John', '07034567892', '$2y$10$TB6/CO7wPPWg5JMmyv4ujOyVRT7L22oKan7pxecStnoOHAwHtppWm', '4', NULL, '2023-10-07 17:13:32', '2023-09-10 15:31:33'),
(7, 'HCA7', 'Mr', 'HCA7', 'john@gmail.com', '08109422607', 'Ikordu, Lagos State', 'Demola John', '07034567892', '$2y$10$hteTe30m5wgX73oze9GMBOBquHj5NKw9xYZymUBQRy8XAhxKNdzHy', '4', NULL, '2023-10-07 17:13:38', '2023-09-24 20:26:01'),
(8, 'HCA8', 'Mr', 'HCA8', 'johndoe@gmail.com', '08109422607', 'Ikordu, Lagos State', 'Demola John', '07034567892', '$2y$10$ddwSAoVJ5tJZhwtHGvFFYuKErkvBvApmJjERIkmmvPFtmyKdvexaW', '4', NULL, '2023-10-07 17:13:41', '2023-10-01 20:10:23'),
(9, 'HCA9', NULL, 'HCA9', 'hca9@gmail.com', '1234567890', 'ikorodu', 'name', '12345678', '$2y$10$Qq8HuTqRwcO7Y.B0NvEWI.vcPnqRZ//QV./h5D8XJunn9csvuwlXq', '4', NULL, '2023-10-07 17:13:46', '2023-10-07 12:05:00'),
(10, 'HCA10', NULL, 'HCA10', 'hca10@gmail.com', '1234567890', 'ikorodu', 'name', '1234567890', '$2y$10$FrYc.sZRGz4P7QgWmtG06eel1RuSWO8xzR4h.sim8O6k0450CJSxK', '4', NULL, '2023-10-07 11:07:46', '2023-10-07 12:07:46'),
(11, 'HCA11', NULL, 'HCA11', 'hca11@gmail.com', '123456789', 'ikorodu', 'HCA11', '123456789', '$2y$10$W1jKGVJkNuFHs7ohnYPqA.6qGxhGFNvIm.Mxw1WMChkZIQPmbd3Rq', '4', NULL, '2023-10-07 11:25:27', '2023-10-07 12:25:27'),
(12, 'HCA12', NULL, 'HCA12', 'hca12@gmail.com', '1234567890', 'ikorodu', 'HCA11', '1234567890', '$2y$10$9mylD4kWb8aB7JNvzIGsru.OE/NSRjUx3mF2h93rM5vmWykw0R5A.', '4', NULL, '2023-10-07 17:13:58', '2023-10-07 12:26:16'),
(13, 'HCA13', NULL, 'HCA13', 'hca13@gmail.com', '1234567890', 'ikorudo', 'HCA13', '123456789', '$2y$10$0iioISkeF1/Rhk5SvFa/AexQWtfJa0i7OLuzEu11rvYpREmokiVYC', '4', NULL, '2023-10-07 11:27:00', '2023-10-07 12:27:00'),
(14, 'HCA14', NULL, 'HCA14', 'hca14@gmail.com', '123456789', 'ikorodu', 'HCA14', 'HCA14', '$2y$10$..r.K1Txvz0Wc.SEgAzbduXcroYEJizPAjyqAhpNV6i0EKHgwgMNC', '4', NULL, '2023-10-07 11:27:50', '2023-10-07 12:27:50'),
(15, 'HCA15', NULL, 'HCA15', 'hca15@gmail.com', '12345678', 'ikorodu', 'HCA15', 'HCA15', '$2y$10$o4rReyPMZ0Z0i4AX15vUSObcHFnl0y1uFT0YFOrcvlRRJPHxIa8Bi', '4', NULL, '2023-10-07 11:28:24', '2023-10-07 12:28:24'),
(16, 'HCA16', NULL, 'HCA16', 'hca16@gmail.com', '1234567890', 'ikorodu', 'HCA16', 'HCA16', '$2y$10$v90etEAiJkAXKmiv0WhMYeCmbPr.nWUFlb8DdZv0j.be6rnZPZ7Du', '4', NULL, '2023-10-07 11:29:29', '2023-10-07 12:29:29'),
(17, 'HCA17', NULL, 'HCA17', 'hca17@gmail.com', '123456789', 'ikorudu', 'HCA17', '1234567890', '$2y$10$q2pZx4cpGsn5F4dbVFiZ2eEHMvb4BmTDtNzh9M2YH5/kZUkmDRsUG', '4', NULL, '2023-10-07 11:30:19', '2023-10-07 12:30:19'),
(18, 'HCA18', NULL, 'HCA18', 'hca18@gmail.com', '1234567890', 'ikorudu', 'HCA18', '1234567890', '$2y$10$YNA92bSs6pOd2BgBC5tRwOxG7Xn8QwSk88uD.HyMCDBx.cKHhGMV.', '4', NULL, '2023-10-07 11:32:31', '2023-10-07 12:32:31'),
(19, 'HCA19', NULL, 'HCA19', 'hca19@gmail.com', '1234567890', 'ikorodu', 'HCA18', '123456789', '$2y$10$owB75sBRr.CHxrOFqCZn8OemavTgPLNw406n22LwY3zGYTU0mR7K2', '4', NULL, '2023-10-07 11:33:26', '2023-10-07 12:33:26'),
(20, 'HCA20', NULL, 'HCA20', 'hca20@gmail.com', '1234567890', 'ikorodu', 'HCA20', '08139267960', '$2y$10$2FsqGCVIM175dhdDKFptRenecypw22UlSwQHLMDUeSsmeEWgRFhNC', '4', NULL, '2023-10-07 11:34:49', '2023-10-07 12:34:49'),
(21, 'HCA21', NULL, 'HCA21', 'hca21@gmail.com', '08139267960', 'ikorodu, Lagos', 'HCA21', '08139267960', '$2y$10$tBFLm2VorBlzYPRcnosUfuQ.PYLTxmbe5vimD9aTwmlZ0Hz5awOVq', '4', NULL, '2023-10-07 11:35:31', '2023-10-07 12:35:31'),
(22, 'HCA22', NULL, 'HCA22', 'hca22@gmail.com', '08139267960', 'ikorodu, Lagos', 'HCA22', '08139267960', '$2y$10$gfYH7m.WN6vob7xiLzLXxegCRNsuQe9vPPaSaMtMogcp79Z2A73zq', '4', NULL, '2023-10-07 11:36:21', '2023-10-07 12:36:21'),
(23, 'HCA23', NULL, 'HCA23', 'hca23@gmail.com', '08139267960', 'ikorodu, Lagos', 'HCA23', '08139267960', '$2y$10$ayfc8PjU.RY8gR94iD57TutqsM3eX/5ShhNRrss5qSbyWyftwL/e.', '4', NULL, '2023-10-07 11:37:04', '2023-10-07 12:37:04'),
(24, 'HCA24', NULL, 'HCA24', 'hca24@gmail.com', '08139267960', 'ikorodu, Lagos', 'HCA24', '08139267960', '$2y$10$i/gfs6n2BSq2qZdT1rZ0Wu0ZH/d5WOX9tG.fg0vu0z/uD.74dGTNi', '4', NULL, '2023-10-07 11:38:11', '2023-10-07 12:38:11'),
(25, 'HCA25', NULL, 'HCA25', 'hca25@gmail.com', '08139267960', 'ikorodu, Lagos', 'HCA25', '08139267960', '$2y$10$C.3nZNtec1G9QYOHpS8QveQ.CqVY83UcUP5GXfGyRVbGGSN5aXLE6', '4', NULL, '2023-10-07 11:38:52', '2023-10-07 12:38:52'),
(26, 'HCA26', NULL, 'HCA26', 'hca27@gmail.com', '08139267960', 'ikorodu, Lagos', 'HCA26', '08139267960', '$2y$10$Mh9QXoMqXCasr0Jk1fTAzeGKYuBf0Pyh.BDG0f5L.Pt.8NMl6izU6', '4', NULL, '2023-10-07 11:39:33', '2023-10-07 12:39:33'),
(27, 'HCA27', NULL, 'HCA27', 'hca27@gmail.com', '08139267960', 'ikorodu, Lagos', 'HCA27', '08139267960', '$2y$10$0Rum3AlMIhD6cVYDpp1eLOPr48o1JxySXxDqoE4qfBwauYm/qmcPO', '4', NULL, '2023-10-07 11:40:02', '2023-10-07 12:40:02'),
(28, 'HCA28', NULL, 'HCA28', 'hca28@gmail.com', '08139267960', 'ikorodu, Lagos', 'HCA28', '08139267960', '$2y$10$ykTS2Cr7/nqnJEUEeflVNO4bGv28GiQEOsCJ07IFBCaEDYSA93IB6', '4', NULL, '2023-10-07 11:40:50', '2023-10-07 12:40:50'),
(29, 'HCA29', NULL, 'HCA29', 'hca29@gmail.com', '08139267960', 'ikorodu, Lagos', 'HCA29', '08139267960', '$2y$10$Spnxv1OJe0.DoIALRIiQl.PJ/nVSiELhubft76WKegL4Oz4YSGfVu', '4', NULL, '2023-10-07 11:41:21', '2023-10-07 12:41:21'),
(30, 'HCA30', NULL, 'HCA30', 'hca30@gmail.com', '08139267960', 'ikorodu, Lagos', 'HCA30', '08139267960', '$2y$10$ONluw7qPug0tlSBkV8QWXufMcLJFdY4yUQewYDnIgcq2dZoPVwZHy', '4', NULL, '2023-10-07 11:41:56', '2023-10-07 12:41:56');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_10_05_034711_create_schedules_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `id` int(11) NOT NULL,
  `username` varchar(250) DEFAULT NULL,
  `title` varchar(225) DEFAULT NULL,
  `fullname` varchar(250) DEFAULT NULL,
  `position` varchar(225) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `phone` varchar(225) DEFAULT NULL,
  `address` varchar(225) DEFAULT NULL,
  `next_of_kin` varchar(225) DEFAULT NULL,
  `phone2` varchar(225) DEFAULT NULL,
  `supervision` varchar(225) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `shift` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nurse`
--

INSERT INTO `nurse` (`id`, `username`, `title`, `fullname`, `position`, `email`, `phone`, `address`, `next_of_kin`, `phone2`, `supervision`, `status`, `password`, `role`, `shift`, `created_at`, `updated_at`) VALUES
(1, 'Nurse1', '', 'Nurse1', '', 'tommydammy02@gmail.com', '', '', '', '', '', '', '$2y$10$oVjzbe7sUyZFXs1hTmNJFenNTm4kcERuf5pmh8lokRCGPmoi1F4xa', '3', NULL, '2023-10-07 17:11:08', '2023-08-28 20:07:14'),
(2, 'Nurse2', '', 'Nurse2', '', 'odd.cr8tives@gmail.com', '', '', '', '', '', '', '$2y$10$az/1U.knIGnA2Dc7zR3p1eKrA7.xM8cHVBpQTKnIj9.DUeVkMAhGy', '3', NULL, '2023-10-07 17:12:09', '2023-08-28 21:24:01'),
(3, 'Nurse3', '', 'Nurse3', '', 'titi@gmail.com', '', '', '', '', '', '', '$2y$10$r1kOhG8n4Uv8IoWAlP/SOeHtTzCeQG.g74ApiTAF8rh08x5p70G4q', '3', NULL, '2023-10-07 17:12:16', '2023-09-09 08:16:04'),
(4, 'Nurse4', 'Mrs', 'Nurse4', 'Auxilary', 'oladokundamiloladaniel@gmail.com', '08109422607', 'Ikordu, Lagos State', 'Demola John', '07034567892', 'Team 1', 'Team Leader', '$2y$10$SUCh3VgCIq/v/L5WlHPPO.EGv3nl.5mdsQHmWB0uguvV5KGZjpwjm', '3', NULL, '2023-10-07 17:12:20', '2023-09-10 15:08:00'),
(5, 'Nurse5', NULL, 'Nurse5', 'Nurse5', 'nurse5@gmail.com', '08139267960', 'ikorodu, Lagos', 'Nurse5', '08139267960', 'supervision', 'DBS', '$2y$10$lwppiMEHI6zdfBy/gciaQuV7FqvGd3OgpUg/kTqILQWRFC3aPEaLi', '3', NULL, '2023-10-07 11:45:21', '2023-10-07 12:45:21'),
(6, 'Nurse6', NULL, 'Nurse6', 'Nurse6', 'nurse6@gmail.com', '08139267960', 'ikorodu, Lagos', 'Nurse6', '08139267960', 'supervision', 'DBS', '$2y$10$mw5YBPvasYKY8Xv6dj1N2Om3i2GTz2.NmbZsJHZauX1RV2YfCAw26', '3', NULL, '2023-10-07 11:46:11', '2023-10-07 12:46:11'),
(7, 'Nurse7', NULL, 'Nurse7', 'Nurse7', 'nurse7@gmail.com', '08139267960', 'ikorodu, Lagos', 'Nurse7', '08139267960', 'supervision', 'DBS', '$2y$10$aDkXpsnd9h6cTDQ0VCMWaOGCkC4nSKKZ3A0mG3NQBhYpTHManLAmu', '3', NULL, '2023-10-07 11:47:44', '2023-10-07 12:47:44'),
(8, 'Nurse8', NULL, 'Nurse8', 'Nurse8', 'nurse8@gmail.com', '08139267960', 'ikorodu, Lagos', 'Nurse8', '08139267960', 'supervision', 'DBS', '$2y$10$VTd2d3XOHyHquZGEAZTgCONQiYbT9n30aWqwCZzi1QVvmJK1frWEW', '3', NULL, '2023-10-07 11:48:41', '2023-10-07 12:48:41'),
(9, 'Nurse9', NULL, 'Nurse9', 'Nurse9', 'nurse9@gmail.com', '08139267960', 'ikorodu, Lagos', 'Nurse9', '08139267960', 'supervision', 'DBS', '$2y$10$zhPJC/fUX/z/DT4PKWPiyuLY.2YtpdZBgpuiZaCydIqVlH41NTGFi', '3', NULL, '2023-10-07 11:49:31', '2023-10-07 12:49:31'),
(10, 'Nurse10', NULL, 'Nurse10', 'Nurse10', 'nurse10@gmail.com', '08139267960', 'ikorodu, Lagos', 'name', '08139267960', 'supervision', 'DBS', '$2y$10$FZpd0W3W46WwvJI/N/MrWO3cFdyfpSNHdyNXy4mh4cP7NVXuZzIhu', '3', NULL, '2023-10-07 11:50:15', '2023-10-07 12:50:15'),
(11, 'Nurse11', NULL, 'Nurse11', 'Nurse11', 'nurse11@gmail.com', '08139267960', 'ikorodu, Lagos', 'name', '08139267960', 'supervision', 'DBS', '$2y$10$tIVDEg73qfr28QmBmw9rMuZgDuxDfqkVY96g/8Xwu5/ze5cUc9hLK', '3', NULL, '2023-10-07 11:51:00', '2023-10-07 12:51:00'),
(12, 'Nurse12', NULL, 'Nurse12', 'Nurse12', 'nurse12@gmail.com', '08139267960', 'ikorodu, Lagos', 'name', '08139267960', 'supervision', 'DBS', '$2y$10$G5WRpwiHG6YJu6eX2qLOduojU3F72E.aLCIkxQrvPqAqW9eCbnNlO', '3', NULL, '2023-10-07 11:52:51', '2023-10-07 12:52:51'),
(13, 'Nurse13', NULL, 'Nurse13', 'Nurse13', 'nurse13@gmail.com', '08139267960', 'ikorodu, Lagos', 'Nurse13', '08139267960', 'supervision', 'DBS', '$2y$10$6oYmmJ2JRKzyXRIzjyKnlu6IpWmV.KQeiZjlRy0DP3.3U0G8oe2wW', '3', NULL, '2023-10-07 11:54:36', '2023-10-07 12:54:36'),
(14, 'Nurse14', NULL, 'Nurse14', 'Nurse14', 'nurse14@gmail.com', '08139267960', 'ikorodu, Lagos', 'name', '08139267960', 'supervision', 'DBS', '$2y$10$o5Uf0IEfDQcbjXTmxXHM3O87FY2hEiita60wUPdjzVh9CtXIsttPy', '3', NULL, '2023-10-07 11:56:13', '2023-10-07 12:56:13'),
(15, 'Nurse15', NULL, 'Nurse15', 'Nurse15', 'nurse15@gmail.com', '08139267960', 'ikorodu, Lagos', 'name', '08139267960', 'supervision', 'DBS', '$2y$10$TiC9WnlABc7hfYpobG6zfuujxCCm5tVziSuKKtMgzCTi0Hj1L3Q4m', '3', NULL, '2023-10-07 11:57:22', '2023-10-07 12:57:22');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `residents`
--

CREATE TABLE `residents` (
  `id` int(11) NOT NULL,
  `hca_no` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `dob` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `maritalstatus` varchar(225) DEFAULT NULL,
  `room_no` varchar(250) NOT NULL,
  `nationalty` varchar(225) NOT NULL,
  `language` varchar(225) NOT NULL,
  `next_of_kin` varchar(225) NOT NULL,
  `relationship` varchar(225) NOT NULL,
  `phone_no` varchar(225) NOT NULL,
  `nextofkin_address` varchar(225) NOT NULL,
  `nextofkin_gender` varchar(225) NOT NULL,
  `medical_status` varchar(225) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `residents`
--

INSERT INTO `residents` (`id`, `hca_no`, `title`, `fullname`, `dob`, `address`, `email`, `gender`, `maritalstatus`, `room_no`, `nationalty`, `language`, `next_of_kin`, `relationship`, `phone_no`, `nextofkin_address`, `nextofkin_gender`, `medical_status`, `created_at`, `updated_at`) VALUES
(1, 'HCARSDT001', 'Mr', 'Oladokun Damilola', '2023-09-01', 'Ikordu, Lagos State', 'oladokundamiloladaniel@gmail.com', 'male', 'Single', 'Floor 1, Room 1 ', 'United Kingdom', 'English', 'Femi Ola', 'Brother', '08109422607', 'Ikorodu, Lagos State', 'male', 'Placement: On going from...', '2023-09-11 07:50:22', '2023-09-09 18:12:11'),
(2, 'HCARSDT002', 'Mrs', 'Adebola Damilola', '2023-09-01', 'Ikordu, Lagos State', 'odd.cr8tives@gmail.com', 'male', 'Single', 'Floor 1, Room 2', 'United Kingdom', 'English', 'Femi Ola', 'Brother', '08109422607', 'Ikorodu, Lagos State', 'male', 'Placement: Not determine', '2023-09-11 07:52:00', '2023-09-09 18:13:42');

-- --------------------------------------------------------

--
-- Table structure for table `resident_form`
--

CREATE TABLE `resident_form` (
  `id` int(11) NOT NULL,
  `hca_name` varchar(225) NOT NULL,
  `hca_no` varchar(225) NOT NULL,
  `form_type` varchar(225) NOT NULL,
  `date` varchar(225) DEFAULT NULL,
  `time` varchar(225) DEFAULT NULL,
  `type` varchar(225) DEFAULT NULL,
  `quality` varchar(225) DEFAULT NULL,
  `quantity` varchar(225) DEFAULT NULL,
  `qty_taken` varchar(225) DEFAULT NULL,
  `color` varchar(225) DEFAULT NULL,
  `note` varchar(225) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resident_form`
--

INSERT INTO `resident_form` (`id`, `hca_name`, `hca_no`, `form_type`, `date`, `time`, `type`, `quality`, `quantity`, `qty_taken`, `color`, `note`, `created_at`, `updated_at`) VALUES
(1, 'John Doe Ben', 'HCARSDT001', 'Bowel', '2023-09-25', '09:10', 'mediun', NULL, '3ml', '2ml', NULL, 'taken', '2023-09-25 08:13:37', '2023-09-25 08:13:37'),
(2, 'John Doe Ben', 'HCARSDT001', 'Fluid Intake', '2023-09-25', '09:33', 'mediun', NULL, '2ml', '2ml', NULL, 'taken', '2023-09-25 08:29:37', '2023-09-25 08:29:37'),
(3, 'John Doe Ben', 'HCARSDT001', 'Bowel', '2023-09-25', '09:41', 'mediun', '2', NULL, NULL, 'White', 'taken', '2023-09-25 08:36:22', '2023-09-25 08:36:22'),
(4, 'John Doe Bola', 'HCARSDT001', 'Fluid Intake', '2023-10-01', '21:20', 'mediun', NULL, '3ml', '2ml', NULL, 'taken', '2023-10-01 20:19:45', '2023-10-01 20:19:45');

-- --------------------------------------------------------

--
-- Table structure for table `resident_note`
--

CREATE TABLE `resident_note` (
  `id` int(11) NOT NULL,
  `hca_name` varchar(225) NOT NULL,
  `hca_no` varchar(225) NOT NULL,
  `date` varchar(225) NOT NULL,
  `note` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resident_note`
--

INSERT INTO `resident_note` (`id`, `hca_name`, `hca_no`, `date`, `note`, `created_at`, `updated_at`) VALUES
(1, 'John Doe Ben', 'HCARSDT001', '2023-09-25', 'all is well', '2023-09-25 03:09:18', '2023-09-25 04:09:18'),
(2, 'John Doe Ben', 'HCARSDT001', '2023-09-25', 'all is well in deed', '2023-09-25 03:11:19', '2023-09-25 04:11:19'),
(3, 'John Doe Ben', 'HCARSDT001', '2023-09-25', 'all is well in deed', '2023-09-25 03:13:54', '2023-09-25 04:13:54'),
(4, 'John Doe Ben', 'HCARSDT001', '2023-09-28', 'How far...', '2023-09-25 09:37:37', '2023-09-25 10:37:37');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `staff_type_name` text DEFAULT NULL,
  `staff_type` text DEFAULT NULL,
  `shift_type` text DEFAULT NULL,
  `day` text DEFAULT NULL,
  `start_time` text DEFAULT NULL,
  `end_time` text DEFAULT NULL,
  `floor` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `staff_type_name`, `staff_type`, `shift_type`, `day`, `start_time`, `end_time`, `floor`, `created_at`, `updated_at`) VALUES
(1, 'HCA', 'HCA1', 'morning', 'monday', '8:00AM', '6:00PM', '', '2023-10-07 21:38:41', '2023-10-05 04:24:30'),
(2, 'Nurse', 'Nurse1', 'evening', 'monday', '8:00AM', '6:00PM', 'floor1', '2023-10-07 21:39:20', '2023-10-05 04:28:36'),
(3, 'HCA', 'HCA2', 'morning', 'monday', '8:00AM', '6:00PM', '', '2023-10-07 21:45:17', '2023-10-05 05:18:51'),
(4, 'HCA', 'HCA3', 'morning', 'monday', '8:00AM', '6:00PM', '', '2023-10-07 21:45:12', '2023-10-05 05:43:31'),
(5, 'HCA', 'HCA4', 'morning', 'monday', '8:00AM', '6:00PM', '', '2023-10-07 21:45:07', '2023-10-05 05:47:46'),
(6, 'HCA', 'HCA5', 'morning', 'monday', '8:00AM', '6:00PM', '', '2023-10-07 21:45:03', '2023-10-05 05:51:50'),
(8, 'HCA', 'HCA7', 'morning', 'monday', '8:00AM', '6:00PM', '', '2023-10-07 21:44:59', '2023-10-05 05:55:51'),
(9, 'HCA', 'HCA8', 'morning', 'monday', '8:00AM', '6:00PM', 'floor1', '2023-10-07 21:44:56', '2023-10-05 05:56:28'),
(10, 'HCA', 'HCA9', 'morning', 'monday', '8:00AM', '6:00PM', 'floor1', '2023-10-07 21:43:34', '2023-10-07 17:45:01'),
(18, 'Nurse', 'Nurse2', 'morning', 'tuesday', '8:00AM', '6:00PM', 'floor2', '2023-10-07 21:43:30', '2023-10-07 20:22:08'),
(19, 'Nurse', 'Nurse2', 'morning', 'monday', '8:00AM', '6:00PM', NULL, '2023-10-07 21:43:28', '2023-10-07 20:41:41'),
(20, 'Nurse', 'Nurse3', 'morning', 'monday', '8:00AM', '6:00PM', NULL, '2023-10-07 21:41:57', '2023-10-07 20:44:44'),
(21, 'Nurse', 'Nurse4', 'morning', 'monday', '8:00AM', '6:00PM', NULL, '2023-10-07 21:41:53', '2023-10-07 20:55:51'),
(22, 'Nurse', 'Nurse5', 'morning', 'monday', '8:00AM', '6:00PM', NULL, '2023-10-07 21:41:49', '2023-10-07 20:58:07');

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
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hca_worker`
--
ALTER TABLE `hca_worker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `residents`
--
ALTER TABLE `residents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resident_form`
--
ALTER TABLE `resident_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resident_note`
--
ALTER TABLE `resident_note`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hca_worker`
--
ALTER TABLE `hca_worker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nurse`
--
ALTER TABLE `nurse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `residents`
--
ALTER TABLE `residents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `resident_form`
--
ALTER TABLE `resident_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `resident_note`
--
ALTER TABLE `resident_note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
