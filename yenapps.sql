-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2016 at 06:17 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yenapps`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogs`
--

CREATE TABLE `adminlogs` (
  `logid` int(16) NOT NULL,
  `logs` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `agentfees`
--

CREATE TABLE `agentfees` (
  `feesid` int(16) NOT NULL,
  `agentid` int(32) NOT NULL,
  `collegeid` varchar(256) COLLATE latin1_general_ci NOT NULL,
  `fees1` int(32) NOT NULL,
  `fees2` int(32) NOT NULL,
  `fees3` int(32) NOT NULL,
  `fees4` int(32) NOT NULL,
  `fees5` int(32) NOT NULL,
  `totalfees` int(32) NOT NULL,
  `discounts` varchar(16) COLLATE latin1_general_ci NOT NULL,
  `clientsrequired` int(16) NOT NULL,
  `comments` varchar(128) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `agentfees`
--

INSERT INTO `agentfees` (`feesid`, `agentid`, `collegeid`, `fees1`, `fees2`, `fees3`, `fees4`, `fees5`, `totalfees`, `discounts`, `clientsrequired`, `comments`) VALUES
(10, 3, '6', 1000, 1000, 1000, 1000, 1000, 5000, '', 0, ''),
(11, 3, '9', 1000, 5000, 10000, 54000, 2850, 72850, '', 0, ''),
(12, 2, '9', 1000, 20000, 10000, 50000, 20000, 101000, '', 0, ''),
(13, 2, '10', 600, 1000, 10000, 40000, 2250, 53850, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `agentid` int(12) NOT NULL,
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
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`agentid`, `levelid`, `refferenceid`, `firstname`, `lastname`, `username`, `passportnoagent`, `email`, `dateofbirth`, `occupation`, `created`, `clientthismonth`, `clientlastmonth`, `clientb4lastmonth`, `clienttotal`, `status`, `comments`) VALUES
(1, 1, 1, 'No', 'Agent', 'AgentNo', 'N 1_1 1_ 1_', 'no@agent.com', '2000-01-01', 'Null', '2015-09-29 15:02:05', 0, 1, 1, 3, 'Active', ''),
(2, 5, 1, 'Ahmed', 'Akter', 'agentaa', 'AG12345678', 'agentaa@aapf.tk', '1992-10-05', 'Part Time Job Holder, Short Time Student.', '2015-09-11 06:19:36', 0, 1, 3, 5, 'Whats so Hurry ???', 'null'),
(3, 5, 1, 'Mamun', 'Yen', 'yanmamun', 'XGC12345678', 'yen@aa.com', '1992-10-05', 'Part time Student', '2015-09-27 14:10:33', 0, 2, 1, 4, 'New', 'NULL');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
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

CREATE TABLE `clients` (
  `clientid` int(16) NOT NULL,
  `agentid` int(16) NOT NULL,
  `collegeid` int(16) NOT NULL,
  `agentname` varchar(16) CHARACTER SET latin1 DEFAULT NULL,
  `firstname` varchar(32) CHARACTER SET latin1 NOT NULL,
  `lastname` varchar(32) CHARACTER SET latin1 NOT NULL,
  `email` varchar(24) COLLATE latin1_general_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `passportnoclient` varchar(32) CHARACTER SET latin1 NOT NULL,
  `filenumber` varchar(16) CHARACTER SET latin1 NOT NULL,
  `refferenceid` int(16) NOT NULL,
  `status` varchar(16) COLLATE latin1_general_ci NOT NULL,
  `comments` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`clientid`, `agentid`, `collegeid`, `agentname`, `firstname`, `lastname`, `email`, `created`, `passportnoclient`, `filenumber`, `refferenceid`, `status`, `comments`) VALUES
(13, 2, 1, 'Ahmed Akter', 'Al Mamun', 'Yen', 'yen@gmail.com', '2015-09-11 19:11:50', 'AB12345684', 'AB123XYZ', 11, 'Ongoing', 'Null'),
(19, 2, 10, 'Ahmed Akter', 'Gulshana', 'Zaman', 'gulshanazaman@gmail.com', '2015-09-11 19:30:39', 'XY12345684', 'GH123XYZ', 11, 'Ongoing', 'Null'),
(32, 2, 10, 'Ahmed Akter', 'Ahmed', 'Akter', 'ahmedakter@gmail.com', '2015-09-12 15:24:58', 'AT12345684', 'AT123XYZ', 1, 'New', 'Hello There, plz see these clients very important. Thanks. Regards => Ahmed Akter'),
(33, 3, 6, '0', 'Abbas', 'Mahmud', 'abmahmud@aapf.tk', '2015-09-13 06:03:56', 'ABX123456YUZ', 'AT123XYF', 1, 'Govt Fees Paid', 'Hello There, plz see these clients very important. Thanks. \nRegards => Ahmed Akter'),
(34, 1, 1, 'No Agent', 'Zason', 'Morino', 'noagent@gmail.com', '2015-08-14 02:43:34', 'AT12345685', 'AT123XY6', 1, 'New', 'Hello There, plz see these clients very important. Thanks. \r\nRegards => Ahmed Akter'),
(35, 1, 2, 'No Agent', 'Awal', 'Saeed', 'aa@gmail.com', '2015-07-14 02:44:32', 'AT12345683', 'AT123XT', 1, 'New', 'Hello There, plz see these clients very important. Thanks. \r\nRegards => Ahmed Akter'),
(36, 2, 10, 'Ahmed Akter', 'Mohammad', 'Golam', 'mdgolam@aa.tk', '2015-07-18 14:28:17', 'ABC123456RTG', 'AB123DFR', 1, 'Almost Done', 'Hello Guys,\nHow you Doin ???\nEid Mubarak'),
(37, 3, 6, 'Mamun Yen', 'Kader', 'Molla', 'kader@molla.com', '2015-07-26 07:31:54', 'AXY5254WE', '561616FG', 1, 'Potential', 'Nothing'),
(38, 1, 5, 'No Agent', 'Waliullah', 'Al Mamun', 'yen@gmail.com', '2015-09-29 15:33:10', 'AB123456PL', 'GH123XYZ3', 1, 'New', 'Allahu Akbar'),
(39, 2, 9, 'Ahmed Akter', 'Tony', 'Blare', 'blare@tomy.com', '2015-10-03 06:18:43', 'AB46464WE', '123HJ56', 0, 'New', ''),
(40, 3, 6, 'Mamun Yen', 'Osama Bin', 'Laden', 'osama@911.com', '2015-10-03 06:52:42', 'AB46464RE', 'FL#6043-03M10', 0, 'New', 'Subhanallah, Allahu Akbar'),
(41, 3, 9, 'Mamun Yen', 'Saddam', 'Hossain', 'saddam@hossain.com', '2015-10-03 12:00:08', 'AB46464REW', 'F#2479-0310', 0, 'New', 'Alhamdulillah');

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `collegeid` int(16) NOT NULL,
  `collegename` varchar(256) NOT NULL,
  `collegecomments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`collegeid`, `collegename`, `collegecomments`) VALUES
(1, 'TMC', ''),
(2, 'AAC', ''),
(3, 'BBC', ''),
(4, 'XYC', ''),
(5, 'TTA', ''),
(6, 'XBC', ''),
(9, 'Brac', 'Renowned University'),
(10, 'NSU', 'Good One'),
(11, 'AIUB', '');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(16) NOT NULL,
  `title` varchar(500) NOT NULL,
  `content` text NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `title`, `content`, `create_date`) VALUES
(1, 'YApps How to ???', '<p>YApps is an agency services to  provide quality education to the students on Malaysian Universities. Here Agents, Clients and payments are recorded, at the same time its provides various stats & data to the authorities\n</p>', '2015-10-05 07:55:32'),
(2, 'Why YApps ???', '<p>YApps is the best agency among the others because of its sure success, short time visa processing, partners with renowned universities</p>', '2015-10-05 07:55:32');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `levels` (
  `levelid` int(16) NOT NULL,
  `levelname` varchar(32) CHARACTER SET latin1 NOT NULL,
  `fees1` int(32) NOT NULL,
  `fees2` int(32) NOT NULL,
  `fees3` int(32) NOT NULL,
  `fees4` int(32) NOT NULL,
  `fees5` int(32) NOT NULL,
  `discounts` varchar(16) COLLATE latin1_general_ci NOT NULL,
  `clientsrequired` int(16) NOT NULL,
  `comments` varchar(128) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`levelid`, `levelname`, `fees1`, `fees2`, `fees3`, `fees4`, `fees5`, `discounts`, `clientsrequired`, `comments`) VALUES
(1, 'NewBie', 0, 0, 0, 0, 0, '0', 0, 'null'),
(2, 'Amateur', 0, 0, 0, 0, 0, '2.5', 5, 'null'),
(3, 'Novice', 0, 0, 0, 0, 0, '5', 10, 'nill'),
(4, 'Semi Professional', 0, 0, 0, 0, 0, '7.5', 15, 'NULL'),
(5, 'Professional', 0, 0, 0, 0, 0, '10', 25, 'Null'),
(6, 'Expert Professional', 0, 0, 0, 0, 0, '15', 50, 'null');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `paymentid` int(16) NOT NULL,
  `agentid` int(16) NOT NULL,
  `clientid` int(16) NOT NULL,
  `collegeid` int(16) NOT NULL,
  `passportnoclient` varchar(32) NOT NULL,
  `feesname` varchar(16) NOT NULL,
  `payamount` float NOT NULL,
  `paytype` varchar(16) NOT NULL,
  `payname` varchar(24) NOT NULL,
  `paydate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payvia` varchar(24) NOT NULL,
  `payto` varchar(24) NOT NULL,
  `comments` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`paymentid`, `agentid`, `clientid`, `collegeid`, `passportnoclient`, `feesname`, `payamount`, `paytype`, `payname`, `paydate`, `payvia`, `payto`, `comments`) VALUES
(1, 3, 41, 9, 'AB46464REW', 'fees3', 10000, 'Cash', '', '2015-10-09 10:08:31', '', 'Stuff3', ''),
(2, 2, 39, 9, 'AB46464WE', 'fees1', 1000, 'Cash', '', '2015-10-09 10:16:17', '', 'Stuff3', ''),
(1992105, 2, 32, 10, 'AT12345684', 'fees1', 600, 'Cash', '', '2015-10-09 17:09:56', '', 'Stuff3', ''),
(1992106, 2, 19, 10, 'XY12345684', 'fees3', 10000, 'Cash', '', '2015-10-09 17:11:35', '', 'Stuff3', ''),
(1992107, 2, 19, 10, 'XY12345684', 'fees1', 600, 'Cash', '', '2015-10-09 17:12:47', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `siteinfo`
--

CREATE TABLE `siteinfo` (
  `id` int(8) NOT NULL,
  `userid` int(8) NOT NULL,
  `name` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(16) NOT NULL,
  `Comments` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siteinfo`
--

INSERT INTO `siteinfo` (`id`, `userid`, `name`, `description`, `date`, `status`, `Comments`) VALUES
(1, 0, 'Client Functions', '<p>\r\n	1. Add</p>\r\n<p>\r\n	2. view</p>\r\n<p>\r\n	3.</p>\r\n<p>\r\n	&nbsp;</p>\r\n', '2015-09-22 18:37:29', '2', 'Nothing'),
(2, 0, 'DB Functions', '<p style="text-align: center;">\n	<span style="color:#b22222;"><strong>Clients</strong></span></p>\n<ol>\n	<li>\n		client_count</li>\n	<li>\n		client_add($agent_name, $passportnoclient, $filenumber, $additional_data)</li>\n	<li>\n		client_view($limit, $start)</li>\n	<li>\n		client_data($clientid)</li>\n</ol>\n<p>\n	&nbsp;</p>\n<p style="text-align: center;">\n	<span style="color:#b22222;"><strong>Payments</strong></span></p>\n<ol>\n	<li>\n		payment_add($paydata)</li>\n	<li>\n		payment_view_client($clientid = NULL)</li>\n	<li>\n		payment_view_payid($payid = NULL)</li>\n	<li>\n		last_payid()</li>\n	<li>\n		&nbsp;</li>\n</ol>\n', '2015-09-22 18:37:29', '2', ''),
(3, 0, 'Payment Functions', '', '2015-09-22 18:37:29', '2', ''),
(4, 0, 'Common Functions', '<div class="form-input-box" id="description_input_box">\r\n	<div class="readonly_label" id="field-description">\r\n		<p style="text-align: center;">\r\n			<span style="color:#b22222;"><strong>Clients</strong></span></p>\r\n		<ol>\r\n			<li>\r\n				client_count</li>\r\n			<li>\r\n				client_add($agent_name, $passportnoclient, $filenumber, $additional_data)</li>\r\n			<li>\r\n				client_view($limit, $start)</li>\r\n			<li>\r\n				client_data($clientid)</li>\r\n		</ol>\r\n		<p>\r\n			&nbsp;</p>\r\n		<p style="text-align: center;">\r\n			<span style="color:#b22222;"><strong>Payments</strong></span></p>\r\n		<ol>\r\n			<li>\r\n				payment_add($paydata)</li>\r\n			<li>\r\n				payment_view_client($clientid = NULL)</li>\r\n			<li>\r\n				payment_view_payid($payid = NULL)</li>\r\n			<li>\r\n				last_payid()</li>\r\n			<li>\r\n				&nbsp;</li>\r\n		</ol>\r\n	</div>\r\n</div>\r\n<p style="text-align: center;">\r\n	<span style="color:#b22222;"><strong>Common</strong></span></p>\r\n<ol>\r\n	<li>\r\n		public function get_array_data($get_data)</li>\r\n	<li>\r\n		public function fees_selection_verify($fees_selection)</li>\r\n	<li>\r\n		public function passport_check_client_check($passportno)</li>\r\n	<li>\r\n		public function yapps_pagination($uri_segment,$base_url)</li>\r\n	<li>\r\n		&nbsp;</li>\r\n</ol>\r\n', '2015-09-24 12:07:32', '2', 'Important'),
(5, 8, 'pageview', '', '2015-10-03 17:26:33', '', ''),
(6, 1, '', '', '2015-10-03 17:37:22', '', ''),
(7, 1, '', '', '2015-10-03 17:38:24', '', ''),
(8, 1, '', '', '2015-10-03 17:38:35', '', ''),
(9, 1, '', '', '2015-10-03 17:38:38', '', ''),
(10, 1, '', '', '2015-10-03 17:38:40', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `ip_address` varchar(15) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `username`, `password`, `company`, `phone`, `ip_address`, `activation_code`, `active`, `salt`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`) VALUES
(1, 'Ahmed', 'Akter', 'admin@aapf.tk', 'admin', '$2y$08$.roi64bLbZvkOIZodsCrUe8/WnL/y/8lcOvjOzFGZ.JT0XvOCFqfW', 'AA Planetica', '+8801676287208', '127.0.0.1', 'd996f1e967368ae0bb4a5dda4db8e6458f3c7083', 1, '', NULL, NULL, 'oxuE1d6hLeMSyi5ieeIVye', 1268889823, 1478836627),
(2, 'Gulshana', 'Akter', 'gulshanazaman@gmail.com', 'tonni', '$2y$08$/AzUq1UoYR6GLL7XgDULzeEh797uzBa6NqiCondKaS0mQMKoLZijW', '0crash3r', '878782', '127.0.0.1', NULL, 1, NULL, NULL, NULL, NULL, 1441918927, 1442731803),
(4, 'Waliullah', 'Al Mamun', 'yen@gmail.com', 'yen', '$2y$08$oEO9JpfuVGdAAKZZsopkgu6J96/iyPzs6xpdlX1.C0W.YzS4k0LLa', 'YApps', '878782', '103.9.113.106', NULL, 1, NULL, NULL, NULL, NULL, 1444296118, NULL),
(5, 'Test', 'Test', 'gh@aa.com', 'test', '$2y$08$/AKRqkz3gCW6HvtnlvOk9.k60IDFA.RAX/pnDnvMfIkIgK2fbIcqu', 'YApps', '878782', '103.9.113.106', NULL, 1, NULL, NULL, NULL, NULL, 1444296164, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(37, 1, 1),
(38, 1, 2),
(39, 1, 3),
(72, 2, 2),
(73, 2, 3),
(79, 4, 1),
(80, 4, 3),
(82, 5, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogs`
--
ALTER TABLE `adminlogs`
  ADD PRIMARY KEY (`logid`);

--
-- Indexes for table `agentfees`
--
ALTER TABLE `agentfees`
  ADD PRIMARY KEY (`feesid`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`agentid`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`clientid`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`collegeid`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`levelid`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`paymentid`);

--
-- Indexes for table `siteinfo`
--
ALTER TABLE `siteinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogs`
--
ALTER TABLE `adminlogs`
  MODIFY `logid` int(16) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `agentfees`
--
ALTER TABLE `agentfees`
  MODIFY `feesid` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `agentid` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `clientid` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `collegeid` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `paymentid` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1992108;
--
-- AUTO_INCREMENT for table `siteinfo`
--
ALTER TABLE `siteinfo`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
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
