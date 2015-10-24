-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2015 at 10:29 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yenapps`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogs`
--

CREATE TABLE IF NOT EXISTS `adminlogs` (
  `logid` int(16) NOT NULL AUTO_INCREMENT,
  `logs` varchar(32) NOT NULL,
  PRIMARY KEY (`logid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE IF NOT EXISTS `agents` (
  `agentid` int(12) NOT NULL AUTO_INCREMENT,
  `levelid` int(8) NOT NULL,
  `refferenceid` int(8) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `username` text NOT NULL,
  `passportnoagent` varchar(48) NOT NULL,
  `email` varchar(32) NOT NULL,
  `dateofbirth` date NOT NULL,
  `occupation` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `clientthismonth` int(16) NOT NULL,
  `clientlastmonth` int(16) NOT NULL,
  `clientb4lastmonth` int(16) NOT NULL,
  `clienttotal` int(24) NOT NULL,
  `status` varchar(256) NOT NULL,
  `comments` text NOT NULL,
  PRIMARY KEY (`agentid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`agentid`, `levelid`, `refferenceid`, `firstname`, `lastname`, `username`, `passportnoagent`, `email`, `dateofbirth`, `occupation`, `created`, `clientthismonth`, `clientlastmonth`, `clientb4lastmonth`, `clienttotal`, `status`, `comments`) VALUES
(1, 1, 1, 'No', 'Agent', 'AgentNo', 'N 1_1 1_ 1_', 'no@agent.com', '2000-01-01', 'Null', '2015-09-29 15:02:05', 1, 1, 1, 3, 'Active', ''),
(2, 5, 1, 'Ahmed', 'Akter', 'agentaa', 'AG12345678', 'agentaa@aapf.tk', '1992-10-05', 'Part Time Job Holder, Short Time Student.', '2015-09-11 06:19:36', 3, 0, 1, 4, 'Whats so Hurry ???', ''),
(3, 3, 1, 'Mamun', 'Yen', 'yanmamun', 'XGC12345678', 'yen@aa.com', '1992-10-05', 'Part time Student', '2015-09-27 14:10:33', 1, 0, 1, 2, 'New', 'Nothing Now');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('72cb1345fed1c6340f311464d0ed8e00', '::1', 'Mozilla/5.0 (Windows NT 10.0; rv:40.0) Gecko/20100101 Firefox/40.0', 1442678745, 'a:4:{s:9:"user_data";s:0:"";s:8:"_tracker";a:58:{i:0;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678322;}i:1;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678322;}i:2;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678322;}i:3;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678323;}i:4;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678323;}i:5;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678323;}i:6;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678324;}i:7;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678324;}i:8;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678324;}i:9;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678324;}i:10;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678325;}i:11;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678325;}i:12;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678325;}i:13;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678325;}i:14;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678326;}i:15;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678326;}i:16;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678326;}i:17;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678326;}i:18;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678327;}i:19;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678327;}i:20;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678327;}i:21;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678328;}i:22;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678328;}i:23;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678328;}i:24;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678328;}i:25;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678375;}i:26;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678375;}i:27;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678375;}i:28;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678375;}i:29;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678376;}i:30;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678376;}i:31;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678376;}i:32;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678376;}i:33;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678377;}i:34;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678377;}i:35;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678377;}i:36;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678377;}i:37;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678378;}i:38;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678378;}i:39;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678378;}i:40;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678585;}i:41;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678585;}i:42;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678585;}i:43;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678585;}i:44;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678586;}i:45;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678586;}i:46;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678586;}i:47;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678587;}i:48;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678745;}i:49;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678746;}i:50;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678746;}i:51;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678746;}i:52;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678746;}i:53;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678747;}i:54;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678747;}i:55;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678747;}i:56;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678748;}i:57;a:3:{s:3:"uri";s:17:"apps/payment/test";s:4:"ruri";s:13:"/payment/test";s:9:"timestamp";i:1442678748;}}s:17:"flash:old:message";s:15:"Hi its me Again";s:17:"flash:new:message";s:15:"Hi its me Again";}');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `clientid` int(16) NOT NULL AUTO_INCREMENT,
  `agentid` int(16) NOT NULL,
  `agentname` varchar(16) CHARACTER SET latin1 DEFAULT NULL,
  `firstname` varchar(32) CHARACTER SET latin1 NOT NULL,
  `lastname` varchar(32) CHARACTER SET latin1 NOT NULL,
  `email` varchar(24) COLLATE latin1_general_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `passportnoclient` varchar(32) CHARACTER SET latin1 NOT NULL,
  `filenumber` varchar(16) CHARACTER SET latin1 NOT NULL,
  `refferenceid` int(16) NOT NULL,
  `status` varchar(16) COLLATE latin1_general_ci NOT NULL,
  `comments` text CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`clientid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=39 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`clientid`, `agentid`, `agentname`, `firstname`, `lastname`, `email`, `created`, `passportnoclient`, `filenumber`, `refferenceid`, `status`, `comments`) VALUES
(13, 2, 'Ahmed Akter', 'Al Mamun', 'Yen', 'yen@gmail.com', '2015-09-11 19:11:50', 'AB12345684', 'AB123XYZ', 11, 'Ongoing', 'Null'),
(19, 2, 'Ahmed Akter', 'Gulshana', 'Zaman', 'gulshanazaman@gmail.com', '2015-09-11 19:30:39', 'XY12345684', 'GH123XYZ', 11, 'Ongoing', 'Null'),
(32, 2, 'Ahmed Akter', 'Ahmed', 'Akter', 'ahmedakter@gmail.com', '2015-09-12 15:24:58', 'AT12345684', 'AT123XYZ', 1, 'New', 'Hello There, plz see these clients very important. Thanks. Regards => Ahmed Akter'),
(33, 3, 'Al Mamun', 'Abbas', 'Mahmud', 'abmahmud@aapf.tk', '2015-09-13 06:03:56', 'ABX123456YUZ', 'AT123XYF', 1, 'Govt Fees Paid', 'Hello There, plz see these clients very important. Thanks. \r\nRegards => Ahmed Akter'),
(34, 1, 'No Agent', 'Zason', 'Morino', 'noagent@gmail.com', '2015-08-14 02:43:34', 'AT12345685', 'AT123XY6', 1, 'New', 'Hello There, plz see these clients very important. Thanks. \r\nRegards => Ahmed Akter'),
(35, 1, 'No Agent', 'Awal', 'Saeed', 'aa@gmail.com', '2015-07-14 02:44:32', 'AT12345683', 'AT123XT', 1, 'New', 'Hello There, plz see these clients very important. Thanks. \r\nRegards => Ahmed Akter'),
(36, 2, 'Ahmed Akter', 'Mohammad', 'Golam', 'mdgolam@aa.tk', '2015-07-18 14:28:17', 'ABC123456RTG', 'AB123DFR', 1, 'Almost Done', 'Hello Guys,\r\nHow you Doin ???\r\nEid Mubarak'),
(37, 3, 'Mamun Yen', 'Kader', 'Molla', 'kader@molla.com', '2015-07-26 07:31:54', 'AXY5254WE', '561616FG', 1, 'Potential', 'Nothing'),
(38, 1, 'No Agent', 'Waliullah', 'Al Mamun', 'yen@gmail.com', '2015-09-29 15:33:10', 'AB123456PL', 'GH123XYZ3', 1, 'New', 'Allahu Akbar');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'Admin', 'Administrator'),
(2, 'Users', 'General User'),
(3, 'Mods', 'Moderator'),
(4, 'Ovaga', 'Nai');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE IF NOT EXISTS `levels` (
  `levelid` int(16) NOT NULL,
  `levelname` varchar(32) CHARACTER SET latin1 NOT NULL,
  `fees1` int(32) NOT NULL,
  `fees2` int(32) NOT NULL,
  `fees3` int(32) NOT NULL,
  `fees4` int(32) NOT NULL,
  `fees5` int(32) NOT NULL,
  `discounts` varchar(16) COLLATE latin1_general_ci NOT NULL,
  `clientsrequired` int(16) NOT NULL,
  `comments` varchar(128) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`levelid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`levelid`, `levelname`, `fees1`, `fees2`, `fees3`, `fees4`, `fees5`, `discounts`, `clientsrequired`, `comments`) VALUES
(1, 'NewBie', 10000, 20000, 30000, 40000, 50000, '0', 0, 'null'),
(2, 'Amateur', 1000, 1000, 1000, 1000, 1000, '2.5', 5, 'null'),
(3, 'Novice', 950, 950, 950, 950, 950, '5', 10, 'nill'),
(4, 'Semi Professional', 0, 0, 0, 0, 0, '7.5', 15, 'NULL'),
(5, 'Professional', 0, 0, 0, 0, 0, '10', 25, 'Null'),
(6, 'Expert Professional', 750, 750, 750, 750, 750, '15', 50, 'null');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `paymentid` int(16) NOT NULL AUTO_INCREMENT,
  `agentid` int(16) NOT NULL,
  `clientid` int(16) NOT NULL,
  `passportnoclient` varchar(32) NOT NULL,
  `feesname` varchar(16) NOT NULL,
  `payamount` float NOT NULL,
  `paytype` varchar(16) NOT NULL,
  `payname` varchar(24) NOT NULL,
  `paydate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payvia` varchar(24) NOT NULL,
  `payto` varchar(24) NOT NULL,
  `comments` varchar(128) NOT NULL,
  `agentname` varchar(32) NOT NULL,
  `clientname` varchar(32) NOT NULL,
  PRIMARY KEY (`paymentid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20151061 ;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`paymentid`, `agentid`, `clientid`, `passportnoclient`, `feesname`, `payamount`, `paytype`, `payname`, `paydate`, `payvia`, `payto`, `comments`, `agentname`, `clientname`) VALUES
(1, 1, 1, '123456', '', 10000, 'Cash', 'Ahmed', '2015-08-10 04:10:27', 'Yen', 'Stuff1', 'Received', '', ''),
(2, 1, 1, 'XY12345684 ', '', 10000, 'Cheque', 'Ahmed', '2015-09-14 02:15:21', 'Yen', 'Stuff3', 'Rejected', '', ''),
(9, 1, 1, 'ABX123456YUZ', '', 5000, 'Cash', '', '0000-00-00 00:00:00', '', 'Ahmed', 'Received', '', ''),
(10, 1, 1, 'ABX123456YUZ', '', 5000, 'Cash', '', '0000-00-00 00:00:00', '', 'Ahmed', 'Received Govt Fee', '', ''),
(11, 1, 1, 'ABX123456YUZ', '', 8000, 'Cash', '', '2015-09-14 15:24:31', '', 'Ahmed', 'Received College Fee', '', ''),
(12, 1, 1, 'AB12345684', 'Fees 1', 1230, 'Cash', '', '2015-07-16 15:56:26', '', 'Stuff1', 'Done', 'Yen', 'Ahmed'),
(20, 2, 2, 'AB12345684', 'Fees 2', 1230, 'Cash', '', '2015-06-16 16:38:17', '', 'Stuff2', 'Now Done', 'Tonni', 'Ahmed'),
(21, 0, 0, 'AB12345684', 'Fees 3', 1230, 'Cash', '', '2015-05-17 15:30:05', '', 'Stuff2', 'Null', 'Ahmed', '0'),
(22, 0, 0, 'AB12345684', 'Fees 4', 1230, 'Cash', '', '2015-05-26 15:32:17', '', 'Stuff2', 'Null', 'Ahmed', '0'),
(23, 0, 0, '0', 'Fees 3', 1200, 'Cash', '', '2015-09-17 15:34:33', '', 'Stuff1', 'Test2', 'Yen', '0'),
(24, 0, 0, '0', 'Fees 4', 1230, 'Cash', '', '2015-09-17 15:51:15', '', 'Stuff1', 'Test3', 'Yen', '0'),
(25, 0, 0, '0', 'Fees 3', 1230, 'Cash', '', '2015-09-17 15:51:37', '', 'Stuff1', 'Test3', 'Yen', '0'),
(26, 0, 19, '0', 'Fees 2', 1200, 'Cash', '', '2015-09-17 16:21:02', '', 'Stuff2', 'Test34', '', '0'),
(27, 0, 19, '0', 'Fees 2', 12303, 'Bikash', '', '2015-09-18 13:49:50', '', 'Stuff2', 'Test6', 'aa', '0'),
(28, 0, 33, '0', 'Fees 1', 12303, 'Cash', '', '2015-09-18 14:25:13', '', 'Stuff2', 'Test3', 'Ahmed', '0'),
(29, 0, 33, '0', 'Fees 2', 12303, 'Cash', '', '2015-09-18 14:27:07', '', 'Stuff2', '50% of the Visa fees Received', 'Ahmed', '0'),
(30, 0, 19, '0', 'Fees 4', 1200, 'Bikash', '', '2015-09-18 14:45:35', '', 'Stuff1', 'Done', 'Tonni', '0'),
(37, 0, 19, '0', 'Fees 4', 1200, 'Bikash', '', '2015-09-18 14:58:53', '', 'Stuff1', 'Done', 'Tonni', '0'),
(38, 0, 0, 'XY12345684', 'Fees 3', 12303, 'Bikash', '', '2015-09-18 15:13:29', '', 'Stuff1', 'Test1', 'Ahmed', 'Gulshana Zaman'),
(39, 0, 0, 'XY12345684', 'Fees 2', 12303, 'Bikash', '', '2015-09-18 15:17:40', '', 'Stuff1', 'Test1', 'Ahmed', 'Gulshana Zaman'),
(20151005, 0, 0, 'XY12345684', 'Fees 2', 12303, 'Bikash', '', '2015-09-18 16:14:59', '', 'Stuff1', 'Test1', 'Ahmed', 'Gulshana Zaman'),
(20151006, 0, 19, 'XY12345684', 'Fees 4', 1230, 'Bikash', '', '2015-09-18 16:16:12', '', 'Stuff1', 'Null', 'Ahmed', 'Gulshana Zaman'),
(20151007, 0, 19, 'XY12345684', 'Fees 4', 1230, 'Bikash', '', '2015-09-18 16:17:12', '', 'Stuff1', 'Null', 'Ahmed', 'Gulshana Zaman'),
(20151008, 0, 19, 'XY12345684', 'Fees 4', 1230, 'Bikash', '', '2015-09-18 16:40:26', '', 'Stuff1', 'Null', 'Ahmed', 'Gulshana Zaman'),
(20151009, 0, 19, 'XY12345684', 'Fees 4', 1230, 'Bikash', '', '2015-09-18 16:47:30', '', 'Stuff1', 'Null', 'Ahmed', 'Gulshana Zaman'),
(20151010, 0, 19, 'XY12345684', 'Fees 4', 1230, 'Bikash', '', '2015-09-18 16:47:45', '', 'Stuff1', 'Ajker Akash', 'Ahmed', 'Gulshana Zaman'),
(20151011, 0, 19, 'XY12345684', 'Fees 2', 1230, 'Bikash', '', '2015-09-18 18:58:43', '', 'Stuff1', 'Ajker Akash', 'Ahmed', 'Gulshana Zaman'),
(20151012, 0, 0, 'XY12345684', 'Fees 2', 1230, 'Bikash', '', '2015-09-18 19:00:00', '', 'Stuff1', 'Ajker Akash', 'Ahmed', 'Gulshana Zaman'),
(20151013, 0, 0, 'XY12345684', 'Fees 1', 1230, 'Bikash', '', '2015-09-18 19:02:39', '', 'Stuff1', 'Ajker Akash', 'Ahmed', 'Gulshana Zaman'),
(20151014, 0, 19, 'XY12345684', 'Fees 1', 1200, 'Bikash', '', '2015-09-18 19:04:06', '', 'Stuff2', 'Null', 'aa', 'Gulshana Zaman'),
(20151015, 0, 19, 'XY12345684', 'Fees 1', 1200, 'Bikash', '', '2015-09-18 19:04:13', '', 'Stuff2', 'Null', 'aa', 'Gulshana Zaman'),
(20151016, 0, 0, 'XY12345684', 'Fees 2', 1200, 'Bikash', '', '2015-09-18 19:04:25', '', 'Stuff2', 'Null', 'aa', 'Gulshana Zaman'),
(20151017, 0, 19, 'XY12345684', 'Fees 1', 1230, 'Bikash', '', '2015-09-18 19:10:14', '', 'Stuff2', 'Ajker Akash', 'aa', 'Gulshana Zaman'),
(20151018, 0, 19, 'XY12345684', 'Fees 4', 12303, 'Bikash', '', '2015-09-18 19:10:43', '', 'Stuff2', 'Ajker Akash', 'aa', 'Gulshana Zaman'),
(20151019, 0, 19, 'XY12345684', 'Fees 1', 1230, 'Bikash', '', '2015-09-19 16:47:46', '', 'Stuff2', 'Test1ssa', 'Tonni', 'Gulshana Zaman'),
(20151020, 0, 19, 'XY12345684', 'Fees 1', 1230, 'Bikash', '', '2015-09-19 16:51:23', '', 'Stuff2', 'Test1ssa', 'Tonni', 'Gulshana Zaman'),
(20151021, 0, 19, 'XY12345684', 'Fees 1', 1230, 'Bikash', '', '2015-09-19 16:51:56', '', 'Stuff2', 'Test1ssa', 'Tonni', 'Gulshana Zaman'),
(20151022, 0, 19, 'XY12345684', 'Fees 4', 1230, 'Bikash', '', '2015-09-19 16:55:07', '', 'Stuff1', 'Ajker Akash', '', 'Gulshana Zaman'),
(20151023, 0, 19, 'XY12345684', 'Fees 1', 12303, 'Bikash', '', '2015-09-19 17:01:10', '', 'Stuff1', 'Done', '', 'Gulshana Zaman'),
(20151024, 0, 19, 'XY12345684', 'Fees 1', 12303, 'Bikash', '', '2015-09-19 17:02:53', '', 'Stuff1', 'Done', '', 'Gulshana Zaman'),
(20151025, 0, 19, 'XY12345684', 'Fees 1', 12303, 'Bikash', '', '2015-09-19 17:02:57', '', 'Stuff1', 'Done', '', 'Gulshana Zaman'),
(20151051, 0, 36, 'ABC123456RTG', 'Fees 2', 12000, 'Cash', '', '2015-09-20 06:45:37', '', 'skdjs', 'kslfl', '', 'Md Golam'),
(20151052, 0, 36, 'ABC123456RTG', 'Fees 2', 1230, 'Cash', '', '2015-09-22 20:32:54', '', 'Stuff2', 'Test3', '', 'Md Golam'),
(20151053, 0, 32, 'AT12345684', 'Fees 3', 150000, 'Cheque', '', '2015-09-24 18:05:45', '', 'Haider Mia', 'Confirm the cheque Urgently\r\nRegards - AA', 'Gulshana Zaman', 'Ahmed Akter'),
(20151054, 0, 34, 'AT12345685', 'Fees 4', 10000, 'Cash', '', '2015-09-26 07:27:43', '', 'Al Mamun', 'Null', 'Al Mamun X', 'Zason Morino'),
(20151055, 0, 37, 'AXY5254WE', 'Fees 1', 100000, 'Cheque', '', '2015-09-26 07:34:43', '', 'Al Mamun', 'Nothing', 'Agent Mir', 'Kader Molla'),
(20151056, 0, 37, 'AXY5254WE', 'Fees 1', 111000, 'Cheque', '', '2015-09-26 17:02:55', '', 'Stuff2', 'Not Valid', 'Agent Mir', 'Kader Molla'),
(20151057, 0, 37, 'AXY5254WE', 'Fees 5', 20000, 'Cheque', '', '2015-09-26 17:03:12', '', 'Stuff2', 'Not Valid', 'Agent Mir', 'Kader Molla'),
(20151058, 0, 37, 'AXY5254WE', 'Fees 4', 35000, 'Cheque', '', '2015-09-26 17:03:41', '', 'Stuff2', 'Not Valid', 'Agent Mir', 'Kader Molla'),
(20151059, 0, 37, 'AXY5254WE', 'Fees 3', 112000, 'Cheque', '', '2015-09-26 17:08:30', '', 'Stuff2', 'Not Valid', 'Agent Mir', 'Kader Molla'),
(20151060, 1, 38, 'AB123456PL', 'Fees 2', 20000, 'Cash', '', '2015-09-29 16:56:55', '', 'Stuff2', 'Nothing Hot', 'No Agent', 'Waliullah Al Mamun');

-- --------------------------------------------------------

--
-- Table structure for table `siteinfo`
--

CREATE TABLE IF NOT EXISTS `siteinfo` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `userid` int(8) NOT NULL,
  `name` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(16) NOT NULL,
  `Comments` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `siteinfo`
--

INSERT INTO `siteinfo` (`id`, `userid`, `name`, `description`, `date`, `status`, `Comments`) VALUES
(1, 0, 'Client Functions', '<p>\r\n	1. Add</p>\r\n<p>\r\n	2. view</p>\r\n<p>\r\n	3.</p>\r\n<p>\r\n	&nbsp;</p>\r\n', '2015-09-22 18:37:29', '2', 'Nothing'),
(2, 0, 'DB Functions', '<p style="text-align: center;">\n	<span style="color:#b22222;"><strong>Clients</strong></span></p>\n<ol>\n	<li>\n		client_count</li>\n	<li>\n		client_add($agent_name, $passportnoclient, $filenumber, $additional_data)</li>\n	<li>\n		client_view($limit, $start)</li>\n	<li>\n		client_data($clientid)</li>\n</ol>\n<p>\n	&nbsp;</p>\n<p style="text-align: center;">\n	<span style="color:#b22222;"><strong>Payments</strong></span></p>\n<ol>\n	<li>\n		payment_add($paydata)</li>\n	<li>\n		payment_view_client($clientid = NULL)</li>\n	<li>\n		payment_view_payid($payid = NULL)</li>\n	<li>\n		last_payid()</li>\n	<li>\n		&nbsp;</li>\n</ol>\n', '2015-09-22 18:37:29', '2', ''),
(3, 0, 'Payment Functions', '', '2015-09-22 18:37:29', '2', ''),
(4, 0, 'Common Functions', '<div class="form-input-box" id="description_input_box">\r\n	<div class="readonly_label" id="field-description">\r\n		<p style="text-align: center;">\r\n			<span style="color:#b22222;"><strong>Clients</strong></span></p>\r\n		<ol>\r\n			<li>\r\n				client_count</li>\r\n			<li>\r\n				client_add($agent_name, $passportnoclient, $filenumber, $additional_data)</li>\r\n			<li>\r\n				client_view($limit, $start)</li>\r\n			<li>\r\n				client_data($clientid)</li>\r\n		</ol>\r\n		<p>\r\n			&nbsp;</p>\r\n		<p style="text-align: center;">\r\n			<span style="color:#b22222;"><strong>Payments</strong></span></p>\r\n		<ol>\r\n			<li>\r\n				payment_add($paydata)</li>\r\n			<li>\r\n				payment_view_client($clientid = NULL)</li>\r\n			<li>\r\n				payment_view_payid($payid = NULL)</li>\r\n			<li>\r\n				last_payid()</li>\r\n			<li>\r\n				&nbsp;</li>\r\n		</ol>\r\n	</div>\r\n</div>\r\n<p style="text-align: center;">\r\n	<span style="color:#b22222;"><strong>Common</strong></span></p>\r\n<ol>\r\n	<li>\r\n		public function get_array_data($get_data)</li>\r\n	<li>\r\n		public function fees_selection_verify($fees_selection)</li>\r\n	<li>\r\n		public function passport_check_client_check($passportno)</li>\r\n	<li>\r\n		public function yapps_pagination($uri_segment,$base_url)</li>\r\n	<li>\r\n		&nbsp;</li>\r\n</ol>\r\n', '2015-09-24 12:07:32', '2', 'Important');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `ip_address` varchar(15) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `username`, `password`, `company`, `phone`, `ip_address`, `activation_code`, `active`, `salt`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`) VALUES
(1, 'Ahmed', 'Akter', 'admin@aapf.tk', 'admin', '$2y$08$.roi64bLbZvkOIZodsCrUe8/WnL/y/8lcOvjOzFGZ.JT0XvOCFqfW', 'AA Planetica', '+8801676287208', '127.0.0.1', 'd996f1e967368ae0bb4a5dda4db8e6458f3c7083', 1, '', NULL, NULL, 'fHjtF9POtJ7aQHLvHySazu', 1268889823, 1443596288),
(2, 'Gulshana', 'Akter', 'gulshanazaman@gmail.com', 'tonni', '$2y$08$/AzUq1UoYR6GLL7XgDULzeEh797uzBa6NqiCondKaS0mQMKoLZijW', '0crash3r', '878782', '127.0.0.1', NULL, 1, NULL, NULL, NULL, NULL, 1441918927, 1442731803),
(3, 'Ahmed', 'Akter', 'aa@aa.com', 'ahmedakter', '$2y$08$7viqf1tRMXKPCZ3TE5q6zemOmYB75LLdswfb.pVrn/mrHw58ErYSi', 'AA', '+8801712203145', '::1', NULL, 1, NULL, NULL, NULL, NULL, 1443117382, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=78 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(37, 1, 1),
(38, 1, 2),
(39, 1, 3),
(72, 2, 2),
(73, 2, 3),
(75, 3, 1),
(76, 3, 2),
(77, 3, 3);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
