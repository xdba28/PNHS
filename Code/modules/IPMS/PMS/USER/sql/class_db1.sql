-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2017 at 11:22 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `class_db1`
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
(6, NULL, 'Mark', 'Jerly', 'Bundalian', NULL, 'mark@gmail.com', 'Female', 27, '2017-09-12', 'Tandang Sora', 58, 'Em\'s', 'Legazpi', 'Albay', 4501, 'Tandang Sora', 58, 'Em\'s', 'Legazpi', 'Albay', 4501, 'Filipino', 'A', 'Single', 'Roman Catolic', '', '0923567', '7654'),
(7, NULL, 'Reinz', 'Cruz', 'Yap', NULL, 'reinz@gmail.com', 'Male', 30, '1997-09-13', 'Bonifacio', 21, 'Inarado', 'Daraga', 'Albay', 4501, 'Bonifacio', 21, 'Inarado', 'Daraga', 'Albay', 4501, 'Filipino', 'A', 'Single', 'Roman Catholic', '', '09764562', '6548'),
(8, NULL, 'Vicente', 'Lim', 'Embudo', NULL, 'vince@gmail.com', 'Male', 32, '1997-09-21', 'Mabini', 45, 'Cruzada', 'Legazpi City', 'Albay', 4500, 'Mabini', 45, 'Cruzada', 'Legazpi City', 'Albay', 4500, 'Filipino', 'O', 'Single', 'Roman Catholic', '', '0965256', '346'),
(9, NULL, 'Shiena', 'Malla', 'Occidental', NULL, 'shiena@gmail.com', 'Female', 21, '1996-07-23', 'Imperial', 23, 'Poblacion', 'Guinobatan', 'Albay', 4503, 'Imperial', 23, 'Poblacion', 'Guinobatan', 'Albay', 4503, 'Filipino', 'O', 'Single', 'Roman Catholic', '', '097654', '2345'),
(10, NULL, 'Christine', 'Revilla', 'Arroz', NULL, 'christine@gmail.com', 'Female', 21, '1996-04-13', 'Rizal', 45, 'Bascaran', 'Guinobatan', 'Albay', 4503, 'Rizal', 45, 'Bascaran', 'Guinobatan', 'Albay', 4503, 'Filipino', 'AB', 'Single', 'Roman Catholic', '', '0965433', '9087654'),
(11, NULL, 'Jenevilyn', NULL, 'Recato', NULL, 'jene@gmail.com', 'Female', 20, '2017-08-09', 'Bonifacio', 21, 'Basud', 'Guinobatan', 'Albay', 4503, 'Bonifacio', 21, 'Basud', 'Guinobatan', 'Albay', 4503, 'Filipino', 'O', 'Married', 'Roman Catholic', '', '096532', '65432');

-- --------------------------------------------------------

--
-- Table structure for table `pms_app`
--

CREATE TABLE `pms_app` (
  `plan_con_no` int(11) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `app_qty` int(10) UNSIGNED DEFAULT NULL,
  `app_unit` varchar(11) NOT NULL,
  `total_cost` double NOT NULL,
  `app_quarter` enum('1st','2nd','3rd','4th') NOT NULL,
  `stor_status` enum('1','0') NOT NULL DEFAULT '0',
  `quarter_cost` double NOT NULL,
  `quarter_qty` int(10) UNSIGNED NOT NULL,
  `quarter_amt` double NOT NULL,
  `app_type` enum('Primary','Suppplementary') DEFAULT NULL,
  `unit_cost` varchar(45) DEFAULT NULL,
  `q1_qty` int(11) UNSIGNED NOT NULL,
  `q1_amt` double NOT NULL,
  `q2_qty` int(11) UNSIGNED NOT NULL,
  `q2_amt` double NOT NULL,
  `q3_qty` int(10) UNSIGNED NOT NULL,
  `q3_amt` double NOT NULL,
  `q4_qty` int(10) UNSIGNED NOT NULL,
  `q4_amt` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pms_app`
--

INSERT INTO `pms_app` (`plan_con_no`, `item_id`, `app_qty`, `app_unit`, `total_cost`, `app_quarter`, `stor_status`, `quarter_cost`, `quarter_qty`, `quarter_amt`, `app_type`, `unit_cost`, `q1_qty`, `q1_amt`, `q2_qty`, `q2_amt`, `q3_qty`, `q3_amt`, `q4_qty`, `q4_amt`) VALUES
(1, 1, 100, 'Ream', 15000, '1st', '0', 20000, 100, 5000, 'Primary', '200', 25, 5000, 25, 5000, 25, 5000, 25, 5000),
(2, 2, 4000, 'Box', 4000, '2nd', '0', 1000, 20, 1000, 'Primary', '50', 20, 1000, 20, 1000, 20, 1000, 20, 1000),
(3, 3, 10000, 'Can', 10000, '3rd', '0', 2500, 5, 2500, 'Primary', '500', 5, 2500, 5, 2500, 5, 2500, 5, 2500),
(4, 4, 2000, 'Piece', 20000, '4th', '0', 5000, 10, 5000, 'Primary', '500', 10, 5000, 10, 5000, 10, 5000, 10, 5000),
(5, 5, 15000, 'Unit', 15000, '3rd', '0', 3750, 5, 3750, 'Primary', '750', 5, 3750, 5, 3750, 5, 3750, 5, 3750),
(6, 6, 1200, 'Unit', 1200, '2nd', '0', 300, 5, 300, 'Primary', '60', 5, 300, 5, 300, 5, 300, 5, 300),
(7, 7, 10000, 'Box', 10000, '2nd', '0', 100, 10, 250, 'Primary', '250', 10, 2500, 10, 2500, 10, 2500, 10, 2500),
(8, 8, 3000, 'Roll', 3000, '2nd', '0', 750, 12, 750, 'Primary', '62.50', 12, 750, 12, 750, 12, 750, 12, 750),
(9, 9, 15000, 'Box', 15000, '4th', '0', 3750, 20, 3750, 'Primary', '187.50', 20, 3750, 20, 3750, 20, 3750, 20, 3750);

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

--
-- Dumping data for table `pms_iar`
--

INSERT INTO `pms_iar` (`iar_no`, `po_no`, `iar_status`, `received_date`, `iar_qty`) VALUES
(1, 10, 'Complete', '2017-10-04', NULL),
(2, 1, 'Partial', '2017-08-01', NULL),
(3, 2, 'Partial', '2017-08-17', NULL),
(4, 3, 'Complete', '2017-08-17', NULL),
(5, 4, 'Complete', '2017-08-08', NULL),
(6, 5, 'Complete', '2017-08-08', NULL),
(7, 6, 'Complete', '2017-08-06', NULL),
(8, 7, 'Complete', '2017-08-15', NULL),
(9, 8, 'Partial', '2017-06-05', NULL),
(10, 9, 'Partial', '2017-08-08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pms_item`
--

CREATE TABLE `pms_item` (
  `item_id` int(10) UNSIGNED NOT NULL,
  `item_name` varchar(45) NOT NULL,
  `item_des` varchar(45) NOT NULL,
  `item_unit` varchar(25) NOT NULL,
  `item_type` enum('Janitorial','I.T.','Hardware','Electtrical','Sports','Clinic','Common') DEFAULT NULL,
  `equipment` enum('1','0') DEFAULT NULL,
  `supply` enum('1','0') DEFAULT NULL,
  `status` enum('Available','For Procurement') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pms_item`
--

INSERT INTO `pms_item` (`item_id`, `item_name`, `item_des`, `item_unit`, `item_type`, `equipment`, `supply`, `status`) VALUES
(1, 'Bond Paper', 'Long', 'Ream', 'Janitorial', '0', '1', 'Available'),
(2, 'Soap', 'Bath', 'Box', 'Janitorial', '0', '1', 'Available'),
(3, 'Spray Paint', '400cc, asstd color', 'Can', 'Hardware', '0', '1', 'Available'),
(4, 'Flashdrive', '16gb', 'Piece', 'I.T.', '0', '1', 'Available'),
(5, 'Printer Ink', 'Epson L210,T6642, Cyan', 'Unit', 'I.T.', '1', '0', 'Available'),
(6, 'Printer Ribbon', 'LX300', 'Unit', 'I.T.', '1', '0', 'Available'),
(7, 'Alcohol', 'Isoprophyl, 500ml', 'Box', 'Clinic', '0', '1', 'Available'),
(8, 'Sand paper', 'Sand', 'Roll', 'Hardware', '0', '1', 'Available'),
(9, 'Toilet Bowl Cleaner', 'Powder', 'Box', 'Janitorial', '0', '1', 'Available'),
(10, 'Basketball', 'Round ball', 'Piece', 'Sports', '1', '0', 'Available'),
(11, 'Ballpen', 'Red', 'Box', 'Common', '0', '1', 'Available'),
(12, 'Cotton', '45 mg', 'Piece', 'Clinic', '0', '1', ''),
(13, 'Cartolina', 'Assorted Color', 'Roll', 'Common', '0', '1', ''),
(14, 'Cartolina', 'White', 'Roll', 'Common', '0', '1', 'Available'),
(15, 'Detergent Soap', 'Powder', 'Piece', 'Janitorial', '0', '1', 'Available'),
(16, 'Printer Ink ', 'Black', 'Piece', 'I.T.', '0', '1', 'Available'),
(17, 'Printer Ink', 'Magenta', 'Piece', 'I.T.', '0', '1', 'Available'),
(18, 'Printer Ink', 'Cyan', 'Piece', 'I.T.', '0', '1', 'Available'),
(19, 'Printer', 'Canon', 'Unit', 'I.T.', '1', '0', 'Available'),
(20, 'Floorwax', 'Red Dye', 'Box', 'Janitorial', '0', '1', ''),
(21, 'Chalk', 'Colored', 'Box', NULL, NULL, NULL, 'For Procurement');

-- --------------------------------------------------------

--
-- Table structure for table `pms_po`
--

CREATE TABLE `pms_po` (
  `po_no` int(10) UNSIGNED NOT NULL,
  `pr_no` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED DEFAULT NULL,
  `po_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pms_po`
--

INSERT INTO `pms_po` (`po_no`, `pr_no`, `company_id`, `po_date`) VALUES
(1, 1, 9, '2017-07-03'),
(2, 2, 8, '2017-07-17'),
(3, 3, 2, '2017-08-25'),
(4, 4, 6, '2017-07-04'),
(5, 5, 1, '2017-07-25'),
(6, 6, 7, '2017-10-01'),
(7, 7, 5, '2017-07-03'),
(8, 8, 4, '2017-08-06'),
(9, 9, 6, '2017-07-08'),
(10, 10, 8, '2017-08-15');

-- --------------------------------------------------------

--
-- Table structure for table `pms_pr`
--

CREATE TABLE `pms_pr` (
  `pr_no` int(10) UNSIGNED NOT NULL,
  `emp_no` int(10) UNSIGNED NOT NULL,
  `plan_con_no` int(10) UNSIGNED DEFAULT NULL,
  `pr_date` date NOT NULL,
  `trans_id` int(10) UNSIGNED NOT NULL,
  `est_unit_cost` double NOT NULL,
  `est_cost` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pms_pr`
--

INSERT INTO `pms_pr` (`pr_no`, `emp_no`, `plan_con_no`, `pr_date`, `trans_id`, `est_unit_cost`, `est_cost`) VALUES
(1, 1, 2, '2017-08-01', 1, 0, 0),
(2, 2, 7, '2017-08-08', 2, 0, 0),
(3, 3, 9, '2017-08-01', 3, 0, 0),
(4, 4, 3, '2017-08-08', 4, 0, 0),
(5, 5, 4, '2017-10-25', 5, 0, 0),
(6, 6, 1, '2017-08-17', 6, 0, 0),
(7, 7, 8, '0000-00-00', 7, 0, 0),
(8, 8, 5, '2017-07-10', 8, 0, 0),
(9, 9, 6, '2017-10-01', 9, 0, 0),
(10, 10, 8, '2017-10-01', 10, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pms_ris`
--

CREATE TABLE `pms_ris` (
  `ris_no` int(10) UNSIGNED NOT NULL,
  `emp_No` int(10) UNSIGNED DEFAULT NULL,
  `rqst_date` date DEFAULT NULL,
  `iss_date` date DEFAULT NULL,
  `status` enum('For Procurement','Available') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pms_ris`
--

INSERT INTO `pms_ris` (`ris_no`, `emp_No`, `rqst_date`, `iss_date`, `status`) VALUES
(1, 1, '2017-10-07', NULL, 'Available'),
(2, 1, '2017-10-07', NULL, 'Available'),
(3, 1, '2017-10-07', NULL, 'Available'),
(4, 1, '2017-10-07', NULL, 'Available'),
(5, 1, '2017-10-07', NULL, 'Available'),
(6, 1, '2017-10-07', NULL, 'Available'),
(7, 1, '2017-10-07', NULL, 'Available'),
(8, 1, '2017-10-07', NULL, 'Available'),
(9, 1, '2017-10-07', NULL, 'Available'),
(10, 1, '2017-10-07', NULL, 'Available'),
(11, 1, '2017-10-08', NULL, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `pms_ris_request`
--

CREATE TABLE `pms_ris_request` (
  `trans_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(100) UNSIGNED NOT NULL,
  `ris_no` int(100) UNSIGNED NOT NULL,
  `rqst_qty` int(100) UNSIGNED NOT NULL,
  `iss_qty` int(100) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pms_ris_request`
--

INSERT INTO `pms_ris_request` (`trans_id`, `item_id`, `ris_no`, `rqst_qty`, `iss_qty`) VALUES
(1, 3, 1, 3, 3),
(2, 4, 1, 2, 2),
(3, 2, 2, 3, 3),
(4, 3, 2, 2, 2),
(5, 2, 3, 3, 3),
(6, 3, 3, 2, 2),
(7, 3, 4, 8, 8),
(8, 4, 4, 8, 8),
(9, 5, 4, 8, 8),
(10, 3, 5, 8, 8),
(11, 4, 5, 8, 8),
(12, 5, 5, 8, 8),
(13, 3, 6, 8, 8),
(14, 4, 6, 8, 8),
(15, 5, 6, 8, 8),
(16, 5, 7, 5, 5),
(17, 6, 7, 7, 7),
(18, 5, 8, 5, 5),
(19, 6, 8, 7, 7),
(20, 2, 9, 1, 1),
(21, 3, 9, 0, 0),
(24, 3, 10, 1, 1),
(25, 4, 10, 2, 2),
(26, 21, 11, 12, 12);

-- --------------------------------------------------------

--
-- Table structure for table `pms_rsmi`
--

CREATE TABLE `pms_rsmi` (
  `rsmi_no` int(10) UNSIGNED NOT NULL,
  `ris_no` int(10) UNSIGNED NOT NULL,
  `iss_qty` int(10) UNSIGNED DEFAULT NULL,
  `iss_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pms_rsmi`
--

INSERT INTO `pms_rsmi` (`rsmi_no`, `ris_no`, `iss_qty`, `iss_date`) VALUES
(1, 1, NULL, '2017-07-17'),
(2, 9, NULL, '2017-08-08'),
(3, 8, NULL, '2017-08-17'),
(4, 7, NULL, '2017-10-03'),
(5, 6, NULL, '2017-07-03'),
(6, 5, NULL, '2017-08-15'),
(7, 4, NULL, '2017-08-01'),
(8, 3, NULL, '2017-07-17'),
(9, 2, NULL, '2017-06-17'),
(10, 10, NULL, '2017-08-08');

-- --------------------------------------------------------

--
-- Table structure for table `pms_supplier`
--

CREATE TABLE `pms_supplier` (
  `company_id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(45) NOT NULL,
  `sup_address` varchar(45) NOT NULL,
  `sup_contact` varchar(14) NOT NULL,
  `supp_status` enum('Active','Inactive') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pms_supplier`
--

INSERT INTO `pms_supplier` (`company_id`, `company_name`, `sup_address`, `sup_contact`, `supp_status`) VALUES
(1, 'Lucky Choice', 'Legazpi City', '09xxxxxxxx', 'Active'),
(2, 'Hong Enterprises', 'Legazpi City', '09xxxxxxxx', 'Active'),
(4, 'Yashano Mall', 'Legazpi City', '09xxxxxxxx', 'Active'),
(5, 'Pacific Mall Legazpi', 'Legazpi City', '09xxxxxxxx', 'Active'),
(6, 'Jebson', 'Legazpi City', '09xxxxxxxx', 'Active'),
(7, 'Novo', 'Daraga, Albay', '09xxxxxxxx', 'Active'),
(8, 'Department of Budget Management', 'Legazpi City', '09xxxxxxxx', 'Active'),
(9, 'Denvers', 'Legazpi City', '09xxxxxxxx', 'Active'),
(10, 'asdfg', 'hghihjg', '234567', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cms_account`
--
ALTER TABLE `cms_account`
  ADD PRIMARY KEY (`cms_account_ID`),
  ADD UNIQUE KEY `cms_account_ID` (`cms_account_ID`,`cms_username`),
  ADD KEY `account_emp_idx` (`emp_no`);

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
-- Indexes for table `pims_department`
--
ALTER TABLE `pims_department`
  ADD PRIMARY KEY (`dept_ID`);

--
-- Indexes for table `pims_employment_records`
--
ALTER TABLE `pims_employment_records`
  ADD PRIMARY KEY (`emp_rec_ID`),
  ADD UNIQUE KEY `biometrics_ID_UNIQUE` (`biometric_ID`),
  ADD UNIQUE KEY `complete_item_no_UNIQUE` (`complete_item_no`),
  ADD KEY `dept_ID_idx` (`dept_ID`),
  ADD KEY `emp_No_emprec` (`emp_No`);

--
-- Indexes for table `pims_personnel`
--
ALTER TABLE `pims_personnel`
  ADD PRIMARY KEY (`emp_No`),
  ADD UNIQUE KEY `P_Name` (`P_fname`,`P_mname`,`P_lname`);

--
-- Indexes for table `pms_app`
--
ALTER TABLE `pms_app`
  ADD PRIMARY KEY (`plan_con_no`),
  ADD UNIQUE KEY `item_id` (`item_id`);

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
  ADD KEY `pr_app_idx` (`plan_con_no`),
  ADD KEY `pr_ris_request_idx` (`trans_id`);

--
-- Indexes for table `pms_ris`
--
ALTER TABLE `pms_ris`
  ADD PRIMARY KEY (`ris_no`),
  ADD KEY `rs_emp_idx` (`emp_No`);

--
-- Indexes for table `pms_ris_request`
--
ALTER TABLE `pms_ris_request`
  ADD PRIMARY KEY (`trans_id`),
  ADD KEY `ris_request_ris_idx` (`ris_no`),
  ADD KEY `ris_request_item_idx` (`item_id`);

--
-- Indexes for table `pms_rsmi`
--
ALTER TABLE `pms_rsmi`
  ADD PRIMARY KEY (`rsmi_no`),
  ADD KEY `ris_no_idx` (`ris_no`);

--
-- Indexes for table `pms_supplier`
--
ALTER TABLE `pms_supplier`
  ADD PRIMARY KEY (`company_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cms_account`
--
ALTER TABLE `cms_account`
  ADD CONSTRAINT `account_emp` FOREIGN KEY (`emp_no`) REFERENCES `pims_personnel` (`emp_No`) ON UPDATE CASCADE;

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
  ADD CONSTRAINT `ims_storage_ibfk_1` FOREIGN KEY (`iar_no`) REFERENCES `pms_iar` (`iar_no`) ON UPDATE CASCADE;

--
-- Constraints for table `pims_employment_records`
--
ALTER TABLE `pims_employment_records`
  ADD CONSTRAINT `dept_ID_emprec` FOREIGN KEY (`dept_ID`) REFERENCES `pims_department` (`dept_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `emp_No_emprec` FOREIGN KEY (`emp_No`) REFERENCES `pims_personnel` (`emp_No`) ON UPDATE CASCADE;

--
-- Constraints for table `pms_app`
--
ALTER TABLE `pms_app`
  ADD CONSTRAINT `pms_app_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `pms_item` (`item_id`) ON UPDATE CASCADE;

--
-- Constraints for table `pms_iar`
--
ALTER TABLE `pms_iar`
  ADD CONSTRAINT `pms_iar_ibfk_1` FOREIGN KEY (`po_no`) REFERENCES `pms_po` (`po_no`) ON UPDATE CASCADE;

--
-- Constraints for table `pms_po`
--
ALTER TABLE `pms_po`
  ADD CONSTRAINT `pms_po_ibfk_1` FOREIGN KEY (`pr_no`) REFERENCES `pms_pr` (`pr_no`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pms_po_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `pms_supplier` (`company_id`) ON UPDATE CASCADE;

--
-- Constraints for table `pms_pr`
--
ALTER TABLE `pms_pr`
  ADD CONSTRAINT `pms_pr_ibfk_1` FOREIGN KEY (`plan_con_no`) REFERENCES `pms_app` (`plan_con_no`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pms_pr_ibfk_2` FOREIGN KEY (`trans_id`) REFERENCES `pms_ris_request` (`trans_id`) ON UPDATE CASCADE;

--
-- Constraints for table `pms_ris`
--
ALTER TABLE `pms_ris`
  ADD CONSTRAINT `rs_emp` FOREIGN KEY (`emp_No`) REFERENCES `pims_personnel` (`emp_No`) ON UPDATE CASCADE;

--
-- Constraints for table `pms_ris_request`
--
ALTER TABLE `pms_ris_request`
  ADD CONSTRAINT `pms_ris_request_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `pms_item` (`item_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ris_request_ris` FOREIGN KEY (`ris_no`) REFERENCES `pms_ris` (`ris_no`) ON UPDATE CASCADE;

--
-- Constraints for table `pms_rsmi`
--
ALTER TABLE `pms_rsmi`
  ADD CONSTRAINT `rsmi_ris` FOREIGN KEY (`ris_no`) REFERENCES `pms_ris` (`ris_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
