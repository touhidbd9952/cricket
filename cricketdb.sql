-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2019 at 10:02 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cricketdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_admin`
--

CREATE TABLE `t_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_admin`
--

INSERT INTO `t_admin` (`id`, `username`, `password`, `date`) VALUES
(1, 'admin', 'xTkgHjXSSzDh-kJRUR7DvS27mApb9JxlV$f$lFVjrrt$Ls5JzWGThGFu4VP5I3QBcm1TNQ=', '2016-12-15 04:31:22');

-- --------------------------------------------------------

--
-- Table structure for table `t_career_statistics`
--

CREATE TABLE `t_career_statistics` (
  `id` int(11) NOT NULL,
  `competition` varchar(150) NOT NULL,
  `test` varchar(10) NOT NULL,
  `odi` varchar(10) NOT NULL,
  `fc` varchar(10) NOT NULL,
  `la` varchar(10) NOT NULL,
  `teamplayerid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `t_domestic_team_information`
--

CREATE TABLE `t_domestic_team_information` (
  `id` int(11) NOT NULL,
  `years` varchar(15) NOT NULL,
  `team` varchar(255) NOT NULL,
  `teamplayerid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `t_homeads`
--

CREATE TABLE `t_homeads` (
  `id` int(11) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `title` varchar(300) NOT NULL,
  `publishday` varchar(2) NOT NULL,
  `publishmonth` varchar(20) NOT NULL,
  `publishyear` varchar(4) NOT NULL,
  `pic` varchar(10) NOT NULL,
  `main_pic` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_homeads`
--

INSERT INTO `t_homeads` (`id`, `subject`, `title`, `publishday`, `publishmonth`, `publishyear`, `pic`, `main_pic`) VALUES
(2, 'Trending', 'Indian Premier Leage 2018', '23', 'December', '2018', '2.jpg', ''),
(3, 'Trending', 'Gujarat Lions over Unpaid', '23', 'December', '2018', '3.jpg', '3'),
(4, 'Trending', 'Live update RPS vs RCB', '23', 'December', '2018', '4.jpg', ''),
(5, 'Trending', 'Kohali celebrate gayle style', '23', 'December', '2018', '5.jpg', ''),
(6, 'Trending', 'Rohit Sharma man of the Match', '23', 'December', '2018', '6.jpg', ''),
(7, 'Trending', 'IPL Final, virat half century', '23', 'December', '2018', '7.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `t_homebanner`
--

CREATE TABLE `t_homebanner` (
  `id` int(11) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `title` varchar(300) NOT NULL,
  `publishday` varchar(2) NOT NULL,
  `publishmonth` varchar(20) NOT NULL,
  `publishyear` varchar(4) NOT NULL,
  `pic` varchar(10) NOT NULL,
  `main_pic` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_homebanner`
--

INSERT INTO `t_homebanner` (`id`, `subject`, `title`, `publishday`, `publishmonth`, `publishyear`, `pic`, `main_pic`) VALUES
(2, 'Trending', 'Indian Premier Leage 2018', '1', 'January', '2018', '2.jpg', ''),
(3, 'Trending', 'Gujarat Lions over Unpaid', '1', 'January', '2019', '3.jpg', '3');

-- --------------------------------------------------------

--
-- Table structure for table `t_news`
--

CREATE TABLE `t_news` (
  `id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `title` text NOT NULL,
  `desc` text NOT NULL,
  `publishday` varchar(2) NOT NULL,
  `publishmonth` varchar(20) NOT NULL,
  `publishyear` varchar(4) NOT NULL,
  `pic` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_news`
--

INSERT INTO `t_news` (`id`, `subject`, `title`, `desc`, `publishday`, `publishmonth`, `publishyear`, `pic`) VALUES
(2, 'IPL 20-20', 'With 20 needed to win off the last two overs for Knight Riders, Super Kings still stood a chance.', 'However,Hilfenhaus bowled an above waist-high full toss the next ball, yielding three runs and an extra delivery that was hit for four by Shakib Al Hasan. \"In the 19th over, there was a big turning point.', '1', 'January', '2019', '2.jpg'),
(3, 'IPL 20-20', 'With 20 needed to win off the last two overs for Knight Riders, Super Kings still stood a chance.', 'Over seven weeks, the IPL\'s presence spread through its audience like the heat of a genuine Indian summer. An annual league that takes far longer than the football, cricket and rugby world cups.', '1', 'January', '2019', '3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `t_settings`
--

CREATE TABLE `t_settings` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `value` text NOT NULL,
  `subject` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_settings`
--

INSERT INTO `t_settings` (`id`, `name`, `value`, `subject`) VALUES
(2, 'serverkey', 'XUTsx.$6EF6Kmg6cPGE.22r#eGryjFh4.u3sSXplAFlZ-Ay98bODA4MA==', ''),
(3, 'servermail', 'info@kkdestiny.com', ''),
(4, 'logo', '', ''),
(5, 'logourl', 'http://localhost:8080/company/', ''),
(6, 'toptitle', 'toptitle', ''),
(7, 'facebook', 'http://facebook.com/', 'social link'),
(8, 'google plus', 'https://accounts.google.com', 'social link'),
(9, 'twitter', 'https://twitter.com/', 'social link'),
(10, 'forum', 'https://en.wikipedia.org/wiki/Forum', 'social link'),
(11, 'Company Name', 'kkdestiny Inc.', 'Company'),
(12, 'About Company work', 'We are pleased to offer great, affordable and reliable server hosting services, thanks to our top of the line data center, dedication to customer support, our products and services. We included, some of the best features into our server hosting plans, all at no extra cost!', 'Company'),
(13, 'Address', 'Grand Place, Tamachi, Japan', 'Company'),
(14, 'phone', '+123456789', 'Company'),
(15, 'Login Link', 'https://www.google.com.bd', ''),
(16, 'Register Link', 'https://www.google.com.bd', ''),
(17, 'E-mail us link', 'https://www.google.com.bd', ''),
(18, 'Footer Copyright text', 'Copyright - 2016 kkdestiny. All rights reserved', '');

-- --------------------------------------------------------

--
-- Table structure for table `t_team`
--

CREATE TABLE `t_team` (
  `id` int(11) NOT NULL,
  `logo` varchar(15) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_team`
--

INSERT INTO `t_team` (`id`, `logo`, `name`) VALUES
(2, '2.jpg', 'RS'),
(3, '3.jpg', 'CKS');

-- --------------------------------------------------------

--
-- Table structure for table `t_team_profile`
--

CREATE TABLE `t_team_profile` (
  `id` int(10) NOT NULL,
  `pic` varchar(15) NOT NULL,
  `name` varchar(255) NOT NULL,
  `born_day` varchar(2) NOT NULL,
  `born_month` varchar(15) NOT NULL,
  `born_year` varchar(10) NOT NULL,
  `born_city` varchar(50) NOT NULL,
  `born_country` varchar(50) NOT NULL,
  `height_feet` varchar(1) NOT NULL,
  `height_inch` varchar(2) NOT NULL,
  `height_cm` varchar(10) NOT NULL,
  `batting_style` varchar(20) NOT NULL,
  `bolling_style` varchar(20) NOT NULL,
  `role` varchar(100) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `test_debut` varchar(255) NOT NULL,
  `last_test` varchar(255) NOT NULL,
  `odi_debut` varchar(255) NOT NULL,
  `last_odi` varchar(255) NOT NULL,
  `odi_shirt_no` varchar(10) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_team_profile`
--

INSERT INTO `t_team_profile` (`id`, `pic`, `name`, `born_day`, `born_month`, `born_year`, `born_city`, `born_country`, `height_feet`, `height_inch`, `height_cm`, `batting_style`, `bolling_style`, `role`, `nationality`, `test_debut`, `last_test`, `odi_debut`, `last_odi`, `odi_shirt_no`, `description`) VALUES
(1, '1.jpg', 'RS', '3', 'February', '1992', 'Dilli', 'India', '5', '8', '138', 'Left hand bat', '', 'Batsman', '', '', '', '', '', '', 'Ghabhir info...');

-- --------------------------------------------------------

--
-- Table structure for table `t_team_schedule`
--

CREATE TABLE `t_team_schedule` (
  `id` int(11) NOT NULL,
  `category` varchar(10) NOT NULL,
  `team1` varchar(150) NOT NULL,
  `team2` varchar(150) NOT NULL,
  `sday` varchar(2) NOT NULL,
  `smonth` varchar(15) NOT NULL,
  `syear` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `t_user_online`
--

CREATE TABLE `t_user_online` (
  `sid` char(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `time` int(11) NOT NULL,
  `login_time` datetime NOT NULL,
  `ip` varchar(255) NOT NULL,
  `loged_in` varchar(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user_online`
--

INSERT INTO `t_user_online` (`sid`, `username`, `userid`, `time`, `login_time`, `ip`, `loged_in`) VALUES
('f3ba385adf40e16565a100a46a12fec6', 'admin', '1', 1577429826, '2019-12-27 12:57:06', '::1', 'true');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_career_statistics`
--
ALTER TABLE `t_career_statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_domestic_team_information`
--
ALTER TABLE `t_domestic_team_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_homeads`
--
ALTER TABLE `t_homeads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_homebanner`
--
ALTER TABLE `t_homebanner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_news`
--
ALTER TABLE `t_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_settings`
--
ALTER TABLE `t_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_team`
--
ALTER TABLE `t_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_team_profile`
--
ALTER TABLE `t_team_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_team_schedule`
--
ALTER TABLE `t_team_schedule`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_admin`
--
ALTER TABLE `t_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_career_statistics`
--
ALTER TABLE `t_career_statistics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_domestic_team_information`
--
ALTER TABLE `t_domestic_team_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_homeads`
--
ALTER TABLE `t_homeads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t_homebanner`
--
ALTER TABLE `t_homebanner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_news`
--
ALTER TABLE `t_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_settings`
--
ALTER TABLE `t_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `t_team`
--
ALTER TABLE `t_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_team_profile`
--
ALTER TABLE `t_team_profile`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_team_schedule`
--
ALTER TABLE `t_team_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
