-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 14, 2019 at 04:51 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ensa_deep_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `etudiants`
--

CREATE TABLE `etudiants` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cne` int(11) NOT NULL DEFAULT '0',
  `abscence` int(11) NOT NULL DEFAULT '0',
  `filiere_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `etudiants`
--

INSERT INTO `etudiants` (`id`, `nom`, `prenom`, `cne`, `abscence`, `filiere_id`, `created_at`, `updated_at`) VALUES
(1, 'Handi', 'Fouad', 123456, 3, 1, '2019-01-13 17:17:01', '2019-01-13 17:17:01'),
(2, 'Talhaoui', 'Ismail', 99999956, 5, 2, '2019-01-13 17:17:28', '2019-01-13 17:17:28');

-- --------------------------------------------------------

--
-- Table structure for table `filieres`
--

CREATE TABLE `filieres` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_01_11_102906_create_profs_table', 1),
(4, '2019_01_11_102919_create_scolarites_table', 1),
(5, '2019_01_11_102938_create_filieres_table', 1),
(6, '2019_01_11_103002_create_etudiants_table', 1),
(7, '2019_01_11_103342_create_prof_filiere_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profs`
--

CREATE TABLE `profs` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_super` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profs`
--

INSERT INTO `profs` (`id`, `nom`, `prenom`, `email`, `status`, `password`, `is_super`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Bouarifi', 'Walid', 'bouarifi@gmail.com', 'developper', '$2y$10$7JZNUHCYToqLURMpGO/NWeKsvoYwh0LNVHgvXmYvNpkybBvHx84D2', 0, NULL, '2019-01-13 16:11:30', '2019-01-13 16:11:30'),
(2, 'Ech-chadi', 'said', 'said@gmail.com', 'ensignant', '$2y$10$551r5vH1G/SW8m8RHmtAIuDbo.e2tM6iK5ZA4q9qsNJFe2c/08nei', 0, NULL, '2019-01-13 17:46:50', '2019-01-13 17:46:50'),
(3, 'gfhfgfhfgffh', 'ikikikiki', 'fdgdfdgdf@gmail.com', 'Professeur', '$2y$10$DugbGByrTNAnKfoPnqNg/.7c5NdFwedJbSzGELDaLq3Uj9wFOUm3i', 0, NULL, '2019-01-14 13:29:37', '2019-01-14 13:29:37'),
(4, 'ujuikik', 'esdsesdse', 'ewdswe@gmail.com', 'Professeur', '$2y$10$.ytSfA4yuZRYmBr47JxUduLvKONjNACz2pqoJCFTFRQAJGBb4RPge', 0, NULL, '2019-01-14 14:07:00', '2019-01-14 14:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `prof_filiere`
--

CREATE TABLE `prof_filiere` (
  `id` int(10) UNSIGNED NOT NULL,
  `prof_id` int(10) UNSIGNED NOT NULL,
  `filiere_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scolarites`
--

CREATE TABLE `scolarites` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_scol` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scolarites`
--

INSERT INTO `scolarites` (`id`, `nom`, `prenom`, `email`, `password`, `is_scol`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ikfikfi', 'dssrsfsr', 'dsesf@gmail.com', '$2y$10$Why1qtF0FjJoTjPHnaZ49e.tEheP5TS9JPrhITj4p1i5oFdN3nIem', 0, NULL, '2019-01-14 14:14:30', '2019-01-14 14:14:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hoummani', 'yassine@gmail.com', NULL, '$2y$10$AIkr88ujP97GPvS40kEqH.KYy8TkI/LoTT13KwCr6ke/ykuxq0rY2', NULL, '2019-01-13 16:04:30', '2019-01-13 16:04:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `etudiants`
--
ALTER TABLE `etudiants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filieres`
--
ALTER TABLE `filieres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profs`
--
ALTER TABLE `profs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prof_filiere`
--
ALTER TABLE `prof_filiere`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scolarites`
--
ALTER TABLE `scolarites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `etudiants`
--
ALTER TABLE `etudiants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `filieres`
--
ALTER TABLE `filieres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `profs`
--
ALTER TABLE `profs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `prof_filiere`
--
ALTER TABLE `prof_filiere`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scolarites`
--
ALTER TABLE `scolarites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
