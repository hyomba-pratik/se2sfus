-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2016 at 08:20 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_sfus`
--

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE IF NOT EXISTS `leads` (
  `id` int(10) NOT NULL,
  `counsellor_id` int(10) DEFAULT NULL,
  `first_name` varchar(200) DEFAULT NULL,
  `last_name` varchar(200) NOT NULL,
  `contact_no` varchar(10) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `district` varchar(200) NOT NULL,
  `follow_up_date` date DEFAULT NULL,
  `interested_level` varchar(200) NOT NULL,
  `interested_semester` varchar(200) NOT NULL,
  `interested_faculty` varchar(200) NOT NULL,
  `comments` text NOT NULL,
  `type` enum('Lead','Student') DEFAULT 'Lead',
  `status` enum('active','expired','deleted','dismissed','postponed') CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `counsellor_id`, `first_name`, `last_name`, `contact_no`, `email`, `address`, `district`, `follow_up_date`, `interested_level`, `interested_semester`, `interested_faculty`, `comments`, `type`, `status`, `date`) VALUES
(16, 3, 'Alex', 'Maharjan', '9812000000', 'alex@mail.com', 'Manamaiju', 'Kathmandu', '2016-01-15', 'Bachelors', '3rd', 'Multimedia', '', 'Lead', 'active', '2016-02-18'),
(17, 3, 'Kiran', 'Shrestha', '4684351351', 'kiran@mail.com', 'adf', 'Dhankuta', '2016-01-11', 'A-Level', '1st', 'Computing', '', 'Lead', 'postponed', '2016-01-18'),
(18, 3, 'Rajesh', 'Dhungana', '', '', '', 'Salyan', '2016-01-11', 'A-Level', '1st', 'Computing', '', 'Student', 'dismissed', '2016-01-21'),
(19, 3, 'asdf', 'alskdjf', '6513515135', 'asdfasdf@asdf.asdf', 'asdf', 'Achham', '2016-01-17', 'A-Level', '1st', 'Computing', '', 'Lead', 'active', '2016-01-03'),
(20, 3, 'New', 'Student', '6841351351', 'asfdkj@asdfk.adf', 'asf', 'Banke', '2016-01-15', 'A-Level', '1st', 'Computing', '', 'Lead', 'expired', '2016-01-01'),
(21, 5, 'new', 'student', '3814831483', 'new@mail.com', 'adfaf', 'Baitadi', '2016-01-19', 'Bachelors', '5th', 'Multimedia', 'ok good', 'Lead', 'active', '2016-01-02'),
(22, 3, 'II', 'iii', '9841554545', 'alsdjf@lkjadsf.asdf', 'sadfasdf', 'Baitadi', '2016-01-18', 'A-Level', '1st', 'Computing', '', 'Lead', 'active', '2016-01-15');

-- --------------------------------------------------------

--
-- Table structure for table `leads_feedback`
--

CREATE TABLE IF NOT EXISTS `leads_feedback` (
  `id` int(10) NOT NULL,
  `feedback_message` text,
  `follow_up_count` int(11) DEFAULT '0',
  `Leadsid` int(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leads_feedback`
--

INSERT INTO `leads_feedback` (`id`, `feedback_message`, `follow_up_count`, `Leadsid`) VALUES
(3, 'ok\r\n', 1, 16),
(4, 'ok', 2, 17),
(5, 'ok\r\n', 1, 18),
(6, NULL, 0, 19),
(7, 'good ok', 9, 20),
(8, 'ok i will come', 1, 21),
(9, NULL, 0, 22);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `contact_no` varchar(10) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT NULL,
  `role` enum('Manager','Counsellor') DEFAULT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `address`, `contact_no`, `email`, `status`, `role`, `password`) VALUES
(1, 'Manish ', 'dd', '5151', 'mmaharjan123@gmail.comd', 'active', 'Counsellor', 'manish'),
(2, 'Pratik Hyomba', 'Ktm', '9841445096', 'cool.tsanzol@gmail.com', 'active', 'Manager', 'pratik'),
(3, 'Sarala Koju', 'kamalbinayek, Bhaktapur', '9812000000', 'cara.kozu@gmail.com', 'active', 'Counsellor', 'sarala'),
(4, 'Spandan Lamsal', 'Kathmandu', '9812369878', 'spandan@gmail.com', 'active', 'Manager', 'spandan'),
(5, 'Tufan', 'ksdfk', '8148143841', 'tufan@gmail.com', 'active', 'Counsellor', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`), ADD KEY `counsellor_id` (`counsellor_id`);

--
-- Indexes for table `leads_feedback`
--
ALTER TABLE `leads_feedback`
  ADD PRIMARY KEY (`id`), ADD KEY `FKleads_feed928055` (`Leadsid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `leads_feedback`
--
ALTER TABLE `leads_feedback`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `leads`
--
ALTER TABLE `leads`
ADD CONSTRAINT `leads_ibfk_1` FOREIGN KEY (`counsellor_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `leads_feedback`
--
ALTER TABLE `leads_feedback`
ADD CONSTRAINT `FKleads_feed928055` FOREIGN KEY (`Leadsid`) REFERENCES `leads` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
