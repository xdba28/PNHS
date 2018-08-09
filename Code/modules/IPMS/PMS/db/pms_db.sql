-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 31, 2017 at 03:32 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cms_account`
--

CREATE TABLE IF NOT EXISTS `cms_account` (
  `cms_account_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cms_username` varchar(20) NOT NULL,
  `cms_password` varchar(20) NOT NULL,
  `emp_no` int(10) unsigned DEFAULT NULL,
  `lrn` int(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`cms_account_ID`),
  UNIQUE KEY `cms_account_ID` (`cms_account_ID`,`cms_username`),
  KEY `account_student_idx` (`lrn`),
  KEY `account_emp_idx` (`emp_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=123 ;

--
-- Dumping data for table `cms_account`
--

INSERT INTO `cms_account` (`cms_account_ID`, `cms_username`, `cms_password`, `emp_no`, `lrn`) VALUES
(1, 'ryan', 'ryan123', 1, NULL),
(2, 'rodel', 'rodel123', 2, NULL),
(3, 'michael', 'michael123', 3, NULL),
(4, 'rea', 'rea123', 4, NULL),
(5, 'yves', 'yves123', 5, NULL),
(6, 'ricardo', 'ricardo123', 6, NULL),
(7, 'ryap', 'yap123', 7, NULL),
(8, 'vembudo', 'vincent123', 8, NULL),
(9, 'shiena', 'shiena123', 9, NULL),
(10, 'christine', 'christine123', 10, NULL),
(11, 'salome', 'salome123', 12, NULL),
(12, 'andres', 'andres123', 13, NULL),
(13, 'lloyd', 'lloyd123', 14, NULL),
(14, 'jeremy', 'jeremy123', 15, NULL),
(15, 'niÃ±o', 'niÃ±o123', 16, NULL),
(56, 'jhon', 'jhon', 17, NULL),
(58, 'max', 'max123', 18, NULL),
(59, 'jess', 'jess123', 19, NULL),
(60, 'nicole', 'nicole123', 20, NULL),
(61, 'emarish', 'emarish123', 21, NULL),
(62, 'janis', 'janis123', 22, NULL),
(63, 'recato', 'recato123', 11, NULL),
(64, 'lucido', 'lucido123', 23, NULL),
(65, 'britanico', 'britanico123', 24, NULL),
(66, 'pintor', 'pintor123', 25, NULL),
(67, 'mendez', 'mendez123', 26, NULL),
(68, 'bundalian', 'bundalian123', 27, NULL),
(69, 'marmol', 'marmol123', 28, NULL),
(70, 'arimado', 'arimado123', 29, NULL),
(71, 'lagatuz', 'lagatuz123', 30, NULL),
(72, 'caÃ±a', 'caÃ±a123', 31, NULL),
(73, 'oane', 'oane123', 32, NULL),
(74, 'bio', 'bio123', 33, NULL),
(75, 'bagasbas', 'bagasbas123', 34, NULL),
(76, 'gapayao', 'gapayao123', NULL, 11101),
(77, 'glen', 'glen123', NULL, 333334),
(78, 'lim', 'lim123', NULL, 333335),
(79, 'brent', 'brent123', NULL, 333336),
(80, 'mendiola', 'mendiola123', NULL, 333337),
(81, 'ogama', 'ogama123', NULL, 20171),
(82, 'alvin', 'alvin123', NULL, 20172),
(83, 'jane', 'jane123', NULL, 20173),
(84, 'jake', 'jake123', NULL, 20174),
(85, 'thea', 'thea123', NULL, 20175),
(86, 'christine', 'christine123', NULL, 20176),
(87, 'bruno', 'bruno123', NULL, 20177),
(88, 'kathryn', 'kathryn123', NULL, 20178),
(89, 'cristal', 'cristal123', NULL, 20179),
(90, 'margie', 'margie123', NULL, 201710),
(91, 'mildred', 'mildred123', NULL, 201711),
(92, 'anna', 'anna123', NULL, 201712),
(93, 'jazmin', 'jazmin123', NULL, 201713),
(94, 'josie', 'josie123', NULL, 201714),
(95, 'daniel', 'daniel123', NULL, 333338),
(96, 'clint', 'clint123', 35, NULL),
(97, 'vice', 'vice123', 36, NULL),
(98, 'ryzza', 'ryzza123', 37, NULL),
(99, 'mercado', 'mercado123', 38, NULL),
(100, 'jucel', 'jucel123', NULL, 201715),
(101, 'abogado', 'abogado123', NULL, 201716),
(102, 'candidato', 'candidato123', NULL, 201717),
(103, 'moico', 'moico123', NULL, 201718),
(104, 'velasco', 'velasco123', NULL, 201719),
(105, 'literal', 'literal123', NULL, 201720),
(106, 'cauilan', 'cauilan123', NULL, 201721),
(107, 'llanera', 'llanera123', NULL, 201722),
(108, 'ativo', 'ativo123', NULL, 201723),
(109, 'domingo', 'domingo123', NULL, 201724),
(110, 'chavez', 'chavez123', NULL, 201725),
(111, 'julie', 'julie123', NULL, 201726),
(112, 'gonzaga', 'gonzaga123', NULL, 201727),
(113, 'rivera', 'rivera123', NULL, 201728),
(114, 'curtis', 'curtis123', NULL, 201729),
(115, 'navarro', 'navarro123', NULL, 201730),
(116, 'mendoza', 'mendoza123', NULL, 201731),
(117, 'richards', 'richards123', NULL, 201732),
(118, 'soberano', 'soberano123', NULL, 201733),
(119, 'gil', 'gil123', NULL, 201734),
(120, 'jabb', 'jabb123', 39, NULL),
(121, 'dylan', 'dylan', 5110945, NULL),
(122, 'joseph', 'joseph123', 4743128, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_achievement`
--

CREATE TABLE IF NOT EXISTS `cms_achievement` (
  `cms_achievement_ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cms_achievement_name` varchar(20) NOT NULL,
  `cms_achievement_about` varchar(150) NOT NULL,
  `cms_achievement_date` date NOT NULL,
  `cms_account_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`cms_achievement_ID`),
  KEY `achieve_account_idx` (`cms_account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cms_album`
--

CREATE TABLE IF NOT EXISTS `cms_album` (
  `cms_album_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cms_account_id` int(10) unsigned NOT NULL,
  `cms_album_name` varchar(25) NOT NULL,
  `cms_album_desc` varchar(200) NOT NULL,
  `cms_album_date_created` date NOT NULL,
  `cms_album_time_created` time NOT NULL,
  `gallery_type` varchar(100) NOT NULL,
  PRIMARY KEY (`cms_album_id`),
  KEY `album_account_idx` (`cms_account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cms_calendar`
--

CREATE TABLE IF NOT EXISTS `cms_calendar` (
  `cms_calendar_ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cms_calendar_name` varchar(20) NOT NULL,
  `cms_about` varchar(50) NOT NULL,
  `cms_calendar_date` date NOT NULL,
  `cms_personinvolved` varchar(50) DEFAULT NULL,
  `cms_account_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`cms_calendar_ID`),
  KEY `calendar_account_idx` (`cms_account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cms_carousel`
--

CREATE TABLE IF NOT EXISTS `cms_carousel` (
  `carousel_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cms_carousel_img` text NOT NULL,
  `cms_account_ID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`carousel_id`),
  KEY `car_acc_idx` (`cms_account_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cms_event`
--

CREATE TABLE IF NOT EXISTS `cms_event` (
  `cms_event_ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cms_event_name` varchar(50) NOT NULL,
  `cms_event_about` varchar(150) NOT NULL,
  `cms_event_date` date NOT NULL,
  `cms_account_ID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`cms_event_ID`),
  KEY `event_account_idx` (`cms_account_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cms_image`
--

CREATE TABLE IF NOT EXISTS `cms_image` (
  `cms_image_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cms_album_ID` int(10) unsigned NOT NULL,
  `cms_image_name` varchar(100) NOT NULL,
  `cms_image_dir` varchar(100) NOT NULL,
  `cms_image_date` date NOT NULL,
  `cms_image_cap` text NOT NULL,
  PRIMARY KEY (`cms_image_id`),
  KEY `image_album_id_idx` (`cms_album_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cms_memo`
--

CREATE TABLE IF NOT EXISTS `cms_memo` (
  `cms_memo_ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cms_subject` varchar(20) NOT NULL,
  `cms_memo_description` varchar(150) NOT NULL,
  `cms_memo_date` date NOT NULL,
  `cms_recipient` varchar(20) NOT NULL,
  `cms_account_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`cms_memo_ID`),
  KEY `memo_account_idx` (`cms_account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cms_news`
--

CREATE TABLE IF NOT EXISTS `cms_news` (
  `cms_news_ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cms_title` varchar(50) NOT NULL,
  `cms_news_description` varchar(150) NOT NULL,
  `cms_news_date` date NOT NULL,
  `cms_account_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`cms_news_ID`),
  KEY `news_account_idx` (`cms_account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cms_privilege`
--

CREATE TABLE IF NOT EXISTS `cms_privilege` (
  `cms_priv_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cms_priv` enum('0','1') NOT NULL DEFAULT '0',
  `frms_priv` enum('0','1') NOT NULL DEFAULT '0',
  `ims_priv` enum('0','1') NOT NULL DEFAULT '0',
  `ipcrms_priv` enum('0','1') NOT NULL DEFAULT '0',
  `oes_priv` enum('0','1') NOT NULL DEFAULT '0',
  `pms_priv` enum('0','1') NOT NULL DEFAULT '0',
  `pims_priv` enum('0','1') NOT NULL DEFAULT '0',
  `prs_priv` enum('0','1') NOT NULL DEFAULT '0',
  `css_priv` enum('0','1') NOT NULL DEFAULT '0',
  `scms_priv` enum('0','1') NOT NULL DEFAULT '0',
  `sis_priv` enum('0','1') NOT NULL DEFAULT '0',
  `memo_priv` enum('0','1') NOT NULL DEFAULT '0',
  `calendar_priv` enum('0','1') NOT NULL DEFAULT '0',
  `news_priv` enum('0','1') NOT NULL DEFAULT '0',
  `ach_priv` enum('0','1') NOT NULL DEFAULT '0',
  `gallery_priv` enum('0','1') NOT NULL DEFAULT '0',
  `project_priv` enum('0','1') NOT NULL DEFAULT '0',
  `carousel_priv` enum('0','1') NOT NULL DEFAULT '0',
  `cms_account_type` enum('user','admin','superadmin') NOT NULL,
  `cms_account_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`cms_priv_id`),
  KEY `priv_account_idx` (`cms_account_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `cms_privilege`
--

INSERT INTO `cms_privilege` (`cms_priv_id`, `cms_priv`, `frms_priv`, `ims_priv`, `ipcrms_priv`, `oes_priv`, `pms_priv`, `pims_priv`, `prs_priv`, `css_priv`, `scms_priv`, `sis_priv`, `memo_priv`, `calendar_priv`, `news_priv`, `ach_priv`, `gallery_priv`, `project_priv`, `carousel_priv`, `cms_account_type`, `cms_account_id`) VALUES
(8, '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'admin', 4),
(9, '1', '1', '0', '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'admin', 6),
(10, '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', 'admin', 11),
(11, '1', '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'admin', 13),
(12, '1', '0', '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'admin', 14),
(13, '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', 'admin', 62),
(14, '1', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', 'admin', 120),
(15, '1', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'admin', 117),
(16, '1', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'admin', 3),
(17, '1', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'admin', 8),
(18, '1', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'admin', 10),
(19, '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', 'admin', 61),
(20, '1', '1', '1', '1', '1', '1', '1', '0', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', 'user', 1),
(21, '1', '1', '1', '1', '0', '1', '1', '0', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', 'user', 3),
(22, '1', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'admin', 64),
(23, '1', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'admin', 12),
(24, '1', '0', '0', '0', '1', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', 'user', 5),
(25, '1', '0', '0', '0', '1', '0', '0', '0', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', 'user', 76),
(26, '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'user', 121),
(27, '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'user', 122);

-- --------------------------------------------------------

--
-- Table structure for table `cms_project`
--

CREATE TABLE IF NOT EXISTS `cms_project` (
  `project_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cms_project_img` text NOT NULL,
  `cms_account_ID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`project_id`),
  KEY `proj_acc_idx` (`cms_account_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `css_credentials`
--

CREATE TABLE IF NOT EXISTS `css_credentials` (
  `cred_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `emp_rec_id` int(10) unsigned NOT NULL,
  `cred_title` enum('Major','Minor','Related') NOT NULL,
  `subject_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`cred_id`),
  KEY `emp_cred_idx` (`emp_rec_id`),
  KEY `sub_cred_idx` (`subject_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `css_schedule`
--

CREATE TABLE IF NOT EXISTS `css_schedule` (
  `SCHED_ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `subject_id` int(10) unsigned NOT NULL,
  `emp_rec_id` int(10) unsigned NOT NULL,
  `sy_id` int(11) unsigned NOT NULL,
  `section_id` int(10) unsigned NOT NULL,
  `DAY` varchar(45) NOT NULL,
  `TIME_START` time DEFAULT NULL,
  `TIME_END` time DEFAULT NULL,
  PRIMARY KEY (`SCHED_ID`),
  KEY `sched_sub_idx` (`subject_id`),
  KEY `sched_emp_idx` (`emp_rec_id`),
  KEY `sched_sy_idx` (`sy_id`),
  KEY `sched_sec_idx` (`section_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `css_school_yr`
--

CREATE TABLE IF NOT EXISTS `css_school_yr` (
  `sy_id` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `year` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`sy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `css_section`
--

CREATE TABLE IF NOT EXISTS `css_section` (
  `SECTION_ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `SECTION_NAME` varchar(45) NOT NULL,
  `YEAR_LEVEL` int(11) unsigned NOT NULL,
  `room_no` int(10) unsigned NOT NULL,
  `emp_rec_id` int(10) unsigned DEFAULT NULL,
  `sy_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`SECTION_ID`),
  KEY `sec_sy_idx` (`sy_id`),
  KEY `sec_emp_idx` (`emp_rec_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `css_subject`
--

CREATE TABLE IF NOT EXISTS `css_subject` (
  `subject_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subject_code` varchar(45) NOT NULL,
  `subject_desc` varchar(100) NOT NULL,
  `dept_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`subject_id`),
  KEY `sub_dept_idx` (`dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ims_borrow`
--

CREATE TABLE IF NOT EXISTS `ims_borrow` (
  `borrow_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `emp_no` int(10) unsigned NOT NULL,
  `stor_id` int(10) unsigned NOT NULL,
  `borrow_date` date NOT NULL,
  `return_date` date DEFAULT NULL,
  `borrow_qty` int(10) unsigned NOT NULL,
  `p_code` varchar(45) NOT NULL,
  PRIMARY KEY (`borrow_id`),
  KEY `bor_stor_idx` (`stor_id`),
  KEY `bor_emp_idx` (`emp_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ims_facility`
--

CREATE TABLE IF NOT EXISTS `ims_facility` (
  `fac_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fac_type` varchar(25) NOT NULL,
  `fund_source` varchar(45) NOT NULL,
  `specfic_fund` varchar(45) NOT NULL,
  `fac_storey` int(10) unsigned NOT NULL,
  `num_rooms` int(10) unsigned NOT NULL,
  `year_completed` year(4) NOT NULL,
  `dimension` varchar(8) NOT NULL,
  PRIMARY KEY (`fac_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ims_storage`
--

CREATE TABLE IF NOT EXISTS `ims_storage` (
  `stor_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stor_date` date NOT NULL,
  `iar_no` int(10) unsigned NOT NULL,
  `stor_qty` int(11) NOT NULL,
  PRIMARY KEY (`stor_id`),
  KEY `stor_iar_idx` (`iar_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pims_department`
--

CREATE TABLE IF NOT EXISTS `pims_department` (
  `dept_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dept_name` varchar(45) NOT NULL,
  `office_org_code` int(10) unsigned NOT NULL,
  PRIMARY KEY (`dept_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `pims_department`
--

INSERT INTO `pims_department` (`dept_ID`, `dept_name`, `office_org_code`) VALUES
(1, 'English Department', 118),
(2, 'Mathematics Department', 118),
(3, 'Filipino Department', 118),
(4, 'Science Department', 118),
(5, 'AP Department', 118),
(6, 'MAPEH Department', 118),
(7, 'TLE Department', 118),
(8, 'Values Education Department', 118),
(9, 'Accounting Department', 118);

-- --------------------------------------------------------

--
-- Table structure for table `pims_educational_background`
--

CREATE TABLE IF NOT EXISTS `pims_educational_background` (
  `ed_back` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `elementary_school_name` varchar(110) NOT NULL,
  `elementary_academic_yr` varchar(45) NOT NULL,
  `secondary_school_name` varchar(45) DEFAULT NULL,
  `secondary_academic_yr` varchar(25) DEFAULT NULL,
  `tertiary_school_name` varchar(110) DEFAULT NULL,
  `tertiary_academic_yr` varchar(25) DEFAULT NULL,
  `tertiary_degrees` varchar(55) DEFAULT NULL,
  `honor_or_award` varchar(220) DEFAULT NULL,
  `affiliations` varchar(110) DEFAULT NULL,
  `emp_No` int(10) unsigned NOT NULL,
  PRIMARY KEY (`ed_back`),
  KEY `emp_No_edbg` (`emp_No`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pims_employment_records`
--

CREATE TABLE IF NOT EXISTS `pims_employment_records` (
  `emp_rec_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `complete_item_no` varchar(45) NOT NULL,
  `work_stat` enum('WORKING','RETIRED') NOT NULL,
  `role_type` enum('Employee','Manager','Principal') NOT NULL,
  `emp_status` enum('PERMANENT','REGULAR PERMANENT','SUBSTITUTE','PROBATIONARY','TEMPORARY') NOT NULL,
  `date_joined` date NOT NULL,
  `date_retired` date DEFAULT NULL,
  `div_code` int(10) unsigned NOT NULL,
  `biometric_ID` varchar(45) NOT NULL,
  `school_ID` int(10) unsigned NOT NULL,
  `appointment_date` date NOT NULL,
  `faculty_type` enum('Non Teaching','Teaching') NOT NULL,
  `job_title_code` varchar(45) NOT NULL,
  `emp_No` int(10) unsigned NOT NULL,
  `dept_ID` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`emp_rec_ID`),
  UNIQUE KEY `biometrics_ID_UNIQUE` (`biometric_ID`),
  UNIQUE KEY `complete_item_no_UNIQUE` (`complete_item_no`),
  KEY `dept_ID_idx` (`dept_ID`),
  KEY `jt_emprec_idx` (`job_title_code`),
  KEY `emp_No_emprec` (`emp_No`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `pims_employment_records`
--

INSERT INTO `pims_employment_records` (`emp_rec_ID`, `complete_item_no`, `work_stat`, `role_type`, `emp_status`, `date_joined`, `date_retired`, `div_code`, `biometric_ID`, `school_ID`, `appointment_date`, `faculty_type`, `job_title_code`, `emp_No`, `dept_ID`) VALUES
(1, 'OSEC-DECSB-TCH2-390745-2016', 'WORKING', 'Employee', 'PERMANENT', '0000-00-00', NULL, 164, '1230087', 302261, '2012-08-05', 'Teaching', 'TCH2', 5110945, 1),
(2, 'OSEC-DECSB-TCH2-39764-2016', 'WORKING', 'Employee', 'PERMANENT', '0000-00-00', NULL, 164, '4321213', 302261, '2017-09-05', 'Teaching', 'DH1', 4743128, 2),
(3, 'OSEC-DECSB-TCH2-390990-2016', 'WORKING', 'Employee', 'SUBSTITUTE', '0000-00-00', NULL, 164, '1234', 302261, '2014-09-20', 'Teaching', 'TCH2', 5221094, 3),
(4, 'OSEC-DECSB-MTCHR1-390080-2016', 'RETIRED', 'Employee', 'TEMPORARY', '2016-07-11', '2017-09-09', 164, '456002', 302261, '1989-09-05', 'Teaching', 'MTCHR1', 5309127, 8),
(5, 'OSEC-DECSB-TCH1-391060-2016', 'WORKING', 'Employee', 'PROBATIONARY', '2017-09-10', NULL, 164, '23450090', 302261, '2017-09-19', 'Non Teaching', 'TCH1', 5166431, 5),
(6, 'OSEC-DECSB-MTCHR2-321160-2016', 'WORKING', 'Employee', 'PERMANENT', '2016-09-12', NULL, 164, '9876000', 302261, '2014-09-12', 'Teaching', 'MTCHR2', 5432123, 6),
(7, 'OSEC-DECSB-HTEACH1-392772-2010', 'WORKING', 'Employee', 'PERMANENT', '2016-10-04', NULL, 164, '45099235', 302261, '2010-10-09', 'Teaching', 'HTEACH1', 4990111, 2),
(8, 'OSEC-DECSB-HTEACH1-392009-2010', 'WORKING', 'Employee', 'PERMANENT', '2017-11-09', NULL, 164, '4509995', 302261, '2010-10-09', 'Teaching', 'HTEACH1', 5000129, 3),
(9, 'OSEC-DECSB-TCH3-3009860-2016', 'WORKING', 'Employee', 'TEMPORARY', '0000-00-00', NULL, 164, '4567654', 302261, '2015-09-11', 'Teaching', 'TCH3', 5412398, 4),
(11, 'OSEC-DECSB-HTEACH1-394542-2015', 'WORKING', 'Employee', 'PERMANENT', '2017-10-04', NULL, 164, '40989355', 302261, '2015-10-09', 'Teaching', 'HTEACH1', 4990054, 1),
(12, 'OSEC-DECSB-HTEACH1-391332-2015', 'WORKING', 'Employee', 'PERMANENT', '2016-10-04', NULL, 164, '422355', 302261, '2015-06-09', 'Teaching', 'HTEACH1', 5201107, 5),
(13, 'OSEC-DECSB-HTEACH1-398909-2010', 'WORKING', 'Employee', 'PERMANENT', '2017-11-09', NULL, 164, '459985', 302261, '2010-10-09', 'Teaching', 'HTEACH1', 5210011, 6),
(14, 'OSEC-DECSB-HTEACH1-394442-2009', 'WORKING', 'Employee', 'PERMANENT', '2016-10-04', NULL, 164, '4562345', 302261, '2009-10-09', 'Teaching', 'HTEACH1', 5566126, 7),
(15, 'OSEC-DECSB-TCH1-390745-2016', 'WORKING', 'Employee', 'PERMANENT', '0000-00-00', NULL, 164, '12333', 302261, '2017-09-05', 'Teaching', 'TCH1', 4800018, 1),
(16, 'OSEC-DECSB-TCH2-390060-2016', 'WORKING', 'Employee', 'PERMANENT', '0000-00-00', NULL, 164, '4578890', 302261, '2010-10-25', 'Teaching', 'TCH2', 4567891, 7),
(17, 'OSEC-DECSB-HTEACH1-397769-2014', 'WORKING', 'Employee', 'PERMANENT', '2017-11-09', NULL, 164, '455987', 302261, '2014-10-09', 'Teaching', 'HTEACH1', 5901112, 8),
(18, 'OSEC-DECSB-TCH1-397643-2015', 'WORKING', 'Employee', 'PERMANENT', '0000-00-00', NULL, 164, '555543', 302261, '2015-09-05', 'Teaching', 'TCH1', 4811100, 2),
(19, 'OSEC-DECSB-TCH1-391230-2015', 'WORKING', 'Employee', 'SUBSTITUTE', '2016-09-12', NULL, 164, '555093', 302261, '2015-09-20', 'Teaching', 'TCH1', 4899120, 3),
(20, 'OSEC-DECSB-R1-395422-2016', 'WORKING', 'Employee', 'PERMANENT', '0000-00-00', NULL, 164, '87576', 302261, '2016-10-10', 'Non Teaching', 'R1', 5002157, NULL),
(21, 'OSEC-DECSB-MTCHR1-396543-2016', 'WORKING', 'Employee', 'PERMANENT', '1999-12-06', NULL, 164, '787000', 302261, '2016-10-04', 'Teaching', 'MTCHR1', 5880365, 1),
(22, 'OSEC-DECSB-MTCHR1-390450-2012', 'RETIRED', 'Employee', 'PERMANENT', '2016-09-12', NULL, 164, '154321', 302261, '2012-09-05', 'Teaching', 'TCH1', 4900016, 4),
(23, 'OSEC-DECSB-MTCHR2-394444-2016', 'WORKING', 'Employee', 'PERMANENT', '2017-10-04', NULL, 164, '7898000', 302261, '2015-10-02', 'Teaching', 'MTCHR2', 5353113, 4),
(24, 'OSEC-DECSB-TCH1-391440-2010', 'WORKING', 'Employee', 'PERMANENT', '0000-00-00', NULL, 164, '009322', 302261, '2010-09-19', 'Teaching', 'TCH1', 4900871, 6),
(25, 'OSEC-DECSB-TCH1-323450-2016', 'WORKING', 'Employee', 'PERMANENT', '0000-00-00', NULL, 164, '453222', 302261, '2016-09-12', 'Teaching', 'TCH1', 4912340, 8),
(26, 'OSEC-DECSB-TCH1-399991-2016', 'WORKING', 'Employee', 'PERMANENT', '0000-00-00', NULL, 164, '009933', 302261, '2017-09-05', 'Teaching', 'TCH1', 4901154, 7),
(27, 'OSEC-DECSB-HTEACH1-397643-2015', 'WORKING', 'Employee', 'PERMANENT', '2016-06-09', NULL, 164, '55000013', 302261, '2015-09-05', 'Teaching', 'HTEACH1', 4912093, 4),
(28, 'OSEC-DECSB-TCH2-391230-2015', 'WORKING', 'Employee', 'SUBSTITUTE', '2016-09-12', NULL, 164, '5777123', 302261, '2015-09-20', 'Teaching', 'TCH2', 5001094, 5),
(29, 'OSEC-DECSB-TCH2-390450-2012', 'RETIRED', 'Employee', 'PERMANENT', '0000-00-00', NULL, 164, '144411', 302261, '2012-09-05', 'Teaching', 'TCH1', 5231607, 6),
(30, 'OSEC-DECSB-TCH2-391440-2010', 'WORKING', 'Employee', 'PERMANENT', '0000-00-00', NULL, 164, '143341', 302261, '2010-09-19', 'Teaching', 'TCH2', 5287126, 7),
(31, 'OSEC-DECSB-TCH2-356666-2016', 'WORKING', 'Employee', 'PERMANENT', '0000-00-00', NULL, 164, '4332122', 302261, '2016-09-12', 'Teaching', 'TCH2', 5340912, 8),
(32, 'OSEC-DECSB-MTCHR1-323932-2016', 'WORKING', 'Employee', 'PERMANENT', '2017-09-12', NULL, 164, '8896112', 302261, '2016-09-12', 'Teaching', 'MTCHR1', 5400127, 2),
(33, 'OSEC-DECSB-MTCHR1-391880-2010', 'WORKING', 'Employee', 'PERMANENT', '2017-09-10', NULL, 164, '1666241', 302261, '2010-09-19', 'Teaching', 'MTCHR1', 5501298, 2),
(34, 'OSEC-DECSB-MTCHR2-323450-2016', 'WORKING', 'Employee', 'PERMANENT', '2017-09-12', NULL, 164, '4661122', 302261, '2016-09-12', 'Teaching', 'MTCHR1', 5513092, 5),
(35, 'OSEC-DECSB-MTCHR1-326550-2016', 'WORKING', 'Employee', 'PERMANENT', '2017-09-12', NULL, 164, '7678112', 302261, '2016-09-12', 'Teaching', 'MTCHR1', 5677342, 6),
(36, 'OSEC-DECSB-CASH1-323990-2016', 'WORKING', 'Employee', 'PERMANENT', '2017-09-12', NULL, 164, '4117622', 302261, '2016-09-12', 'Non Teaching', 'CASH1', 5756153, NULL),
(37, 'OSEC-DECSB-ICTD-389999-2016', 'WORKING', 'Employee', 'PERMANENT', '0000-00-00', NULL, 164, '8888812', 302261, '2016-09-12', 'Non Teaching', 'ICTD', 5902312, 6),
(38, 'gvjnfg', 'WORKING', 'Employee', 'PERMANENT', '2017-10-11', NULL, 547, '57665', 5654, '2017-10-25', 'Non Teaching', 'TCH1', 1, NULL),
(41, 'gvfjnfg', 'WORKING', 'Employee', 'PERMANENT', '2017-10-11', NULL, 547, '576565', 5654, '2017-10-25', 'Non Teaching', 'HRM1', 4, NULL),
(42, 'GHGH', 'WORKING', 'Employee', 'PERMANENT', '2017-10-04', NULL, 657, '7HCVH', 6576, '2017-10-25', 'Teaching', 'TCH1', 1, 2),
(43, 'OSEC-DECSB-P3-321160-2016	', 'WORKING', 'Principal', 'PERMANENT', '2014-10-14', NULL, 164, '45099244', 302261, '2016-10-11', 'Non Teaching', 'P3', 15, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pims_family_background`
--

CREATE TABLE IF NOT EXISTS `pims_family_background` (
  `fb_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `spouse_firstname` varchar(45) DEFAULT NULL,
  `spouse_middlename` varchar(45) DEFAULT NULL,
  `spouse_lastname` varchar(45) DEFAULT NULL,
  `spouse_extension_name` varchar(45) DEFAULT NULL,
  `father_fname` varchar(45) NOT NULL,
  `father_mname` varchar(45) NOT NULL,
  `father_lname` varchar(45) NOT NULL,
  `father_birthdate` date NOT NULL,
  `father_occupation` varchar(45) NOT NULL,
  `mother_fname` varchar(45) NOT NULL,
  `mother_mname` varchar(45) NOT NULL,
  `mother_maidenname` varchar(45) NOT NULL,
  `mother_lname` varchar(45) NOT NULL,
  `mother_birthdate` date NOT NULL,
  `mother_occupation` varchar(45) NOT NULL,
  `no_of_siblings` int(10) unsigned NOT NULL,
  `emp_No` int(10) unsigned NOT NULL,
  PRIMARY KEY (`fb_ID`),
  UNIQUE KEY `fb_ID_UNIQUE` (`fb_ID`),
  KEY `emp_NO_idx` (`emp_No`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pims_job_title`
--

CREATE TABLE IF NOT EXISTS `pims_job_title` (
  `job_title_code` varchar(45) NOT NULL,
  `job_title_name` varchar(45) NOT NULL,
  PRIMARY KEY (`job_title_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pims_job_title`
--

INSERT INTO `pims_job_title` (`job_title_code`, `job_title_name`) VALUES
('ACCT', 'Accountant'),
('ADAID3', 'Administrative Aid 3'),
('ADOF1', 'Administrative Officer I'),
('ASSP', 'Assistant Special School Principal'),
('CASH1', 'Cashier I'),
('CMM', 'Construction and Maintenance Man'),
('DENT1', 'Dentist I'),
('DH1', 'Department Head I'),
('DORMG1', 'Dormitory Manager I'),
('DR', 'Division Representative'),
('EPS', 'Education Program Supervisor'),
('ESUP1', 'Education Supervisor I'),
('EXED2', 'Executive Director II'),
('HR1', 'Human Resource 1'),
('HRM1', 'Human Resource Manager I'),
('HRMO1', 'Human Resource Management Officer I'),
('HTEACH1', 'Head Teacher I'),
('HTEACH2', 'Head Teacher II'),
('HTEACH3', 'Head Teacher III'),
('HTEACH4', 'Head Teacher V'),
('HTEACH5', 'Head Teacher V'),
('HTEACH6', 'Head Teacher VI'),
('IAUD1', 'Internal Auditor I'),
('ICTD', 'ICT Director'),
('INFOSA2', 'Information Systems Analyst II'),
('INST1', 'Instructor I'),
('INST2', 'Instructor II'),
('INST3', 'Instructor III'),
('LIS', 'Learner Information System'),
('MDOF2', 'Medical Officer II'),
('MTCHR1', 'Master Teacher I'),
('MTCHR2', 'Master Teacher II'),
('MTCHR3', 'Master Teacher III'),
('MTCHR4', 'Master Teacher IV'),
('NURS1', 'Nurse I'),
('P3', 'Principal III'),
('PDO1', 'Project Development Officer I'),
('PPROS', 'Publication Production Supervisor'),
('R1', 'Registrar I'),
('RK1', 'Record Keeper 1'),
('SADAS1', 'Senior Administrative Assistant I'),
('SECG1', 'Security Guard I'),
('SECSP2', 'Secondary School Principal'),
('SO1', 'Supply Officer 1'),
('SP1', 'School Principal I'),
('SP2', 'School Principal II'),
('SP3', 'School Principal III'),
('SP4', 'School Principal IV'),
('SPET1', 'Special Education Teacher I'),
('SPSP1', 'Special School Principal I'),
('SPSP2', 'Special School Principal II'),
('SUO1', 'Supply Officer I'),
('T1', 'Teaching 1'),
('T2', 'Teacher 2'),
('T3', 'Teacher 3'),
('TCH1', 'Teacher I'),
('TCH2', 'Teacher II'),
('TCH3', 'Teacher III'),
('UTW1', 'Utility Worker I'),
('VOCSS', 'Vocational School Superintendent');

-- --------------------------------------------------------

--
-- Table structure for table `pims_leave`
--

CREATE TABLE IF NOT EXISTS `pims_leave` (
  `leave_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('Official','Personal') NOT NULL,
  `date_submitted` date NOT NULL,
  `date_responded` date NOT NULL,
  `leave_start` datetime NOT NULL,
  `leave_end` datetime NOT NULL,
  `place_to_be_visited` varchar(110) DEFAULT NULL,
  `purpose` text,
  `approved_by` varchar(55) NOT NULL,
  `attachment` longblob,
  `attachment_name` text,
  `attachment_type` varchar(45) DEFAULT NULL,
  `leave_application_status` varchar(45) DEFAULT NULL,
  `leave_bal_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`leave_ID`),
  KEY `fk_PIMS_LEAVE_PIMS_LEAVE_BALANCE1_idx` (`leave_bal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pims_leave_balance`
--

CREATE TABLE IF NOT EXISTS `pims_leave_balance` (
  `leave_bal_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `leave_credits` varchar(20) NOT NULL,
  `leave_status` varchar(45) NOT NULL,
  `emp_No` int(10) unsigned NOT NULL,
  PRIMARY KEY (`leave_bal_ID`),
  UNIQUE KEY `PIMS_LEAVE_BALANCEcol_UNIQUE` (`leave_bal_ID`),
  KEY `emp_No_idx` (`emp_No`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pims_message`
--

CREATE TABLE IF NOT EXISTS `pims_message` (
  `p_mes_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cms_account_ID` int(10) unsigned NOT NULL,
  `p_message` text NOT NULL,
  `p_status` enum('0','1') NOT NULL,
  `p_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `p_part_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`p_mes_id`),
  KEY `user_mes_idx` (`p_part_id`),
  KEY `account_mess_idx` (`cms_account_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pims_participants`
--

CREATE TABLE IF NOT EXISTS `pims_participants` (
  `p_part_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `p_user_one` int(10) unsigned NOT NULL,
  `p_user_two` int(10) unsigned NOT NULL,
  PRIMARY KEY (`p_part_id`),
  KEY `user_one_idx` (`p_user_one`),
  KEY `user_two_idx` (`p_user_two`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pims_performance_report`
--

CREATE TABLE IF NOT EXISTS `pims_performance_report` (
  `perf_rep_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `award_name` varchar(110) NOT NULL,
  `award_no` int(10) unsigned DEFAULT NULL,
  `grants` varchar(110) DEFAULT NULL,
  `remarks` varchar(110) DEFAULT NULL,
  `emp_No` int(10) unsigned NOT NULL,
  PRIMARY KEY (`perf_rep_id`),
  KEY `fk_PERFORMANCE_REPORT_Personnel1_idx` (`emp_No`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pims_personnel`
--

CREATE TABLE IF NOT EXISTS `pims_personnel` (
  `emp_No` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `P_picture` longblob,
  `P_fname` varchar(45) NOT NULL,
  `P_mname` varchar(45) DEFAULT NULL,
  `P_lname` varchar(45) NOT NULL,
  `P_extension_name` varchar(5) DEFAULT NULL,
  `P_email` varchar(45) DEFAULT NULL,
  `pims_gender` enum('Male','Female') NOT NULL,
  `pims_age` int(10) unsigned DEFAULT NULL,
  `pims_birthdate` date NOT NULL,
  `place_of_birth` varchar(115) NOT NULL,
  `height_m` double NOT NULL,
  `weight_kg` double NOT NULL,
  `temp_address_street` varchar(110) DEFAULT NULL,
  `temp_address_house_no` int(10) unsigned DEFAULT NULL,
  `temp_address_subdivision_village` varchar(55) DEFAULT NULL,
  `temp_address_barangay` varchar(45) NOT NULL,
  `temp_address_municipality_city` varchar(45) NOT NULL,
  `temp_address_province` varchar(45) NOT NULL,
  `temp_address_zipCode` int(10) unsigned NOT NULL,
  `perm_address_street` varchar(45) DEFAULT NULL,
  `perm_address_house_no` int(10) unsigned DEFAULT NULL,
  `perm_address_subdivision_village` varchar(55) DEFAULT NULL,
  `perm_address_barangay` varchar(45) NOT NULL,
  `perm_address_municipality_city` varchar(45) NOT NULL,
  `perm_address_province` varchar(45) NOT NULL,
  `perm_address_zipCode` int(10) unsigned NOT NULL,
  `nationality` varchar(45) NOT NULL,
  `dual_citznshp_by_birth` varchar(55) DEFAULT NULL,
  `dual_citznshp_by_naturalization` varchar(55) DEFAULT NULL,
  `bloodtype` varchar(5) DEFAULT NULL,
  `civil_status` enum('SINGLE','MARRIED','LIVE-IN','SEPARATED','WIDOW','WIDOWER','DIVORCED') NOT NULL,
  `pims_religion` varchar(45) DEFAULT NULL,
  `pims_image_type` varchar(45) NOT NULL,
  `pims_contact_no` varchar(20) DEFAULT NULL,
  `pims_telephone_no` varchar(45) DEFAULT NULL,
  `GSIS_No` varchar(25) DEFAULT NULL,
  `PAG_IBIG_id` varchar(45) DEFAULT NULL,
  `SSS_no` varchar(45) DEFAULT NULL,
  `TIN_no` varchar(45) DEFAULT NULL,
  `PHILHEALTH_no` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`emp_No`),
  UNIQUE KEY `P_Name` (`P_fname`,`P_mname`,`P_lname`),
  UNIQUE KEY `PAG_IBIG_id_UNIQUE` (`PAG_IBIG_id`),
  UNIQUE KEY `SSS_no_UNIQUE` (`SSS_no`),
  UNIQUE KEY `TIN_no_UNIQUE` (`TIN_no`),
  UNIQUE KEY `GSIS_No_UNIQUE` (`GSIS_No`),
  UNIQUE KEY `PHILHEALTH_no_UNIQUE` (`PHILHEALTH_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5902313 ;

--
-- Dumping data for table `pims_personnel`
--

INSERT INTO `pims_personnel` (`emp_No`, `P_picture`, `P_fname`, `P_mname`, `P_lname`, `P_extension_name`, `P_email`, `pims_gender`, `pims_age`, `pims_birthdate`, `place_of_birth`, `height_m`, `weight_kg`, `temp_address_street`, `temp_address_house_no`, `temp_address_subdivision_village`, `temp_address_barangay`, `temp_address_municipality_city`, `temp_address_province`, `temp_address_zipCode`, `perm_address_street`, `perm_address_house_no`, `perm_address_subdivision_village`, `perm_address_barangay`, `perm_address_municipality_city`, `perm_address_province`, `perm_address_zipCode`, `nationality`, `dual_citznshp_by_birth`, `dual_citznshp_by_naturalization`, `bloodtype`, `civil_status`, `pims_religion`, `pims_image_type`, `pims_contact_no`, `pims_telephone_no`, `GSIS_No`, `PAG_IBIG_id`, `SSS_no`, `TIN_no`, `PHILHEALTH_no`) VALUES
(1, NULL, 'Ryan', 'Aquino', 'Rodriguez', NULL, 'ryan@gmail.com', 'Male', 35, '1987-09-13', '', 0, 0, 'Rizal', 5, NULL, 'Washington', 'Sto. Domingo', 'Albay', 4501, 'Rizal', 5, NULL, 'Washington', 'Sto. Domingo', 'Albay', 4501, 'Filipino', NULL, NULL, 'A', 'MARRIED', 'Roman Catholic', '', '096135665', NULL, '5643', NULL, NULL, NULL, NULL),
(2, NULL, 'Rodel', 'Perez', 'Naz', NULL, 'rodel@gmail.com', 'Female', NULL, '1978-09-06', '', 0, 0, 'Mabini', 45, NULL, 'Cabangan', 'Camalig', 'Albay', 4502, 'Mabini', 45, NULL, 'Cabangan', 'Camalig', 'Albay', 4502, 'Filipino', NULL, NULL, 'O', 'MARRIED', 'Roman Catholic', '', '09465684', NULL, '5234', NULL, NULL, NULL, NULL),
(3, NULL, 'Michael', 'Mabini', 'Brogada', NULL, 'michael@gmail.com', 'Male', 35, '1985-09-12', '', 0, 0, 'Bonifacio', 45, NULL, 'Poblacion', 'Daraga', 'Albay', 4502, 'Bonifacio', 45, NULL, 'Poblacion', 'Daraga', 'Albay', 4502, 'Filipino', NULL, NULL, 'A', 'SINGLE', 'roman catholic', '', '094356788', NULL, '344', NULL, NULL, NULL, NULL),
(4, NULL, 'Rea Kaye', 'Pantoja', 'Llamazares', NULL, 'reakaye@gmail.com', 'Female', 20, '1996-11-02', '', 0, 0, 'Imperial', 61, NULL, 'Poblacion', 'Guinobatan', 'Albay', 4502, 'Imperial', 61, NULL, 'Poblacion', 'Guinobatan', 'Albay', 4502, 'Filipino', NULL, NULL, 'A', 'MARRIED', 'Roman Catholic', '', '093456767', NULL, '4242', NULL, NULL, NULL, NULL),
(5, NULL, 'Yves', 'Alaurin', 'Solis', NULL, 'yves@gmail.com', 'Male', 20, '1996-10-12', '', 0, 0, 'Rizal', 24, NULL, 'Stone', 'Legazpi City', 'Albay', 4501, 'Rizal', 24, NULL, 'Stone', 'Legazpi City', 'Albay', 4501, 'Filipino', NULL, NULL, 'A', 'SINGLE', 'Roman Catholic', '', '0965432', NULL, '2395', NULL, NULL, NULL, NULL),
(6, NULL, 'Ricardo', 'Guim', 'Barrameda', NULL, 'ricardo@gmail.com', 'Female', 27, '2017-09-12', '', 0, 0, 'Tandang Sora', 58, NULL, 'Em''s', 'Legazpi', 'Albay', 4501, 'Tandang Sora', 58, NULL, 'Em''s', 'Legazpi', 'Albay', 4501, 'Filipino', NULL, NULL, 'A', 'SINGLE', 'Roman Catolic', '', '0923567', NULL, '7654', NULL, NULL, NULL, NULL),
(7, NULL, 'Reinz', 'Cruz', 'Yap', NULL, 'reinz@gmail.com', 'Male', 30, '0000-00-00', '', 0, 0, 'Bonifacio', 21, NULL, 'Inarado', 'Daraga', 'Albay', 4501, 'Bonifacio', 21, NULL, 'Inarado', 'Daraga', 'Albay', 4501, 'Filipino', NULL, NULL, 'A', 'SINGLE', 'Roman Catholic', '', '09764562', NULL, '6548', NULL, NULL, NULL, NULL),
(8, NULL, 'Vicente', 'Lim', 'Embudo', NULL, 'vince@gmail.com', 'Male', 32, '1997-09-21', '', 0, 0, 'Mabini', 45, NULL, 'Cruzada', 'Legazpi City', 'Albay', 4500, 'Mabini', 45, NULL, 'Cruzada', 'Legazpi City', 'Albay', 4500, 'Filipino', NULL, NULL, 'O', 'SINGLE', 'Roman Catholic', '', '0965256', NULL, '346', NULL, NULL, NULL, NULL),
(9, NULL, 'Shiena', 'Malla', 'Occidental', NULL, 'shiena@gmail.com', 'Female', 21, '1996-07-23', '', 0, 0, 'Imperial', 23, NULL, 'Poblacion', 'Guinobatan', 'Albay', 4503, 'Imperial', 23, NULL, 'Poblacion', 'Guinobatan', 'Albay', 4503, 'Filipino', NULL, NULL, 'O', 'SINGLE', 'Roman Catholic', '', '097654', NULL, '2345', NULL, NULL, NULL, NULL),
(10, NULL, 'Christine', 'Revilla', 'Arroz', NULL, 'christine@gmail.com', 'Female', 21, '1996-04-13', '', 0, 0, 'Rizal', 45, NULL, 'Bascaran', 'Guinobatan', 'Albay', 4503, 'Rizal', 45, NULL, 'Bascaran', 'Guinobatan', 'Albay', 4503, 'Filipino', NULL, NULL, 'AB', 'SINGLE', 'Roman Catholic', '', '0965433', NULL, '9087654', NULL, NULL, NULL, NULL),
(11, NULL, 'Jenevilyn', NULL, 'Recato', NULL, 'jene@gmail.com', 'Female', 20, '2017-08-09', '', 0, 0, 'Bonifacio', 21, NULL, 'Basud', 'Guinobatan', 'Albay', 4503, 'Bonifacio', 21, NULL, 'Basud', 'Guinobatan', 'Albay', 4503, 'Filipino', NULL, NULL, 'O', 'MARRIED', 'Roman Catholic', '', '096532', NULL, '65432', NULL, NULL, NULL, NULL),
(12, NULL, 'Macinas', NULL, 'Salome', NULL, 'Salome@yahoo.com', 'Female', 35, '1987-08-05', '', 0, 0, NULL, 7, NULL, 'Sagpon Daraga Albay', 'Sagpon Daraga \r\n\r\nAlbay', 'Sagpon Daraga Albay', 4501, NULL, NULL, NULL, 'Sagpon Daraga Albay', 'Sagpon Daraga Albay', 'Sagpon Daraga Albay', 4501, 'Filipino', NULL, NULL, 'A', 'SINGLE', 'Roman Catholic', 'dfgdfg', NULL, NULL, 'dfgdsfg', NULL, NULL, NULL, NULL),
(13, NULL, 'Andres', NULL, 'Dela Torre', NULL, 'william@gmail.com', 'Male', 45, '2017-10-24', '', 0, 0, 'Blumentrit', 1, NULL, 'Cruzada', 'Legazpi City', 'Albay', 4501, 'Blumentrit', 1, NULL, 'Cruzada', 'Legazpi City', 'Albay', 4501, 'Filipino', NULL, NULL, 'A', 'SINGLE', 'Roman Catholic', '', '093125447', '458765', '487894', '45456', '35689', '387489', '74874'),
(14, NULL, 'Lloyd', NULL, 'Garcia', NULL, 'lloyd@gmail.com', 'Male', 28, '2017-10-10', '', 0, 0, 'Rizal', 5, NULL, 'Em''s', 'Legazpi City', 'Albay', 4501, 'Rizal', 5, NULL, 'Em''s', 'Legazpi City', 'Albay', 4501, 'Filipino', NULL, NULL, 'B', 'SINGLE', 'Roman Catholic', '', '0932458764', NULL, NULL, NULL, NULL, NULL, NULL),
(15, NULL, 'Jeremy', NULL, 'Cruz', 'III', 'jeremy@gmail.com', 'Male', 35, '2017-10-16', '', 0, 0, 'Rizal', 54, NULL, 'EM''s', 'Legazpi City', 'Albay', 4500, 'Rizal', 54, NULL, 'EM''s', 'Legazpi City', 'Albay', 4500, 'Filipino', NULL, NULL, 'B', 'SINGLE', 'Roman Catholic', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, NULL, 'NiÃ±o', NULL, 'De Jesus', NULL, 'niÃ±o@gmail.com', 'Male', 19, '2017-10-24', '', 0, 0, 'Mabini', 24, NULL, 'EM''s', 'Legazpi City', 'Albay', 4500, 'Mabini', 24, NULL, 'EM''s', 'Legazpi City', 'Albay', 4500, 'Filipino', NULL, NULL, 'B', 'SINGLE', 'Roman Catholic', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, NULL, 'Jhon', NULL, 'Bolima', NULL, 'jhon@gmail.com', 'Male', 19, '0000-00-00', '', 0, 0, 'Bonifacio', 47, NULL, 'Poblacion', 'Camalig', 'Albay', 4502, 'Bonifacio', 47, NULL, 'Poblacion', 'Camalig', 'Albay', 4502, 'Filipino', NULL, NULL, 'A', 'SINGLE', 'Roman Catholic', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, NULL, 'Max', NULL, 'Hizo', NULL, 'max@gmail.com', 'Male', 19, '0000-00-00', '', 0, 0, 'Mabini', 14, NULL, 'Barriada', 'Legazpi City', 'Albay', 4501, 'Mabini', 14, NULL, 'Barriada', 'Legazpi City', 'Albay', 4501, 'Filipino', NULL, NULL, 'B', 'SINGLE', 'Roman Catholic', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, NULL, 'Jess', NULL, 'Besa', NULL, 'jess@gmail.com', 'Male', 19, '0000-00-00', '', 0, 0, 'Rizal', 45, NULL, 'Poblacion', 'Camalig', 'Albay', 4502, 'Rizal', 45, NULL, 'Poblacion', 'Camalig', 'Albay', 4502, 'Filipino', NULL, NULL, 'A', 'SINGLE', 'Roman Catholic', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, NULL, 'Nicole', NULL, 'Banzuela', NULL, 'nicole@gmail.com', 'Female', 19, '2017-10-09', '', 0, 0, 'Mabini', 88, NULL, 'Cruzada', 'Guinobatan', 'Albay', 4503, 'Mabini', 88, NULL, 'Cruzada', 'Guinobatan', 'Albay', 4503, 'Filipino', NULL, NULL, 'A', 'SINGLE', 'Roman Catholic', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, NULL, 'Emarish', NULL, 'Rebosura', NULL, 'emarish@gmail.com', 'Female', 20, '2017-10-23', '', 0, 0, 'Rizal', 12, NULL, 'Cruzada', 'Legazpi City', 'Albay', 4500, 'Rizal', 12, NULL, 'Cruzada', 'Legazpi City', 'Albay', 4500, 'Filipino', NULL, NULL, 'O', 'SINGLE', 'Roman Catholic', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, NULL, 'Janis', NULL, 'Barrameda', NULL, 'janis@gmail.com', 'Male', 20, '2017-10-01', '', 0, 0, 'Mabini', 88, NULL, 'St. Agnes', 'Legazpi City', 'Albay', 4500, 'Mabini', 88, NULL, 'St. Agnes', 'Legazpi City', 'Albay', 4500, 'Filipino', NULL, NULL, 'A', 'SINGLE', 'Roman Catholic', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, NULL, 'Kaye', NULL, 'Lucido', NULL, 'kaye@gmail.com', 'Female', 20, '2017-10-02', '', 0, 0, 'Rizal', 2, NULL, 'Bagumbayan', 'Legazpi City', 'Albay', 4501, 'Rizal', 2, NULL, 'Bagumbayan', 'Legazpi City', 'Albay', 4501, 'FIlipino', NULL, NULL, 'A', 'SINGLE', 'Roman Catholic', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, NULL, 'Katrina', NULL, 'Britanico', NULL, 'katrina@gmail.com', 'Female', 20, '2017-10-18', '', 0, 0, 'Bonifacio', 22, NULL, 'Galang', 'Tabacco', 'Albay', 4501, 'Bonifacio', 22, NULL, 'Galang', 'Tabacco', 'Albay', 4501, 'Filipino', NULL, NULL, 'B', 'SINGLE', 'Roman Catholic', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, NULL, 'Joy', NULL, 'Pintor', NULL, 'joy@gmail.com', 'Female', 21, '0000-00-00', '', 0, 0, 'Blumentrit', 61, NULL, 'Tinago', 'Ligao City', 'Albay', 4502, 'Blumentrit', 61, NULL, 'Tinago', 'Ligao City', 'Albay', 4502, 'Filipino', NULL, NULL, 'AB', 'SINGLE', 'Roman Catholic', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, NULL, 'Kenn', NULL, 'Mendez', NULL, 'kenn@gmail.com', 'Male', 22, '0000-00-00', '', 0, 0, 'Mabini', 1, NULL, 'Poblacion', 'Cumadcad', 'Sorsogon', 3500, 'Mabini', 1, NULL, 'Poblacion', 'Cumadcad', 'Sorsogon', 3500, 'Filipino', NULL, NULL, 'A', 'MARRIED', 'Roman Catholic', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, NULL, 'Mark', NULL, 'Bundalian', NULL, 'mark@gmail.com', 'Male', 21, '2017-10-25', '', 0, 0, 'Rizal', 4, NULL, 'Bagtang', 'Daraga', 'Albay', 4502, 'Rizal', 4, NULL, 'Bagtang', 'Daraga', 'Albay', 4502, 'Filipino', NULL, NULL, NULL, 'SINGLE', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, NULL, 'Irene', NULL, 'Marmol', NULL, 'irene@gmail.com', 'Female', 20, '2017-10-23', '', 0, 0, 'Mabini', 34, NULL, 'Bagtang', 'Daraga', 'Albay', 4502, 'Mabini', 34, NULL, 'Bagtang', 'Daraga', 'Albay', 4502, 'Filipino', NULL, NULL, 'A', 'SINGLE', 'Roman Catholic', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, NULL, 'Janine', NULL, 'Arimado', NULL, 'janine@gmail.com', 'Female', 21, '2017-10-09', '', 0, 0, 'Rizal', 50, NULL, 'Tahao', 'Legazpi City', 'Albay', 4500, 'Rizal', 50, NULL, 'Tahao', 'Legazpi City', 'Albay', 4500, 'Filipino', NULL, NULL, 'AB', 'MARRIED', 'Roman Catholic', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, NULL, 'Janelle', 'Abilgoz', 'Lagatuz', NULL, 'janelle@gmail.com', 'Female', 21, '2017-10-16', '', 0, 0, 'Mabini', 24, NULL, 'Sagpon', 'Daet', 'Camarines Norte', 3560, 'Mabini', 24, NULL, 'Sagpon', 'Daet', 'Camarines \r\n\r\nNorte', 3560, 'Filipino', NULL, NULL, 'A', 'SINGLE', 'Roman Catholic', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, NULL, 'Giovani', 'Alzol', 'CaÃ±a', NULL, 'giovani@gmail.com', 'Male', 22, '2017-10-03', '', 0, 0, 'Bonifacio', 44, NULL, 'Tagas', 'Daraga', 'Albay', 4502, 'Bonifacio', 44, NULL, 'Tagas', 'Daraga', 'Albay', 4502, 'Filipino', NULL, NULL, 'A', 'SINGLE', 'Roman Catholic', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, NULL, 'Jessa', NULL, 'Oane', NULL, 'jessa@gmail.com', 'Female', 22, '2017-10-17', '', 0, 0, 'Imperial', 54, NULL, 'Gapo', 'Legazpi City', 'Albay', 4500, 'Imperial', 54, NULL, 'Gapo', 'Legazpi City', 'Albay', 4500, 'Filipino', NULL, NULL, 'O', 'SINGLE', 'Roman Catholic', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, NULL, 'Ace', NULL, 'Bio', NULL, 'ace@gmail.com', 'Male', 22, '0000-00-00', '', 0, 0, 'Mabini', 23, NULL, 'Tulado', 'Ligao City', 'Albay', 4503, 'Mabini', 23, NULL, 'Tulado', 'Ligao City', 'Albay', 4503, 'Filipino', NULL, NULL, 'O', 'SINGLE', 'Roman Catholic', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, NULL, 'Karen', NULL, 'Bagasbas', NULL, 'karen@gmail.com', 'Female', 20, '2017-07-24', '', 0, 0, 'Rizal', 99, NULL, 'Travesia', 'Camalig', 'Albay', 4502, 'Rizal', 99, NULL, 'Travesia', 'Camalig', 'Albay', 4502, 'Filipino', NULL, NULL, 'AB', 'MARRIED', 'Roman Catholic', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, NULL, 'Clint', NULL, 'Baliat', NULL, NULL, 'Male', NULL, '2017-10-23', 'Guinobatan', 167, 50, NULL, NULL, NULL, 'San Francisco', 'Guinobatan', 'Albay', 4502, NULL, NULL, NULL, 'San Francisco', 'Guinobatan', 'Albay', 4502, 'Filipino', NULL, NULL, NULL, 'DIVORCED', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, NULL, 'Vice', NULL, 'Ganda', NULL, NULL, 'Male', NULL, '2017-10-02', 'Legazpi City', 169, 60, NULL, NULL, NULL, 'Em''s', 'Legazpi City', 'Albay', 4502, NULL, NULL, NULL, 'Em''s', 'Legazpi City', 'Albay', 4502, 'Filipino', NULL, NULL, NULL, 'SINGLE', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, NULL, 'Ryzza', NULL, 'Dizon', NULL, NULL, 'Female', NULL, '2017-10-17', 'Daraga', 140, 40, NULL, NULL, NULL, 'Barriada', 'Legazpi City', 'Albay', 4500, NULL, NULL, NULL, 'Barriada', 'Legazpi City', 'Albay', 4500, 'Filipino', NULL, NULL, NULL, 'MARRIED', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, NULL, 'Jennylyn', NULL, 'Mercado', NULL, NULL, 'Female', NULL, '0000-00-00', 'Rizal', 160, 50, NULL, NULL, NULL, 'Cruzada', 'Legazpi City', 'Albay', 4500, NULL, NULL, NULL, 'Cruzada', 'Legazpi City', 'Albay', 4500, 'Filipino', NULL, NULL, NULL, 'SEPARATED', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, NULL, 'Jabb', NULL, 'Balmedina', NULL, 'balmedina99@gmail.com', 'Female', 29, '1988-06-14', 'Legazpi City', 65.7, 67.4, NULL, NULL, NULL, 'Legazpi \r\n\r\nCity', 'Legazpi City', 'Legazpi City', 4500, NULL, NULL, NULL, 'Legazpi City', 'Legazpi City', 'Albay', 4500, 'Filipino', NULL, NULL, NULL, 'SINGLE', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4567891, NULL, 'Vincent', 'Reyes', 'Llanco', 'IV', 'vincereyes@gmail.com', 'Male', 32, '1985-01-27', 'Matnog, Sorsogon', 1.61, 56, NULL, 11, '', 'Em''s', 'Legazpi City', 'Albay', 4505, 'San Andres', 90, 'Happy Homes', 'Cobo', 'Tabaco City', 'Albay', 4511, 'Filipino', '', '', 'AB', 'MARRIED', 'Roman \r\n\r\nCatholic', '', '09123456789', '099-012', 'CM 3456121', '585511', '0999963', '000112', '1239876'),
(4743128, NULL, 'Joseph', 'Bueno', 'Ludovice', NULL, 'joseph@gmail.com', 'Male', 37, '1980-08-22', 'Sto.Domingo, Albay', 1.66, 61, 'Flores St.', NULL, '', 'Mabini', 'Sto. Domingo', 'Albay', 4508, 'Flores St.', NULL, '', 'Mabini', 'Sto. Domingo', 'Albay', 4508, 'Filipino', '', '', 'O', 'MARRIED', 'Born \r\n\r\nAgain', '', '09999954321', '003-008', 'EF 122517', '789671', '98081', '7551', '321335'),
(4800018, NULL, 'Jorlan', 'Amer', 'Ponce', NULL, 'jorlanP@gmail.com', 'Male', 37, '1980-08-22', 'Sto.Domingo, Albay', 1.66, 61, 'Flores St.', NULL, '', 'Mabini', 'Sto. Domingo', 'Albay', 4508, 'Flores St.', NULL, '', 'Mabini', 'Sto. Domingo', 'Albay', 4508, 'Filipino', '', '', 'O', 'MARRIED', 'Born \r\n\r\nAgain', '', '09990954321', '003-008', 'SD 2211334', '2224444', '44451221', '11337551', '23231335'),
(4811100, NULL, 'Vicky', 'Reyes', 'Lorico', NULL, 'vickyreyes@gmail.com', 'Female', 32, '1985-01-27', 'Matnog, Sorsogon', 1.61, 56, NULL, 11, '', 'Em''s', 'Legazpi City', 'Albay', 4505, 'San Andres', 90, 'Happy Homes', 'Cobo', 'Tabaco City', 'Albay', 4511, 'Filipino', '', '', 'AB', 'MARRIED', 'Roman Catholic', '', '09123456789', '099-012', 'CF 21112', '5211111', '009990', '099900', '3212876'),
(4899120, NULL, 'John Rey', 'Roxas', 'Pacala', 'Jr.', 'jrpacala@gmail.com', 'Male', 24, '1993-04-04', 'Ziga Memorial Hospital, Tabaco City', 1.57, 55, NULL, NULL, '', 'San Isidro', 'Malilipot', 'Albay', 4508, NULL, NULL, '', 'San \r\n\r\nLorenzo', 'Tabaco City', 'Albay', 4511, 'Filipino', '', '', 'O', 'SINGLE', 'Roman Catholic', '', NULL, '599-597', 'CY 2444571', '1244565', '1124451', '611111', '4111100'),
(4900016, NULL, 'Jasper', 'Gamboa', 'Rosero', NULL, 'jorlanP@gmail.com', 'Male', 37, '1980-08-22', 'Sto.Domingo, Albay', 1.66, 61, 'Flores St.', NULL, '', 'Mabini', 'Sto. Domingo', 'Albay', 4508, 'Flores St.', NULL, '', 'Mabini', 'Sto. Domingo', 'Albay', 4508, 'Filipino', '', '', 'O', 'MARRIED', 'Born \r\n\r\nAgain', '', '09990954321', '003-008', 'PS 119000', '2009920', '0999111', '099922', '6667772'),
(4900871, NULL, 'Paolo', 'Perez', 'Torre', 'Jr.', 'jrpacala@gmail.com', 'Male', 24, '1993-04-04', 'Ziga Memorial Hospital, Tabaco City', 1.57, 55, NULL, NULL, '', 'San Isidro', 'Malilipot', 'Albay', 4508, NULL, NULL, '', 'San \r\n\r\nLorenzo', 'Tabaco City', 'Albay', 4511, 'Filipino', '', '', 'O', 'SINGLE', 'Roman Catholic', '', NULL, '599-597', 'IO 2444571', '8882215', '133377', '1978111', '9992221'),
(4901154, NULL, 'Michael', 'Herras', 'Llona', 'Jr.', 'mikellona@gmail.com', 'Male', 24, '1993-04-04', 'Ziga Memorial Hospital, Tabaco City', 1.57, 55, NULL, NULL, '', 'San Isidro', 'Malilipot', 'Albay', 4508, NULL, NULL, '', 'San \r\n\r\nIsidro', 'Malilipot', 'Albay', 4508, 'Filipino', '', '', 'O', 'SINGLE', 'Roman \r\n\r\nCatholic', '', NULL, '999-097', 'RT 09824271', '767632', '008321461', '1100643', '45431611'),
(4912093, NULL, 'Savannah', 'Lopez', 'Casin', NULL, 'vannah23@gmail.com', 'Female', 31, '1986-12-14', 'Sagpon, Daraga, Albay', 1.49, 45, '', NULL, '', 'Sagpon', 'Daraga', 'Albay', 4504, NULL, NULL, '', 'San Vicente', 'Tabaco \r\n\r\nCity', 'Albay', 4511, 'Filipino', '', '', 'A', 'SINGLE', 'Iglesia Ni Cristo', '', '09876123401', '', 'CM 9871243', '501246', '3321980', '190232', '0219324'),
(4912340, NULL, 'Janine', 'Padua', 'Andes', NULL, 'jjpadua@gmail.com', 'Female', 27, '1990-01-27', 'Matnog, Sorsogon', 1.61, 56, NULL, 11, '', 'Em''s', 'Legazpi City', 'Albay', 4505, 'San Andres', 90, 'Happy Homes', 'Cobo', 'Tabaco City', 'Albay', 4511, 'Filipino', '', '', 'AB', 'MARRIED', 'Roman Catholic', '', '09123456789', '099-012', 'RT 1111123', '5765678', '199920', '0889010', '1333321'),
(4990054, NULL, 'Radleigh', 'Montero', 'Riego', NULL, 'joseph@gmail.com', 'Male', 27, '1990-08-22', 'Sto.Domingo, Albay', 1.57, 61, 'Flores St.', NULL, '', 'Mabini', 'Sto. Domingo', 'Albay', 4508, 'Flores \r\n\r\nSt.', NULL, '', 'Mabini', 'Sto. Domingo', 'Albay', 4508, 'Filipino', '', '', 'O', 'MARRIED', 'Born Again', '', '09011112321', '123-008', 'CL 98980', '888801', '0044281', '755991', '39995'),
(4990111, NULL, 'Bryan', 'Nivera', 'Solis', NULL, 'ryansolis@ymail.com', 'Male', 36, '1981-10-01', 'Guinobatan, Albay', 1.67, 50, 'Rizal St.', 210, '', 'Cabangan', 'Legazpi City', 'Albay', 4505, 'Mabini St.', 210, '', 'Poblacion', 'Legazpi City', 'Albay', 4505, 'Filipino', '', '', 'AB', 'SINGLE', 'Roman \r\n\r\nCatholic', '', '0908642469', '', 'IO 228000', '9000511', '1001821', '1100118', '0000117'),
(5000129, NULL, 'Shirley', 'Bio', 'Rodriguez', NULL, 'shie_R12@gmail.com', 'Female', 32, '1985-04-29', 'Pilar, Sorsogon', 1.49, 51, NULL, 6, 'Luna St.', 'Cabangan', 'Legazpi City', 'Albay', 4505, 'Luna St.', 6, '', 'Barriada', 'Legazpi City', 'Albay', 4505, 'Filipino', '', '', 'B', 'MARRIED', 'Roman \r\r\n\r\n\n\r\nCatholic', '', '09098621811', '', 'CM 8888002', '6099909', '00001182', '044123', '111221'),
(5001094, NULL, 'Lyka', 'Ricardo', 'Anderson', NULL, 'lyka_doll@ymail.com', 'Female', 31, '1986-09-21', 'Guinobatan, Albay', 1.59, 53, 'Mabini St.', 210, '', 'Poblacion', 'Legazpi City', 'Albay', 4505, 'Mabini St.', 210, '', 'Poblacion', 'Legazpi City', 'Albay', 4505, 'Filipino', '', '', 'O', 'MARRIED', 'Roman Catholic', '', '09923797112', '', 'KL 98125901', '999111', '000811', '122001', '000128'),
(5002157, NULL, 'Hannah', '', 'Bonina', '', 'hannahb@ymail,com', 'Female', 26, '1991-04-19', 'Bombon, Tabaco City, Albay', 1.53, 61, NULL, 401, '', 'Bitano', 'Legazpi City', 'Albay', 4505, NULL, 401, '', 'Bitano', 'Legazpi City', 'Albay', 4505, 'Filipino', '', '', 'O', 'SINGLE', 'Roman Catholic', '', '09120854321', '', 'CM 6670125', '0099166', '0099112', '11998810', '672013'),
(5110945, NULL, 'Dylan', 'Llanco', 'Anderson', NULL, 'dyanderson@ymail.com', 'Male', 35, '1981-11-30', 'Rawis, Albay', 1.66, 59, NULL, NULL, '', 'Pagasa', 'Rawis', 'Albay', 4505, NULL, NULL, '', 'Pagasa', 'Rawis', 'Albay', 4505, 'Filipino', '', '', 'O', 'MARRIED', 'Roman Catholic', '', NULL, '011-821', 'CD \r\n\r\n9701001', '1200178', '0961001', '386400', '97830012'),
(5166431, NULL, 'Lea', 'Abay', 'Cerino', NULL, 'lealea@gmail.com', 'Female', 48, '1969-08-28', 'Sogod, Bacacay, Albay', 1.54, 62, NULL, NULL, 'Amada \r\n\r\nSbdv.', 'Sogod', 'Bacacay', 'Albay', 4509, NULL, NULL, 'Amada Sbdv.', 'Sogod', 'Bacacay', 'Albay', 4509, 'Filipino', '', '', 'B', 'MARRIED', 'Roman \r\n\r\nCatholic', '', NULL, '123-888', 'ST 18740174', '2139000', '00989800', '4510021', '887000'),
(5201107, NULL, 'Julia', 'Belen', 'Palma', '', 'jpalma@gmail.com', 'Female', 47, '1969-12-29', 'Sagpon, Daraga, Albay', 1.65, 56, '', 0, '', 'Sagpon', 'Daraga', 'Albay', 4504, NULL, 0, '', 'Sagpon', 'Daraga', 'Albay', 4504, 'Filipino', '', '', 'O', 'MARRIED', 'Roman Catholic', '', '', '563-420', 'BL \r\n\r\n437802', '33331', '700282', '690086', '8888111'),
(5210011, NULL, 'Rommel', 'Trilles', 'Padilla', NULL, 'padillarommel@ymail.com', 'Male', 36, '1981-10-01', 'Guinobatan, Albay', 1.59, 53, 'Mabini St.', 210, '', 'Poblacion', 'Legazpi City', 'Albay', 4505, 'Mabini St.', 210, '', 'Poblacion', 'Legazpi City', 'Albay', 4505, 'Filipino', '', '', 'O', 'MARRIED', 'Roman Catholic', '', '0987654321673', '', 'FJ \r\n\r\n716781', '9553311', '1143221', '687331', '0999007'),
(5221094, NULL, 'Liza', 'Ricardo', 'Lim', NULL, 'ricardo11@ymail.com', 'Female', 41, '1976-09-21', 'Guinobatan, Albay', 1.46, 58, 'Mabini St.', 210, '', 'Poblacion', 'Legazpi City', 'Albay', 4505, 'Mabini St.', 210, '', 'Poblacion', 'Legazpi City', 'Albay', 4505, 'Filipino', '', '', 'O', 'MARRIED', 'Roman Catholic', '', '09881230912', '', 'AB 1368101', '0991112', '166651', '802211', '10931740'),
(5231607, NULL, 'Joann', 'Atibo', 'Pacala', '', 'jpacala@gmail.com', 'Female', 52, '1964-12-29', 'Sagpon, Daraga, Albay', 1.61, 58, '', 0, '', 'Sagpon', 'Daraga', 'Albay', 4504, NULL, 0, '', 'Sagpon', 'Daraga', 'Albay', 4504, 'Filipino', '', '', 'O', 'MARRIED', 'Roman Catholic', '', '', '123-4560', 'CM \r\n\r\n89612220', '01117821', '01923167', '6712191', '11433441'),
(5287126, NULL, 'Armie', 'Fernandez', 'Herrera', 'IV', 'afherrera@gmail.com', 'Male', 24, '1992-12-13', 'Tigbi, Tiwi, Albay', 2.01, 75, '', 0, '269', 'Busay', 'Daraga', 'Albay', 4503, NULL, 269, '', 'Busay', 'Daraga', 'Albay', 4503, 'Filipino', '', '', 'B', 'SINGLE', 'Roman Catholic', '', '09766526112', '', 'GH 76715231', '79801369', '187300', '6989209', '3320465'),
(5309127, NULL, 'Leo', 'Villar', 'Acosta', 'V', 'leoacosta@gmail.com', 'Male', 26, '1990-12-29', 'Legazpi City', 1.71, 60, 'Mabini St.', 89, '', 'Barriada', 'Legazpi City', 'Al', 4501, 'Mabini St.', 89, '', 'Barriada', 'Legazpi City', 'Albay', 4501, 'Filipino', '', '', 'O', 'SINGLE', 'Roman Catholic', '', '09456512090', '900-001', 'BG 2890811', '902300', '00012752', '6579000', '0113628'),
(5340912, NULL, 'Mark', 'Bobis', 'Masbate', 'Jr.', 'markmark@gmail.com', 'Male', 50, '1967-03-29', 'Pilar, Sorsogon', 1.58, 63, NULL, 9, 'Corpuz St.', 'Cabangan', 'Legazpi City', 'Albay', 4505, 'Corpuz St.', 9, '', 'Cabangan', 'Legazpi City', 'Albay', 4505, 'Filipino', '', '', 'B', 'SEPARATED', 'Roman \r\n\r\nCatholic', '', '09091234567', '', 'PB 8761254', '6786139', '209031', '090962', '111239'),
(5353113, NULL, 'Rizza', 'Avila', 'de los Santos', NULL, 'rizzasantos11@gmail.com', 'Female', 30, '1987-01-31', 'Basud,Guinobatan, \r\n\r\nAlbay', 1.59, 54, NULL, NULL, '', 'Basud', 'Guinobatan', 'Albay', 4501, NULL, NULL, '', 'Basud', 'Guinobatan', 'Albay', 4501, 'Filipino', '', '', 'O', 'SINGLE', 'Roman Catholic', '', NULL, '2000-555', 'FG 293710', '8924001', '011477', '9909113', '7643133'),
(5400127, NULL, 'Mariel', 'Cerino', 'Casaul', NULL, 'mariel_lala@edu.ph', 'Female', 38, '1979-05-03', 'Bagumbayan , Malinao, Albay', 1.64, 59, NULL, NULL, '', 'Puro', 'Legazpi City', 'Albay', 4504, NULL, 10, '', 'Bagumbayan', 'Malinao', 'Albay', 4512, 'Filipino', '', '', 'O', 'LIVE-IN', 'Roman \r\n\r\nCatholic', '', NULL, '999-7000', 'EF 9081230', '6700123', '1320898', '0113009', '1090911'),
(5412398, NULL, 'Dave', 'Franco', 'Valleroso', 'II', 'daveyfranco@ymail.com', 'Male', 47, '1970-06-04', 'Ontario, Canada', 1.78, 72, 'Imelda', 61, 'Imperial \r\n\r\nSbdv.', '', 'Legazpi City', 'Albay', 4505, 'JP. Rizal St.', NULL, '', 'Poblacion', 'Makati City', '', 1200, 'Filipino-Canadian', '', '', NULL, 'MARRIED', 'Roman Catholic', '', NULL, '123-456', 'PB 123476', '123890', '091373', '927163', '200134'),
(5432123, NULL, 'Charisse', 'Lala', 'Nasol', NULL, 'charisse_n@gmail.com', 'Female', 23, '1994-06-30', 'Guinobatan, Albay', 1.56, 50, 'Lapu-Lapu', 41, '', 'Cruzada', 'Guinobatan', 'Albay', 4501, 'Lapu-Lapu', 41, '', 'Cruzada', 'Guinobatan', 'Albay', 4501, 'Filipino', '', '', 'O', 'SINGLE', 'Roman \r\n\r\nCatholic', '', '09876543219', '', 'CM 1234567', '00012345', '098765', '12345', '55512'),
(5501298, NULL, 'Francis', 'Barrera', 'Acosta', 'Jr.', 'fbarrera@gmail.com', 'Male', 35, '1982-09-16', 'Camalig, Albay', 1.69, 50, '', 0, '', 'Sumlang', 'Camalig', 'Albay', 4502, NULL, 0, '', 'Sumlang', 'Camalig', 'Albay', 4502, 'Filipino', '', '', 'O', 'SINGLE', 'Roman Catholic', '', '09123097543', '', 'JK 89910235', '092343267', '6666853', '888064', '10902614'),
(5513092, NULL, 'Roger', 'Ponce', 'Abitria', 'I', 'roger11@gmail.com', 'Male', 25, '1992-02-19', 'Sto. Domingo, Albay', 1.58, 61, 'Luna St.', 11, '', 'Libtong', 'Sto. Domingo', 'Albay', 4505, 'Luna St.', 11, '', 'Libtong', 'Sto. \r\n\r\nDomingo', 'Albay', 4505, 'Filip', '', '', 'A', 'SINGLE', 'Roman Catholic', '', '09912376512', '022-305', 'LP 12090816', '90801132', '03218742', '1652665', '7772001'),
(5566126, NULL, 'Vincent', 'Velasquez', 'Hidalgo', 'Jr.', 'afherrera@gmail.com', 'Male', 24, '1992-02-28', 'Tigbi, \r\n\r\nTiwi, Albay', 1.89, 70, '', 0, '269', 'Busay', 'Daraga', 'Albay', 4503, NULL, 269, '', 'Busay', 'Daraga', 'Albay', 4503, 'Filipino', '', '', 'B', 'SINGLE', 'Roman \r\n\r\nCatholic', '', '09788821121', '', 'XZ 888821', '555369', '174330', '699909', '008565'),
(5677342, NULL, 'Lilia', 'Belgica', 'Bermas', NULL, 'rizza_12@gmail.com', 'Female', 51, '1965-11-29', 'Bonga, Bacacay, Albay', 1.66, 63, NULL, 31, '', 'Upper Bonga', 'Bacacay', 'Al', 4508, NULL, 31, '', 'Upper Bonga', 'Bacacay', 'Albay', 4508, 'Filipino', '', '', 'O', 'MARRIED', 'Roman Catholic', '', '09564782134', '', 'YU 207852', '5601133', '0808211', '7779010', '82243009'),
(5756153, NULL, 'Juan', 'Lopez', 'Dela Cruz', 'II', 'jdlcruz@edu.ph', 'Male', 50, '1967-09-12', 'San Lorenzo, Tabaco City', 1.49, 56, 'Rizal St.', 4, '', 'Basud', 'Daraga', 'Albay', 4503, NULL, 7, '', 'San Lorenzo', 'Tabaco City', 'Albay', 4510, 'Filipino', '', '', 'AB', 'MARRIED', 'Roman Catholic', '', '09123498457', '', 'CD 0130891', '8798703', '9812002', '009954211', '0912341'),
(5880365, NULL, 'Adrianna', 'Cooper', 'Lima', NULL, 'adriannalima@edu.ph', 'Female', 26, '1991-10-01', 'Hague, The Netherlands', 1.83, 65, 'Pagasa St.', 404, '', 'Bonifacio', 'Guinobatan ', 'Albay', 4501, 'Pagasa St.', 404, '', 'Bonifacio', 'Guinobatan', 'Albay', 4501, 'British-Filipino', '', '', 'AB', 'LIVE-IN', 'Roman Catholic', '', '09124109769', '099-123', 'CM 728941', '89365', '239801', '77521', '4769192'),
(5901112, NULL, 'Shanley', 'Rosero', 'Reyes', NULL, 'shasha@gmail.com', 'Female', 25, '1992-03-29', 'Pilar, Sorsogon', 1.49, 51, NULL, 6, 'Luna St.', 'Cabangan', 'Legazpi City', 'Albay', 4505, 'Luna St.', 6, '', 'Cabangan', 'Legazpi City', 'Albay', 4505, 'Filipino', '', '', 'B', 'MARRIED', 'Roman \r\r\n\r\n\n\r\nCatholic', '', '09091111110', '', 'PC 98292001', '611109', '007862', '0011123', '1911101'),
(5902312, NULL, 'Mark', 'Angelo', 'Lobete', 'III', 'mark_a11@gmail.com', 'Male', 45, '1972-03-29', 'Pilar, Sorsogon', 1.63, 63, NULL, 6, 'Luna St.', 'Cabangan', 'Legazpi City', 'Albay', 4505, 'Luna St.', 6, '', 'Cabangan', 'Legazpi City', 'Albay', 4505, 'Filipino', '', '', 'B', 'MARRIED', 'Roman \r\r\n\r\n\n\r\nCatholic', '', '0909172815', '', 'PB 01182301', '6000119', '0902131', '011111', '1901721');

-- --------------------------------------------------------

--
-- Table structure for table `pims_service_records`
--

CREATE TABLE IF NOT EXISTS `pims_service_records` (
  `servRec_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `inclusive_date_start` date NOT NULL,
  `inclusive_date_end` varchar(20) DEFAULT NULL,
  `designation` varchar(45) DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `place_of_assignment` varchar(45) DEFAULT NULL,
  `srce_of_fund` varchar(45) DEFAULT NULL,
  `remarks` varchar(45) DEFAULT NULL,
  `emp_rec_ID` int(10) unsigned NOT NULL,
  `sr_status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`servRec_ID`),
  KEY `sr_emp_rec_idx` (`emp_rec_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pims_timestamp`
--

CREATE TABLE IF NOT EXISTS `pims_timestamp` (
  `timestamp_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `time_in` datetime NOT NULL,
  `time_out` datetime DEFAULT NULL,
  `emp_rec_ID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`timestamp_id`),
  KEY `fk_PIMS_TIMESTAMP_PIMS_EMPLOYMENT_RECORDS1_idx` (`emp_rec_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pims_training_programs`
--

CREATE TABLE IF NOT EXISTS `pims_training_programs` (
  `training_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `training_title` varchar(110) NOT NULL,
  `location` varchar(45) NOT NULL,
  `date_start` date NOT NULL,
  `date_finish` date NOT NULL,
  `no_of_hours` int(10) unsigned NOT NULL,
  `others` varchar(45) DEFAULT NULL,
  `emp_No` int(10) unsigned NOT NULL,
  PRIMARY KEY (`training_ID`),
  KEY `emp_No_idx` (`emp_No`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pms_iar`
--

CREATE TABLE IF NOT EXISTS `pms_iar` (
  `iar_no` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `iar_status` enum('Partial','Complete') NOT NULL,
  `received_date` date NOT NULL,
  `ins_date` date NOT NULL,
  `inv_num` int(15) NOT NULL,
  `iar_date` date NOT NULL,
  PRIMARY KEY (`iar_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pms_iar`
--

INSERT INTO `pms_iar` (`iar_no`, `iar_status`, `received_date`, `ins_date`, `inv_num`, `iar_date`) VALUES
(3, 'Complete', '2017-10-30', '2017-10-31', 5674, '2017-10-28'),
(4, 'Complete', '2017-10-29', '2017-10-30', 5463, '2017-10-28'),
(5, 'Complete', '2017-10-30', '2017-10-31', 123456, '2017-10-29'),
(6, 'Complete', '2017-10-31', '2017-10-31', 123456, '2017-10-30');

-- --------------------------------------------------------

--
-- Table structure for table `pms_iar_con`
--

CREATE TABLE IF NOT EXISTS `pms_iar_con` (
  `iar_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `po_id` int(10) unsigned NOT NULL,
  `iar_no` int(10) unsigned NOT NULL,
  `received_qty` int(11) DEFAULT NULL,
  PRIMARY KEY (`iar_id`),
  KEY `iar_po_idx` (`po_id`),
  KEY `iar_con_iar` (`iar_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `pms_iar_con`
--

INSERT INTO `pms_iar_con` (`iar_id`, `po_id`, `iar_no`, `received_qty`) VALUES
(1, 7, 3, 2),
(2, 8, 3, 3),
(3, 9, 4, 4),
(4, 10, 4, 3),
(5, 11, 5, 5),
(6, 12, 5, 3),
(7, 14, 6, 12),
(8, 15, 6, 12);

-- --------------------------------------------------------

--
-- Table structure for table `pms_po`
--

CREATE TABLE IF NOT EXISTS `pms_po` (
  `po_no` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(10) unsigned NOT NULL,
  `po_date` date NOT NULL,
  `delivery_term` enum('Pick Up','Delivery') NOT NULL,
  `payment_term` enum('Check','Cash','Credit') NOT NULL,
  `delivery_date` date NOT NULL,
  `po_total` double DEFAULT NULL,
  PRIMARY KEY (`po_no`),
  KEY `po_supplier_idx` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `pms_po`
--

INSERT INTO `pms_po` (`po_no`, `company_id`, `po_date`, `delivery_term`, `payment_term`, `delivery_date`, `po_total`) VALUES
(5, 1, '2017-10-27', 'Pick Up', 'Cash', '2017-10-29', 394.9),
(6, 2, '2017-10-27', 'Pick Up', 'Cash', '2017-10-29', 628.63),
(7, 1, '2017-10-29', 'Pick Up', 'Cash', '2017-10-30', 0),
(8, 2, '2017-10-29', 'Pick Up', 'Cash', '2017-10-29', 182),
(9, 2, '2017-10-30', '', 'Cash', '2017-10-30', 560),
(10, 2, '2017-10-30', 'Pick Up', 'Cash', '2017-10-31', 936);

-- --------------------------------------------------------

--
-- Table structure for table `pms_po_con`
--

CREATE TABLE IF NOT EXISTS `pms_po_con` (
  `po_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `po_no` int(10) unsigned NOT NULL,
  `pr_id` int(10) unsigned NOT NULL,
  `unit_cost` double NOT NULL,
  `tot_amt` double NOT NULL,
  PRIMARY KEY (`po_id`),
  KEY `po_pr_idx` (`pr_id`),
  KEY `po_po_con_idx` (`po_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `pms_po_con`
--

INSERT INTO `pms_po_con` (`po_id`, `po_no`, `pr_id`, `unit_cost`, `tot_amt`) VALUES
(7, 5, 3, 78.2, 156.4),
(8, 5, 4, 79.5, 238.5),
(9, 6, 5, 102.91, 411.64),
(10, 6, 6, 72.33, 216.99),
(11, 8, 1, 19, 95),
(12, 8, 2, 29, 87),
(13, 9, 7, 56, 560),
(14, 10, 8, 34, 408),
(15, 10, 9, 44, 528);

-- --------------------------------------------------------

--
-- Table structure for table `pms_pr`
--

CREATE TABLE IF NOT EXISTS `pms_pr` (
  `pr_no` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pr_total` double NOT NULL,
  `pr_date` date DEFAULT NULL,
  `pr_status` enum('Pending','Approved','Denied') NOT NULL DEFAULT 'Pending',
  PRIMARY KEY (`pr_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pms_pr`
--

INSERT INTO `pms_pr` (`pr_no`, `pr_total`, `pr_date`, `pr_status`) VALUES
(3, 633.85, '2017-10-27', 'Approved'),
(4, 610.46, '2017-10-27', 'Approved'),
(5, 340, '2017-10-29', 'Approved'),
(6, 684, '2017-10-30', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `pms_pr_con`
--

CREATE TABLE IF NOT EXISTS `pms_pr_con` (
  `pr_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pr_no` int(10) unsigned NOT NULL,
  `req_item_id` int(10) unsigned NOT NULL,
  `est_unit_cost` double NOT NULL,
  `est_cost` double NOT NULL,
  PRIMARY KEY (`pr_id`),
  KEY `pr_con_pr_idx` (`pr_no`),
  KEY `pr_con_ris_idx` (`req_item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `pms_pr_con`
--

INSERT INTO `pms_pr_con` (`pr_id`, `pr_no`, `req_item_id`, `est_unit_cost`, `est_cost`) VALUES
(1, 3, 1, 67.55, 337.75),
(2, 3, 2, 98.7, 296.1),
(3, 4, 3, 67.55, 135.1),
(4, 4, 4, 45.54, 136.62),
(5, 4, 5, 34.21, 136.84),
(6, 4, 6, 67.3, 201.9),
(7, 5, 7, 34, 340),
(8, 6, 9, 23, 276),
(9, 6, 10, 34, 408);

-- --------------------------------------------------------

--
-- Table structure for table `pms_ris`
--

CREATE TABLE IF NOT EXISTS `pms_ris` (
  `ris_no` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `emp_no` int(10) unsigned NOT NULL,
  `req_status` enum('Pending','Approved','Denied') NOT NULL DEFAULT 'Pending',
  `req_date` date NOT NULL,
  PRIMARY KEY (`ris_no`),
  KEY `req_emp_idx` (`emp_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pms_ris`
--

INSERT INTO `pms_ris` (`ris_no`, `emp_no`, `req_status`, `req_date`) VALUES
(2, 1, 'Approved', '2017-10-26'),
(3, 1, 'Approved', '2017-10-27'),
(4, 1, 'Approved', '2017-10-29'),
(5, 1, 'Denied', '2017-10-29'),
(6, 1, 'Approved', '2017-10-30');

-- --------------------------------------------------------

--
-- Table structure for table `pms_ris_req`
--

CREATE TABLE IF NOT EXISTS `pms_ris_req` (
  `req_item_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `req_item` varchar(200) NOT NULL,
  `req_desc` varchar(200) NOT NULL,
  `req_unit` enum('Piece','Ream','Box','Can','Unit','Bundle','Roll') NOT NULL,
  `req_qty` int(10) unsigned NOT NULL,
  `ris_no` int(10) unsigned NOT NULL,
  PRIMARY KEY (`req_item_id`),
  KEY `app_req_req_idx` (`ris_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `pms_ris_req`
--

INSERT INTO `pms_ris_req` (`req_item_id`, `req_item`, `req_desc`, `req_unit`, `req_qty`, `ris_no`) VALUES
(1, 'Item1', 'Desc1', 'Box', 5, 2),
(2, 'Item2', 'Desc2', 'Can', 3, 2),
(3, 'thdfh', 'fghgh', 'Ream', 2, 3),
(4, 'fghf', 'dfhdg', 'Can', 3, 3),
(5, 'fghdfg', 'rt4thv', 'Box', 4, 3),
(6, 'dfgh', '4dfg', 'Unit', 3, 3),
(7, 'sample 1', 'sample', 'Ream', 10, 4),
(8, 'itemsdhjdk', 'fghjk', 'Unit', 12, 5),
(9, 'ghjkl;', 'asdfghjkl', 'Unit', 12, 6),
(10, 'asdfghjk', 'fghjkl', 'Roll', 12, 6);

-- --------------------------------------------------------

--
-- Table structure for table `pms_supplier`
--

CREATE TABLE IF NOT EXISTS `pms_supplier` (
  `company_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_name` varchar(45) NOT NULL,
  `sup_address` varchar(45) NOT NULL,
  `sup_contact` varchar(14) NOT NULL,
  `supp_status` enum('Active','Inactive') DEFAULT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pms_supplier`
--

INSERT INTO `pms_supplier` (`company_id`, `company_name`, `sup_address`, `sup_contact`, `supp_status`) VALUES
(1, 'Acer', 'Legazpi City', '09367434', 'Active'),
(2, 'ASUS', 'Quezon City', 'Numbah One', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `sis_attendance`
--

CREATE TABLE IF NOT EXISTS `sis_attendance` (
  `attend_id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `attend_month` enum('Jan','Feb','March','April','May','June','July','Aug','Sep','Oct','Nov','Dec') NOT NULL,
  `total_days_present` int(5) unsigned NOT NULL,
  `total_days_absent` int(5) unsigned NOT NULL,
  `rec_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`attend_id`),
  KEY `attnd_rec_idx` (`rec_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sis_f137`
--

CREATE TABLE IF NOT EXISTS `sis_f137` (
  `f137_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lrn` int(10) unsigned NOT NULL,
  `date_rel` date NOT NULL,
  PRIMARY KEY (`f137_id`),
  KEY `lrn_f137_idx` (`lrn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sis_grade`
--

CREATE TABLE IF NOT EXISTS `sis_grade` (
  `grade_id` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `rec_id` int(15) unsigned NOT NULL,
  `sched_id` int(15) unsigned DEFAULT NULL,
  `grade_val` int(5) unsigned NOT NULL,
  `grade_remarks` enum('Passed','Failed') NOT NULL,
  `sis_grade_quarter` enum('1st','2nd','3rd','4th','Average','Final') NOT NULL,
  PRIMARY KEY (`grade_id`),
  KEY `stu_rec_grade_idx` (`rec_id`),
  KEY `sched_grade_idx` (`sched_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sis_parent_guardian`
--

CREATE TABLE IF NOT EXISTS `sis_parent_guardian` (
  `pg_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lrn` int(20) unsigned NOT NULL,
  `guardian_type` varchar(25) DEFAULT NULL,
  `sis_father` varchar(50) DEFAULT NULL,
  `sis_mother` varchar(50) DEFAULT NULL,
  `sis_guardian` varchar(50) DEFAULT NULL,
  `guardian_relation` varchar(20) DEFAULT NULL,
  `pg_contact` int(10) unsigned DEFAULT NULL,
  `maiden_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`pg_id`),
  KEY `student_parent_guardian` (`lrn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sis_student`
--

CREATE TABLE IF NOT EXISTS `sis_student` (
  `lrn` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `sis_image` text,
  `stu_fname` varchar(50) NOT NULL,
  `stu_mname` varchar(50) DEFAULT NULL,
  `stu_lname` varchar(50) NOT NULL,
  `sis_b_day` date NOT NULL,
  `plc_birth` varchar(100) DEFAULT NULL,
  `sis_gender` enum('Male','Female') NOT NULL,
  `sis_religion` varchar(45) NOT NULL,
  `m_tounge` varchar(45) NOT NULL,
  `ethnic` varchar(45) DEFAULT NULL,
  `stu_status` varchar(45) NOT NULL,
  `stu_contact` varchar(15) DEFAULT NULL,
  `sis_email` varchar(20) DEFAULT NULL,
  `trnsf_in_date` date DEFAULT NULL,
  `trnf_out_date` date DEFAULT NULL,
  `drp` date DEFAULT NULL,
  `house_no` int(10) unsigned DEFAULT NULL,
  `street` varchar(50) DEFAULT NULL,
  `brng` varchar(50) NOT NULL,
  `munic` varchar(50) NOT NULL,
  PRIMARY KEY (`lrn`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=333339 ;

--
-- Dumping data for table `sis_student`
--

INSERT INTO `sis_student` (`lrn`, `sis_image`, `stu_fname`, `stu_mname`, `stu_lname`, `sis_b_day`, `plc_birth`, `sis_gender`, `sis_religion`, `m_tounge`, `ethnic`, `stu_status`, `stu_contact`, `sis_email`, `trnsf_in_date`, `trnf_out_date`, `drp`, `house_no`, `street`, `brng`, `munic`) VALUES
(9099, NULL, 'ghjghj', 'ghjghj', 'hjghjgh', '2002-11-17', 'ghjghjgh', 'Male', 'ghjghjghjghjhg', 'jghjghjghj', 'NA', 'Enrolled', '424275275', 'asdfasfd', '0000-00-00', NULL, NULL, 0, 'hjghj', 'ghjghjg', 'ghjghjgh'),
(9999, NULL, 'Karl Vincent', 'BendaÃ±a', 'Arancillo', '1996-11-14', 'Legazpi \r\n\r\nCity', 'Male', 'Muslim', 'Tagalog', 'NA', 'Enrolled', '09177773656', 'kvarancillo@gmail.co', NULL, NULL, NULL, 1234, '3rd Street Our Ladys \r\n\r\nVillage', 'Bitano', 'Legazpi City'),
(11101, NULL, 'Nicole', 'G', 'Gapayao', '2000-01-20', 'Sorsogon', 'Female', 'Roman catholic', 'Tagalog', 'NA', 'Enrolled', '23121564', 'asdsample@gmail.com', NULL, NULL, NULL, 663452, 'qweqweqwe', 'edi wow', 'Camalic'),
(11102, NULL, 'Jess', 'Besa', 'Mon', '2015-01-01', 'Caloocan', 'Female', 'Roman Catholic', 'Tagalog', 'NA', 'Enrolled', '151231', 'asdsample@gmail.com', NULL, NULL, NULL, 663452, 'qweqweqwe', 'edi wow', 'Camalic'),
(20171, NULL, 'Jona', NULL, 'Ogama', '2017-10-17', 'Albay', 'Female', 'Roman \r\n\r\nCatholic', 'bicol', 'NA', 'Enrolled', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mauraro', 'Guinobatan'),
(20172, NULL, 'Alvin', NULL, 'Bagasbas', '2017-10-13', 'Bulacan', 'Male', '', '', 'NA', 'Enrolled', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sta.Maria', 'Bulacan'),
(20173, NULL, 'Jane', NULL, 'Monilla', '2017-10-17', NULL, 'Female', 'Catholic', 'bicol', 'NA', 'Enrolled', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Morga', 'Guinobatan'),
(20174, NULL, 'Jake', NULL, 'Ballesteros', '2017-10-02', NULL, 'Male', 'Catholic', 'tagalog', 'NA', 'Enrolled', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sta.Maria', 'Bulacan'),
(20175, NULL, 'Thea', NULL, 'Abanilla', '2017-10-02', NULL, 'Female', 'Catholic', 'english', 'NA', 'Enrolled', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'San Jose', 'Mandaluyong'),
(20176, NULL, 'Christine', NULL, 'Ponteres', '2017-10-18', NULL, 'Female', 'Catholic', 'tagalog', 'NA', 'Enrolled', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'guyong', 'sta. maria'),
(20177, NULL, 'Bruno', NULL, 'Mars', '2017-10-17', NULL, 'Male', 'Catholic', 'English', 'NA', 'Enrolled', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Washington', 'DC'),
(20178, NULL, 'Kathryn', NULL, 'Bernardo', '2017-10-25', NULL, 'Female', 'Iglesia', 'tagalog', 'NA', 'Enrolled', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tinago', 'Quezon'),
(20179, NULL, 'Cristal', NULL, 'Jose', '2017-10-09', NULL, 'Female', 'Catholic', 'tagalog', 'NA', 'Enrolled', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'San Juan', 'Quezon'),
(101010, NULL, 'Denver', 'BendaÃ±a', 'Arancillo', '1999-01-28', 'Legazpi', 'Male', 'Roman Catholic', 'Tagalog', 'NA', 'Enrolled', '09175689255', 'xdba28@gmail.com', NULL, NULL, NULL, 1173, '5th street', 'Our Ladys Village', 'Bitano'),
(201710, NULL, 'Margie', NULL, 'Muico', '2017-10-17', NULL, 'Female', 'Catholic', 'bicol', 'NA', 'Enrolled', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Galang', 'Urdaneta'),
(201711, NULL, 'Mildred', NULL, 'Mondero', '2017-10-04', NULL, 'Female', 'Catholic', 'waray', 'NA', 'Enrolled', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Angatel', 'Urbiz'),
(201712, NULL, 'Anna', NULL, 'Octavo', '2017-10-02', NULL, 'Female', 'Catholic', 'bicol', 'NA', 'Enrolled', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Malipo', 'Guinobatan'),
(201713, NULL, 'Jazmin', NULL, 'Sofranes', '2017-10-30', NULL, 'Female', 'Catholic', 'tagalog', 'NA', 'Enrolled', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sagpon', 'Caloocan'),
(201714, NULL, 'Josie', NULL, 'Olayta', '2017-10-19', NULL, 'Female', '', '', 'NA', 'Enrolled', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Em''s', 'Daraga'),
(201715, NULL, 'Jucel', NULL, 'Arevalo', '2017-10-11', NULL, 'Male', 'Roman \r\n\r\nCatholic', 'bicol', 'NA', 'Enrolled', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Poblacion', 'Ligao City'),
(201716, NULL, 'Roberto', NULL, 'Abogado', '2017-10-03', NULL, 'Male', 'Catholic', 'bicol', 'NA', 'Enrolled', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Calzada', 'Daet'),
(201717, NULL, 'Joy', NULL, 'Candidato', '2017-10-10', NULL, 'Female', 'Catholic', 'bicol', 'NA', 'Enrolled', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Barriada', 'Legazpi City'),
(201718, NULL, 'Cassandra', NULL, 'Moico', '2017-10-09', NULL, 'Female', 'Catholic', 'bicol', 'NA', 'Enrolled', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Em''s', 'Daraga'),
(201719, NULL, 'Kent', NULL, 'Velasco', '2017-10-19', NULL, 'Male', 'Catholic', 'bicol', 'NA', 'Enrolled', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ilawod', 'Guinobatan'),
(201720, NULL, 'Charles', NULL, 'Literal', '2017-10-03', NULL, 'Male', 'Roman \r\n\r\nCatholic', 'bicol', 'NA', 'Enrolled', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Morga', 'Guinobatan'),
(201721, NULL, 'Cj', NULL, 'Cauilan', '2017-10-10', NULL, 'Male', 'Catholic', 'bicol', 'NA', 'Enrolled', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bascaran', 'Guinobatan'),
(201722, NULL, 'Jasper', NULL, 'Llanera', '2017-10-03', NULL, 'Male', 'Catholic', 'bicol', 'NA', 'Enrolled', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Travesia', 'Guinobatan'),
(201723, NULL, 'Noel', NULL, 'Layante', '2017-10-17', NULL, 'Male', 'Catholic', 'bicol', 'NA', 'Enrolled', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Libas', 'Guinobatan'),
(201724, NULL, 'Matteo', NULL, 'Domingo', '2017-10-11', NULL, 'Male', 'Catholic', 'english', 'NA', 'Enrolled', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'San Jose', 'Tabacco'),
(201725, NULL, 'Steffi', NULL, 'Chavez', '2017-10-17', NULL, 'Female', 'Catholic', 'tagalog', 'NA', 'Enrolled', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Poblacion', 'Makati City'),
(201726, NULL, 'Julie', NULL, 'San Jose', '2017-10-04', NULL, 'Female', 'Catholic', 'tagalog', 'NA', 'Enrolled', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'San Jose', 'Urdaneta'),
(201727, NULL, 'Toni', NULL, 'Gonzaga', '2017-10-17', NULL, 'Female', 'Catholic', 'tagalog', 'NA', 'Enrolled', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'Pasig City'),
(201728, NULL, 'Marian', NULL, 'Rivera', '2017-10-02', NULL, 'Female', 'Catholic', 'tagalog', 'NA', 'Enrolled', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Galang', 'Legazpi City'),
(201729, NULL, 'Anne', NULL, 'Curtis', '2017-10-24', NULL, 'Female', 'Catholic', 'tagalog', 'NA', 'Enrolled', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Timog', 'Quezon City'),
(201730, NULL, 'Vhong', NULL, 'Navarro', '2017-10-03', NULL, 'Male', 'Catholic', 'tagalog', 'NA', 'Enrolled', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Morga', 'Daraga'),
(201731, NULL, 'Maine', NULL, 'Mendoza', '2017-10-25', NULL, 'Female', 'Catholic', 'tagalog', 'NA', 'Enrolled', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sta.Maria', 'Bulacan'),
(201732, NULL, 'Alden', NULL, 'Richards', '2017-10-17', NULL, 'Male', 'Catholic', 'tagalog', 'NA', 'Enrolled', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sta. Cruz', 'Laguna'),
(201733, NULL, 'Liza', NULL, 'Soberano', '2017-10-17', NULL, 'Female', 'Catholic', 'tagalog', 'NA', 'Enrolled', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sagpon', 'Legazpi City'),
(201734, NULL, 'Enrique', NULL, 'Gil', '2017-10-03', NULL, 'Male', 'Catholic', 'bicol', 'NA', 'Enrolled', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Galang', 'Quezon'),
(333333, NULL, 'Nico', 'Villaraza', 'Ativo', '1998-09-10', 'Caloocan', 'Male', 'Roman Catholic', 'Tagalog', 'NA', 'Enrolled', '09294545075', 'niicsviey@gmail.com', NULL, NULL, NULL, 663452, 'qweqweqwe', 'edi wow', 'Camalic'),
(333334, NULL, 'Glen', 'Reyes', 'Tallada', '2017-10-03', NULL, 'Male', 'Catholic', 'bicol', 'NA', 'Enrolled', NULL, 'tallada@gmail.com', NULL, NULL, NULL, 24, 'Rizal', 'Sagpon', 'Daraga'),
(333335, NULL, 'Val', NULL, 'Lim', '2017-10-04', 'Legazpi', 'Male', 'Catholic', 'tagalog', 'NA', 'Enrolled', NULL, 'val@gmail.com', NULL, NULL, NULL, 54, NULL, 'Sagpon', 'Legazpi City'),
(333336, NULL, 'Brent', NULL, 'Barrameda', '2017-10-23', 'Legazpi City', 'Male', 'Roman Catholic', 'tagalog', 'NA', 'Enrolled', NULL, NULL, NULL, NULL, NULL, 65, NULL, 'Seventeen', 'Legazpi City'),
(333337, NULL, 'Kim', NULL, 'Mendiola', '2017-10-03', 'Donsol', 'Male', 'Catholic', 'tagalog', 'NA', 'Enrolled', NULL, 'kim@gmail.com', NULL, NULL, NULL, 54, 'Mabini', 'Cruzada', 'Donsol'),
(333338, NULL, 'Daniel', NULL, 'Ford', '2017-10-26', NULL, 'Male', 'Catholic', 'tagalog', 'NA', 'Enrolled', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'shaw', 'Makati');

-- --------------------------------------------------------

--
-- Table structure for table `sis_stu_rec`
--

CREATE TABLE IF NOT EXISTS `sis_stu_rec` (
  `rec_id` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `lrn` int(20) unsigned NOT NULL,
  `section_id` int(10) unsigned NOT NULL,
  `sy_id` int(15) unsigned NOT NULL,
  PRIMARY KEY (`rec_id`),
  KEY `student_stu_rec_idx` (`lrn`),
  KEY `school_yr_stu_rec_idx` (`sy_id`),
  KEY `stud_rec_sec_idx` (`section_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cms_account`
--
ALTER TABLE `cms_account`
  ADD CONSTRAINT `account_emp` FOREIGN KEY (`emp_no`) REFERENCES `pims_personnel` (`emp_No`) ON UPDATE CASCADE,
  ADD CONSTRAINT `account_student` FOREIGN KEY (`lrn`) REFERENCES `sis_student` (`lrn`) ON UPDATE CASCADE;

--
-- Constraints for table `cms_achievement`
--
ALTER TABLE `cms_achievement`
  ADD CONSTRAINT `achieve_account` FOREIGN KEY (`cms_account_id`) REFERENCES `cms_account` (`cms_account_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `cms_album`
--
ALTER TABLE `cms_album`
  ADD CONSTRAINT `album_account` FOREIGN KEY (`cms_account_id`) REFERENCES `cms_account` (`cms_account_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cms_calendar`
--
ALTER TABLE `cms_calendar`
  ADD CONSTRAINT `calendar_account` FOREIGN KEY (`cms_account_id`) REFERENCES `cms_account` (`cms_account_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `cms_carousel`
--
ALTER TABLE `cms_carousel`
  ADD CONSTRAINT `car_acc` FOREIGN KEY (`cms_account_ID`) REFERENCES `cms_account` (`cms_account_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `cms_event`
--
ALTER TABLE `cms_event`
  ADD CONSTRAINT `event_account` FOREIGN KEY (`cms_account_ID`) REFERENCES `cms_account` (`cms_account_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `cms_image`
--
ALTER TABLE `cms_image`
  ADD CONSTRAINT `image_album_id` FOREIGN KEY (`cms_album_ID`) REFERENCES `cms_album` (`cms_album_id`) ON UPDATE CASCADE;

--
-- Constraints for table `cms_memo`
--
ALTER TABLE `cms_memo`
  ADD CONSTRAINT `memo_account` FOREIGN KEY (`cms_account_id`) REFERENCES `cms_account` (`cms_account_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `cms_news`
--
ALTER TABLE `cms_news`
  ADD CONSTRAINT `news_account` FOREIGN KEY (`cms_account_id`) REFERENCES `cms_account` (`cms_account_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `cms_privilege`
--
ALTER TABLE `cms_privilege`
  ADD CONSTRAINT `priv_account` FOREIGN KEY (`cms_account_id`) REFERENCES `cms_account` (`cms_account_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `cms_project`
--
ALTER TABLE `cms_project`
  ADD CONSTRAINT `proj_acc` FOREIGN KEY (`cms_account_ID`) REFERENCES `cms_account` (`cms_account_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `css_credentials`
--
ALTER TABLE `css_credentials`
  ADD CONSTRAINT `emp_cred` FOREIGN KEY (`emp_rec_id`) REFERENCES `pims_employment_records` (`emp_rec_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sub_cred` FOREIGN KEY (`subject_id`) REFERENCES `css_subject` (`subject_id`) ON UPDATE CASCADE;

--
-- Constraints for table `css_schedule`
--
ALTER TABLE `css_schedule`
  ADD CONSTRAINT `sched_emp` FOREIGN KEY (`emp_rec_id`) REFERENCES `pims_employment_records` (`emp_rec_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sched_sec` FOREIGN KEY (`section_id`) REFERENCES `css_section` (`SECTION_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sched_sub` FOREIGN KEY (`subject_id`) REFERENCES `css_subject` (`subject_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sched_sy` FOREIGN KEY (`sy_id`) REFERENCES `css_school_yr` (`sy_id`) ON UPDATE CASCADE;

--
-- Constraints for table `css_section`
--
ALTER TABLE `css_section`
  ADD CONSTRAINT `sec_emp` FOREIGN KEY (`emp_rec_id`) REFERENCES `pims_employment_records` (`emp_rec_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sec_sy` FOREIGN KEY (`sy_id`) REFERENCES `css_school_yr` (`sy_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `css_subject`
--
ALTER TABLE `css_subject`
  ADD CONSTRAINT `sub_dept` FOREIGN KEY (`dept_id`) REFERENCES `pims_department` (`dept_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `ims_borrow`
--
ALTER TABLE `ims_borrow`
  ADD CONSTRAINT `bor_emp` FOREIGN KEY (`emp_no`) REFERENCES `pims_personnel` (`emp_No`) ON UPDATE CASCADE,
  ADD CONSTRAINT `bor_stor` FOREIGN KEY (`stor_id`) REFERENCES `ims_storage` (`stor_id`) ON UPDATE CASCADE;

--
-- Constraints for table `pims_educational_background`
--
ALTER TABLE `pims_educational_background`
  ADD CONSTRAINT `emp_No_edbg` FOREIGN KEY (`emp_No`) REFERENCES `pims_personnel` (`emp_No`) ON UPDATE CASCADE;

--
-- Constraints for table `pims_employment_records`
--
ALTER TABLE `pims_employment_records`
  ADD CONSTRAINT `dept_ID_emprec` FOREIGN KEY (`dept_ID`) REFERENCES `pims_department` (`dept_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `emp_No_emprec` FOREIGN KEY (`emp_No`) REFERENCES `pims_personnel` (`emp_No`) ON UPDATE CASCADE,
  ADD CONSTRAINT `jt_emprec` FOREIGN KEY (`job_title_code`) REFERENCES `pims_job_title` (`job_title_code`) ON UPDATE CASCADE;

--
-- Constraints for table `pims_family_background`
--
ALTER TABLE `pims_family_background`
  ADD CONSTRAINT `emp_NO_fbg` FOREIGN KEY (`emp_No`) REFERENCES `pims_personnel` (`emp_No`) ON UPDATE CASCADE;

--
-- Constraints for table `pims_leave`
--
ALTER TABLE `pims_leave`
  ADD CONSTRAINT `fk_PIMS_LEAVE_PIMS_LEAVE_BALANCE1` FOREIGN KEY (`leave_bal_id`) REFERENCES `pims_leave_balance` (`leave_bal_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `pims_leave_balance`
--
ALTER TABLE `pims_leave_balance`
  ADD CONSTRAINT `emp_No_leave_bal` FOREIGN KEY (`emp_No`) REFERENCES `pims_personnel` (`emp_No`) ON UPDATE CASCADE;

--
-- Constraints for table `pims_message`
--
ALTER TABLE `pims_message`
  ADD CONSTRAINT `account_mess` FOREIGN KEY (`cms_account_ID`) REFERENCES `cms_account` (`cms_account_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_mes` FOREIGN KEY (`p_part_id`) REFERENCES `pims_participants` (`p_part_id`) ON UPDATE CASCADE;

--
-- Constraints for table `pims_participants`
--
ALTER TABLE `pims_participants`
  ADD CONSTRAINT `user_one` FOREIGN KEY (`p_user_one`) REFERENCES `cms_account` (`cms_account_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_two` FOREIGN KEY (`p_user_two`) REFERENCES `cms_account` (`cms_account_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `pims_performance_report`
--
ALTER TABLE `pims_performance_report`
  ADD CONSTRAINT `emp_No_perf_rep` FOREIGN KEY (`emp_No`) REFERENCES `pims_personnel` (`emp_No`) ON UPDATE CASCADE;

--
-- Constraints for table `pims_service_records`
--
ALTER TABLE `pims_service_records`
  ADD CONSTRAINT `sr_emp_rec` FOREIGN KEY (`emp_rec_ID`) REFERENCES `pims_employment_records` (`emp_rec_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `pims_timestamp`
--
ALTER TABLE `pims_timestamp`
  ADD CONSTRAINT `fk_PIMS_TIMESTAMP_PIMS_EMPLOYMENT_RECORDS1` FOREIGN KEY (`emp_rec_ID`) REFERENCES `pims_employment_records` (`emp_rec_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `pims_training_programs`
--
ALTER TABLE `pims_training_programs`
  ADD CONSTRAINT `emp_No_training` FOREIGN KEY (`emp_No`) REFERENCES `pims_personnel` (`emp_No`) ON UPDATE CASCADE;

--
-- Constraints for table `pms_iar_con`
--
ALTER TABLE `pms_iar_con`
  ADD CONSTRAINT `iar_po` FOREIGN KEY (`po_id`) REFERENCES `pms_po_con` (`po_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pms_iar_con_ibfk_1` FOREIGN KEY (`iar_no`) REFERENCES `pms_iar` (`iar_no`);

--
-- Constraints for table `pms_po`
--
ALTER TABLE `pms_po`
  ADD CONSTRAINT `po_supplier` FOREIGN KEY (`company_id`) REFERENCES `pms_supplier` (`company_id`) ON UPDATE CASCADE;

--
-- Constraints for table `pms_po_con`
--
ALTER TABLE `pms_po_con`
  ADD CONSTRAINT `po_po_con` FOREIGN KEY (`po_no`) REFERENCES `pms_po` (`po_no`) ON UPDATE CASCADE,
  ADD CONSTRAINT `po_pr` FOREIGN KEY (`pr_id`) REFERENCES `pms_pr_con` (`pr_id`) ON UPDATE CASCADE;

--
-- Constraints for table `pms_pr_con`
--
ALTER TABLE `pms_pr_con`
  ADD CONSTRAINT `pr_con_pr` FOREIGN KEY (`pr_no`) REFERENCES `pms_pr` (`pr_no`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pr_con_ris` FOREIGN KEY (`req_item_id`) REFERENCES `pms_ris_req` (`req_item_id`) ON UPDATE CASCADE;

--
-- Constraints for table `pms_ris`
--
ALTER TABLE `pms_ris`
  ADD CONSTRAINT `req_emp` FOREIGN KEY (`emp_no`) REFERENCES `pims_personnel` (`emp_No`) ON UPDATE CASCADE;

--
-- Constraints for table `pms_ris_req`
--
ALTER TABLE `pms_ris_req`
  ADD CONSTRAINT `app_req_req` FOREIGN KEY (`ris_no`) REFERENCES `pms_ris` (`ris_no`) ON UPDATE CASCADE;

--
-- Constraints for table `sis_attendance`
--
ALTER TABLE `sis_attendance`
  ADD CONSTRAINT `attnd_rec` FOREIGN KEY (`rec_id`) REFERENCES `sis_stu_rec` (`rec_id`) ON UPDATE CASCADE;

--
-- Constraints for table `sis_f137`
--
ALTER TABLE `sis_f137`
  ADD CONSTRAINT `lrn_f137` FOREIGN KEY (`lrn`) REFERENCES `sis_student` (`lrn`) ON UPDATE CASCADE;

--
-- Constraints for table `sis_grade`
--
ALTER TABLE `sis_grade`
  ADD CONSTRAINT `sched_grade` FOREIGN KEY (`sched_id`) REFERENCES `css_schedule` (`SCHED_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `stu_rec_grade` FOREIGN KEY (`rec_id`) REFERENCES `sis_stu_rec` (`rec_id`) ON UPDATE CASCADE;

--
-- Constraints for table `sis_parent_guardian`
--
ALTER TABLE `sis_parent_guardian`
  ADD CONSTRAINT `student_parent_guardian` FOREIGN KEY (`lrn`) REFERENCES `sis_student` (`lrn`) ON UPDATE CASCADE;

--
-- Constraints for table `sis_stu_rec`
--
ALTER TABLE `sis_stu_rec`
  ADD CONSTRAINT `school_yr_stu_rec` FOREIGN KEY (`sy_id`) REFERENCES `css_school_yr` (`sy_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `student_stu_rec` FOREIGN KEY (`lrn`) REFERENCES `sis_student` (`lrn`) ON UPDATE CASCADE,
  ADD CONSTRAINT `stud_rec_sec` FOREIGN KEY (`section_id`) REFERENCES `css_section` (`SECTION_ID`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
