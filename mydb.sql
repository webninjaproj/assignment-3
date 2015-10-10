-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2015 at 06:52 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `basicprofile`
--

CREATE TABLE IF NOT EXISTS `basicprofile` (
  `fcgorexp` varchar(25) NOT NULL,
  `industrytype` varchar(45) NOT NULL,
  `degree` varchar(25) NOT NULL,
  `username` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contactjobseeker`
--

CREATE TABLE IF NOT EXISTS `contactjobseeker` (
  `email` varchar(50) NOT NULL,
  `phone` int(10) NOT NULL,
  `address1` varchar(45) NOT NULL,
  `address2` varchar(45) NOT NULL,
  `zipcode` int(5) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE IF NOT EXISTS `education` (
  `gpa` float unsigned NOT NULL,
  `university` varchar(75) NOT NULL,
  `username` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `emplprofile`
--

CREATE TABLE IF NOT EXISTS `emplprofile` (
  `username` varchar(30) NOT NULL,
  `companyname` varchar(45) NOT NULL,
  `companytype` varchar(25) NOT NULL,
  `industrytype` varchar(45) NOT NULL,
  `usertype` varchar(25) NOT NULL DEFAULT 'employer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE IF NOT EXISTS `experience` (
  `emplname` varchar(45) NOT NULL,
  `yearsofexp` int(10) unsigned NOT NULL,
  `description` varchar(450) NOT NULL,
  `username` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jobprofile`
--

CREATE TABLE IF NOT EXISTS `jobprofile` (
  `jobposition` varchar(45) NOT NULL,
  `description` varchar(450) NOT NULL,
  `companyname` varchar(45) NOT NULL,
  `zipcode` int(5) unsigned NOT NULL,
  `jobid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jobreqs`
--

CREATE TABLE IF NOT EXISTS `jobreqs` (
  `jobid` int(11) NOT NULL,
  `skillsreq` varchar(45) NOT NULL,
  `fcgorexp` varchar(25) NOT NULL,
  `mingpa` float unsigned DEFAULT NULL,
  `minexpyears` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker`
--

CREATE TABLE IF NOT EXISTS `jobseeker` (
  `username` varchar(30) NOT NULL,
  `usertype` varchar(20) NOT NULL DEFAULT 'jobseeker',
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `username` varchar(30) NOT NULL,
  `skills` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `confirmcode` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `email`, `usertype`, `confirmcode`) VALUES
('chandler', 'chandler', 'chandler@webninja.com', 'jobseeker', 0),
('deebiga', 'deebiga', 'deebiga@webninja.com', 'jobseeker', 0),
('divina', 'divina', 'divina@webninja.com', 'jobseeker', 0),
('divya', 'divya', 'divya@webninja.com', 'jobseeker', 0),
('dung', 'dung', 'dung@webninja.com', 'jobseeker', 0),
('phoebe', 'phoebe', 'phoebe@webninja.com', 'jobseeker', 0),
('rachel', 'rachel', 'rachel@webninja.com', 'jobseeker', 0),
('ross', 'ross', 'ross@webninja.com', 'jobseeker', 0),
('sam', 'sam', 'sam@webninja.com', 'jobseeker', 0),
('victor', 'victor', 'victor@webninja.com', 'jobseeker', 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view1`
--
CREATE TABLE IF NOT EXISTS `view1` (
`firstname` varchar(45)
,`lastname` varchar(45)
,`email` varchar(50)
,`industrytype` varchar(45)
,`degree` varchar(25)
,`gpa` float unsigned
,`university` varchar(75)
,`emplname` varchar(45)
,`yearsofexp` int(10) unsigned
);

-- --------------------------------------------------------

--
-- Table structure for table `zipdetails`
--

CREATE TABLE IF NOT EXISTS `zipdetails` (
  `zipcode` int(5) unsigned NOT NULL,
  `city` char(15) NOT NULL,
  `state` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure for view `view1`
--
DROP TABLE IF EXISTS `view1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view1` AS select `j`.`firstname` AS `firstname`,`j`.`lastname` AS `lastname`,`j`.`email` AS `email`,`b`.`industrytype` AS `industrytype`,`b`.`degree` AS `degree`,`e`.`gpa` AS `gpa`,`e`.`university` AS `university`,`x`.`emplname` AS `emplname`,`x`.`yearsofexp` AS `yearsofexp` from (((`jobseeker` `j` join `basicprofile` `b`) join `education` `e`) join `experience` `x`) where ((`j`.`username` = `e`.`username`) and (`j`.`username` = `b`.`username`) and (`j`.`username` = `x`.`username`));

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basicprofile`
--
ALTER TABLE `basicprofile`
  ADD PRIMARY KEY (`username`),
  ADD KEY `fk_BasicProfile_JobSeeker1_idx` (`username`);

--
-- Indexes for table `contactjobseeker`
--
ALTER TABLE `contactjobseeker`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `phone_UNIQUE` (`phone`),
  ADD KEY `fk_ContactJobSeeker_ZipDetails1_idx` (`zipcode`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`university`),
  ADD KEY `fk_Education_JobSeeker2_idx` (`username`);

--
-- Indexes for table `emplprofile`
--
ALTER TABLE `emplprofile`
  ADD PRIMARY KEY (`companyname`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `companyname_UNIQUE` (`companyname`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- Indexes for table `jobprofile`
--
ALTER TABLE `jobprofile`
  ADD PRIMARY KEY (`jobid`),
  ADD KEY `companyname_idx` (`companyname`),
  ADD KEY `fk_JobProfile_ZipDetails1_idx1` (`zipcode`),
  ADD KEY `fk_JobProfile_JobReqs1_idx` (`jobid`);

--
-- Indexes for table `jobreqs`
--
ALTER TABLE `jobreqs`
  ADD PRIMARY KEY (`jobid`);

--
-- Indexes for table `jobseeker`
--
ALTER TABLE `jobseeker`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexes for table `zipdetails`
--
ALTER TABLE `zipdetails`
  ADD PRIMARY KEY (`zipcode`),
  ADD UNIQUE KEY `zipcode_UNIQUE` (`zipcode`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `basicprofile`
--
ALTER TABLE `basicprofile`
  ADD CONSTRAINT `fk_BasicProfile_JobSeeker1` FOREIGN KEY (`username`) REFERENCES `jobseeker` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contactjobseeker`
--
ALTER TABLE `contactjobseeker`
  ADD CONSTRAINT `fk_contact_zip` FOREIGN KEY (`zipcode`) REFERENCES `zipdetails` (`zipcode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `fk_Education_js` FOREIGN KEY (`username`) REFERENCES `jobseeker` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `emplprofile`
--
ALTER TABLE `emplprofile`
  ADD CONSTRAINT `fk_username` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `experience`
--
ALTER TABLE `experience`
  ADD CONSTRAINT `fk_Experience_JobSeeker1` FOREIGN KEY (`username`) REFERENCES `jobseeker` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobprofile`
--
ALTER TABLE `jobprofile`
  ADD CONSTRAINT `fk_JobProfile_JobReqs1` FOREIGN KEY (`jobid`) REFERENCES `jobreqs` (`jobid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_JobProfile_ZipDetails1` FOREIGN KEY (`zipcode`) REFERENCES `zipdetails` (`zipcode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_job_empl` FOREIGN KEY (`companyname`) REFERENCES `emplprofile` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobseeker`
--
ALTER TABLE `jobseeker`
  ADD CONSTRAINT `fk_js_contact` FOREIGN KEY (`email`) REFERENCES `contactjobseeker` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_js_user` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `fk_skills_js` FOREIGN KEY (`username`) REFERENCES `jobseeker` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
