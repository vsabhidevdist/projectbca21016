-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 25, 2023 at 04:25 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bca21016`
--

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

DROP TABLE IF EXISTS `admission`;
CREATE TABLE IF NOT EXISTS `admission` (
  `regno` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `age` int NOT NULL,
  `course` char(10) NOT NULL,
  `address` varchar(60) NOT NULL,
  `phone` char(10) NOT NULL,
  PRIMARY KEY (`regno`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`regno`, `name`, `age`, `course`, `address`, `phone`) VALUES
(22, 'Fareed', 21, 'BCA', 'Fareed Bhavan,edappally', '5678'),
(21, 'Aswin', 30, 'BBA', 'angamaly,ekm', '678998'),
(20, 'Abhishek', 20, 'bca', 'ekm,kerala', '456'),
(18, 'Thomson', 40, 'bcom', 'parashala,tvm', '4556'),
(16, 'Abhidev', 19, 'bca', 'add2,add22', '342'),
(15, 'Ajith', 12, 'bca', 'ad1,ad2', '123');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `id` int NOT NULL AUTO_INCREMENT,
  `doctor_id` int NOT NULL,
  `user_id` int NOT NULL,
  `booked_datetime` datetime NOT NULL,
  `appo_date` date NOT NULL,
  `appo_time` char(5) NOT NULL,
  `status` varchar(25) NOT NULL,
  `slot` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `doctor_id`, `user_id`, `booked_datetime`, `appo_date`, `appo_time`, `status`, `slot`) VALUES
(69, 1, 1, '2023-10-15 00:51:32', '2023-10-14', '04:00', 'confirm', 'e'),
(68, 1, 1, '2023-10-15 00:50:10', '2023-10-13', '11:00', 'confirm', 'm'),
(67, 1, 1, '2023-10-15 00:47:01', '2023-10-13', '10:45', 'confirm', 'm'),
(65, 1, 1, '2023-10-15 00:42:27', '2023-10-13', '10:30', 'confirm', 'm'),
(82, 1, 1, '2023-10-18 11:25:32', '2023-10-18', '08:00', 'consulted', 'm'),
(64, 1, 1, '2023-10-14 22:14:00', '2023-10-13', '10:15', 'confirm', 'm'),
(63, 1, 1, '2023-10-14 22:11:29', '2023-10-13', '10:00', 'confirm', 'm'),
(78, 1, 1, '2023-10-16 21:18:31', '2023-10-13', '04:15', 'confirm', 'e'),
(79, 1, 1, '2023-10-16 21:21:12', '2023-10-13', '04:30', 'confirm', 'e'),
(81, 1, 1, '2023-10-18 10:10:59', '2023-10-13', '05:00', 'confirm', 'e'),
(83, 1, 1, '2023-10-18 11:26:41', '2023-10-18', '08:15', 'consulted', 'm'),
(84, 1, 1, '2023-10-18 13:36:04', '2023-10-18', '11:30', 'consulted', 'm'),
(85, 1, 1, '2023-10-18 13:39:24', '2023-10-18', '08:00', 'consulted', 'm'),
(86, 1, 1, '2023-10-18 13:42:49', '2023-10-18', '08:00', 'consulted', 'm'),
(87, 1, 1, '2023-10-18 13:51:13', '2023-10-19', '08:00', 'cancelled', 'm'),
(88, 1, 1, '2023-10-20 14:42:30', '2023-10-20', '08:00', 'cancelled', 'm'),
(89, 1, 1, '2023-10-21 11:13:05', '2023-10-21', '08:00', 'cancelled', 'm'),
(90, 1, 1, '2023-10-21 11:47:20', '2023-10-21', '08:15', 'cancelled', 'm'),
(92, 1, 1, '2023-10-22 18:00:41', '2023-10-22', '04:00', 'cancelled', 'e'),
(93, 1, 1, '2023-10-22 19:48:20', '2023-10-22', '09:00', 'cancelled', 'm'),
(94, 1, 1, '2023-10-22 20:06:08', '2023-10-22', '09:15', 'cancelled', 'm'),
(95, 1, 1, '2023-10-22 20:09:20', '2023-10-22', '09:15', 'cancelled', 'm'),
(96, 1, 1, '2023-10-24 01:39:45', '2023-10-24', '08:00', 'cancelled', 'm'),
(97, 1, 1, '2023-10-24 14:33:24', '2023-10-24', '08:00', 'consulted', 'm'),
(98, 1, 1, '2023-10-24 14:55:59', '2023-10-24', '08:00', 'consulted', 'm'),
(99, 1, 1, '2023-10-24 15:04:46', '2023-10-24', '08:15', 'consulted', 'm'),
(102, 1, 10, '2023-10-25 21:44:24', '2023-10-26', '08:00', 'cancelled', 'm'),
(103, 1, 10, '2023-10-25 21:47:55', '2023-10-26', '08:00', 'consulted', 'm');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `cid` int NOT NULL AUTO_INCREMENT,
  `cname` varchar(50) NOT NULL,
  PRIMARY KEY (`cid`),
  UNIQUE KEY `cname` (`cname`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `cname`) VALUES
(1, 'TV'),
(2, 'Smart Phone'),
(3, 'Washing machine'),
(4, 'Electronics'),
(5, 'Kitchen');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `image`) VALUES
(1, 'Pediatrics', 'a0c21760267d048062480c20e34081ae_d27ea18d95cdb29a8fef.png'),
(2, 'Gastroenterology', 'gastroenterology.png'),
(3, 'Anesthesiology', 'ce29dde7bcd3246ca501bd1be1228bf1_bf0a6b0afade6a383.png'),
(4, 'Cardiology', '778e691eeac47db6b921696e85e94015_26c6c19143682ff.png'),
(5, 'ENT', 'd4542fecc21fe92fd1d551173def7f68_813287e936ab36c.png'),
(6, 'Neurology', 'd3f9053da9c7ad2f04788a26201feaf0_ca751b0aabd9d1f9.png'),
(7, 'Orthopaedic', '3dff40802eda78d562ac9ed24f8b5c62_1c41a087d6690fe.png'),
(8, 'Psychiatry', '32da7779b5734e58f47fdbb4b2686f75_d5c1142835.png'),
(9, 'Gynaecology', '0ee86bf3e49ffabe8a5814d1b819d624_465b13d5981ebdd.png');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
CREATE TABLE IF NOT EXISTS `doctor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `gender` char(2) NOT NULL,
  `department` varchar(50) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `phone` char(10) NOT NULL,
  `age` int NOT NULL,
  `description` varchar(100) NOT NULL,
  `fee` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `gender`, `department`, `qualification`, `address`, `image`, `phone`, `age`, `description`, `fee`, `username`, `password`) VALUES
(1, 'Dr Jacob Thomas E', 'se', '1', 'MBBS,Diploma & PG Diploma: D.C.H., Diploma in Newborn care, PG Diploma in Child Health', 'Ernakulam Kerala', 'e541f62abc7068517bb62d928a89cd5a_432df691efbe.jpg', '1234567812', 56, 'Has 8 years of Experience post MD, with training in Paediatric Gastroenterology, Hepatology and Nutr', 300, 'jacob', '12345678'),
(5, 'demo dfgdgdhdhdh', 'se', '1', 'MBBS,PG: M.D. Pediatrics, Master of Surgery in Pediatrics.', 'TEST', 'doctors-1.jpg', '9400673512', 23, '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

DROP TABLE IF EXISTS `emp`;
CREATE TABLE IF NOT EXISTS `emp` (
  `empid` int NOT NULL AUTO_INCREMENT,
  `ename` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `eage` int NOT NULL,
  PRIMARY KEY (`empid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`empid`, `ename`, `eage`) VALUES
(1, 'ajith', 56);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `eid` int NOT NULL AUTO_INCREMENT,
  `ename` varchar(50) NOT NULL,
  `eage` int NOT NULL,
  `ephone` char(10) NOT NULL,
  `eimage` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`eid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`eid`, `ename`, `eage`, `ephone`, `eimage`) VALUES
(1, 'ABHIDEV V S', 19, '1234567814', '7dfee2970f4bf46d0e8165c42a4dc7b9_d22fbf3fa7dfc70954.jpeg'),
(2, 'Ajith', 20, '1234567815', 'ae308afbe57f7ec39f670e9f7bfc160b_3fcdd507de57bfe91f.jpg'),
(3, 'Thomson', 20, '1234567815', 'e1d50c0eb806407f5e18fe7e35ecdab1_0508e8d59274bc26.jpg'),
(4, 'Thomsonn', 19, '1234567815', '88136ef9b8b5e03e2ab3ab4e32e0c0c0_c9d9a82da08ae7dabfd.png');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `itemid` int NOT NULL AUTO_INCREMENT,
  `itemname` varchar(50) NOT NULL,
  `itemprice` decimal(10,2) NOT NULL,
  `cid` int NOT NULL,
  PRIMARY KEY (`itemid`),
  UNIQUE KEY `itemname` (`itemname`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemid`, `itemname`, `itemprice`, `cid`) VALUES
(1, 'Redmi Eight Pro', '18999.00', 2),
(3, 'Redmi Nine Pro', '19999.00', 2),
(4, 'Redmi Ten Pro', '22000.00', 2),
(6, 'Usb cable', '100.00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `booking_id` int NOT NULL,
  `amount` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `booking_id` (`booking_id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `booking_id`, `amount`) VALUES
(11, 69, 300),
(2, 63, 300),
(3, 64, 300),
(4, 65, 300),
(5, 67, 300),
(6, 68, 300),
(15, 78, 300),
(16, 79, 300),
(17, 81, 300),
(18, 82, 300),
(19, 83, 300),
(20, 84, 300),
(21, 85, 300),
(22, 86, 300),
(23, 87, 300),
(24, 88, 300),
(25, 89, 300),
(26, 90, 300),
(27, 92, 300),
(28, 93, 300),
(29, 96, 300),
(30, 97, 300),
(31, 98, 300),
(32, 99, 300),
(33, 100, 300),
(34, 101, 300),
(35, 102, 300),
(36, 103, 300);

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

DROP TABLE IF EXISTS `record`;
CREATE TABLE IF NOT EXISTS `record` (
  `rid` int NOT NULL AUTO_INCREMENT,
  `did` int NOT NULL,
  `pid` int NOT NULL,
  `m_h` varchar(500) NOT NULL,
  `m_a` varchar(200) NOT NULL,
  `r_mp` varchar(300) NOT NULL,
  `v_s` varchar(200) NOT NULL,
  `lab_results` varchar(200) NOT NULL,
  `bid` int NOT NULL,
  `summary` varchar(300) NOT NULL,
  `p_t` varchar(300) NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`rid`, `did`, `pid`, `m_h`, `m_a`, `r_mp`, `v_s`, `lab_results`, `bid`, `summary`, `p_t`) VALUES
(1, 1, 1, 'sd', 'sdd', 'sdd', 'sd', 'sd', 82, 'sd', 'sdsd'),
(2, 1, 1, 'sdsd', 'sdsd', 'sdsd', 'sd', 'sds', 83, 'sdsd', 'sdsd'),
(4, 1, 1, 'NA', 'fd', 'fdd', 'fdf', 'fdf', 84, 'fd', 'fdf'),
(5, 1, 1, 'g', 'gf', 'fg', 'fg', 'fg', 85, 'fg', 'fg'),
(6, 1, 1, 'gfgf', 'fgf', 'gfg', 'fg', 'fgf', 86, 'gf', 'fgfg'),
(10, 1, 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillu', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 103, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillu', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillu'),
(9, 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillu', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 99, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillu', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillu');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE IF NOT EXISTS `schedule` (
  `sid` int NOT NULL AUTO_INCREMENT,
  `m_start` char(5) NOT NULL,
  `m_end` char(5) NOT NULL,
  `e_start` char(5) NOT NULL,
  `e_end` char(5) NOT NULL,
  `doctor_id` int NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`sid`, `m_start`, `m_end`, `e_start`, `e_end`, `doctor_id`, `date`) VALUES
(2, '10:00', '11:00', '4:00', '6:00', 1, '2023-10-13'),
(3, '08:00', '12:00', '03:00', '07:00', 1, '2023-10-18'),
(4, '08:00', '12:00', '4:00', '07:00', 1, '2023-10-19'),
(5, '08:00', '11:00', '04:00', '07:00', 1, '2023-10-20'),
(11, '8:00', '9:30', '4:00', '5:30', 1, '2023-10-21'),
(12, '9:00', '12:00', '4:00', '7:00', 1, '2023-10-22'),
(13, '8:00', '10:00', '5:00', '8:00', 1, '2023-10-24'),
(14, '8:00', '11:00', '3:00', '6:00', 1, '2023-10-25'),
(15, '8:00', '11:00', '3:00', '6:00', 1, '2023-10-25'),
(16, '8:00', '10:30', '4:00', '7:00', 1, '2023-10-26'),
(17, '8:00', '11:00', '4:00', '7:00', 1, '2023-10-27');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `sid` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `age` int NOT NULL,
  `phone` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `name`, `age`, `phone`) VALUES
(1, 'Ajith', 56, '34343'),
(2, 'Abhidev', 19, '8289'),
(3, 'Ajith', 45, '1234567891');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `age` int NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` char(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `gender`, `age`, `email`, `phone`, `password`) VALUES
(1, 'Abhishek', 'M', 45, 'abhi@gmail.com', '1234567891', '12345678'),
(8, 'Ajith k s', 'M', 46, 'ajith12@gmail.com', '1234567891', '12345678'),
(9, 'Ajith k s', 'M', 34, 'ajith123456@gmail.com', '1234567891', '12345678'),
(10, 'Yaseen', 'F', 20, 'yasee@gmail.com', '2134567890', '12345678');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
