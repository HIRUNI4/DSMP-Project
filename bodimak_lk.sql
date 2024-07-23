-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2024 at 08:03 PM
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
-- Database: `bodimak.lk`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `content`, `image`) VALUES
(11, 'BODIMAK.lk', '<p>Find best place to live</p>', '4238568.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `cid` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`cid`, `name`, `email`, `phone`, `subject`, `message`) VALUES
(8, 'Nadun Ariyarathna', 'chamidunadun20@gmail.com', '0712344321', 'asdfadfasfadfdf', 'aaaaaaassssssssdddddddddddffffffffddddddddddddddffffffffffffdddddddaaaaaaaasdddddddf'),
(9, 'nadun', 'nadun123@gmail.com', '0773486228', 'for futher information', 'dkeqflehgi');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(50) NOT NULL,
  `uid` int(50) NOT NULL,
  `fdescription` varchar(300) NOT NULL,
  `status` int(1) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fid`, `uid`, `fdescription`, `status`, `date`) VALUES
(9, 36, 'abcdefg hijk lmnop qrstuvw xyz', 0, '2023-08-18 22:23:23'),
(10, 36, 'tfiykhlsajcnbm', 0, '2023-10-21 19:01:44'),
(12, 37, 'tyuiol,mnbvcf', 0, '2024-07-07 03:35:50'),
(13, 40, 'good site', 0, '2024-07-23 00:44:43');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `pid` int(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `pcontent` varchar(500) NOT NULL,
  `type` varchar(100) NOT NULL,
  `bpr` int(50) NOT NULL,
  `bedroom` int(50) NOT NULL,
  `bathroom` int(50) NOT NULL,
  `btype` varchar(50) NOT NULL,
  `balcony` int(50) NOT NULL,
  `kitchen` int(50) NOT NULL,
  `floor` varchar(50) NOT NULL,
  `foodoption` varchar(50) NOT NULL,
  `rent` int(50) NOT NULL,
  `kmoney` int(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `feature` varchar(500) NOT NULL,
  `pimage` varchar(300) NOT NULL,
  `pimage1` varchar(300) NOT NULL,
  `pimage2` varchar(300) NOT NULL,
  `pimage3` varchar(300) NOT NULL,
  `uid` int(50) NOT NULL,
  `location_link` varchar(300) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `isFeatured` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`pid`, `title`, `pcontent`, `type`, `bpr`, `bedroom`, `bathroom`, `btype`, `balcony`, `kitchen`, `floor`, `foodoption`, `rent`, `kmoney`, `address`, `city`, `district`, `feature`, `pimage`, `pimage1`, `pimage2`, `pimage3`, `uid`, `location_link`, `date`, `isFeatured`) VALUES
(45, 'eeeeee', '<p>e</p>', 'apartment', 2, 2, 3, 'Attached', 2, 2, '3rd Floor', 'Yes', 2, 2, 'Meegahalanda, Ballapana, Galigamuwa Town.', 'Kegalle', 'Colombo', '<div class=\"col-md-4\">swx</div>', 'Induruwa-720x720-2.jpg', 'images (1).jpeg', 'download (4).jpeg', 'channeling-services-2.jpg', 37, '', '2024-07-07 04:04:19', '1'),
(46, 'For KDU boys', '<p>for kdu boys.</p>\r\n<p>&nbsp;</p>', 'apartment', 2, 2, 1, 'Attached', 1, 1, '1st Floor', 'Yes', 8000, 80000, 'Borupana Rd, Rathmalana', 'Rathmalana', 'Colombo', '<div class=\"col-md-4\">cctv</div>\r\n<div class=\"col-md-4\">kitchen items</div>', 'images.jpg', '07IHH-SriLanka-slide-2A4S-mediumSquareAt3X.jpg', 'images.jpg', 'img-ceylon-hostel-colombo-international-airport-negombo-6.jpg', 37, 'https://www.google.com/maps?q=6.819281007927803,79.89734172821046&z=15', '2024-07-23 00:21:12', '1'),
(47, 'for KDU Boys', '<p>forv kdu students</p>', 'house', 2, 2, 2, 'Attached', 0, 1, '1st Floor', 'No', 6000, 18000, 'borupana, rathmalana', 'Rathamalana', 'Colombo', '<div class=\"col-md-4\">cctv</div>', 'download.jpg', 'download (7).jpg', 'download (8).jpg', 'download (5).jpg', 40, 'https://www.google.com/maps?q=6.819217090307211,79.89741683006288&z=15', '2024-07-23 00:40:52', '1');

-- --------------------------------------------------------

--
-- Table structure for table `uadmin`
--

CREATE TABLE `uadmin` (
  `aid` int(10) NOT NULL,
  `auser` varchar(50) NOT NULL,
  `aemail` varchar(50) NOT NULL,
  `apass` varchar(50) NOT NULL,
  `aphone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uadmin`
--

INSERT INTO `uadmin` (`aid`, `auser`, `aemail`, `apass`, `aphone`) VALUES
(9, 'admin', 'admin@gmail.com', '6812f136d636e737248d365016f8cfd5139e387c', '1470002569'),
(0, 'nadun', 'chamidunadun20@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '0773486228');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(50) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `uemail` varchar(100) NOT NULL,
  `uphone` varchar(20) NOT NULL,
  `upass` varchar(50) NOT NULL,
  `uimage` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `uname`, `uemail`, `uphone`, `upass`, `uimage`) VALUES
(37, 'Nadun Ariyarathna', 'kevin.j@gmail.com', '0773486228', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'cartim.jpg'),
(38, 'Nadun Ariyarathna', 'chamidunadun20@gmail.com', '0773486228', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Acc.jpg'),
(39, 'Chamidu Nadun', 'nadun12345@gmail.com', '0711212122', '8cb2237d0679ca88db6464eac60da96345513964', 'O.jpg'),
(40, 'Chamidu Nadun', 'nadun123@gmail.com', '0773486228', '8cb2237d0679ca88db6464eac60da96345513964', 'O.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `cid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `pid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
