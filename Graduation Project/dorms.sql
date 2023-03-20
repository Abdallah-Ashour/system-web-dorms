-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 10, 2023 at 07:38 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dorms`
--

-- --------------------------------------------------------

--
-- Table structure for table `masterdormitory`
--

DROP TABLE IF EXISTS `masterdormitory`;
CREATE TABLE IF NOT EXISTS `masterdormitory` (
  `master_domitory_id` int(11) NOT NULL AUTO_INCREMENT,
  `master_domitory_name` varchar(40) NOT NULL,
  `master_domitory_brief` text NOT NULL,
  `master_domitory_link_url` varchar(250) NOT NULL,
  `master_domitory_link_map` text NOT NULL,
  `master_domitory_image` text NOT NULL,
  `isInternational` tinyint(1) NOT NULL,
  `isActive` bit(1) NOT NULL,
  `isDelete` bit(1) NOT NULL,
  PRIMARY KEY (`master_domitory_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `masterdormitory`
--

INSERT INTO `masterdormitory` (`master_domitory_id`, `master_domitory_name`, `master_domitory_brief`, `master_domitory_link_url`, `master_domitory_link_map`, `master_domitory_image`, `isInternational`, `isActive`, `isDelete`) VALUES
(1, 'Ammon', 'The building is equipped with modern elevators, security systems,  necessary alarms, and emergency exits.  It is also provided with a reception hall for guests and friends.  Each student has the privilege to park their cars inside the parking of the building.  Each room is equipped with internet services.', 'international-dormitory.php', 'https://goo.gl/maps/TB41n9bqH5VtCBmBA', 'dorm1.jfif', 1, b'1', b'0'),
(2, 'Jerash', 'The building is equipped with modern elevators, security systems, necessary alarms, and emergency exits. It is also provided with a reception hall for guests and friends. Each student has the privilege to park their cars inside the parking of the building. Each room is equipped with internet services.', 'international-dormitory.php', 'https://goo.gl/maps/TB41n9bqH5VtCBmBA', 'dorm4.jpg', 1, b'1', b'0'),
(21, 'Al-Andalus', 'The building is provided with reception halls for guests, a TV hall, reading rooms, and a prayer room for the students.  The building provides a fully equipped kitchen for the use of the students.  It is also equipped with modern elevators, security systems, necessary alarms, and emergency exits.', 'inner-dormitory.php', 'https://goo.gl/maps/vQheMLQpqnarX7bh6', 'dorm2.jpg', 0, b'1', b'0'),
(22, 'Al-Zahraa', 'The building is provided with reception halls for guests, a TV hall, reading rooms, and a prayer room for the students.  The building provides a fully equipped kitchen for the use of the students.  It is also equipped with modern elevators, security systems, necessary alarms, and emergency exits.', 'inner-dormitory.php', 'https://goo.gl/maps/xe1x5xdv5SLhNoQW9', '230110043920-276249561jpg', 0, b'1', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `mastermenu`
--

DROP TABLE IF EXISTS `mastermenu`;
CREATE TABLE IF NOT EXISTS `mastermenu` (
  `master_menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `master_menu_name` varchar(15) NOT NULL,
  `master_menu_url_link` varchar(250) NOT NULL,
  `master_menu_dropmenu` bit(1) DEFAULT NULL,
  `isActive` bit(1) NOT NULL,
  `isDelete` bit(1) NOT NULL,
  PRIMARY KEY (`master_menu_id`),
  KEY `master_menu_name` (`master_menu_name`),
  KEY `master_menu_name_2` (`master_menu_name`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mastermenu`
--

INSERT INTO `mastermenu` (`master_menu_id`, `master_menu_name`, `master_menu_url_link`, `master_menu_dropmenu`, `isActive`, `isDelete`) VALUES
(1, 'Home', 'home.php', b'0', b'1', b'1'),
(2, 'Contact Us', 'contactUs.php', b'0', b'1', b'1'),
(3, 'Dorms', 'dorms', b'1', b'1', b'0'),
(11, 'dasd', 'sdad', b'1', b'0', b'0'),
(7, 'abood', 'sand', b'1', b'0', b'0'),
(12, 'update', 'd', b'1', b'0', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `masterslider`
--

DROP TABLE IF EXISTS `masterslider`;
CREATE TABLE IF NOT EXISTS `masterslider` (
  `master_slider_id` int(11) NOT NULL AUTO_INCREMENT,
  `master_slider_image_url` varchar(255) NOT NULL,
  `master_slider_title` varchar(100) NOT NULL,
  `isActive` bit(1) NOT NULL,
  `isDelete` bit(1) NOT NULL,
  PRIMARY KEY (`master_slider_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `masterslider`
--

INSERT INTO `masterslider` (`master_slider_id`, `master_slider_image_url`, `master_slider_title`, `isActive`, `isDelete`) VALUES
(2, 'dorm2.jpg', 'Al-Andalus', b'1', b'1'),
(16, 'MicrosoftTeams-image.png', 'Al-Zahraa', b'1', b'0'),
(15, 'dorm1.jfif', 'Ammon', b'1', b'0'),
(17, 'MicrosoftTeams-image (1).png', 'Jerash', b'1', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `mastersocialmedia`
--

DROP TABLE IF EXISTS `mastersocialmedia`;
CREATE TABLE IF NOT EXISTS `mastersocialmedia` (
  `master_social_media_id` int(11) NOT NULL,
  `master_social_media_name` varchar(15) NOT NULL,
  `master_social_media_link_url` text NOT NULL,
  `master_social_media_icon` text NOT NULL,
  `isActive` bit(1) NOT NULL,
  `isDelete` bit(1) NOT NULL,
  PRIMARY KEY (`master_social_media_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` longtext,
  `status` bit(1) DEFAULT b'0',
  `user_id` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `isInternational` bit(1) DEFAULT b'0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `message`, `status`, `user_id`, `created_at`, `isInternational`) VALUES
(1, '<p>hello this is abo ashour, lets put our hands on our head</p><figure class=\"image\"><img src=\"data:image/jpeg;base64,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\"></figure>', b'1', 'Admin', '2023-01-07 23:36:10', b'0'),
(2, '<p>akhkhsa&nbsp;</p>', b'1', 'Admin', '2023-01-08 00:15:09', b'0'),
(3, '<p>i have some problem&nbsp;</p>', b'1', '121212', '2023-01-08 02:33:14', b'0'),
(4, '<p>I HAVE A PROBLEM</p>', b'1', '710', '2023-01-08 11:40:40', b'0'),
(5, '<p>fgffjh</p>', b'1', '710', '2023-01-09 21:48:33', b'0'),
(6, '<p>international notification</p>', b'1', 'Admin', '2023-01-10 01:23:51', b'1'),
(7, '<p>hi</p>', b'1', 'Admin', '2023-01-10 01:24:46', b'1'),
(8, '', b'1', 'Admin', '2023-01-10 01:25:02', b'0'),
(9, '<p>hi</p>', b'0', 'ahm', '2023-01-10 02:49:10', b'1'),
(10, '<p>Welcome</p><p>&nbsp;</p>', b'0', 'ahm', '2023-01-10 02:49:20', b'1'),
(11, '<p>test</p><p>&nbsp;</p>', b'1', 'ahm', '2023-01-10 02:49:31', b'0'),
(12, '<p>aaazad</p>', b'0', 'ahm', '2023-01-10 03:05:32', b'1'),
(13, '<p>aaa</p>', b'1', 'ahm', '2023-01-10 03:05:41', b'0'),
(14, '<p>hi</p>', b'1', 'Admin', '2023-01-10 19:52:05', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

DROP TABLE IF EXISTS `student_info`;
CREATE TABLE IF NOT EXISTS `student_info` (
  `university_ID` text NOT NULL,
  `Fname` varchar(15) DEFAULT NULL,
  `Lname` varchar(15) DEFAULT NULL,
  `admin-img` varbinary(255) DEFAULT NULL,
  `image` varchar(250) DEFAULT 'admin.jpg',
  `gender` bit(1) DEFAULT NULL,
  `Enroll_current_semester` bit(1) DEFAULT NULL,
  `isBarrier` tinyint(1) NOT NULL DEFAULT '0',
  `isAdmin` bit(1) NOT NULL,
  `spassword` text NOT NULL,
  `isInternational` tinyint(1) DEFAULT '0',
  `transInnerDorrmNightId` int(11) DEFAULT '1',
  `transInnerDorrmDoubleRoomId` int(11) DEFAULT '1',
  `transInnerDorrmTripleRoomId` int(11) DEFAULT '1',
  `transInternationalDormDoubleRoomId` int(11) DEFAULT '1',
  `transInternationalDormDoubleRoomSisterId` int(11) DEFAULT '1',
  `transInternationalDormNightRoomId` int(11) DEFAULT '1',
  `transInternationalDormSingleRoomId` int(11) DEFAULT '1',
  `transInternationalDormTripleRoomId` int(11) DEFAULT '1',
  PRIMARY KEY (`university_ID`(100)),
  KEY `transInnerDorrmNightId` (`transInnerDorrmNightId`),
  KEY `transInnerDorrmDoubleRoomId` (`transInnerDorrmDoubleRoomId`),
  KEY `transInnerDorrmTripleRoomId` (`transInnerDorrmTripleRoomId`),
  KEY `transInternationalDormDoubleRoomId` (`transInternationalDormDoubleRoomId`),
  KEY `transInternationalDormDoubleRoomSisterId` (`transInternationalDormDoubleRoomSisterId`),
  KEY `transInternationalDormNightRoomId` (`transInternationalDormNightRoomId`),
  KEY `transInternationalDormSingleRoomId` (`transInternationalDormSingleRoomId`),
  KEY `transInternationalDormTripleRoomId` (`transInternationalDormTripleRoomId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`university_ID`, `Fname`, `Lname`, `admin-img`, `image`, `gender`, `Enroll_current_semester`, `isBarrier`, `isAdmin`, `spassword`, `isInternational`, `transInnerDorrmNightId`, `transInnerDorrmDoubleRoomId`, `transInnerDorrmTripleRoomId`, `transInternationalDormDoubleRoomId`, `transInternationalDormDoubleRoomSisterId`, `transInternationalDormNightRoomId`, `transInternationalDormSingleRoomId`, `transInternationalDormTripleRoomId`) VALUES
('Admin', 'Abdallah', 'Ashour', NULL, '6406.jpg', b'1', b'1', 0, b'1', '7c222fb2927d828af22f592134e8932480637c0d', 0, 11, 0, 0, 0, 0, 0, 0, 0),
('121212', 'omar', 'ashour', NULL, 'admin.jpg', b'1', b'1', 1, b'0', '7c222fb2927d828af22f592134e8932480637c0d', 0, 1, 1, 1, 1, 1, 1, 1, 1),
('195413', 'noor', 'Ahmad', NULL, 'admin.jpg', b'0', b'1', 0, b'1', '7c222fb2927d828af22f592134e8932480637c0d', 0, 1, 1, 1, 1, 1, 1, 1, 1),
('omar', 'yaseen', 'othman', NULL, 'myPhoto.jpg', b'1', b'1', 0, b'1', '7c222fb2927d828af22f592134e8932480637c0d', 0, 1, 1, 1, 1, 1, 1, 1, 1),
('710', 'TALA', 'Ahmad', NULL, 'admin.jpg', b'0', b'1', 1, b'0', '7c222fb2927d828af22f592134e8932480637c0d', 0, 0, 0, 9, 0, 0, 0, 0, 0),
('dsd', 'aaa', 'sss', NULL, 'admin.jpg', b'1', b'1', 0, b'1', '7c222fb2927d828af22f592134e8932480637c0d', 0, 1, 1, 1, 1, 1, 1, 1, 1),
('othman', 'aaass', 'abood', NULL, 'admin.jpg', b'1', b'1', 0, b'1', '7c222fb2927d828af22f592134e8932480637c0d', 0, 1, 1, 1, 1, 1, 1, 1, 1),
('RANA', 'RANA', 'YASEEF', NULL, 'admin.jpg', b'1', b'1', 0, b'1', '7c222fb2927d828af22f592134e8932480637c0d', 0, 1, 1, 1, 1, 1, 1, 1, 1),
('2000', 'Ahmad', 'Omar', NULL, 'admin.jpg', b'0', b'1', 0, b'0', '7c222fb2927d828af22f592134e8932480637c0d', 0, 0, 0, 9, 0, 0, 0, 0, 0),
('ahm', 'ahmad', 'omar', NULL, 'admin.jpg', b'1', b'1', 0, b'1', '7c222fb2927d828af22f592134e8932480637c0d', 0, 1, 1, 1, 1, 1, 1, 1, 1),
('ahmad', 'ahmad', 'omar', NULL, '1200px-Escalante_Dorm_Room-800x600.jpg', b'1', b'1', 0, b'1', '7c222fb2927d828af22f592134e8932480637c0d', 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transinnerdorrmdoubleroom`
--

DROP TABLE IF EXISTS `transinnerdorrmdoubleroom`;
CREATE TABLE IF NOT EXISTS `transinnerdorrmdoubleroom` (
  `transInnerDorrmDoubleRoomId` int(11) NOT NULL AUTO_INCREMENT,
  `master_domitory_id` int(11) DEFAULT NULL,
  `transInnerDorrmDoubleRoomTitle` varchar(30) NOT NULL,
  `transInnerDorrmDoubleRoomBrief` text NOT NULL,
  `transInnerDorrmDoubleRoomImage` text NOT NULL,
  `transInnerDorrmDoubleRoomPrice` int(11) NOT NULL,
  `isBooked` bit(1) DEFAULT b'0',
  `isActive` bit(1) NOT NULL,
  PRIMARY KEY (`transInnerDorrmDoubleRoomId`),
  KEY `master_domitory_id` (`master_domitory_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transinnerdorrmdoubleroom`
--

INSERT INTO `transinnerdorrmdoubleroom` (`transInnerDorrmDoubleRoomId`, `master_domitory_id`, `transInnerDorrmDoubleRoomTitle`, `transInnerDorrmDoubleRoomBrief`, `transInnerDorrmDoubleRoomImage`, `transInnerDorrmDoubleRoomPrice`, `isBooked`, `isActive`) VALUES
(14, 21, 'dorm', '2 Beds, 1 Cupboard, 2 Desks, 1 Refrigerator', '1200px-Escalante_Dorm_Room-800x600.jpg', 250, b'0', b'1'),
(5, 21, 'dorm', '2 Beds, 1 Cupboard, 2 Desks, 1 Refrigerator', '1200px-Escalante_Dorm_Room-800x600.jpg', 250, b'0', b'1'),
(12, 21, 'dorm', '2 Beds, 1 Cupboard, 2 Desks, 1 Refrigerator', '1200px-Escalante_Dorm_Room-800x600.jpg', 250, b'0', b'1'),
(13, 21, 'dorm', '2 Beds, 1 Cupboard, 2 Desks, 1 Refrigerator', '1200px-Escalante_Dorm_Room-800x600.jpg', 250, b'0', b'1'),
(15, 22, 'dorm', '2 Beds, 1 Cupboard, 2 Desks, 1 Refrigerator', '1200px-Escalante_Dorm_Room-800x600.jpg', 250, b'0', b'1'),
(16, 22, 'dorm', '2 Beds, 1 Cupboard, 2 Desks, 1 Refrigerator', '1200px-Escalante_Dorm_Room-800x600.jpg', 250, b'0', b'1'),
(17, 22, 'dorm', '2 Beds, 1 Cupboard, 2 Desks, 1 Refrigerator', '1200px-Escalante_Dorm_Room-800x600.jpg', 250, b'0', b'1'),
(18, 22, 'dorm', '2 Beds, 1 Cupboard, 2 Desks, 1 Refrigerator', '1200px-Escalante_Dorm_Room-800x600.jpg', 250, b'0', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `transinnerdorrmnight`
--

DROP TABLE IF EXISTS `transinnerdorrmnight`;
CREATE TABLE IF NOT EXISTS `transinnerdorrmnight` (
  `transInnerDorrmNightId` int(11) NOT NULL AUTO_INCREMENT,
  `master_domitory_id` int(11) NOT NULL,
  `transInnerDorrmNightRoomTitle` varchar(30) NOT NULL,
  `transInnerDorrmNightRoomBrief` text NOT NULL,
  `transInnerDorrmNightRoomImage` text NOT NULL,
  `transInnerDorrmNightRoomPrice` int(11) NOT NULL,
  `isBooked` bit(1) DEFAULT b'0',
  `isActive` bit(1) DEFAULT NULL,
  PRIMARY KEY (`transInnerDorrmNightId`),
  KEY `master_domitory_id` (`master_domitory_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transinnerdorrmnight`
--

INSERT INTO `transinnerdorrmnight` (`transInnerDorrmNightId`, `master_domitory_id`, `transInnerDorrmNightRoomTitle`, `transInnerDorrmNightRoomBrief`, `transInnerDorrmNightRoomImage`, `transInnerDorrmNightRoomPrice`, `isBooked`, `isActive`) VALUES
(6, 21, 'dorm', '1 Beds, 1 Cupboard, 1 Desks, 1 Refrigerator', 'MicrosoftTeams-image (5).png', 10, b'0', b'1'),
(4, 21, 'dorm', '1 Beds, 1 Cupboard, 1 Desks, 1 Refrigerator', 'MicrosoftTeams-image (5).png', 10, b'1', b'1'),
(5, 21, 'dorm', '1 Beds, 1 Cupboard, 1 Desks, 1 Refrigerator', 'MicrosoftTeams-image (5).png', 10, b'1', b'1'),
(7, 21, 'dorm', '1 Beds, 1 Cupboard, 1 Desks, 1 Refrigerator', 'MicrosoftTeams-image (5).png', 10, b'0', b'1'),
(8, 22, 'dorm', '1 Beds, 1 Cupboard, 1 Desks, 1 Refrigerator', 'MicrosoftTeams-image (5).png', 10, b'0', b'1'),
(9, 22, 'dorm', '1 Beds, 1 Cupboard, 1 Desks, 1 Refrigerator', 'MicrosoftTeams-image (5).png', 10, b'0', b'1'),
(10, 22, 'dorm', '1 Beds, 1 Cupboard, 1 Desks, 1 Refrigerator', 'MicrosoftTeams-image (5).png', 10, b'0', b'1'),
(11, 22, 'dorm', '1 Beds, 1 Cupboard, 1 Desks, 1 Refrigerator', 'MicrosoftTeams-image (5).png', 10, b'1', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `transinnerdorrmtripleroom`
--

DROP TABLE IF EXISTS `transinnerdorrmtripleroom`;
CREATE TABLE IF NOT EXISTS `transinnerdorrmtripleroom` (
  `transInnerDorrmTripleRoomId` int(11) NOT NULL AUTO_INCREMENT,
  `master_domitory_id` int(11) DEFAULT NULL,
  `transInnerDorrmTripleRoomTitle` varchar(30) NOT NULL,
  `transInnerDorrmTripleRoomBrief` text NOT NULL,
  `transInnerDorrmTripleRoomImage` text NOT NULL,
  `transInnerDorrmTripleRoomPrice` int(11) NOT NULL,
  `isBooked` bit(1) DEFAULT b'0',
  `isActive` bit(1) NOT NULL,
  PRIMARY KEY (`transInnerDorrmTripleRoomId`),
  KEY `master_domitory_id` (`master_domitory_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transinnerdorrmtripleroom`
--

INSERT INTO `transinnerdorrmtripleroom` (`transInnerDorrmTripleRoomId`, `master_domitory_id`, `transInnerDorrmTripleRoomTitle`, `transInnerDorrmTripleRoomBrief`, `transInnerDorrmTripleRoomImage`, `transInnerDorrmTripleRoomPrice`, `isBooked`, `isActive`) VALUES
(1, 21, 'dorm', '3 Rooms, 2 Cupboards, 3 Desks, 1 Refrigerator', 'MicrosoftTeams-image (2).png', 150, b'0', b'1'),
(10, 21, 'dorm', '2 Beds, 1 Cupboard, 2 Desks, 1 Refrigerator', 'MicrosoftTeams-image (2).png', 150, b'0', b'1'),
(12, 21, 'dorm', '2 Beds, 1 Cupboard, 2 Desks, 1 Refrigerator', 'MicrosoftTeams-image (2).png', 150, b'0', b'1'),
(11, 21, 'dorm', '2 Beds, 1 Cupboard, 2 Desks, 1 Refrigerator', 'MicrosoftTeams-image (2).png', 150, b'0', b'1'),
(13, 22, 'dorm', '2 Beds, 1 Cupboard, 2 Desks, 1 Refrigerator', 'MicrosoftTeams-image (2).png', 150, b'0', b'1'),
(14, 22, 'dorm', '2 Beds, 1 Cupboard, 2 Desks, 1 Refrigerator', 'MicrosoftTeams-image (2).png', 150, b'0', b'1'),
(15, 22, 'dorm', '2 Beds, 1 Cupboard, 2 Desks, 1 Refrigerator', 'MicrosoftTeams-image (2).png', 150, b'0', b'1'),
(16, 22, 'dorm', '2 Beds, 1 Cupboard, 2 Desks, 1 Refrigerator', 'MicrosoftTeams-image (2).png', 150, b'0', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `transinternationaldormdoubleroom`
--

DROP TABLE IF EXISTS `transinternationaldormdoubleroom`;
CREATE TABLE IF NOT EXISTS `transinternationaldormdoubleroom` (
  `transInternationalDormDoubleRoomId` int(11) NOT NULL AUTO_INCREMENT,
  `master_domitory_id` int(11) DEFAULT NULL,
  `transInternationalDormDoubleRoomTitle` varchar(30) NOT NULL,
  `transInternationalDormDoubleRoomBrief` text NOT NULL,
  `transInternationalDormDoubleRoomImage` text NOT NULL,
  `transInternationalDormDoubleRoomPrice` int(11) NOT NULL,
  `isBooked` bit(1) DEFAULT b'0',
  `isActive` bit(1) NOT NULL,
  PRIMARY KEY (`transInternationalDormDoubleRoomId`),
  KEY `master_domitory_id` (`master_domitory_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transinternationaldormdoubleroom`
--

INSERT INTO `transinternationaldormdoubleroom` (`transInternationalDormDoubleRoomId`, `master_domitory_id`, `transInternationalDormDoubleRoomTitle`, `transInternationalDormDoubleRoomBrief`, `transInternationalDormDoubleRoomImage`, `transInternationalDormDoubleRoomPrice`, `isBooked`, `isActive`) VALUES
(1, 1, 'dorm', '2 Beds, 1 Cupboard, 2 Desks, 1 Refrigerator', '1200px-Escalante_Dorm_Room-800x600.jpg', 250, b'0', b'1'),
(2, 2, 'dorm', '2 Beds, 1 Cupboard, 2 Desks, 1 Refrigerator', '1200px-Escalante_Dorm_Room-800x600.jpg', 250, b'1', b'1'),
(3, 2, 'dorm', '2 Beds, 1 Cupboard, 2 Desks, 1 Refrigerator', '1200px-Escalante_Dorm_Room-800x600.jpg', 250, b'0', b'1'),
(4, 2, 'dorm', '2 Beds, 1 Cupboard, 2 Desks, 1 Refrigerator', '1200px-Escalante_Dorm_Room-800x600.jpg', 250, b'0', b'1'),
(5, 2, 'dorm', '2 Beds, 1 Cupboard, 2 Desks, 1 Refrigerator', '1200px-Escalante_Dorm_Room-800x600.jpg', 250, b'1', b'1'),
(6, 1, 'dorm', '2 Beds, 1 Cupboard, 2 Desks, 1 Refrigerator', '1200px-Escalante_Dorm_Room-800x600.jpg', 250, b'0', b'1'),
(7, 1, 'dorm', '2 Beds, 1 Cupboard, 2 Desks, 1 Refrigerator', '1200px-Escalante_Dorm_Room-800x600.jpg', 250, b'0', b'1'),
(8, 1, 'dorm', '2 Beds, 1 Cupboard, 2 Desks, 1 Refrigerator', '1200px-Escalante_Dorm_Room-800x600.jpg', 250, b'0', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `transinternationaldormdoubleroomsister`
--

DROP TABLE IF EXISTS `transinternationaldormdoubleroomsister`;
CREATE TABLE IF NOT EXISTS `transinternationaldormdoubleroomsister` (
  `transInternationalDormDoubleRoomSisterId` int(11) NOT NULL AUTO_INCREMENT,
  `master_domitory_id` int(11) DEFAULT NULL,
  `transInternationalDormDoubleRoomSisterTitle` varchar(30) NOT NULL,
  `transInternationalDormDoubleRoomSisterBrief` text NOT NULL,
  `transInternationalDormDoubleRoomSisterImage` text NOT NULL,
  `transInternationalDormDoubleRoomSisterPrice` int(11) NOT NULL,
  `isBooked` bit(1) DEFAULT b'0',
  `isActive` bit(1) NOT NULL,
  PRIMARY KEY (`transInternationalDormDoubleRoomSisterId`),
  KEY `master_domitory_id` (`master_domitory_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transinternationaldormdoubleroomsister`
--

INSERT INTO `transinternationaldormdoubleroomsister` (`transInternationalDormDoubleRoomSisterId`, `master_domitory_id`, `transInternationalDormDoubleRoomSisterTitle`, `transInternationalDormDoubleRoomSisterBrief`, `transInternationalDormDoubleRoomSisterImage`, `transInternationalDormDoubleRoomSisterPrice`, `isBooked`, `isActive`) VALUES
(1, 1, 'dorm', '2 Beds, 1 Cupboard, 2 Desks, 1 Refrigerator', '7f7deffa1699672cf961ea105bf65bca.png', 200, b'0', b'1'),
(2, 1, 'dorm', '2 Beds, 1 Cupboard, 2 Desks, 1 Refrigerator', '7f7deffa1699672cf961ea105bf65bca.png', 200, b'0', b'1'),
(3, 2, 'dorm', '2 Beds, 1 Cupboard, 2 Desks, 1 Refrigerator', '7f7deffa1699672cf961ea105bf65bca.png', 200, b'1', b'1'),
(4, 2, 'atata', '2 Beds, 1 Cupboard, 2 Desks, 1 Refrigerator', '7f7deffa1699672cf961ea105bf65bca.png', 200, b'1', b'1'),
(5, 2, 'dorm', '2 Beds, 1 Cupboard, 2 Desks, 1 Refrigerator', '7f7deffa1699672cf961ea105bf65bca.png', 200, b'1', b'1'),
(6, 2, 'dorm', '2 Beds, 1 Cupboard, 2 Desks, 1 Refrigerator', '7f7deffa1699672cf961ea105bf65bca.png', 200, b'0', b'1'),
(7, 1, 'dorm', '2 Beds, 1 Cupboard, 2 Desks, 1 Refrigerator', '7f7deffa1699672cf961ea105bf65bca.png', 200, b'0', b'1'),
(8, 1, 'dorm', '2 Beds, 1 Cupboard, 2 Desks, 1 Refrigerator', '7f7deffa1699672cf961ea105bf65bca.png', 200, b'0', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `transinternationaldormnightroom`
--

DROP TABLE IF EXISTS `transinternationaldormnightroom`;
CREATE TABLE IF NOT EXISTS `transinternationaldormnightroom` (
  `transInternationalDormNightRoomId` int(11) NOT NULL AUTO_INCREMENT,
  `master_domitory_id` int(11) DEFAULT NULL,
  `transInternationalDormNightRoomTitle` varchar(30) NOT NULL,
  `transInternationalDormNightRoomBrief` text NOT NULL,
  `transInternationalDormNightRoomImage` text NOT NULL,
  `transInternationalDormNightRoomPrice` int(11) NOT NULL,
  `isBooked` bit(1) DEFAULT b'0',
  `isActive` bit(1) NOT NULL,
  PRIMARY KEY (`transInternationalDormNightRoomId`),
  KEY `master_domitory_id` (`master_domitory_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transinternationaldormnightroom`
--

INSERT INTO `transinternationaldormnightroom` (`transInternationalDormNightRoomId`, `master_domitory_id`, `transInternationalDormNightRoomTitle`, `transInternationalDormNightRoomBrief`, `transInternationalDormNightRoomImage`, `transInternationalDormNightRoomPrice`, `isBooked`, `isActive`) VALUES
(1, 1, 'dorm', '1 Beds, 1 Cupboard, 1 Desks, 1 Refrigerator', 'havenguestsuite-f19-20.jpg', 20, b'0', b'1'),
(2, 2, 'dorm', '1 Beds, 1 Cupboard, 1 Desks, 1 Refrigerator', 'havenguestsuite-f19-20.jpg', 20, b'0', b'1'),
(3, 2, 'dorm', '1 Beds, 1 Cupboard, 1 Desks, 1 Refrigerator', 'havenguestsuite-f19-20.jpg', 20, b'1', b'1'),
(4, 1, 'dorm', '1 Beds, 1 Cupboard, 1 Desks, 1 Refrigerator', 'havenguestsuite-f19-20.jpg', 20, b'0', b'1'),
(5, 1, 'dorm', '1 Beds, 1 Cupboard, 1 Desks, 1 Refrigerator', 'havenguestsuite-f19-20.jpg', 20, b'0', b'1'),
(6, 1, 'dorm', '1 Beds, 1 Cupboard, 1 Desks, 1 Refrigerator', 'havenguestsuite-f19-20.jpg', 20, b'0', b'1'),
(7, 2, 'dorm', '1 Beds, 1 Cupboard, 1 Desks, 1 Refrigerator', 'havenguestsuite-f19-20.jpg', 20, b'0', b'1'),
(8, 2, 'dorm', '1 Beds, 1 Cupboard, 1 Desks, 1 Refrigerator', 'havenguestsuite-f19-20.jpg', 20, b'0', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `transinternationaldormsingleroom`
--

DROP TABLE IF EXISTS `transinternationaldormsingleroom`;
CREATE TABLE IF NOT EXISTS `transinternationaldormsingleroom` (
  `transInternationalDormSingleRoomId` int(11) NOT NULL AUTO_INCREMENT,
  `master_domitory_id` int(11) DEFAULT NULL,
  `transInternationalDormSingleRoomTitle` varchar(30) NOT NULL,
  `transInternationalDormSingleRoomBrief` text NOT NULL,
  `transInternationalDormSingleRoomImage` text NOT NULL,
  `transInternationalDormSingleRoomPrice` int(11) NOT NULL,
  `isActive` bit(1) NOT NULL,
  `isBooked` bit(1) DEFAULT b'0',
  PRIMARY KEY (`transInternationalDormSingleRoomId`),
  KEY `master_domitory_id` (`master_domitory_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transinternationaldormsingleroom`
--

INSERT INTO `transinternationaldormsingleroom` (`transInternationalDormSingleRoomId`, `master_domitory_id`, `transInternationalDormSingleRoomTitle`, `transInternationalDormSingleRoomBrief`, `transInternationalDormSingleRoomImage`, `transInternationalDormSingleRoomPrice`, `isActive`, `isBooked`) VALUES
(1, 1, 'dorm', '1 Beds, 1 Cupboard, 1 Desks, 1 Refrigerator', 'MicrosoftTeams-image (3).png', 300, b'1', b'0'),
(2, 1, 'dorm', '1 Beds, 1 Cupboard, 1 Desks, 1 Refrigerator', 'MicrosoftTeams-image (3).png', 300, b'1', b'1'),
(3, 2, 'dorm', '1 Beds, 1 Cupboard, 1 Desks, 1 Refrigerator', 'MicrosoftTeams-image (3).png', 300, b'1', b'1'),
(4, 2, 'dorm', '1 Beds, 1 Cupboard, 1 Desks, 1 Refrigerator', 'MicrosoftTeams-image (3).png', 300, b'1', b'1'),
(5, 2, '300', '1 Beds, 1 Cupboard, 1 Desks, 1 Refrigerator', 'MicrosoftTeams-image (3).png', 300, b'1', b'1'),
(6, 2, 'dorm', '1 Beds, 1 Cupboard, 1 Desks, 1 Refrigerator', 'MicrosoftTeams-image (3).png', 300, b'1', b'0'),
(7, 1, 'dorm', '1 Beds, 1 Cupboard, 1 Desks, 1 Refrigerator', 'MicrosoftTeams-image (3).png', 300, b'1', b'0'),
(8, 1, 'dorm', '1 Beds, 1 Cupboard, 1 Desks, 1 Refrigerator', 'MicrosoftTeams-image (3).png', 300, b'1', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `transinternationaldormtripleroom`
--

DROP TABLE IF EXISTS `transinternationaldormtripleroom`;
CREATE TABLE IF NOT EXISTS `transinternationaldormtripleroom` (
  `transInternationalDormTripleRoomId` int(11) NOT NULL AUTO_INCREMENT,
  `master_domitory_id` int(11) DEFAULT NULL,
  `transInternationalDormTripleRoomTitle` varchar(30) NOT NULL,
  `transInternationalDormTripleRoomBrief` text NOT NULL,
  `transInternationalDormTripleRoomImage` text NOT NULL,
  `transInternationalDormTripleRoomPrice` int(11) NOT NULL,
  `isBooked` bit(1) DEFAULT b'0',
  `isActive` bit(1) NOT NULL,
  PRIMARY KEY (`transInternationalDormTripleRoomId`),
  KEY `master_domitory_id` (`master_domitory_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transinternationaldormtripleroom`
--

INSERT INTO `transinternationaldormtripleroom` (`transInternationalDormTripleRoomId`, `master_domitory_id`, `transInternationalDormTripleRoomTitle`, `transInternationalDormTripleRoomBrief`, `transInternationalDormTripleRoomImage`, `transInternationalDormTripleRoomPrice`, `isBooked`, `isActive`) VALUES
(1, 1, 'dorm', '2 Beds, 1 Cupboard, 2 Desks, 1 Refrigerator', 'MicrosoftTeams-image (4).png', 150, b'0', b'1'),
(2, 2, 'dorm', '2 Beds, 1 Cupboard, 2 Desks, 1 Refrigerator', 'MicrosoftTeams-image (4).png', 150, b'1', b'1'),
(3, 2, 'dorm', '2 Beds, 1 Cupboard, 2 Desks, 1 Refrigerator', 'MicrosoftTeams-image (4).png', 150, b'0', b'1'),
(4, 1, 'dorm', '2 Beds, 1 Cupboard, 2 Desks, 1 Refrigerator', 'MicrosoftTeams-image (4).png', 150, b'0', b'1'),
(5, 1, 'dorm', '2 Beds, 1 Cupboard, 2 Desks, 1 Refrigerator', 'MicrosoftTeams-image (4).png', 150, b'0', b'1'),
(6, 1, 'dorm', '2 Beds, 1 Cupboard, 2 Desks, 1 Refrigerator', 'MicrosoftTeams-image (4).png', 150, b'0', b'1'),
(7, 2, 'dorm', '2 Beds, 1 Cupboard, 2 Desks, 1 Refrigerator', 'MicrosoftTeams-image (4).png', 150, b'0', b'1'),
(8, 2, 'dorm', '2 Beds, 1 Cupboard, 2 Desks, 1 Refrigerator', 'MicrosoftTeams-image (4).png', 150, b'0', b'1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
