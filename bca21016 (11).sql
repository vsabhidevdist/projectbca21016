-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 06, 2024 at 02:04 PM
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
) ENGINE=MyISAM AUTO_INCREMENT=118 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(103, 1, 10, '2023-10-25 21:47:55', '2023-10-26', '08:00', 'consulted', 'm'),
(104, 1, 1, '2023-11-02 13:55:07', '2023-11-02', '08:00', 'confirm', 'm'),
(105, 1, 1, '2023-11-02 14:43:29', '2023-11-02', '08:15', 'cancelled', 'm'),
(106, 1, 1, '2023-11-04 01:20:39', '2023-11-04', '08:00', 'consulted', 'm'),
(107, 1, 22, '2023-11-05 20:48:19', '2023-11-05', '09:00', 'consulted', 'm'),
(108, 1, 22, '2023-11-05 20:48:51', '2023-11-05', '09:00', 'consulted', 'm'),
(109, 1, 1, '2023-11-07 18:16:01', '2023-11-07', '07:00', 'consulted', 'm'),
(110, 1, 1, '2023-11-07 18:18:10', '2023-11-07', '07:00', 'consulted', 'm'),
(111, 1, 1, '2023-11-07 18:21:02', '2023-11-07', '07:00', 'cancelled', 'm'),
(112, 6, 22, '2023-11-07 18:23:45', '2023-11-07', '08:00', 'consulted', 'm'),
(113, 1, 1, '2023-12-03 19:30:38', '2023-12-03', '07:00', 'consulted', 'm'),
(114, 1, 22, '2023-12-03 19:34:57', '2023-12-03', '07:00', 'consulted', 'm'),
(115, 1, 1, '2023-12-17 19:58:17', '2023-12-17', '06:15', 'consulted', 'm'),
(116, 1, 1, '2023-12-17 20:01:40', '2023-12-17', '06:15', 'consulted', 'm'),
(117, 1, 1, '2023-12-17 20:40:02', '2023-12-17', '06:15', 'cancelled', 'm');

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
  `dob` date NOT NULL,
  `description` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fee` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `gender`, `department`, `qualification`, `address`, `image`, `phone`, `dob`, `description`, `fee`, `username`, `password`) VALUES
(1, 'Dr Jacob Thomas E', 'se', '1', 'MBBS,Diploma & PG Diploma: D.C.H., Diploma in Newborn care, PG Diploma in Child Health', 'Ernakulam Kerala', 'e541f62abc7068517bb62d928a89cd5a_432df691efbe.jpg', '1234567812', '1984-11-08', 'Has 8 years of Experience post MD, with training in Paediatric Gastroenterology, Hepatology and Nutr', 300, 'jacob', '12345678'),
(5, 'demo dfgdgdhdhdh', 'se', '1', 'MBBS,PG: M.D. Pediatrics, Master of Surgery in Pediatrics.', 'TEST', 'doctors-1.jpg', '9400673512', '1993-11-24', '', 0, '', ''),
(6, 'Dr Deepak Choudhary', 'M', '6', 'DM, Neurology', 'ekm', '83ab9bc7795b67e5d94ca45c915bf476_637376c1e8bd8b68027.jpg', '1234567890', '1999-10-10', ' Dr. Deepak Choudhary is a highly respected neurologist known for his clinical expertise and researc', 301, 'deepak', '12345678'),
(7, 'Dr Priya Patel', 'F', '1', 'MD Pediatric Medicine', 'Ekm', 'ed28cd69cebf12a350f74cd9ee6aea4c_42d06ae30a704213f76.jpg', '1234567890', '1996-10-10', 'Dr. Priya Patel is a dedicated pediatrician with more than 15 years of experience in caring for the ', 300, '', ''),
(8, 'Dr Rajesh Verma', 'M', '2', 'MD Gastroenterology', 'ekm', 'cd232ac222a0a7a59eee68c018236229_c0e57f32a3f32e21825.jpg', '1234567890', '1965-10-10', 'Dr. Rajesh Verma is a highly skilled gastroenterologist with over 20 years of experience in diagnosi', 500, '', ''),
(9, 'Dr Ananya Singh', 'F', '3', 'MD Anesthesiology', 'ekm', 'adb358bf102db23d8a956a2c7dd0018c_a61d62ec8e9d0a32.jpg', '1234567890', '1895-12-09', 'Dr. Ananya Singh is a board-certified anesthesiologist known for her precision and expertise in admi', 500, '', ''),
(10, 'Dr Aditya Sharma', 'M', '4', 'MD Cardiology', 'ekm', '936dad63b96b70df17064fe0055893ed_e804cd6dedf1bb8b93e.jpg', '1234567890', '1990-09-15', ' Dr. Aditya Sharma is a renowned cardiologist with more than 25 years of experience in the diagnosis', 200, '', ''),
(11, 'Dr Nandini Iye', 'F', '5', 'MS Otorhinolaryngology (ENT)', 'ekm', '75153e8ba73a3707f25d09bf08a8f37b_5bd729544bff39661a.jpg', '1234567890', '1980-10-10', 'Dr. Nandini Iyer is a skilled ENT specialist with extensive experience in treating ear, nose, and th', 200, '', ''),
(12, 'Dr Arjun Khanna', 'M', '6', 'MD Neurology', 'ekm', 'fd2db27a77b5d5c2cfdb83a017425713_b41407aa20c57c958357.jpg', '1234567890', '1970-05-04', ' Dr. Arjun Khanna is a dedicated neurologist with a strong commitment to diagnosing and treating neu', 200, '', ''),
(13, 'Dr Aparna Gupta', 'F', '7', 'MS Orthopedics', 'ekm', '4b233cdb0a14ebf0170a7bf28ca55c8d_af80417d079f36f559d2.jpg', '1234567890', '1985-01-05', 'Dr. Aparna Gupta is an experienced orthopedic surgeon specializing in musculoskeletal health. With 1', 200, '', ''),
(14, 'Dr Sanjay Joshi', 'M', '8', 'MD, Psychiatry', 'ekm', '990d191bca22ae057e62d0816aa6c414_1b4bdc3304ad.jpg', '1234567890', '1989-10-10', 'Dr. Sanjay Joshi is a compassionate psychiatrist with over 20 years of experience in helping patient', 200, '', '');

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
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(36, 103, 300),
(37, 104, 300),
(38, 105, 300),
(39, 106, 300),
(40, 107, 300),
(41, 108, 300),
(42, 109, 300),
(43, 110, 300),
(44, 112, 301),
(45, 113, 300),
(46, 114, 300),
(47, 115, 300),
(48, 116, 300),
(49, 117, 300);

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
  `nextc` date DEFAULT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`rid`, `did`, `pid`, `m_h`, `m_a`, `r_mp`, `v_s`, `lab_results`, `bid`, `summary`, `p_t`, `nextc`) VALUES
(1, 1, 1, 'sd', 'sdd', 'sdd', 'sd', 'sd', 82, 'sd', 'sdsd', NULL),
(2, 1, 1, 'sdsd', 'sdsd', 'sdsd', 'sd', 'sds', 83, 'sdsd', 'sdsd', NULL),
(4, 1, 1, 'NA', 'fd', 'fdd', 'fdf', 'fdf', 84, 'fd', 'fdf', NULL),
(5, 1, 1, 'g', 'gf', 'fg', 'fg', 'fg', 85, 'fg', 'fg', NULL),
(6, 1, 1, 'gfgf', 'fgf', 'gfg', 'fg', 'fgf', 86, 'gf', 'fgfg', NULL),
(10, 1, 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillu', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 103, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillu', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillu', NULL),
(9, 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillu', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 99, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillu', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillu', NULL),
(11, 1, 1, 'gdgdg', 'gdg', 'fgfg', 'gfg', 'gfg', 106, 'gfg', 'dgdg', NULL),
(12, 1, 22, 'fhfg', 'gfg', 'gfg', 'gfg', 'gfg', 107, 'gfgf', 'gfg', '2023-11-15'),
(13, 1, 22, 'dfd', 'dfdfd', 'fd', 'fdf', 'dfd', 108, 'dfd', 'fdf', '2023-11-07'),
(14, 1, 1, 'test mail', 'test mail', 'test mail', 'test mail', 'test mail', 109, 'test mail', 'test mail', '2023-11-30'),
(15, 1, 1, 'test email', 'test email', 'test email', 'test email', 'test email', 110, 'test email', 'test email', '2023-11-29'),
(16, 6, 22, 'test email', 'test email', 'test email', 'test email', 'test email', 112, 'test email', 'test email', '2023-11-28'),
(17, 1, 1, 'sdd', 'sdsd', 'ccvc', 'vcv', 'cvcv', 113, 'cvcv', 'dd', '2023-12-04'),
(18, 1, 22, 'ggfg', 'fg', 'fgfg', 'fgfg', 'fg', 114, 'gfg', 'gfg', '2023-12-05'),
(19, 1, 1, 'sdf', 'df', 'fdf', 'dfdf', 'df', 115, '\r\nAcetaminophen (Paracetamol)\r\n\r\nDosage: 500 mg\r\nInstructions: Take 1 tablet every 4-6 hours as needed for fever. Do not exceed 4000 mg in 24 hours.\r\nFluids:\r\n\r\nIncrease fluid intake, including water, clear broths, and electrolyte-containing beverages.\r\nRest:\r\n', 'df', '2023-12-20'),
(20, 1, 1, 'sdsd', 'df', 'fd', 'dfd', 'fd', 116, 'fdfd', '\nAcetaminophen (Paracetamol)\n\nDosage: 500 mg\nInstructions: Take 1 tablet every 4-6 hours', '2023-12-20');

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
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(17, '8:00', '11:00', '4:00', '7:00', 1, '2023-10-27'),
(18, '6:00', '8:00', '3:00', '6:00', 1, '2023-11-01'),
(19, '8:00', '12:00', '3:00', '6:00', 1, '2023-11-02'),
(20, '8:00', '9:00', '3:00', '4:00', 1, '2023-11-03'),
(21, '8:00', '10:00', '4:00', '7:00', 1, '2023-11-04'),
(22, '9:00', '10:30', '3:00', '6:00', 1, '2023-11-05'),
(23, '6:00', '9:00', '3:00', '6:00', 1, '2023-11-06'),
(24, '6:00', '8:00', '4:30', '5:30', 1, '2023-11-08'),
(25, '7:00', '9:00', '4:30', '5:30', 1, '2023-11-07'),
(26, '8:00', '9:30', '5:30', '6:30', 6, '2023-11-07'),
(27, '7:00', '9:00', '3:00', '7:00', 1, '2023-12-03'),
(28, '6:15', '8:00', '5:00', '5:30', 1, '2023-12-17');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` char(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `gender`, `dob`, `email`, `phone`, `password`) VALUES
(1, 'Abhishek', 'M', '2013-11-06', 'abhi@gmail.com', '1234567891', '12345678'),
(8, 'Ajith k s', 'M', '2004-11-10', 'ajith12@gmail.com', '1234567891', '12345678'),
(9, 'Ajith k s', 'M', '2005-11-16', 'ajith123456@gmail.com', '1234567891', '12345678'),
(10, 'Yaseen', 'F', '1996-11-06', 'yasee@gmail.com', '2134567890', '12345678'),
(16, 'Jewel', 'M', '2003-11-12', 'kjjewelkj@gmail.com', '1234567890', '97661'),
(18, 'Aswin', 'M', '2015-11-11', 'aswinrajeev@depaul.edu.in', '1234567890', '17486'),
(22, 'ABHIDEV V S', 'M', '2000-07-12', 'vsabhidev12@gmail.com', '1234567890', '12345678');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
