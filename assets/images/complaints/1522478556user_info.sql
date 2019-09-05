-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2018 at 04:13 AM
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
('prashan', 'prashantgahlaut99@gmail.com', 'prashant', 'gahlaut', 'male', '12345', 'MTIz', 'jnoijnoiun-21delhi', 3, 1),
('anish', 'anish@anish', 'anish', 'sharma', 'male', '981829939', 'MTIzNDU2', 'DELHI', 4, 1),
('Palak123', 'palak@palak', 'palak', 'singla', 'female', '987098098', 'MTIzNDU2', 'haryana', 5, 0),
('radhika1234', 'radhika@radhika', 'radhika', 'gupta', 'female', '328923988', 'MTIzNDU2', 'DELHI', 6, 1),
('PANKAJ123', 'pankaj@pankaj', 'pankaj', 'kumar', 'male', '981829939', 'MTIzNDU2', 'up', 7, 1),
('deepak12', 'deepak@deepak', 'deepak', 'kalra', 'male', '87677699879', 'MTIzNDU2', 'pune', 9, 1),
('maulana123', 'maulana@maulana', 'maulana', 'azad', 'male', '0923400294', 'MTIzNDU2', 'pune', 10, 0),
('pushkal', 'aio@aio', 'pushkall', 'rao', 'male', '8924849834', 'MTIz', 'delhi', 11, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
