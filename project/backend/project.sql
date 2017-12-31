-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 22, 2017 at 07:24 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `fid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `addedBy` varchar(50) NOT NULL,
  `approval` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`fid`, `rid`, `name`, `price`, `addedBy`, `approval`) VALUES
(7, 4, 'Luchi', 5, 'kafi@mail.com', 'TRUE'),
(8, 4, 'Tikka', 10, 'kafi@mail.com', 'TRUE'),
(9, 3, 'Grill', 80, 'kafi@mail.com', 'TRUE'),
(10, 5, 'Chicken Chap', 70, 'kafi@mail.com', 'TRUE');

-- --------------------------------------------------------

--
-- Table structure for table `f_review`
--

CREATE TABLE `f_review` (
  `reviewID` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `addedBy` varchar(50) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text NOT NULL,
  `approval` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f_review`
--

INSERT INTO `f_review` (`reviewID`, `fid`, `rid`, `addedBy`, `rating`, `review`, `approval`) VALUES
(1, 7, 4, 'sohel@mail.com', 3, 'mbnm cfcvbc cvbcv b', 'TRUE'),
(2, 8, 4, 'sohel@mail.com', 3, 'v b bcvcvbv b', 'FALSE'),
(3, 10, 5, 'sohel@mail.com', 4, 'fghnvbn dgcvbcvb', 'FALSE');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `rid` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `area` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `addedBy` varchar(50) NOT NULL,
  `approval` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`rid`, `name`, `area`, `address`, `addedBy`, `approval`) VALUES
(1, 'Take A Bite', 'Banasree', 'Block: C ', 'amir@mail.com', 'TRUE'),
(2, 'Fajita', 'Banasree', 'Block: E', 'sohel@mail.com', 'FALSE'),
(3, 'Hot and Cold', 'Banasree', 'Block: B', 'amir@mail.com', 'TRUE'),
(4, 'Adda', 'Banasree', 'Block: C ', 'amir@mail.com', 'TRUE'),
(5, 'Dhaka Kabab', 'Banasree', 'Block: C ', 'sohel@mail.com', 'TRUE'),
(6, 'Sharma King', 'Banasree', 'Block: E', 'sohel@mail.com', 'TRUE'),
(7, 'Rahmania', 'Khilgaon', 'Rail Gate', 'kafi@mail.com', 'TRUE');

-- --------------------------------------------------------

--
-- Table structure for table `r_review`
--

CREATE TABLE `r_review` (
  `reviewID` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `addedBy` varchar(50) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text NOT NULL,
  `approval` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_review`
--

INSERT INTO `r_review` (`reviewID`, `rid`, `addedBy`, `rating`, `review`, `approval`) VALUES
(8, 1, 'sohel@mail.com', 3, 'ghjmvmnvbnv', 'FALSE'),
(9, 3, 'sohel@mail.com', 1, 'Good...', 'TRUE'),
(10, 4, 'sohel@mail.com', 4, 'tfgjhnmbnm cbncn', 'FALSE');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `usertype` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `email`, `password`, `usertype`) VALUES
('SM Amir', 'amir@mail.com', '12345', 'admin'),
('Al Kafi', 'kafi@mail.com', 'abc@123', 'moderator'),
('JA Sohel', 'sohel@mail.com', 'asd@1234', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `f_review`
--
ALTER TABLE `f_review`
  ADD PRIMARY KEY (`reviewID`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`rid`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `r_review`
--
ALTER TABLE `r_review`
  ADD PRIMARY KEY (`reviewID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `f_review`
--
ALTER TABLE `f_review`
  MODIFY `reviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `rid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `r_review`
--
ALTER TABLE `r_review`
  MODIFY `reviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
