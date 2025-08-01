-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2024 at 10:29 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oes_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_acc`
--

CREATE TABLE `admin_acc` (
  `admin_id` int(11) NOT NULL,
  `admin_user` varchar(50) NOT NULL,
  `admin_pass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_acc`
--

INSERT INTO `admin_acc` (`admin_id`, `admin_user`, `admin_pass`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `batch_tbl`
--

CREATE TABLE `batch_tbl` (
  `batch_id` int(11) NOT NULL,
  `batch_number` text NOT NULL,
  `start_date` text NOT NULL,
  `class_day` text NOT NULL,
  `class_time` time NOT NULL,
  `class_link` text NOT NULL,
  `class_status` text NOT NULL,
  `notice_board` text NOT NULL,
  `batch_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `batch_tbl`
--

INSERT INTO `batch_tbl` (`batch_id`, `batch_number`, `start_date`, `class_day`, `class_time`, `class_link`, `class_status`, `notice_board`, `batch_created`) VALUES
(111, 'A1 BATCH 1', '', '', '00:00:00', '', '', '', '2024-11-24 13:46:00'),
(112, 'A1 BATCH 2', '', '', '00:00:00', '', '', '', '2024-11-24 13:46:11'),
(113, 'A1 BATCH 3', '', '', '00:00:00', '', '', '', '2024-11-24 13:46:21'),
(114, 'A1 BATCH 4', '', '', '00:00:00', '', '', '', '2024-11-24 13:46:36'),
(115, 'A1 BATCH 5', '', '', '00:00:00', '', '', '', '2024-11-24 13:46:47'),
(116, 'A1 BATCH 6', '', '', '00:00:00', '', '', '', '2024-11-24 13:46:59'),
(117, 'A1 BATCH 7', '', '', '00:00:00', '', '', '', '2024-11-24 13:47:12'),
(118, 'A1 BATCH 8', '', '', '00:00:00', '', '', '', '2024-11-24 13:47:24'),
(119, 'A1 BATCH 9', '', '', '00:00:00', '', '', '', '2024-11-24 13:47:33'),
(120, 'A1 BATCH 10', '', '', '00:00:00', '', '', '', '2024-11-24 13:47:41'),
(121, 'A2 BATCH 1', '', '', '00:00:00', '', '', '', '2024-11-24 13:47:58'),
(122, 'A2 BATCH 2', '', '', '00:00:00', '', '', '', '2024-11-24 13:48:09'),
(123, 'A2 BATCH 3', '', '', '00:00:00', '', '', '', '2024-11-24 13:48:22'),
(124, 'A2 BATCH 4', '', '', '00:00:00', '', '', '', '2024-11-24 13:48:43'),
(125, 'A2 BATCH 5', '', '', '00:00:00', '', '', '', '2024-11-24 13:48:53'),
(126, 'A2 BATCH 6', '', '', '00:00:00', '', '', '', '2024-11-24 13:49:02'),
(127, 'A2 BATCH 7', '', '', '00:00:00', '', '', '', '2024-11-24 13:49:12'),
(128, 'A2 BATCH 8', '', '', '00:00:00', '', '', '', '2024-11-24 13:49:22'),
(129, 'A2 BATCH 10', '', '', '00:00:00', '', '', '', '2024-11-24 13:49:31'),
(130, 'AB EXPRESS BATCH 1', '', '', '00:00:00', '', '', '', '2024-11-24 13:50:01'),
(131, 'AB EXPRESS BATCH 2', '', '', '00:00:00', '', '', '', '2024-11-24 13:50:12'),
(132, 'AB EXPRESS BATCH 3', '', '', '00:00:00', '', '', '', '2024-11-24 13:50:23'),
(133, 'AB EXPRESS BATCH 4', '', '', '00:00:00', '', '', '', '2024-11-24 13:50:33'),
(134, 'AB EXPRESS BATCH 5', '', '', '00:00:00', '', '', '', '2024-11-24 13:50:41'),
(135, 'AB EXPRESS BATCH 6', '', '', '00:00:00', '', '', '', '2024-11-24 13:50:50'),
(136, 'AB EXPRESS BATCH 7', '', '', '00:00:00', '', '', '', '2024-11-24 13:50:59'),
(137, 'AB EXPRESS BATCH 8', '', '', '00:00:00', '', '', '', '2024-11-24 13:51:07'),
(138, 'AB EXPRESS BATCH 9', '', '', '00:00:00', '', '', '', '2024-11-24 13:51:16'),
(139, 'AB EXPRESS BATCH 10', '', '', '00:00:00', '', '', '', '2024-11-24 13:51:24'),
(140, 'B1 BATCH 1', '20 December 2020', 'Sunday, Wednesday, Thursday, Friday', '01:29:00', 'https://www.youtube.com/watch?v=2PJTlKQ2PUE&list=PPSV&ab_channel=Sprachschule%7CLearngermanfast', 'Complete', '1) Product details of Notice Board 12/20, 18/24, 24/30, 24/36 With Frame:Yes Usage:School Magnetic:No Notice Board (Local)Used for setting paper with pin\r\n2) Product details of Notice Board 12/20, 18/24, 24/30, 24/36 With\r\n\r\n3)Frame:Yes Usage:School Magnetic:No Notice Board (Local)Used for setting paper with pin', '2024-11-28 19:24:30'),
(141, 'B1 BATCH 2', '', '', '00:00:00', '', '', '', '2024-11-24 13:57:33'),
(142, 'B1 BATCH 3', '', '', '00:00:00', '', '', '', '2024-11-24 13:57:44'),
(143, 'B1 BATCH 4', '', '', '00:00:00', '', '', '', '2024-11-24 13:57:57'),
(144, 'B1 BATCH 5', '', '', '00:00:00', '', '', '', '2024-11-24 13:58:10'),
(145, 'B1 BATCH 6', '', '', '00:00:00', '', '', '', '2024-11-24 13:58:18'),
(146, 'B1 BATCH 7', '', '', '00:00:00', '', '', '', '2024-11-24 13:58:29'),
(147, 'B1 BATCH 8', '', '', '00:00:00', '', '', '', '2024-11-24 13:58:37'),
(148, 'B1 BATCH 9', '', '', '00:00:00', '', '', '', '2024-11-24 13:58:45'),
(149, 'B1 BATCH 10', '10 June 20267', '', '00:00:00', '', '', '', '2024-11-26 07:23:12'),
(166, 'CECHE DLT UPDT', '13 todat 2323', '', '00:00:00', '', '', '', '2024-11-26 07:22:30'),
(167, 'NEW C1', '20 Jun 2029', 'Saturday,Monday,Wednesday,Friday', '12:40:00', 'https://chatgpt.com/c/6746cba4-53e4-800a-9c5b-07f9b2ebf236', 'Coming soon', '', '2024-11-27 08:01:01'),
(168, 'C2', '28 March 2030', 'Sunday,Tuesday,Thursday', '08:30:00', 'https://www.youtube.com/watch?v=AlW0XGBVvbw&list=PPSV&ab_channel=LearnGermanwithconfidence', 'Coming soon', '', '2024-11-27 08:10:44'),
(213, 'B2 NEW', '05 January 2025', 'Saturday,Monday,Wednesday,Friday', '07:50:00', 'https://www.youtube.com/watch?v=O3khyMoBV-g&list=PPSV&ab_channel=Sprachschule%7CLearngermanfast', 'On going', '', '2024-11-27 14:29:39'),
(214, 'NOTICE', '20 Nov 2020', 'Monday, Wednesday, Friday, Saturday', '12:30:00', 'https://www.youtube.com/watch?v=KuwvbRTAvEw&ab_channel=LearnGermanWithAntar', 'Coming soon', 'Product details of Notice Board 12/20, 18/24, 24/30, 24/36 With Frame:Yes Usage:School Magnetic:No Notice Board (Local)Used for setting paper with pin\r\nProduct details of Notice Board 12/20, 18/24, 24/30, 24/36 With Frame:Yes Usage:School Magnetic:No Notice Board (Local)Used for setting paper with pin', '2024-11-28 17:49:11');

-- --------------------------------------------------------

--
-- Table structure for table `class_record`
--

CREATE TABLE `class_record` (
  `record_id` int(11) NOT NULL,
  `batch_number` int(11) NOT NULL,
  `record_video` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `class_topics` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `class_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_record`
--

INSERT INTO `class_record` (`record_id`, `batch_number`, `record_video`, `class_topics`, `class_date`) VALUES
(9, 147, '6748e6ee823b52.61774773.MOV', 'new check record folder', '2024-11-29'),
(10, 140, '6748e711d2a290.66814594.MOV', 'video upload', '2024-11-29'),
(11, 140, '6748e75305bec8.80584181.mp4', 'sb', '2024-11-29'),
(12, 130, '67495858355ec2.02094506.mp4', 'record file path change and two file create and js code added', '2024-11-30'),
(13, 111, '67498c76491ac4.79384098.MOV', '2nd tme', '2024-11-30'),
(14, 140, '674996523af603.48775433.MOV', 'show record video', '2024-12-19'),
(15, 140, '6749b1a81f2172.73574250.mp4', 'boro video play test', '2024-11-30'),
(16, 140, '6749f2eb8a1cd5.32564065.mp4', 'after video design', '2024-11-28'),
(17, 140, '674a11522c68e2.08282449.mp4', '12 minute video 24 mb test upload', '2024-11-30'),
(18, 140, '674a3167a426a6.01629859.mp4', 'katze', '2024-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `exam_answers`
--

CREATE TABLE `exam_answers` (
  `exans_id` int(11) NOT NULL,
  `axmne_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `quest_id` int(11) NOT NULL,
  `exans_answer` text NOT NULL,
  `exans_status` text NOT NULL DEFAULT 'new',
  `exans_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `exam_answers`
--

INSERT INTO `exam_answers` (`exans_id`, `axmne_id`, `exam_id`, `quest_id`, `exans_answer`, `exans_status`, `exans_created`) VALUES
(295, 4, 12, 25, 'Diode, inverted, pointer', 'old', '2019-12-07 02:52:14'),
(296, 4, 12, 16, 'Data Block', 'old', '2019-12-07 02:52:14'),
(297, 6, 12, 18, 'Programmable Logic Controller', 'old', '2019-12-05 12:59:47'),
(298, 6, 12, 9, '1850s', 'old', '2019-12-05 12:59:47'),
(299, 6, 12, 24, '1976', 'old', '2019-12-05 12:59:47'),
(300, 6, 12, 14, 'Operating System', 'old', '2019-12-05 12:59:47'),
(301, 6, 12, 19, 'WAN (Wide Area Network)', 'old', '2019-12-05 12:59:47'),
(302, 6, 11, 28, 'fds', 'new', '2019-12-05 12:04:28'),
(303, 6, 11, 29, 'sd', 'new', '2019-12-05 12:04:28'),
(304, 6, 12, 15, 'David Filo & Jerry Yang', 'new', '2019-12-05 12:59:47'),
(305, 6, 12, 17, 'System file', 'new', '2019-12-05 12:59:47'),
(306, 6, 12, 10, 'Field', 'new', '2019-12-05 12:59:47'),
(307, 6, 12, 9, '1880s', 'new', '2019-12-05 12:59:47'),
(308, 6, 12, 21, 'Temporary file', 'new', '2019-12-05 12:59:47'),
(309, 4, 11, 28, 'q1', 'new', '2019-12-05 13:30:21'),
(310, 4, 11, 29, 'dfg', 'new', '2019-12-05 13:30:21'),
(311, 4, 12, 16, 'Data Block', 'new', '2019-12-07 02:52:14'),
(312, 4, 12, 20, 'Plancks radiation', 'new', '2019-12-07 02:52:14'),
(313, 4, 12, 10, 'Report', 'new', '2019-12-07 02:52:14'),
(314, 4, 12, 24, '1976', 'new', '2019-12-07 02:52:14'),
(315, 4, 12, 9, '1930s', 'new', '2019-12-07 02:52:14'),
(316, 8, 12, 18, 'Programmable Lift Computer', 'new', '2020-01-05 03:18:35'),
(317, 8, 12, 14, 'Operating System', 'new', '2020-01-05 03:18:35'),
(318, 8, 12, 20, 'Einstein oscillation', 'new', '2020-01-05 03:18:35'),
(319, 8, 12, 21, 'Temporary file', 'new', '2020-01-05 03:18:35'),
(320, 8, 12, 25, 'Diode, inverted, pointer', 'new', '2020-01-05 03:18:35'),
(321, 9, 24, 31, '2', 'new', '2020-01-12 04:47:37'),
(322, 9, 24, 35, '8', 'new', '2020-01-12 04:47:37'),
(323, 9, 24, 33, '9', 'new', '2020-01-12 04:47:37'),
(324, 9, 24, 34, '8', 'new', '2020-01-12 04:47:37'),
(325, 9, 24, 32, '1', 'new', '2020-01-12 04:47:37'),
(326, 9, 25, 36, '4', 'new', '2020-01-12 05:10:11'),
(327, 9, 26, 37, '4', 'new', '2020-01-12 05:13:34'),
(328, 10, 26, 37, '4', 'new', '2023-11-07 13:42:35'),
(329, 10, 26, 38, '12', 'new', '2023-11-07 13:42:35'),
(330, 11, 26, 39, 'drink', 'new', '2024-11-02 13:03:17'),
(331, 11, 26, 40, 'she', 'new', '2024-11-02 13:03:17'),
(332, 11, 26, 37, '4', 'new', '2024-11-02 13:03:17'),
(333, 11, 26, 38, '12', 'new', '2024-11-02 13:03:17'),
(334, 11, 26, 41, 'test', 'new', '2024-11-02 13:03:17'),
(335, 11, 28, 42, 'ich heisse noyon', 'new', '2024-11-02 13:23:46'),
(336, 18, 29, 43, 'Ja, mir geht es auch gut', 'new', '2024-11-24 16:12:12'),
(337, 18, 28, 42, 'ich heisse noyon', 'new', '2024-11-24 18:07:23'),
(338, 19, 29, 44, 'which', 'new', '2024-11-24 19:20:24'),
(339, 19, 29, 43, 'Ja, Danke, mir geht es auch gut', 'new', '2024-11-24 19:20:24'),
(340, 19, 28, 42, 'ich heisse noyon', 'new', '2024-11-24 19:59:24'),
(341, 19, 27, 50, 'aaaa', 'new', '2024-11-25 19:43:49');

-- --------------------------------------------------------

--
-- Table structure for table `exam_attempt`
--

CREATE TABLE `exam_attempt` (
  `examat_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `examat_status` text NOT NULL DEFAULT 'used'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `exam_attempt`
--

INSERT INTO `exam_attempt` (`examat_id`, `student_id`, `exam_id`, `examat_status`) VALUES
(51, 6, 12, 'used'),
(52, 4, 11, 'used'),
(53, 4, 12, 'used'),
(54, 8, 12, 'used'),
(55, 9, 24, 'used'),
(56, 9, 25, 'used'),
(57, 9, 26, 'used'),
(58, 10, 26, 'used'),
(59, 11, 26, 'used'),
(60, 11, 28, 'used'),
(61, 18, 29, 'used'),
(62, 18, 28, 'used'),
(63, 19, 29, 'used'),
(64, 19, 28, 'used'),
(65, 19, 27, 'used');

-- --------------------------------------------------------

--
-- Table structure for table `exam_question_tbl`
--

CREATE TABLE `exam_question_tbl` (
  `eqt_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `exam_question` text NOT NULL,
  `exam_ch1` text NOT NULL,
  `exam_ch2` text NOT NULL,
  `exam_ch3` text NOT NULL,
  `exam_ch4` text NOT NULL,
  `exam_answer` text NOT NULL,
  `exam_status` text NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `exam_question_tbl`
--

INSERT INTO `exam_question_tbl` (`eqt_id`, `exam_id`, `exam_question`, `exam_ch1`, `exam_ch2`, `exam_ch3`, `exam_ch4`, `exam_answer`, `exam_status`) VALUES
(9, 12, 'In which decade was the American Institute of Electrical Engineers (AIEE) founded?', '1850s', '1880s', '1930s', '1950s', '1880s', 'active'),
(10, 12, 'What is part of a database that holds only one type of information?', 'Report', 'Field', 'Record', 'File', 'Field', 'active'),
(14, 12, 'OS computer abbreviation usually means ?', 'Order of Significance', 'Open Software', 'Operating System', 'Optical Sensor', 'Operating System', 'active'),
(15, 12, 'Who developed Yahoo?', 'Dennis Ritchie & Ken Thompson', 'David Filo & Jerry Yang', 'Vint Cerf & Robert Kahn', 'Steve Case & Jeff Bezos', 'David Filo & Jerry Yang', 'active'),
(16, 12, 'DB computer abbreviation usually means ?', 'Database', 'Double Byte', 'Data Block', 'Driver Boot', 'Database', 'active'),
(17, 12, '.INI extension refers usually to what kind of file?', 'Image file', 'System file', 'Hypertext related file', 'Image Color Matching Profile file', 'System file', 'active'),
(18, 12, 'What does the term PLC stand for?', 'Programmable Lift Computer', 'Program List Control', 'Programmable Logic Controller', 'Piezo Lamp Connector', 'Programmable Logic Controller', 'active'),
(19, 12, 'What do we call a network whose elements may be separated by some distance? It usually involves two or more small networks and dedicated high-speed telephone lines.', 'URL (Universal Resource Locator)', 'LAN (Local Area Network)', 'WAN (Wide Area Network)', 'World Wide Web', 'WAN (Wide Area Network)', 'active'),
(20, 12, 'After the first photons of light are produced, which process is responsible for amplification of the light?', 'Blackbody radiation', 'Stimulated emission', 'Plancks radiation', 'Einstein oscillation', 'Stimulated emission', 'active'),
(21, 12, '.TMP extension refers usually to what kind of file?', 'Compressed Archive file', 'Image file', 'Temporary file', 'Audio file', 'Temporary file', 'active'),
(22, 12, 'What do we call a collection of two or more computers that are located within a limited distance of each other and that are connected to each other directly or indirectly?', 'Inernet', 'Interanet', 'Local Area Network', 'Wide Area Network', 'Local Area Network', 'active'),
(24, 12, '	 In what year was the \"@\" chosen for its use in e-mail addresses?', '1976', '1972', '1980', '1984', '1972', 'active'),
(25, 12, 'What are three types of lasers?', 'Gas, metal vapor, rock', 'Pointer, diode, CD', 'Diode, inverted, pointer', 'Gas, solid state, diode', 'Gas, solid state, diode', 'active'),
(27, 15, 'asdasd', 'dsf', 'sd', 'yui', 'sdf', 'yui', 'active'),
(28, 11, 'Question 1', 'q1', 'asd', 'fds', 'ytu', 'q1', 'active'),
(29, 11, 'Question 2', 'asd', 'sd', 'q2', 'dfg', 'q2', 'active'),
(30, 11, 'Question 3', 'sd', 'q3', 'asd', 'fgh', 'q3', 'active'),
(37, 26, '2+2=?', '3', '6', '7', '4', 'D', 'active'),
(38, 26, '6+ 6', '12', '2', '3', '6', '12', 'active'),
(39, 26, 'wasser mane ki?', 'pani', 'water', 'drink', 'juch', 'drinkm', 'active'),
(40, 26, 'ich mane ki?', 'i', 'you', 'he', 'she', 'i', 'active'),
(41, 26, 'he mane ki?', 'tumi', 'ami', 'janina', 'test', 'janina', 'active'),
(42, 28, 'amr nam noyon', 'ich biin nafiz', 'wer bist du', 'wie geht', 'ich heisse noyon', 'ich heisse noyon', 'active'),
(43, 29, 'Es geht mir sehr gut', 'Hoffentlich Ihnen auch', 'Ja, mir geht es auch gut', 'Ja, Danke, mir geht es auch gut', 'Nein, mir geht es nicht gut', 'Ja, mir geht es auch gut', 'active'),
(44, 29, 'wer mean', 'how', 'what', 'who', 'which', 'who', 'active'),
(45, 31, 'name ki?', 'aaa', 'vvv', 'ggg', 'ttt', 'vff', 'active'),
(49, 33, 'extra', 'eee', 'xxx', 'ttt', 'rrr', 'rrr', 'active'),
(50, 27, 'TEST', 'aaa', 'aa', 'aaaa', 'aaaaa', 'aaa', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `exam_tbl`
--

CREATE TABLE `exam_tbl` (
  `ex_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `ex_title` text NOT NULL,
  `ex_time_limit` text NOT NULL,
  `ex_questlimit_display` int(11) NOT NULL,
  `ex_description` text NOT NULL,
  `ex_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `exam_tbl`
--

INSERT INTO `exam_tbl` (`ex_id`, `batch_id`, `ex_title`, `ex_time_limit`, `ex_questlimit_display`, `ex_description`, `ex_created`) VALUES
(27, 140, 'A1 Exam test', '40', 1, 'mcq\r\n5ta qs\r\n40minut thakte\r\none time', '2024-11-25 21:31:16'),
(28, 140, 'German B1', '10', 8, '1) ob portarpor xm dio3ta discriptions\r\n2) ob portarpor xm\r\n3)  dio3ta discriptions\r\n4) ob portarpor xm dio3ta\r\n1) ob portarpor xm dio3ta discriptions\r\n2) ob portarpor xm\r\n3)  dio3ta discriptions\r\n4) ob portarpor xm dio3ta\r\n1) ob portarpor xm dio3ta discriptions\r\n2) ob portarpor xm\r\n3)  dio3ta discriptions\r\n4) ob portarpor xm dio3ta', '2024-11-24 20:03:03');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks_tbl`
--

CREATE TABLE `feedbacks_tbl` (
  `fb_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `fb_exmne_as` text NOT NULL,
  `fb_feedbacks` text NOT NULL,
  `fb_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `feedbacks_tbl`
--

INSERT INTO `feedbacks_tbl` (`fb_id`, `student_id`, `fb_exmne_as`, `fb_feedbacks`, `fb_date`) VALUES
(4, 6, 'Glenn Duerme', 'Gwapa kay Miss Pam', 'December 05, 2019'),
(5, 6, 'Anonymous', 'Lageh, idol na nako!', 'December 05, 2019'),
(6, 4, 'Rogz Nunezsss', 'Yes', 'December 08, 2019'),
(7, 4, '', '', 'December 08, 2019'),
(8, 4, '', '', 'December 08, 2019'),
(9, 8, 'Anonymous', 'dfsdf', 'January 05, 2020'),
(10, 9, 'warren dalaoyan', 'haah', 'January 12, 2020'),
(11, 10, 'Sam', 'Nice quest', 'November 07, 2023'),
(12, 10, 'Anonymous', 'noyon test', 'November 02, 2024'),
(13, 11, 'nafiz', 'feedback thik kora hoylo, data store test', 'November 12, 2024'),
(14, 11, '', '', 'November 12, 2024'),
(15, 11, '', '', 'November 12, 2024'),
(16, 19, 'Anonymous', 'exmne_id to student_id', 'November 26, 2024'),
(17, 19, 'Nafizul Islam', 'name student_id', 'November 26, 2024');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `rating` int(11) NOT NULL CHECK (`rating` between 1 and 5),
  `service_name` text NOT NULL,
  `review_text` text NOT NULL,
  `created_at` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT current_timestamp(),
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `rating`, `service_name`, `review_text`, `created_at`, `student_id`) VALUES
(24, 4, '', '*) The cheaper price displayed applies if you have already participated in a German language course at the Goethe Institute in the past six months. The six months refer to the period between when the language course ended and the date of the German language exam. In this case, the price will change automatically during the booking procedure. If not, please contact the course office.', '22 November 2024, 02:23 PM', 11),
(25, 2, 'Rating Breakdown', 'Rating Breakdown', '22 November 2024, 03:23 PM', 11),
(26, 4, 'period between when the language course', '*) The cheaper price displayed applies if you have already participated in a German language course at the Goethe Institute in the past six months. The six months refer to the period between when the language course ended and the date of the German language exam. In this case, the price will change automatically during the booking procedure. If not, please contact the course office.', '22 November 2024, 03:46 PM', 10),
(27, 5, 'The cheaper price displayed applies', 'The cheaper price displayed applies if you have already participated in a German language course at the Goethe Institute in the past six months. The six months refer to the period between when the language course', '22 November 2024, 06:08 PM', 8),
(28, 3, 'SQL কোয়েরি ডায়নামিকভাবে সেট করা হয়েছে।', 'আপনার পূর্ণ কোডে New (DESC) এবং Old (ASC) কাজ করবে এমনভাবে সংশোধিত কোড নিচে দেওয়া হলো। মূলত, order এর মান ড্রপডাউন থেকে নিয়ে SQL কোয়েরি ডায়নামিকভাবে সেট করা হয়েছে।\r\n\r\nআপনার পূর্ণ কোডে New (DESC) এবং Old (ASC) কাজ করবে এমনভাবে সংশোধিত কোড নিচে দেওয়া হলো। মূলত, order এর মান ড্রপডাউন থেকে নিয়ে SQL কোয়েরি ডায়নামিকভাবে সেট করা হয়েছে।', '22 November 2024, 06:24 PM', 10),
(29, 5, 'A1', 'test 5 star', '26 November 2024, 08:44 PM', 20);

-- --------------------------------------------------------

--
-- Table structure for table `students_tbl`
--

CREATE TABLE `students_tbl` (
  `student_id` int(11) NOT NULL,
  `student_fullname` text NOT NULL,
  `student_batch_id` varchar(50) NOT NULL,
  `student_gender` text NOT NULL,
  `student_birthdate` varchar(100) NOT NULL,
  `course_name` text NOT NULL,
  `student_email` text NOT NULL,
  `student_phone_number` varchar(20) NOT NULL,
  `student_password` text NOT NULL,
  `student_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `students_tbl`
--

INSERT INTO `students_tbl` (`student_id`, `student_fullname`, `student_batch_id`, `student_gender`, `student_birthdate`, `course_name`, `student_email`, `student_phone_number`, `student_password`, `student_status`) VALUES
(17, 'MM', '144', 'Female', '1846-06-06', 'B1', 'MM@gmail.com', '099999990', 'MM', 'Deativated'),
(18, 'Nafizul A', '113', 'Female', '1624-12-31', 'A1', 'mm@gmail.com', '01737226404', 'mm', 'Active'),
(19, 'Nafizul Islam', '140', 'Male', '1694-03-04', 'B1', 'Naf@gmail.com', '2345677643', 'Naf', 'Active'),
(20, 'Test', '127', 'Female', '1590-05-06', 'A2', 'test@mail.com', '098765', 'test', 'Active'),
(21, 'deactive', '112', 'Male', '5678-03-04', 'AB Express', 'nafizulislam.swe@gmail.com', '01737226404', 'mmm', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_acc`
--
ALTER TABLE `admin_acc`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `batch_tbl`
--
ALTER TABLE `batch_tbl`
  ADD PRIMARY KEY (`batch_id`);

--
-- Indexes for table `class_record`
--
ALTER TABLE `class_record`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `exam_answers`
--
ALTER TABLE `exam_answers`
  ADD PRIMARY KEY (`exans_id`);

--
-- Indexes for table `exam_attempt`
--
ALTER TABLE `exam_attempt`
  ADD PRIMARY KEY (`examat_id`);

--
-- Indexes for table `exam_question_tbl`
--
ALTER TABLE `exam_question_tbl`
  ADD PRIMARY KEY (`eqt_id`);

--
-- Indexes for table `exam_tbl`
--
ALTER TABLE `exam_tbl`
  ADD PRIMARY KEY (`ex_id`);

--
-- Indexes for table `feedbacks_tbl`
--
ALTER TABLE `feedbacks_tbl`
  ADD PRIMARY KEY (`fb_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_tbl`
--
ALTER TABLE `students_tbl`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_acc`
--
ALTER TABLE `admin_acc`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `batch_tbl`
--
ALTER TABLE `batch_tbl`
  MODIFY `batch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT for table `class_record`
--
ALTER TABLE `class_record`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `exam_answers`
--
ALTER TABLE `exam_answers`
  MODIFY `exans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=342;

--
-- AUTO_INCREMENT for table `exam_attempt`
--
ALTER TABLE `exam_attempt`
  MODIFY `examat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `exam_question_tbl`
--
ALTER TABLE `exam_question_tbl`
  MODIFY `eqt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `exam_tbl`
--
ALTER TABLE `exam_tbl`
  MODIFY `ex_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `feedbacks_tbl`
--
ALTER TABLE `feedbacks_tbl`
  MODIFY `fb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `students_tbl`
--
ALTER TABLE `students_tbl`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
