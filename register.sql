-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2020 at 02:27 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hackathon`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` char(10) NOT NULL,
  `carno` char(11) NOT NULL,
  `file_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` enum('1','0') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `fullname`, `email`, `contact`, `carno`, `file_name`, `uploaded_on`, `status`) VALUES
(13, 'Ashishkumar Vishwakarma', 'vishwakarmaneetesh1654@gmail.com', '0842484744', 'asfdgf5585', 'all.png', '2020-01-21 21:37:25', '1'),
(21, 'shaik', 'shaik@gmail.com', '0908 218 9', 'KA05MG1909', 'download (1).jfif', '2020-01-21 22:56:44', '1'),
(22, 'ashish', 'ashish@gmail.com', '8454847469', 'TN01AS9299', 'download.jfif', '2020-01-21 22:57:28', '1'),
(23, 'FATIMA', 'FATIMA@GMAIL.COM', '7894561232', 'GY12RZB', 'images (1).jfif', '2020-01-21 22:58:41', '1'),
(24, 'UMAIR', 'umair@gmail.com', '1234567895', 'HR26DK8337', 'images (2).jfif', '2020-01-21 22:59:23', '1'),
(25, 'MOHSIN', 'mohsin@gmail.com', '6547891235', 'AF180RO', 'images (3).jfif', '2020-01-21 23:00:09', '1'),
(26, 'HUZEFA', 'huzefa@gmail.com', '9632587415', 'MY02ZR0', 'images.jfif', '2020-01-21 23:01:07', '1'),
(28, '', '', '', 'HR26DK8337', 'images (2).jfif', '2020-01-21 23:22:25', '1'),
(29, 'mohammad', 'mra@gmail.com', '0908 218 9', 'AF180RO', 'images (3).jfif', '2020-01-22 00:25:45', '1'),
(30, '', '', '', 'KA05MG1909', 'download (1).jfif', '2020-01-22 00:26:07', '1'),
(33, 'huzefa ', 'vishwakarmaneetesh1654@gmail.com', '0908 218 9', 'AF180RO', 'images (3).jfif', '2020-01-22 07:59:55', '1'),
(35, 'sufi khan', 'sufi123@gmail.com', '8424847449', 'MY02ZR0', 'images.jfif', '2020-01-22 16:35:27', '1'),
(36, 'Ashishkumar Vishwakarma', 'vishwakarmaneetesh1654@gmail.com', '8424847449', 'KA05MG1909', 'Ashishkumar Shrawankumar Vishwakarma.jpg', '2020-02-07 21:11:32', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
