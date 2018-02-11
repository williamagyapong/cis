-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2018 at 06:52 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_cis_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `baptisms`
--

CREATE TABLE `baptisms` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `at` varchar(100) NOT NULL,
  `c_person_name` varchar(155) NOT NULL,
  `c_person_phone` varchar(10) NOT NULL,
  `last_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
  `id` int(10) UNSIGNED NOT NULL,
  `family_id` int(11) NOT NULL,
  `child_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `families`
--

CREATE TABLE `families` (
  `id` int(10) UNSIGNED NOT NULL,
  `father_id` int(11) NOT NULL,
  `mother_id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `last_modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(64) NOT NULL,
  `type` varchar(7) NOT NULL,
  `last_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `type`, `last_modified`, `modified_by`) VALUES
(1, 'English', 'Foreign', '0000-00-00 00:00:00', ''),
(2, 'French', 'Foreign', '0000-00-00 00:00:00', ''),
(3, 'German', 'Foreign', '0000-00-00 00:00:00', ''),
(4, 'Dagbani', 'Foreign', '0000-00-00 00:00:00', ''),
(5, 'Twi', 'Local', '0000-00-00 00:00:00', ''),
(6, 'Ga', 'Local', '0000-00-00 00:00:00', ''),
(7, 'Eve', 'Local', '0000-00-00 00:00:00', ''),
(8, 'Nzema', 'Local', '0000-00-00 00:00:00', ''),
(9, 'Kasem', 'Local', '0000-00-00 00:00:00', ''),
(10, 'Hausa', 'Local', '0000-00-00 00:00:00', ''),
(11, 'Fante', 'Local', '0000-00-00 00:00:00', ''),
(12, 'Adangbe', 'Local', '0000-00-00 00:00:00', ''),
(13, 'Dagaare', 'local', '2018-02-10 20:27:06', ''),
(14, 'Gonja', 'local', '2018-02-10 20:27:22', '');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(10) UNSIGNED NOT NULL,
  `member_code` varchar(10) NOT NULL,
  `f_name` varchar(32) NOT NULL,
  `m_name` varchar(64) NOT NULL,
  `l_name` varchar(64) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `birth_date` date NOT NULL,
  `died_on` date NOT NULL,
  `residence` varchar(100) NOT NULL,
  `baptismal_status` varchar(16) NOT NULL DEFAULT '0',
  `baptised_on` date NOT NULL,
  `baptised_at` varchar(125) NOT NULL,
  `b_contact_person` text NOT NULL,
  `marital_status` varchar(16) NOT NULL DEFAULT '0',
  `occupation` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `phone_other` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `blood_group` varchar(4) NOT NULL,
  `sickling_status` varchar(4) NOT NULL,
  `last_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kids` varchar(16) NOT NULL,
  `home_town` varchar(64) NOT NULL DEFAULT 'xxxxxxxxxx',
  `region_id` int(11) NOT NULL,
  `education` varchar(32) NOT NULL DEFAULT 'xxxxxxxxxx',
  `languages` varchar(50) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `ministry_id` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL,
  `status` varchar(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ministries`
--

CREATE TABLE `ministries` (
  `id` int(10) UNSIGNED NOT NULL,
  `leader` varchar(16) NOT NULL,
  `name` varchar(64) NOT NULL,
  `last_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ministries`
--

INSERT INTO `ministries` (`id`, `leader`, `name`, `last_modified`) VALUES
(1, '0', 'Building', '2018-01-06 00:00:00'),
(2, '0', 'Finance', '2018-01-06 00:00:00'),
(3, '0', 'Benevolence', '0000-00-00 00:00:00'),
(4, '0', 'Edification', '0000-00-00 00:00:00'),
(5, '0', 'Evangelism', '0000-00-00 00:00:00'),
(6, '0', 'None', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `occasions`
--

CREATE TABLE `occasions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `date_organised` date NOT NULL,
  `start_time` time NOT NULL,
  `description` text NOT NULL,
  `last_modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(32) NOT NULL,
  `city` varchar(32) NOT NULL,
  `last_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `name`, `city`, `last_modified`) VALUES
(1, 'Ashanti', 'Kumasi', '2018-01-13 09:17:56'),
(2, 'Brong-Ahafo', 'Sunyani', '2018-01-13 09:17:56'),
(3, 'Greater Accra', 'Accra', '2018-01-13 09:18:48'),
(4, 'Central', 'Cape Coast', '2018-01-13 09:18:48'),
(5, 'Eastern', 'Koforidua', '2018-01-13 09:21:19'),
(6, 'Northern', 'Tamale', '2018-01-13 09:21:19'),
(7, 'Western', 'Sekondi - Takoradi', '2018-01-13 09:22:10'),
(8, 'Upper East', 'Bolgatanga', '2018-01-13 09:22:10'),
(9, 'Upper West', 'Wa', '2018-01-13 09:22:47'),
(10, 'Volta', 'Ho', '2018-01-13 09:22:47');

-- --------------------------------------------------------

--
-- Table structure for table `relations`
--

CREATE TABLE `relations` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `type` varchar(32) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `relationship` varchar(32) NOT NULL,
  `member` varchar(10) NOT NULL,
  `deceased` varchar(4) NOT NULL,
  `last_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(64) NOT NULL,
  `date_registered` date NOT NULL,
  `member_id` int(11) NOT NULL DEFAULT '0',
  `image` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `date_registered`, `member_id`, `image`) VALUES
(1, 'william', 'd383ca25641d58227410a9ae98bd54d5', 'administrator\r\n', '2018-01-09', 0, 'willi.jpg'),
(2, 'admin', '95a75bb45599467228ca2109171f14e4', 'administrator', '2018-02-10', 0, 'coc4-edited.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `inviter` int(11) NOT NULL,
  `occation_id` int(11) NOT NULL,
  `congregation` int(11) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `comments` text NOT NULL COMMENT 'something brief about the visiter and possibly the views held'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `id` int(10) UNSIGNED NOT NULL,
  `leader` varchar(16) NOT NULL,
  `name` varchar(100) NOT NULL,
  `last_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`id`, `leader`, `name`, `last_modified`) VALUES
(1, '0', 'Djaman', '2018-01-10 00:00:00'),
(2, '0', 'Top - Base', '0000-00-00 00:00:00'),
(3, '0', 'McCarthy', '0000-00-00 00:00:00'),
(4, '0', 'Mallam', '0000-00-00 00:00:00'),
(5, '0', 'Bulemin', '0000-00-00 00:00:00'),
(6, '0', 'None', '2018-01-13 17:53:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baptisms`
--
ALTER TABLE `baptisms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `families`
--
ALTER TABLE `families`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ministries`
--
ALTER TABLE `ministries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `occasions`
--
ALTER TABLE `occasions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relations`
--
ALTER TABLE `relations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baptisms`
--
ALTER TABLE `baptisms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `children`
--
ALTER TABLE `children`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `families`
--
ALTER TABLE `families`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ministries`
--
ALTER TABLE `ministries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `occasions`
--
ALTER TABLE `occasions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `relations`
--
ALTER TABLE `relations`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
