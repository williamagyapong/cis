-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2018 at 07:03 AM
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
-- Database: `cis_db`
--

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
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `type`, `date_modified`) VALUES
(1, 'English', 'Foreign', '0000-00-00 00:00:00'),
(2, 'French', 'Foreign', '0000-00-00 00:00:00'),
(3, 'German', 'Foreign', '0000-00-00 00:00:00'),
(4, 'Chinese', 'Foreign', '0000-00-00 00:00:00'),
(5, 'Twi', 'Local', '0000-00-00 00:00:00'),
(6, 'Ga', 'Local', '0000-00-00 00:00:00'),
(7, 'Eve', 'Local', '0000-00-00 00:00:00'),
(8, 'Nzema', 'Local', '0000-00-00 00:00:00'),
(9, 'Mamprusi', 'Local', '0000-00-00 00:00:00'),
(10, 'Hausa', 'Local', '0000-00-00 00:00:00'),
(11, 'Fante', 'Local', '0000-00-00 00:00:00');

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
  `date_of_birth` date NOT NULL,
  `residence` varchar(100) NOT NULL,
  `baptismal_status` varchar(10) NOT NULL DEFAULT '0',
  `baptised_on` date NOT NULL,
  `baptised_at` varchar(16) NOT NULL,
  `other_baptised_cong` varchar(125) NOT NULL,
  `marital_status` varchar(16) NOT NULL DEFAULT '0',
  `occupation` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `phone_other` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `languages` text NOT NULL,
  `blood_group` varchar(4) NOT NULL,
  `sickling_status` varchar(4) NOT NULL,
  `last_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kids` varchar(16) NOT NULL,
  `home_town` varchar(64) NOT NULL DEFAULT 'xxxxxxxxxx',
  `region` varchar(16) NOT NULL,
  `education` varchar(32) NOT NULL DEFAULT 'xxxxxxxxxx',
  `picture` varchar(100) NOT NULL,
  `father` text NOT NULL,
  `mother` text NOT NULL,
  `ministry_id` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL,
  `delete_status` varchar(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `member_code`, `f_name`, `m_name`, `l_name`, `gender`, `date_of_birth`, `residence`, `baptismal_status`, `baptised_on`, `baptised_at`, `other_baptised_cong`, `marital_status`, `occupation`, `phone`, `phone_other`, `email`, `languages`, `blood_group`, `sickling_status`, `last_modified`, `kids`, `home_town`, `region`, `education`, `picture`, `father`, `mother`, `ministry_id`, `zone_id`, `delete_status`) VALUES
(9, '3112000001', 'asfcdsasf', '', 'efsergfe', 'M', '2005-12-31', 'hgdjhyfjh', 'not', '0000-00-00', '', '', 'married', 'fdhgdgdjgg', '0501426857', '0123432534', 'willisco413@gmail.com', 'null', '', '', '0000-00-00 00:00:00', '0', 'wefregrtgrt', '', 'tyfyhgkh', '1515586142_IMG_20161011_113454.jpg', '{\"name\":\"\",\"congregation\":\"\"}', '{\"name\":\"\",\"congregation\":\"\"}', 0, 1, '0'),
(10, '0401000001', 'sfdefer', '', 'ertretgr', 'M', '2007-01-04', 'ewrertetger', 'not', '2018-01-09', '', '', 'widowed', 'wedfrefe', '0501426851', '', '', '[\"English\",\"German\"]', 'AB', 'AA', '0000-00-00 00:00:00', '1', 'EWDFRETGRH', '', 'etrtgyry', '1515596594_IMG_20161020_111251.jpg', '{\"name\":\"\",\"congregation\":\"\"}', '{\"name\":\"\",\"congregation\":\"\"}', 1, 1, '0'),
(12, '0101000008', 'sdsfdss', '', 'fsdfgvdfb', 'M', '2015-01-01', '', 'not', '0000-00-00', '', '', '', '', '0501426850', '323445454', '', '[\"English\",\"German\"]', '', '', '2018-01-10 20:15:23', '', 'dsfgdfgdf', '', '', 'IMG_20161011_113454.jpg', '{\"name\":\"\",\"congregation\":\"\"}', '{\"name\":\"\",\"congregation\":\"\"}', 1, 1, '0'),
(16, '3001000012', 'Phillip', 'Owusu', 'Amoah', 'M', '2006-01-30', 'DJaman', 'baptised', '2010-02-24', 'gbawe', '', 'not married', 'Student', '0265854317', '0501426834', 'williamofosuagyapong@gmail.com', '[\"English\"]', 'AB', 'AA', '2018-01-11 06:35:22', '0', 'James Town', 'Greater Accra', 'Tertiary', '1515651833_IMG_20161020_111301.jpg', '{\"name\":\"Samuel Kwesi Agyapong\",\"congregation\":\"African faith\"}', '{\"name\":\"Margaret Afia Fosua\",\"congregation\":\"Victory Bible church\"}', 4, 1, '0'),
(17, '0112000010', 'saddfssds', '', 'dsfcsd', 'M', '2018-12-01', 'asdsfcds', 'baptised', '2018-01-10', 'other church', 'Nsawam Road', 'married', 'sadfcdsfvds', '0501426856', '0123432534', '', '[\"French\",\"Twi\",\"Ga\"]', 'O', 'AS', '2018-01-11 06:45:24', '2', 'asdfsfvd', '', 'sdfsdgvdf', '1515652964_IMG_20170220_104648.jpg', '{\"name\":\"\",\"congregation\":\"\"}', '{\"name\":\"\",\"congregation\":\"\"}', 3, 3, '0'),
(18, '0201000006', 'Richmond', 'Asomani', 'Danso', 'M', '2012-01-02', 'Gbawe', 'baptised', '2018-01-03', 'other church', 'Odokor', 'married', 'Accountant', '0501426834', '', '', '[\"French\",\"German\"]', 'B', 'SS', '2018-01-13 08:42:24', '2', 'Abetifi', 'Eastern', 'O level', '1515832796_IMG_20170220_104648.jpg', '{\"name\":\"\",\"congregation\":\"\"}', '{\"name\":\"\",\"congregation\":\"\"}', 4, 5, '0'),
(19, '1507000007', 'Sandra', '', 'Amanor', 'F', '1993-07-15', 'Akwatia', 'baptised', '2015-02-20', 'gbawe', '', 'not married', 'student', '0501426866', '', '', '[\"English\",\"Twi\",\"Ga\"]', '', '', '2018-01-13 18:08:26', '', 'Akwatia', 'Eastern', 'University', '1515866313_IMG_20170223_095338.jpg', '{\"name\":\"\",\"congregation\":\"\"}', '{\"name\":\"\",\"congregation\":\"\"}', 6, 6, '0'),
(20, '0901000008', 'sfgdfghgfhh', 'sadfgdghtuy', 'sasedfgtryhju', 'F', '2018-01-09', 'etrhyt', 'baptised', '2018-01-15', 'other church', '', 'married', 'erfetgr', '0501426858', '', '', '[\"English\",\"French\",\"German\",\"Chinese\"]', 'B', 'AS', '2018-01-13 18:16:22', '2', 'serrt', 'Brong-Ahafo', 'tryutujyt', '1515867135_IMG_20161006_094902.jpg', '{\"name\":\"\",\"congregation\":\"\"}', '{\"name\":\"\",\"congregation\":\"\"}', 5, 5, '0'),
(21, '0801000009', 'asdfsfds', 'dsfsddg', 'dsfdsfgd', 'M', '2018-01-08', 'asdfd', 'not baptis', '0000-00-00', '', '', 'separated', 'asfdsg', '0501426851', '', '', '[\"French\"]', 'A', '', '2018-01-13 18:19:43', '0', 'dsgfdsg', 'Volta', 'sdfg', '1515867505_IMAG0559.jpg', '{\"name\":\"\",\"congregation\":\"\"}', '{\"name\":\"\",\"congregation\":\"\"}', 6, 6, '0'),
(22, '2501000022', 'asfrdfgdghfrg', 'dfghgfhjgh', 'sdfdgddfdfds', 'F', '2018-01-25', 'efrety', 'not baptis', '0000-00-00', '', '', 'Divorced', 'sadfdsgrtfg', '0501426850', '', '', '[\"English\"]', '', 'AS', '2018-01-13 18:31:56', '0', 'esgtfdg', 'Northern', 'ertrthyt', 'IMG_20170220_104348.jpg', '{\"name\":\"\",\"congregation\":\"\"}', '{\"name\":\"\",\"congregation\":\"\"}', 6, 6, '0'),
(23, '0201000023', 'aaaaaa', 'bbbbbb', 'ccccc', 'M', '2018-01-02', 'fffffffff', 'baptised', '2018-01-08', 'other church', 'Dansoman', 'separated', 'eeeee', '0501426851', '', '', '[\"French\"]', 'A', 'AB', '2018-01-13 18:35:08', '2', 'ddddd', 'Central', 'gggggggg', '1515868437_IMG_20161020_111251.jpg', '{\"name\":\"\",\"congregation\":\"\"}', '{\"name\":\"\",\"congregation\":\"\"}', 2, 3, '1');

-- --------------------------------------------------------

--
-- Table structure for table `ministries`
--

CREATE TABLE `ministries` (
  `id` int(10) UNSIGNED NOT NULL,
  `leader` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `last_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ministries`
--

INSERT INTO `ministries` (`id`, `leader`, `name`, `last_modified`) VALUES
(1, 0, 'Building', '2018-01-06 00:00:00'),
(2, 0, 'Finance', '2018-01-06 00:00:00'),
(3, 0, 'Benevolence', '0000-00-00 00:00:00'),
(4, 0, 'Edification', '0000-00-00 00:00:00'),
(5, 0, 'Evangelism', '0000-00-00 00:00:00'),
(6, 0, 'None', '0000-00-00 00:00:00');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(64) NOT NULL,
  `date_registered` date NOT NULL,
  `member_id` int(11) NOT NULL,
  `image` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `date_registered`, `member_id`, `image`) VALUES
(29, 'william', 'd383ca25641d58227410a9ae98bd54d5', 'Administrator\r\n', '2018-01-09', 1, 'willi.jpg'),
(30, 'sfdsgdfg', '05014268382018', 'ordinary', '0000-00-00', 5, ''),
(31, 'William', '9566352342018', 'ordinary', '0000-00-00', 6, ''),
(32, '', '1970', 'ordinary', '0000-00-00', 7, ''),
(33, '', '1970', 'ordinary', '0000-00-00', 8, ''),
(34, 'asfcdsasf', '05014268571970', 'ordinary', '0000-00-00', 9, ''),
(35, 'sfdefer', '05014268512018', 'ordinary', '0000-00-00', 10, ''),
(36, 'sdsfdss', '05014268501970', 'ordinary', '0000-00-00', 12, ''),
(37, 'Phillip', 'cce293f0f9840c3d0a872041e75d6129', 'Ordinary', '2018-01-11', 16, ''),
(38, 'saddfssds', '7ee70ea9211da5b48b35c944bb77aadb', 'Ordinary', '2018-01-11', 17, ''),
(39, 'Richmond', 'a0f94c1c56002978e0e0bdc05a372866', 'Ordinary', '2018-01-13', 18, ''),
(40, 'Sandra', 'ae22935ed32b17ed1e9bc9ab0bb5a5a7', 'Ordinary', '2018-01-13', 19, ''),
(41, 'sfgdfghgfhh', '030aa7ecca7016cb045c4f0c25164ff7', 'Ordinary', '2018-01-13', 20, ''),
(42, 'asdfsfds', '7f5a2c8c29f6f9077bfce376eda3b2ba', 'Ordinary', '2018-01-13', 21, ''),
(43, 'asfrdfgdghfrg', 'e59ade89e6f8c8daf0ea5fa84789acf6', 'Ordinary', '2018-01-13', 22, ''),
(44, 'aaaaaa', 'ee6fe675f5af3cbd55db9291099a5b64', 'Ordinary', '2018-01-13', 23, '');

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
  `name` varchar(100) NOT NULL,
  `last_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`id`, `name`, `last_modified`) VALUES
(1, 'Djaman', '2018-01-10 00:00:00'),
(2, 'Top - Base', '0000-00-00 00:00:00'),
(3, 'McCarthy', '0000-00-00 00:00:00'),
(4, 'Mallam', '0000-00-00 00:00:00'),
(5, 'Bulemi', '0000-00-00 00:00:00'),
(6, 'None', '2018-01-13 17:53:01');

--
-- Indexes for dumped tables
--

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

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
