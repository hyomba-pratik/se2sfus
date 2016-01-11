-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2016 at 02:20 PM
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
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(10) NOT NULL,
  `course_name` varchar(200) DEFAULT NULL,
  `duration` int(10) DEFAULT NULL,
  `status` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `status` enum('active','inactive','deleted') CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `counsellor_id`, `first_name`, `last_name`, `contact_no`, `email`, `address`, `district`, `follow_up_date`, `interested_level`, `interested_semester`, `interested_faculty`, `comments`, `type`, `status`) VALUES
(2, 1, 'pratik', 'hyomba', '9841445096', 'cool.tsanzol@gmail.com', 'jelan', 'option 1', '2016-02-02', 'Bachelors', '5th', 'Computing', 'student from softwarica for credit transfer.', 'Lead', 'active'),
(3, 2, 'sarala', 'koju', '9841561313', 'cara.koju@gmail.com', 'kamalbinayek', 'option 3', '2016-01-09', 'A-Level', 'Other', 'Other', '', 'Lead', 'active'),
(4, 1, 'spandan', 'lamsal', '535135153', 'asdf@asdf.adf', 'asdf', 'option 3', '2016-01-09', 'Masters', '3rd', 'Multimedia', '\r\n', 'Lead', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `leads_feedback`
--

CREATE TABLE IF NOT EXISTS `leads_feedback` (
  `id` int(10) NOT NULL,
  `feedback_message` text,
  `follow_up_count` int(11) DEFAULT NULL,
  `Leadsid` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lead_courses`
--

CREATE TABLE IF NOT EXISTS `lead_courses` (
  `id` int(11) NOT NULL,
  `coursesid` int(10) DEFAULT NULL,
  `Leadsid` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `address`, `contact_no`, `email`, `status`, `role`, `password`) VALUES
(1, 'Manish Maharjan', 'Manamaiju, Kathmandu, Nepal', '9818877661', 'mmaharjan123@gmail.com', 'active', 'Counsellor', 'manish'),
(2, 'Pratik', 'Ktm', '9841445096', 'cool.tsanzol@gmail.com', 'active', 'Manager', 'pratik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads_feedback`
--
ALTER TABLE `leads_feedback`
  ADD PRIMARY KEY (`id`), ADD KEY `FKleads_feed928055` (`Leadsid`);

--
-- Indexes for table `lead_courses`
--
ALTER TABLE `lead_courses`
  ADD PRIMARY KEY (`id`), ADD KEY `FKlead_cours667019` (`Leadsid`), ADD KEY `FKlead_cours179598` (`coursesid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `leads_feedback`
--
ALTER TABLE `leads_feedback`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lead_courses`
--
ALTER TABLE `lead_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `leads_feedback`
--
ALTER TABLE `leads_feedback`
ADD CONSTRAINT `FKleads_feed928055` FOREIGN KEY (`Leadsid`) REFERENCES `leads` (`id`);

--
-- Constraints for table `lead_courses`
--
ALTER TABLE `lead_courses`
ADD CONSTRAINT `FKlead_cours179598` FOREIGN KEY (`coursesid`) REFERENCES `courses` (`id`),
ADD CONSTRAINT `FKlead_cours667019` FOREIGN KEY (`Leadsid`) REFERENCES `leads` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
