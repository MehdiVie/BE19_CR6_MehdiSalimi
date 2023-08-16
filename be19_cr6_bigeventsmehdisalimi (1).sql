-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2023 at 10:42 PM
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
-- Database: `be19_cr6_bigeventsmehdisalimi`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230812120358', '2023-08-12 14:04:12', 76),
('DoctrineMigrations\\Version20230812122040', '2023-08-12 14:20:57', 115);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `capacity` smallint(6) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `url` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL,
  `street_name` varchar(30) NOT NULL,
  `number` varchar(20) NOT NULL,
  `zip_code` varchar(20) NOT NULL,
  `city_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `date`, `description`, `image`, `capacity`, `email`, `phone_number`, `url`, `type`, `street_name`, `number`, `zip_code`, `city_name`) VALUES
(1, 'Event 1', '2024-01-12 17:00:00', 'Description 1', 'bicycle-8029570-1280-64d91d98af798.jpg', 3400, 'event1@event.com', '9548934h943058', 'http://event1.com', 'music', 'Street 1', '1', 'ZipCode-1', 'City 1'),
(2, 'Event 22', '2023-01-27 19:00:00', 'Event 2 Descritption2', 'bird-8165143-1280-64d91d89536f4.jpg', 1200, 'event2@event.com', '8908098', 'http://www.event2.com', 'other', 'Street 2', '2', 'ZipCode_2', 'City 22'),
(3, 'Event 3', '2023-08-18 11:43:00', 'Event 3 Description', 'baseball-7985433-1280-64d91e3a9e381.jpg', 1230, 'event3@event.com', '97879', 'http://www.event3.com', 'movie', 'street 3', '3', '123', 'City 3'),
(4, 'Event 4', '2023-08-16 12:14:00', 'Event 4 Description', 'wall-8155414-1280-64d8ad6ca16ec.jpg', 32767, 'event4@event.com', '78977879', 'http://www.event4.com', 'sport', 'Street 4', '4', 'SWE 4', 'City 4'),
(5, 'Event 5', '2023-08-10 12:16:00', 'Event 5 Description', 'machinery-8154964-1280-64d8addd74453.jpg', 32767, 'event5@event.com', '8797897', 'http://www.event5.com', 'theater', 'Str 5', '5', 'aqw 5', 'City 5'),
(7, 'Event 6', '2023-08-09 18:55:00', 'Event 6 Description', 'yosemite-8177850-1280-64dd1e57ed408.jpg', 4500, 'event6@event.com', '34535545', 'http://www.event6.com', 'music', 'Str 6', '6', 'ZipCode 6', 'City 6'),
(8, 'event7', '2023-08-25 21:20:00', 'event 7 description', 'color-pencils-8127500-1280-64dd209d1e306.jpg', 5400, 'event7@event.com', '3534534', 'www.event7.com', 'sport', 'str 7', '7', 'ZipCode 7', 'City 7');

-- --------------------------------------------------------

--
-- Table structure for table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`) VALUES
(1, 'user@gmail.com', '[\"ROLE_USER\"]', '$2y$13$kGPAAamTiJaMhQ4ScuWyYutmA7mLbT9JxCLbMnALxPju/SeOy3tb6'),
(2, 'user@yahoo.com', '[\"ROLE_ADMIN\"]', '$2y$13$qT2/Qc8JfC5CQhkWiggAAOefRpDcxksyM.QgqMPk02j3Sl1rhmVym'),
(3, 'user@gmx.com', '[\"ROLE_USER\"]', '$2y$13$FA1kN553VBMW4NPaaCfF1.mNdtxJ4mx9TTw62fyRrUw3oGRlWDtAK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
