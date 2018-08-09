-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2017 at 10:23 AM
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
  `cms_account_ID` int(11) UNSIGNED NOT NULL,
  `cms_username` varchar(20) NOT NULL,
  `cms_password` varchar(20) NOT NULL,
  `emp_no` int(10) UNSIGNED DEFAULT NULL,
  `lrn` int(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_account`
--

INSERT INTO `cms_account` (`cms_account_ID`, `cms_username`, `cms_password`, `emp_no`, `lrn`) VALUES
(1, 'ryan', 'ryan123', 1, NULL),
(2, 'rodel', 'rodel123', 2, NULL),
(3, 'michael', 'michael123', 3, NULL),
(4, 'rea', 'rea123', 4, NULL),
(5, 'yves', 'yves123', 5, NULL),
(6, 'mark', 'mark123', 6, NULL),
(7, 'ryap', 'yap123', 7, NULL),
(8, 'vembudo', 'vincent123', 8, NULL),
(9, 'shiena', 'shiena123', 9, NULL),
(10, 'christine', 'christine123', 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_achievement`
--

CREATE TABLE `cms_achievement` (
  `cms_achievement_ID` int(11) UNSIGNED NOT NULL,
  `cms_achievement_name` varchar(20) NOT NULL,
  `cms_achievement_about` varchar(150) NOT NULL,
  `cms_achievement_date` date NOT NULL,
  `cms_account_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cms_calendar`
--

CREATE TABLE `cms_calendar` (
  `cms_calendar_ID` int(11) UNSIGNED NOT NULL,
  `cms_calendar_name` varchar(20) NOT NULL,
  `cms_about` varchar(50) NOT NULL,
  `cms_calendar_date` date NOT NULL,
  `cms_personinvolved` varchar(50) DEFAULT NULL,
  `cms_account_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cms_carousel`
--

CREATE TABLE `cms_carousel` (
  `carousel_id` int(10) UNSIGNED NOT NULL,
  `cms_carousel_img` longblob NOT NULL,
  `cms_account_ID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cms_event`
--

CREATE TABLE `cms_event` (
  `cms_event_ID` int(11) UNSIGNED NOT NULL,
  `cms_event_name` varchar(50) NOT NULL,
  `cms_event_about` varchar(150) NOT NULL,
  `cms_event_date` date NOT NULL,
  `cms_account_ID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cms_gallery`
--

CREATE TABLE `cms_gallery` (
  `gallery_id` int(10) UNSIGNED NOT NULL,
  `cms_gallery_img` longblob NOT NULL,
  `cms_account_ID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cms_memo`
--

CREATE TABLE `cms_memo` (
  `cms_memo_ID` int(11) UNSIGNED NOT NULL,
  `cms_subject` varchar(20) NOT NULL,
  `cms_memo_description` varchar(150) NOT NULL,
  `cms_memo_date` date NOT NULL,
  `cms_recipient` varchar(20) NOT NULL,
  `cms_account_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cms_news`
--

CREATE TABLE `cms_news` (
  `cms_news_ID` int(11) UNSIGNED NOT NULL,
  `cms_title` varchar(50) NOT NULL,
  `cms_news_description` varchar(150) NOT NULL,
  `cms_news_date` date NOT NULL,
  `cms_account_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cms_privilege`
--

CREATE TABLE `cms_privilege` (
  `cms_priv_id` int(10) UNSIGNED NOT NULL,
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
  `cms_account_id` int(10) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_privilege`
--

INSERT INTO `cms_privilege` (`cms_priv_id`, `cms_priv`, `frms_priv`, `ims_priv`, `ipcrms_priv`, `oes_priv`, `pms_priv`, `pims_priv`, `prs_priv`, `css_priv`, `scms_priv`, `sis_priv`, `memo_priv`, `calendar_priv`, `news_priv`, `ach_priv`, `gallery_priv`, `project_priv`, `carousel_priv`, `cms_account_type`, `cms_account_id`) VALUES
(1, '0', '1', '0', '1', '0', '0', '1', '0', '0', '0', '1', '1', '1', '1', '1', '0', '0', '0', 'user', 0000000001),
(2, '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'superadmin', 0000000002),
(3, '0', '1', '0', '1', '0', '0', '1', '0', '0', '0', '1', '1', '1', '1', '1', '0', '0', '0', 'user', 0000000003),
(4, '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'admin', 0000000004),
(5, '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'admin', 0000000005),
(6, '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'admin', 0000000006),
(7, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', 'admin', 0000000009);

-- --------------------------------------------------------

--
-- Table structure for table `cms_project`
--

CREATE TABLE `cms_project` (
  `project_id` int(10) UNSIGNED NOT NULL,
  `cms_project_img` longblob NOT NULL,
  `cms_account_ID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `css_room`
--

CREATE TABLE `css_room` (
  `ROOM_ID` int(11) UNSIGNED NOT NULL,
  `ROOM_NO` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `css_room`
--

INSERT INTO `css_room` (`ROOM_ID`, `ROOM_NO`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12);

-- --------------------------------------------------------

--
-- Table structure for table `css_schedule`
--

CREATE TABLE `css_schedule` (
  `SCHED_ID` int(11) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `emp_rec_id` int(10) UNSIGNED NOT NULL,
  `sy_id` int(11) UNSIGNED NOT NULL,
  `SECTION_ID` int(11) UNSIGNED NOT NULL,
  `DAY` varchar(45) NOT NULL,
  `TIME_START` time DEFAULT NULL,
  `TIME_END` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `css_schedule`
--

INSERT INTO `css_schedule` (`SCHED_ID`, `subject_id`, `emp_rec_id`, `sy_id`, `SECTION_ID`, `DAY`, `TIME_START`, `TIME_END`) VALUES
(4, 1, 1, 1, 1, 'Monday', '07:30:00', '08:00:00'),
(5, 2, 2, 2, 2, 'Tuesday', '10:00:00', '10:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `css_school_yr`
--

CREATE TABLE `css_school_yr` (
  `sy_id` int(15) UNSIGNED NOT NULL,
  `sy_start` year(4) NOT NULL,
  `sy_end` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `css_school_yr`
--

INSERT INTO `css_school_yr` (`sy_id`, `sy_start`, `sy_end`) VALUES
(1, 2017, 2018),
(2, 2016, 2017);

-- --------------------------------------------------------

--
-- Table structure for table `css_section`
--

CREATE TABLE `css_section` (
  `SECTION_ID` int(11) UNSIGNED NOT NULL,
  `SECTION_NAME` varchar(45) NOT NULL,
  `YEAR_LEVEL` int(11) UNSIGNED NOT NULL,
  `emp_rec_id` int(10) UNSIGNED NOT NULL,
  `ROOM_ID` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `css_section`
--

INSERT INTO `css_section` (`SECTION_ID`, `SECTION_NAME`, `YEAR_LEVEL`, `emp_rec_id`, `ROOM_ID`) VALUES
(1, 'Lark', 2, 1, 1),
(2, 'Cannary', 2, 2, 2),
(3, 'Diamond', 4, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `css_subject`
--

CREATE TABLE `css_subject` (
  `subject_int` int(10) UNSIGNED NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `grade_level` enum('7','8','9','10','11','12') NOT NULL,
  `subject_desc` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `css_subject`
--

INSERT INTO `css_subject` (`subject_int`, `subject_name`, `grade_level`, `subject_desc`) VALUES
(1, 'English', '7', 'aghk'),
(2, 'Mathematics', '8', 'eruiopo');

-- --------------------------------------------------------

--
-- Table structure for table `dms_document`
--

CREATE TABLE `dms_document` (
  `doc_id` int(11) UNSIGNED NOT NULL,
  `emp_no` int(10) UNSIGNED NOT NULL,
  `doc_type` enum('Service Record','Personal Data Sheet','Master Grading Sheet','Quarterly Grades','School File 1','School File 5') NOT NULL,
  `doc_file` mediumblob,
  `doc_year` year(4) NOT NULL,
  `doc_lock` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dms_document`
--

INSERT INTO `dms_document` (`doc_id`, `emp_no`, `doc_type`, `doc_file`, `doc_year`, `doc_lock`) VALUES
(3, 1, 'Service Record', 0x534552564943455245434f52442e706466, 2015, '1'),
(4, 1, 'Service Record', NULL, 2014, '1');

-- --------------------------------------------------------

--
-- Table structure for table `dms_message`
--

CREATE TABLE `dms_message` (
  `mes_id` int(11) UNSIGNED NOT NULL,
  `mes_title` varchar(45) NOT NULL,
  `mes_content` text NOT NULL,
  `sent` date NOT NULL,
  `received` date DEFAULT NULL,
  `mes_status` enum('0','1') NOT NULL,
  `mes_delete` enum('0','1') NOT NULL,
  `doc_id` int(11) UNSIGNED NOT NULL,
  `rec_no` int(11) UNSIGNED NOT NULL,
  `cms_account_id` int(11) UNSIGNED NOT NULL,
  `temp_id` int(10) UNSIGNED DEFAULT NULL,
  `mes_stat` enum('P','A','D') NOT NULL,
  `state_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dms_message`
--

INSERT INTO `dms_message` (`mes_id`, `mes_title`, `mes_content`, `sent`, `received`, `mes_status`, `mes_delete`, `doc_id`, `rec_no`, `cms_account_id`, `temp_id`, `mes_stat`, `state_date`) VALUES
(12, 'fsas', 'safbtbw f', '2017-10-01', '2017-10-01', '1', '0', 3, 4, 1, NULL, 'P', '0000-00-00 00:00:00'),
(13, 'Re:fsas', 'Your Request has been Approved,Please Check Your Documents.', '2017-10-01', '2017-10-02', '1', '0', 3, 1, 4, NULL, 'A', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dms_mes_temp`
--

CREATE TABLE `dms_mes_temp` (
  `temp_id` int(10) UNSIGNED NOT NULL,
  `temp_con` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dms_pds`
--

CREATE TABLE `dms_pds` (
  `pds_id` int(10) UNSIGNED NOT NULL,
  `emp_rec_id` int(10) UNSIGNED NOT NULL,
  `ed_back` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dms_receiver`
--

CREATE TABLE `dms_receiver` (
  `rec_no` int(11) UNSIGNED NOT NULL,
  `cms_account_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dms_receiver`
--

INSERT INTO `dms_receiver` (`rec_no`, `cms_account_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `dms_school_form`
--

CREATE TABLE `dms_school_form` (
  `sf_id` int(11) UNSIGNED NOT NULL,
  `sf_no` enum('1','2','5') NOT NULL,
  `sf1_id` int(11) UNSIGNED DEFAULT NULL,
  `sf2_id` int(11) UNSIGNED DEFAULT NULL,
  `sf5_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dms_sf1`
--

CREATE TABLE `dms_sf1` (
  `sf1_id` int(11) UNSIGNED NOT NULL,
  `rec_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dms_sf5`
--

CREATE TABLE `dms_sf5` (
  `sf5_id` int(11) UNSIGNED NOT NULL,
  `sf5_remark` varchar(45) NOT NULL,
  `action` varchar(45) NOT NULL,
  `reviewer` varchar(45) NOT NULL,
  `prepared` varchar(45) NOT NULL,
  `corrected` varchar(45) NOT NULL,
  `grade_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ims_borrow`
--

CREATE TABLE `ims_borrow` (
  `borrow_id` int(10) UNSIGNED NOT NULL,
  `emp_no` int(10) UNSIGNED NOT NULL,
  `stor_id` int(10) UNSIGNED NOT NULL,
  `borrow_date` date NOT NULL,
  `return_date` date DEFAULT NULL,
  `borrow_qty` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ims_facility`
--

CREATE TABLE `ims_facility` (
  `fac_id` int(10) UNSIGNED NOT NULL,
  `fac_type` varchar(25) NOT NULL,
  `fund_source` varchar(45) NOT NULL,
  `specfic_fund` varchar(45) NOT NULL,
  `fac_storey` int(10) UNSIGNED NOT NULL,
  `num_rooms` int(10) UNSIGNED NOT NULL,
  `year_completed` year(4) NOT NULL,
  `dimension` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ims_storage`
--

CREATE TABLE `ims_storage` (
  `stor_id` int(10) UNSIGNED NOT NULL,
  `stor_date` date NOT NULL,
  `stor_yr` year(4) NOT NULL,
  `stor_qty` int(10) UNSIGNED NOT NULL,
  `iar_no` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ipcrms_content`
--

CREATE TABLE `ipcrms_content` (
  `ipcr_res_id` int(10) UNSIGNED NOT NULL,
  `q_val` enum('1','2','3','4','5') NOT NULL,
  `e_val` enum('1','2','3','4','5') NOT NULL,
  `t_val` enum('1','2','3','4','5') NOT NULL,
  `perf_id` int(10) UNSIGNED NOT NULL,
  `emp_no` int(10) UNSIGNED NOT NULL,
  `rating` double NOT NULL,
  `score` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ipcrms_kra`
--

CREATE TABLE `ipcrms_kra` (
  `KRA_ID` int(10) UNSIGNED NOT NULL,
  `KRA_Description` varchar(45) NOT NULL,
  `MFO_ID` int(10) UNSIGNED NOT NULL,
  `timeline` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ipcrms_mfo`
--

CREATE TABLE `ipcrms_mfo` (
  `MFO_ID` int(10) UNSIGNED NOT NULL,
  `MFO_Description` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ipcrms_obj`
--

CREATE TABLE `ipcrms_obj` (
  `obj_id` int(10) UNSIGNED NOT NULL,
  `kra_obj` varchar(500) NOT NULL,
  `wpk` varchar(45) NOT NULL,
  `KRA_ID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ipcrms_perf_indicator`
--

CREATE TABLE `ipcrms_perf_indicator` (
  `perf_id` int(10) UNSIGNED NOT NULL,
  `perf_5` varchar(150) NOT NULL,
  `perf_4` varchar(150) NOT NULL,
  `perf_3` varchar(150) NOT NULL,
  `perf_2` varchar(150) NOT NULL,
  `perf_1` varchar(150) NOT NULL,
  `OBJ_ID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ipcrms_rating_period`
--

CREATE TABLE `ipcrms_rating_period` (
  `Rating_ID` int(10) UNSIGNED NOT NULL,
  `rp_date` date DEFAULT NULL,
  `rp_time` time DEFAULT NULL,
  `sy_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ipcrms_records`
--

CREATE TABLE `ipcrms_records` (
  `IPCR_Records_ID` int(10) UNSIGNED NOT NULL,
  `Change_in_Rate` float DEFAULT NULL,
  `Status` varchar(45) NOT NULL,
  `cms_account_ID` int(10) UNSIGNED NOT NULL,
  `Rating_ID` int(10) UNSIGNED NOT NULL,
  `ipcr_res_id` int(10) UNSIGNED NOT NULL,
  `overall_rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `oes_exam`
--

CREATE TABLE `oes_exam` (
  `exam_no` int(10) UNSIGNED NOT NULL,
  `exam_title` varchar(100) NOT NULL,
  `exam_type` varchar(30) NOT NULL,
  `no_of_items` int(10) UNSIGNED NOT NULL,
  `exam_duration` int(10) UNSIGNED NOT NULL,
  `exam_status` varchar(45) NOT NULL,
  `sched_id` int(10) UNSIGNED NOT NULL,
  `exam_dateadded` date NOT NULL,
  `exam_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `oes_exam_answer`
--

CREATE TABLE `oes_exam_answer` (
  `answer_no` int(10) UNSIGNED NOT NULL,
  `content_no` int(10) UNSIGNED NOT NULL,
  `lrn` int(10) UNSIGNED NOT NULL,
  `answer` varchar(100) NOT NULL,
  `points_earned` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `oes_exam_content`
--

CREATE TABLE `oes_exam_content` (
  `content_no` int(10) UNSIGNED NOT NULL,
  `question_no` int(10) UNSIGNED NOT NULL,
  `exam_no` int(10) UNSIGNED NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `oes_exam_logistics`
--

CREATE TABLE `oes_exam_logistics` (
  `logistic_id` int(10) UNSIGNED NOT NULL,
  `exam_no` int(10) UNSIGNED NOT NULL,
  `no_of_passers` int(10) UNSIGNED NOT NULL,
  `no_failed` int(10) UNSIGNED NOT NULL,
  `no_takers` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `oes_exam_result`
--

CREATE TABLE `oes_exam_result` (
  `res_id` int(10) UNSIGNED NOT NULL,
  `exam_no` int(10) UNSIGNED NOT NULL,
  `lrn` int(20) UNSIGNED NOT NULL,
  `exam_score` int(10) UNSIGNED NOT NULL,
  `equivalent_grade` int(10) UNSIGNED NOT NULL,
  `result_remarks` enum('FAIL','PASS') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `oes_question_bank`
--

CREATE TABLE `oes_question_bank` (
  `question_no` int(10) UNSIGNED NOT NULL,
  `question` varchar(100) NOT NULL,
  `question_type` int(10) UNSIGNED NOT NULL,
  `sched_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `oes_ques_enum`
--

CREATE TABLE `oes_ques_enum` (
  `enum_id` int(10) UNSIGNED NOT NULL,
  `question_no` int(10) UNSIGNED NOT NULL,
  `en_key_answers` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `oes_ques_iden`
--

CREATE TABLE `oes_ques_iden` (
  `iden_id` int(10) UNSIGNED NOT NULL,
  `question_no` int(10) UNSIGNED NOT NULL,
  `id_key_answer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `oes_ques_mulchoice`
--

CREATE TABLE `oes_ques_mulchoice` (
  `mul_id` int(10) UNSIGNED NOT NULL,
  `question_no` int(10) UNSIGNED NOT NULL,
  `choice` varchar(200) NOT NULL,
  `mul_key_answer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pims_credentials`
--

CREATE TABLE `pims_credentials` (
  `cred_id` int(10) UNSIGNED NOT NULL,
  `emp_rec_id` int(10) UNSIGNED NOT NULL,
  `subject_int` int(10) UNSIGNED NOT NULL,
  `cred_title` enum('Major','Minor','Related') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pims_department`
--

CREATE TABLE `pims_department` (
  `dept_ID` int(10) UNSIGNED NOT NULL,
  `dept_name` varchar(45) NOT NULL,
  `office_org_code` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pims_department`
--

INSERT INTO `pims_department` (`dept_ID`, `dept_name`, `office_org_code`) VALUES
(1, 'English Department', 8100),
(2, 'Mathematics Department', 8100),
(3, 'Filipino Department', 8100),
(4, 'Science Department', 8100),
(5, 'AP Department', 8100),
(6, 'Mapeh Department', 8100),
(7, 'TLE Department', 8100),
(8, 'Values', 8100);

-- --------------------------------------------------------

--
-- Table structure for table `pims_educational_background`
--

CREATE TABLE `pims_educational_background` (
  `ed_back` int(10) UNSIGNED NOT NULL,
  `elementary_school_name` varchar(110) NOT NULL,
  `elementary_academic_yr` varchar(45) NOT NULL,
  `secondary_school_name` varchar(45) DEFAULT NULL,
  `secondary_academic_yr` varchar(25) DEFAULT NULL,
  `tertiary_school_name` varchar(110) DEFAULT NULL,
  `tertiary_academic_yr` varchar(25) DEFAULT NULL,
  `tertiary_degrees` varchar(55) DEFAULT NULL,
  `honor_or_award` varchar(220) DEFAULT NULL,
  `affiliations` varchar(110) DEFAULT NULL,
  `emp_No` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pims_educational_background`
--

INSERT INTO `pims_educational_background` (`ed_back`, `elementary_school_name`, `elementary_academic_yr`, `secondary_school_name`, `secondary_academic_yr`, `tertiary_school_name`, `tertiary_academic_yr`, `tertiary_degrees`, `honor_or_award`, `affiliations`, `emp_No`) VALUES
(12, 'Bicol University', '1998', 'Bicol University', '2004', 'Bicol University', '2010', 'BSIT', 'Cumlaude', 'Master IT', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pims_employment_records`
--

CREATE TABLE `pims_employment_records` (
  `emp_rec_ID` int(10) UNSIGNED NOT NULL,
  `complete_item_no` varchar(45) NOT NULL,
  `work_stat` enum('WORKING','RETIRED') NOT NULL,
  `role_type` varchar(45) NOT NULL,
  `emp_status` enum('PERMANENT','REGULAR PERMANENT','SUBSTITUTE','PROBATIONARY','TEMPORARY') NOT NULL,
  `date_joined` date NOT NULL,
  `date_retired` date DEFAULT NULL,
  `div_code` int(10) UNSIGNED NOT NULL,
  `biometric_ID` varchar(45) NOT NULL,
  `school_ID` int(10) UNSIGNED NOT NULL,
  `appointment_date` date NOT NULL,
  `faculty_type` enum('Non Teaching','Teaching') NOT NULL,
  `job_title_code` varchar(45) NOT NULL,
  `emp_No` int(10) UNSIGNED NOT NULL,
  `dept_ID` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pims_employment_records`
--

INSERT INTO `pims_employment_records` (`emp_rec_ID`, `complete_item_no`, `work_stat`, `role_type`, `emp_status`, `date_joined`, `date_retired`, `div_code`, `biometric_ID`, `school_ID`, `appointment_date`, `faculty_type`, `job_title_code`, `emp_No`, `dept_ID`) VALUES
(1, '5', 'WORKING', 'Teacher', 'PERMANENT', '2002-09-04', NULL, 1, '123', 1225, '2017-09-05', 'Teaching', 'T1', 1, 1),
(2, '3', 'WORKING', 'School Head', 'PERMANENT', '2009-09-05', NULL, 2, '432', 1225, '2017-09-05', 'Teaching', 'PR1', 2, 2),
(3, '4', 'WORKING', 'Teacher', 'SUBSTITUTE', '2017-09-12', NULL, 3, '1234', 1225, '2017-09-20', 'Teaching', 'T2', 3, 3),
(4, '8', 'RETIRED', 'Human Resource', 'TEMPORARY', '2013-09-12', NULL, 1, '456', 1225, '2017-09-05', 'Non Teaching', 'HR1', 4, 4),
(5, '10', 'WORKING', 'Supply Officer', 'PROBATIONARY', '2017-09-10', NULL, 2, '2345', 1225, '2017-09-19', 'Non Teaching', 'SO1', 5, 5),
(6, '7', 'WORKING', 'LIS Coordinator', 'PERMANENT', '2017-09-12', NULL, 2, '9876', 1225, '2017-09-12', 'Teaching', 'T3', 6, 6),
(7, '12', 'WORKING', 'Teacher', 'SUBSTITUTE', '2017-09-02', NULL, 1, '3456', 43, '2017-09-06', 'Teaching', 'T1', 7, 7),
(8, '6', 'WORKING', 'Teacher', 'PROBATIONARY', '2017-09-13', NULL, 1, '34565', 54325, '2017-09-28', 'Teaching', 'T2', 8, 8),
(9, '55', 'WORKING', 'Record Keeper', 'TEMPORARY', '2017-09-11', NULL, 1, '4567654', 3212, '2017-09-05', 'Non Teaching', 'RK1', 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pims_family_background`
--

CREATE TABLE `pims_family_background` (
  `fb_ID` int(10) UNSIGNED NOT NULL,
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
  `no_of_siblings` int(10) UNSIGNED NOT NULL,
  `emp_No` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pims_job_title`
--

CREATE TABLE `pims_job_title` (
  `job_title_code` varchar(45) NOT NULL,
  `job_title_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pims_job_title`
--

INSERT INTO `pims_job_title` (`job_title_code`, `job_title_name`) VALUES
('HR1', 'Human Resource 1'),
('PR1', 'Principal 1'),
('RK1', 'Record Keeper 1'),
('SO1', 'Supply Officer 1'),
('T1', 'Teaching 1'),
('T2', 'Teacher 2'),
('T3', 'Teacher 3');

-- --------------------------------------------------------

--
-- Table structure for table `pims_leave`
--

CREATE TABLE `pims_leave` (
  `leave_ID` int(10) UNSIGNED NOT NULL,
  `type` enum('Official','Personal') NOT NULL,
  `date_submitted` date NOT NULL,
  `date_responded` date NOT NULL,
  `leave_start` datetime NOT NULL,
  `leave_end` datetime NOT NULL,
  `place_to_be_visited` varchar(110) DEFAULT NULL,
  `purpose` text,
  `approved_by` varchar(55) NOT NULL,
  `attachment` longblob,
  `attachment_name` varchar(45) DEFAULT NULL,
  `attachment_type` varchar(45) DEFAULT NULL,
  `leave_application_status` varchar(45) DEFAULT NULL,
  `leave_bal_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pims_leave_balance`
--

CREATE TABLE `pims_leave_balance` (
  `leave_bal_ID` int(10) UNSIGNED NOT NULL,
  `leave_credits` varchar(20) NOT NULL,
  `leave_status` varchar(45) NOT NULL,
  `emp_No` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pims_performance_report`
--

CREATE TABLE `pims_performance_report` (
  `perf_rep_id` int(10) UNSIGNED NOT NULL,
  `award_name` varchar(110) NOT NULL,
  `award_no` int(10) UNSIGNED DEFAULT NULL,
  `grants` varchar(110) DEFAULT NULL,
  `remarks` varchar(110) DEFAULT NULL,
  `emp_No` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pims_personnel`
--

CREATE TABLE `pims_personnel` (
  `emp_No` int(10) UNSIGNED NOT NULL,
  `P_picture` longblob,
  `P_fname` varchar(45) NOT NULL,
  `P_mname` varchar(45) DEFAULT NULL,
  `P_lname` varchar(45) NOT NULL,
  `P_extension_name` varchar(5) DEFAULT NULL,
  `P_email` varchar(45) DEFAULT NULL,
  `pims_gender` enum('Male','Female') NOT NULL,
  `pims_age` int(10) UNSIGNED DEFAULT NULL,
  `pims_birthdate` date NOT NULL,
  `temp_address_street` varchar(110) DEFAULT NULL,
  `temp_address_house_no` int(10) UNSIGNED DEFAULT NULL,
  `temp_address_barangay` varchar(45) NOT NULL,
  `temp_address_municipality_city` varchar(45) NOT NULL,
  `temp_address_province` varchar(45) NOT NULL,
  `temp_address_zipCode` int(10) UNSIGNED NOT NULL,
  `perm_address_street` varchar(45) DEFAULT NULL,
  `perm_address_house_no` int(10) UNSIGNED DEFAULT NULL,
  `perm_address_barangay` varchar(45) NOT NULL,
  `perm_address_municipality_city` varchar(45) NOT NULL,
  `perm_address_province` varchar(45) NOT NULL,
  `perm_address_zipCode` int(10) UNSIGNED NOT NULL,
  `nationality` varchar(45) NOT NULL,
  `bloodtype` varchar(5) DEFAULT NULL,
  `civil_status` varchar(20) NOT NULL,
  `pims_religion` varchar(45) DEFAULT NULL,
  `pims_image_type` varchar(45) NOT NULL,
  `pims_contact_no` varchar(20) DEFAULT NULL,
  `GSIS_No` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pims_personnel`
--

INSERT INTO `pims_personnel` (`emp_No`, `P_picture`, `P_fname`, `P_mname`, `P_lname`, `P_extension_name`, `P_email`, `pims_gender`, `pims_age`, `pims_birthdate`, `temp_address_street`, `temp_address_house_no`, `temp_address_barangay`, `temp_address_municipality_city`, `temp_address_province`, `temp_address_zipCode`, `perm_address_street`, `perm_address_house_no`, `perm_address_barangay`, `perm_address_municipality_city`, `perm_address_province`, `perm_address_zipCode`, `nationality`, `bloodtype`, `civil_status`, `pims_religion`, `pims_image_type`, `pims_contact_no`, `GSIS_No`) VALUES
(1, NULL, 'Ryan', 'Aquino', 'Rodriguez', NULL, 'ryan@gmail.com', 'Male', 35, '1987-09-13', 'Rizal', 5, 'Washington', 'Sto. Domingo', 'Albay', 4501, 'Rizal', 5, 'Washington', 'Sto. Domingo', 'Albay', 4501, 'Filipino', 'A', 'Married', 'Roman Catholic', '', '096135665', '5643'),
(2, NULL, 'Rodel', 'Perez', 'Naz', NULL, 'rodel@gmail.com', 'Female', NULL, '1978-09-06', 'Mabini', 45, 'Cabangan', 'Camalig', 'Albay', 4502, 'Mabini', 45, 'Cabangan', 'Camalig', 'Albay', 4502, 'Filipino', 'O', 'Married', 'Roman Catholic', '', '09465684', '5234'),
(3, NULL, 'Michael', 'Mabini', 'Brogada', NULL, 'michael@gmail.com', 'Male', 35, '1985-09-12', 'Bonifacio', 45, 'Poblacion', 'Daraga', 'Albay', 4502, 'Bonifacio', 45, 'Poblacion', 'Daraga', 'Albay', 4502, 'Filipino', 'A', 'single', 'roman catholic', '', '094356788', '344'),
(4, NULL, 'Rea Kaye', 'Pantoja', 'Llamazares', NULL, 'reakaye@gmail.com', 'Female', 20, '1996-11-02', 'Imperial', 61, 'Poblacion', 'Guinobatan', 'Albay', 4502, 'Imperial', 61, 'Poblacion', 'Guinobatan', 'Albay', 4502, 'Filipino', 'A', 'Married', 'Roman Catholic', '', '093456767', '4242'),
(5, NULL, 'Yves', 'Alaurin', 'Solis', NULL, 'yves@gmail.com', 'Male', 20, '1996-10-12', 'Rizal', 24, 'Stone', 'Legazpi City', 'Albay', 4501, 'Rizal', 24, 'Stone', 'Legazpi City', 'Albay', 4501, 'Filipino', 'A', 'Single', 'Roman Catholic', '', '0965432', '2345'),
(6, NULL, 'Mark', 'Jerly', 'Bundalian', NULL, 'mark@gmail.com', 'Female', 27, '2017-09-12', 'Tandang Sora', 58, 'Em''s', 'Legazpi', 'Albay', 4501, 'Tandang Sora', 58, 'Em''s', 'Legazpi', 'Albay', 4501, 'Filipino', 'A', 'Single', 'Roman Catolic', '', '0923567', '7654'),
(7, NULL, 'Reinz', 'Cruz', 'Yap', NULL, 'reinz@gmail.com', 'Male', 30, '1997-09-13', 'Bonifacio', 21, 'Inarado', 'Daraga', 'Albay', 4501, 'Bonifacio', 21, 'Inarado', 'Daraga', 'Albay', 4501, 'Filipino', 'A', 'Single', 'Roman Catholic', '', '09764562', '6548'),
(8, NULL, 'Vicente', 'Lim', 'Embudo', NULL, 'vince@gmail.com', 'Male', 32, '1997-09-21', 'Mabini', 45, 'Cruzada', 'Legazpi City', 'Albay', 4500, 'Mabini', 45, 'Cruzada', 'Legazpi City', 'Albay', 4500, 'Filipino', 'O', 'Single', 'Roman Catholic', '', '0965256', '346'),
(9, NULL, 'Shiena', 'Malla', 'Occidental', NULL, 'shiena@gmail.com', 'Female', 21, '1996-07-23', 'Imperial', 23, 'Poblacion', 'Guinobatan', 'Albay', 4503, 'Imperial', 23, 'Poblacion', 'Guinobatan', 'Albay', 4503, 'Filipino', 'O', 'Single', 'Roman Catholic', '', '097654', '2345'),
(10, NULL, 'Christine', 'Revilla', 'Arroz', NULL, 'christine@gmail.com', 'Female', 21, '1996-04-13', 'Rizal', 45, 'Bascaran', 'Guinobatan', 'Albay', 4503, 'Rizal', 45, 'Bascaran', 'Guinobatan', 'Albay', 4503, 'Filipino', 'AB', 'Single', 'Roman Catholic', '', '0965433', '9087654'),
(11, NULL, 'Jenevilyn', NULL, 'Recato', NULL, 'jene@gmail.com', 'Female', 20, '2017-08-09', 'Bonifacio', 21, 'Basud', 'Guinobatan', 'Albay', 4503, 'Bonifacio', 21, 'Basud', 'Guinobatan', 'Albay', 4503, 'Filipino', 'O', 'Married', 'Roman Catholic', '', '096532', '65432');

-- --------------------------------------------------------

--
-- Table structure for table `pims_service_records`
--

CREATE TABLE `pims_service_records` (
  `servRec_ID` int(10) UNSIGNED NOT NULL,
  `inclusive_date_start` date NOT NULL,
  `inclusive_date_end` varchar(20) DEFAULT NULL,
  `designation` varchar(45) DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `place_of_assignment` varchar(45) DEFAULT NULL,
  `srce_of_fund` varchar(45) DEFAULT NULL,
  `remarks` varchar(45) DEFAULT NULL,
  `emp_rec_ID` int(10) UNSIGNED NOT NULL,
  `sr_status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pims_service_records`
--

INSERT INTO `pims_service_records` (`servRec_ID`, `inclusive_date_start`, `inclusive_date_end`, `designation`, `salary`, `place_of_assignment`, `srce_of_fund`, `remarks`, `emp_rec_ID`, `sr_status`) VALUES
(1, '2017-09-11', '2017-09-1', 'Teacher I', 20000, 'PNHS', 'BSP', 'Retained', 1, 'Permanent'),
(2, '2017-09-14', '2017-09-20', 'Principal I', 25000, 'PNHS', 'BSP', 'Retained', 2, 'Permanent'),
(3, '2017-09-11', '2017-09-18', '-do-', 20000, '-do-', '-do-', 'Promoted', 1, 'Permanent'),
(4, '2017-09-19', '2017-09-25', '-do-', 20000, '-do-', '-do-', 'Retained', 1, 'Permanent'),
(5, '2017-09-03', '2017-09-12', '-do-', 26000, '-do-', '-do-', 'Promoted', 2, 'Permanent'),
(6, '2017-09-04', '2017-09-11', 'Teacher III', 30000, 'PNHS', 'BSP', 'Retained', 3, 'Permanent'),
(7, '2017-09-01', '2017-09-11', 'HR1', 20000, 'PNHS', 'BSP', 'Retained', 4, 'Permanent'),
(8, '2017-09-13', '2017-09-20', 'Teacher III', 30000, '-do-', '-do-', 'Promoted', 3, 'Permanent'),
(9, '2017-09-13', '2017-09-15', 'HR II', 30000, 'PNHS', '-do-', 'Promoted', 4, 'Permanent'),
(10, '2017-09-11', '2017-09-20', 'Supply Officer I', 20000, 'PNHS', 'BSP', 'Retained', 5, 'Permanent'),
(11, '2017-09-01', '2017-09-24', 'Teacher III', 30000, 'PNHS', 'BSP', 'Retained', 6, 'Permanent'),
(12, '2017-09-05', '2017-09-21', 'Teacher I', 20000, 'PNHS', 'BSP', 'Retained', 7, 'Permanent'),
(13, '2017-09-13', '2017-09-18', 'Teacher II', 25000, 'PNHS', 'BSP', 'Permanent', 8, 'Permanent');

-- --------------------------------------------------------

--
-- Table structure for table `pims_timestamp`
--

CREATE TABLE `pims_timestamp` (
  `timestamp_id` int(10) UNSIGNED NOT NULL,
  `time_in` datetime NOT NULL,
  `time_out` datetime DEFAULT NULL,
  `emp_rec_ID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pims_training_programs`
--

CREATE TABLE `pims_training_programs` (
  `training_ID` int(10) UNSIGNED NOT NULL,
  `training_title` varchar(110) NOT NULL,
  `location` varchar(45) NOT NULL,
  `date_start` date NOT NULL,
  `date_finish` date NOT NULL,
  `no_of_hours` int(10) UNSIGNED NOT NULL,
  `others` varchar(45) DEFAULT NULL,
  `emp_No` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pms_app`
--

CREATE TABLE `pms_app` (
  `plan_con_no` int(11) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `app_qty` int(10) UNSIGNED DEFAULT NULL,
  `app_unit` int(11) NOT NULL,
  `total_cost` double NOT NULL,
  `app_quarter` enum('1st','2nd','3rd','4th') NOT NULL,
  `stor_status` enum('1','0') NOT NULL DEFAULT '0',
  `quarter_cost` double NOT NULL,
  `quarter_qty` int(10) UNSIGNED NOT NULL,
  `quarter_amt` double NOT NULL,
  `app_type` enum('Primary','Suppplementary') DEFAULT NULL,
  `unit_cost` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pms_iar`
--

CREATE TABLE `pms_iar` (
  `iar_no` int(10) UNSIGNED NOT NULL,
  `po_no` int(10) UNSIGNED NOT NULL,
  `iar_status` enum('Partial','Complete') NOT NULL,
  `received_date` date NOT NULL,
  `iar_qty` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pms_item`
--

CREATE TABLE `pms_item` (
  `item_id` int(10) UNSIGNED NOT NULL,
  `stock_no` int(10) UNSIGNED NOT NULL,
  `item_name` varchar(45) NOT NULL,
  `item_des` varchar(45) NOT NULL,
  `item_unit` varchar(25) NOT NULL,
  `item_type` enum('Janitorial','I.T.','Hardware','Electtrical','Sports','Clinic','Common') NOT NULL,
  `equipment` enum('1','0') NOT NULL,
  `supply` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pms_po`
--

CREATE TABLE `pms_po` (
  `po_no` int(10) UNSIGNED NOT NULL,
  `pr_no` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED DEFAULT NULL,
  `po_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pms_pr`
--

CREATE TABLE `pms_pr` (
  `pr_no` int(10) UNSIGNED NOT NULL,
  `emp_no` int(10) UNSIGNED NOT NULL,
  `ris_no` int(10) UNSIGNED DEFAULT NULL,
  `plan_con_no` int(10) UNSIGNED DEFAULT NULL,
  `pr_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pms_ris`
--

CREATE TABLE `pms_ris` (
  `ris_no` int(10) UNSIGNED NOT NULL,
  `emp_No` int(10) UNSIGNED DEFAULT NULL,
  `rqst_qty` int(10) UNSIGNED DEFAULT NULL,
  `rqst_date` date DEFAULT NULL,
  `iss_qty` int(10) UNSIGNED DEFAULT NULL,
  `iss_date` date DEFAULT NULL,
  `item_id` int(10) UNSIGNED DEFAULT NULL,
  `status` enum('For Procurement','Available') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pms_rsmi`
--

CREATE TABLE `pms_rsmi` (
  `rsmi_no` int(10) UNSIGNED NOT NULL,
  `ris_no` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `iss_qty` int(10) UNSIGNED DEFAULT NULL,
  `iss_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pms_supplier`
--

CREATE TABLE `pms_supplier` (
  `company_id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(45) NOT NULL,
  `sup_address` varchar(45) NOT NULL,
  `sup_contact` varchar(14) NOT NULL,
  `supp_status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prs_charges`
--

CREATE TABLE `prs_charges` (
  `charges_id` int(10) UNSIGNED NOT NULL,
  `amount` decimal(10,4) DEFAULT NULL,
  `emp_No` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prs_deduction`
--

CREATE TABLE `prs_deduction` (
  `deduction_id` int(10) UNSIGNED NOT NULL,
  `late` varchar(45) DEFAULT NULL,
  `emp_No` int(10) UNSIGNED NOT NULL,
  `loan_id` int(10) UNSIGNED DEFAULT NULL,
  `gsis_id` int(10) UNSIGNED DEFAULT NULL,
  `charges_id` int(10) UNSIGNED DEFAULT NULL,
  `tax_id` int(10) UNSIGNED NOT NULL,
  `philhealth_id` int(10) UNSIGNED DEFAULT NULL,
  `pagibig_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prs_gsis`
--

CREATE TABLE `prs_gsis` (
  `gsis_id` int(10) UNSIGNED NOT NULL,
  `Percentage` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prs_loan`
--

CREATE TABLE `prs_loan` (
  `loan_id` int(10) UNSIGNED NOT NULL,
  `loan_name` varchar(45) DEFAULT NULL,
  `loan_amount` varchar(45) DEFAULT NULL,
  `amortization` decimal(10,4) DEFAULT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `loan_status` enum('ONGOING','PAID') NOT NULL,
  `emp_no` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prs_mtr`
--

CREATE TABLE `prs_mtr` (
  `prs_attendance_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `emp_No` int(10) UNSIGNED NOT NULL,
  `monthly_cost` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prs_pagibig`
--

CREATE TABLE `prs_pagibig` (
  `pagibig_id` int(10) UNSIGNED NOT NULL,
  `pi_amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prs_payslip`
--

CREATE TABLE `prs_payslip` (
  `payslip_id` int(10) UNSIGNED NOT NULL,
  `Basic_pay` decimal(10,2) DEFAULT NULL,
  `allowance` decimal(10,2) DEFAULT NULL,
  `gross_pay` decimal(10,2) DEFAULT NULL,
  `Net_pay` decimal(10,2) DEFAULT NULL,
  `emp_No` int(10) UNSIGNED NOT NULL,
  `deduction_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prs_philhealth`
--

CREATE TABLE `prs_philhealth` (
  `philhealth_id` int(10) UNSIGNED NOT NULL,
  `ph_range_fr` varchar(45) DEFAULT NULL,
  `ph_range_to` varchar(45) DEFAULT NULL,
  `ph_salary_base` varchar(45) DEFAULT NULL,
  `ph_total_monthly_premium` varchar(45) DEFAULT NULL,
  `ph_employee_share` varchar(45) DEFAULT NULL,
  `ph_employee_share1` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prs_report`
--

CREATE TABLE `prs_report` (
  `report_id` int(10) UNSIGNED NOT NULL,
  `rep_basic_pay` varchar(45) DEFAULT NULL,
  `rep_allowance` varchar(45) DEFAULT NULL,
  `rep_gross_pay` varchar(45) DEFAULT NULL,
  `rep_net_pay` varchar(45) DEFAULT NULL,
  `date_issued` timestamp NULL DEFAULT NULL,
  `total_ph` decimal(10,2) DEFAULT NULL,
  `total_tax` decimal(10,2) DEFAULT NULL,
  `emp_No` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prs_withholding_tax`
--

CREATE TABLE `prs_withholding_tax` (
  `tax_id` int(10) UNSIGNED NOT NULL,
  `tax_range_fr` decimal(10,2) DEFAULT NULL,
  `tax_range_to` decimal(10,2) DEFAULT NULL,
  `exemption` decimal(10,2) DEFAULT NULL,
  `tax_base` decimal(10,2) DEFAULT NULL,
  `percentage` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `scms_bmi_rec`
--

CREATE TABLE `scms_bmi_rec` (
  `bmi_no` int(10) UNSIGNED NOT NULL,
  `height` varchar(12) NOT NULL,
  `weight` varchar(12) NOT NULL,
  `bmi` int(10) UNSIGNED NOT NULL,
  `nutri_status` enum('Normal','Wasted','Severely Wasted','Overweight','Obese') NOT NULL,
  `cms_account_ID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `scms_consultation`
--

CREATE TABLE `scms_consultation` (
  `patient_id` int(10) UNSIGNED NOT NULL,
  `complaint` varchar(200) NOT NULL,
  `diagnosis` varchar(200) NOT NULL,
  `treatment` varchar(100) NOT NULL,
  `disposition` varchar(100) NOT NULL,
  `cons_date` date NOT NULL,
  `cons_time_in` varchar(20) NOT NULL,
  `cons_time_out` varchar(20) DEFAULT NULL,
  `cms_account_ID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `scms_content`
--

CREATE TABLE `scms_content` (
  `content_no` int(10) UNSIGNED NOT NULL,
  `scms_title` varchar(100) NOT NULL,
  `scms_descrip` varchar(1000) NOT NULL,
  `scms_img` longblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `scms_equipment`
--

CREATE TABLE `scms_equipment` (
  `equip_code` varchar(10) NOT NULL,
  `equip_name` varchar(50) NOT NULL,
  `equip_status` varchar(50) NOT NULL,
  `equip_stocks` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `scms_illness`
--

CREATE TABLE `scms_illness` (
  `illness_no` int(10) UNSIGNED NOT NULL,
  `illness_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `scms_illness_hist_line`
--

CREATE TABLE `scms_illness_hist_line` (
  `history_no` int(10) UNSIGNED NOT NULL,
  `medrec_id` int(10) UNSIGNED NOT NULL,
  `illness_no` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `scms_immune_rec_line`
--

CREATE TABLE `scms_immune_rec_line` (
  `rec_no` int(10) UNSIGNED NOT NULL,
  `medrec_id` int(10) UNSIGNED NOT NULL,
  `vaccine_no` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `scms_immunization`
--

CREATE TABLE `scms_immunization` (
  `vaccine_no` int(10) UNSIGNED NOT NULL,
  `vaccine_name` varchar(200) NOT NULL,
  `vaccine_descrip` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `scms_medicine`
--

CREATE TABLE `scms_medicine` (
  `med_no` int(10) UNSIGNED NOT NULL,
  `gen_name` varchar(100) DEFAULT NULL,
  `brand_name` varchar(100) NOT NULL,
  `med_descrip` varchar(500) DEFAULT NULL,
  `stocks` int(10) UNSIGNED NOT NULL,
  `exp_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `scms_medrec`
--

CREATE TABLE `scms_medrec` (
  `medrec_id` int(10) UNSIGNED NOT NULL,
  `eyeglass` varchar(50) DEFAULT NULL,
  `ear_infection` varchar(50) DEFAULT NULL,
  `allergies` varchar(200) DEFAULT NULL,
  `eye_cond_desc` varchar(200) DEFAULT NULL,
  `ear_cond_desc` varchar(200) DEFAULT NULL,
  `emer_contact_name` varchar(50) NOT NULL,
  `emer_contact_no` int(10) UNSIGNED NOT NULL,
  `relationship` varchar(50) DEFAULT NULL,
  `date_of_update` date NOT NULL,
  `cms_account_ID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `scms_prescription`
--

CREATE TABLE `scms_prescription` (
  `presc_no` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `med_no` int(10) UNSIGNED NOT NULL,
  `pres_qty` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `scms_supplies`
--

CREATE TABLE `scms_supplies` (
  `supp_no` int(10) UNSIGNED NOT NULL,
  `supp_name` varchar(25) NOT NULL,
  `supp_status` varchar(45) NOT NULL,
  `supp_stocks` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sis_attendance`
--

CREATE TABLE `sis_attendance` (
  `attend_id` int(20) UNSIGNED NOT NULL,
  `attend_month` enum('Jan','Feb','March','April','May','June','July','Aug','Sep','Oct','Nov','Dec') NOT NULL,
  `total_days_present` int(5) UNSIGNED NOT NULL,
  `total_days_absent` int(5) UNSIGNED NOT NULL,
  `rec_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sis_grade`
--

CREATE TABLE `sis_grade` (
  `grade_id` int(15) UNSIGNED NOT NULL,
  `rec_id` int(15) UNSIGNED NOT NULL,
  `sched_id` int(15) UNSIGNED NOT NULL,
  `grade_val` int(5) UNSIGNED NOT NULL,
  `grade_remarks` varchar(50) NOT NULL,
  `grade_units` int(5) UNSIGNED NOT NULL,
  `sis_grade_quarter` enum('1st','2nd','3d','4th') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sis_parent_guardian`
--

CREATE TABLE `sis_parent_guardian` (
  `pg_id` int(10) UNSIGNED NOT NULL,
  `lrn` int(20) UNSIGNED NOT NULL,
  `guardian_type` varchar(25) DEFAULT NULL,
  `sis_father` varchar(50) DEFAULT NULL,
  `sis_mother` varchar(50) DEFAULT NULL,
  `sis_guardian` varchar(50) DEFAULT NULL,
  `guardian_relation` varchar(20) DEFAULT NULL,
  `pg_contact` int(15) UNSIGNED DEFAULT NULL,
  `maiden_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sis_sibling`
--

CREATE TABLE `sis_sibling` (
  `sib_id` int(15) UNSIGNED NOT NULL,
  `lrn` int(20) UNSIGNED DEFAULT NULL,
  `sib_name` varchar(100) NOT NULL,
  `school_work` varchar(100) DEFAULT NULL,
  `sib_age` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sis_student`
--

CREATE TABLE `sis_student` (
  `lrn` int(20) UNSIGNED NOT NULL,
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
  `street` varchar(50) DEFAULT NULL,
  `brng` varchar(50) NOT NULL,
  `munic` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sis_student`
--

INSERT INTO `sis_student` (`lrn`, `stu_fname`, `stu_mname`, `stu_lname`, `sis_b_day`, `plc_birth`, `sis_gender`, `sis_religion`, `m_tounge`, `ethnic`, `stu_status`, `stu_contact`, `sis_email`, `trnsf_in_date`, `trnf_out_date`, `drp`, `street`, `brng`, `munic`) VALUES
(101010, 'Denver', 'BendaÃ±a', 'Arancillo', '1999-01-28', 'Legazpi', 'Male', 'Roman Catholic', 'Tagalog', 'NA', 'Enrolled', '09175689255', 'xdba28@gmail.com', NULL, NULL, NULL, '5th street', 'Our Ladys Village', 'Bitano'),
(222222, 'Karen', 'Monilla', 'Bagasbas', '1997-07-24', 'Bulacan', 'Female', 'Roman Catholic', 'Bicol', 'NA', 'Enrolled', '04645525665', 'asdsample@gmail.com', NULL, NULL, NULL, 'Crisistomo Ibara', 'zxc', 'Bunot'),
(333333, 'Nico', 'Villaraza', 'Ativo', '1998-09-10', 'Caloocan', 'Male', 'Roman Catholic', 'Tagalog', 'NA', 'Enrolled', '09294545075', 'niicsviey@gmail.com', NULL, NULL, NULL, 'qweqweqwe', 'edi wow', 'Camalic'),
(444444, 'Emmaunel', 'Candia', 'Guim', '1997-11-02', 'Masbate City', 'Male', 'Christian', 'Tagalog', 'NA', 'Enrolled', '0914656532', 'asdfa@gmail.com', '2017-09-16', NULL, NULL, '25th street', 'Puro', 'Legazpi City'),
(555555, 'Clint Johnson', 'Palenzuela', 'Baliat', '1998-04-25', 'Guinobatan', 'Male', 'Roman Catholic', 'Spanish', 'NA', 'Enrolled', '01644845', 'clint@gmail.com', '2017-08-30', NULL, NULL, 'Gaisano', 'BaÃ±ag', 'Daraga');

-- --------------------------------------------------------

--
-- Table structure for table `sis_stu_rec`
--

CREATE TABLE `sis_stu_rec` (
  `rec_id` int(15) UNSIGNED NOT NULL,
  `lrn` int(20) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `sy_id` int(15) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Indexes for table `cms_calendar`
--
ALTER TABLE `cms_calendar`
  ADD PRIMARY KEY (`cms_calendar_ID`),
  ADD KEY `calendar_account_idx` (`cms_account_id`);

--
-- Indexes for table `cms_carousel`
--
ALTER TABLE `cms_carousel`
  ADD PRIMARY KEY (`carousel_id`),
  ADD KEY `car_acc_idx` (`cms_account_ID`);

--
-- Indexes for table `cms_event`
--
ALTER TABLE `cms_event`
  ADD PRIMARY KEY (`cms_event_ID`),
  ADD KEY `event_account_idx` (`cms_account_ID`);

--
-- Indexes for table `cms_gallery`
--
ALTER TABLE `cms_gallery`
  ADD PRIMARY KEY (`gallery_id`),
  ADD KEY `gal_acc_idx` (`cms_account_ID`);

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
-- Indexes for table `cms_privilege`
--
ALTER TABLE `cms_privilege`
  ADD PRIMARY KEY (`cms_priv_id`),
  ADD KEY `priv_account_idx` (`cms_account_id`);

--
-- Indexes for table `cms_project`
--
ALTER TABLE `cms_project`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `proj_acc_idx` (`cms_account_ID`);

--
-- Indexes for table `css_room`
--
ALTER TABLE `css_room`
  ADD PRIMARY KEY (`ROOM_ID`);

--
-- Indexes for table `css_schedule`
--
ALTER TABLE `css_schedule`
  ADD PRIMARY KEY (`SCHED_ID`),
  ADD KEY `SECTION-ID` (`SECTION_ID`),
  ADD KEY `sched_sub_idx` (`subject_id`),
  ADD KEY `sched_emp_idx` (`emp_rec_id`),
  ADD KEY `sched_sy_idx` (`sy_id`);

--
-- Indexes for table `css_school_yr`
--
ALTER TABLE `css_school_yr`
  ADD PRIMARY KEY (`sy_id`);

--
-- Indexes for table `css_section`
--
ALTER TABLE `css_section`
  ADD PRIMARY KEY (`SECTION_ID`),
  ADD KEY `section_ibfk_2_idx` (`ROOM_ID`),
  ADD KEY `sec_emp_idx` (`emp_rec_id`);

--
-- Indexes for table `css_subject`
--
ALTER TABLE `css_subject`
  ADD PRIMARY KEY (`subject_int`);

--
-- Indexes for table `dms_document`
--
ALTER TABLE `dms_document`
  ADD PRIMARY KEY (`doc_id`),
  ADD KEY `emp_doc_idx` (`emp_no`);

--
-- Indexes for table `dms_message`
--
ALTER TABLE `dms_message`
  ADD PRIMARY KEY (`mes_id`),
  ADD KEY `doc_mes_idx` (`doc_id`),
  ADD KEY `rec_mes_idx` (`rec_no`),
  ADD KEY `account_mes_idx` (`cms_account_id`),
  ADD KEY `temp_mes_idx` (`temp_id`);

--
-- Indexes for table `dms_mes_temp`
--
ALTER TABLE `dms_mes_temp`
  ADD PRIMARY KEY (`temp_id`);

--
-- Indexes for table `dms_pds`
--
ALTER TABLE `dms_pds`
  ADD PRIMARY KEY (`pds_id`),
  ADD KEY `pds_emp_idx` (`ed_back`),
  ADD KEY `pds_ed_back_idx` (`emp_rec_id`);

--
-- Indexes for table `dms_receiver`
--
ALTER TABLE `dms_receiver`
  ADD PRIMARY KEY (`rec_no`),
  ADD KEY `rec_account_idx` (`cms_account_id`);

--
-- Indexes for table `dms_school_form`
--
ALTER TABLE `dms_school_form`
  ADD PRIMARY KEY (`sf_id`),
  ADD KEY `sf_1_idx` (`sf1_id`),
  ADD KEY `sf_5_idx` (`sf5_id`);

--
-- Indexes for table `dms_sf1`
--
ALTER TABLE `dms_sf1`
  ADD PRIMARY KEY (`sf1_id`),
  ADD KEY `sf1_stud_idx` (`rec_id`);

--
-- Indexes for table `dms_sf5`
--
ALTER TABLE `dms_sf5`
  ADD PRIMARY KEY (`sf5_id`),
  ADD KEY `sf5_grade_idx` (`grade_id`);

--
-- Indexes for table `ims_borrow`
--
ALTER TABLE `ims_borrow`
  ADD PRIMARY KEY (`borrow_id`),
  ADD KEY `bor_stor_idx` (`stor_id`),
  ADD KEY `bor_emp_idx` (`emp_no`);

--
-- Indexes for table `ims_facility`
--
ALTER TABLE `ims_facility`
  ADD PRIMARY KEY (`fac_id`);

--
-- Indexes for table `ims_storage`
--
ALTER TABLE `ims_storage`
  ADD PRIMARY KEY (`stor_id`),
  ADD KEY `stor_iar_idx` (`iar_no`);

--
-- Indexes for table `ipcrms_content`
--
ALTER TABLE `ipcrms_content`
  ADD PRIMARY KEY (`ipcr_res_id`),
  ADD KEY `perf_res_idx` (`perf_id`),
  ADD KEY `eemp_content_idx` (`emp_no`);

--
-- Indexes for table `ipcrms_kra`
--
ALTER TABLE `ipcrms_kra`
  ADD PRIMARY KEY (`KRA_ID`),
  ADD KEY `KRA_MFO_idx` (`MFO_ID`);

--
-- Indexes for table `ipcrms_mfo`
--
ALTER TABLE `ipcrms_mfo`
  ADD PRIMARY KEY (`MFO_ID`);

--
-- Indexes for table `ipcrms_obj`
--
ALTER TABLE `ipcrms_obj`
  ADD PRIMARY KEY (`obj_id`),
  ADD KEY `OBJ_KRA_idx` (`KRA_ID`);

--
-- Indexes for table `ipcrms_perf_indicator`
--
ALTER TABLE `ipcrms_perf_indicator`
  ADD PRIMARY KEY (`perf_id`),
  ADD KEY `PERF_OBJ_idx` (`OBJ_ID`);

--
-- Indexes for table `ipcrms_rating_period`
--
ALTER TABLE `ipcrms_rating_period`
  ADD PRIMARY KEY (`Rating_ID`),
  ADD KEY `rp_sy_idx` (`sy_id`);

--
-- Indexes for table `ipcrms_records`
--
ALTER TABLE `ipcrms_records`
  ADD PRIMARY KEY (`IPCR_Records_ID`),
  ADD KEY `fk_IPCR_Records_Rating_Period1_idx` (`Rating_ID`),
  ADD KEY `res_rec_idx` (`ipcr_res_id`),
  ADD KEY `rec_emp_idx` (`cms_account_ID`);

--
-- Indexes for table `oes_exam`
--
ALTER TABLE `oes_exam`
  ADD PRIMARY KEY (`exam_no`),
  ADD KEY `sched_exam_idx` (`sched_id`);

--
-- Indexes for table `oes_exam_answer`
--
ALTER TABLE `oes_exam_answer`
  ADD PRIMARY KEY (`answer_no`),
  ADD KEY `con_exam_idx` (`content_no`),
  ADD KEY `lrn_ans_idx` (`lrn`);

--
-- Indexes for table `oes_exam_content`
--
ALTER TABLE `oes_exam_content`
  ADD PRIMARY KEY (`content_no`),
  ADD KEY `content_bank_idx` (`question_no`),
  ADD KEY `con_ans_idx` (`exam_no`);

--
-- Indexes for table `oes_exam_logistics`
--
ALTER TABLE `oes_exam_logistics`
  ADD PRIMARY KEY (`logistic_id`),
  ADD KEY `exam_exam_result_teacher` (`exam_no`);

--
-- Indexes for table `oes_exam_result`
--
ALTER TABLE `oes_exam_result`
  ADD PRIMARY KEY (`res_id`),
  ADD KEY `student_exam_result_student_idx` (`lrn`),
  ADD KEY `exam_exam_result_student` (`exam_no`);

--
-- Indexes for table `oes_question_bank`
--
ALTER TABLE `oes_question_bank`
  ADD PRIMARY KEY (`question_no`),
  ADD KEY `qb_sched_idx` (`sched_id`);

--
-- Indexes for table `oes_ques_enum`
--
ALTER TABLE `oes_ques_enum`
  ADD PRIMARY KEY (`enum_id`),
  ADD KEY `question_bank_ques_enum_idx` (`question_no`);

--
-- Indexes for table `oes_ques_iden`
--
ALTER TABLE `oes_ques_iden`
  ADD PRIMARY KEY (`iden_id`),
  ADD KEY `question_bank_ques_iden_idx` (`question_no`);

--
-- Indexes for table `oes_ques_mulchoice`
--
ALTER TABLE `oes_ques_mulchoice`
  ADD PRIMARY KEY (`mul_id`),
  ADD KEY `question_bank_ques_mulchoice_idx` (`question_no`);

--
-- Indexes for table `pims_credentials`
--
ALTER TABLE `pims_credentials`
  ADD PRIMARY KEY (`cred_id`),
  ADD KEY `cred_emp_rec_idx` (`emp_rec_id`),
  ADD KEY `cred_sub_idx` (`subject_int`);

--
-- Indexes for table `pims_department`
--
ALTER TABLE `pims_department`
  ADD PRIMARY KEY (`dept_ID`);

--
-- Indexes for table `pims_educational_background`
--
ALTER TABLE `pims_educational_background`
  ADD PRIMARY KEY (`ed_back`),
  ADD KEY `emp_No_edbg` (`emp_No`);

--
-- Indexes for table `pims_employment_records`
--
ALTER TABLE `pims_employment_records`
  ADD PRIMARY KEY (`emp_rec_ID`),
  ADD UNIQUE KEY `biometrics_ID_UNIQUE` (`biometric_ID`),
  ADD UNIQUE KEY `complete_item_no_UNIQUE` (`complete_item_no`),
  ADD KEY `dept_ID_idx` (`dept_ID`),
  ADD KEY `jt_emprec_idx` (`job_title_code`),
  ADD KEY `emp_No_emprec` (`emp_No`);

--
-- Indexes for table `pims_family_background`
--
ALTER TABLE `pims_family_background`
  ADD PRIMARY KEY (`fb_ID`),
  ADD UNIQUE KEY `fb_ID_UNIQUE` (`fb_ID`),
  ADD KEY `emp_NO_idx` (`emp_No`);

--
-- Indexes for table `pims_job_title`
--
ALTER TABLE `pims_job_title`
  ADD PRIMARY KEY (`job_title_code`);

--
-- Indexes for table `pims_leave`
--
ALTER TABLE `pims_leave`
  ADD PRIMARY KEY (`leave_ID`),
  ADD KEY `fk_PIMS_LEAVE_PIMS_LEAVE_BALANCE1_idx` (`leave_bal_id`);

--
-- Indexes for table `pims_leave_balance`
--
ALTER TABLE `pims_leave_balance`
  ADD PRIMARY KEY (`leave_bal_ID`),
  ADD UNIQUE KEY `PIMS_LEAVE_BALANCEcol_UNIQUE` (`leave_bal_ID`),
  ADD KEY `emp_No_idx` (`emp_No`);

--
-- Indexes for table `pims_performance_report`
--
ALTER TABLE `pims_performance_report`
  ADD PRIMARY KEY (`perf_rep_id`),
  ADD KEY `fk_PERFORMANCE_REPORT_Personnel1_idx` (`emp_No`);

--
-- Indexes for table `pims_personnel`
--
ALTER TABLE `pims_personnel`
  ADD PRIMARY KEY (`emp_No`),
  ADD UNIQUE KEY `P_Name` (`P_fname`,`P_mname`,`P_lname`);

--
-- Indexes for table `pims_service_records`
--
ALTER TABLE `pims_service_records`
  ADD PRIMARY KEY (`servRec_ID`),
  ADD KEY `sr_emp_rec_idx` (`emp_rec_ID`);

--
-- Indexes for table `pims_timestamp`
--
ALTER TABLE `pims_timestamp`
  ADD PRIMARY KEY (`timestamp_id`),
  ADD KEY `fk_PIMS_TIMESTAMP_PIMS_EMPLOYMENT_RECORDS1_idx` (`emp_rec_ID`);

--
-- Indexes for table `pims_training_programs`
--
ALTER TABLE `pims_training_programs`
  ADD PRIMARY KEY (`training_ID`),
  ADD KEY `emp_No_idx` (`emp_No`);

--
-- Indexes for table `pms_app`
--
ALTER TABLE `pms_app`
  ADD PRIMARY KEY (`plan_con_no`);

--
-- Indexes for table `pms_iar`
--
ALTER TABLE `pms_iar`
  ADD PRIMARY KEY (`iar_no`),
  ADD KEY `po_no_idx` (`po_no`);

--
-- Indexes for table `pms_item`
--
ALTER TABLE `pms_item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `pms_po`
--
ALTER TABLE `pms_po`
  ADD PRIMARY KEY (`po_no`),
  ADD KEY `pr_no_idx` (`pr_no`),
  ADD KEY `po_supplier_idx` (`company_id`);

--
-- Indexes for table `pms_pr`
--
ALTER TABLE `pms_pr`
  ADD PRIMARY KEY (`pr_no`),
  ADD KEY `pr_ris_idx` (`ris_no`),
  ADD KEY `pr_app_idx` (`plan_con_no`);

--
-- Indexes for table `pms_ris`
--
ALTER TABLE `pms_ris`
  ADD PRIMARY KEY (`ris_no`),
  ADD KEY `rs_emp_idx` (`emp_No`),
  ADD KEY `ris_item_idx` (`item_id`);

--
-- Indexes for table `pms_rsmi`
--
ALTER TABLE `pms_rsmi`
  ADD PRIMARY KEY (`rsmi_no`),
  ADD KEY `ris_no_idx` (`ris_no`),
  ADD KEY `rsmi_item_idx` (`item_id`);

--
-- Indexes for table `pms_supplier`
--
ALTER TABLE `pms_supplier`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `prs_charges`
--
ALTER TABLE `prs_charges`
  ADD PRIMARY KEY (`charges_id`),
  ADD KEY `chrges_emp_idx` (`emp_No`);

--
-- Indexes for table `prs_deduction`
--
ALTER TABLE `prs_deduction`
  ADD PRIMARY KEY (`deduction_id`),
  ADD KEY `dd_tax_idx` (`tax_id`),
  ADD KEY `dd_ch_idx` (`charges_id`),
  ADD KEY `dd_loans_idx` (`loan_id`),
  ADD KEY `dd_gsis_idx` (`gsis_id`),
  ADD KEY `ded_emp_idx` (`emp_No`),
  ADD KEY `dd_ph_idx` (`philhealth_id`),
  ADD KEY `dd_pi_idx` (`pagibig_id`);

--
-- Indexes for table `prs_gsis`
--
ALTER TABLE `prs_gsis`
  ADD PRIMARY KEY (`gsis_id`);

--
-- Indexes for table `prs_loan`
--
ALTER TABLE `prs_loan`
  ADD PRIMARY KEY (`loan_id`),
  ADD KEY `loan_emp_idx` (`emp_no`);

--
-- Indexes for table `prs_mtr`
--
ALTER TABLE `prs_mtr`
  ADD PRIMARY KEY (`prs_attendance_id`),
  ADD KEY `mtr_emp_idx` (`emp_No`);

--
-- Indexes for table `prs_pagibig`
--
ALTER TABLE `prs_pagibig`
  ADD PRIMARY KEY (`pagibig_id`);

--
-- Indexes for table `prs_payslip`
--
ALTER TABLE `prs_payslip`
  ADD PRIMARY KEY (`payslip_id`),
  ADD KEY `py_emp_idx` (`emp_No`),
  ADD KEY `py_dd_idx` (`deduction_id`);

--
-- Indexes for table `prs_philhealth`
--
ALTER TABLE `prs_philhealth`
  ADD PRIMARY KEY (`philhealth_id`);

--
-- Indexes for table `prs_report`
--
ALTER TABLE `prs_report`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `rep_emp_idx` (`emp_No`);

--
-- Indexes for table `prs_withholding_tax`
--
ALTER TABLE `prs_withholding_tax`
  ADD PRIMARY KEY (`tax_id`);

--
-- Indexes for table `scms_bmi_rec`
--
ALTER TABLE `scms_bmi_rec`
  ADD PRIMARY KEY (`bmi_no`),
  ADD KEY `rec_account_idx` (`cms_account_ID`);

--
-- Indexes for table `scms_consultation`
--
ALTER TABLE `scms_consultation`
  ADD PRIMARY KEY (`patient_id`),
  ADD KEY `consultation_account_idx` (`cms_account_ID`);

--
-- Indexes for table `scms_content`
--
ALTER TABLE `scms_content`
  ADD PRIMARY KEY (`content_no`);

--
-- Indexes for table `scms_equipment`
--
ALTER TABLE `scms_equipment`
  ADD PRIMARY KEY (`equip_code`);

--
-- Indexes for table `scms_illness`
--
ALTER TABLE `scms_illness`
  ADD PRIMARY KEY (`illness_no`);

--
-- Indexes for table `scms_illness_hist_line`
--
ALTER TABLE `scms_illness_hist_line`
  ADD PRIMARY KEY (`history_no`),
  ADD KEY `illness_illness_hist_line_idx` (`illness_no`),
  ADD KEY `medrec_illness_hist_line_idx` (`medrec_id`);

--
-- Indexes for table `scms_immune_rec_line`
--
ALTER TABLE `scms_immune_rec_line`
  ADD PRIMARY KEY (`rec_no`),
  ADD KEY `medrec_immune_rec_line_idx` (`medrec_id`),
  ADD KEY `immunization_immune_rec_line_idx` (`vaccine_no`);

--
-- Indexes for table `scms_immunization`
--
ALTER TABLE `scms_immunization`
  ADD PRIMARY KEY (`vaccine_no`);

--
-- Indexes for table `scms_medicine`
--
ALTER TABLE `scms_medicine`
  ADD PRIMARY KEY (`med_no`);

--
-- Indexes for table `scms_medrec`
--
ALTER TABLE `scms_medrec`
  ADD PRIMARY KEY (`medrec_id`),
  ADD KEY `medrec_account_idx` (`cms_account_ID`);

--
-- Indexes for table `scms_prescription`
--
ALTER TABLE `scms_prescription`
  ADD PRIMARY KEY (`presc_no`),
  ADD KEY `consultation_prescription_idx` (`patient_id`),
  ADD KEY `medicine_prescription_idx` (`med_no`);

--
-- Indexes for table `scms_supplies`
--
ALTER TABLE `scms_supplies`
  ADD PRIMARY KEY (`supp_no`);

--
-- Indexes for table `sis_attendance`
--
ALTER TABLE `sis_attendance`
  ADD PRIMARY KEY (`attend_id`),
  ADD KEY `attnd_rec_idx` (`rec_id`);

--
-- Indexes for table `sis_grade`
--
ALTER TABLE `sis_grade`
  ADD PRIMARY KEY (`grade_id`),
  ADD KEY `stu_rec_grade_idx` (`rec_id`),
  ADD KEY `sched_grade_idx` (`sched_id`);

--
-- Indexes for table `sis_parent_guardian`
--
ALTER TABLE `sis_parent_guardian`
  ADD PRIMARY KEY (`pg_id`),
  ADD KEY `student_parent_guardian` (`lrn`);

--
-- Indexes for table `sis_sibling`
--
ALTER TABLE `sis_sibling`
  ADD PRIMARY KEY (`sib_id`),
  ADD KEY `student_sibling` (`lrn`);

--
-- Indexes for table `sis_student`
--
ALTER TABLE `sis_student`
  ADD PRIMARY KEY (`lrn`);

--
-- Indexes for table `sis_stu_rec`
--
ALTER TABLE `sis_stu_rec`
  ADD PRIMARY KEY (`rec_id`),
  ADD KEY `student_stu_rec_idx` (`lrn`),
  ADD KEY `school_yr_stu_rec_idx` (`sy_id`),
  ADD KEY `stud_rec_sec_idx` (`section_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cms_account`
--
ALTER TABLE `cms_account`
  MODIFY `cms_account_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `cms_achievement`
--
ALTER TABLE `cms_achievement`
  MODIFY `cms_achievement_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cms_calendar`
--
ALTER TABLE `cms_calendar`
  MODIFY `cms_calendar_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cms_carousel`
--
ALTER TABLE `cms_carousel`
  MODIFY `carousel_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cms_event`
--
ALTER TABLE `cms_event`
  MODIFY `cms_event_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cms_gallery`
--
ALTER TABLE `cms_gallery`
  MODIFY `gallery_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cms_memo`
--
ALTER TABLE `cms_memo`
  MODIFY `cms_memo_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cms_news`
--
ALTER TABLE `cms_news`
  MODIFY `cms_news_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cms_privilege`
--
ALTER TABLE `cms_privilege`
  MODIFY `cms_priv_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `cms_project`
--
ALTER TABLE `cms_project`
  MODIFY `project_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `css_room`
--
ALTER TABLE `css_room`
  MODIFY `ROOM_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `css_schedule`
--
ALTER TABLE `css_schedule`
  MODIFY `SCHED_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `css_school_yr`
--
ALTER TABLE `css_school_yr`
  MODIFY `sy_id` int(15) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `css_section`
--
ALTER TABLE `css_section`
  MODIFY `SECTION_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `css_subject`
--
ALTER TABLE `css_subject`
  MODIFY `subject_int` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dms_document`
--
ALTER TABLE `dms_document`
  MODIFY `doc_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `dms_message`
--
ALTER TABLE `dms_message`
  MODIFY `mes_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `dms_mes_temp`
--
ALTER TABLE `dms_mes_temp`
  MODIFY `temp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dms_pds`
--
ALTER TABLE `dms_pds`
  MODIFY `pds_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dms_receiver`
--
ALTER TABLE `dms_receiver`
  MODIFY `rec_no` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `dms_school_form`
--
ALTER TABLE `dms_school_form`
  MODIFY `sf_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dms_sf1`
--
ALTER TABLE `dms_sf1`
  MODIFY `sf1_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dms_sf5`
--
ALTER TABLE `dms_sf5`
  MODIFY `sf5_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ims_borrow`
--
ALTER TABLE `ims_borrow`
  MODIFY `borrow_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ims_facility`
--
ALTER TABLE `ims_facility`
  MODIFY `fac_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ims_storage`
--
ALTER TABLE `ims_storage`
  MODIFY `stor_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ipcrms_content`
--
ALTER TABLE `ipcrms_content`
  MODIFY `ipcr_res_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ipcrms_kra`
--
ALTER TABLE `ipcrms_kra`
  MODIFY `KRA_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ipcrms_mfo`
--
ALTER TABLE `ipcrms_mfo`
  MODIFY `MFO_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ipcrms_obj`
--
ALTER TABLE `ipcrms_obj`
  MODIFY `obj_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ipcrms_perf_indicator`
--
ALTER TABLE `ipcrms_perf_indicator`
  MODIFY `perf_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ipcrms_rating_period`
--
ALTER TABLE `ipcrms_rating_period`
  MODIFY `Rating_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ipcrms_records`
--
ALTER TABLE `ipcrms_records`
  MODIFY `IPCR_Records_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `oes_exam`
--
ALTER TABLE `oes_exam`
  MODIFY `exam_no` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `oes_exam_answer`
--
ALTER TABLE `oes_exam_answer`
  MODIFY `answer_no` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `oes_exam_content`
--
ALTER TABLE `oes_exam_content`
  MODIFY `content_no` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `oes_exam_logistics`
--
ALTER TABLE `oes_exam_logistics`
  MODIFY `logistic_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `oes_exam_result`
--
ALTER TABLE `oes_exam_result`
  MODIFY `res_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `oes_question_bank`
--
ALTER TABLE `oes_question_bank`
  MODIFY `question_no` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `oes_ques_enum`
--
ALTER TABLE `oes_ques_enum`
  MODIFY `enum_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `oes_ques_iden`
--
ALTER TABLE `oes_ques_iden`
  MODIFY `iden_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `oes_ques_mulchoice`
--
ALTER TABLE `oes_ques_mulchoice`
  MODIFY `mul_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pims_credentials`
--
ALTER TABLE `pims_credentials`
  MODIFY `cred_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pims_department`
--
ALTER TABLE `pims_department`
  MODIFY `dept_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pims_educational_background`
--
ALTER TABLE `pims_educational_background`
  MODIFY `ed_back` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pims_employment_records`
--
ALTER TABLE `pims_employment_records`
  MODIFY `emp_rec_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pims_family_background`
--
ALTER TABLE `pims_family_background`
  MODIFY `fb_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pims_leave`
--
ALTER TABLE `pims_leave`
  MODIFY `leave_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pims_leave_balance`
--
ALTER TABLE `pims_leave_balance`
  MODIFY `leave_bal_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pims_performance_report`
--
ALTER TABLE `pims_performance_report`
  MODIFY `perf_rep_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pims_personnel`
--
ALTER TABLE `pims_personnel`
  MODIFY `emp_No` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pims_service_records`
--
ALTER TABLE `pims_service_records`
  MODIFY `servRec_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `pims_timestamp`
--
ALTER TABLE `pims_timestamp`
  MODIFY `timestamp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pims_training_programs`
--
ALTER TABLE `pims_training_programs`
  MODIFY `training_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pms_app`
--
ALTER TABLE `pms_app`
  MODIFY `plan_con_no` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pms_iar`
--
ALTER TABLE `pms_iar`
  MODIFY `iar_no` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pms_item`
--
ALTER TABLE `pms_item`
  MODIFY `item_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pms_pr`
--
ALTER TABLE `pms_pr`
  MODIFY `pr_no` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pms_ris`
--
ALTER TABLE `pms_ris`
  MODIFY `ris_no` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pms_rsmi`
--
ALTER TABLE `pms_rsmi`
  MODIFY `rsmi_no` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pms_supplier`
--
ALTER TABLE `pms_supplier`
  MODIFY `company_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prs_charges`
--
ALTER TABLE `prs_charges`
  MODIFY `charges_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prs_deduction`
--
ALTER TABLE `prs_deduction`
  MODIFY `deduction_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prs_gsis`
--
ALTER TABLE `prs_gsis`
  MODIFY `gsis_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prs_loan`
--
ALTER TABLE `prs_loan`
  MODIFY `loan_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prs_mtr`
--
ALTER TABLE `prs_mtr`
  MODIFY `prs_attendance_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prs_pagibig`
--
ALTER TABLE `prs_pagibig`
  MODIFY `pagibig_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prs_payslip`
--
ALTER TABLE `prs_payslip`
  MODIFY `payslip_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prs_philhealth`
--
ALTER TABLE `prs_philhealth`
  MODIFY `philhealth_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prs_report`
--
ALTER TABLE `prs_report`
  MODIFY `report_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prs_withholding_tax`
--
ALTER TABLE `prs_withholding_tax`
  MODIFY `tax_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `scms_bmi_rec`
--
ALTER TABLE `scms_bmi_rec`
  MODIFY `bmi_no` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `scms_consultation`
--
ALTER TABLE `scms_consultation`
  MODIFY `patient_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `scms_content`
--
ALTER TABLE `scms_content`
  MODIFY `content_no` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `scms_illness`
--
ALTER TABLE `scms_illness`
  MODIFY `illness_no` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `scms_illness_hist_line`
--
ALTER TABLE `scms_illness_hist_line`
  MODIFY `history_no` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `scms_immune_rec_line`
--
ALTER TABLE `scms_immune_rec_line`
  MODIFY `rec_no` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `scms_immunization`
--
ALTER TABLE `scms_immunization`
  MODIFY `vaccine_no` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `scms_medicine`
--
ALTER TABLE `scms_medicine`
  MODIFY `med_no` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `scms_medrec`
--
ALTER TABLE `scms_medrec`
  MODIFY `medrec_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `scms_prescription`
--
ALTER TABLE `scms_prescription`
  MODIFY `presc_no` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `scms_supplies`
--
ALTER TABLE `scms_supplies`
  MODIFY `supp_no` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sis_attendance`
--
ALTER TABLE `sis_attendance`
  MODIFY `attend_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sis_grade`
--
ALTER TABLE `sis_grade`
  MODIFY `grade_id` int(15) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sis_parent_guardian`
--
ALTER TABLE `sis_parent_guardian`
  MODIFY `pg_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sis_sibling`
--
ALTER TABLE `sis_sibling`
  MODIFY `sib_id` int(15) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sis_student`
--
ALTER TABLE `sis_student`
  MODIFY `lrn` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=555556;
--
-- AUTO_INCREMENT for table `sis_stu_rec`
--
ALTER TABLE `sis_stu_rec`
  MODIFY `rec_id` int(15) UNSIGNED NOT NULL AUTO_INCREMENT;
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
-- Constraints for table `cms_gallery`
--
ALTER TABLE `cms_gallery`
  ADD CONSTRAINT `gal_acc` FOREIGN KEY (`cms_account_ID`) REFERENCES `cms_account` (`cms_account_ID`) ON UPDATE CASCADE;

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
-- Constraints for table `css_schedule`
--
ALTER TABLE `css_schedule`
  ADD CONSTRAINT `sched_emp` FOREIGN KEY (`emp_rec_id`) REFERENCES `pims_employment_records` (`emp_rec_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sched_sub` FOREIGN KEY (`subject_id`) REFERENCES `css_subject` (`subject_int`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sched_sy` FOREIGN KEY (`sy_id`) REFERENCES `css_school_yr` (`sy_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`SECTION_ID`) REFERENCES `css_section` (`SECTION_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `css_section`
--
ALTER TABLE `css_section`
  ADD CONSTRAINT `sec_emp1` FOREIGN KEY (`emp_rec_id`) REFERENCES `pims_employment_records` (`emp_rec_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `section_ibfk_2` FOREIGN KEY (`ROOM_ID`) REFERENCES `css_room` (`ROOM_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `dms_document`
--
ALTER TABLE `dms_document`
  ADD CONSTRAINT `emp_doc` FOREIGN KEY (`emp_no`) REFERENCES `pims_personnel` (`emp_No`) ON UPDATE CASCADE;

--
-- Constraints for table `dms_message`
--
ALTER TABLE `dms_message`
  ADD CONSTRAINT `account_mes` FOREIGN KEY (`cms_account_id`) REFERENCES `cms_account` (`cms_account_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `doc_mes` FOREIGN KEY (`doc_id`) REFERENCES `dms_document` (`doc_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rec_mes` FOREIGN KEY (`rec_no`) REFERENCES `dms_receiver` (`rec_no`) ON UPDATE CASCADE,
  ADD CONSTRAINT `temp_mes` FOREIGN KEY (`temp_id`) REFERENCES `dms_mes_temp` (`temp_id`) ON UPDATE CASCADE;

--
-- Constraints for table `dms_pds`
--
ALTER TABLE `dms_pds`
  ADD CONSTRAINT `pds_ed_back` FOREIGN KEY (`emp_rec_id`) REFERENCES `pims_employment_records` (`emp_rec_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pds_emp` FOREIGN KEY (`ed_back`) REFERENCES `pims_educational_background` (`ed_back`) ON UPDATE CASCADE;

--
-- Constraints for table `dms_receiver`
--
ALTER TABLE `dms_receiver`
  ADD CONSTRAINT `rec_account11` FOREIGN KEY (`cms_account_id`) REFERENCES `cms_account` (`cms_account_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `dms_school_form`
--
ALTER TABLE `dms_school_form`
  ADD CONSTRAINT `sf_1` FOREIGN KEY (`sf1_id`) REFERENCES `dms_sf1` (`sf1_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sf_5` FOREIGN KEY (`sf5_id`) REFERENCES `dms_sf5` (`sf5_id`) ON UPDATE CASCADE;

--
-- Constraints for table `dms_sf1`
--
ALTER TABLE `dms_sf1`
  ADD CONSTRAINT `sf1_stud` FOREIGN KEY (`rec_id`) REFERENCES `sis_stu_rec` (`rec_id`) ON UPDATE CASCADE;

--
-- Constraints for table `dms_sf5`
--
ALTER TABLE `dms_sf5`
  ADD CONSTRAINT `sf5_grade` FOREIGN KEY (`grade_id`) REFERENCES `sis_grade` (`grade_id`) ON UPDATE CASCADE;

--
-- Constraints for table `ims_borrow`
--
ALTER TABLE `ims_borrow`
  ADD CONSTRAINT `bor_emp` FOREIGN KEY (`emp_no`) REFERENCES `pims_personnel` (`emp_No`) ON UPDATE CASCADE,
  ADD CONSTRAINT `bor_stor` FOREIGN KEY (`stor_id`) REFERENCES `ims_storage` (`stor_id`) ON UPDATE CASCADE;

--
-- Constraints for table `ims_storage`
--
ALTER TABLE `ims_storage`
  ADD CONSTRAINT `stor_iar` FOREIGN KEY (`iar_no`) REFERENCES `pms_iar` (`iar_no`) ON UPDATE CASCADE;

--
-- Constraints for table `ipcrms_content`
--
ALTER TABLE `ipcrms_content`
  ADD CONSTRAINT `eemp_content` FOREIGN KEY (`emp_no`) REFERENCES `pims_personnel` (`emp_No`) ON UPDATE CASCADE,
  ADD CONSTRAINT `perf_res` FOREIGN KEY (`perf_id`) REFERENCES `ipcrms_perf_indicator` (`perf_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ipcrms_kra`
--
ALTER TABLE `ipcrms_kra`
  ADD CONSTRAINT `KRA_MFO` FOREIGN KEY (`MFO_ID`) REFERENCES `ipcrms_mfo` (`MFO_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ipcrms_obj`
--
ALTER TABLE `ipcrms_obj`
  ADD CONSTRAINT `OBJ_KRA` FOREIGN KEY (`KRA_ID`) REFERENCES `ipcrms_kra` (`KRA_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `ipcrms_perf_indicator`
--
ALTER TABLE `ipcrms_perf_indicator`
  ADD CONSTRAINT `PERF_OBJ` FOREIGN KEY (`OBJ_ID`) REFERENCES `ipcrms_obj` (`obj_id`) ON UPDATE CASCADE;

--
-- Constraints for table `ipcrms_rating_period`
--
ALTER TABLE `ipcrms_rating_period`
  ADD CONSTRAINT `rp_sy` FOREIGN KEY (`sy_id`) REFERENCES `css_school_yr` (`sy_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ipcrms_records`
--
ALTER TABLE `ipcrms_records`
  ADD CONSTRAINT `fk_IPCR_Records_Rating_Period1` FOREIGN KEY (`Rating_ID`) REFERENCES `ipcrms_rating_period` (`Rating_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rec_emp` FOREIGN KEY (`cms_account_ID`) REFERENCES `cms_account` (`cms_account_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `res_rec` FOREIGN KEY (`ipcr_res_id`) REFERENCES `ipcrms_content` (`ipcr_res_id`) ON UPDATE CASCADE;

--
-- Constraints for table `oes_exam`
--
ALTER TABLE `oes_exam`
  ADD CONSTRAINT `sched_exam` FOREIGN KEY (`sched_id`) REFERENCES `css_schedule` (`SCHED_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `oes_exam_answer`
--
ALTER TABLE `oes_exam_answer`
  ADD CONSTRAINT `con_ans` FOREIGN KEY (`content_no`) REFERENCES `oes_exam_content` (`content_no`) ON UPDATE CASCADE,
  ADD CONSTRAINT `lrn_ans11` FOREIGN KEY (`lrn`) REFERENCES `sis_student` (`lrn`) ON UPDATE CASCADE;

--
-- Constraints for table `oes_exam_content`
--
ALTER TABLE `oes_exam_content`
  ADD CONSTRAINT `con_exam` FOREIGN KEY (`exam_no`) REFERENCES `oes_exam` (`exam_no`) ON UPDATE CASCADE,
  ADD CONSTRAINT `content_bank` FOREIGN KEY (`question_no`) REFERENCES `oes_question_bank` (`question_no`) ON UPDATE CASCADE;

--
-- Constraints for table `oes_exam_logistics`
--
ALTER TABLE `oes_exam_logistics`
  ADD CONSTRAINT `exam_exam_result_teacher` FOREIGN KEY (`exam_no`) REFERENCES `oes_exam` (`exam_no`) ON UPDATE CASCADE;

--
-- Constraints for table `oes_exam_result`
--
ALTER TABLE `oes_exam_result`
  ADD CONSTRAINT `exam_exam_result_student` FOREIGN KEY (`exam_no`) REFERENCES `oes_exam` (`exam_no`) ON UPDATE CASCADE,
  ADD CONSTRAINT `student_exam_result_student` FOREIGN KEY (`lrn`) REFERENCES `sis_student` (`lrn`) ON UPDATE CASCADE;

--
-- Constraints for table `oes_question_bank`
--
ALTER TABLE `oes_question_bank`
  ADD CONSTRAINT `qb_sched` FOREIGN KEY (`sched_id`) REFERENCES `css_schedule` (`SCHED_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `oes_ques_enum`
--
ALTER TABLE `oes_ques_enum`
  ADD CONSTRAINT `question_bank_ques_enum` FOREIGN KEY (`question_no`) REFERENCES `oes_question_bank` (`question_no`) ON UPDATE CASCADE;

--
-- Constraints for table `oes_ques_iden`
--
ALTER TABLE `oes_ques_iden`
  ADD CONSTRAINT `question_bank_ques_iden` FOREIGN KEY (`question_no`) REFERENCES `oes_question_bank` (`question_no`) ON UPDATE CASCADE;

--
-- Constraints for table `oes_ques_mulchoice`
--
ALTER TABLE `oes_ques_mulchoice`
  ADD CONSTRAINT `question_bank_ques_mulchoice` FOREIGN KEY (`question_no`) REFERENCES `oes_question_bank` (`question_no`) ON UPDATE CASCADE;

--
-- Constraints for table `pims_credentials`
--
ALTER TABLE `pims_credentials`
  ADD CONSTRAINT `cred_emp_rec` FOREIGN KEY (`emp_rec_id`) REFERENCES `pims_employment_records` (`emp_rec_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cred_sub` FOREIGN KEY (`subject_int`) REFERENCES `css_subject` (`subject_int`) ON UPDATE CASCADE;

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
-- Constraints for table `pms_iar`
--
ALTER TABLE `pms_iar`
  ADD CONSTRAINT `po_no` FOREIGN KEY (`po_no`) REFERENCES `pms_po` (`po_no`) ON UPDATE CASCADE;

--
-- Constraints for table `pms_po`
--
ALTER TABLE `pms_po`
  ADD CONSTRAINT `po_pr` FOREIGN KEY (`pr_no`) REFERENCES `pms_pr` (`pr_no`) ON UPDATE CASCADE,
  ADD CONSTRAINT `po_supplier` FOREIGN KEY (`company_id`) REFERENCES `pms_supplier` (`company_id`) ON UPDATE CASCADE;

--
-- Constraints for table `pms_pr`
--
ALTER TABLE `pms_pr`
  ADD CONSTRAINT `pr_app` FOREIGN KEY (`plan_con_no`) REFERENCES `pms_app` (`plan_con_no`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pr_ris` FOREIGN KEY (`ris_no`) REFERENCES `pms_ris` (`ris_no`) ON UPDATE CASCADE;

--
-- Constraints for table `pms_ris`
--
ALTER TABLE `pms_ris`
  ADD CONSTRAINT `ris_item` FOREIGN KEY (`item_id`) REFERENCES `pms_item` (`item_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rs_emp` FOREIGN KEY (`emp_No`) REFERENCES `pims_personnel` (`emp_No`) ON UPDATE CASCADE;

--
-- Constraints for table `pms_rsmi`
--
ALTER TABLE `pms_rsmi`
  ADD CONSTRAINT `rsmi_item` FOREIGN KEY (`item_id`) REFERENCES `pms_item` (`item_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rsmi_ris` FOREIGN KEY (`ris_no`) REFERENCES `pms_ris` (`ris_no`);

--
-- Constraints for table `prs_charges`
--
ALTER TABLE `prs_charges`
  ADD CONSTRAINT `chrges_emp` FOREIGN KEY (`emp_No`) REFERENCES `pims_personnel` (`emp_No`) ON UPDATE CASCADE;

--
-- Constraints for table `prs_deduction`
--
ALTER TABLE `prs_deduction`
  ADD CONSTRAINT `dd_ch` FOREIGN KEY (`charges_id`) REFERENCES `prs_charges` (`charges_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `dd_gsis` FOREIGN KEY (`gsis_id`) REFERENCES `prs_gsis` (`gsis_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dd_loans` FOREIGN KEY (`loan_id`) REFERENCES `prs_loan` (`loan_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `dd_ph` FOREIGN KEY (`philhealth_id`) REFERENCES `prs_philhealth` (`philhealth_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dd_pi` FOREIGN KEY (`pagibig_id`) REFERENCES `prs_pagibig` (`pagibig_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dd_tax` FOREIGN KEY (`tax_id`) REFERENCES `prs_withholding_tax` (`tax_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ded_emp` FOREIGN KEY (`emp_No`) REFERENCES `pims_personnel` (`emp_No`) ON UPDATE CASCADE;

--
-- Constraints for table `prs_loan`
--
ALTER TABLE `prs_loan`
  ADD CONSTRAINT `loan_emp` FOREIGN KEY (`emp_no`) REFERENCES `pims_personnel` (`emp_No`) ON UPDATE CASCADE;

--
-- Constraints for table `prs_mtr`
--
ALTER TABLE `prs_mtr`
  ADD CONSTRAINT `mtr_emp` FOREIGN KEY (`emp_No`) REFERENCES `pims_personnel` (`emp_No`) ON UPDATE CASCADE;

--
-- Constraints for table `prs_payslip`
--
ALTER TABLE `prs_payslip`
  ADD CONSTRAINT `py_dd` FOREIGN KEY (`deduction_id`) REFERENCES `prs_deduction` (`deduction_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `py_emp` FOREIGN KEY (`emp_No`) REFERENCES `pims_personnel` (`emp_No`) ON UPDATE CASCADE;

--
-- Constraints for table `prs_report`
--
ALTER TABLE `prs_report`
  ADD CONSTRAINT `rep_emp` FOREIGN KEY (`emp_No`) REFERENCES `pims_personnel` (`emp_No`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `scms_bmi_rec`
--
ALTER TABLE `scms_bmi_rec`
  ADD CONSTRAINT `rec_account` FOREIGN KEY (`cms_account_ID`) REFERENCES `cms_account` (`cms_account_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `scms_consultation`
--
ALTER TABLE `scms_consultation`
  ADD CONSTRAINT `consultation_account` FOREIGN KEY (`cms_account_ID`) REFERENCES `cms_account` (`cms_account_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `scms_illness_hist_line`
--
ALTER TABLE `scms_illness_hist_line`
  ADD CONSTRAINT `illness_illness_hist_line` FOREIGN KEY (`illness_no`) REFERENCES `scms_illness` (`illness_no`) ON UPDATE CASCADE,
  ADD CONSTRAINT `medrec_illness_hist_line` FOREIGN KEY (`medrec_id`) REFERENCES `scms_medrec` (`medrec_id`) ON UPDATE CASCADE;

--
-- Constraints for table `scms_immune_rec_line`
--
ALTER TABLE `scms_immune_rec_line`
  ADD CONSTRAINT `immunization_immune_rec_line` FOREIGN KEY (`vaccine_no`) REFERENCES `scms_immunization` (`vaccine_no`) ON UPDATE CASCADE,
  ADD CONSTRAINT `medrec_immune_rec_line` FOREIGN KEY (`medrec_id`) REFERENCES `scms_medrec` (`medrec_id`) ON UPDATE CASCADE;

--
-- Constraints for table `scms_medrec`
--
ALTER TABLE `scms_medrec`
  ADD CONSTRAINT `medrec_account` FOREIGN KEY (`cms_account_ID`) REFERENCES `cms_account` (`cms_account_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `scms_prescription`
--
ALTER TABLE `scms_prescription`
  ADD CONSTRAINT `consultation_prescription` FOREIGN KEY (`patient_id`) REFERENCES `scms_consultation` (`patient_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `medicine_prescription` FOREIGN KEY (`med_no`) REFERENCES `scms_medicine` (`med_no`) ON UPDATE CASCADE;

--
-- Constraints for table `sis_attendance`
--
ALTER TABLE `sis_attendance`
  ADD CONSTRAINT `attnd_rec` FOREIGN KEY (`rec_id`) REFERENCES `sis_stu_rec` (`rec_id`) ON UPDATE CASCADE;

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
-- Constraints for table `sis_sibling`
--
ALTER TABLE `sis_sibling`
  ADD CONSTRAINT `student_sibling` FOREIGN KEY (`lrn`) REFERENCES `sis_student` (`lrn`) ON UPDATE CASCADE;

--
-- Constraints for table `sis_stu_rec`
--
ALTER TABLE `sis_stu_rec`
  ADD CONSTRAINT `school_yr_stu_rec` FOREIGN KEY (`sy_id`) REFERENCES `css_school_yr` (`sy_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `stud_rec_sec` FOREIGN KEY (`section_id`) REFERENCES `css_section` (`SECTION_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `student_stu_rec` FOREIGN KEY (`lrn`) REFERENCES `sis_student` (`lrn`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
