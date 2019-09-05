-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2018 at 09:15 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bullying`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `phone_number` int(25) DEFAULT NULL,
  `first_name` varchar(25) DEFAULT NULL,
  `last_name` varchar(25) DEFAULT NULL,
  `user_id` int(25) DEFAULT NULL,
  `councelor_id` int(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `topic_id` int(4) NOT NULL,
  `no_comments` int(4) DEFAULT '0',
  `topic_username` varchar(40) NOT NULL,
  `topic` varchar(300) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`topic_id`, `no_comments`, `topic_username`, `topic`, `date_created`) VALUES
(20, 2, 'akash247', 'test3', '2018-03-25 10:00:37'),
(21, 2, 'akash247', 'test4', '2018-03-25 12:11:09'),
(22, 2, 'akash247', 'what is bullying', '2018-03-25 13:51:11'),
(23, 1, 'akash247', 'what is exclusion', '2018-03-25 17:41:46'),
(24, 1, 'akash247', 'someone is faking my fb profile', '2018-03-26 08:57:22');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `complaint_id` int(5) NOT NULL,
  `user_name` varchar(50) NOT NULL DEFAULT 'guest user',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `message` varchar(200) NOT NULL,
  `file` varchar(200) DEFAULT NULL,
  `bully_type` varchar(200) NOT NULL,
  `source` varchar(200) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'open',
  `priority` int(2) NOT NULL DEFAULT '0',
  `ip_address` varchar(15) NOT NULL,
  `action_taken` varchar(300) DEFAULT 'in process',
  `action_taken_by` varchar(300) DEFAULT 'none',
  `action_taken_on` datetime DEFAULT NULL,
  `victim_name` varchar(250) NOT NULL,
  `victim_email` varchar(250) NOT NULL,
  `victim_contact_no` bigint(100) NOT NULL,
  `ticket_id` bigint(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`complaint_id`, `user_name`, `created_at`, `message`, `file`, `bully_type`, `source`, `status`, `priority`, `ip_address`, `action_taken`, `action_taken_by`, `action_taken_on`, `victim_name`, `victim_email`, `victim_contact_no`, `ticket_id`) VALUES
(1, 'akash247', '2018-03-27 06:49:33', 'hihihihi', NULL, 'wefbiuewfb', 'fcnuwecewnwak', 'closed', 0, '1.255.255.0', 'action taken', 'akash247', NULL, '', '', 0, 0),
(2, 'akash247', '2018-03-27 06:39:24', 'hello', '', 'Exclusion', 'Facebook', 'closed', 0, '::1', 'removed profile from facebook.com', 'akash247', NULL, '', '', 0, 0),
(3, 'akash247', '2018-03-26 19:49:11', 'testing', '', 'Exclusion', 'Facebook', 'closed', 0, '::1', 'closed by user', 'akash247', NULL, '', '', 0, 0),
(4, 'manish', '2018-03-27 16:18:23', 'fake profile', '', 'Exclusion', 'Facebook', 'closed', 0, '::1', 'closed inappropriate', 'akash247', '2018-03-27 18:18:23', '', '', 0, 0),
(5, 'manish', '2018-03-27 16:17:22', 'exclusion', '', 'Exclusion', 'Twitter', 'open', 0, '::1', 'in process', 'none', NULL, '', '', 0, 0),
(6, 'prashan', '2018-03-27 16:25:49', 'deppak ko maro', '', 'Exclusion', 'Facebook', 'open', 0, '::1', 'farzi complaint', 'akash247', '2018-03-27 18:25:49', '', '', 0, 0),
(7, 'manish', '2018-03-28 12:31:10', 'avggvvv', '', 'Exclusion', 'Google', 'open', 0, '::1', 'escalated to police', 'akash247', '2018-03-28 14:31:10', '', '', 0, 0),
(8, 'manish', '2018-03-27 09:49:54', 'kjdhh', '1522156794akash_cover_resume.docx', 'Fake Profile', 'Facebook', 'open', 0, '::1', 'in process', 'none', NULL, '', '', 0, 0),
(9, 'manish', '2018-03-27 09:59:27', 'jfhgjdh', '', 'Exclusion', 'Facebook', 'open', 0, '::1', 'in process', 'none', NULL, '', '', 0, 0),
(10, 'manish', '2018-03-27 10:00:24', 'fdsmnfms', '1522157424passport.jpg', 'Exclusion', 'Facebook', 'open', 0, '::1', 'in process', 'none', NULL, '', '', 0, 0),
(16, 'guest user', '2018-03-30 06:54:07', 'testing3', '', 'Harrasment', 'Facebook', 'closed', 0, '::1', 'closed by user', '', '2018-03-30 08:54:07', 'palak', 'singlapalak34@gmail.com', 999999999, 1522390083),
(17, 'guest user', '2018-03-30 07:08:38', 'test1', '', 'Exclusion', 'Facebook', 'closed', 0, '::1', 'closed by user', '', '2018-03-30 09:08:38', 'palak', 'akash.singh247@gmail.com', 999999999, 1522393595),
(18, 'guest user', '2018-03-30 03:42:39', 'test', '', 'Exclusion', 'Facebook', 'open', 0, '::1', 'in process', 'none', NULL, 'palak', 'akash.singh247@gmail.com', 999999999, 1522393959);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_no` int(12) NOT NULL,
  `query` varchar(250) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'open',
  `reply` varchar(250) NOT NULL DEFAULT 'none',
  `reply_from` varchar(250) DEFAULT 'none',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `replied_at` datetime DEFAULT NULL,
  `id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`name`, `email`, `contact_no`, `query`, `status`, `reply`, `reply_from`, `created_at`, `replied_at`, `id`) VALUES
('akash singh', 'akash.singh247@gmail.com', 123456789, 'hello', 'closed', 'answree query\r\nclosing oit', 'akash.singh247', '2018-03-28 10:29:28', '2018-03-28 08:45:41', 1),
('akash singh', 'akash.singh247@gmail.com', 2147483647, 'hello', 'closed', 'query closing', 'akash.singh247', '2018-03-28 10:29:28', '2018-03-28 08:42:25', 2),
('bhai hai ', 'prashant@gmail.com', 21321354, 'deppak ki maro', 'open', '', '', '2018-03-28 10:29:28', NULL, 3),
('shobhit sharma', 'pankajkumar19071996@gmail.com', 123456789, 'quwert', 'closed', 'closing query', 'akash.singh247', '2018-03-28 14:43:32', '2018-03-28 11:14:08', 4);

-- --------------------------------------------------------

--
-- Table structure for table `counsellor_info`
--

CREATE TABLE `counsellor_info` (
  `id` int(4) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `f_name` varchar(250) NOT NULL,
  `l_name` varchar(250) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(250) NOT NULL,
  `contact_no` bigint(200) NOT NULL,
  `experience` varchar(200) NOT NULL,
  `certifications` varchar(300) NOT NULL,
  `address` varchar(250) NOT NULL,
  `organization` varchar(250) NOT NULL,
  `fees` mediumint(200) NOT NULL,
  `designation` varchar(250) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counsellor_info`
--

INSERT INTO `counsellor_info` (`id`, `user_name`, `f_name`, `l_name`, `email`, `password`, `contact_no`, `experience`, `certifications`, `address`, `organization`, `fees`, `designation`, `status`, `gender`) VALUES
(1, 'manish', 'manish', 'manish', 'mainsh@mainsh.com', '123456', 9999999999, '2', 'mind reading', 'delhi6', 'jims', 1200, 'student', 1, 'male'),
(3, 'akash247', 'akash', 'singh', 'akash.singh247@gmail.com', 'MTIzNDU2', 9999999999, '2', 'diploma on mid reading from xyz instt', 'delhji', 'jims', 1200, 'student', 0, 'male');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(4) NOT NULL,
  `topic_id` int(4) NOT NULL,
  `author` varchar(50) NOT NULL,
  `comment` varchar(300) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `topic_id`, `author`, `comment`, `date_created`) VALUES
(10, 20, 'akash247', 'this is bad', '2018-03-25 12:33:34'),
(11, 20, 'akash247', 'indeed very bad', '2018-03-25 12:33:51'),
(12, 21, 'akash247', 'comment #1\r\n', '2018-03-25 12:34:27'),
(13, 21, 'akash247', 'comment #2', '2018-03-25 12:34:34'),
(14, 22, 'akash247', 'it in anti-social', '2018-03-25 13:51:26'),
(15, 22, 'akash247', 'it is a bad thing', '2018-03-25 14:13:45'),
(16, 23, 'akash247', 'it is ignoring', '2018-03-25 17:41:59'),
(18, 24, 'manish', 'please lodge a compl', '2018-03-26 08:58:02'),
(19, 25, 'akash247', 'testing5', '2018-03-26 13:10:01');

-- --------------------------------------------------------

--
-- Table structure for table `uac_info`
--

CREATE TABLE `uac_info` (
  `id` int(4) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(250) NOT NULL,
  `f_name` varchar(200) NOT NULL,
  `l_name` varchar(200) NOT NULL,
  `pic` varchar(300) NOT NULL,
  `address` varchar(300) NOT NULL,
  `email` varchar(250) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `contact_no` bigint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uac_info`
--

INSERT INTO `uac_info` (`id`, `username`, `password`, `f_name`, `l_name`, `pic`, `address`, `email`, `gender`, `contact_no`) VALUES
(1, 'akash.singh247', 'MTIzNDU2', 'akash', 'singh', '', 'kanpur', 'no@no.com', 'male', 9599580247);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_name` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `f_name` varchar(80) NOT NULL,
  `l_name` varchar(80) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `contact_number` varchar(12) NOT NULL,
  `password` varchar(60) NOT NULL,
  `address` varchar(200) NOT NULL,
  `id` int(3) NOT NULL,
  `staff_status` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_name`, `email`, `f_name`, `l_name`, `gender`, `contact_number`, `password`, `address`, `id`, `staff_status`) VALUES
('akash247', 'akash.singh247@gmail.com', 'akash', 'singh', 'male', '8960466864', 'MTIzNDU2', 'delhi6', 1, 1),
('manish', 'noname@123.com', 'manish', 'manish', 'male', '9999999999', 'MTIzNDU2', 'delhi', 2, 0),
('prashan', 'prashantgahlaut99@gmail.com', 'prashant', 'gahlaut', 'male', '12345', 'MTIz', 'jnoijnoiun-21delhi', 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD UNIQUE KEY `id` (`complaint_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counsellor_info`
--
ALTER TABLE `counsellor_info`
  ADD PRIMARY KEY (`id`,`user_name`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uac_info`
--
ALTER TABLE `uac_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `topic_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `complaint_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `counsellor_info`
--
ALTER TABLE `counsellor_info`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `uac_info`
--
ALTER TABLE `uac_info`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
