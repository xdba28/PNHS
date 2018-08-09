-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2018 at 06:48 AM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `class_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cms_account`
--

CREATE TABLE `cms_account` (
  `cms_account_ID` int(10) UNSIGNED NOT NULL,
  `cms_username` varchar(20) NOT NULL,
  `cms_password` varchar(65) NOT NULL,
  `cms_cpasswd` enum('0','1') NOT NULL DEFAULT '0',
  `emp_no` int(10) UNSIGNED DEFAULT NULL,
  `lrn` int(20) UNSIGNED DEFAULT NULL,
  `cms_current_log_date` date NOT NULL,
  `cms_current_log_time` time NOT NULL,
  `cms_prev_log_date` date NOT NULL,
  `cms_prev_log_time` time NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_account`
--

INSERT INTO `cms_account` (`cms_account_ID`, `cms_username`, `cms_password`, `cms_cpasswd`, `emp_no`, `lrn`, `cms_current_log_date`, `cms_current_log_time`, `cms_prev_log_date`, `cms_prev_log_time`, `status`) VALUES
(1, 'jeremy', 'jeremy123', '0', 5143417, NULL, '2018-03-20', '05:00:18', '2018-03-20', '04:59:28', '1'),
(2, 'vincent', 'vincent123', '0', 4567891, NULL, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(3, 'joseph', 'joseph123', '0', 4743128, NULL, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(4, 'michael', 'michael123', '0', 4901154, NULL, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(5, 'savannah', 'savannah123', '0', 4912093, NULL, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(6, 'radleigh', 'radleigh123', '0', 4990054, NULL, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(7, 'lloyd', 'lloyd123', '0', 50011249, NULL, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(9, 'shirley', 'shirley123', '0', 5000129, NULL, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(10, 'superadmin', 'bEtpZGZSUWE3bjRNRUMvbjN5bnBKUT09', '0', 5143417, NULL, '2018-03-20', '14:13:59', '2018-03-20', '07:29:20', '1'),
(13, 'charisse', 'charisse', '0', 5432123, NULL, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(14, 'dave', 'dave123', '0', 5412398, NULL, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(15, 'dylan', 'dylan123', '0', 5110945, NULL, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(16, 'francis', 'francis123', '0', 5501298, NULL, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(17, 'hannah', 'hannah123', '0', 5002157, NULL, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(18, 'joann', 'joann123', '0', 5231607, NULL, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(19, 'juan', 'juna123', '0', 5756153, NULL, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(20, 'julia', 'julia123', '0', 5201107, NULL, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(21, 'lea', 'lea123', '0', 5166431, NULL, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(22, 'lilia', 'lilia123', '0', 5677342, NULL, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(23, 'leo', 'lero123', '0', 5309127, NULL, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(24, 'mark', 'mark123', '0', 5902312, NULL, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(25, 'salome', 'salome123', '0', 50011250, NULL, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(29, 'vanessa', 'vanessa123', '0', 50011254, NULL, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(30, 'ricardo', 'ricardo123', '0', 50011252, NULL, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(76, 'alden', 'ARichards_pnhs', '0', NULL, 201732, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(77, 'alvin', 'ABagasbas_pnhs', '0', NULL, 20172, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(78, 'anna', 'AOctavo_pnhs', '0', NULL, 201712, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(79, 'anne', 'ACurtis_pnhs', '0', NULL, 201729, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(80, 'brent', 'BBarrameda_pnhs', '0', NULL, 333336, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(81, 'clint', 'CBaliat_pnhs', '0', NULL, 2202, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(82, 'bruno', 'a1Jzd3lHWWNiSTQ3cVd1S3E0eDRHZz09', '0', NULL, 20177, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(83, 'cristal', 'CJose_pnhs', '0', NULL, 20179, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(84, 'cassandra', 'CMoico_pnhs', '0', NULL, 201718, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(85, 'charles', 'CLiteral_pnhs', '0', NULL, 201720, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(86, 'daniel', 'DFord_pnhs', '0', NULL, 333338, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(87, 'denver', 'DArancillo_pnhs', '0', NULL, 101010, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(89, 'christine', 'CPonteres_pnhs', '0', NULL, 20176, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(90, 'enrique', 'EGil_pnhs', '0', NULL, 201734, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(91, 'cj', 'CCauilan_pnhs', '0', NULL, 201721, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(92, 'glen', 'GTallada_pnhs', '0', NULL, 333334, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(93, 'jake', 'JBallesteros_pnhs', '0', NULL, 20174, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(94, 'jane', 'JMonilla_pnhs', '0', NULL, 20173, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(95, 'jasper', 'JLlanera_pnhs', '0', NULL, 201722, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(96, 'jazmin', 'JSofranes_pnhs', '0', NULL, 201713, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(97, 'kathryn', 'KBernardo_pnhs', '0', NULL, 20178, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(98, 'jericho', 'JAldemo_pnhs', '0', NULL, 1103, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(99, 'kent', 'KVelasco_pnhs', '0', NULL, 201719, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(100, 'jess', 'JMon_pnhs', '0', NULL, 11102, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(101, 'kim', 'KMendiola_pnhs', '0', NULL, 333337, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(102, 'jester', 'JEbrada_pnhs', '0', NULL, 2203, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(103, 'liza', 'LSoberano_pnhs', '0', NULL, 201733, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(104, 'jona', 'JOgama_pnhs', '0', NULL, 20171, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(105, 'maine', 'MMendoza_pnhs', '0', NULL, 201731, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(106, 'josie', 'JOlayta_pnhs', '0', NULL, 201714, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(107, 'joy', 'JCandidato_pnhs', '0', NULL, 201717, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(108, 'margie', 'MMuico_pnhs', '0', NULL, 201710, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(109, 'marian', 'MRivera_pnhs', '0', NULL, 201728, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(110, 'jucel', 'JArevalo_pnhs', '0', NULL, 201715, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(111, 'julie', 'JSan Jose_pnhs', '0', NULL, 201726, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(112, 'matteo', 'MDomingo_pnhs', '0', NULL, 201724, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(113, 'karl', 'KArancillo_pnhs', '0', NULL, 9999, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(114, 'mildred', 'MMondero_pnhs', '0', NULL, 201711, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(115, 'nicole', 'NGapayao_pnhs', '0', NULL, 11101, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(116, 'nico', 'NAtivo_pnhs', '0', NULL, 333333, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(117, 'noel', 'NLayante_pnhs', '0', NULL, 201723, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(118, 'vhong', 'VNavarro_pnhs', '0', NULL, 201730, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(119, 'paolo', 'PLustria_pnhs', '0', NULL, 1102, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(120, 'val', 'VLim_pnhs', '0', NULL, 333335, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(121, 'toni', 'TGonzaga_pnhs', '0', NULL, 201727, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(122, 'roberto', 'RAbogado_pnhs', '0', NULL, 201716, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(123, 'romeo', 'RLumibao_pnhs', '0', NULL, 2204, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(124, 'thea', 'TAbanilla_pnhs', '0', NULL, 20175, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(125, 'steffi', 'SChavez_pnhs', '0', NULL, 201725, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(126, 'claire', 'CMendenilla_pnhs', '0', 50011253, NULL, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(127, 'shanley', 'SReyes_pnhs', '0', 5901112, NULL, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(128, 'mj', 'mj123', '0', 50011255, NULL, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(132, 'lyka', 'lyka', '0', 5001094, NULL, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(143, 'KarlVincent', 'KArancillo_pnhs', '0', NULL, 42322487, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(150, 'Thelma', 'THayley_pnhs', '0', NULL, 30001, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(151, 'Cordelia', 'CParish_pnhs', '0', NULL, 30005, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(152, 'Jayme', 'JDodge_pnhs', '0', NULL, 30002, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(153, 'KarlVincent', 'KArancillo_pnhs', '0', NULL, 5882566, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(154, 'KarlVincent', 'KArancillo_pnhs', '0', NULL, 12345678, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(156, 'guim', 'Qno1U2NTbHZHMFNjMXhYcU1TTFhNQT09', '0', NULL, 1101, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(157, 'bryan', '123123', '0', 4990111, NULL, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(158, 'armie', 'AHerrera_pnhs', '1', 5287126, NULL, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1'),
(159, 'adrianna', 'Qno1U2NTbHZHMFNjMXhYcU1TTFhNQT09', '1', 5880365, NULL, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `cms_achievement`
--

CREATE TABLE `cms_achievement` (
  `cms_achievement_ID` int(11) UNSIGNED NOT NULL,
  `cms_achievement_name` varchar(150) NOT NULL,
  `cms_achievement_about` longtext NOT NULL,
  `cms_achievement_date` date NOT NULL,
  `cms_account_id` int(10) UNSIGNED NOT NULL,
  `cms_img_dir` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_achievement`
--

INSERT INTO `cms_achievement` (`cms_achievement_ID`, `cms_achievement_name`, `cms_achievement_about`, `cms_achievement_date`, `cms_account_id`, `cms_img_dir`) VALUES
(1, 'Palarong Pambansa 2016', 'Palarong Pambansa 2016 Best Billeting School 3rd Place 1st Division Search for Accomplished Youth Organization in Schools Division of Legazpi 2016 Ibalong Street Presentation 2008 Best in Costume and Props 4th Place 6th Salud Bikolnon Award Best Achiever for the Promotion of Innovative Healthy Lifestyle Campaign 2015 and 2016 and Best Achiever for Belly Gud for Health 2015 ', '0000-00-00', 2, NULL),
(2, 'Palarong Bicol 2017', 'Palarong Bicol 2017 Bernard Cruz, Coach, Table Tennis Mario Ballon, Coach, Archery Reinelyn Mae Saturno, Table Tennis, Bronze Joy Nunez, Table Tennis, Gold Jayvee Polo, Table Tennis, Gold Clarence Sarza, Taekwondo, 1 Gold, 2 Silver Rafael Siso, Arnis, 3 Gold, 3 Silver, 1 Bronze Joeome Aycardo, Soccer, Gold Mark Nunez, Table Tennis, Silver ', '0000-00-00', 2, NULL),
(3, 'Palarong Pambansa', 'Palarong Pambansa Clarence Sarza, Taekwondo, Gold Rafael Sis, Arnis, Gold ', '0000-00-00', 2, NULL),
(4, 'Regional Festival of Talents', 'April Cruz, 2nd Place, Regional Festival of Talents, Essay Writing in Araling Panlipunan, English ', '0000-00-00', 2, NULL),
(5, 'International Linkage Community', 'Pag-Asa National High School Delegates to the International Linkage Community, Kuala Lumpur Malaysia, September 24-28 2016', '0000-00-00', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_album`
--

CREATE TABLE `cms_album` (
  `cms_album_ID` int(10) UNSIGNED NOT NULL,
  `cms_account_ID` int(10) UNSIGNED NOT NULL,
  `cms_album_name` varchar(50) NOT NULL,
  `cms_album_desc` varchar(150) NOT NULL,
  `cms_album_folder` varchar(150) NOT NULL,
  `gallery_type` varchar(100) DEFAULT NULL,
  `cms_album_date_created` date NOT NULL,
  `cms_album_time_created` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_album`
--

INSERT INTO `cms_album` (`cms_album_ID`, `cms_account_ID`, `cms_album_name`, `cms_album_desc`, `cms_album_folder`, `gallery_type`, `cms_album_date_created`, `cms_album_time_created`) VALUES
(5, 8, 'Projects', '', '', 'project', '2017-10-06', '21:22:33'),
(7, 8, 'School Progress', '', '', 'schoolprogress', '2017-10-07', '10:33:29'),
(12, 8, 'Carousel', '', '', 'carousel', '2017-10-08', '16:25:12'),
(79, 159, 'School Grounds', '<p>A small preview of the school</p>\r\n', '[2018-03-13][04-38-44]-1973116103', 'documentation', '2018-03-13', '11:38:44'),
(81, 10, 'NAT Orientation', '', '[2018-03-14][15-57-08]-2126988665', 'documentation', '2018-03-14', '22:57:09'),
(82, 10, 'Senior High School pre-assessment - Oct. 1 & 9, 20', '', '[2018-03-14][15-57-14]-706364169', 'documentation', '2018-03-14', '22:57:14'),
(83, 10, 'Intrams 2017', '', '[2018-03-14][15-59-41]-1152710210', 'documentation', '2018-03-14', '22:59:41'),
(97, 10, 'SSG', '', '[2018-03-14][18-59-58]-1629039524', 'documentation', '2018-03-15', '01:59:58'),
(98, 10, '07/14/2017 Meeting with BUCS-CSIT Department', '', '[2018-03-14][19-09-23]-721974849', 'documentation', '2018-03-15', '02:09:23');

-- --------------------------------------------------------

--
-- Table structure for table `cms_gpta`
--

CREATE TABLE `cms_gpta` (
  `cms_gpta_ID` int(11) NOT NULL,
  `cms_gpta_content` text NOT NULL,
  `cms_gpta_year1` year(4) NOT NULL,
  `cms_gpta_year2` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_gpta`
--

INSERT INTO `cms_gpta` (`cms_gpta_ID`, `cms_gpta_content`, `cms_gpta_year1`, `cms_gpta_year2`) VALUES
(10, '<p><strong>PNHS GPTA Officers</strong></p>\r\n\r\n<p><strong>President:</strong>&nbsp;Mr. Roland Bongais<br />\r\n<strong>Vice-President:</strong>&nbsp;Mr.Erasto&shy; Bing Alerta<br />\r\n<strong>Secretary:</strong>&nbsp;Mary Ann A.Blanco<br />\r\n<strong>Treasurer:</strong>&nbsp;Juvy Bremen<br />\r\n<strong>Auditor:</strong>&nbsp;Mr. Romel Abiera<br />\r\n<strong>Business Managers:</strong>&nbsp;Mrs&shy;. Lani Reaso and Mrs. Melisa Dy<br />\r\n<strong>PIO:</strong>&nbsp;Roleto Bechayda<br />\r\n<strong>Board Members:</strong><br />\r\nMs.Geraldine&shy; Santander<br />\r\nMr.Rodrigo&shy; Batalla<br />\r\nMrs. Janet Arias<br />\r\nMs. Lorena Macatunao</p>\r\n\r\n<p><strong>GPTA Coordinator:</strong>&nbsp;Ma. Ana Ayala-Balde</p>\r\n', 2017, 2018);

-- --------------------------------------------------------

--
-- Table structure for table `cms_image`
--

CREATE TABLE `cms_image` (
  `cms_image_ID` int(10) UNSIGNED NOT NULL,
  `cms_album_ID` int(11) NOT NULL,
  `cms_image_title` tinytext,
  `cms_image_name` varchar(100) NOT NULL,
  `cms_image_dir` varchar(100) NOT NULL,
  `cms_album_name` text,
  `cms_image_date` date NOT NULL,
  `cms_image_time` time NOT NULL,
  `cms_img_cap` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_image`
--

INSERT INTO `cms_image` (`cms_image_ID`, `cms_album_ID`, `cms_image_title`, `cms_image_name`, `cms_image_dir`, `cms_album_name`, `cms_image_date`, `cms_image_time`, `cms_img_cap`) VALUES
(138, 3, NULL, '59d801747af463.10921912.jpg', 'uploads/docu/PNHS/59d801747af463.10921912.jpg', NULL, '2017-10-07', '00:00:00', 'One student standing in front of the "I Love PNHS" sign pointing at his friends'),
(139, 3, NULL, '59d801748dc126.42643733.jpg', 'uploads/docu/PNHS/59d801748dc126.42643733.jpg', NULL, '2017-10-07', '00:00:00', 'Students posing with the "I Love PNHS" sign '),
(140, 3, NULL, '59d8017497c3d1.18915575.jpg', 'uploads/docu/PNHS/59d8017497c3d1.18915575.jpg', NULL, '2017-10-07', '00:00:00', ''),
(141, 3, NULL, '59d80174cfad23.19514168.jpg', 'uploads/docu/PNHS/59d80174cfad23.19514168.jpg', NULL, '2017-10-07', '00:00:00', ''),
(142, 3, NULL, '59d80174ebc103.28093367.jpg', 'uploads/docu/PNHS/59d80174ebc103.28093367.jpg', NULL, '2017-10-07', '00:00:00', ''),
(143, 3, NULL, '59d8017507f8c9.90883358.jpg', 'uploads/docu/PNHS/59d8017507f8c9.90883358.jpg', NULL, '2017-10-07', '00:00:00', ''),
(144, 3, NULL, '59d80175388f09.41828153.jpg', 'uploads/docu/PNHS/59d80175388f09.41828153.jpg', NULL, '2017-10-07', '00:00:00', ''),
(145, 3, NULL, '59d801754197a7.55788696.jpg', 'uploads/docu/PNHS/59d801754197a7.55788696.jpg', NULL, '2017-10-07', '00:00:00', ''),
(146, 3, NULL, '59d801754e49d7.31418379.jpg', 'uploads/docu/PNHS/59d801754e49d7.31418379.jpg', NULL, '2017-10-07', '00:00:00', ''),
(147, 3, NULL, '59d80175559ce9.23215747.jpg', 'uploads/docu/PNHS/59d80175559ce9.23215747.jpg', NULL, '2017-10-07', '00:00:00', ''),
(148, 3, NULL, '59d8017d72c776.78330161.jpg', 'uploads/docu/PNHS/59d8017d72c776.78330161.jpg', NULL, '2017-10-07', '00:00:00', ''),
(149, 3, NULL, '59d8017d8d6453.81446035.jpg', 'uploads/docu/PNHS/59d8017d8d6453.81446035.jpg', NULL, '2017-10-07', '00:00:00', ''),
(150, 3, NULL, '59d8017d9766f7.47127493.jpg', 'uploads/docu/PNHS/59d8017d9766f7.47127493.jpg', NULL, '2017-10-07', '00:00:00', ''),
(151, 3, NULL, '59d8017da03115.84820962.jpg', 'uploads/docu/PNHS/59d8017da03115.84820962.jpg', NULL, '2017-10-07', '00:00:00', ''),
(152, 3, NULL, '59d8017dad21c9.49019888.jpg', 'uploads/docu/PNHS/59d8017dad21c9.49019888.jpg', NULL, '2017-10-07', '00:00:00', ''),
(153, 3, NULL, '59d8017db5ebe6.40915886.jpg', 'uploads/docu/PNHS/59d8017db5ebe6.40915886.jpg', NULL, '2017-10-07', '00:00:00', ''),
(154, 3, NULL, '59d8017dc29e19.63382096.jpg', 'uploads/docu/PNHS/59d8017dc29e19.63382096.jpg', NULL, '2017-10-07', '00:00:00', ''),
(155, 3, NULL, '59d8017dcaacb2.31557977.jpg', 'uploads/docu/PNHS/59d8017dcaacb2.31557977.jpg', NULL, '2017-10-07', '00:00:00', ''),
(156, 3, NULL, '59d8017dd2f9d5.84294445.jpg', 'uploads/docu/PNHS/59d8017dd2f9d5.84294445.jpg', NULL, '2017-10-07', '00:00:00', ''),
(157, 3, NULL, '59d8017ddb0870.16895419.jpg', 'uploads/docu/PNHS/59d8017ddb0870.16895419.jpg', NULL, '2017-10-07', '00:00:00', ''),
(158, 3, NULL, '59d80187df52c2.95880455.jpg', 'uploads/docu/PNHS/59d80187df52c2.95880455.jpg', NULL, '2017-10-07', '00:00:00', ''),
(159, 3, NULL, '59d80187f39699.27927044.jpg', 'uploads/docu/PNHS/59d80187f39699.27927044.jpg', NULL, '2017-10-07', '00:00:00', ''),
(160, 3, NULL, '59d8018809f234.41867688.jpg', 'uploads/docu/PNHS/59d8018809f234.41867688.jpg', NULL, '2017-10-07', '00:00:00', ''),
(161, 3, NULL, '59d80188152d61.09947205.jpg', 'uploads/docu/PNHS/59d80188152d61.09947205.jpg', NULL, '2017-10-07', '00:00:00', ''),
(162, 3, NULL, '59d801881f6e81.43936302.jpg', 'uploads/docu/PNHS/59d801881f6e81.43936302.jpg', NULL, '2017-10-07', '00:00:00', ''),
(163, 3, NULL, '59d801882aa9b9.13880605.jpg', 'uploads/docu/PNHS/59d801882aa9b9.13880605.jpg', NULL, '2017-10-07', '00:00:00', ''),
(164, 3, NULL, '59d80188352957.49441427.jpg', 'uploads/docu/PNHS/59d80188352957.49441427.jpg', NULL, '2017-10-07', '00:00:00', ''),
(165, 3, NULL, '59d80188406486.31493597.jpg', 'uploads/docu/PNHS/59d80188406486.31493597.jpg', NULL, '2017-10-07', '00:00:00', ''),
(166, 3, NULL, '59d801884ae434.15040042.jpg', 'uploads/docu/PNHS/59d801884ae434.15040042.jpg', NULL, '2017-10-07', '00:00:00', ''),
(167, 3, NULL, '59d80188561f59.24941524.jpg', 'uploads/docu/PNHS/59d80188561f59.24941524.jpg', NULL, '2017-10-07', '00:00:00', ''),
(168, 3, NULL, '59d801921d9e48.56549743.jpg', 'uploads/docu/PNHS/59d801921d9e48.56549743.jpg', NULL, '2017-10-07', '00:00:00', ''),
(169, 3, NULL, '59d8019234d014.23262257.jpg', 'uploads/docu/PNHS/59d8019234d014.23262257.jpg', NULL, '2017-10-07', '00:00:00', ''),
(170, 3, NULL, '59d801924a8ae2.66857900.jpg', 'uploads/docu/PNHS/59d801924a8ae2.66857900.jpg', NULL, '2017-10-07', '00:00:00', ''),
(171, 3, NULL, '59d8019267d756.82400429.jpg', 'uploads/docu/PNHS/59d8019267d756.82400429.jpg', NULL, '2017-10-07', '00:00:00', ''),
(172, 3, NULL, '59d801927062f0.26027748.jpg', 'uploads/docu/PNHS/59d801927062f0.26027748.jpg', NULL, '2017-10-07', '00:00:00', ''),
(173, 3, NULL, '59d80192792d16.95453212.jpg', 'uploads/docu/PNHS/59d80192792d16.95453212.jpg', NULL, '2017-10-07', '00:00:00', ''),
(227, 11, NULL, '59d892a98b6c41.62529987.jpg', 'uploads/docu/pagasa/59d892a98b6c41.62529987.jpg', NULL, '2017-10-07', '00:00:00', ''),
(228, 11, NULL, '59d892a9bdf681.87443449.jpg', 'uploads/docu/pagasa/59d892a9bdf681.87443449.jpg', NULL, '2017-10-07', '00:00:00', ''),
(229, 11, NULL, '59d892a9ca2bb5.67536517.jpg', 'uploads/docu/pagasa/59d892a9ca2bb5.67536517.jpg', NULL, '2017-10-07', '00:00:00', ''),
(230, 11, NULL, '59d892a9d71c61.87317963.jpg', 'uploads/docu/pagasa/59d892a9d71c61.87317963.jpg', NULL, '2017-10-07', '00:00:00', ''),
(231, 11, NULL, '59d892a9e25797.44603051.jpg', 'uploads/docu/pagasa/59d892a9e25797.44603051.jpg', NULL, '2017-10-07', '00:00:00', ''),
(232, 11, NULL, '59d892a9ed5439.50602890.jpg', 'uploads/docu/pagasa/59d892a9ed5439.50602890.jpg', NULL, '2017-10-07', '00:00:00', ''),
(233, 11, NULL, '59d892aa03ee66.58380160.jpg', 'uploads/docu/pagasa/59d892aa03ee66.58380160.jpg', NULL, '2017-10-07', '00:00:00', ''),
(234, 11, NULL, '59d892aa19a936.01577075.jpg', 'uploads/docu/pagasa/59d892aa19a936.01577075.jpg', NULL, '2017-10-07', '00:00:00', ''),
(235, 11, NULL, '59d892aa24a5e7.26603698.jpg', 'uploads/docu/pagasa/59d892aa24a5e7.26603698.jpg', NULL, '2017-10-07', '00:00:00', ''),
(236, 11, NULL, '59d892aa2f6401.33777737.jpg', 'uploads/docu/pagasa/59d892aa2f6401.33777737.jpg', NULL, '2017-10-07', '00:00:00', 'The BUCS Faculty with the PNHS Staff'),
(237, 11, NULL, '59d892b80ea012.55860009.jpg', 'uploads/docu/pagasa/59d892b80ea012.55860009.jpg', NULL, '2017-10-07', '00:00:00', ''),
(238, 11, NULL, '59d892b82072d5.03247692.jpg', 'uploads/docu/pagasa/59d892b82072d5.03247692.jpg', NULL, '2017-10-07', '00:00:00', ''),
(239, 11, NULL, '59d892b8391bb3.52872959.jpg', 'uploads/docu/pagasa/59d892b8391bb3.52872959.jpg', NULL, '2017-10-07', '00:00:00', ''),
(240, 11, NULL, '59d892b845cde9.60389310.jpg', 'uploads/docu/pagasa/59d892b845cde9.60389310.jpg', NULL, '2017-10-07', '00:00:00', ''),
(241, 11, NULL, '59d892b8510915.07210790.jpg', 'uploads/docu/pagasa/59d892b8510915.07210790.jpg', NULL, '2017-10-07', '00:00:00', ''),
(242, 11, NULL, '59d892b85b4a30.61197093.jpg', 'uploads/docu/pagasa/59d892b85b4a30.61197093.jpg', NULL, '2017-10-07', '00:00:00', ''),
(243, 11, NULL, '59d892b866c3e6.02873875.jpg', 'uploads/docu/pagasa/59d892b866c3e6.02873875.jpg', NULL, '2017-10-07', '00:00:00', ''),
(332, 19, NULL, '59dbc015a04665.30986643.jpg', 'uploads/docu/Intrams 2017/59dbc015a04665.30986643.jpg', NULL, '2017-10-10', '00:00:00', ''),
(333, 19, NULL, '59dbc015b60137.20929579.jpg', 'uploads/docu/Intrams 2017/59dbc015b60137.20929579.jpg', NULL, '2017-10-10', '00:00:00', ''),
(334, 19, NULL, '59dbc015cee893.75411372.jpg', 'uploads/docu/Intrams 2017/59dbc015cee893.75411372.jpg', NULL, '2017-10-10', '00:00:00', ''),
(335, 19, NULL, '59dbc015e752f6.47175048.jpg', 'uploads/docu/Intrams 2017/59dbc015e752f6.47175048.jpg', NULL, '2017-10-10', '00:00:00', ''),
(336, 19, NULL, '59dbc01608e9c0.86673906.jpg', 'uploads/docu/Intrams 2017/59dbc01608e9c0.86673906.jpg', NULL, '2017-10-10', '00:00:00', ''),
(337, 19, NULL, '59dbc016345f61.15341661.jpg', 'uploads/docu/Intrams 2017/59dbc016345f61.15341661.jpg', NULL, '2017-10-10', '00:00:00', ''),
(338, 19, NULL, '59dbc01651ea58.80685108.jpg', 'uploads/docu/Intrams 2017/59dbc01651ea58.80685108.jpg', NULL, '2017-10-10', '00:00:00', ''),
(339, 19, NULL, '59dbc02235c2d9.99293137.jpg', 'uploads/docu/Intrams 2017/59dbc02235c2d9.99293137.jpg', NULL, '2017-10-10', '00:00:00', ''),
(340, 19, NULL, '59dbc0224b7da2.53167303.jpg', 'uploads/docu/Intrams 2017/59dbc0224b7da2.53167303.jpg', NULL, '2017-10-10', '00:00:00', ''),
(341, 19, NULL, '59dbc02263a973.88445687.jpg', 'uploads/docu/Intrams 2017/59dbc02263a973.88445687.jpg', NULL, '2017-10-10', '00:00:00', ''),
(342, 19, NULL, '59dbc0227f01e5.64733668.jpg', 'uploads/docu/Intrams 2017/59dbc0227f01e5.64733668.jpg', NULL, '2017-10-10', '00:00:00', ''),
(343, 19, NULL, '59dbc02297aac1.17847294.jpg', 'uploads/docu/Intrams 2017/59dbc02297aac1.17847294.jpg', NULL, '2017-10-10', '00:00:00', ''),
(344, 19, NULL, '59dbc022acaa00.86237252.jpg', 'uploads/docu/Intrams 2017/59dbc022acaa00.86237252.jpg', NULL, '2017-10-10', '00:00:00', ''),
(345, 19, NULL, '59dbc022bd4445.53454737.jpg', 'uploads/docu/Intrams 2017/59dbc022bd4445.53454737.jpg', NULL, '2017-10-10', '00:00:00', ''),
(346, 19, NULL, '59dbc022d2c096.73567977.jpg', 'uploads/docu/Intrams 2017/59dbc022d2c096.73567977.jpg', NULL, '2017-10-10', '00:00:00', ''),
(347, 19, NULL, '59dbc03075ecc8.16333159.jpg', 'uploads/docu/Intrams 2017/59dbc03075ecc8.16333159.jpg', NULL, '2017-10-10', '00:00:00', ''),
(348, 19, NULL, '59dbc0308be623.21776079.jpg', 'uploads/docu/Intrams 2017/59dbc0308be623.21776079.jpg', NULL, '2017-10-10', '00:00:00', ''),
(349, 19, NULL, '59dbc0309c8056.21001248.jpg', 'uploads/docu/Intrams 2017/59dbc0309c8056.21001248.jpg', NULL, '2017-10-10', '00:00:00', ''),
(350, 19, NULL, '59dbc030a9ee17.68332518.jpg', 'uploads/docu/Intrams 2017/59dbc030a9ee17.68332518.jpg', NULL, '2017-10-10', '00:00:00', ''),
(351, 19, NULL, '59dbc030ba49c1.44656799.jpg', 'uploads/docu/Intrams 2017/59dbc030ba49c1.44656799.jpg', NULL, '2017-10-10', '00:00:00', ''),
(352, 19, NULL, '59dbc030cdd212.35140813.jpg', 'uploads/docu/Intrams 2017/59dbc030cdd212.35140813.jpg', NULL, '2017-10-10', '00:00:00', ''),
(353, 19, NULL, '59dbc030de2dd7.64798222.jpg', 'uploads/docu/Intrams 2017/59dbc030de2dd7.64798222.jpg', NULL, '2017-10-10', '00:00:00', ''),
(354, 19, NULL, '59dbc030ee4b10.96453362.jpg', 'uploads/docu/Intrams 2017/59dbc030ee4b10.96453362.jpg', NULL, '2017-10-10', '00:00:00', ''),
(355, 19, NULL, '59dbc049d11988.27555970.jpg', 'uploads/docu/Intrams 2017/59dbc049d11988.27555970.jpg', NULL, '2017-10-10', '00:00:00', ''),
(356, 19, NULL, '59dbc049eb3962.48999761.jpg', 'uploads/docu/Intrams 2017/59dbc049eb3962.48999761.jpg', NULL, '2017-10-10', '00:00:00', ''),
(357, 19, NULL, '59dbc04a26b196.02747202.jpg', 'uploads/docu/Intrams 2017/59dbc04a26b196.02747202.jpg', NULL, '2017-10-10', '00:00:00', ''),
(358, 19, NULL, '59dbc04a405470.62144333.jpg', 'uploads/docu/Intrams 2017/59dbc04a405470.62144333.jpg', NULL, '2017-10-10', '00:00:00', ''),
(359, 19, NULL, '59dbc04a568c43.82751298.jpg', 'uploads/docu/Intrams 2017/59dbc04a568c43.82751298.jpg', NULL, '2017-10-10', '00:00:00', ''),
(360, 19, NULL, '59dbc04a6e3b29.02844306.jpg', 'uploads/docu/Intrams 2017/59dbc04a6e3b29.02844306.jpg', NULL, '2017-10-10', '00:00:00', ''),
(361, 19, NULL, '59dbc04a83f5f7.94114333.jpg', 'uploads/docu/Intrams 2017/59dbc04a83f5f7.94114333.jpg', NULL, '2017-10-10', '00:00:00', ''),
(362, 19, NULL, '59dbc04a9c21c5.58190229.jpg', 'uploads/docu/Intrams 2017/59dbc04a9c21c5.58190229.jpg', NULL, '2017-10-10', '00:00:00', ''),
(363, 19, NULL, '59dbc05f9519c9.80607757.jpg', 'uploads/docu/Intrams 2017/59dbc05f9519c9.80607757.jpg', NULL, '2017-10-10', '00:00:00', ''),
(364, 19, NULL, '59dbc05fab1313.84327593.jpg', 'uploads/docu/Intrams 2017/59dbc05fab1313.84327593.jpg', NULL, '2017-10-10', '00:00:00', ''),
(365, 19, NULL, '59dbc05fc08f60.24771780.jpg', 'uploads/docu/Intrams 2017/59dbc05fc08f60.24771780.jpg', NULL, '2017-10-10', '00:00:00', ''),
(366, 19, NULL, '59dbc05fd64a33.31991316.jpg', 'uploads/docu/Intrams 2017/59dbc05fd64a33.31991316.jpg', NULL, '2017-10-10', '00:00:00', ''),
(367, 19, NULL, '59dbc05fe66777.17322835.jpg', 'uploads/docu/Intrams 2017/59dbc05fe66777.17322835.jpg', NULL, '2017-10-10', '00:00:00', ''),
(368, 19, NULL, '59dbc060362371.16179519.jpg', 'uploads/docu/Intrams 2017/59dbc060362371.16179519.jpg', NULL, '2017-10-10', '00:00:00', ''),
(369, 19, NULL, '59dbc0603d7696.51406835.jpg', 'uploads/docu/Intrams 2017/59dbc0603d7696.51406835.jpg', NULL, '2017-10-10', '00:00:00', ''),
(370, 19, NULL, '59dbc0604e4f55.04347524.jpg', 'uploads/docu/Intrams 2017/59dbc0604e4f55.04347524.jpg', NULL, '2017-10-10', '00:00:00', ''),
(371, 19, NULL, '59dbc079227789.02761572.jpg', 'uploads/docu/Intrams 2017/59dbc079227789.02761572.jpg', NULL, '2017-10-10', '00:00:00', ''),
(372, 19, NULL, '59dbc07932d341.41212887.jpg', 'uploads/docu/Intrams 2017/59dbc07932d341.41212887.jpg', NULL, '2017-10-10', '00:00:00', ''),
(373, 19, NULL, '59dbc0793dcff4.31114626.jpg', 'uploads/docu/Intrams 2017/59dbc0793dcff4.31114626.jpg', NULL, '2017-10-10', '00:00:00', ''),
(374, 19, NULL, '59dbc079490b16.95250508.jpg', 'uploads/docu/Intrams 2017/59dbc079490b16.95250508.jpg', NULL, '2017-10-10', '00:00:00', ''),
(375, 19, NULL, '59dbc0797868c6.53536266.jpg', 'uploads/docu/Intrams 2017/59dbc0797868c6.53536266.jpg', NULL, '2017-10-10', '00:00:00', ''),
(376, 19, NULL, '59dbc079870f04.57778536.jpg', 'uploads/docu/Intrams 2017/59dbc079870f04.57778536.jpg', NULL, '2017-10-10', '00:00:00', ''),
(377, 19, NULL, '59dbc0798f5c23.06437239.jpg', 'uploads/docu/Intrams 2017/59dbc0798f5c23.06437239.jpg', NULL, '2017-10-10', '00:00:00', ''),
(378, 19, NULL, '59dbc0799f3ad0.39962229.jpg', 'uploads/docu/Intrams 2017/59dbc0799f3ad0.39962229.jpg', NULL, '2017-10-10', '00:00:00', ''),
(379, 19, NULL, '59dbc08e2dbf47.09631286.jpg', 'uploads/docu/Intrams 2017/59dbc08e2dbf47.09631286.jpg', NULL, '2017-10-10', '00:00:00', ''),
(380, 19, NULL, '59dbc08e3938f2.99216381.jpg', 'uploads/docu/Intrams 2017/59dbc08e3938f2.99216381.jpg', NULL, '2017-10-10', '00:00:00', ''),
(381, 19, NULL, '59dbc08e40ca89.79684582.jpg', 'uploads/docu/Intrams 2017/59dbc08e40ca89.79684582.jpg', NULL, '2017-10-10', '00:00:00', ''),
(519, 16, NULL, '[2018-02-16][20-53-23]-44914913.jpg', 'docu', 'School Grounds', '2018-02-17', '00:00:00', 'lalalalallalalalalallalalal'),
(520, 16, NULL, '[2018-02-16][20-53-24]-1823834186.jpg', 'docu', 'School Grounds', '2018-02-17', '00:00:00', ''),
(521, 16, NULL, '[2018-02-16][20-53-24]-1968072879.jpg', 'docu', 'School Grounds', '2018-02-17', '00:00:00', ''),
(526, 16, NULL, '[2018-02-19][13-10-29]-656659724.jpg', 'docu', 'School Grounds', '2018-02-19', '00:00:00', ''),
(527, 16, NULL, '[2018-02-19][13-10-29]-1084089625.jpg', 'docu', 'School Grounds', '2018-02-19', '00:00:00', ''),
(531, 23, NULL, '[2018-02-19][17-32-29]-26574998.jpg', 'docu', 'lalala', '2018-02-20', '00:00:00', ''),
(532, 23, NULL, '[2018-02-19][17-32-29]-332223871.jpg', 'docu', 'lalala', '2018-02-20', '00:00:00', ''),
(533, 23, NULL, '[2018-02-19][17-32-29]-430192190.jpg', 'docu', 'lalala', '2018-02-20', '00:00:00', ''),
(534, 24, NULL, '[2018-02-19][18-11-05]-1486351804.jpg', 'docu', 'whee', '2018-02-20', '00:00:00', ''),
(536, 24, NULL, '[2018-02-19][18-11-05]-268944139.jpg', 'docu', 'whee', '2018-02-20', '00:00:00', ''),
(537, 24, NULL, '[2018-02-19][18-11-06]-2123106430.jpg', 'docu', 'whee', '2018-02-20', '00:00:00', ''),
(540, 37, NULL, '[2018-02-21][05-18-44]-425163751.jpg', 'docu', 'sfgaegawrgawrg', '2018-02-21', '00:00:00', ''),
(541, 37, NULL, '[2018-02-21][05-18-44]-1863697174.jpg', 'docu', 'sfgaegawrgawrg', '2018-02-21', '00:00:00', ''),
(542, 37, NULL, '[2018-02-21][05-18-44]-743880487.jpg', 'docu', 'sfgaegawrgawrg', '2018-02-21', '00:00:00', ''),
(543, 37, NULL, '[2018-02-21][05-18-44]-1916484620.jpg', 'docu', 'sfgaegawrgawrg', '2018-02-21', '00:00:00', ''),
(544, 37, NULL, '[2018-02-21][05-18-44]-1180162683.jpg', 'docu', 'sfgaegawrgawrg', '2018-02-21', '00:00:00', ''),
(545, 38, NULL, '[2018-02-21][05-20-15]-745281009.jpg', 'docu', 'fawerfawrfwar', '2018-02-21', '00:00:00', ''),
(546, 38, NULL, '[2018-02-21][05-20-16]-1068663999.jpg', 'docu', 'fawerfawrfwar', '2018-02-21', '00:00:00', ''),
(547, 38, NULL, '[2018-02-21][05-20-16]-612249423.jpg', 'docu', 'fawerfawrfwar', '2018-02-21', '00:00:00', ''),
(548, 38, NULL, '[2018-02-21][05-20-16]-2019037561.jpg', 'docu', 'fawerfawrfwar', '2018-02-21', '00:00:00', ''),
(549, 38, NULL, '[2018-02-21][05-20-16]-1249513180.jpg', 'docu', 'fawerfawrfwar', '2018-02-21', '00:00:00', ''),
(550, 39, NULL, '[2018-02-21][05-22-54]-915133291.jpg', 'docu', 'dfdfwefewf', '2018-02-21', '00:00:00', ''),
(551, 39, NULL, '[2018-02-21][05-22-54]-1527252613.jpg', 'docu', 'dfdfwefewf', '2018-02-21', '00:00:00', ''),
(552, 39, NULL, '[2018-02-21][05-22-54]-1006813560.jpg', 'docu', 'dfdfwefewf', '2018-02-21', '00:00:00', ''),
(553, 39, NULL, '[2018-02-21][05-22-54]-103994503.jpg', 'docu', 'dfdfwefewf', '2018-02-21', '00:00:00', ''),
(554, 39, NULL, '[2018-02-21][05-22-55]-1753386244.jpg', 'docu', 'dfdfwefewf', '2018-02-21', '00:00:00', ''),
(555, 41, NULL, '[2018-02-21][05-32-26]-1233678161.jpg', 'docu', 'fewfw', '2018-02-21', '00:00:00', ''),
(556, 41, NULL, '[2018-02-21][05-32-27]-1519772207.jpg', 'docu', 'fewfw', '2018-02-21', '00:00:00', ''),
(557, 41, NULL, '[2018-02-21][05-32-27]-1688699045.jpg', 'docu', 'fewfw', '2018-02-21', '00:00:00', ''),
(558, 41, NULL, '[2018-02-21][05-32-27]-1555278963.jpg', 'docu', 'fewfw', '2018-02-21', '00:00:00', ''),
(559, 41, NULL, '[2018-02-21][05-32-27]-1781559169.jpg', 'docu', 'fewfw', '2018-02-21', '00:00:00', ''),
(560, 41, NULL, '[2018-02-21][07-38-57]-346522938.jpg', 'docu', 'fewfw', '2018-02-21', '00:00:00', ''),
(561, 41, NULL, '[2018-02-21][07-38-58]-1469898680.jpg', 'docu', 'fewfw', '2018-02-21', '00:00:00', ''),
(562, 41, NULL, '[2018-02-21][07-38-58]-1439891087.jpg', 'docu', 'fewfw', '2018-02-21', '00:00:00', ''),
(563, 41, NULL, '[2018-02-21][07-38-58]-1581694858.jpg', 'docu', 'fewfw', '2018-02-21', '00:00:00', ''),
(564, 41, NULL, '[2018-02-21][07-38-58]-653116273.jpg', 'docu', 'fewfw', '2018-02-21', '00:00:00', ''),
(565, 64, NULL, '[2018-02-21][14-23-34]-1547301009.jpg', 'docu', 'test', '2018-02-21', '00:00:00', ''),
(566, 64, NULL, '[2018-02-21][14-23-34]-1332007414.jpg', 'docu', 'test', '2018-02-21', '00:00:00', ''),
(567, 64, NULL, '[2018-02-21][14-23-34]-270923137.jpg', 'docu', 'test', '2018-02-21', '00:00:00', ''),
(568, 64, NULL, '[2018-02-21][14-23-34]-2557279.jpg', 'docu', 'test', '2018-02-21', '00:00:00', ''),
(569, 64, NULL, '[2018-02-21][14-23-34]-505271082.jpg', 'docu', 'test', '2018-02-21', '00:00:00', ''),
(573, 66, NULL, '[2018-02-21][15-58-15]-1413214316.jpg', 'docu', 'ALBUM', '2018-02-21', '00:00:00', ''),
(574, 66, NULL, '[2018-02-21][15-58-16]-644424334.jpg', 'docu', 'ALBUM', '2018-02-21', '00:00:00', ''),
(575, 66, NULL, '[2018-02-21][15-58-17]-1682701146.jpg', 'docu', 'ALBUM', '2018-02-21', '00:00:00', ''),
(578, 67, NULL, '[2018-02-21][15-58-31]-92177552.jpg', 'docu', 'test2', '2018-02-21', '00:00:00', ''),
(579, 67, NULL, '[2018-02-21][15-58-31]-1370561248.jpg', 'docu', 'test2', '2018-02-21', '00:00:00', ''),
(580, 67, NULL, '[2018-02-21][15-58-32]-1024569431.jpg', 'docu', 'test2', '2018-02-21', '00:00:00', ''),
(581, 67, NULL, '[2018-02-21][15-58-32]-965263340.jpg', 'docu', 'test2', '2018-02-21', '00:00:00', ''),
(582, 67, NULL, '[2018-02-21][15-58-32]-329056481.jpg', 'docu', 'test2', '2018-02-21', '00:00:00', ''),
(583, 68, NULL, '[2018-02-21][15-58-48]-1254802164.jpg', 'docu', 'test3', '2018-02-21', '00:00:00', ''),
(584, 68, NULL, '[2018-02-21][15-58-48]-1720500594.jpg', 'docu', 'test3', '2018-02-21', '00:00:00', ''),
(585, 68, NULL, '[2018-02-21][15-58-48]-407074880.jpg', 'docu', 'test3', '2018-02-21', '00:00:00', ''),
(586, 68, NULL, '[2018-02-21][15-58-48]-2036401621.jpg', 'docu', 'test3', '2018-02-21', '00:00:00', ''),
(587, 68, NULL, '[2018-02-21][15-58-48]-785972721.jpg', 'docu', 'test3', '2018-02-21', '00:00:00', ''),
(588, 69, NULL, '[2018-02-21][15-59-40]-1012387111.jpg', 'docu', 'test4', '2018-02-21', '00:00:00', ''),
(589, 69, NULL, '[2018-02-21][15-59-41]-863202562.jpg', 'docu', 'test4', '2018-02-21', '00:00:00', ''),
(590, 69, NULL, '[2018-02-21][15-59-41]-178981087.jpg', 'docu', 'test4', '2018-02-21', '00:00:00', ''),
(591, 69, NULL, '[2018-02-21][15-59-41]-1378930507.jpg', 'docu', 'test4', '2018-02-21', '00:00:00', ''),
(592, 69, NULL, '[2018-02-21][15-59-41]-729109036.jpg', 'docu', 'test4', '2018-02-21', '00:00:00', ''),
(593, 70, NULL, '[2018-02-21][16-00-30]-936513425.jpg', 'docu', 'test5', '2018-02-21', '00:00:00', ''),
(594, 70, NULL, '[2018-02-21][16-00-30]-1589385647.jpg', 'docu', 'test5', '2018-02-21', '00:00:00', ''),
(595, 70, NULL, '[2018-02-21][16-00-30]-615290366.jpg', 'docu', 'test5', '2018-02-21', '00:00:00', ''),
(596, 70, NULL, '[2018-02-21][16-00-30]-1618918731.jpg', 'docu', 'test5', '2018-02-21', '00:00:00', ''),
(597, 70, NULL, '[2018-02-21][16-00-30]-2282485.jpg', 'docu', 'test5', '2018-02-21', '00:00:00', ''),
(598, 71, NULL, '[2018-02-21][16-00-43]-1179082715.jpg', 'docu', 'test6', '2018-02-21', '00:00:00', ''),
(599, 71, NULL, '[2018-02-21][16-00-43]-1377067024.jpg', 'docu', 'test6', '2018-02-21', '00:00:00', ''),
(600, 71, NULL, '[2018-02-21][16-00-44]-149576485.jpg', 'docu', 'test6', '2018-02-21', '00:00:00', ''),
(601, 71, NULL, '[2018-02-21][16-00-44]-1260984943.jpg', 'docu', 'test6', '2018-02-21', '00:00:00', ''),
(602, 71, NULL, '[2018-02-21][16-00-44]-1168112672.jpg', 'docu', 'test6', '2018-02-21', '00:00:00', ''),
(606, 0, NULL, '[2018-02-21][21-53-06]-690628649.jpg', 'proj', '', '2018-02-22', '00:00:00', ''),
(607, 0, NULL, '[2018-02-21][21-53-43]-1545651195.jpg', 'proj', '', '2018-02-22', '00:00:00', ''),
(611, 20, NULL, '[2018-02-21][22-02-18]-1869761531.jpg', 'orgchart', '', '2018-02-22', '00:00:00', ''),
(618, 5, 'Bike Mo, Pag-asa Ko', '[2018-02-22][10-56-20]-6246901.jpg', 'proj', NULL, '2018-02-22', '00:00:00', '<p>With the Proponent, Mr. Jeremy A. Cruz, the objective of this successful on-going project that started out during 2015, is to reduce absenteeism among students. The percentage of students&#39; attendanced increased and has a reduced drop out rate in the past school years. This project has also been featured on national television and newspaper. All targets have been acomplished.</p>\r\n'),
(619, 5, 'BISITA - Bringing Interventions and Support to Improve Tasks and Accomplishments', '[2018-02-22][10-56-21]-1591170309.jpg', 'proj', NULL, '2018-02-22', '00:00:00', '<p>This is to conduct home visitations and consultations to students. The objective is to reduce drop-out rates and increased promotion rate. Implemented last 2015 and still on going, target activities have been accomplished.</p>\r\n'),
(620, 5, 'HeaLA - HEAlthy Lifestyle Advocacy Program', '[2018-02-22][10-56-21]-1243163460.jpg', 'proj', NULL, '2018-02-22', '00:00:00', '<p>This project helps to&nbsp; improve&nbsp; the students&#39; and faculty&#39;s lifestyle when it comes to fitness</p>\r\n'),
(621, 5, 'HELPS - Helping Less - Privileged Students', '[2018-02-22][11-08-13]-1434574827.jpg', 'proj', NULL, '2018-02-22', '00:00:00', '<p>The objective of this project is to give weekly snack allowance to less-privileges students. During the implementation of the said project, student participated more in school activities and the percentage increased of those students regularly attending classes. The students&#39; nutritional status of students has also improved. All targets accomplished.</p>\r\n'),
(622, 5, 'ACISTER - Amiable Curriculum and Instructional Supervision for Teachers'' Enhancement and Refinement', '[2018-02-22][11-08-59]-315845432.jpg', 'proj', NULL, '2018-02-22', '00:00:00', '<p>School Head and department heads regularly friendly supervise their teachers. The objective is to conduct friendly observation and supervision and strengthen observation and supervision skills. Expected accomplishment is that teachers are guided accordingly and given tips to improve and maintain their teaching strategies. All targets are accomplished.</p>\r\n'),
(623, 72, NULL, '[2018-02-28][01-27-16]-1435430925.jpg', 'docu', 'album new', '2018-02-28', '00:00:00', ''),
(624, 72, NULL, '[2018-02-28][01-27-16]-1567055956.jpg', 'docu', 'album new', '2018-02-28', '00:00:00', ''),
(628, 72, NULL, '[2018-02-28][01-28-28]-2019426380.jpg', 'docu', 'album new', '2018-02-28', '00:00:00', ''),
(629, 72, NULL, '[2018-02-28][01-28-28]-60669351.jpg', 'docu', 'album new', '2018-02-28', '00:00:00', ''),
(630, 72, NULL, '[2018-02-28][01-28-28]-1404882348.jpg', 'docu', 'album new', '2018-02-28', '00:00:00', ''),
(631, 72, NULL, '[2018-03-01][09-27-18]-1424544076.jpg', 'docu', 'album new', '2018-03-01', '00:00:00', ''),
(632, 72, NULL, '[2018-03-01][09-27-19]-1782747681.jpg', 'docu', 'album new', '2018-03-01', '00:00:00', ''),
(633, 72, NULL, '[2018-03-01][09-27-19]-37089930.jpg', 'docu', 'album new', '2018-03-01', '00:00:00', ''),
(634, 72, NULL, '[2018-03-01][09-27-19]-1095941943.jpg', 'docu', 'album new', '2018-03-01', '00:00:00', ''),
(635, 72, NULL, '[2018-03-01][09-27-19]-929908523.jpg', 'docu', 'album new', '2018-03-01', '00:00:00', ''),
(636, 75, NULL, '[2018-03-12][20-46-03]-1226143254.jpg', 'docu', 'in', '2018-03-13', '03:46:03', ''),
(637, 75, NULL, '[2018-03-12][20-46-03]-1037698078.jpg', 'docu', 'in', '2018-03-13', '03:46:03', ''),
(638, 75, NULL, '[2018-03-12][20-46-03]-461007819.png', 'docu', 'in', '2018-03-13', '03:46:03', ''),
(639, 74, NULL, '[2018-03-12][21-27-10]-1861056814.jpg', 'docu', '[2018-03-04][17-12-00]-1061462727', '2018-03-13', '04:27:10', ''),
(642, 7, 'Stakeholders'' Contribution', '[2018-03-13][03-31-23]-907682402.png', 'sp', NULL, '2018-03-13', '00:00:00', '<p>For School Year 2015-2016</p>\r\n\r\n<p>with Co-Curricular, Extra-Curricular, Brigada, Program and Others</p>\r\n'),
(643, 7, 'Stakeholders'' Attendance to School Activities', '[2018-03-13][03-32-58]-332177370.png', 'sp', NULL, '2018-03-13', '00:00:00', '<p>For School Year 2015-2016 during Co-Curricular, Extra-Curricular, Meetings and Assemblies</p>\r\n'),
(644, 7, 'Distribution of the Pre-Test Results on the English Literacy Test', '[2018-03-13][03-32-58]-1305814538.png', 'sp', NULL, '2018-03-13', '00:00:00', '<p>Given levels are Frustration, Instructional and Independent</p>\r\n'),
(645, 7, 'Number of Illness Cases', '[2018-03-13][03-32-58]-848834092.png', 'sp', NULL, '2018-03-13', '00:00:00', '<p>On Grade 8 Students. With Headache,&nbsp; Fever, Dysmenorrhea, Toothache, LBM, Illac Pain and Dizziness</p>\r\n'),
(646, 7, 'Number of Illness Cases on Grade 11 Students', '[2018-03-13][03-32-58]-382496063.png', 'sp', NULL, '2018-03-13', '00:00:00', '<p>Headache, Fever, Abdominal Pain, Dysmenorrhea, Toothache and Dizziness</p>\r\n'),
(676, 5, 'WATCH - We Advocate Time Consciousness and Honesty', '[2018-03-13][04-01-05]-1694804258.jpg', 'proj', NULL, '2018-03-13', '00:00:00', '<p>Teachers and staffs are regularly checked and monitored by checking their punctuality and attendance. Teachers who have not commited any absences and recorded late are given recognition every month.&nbsp;</p>\r\n'),
(680, 5, 'ARAL - Applying Research for Advancement in Learning', '[2018-03-13][04-11-26]-583105146.jpg', 'proj', NULL, '2018-03-13', '00:00:00', '<p>The objective is to produce at least 5 action researches approved by the higher authority every year. This project has carried out research related activities like workshops and trainings. Actions researches are religiously done by proponents.One of the project highlights are approved researches in district and division level coming from students and teachers. All targets have been accomplished.</p>\r\n'),
(682, 5, 'ERAL - Every Room A Library', '[2018-03-13][04-11-26]-904274310.jpg', 'proj', NULL, '2018-03-13', '00:00:00', '<p>Every room must have a mini library where different reading materials are displayed for students&#39;s use. This is to provide supplementary reading materials for students and to minimize littering among students. Implemented during 2016, all targets are accomplished.</p>\r\n'),
(683, 5, 'P-NAT - Pagkain para sa Nutrisyon sa Katalinuhan', '[2018-03-13][04-14-26]-1741187517.jpg', 'proj', NULL, '2018-03-13', '00:00:00', '<p>Advocacy activities on health, nutrition and diet are conducted to students and parents. This has decreased percentage of wasted and severely wasted students by providing source of snacks. All targets accomplished.</p>\r\n'),
(684, 5, 'PREPARAR - Provision of Rigid Enhancement Program for Academic and Related Races', '[2018-03-13][04-14-26]-306747867.jpg', 'proj', NULL, '2018-03-13', '00:00:00', '<p>With this project&#39;s proponent, Mrs. Julie Ann Banania, this project prepares potential students through academic enhancement in different areas for future competitions. It has resulted in a increased number of division and regional winners and more qualifiers and winners in the higher levels of competition in any area. All targets have been accomplished.<br />\r\n&nbsp;</p>\r\n'),
(685, 5, 'UPDATE - Upgrading Professional Development through Acquisition of Trends and E-nnovations', '[2018-03-13][04-14-26]-436663899.jpg', 'proj', NULL, '2018-03-13', '00:00:00', '<p>Teachers and staff are given chaces to attend trainings, workshops and seminars in ICT for their professional growth and development. The objective is to equip staff with ICT and other teaching related skills. Staff has integrated the use of ICT in all their school related activities and functions. Expected output is to have advanced strategies in teaching and preparation of reports.</p>\r\n'),
(686, 5, 'ReCSAP - Regularly Checking of Students''s Attendance and Punctuality', '[2018-03-13][04-18-53]-1886671542.jpg', 'proj', NULL, '2018-03-13', '00:00:00', '<p>The guidance office throught the class monitors regularly checks the attendance of students. The objective is to increase the percentage of students attending classes and to minimize cutting classes. All targets have been accomplished.</p>\r\n'),
(687, 5, 'TAIS - Tutorial and Assistance for Improved Skills', '[2018-03-13][04-18-53]-704779854.jpg', 'proj', NULL, '2018-03-13', '00:00:00', '<p>The objective is to provide varied remediation and enrichment activities. This project has accomplished &nbsp;a reduced percentage of failure and retention among students, increased percentage of promotion and an increased NAT MPS of the school.&nbsp;</p>\r\n'),
(689, 78, NULL, '[2018-03-13][04-37-51]-1610613061.jpg', 'docu', '[2018-03-13][04-37-31]-1432218213', '2018-03-13', '11:37:51', ''),
(690, 78, NULL, '[2018-03-13][04-37-51]-756638946.jpg', 'docu', '[2018-03-13][04-37-31]-1432218213', '2018-03-13', '11:37:51', ''),
(691, 78, NULL, '[2018-03-13][04-37-51]-749040720.jpg', 'docu', '[2018-03-13][04-37-31]-1432218213', '2018-03-13', '11:37:51', ''),
(692, 78, NULL, '[2018-03-13][04-37-51]-1653156643.jpg', 'docu', '[2018-03-13][04-37-31]-1432218213', '2018-03-13', '11:37:51', ''),
(693, 78, NULL, '[2018-03-13][04-37-51]-1939833505.jpg', 'docu', '[2018-03-13][04-37-31]-1432218213', '2018-03-13', '11:37:51', ''),
(694, 79, NULL, '[2018-03-13][04-39-06]-1268210561.jpg', 'docu', 'School Grounds', '2018-03-13', '11:39:06', ''),
(695, 79, NULL, '[2018-03-13][04-39-07]-820359076.jpg', 'docu', 'School Grounds', '2018-03-13', '11:39:07', ''),
(696, 79, NULL, '[2018-03-13][04-39-07]-1939114036.jpg', 'docu', 'School Grounds', '2018-03-13', '11:39:07', ''),
(697, 79, NULL, '[2018-03-13][04-39-07]-741326469.jpg', 'docu', 'School Grounds', '2018-03-13', '11:39:07', ''),
(698, 79, NULL, '[2018-03-13][04-39-07]-1673977437.jpg', 'docu', 'School Grounds', '2018-03-13', '11:39:07', ''),
(699, 80, NULL, '[2018-03-13][04-40-32]-1817307284.jpg', 'docu', 'Pastry Production', '2018-03-13', '11:40:32', ''),
(700, 80, NULL, '[2018-03-13][04-40-33]-1900577582.jpg', 'docu', 'Pastry Production', '2018-03-13', '11:40:33', ''),
(701, 80, NULL, '[2018-03-13][04-40-33]-27181305.jpg', 'docu', 'Pastry Production', '2018-03-13', '11:40:33', 'Outputs'),
(702, 80, NULL, '[2018-03-13][04-40-33]-1425896277.jpg', 'docu', 'Pastry Production', '2018-03-13', '11:40:33', ''),
(707, 79, NULL, '[2018-03-14][18-26-32]-1598471107.jpg', 'docu', '[2018-03-13][04-38-44]-1973116103', '2018-03-15', '01:26:32', ''),
(708, 79, NULL, '[2018-03-14][18-26-33]-647474876.jpg', 'docu', '[2018-03-13][04-38-44]-1973116103', '2018-03-15', '01:26:33', ''),
(709, 79, NULL, '[2018-03-14][18-26-33]-1224715055.jpg', 'docu', '[2018-03-13][04-38-44]-1973116103', '2018-03-15', '01:26:33', ''),
(710, 79, NULL, '[2018-03-14][18-26-43]-945392511.jpg', 'docu', '[2018-03-13][04-38-44]-1973116103', '2018-03-15', '01:26:43', ''),
(711, 79, NULL, '[2018-03-14][18-26-43]-1104823271.jpg', 'docu', '[2018-03-13][04-38-44]-1973116103', '2018-03-15', '01:26:43', ''),
(712, 79, NULL, '[2018-03-14][18-26-44]-103323465.jpg', 'docu', '[2018-03-13][04-38-44]-1973116103', '2018-03-15', '01:26:44', ''),
(713, 79, NULL, '[2018-03-14][18-26-52]-1697623506.jpg', 'docu', '[2018-03-13][04-38-44]-1973116103', '2018-03-15', '01:26:52', ''),
(714, 79, NULL, '[2018-03-14][18-26-53]-167188907.jpg', 'docu', '[2018-03-13][04-38-44]-1973116103', '2018-03-15', '01:26:53', ''),
(715, 79, NULL, '[2018-03-14][18-26-53]-1157104585.jpg', 'docu', '[2018-03-13][04-38-44]-1973116103', '2018-03-15', '01:26:53', ''),
(716, 79, NULL, '[2018-03-14][18-26-53]-240324594.jpg', 'docu', '[2018-03-13][04-38-44]-1973116103', '2018-03-15', '01:26:53', ''),
(717, 79, NULL, '[2018-03-14][18-27-03]-1499699040.jpg', 'docu', '[2018-03-13][04-38-44]-1973116103', '2018-03-15', '01:27:03', ''),
(718, 79, NULL, '[2018-03-14][18-27-03]-1938340301.jpg', 'docu', '[2018-03-13][04-38-44]-1973116103', '2018-03-15', '01:27:03', ''),
(719, 81, NULL, '[2018-03-14][18-37-35]-678454128.jpg', 'docu', 'NAT Orientation', '2018-03-15', '01:37:35', ''),
(720, 81, NULL, '[2018-03-14][18-37-35]-70727043.jpg', 'docu', 'NAT Orientation', '2018-03-15', '01:37:35', ''),
(721, 81, NULL, '[2018-03-14][18-37-35]-1280804697.jpg', 'docu', 'NAT Orientation', '2018-03-15', '01:37:35', ''),
(722, 81, NULL, '[2018-03-14][18-37-35]-1408331444.jpg', 'docu', 'NAT Orientation', '2018-03-15', '01:37:35', ''),
(723, 81, NULL, '[2018-03-14][18-38-15]-600993323.jpg', 'docu', '[2018-03-14][15-57-08]-2126988665', '2018-03-15', '01:38:15', ''),
(724, 81, NULL, '[2018-03-14][18-38-15]-2145633752.jpg', 'docu', '[2018-03-14][15-57-08]-2126988665', '2018-03-15', '01:38:15', ''),
(725, 81, NULL, '[2018-03-14][18-38-15]-1909814142.jpg', 'docu', '[2018-03-14][15-57-08]-2126988665', '2018-03-15', '01:38:15', ''),
(726, 81, NULL, '[2018-03-14][18-38-15]-729635915.jpg', 'docu', '[2018-03-14][15-57-08]-2126988665', '2018-03-15', '01:38:15', ''),
(727, 81, NULL, '[2018-03-14][18-38-15]-1848225891.jpg', 'docu', '[2018-03-14][15-57-08]-2126988665', '2018-03-15', '01:38:15', ''),
(728, 81, NULL, '[2018-03-14][18-38-26]-1941016389.jpg', 'docu', '[2018-03-14][15-57-08]-2126988665', '2018-03-15', '01:38:26', ''),
(729, 81, NULL, '[2018-03-14][18-38-26]-116456554.jpg', 'docu', '[2018-03-14][15-57-08]-2126988665', '2018-03-15', '01:38:26', ''),
(730, 81, NULL, '[2018-03-14][18-38-26]-626665563.jpg', 'docu', '[2018-03-14][15-57-08]-2126988665', '2018-03-15', '01:38:26', ''),
(731, 81, NULL, '[2018-03-14][18-38-26]-309351887.jpg', 'docu', '[2018-03-14][15-57-08]-2126988665', '2018-03-15', '01:38:26', ''),
(732, 81, NULL, '[2018-03-14][18-38-26]-754804616.jpg', 'docu', '[2018-03-14][15-57-08]-2126988665', '2018-03-15', '01:38:26', ''),
(733, 81, NULL, '[2018-03-14][18-38-48]-866971392.jpg', 'docu', '[2018-03-14][15-57-08]-2126988665', '2018-03-15', '01:38:48', ''),
(734, 81, NULL, '[2018-03-14][18-38-48]-1981049921.jpg', 'docu', '[2018-03-14][15-57-08]-2126988665', '2018-03-15', '01:38:48', ''),
(735, 81, NULL, '[2018-03-14][18-38-48]-313127933.jpg', 'docu', '[2018-03-14][15-57-08]-2126988665', '2018-03-15', '01:38:48', ''),
(736, 81, NULL, '[2018-03-14][18-38-48]-1987061838.jpg', 'docu', '[2018-03-14][15-57-08]-2126988665', '2018-03-15', '01:38:48', ''),
(737, 81, NULL, '[2018-03-14][18-38-48]-228862410.jpg', 'docu', '[2018-03-14][15-57-08]-2126988665', '2018-03-15', '01:38:48', ''),
(738, 81, NULL, '[2018-03-14][18-38-55]-1888137199.jpg', 'docu', '[2018-03-14][15-57-08]-2126988665', '2018-03-15', '01:38:55', ''),
(739, 81, NULL, '[2018-03-14][18-38-55]-635440808.jpg', 'docu', '[2018-03-14][15-57-08]-2126988665', '2018-03-15', '01:38:55', ''),
(740, 81, NULL, '[2018-03-14][18-38-55]-2128026758.jpg', 'docu', '[2018-03-14][15-57-08]-2126988665', '2018-03-15', '01:38:55', ''),
(741, 81, NULL, '[2018-03-14][18-38-55]-284518961.jpg', 'docu', '[2018-03-14][15-57-08]-2126988665', '2018-03-15', '01:38:55', ''),
(742, 81, NULL, '[2018-03-14][18-38-55]-1022839144.jpg', 'docu', '[2018-03-14][15-57-08]-2126988665', '2018-03-15', '01:38:55', ''),
(743, 82, NULL, '[2018-03-14][18-40-45]-255168079.jpg', 'docu', 'Senior High School pre-assessment - Oct. 1 & 9, 2017', '2018-03-15', '01:40:45', ''),
(744, 82, NULL, '[2018-03-14][18-40-45]-2072284792.jpg', 'docu', 'Senior High School pre-assessment - Oct. 1 & 9, 2017', '2018-03-15', '01:40:45', ''),
(745, 82, NULL, '[2018-03-14][18-40-45]-1417505316.jpg', 'docu', 'Senior High School pre-assessment - Oct. 1 & 9, 2017', '2018-03-15', '01:40:45', ''),
(746, 82, NULL, '[2018-03-14][18-40-45]-615971007.jpg', 'docu', 'Senior High School pre-assessment - Oct. 1 & 9, 2017', '2018-03-15', '01:40:45', ''),
(747, 82, NULL, '[2018-03-14][18-40-45]-1878895934.jpg', 'docu', 'Senior High School pre-assessment - Oct. 1 & 9, 2017', '2018-03-15', '01:40:45', ''),
(748, 82, NULL, '[2018-03-14][18-40-53]-1381215555.jpg', 'docu', 'Senior High School pre-assessment - Oct. 1 & 9, 2017', '2018-03-15', '01:40:53', ''),
(749, 82, NULL, '[2018-03-14][18-40-53]-1500305634.jpg', 'docu', 'Senior High School pre-assessment - Oct. 1 & 9, 2017', '2018-03-15', '01:40:53', ''),
(750, 82, NULL, '[2018-03-14][18-40-53]-596053240.jpg', 'docu', 'Senior High School pre-assessment - Oct. 1 & 9, 2017', '2018-03-15', '01:40:53', ''),
(751, 82, NULL, '[2018-03-14][18-40-53]-445381303.jpg', 'docu', 'Senior High School pre-assessment - Oct. 1 & 9, 2017', '2018-03-15', '01:40:53', ''),
(752, 82, NULL, '[2018-03-14][18-40-53]-1141747509.jpg', 'docu', 'Senior High School pre-assessment - Oct. 1 & 9, 2017', '2018-03-15', '01:40:53', ''),
(753, 82, NULL, '[2018-03-14][18-41-01]-779856400.jpg', 'docu', 'Senior High School pre-assessment - Oct. 1 & 9, 2017', '2018-03-15', '01:41:01', ''),
(754, 82, NULL, '[2018-03-14][18-41-01]-1522697707.jpg', 'docu', 'Senior High School pre-assessment - Oct. 1 & 9, 2017', '2018-03-15', '01:41:01', ''),
(755, 82, NULL, '[2018-03-14][18-41-01]-440894254.jpg', 'docu', 'Senior High School pre-assessment - Oct. 1 & 9, 2017', '2018-03-15', '01:41:01', ''),
(756, 82, NULL, '[2018-03-14][18-41-01]-445762636.jpg', 'docu', 'Senior High School pre-assessment - Oct. 1 & 9, 2017', '2018-03-15', '01:41:01', ''),
(757, 82, NULL, '[2018-03-14][18-41-01]-1692526785.jpg', 'docu', 'Senior High School pre-assessment - Oct. 1 & 9, 2017', '2018-03-15', '01:41:01', ''),
(758, 82, NULL, '[2018-03-14][18-41-09]-473012527.jpg', 'docu', 'Senior High School pre-assessment - Oct. 1 & 9, 2017', '2018-03-15', '01:41:09', ''),
(759, 82, NULL, '[2018-03-14][18-41-09]-1581250468.jpg', 'docu', 'Senior High School pre-assessment - Oct. 1 & 9, 2017', '2018-03-15', '01:41:09', ''),
(760, 82, NULL, '[2018-03-14][18-41-09]-434210793.jpg', 'docu', 'Senior High School pre-assessment - Oct. 1 & 9, 2017', '2018-03-15', '01:41:09', ''),
(761, 83, NULL, '[2018-03-14][18-49-22]-2045700827.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:49:22', ''),
(762, 83, NULL, '[2018-03-14][18-49-22]-1607201329.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:49:22', ''),
(763, 83, NULL, '[2018-03-14][18-49-22]-1862474545.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:49:22', ''),
(764, 83, NULL, '[2018-03-14][18-49-22]-982047500.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:49:23', ''),
(765, 83, NULL, '[2018-03-14][18-49-23]-994123578.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:49:23', ''),
(766, 83, NULL, '[2018-03-14][18-49-29]-590577956.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:49:29', ''),
(767, 83, NULL, '[2018-03-14][18-49-29]-767150956.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:49:29', ''),
(768, 83, NULL, '[2018-03-14][18-49-29]-327595209.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:49:29', ''),
(769, 83, NULL, '[2018-03-14][18-49-29]-871263876.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:49:29', ''),
(770, 83, NULL, '[2018-03-14][18-49-29]-1194554390.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:49:29', ''),
(771, 83, NULL, '[2018-03-14][18-49-38]-174909701.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:49:38', ''),
(772, 83, NULL, '[2018-03-14][18-49-38]-447484723.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:49:38', ''),
(773, 83, NULL, '[2018-03-14][18-49-38]-822517337.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:49:38', ''),
(774, 83, NULL, '[2018-03-14][18-49-38]-2004023753.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:49:38', ''),
(775, 83, NULL, '[2018-03-14][18-49-38]-1267535828.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:49:38', ''),
(776, 83, NULL, '[2018-03-14][18-49-48]-1558102738.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:49:48', ''),
(777, 83, NULL, '[2018-03-14][18-49-48]-515177189.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:49:48', ''),
(778, 83, NULL, '[2018-03-14][18-49-48]-128364092.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:49:48', ''),
(779, 83, NULL, '[2018-03-14][18-49-48]-378063922.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:49:48', ''),
(780, 83, NULL, '[2018-03-14][18-49-48]-1907688849.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:49:48', ''),
(781, 83, NULL, '[2018-03-14][18-50-01]-272976879.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:50:01', ''),
(782, 83, NULL, '[2018-03-14][18-50-01]-527280672.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:50:01', ''),
(783, 83, NULL, '[2018-03-14][18-50-01]-1792217014.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:50:01', ''),
(784, 83, NULL, '[2018-03-14][18-50-01]-1871636025.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:50:01', ''),
(785, 83, NULL, '[2018-03-14][18-50-02]-353215194.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:50:02', ''),
(786, 83, NULL, '[2018-03-14][18-50-11]-1038948892.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:50:11', ''),
(787, 83, NULL, '[2018-03-14][18-50-11]-82697033.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:50:11', ''),
(788, 83, NULL, '[2018-03-14][18-50-12]-1636415099.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:50:12', ''),
(789, 83, NULL, '[2018-03-14][18-50-12]-1328092428.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:50:12', ''),
(790, 83, NULL, '[2018-03-14][18-50-12]-1941641660.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:50:12', ''),
(791, 83, NULL, '[2018-03-14][18-50-22]-122301533.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:50:22', ''),
(792, 83, NULL, '[2018-03-14][18-50-22]-145539092.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:50:22', ''),
(793, 83, NULL, '[2018-03-14][18-50-22]-621566066.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:50:22', ''),
(794, 83, NULL, '[2018-03-14][18-50-22]-1850354884.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:50:22', ''),
(795, 83, NULL, '[2018-03-14][18-50-22]-1238279438.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:50:22', ''),
(796, 83, NULL, '[2018-03-14][18-50-35]-2143516557.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:50:35', ''),
(797, 83, NULL, '[2018-03-14][18-50-35]-1604484610.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:50:35', ''),
(798, 83, NULL, '[2018-03-14][18-50-35]-2043918340.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:50:35', ''),
(799, 83, NULL, '[2018-03-14][18-50-35]-743854966.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:50:35', ''),
(800, 83, NULL, '[2018-03-14][18-50-35]-1248449748.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:50:35', ''),
(801, 83, NULL, '[2018-03-14][18-50-47]-395383295.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:50:47', ''),
(802, 83, NULL, '[2018-03-14][18-50-47]-479273151.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:50:47', ''),
(803, 83, NULL, '[2018-03-14][18-50-47]-256833645.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:50:47', ''),
(804, 83, NULL, '[2018-03-14][18-50-47]-36666300.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:50:47', ''),
(805, 83, NULL, '[2018-03-14][18-50-48]-1657250534.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:50:48', ''),
(806, 83, NULL, '[2018-03-14][18-50-56]-59725099.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:50:56', ''),
(807, 83, NULL, '[2018-03-14][18-50-56]-553850100.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:50:56', ''),
(808, 83, NULL, '[2018-03-14][18-50-56]-1027172047.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:50:56', ''),
(809, 83, NULL, '[2018-03-14][18-50-56]-915397806.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:50:56', ''),
(810, 83, NULL, '[2018-03-14][18-50-56]-929429131.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:50:56', ''),
(811, 83, NULL, '[2018-03-14][18-51-04]-15051314.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:51:04', ''),
(812, 83, NULL, '[2018-03-14][18-51-04]-1145369186.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:51:04', ''),
(813, 83, NULL, '[2018-03-14][18-51-04]-1883436132.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:51:04', ''),
(814, 83, NULL, '[2018-03-14][18-51-04]-1721275674.jpg', 'docu', '[2018-03-14][15-59-41]-1152710210', '2018-03-15', '01:51:04', ''),
(815, 97, NULL, '[2018-03-14][19-00-59]-2044306851.jpg', 'docu', 'SSG', '2018-03-15', '02:00:59', ''),
(816, 97, NULL, '[2018-03-14][19-00-59]-1152624189.jpg', 'docu', 'SSG', '2018-03-15', '02:00:59', ''),
(817, 97, NULL, '[2018-03-14][19-00-59]-600714101.jpg', 'docu', 'SSG', '2018-03-15', '02:00:59', ''),
(818, 97, NULL, '[2018-03-14][19-00-59]-1367799825.jpg', 'docu', 'SSG', '2018-03-15', '02:00:59', ''),
(819, 97, NULL, '[2018-03-14][19-00-59]-817696338.jpg', 'docu', 'SSG', '2018-03-15', '02:00:59', ''),
(820, 97, NULL, '[2018-03-14][19-01-12]-1049165003.jpg', 'docu', '[2018-03-14][18-59-58]-1629039524', '2018-03-15', '02:01:12', ''),
(821, 97, NULL, '[2018-03-14][19-01-12]-114494650.jpg', 'docu', '[2018-03-14][18-59-58]-1629039524', '2018-03-15', '02:01:12', ''),
(822, 97, NULL, '[2018-03-14][19-01-13]-1982036779.jpg', 'docu', '[2018-03-14][18-59-58]-1629039524', '2018-03-15', '02:01:13', ''),
(823, 97, NULL, '[2018-03-14][19-01-13]-1264322360.jpg', 'docu', '[2018-03-14][18-59-58]-1629039524', '2018-03-15', '02:01:13', ''),
(824, 97, NULL, '[2018-03-14][19-01-13]-974552189.jpg', 'docu', '[2018-03-14][18-59-58]-1629039524', '2018-03-15', '02:01:13', ''),
(825, 97, NULL, '[2018-03-14][19-01-22]-760199733.jpg', 'docu', '[2018-03-14][18-59-58]-1629039524', '2018-03-15', '02:01:22', ''),
(826, 97, NULL, '[2018-03-14][19-01-22]-1409417180.jpg', 'docu', '[2018-03-14][18-59-58]-1629039524', '2018-03-15', '02:01:22', ''),
(827, 97, NULL, '[2018-03-14][19-01-22]-1447171670.jpg', 'docu', '[2018-03-14][18-59-58]-1629039524', '2018-03-15', '02:01:22', ''),
(828, 97, NULL, '[2018-03-14][19-01-22]-1026647851.jpg', 'docu', '[2018-03-14][18-59-58]-1629039524', '2018-03-15', '02:01:22', ''),
(829, 97, NULL, '[2018-03-14][19-01-22]-1666249877.jpg', 'docu', '[2018-03-14][18-59-58]-1629039524', '2018-03-15', '02:01:22', ''),
(830, 97, NULL, '[2018-03-14][19-01-29]-549551412.jpg', 'docu', '[2018-03-14][18-59-58]-1629039524', '2018-03-15', '02:01:29', ''),
(831, 97, NULL, '[2018-03-14][19-01-30]-143208771.jpg', 'docu', '[2018-03-14][18-59-58]-1629039524', '2018-03-15', '02:01:30', ''),
(832, 97, NULL, '[2018-03-14][19-01-30]-503376854.jpg', 'docu', '[2018-03-14][18-59-58]-1629039524', '2018-03-15', '02:01:30', ''),
(833, 97, NULL, '[2018-03-14][19-01-30]-1948477541.jpg', 'docu', '[2018-03-14][18-59-58]-1629039524', '2018-03-15', '02:01:30', ''),
(834, 97, NULL, '[2018-03-14][19-01-30]-49401895.jpg', 'docu', '[2018-03-14][18-59-58]-1629039524', '2018-03-15', '02:01:30', ''),
(835, 97, NULL, '[2018-03-14][19-02-57]-475213484.jpg', 'docu', '[2018-03-14][18-59-58]-1629039524', '2018-03-15', '02:02:57', ''),
(836, 97, NULL, '[2018-03-14][19-02-58]-634068798.jpg', 'docu', '[2018-03-14][18-59-58]-1629039524', '2018-03-15', '02:02:58', ''),
(837, 97, NULL, '[2018-03-14][19-02-58]-1531226200.jpg', 'docu', '[2018-03-14][18-59-58]-1629039524', '2018-03-15', '02:02:58', ''),
(838, 97, NULL, '[2018-03-14][19-02-58]-1870699896.jpg', 'docu', '[2018-03-14][18-59-58]-1629039524', '2018-03-15', '02:02:58', ''),
(839, 97, NULL, '[2018-03-14][19-02-58]-287199084.jpg', 'docu', '[2018-03-14][18-59-58]-1629039524', '2018-03-15', '02:02:58', ''),
(840, 97, NULL, '[2018-03-14][19-04-00]-748537336.jpg', 'docu', '[2018-03-14][18-59-58]-1629039524', '2018-03-15', '02:04:00', ''),
(841, 97, NULL, '[2018-03-14][19-04-01]-1239457106.jpg', 'docu', '[2018-03-14][18-59-58]-1629039524', '2018-03-15', '02:04:01', ''),
(842, 97, NULL, '[2018-03-14][19-04-01]-1601768504.jpg', 'docu', '[2018-03-14][18-59-58]-1629039524', '2018-03-15', '02:04:01', ''),
(843, 97, NULL, '[2018-03-14][19-04-01]-1847501020.jpg', 'docu', '[2018-03-14][18-59-58]-1629039524', '2018-03-15', '02:04:01', '');
INSERT INTO `cms_image` (`cms_image_ID`, `cms_album_ID`, `cms_image_title`, `cms_image_name`, `cms_image_dir`, `cms_album_name`, `cms_image_date`, `cms_image_time`, `cms_img_cap`) VALUES
(844, 97, NULL, '[2018-03-14][19-04-01]-2054401355.jpg', 'docu', '[2018-03-14][18-59-58]-1629039524', '2018-03-15', '02:04:01', ''),
(845, 97, NULL, '[2018-03-14][19-04-11]-1972392101.jpg', 'docu', '[2018-03-14][18-59-58]-1629039524', '2018-03-15', '02:04:11', ''),
(846, 97, NULL, '[2018-03-14][19-04-11]-17225300.jpg', 'docu', '[2018-03-14][18-59-58]-1629039524', '2018-03-15', '02:04:11', ''),
(847, 97, NULL, '[2018-03-14][19-04-12]-700097931.jpg', 'docu', '[2018-03-14][18-59-58]-1629039524', '2018-03-15', '02:04:12', ''),
(848, 97, NULL, '[2018-03-14][19-04-12]-487310410.jpg', 'docu', '[2018-03-14][18-59-58]-1629039524', '2018-03-15', '02:04:12', ''),
(849, 97, NULL, '[2018-03-14][19-04-12]-2138706942.jpg', 'docu', '[2018-03-14][18-59-58]-1629039524', '2018-03-15', '02:04:12', ''),
(850, 97, NULL, '[2018-03-14][19-04-21]-1475656078.jpg', 'docu', '[2018-03-14][18-59-58]-1629039524', '2018-03-15', '02:04:21', ''),
(851, 97, NULL, '[2018-03-14][19-04-21]-1611657774.jpg', 'docu', '[2018-03-14][18-59-58]-1629039524', '2018-03-15', '02:04:21', ''),
(852, 97, NULL, '[2018-03-14][19-04-21]-340757102.jpg', 'docu', '[2018-03-14][18-59-58]-1629039524', '2018-03-15', '02:04:21', ''),
(853, 97, NULL, '[2018-03-14][19-04-21]-1872048506.jpg', 'docu', '[2018-03-14][18-59-58]-1629039524', '2018-03-15', '02:04:21', ''),
(854, 97, NULL, '[2018-03-14][19-04-21]-1329322616.jpg', 'docu', '[2018-03-14][18-59-58]-1629039524', '2018-03-15', '02:04:21', ''),
(855, 97, NULL, '[2018-03-14][19-04-21]-654634132.jpg', 'docu', '[2018-03-14][18-59-58]-1629039524', '2018-03-15', '02:04:21', ''),
(856, 98, NULL, '[2018-03-14][19-10-34]-172785022.jpg', 'docu', '07/14/2017 Meeting with BUCS-CSIT Department', '2018-03-15', '02:10:34', ''),
(857, 98, NULL, '[2018-03-14][19-10-34]-869362854.jpg', 'docu', '07/14/2017 Meeting with BUCS-CSIT Department', '2018-03-15', '02:10:34', ''),
(858, 98, NULL, '[2018-03-14][19-10-34]-1380282647.jpg', 'docu', '07/14/2017 Meeting with BUCS-CSIT Department', '2018-03-15', '02:10:34', ''),
(859, 98, NULL, '[2018-03-14][19-10-34]-90688579.jpg', 'docu', '07/14/2017 Meeting with BUCS-CSIT Department', '2018-03-15', '02:10:34', ''),
(860, 98, NULL, '[2018-03-14][19-10-34]-360492547.jpg', 'docu', '07/14/2017 Meeting with BUCS-CSIT Department', '2018-03-15', '02:10:34', ''),
(861, 98, NULL, '[2018-03-14][19-10-43]-283450312.jpg', 'docu', '07/14/2017 Meeting with BUCS-CSIT Department', '2018-03-15', '02:10:43', ''),
(862, 98, NULL, '[2018-03-14][19-10-43]-455946498.jpg', 'docu', '07/14/2017 Meeting with BUCS-CSIT Department', '2018-03-15', '02:10:43', ''),
(863, 98, NULL, '[2018-03-14][19-10-44]-1291021930.jpg', 'docu', '07/14/2017 Meeting with BUCS-CSIT Department', '2018-03-15', '02:10:44', ''),
(864, 98, NULL, '[2018-03-14][19-10-44]-1400079166.jpg', 'docu', '07/14/2017 Meeting with BUCS-CSIT Department', '2018-03-15', '02:10:44', ''),
(865, 98, NULL, '[2018-03-14][19-10-44]-2055716594.jpg', 'docu', '07/14/2017 Meeting with BUCS-CSIT Department', '2018-03-15', '02:10:44', ''),
(866, 98, NULL, '[2018-03-14][19-10-58]-2021181414.jpg', 'docu', '07/14/2017 Meeting with BUCS-CSIT Department', '2018-03-15', '02:10:58', ''),
(867, 98, NULL, '[2018-03-14][19-10-58]-352719341.jpg', 'docu', '07/14/2017 Meeting with BUCS-CSIT Department', '2018-03-15', '02:10:58', ''),
(868, 98, NULL, '[2018-03-14][19-10-59]-1893761017.jpg', 'docu', '07/14/2017 Meeting with BUCS-CSIT Department', '2018-03-15', '02:10:59', ''),
(869, 98, NULL, '[2018-03-14][19-10-59]-1324949405.jpg', 'docu', '07/14/2017 Meeting with BUCS-CSIT Department', '2018-03-15', '02:10:59', ''),
(870, 98, NULL, '[2018-03-14][19-10-59]-524538962.jpg', 'docu', '07/14/2017 Meeting with BUCS-CSIT Department', '2018-03-15', '02:10:59', ''),
(871, 98, NULL, '[2018-03-14][19-11-06]-1941943646.jpg', 'docu', '07/14/2017 Meeting with BUCS-CSIT Department', '2018-03-15', '02:11:06', ''),
(872, 98, NULL, '[2018-03-14][19-11-06]-243536760.jpg', 'docu', '07/14/2017 Meeting with BUCS-CSIT Department', '2018-03-15', '02:11:06', ''),
(874, 7, 'Promotion or Graduation Rates', '[2018-03-17][12-26-42]-295015318.png', 'sp', NULL, '2018-03-17', '00:00:00', '<p>School Year 2013 - 2015</p>\r\n'),
(877, 12, NULL, '[2018-03-19][06-16-23]-1118809414.jpg', 'header', NULL, '2018-03-19', '00:00:00', ''),
(878, 12, NULL, '[2018-03-19][06-16-32]-890838892.jpg', 'header', NULL, '2018-03-19', '00:00:00', ''),
(883, 7, 'National Achievement Test Results', '[2018-03-19][06-21-27]-140940986.png', 'sp', NULL, '2018-03-19', '00:00:00', '<p>From year 2005 - 2015</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `cms_memo`
--

CREATE TABLE `cms_memo` (
  `cms_memo_ID` int(11) UNSIGNED NOT NULL,
  `cms_subject` varchar(150) NOT NULL,
  `cms_memo_description` longtext NOT NULL,
  `cms_memo_date` date NOT NULL,
  `cms_recipient` varchar(150) NOT NULL,
  `cms_account_id` int(10) UNSIGNED NOT NULL,
  `cms_memo_pdf_dir` text NOT NULL,
  `cms_memo_img_dir` text NOT NULL,
  `cms_memo_date_created` date NOT NULL,
  `cms_memo_time_created` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_memo`
--

INSERT INTO `cms_memo` (`cms_memo_ID`, `cms_subject`, `cms_memo_description`, `cms_memo_date`, `cms_recipient`, `cms_account_id`, `cms_memo_pdf_dir`, `cms_memo_img_dir`, `cms_memo_date_created`, `cms_memo_time_created`) VALUES
(8, 'DESIGNATION', '<p>For Mr. Paul Baluis</p>\r\n', '2018-02-22', '', 8, 'memo/[2018-03-14][12-33-26]-2019924945.pdf', '', '0000-00-00', '00:00:00'),
(10, 'Music Lessons', '<p>Basic Guitar Lessons! Look for Mrs. De la Cruz.</p>\r\n', '2018-03-13', '', 8, 'memo/[2018-03-14][12-31-08]-1506319992.pdf', '', '0000-00-00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cms_news`
--

CREATE TABLE `cms_news` (
  `cms_news_ID` int(11) UNSIGNED NOT NULL,
  `cms_title` varchar(100) NOT NULL,
  `cms_news_description` longtext NOT NULL,
  `cms_news_date` date NOT NULL,
  `cms_account_id` int(10) UNSIGNED NOT NULL,
  `cms_news_img_dir` longtext NOT NULL,
  `cms_news_img_cap` text NOT NULL,
  `cms_news_writer` varchar(100) NOT NULL,
  `cms_news_date_created` date NOT NULL,
  `cms_news_time_created` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_news`
--

INSERT INTO `cms_news` (`cms_news_ID`, `cms_title`, `cms_news_description`, `cms_news_date`, `cms_account_id`, `cms_news_img_dir`, `cms_news_img_cap`, `cms_news_writer`, `cms_news_date_created`, `cms_news_time_created`) VALUES
(14, 'PNHS Ranks first in division TAYO Awards', '<p style="margin-left:0in; margin-right:0in; text-align:justify"><span style="font-size:16px"><span style="font-family:Arial,Helvetica,sans-serif">True to its commitment to excellence, the Pag-asa for Environment in School Organization (PESO) won in the Division Search for Ten Accomplished Youth Organizations (TAYO) on September 15, 2016.</span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in; text-align:justify"><span style="font-size:16px"><span style="font-family:Arial,Helvetica,sans-serif">TAYO Awards is organized annually by the TAYO Awards Foundation Inc., in collaboration with the National Youth Commission (NYC), Coca-Cola Foundation and the Office of Senator Bam Aquino.</span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in; text-align:justify"><span style="font-size:16px"><span style="font-family:Arial,Helvetica,sans-serif">Aside from Pag-asa National High School, there were six other schools from the division of Legazpi which competed to bag the said award by presenting their organization&rsquo;s program in front of the panel of judges.</span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in; text-align:justify"><span style="font-size:16px"><span style="font-family:Arial,Helvetica,sans-serif">Represented by Zelvy G. Arao, the PESO president, PNHS ranked first on the search.</span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in; text-align:justify"><span style="font-size:16px"><span style="font-family:Arial,Helvetica,sans-serif">&ldquo;Winning this award wasn&rsquo;t just my success it was also the school&rsquo;s (success) since we all worked hard for it.&rdquo; Arao concluded.</span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in; text-align:justify">&nbsp;</p>\r\n', '2017-10-14', 10, 'news/[2018-03-14][08-15-26]-1710197413.jpg', 'test', 'April Cruz', '0000-00-00', '00:00:00'),
(19, 'Pag-asa represents PH in int''l ''hope'' fair', '<p style="text-align:justify"><span style="font-size:16px"><span style="background-color:#ffffff; color:#333333; font-family:Verdana,sans-serif">Pag-asa National High School (PNHS) represented the country in the recently held International Linkage Community (ILC) in Kuala Lumpur, Malaysia from September 24 to 28, 2016.Now on its second year, the ILC, with the goal of establishing a platform through which Southeast Asian students and educators can learn from one another, had its first Philippine delegation.</span></span></p>\r\n\r\n<p style="text-align:justify"><span style="font-size:16px"><span style="background-color:#ffffff; color:#333333; font-family:Verdana,sans-serif">&quot;It is an honor to have received the invitation.&quot; PNHS Principal Jeremy Cruz shared. The school caught the organizers&#39; attention when it was featured internationally for &#39;Bike Mo, Pag-asa Ko&#39; program. &quot;The fact that the organizers chose us from among thousands of other schools means something,&quot; Cruz added.&quot;This year&#39;s ILC was much more joyful and exciting because we have the Philippines, the most active and friendly delegation,&quot; said Nur Farahanna Binti Suid, one of the liaison officers assigned to the PNHS group.Other participating schools include Sekolah CikalSecondary and SMP Tunas Unggul, both from Indonesia, Hiroshima Perfectual Itsukaichi Senior High School from Japan, and King&#39;s College of Thailand. The group was comprised of school head Jeremy A. Cruz, assistant school head Teresita Biron, and ten students namely Ivan Lloyd Arania, Resylray Bien, Adrienne Mae Realingo, and Vera Mae Gaveria (10 - STEC), Cheene Jane Agao and Maria Luisa Cuevas (9 - STEC), George Philip Baronia from (9 - England), Aujel Orosco (8 - STEC) and Francis Guiriba and Romeo Manuel Bongais (7 - STEC). &quot;It felt surreal. In a short period, I learned so much about the culture of other countries from my co-participants. I made a lot of friends as well.&quot; On the first day, the 12 Filipino delegates got emotional and teary-eyed as they raised the Philippine Flag and sang the National Anthem, together with the other five countries. The second day saw various experiences for the PNHS contingent, as the twelve delegates were toured by the liaison officers around Craft Complex, showcasing the country&#39;s native handicrafts which they observed were similar to those made in the Philippines. They were also given a chance to visit the famous Petronas Twin Towers - one of the highest twin towers in the world. &quot;It was fun. We went to different tourist spots.&quot; Gaveria said. Competitions were then held on the third day. Resylray Bien participated in public speaking, Ivan Lloyd Arana in table tennis, and George Phillip Baronia and Aujel Orosco in chess. In the evening of that day, the PNHS students sang and danced to Tatlong Bibe, Sarong Banggui and Ray Valera&#39;s Anak. &quot;I felt really nervous during that time because it&#39;s my first time performing on an international stage, but after hearing other countries cheer and clap, my confidence built up,&quot; said Francis Guiriba. On the fourth day, each country had both exhibits showcasing the respective nation&#39;s culture. PNHS proudly presented the Filipino culture highlighting Bicolano products (which included pili nuts and sili keychains), as well as the landscape surrounding Mayon Volcano. The ten Pag-asa students also performed at the cultural Bicolano epic Ibalong.&quot;We will surely &#39;Gombak&#39; here in Gombak, Kuala Lumpur Malaysia,&quot; said Gaveria.</span></span></p>\r\n', '2016-09-24', 10, 'news/[2018-02-21][23-59-21]-1676812424.jpg', 'Pag-asa National High School (PNHS) represented the country in the recently held International Linkage Community (ILC) in Kuala Lumpur, Malaysia from September 24 to 28, 2016.', 'Adrienne Realingo', '0000-00-00', '00:00:00'),
(20, 'Miss World PH 2016 Catriona Gray visits PNHS', '<p><span style="font-size:14px">&quot;Be yourself.&quot;<br />\r\nThat&#39;s the advice of Miss World Philippines 2016 Catriona Magnayon Gray to reigning Miss PNHS 2016 to Imari Lene Balgamino and Miss SPED Pamela Loteria.</span></p>\r\n\r\n<p><span style="font-size:14px">Gray, whose mother hails from Oas, Albay, drew a huge adoring crowd when she dropped by Pag-asa on October 12. 2016 as part of her homecoming tour.</span></p>\r\n\r\n<p><span style="font-size:14px">Accompanied by Albay 2nd District Representative Joey S. Salceda, Miss World Philippines National Director and PDI columnist Cory Quirino, the stunner was all game answering questions from Miss SPED and Miss PNHS.</span></p>\r\n\r\n<p><span style="font-size:14px">Loteria asked for pageant tips as she plans to join Miss Deaf Bicolandia in the near future. Interpreted by Mrs. Celeste Omanga, the question was graciously answered by Gray.</span></p>\r\n\r\n<p><span style="font-size:14px">Loteria&#39;s interaction with Gray elicited a warm reaction from the crowd and the visitors. Salceda borrowed a student&#39;s handkerchief to wipe off the tears welling up in his eyes.</span></p>\r\n\r\n<p><span style="font-size:14px">The crowd then listened to Gray share her life experiences both in the Philippines and Australia. She related how excited she was about her Albay homecoming.</span></p>\r\n\r\n<p><span style="font-size:14px">Towards the end of the short program prepared for her by the school admin, Gray thanked the PNHS community for the &#39;warmest welcome&#39; she had experienced--a statement which was met with even louder cheers from the students.</span></p>\r\n', '2018-03-17', 10, 'news/[2018-03-17][11-11-25]-2048634266.jpg', 'Rep. Joey Salceda along with Mr. Jeremy Cruz and Miss World PH 2016, Catriona Gray', 'Ruby Llenaresas', '0000-00-00', '00:00:00'),
(21, 'Cruz: We dedicate Buwan ng Wika to our SPED students', '<p><span style="font-size:14px">In line with Pag-asa National High School&#39;s push fr a more inclusive SPED and the celebration of the Buwan ng Wika, the Filipino Department held the &quot;Wika ng Manikin&quot; on August 25, 2016.</span></p>\r\n\r\n<p><span style="font-size:14px">&quot;Our Wika ng Manikin aims to instill minds of everyone that even with hearing or visual impairment, with intellectual disability...like everybosy else have their own distinct language that needs to be expressed&quot; Cruz said.</span></p>\r\n\r\n<p><span style="font-size:14px">At the start of the program, the stage curtains were drawn to the side as seven students, led by Miss SPED Pamela Loteria appeared in their dignified standing pose portraying live mannequins.</span></p>\r\n\r\n<p><span style="font-size:14px">Throughout the day, a total of 56 pairs of students donned their national costumewhich they themselves made using indigenous materials.&nbsp;</span></p>\r\n\r\n<p><span style="font-size:14px">The school faculty and staff received a loud applause from the crowd of students when they walked like fashion models wearing their native Filipinana and barong tagalog.</span></p>\r\n\r\n<p><span style="font-size:14px">Cruz emphasized that the whole event was mainly intended to give importance to the SPED students.</span></p>\r\n', '2018-03-17', 10, '', '', 'April Cruz', '0000-00-00', '00:00:00'),
(22, 'Pag-asa NHS, one among 5 Brigada Eskwela Best Implementing Schools in Region 5', '<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">In accordance with Regional Memorandum No. 88, the Department of Education Region V selected five Brigada Eskwela Best Implementing Schools, which included Pag-asa National High School under the large secondary category.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">The other four schools in thelist under the large secondary level were Pilar National High School (Sorsogon Division), Sto. Domingo National High School (Albay Division), Alawihao National High School (Camarines Norte Division), and Catanduanes National High School (Catanduanes Division). The categories in the secondary level are divided into three, namely: small. Big and large.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">The top two Best Implementing Schools per category in both elementary and secondary will be considered among the choices for the 2015 Best Brigada Eskwela National Awardee.</span></span></span></p>\r\n', '2015-05-25', 10, '', '', 'Zelvy Arao', '0000-00-00', '00:00:00'),
(23, 'Salceda pledges gym to Pag-asa', '<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Albay Rep. Joey Salceda promised to put up an enclosed gymnasium next year.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">This news was met with loud cheers from the crowd of students and teachers as the former governor accompanied Miss World Philippines 2016 Catriona Gray in the latter&rsquo;s visit on October 14, 2016.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">&ldquo;Nakakaiyak. Andami&nbsp;ng blessings,&rdquo; said an emotional Angela Cross, a PNHS Senior high teacher as Salceda uttered his pledge to the school he calls &ldquo;the best high school in Legazpi City&rdquo;.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Salceda shared how proud he is of PNHS because of the school&rsquo;s efforts to improve the lives of its students, referring instances when the school was covered by national media because of its bike program, among others.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">&ldquo;With that covered stadium, PNHS will no longer need to rent a venue elsewhere tohold huge events,&rdquo; said AP teacher Jeson Balingbing.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">It was Salceda who made possible the homecoming of Catriona Gray.</span></span></span></p>\r\n', '2016-10-14', 10, '', '', 'Judy Trilles', '0000-00-00', '00:00:00'),
(24, 'PNHS Ranks first in division TAYO Awards', '<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">True to its commitment to excellence, the Pag-asa for Environment in School Organization (PESO) won in the Division Search for Ten Accomplished Youth Organizations (TAYO) on September 15, 2016.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">TAYO Awards is organized annually by the TAYO Awards Foundation Inc., in collaboration with the National Youth Commission (NYC), Coca-Cola Foundation and the Office of Senator Bam Aquino.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Aside from Pag-asa National High School, there were six other schools from the division of Legazpi which competed to bag the said award by presenting their organization&rsquo;s program in front of the panel of judges.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Represented by Zelvy G. Arao, the PESO president, PNHS ranked first on the search.</span></span></span></p>\r\n\r\n<p><span style="font-size:11.0pt"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">&ldquo;Winning this award wasn&rsquo;t just my success it was also the school&rsquo;s (success) since we all worked hard for it.&rdquo; Arao concluded.</span></span></p>\r\n', '2016-10-15', 10, '', '', 'April Cruz', '0000-00-00', '00:00:00'),
(25, 'PNHS Smashes LCSHS, 68-61', '<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">It was a ravaging battle between skilled teams. The audience wanted and they delivered. It was a ravaging battle between the best.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">But there had to be a winner. And PNHS spiked up against LCSHS resulting in a smashing victory.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">&ldquo;Ang dami ng nanonood na galling sa City High, tapos ang konti lang sa Pag-asa.&rdquo; PNHS Team Captain Joemar Balmaceda said of the situation which made their morale take a nosedive. Nevertheless, they persisted because they badly wanted to win.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">He PNHS volleyball team decidedly owned the first set, 25-22.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Tables have turned in favor of LCSHS in the second set, 25-18.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">But after all the battles, there came the final and deciding set, where the winners will claim their hard-earned victory and the losers, their socking defeat.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">The game was an intense combat zone. With each spike the audience roared with awe.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">But in the end, PNHS emerged the victor.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">&ldquo;A team that aims together, achieves together. But we&rsquo;ll practice more. LCSHS gave us a good fight.&rdquo; Enthused Balmaceda.</span></span></span></p>\r\n', '2015-03-24', 10, '', '', 'Aujel Orosco', '0000-00-00', '00:00:00'),
(26, 'SSG Pres Bien serves as mini City Councilor for a week', '<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Start &lsquo;em young.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Resylray Bien, PNHS Supreme Student Government President was given a chance to sit as City Councilor during the Celebration of City Youth Week, August 26-30, 2016.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">This is an annual activity done to familiarize chosen Legazpeno student leaders with the functions of various civic departments, Bien who said that it was her first time to attend the event was designated to take the role of the City Councilor Al Francis Bariso. According to her, being in that position was not hard as it seemed to be.</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">&ldquo;Hindi ako nahirapan, dahil nag-enjoy ako at kapag nag eenjoy ka sa isang bagay na ginagawa mo, you&rsquo;&rsquo; find it unexpectedly easy.&rdquo;</span></span></span></p>\r\n\r\n<p style="margin-left:0in; margin-right:0in"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Also, Bien, being the SSG president, stated that this event has given her motivation and ideas in her duties to the whole student body.</span></span></span></p>\r\n\r\n<p><span style="font-size:11.0pt"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">&ldquo;It really was a great contribution to my knowhow about responsible leadership, and at the same time it also gave me experiences that I can use in my job as SSG president of PNHS&hellip;it&rsquo;s fun!&rdquo; Bien concluded.</span></span></p>\r\n', '2016-08-26', 10, '', '', 'Zelvy Arao', '0000-00-00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cms_orgchart`
--

CREATE TABLE `cms_orgchart` (
  `cms_orgchart_ID` int(11) UNSIGNED NOT NULL,
  `cms_orgchart_title` varchar(150) NOT NULL,
  `cms_orgchart_img_name` varchar(150) NOT NULL,
  `cms_orgchart_year1` varchar(4) DEFAULT NULL,
  `cms_orgchart_year2` varchar(4) DEFAULT NULL,
  `cms_orgchart_date` date NOT NULL,
  `cms_orgchart_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_orgchart`
--

INSERT INTO `cms_orgchart` (`cms_orgchart_ID`, `cms_orgchart_title`, `cms_orgchart_img_name`, `cms_orgchart_year1`, `cms_orgchart_year2`, `cms_orgchart_date`, `cms_orgchart_time`) VALUES
(20, 'PNHS Organizational Chart S.Y. 2018 - 2019', '[2018-03-14][23-32-38]-2014519619.jpg', '2018', '2019', '2018-03-14', '13:50:33'),
(21, 'Org Chart', '[2018-03-15][21-28-14]-126774836.jpg', '2017', '2018', '2018-03-16', '04:27:11');

-- --------------------------------------------------------

--
-- Table structure for table `cms_principal`
--

CREATE TABLE `cms_principal` (
  `cms_principal_ID` int(10) UNSIGNED NOT NULL,
  `cms_principal_name` varchar(100) DEFAULT NULL,
  `cms_principal_rank` varchar(150) DEFAULT NULL,
  `cms_principal_img_dir` text,
  `cms_principal_content` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_principal`
--

INSERT INTO `cms_principal` (`cms_principal_ID`, `cms_principal_name`, `cms_principal_rank`, `cms_principal_img_dir`, `cms_principal_content`) VALUES
(1, 'Jeremy Romero Cruz', 'Principal III', 'principal/[2018-03-15][22-54-40]-2004526984.png', '<p><span style="font-size:16px">Welcome to the official website of Pag-asa National High School!</span></p>\r\n\r\n<p><span style="font-size:16px">Pag-asa National High School is a large learning institution with 3, 211 students. Our commitment is to provide a safe and intellectually challenging environment that will empower students to become innovative thinkers, creative problem solvers and inspired learners prepared to thrive in the twenty-first century and we work on this pledge with our stakeholders whose participation we deem so significant.</span></p>\r\n\r\n<p><br />\r\n<span style="font-size:16px">High standards and expectations from each student with regad to academic performance, co-curricular participation, and responsible citizenship are the foundation of our school. It is with pride that we hold these high standards and ask each of our students to commit in maintaining the extraordinary record of achievement and contribution that has been the legacy of Pag-asa National High School. It is the contribution of our students to our school community that makes our school an exceptional learning community. Full participation in academic and co-curricular programs and a willingness to act responsibility as an individual within our educational environment are the factors that enable all to have a successful and enjoyable year.<br />\r\n<br />\r\nI invite you to check out this website. It provides valuable information regarding the opportunities offered to our students and their parents. I look forward to another exciting, meaningful, and successful year for everyone that is a part of our community. Please don&#39;t hesitate to contact us if your have any questions about your school.<br />\r\n<br />\r\nSa Pag-Asa, Aki an Bida.</span></p>\r\n\r\n<p style="text-align:right"><span style="font-size:16px">Sincerely,<br />\r\n<strong>Jeremy Romero Cruz</strong><br />\r\n<strong>Principal III</strong></span></p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `cms_privilege`
--

CREATE TABLE `cms_privilege` (
  `cms_priv_id` int(10) UNSIGNED NOT NULL,
  `job_title_code` varchar(45) NOT NULL,
  `cms_priv` enum('0','1') NOT NULL DEFAULT '0',
  `frms_priv` enum('0','1') NOT NULL DEFAULT '0',
  `frms2_priv` enum('0','1') NOT NULL DEFAULT '0',
  `frms_user_priv` enum('0','1') NOT NULL DEFAULT '0',
  `ipcrms_priv` enum('0','1') NOT NULL DEFAULT '0',
  `ipcrms2_priv` enum('0','1') NOT NULL DEFAULT '0',
  `ipcrms_user_priv` enum('0','1') NOT NULL DEFAULT '0',
  `pms_priv` enum('0','1') NOT NULL DEFAULT '0',
  `pms2_priv` enum('0','1') NOT NULL DEFAULT '0',
  `pms_user_priv` enum('0','1') NOT NULL DEFAULT '0',
  `pims_priv` enum('0','1') NOT NULL DEFAULT '0',
  `pims2_priv` enum('0','1') NOT NULL DEFAULT '0',
  `pims_user_priv` enum('0','1') NOT NULL DEFAULT '0',
  `prs_priv` enum('0','1') NOT NULL DEFAULT '0',
  `prs2_priv` enum('0','1') NOT NULL DEFAULT '0',
  `sis_priv` enum('0','1') NOT NULL DEFAULT '0',
  `sis2_priv` enum('0','1') NOT NULL DEFAULT '0',
  `sis_user_priv` enum('0','1') NOT NULL DEFAULT '0',
  `oes_priv` enum('0','1') NOT NULL DEFAULT '0',
  `scms_priv` enum('0','1') NOT NULL DEFAULT '0',
  `scms_user_priv` enum('0','1') NOT NULL DEFAULT '0',
  `ims_priv` enum('0','1') NOT NULL DEFAULT '0',
  `css_priv` enum('0','1') NOT NULL DEFAULT '0',
  `superadmin_priv` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_privilege`
--

INSERT INTO `cms_privilege` (`cms_priv_id`, `job_title_code`, `cms_priv`, `frms_priv`, `frms2_priv`, `frms_user_priv`, `ipcrms_priv`, `ipcrms2_priv`, `ipcrms_user_priv`, `pms_priv`, `pms2_priv`, `pms_user_priv`, `pims_priv`, `pims2_priv`, `pims_user_priv`, `prs_priv`, `prs2_priv`, `sis_priv`, `sis2_priv`, `sis_user_priv`, `oes_priv`, `scms_priv`, `scms_user_priv`, `ims_priv`, `css_priv`, `superadmin_priv`) VALUES
(2, 'ADOF1', '1', '1', '1', '0', '1', '1', '0', '1', '1', '0', '1', '1', '0', '1', '1', '1', '1', '0', '1', '1', '0', '1', '1', '0'),
(3, 'ASSP', '1', '1', '0', '0', '1', '0', '0', '1', '1', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0'),
(4, 'CASH1', '1', '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '1', '0', '0', '0', '1', '0', '0', '0', '0'),
(5, 'CMM', '0', '1', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '1', '1', '0'),
(7, 'DENT1', '1', '1', '1', '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '0', '0'),
(8, 'DORMG1', '1', '1', '0', '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '0', '0'),
(9, 'EPS', '1', '1', '0', '0', '0', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0'),
(10, 'ESUP1', '1', '1', '0', '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '0', '0'),
(11, 'EXED2', '1', '1', '0', '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '0', '0'),
(12, 'HRM1', '1', '1', '0', '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '0', '0'),
(13, 'HTEACH1', '1', '1', '0', '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '0', '0'),
(14, 'HTEACH2', '1', '1', '0', '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', '1', '0', '1', '0', '0', '0', '1', '0', '1', '0', '0'),
(15, 'HTEACH3', '1', '1', '0', '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '0', '0'),
(16, 'HTEACH4', '1', '1', '0', '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '0', '0'),
(17, 'HTEACH5', '1', '1', '0', '0', '0', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0'),
(18, 'HTEACH6', '1', '1', '0', '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '0', '0'),
(19, 'IAUD1', '1', '1', '0', '0', '0', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0'),
(20, 'ICTD', '1', '1', '0', '0', '0', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1', '0', '0'),
(21, 'INFOSA2', '1', '1', '0', '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '0', '0'),
(22, 'INST1', '1', '1', '0', '0', '0', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '0', '1', '0', '0', '0', '0'),
(23, 'INST2', '1', '1', '0', '0', '0', '0', '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0'),
(24, 'INST3', '1', '1', '0', '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '1', '0'),
(25, 'LIS', '1', '1', '0', '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '0', '0'),
(26, 'MDOF2', '1', '1', '0', '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '0', '0'),
(27, 'MTCHR1', '1', '1', '0', '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '1', '0'),
(28, 'MTCHR2', '1', '1', '0', '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '0', '0'),
(29, 'MTCHR3', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '1', '0'),
(30, 'MTCHR4', '1', '1', '0', '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '0', '0'),
(31, 'NURS1', '1', '1', '0', '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '0', '0'),
(32, 'PDO1', '1', '1', '0', '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '0', '0'),
(33, 'PPROS', '1', '1', '0', '0', '0', '0', '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0'),
(34, 'R1', '1', '1', '0', '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '0', '0'),
(35, 'RK1', '1', '1', '0', '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '0', '0'),
(36, 'SADAS1', '1', '1', '0', '0', '0', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0'),
(37, 'SECG1', '1', '1', '0', '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '0', '0'),
(38, 'SECSP2', '1', '1', '0', '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '0', '0'),
(39, 'SP1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1'),
(40, 'SP2', '1', '1', '0', '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '0', '0'),
(41, 'SP3', '1', '1', '0', '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', '1', '0', '1', '0', '0', '0', '1', '0', '1', '0', '0'),
(42, 'SP4', '1', '1', '0', '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '0', '0'),
(43, 'SPET1', '1', '1', '0', '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '0', '0'),
(44, 'SPSP1', '1', '1', '0', '0', '0', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0'),
(45, 'SPSP2', '1', '1', '0', '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '0', '0'),
(47, 'SUO1', '1', '1', '0', '0', '0', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1', '0', '0'),
(48, 'TCH1', '1', '1', '0', '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '0', '0'),
(49, 'TCH2', '1', '1', '0', '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '1', '0'),
(50, 'TCH3', '1', '1', '0', '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '0', '0'),
(51, 'UTW1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '1', '0'),
(52, 'VOCSS', '1', '1', '0', '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `cms_project`
--

CREATE TABLE `cms_project` (
  `cms_project_ID` int(10) UNSIGNED NOT NULL,
  `cms_project_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cms_site_content`
--

CREATE TABLE `cms_site_content` (
  `cms_content_ID` int(255) NOT NULL,
  `cms_content_label` varchar(100) NOT NULL,
  `cms_content_desc` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_site_content`
--

INSERT INTO `cms_site_content` (`cms_content_ID`, `cms_content_label`, `cms_content_desc`) VALUES
(1, 'history', '<p><span style="font-size:16px"><strong>Pag-asa National High School</strong> is located at Pag-asa, a sitio of Barangay Rawis, a seaside fishing and industrial barrio of Legazpi City, one of the three progressive cities in Bicol Region. At about 500 meters East of PNHS is the shoreline of Albay Gulf and about the same distance to the West lies the majestic, alluring landmark of Albay Province, the Mayon Volcano, one of the world&rsquo;s greatest wonders.&nbsp;</span></p>\r\n\r\n<p><span style="font-size:16px">Pag-asa National High School is located at Pag-asa, a sitio of Barangay Rawis, a seaside fishing and industrial barrio of Legazpi City, one of the three progressive cities in Bicol Region. At about 500 meters East of PNHS is the shoreline of Albay Gulf and about the same distance to the West lies the majestic, alluring landmark of Albay Province, the Mayon Volcano, one of the world&rsquo;s greatest wonders.&nbsp;<br />\r\n<br />\r\nThe original name of Pag-asa National High School was City Experimental High school, later changed to Rawis Barrio High School due to the approval of RA 6054, creating the Barrio High School Charter authored by Dr. Pedro T. Orata of Pangasinan.&nbsp;<br />\r\n<br />\r\nThe first day of classes began on August 20, 1965 occupying 3 classrooms at Rawis Elementary School. It started with two sections, 38 and 32 students, respectively. Mr. Noel Arao, now retired, is one of the pioneer teachers plus elementary teachers who were hired on an honorarium basis. Ms. Salvacion G. Yang and Mrs. Norma B. Orosco were hired on permanent status but were paid by the local government. In 1974 when Legazpi City Division was created, Mr. Josue Camba as first Schools Division Superintendent, Rawis Barrio High School was changed to Pag-asa Barangay Vocational High School. After more than five years of difficulties, in 1983, it was elevated to a National High School status by virtue of Batas Pambansa #388 sponsored by Congressman Carlos R. Imperial. It was in School Year 1976 &ndash; 1977 when the school transferred to its present school site. The late Mrs. Carolina A. Lanuzo was its first appointed Secondary School Principal.&nbsp;<br />\r\n<br />\r\nPag-asa National High School aims to develop the fullest potentials of individual students in building a peaceful and progressive community. It provides equitable access to quality education with the aim of developing the knowledge, skills, attitude and values of students necessary for a productive life. From three permanent teachers, it has increased to 135 teaching and 15 non-teaching personnel. Teachers are given trainings and scholarships for their personal and professional growth.&nbsp;<br />\r\n<br />\r\nIn 1993, there was a marked increase I enrolment and the school needed additional classrooms. Again, it was through the efforts of Congressman Carlos Imperial that a 13 &ndash; classroom building was constructed in its annex site which is 100 meters away from the main campus. Due to rapid increase of enrolment and with the purpose of decongesting the classrooms, the opening of extension schools was thought of by Mrs. Consuelo Fe L. Panesa, the second officially appointed Secondary School Principal of PNHS. Three extension schools were opened, namely: Gogon Extension, Arimbay Extension and Pawa Extension.&nbsp;<br />\r\n<br />\r\nPag-asa National High School from its establishment has earned various recognitions such as, second place Regional Search for the Most Effective Secondary School (General Curriculum Category) in 1999 &ndash; 2000, a three (3) year consecutive undefeated champion in the Division Science and Math Quiz, over the high performing schools in the Legazpi City Division, BUCELHS, AUS-SOHS, SAA. Student writers and English school paper Adviser, Mr. Jeremy Cruz had multiple awards in Campus Journalism not only in the Regional but also in the National Level. The School paper &ldquo;The Dawn&rdquo; was adjudged 8th place in 2003 and 5th place in 2004, respectively as Best School Paper.&nbsp;<br />\r\n<br />\r\nThus, PNHS was born as an educational institution to establish a name and prestige that has become enviable and record-worthy to be kept in the annals of secondary education and as the school suggests. Pag-asa will always be a hope to those who vanquish illiteracy and poverty.</span></p>\r\n'),
(2, 'vision', '<p><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:16px"><span style="background-color:#ffffff; color:#333333">We dream of Filipinos who passionately love their country and whose Values and Competencies enable them to realize their full potential and contribute meaningfully to building the nation.&nbsp;</span><br />\r\n<br />\r\n<span style="background-color:#ffffff; color:#333333">As a learner-centered public institution, the Department of Education continuously improves itself to better serve its stakeholders.</span></span></span></p>\r\n'),
(3, 'mission', '<p><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="background-color:#ffffff; color:#333333">To protect and promote the right of every Filipino to quality equitable culture-based and complete basic education where&nbsp;</span><br />\r\n<br />\r\n<span style="background-color:#ffffff; color:#333333">1. Students learn in a child-friendly, gender-sensitive, safe and motivating environment.&nbsp;</span><br />\r\n<br />\r\n<span style="background-color:#ffffff; color:#333333">2. Teachers facilitate learning and constantly nurture every learner.&nbsp;</span><br />\r\n<br />\r\n<span style="background-color:#ffffff; color:#333333">3. Administrators and staff, as stewards of the institution, ensure an enabling and supportive environment for effective learning to happen.&nbsp;</span><br />\r\n<br />\r\n<span style="background-color:#ffffff; color:#333333">4. Family, community, and other stakeholders are actively engaged and share responsibility for developing life-long learners.</span></span></span></p>\r\n'),
(4, 'hymn', '<p><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="background-color:#ffffff; color:#333333">In our every corner of the universe&nbsp;</span><br />\r\n<span style="background-color:#ffffff; color:#333333">Our alma mater, we praise your name&nbsp;</span><br />\r\n<br />\r\n<span style="background-color:#ffffff; color:#333333">Hail alma materour beloved PNHS Noble foundation, a school that folks adore&nbsp;</span><br />\r\n<span style="background-color:#ffffff; color:#333333">Pride of Legazpi, Strength of the Poor&nbsp;</span><br />\r\n<span style="background-color:#ffffff; color:#333333">Now Proudly stands amidst the triumphs of our labor&nbsp;</span><br />\r\n<span style="background-color:#ffffff; color:#333333">Torch of Wisdom brightly shining on her life journey&nbsp;</span><br />\r\n<span style="background-color:#ffffff; color:#333333">Arise and Pride let celebrate for thy great mission&nbsp;</span><br />\r\n<span style="background-color:#ffffff; color:#333333">Living Faith, hope, love and righteousness&nbsp;</span><br />\r\n<span style="background-color:#ffffff; color:#333333">Stride onward behold nation&#39;s gaze we are united&nbsp;</span><br />\r\n<br />\r\n<span style="background-color:#ffffff; color:#333333">For all thy love and glorious deeds we honor&nbsp;</span><br />\r\n<span style="background-color:#ffffff; color:#333333">Our alma mater PNHS&nbsp;</span><br />\r\n<span style="background-color:#ffffff; color:#333333">Our alma mater PNHS</span></span></span></p>\r\n'),
(5, 'high school', '<p><span style="font-size:16px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>Grade 7</strong><br />\r\n<br />\r\n<strong>(STEC)</strong><br />\r\nEdukasyon sa Pagpapahalaga<br />\r\nFilipino<br />\r\nMAPEH<br />\r\nMathematics<br />\r\nEnglish<br />\r\nScience<br />\r\nResearch<br />\r\nEnhanced Mathematics<br />\r\nEnhanced Science<br />\r\nAraling Panlipunan<br />\r\n<br />\r\n<strong>(SPA)</strong><br />\r\nSpecialization<br />\r\nEnglish<br />\r\nFilipino<br />\r\nMAPEH<br />\r\nAraling Panlipunan<br />\r\nTLE<br />\r\nMathematics<br />\r\nScience<br />\r\nEnhanced Mathematics<br />\r\nEnhanced English<br />\r\nEnhanced Science<br />\r\n<br />\r\n<strong>(BEC)</strong><br />\r\nFilipino<br />\r\nScience<br />\r\nTLE<br />\r\nAraling Panlipunan<br />\r\nMAPEH<br />\r\nMathematics<br />\r\nEnglish<br />\r\nEdukasyon sa Pagpapahalaga<br />\r\n<br />\r\n<br />\r\n<strong>Grade 8</strong><br />\r\n<br />\r\n<strong>(STEC)</strong><br />\r\nEdukasyon sa Pagpapahalaga<br />\r\nFilipino<br />\r\nMAPEH<br />\r\nMathematics<br />\r\nEnglish<br />\r\nScience<br />\r\nResearch<br />\r\nEnhanced Mathematics<br />\r\nEnhanced Science<br />\r\nAraling Panlipunan<br />\r\n<br />\r\n<strong>(SPA)</strong><br />\r\nSpecialization<br />\r\nEnglish<br />\r\nFilipino<br />\r\nMAPEH<br />\r\nAraling Panlipunan<br />\r\nTLE<br />\r\nMathematics<br />\r\nScience<br />\r\nEnhanced Science<br />\r\n<br />\r\n<strong>(BEC)</strong><br />\r\nFilipino<br />\r\nScience<br />\r\nTLE<br />\r\nAraling Panlipunan<br />\r\nMAPEH<br />\r\nMathematics<br />\r\nEnglish<br />\r\nEdukasyon sa Pagpapahalaga<br />\r\n<br />\r\n<br />\r\n<strong>Grade 9</strong><br />\r\n<br />\r\n<strong>(STEC)</strong><br />\r\nEdukasyon sa Pagpapahalaga<br />\r\nFilipino<br />\r\nMAPEH<br />\r\nMathematics<br />\r\nEnglish<br />\r\nScience<br />\r\nResearch<br />\r\nEnhanced Mathematics<br />\r\nEnhanced Science<br />\r\nAraling Panlipunan<br />\r\n<br />\r\n<strong>(SPA)</strong><br />\r\nSpecialization<br />\r\nEnglish<br />\r\nFilipino<br />\r\nMAPEH<br />\r\nAraling Panlipunan<br />\r\nTLE<br />\r\nMathematics<br />\r\nScience<br />\r\nEnhanced Science<br />\r\n<br />\r\n<strong>(BEC)</strong><br />\r\nFilipino<br />\r\nScience<br />\r\nTLE<br />\r\nAraling Panlipunan<br />\r\nMAPEH<br />\r\nMathematics<br />\r\nEnglish<br />\r\nEdukasyon sa Pagpapahalaga<br />\r\n<br />\r\n<br />\r\n<strong>Grade 10</strong><br />\r\n<br />\r\n<strong>(STEC)</strong><br />\r\nEdukasyon sa Pagpapahalaga<br />\r\nFilipino<br />\r\nMAPEH<br />\r\nMathematics<br />\r\nEnglish<br />\r\nScience<br />\r\nResearch<br />\r\nEnhanced Mathematics<br />\r\nEnhanced Science<br />\r\nAraling Panlipunan<br />\r\n<br />\r\n<strong>(SPA)</strong><br />\r\nSpecialization<br />\r\nEnglish<br />\r\nFilipino<br />\r\nMAPEH<br />\r\nAraling Panlipunan<br />\r\nTLE<br />\r\nMathematics<br />\r\nScience<br />\r\nEnhanced Science<br />\r\n<br />\r\n<strong>(BEC)</strong><br />\r\nFilipino<br />\r\nScience<br />\r\nTLE<br />\r\nAraling Panlipunan<br />\r\nMAPEH<br />\r\nMathematics<br />\r\nEnglish<br />\r\nEdukasyon sa Pagpapahalaga</span></span></p>\r\n'),
(6, 'senior high school', '<p><span style="font-size:16px"><strong>BREAD AND PASTRY PRODUCTION</strong><br />\r\n<br />\r\nCourse Description:<br />\r\n<br />\r\nThis curriculum guide on Bread and Pastry Production course leads to National Certificate Level II (NC II). This course is designed for high school student to develop knowledge, skills, and attitude to perform the tasks on Bread and Pastry Production. It covers core competencies namely:<br />\r\n<br />\r\n1.) prepare and produce bakery products;<br />\r\n2.) prepare and produce pastry products;<br />\r\n3.) prepare and present gateau, tortes and cakes;<br />\r\n4.) prepare and display petit fours and<br />\r\n5.) present deserts.<br />\r\n<br />\r\nThe preliminaries of this specialization course includes the following:<br />\r\n* Explain core concepts in bread &amp; pastry production;<br />\r\n* Discuss the relevance of the course<br />\r\n* Explore on opportunities for a Baker or Commis as a career.<br />\r\n<br />\r\n<br />\r\n<strong>COOKERY</strong><br />\r\n<br />\r\nCourse Description:<br />\r\n<br />\r\nThis curriculum guide is an exploratory course in Cookery, which leads to National Certificate Level II (NC II). It covers five common competencies that a high school student ought to possess, namely:<br />\r\n<br />\r\n1.) knowledge of the use of tools, equipment, and paraphernalia;<br />\r\n2.) maintenance of tools, equipment, and paraphernalia;<br />\r\n3.) performance of mensuration and calculation;<br />\r\n4.) interpretation of technical drawings and plans; and<br />\r\n5.) the practice of Occupational Health and Safety Procedures (OHSP).<br />\r\n<br />\r\nThe preliminaries of this exploratory course include the following:<br />\r\n* discussion on the relevance of the course;<br />\r\n* explanation of key concepts relative to the course, and<br />\r\n* exploration of career opportunities<br />\r\n<br />\r\n<br />\r\n<strong>Computer Systems Servicing</strong><br />\r\n<br />\r\nCourse Description<br />\r\n<br />\r\nThis is an introductory course that leads to a Computer Systems Servicing National Certificate Level II (NC II). It covers seven (7) common competencies that a student ought to possess:<br />\r\n<br />\r\n1.) application of quality standards,<br />\r\n2.) computer operations;<br />\r\n3.) performing mensuration and calculation;<br />\r\n4.) preparation and interpretation of technical drawing;<br />\r\n5.) the use of hand tools;<br />\r\n6.) terminating and connecting electrical wiring and electronics circuits; and<br />\r\n7.) testing electronics components; and four (4) core competencies, namely,<br />\r\n* installing and configuring computer systems,<br />\r\n* setting up computer networks<br />\r\n* setting up computer servers, and<br />\r\n* maintaining and repairing computer systems and networks.<br />\r\n<br />\r\n<strong>AUTOMOTIVE SERVICING NC II</strong><br />\r\n<br />\r\n(320 hours) K to 12 Industrial Arts &ndash; Automotive Servicing (NC II) Curriculum Guide May 2016 *LO-Learning Outcomes STVEP Schools may cover more competencies in a week Page 5 of 36 Prerequisite: Automotive Servicing NC I<br />\r\n<br />\r\nCourse Description:<br />\r\n<br />\r\nThis course is designed to enhance the knowledge, skills and attitudes of an individual in the field of Automotive Servicing in accordance with industry standards. It covers the remaining core competencies which are not included in Automotive Servicing (NC I) such as: servicing automotive battery, servicing ignition system, testing and repairing wiring/lighting system, servicing starting system, servicing charging system, servicing engine mechanical system, servicing clutch system, servicing clutch and differential and front axle, servicing steering system, servicing brake system, servicing suspension system, performing underchassis preventive maintenance and overhauling manual transmission.<br />\r\n<br />\r\n<strong>Electrical Installation and Maintenance</strong><br />\r\n<br />\r\nCourse Description:<br />\r\n<br />\r\nThis is an exploratory and introductory course which leads to an Electrical Installation and Maintenance National Certificate Level II (NC II). It covers five common competencies that the Grade 7/Grade 8 Technology and Livelihood Education (TLE) student ought to possess:<br />\r\n1.) using tools, equipment and paraphernalia,<br />\r\n2.) performing mensuration and calculation,<br />\r\n3.) practicing Occupational Health and Safety (OHS) procedures,<br />\r\n4.) maintaining tools, equipment and paraphernalia, and<br />\r\n5.) interpreting technical drawing and plans.</span></p>\r\n'),
(7, 'contacts', '<p><span style="font-size:16px">pagasanhs001@gmail.com<br />\r\n482-0060<br />\r\nName of the School: PAG-ASA NATIONAL HIGH SCHOOL<br />\r\nSchool ID: 302261<br />\r\nAddress: PAG-ASA, RAWIS, LEGAZPI CITY<br />\r\nSchool Head: JEREMY A. CRUZ<br />\r\nContact Number: 09082539580<br />\r\nEmail Address: jeremyacruz@yahoo.com</span></p>\r\n'),
(8, 'principal', '<p><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">Welcome to the official website of Pag-asa National High School!</span></span></p>\r\n\r\n<p><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">Pag-asa National High School is a large learning institution with 3, 211 students. Our commitment is to provide a safe and intellectually challenging environment that will empower students to become innovative thinkers, creative problem solvers and inspired learners prepared to thrive in the twenty-first century and we work on this pledge with our stakeholders whose participation we deem so significant.</span></span></p>\r\n\r\n<p><br />\r\n<span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">High standards and expectations from each student with regad to academic performance, co-curricular participation, and responsible citizenship are the foundation of our school. It is with pride that we hold these high standards and ask each of our students to commit in maintaining the extraordinary record of achievement and contribution that has been the legacy of Pag-asa National High School. It is the contribution of our students to our school community that makes our school an exceptional learning community. Full participation in academic and co-curricular programs and a willingness to act responsibility as an individual within our educational environment are the factors that enable all to have a successful and enjoyable year.<br />\r\n<br />\r\nI invite you to check out this website. It provides valuable information regarding the opportunities offered to our students and their parents. I look forward to another exciting, meaningful, and successful year for everyone that is a part of our community. Please don&#39;t hesitate to contact us if your have any questions about your school.<br />\r\n<br />\r\nSa Pag-Asa, Aki an Bida.</span></span></p>\r\n\r\n<p style="text-align:right"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">Sincerely,<br />\r\n<strong>Jeremy Romero Cruz</strong><br />\r\n<strong>Principal III</strong></span></span></p>\r\n'),
(9, 'gpta', '<p><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:14px"><strong>PNHS GPTA Officers</strong></span></span></p>\r\n\r\n<p><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:14px"><strong>President:</strong> Mr. Roland Bongais<br />\r\n<strong>Vice-President:</strong> Mr.Erasto&shy; Bing Alerta<br />\r\n<strong>Secretary:</strong> Mary Ann A.Blanco<br />\r\n<strong>Treasurer:</strong> Juvy Bremen<br />\r\n<strong>Auditor:</strong> Mr. Romel Abiera<br />\r\n<strong>Bus. Mngrs:</strong> Mrs&shy;. Lani Reaso, Mrs. Melisa Dy<br />\r\n<strong>PIO:</strong> Roleto Bechayda<br />\r\n<strong>Board Members:</strong><br />\r\nMs.Geraldine&shy; Santander<br />\r\nMr.Rodrigo&shy; Batalla<br />\r\nMrs. Janet Arias<br />\r\nMs. Lorena Macatunao</span></span></p>\r\n\r\n<p><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:14px"><strong>GPTA Coordinator:</strong> Ma. Ana Ayala-Balde</span></span></p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `cms_site_feedback`
--

CREATE TABLE `cms_site_feedback` (
  `cms_feedback_ID` int(11) NOT NULL,
  `cms_site_feedback_name` varchar(45) NOT NULL,
  `cms_site_feedback_email` varchar(45) NOT NULL,
  `cms_site_feedback_phone` int(11) NOT NULL,
  `cms_site_feedback_content` longtext NOT NULL,
  `cms_site_feedback_time` time NOT NULL,
  `cms_site_feedback_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_site_feedback`
--

INSERT INTO `cms_site_feedback` (`cms_feedback_ID`, `cms_site_feedback_name`, `cms_site_feedback_email`, `cms_site_feedback_phone`, `cms_site_feedback_content`, `cms_site_feedback_time`, `cms_site_feedback_date`) VALUES
(203, 'name', 'bibendum@accumsan.co.uk', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur', '16:16:49', '2017-12-25'),
(205, 'name', 'In.nec@amifringilla.co.uk', 2147483647, 'Lorem ipsum', '10:09:10', '2017-06-04'),
(208, 'name', 'at@sapien.ca', 2147483647, 'Lorem', '09:39:52', '2017-11-09'),
(209, 'name', 'erat.Vivamus.nisi@rutrumloremac.ca', 2147483647, 'Lorem ipsum dolor sit', '14:35:50', '2017-12-16'),
(214, 'name', 'risus.Duis.a@ullamcorper.edu', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer', '13:41:37', '2017-10-16'),
(215, 'name', 'mauris.blandit.mattis@auctorquistristique.edu', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor.', '20:58:22', '2017-07-26'),
(219, 'name', 'ac@amet.ca', 2147483647, 'Lorem ipsum', '19:02:19', '2017-08-27'),
(221, 'name', 'lorem.Donec.elementum@auguescelerisquemollis.', 2147483647, 'Lorem ipsum dolor sit', '13:29:33', '2017-07-14'),
(222, 'name', 'molestie@nec.edu', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor.', '19:41:51', '2017-06-19'),
(224, 'name', 'odio@euismodin.edu', 2147483647, 'Lorem ipsum dolor', '00:19:34', '2017-03-24'),
(225, 'name', 'ut.nisi@dignissimtempor.org', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing', '10:40:28', '2017-04-27'),
(226, 'name', 'sit.amet@etultricesposuere.edu', 2147483647, 'Lorem ipsum', '11:06:04', '2017-05-09'),
(228, 'name', 'magna.tellus.faucibus@etrisus.edu', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing', '07:12:38', '2017-12-06'),
(230, 'name', 'vehicula@nuncullamcorpereu.org', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing', '13:55:36', '2018-01-29'),
(231, 'name', 'nascetur@ridiculusmus.edu', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed', '14:16:54', '2017-12-29'),
(233, 'name', 'parturient.montes.nascetur@Loremipsum.org', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus.', '14:30:32', '2017-12-12'),
(234, 'name', 'Pellentesque@estac.co.uk', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam', '19:30:10', '2017-07-30'),
(237, 'name', 'lectus@Praesent.edu', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu', '20:39:03', '2017-04-20'),
(239, 'name', 'a.magna@euismodacfermentum.com', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu', '11:34:33', '2017-05-08'),
(242, 'name', 'metus.vitae.velit@tellusjustosit.com', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut', '13:05:01', '2017-08-14'),
(244, 'name', 'et.libero.Proin@ut.ca', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur', '22:33:41', '2018-01-10'),
(245, 'name', 'a.magna@utnulla.edu', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor.', '16:43:29', '2017-08-05'),
(247, 'name', 'ante.lectus.convallis@penatibus.org', 2147483647, 'Lorem', '18:02:09', '2017-04-20'),
(249, 'name', 'dolor.Nulla@malesuada.org', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec', '08:31:56', '2017-04-13'),
(256, 'name', 'vestibulum@Phasellus.com', 2147483647, 'Lorem ipsum', '21:46:31', '2017-10-10'),
(257, 'name', 'nunc.sed.pede@lobortistellus.net', 2147483647, 'Lorem ipsum', '09:49:46', '2017-11-07'),
(260, 'name', 'sagittis.Nullam@actellusSuspendisse.ca', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec', '17:32:49', '2017-05-27'),
(261, 'name', 'netus.et@parturientmontesnascetur.com', 2147483647, 'Lorem', '13:49:29', '2017-05-19'),
(262, 'name', 'blandit@egestaslaciniaSed.com', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam', '01:56:49', '2017-06-03'),
(263, 'name', 'Curabitur@lectusantedictum.co.uk', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor.', '20:25:58', '2017-12-22'),
(264, 'name', 'Nulla.interdum.Curabitur@mi.co.uk', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur', '12:33:25', '2017-09-26'),
(266, 'name', 'pede@rutrumurna.net', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer', '12:13:14', '2018-03-15'),
(267, 'name', 'Nunc@tempor.com', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu', '12:35:30', '2018-01-07'),
(268, 'name', 'ipsum@duinectempus.org', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam', '20:15:24', '2017-09-23'),
(271, 'name', 'ligula.tortor@sed.com', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam', '21:57:34', '2017-09-18'),
(272, 'name', 'ac@aliquetlobortisnisi.ca', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer', '21:14:19', '2018-01-03'),
(279, 'name', 'nulla@vulputatelacus.ca', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', '18:29:49', '2017-08-03'),
(280, 'name', 'nunc.In.at@idnunc.ca', 2147483647, 'Lorem ipsum dolor sit', '21:30:52', '2017-12-06'),
(281, 'name', 'Curae@utpellentesque.ca', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam', '19:32:16', '2017-04-03'),
(282, 'name', 'Donec.egestas@semmagna.ca', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed', '00:23:23', '2017-09-19'),
(284, 'name', 'arcu.Vestibulum.ut@Donecvitaeerat.net', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor.', '20:40:52', '2017-12-14'),
(292, 'name', 'eleifend.nec.malesuada@montesnascetur.com', 2147483647, 'Lorem ipsum dolor sit amet,', '09:38:00', '2017-11-05'),
(293, 'name', 'sollicitudin@odiotristique.ca', 2147483647, 'Lorem ipsum dolor sit', '06:59:40', '2017-03-29'),
(295, 'name', 'lacus.vestibulum.lorem@nisiMaurisnulla.com', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur', '02:14:34', '2018-02-05'),
(298, 'name', 'metus.Vivamus.euismod@magnaNamligula.com', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus.', '23:14:08', '2018-02-25'),
(299, 'name', 'Fusce.mollis@Donecelementum.ca', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec', '00:01:34', '2017-10-18'),
(302, 'Molly', 'adipiscing@cursusInteger.co.uk', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce', '18:50:03', '2017-06-19'),
(303, 'Derek', 'non.justo.Proin@Donecporttitor.co.uk', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc', '03:33:31', '2017-05-13'),
(305, 'Elijah', 'pede.et.risus@Donec.edu', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum.', '08:07:27', '2017-07-12'),
(308, 'Rose', 'parturient@faucibusMorbi.com', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae,', '19:04:20', '2017-05-03'),
(309, 'Keelie', 'vestibulum.neque.sed@at.com', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam,', '22:29:05', '2017-04-03'),
(310, 'Raphael', 'mattis@nullaDonec.co.uk', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci.', '22:12:13', '2017-05-03'),
(312, 'Shea', 'eu@pede.ca', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at,', '02:53:55', '2017-08-05'),
(316, 'Zahir', 'Nunc.pulvinar.arcu@auctor.edu', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus dapibus quam quis diam. Pellentesque habitant', '02:11:17', '2017-10-15'),
(317, 'Angela', 'ultricies@Cras.org', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus.', '18:01:01', '2017-11-09'),
(318, 'Kaitlin', 'et.ultrices.posuere@massaVestibulum.com', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque', '01:09:32', '2018-02-08'),
(319, 'Medge', 'nulla.Donec@euismodestarcu.edu', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla', '07:32:20', '2017-11-27'),
(323, 'Kirk', 'interdum.Sed@ipsum.org', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas', '21:43:57', '2017-10-26'),
(326, 'Grace', 'Suspendisse.eleifend.Cras@tellus.com', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero', '00:46:32', '2017-05-01'),
(328, 'Reed', 'Quisque.porttitor@velturpisAliquam.com', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed', '04:51:33', '2017-05-03'),
(329, 'Wayne', 'tortor.at.risus@enimcondimentum.org', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus', '19:02:14', '2017-11-21'),
(331, 'Willa', 'quam.elementum@tincidunt.ca', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque', '18:38:16', '2017-09-27'),
(333, 'Jolie', 'Aenean@ipsumDonec.co.uk', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed,', '12:01:42', '2017-05-01'),
(336, 'Lars', 'felis.purus@maurisSuspendissealiquet.co.uk', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus dapibus quam quis diam. Pellentesque habitant', '12:10:45', '2017-07-20'),
(337, 'Sawyer', 'neque.tellus.imperdiet@quam.co.uk', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus dapibus', '05:04:31', '2018-03-06'),
(338, 'Leah', 'a.nunc.In@odio.ca', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis', '11:28:28', '2018-02-06'),
(339, 'Abigail', 'ornare@venenatis.co.uk', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae,', '05:28:54', '2017-04-16'),
(343, 'Noah', 'Nunc.ut@risusDuisa.co.uk', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus dapibus', '08:22:25', '2017-07-17'),
(344, 'Ethan', 'netus.et.malesuada@tortorNunc.com', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor', '03:14:05', '2017-05-30'),
(353, 'Luke', 'dictum@PhasellusornareFusce.com', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu,', '11:45:23', '2018-02-27'),
(355, 'Alfonso', 'commodo.at@velarcu.co.uk', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis.', '05:55:49', '2018-03-13'),
(356, 'Nyssa', 'Fusce.mollis.Duis@Suspendissealiquetmolestie.', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt', '13:52:45', '2017-12-01'),
(358, 'Hayden', 'egestas.rhoncus@Phasellusvitae.org', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae,', '22:41:10', '2017-11-16'),
(359, 'Montana', 'sociis.natoque@posuereatvelit.ca', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas', '04:46:42', '2018-02-13'),
(361, 'Maxine', 'sodales.elit@Suspendissealiquet.ca', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris,', '02:11:38', '2018-02-07'),
(362, 'Kenneth', 'metus@Integerurna.org', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus dapibus quam quis diam. Pellentesque habitant morbi', '21:54:28', '2017-07-25'),
(364, 'Karen', 'erat.Vivamus.nisi@ante.edu', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis', '10:15:55', '2017-09-23'),
(366, 'Alexis', 'elit.Etiam.laoreet@duiCumsociis.org', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis', '07:21:21', '2017-11-09'),
(367, 'Warren', 'non.feugiat.nec@semmolestie.co.uk', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus dapibus quam quis diam. Pellentesque', '05:41:41', '2017-06-17'),
(369, 'Candace', 'turpis.Nulla.aliquet@aptenttacitisociosqu.org', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed,', '00:28:15', '2017-05-31'),
(370, 'Teagan', 'sodales@Cras.com', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula', '21:12:49', '2017-06-27'),
(371, 'Paul', 'nibh.enim@mollisnon.co.uk', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla', '21:39:34', '2018-03-02'),
(372, 'Zachery', 'mollis@facilisis.com', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas', '20:38:06', '2017-11-29'),
(373, 'Regan', 'cursus.Integer@dolorQuisquetincidunt.com', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget', '08:33:14', '2018-02-01'),
(374, 'Gil', 'Suspendisse.eleifend.Cras@Nuncsed.org', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas', '10:46:58', '2017-11-13'),
(375, 'Imogene', 'ac.arcu.Nunc@anteMaecenas.co.uk', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum', '04:36:45', '2018-01-16'),
(377, 'Kaden', 'Etiam.vestibulum@atlacus.org', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu', '09:13:18', '2017-05-23'),
(378, 'Emerson', 'Duis.cursus.diam@primisinfaucibus.net', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce', '00:37:43', '2017-11-25'),
(379, 'Stephanie', 'turpis.Aliquam.adipiscing@tellusnon.ca', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus dapibus quam quis diam.', '08:20:10', '2017-06-06'),
(381, 'Brandon', 'dictum@scelerisquenequesed.org', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu', '20:15:39', '2017-06-14'),
(382, 'Hector', 'Quisque@semsempererat.ca', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque', '11:47:42', '2018-01-07'),
(383, 'Amity', 'Duis.sit@metusAliquamerat.co.uk', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus dapibus quam', '08:55:48', '2017-07-02'),
(384, 'Wylie', 'elit.pede@gravidamauris.co.uk', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis.', '17:51:18', '2017-04-01'),
(385, 'Arsenio', 'non@Fusce.net', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum', '08:48:26', '2017-03-17'),
(386, 'Brady', 'in.lobortis@Phasellus.com', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut', '12:05:26', '2017-11-07'),
(388, 'Heidi', 'ac.mi.eleifend@vel.edu', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu,', '13:31:22', '2018-01-17'),
(389, 'Galena', 'ornare.elit@egestaslaciniaSed.net', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at,', '13:15:22', '2017-08-07'),
(390, 'Amethyst', 'magna.Sed.eu@elit.com', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque', '10:49:07', '2017-12-02'),
(391, 'Emerald', 'eget.varius@mollisvitae.co.uk', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae,', '16:32:11', '2018-01-11'),
(395, 'Christian', 'purus.accumsan@erat.org', 2147483647, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus.', '19:36:48', '2018-02-08'),
(400, 'harris quirona', '', 9, 'huehuehuehuehuehuheuheuheuhuehue', '00:11:54', '2018-03-15'),
(401, 'visitor', 'visitor@visitor.com', 9, 'visitor visitor visitor visitor visitor visitor visitor visitor visitor visitor visitor visitor', '00:33:31', '2018-03-15'),
(402, 'Bon Audrey Roda', 'bonaudrey.roda@bicol-u.edu.ph', 2147483647, 'This makes things easier for me. I love your site!', '18:59:42', '2018-03-17');

-- --------------------------------------------------------

--
-- Table structure for table `cms_viewcount`
--

CREATE TABLE `cms_viewcount` (
  `cms_viewcount_ID` int(10) UNSIGNED NOT NULL,
  `cms_viewcount_page` varchar(150) NOT NULL,
  `cms_viewcount_views` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_viewcount`
--

INSERT INTO `cms_viewcount` (`cms_viewcount_ID`, `cms_viewcount_page`, `cms_viewcount_views`) VALUES
(1, 'index', 4299);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cms_account`
--
ALTER TABLE `cms_account`
  ADD PRIMARY KEY (`cms_account_ID`),
  ADD UNIQUE KEY `cms_account_ID` (`cms_account_ID`,`cms_username`),
  ADD KEY `account_student_idx` (`lrn`),
  ADD KEY `account_emp_idx` (`emp_no`);

--
-- Indexes for table `cms_achievement`
--
ALTER TABLE `cms_achievement`
  ADD PRIMARY KEY (`cms_achievement_ID`),
  ADD KEY `achieve_account_idx` (`cms_account_id`);

--
-- Indexes for table `cms_album`
--
ALTER TABLE `cms_album`
  ADD PRIMARY KEY (`cms_album_ID`);

--
-- Indexes for table `cms_gpta`
--
ALTER TABLE `cms_gpta`
  ADD PRIMARY KEY (`cms_gpta_ID`);

--
-- Indexes for table `cms_image`
--
ALTER TABLE `cms_image`
  ADD PRIMARY KEY (`cms_image_ID`);

--
-- Indexes for table `cms_memo`
--
ALTER TABLE `cms_memo`
  ADD PRIMARY KEY (`cms_memo_ID`),
  ADD KEY `memo_account_idx` (`cms_account_id`);

--
-- Indexes for table `cms_news`
--
ALTER TABLE `cms_news`
  ADD PRIMARY KEY (`cms_news_ID`),
  ADD KEY `news_account_idx` (`cms_account_id`);

--
-- Indexes for table `cms_orgchart`
--
ALTER TABLE `cms_orgchart`
  ADD PRIMARY KEY (`cms_orgchart_ID`);

--
-- Indexes for table `cms_principal`
--
ALTER TABLE `cms_principal`
  ADD PRIMARY KEY (`cms_principal_ID`);

--
-- Indexes for table `cms_privilege`
--
ALTER TABLE `cms_privilege`
  ADD PRIMARY KEY (`cms_priv_id`),
  ADD KEY `job_title_code` (`job_title_code`);

--
-- Indexes for table `cms_project`
--
ALTER TABLE `cms_project`
  ADD PRIMARY KEY (`cms_project_ID`);

--
-- Indexes for table `cms_site_content`
--
ALTER TABLE `cms_site_content`
  ADD PRIMARY KEY (`cms_content_ID`);

--
-- Indexes for table `cms_site_feedback`
--
ALTER TABLE `cms_site_feedback`
  ADD PRIMARY KEY (`cms_feedback_ID`),
  ADD UNIQUE KEY `cms_feedback_ID_UNIQUE` (`cms_feedback_ID`);

--
-- Indexes for table `cms_viewcount`
--
ALTER TABLE `cms_viewcount`
  ADD PRIMARY KEY (`cms_viewcount_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cms_account`
--
ALTER TABLE `cms_account`
  MODIFY `cms_account_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;
--
-- AUTO_INCREMENT for table `cms_achievement`
--
ALTER TABLE `cms_achievement`
  MODIFY `cms_achievement_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cms_album`
--
ALTER TABLE `cms_album`
  MODIFY `cms_album_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
--
-- AUTO_INCREMENT for table `cms_gpta`
--
ALTER TABLE `cms_gpta`
  MODIFY `cms_gpta_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `cms_image`
--
ALTER TABLE `cms_image`
  MODIFY `cms_image_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=890;
--
-- AUTO_INCREMENT for table `cms_memo`
--
ALTER TABLE `cms_memo`
  MODIFY `cms_memo_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `cms_news`
--
ALTER TABLE `cms_news`
  MODIFY `cms_news_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `cms_orgchart`
--
ALTER TABLE `cms_orgchart`
  MODIFY `cms_orgchart_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `cms_privilege`
--
ALTER TABLE `cms_privilege`
  MODIFY `cms_priv_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `cms_project`
--
ALTER TABLE `cms_project`
  MODIFY `cms_project_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cms_site_feedback`
--
ALTER TABLE `cms_site_feedback`
  MODIFY `cms_feedback_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=403;
--
-- AUTO_INCREMENT for table `cms_viewcount`
--
ALTER TABLE `cms_viewcount`
  MODIFY `cms_viewcount_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cms_account`
--
ALTER TABLE `cms_account`
  ADD CONSTRAINT `account_emp` FOREIGN KEY (`emp_no`) REFERENCES `pims_personnel` (`emp_No`) ON UPDATE CASCADE,
  ADD CONSTRAINT `account_student` FOREIGN KEY (`lrn`) REFERENCES `sis_student` (`lrn`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
