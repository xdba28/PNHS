-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2018 at 10:19 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `class_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cms_account`
--

CREATE TABLE IF NOT EXISTS `cms_account` (
  `cms_account_ID` int(10) unsigned NOT NULL,
  `cms_username` varchar(20) NOT NULL,
  `cms_password` varchar(45) NOT NULL,
  `cms_cpasswd` enum('0','1') NOT NULL DEFAULT '0',
  `emp_no` int(10) unsigned DEFAULT NULL,
  `lrn` int(20) unsigned DEFAULT NULL,
  `cms_current_log_date` date NOT NULL,
  `cms_current_log_time` time NOT NULL,
  `cms_prev_log_date` date DEFAULT NULL,
  `cms_prev_log_time` time DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `superadmin` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=326 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_account`
--

INSERT INTO `cms_account` (`cms_account_ID`, `cms_username`, `cms_password`, `cms_cpasswd`, `emp_no`, `lrn`, `cms_current_log_date`, `cms_current_log_time`, `cms_prev_log_date`, `cms_prev_log_time`, `status`, `superadmin`) VALUES
(67, 'adrianna_lima', 'VmRNYVp5YmhzdUZDTTBkcHpqam5vUT09', '0', 5880365, NULL, '2018-04-04', '09:56:49', '2018-04-04', '08:49:24', '1', '0'),
(69, 'armie_herrera', 'a2k4WlJzNTFGNEdJRWNnTWxaU3dhUT09', '1', 5287126, NULL, '2018-04-04', '09:30:48', '2018-04-04', '08:46:28', '1', '0'),
(70, 'bryan_solis', 'UnByazhuUXRsNi9CaVhpRGJTSTl4QT09', '1', 4990111, NULL, '2018-04-04', '10:45:25', '2018-04-03', '04:04:30', '1', '0'),
(71, 'charisse_nasol', 'QUpBWGY2RkxqVDR0OGN2RHRoTjBWUT09', '1', 5432123, NULL, '2018-04-03', '02:40:59', '2018-04-03', '12:21:52', '1', '0'),
(72, 'claire_mendenilla', 'T014TXA1SVlLNmhidG44dU1VYXpHZz09', '1', 50011253, NULL, '2018-04-04', '10:21:15', '2018-04-04', '08:28:22', '1', '0'),
(73, 'dave_valleroso', 'ZU9UZjRJZ05IeUllOTk2MWJMSUViZz09', '1', 5412398, NULL, '2018-04-03', '02:49:52', '2018-04-03', '02:48:26', '1', '0'),
(74, 'dylan_anderson', 'bjhMeTRZYXduL2hLM3dOZStXd05vUT09', '1', 5110945, NULL, '2018-04-01', '04:57:09', '2018-03-28', '02:39:01', '1', '0'),
(75, 'francis_acosta', 'MVZrUWdUTnhJUldxZ25jVjJrVVNtdz09', '1', 5501298, NULL, '2018-03-24', '00:00:00', NULL, NULL, '1', '0'),
(76, 'hannah_bonina', 'NzZWT2lsTWNjRXlNM3ByYUQ4UW4zZz09', '1', 5002157, NULL, '2018-04-04', '10:36:21', '2018-04-03', '03:42:21', '1', '0'),
(77, 'jeremy_cruz', 'UTJDbENmU3hkb2xkWXNJN0RiRlUzdz09', '0', 5143417, NULL, '2018-04-04', '10:37:05', '2018-04-04', '10:26:46', '1', '0'),
(78, 'joann_pacala', 'RVEveEF6dHZrN2xzS0ZUTTJ6dWVyQT09', '1', 5231607, NULL, '2018-04-04', '10:34:08', '2018-04-04', '10:25:28', '1', '0'),
(79, 'joseph_ludovice', 'V3M1UzM3d0VCZkdaOHAzaDlrdExMUT09', '1', 4743128, NULL, '2018-04-03', '09:56:43', '2018-04-03', '01:59:49', '1', '0'),
(80, 'juan_dela cruz', 'WmlUY0lTMmN6ZFlodkw5NnNGbUpEdz09', '1', 5756153, NULL, '2018-03-24', '00:00:00', NULL, NULL, '1', '0'),
(81, 'julia_palma', 'RDZ3SDhkeXN3Yml3cHQxcE9EN0dlZz09', '0', 5201107, NULL, '2018-04-04', '10:08:25', '2018-04-04', '10:00:03', '1', '0'),
(82, 'lea_cerino', 'V0VVM0k1N01KUE9DWkF1R0lmcFlzUT09', '1', 5166431, NULL, '2018-03-24', '00:00:00', NULL, NULL, '1', '0'),
(83, 'leo_acosta', 'MGJEUllieHhrSW9McEdtVml0a05FQT09', '1', 5309127, NULL, '2018-03-24', '00:00:00', NULL, NULL, '1', '0'),
(84, 'lilia_bermas', 'U2Y3NjBBRElJTExtRDBlUGJUZzZvZz09', '1', 5677342, NULL, '2018-03-24', '00:00:00', NULL, NULL, '1', '0'),
(85, 'liza_lim', 'ZWRpQktNenp2bmFieTQwZjJhRk5qZz09', '1', 5221094, NULL, '2018-03-24', '00:00:00', NULL, NULL, '1', '0'),
(86, 'lloyd_garcia', 'SlZocnNwTG9qS1hmTU5WaExUekM0Zz09', '1', 50011249, NULL, '2018-04-04', '10:30:29', '2018-04-04', '10:27:21', '1', '0'),
(87, 'lyka_brutas', 'VnV0VlI5MExFcmdDL0ROdVRNd0Zodz09', '1', 5001094, NULL, '2018-03-24', '00:00:00', NULL, NULL, '1', '0'),
(88, 'mariel_casaul', 'SWZXcE93S3pjOVZBcnNuZmNnZVVqUT09', '1', 5400127, NULL, '2018-03-24', '00:00:00', NULL, NULL, '1', '0'),
(89, 'mark_lobete', 'STA5UVcrS0kwdUJTd1NPVWFKUS8wUT09', '1', 5902312, NULL, '2018-04-03', '02:20:38', '2018-03-24', '00:00:00', '1', '0'),
(90, 'michael_llona', 'bDUzS1ZLaG1FNmFVYTMyZkxyQzQ5dz09', '1', 4901154, NULL, '2018-03-24', '00:00:00', NULL, NULL, '1', '0'),
(91, 'mark_masbate', 'STA5UVcrS0kwdUJTd1NPVWFKUS8wUT09', '1', 5340912, NULL, '2018-03-24', '00:00:00', NULL, NULL, '1', '0'),
(92, 'mj_balmedina', 'ckJXRS9RU3hiOXE3a1pNUjZxRkVUUT09', '0', 50011255, NULL, '2018-04-04', '09:50:36', '2018-04-04', '08:29:30', '1', '0'),
(93, 'patrick_acosta', 'SjZCdE95cmNnUitLWTVUcnZxU3ZMUT09', '1', 50011248, NULL, '2018-03-24', '00:00:00', NULL, NULL, '1', '0'),
(94, 'radleigh_riego', 'N0pUaTJNa2NVend1WVJxMkZUSUkwZz09', '1', 4990054, NULL, '2018-03-24', '00:00:00', NULL, NULL, '1', '0'),
(95, 'ricardo_barrameda', 'S0pRejY1L2w5UXpBSTdXR3hMbVpBUT09', '0', 50011252, NULL, '2018-04-04', '10:46:20', '2018-04-04', '09:48:04', '1', '0'),
(97, 'rizza_de_los_santos', 'NDI2VEJISU93cThPWFJPOFRqaUcvQT09', '1', 5353113, NULL, '2018-03-24', '00:00:00', NULL, NULL, '1', '0'),
(98, 'roger_abitria', 'WWVYS3NsdlNKOWFyNXQyYUlyTDY2dz09', '1', 5513092, NULL, '2018-03-24', '00:00:00', NULL, NULL, '1', '0'),
(99, 'rommel_padilla', 'ZVJuMGMrc3FxQ2ZZSmE1bnlMczNOZz09', '1', 5210011, NULL, '2018-03-24', '00:00:00', NULL, NULL, '1', '0'),
(100, 'salome_macinas', 'Qno1U2NTbHZHMFNjMXhYcU1TTFhNQT09', '0', 50011250, NULL, '2018-04-04', '09:42:25', '2018-04-04', '08:17:27', '1', '0'),
(101, 'savannah_casin', 'dFpZUW83dk1CNVNISGNTc3NsU2VWdz09', '1', 4912093, NULL, '2018-03-24', '00:00:00', NULL, NULL, '1', '0'),
(102, 'shanley_reyes', 'YjNlREZFbWkxM3pweWNVNG9ZbnNjQT09', '1', 5901112, NULL, '2018-03-24', '00:00:00', NULL, NULL, '1', '0'),
(103, 'shirley_rodriguez', 'Yk81TThiN1FxcVBVMnBZSWYwbmZkQT09', '1', 5000129, NULL, '2018-04-01', '05:33:21', '2018-04-01', '05:23:05', '1', '0'),
(104, 'vanessa_madera', 'eG4vS2w1cERNbms5VFNudUkxbU5RQT09', '1', 50011254, NULL, '2018-04-04', '10:21:15', '2018-04-04', '10:14:07', '1', '0'),
(105, 'vincent_llanco', 'MUVjeHVlT0ZncWhwN01yV3ZJWm0wUT09', '1', 4567891, NULL, '2018-04-04', '10:40:08', '2018-04-04', '08:26:59', '1', '0'),
(106, 'vincent_hidalgo', 'MUVjeHVlT0ZncWhwN01yV3ZJWm0wUT09', '1', 5566126, NULL, '2018-04-02', '12:04:12', '2018-04-02', '11:26:59', '1', '0'),
(216, 'superadmin', 'N1dXUlJqdUhBTmpzZnFJSTJ6WFlDQT09', '1', NULL, NULL, '2018-03-28', '10:42:26', '2018-03-27', '04:22:30', '1', '0'),
(217, 'andres_dela_torre', 'K3Mramk1czhvY1dBQnBPY2V4ZGJEUT09', '1', 50011251, NULL, '2018-04-04', '10:41:25', '2018-04-04', '10:12:49', '1', '0'),
(271, 'thelma_30001', 'RDZ3SDhkeXN3Yml3cHQxcE9EN0dlZz09', '0', NULL, 30001, '2018-04-04', '09:14:21', '2018-04-04', '08:50:52', '1', '0'),
(272, 'cordelia_30005', 'RDZ3SDhkeXN3Yml3cHQxcE9EN0dlZz09', '0', NULL, 30005, '2018-04-04', '09:21:18', '2018-04-04', '08:52:45', '1', '0'),
(273, 'jayme_30002', 'RDZ3SDhkeXN3Yml3cHQxcE9EN0dlZz09', '0', NULL, 30002, '2018-04-04', '09:15:51', '2018-04-04', '08:51:51', '1', '0'),
(274, 'paolo_1102', 'ZndjQVA4cXpoaGdZNlJRMXRJbXA3QT09', '1', NULL, 1102, '2018-04-04', '08:18:05', '0000-00-00', '00:00:00', '1', '0'),
(275, 'jericho_1103', 'bTN5U0xGLzJ6ZE9aVm1RS092dXR4Zz09', '1', NULL, 1103, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1', '0'),
(276, 'clint_2202', 'R1hYL2RjSU5TamM4V2dVZ25oVzZGUT09', '1', NULL, 2202, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1', '0'),
(277, 'jester_2203', 'UUxub2QzaWYyM1dIVFpNTnhEUmRxdz09', '1', NULL, 2203, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1', '0'),
(278, 'karlvincent_9999', 'aXd3R1hzRzFTdzNvZ2xjTTZwb3ZGQT09', '0', NULL, 9999, '2018-04-03', '03:42:57', '2018-04-03', '03:18:50', '1', '0'),
(279, 'emmanuel_1101', 'RDZ3SDhkeXN3Yml3cHQxcE9EN0dlZz09', '0', NULL, 1101, '2018-04-04', '09:27:48', '2018-04-04', '08:47:35', '1', '0'),
(280, 'romeoaaron_2204', 'RDZ3SDhkeXN3Yml3cHQxcE9EN0dlZz09', '0', NULL, 2204, '2018-04-04', '10:06:22', '2018-04-04', '09:04:39', '1', '0'),
(281, 'jess_11102', 'RG0zZGVZRWRTZGFlREJxamxEd3RlUT09', '1', NULL, 11102, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1', '0'),
(282, 'jona_20171', 'eWl5UXU5RjF6S1AzWFdySmg4ZGQ5UT09', '1', NULL, 20171, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1', '0'),
(283, 'alvin_20172', 'TWw0R01YU3hJYVFtQ3MzOFZPVmh3UT09', '1', NULL, 20172, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1', '0'),
(284, 'nicole_11101', 'Wjc2QzlJcmJxbDFONVk3WWRaTVN2dz09', '1', NULL, 11101, '2018-04-02', '12:08:39', '0000-00-00', '00:00:00', '1', '0'),
(285, 'jane_20173', 'TjJucFN1RjhxYkZuK0w2cXE1LzVLZz09', '1', NULL, 20173, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1', '0'),
(286, 'jake_20174', 'WXh6KzhqMno3Zk5mRFhHbnVuT3g1WUdzU1RveTcwRGFqN', '1', NULL, 20174, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1', '0'),
(287, 'thea_20175', 'Ymd5bUdsWFYybXBnNTVvV2ZPZ3NaQT09', '1', NULL, 20175, '2018-04-02', '12:09:42', '0000-00-00', '00:00:00', '1', '0'),
(288, 'christine_20176', 'Lzd5NEFPTVB0RmgvUzVWZ3FCRENXdz09', '1', NULL, 20176, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1', '0'),
(289, 'bruno_20177', 'QVNPRmlpdEd5blhLTm1pUW5xN05qQT09', '1', NULL, 20177, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1', '0'),
(290, 'kathryn_20178', 'WW1FZHlyUkNudXg4UmtndjBZb3drQT09', '1', NULL, 20178, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1', '0'),
(291, 'cristal_20179', 'UE85SjZaSFFhNlMrT0NrV21mSUlkQT09', '1', NULL, 20179, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1', '0'),
(292, 'denver_101010', 'MU9jSkhYOXhIekxnNTBYRU44Z3Y2QT09', '1', NULL, 101010, '2018-04-03', '01:59:54', '0000-00-00', '00:00:00', '1', '0'),
(293, 'margie_201710', 'RTRXM2tHU1FVRVFuK2dQKzZoOGoxQT09', '1', NULL, 201710, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1', '0'),
(294, 'mildred_201711', 'a25MNG16U0ErN2pyQ3NjcGZWcXFGZz09', '1', NULL, 201711, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1', '0'),
(295, 'anna_201712', 'a05zR1JLbENQMkV3N2JZaFRRZzdzdz09', '1', NULL, 201712, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1', '0'),
(296, 'jazmin_201713', 'OXRlcEo4WkZzU0RXa0ZqaGxJaFMzQT09', '1', NULL, 201713, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1', '0'),
(297, 'josie_201714', 'VVJNdFErUW8wc052cWZoWkwwdmo5UT09', '1', NULL, 201714, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1', '0'),
(298, 'jucel_201715', 'dEt3MVpnT2NOQnNKN1AxQXVleGttUT09', '1', NULL, 201715, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1', '0'),
(299, 'roberto_201716', 'bWNhMG1rRTJ3SDJaVDlnUnpUWG1oZz09', '1', NULL, 201716, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1', '0'),
(300, 'joy_201717', 'WjRJQzkwNDNZcVVZdjFFNXJZVTJTQT09', '1', NULL, 201717, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1', '0'),
(301, 'cassandra_201718', 'RDZ3SDhkeXN3Yml3cHQxcE9EN0dlZz09', '0', NULL, 201718, '2018-04-04', '09:25:33', '2018-04-04', '08:53:25', '1', '0'),
(302, 'kent_201719', 'clF2TGxtM2pCR2RYOFJXQmtYd3RIUT09', '1', NULL, 201719, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1', '0'),
(303, 'charles_201720', 'RDZ3SDhkeXN3Yml3cHQxcE9EN0dlZz09', '0', NULL, 201720, '2018-04-04', '08:54:12', '2018-04-01', '04:43:59', '1', '0'),
(304, 'cj_201721', 'RDZ3SDhkeXN3Yml3cHQxcE9EN0dlZz09', '0', NULL, 201721, '2018-04-04', '09:26:22', '2018-04-04', '08:54:47', '1', '0'),
(305, 'jasper_201722', 'RDZ3SDhkeXN3Yml3cHQxcE9EN0dlZz09', '0', NULL, 201722, '2018-04-04', '10:18:28', '2018-04-04', '09:26:28', '1', '0'),
(306, 'noel_201723', 'VmNtS2NvdDFHN3ZFTUlQWmppb1dXdz09', '1', NULL, 201723, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1', '0'),
(307, 'matteo_201724', 'VUZ4LzNPMkMveDFxbmZxTnRjdmdvdz09', '1', NULL, 201724, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1', '0'),
(308, 'steffi_201725', 'cEw2NjQvYmV4djB2SW93Rjc1V3pRZz09', '1', NULL, 201725, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1', '0'),
(309, 'julie_201726', 'Rm9lTVFTZWY0YmlqU2NiOGg4TzA5UT09', '1', NULL, 201726, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1', '0'),
(310, 'toni_201727', 'WnBOVDc2TllUL1pZdVZkd2VmL2g2UT09', '1', NULL, 201727, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1', '0'),
(311, 'marian_201728', 'di94d3JhMWR6RS9XU1lZQU9Ua0JRZz09', '1', NULL, 201728, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1', '0'),
(312, 'anne_201729', 'QytpWUVSdVp0L2JsbVNsM0dabFRndz09', '1', NULL, 201729, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1', '0'),
(313, 'vhong_201730', 'K3d2d0JmMjFzT0NoT1FNNlBpVGZiUT09', '1', NULL, 201730, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1', '0'),
(314, 'maine_201731', 'eXF3WTdaQWxQZEh2QWF4VUI4R1pEQT09', '1', NULL, 201731, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1', '0'),
(315, 'alden_201732', 'Q3JzbTlQQ2cyUlprNzVFeFVmay9FZz09', '1', NULL, 201732, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1', '0'),
(316, 'liza_201733', 'WEFrcm5wUDlDd0dFL1RXV3poQWhlZz09', '1', NULL, 201733, '2018-04-02', '02:34:14', '2018-04-02', '01:29:57', '1', '0'),
(317, 'enrique_201734', 'Nkhqc1dkYzJOMUkxeXZFNmdKMVI1Zz09', '1', NULL, 201734, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1', '0'),
(318, 'nico_333333', 'SlZ6d0RZOFMxNEtiZ3ptSkpCaytmdz09', '1', NULL, 333333, '2018-04-03', '08:28:18', '0000-00-00', '00:00:00', '1', '0'),
(319, 'glen_333334', 'QjNUamR4RXhFcDBaa3hXS0d4cnNNQT09', '1', NULL, 333334, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1', '0'),
(320, 'val_333335', 'UXBDMUdPNVdneVJjY1VaWkFDZkJmUT09', '1', NULL, 333335, '2018-04-01', '04:49:35', '0000-00-00', '00:00:00', '1', '0'),
(321, 'brent_333336', 'eU4xOFRubXltVytuV3hoRURFQVhpQT09', '1', NULL, 333336, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1', '0'),
(322, 'kim_333337', 'bnRoUVJqUTN1R0hySzQ0SmFXZEZ6dz09', '1', NULL, 333337, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1', '0'),
(323, 'daniel_333338', 'TzZQa1dqKy91UUVkcVpRRzVvcTNTQT09', '1', NULL, 333338, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1', '0'),
(324, 'thelma_7777', 'RDZ3SDhkeXN3Yml3cHQxcE9EN0dlZz09', '0', NULL, 7777, '2018-04-04', '09:08:11', '2018-04-04', '08:50:16', '1', '0'),
(325, 'karlvincent_5882566', 'aHZIQkZVcXc5RCtmREtzL3RZUGhqdz09', '1', NULL, 5882566, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `cms_achievement`
--

CREATE TABLE IF NOT EXISTS `cms_achievement` (
  `cms_achievement_ID` int(11) unsigned NOT NULL,
  `cms_achievement_name` varchar(150) NOT NULL,
  `cms_achievement_about` longtext NOT NULL,
  `cms_achievement_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_achievement`
--

INSERT INTO `cms_achievement` (`cms_achievement_ID`, `cms_achievement_name`, `cms_achievement_about`, `cms_achievement_date`) VALUES
(1, 'Palarong Pambansa 2016', '<p>Palarong Pambansa 2016 Best Billeting School 3rd Place 1st Division Search for Accomplished Youth Organization in Schools Division of Legazpi 2016 Ibalong Street Presentation 2008 Best in Costume and Props 4th Place 6th Salud Bikolnon Award Best Achiever for the Promotion of Innovative Healthy Lifestyle Campaign 2015 and 2016 and Best Achiever for Belly Gud for Health 2015</p>\r\n', '0000-00-00'),
(2, 'Palarong Bicol 2017', 'Palarong Bicol 2017 Bernard Cruz, Coach, Table Tennis Mario Ballon, Coach, Archery Reinelyn Mae Saturno, Table Tennis, Bronze Joy Nunez, Table Tennis, Gold Jayvee Polo, Table Tennis, Gold Clarence Sarza, Taekwondo, 1 Gold, 2 Silver Rafael Siso, Arnis, 3 Gold, 3 Silver, 1 Bronze Joeome Aycardo, Soccer, Gold Mark Nunez, Table Tennis, Silver ', '0000-00-00'),
(3, 'Palarong Pambansa', 'Palarong Pambansa Clarence Sarza, Taekwondo, Gold Rafael Sis, Arnis, Gold ', '0000-00-00'),
(4, 'Regional Festival of Talents', 'April Cruz, 2nd Place, Regional Festival of Talents, Essay Writing in Araling Panlipunan, English ', '0000-00-00'),
(5, 'International Linkage Community', 'Pag-Asa National High School Delegates to the International Linkage Community, Kuala Lumpur Malaysia, September 24-28 2016', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `cms_admin_cons`
--

CREATE TABLE IF NOT EXISTS `cms_admin_cons` (
  `cons_id` int(10) unsigned NOT NULL,
  `module` enum('CSS','FRMS','IMS','IPCRMS','OES','PIMS','PMS','PRS','SCMS','SIS') NOT NULL,
  `faculty_type` enum('Teaching','Non Teaching') NOT NULL,
  `job_title_code` varchar(45) DEFAULT NULL,
  `admin_type` varchar(45) NOT NULL,
  `emp_no` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_admin_cons`
--

INSERT INTO `cms_admin_cons` (`cons_id`, `module`, `faculty_type`, `job_title_code`, `admin_type`, `emp_no`) VALUES
(1, 'FRMS', 'Teaching', 'ICTD', 'School Related Document Admin', NULL),
(2, 'FRMS', 'Non Teaching', 'HRM', 'Personnel Information Document Admin', NULL),
(3, 'IMS', 'Non Teaching', 'SUO', 'Inventory Management Admin', NULL),
(4, 'IPCRMS', 'Non Teaching', 'SP', 'Evaluation Verification Admin', NULL),
(5, 'PMS', 'Non Teaching', 'SUO', 'Procurement Management Admin', NULL),
(6, 'PRS', 'Non Teaching', 'CASH', 'Payroll Admin', NULL),
(7, 'PRS', 'Non Teaching', 'HRM', 'Time Record Admin', NULL),
(8, 'SCMS', 'Non Teaching', 'NURS', 'Health Record Admin', NULL),
(9, 'PIMS', 'Non Teaching', 'ASSP', 'Leave Management Admin', NULL),
(10, 'PIMS', 'Teaching', 'ICTD', 'Personnel Managemnet Admin', NULL),
(11, 'PMS', 'Non Teaching', 'SP', 'Procurement Verification Admin', NULL),
(12, 'SIS', 'Non Teaching', 'RK', 'Student Record Admin', NULL),
(13, 'CSS', 'Teaching', 'TCH', 'Class Scheduling Admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_album`
--

CREATE TABLE IF NOT EXISTS `cms_album` (
  `cms_album_ID` int(10) unsigned NOT NULL,
  `cms_account_ID` int(10) unsigned NOT NULL,
  `cms_album_name` varchar(50) NOT NULL,
  `cms_album_desc` varchar(150) NOT NULL,
  `cms_album_folder` varchar(150) NOT NULL,
  `gallery_type` varchar(100) DEFAULT NULL,
  `cms_album_date_created` date NOT NULL,
  `cms_album_time_created` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=latin1;

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

CREATE TABLE IF NOT EXISTS `cms_gpta` (
  `cms_gpta_ID` int(11) NOT NULL,
  `cms_gpta_content` text NOT NULL,
  `cms_gpta_year1` year(4) NOT NULL,
  `cms_gpta_year2` year(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_gpta`
--

INSERT INTO `cms_gpta` (`cms_gpta_ID`, `cms_gpta_content`, `cms_gpta_year1`, `cms_gpta_year2`) VALUES
(10, '<p><strong>PNHS GPTA Officers</strong></p>\r\n\r\n<p><strong>President:</strong>&nbsp;Mr. Roland Bongais<br />\r\n<strong>Vice-President:</strong>&nbsp;Mr.Erasto&shy; Bing Alerta<br />\r\n<strong>Secretary:</strong>&nbsp;Mary Ann A.Blanco<br />\r\n<strong>Treasurer:</strong>&nbsp;Juvy Bremen<br />\r\n<strong>Auditor:</strong>&nbsp;Mr. Romel Abiera<br />\r\n<strong>Business Managers:</strong>&nbsp;Mrs&shy;. Lani Reaso and Mrs. Melisa Dy<br />\r\n<strong>PIO:</strong>&nbsp;Roleto Bechayda<br />\r\n<strong>Board Members:</strong><br />\r\nMs.Geraldine&shy; Santander<br />\r\nMr.Rodrigo&shy; Batalla<br />\r\nMrs. Janet Arias<br />\r\nMs. Lorena Macatunao</p>\r\n\r\n<p><strong>GPTA Coordinator:</strong>&nbsp;Ma. Ana Ayala-Balde</p>\r\n', 2017, 2018);

-- --------------------------------------------------------

--
-- Table structure for table `cms_image`
--

CREATE TABLE IF NOT EXISTS `cms_image` (
  `cms_image_ID` int(10) unsigned NOT NULL,
  `cms_album_ID` int(11) NOT NULL,
  `cms_image_title` tinytext,
  `cms_image_name` varchar(100) NOT NULL,
  `cms_image_dir` varchar(100) NOT NULL,
  `cms_album_name` text,
  `cms_image_date` date NOT NULL,
  `cms_image_time` time NOT NULL,
  `cms_img_cap` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=884 DEFAULT CHARSET=latin1;

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

CREATE TABLE IF NOT EXISTS `cms_memo` (
  `cms_memo_ID` int(11) unsigned NOT NULL,
  `cms_subject` varchar(150) NOT NULL,
  `cms_memo_description` longtext NOT NULL,
  `cms_memo_date` date NOT NULL,
  `cms_recipient` varchar(150) NOT NULL,
  `cms_account_id` int(10) unsigned NOT NULL,
  `cms_memo_pdf_dir` text NOT NULL,
  `cms_memo_img_dir` text NOT NULL,
  `cms_memo_date_created` date NOT NULL,
  `cms_memo_time_created` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_memo`
--

INSERT INTO `cms_memo` (`cms_memo_ID`, `cms_subject`, `cms_memo_description`, `cms_memo_date`, `cms_recipient`, `cms_account_id`, `cms_memo_pdf_dir`, `cms_memo_img_dir`, `cms_memo_date_created`, `cms_memo_time_created`) VALUES
(8, 'DESIGNATION', '<p>For Mr. Paul Baluis</p>\r\n', '2018-02-22', '', 8, 'memo/[2018-03-14][12-33-26]-2019924945.pdf', '', '0000-00-00', '00:00:00'),
(10, 'Music Lessons', '<p>Basic Guitar Lessons! Look for Mrs. De la Cruz.</p>\r\n', '2018-03-13', '', 8, 'memo/[2018-03-14][12-31-08]-1506319992.pdf', '', '0000-00-00', '00:00:00'),
(11, 'Sample', '<p>hello</p>\r\n', '2018-04-02', '', 8, 'memo/[2018-04-02][15-14-15]-862959117.pdf', '', '2018-04-02', '15:14:15'),
(12, 'sample memo', '<p>sample description here</p>\r\n', '2018-04-04', '', 8, 'memo/[2018-04-04][09-34-22]-220351249.pdf', '', '2018-04-04', '09:34:22');

-- --------------------------------------------------------

--
-- Table structure for table `cms_news`
--

CREATE TABLE IF NOT EXISTS `cms_news` (
  `cms_news_ID` int(11) unsigned NOT NULL,
  `cms_title` varchar(100) NOT NULL,
  `cms_news_description` longtext NOT NULL,
  `cms_news_date` date NOT NULL,
  `cms_account_id` int(10) unsigned NOT NULL,
  `cms_news_img_dir` longtext NOT NULL,
  `cms_news_img_cap` text NOT NULL,
  `cms_news_writer` varchar(100) NOT NULL,
  `cms_news_date_created` date NOT NULL,
  `cms_news_time_created` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

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

CREATE TABLE IF NOT EXISTS `cms_orgchart` (
  `cms_orgchart_ID` int(11) unsigned NOT NULL,
  `cms_orgchart_title` varchar(150) NOT NULL,
  `cms_orgchart_img_name` varchar(150) NOT NULL,
  `cms_orgchart_year1` varchar(4) DEFAULT NULL,
  `cms_orgchart_year2` varchar(4) DEFAULT NULL,
  `cms_orgchart_date` date NOT NULL,
  `cms_orgchart_time` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

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

CREATE TABLE IF NOT EXISTS `cms_principal` (
  `cms_principal_ID` int(10) unsigned NOT NULL,
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

CREATE TABLE IF NOT EXISTS `cms_privilege` (
  `cms_priv_id` int(10) unsigned NOT NULL,
  `job_title_code` varchar(45) NOT NULL,
  `cms_priv` enum('0','1') NOT NULL DEFAULT '0',
  `frms_priv` enum('0','1') NOT NULL DEFAULT '0',
  `frms_user` enum('0','1') NOT NULL DEFAULT '0',
  `ipcrms_priv` enum('0','1') NOT NULL DEFAULT '0',
  `ipcrms2_priv` enum('0','1') NOT NULL DEFAULT '0',
  `ipcrms_user` enum('0','1') NOT NULL DEFAULT '0',
  `pms_priv` enum('0','1') NOT NULL DEFAULT '0',
  `pms2_priv` enum('0','1') NOT NULL DEFAULT '0',
  `pms3_priv` enum('0','1') NOT NULL DEFAULT '0',
  `pms_user` enum('0','1') NOT NULL DEFAULT '0',
  `pims_priv` enum('0','1') NOT NULL DEFAULT '0',
  `pims2_priv` enum('0','1') NOT NULL DEFAULT '0',
  `pims_user` enum('0','1') NOT NULL DEFAULT '0',
  `prs_priv` enum('0','1') NOT NULL DEFAULT '0',
  `prs2_priv` enum('0','1') NOT NULL DEFAULT '0',
  `sis_priv` enum('0','1') NOT NULL DEFAULT '0',
  `sis2_priv` enum('0','1') NOT NULL DEFAULT '0',
  `sis_user` enum('0','1') NOT NULL DEFAULT '0',
  `oes_priv` enum('0','1') NOT NULL DEFAULT '0',
  `scms_priv` enum('0','1') NOT NULL DEFAULT '0',
  `scms_user` enum('0','1') NOT NULL DEFAULT '0',
  `ims_priv` enum('0','1') NOT NULL DEFAULT '0',
  `css_priv` enum('0','1') NOT NULL DEFAULT '0',
  `superadmin` enum('0','1') NOT NULL DEFAULT '0',
  `superadmin_priv` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_privilege`
--

INSERT INTO `cms_privilege` (`cms_priv_id`, `job_title_code`, `cms_priv`, `frms_priv`, `frms_user`, `ipcrms_priv`, `ipcrms2_priv`, `ipcrms_user`, `pms_priv`, `pms2_priv`, `pms3_priv`, `pms_user`, `pims_priv`, `pims2_priv`, `pims_user`, `prs_priv`, `prs2_priv`, `sis_priv`, `sis2_priv`, `sis_user`, `oes_priv`, `scms_priv`, `scms_user`, `ims_priv`, `css_priv`, `superadmin`, `superadmin_priv`) VALUES
(2, 'ADOF', '1', '0', '1', '', '', '0', '', '', '0', '1', '', '', '1', '', '', '', '', '0', '0', '0', '1', '0', '0', '0', '0'),
(3, 'INFOSA', '1', '1', '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0'),
(4, 'INST', '1', '0', '1', '0', '0', '0', '0', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '1', '1', '0', '1', '0', '1', '0', '0'),
(5, 'LIS', '1', '0', '1', '0', '0', '0', '0', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0'),
(7, 'MDOF', '1', '1', '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0'),
(8, 'MTCHR', '1', '0', '1', '0', '0', '1', '0', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '1', '1', '0', '1', '0', '0', '0', '0'),
(9, 'NURS', '1', '1', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0'),
(10, 'PDO', '1', '1', '0', '1', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0'),
(11, 'PPROS', '1', '1', '0', '1', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0'),
(12, 'REG', '1', '1', '0', '1', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0'),
(13, 'RK', '1', '1', '0', '1', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0'),
(14, 'ICTD', '1', '1', '0', '', '', '0', '', '', '0', '1', '0', '1', '0', '', '', '', '', '1', '1', '0', '1', '0', '0', '0', '0'),
(15, 'IAUD', '1', '1', '0', '1', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0'),
(17, 'CASH', '1', '1', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0'),
(18, 'CMM', '1', '1', '0', '1', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0'),
(19, 'DENT', '1', '1', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0'),
(20, 'DORMG', '1', '1', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1', '0', '0', '0'),
(21, 'EPS', '1', '1', '0', '1', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0'),
(22, 'ESUP', '1', '1', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '1', '0', '0', '0', '1', '0', '0', '0', '0', '0'),
(23, 'EXED', '1', '1', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '1', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0'),
(24, 'SP', '1', '1', '0', '1', '0', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '1', '0', '1'),
(25, 'HRM', '1', '1', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1', '0', '1', '0', '1', '0', '0', '0', '1', '0', '0', '1', '0', '0'),
(26, 'HTEACH', '1', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0'),
(27, 'SECSP', '1', '1', '0', '1', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '1', '0', '0'),
(28, 'SADAS', '1', '1', '0', '1', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0'),
(29, 'SECG', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '1', '0', '0'),
(30, 'SPET', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(31, 'SPSP', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(32, 'SUO', '0', '0', '0', '0', '0', '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0'),
(33, 'TCH', '1', '0', '1', '0', '0', '1', '0', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '1', '1', '0', '1', '0', '0', '0', '0'),
(34, 'UTW', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(35, 'VOCSS', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(36, 'ASSP', '1', '0', '1', '0', '0', '1', '0', '0', '0', '1', '1', '0', '1', '0', '0', '0', '0', '1', '1', '0', '1', '0', '1', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `cms_project`
--

CREATE TABLE IF NOT EXISTS `cms_project` (
  `cms_project_ID` int(10) unsigned NOT NULL,
  `cms_project_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cms_site_content`
--

CREATE TABLE IF NOT EXISTS `cms_site_content` (
  `cms_content_ID` int(255) NOT NULL,
  `cms_content_label` varchar(100) NOT NULL,
  `cms_content_desc` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_site_content`
--

INSERT INTO `cms_site_content` (`cms_content_ID`, `cms_content_label`, `cms_content_desc`) VALUES
(0, 'address', '<p><span style="font-size:16px">PAG-ASA, RAWIS, LEGAZPI CITY</span></p>\r\n'),
(1, 'history', '<p><span style="font-size:16px"><strong>Pag-asa National High School</strong> is located at Pag-asa, a sitio of Barangay Rawis, a seaside fishing and industrial barrio of Legazpi City, one of the three progressive cities in Bicol Region. At about 500 meters East of PNHS is the shoreline of Albay Gulf and about the same distance to the West lies the majestic, alluring landmark of Albay Province, the Mayon Volcano, one of the world&rsquo;s greatest wonders.&nbsp;</span></p>\r\n\r\n<p><span style="font-size:16px">Pag-asa National High School is located at Pag-asa, a sitio of Barangay Rawis, a seaside fishing and industrial barrio of Legazpi City, one of the three progressive cities in Bicol Region. At about 500 meters East of PNHS is the shoreline of Albay Gulf and about the same distance to the West lies the majestic, alluring landmark of Albay Province, the Mayon Volcano, one of the world&rsquo;s greatest wonders.&nbsp;<br />\r\n<br />\r\nThe original name of Pag-asa National High School was City Experimental High school, later changed to Rawis Barrio High School due to the approval of RA 6054, creating the Barrio High School Charter authored by Dr. Pedro T. Orata of Pangasinan.&nbsp;<br />\r\n<br />\r\nThe first day of classes began on August 20, 1965 occupying 3 classrooms at Rawis Elementary School. It started with two sections, 38 and 32 students, respectively. Mr. Noel Arao, now retired, is one of the pioneer teachers plus elementary teachers who were hired on an honorarium basis. Ms. Salvacion G. Yang and Mrs. Norma B. Orosco were hired on permanent status but were paid by the local government. In 1974 when Legazpi City Division was created, Mr. Josue Camba as first Schools Division Superintendent, Rawis Barrio High School was changed to Pag-asa Barangay Vocational High School. After more than five years of difficulties, in 1983, it was elevated to a National High School status by virtue of Batas Pambansa #388 sponsored by Congressman Carlos R. Imperial. It was in School Year 1976 &ndash; 1977 when the school transferred to its present school site. The late Mrs. Carolina A. Lanuzo was its first appointed Secondary School Principal.&nbsp;<br />\r\n<br />\r\nPag-asa National High School aims to develop the fullest potentials of individual students in building a peaceful and progressive community. It provides equitable access to quality education with the aim of developing the knowledge, skills, attitude and values of students necessary for a productive life. From three permanent teachers, it has increased to 135 teaching and 15 non-teaching personnel. Teachers are given trainings and scholarships for their personal and professional growth.&nbsp;<br />\r\n<br />\r\nIn 1993, there was a marked increase I enrolment and the school needed additional classrooms. Again, it was through the efforts of Congressman Carlos Imperial that a 13 &ndash; classroom building was constructed in its annex site which is 100 meters away from the main campus. Due to rapid increase of enrolment and with the purpose of decongesting the classrooms, the opening of extension schools was thought of by Mrs. Consuelo Fe L. Panesa, the second officially appointed Secondary School Principal of PNHS. Three extension schools were opened, namely: Gogon Extension, Arimbay Extension and Pawa Extension.&nbsp;<br />\r\n<br />\r\nPag-asa National High School from its establishment has earned various recognitions such as, second place Regional Search for the Most Effective Secondary School (General Curriculum Category) in 1999 &ndash; 2000, a three (3) year consecutive undefeated champion in the Division Science and Math Quiz, over the high performing schools in the Legazpi City Division, BUCELHS, AUS-SOHS, SAA. Student writers and English school paper Adviser, Mr. Jeremy Cruz had multiple awards in Campus Journalism not only in the Regional but also in the National Level. The School paper &ldquo;The Dawn&rdquo; was adjudged 8th place in 2003 and 5th place in 2004, respectively as Best School Paper.&nbsp;<br />\r\n<br />\r\nThus, PNHS was born as an educational institution to establish a name and prestige that has become enviable and record-worthy to be kept in the annals of secondary education and as the school suggests. Pag-asa will always be a hope to those who vanquish illiteracy and poverty.</span></p>\r\n'),
(2, 'vision', '<p><span style="font-size:16px">We dream of Filipinos who passionately love their country and whose Values and Competencies enable them to realize their full potential and contribute meaningfully to building the nation.&nbsp;<br />\r\n<br />\r\nAs a learner-centered public institution, the Department of Education continuously improves itself to better serve its stakeholders.</span></p>\r\n'),
(3, 'mission', '<p><span style="font-size:16px">To protect and promote the right of every Filipino to quality equitable culture-based and complete basic education where&nbsp;<br />\r\n<br />\r\n1. Students learn in a child-friendly, gender-sensitive, safe and motivating environment.&nbsp;<br />\r\n<br />\r\n2. Teachers facilitate learning and constantly nurture every learner.&nbsp;<br />\r\n<br />\r\n3. Administrators and staff, as stewards of the institution, ensure an enabling and supportive environment for effective learning to happen.&nbsp;<br />\r\n<br />\r\n4. Family, community, and other stakeholders are actively engaged and share responsibility for developing life-long learners.</span></p>\r\n'),
(4, 'hymn', '<p><span style="font-size:16px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="background-color:#ffffff; color:#333333">In our every corner of the universe&nbsp;</span><br />\r\n<span style="background-color:#ffffff; color:#333333">Our alma mater, we praise your name&nbsp;</span><br />\r\n<br />\r\n<span style="background-color:#ffffff; color:#333333">Hail alma materour beloved PNHS Noble foundation, a school that folks adore&nbsp;</span><br />\r\n<span style="background-color:#ffffff; color:#333333">Pride of Legazpi, Strength of the Poor&nbsp;</span><br />\r\n<span style="background-color:#ffffff; color:#333333">Now Proudly stands amidst the triumphs of our labor&nbsp;</span><br />\r\n<span style="background-color:#ffffff; color:#333333">Torch of Wisdom brightly shining on her life journey&nbsp;</span><br />\r\n<span style="background-color:#ffffff; color:#333333">Arise and Pride let celebrate for thy great mission&nbsp;</span><br />\r\n<span style="background-color:#ffffff; color:#333333">Living Faith, hope, love and righteousness&nbsp;</span><br />\r\n<span style="background-color:#ffffff; color:#333333">Stride onward behold nation&#39;s gaze we are united&nbsp;</span><br />\r\n<br />\r\n<span style="background-color:#ffffff; color:#333333">For all thy love and glorious deeds we honor&nbsp;</span><br />\r\n<span style="background-color:#ffffff; color:#333333">Our alma mater PNHS&nbsp;</span><br />\r\n<span style="background-color:#ffffff; color:#333333">Our alma mater PNHS</span></span></span></p>\r\n'),
(5, 'high school', '<p><span style="font-size:16px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>Grade 7</strong><br />\r\n<br />\r\n<strong>(STEC)</strong><br />\r\nEdukasyon sa Pagpapahalaga<br />\r\nFilipino<br />\r\nMAPEH<br />\r\nMathematics<br />\r\nEnglish<br />\r\nScience<br />\r\nResearch<br />\r\nEnhanced Mathematics<br />\r\nEnhanced Science<br />\r\nAraling Panlipunan<br />\r\n<br />\r\n<strong>(SPA)</strong><br />\r\nSpecialization<br />\r\nEnglish<br />\r\nFilipino<br />\r\nMAPEH<br />\r\nAraling Panlipunan<br />\r\nTLE<br />\r\nMathematics<br />\r\nScience<br />\r\nEnhanced Mathematics<br />\r\nEnhanced English<br />\r\nEnhanced Science<br />\r\n<br />\r\n<strong>(BEC)</strong><br />\r\nFilipino<br />\r\nScience<br />\r\nTLE<br />\r\nAraling Panlipunan<br />\r\nMAPEH<br />\r\nMathematics<br />\r\nEnglish<br />\r\nEdukasyon sa Pagpapahalaga<br />\r\n<br />\r\n<br />\r\n<strong>Grade 8</strong><br />\r\n<br />\r\n<strong>(STEC)</strong><br />\r\nEdukasyon sa Pagpapahalaga<br />\r\nFilipino<br />\r\nMAPEH<br />\r\nMathematics<br />\r\nEnglish<br />\r\nScience<br />\r\nResearch<br />\r\nEnhanced Mathematics<br />\r\nEnhanced Science<br />\r\nAraling Panlipunan<br />\r\n<br />\r\n<strong>(SPA)</strong><br />\r\nSpecialization<br />\r\nEnglish<br />\r\nFilipino<br />\r\nMAPEH<br />\r\nAraling Panlipunan<br />\r\nTLE<br />\r\nMathematics<br />\r\nScience<br />\r\nEnhanced Science<br />\r\n<br />\r\n<strong>(BEC)</strong><br />\r\nFilipino<br />\r\nScience<br />\r\nTLE<br />\r\nAraling Panlipunan<br />\r\nMAPEH<br />\r\nMathematics<br />\r\nEnglish<br />\r\nEdukasyon sa Pagpapahalaga<br />\r\n<br />\r\n<br />\r\n<strong>Grade 9</strong><br />\r\n<br />\r\n<strong>(STEC)</strong><br />\r\nEdukasyon sa Pagpapahalaga<br />\r\nFilipino<br />\r\nMAPEH<br />\r\nMathematics<br />\r\nEnglish<br />\r\nScience<br />\r\nResearch<br />\r\nEnhanced Mathematics<br />\r\nEnhanced Science<br />\r\nAraling Panlipunan<br />\r\n<br />\r\n<strong>(SPA)</strong><br />\r\nSpecialization<br />\r\nEnglish<br />\r\nFilipino<br />\r\nMAPEH<br />\r\nAraling Panlipunan<br />\r\nTLE<br />\r\nMathematics<br />\r\nScience<br />\r\nEnhanced Science<br />\r\n<br />\r\n<strong>(BEC)</strong><br />\r\nFilipino<br />\r\nScience<br />\r\nTLE<br />\r\nAraling Panlipunan<br />\r\nMAPEH<br />\r\nMathematics<br />\r\nEnglish<br />\r\nEdukasyon sa Pagpapahalaga<br />\r\n<br />\r\n<br />\r\n<strong>Grade 10</strong><br />\r\n<br />\r\n<strong>(STEC)</strong><br />\r\nEdukasyon sa Pagpapahalaga<br />\r\nFilipino<br />\r\nMAPEH<br />\r\nMathematics<br />\r\nEnglish<br />\r\nScience<br />\r\nResearch<br />\r\nEnhanced Mathematics<br />\r\nEnhanced Science<br />\r\nAraling Panlipunan<br />\r\n<br />\r\n<strong>(SPA)</strong><br />\r\nSpecialization<br />\r\nEnglish<br />\r\nFilipino<br />\r\nMAPEH<br />\r\nAraling Panlipunan<br />\r\nTLE<br />\r\nMathematics<br />\r\nScience<br />\r\nEnhanced Science<br />\r\n<br />\r\n<strong>(BEC)</strong><br />\r\nFilipino<br />\r\nScience<br />\r\nTLE<br />\r\nAraling Panlipunan<br />\r\nMAPEH<br />\r\nMathematics<br />\r\nEnglish<br />\r\nEdukasyon sa Pagpapahalaga</span></span></p>\r\n'),
(6, 'senior high school', '<p><span style="font-size:16px"><strong>BREAD AND PASTRY PRODUCTION</strong><br />\n<br />\nCourse Description:<br />\n<br />\nThis curriculum guide on Bread and Pastry Production course leads to National Certificate Level II (NC II). This course is designed for high school student to develop knowledge, skills, and attitude to perform the tasks on Bread and Pastry Production. It covers core competencies namely:<br />\n<br />\n1.) prepare and produce bakery products;<br />\n2.) prepare and produce pastry products;<br />\n3.) prepare and present gateau, tortes and cakes;<br />\n4.) prepare and display petit fours and<br />\n5.) present deserts.<br />\n<br />\nThe preliminaries of this specialization course includes the following:<br />\n* Explain core concepts in bread &amp; pastry production;<br />\n* Discuss the relevance of the course<br />\n* Explore on opportunities for a Baker or Commis as a career.<br />\n<br />\n<br />\n<strong>COOKERY</strong><br />\n<br />\nCourse Description:<br />\n<br />\nThis curriculum guide is an exploratory course in Cookery, which leads to National Certificate Level II (NC II). It covers five common competencies that a high school student ought to possess, namely:<br />\n<br />\n1.) knowledge of the use of tools, equipment, and paraphernalia;<br />\n2.) maintenance of tools, equipment, and paraphernalia;<br />\n3.) performance of mensuration and calculation;<br />\n4.) interpretation of technical drawings and plans; and<br />\n5.) the practice of Occupational Health and Safety Procedures (OHSP).<br />\n<br />\nThe preliminaries of this exploratory course include the following:<br />\n* discussion on the relevance of the course;<br />\n* explanation of key concepts relative to the course, and<br />\n* exploration of career opportunities<br />\n<br />\n<br />\n<strong>Computer Systems Servicing</strong><br />\n<br />\nCourse Description<br />\n<br />\nThis is an introductory course that leads to a Computer Systems Servicing National Certificate Level II (NC II). It covers seven (7) common competencies that a student ought to possess:<br />\n<br />\n1.) application of quality standards,<br />\n2.) computer operations;<br />\n3.) performing mensuration and calculation;<br />\n4.) preparation and interpretation of technical drawing;<br />\n5.) the use of hand tools;<br />\n6.) terminating and connecting electrical wiring and electronics circuits; and<br />\n7.) testing electronics components; and four (4) core competencies, namely,<br />\n* installing and configuring computer systems,<br />\n* setting up computer networks<br />\n* setting up computer servers, and<br />\n* maintaining and repairing computer systems and networks.<br />\n<br />\n<strong>AUTOMOTIVE SERVICING NC II</strong><br />\n<br />\n(320 hours) K to 12 Industrial Arts &ndash; Automotive Servicing (NC II) Curriculum Guide May 2016 *LO-Learning Outcomes STVEP Schools may cover more competencies in a week Page 5 of 36 Prerequisite: Automotive Servicing NC I<br />\n<br />\nCourse Description:<br />\n<br />\nThis course is designed to enhance the knowledge, skills and attitudes of an individual in the field of Automotive Servicing in accordance with industry standards. It covers the remaining core competencies which are not included in Automotive Servicing (NC I) such as: servicing automotive battery, servicing ignition system, testing and repairing wiring/lighting system, servicing starting system, servicing charging system, servicing engine mechanical system, servicing clutch system, servicing clutch and differential and front axle, servicing steering system, servicing brake system, servicing suspension system, performing underchassis preventive maintenance and overhauling manual transmission.<br />\n<br />\n<strong>Electrical Installation and Maintenance</strong><br />\n<br />\nCourse Description:<br />\n<br />\nThis is an exploratory and introductory course which leads to an Electrical Installation and Maintenance National Certificate Level II (NC II). It covers five common competencies that the Grade 7/Grade 8 Technology and Livelihood Education (TLE) student ought to possess:<br />\n1.) using tools, equipment and paraphernalia,<br />\n2.) performing mensuration and calculation,<br />\n3.) practicing Occupational Health and Safety (OHS) procedures,<br />\n4.) maintaining tools, equipment and paraphernalia, and<br />\n5.) interpreting technical drawing and plans.</span></p>\n'),
(7, 'contacts', '<p><span style="font-size:16px">pagasanhs001@gmail.com<br />\r\nTel: 482-0060</span><br />\r\n&nbsp;</p>\r\n'),
(8, 'calendar', 'https://calendar.google.com/calendar/embed?src=4o0rdksh4farmaithk4v2pmr14%40group.calendar.google.com&ctz=Asia/Manila');

-- --------------------------------------------------------

--
-- Table structure for table `cms_site_feedback`
--

CREATE TABLE IF NOT EXISTS `cms_site_feedback` (
  `cms_feedback_ID` int(11) NOT NULL,
  `cms_site_feedback_name` varchar(45) NOT NULL,
  `cms_site_feedback_email` varchar(45) NOT NULL,
  `cms_site_feedback_phone` varchar(20) NOT NULL,
  `cms_site_feedback_content` longtext NOT NULL,
  `cms_site_feedback_time` time NOT NULL,
  `cms_site_feedback_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=404 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_site_feedback`
--

INSERT INTO `cms_site_feedback` (`cms_feedback_ID`, `cms_site_feedback_name`, `cms_site_feedback_email`, `cms_site_feedback_phone`, `cms_site_feedback_content`, `cms_site_feedback_time`, `cms_site_feedback_date`) VALUES
(203, 'name', 'bibendum@accumsan.co.uk', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur', '16:16:49', '2017-12-25'),
(205, 'name', 'In.nec@amifringilla.co.uk', '2147483647', 'Lorem ipsum', '10:09:10', '2017-06-04'),
(208, 'name', 'at@sapien.ca', '2147483647', 'Lorem', '09:39:52', '2017-11-09'),
(209, 'name', 'erat.Vivamus.nisi@rutrumloremac.ca', '2147483647', 'Lorem ipsum dolor sit', '14:35:50', '2017-12-16'),
(214, 'name', 'risus.Duis.a@ullamcorper.edu', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer', '13:41:37', '2017-10-16'),
(215, 'name', 'mauris.blandit.mattis@auctorquistristique.edu', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor.', '20:58:22', '2017-07-26'),
(219, 'name', 'ac@amet.ca', '2147483647', 'Lorem ipsum', '19:02:19', '2017-08-27'),
(221, 'name', 'lorem.Donec.elementum@auguescelerisquemollis.', '2147483647', 'Lorem ipsum dolor sit', '13:29:33', '2017-07-14'),
(222, 'name', 'molestie@nec.edu', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor.', '19:41:51', '2017-06-19'),
(224, 'name', 'odio@euismodin.edu', '2147483647', 'Lorem ipsum dolor', '00:19:34', '2017-03-24'),
(225, 'name', 'ut.nisi@dignissimtempor.org', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing', '10:40:28', '2017-04-27'),
(226, 'name', 'sit.amet@etultricesposuere.edu', '2147483647', 'Lorem ipsum', '11:06:04', '2017-05-09'),
(228, 'name', 'magna.tellus.faucibus@etrisus.edu', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing', '07:12:38', '2017-12-06'),
(230, 'name', 'vehicula@nuncullamcorpereu.org', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing', '13:55:36', '2018-01-29'),
(231, 'name', 'nascetur@ridiculusmus.edu', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed', '14:16:54', '2017-12-29'),
(233, 'name', 'parturient.montes.nascetur@Loremipsum.org', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus.', '14:30:32', '2017-12-12'),
(234, 'name', 'Pellentesque@estac.co.uk', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam', '19:30:10', '2017-07-30'),
(237, 'name', 'lectus@Praesent.edu', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu', '20:39:03', '2017-04-20'),
(239, 'name', 'a.magna@euismodacfermentum.com', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu', '11:34:33', '2017-05-08'),
(242, 'name', 'metus.vitae.velit@tellusjustosit.com', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut', '13:05:01', '2017-08-14'),
(244, 'name', 'et.libero.Proin@ut.ca', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur', '22:33:41', '2018-01-10'),
(245, 'name', 'a.magna@utnulla.edu', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor.', '16:43:29', '2017-08-05'),
(247, 'name', 'ante.lectus.convallis@penatibus.org', '2147483647', 'Lorem', '18:02:09', '2017-04-20'),
(249, 'name', 'dolor.Nulla@malesuada.org', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec', '08:31:56', '2017-04-13'),
(256, 'name', 'vestibulum@Phasellus.com', '2147483647', 'Lorem ipsum', '21:46:31', '2017-10-10'),
(257, 'name', 'nunc.sed.pede@lobortistellus.net', '2147483647', 'Lorem ipsum', '09:49:46', '2017-11-07'),
(260, 'name', 'sagittis.Nullam@actellusSuspendisse.ca', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec', '17:32:49', '2017-05-27'),
(261, 'name', 'netus.et@parturientmontesnascetur.com', '2147483647', 'Lorem', '13:49:29', '2017-05-19'),
(262, 'name', 'blandit@egestaslaciniaSed.com', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam', '01:56:49', '2017-06-03'),
(263, 'name', 'Curabitur@lectusantedictum.co.uk', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor.', '20:25:58', '2017-12-22'),
(264, 'name', 'Nulla.interdum.Curabitur@mi.co.uk', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur', '12:33:25', '2017-09-26'),
(266, 'name', 'pede@rutrumurna.net', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer', '12:13:14', '2018-03-15'),
(267, 'name', 'Nunc@tempor.com', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu', '12:35:30', '2018-01-07'),
(268, 'name', 'ipsum@duinectempus.org', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam', '20:15:24', '2017-09-23'),
(271, 'name', 'ligula.tortor@sed.com', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam', '21:57:34', '2017-09-18'),
(272, 'name', 'ac@aliquetlobortisnisi.ca', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer', '21:14:19', '2018-01-03'),
(279, 'name', 'nulla@vulputatelacus.ca', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', '18:29:49', '2017-08-03'),
(280, 'name', 'nunc.In.at@idnunc.ca', '2147483647', 'Lorem ipsum dolor sit', '21:30:52', '2017-12-06'),
(281, 'name', 'Curae@utpellentesque.ca', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam', '19:32:16', '2017-04-03'),
(282, 'name', 'Donec.egestas@semmagna.ca', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed', '00:23:23', '2017-09-19'),
(284, 'name', 'arcu.Vestibulum.ut@Donecvitaeerat.net', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor.', '20:40:52', '2017-12-14'),
(292, 'name', 'eleifend.nec.malesuada@montesnascetur.com', '2147483647', 'Lorem ipsum dolor sit amet,', '09:38:00', '2017-11-05'),
(293, 'name', 'sollicitudin@odiotristique.ca', '2147483647', 'Lorem ipsum dolor sit', '06:59:40', '2017-03-29'),
(295, 'name', 'lacus.vestibulum.lorem@nisiMaurisnulla.com', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur', '02:14:34', '2018-02-05'),
(298, 'name', 'metus.Vivamus.euismod@magnaNamligula.com', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus.', '23:14:08', '2018-02-25'),
(299, 'name', 'Fusce.mollis@Donecelementum.ca', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec', '00:01:34', '2017-10-18'),
(302, 'Molly', 'adipiscing@cursusInteger.co.uk', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce', '18:50:03', '2017-06-19'),
(303, 'Derek', 'non.justo.Proin@Donecporttitor.co.uk', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc', '03:33:31', '2017-05-13'),
(305, 'Elijah', 'pede.et.risus@Donec.edu', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum.', '08:07:27', '2017-07-12'),
(308, 'Rose', 'parturient@faucibusMorbi.com', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae,', '19:04:20', '2017-05-03'),
(309, 'Keelie', 'vestibulum.neque.sed@at.com', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam,', '22:29:05', '2017-04-03'),
(310, 'Raphael', 'mattis@nullaDonec.co.uk', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci.', '22:12:13', '2017-05-03'),
(312, 'Shea', 'eu@pede.ca', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at,', '02:53:55', '2017-08-05'),
(316, 'Zahir', 'Nunc.pulvinar.arcu@auctor.edu', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus dapibus quam quis diam. Pellentesque habitant', '02:11:17', '2017-10-15'),
(317, 'Angela', 'ultricies@Cras.org', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus.', '18:01:01', '2017-11-09'),
(318, 'Kaitlin', 'et.ultrices.posuere@massaVestibulum.com', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque', '01:09:32', '2018-02-08'),
(319, 'Medge', 'nulla.Donec@euismodestarcu.edu', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla', '07:32:20', '2017-11-27'),
(323, 'Kirk', 'interdum.Sed@ipsum.org', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas', '21:43:57', '2017-10-26'),
(326, 'Grace', 'Suspendisse.eleifend.Cras@tellus.com', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero', '00:46:32', '2017-05-01'),
(328, 'Reed', 'Quisque.porttitor@velturpisAliquam.com', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed', '04:51:33', '2017-05-03'),
(329, 'Wayne', 'tortor.at.risus@enimcondimentum.org', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus', '19:02:14', '2017-11-21'),
(331, 'Willa', 'quam.elementum@tincidunt.ca', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque', '18:38:16', '2017-09-27'),
(333, 'Jolie', 'Aenean@ipsumDonec.co.uk', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed,', '12:01:42', '2017-05-01'),
(336, 'Lars', 'felis.purus@maurisSuspendissealiquet.co.uk', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus dapibus quam quis diam. Pellentesque habitant', '12:10:45', '2017-07-20'),
(337, 'Sawyer', 'neque.tellus.imperdiet@quam.co.uk', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus dapibus', '05:04:31', '2018-03-06'),
(338, 'Leah', 'a.nunc.In@odio.ca', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis', '11:28:28', '2018-02-06'),
(339, 'Abigail', 'ornare@venenatis.co.uk', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae,', '05:28:54', '2017-04-16'),
(343, 'Noah', 'Nunc.ut@risusDuisa.co.uk', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus dapibus', '08:22:25', '2017-07-17'),
(344, 'Ethan', 'netus.et.malesuada@tortorNunc.com', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor', '03:14:05', '2017-05-30'),
(353, 'Luke', 'dictum@PhasellusornareFusce.com', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu,', '11:45:23', '2018-02-27'),
(355, 'Alfonso', 'commodo.at@velarcu.co.uk', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis.', '05:55:49', '2018-03-13'),
(356, 'Nyssa', 'Fusce.mollis.Duis@Suspendissealiquetmolestie.', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt', '13:52:45', '2017-12-01'),
(358, 'Hayden', 'egestas.rhoncus@Phasellusvitae.org', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae,', '22:41:10', '2017-11-16'),
(359, 'Montana', 'sociis.natoque@posuereatvelit.ca', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas', '04:46:42', '2018-02-13'),
(361, 'Maxine', 'sodales.elit@Suspendissealiquet.ca', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris,', '02:11:38', '2018-02-07'),
(362, 'Kenneth', 'metus@Integerurna.org', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus dapibus quam quis diam. Pellentesque habitant morbi', '21:54:28', '2017-07-25'),
(364, 'Karen', 'erat.Vivamus.nisi@ante.edu', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis', '10:15:55', '2017-09-23'),
(366, 'Alexis', 'elit.Etiam.laoreet@duiCumsociis.org', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis', '07:21:21', '2017-11-09'),
(367, 'Warren', 'non.feugiat.nec@semmolestie.co.uk', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus dapibus quam quis diam. Pellentesque', '05:41:41', '2017-06-17'),
(369, 'Candace', 'turpis.Nulla.aliquet@aptenttacitisociosqu.org', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed,', '00:28:15', '2017-05-31'),
(370, 'Teagan', 'sodales@Cras.com', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula', '21:12:49', '2017-06-27'),
(371, 'Paul', 'nibh.enim@mollisnon.co.uk', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla', '21:39:34', '2018-03-02'),
(372, 'Zachery', 'mollis@facilisis.com', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas', '20:38:06', '2017-11-29'),
(373, 'Regan', 'cursus.Integer@dolorQuisquetincidunt.com', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget', '08:33:14', '2018-02-01'),
(374, 'Gil', 'Suspendisse.eleifend.Cras@Nuncsed.org', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas', '10:46:58', '2017-11-13'),
(375, 'Imogene', 'ac.arcu.Nunc@anteMaecenas.co.uk', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum', '04:36:45', '2018-01-16'),
(377, 'Kaden', 'Etiam.vestibulum@atlacus.org', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu', '09:13:18', '2017-05-23'),
(378, 'Emerson', 'Duis.cursus.diam@primisinfaucibus.net', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce', '00:37:43', '2017-11-25'),
(379, 'Stephanie', 'turpis.Aliquam.adipiscing@tellusnon.ca', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus dapibus quam quis diam.', '08:20:10', '2017-06-06'),
(381, 'Brandon', 'dictum@scelerisquenequesed.org', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu', '20:15:39', '2017-06-14'),
(382, 'Hector', 'Quisque@semsempererat.ca', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque', '11:47:42', '2018-01-07'),
(383, 'Amity', 'Duis.sit@metusAliquamerat.co.uk', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus dapibus quam', '08:55:48', '2017-07-02'),
(384, 'Wylie', 'elit.pede@gravidamauris.co.uk', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis.', '17:51:18', '2017-04-01'),
(385, 'Arsenio', 'non@Fusce.net', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum', '08:48:26', '2017-03-17'),
(386, 'Brady', 'in.lobortis@Phasellus.com', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut', '12:05:26', '2017-11-07'),
(388, 'Heidi', 'ac.mi.eleifend@vel.edu', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu,', '13:31:22', '2018-01-17'),
(389, 'Galena', 'ornare.elit@egestaslaciniaSed.net', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at,', '13:15:22', '2017-08-07'),
(390, 'Amethyst', 'magna.Sed.eu@elit.com', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque', '10:49:07', '2017-12-02'),
(391, 'Emerald', 'eget.varius@mollisvitae.co.uk', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae,', '16:32:11', '2018-01-11'),
(395, 'Christian', 'purus.accumsan@erat.org', '2147483647', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus.', '19:36:48', '2018-02-08'),
(400, 'harris quirona', '', '9', 'huehuehuehuehuehuheuheuheuhuehue', '00:11:54', '2018-03-15'),
(401, 'visitor', 'visitor@visitor.com', '9', 'visitor visitor visitor visitor visitor visitor visitor visitor visitor visitor visitor visitor', '00:33:31', '2018-03-15'),
(402, 'Bon Audrey Roda', 'bonaudrey.roda@bicol-u.edu.ph', '2147483647', 'This makes things easier for me. I love your site!', '18:59:42', '2018-03-17'),
(403, 'test', 'test@test', '09090909090', 'test', '03:03:51', '2018-04-03');

-- --------------------------------------------------------

--
-- Table structure for table `cms_viewcount`
--

CREATE TABLE IF NOT EXISTS `cms_viewcount` (
  `cms_viewcount_ID` int(10) unsigned NOT NULL,
  `cms_viewcount_page` varchar(150) NOT NULL,
  `cms_viewcount_views` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_viewcount`
--

INSERT INTO `cms_viewcount` (`cms_viewcount_ID`, `cms_viewcount_page`, `cms_viewcount_views`) VALUES
(1, 'index', 4539);

-- --------------------------------------------------------

--
-- Table structure for table `css_credentials`
--

CREATE TABLE IF NOT EXISTS `css_credentials` (
  `cred_id` int(10) unsigned NOT NULL,
  `emp_rec_id` int(10) unsigned NOT NULL,
  `cred_title` enum('Major','Minor','Related') NOT NULL,
  `subject_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `css_credentials`
--

INSERT INTO `css_credentials` (`cred_id`, `emp_rec_id`, `cred_title`, `subject_id`) VALUES
(1, 16, 'Major', 50001),
(2, 13, 'Major', 50002),
(3, 18, 'Major', 50003),
(4, 19, 'Major', 50003),
(5, 20, 'Major', 50004),
(6, 21, 'Major', 50006),
(7, 22, 'Major', 50007),
(8, 3, 'Major', 50011),
(9, 23, 'Major', 50013),
(10, 26, 'Major', 50001),
(11, 27, 'Major', 50003),
(12, 19, 'Minor', 50001),
(13, 27, 'Related', 50001),
(34, 46, 'Major', 50001),
(35, 46, 'Minor', 50013),
(36, 46, 'Related', 50004),
(37, 13, 'Related', 50006),
(38, 16, 'Related', 50002),
(39, 2, 'Minor', 50004),
(40, 18, 'Related', 50004),
(41, 2, 'Major', 50006),
(42, 17, 'Major', 50006),
(43, 13, 'Minor', 50004),
(44, 16, 'Minor', 50013),
(45, 2, 'Related', 50007),
(46, 17, 'Minor', 50003),
(47, 17, 'Related', 50011),
(48, 18, 'Minor', 50011),
(49, 20, 'Minor', 50002),
(50, 39, 'Major', 50007),
(51, 40, 'Major', 50002),
(52, 9, 'Major', 50003),
(53, 47, 'Major', 50006),
(54, 44, 'Major', 50007),
(55, 9, 'Minor', 50013),
(56, 41, 'Minor', 50013),
(57, 45, 'Major', 50013),
(58, 22, 'Minor', 50011),
(59, 19, 'Related', 50013),
(60, 20, 'Related', 50011),
(61, 21, 'Minor', 50007),
(62, 22, 'Related', 50001),
(63, 3, 'Minor', 50001),
(64, 3, 'Related', 50002),
(65, 41, 'Major', 50001),
(66, 43, 'Minor', 50001),
(67, 43, 'Major', 50002),
(68, 27, 'Major', 50007),
(69, 11, 'Major', 50011),
(70, 35, 'Minor', 50011),
(71, 11, 'Minor', 50003),
(72, 6, 'Minor', 50003),
(73, 34, 'Major', 50004),
(74, 28, 'Minor', 50002),
(75, 28, 'Major', 50006),
(76, 22, 'Major', 50003);

-- --------------------------------------------------------

--
-- Table structure for table `css_loads`
--

CREATE TABLE IF NOT EXISTS `css_loads` (
  `emp_rec_id` int(10) unsigned NOT NULL,
  `max_load` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `css_loads`
--

INSERT INTO `css_loads` (`emp_rec_id`, `max_load`) VALUES
(13, 7),
(16, 6),
(2, 6),
(18, 5);

-- --------------------------------------------------------

--
-- Table structure for table `css_schedule`
--

CREATE TABLE IF NOT EXISTS `css_schedule` (
  `SCHED_ID` int(11) unsigned NOT NULL,
  `subject_id` int(10) unsigned NOT NULL,
  `emp_rec_id` int(10) unsigned NOT NULL,
  `sy_id` int(11) unsigned NOT NULL,
  `section_id` int(10) unsigned NOT NULL,
  `DAY` varchar(45) NOT NULL,
  `TIME_START` time DEFAULT NULL,
  `TIME_END` time DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `css_schedule`
--

INSERT INTO `css_schedule` (`SCHED_ID`, `subject_id`, `emp_rec_id`, `sy_id`, `section_id`, `DAY`, `TIME_START`, `TIME_END`) VALUES
(2, 50001, 2, 8, 13, 'M', '06:30:00', '08:10:00'),
(31, 50003, 23, 8, 9, 'regular', '07:20:00', '08:10:00'),
(33, 50002, 26, 8, 13, 'regular', '07:20:00', '08:10:00'),
(35, 50001, 21, 8, 21, 'regular', '01:20:00', '02:10:00'),
(38, 50004, 3, 8, 13, 'regular', '09:10:00', '10:00:00'),
(40, 50007, 23, 8, 13, 'regular', '08:10:00', '09:00:00'),
(42, 50003, 23, 8, 13, 'regular', '09:10:00', '10:00:00'),
(43, 50013, 1, 8, 13, 'regular', '10:00:00', '10:50:00'),
(44, 50006, 26, 8, 13, 'regular', '10:50:00', '11:40:00'),
(45, 50001, 26, 8, 14, 'M-W-F', '06:30:00', '07:20:00'),
(46, 50002, 26, 8, 14, 'T-Th', '06:30:00', '07:20:00'),
(47, 50004, 22, 8, 14, 'regular', '07:20:00', '08:10:00'),
(49, 50006, 22, 8, 14, 'regular', '08:10:00', '09:00:00'),
(52, 50003, 23, 8, 14, 'regular', '10:00:00', '10:50:00'),
(54, 50013, 1, 8, 14, 'regular', '11:40:00', '12:30:00'),
(55, 50001, 21, 8, 20, 'M-T-W', '06:30:00', '07:20:00'),
(56, 50004, 3, 8, 20, 'regular', '07:20:00', '08:10:00'),
(59, 50013, 1, 8, 20, 'regular', '09:10:00', '10:00:00'),
(60, 50006, 23, 8, 20, 'regular', '10:50:00', '11:40:00'),
(61, 50003, 23, 8, 20, 'regular', '11:40:00', '12:30:00'),
(62, 50003, 23, 8, 8, 'regular', '08:10:00', '09:00:00'),
(65, 50001, 16, 7, 146, 'regular', '07:20:00', '08:10:00'),
(66, 50002, 13, 7, 148, 'regular', '06:30:00', '07:20:00'),
(68, 50006, 21, 8, 8, 'regular', '07:20:00', '08:10:00'),
(69, 50007, 22, 8, 8, 'regular', '09:10:00', '10:00:00'),
(73, 50002, 46, 8, 8, 'regular', '06:30:00', '07:20:00'),
(74, 50002, 46, 8, 9, 'regular', '08:10:00', '09:00:00'),
(75, 50001, 19, 8, 10, 'M-W-F', '06:30:00', '07:20:00'),
(77, 50002, 46, 8, 22, 'regular', '12:30:00', '01:20:00'),
(78, 50002, 13, 8, 32, 'regular', '06:30:00', '07:20:00'),
(79, 50006, 21, 8, 47, 'regular', '02:10:00', '03:00:00'),
(80, 50013, 23, 8, 44, 'regular', '03:10:00', '04:00:00'),
(97, 50001, 16, 8, 8, 'T-W', '10:00:00', '10:50:00'),
(151, 50011, 22, 8, 13, 'W', '12:30:00', '01:20:00'),
(157, 50006, 21, 15, 327, 'regular', '06:30:00', '07:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `css_school_yr`
--

CREATE TABLE IF NOT EXISTS `css_school_yr` (
  `sy_id` int(15) unsigned NOT NULL,
  `year` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `css_school_yr`
--

INSERT INTO `css_school_yr` (`sy_id`, `year`, `status`) VALUES
(4, '2016-2017', 'inactive'),
(5, '2013-2014', 'inactive'),
(6, '2014-2015', 'inactive'),
(7, '2015-2016', 'inactive'),
(8, '2017-2018', 'active'),
(15, '2019-2020', 'used');

-- --------------------------------------------------------

--
-- Table structure for table `css_section`
--

CREATE TABLE IF NOT EXISTS `css_section` (
  `SECTION_ID` int(11) unsigned NOT NULL,
  `SECTION_NAME` varchar(45) NOT NULL,
  `YEAR_LEVEL` int(11) unsigned NOT NULL,
  `room_no` int(10) unsigned DEFAULT NULL,
  `emp_rec_id` int(10) unsigned DEFAULT NULL,
  `sy_id` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=374 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `css_section`
--

INSERT INTO `css_section` (`SECTION_ID`, `SECTION_NAME`, `YEAR_LEVEL`, `room_no`, `emp_rec_id`, `sy_id`) VALUES
(8, 'STEC', 7, 122, 21, 8),
(9, 'SPA', 7, 0, NULL, 8),
(10, 'ARTISTRY', 7, 0, NULL, 8),
(11, 'BENEVOLENCE', 7, 0, NULL, 8),
(12, 'CHASTITY', 7, 0, NULL, 8),
(13, 'DILIGENCE', 7, 101, 2, 8),
(14, 'EFFECTIVENESS', 7, 0, NULL, 8),
(15, 'FIDELITY', 7, 0, NULL, 8),
(16, 'GENEROSITY', 7, 0, NULL, 8),
(17, 'HUMILITY', 7, 0, NULL, 8),
(18, 'INTEGRITY', 7, 0, NULL, 8),
(19, 'JUSTICE', 7, 0, NULL, 8),
(20, 'KNOWLEDGE', 7, 0, NULL, 8),
(21, 'STEC', 8, 0, NULL, 8),
(22, 'SPA', 8, 0, NULL, 8),
(23, 'ATHENA', 8, 0, NULL, 8),
(24, 'BELLEREPHONE', 8, 0, NULL, 8),
(25, 'CHIRON', 8, 0, NULL, 8),
(26, 'DAEDALUS', 8, 0, 22, 8),
(27, 'EROS', 8, 0, NULL, 8),
(28, 'FATES', 8, 0, NULL, 8),
(29, 'GALATEA', 8, 0, NULL, 8),
(30, 'HERCULES', 8, 0, NULL, 8),
(31, 'IRIS', 8, 0, NULL, 8),
(32, 'STEC', 9, 0, NULL, 8),
(33, 'SPA', 9, 0, NULL, 8),
(34, 'AUSTRALIA', 9, 0, NULL, 8),
(35, 'BRAZIL', 9, 0, NULL, 8),
(36, 'CANADA', 9, 0, NULL, 8),
(37, 'DENMARK', 9, 0, NULL, 8),
(38, 'ENGLAND', 9, 0, NULL, 8),
(39, 'FRANCE', 9, 0, NULL, 8),
(40, 'GERMANY', 9, 0, NULL, 8),
(41, 'HONGKONG', 9, 0, NULL, 8),
(42, 'STEC', 10, 0, NULL, 8),
(43, 'SPA', 10, 0, NULL, 8),
(44, 'BIOLOGIST', 10, 0, NULL, 8),
(45, 'CHEF', 10, 0, NULL, 8),
(46, 'DOCTOR', 10, 0, NULL, 8),
(47, 'ENGINEER', 10, 0, NULL, 8),
(48, 'FLORIST', 10, 0, NULL, 8),
(49, 'GEOLOGIST', 10, 0, NULL, 8),
(50, 'HOTELLER', 10, 0, NULL, 8),
(51, 'INSTRUCTOR', 10, 0, NULL, 8),
(96, '1311313', 9, 0, NULL, 8),
(146, 'STEC', 7, 123, 16, 8),
(147, 'SPA', 7, NULL, NULL, 7),
(148, 'ARTISTRY', 7, NULL, NULL, 7),
(149, 'BENEVOLENCE', 7, NULL, NULL, 7),
(150, 'CHASTITY', 7, NULL, NULL, 7),
(151, 'DILIGENCE', 7, NULL, NULL, 7),
(152, 'EFFECTIVENESS', 7, NULL, NULL, 7),
(153, 'FIDELITY', 7, NULL, NULL, 7),
(154, 'GENEROSITY', 7, NULL, NULL, 7),
(155, 'HUMILITY', 7, NULL, NULL, 7),
(156, 'INTEGRITY', 7, NULL, NULL, 7),
(157, 'JUSTICE', 7, NULL, NULL, 7),
(158, 'KNOWLEDGE', 7, NULL, NULL, 7),
(159, 'STEC', 8, NULL, NULL, 7),
(160, 'SPA', 8, NULL, NULL, 7),
(161, 'ATHENA', 8, NULL, NULL, 7),
(162, 'BELLEREPHONE', 8, NULL, NULL, 7),
(163, 'CHIRON', 8, NULL, NULL, 7),
(164, 'DAEDALUS', 8, NULL, NULL, 7),
(165, 'EROS', 8, NULL, NULL, 7),
(166, 'FATES', 8, NULL, NULL, 7),
(167, 'GALATEA', 8, NULL, NULL, 7),
(168, 'HERCULES', 8, NULL, NULL, 7),
(169, 'IRIS', 8, NULL, NULL, 7),
(170, 'STEC', 9, NULL, NULL, 7),
(171, 'SPA', 9, NULL, NULL, 7),
(172, 'AUSTRALIA', 9, NULL, NULL, 7),
(173, 'BRAZIL', 9, NULL, NULL, 7),
(174, 'CANADA', 9, NULL, NULL, 7),
(175, 'DENMARK', 9, NULL, NULL, 7),
(176, 'ENGLAND', 9, NULL, NULL, 7),
(177, 'FRANCE', 9, NULL, NULL, 7),
(178, 'GERMANY', 9, NULL, NULL, 7),
(179, 'HONGKONG', 9, NULL, NULL, 7),
(180, 'STEC', 10, NULL, NULL, 7),
(181, 'SPA', 10, NULL, NULL, 7),
(182, 'BIOLOGIST', 10, NULL, NULL, 7),
(183, 'CHEF', 10, NULL, NULL, 7),
(184, 'DOCTOR', 10, NULL, NULL, 7),
(185, 'ENGINEER', 10, NULL, NULL, 7),
(186, 'FLORIST', 10, NULL, NULL, 7),
(187, 'GEOLOGIST', 10, NULL, NULL, 7),
(188, 'HOTELLER', 10, NULL, NULL, 7),
(189, 'INSTRUCTOR', 10, NULL, NULL, 7),
(190, '1311313', 9, NULL, NULL, 7),
(191, 'SPA', 7, 12, 13, 6),
(192, 'ARTISTRY', 7, NULL, NULL, 6),
(193, 'BENEVOLENCE', 7, NULL, NULL, 6),
(194, 'CHASTITY', 7, NULL, NULL, 6),
(195, 'DILIGENCE', 7, NULL, NULL, 6),
(196, 'EFFECTIVENESS', 7, NULL, NULL, 6),
(197, 'FIDELITY', 7, NULL, NULL, 6),
(198, 'GENEROSITY', 7, NULL, NULL, 6),
(199, 'HUMILITY', 7, NULL, NULL, 6),
(200, 'INTEGRITY', 7, NULL, NULL, 6),
(201, 'JUSTICE', 7, NULL, NULL, 6),
(202, 'KNOWLEDGE', 7, NULL, NULL, 6),
(203, 'STEC', 8, NULL, NULL, 6),
(204, 'SPA', 8, NULL, NULL, 6),
(205, 'ATHENA', 8, NULL, NULL, 6),
(206, 'BELLEREPHONE', 8, NULL, NULL, 6),
(207, 'CHIRON', 8, NULL, NULL, 6),
(208, 'DAEDALUS', 8, NULL, NULL, 6),
(209, 'EROS', 8, NULL, NULL, 6),
(210, 'FATES', 8, NULL, NULL, 6),
(211, 'GALATEA', 8, NULL, NULL, 6),
(212, 'HERCULES', 8, NULL, NULL, 6),
(213, 'IRIS', 8, NULL, NULL, 6),
(214, 'STEC', 9, NULL, NULL, 6),
(215, 'SPA', 9, NULL, NULL, 6),
(216, 'AUSTRALIA', 9, NULL, NULL, 6),
(217, 'BRAZIL', 9, NULL, NULL, 6),
(218, 'CANADA', 9, NULL, NULL, 6),
(219, 'DENMARK', 9, NULL, NULL, 6),
(220, 'ENGLAND', 9, NULL, NULL, 6),
(221, 'FRANCE', 9, NULL, NULL, 6),
(222, 'GERMANY', 9, NULL, NULL, 6),
(223, 'HONGKONG', 9, NULL, NULL, 6),
(224, 'STEC', 10, NULL, NULL, 6),
(225, 'SPA', 10, NULL, NULL, 6),
(226, 'BIOLOGIST', 10, NULL, NULL, 6),
(227, 'CHEF', 10, NULL, NULL, 6),
(228, 'DOCTOR', 10, NULL, NULL, 6),
(229, 'ENGINEER', 10, NULL, NULL, 6),
(230, 'FLORIST', 10, NULL, NULL, 6),
(231, 'GEOLOGIST', 10, NULL, NULL, 6),
(232, 'HOTELLER', 10, NULL, NULL, 6),
(233, 'INSTRUCTOR', 10, NULL, NULL, 6),
(234, '1311313', 9, NULL, NULL, 6),
(235, 'SPA', 7, NULL, NULL, 5),
(236, 'ARTISTRY', 7, NULL, NULL, 5),
(237, 'BENEVOLENCE', 7, NULL, NULL, 5),
(238, 'CHASTITY', 7, NULL, NULL, 5),
(239, 'DILIGENCE', 7, NULL, NULL, 5),
(240, 'EFFECTIVENESS', 7, NULL, NULL, 5),
(241, 'FIDELITY', 7, NULL, NULL, 5),
(242, 'GENEROSITY', 7, NULL, NULL, 5),
(243, 'HUMILITY', 7, NULL, NULL, 5),
(244, 'INTEGRITY', 7, NULL, NULL, 5),
(245, 'JUSTICE', 7, NULL, NULL, 5),
(246, 'KNOWLEDGE', 7, NULL, NULL, 5),
(247, 'STEC', 8, NULL, NULL, 5),
(248, 'SPA', 8, NULL, NULL, 5),
(249, 'ATHENA', 8, NULL, NULL, 5),
(250, 'BELLEREPHONE', 8, NULL, NULL, 5),
(251, 'CHIRON', 8, NULL, NULL, 5),
(252, 'DAEDALUS', 8, NULL, NULL, 5),
(253, 'EROS', 8, NULL, NULL, 5),
(254, 'FATES', 8, NULL, NULL, 5),
(255, 'GALATEA', 8, NULL, NULL, 5),
(256, 'HERCULES', 8, NULL, NULL, 5),
(257, 'IRIS', 8, NULL, NULL, 5),
(258, 'STEC', 9, NULL, NULL, 5),
(259, 'SPA', 9, NULL, NULL, 5),
(260, 'AUSTRALIA', 9, NULL, NULL, 5),
(261, 'BRAZIL', 9, NULL, NULL, 5),
(262, 'CANADA', 9, NULL, NULL, 5),
(263, 'DENMARK', 9, NULL, NULL, 5),
(264, 'ENGLAND', 9, NULL, NULL, 5),
(265, 'FRANCE', 9, NULL, NULL, 5),
(266, 'GERMANY', 9, NULL, NULL, 5),
(267, 'HONGKONG', 9, NULL, NULL, 5),
(268, 'STEC', 10, NULL, NULL, 5),
(269, 'SPA', 10, NULL, NULL, 5),
(270, 'BIOLOGIST', 10, NULL, NULL, 5),
(271, 'CHEF', 10, NULL, NULL, 5),
(272, 'DOCTOR', 10, NULL, NULL, 5),
(273, 'ENGINEER', 10, NULL, NULL, 5),
(274, 'FLORIST', 10, NULL, NULL, 5),
(275, 'GEOLOGIST', 10, NULL, NULL, 5),
(276, 'HOTELLER', 10, NULL, NULL, 5),
(277, 'INSTRUCTOR', 10, NULL, NULL, 5),
(278, '1311313', 9, NULL, NULL, 5),
(327, 'STEC', 7, 100, 13, 15),
(328, 'SPA', 7, NULL, NULL, 15),
(329, 'ARTISTRY', 7, NULL, NULL, 15),
(330, 'BENEVOLENCE', 7, NULL, NULL, 15),
(331, 'CHASTITY', 7, NULL, NULL, 15),
(332, 'DILIGENCE', 7, NULL, NULL, 15),
(333, 'EFFECTIVENESS', 7, NULL, NULL, 15),
(334, 'FIDELITY', 7, NULL, NULL, 15),
(335, 'GENEROSITY', 7, NULL, NULL, 15),
(336, 'HUMILITY', 7, NULL, NULL, 15),
(337, 'INTEGRITY', 7, NULL, NULL, 15),
(338, 'JUSTICE', 7, NULL, NULL, 15),
(339, 'KNOWLEDGE', 7, NULL, NULL, 15),
(340, 'STEC', 8, NULL, NULL, 15),
(341, 'SPA', 8, NULL, NULL, 15),
(342, 'ATHENA', 8, NULL, NULL, 15),
(343, 'BELLEREPHONE', 8, NULL, NULL, 15),
(344, 'CHIRON', 8, NULL, NULL, 15),
(345, 'DAEDALUS', 8, NULL, NULL, 15),
(346, 'EROS', 8, NULL, NULL, 15),
(347, 'FATES', 8, NULL, NULL, 15),
(348, 'GALATEA', 8, NULL, NULL, 15),
(349, 'HERCULES', 8, NULL, NULL, 15),
(350, 'IRIS', 8, NULL, NULL, 15),
(351, 'STEC', 9, NULL, NULL, 15),
(352, 'SPA', 9, NULL, NULL, 15),
(353, 'AUSTRALIA', 9, NULL, NULL, 15),
(354, 'BRAZIL', 9, NULL, NULL, 15),
(355, 'CANADA', 9, NULL, NULL, 15),
(356, 'DENMARK', 9, NULL, NULL, 15),
(357, 'ENGLAND', 9, NULL, NULL, 15),
(358, 'FRANCE', 9, NULL, NULL, 15),
(359, 'GERMANY', 9, NULL, NULL, 15),
(360, 'HONGKONG', 9, NULL, NULL, 15),
(361, 'STEC', 10, NULL, NULL, 15),
(362, 'SPA', 10, NULL, NULL, 15),
(363, 'CHEF', 10, NULL, NULL, 15),
(364, 'DOCTOR', 10, NULL, NULL, 15),
(365, 'ENGINEER', 10, NULL, NULL, 15),
(366, 'FLORIST', 10, NULL, NULL, 15),
(367, 'GEOLOGIST', 10, NULL, NULL, 15),
(368, 'HOTELLER', 10, NULL, NULL, 15),
(369, 'INSTRUCTOR', 10, NULL, NULL, 15),
(370, '1311313', 9, NULL, NULL, 15),
(371, 'BIOLOGIST', 10, NULL, NULL, 15),
(372, 'CHEMIST', 10, NULL, NULL, 15),
(373, 'IT', 7, 123, 21, 15);

-- --------------------------------------------------------

--
-- Table structure for table `css_subject`
--

CREATE TABLE IF NOT EXISTS `css_subject` (
  `subject_id` int(10) unsigned NOT NULL,
  `subject_name` varchar(45) NOT NULL,
  `sub_desc` varchar(100) NOT NULL,
  `dept_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=50016 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `css_subject`
--

INSERT INTO `css_subject` (`subject_id`, `subject_name`, `sub_desc`, `dept_id`) VALUES
(50001, 'AP', 'Araling Panlipunan', 5),
(50002, 'EsP', 'Edukasyon sa Pagpapakatao', 8),
(50003, 'Fil', 'Filipino', 3),
(50004, 'MAPEH', 'MAPEH', 6),
(50005, 'Enh. Sci.', 'Enhance Science', 4),
(50006, 'Eng', 'English', 1),
(50007, 'Sci', 'Science', 4),
(50008, 'Research', 'Research', 1),
(50009, 'Enh. Math.', 'Enhance Math', 2),
(50010, 'Specialization', 'Specialization', 6),
(50011, 'TLE', 'Technology and Livelihood Education', 7),
(50012, 'Enh. Eng.', 'Enhance English', 1),
(50013, 'Math', 'Mathematics', 2),
(50015, 'Research 2', 'Research 2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `css_time`
--

CREATE TABLE IF NOT EXISTS `css_time` (
  `time_id` bigint(20) unsigned NOT NULL,
  `sy_id` int(15) unsigned NOT NULL,
  `am_s` varchar(10) DEFAULT NULL,
  `am_e` varchar(10) DEFAULT NULL,
  `pm_s` varchar(10) DEFAULT NULL,
  `pm_e` varchar(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `css_time`
--

INSERT INTO `css_time` (`time_id`, `sy_id`, `am_s`, `am_e`, `pm_s`, `pm_e`) VALUES
(1, 4, '06:30:00', '07:20:00', '12:30:00', '01:20:00'),
(2, 4, '07:20:00', '08:10:00', '01:20:00', '02:10:00'),
(3, 4, '08:10:00', '09:00:00', '02:10:00', '03:00:00'),
(4, 4, '09:10:00', '10:00:00', '03:10:00', '04:00:00'),
(5, 4, '10:00:00', '10:50:00', '04:00:00', '04:50:00'),
(6, 4, '10:50:00', '11:40:00', '04:50:00', '05:40:00'),
(7, 4, '11:40:00', '12:30:00', '05:40:00', '06:30:00'),
(8, 5, '06:30:00', '07:20:00', '12:30:00', '01:20:00'),
(9, 5, '07:20:00', '08:10:00', '01:20:00', '02:10:00'),
(10, 5, '08:10:00', '09:00:00', '02:10:00', '03:00:00'),
(11, 5, '09:10:00', '10:00:00', '03:10:00', '04:00:00'),
(12, 5, '10:00:00', '10:50:00', '04:00:00', '04:50:00'),
(13, 5, '10:50:00', '11:40:00', '04:50:00', '05:40:00'),
(14, 5, '11:40:00', '12:30:00', '05:40:00', '06:30:00'),
(15, 6, '06:30:00', '07:20:00', '12:30:00', '01:20:00'),
(16, 6, '07:20:00', '08:10:00', '01:20:00', '02:10:00'),
(17, 6, '08:10:00', '09:00:00', '02:10:00', '03:00:00'),
(18, 6, '09:10:00', '10:00:00', '03:10:00', '04:00:00'),
(19, 6, '10:00:00', '10:50:00', '04:00:00', '04:50:00'),
(20, 6, '10:50:00', '11:40:00', '04:50:00', '05:40:00'),
(21, 6, '11:40:00', '12:30:00', '05:40:00', '06:30:00'),
(22, 7, '06:30:00', '07:20:00', '12:30:00', '01:20:00'),
(23, 7, '07:20:00', '08:10:00', '01:20:00', '02:10:00'),
(24, 7, '08:10:00', '09:00:00', '02:10:00', '03:00:00'),
(25, 7, '09:10:00', '10:00:00', '03:10:00', '04:00:00'),
(26, 7, '10:00:00', '10:50:00', '04:00:00', '04:50:00'),
(27, 7, '10:50:00', '11:40:00', '04:50:00', '05:40:00'),
(28, 7, '11:40:00', '12:30:00', '05:40:00', '06:30:00'),
(29, 8, '06:30:00', '07:20:00', '12:30:00', '01:20:00'),
(30, 8, '07:20:00', '08:10:00', '01:20:00', '02:10:00'),
(31, 8, '08:10:00', '09:00:00', '02:10:00', '03:00:00'),
(32, 8, '09:10:00', '10:00:00', '03:10:00', '04:00:00'),
(33, 8, '10:00:00', '10:50:00', '04:00:00', '04:50:00'),
(34, 8, '10:50:00', '11:40:00', '04:50:00', '05:40:00'),
(35, 8, '11:40:00', '12:30:00', '05:40:00', '06:30:00'),
(103, 15, '06:30:00', '07:20:00', '12:30:00', '01:20:00'),
(104, 15, '07:20:00', '08:10:00', '01:20:00', '02:10:00'),
(105, 15, '08:10:00', '09:00:00', '02:10:00', '03:00:00'),
(106, 15, '09:10:00', '10:00:00', '03:10:00', '04:00:00'),
(107, 15, '10:00:00', '10:50:00', '04:00:00', '04:50:00'),
(108, 15, '10:50:00', '11:40:00', '04:50:00', '05:40:00'),
(109, 15, '11:40:00', '12:30:00', '05:40:00', '06:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `dms_archive`
--

CREATE TABLE IF NOT EXISTS `dms_archive` (
  `archive_id` int(10) unsigned NOT NULL,
  `emp_No` int(10) unsigned NOT NULL,
  `arch_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dms_archive_date`
--

CREATE TABLE IF NOT EXISTS `dms_archive_date` (
  `arch_date_id` int(11) NOT NULL,
  `arch_start` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `arch_end` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `arch_sy` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dms_archive_date`
--

INSERT INTO `dms_archive_date` (`arch_date_id`, `arch_start`, `arch_end`, `arch_sy`) VALUES
(1, '2018-04-02 00:00:00', '2018-04-07 00:00:00', '2018-2019'),
(2, '2019-04-04 00:00:00', '2019-04-18 00:00:00', '2019-2020');

-- --------------------------------------------------------

--
-- Table structure for table `dms_doc_type`
--

CREATE TABLE IF NOT EXISTS `dms_doc_type` (
  `type_id` int(10) unsigned NOT NULL,
  `doc_type` enum('Service Record','Personal Data Sheet','Master Grading Sheet','Quarterly Grades','School File 1','School File 5') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dms_doc_type`
--

INSERT INTO `dms_doc_type` (`type_id`, `doc_type`) VALUES
(1, 'Service Record'),
(2, 'Personal Data Sheet'),
(3, 'Master Grading Sheet'),
(4, 'Quarterly Grades'),
(5, 'School File 1'),
(6, 'School File 5');

-- --------------------------------------------------------

--
-- Table structure for table `dms_message`
--

CREATE TABLE IF NOT EXISTS `dms_message` (
  `mes_id` int(11) unsigned NOT NULL,
  `mes_title` varchar(45) NOT NULL,
  `mes_content` text NOT NULL,
  `sent` datetime NOT NULL,
  `received` datetime DEFAULT NULL,
  `mes_status` enum('0','1') NOT NULL,
  `mes_delete` enum('0','1') NOT NULL,
  `type_id` int(11) unsigned NOT NULL,
  `rec_no` int(11) unsigned NOT NULL,
  `cms_account_id` int(11) unsigned NOT NULL,
  `mes_stat` enum('P','A','D') NOT NULL,
  `state_date` datetime DEFAULT NULL,
  `doc_lock` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dms_message`
--

INSERT INTO `dms_message` (`mes_id`, `mes_title`, `mes_content`, `sent`, `received`, `mes_status`, `mes_delete`, `type_id`, `rec_no`, `cms_account_id`, `mes_stat`, `state_date`, `doc_lock`) VALUES
(1, 'Master Grades', 'I would like to request a copy of my master grading sheet', '2018-04-01 15:17:43', '2018-04-01 15:34:41', '1', '0', 3, 74, 70, 'A', '2018-04-03 05:48:15', '0'),
(2, 'Request for a copy', 'I would like to request a copy of my Personal Data Sheet.', '2018-04-02 13:45:12', '2018-04-02 13:45:20', '1', '1', 2, 86, 70, 'P', NULL, '0'),
(3, 'Personal Data Sheet', 'I would like to request a copy of my Personal Data Sheet.', '2018-04-02 13:47:03', '2018-04-02 13:47:10', '1', '0', 2, 86, 105, 'P', NULL, '0'),
(4, 'Requisition', 'I would like to request a copy of my School file one', '2018-04-02 14:02:01', '2018-04-02 14:02:28', '1', '1', 5, 74, 70, 'P', NULL, '0'),
(5, 'Requisition', 'I would like to request a copy of my SF5', '2018-04-02 14:09:26', '2018-04-02 14:09:45', '1', '0', 6, 74, 70, 'P', NULL, '0'),
(6, 'Request', 'I would like to request a copy of my Quarterly Grades.', '2018-04-02 14:16:22', '2018-04-02 14:16:31', '1', '0', 4, 74, 70, 'P', NULL, '0'),
(7, 'PDS', 'PDS request', '2018-04-02 15:38:38', '2018-04-02 15:39:30', '1', '0', 2, 86, 105, 'P', NULL, '0'),
(8, 'Master', 'Master ples', '2018-04-02 15:43:59', '2018-04-02 15:44:29', '1', '0', 3, 74, 70, 'P', NULL, '0'),
(9, 'SR', 'SR ples', '2018-04-02 15:48:55', '2018-04-02 15:49:07', '1', '0', 1, 86, 105, 'P', NULL, '0'),
(10, 'Quarterly', 'Quarterly ples', '2018-04-02 15:55:17', '2018-04-02 15:55:29', '1', '0', 4, 74, 70, 'P', NULL, '0'),
(11, 'Sf1', 'sf1', '2018-04-02 15:57:15', '2018-04-02 15:57:32', '1', '0', 5, 74, 70, 'P', NULL, '0'),
(12, 'sf5', 'sf5', '2018-04-02 15:57:25', '2018-04-02 15:57:58', '1', '0', 6, 74, 70, 'P', NULL, '0'),
(13, 'Re:Master Grades', 'Your Request has been Approved, you can now check your document', '2018-04-03 05:48:15', NULL, '0', '0', 3, 49, 95, 'A', '2018-04-03 05:48:15', '0'),
(14, 'PDS', 'Please send me a copy of my PDS for employment purposes.', '2018-04-03 15:09:36', NULL, '0', '0', 2, 86, 95, 'P', NULL, '0'),
(15, 'SR', 'SR please', '2018-04-04 10:41:03', '2018-04-04 10:41:36', '1', '0', 1, 86, 105, 'P', NULL, '0'),
(16, 'PDS', 'PDS', '2018-04-04 10:44:26', '2018-04-04 10:44:36', '1', '0', 2, 86, 105, 'P', NULL, '0'),
(17, 'MGS', 'MGS', '2018-04-04 10:46:00', '2018-04-04 10:46:35', '1', '0', 3, 74, 70, 'P', NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `dms_receiver`
--

CREATE TABLE IF NOT EXISTS `dms_receiver` (
  `rec_no` int(11) unsigned NOT NULL,
  `cms_account_id` int(11) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dms_receiver`
--

INSERT INTO `dms_receiver` (`rec_no`, `cms_account_id`) VALUES
(46, 67),
(47, 68),
(48, 69),
(49, 70),
(50, 71),
(51, 72),
(52, 73),
(53, 74),
(54, 75),
(55, 76),
(56, 77),
(57, 78),
(58, 79),
(59, 80),
(60, 81),
(61, 82),
(62, 83),
(63, 84),
(64, 85),
(65, 86),
(66, 87),
(67, 88),
(68, 89),
(69, 90),
(70, 91),
(71, 92),
(72, 93),
(73, 94),
(74, 95),
(76, 97),
(77, 98),
(78, 99),
(79, 100),
(80, 101),
(81, 102),
(82, 103),
(83, 104),
(84, 105),
(85, 106),
(86, 217);

-- --------------------------------------------------------

--
-- Table structure for table `ims_borrow`
--

CREATE TABLE IF NOT EXISTS `ims_borrow` (
  `borrow_id` int(10) unsigned NOT NULL,
  `emp_no` int(10) unsigned NOT NULL,
  `stor_id` int(10) unsigned NOT NULL,
  `borrow_date` date NOT NULL,
  `return_date` date DEFAULT NULL,
  `borrow_qty` int(10) unsigned NOT NULL,
  `trans_date` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ims_borrow`
--

INSERT INTO `ims_borrow` (`borrow_id`, `emp_no`, `stor_id`, `borrow_date`, `return_date`, `borrow_qty`, `trans_date`) VALUES
(1, 5231607, 1, '2018-04-03', NULL, 1, NULL),
(2, 5231607, 1, '2018-04-03', NULL, 0, NULL),
(3, 5231607, 2, '2018-04-03', NULL, 2, NULL),
(4, 5287126, 3, '2018-04-04', NULL, 1, NULL),
(5, 5287126, 4, '2018-04-04', NULL, 10, NULL),
(6, 4743128, 6, '2018-04-04', NULL, 2, NULL),
(7, 5231607, 8, '2018-04-04', NULL, 1, NULL),
(8, 5231607, 8, '2018-04-04', NULL, 0, NULL),
(9, 5231607, 9, '2018-04-04', NULL, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ims_facility`
--

CREATE TABLE IF NOT EXISTS `ims_facility` (
  `fac_id` int(10) unsigned NOT NULL,
  `fac_type` varchar(50) NOT NULL,
  `fund_source` varchar(45) NOT NULL,
  `specfic_fund` varchar(45) NOT NULL,
  `fac_storey` int(10) unsigned NOT NULL,
  `num_rooms` int(10) unsigned NOT NULL,
  `year_completed` year(4) NOT NULL,
  `dimension` varchar(8) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ims_facility`
--

INSERT INTO `ims_facility` (`fac_id`, `fac_type`, `fund_source`, `specfic_fund`, `fac_storey`, `num_rooms`, `year_completed`, `dimension`) VALUES
(1, 'Guard House', 'DepEd National Fund', 'DepEd Budget', 1, 1, 1991, '3x5'),
(2, 'DECS Building', 'DepEd National Fund', 'DepEd Budget', 3, 13, 1990, '10x40'),
(3, 'Others', 'Private Sector Funded', 'Others', 1, 4, 1996, '9x28'),
(4, 'DepEd Modified School Building', 'DepEd National Fund', 'DepEd Budget', 1, 2, 0000, '6x14'),
(5, 'JICA-Typhoon Resistant School Program', 'Foreign Funded', 'JICA', 1, 5, 1996, '10x40'),
(6, 'Comfort Room/Toilet', 'DepEd National Fund', 'DepEd Budget', 1, 1, 1988, '4x6'),
(7, 'DepEd Standard School Building', 'DepEd National Fund', 'DepEd Budget', 2, 4, 2014, '9x22'),
(8, 'Covered Court', 'LGU Funded', 'City Fund', 1, 1, 2000, '14x35'),
(9, 'FVR 2000 Building', 'DepEd National Fund', 'DepEd Budget', 1, 2, 2002, '7x16'),
(10, 'Bagong Lipunan School Building', 'DepEd National Fund', 'DepEd Budget', 1, 3, 1994, '6x24'),
(11, 'Comfort Room/Toilet', 'DepEd National Fund', 'DepEd Budget', 1, 4, 2014, '4x6'),
(12, 'DepEd Congressional Building', 'DepEd National Fund', 'DepEd Budget', 2, 2, 2007, '9x9'),
(13, 'DepEd Standard School Building', 'DepEd National Fund', 'DepEd Budget', 2, 10, 1998, '7x40'),
(14, 'Washing Facilities', 'Private Sector Funded', 'Alumni', 1, 1, 2004, '3x4'),
(15, 'Teachers Quarter', 'Private Sector Funded', 'Alumni', 1, 1, 1994, '3x4'),
(16, 'JICA-Educational Facilities Improvement Program', 'Foreign Funded', 'JICA', 1, 1, 1994, '9x11'),
(17, 'DECS Standard Classroom Building', 'DepEd National Fund', 'DepEd Budget', 1, 3, 1991, '7x24'),
(18, 'DECS Standard Classroom Building', 'DepEd National Fund', 'DepEd Budget', 1, 4, 1996, '7x32'),
(19, 'DECS Standard Classroom Building', 'DepEd National Fund', 'DepEd Budget', 1, 1, 1993, '7x8'),
(20, 'Comfort Room/Toilet', 'DepEd National Fund', 'DepEd Budget', 1, 1, 2014, '4x6'),
(21, 'DECS Standard Classroom Building', 'DepEd National Fund', 'DepEd Budget', 1, 4, 2002, '7x32'),
(22, 'DepEd Standard School Building', 'DepEd National Fund', 'DepEd Budget', 1, 1, 2006, '7x18'),
(23, 'Osmeña Building', 'DepEd National Fund', 'DepEd Budget', 1, 2, 2009, '7x16'),
(24, 'DepEd School Building', 'DepEd National Fund', 'DepEd Budget', 1, 9, 0000, '9x35'),
(25, 'DECS Standard Classroom Building', 'DepEd National Fund', 'DepEd Budget', 1, 1, 0000, '');

-- --------------------------------------------------------

--
-- Table structure for table `ims_storage`
--

CREATE TABLE IF NOT EXISTS `ims_storage` (
  `stor_id` int(10) unsigned NOT NULL,
  `stor_date` date NOT NULL,
  `stor_qty` int(11) NOT NULL,
  `item_type` enum('Common','Clinic','Electric','Janitorial','Sports','Hardware','I.T.') NOT NULL,
  `equipment` enum('1','0') NOT NULL,
  `p_code` varchar(45) NOT NULL,
  `iar_id` int(10) unsigned NOT NULL,
  `emp_no` int(11) unsigned DEFAULT NULL,
  `ins` enum('0','1') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ims_storage`
--

INSERT INTO `ims_storage` (`stor_id`, `stor_date`, `stor_qty`, `item_type`, `equipment`, `p_code`, `iar_id`, `emp_no`, `ins`) VALUES
(1, '2018-04-03', 0, 'Sports', '1', 'PNHS-2018-04-03-Volleyball net', 1, 5231607, '1'),
(2, '2018-04-03', 0, 'Sports', '1', 'PNHS-2018-04-03-Basketball', 2, 5231607, '1'),
(3, '2018-04-04', 0, 'Clinic', '0', 'PNHS-2018-04-04-Alcohol', 4, 5287126, '1'),
(4, '2018-04-04', 0, 'Clinic', '0', 'PNHS-2018-04-04-Betadine', 5, 5287126, '1'),
(5, '2018-04-04', 5, 'Clinic', '0', 'PNHS-2018-04-04-Cotton', 6, 5287126, '0'),
(6, '2018-04-04', 0, 'I.T.', '1', 'PNHS-2018-04-04-Projector', 7, 4743128, '1'),
(7, '2018-04-04', 4, 'Sports', '1', 'PNHS-2018-04-04-Chess Board', 3, 5231607, '0'),
(8, '2018-04-04', 0, 'Common', '1', 'PNHS-2018-04-04-Emergency Light', 8, 5231607, '1'),
(9, '2018-04-04', 0, 'Common', '0', 'PNHS-2018-04-04-Feather Duster', 9, 5231607, '1');

-- --------------------------------------------------------

--
-- Table structure for table `ipcrms_content`
--

CREATE TABLE IF NOT EXISTS `ipcrms_content` (
  `ipcr_res_id` int(10) unsigned NOT NULL,
  `q_val` enum('1','2','3','4','5') NOT NULL,
  `e_val` enum('1','2','3','4','5') NOT NULL,
  `t_val` enum('1','2','3','4','5') NOT NULL,
  `OBJ_ID` int(10) unsigned NOT NULL,
  `emp_No` int(10) unsigned NOT NULL,
  `target` int(11) NOT NULL,
  `rating` varchar(45) NOT NULL,
  `score` varchar(45) NOT NULL,
  `Status` varchar(45) NOT NULL,
  `date_submitted` date NOT NULL,
  `seen` enum('1','0') NOT NULL,
  `sy_id` int(15) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=423 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ipcrms_content`
--

INSERT INTO `ipcrms_content` (`ipcr_res_id`, `q_val`, `e_val`, `t_val`, `OBJ_ID`, `emp_No`, `target`, `rating`, `score`, `Status`, `date_submitted`, `seen`, `sy_id`) VALUES
(397, '5', '5', '5', 17, 5287126, 0, '5', '0.75', 'Pending', '2018-04-04', '1', 8),
(398, '5', '5', '5', 18, 5287126, 0, '5', '0.375', 'Pending', '2018-04-04', '1', 8),
(399, '5', '5', '5', 19, 5287126, 0, '5', '0.375', 'Pending', '2018-04-04', '1', 8),
(400, '5', '5', '5', 20, 5287126, 0, '5', '0.4', 'Pending', '2018-04-04', '1', 8),
(401, '5', '5', '5', 21, 5287126, 0, '5', '0.25', 'Pending', '2018-04-04', '1', 8),
(402, '5', '5', '5', 22, 5287126, 0, '5', '0.35', 'Pending', '2018-04-04', '1', 8),
(403, '5', '5', '5', 23, 5287126, 0, '5', '0.5', 'Pending', '2018-04-04', '1', 8),
(404, '5', '5', '5', 24, 5287126, 0, '5', '0.25', 'Pending', '2018-04-04', '1', 8),
(405, '5', '5', '5', 25, 5287126, 0, '5', '0.5', 'Pending', '2018-04-04', '1', 8),
(406, '5', '5', '5', 26, 5287126, 0, '5', '0.5', 'Pending', '2018-04-04', '1', 8),
(407, '5', '5', '5', 27, 5287126, 0, '5', '0.25', 'Pending', '2018-04-04', '1', 8),
(408, '5', '5', '5', 28, 5287126, 0, '5', '0.25', 'Pending', '2018-04-04', '1', 8),
(409, '5', '5', '5', 29, 5287126, 0, '5', '0.25', 'Pending', '2018-04-04', '1', 8),
(410, '5', '3', '3', 17, 5231607, 0, '3.6666666666667', '0.55', 'Approved', '2018-04-04', '1', 8),
(411, '5', '3', '2', 18, 5231607, 0, '3.3333333333333', '0.25', 'Approved', '2018-04-04', '1', 8),
(412, '3', '2', '2', 19, 5231607, 0, '2.3333333333333', '0.175', 'Approved', '2018-04-04', '1', 8),
(413, '4', '4', '4', 20, 5231607, 0, '4', '0.32', 'Approved', '2018-04-04', '1', 8),
(414, '1', '3', '1', 21, 5231607, 0, '1.6666666666667', '0.083333333333333', 'Approved', '2018-04-04', '1', 8),
(415, '3', '2', '1', 22, 5231607, 0, '2', '0.14', 'Approved', '2018-04-04', '1', 8),
(416, '3', '2', '1', 23, 5231607, 0, '2', '0.2', 'Approved', '2018-04-04', '1', 8),
(417, '2', '2', '1', 24, 5231607, 0, '1.6666666666667', '0.083333333333333', 'Approved', '2018-04-04', '1', 8),
(418, '1', '2', '3', 25, 5231607, 0, '2', '0.2', 'Approved', '2018-04-04', '1', 8),
(419, '1', '3', '5', 26, 5231607, 0, '3', '0.3', 'Approved', '2018-04-04', '1', 8),
(420, '2', '3', '5', 27, 5231607, 0, '3.3333333333333', '0.16666666666667', 'Approved', '2018-04-04', '1', 8),
(421, '1', '4', '4', 28, 5231607, 0, '3', '0.15', 'Approved', '2018-04-04', '1', 8),
(422, '2', '3', '3', 29, 5231607, 0, '2.6666666666667', '0.13333333333333', 'Approved', '2018-04-04', '1', 8);

-- --------------------------------------------------------

--
-- Table structure for table `ipcrms_due_date`
--

CREATE TABLE IF NOT EXISTS `ipcrms_due_date` (
  `Rating_ID` int(10) unsigned NOT NULL,
  `rp_date` date DEFAULT NULL,
  `sy_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ipcrms_due_date`
--

INSERT INTO `ipcrms_due_date` (`Rating_ID`, `rp_date`, `sy_id`) VALUES
(1, '2018-04-30', 8);

-- --------------------------------------------------------

--
-- Table structure for table `ipcrms_kra`
--

CREATE TABLE IF NOT EXISTS `ipcrms_kra` (
  `KRA_ID` int(10) unsigned NOT NULL,
  `KRA_Description` varchar(45) NOT NULL,
  `MFO_ID` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ipcrms_kra`
--

INSERT INTO `ipcrms_kra` (`KRA_ID`, `KRA_Description`, `MFO_ID`) VALUES
(1, 'I. Curriculum Delivery Performance (50%)', 1),
(2, 'II. Instructional Supervision (10%)', 1),
(3, 'III. Planning, Assessing and Reporting Learni', 1),
(4, 'IV. Learning Environment (15%)', 1),
(5, 'V. Professional Growth and Development', 1),
(6, 'Curriculum Delivery', 2),
(7, 'Learning Environment', 2),
(8, 'Planning, Assessing, and Reporting Learning O', 2),
(9, 'Personal and Professional Growth', 2),
(10, 'Community Partnership', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ipcrms_mfo`
--

CREATE TABLE IF NOT EXISTS `ipcrms_mfo` (
  `MFO_ID` int(10) unsigned NOT NULL,
  `MFO_Description` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ipcrms_mfo`
--

INSERT INTO `ipcrms_mfo` (`MFO_ID`, `MFO_Description`) VALUES
(1, 'Provision of Quality Education Services(Deliv'),
(2, 'Basic Education Services(Delivery)');

-- --------------------------------------------------------

--
-- Table structure for table `ipcrms_monitoring`
--

CREATE TABLE IF NOT EXISTS `ipcrms_monitoring` (
  `monitoring_id` int(10) unsigned NOT NULL,
  `status` varchar(45) NOT NULL,
  `ipcr_records_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ipcrms_obj`
--

CREATE TABLE IF NOT EXISTS `ipcrms_obj` (
  `obj_id` int(10) unsigned NOT NULL,
  `kra_obj` varchar(500) NOT NULL,
  `kra_wpk` double NOT NULL,
  `KRA_ID` int(10) unsigned NOT NULL,
  `timeline` varchar(45) NOT NULL,
  `obj_weight` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ipcrms_obj`
--

INSERT INTO `ipcrms_obj` (`obj_id`, `kra_obj`, `kra_wpk`, `KRA_ID`, `timeline`, `obj_weight`) VALUES
(1, 'To prepare daily lesson/logs based on TG and CG following the format stipulated in Deped Order no. 42, s.2016 ', 0.1, 1, 'June-March ', 15),
(2, 'To utilize instructional time to the fullest observing the 180-day non-negotiable contact time with students', 0.1, 1, 'June-March', 0),
(3, 'Handle a regular teaching loads for the assigned grade learning area', 0.06, 1, 'June-March', 15),
(4, 'Provide learning activities and utilized instructional materials aligned to the objectives of the lessson', 0.06, 1, 'June-March', 0),
(5, 'Attained the required learning competencies per semester/per year', 0.06, 1, 'June-March', 0),
(6, 'Increase achievement proficiency level of students handled on learning area assigned', 0.06, 1, 'June-March', 0),
(7, 'Achieved 100% passing rate for students making them attain a final rating from 75% & above in subjects handled at the end of the semester/school year', 0.06, 1, 'June-March', 0),
(8, 'To assist the School Head in providing technical assistance to teachers to improve curriculum delivery\r\n*Observe classes\r\n*Conduct coaching & mentoring session\r\n*Demonstrate teaching strategies', 0.1, 2, 'June-March', 0),
(9, 'To develop & use a variety of appropriate assessment strategies to monitor & evaluate learning\r\n*Prepared standard periodic test w/ table of specs., item analysis & test result\r\n*Prepared formative test for every competency & summative test for each lesson\r\n*Provide for demonstration of performance standards among students\r\n*Submitted grades of students accurately & promptly\r\n*Utilized technology in computing the grades of students', 0.1, 3, 'June-March', 0),
(10, 'To provide feedbacks on learner''s performance to parents, supervisors, co-teachers & learners themselves.\r\n*Call for a parents meeting every grading period or as the need arises.\r\n*Discuss to supervisor & co-teachers possible intervention for those at risk of dropping-out or failing in the subject\r\n*Conduct home visitation to prevent students from dropping out/failing\r\n*Give feedback to students about their performance regularly.\r\n*Provide technical to co-teachers along planning, assessing & rep', 0.05, 3, 'June-March', 0),
(11, 'To make sure that the classroom is safe and conductive to learning', 0.05, 4, 'June-March', 0),
(12, 'To create an environment that promotes fairness', 0.05, 4, 'June-March', 0),
(13, 'To establish & maintain consistent standards of learner''s behavior\r\n*Students show respect to everyone\r\n*Students observe proper waste diposal\r\n*Students attend the flag ceremony regularly\r\n*Students behave properly inside & outside the class\r\n*Students follow school rules & regulations', 0.05, 4, 'June-March', 0),
(14, 'Participate in seminar, workshop, trainings within the school year', 0.03, 5, 'June-March', 0),
(15, 'Conducted at least one action research related to teaching methodologies/strategies/behavior of students', 0.02, 5, 'June-March', 0),
(16, 'Attend meetings, conferences and all school activities', 0.05, 5, 'June-March', 0),
(17, 'To provide interesting activities and utilized appropriate instructional materials aligned to the objectives of te lesson\r\n\r\n* Utilized technilogy in teaching the subject at least once a month\r\n\r\n* Prepared at least 1 functunal LIMIT to facilitate learning\r\n\r\n* Utilized appropriate teaching strategies to make the lesson interesting\r\n\r\n* Demonstrated teaching strategies to other teachers.\r\n\r\n* Employed differentiated activities/ pedagogical approaches to close teaching-learning gaps', 0.15, 6, 'June-March', 0),
(18, 'To utilized instructional time to the fullest observing the 180-day non-negotiatable contact time with students', 0.075, 6, 'June-March', 0),
(19, 'To prepare daily lesson logs/plans based on Tg and CG following the format stipulated in DepEd Order No. 42, s. 2016', 0.075, 6, 'June-March', 0),
(20, 'To make sure that the classroom is safe and conducive to learning', 0.08, 7, 'June-March', 0),
(21, 'To create an environment that promotes fairness, peace and harmony', 0.05, 7, 'June-March', 0),
(22, 'To establish and maintain consistent standards of learners behavior\r\n*Students show respect to everyone\r\n*Students observe proper waste disposal\r\n*Students attend the flag ceremony regularly\r\n*Students behave properly inside and outside the class\r\n*Students follow school rules and regulations', 0.07, 7, 'June-March', 0),
(23, 'To develop and use a variety of appropriate assessment strategies to monitor and evaluate learning.', 0.1, 8, 'June-March', 0),
(24, 'To provide feedback on learners'' performance to parents, superiors and learners themselves. \r\n\r\n* Call for a parents'' meeting every grading period on a Saturday or as the need arises. \r\n\r\n* Discuss to superior possible intervention for those at risk o dropping out or failing in the subject. \r\n\r\n* Conduct home visitation to prevent student from dropping out/ failing. \r\n\r\n* Give feedback to students about their performance regularly', 0.05, 8, 'June-March', 0),
(25, 'To conduct appropriate measures for those at risk of dropping out or failing in the subject or excelling in the earning area.', 0.1, 8, 'June-March', 0),
(26, 'To uphold the nobility of teaching profession through continuous personal and professional growth \r\n\r\n* Prepare Individual Plan for Professional Development (IPPD) \r\n\r\n* Enrol in professional school \r\n\r\n* Consult and coordinate with fellow teachers. \r\n\r\n* Join professional organization/s \r\n\r\n*Update learning materials (Internet)', 0.1, 9, 'June-March', 0),
(27, 'To attend DepEd required training programs and other seminars offered by professional organizations with the following MOV''S: \r\n\r\n1. Authorty to Travel \r\n\r\n2. Memorandum \r\n\r\n3. Certifacte of Participation \r\n\r\n4. Narrative Report \r\n\r\n5. Proof of Applicaion of KSA gained from the trainings/seminars.', 0.05, 9, 'June-March', 0),
(28, 'To establish partnership with the community \r\n\r\n* Rendered services in thw community as a requested \r\n\r\n* Conduct community outreach project \r\n\r\n* Solicited hrlp from stakeholders to improve schools \r\n\r\n* Invited experts from the locally to assist in the school activity \r\n\r\n* Mobilized PTA to improve learning outcomes', 0.05, 10, 'June-March', 0),
(29, 'To participate in various community activities	', 0.05, 10, 'June-March', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ipcrms_perf_indicator`
--

CREATE TABLE IF NOT EXISTS `ipcrms_perf_indicator` (
  `perf_id` int(10) unsigned NOT NULL,
  `perf_5` varchar(150) NOT NULL,
  `perf_4` varchar(150) NOT NULL,
  `perf_3` varchar(150) NOT NULL,
  `perf_2` varchar(150) NOT NULL,
  `perf_1` varchar(150) NOT NULL,
  `OBJ_ID` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ipcrms_perf_indicator`
--

INSERT INTO `ipcrms_perf_indicator` (`perf_id`, `perf_5`, `perf_4`, `perf_3`, `perf_2`, `perf_1`, `OBJ_ID`) VALUES
(1, '5 - 100% complete lesson logs/plans prepared and submitted on time ', '4 - 89%-99% complete lesson logs/plans prepared with 1-2 instances of late submission', '3 - 78%-88% complete lesson logs/plans prepared with 3-4 instances of late submission', '2 - 67%-77% complete lesson logs/plans prepared with 5-6 instances of late submission', '1 - 66% & below complete lesson logs/plans prepared with 7 or more instances of late submission', 1),
(2, '5 - Has spent 180-day non-negotiable contact time w/o tardiness in reporting school & to class', '4 - Has spent 180-day non-negotiable contact time with students w/ 1-20 instances of tardiness', '3 - Has spent 180-day non-negotiable contact time with students w/ 21-40 instances of tardiness', '2 - Has spent less than 180-day non-negotiable contact time with students w/ 41-59 instances of tardiness', '1 - Has spent less than 180-day non-negotiable contact time with students w/ 60 or more instances of tardiness', 2),
(3, '5 - 100% required teaching load per year', '4 - 89%-99% required teaching load per year', '3 - 78%-88% required teaching load per year', '2 - 67%-77% required teaching load per year', '1 - 66% and below required teaching load per year', 3),
(4, '5 - 100% provide learning activities & instructional materials', '4 - 89%-99% provide learning activities & instructional materials', '3 - 78%-88% provide learning activities & instructional materials', '2 - 67%-77% provide learning activities & instructional materials', '1 - 66% and below provide learning activities & instructional materials', 4),
(5, '5 - 100% of the learning competencies attained per year', '4 - 89%-99% of the learning competencies attained per year', '3 - 78%-88% of the learning competencies attained per year', '2 - 67%-77% of the learning competencies attained per year', '1 - 66% and below of the learning competencies attained per year', 5),
(6, '5 - Attained 5% or more increase in achievement proficiency level', '4 - Attained 4% or more increase in achievement proficiency level', '3 - Attained 3% or more increase in achievement proficiency level', '2 - Attained 2% or more increase in achievement proficiency level', '1 - Attained 2% or less increase in achievement proficiency level', 6),
(7, '5 - 100% of the students handled passed at the end of the school year', '4 - 89%-99% of the students handled passed at the end of the school year', '3 - 78%-88% of the students handled passed at the end of the school year', '2 - 67%-77% of the students handled passed at the end of the school year', '1 - 66% and below of the students handled passed at the end of the school year', 7),
(8, 'All of the action steps were done 100% of the teachers in school/dept. were covered', 'All of the action steps were done 89%-99% of the teachers in school/dept. were covered', 'All of the action steps were done 78%-88% of the teachers in school/dept. were covered', 'All of the action steps were done 67%-77% of the teachers in school/dept. were covered', 'All of the action steps were done 66% and below of the teachers in school/dept. were covered', 8),
(9, '5 - 5 of the action steps/activities were done and met with valid MOVs resulting to 100% promotion rate', '4 - 4 of the action steps/activities were done and met with valid MOVs resulting to 89%-99% promotion rate', '3 - 3-4 of the action steps/activities were done and met with valid MOVs resulting to 78%-88% promotion rate', '2 - 2-3 of the action steps/activities were done and met with valid MOVs resulting to 67%-77% promotion rate', '1 - 1-2 of the action steps/activities were done and met with valid MOVs resulting to 66% or less promotion rate', 9),
(10, '5 - 5 of the action steps have been done with complete MOVs resulting to 0% drop out and 100% promotion of results', '4 - 4 of the actions steps have been done with complete MOVs resulting to 0% drop out and 100% promotion of students', '3 - 3 of the actions steps have been done with complete MOVs resulting to 0% drop out and 100% promotion of students', '2 - 2 of the actions steps have been done with complete MOVs resulting to 0% drop out and 100% promotion of students\r\n', '1 - 1 of the actions steps have been done with complete MOVs resulting to 0% drop out and 100% promotion of students\r\n', 10),
(11, '5 - Classroom is always clean, orderly, hazard free, well-lighted, well-structured, and properly ventilated, thereby having been recognized as model c', '4 - Classroom is most of the time clean, orderly, hazard free, well-lighted, well-structured, and properly ventilated.', '4 - Classroom is most of the time clean, orderly, hazard free, well-lighted, well-structured and properly ventilated but has been noted to have failed', '2 - Classroom is most of the time clean, orderly, hazard free, well-lighted, well-structured and properly ventilated but has been noted to have failed', '1 - Classroom is most of the time clean, orderly, hazard free, well-lighted, well-structured and properly ventilated but has been noted to have failed', 11),
(12, 'No students has filled any complaint against anyone in the school, thereby resulting to 0% drop out rate.', '4 - 1 student has filled a complaint against anyone in the school', '3 - 2 student has filled a complaint against anyone in the school', '2 - 3 student has filled a complaint against anyone in the school', '1 - 4 or more student has filled a complaint against anyone in the school', 12),
(13, '5 - 5 of the behavioral indicators have been manifested by the students all the time', '4 - 4 of the behavioral indicators have been manifested by the students most of the time', '3 - 3 of the behavioral indicators have been manifested by the students most of the time', '2 - 2 of the behavioral indicators have been manifested by the students most of the time', '1 - 1-2 of the behavioral indicators have been manifested by the students sometimes', 13),
(14, '5 - Attended a regional/national/international seminars/trainings for at least 10 days', '4 - Attended a regional/national/international seminars/trainings less than 10 days', '3 - Attended a district/division seminars/trainings for at least 10 days', '2 - Attended a district/division seminars/trainings for less than 10 days', '1 - Attended a school seminars/trainings', 14),
(15, '5 - Conducted and completed an action research approved by the SDO with complete documentation', '4 - Conducted action research duly approved by the SDO but was not completed within the target time', '3 - Conducted action research without the approval from the SDO', '2 - Proposed an action research without  the approval from the SDO', 'No action research', 15),
(16, '5 - 100% attendance in all meetings, conferences and school activities', '4 - 89%-99% attendance in all meetings, conferences and school activities', '3 - 78%-88% attendance in all meetings, conferences and school activities', '2 - 67%-77% attendance in all meetings, conferences and school activities', '1 - 66% and below attendance in all meetings, conferences and school activities', 16),
(17, '5 - 5 of the action steps/activities were done and met with valid MOV''s.', '4 - 4 of the action steps/activities were done and met with valid MOV''s.', '3 - 3 of the action steps/activities were done and met with valid MOV''s.', '2 - 2 of the action steps/activities were done and met with valid MOV''s.', '1 - 1 of the action steps/activities were done and met with valid MOV''s.', 17),
(18, '5- Has spent 180-days non-negotiable contact time with students without tardiness in reporting to school and the class', '4- Has spent 180-day non-negotiable contact time with students with 1-2 instances of tardiness', '3- Has spent 180-day non-negotiable contact time with students with 5-6 instances of tardiness', '2- Has spent 180-day non-negotiable contact time with students with 5-6 instances of tardiness', '1- Has spent 180-day non-negotiable contact time with students with 7 or more instances of tardiness', 18),
(19, '	\r\n5 - 100% complete lesson logs/plans prepared and submitted on time', '4 - 100% complete lesson logs/plans prepared and submitted with 1-2 instances of late submission.', '3 - 100% complete lesson logs/plans prepared and submitted with 3-4 instances of late submission', '2 - 90% complete lesson logs/plans prepared and submitted with 5-6 instances of late submission', '1 - 80% complete lesson logs/plans prepared and submitted with 7 or more instances of late submission', 19),
(20, '5 - Classroom is always clean orderly hazard, hazard-free, well-lighted, well-structured and properly ventilated, thereby having been recognized as a ', '4 - Classroom is most of the time clean orderly hazard, hazard-free, well-lighted, well-structured and properly ventilated.', '3 - Classroom is most of the time clean orderly hazard, hazard-fre, well-lighted, well-structured and properly ventilated but has been noted to have f', '2 - Classroom is most of the time clean orderly hazard, hazard-free, well-lighted, well-structured and properly ventilated but has been noted to have ', '1 - Classroom is most of the time clean orderly hazard, hazard-free, well-lighted, well-structured and properly ventilated but has been noted to have ', 20),
(21, '5 - No students has filed any complaint against anyone in the school and talks about the school with pride.', '4 - 1 student has filed any complaint against anyone in the school', '3 - 2 student has filed any complaint against anyone in the school', '2 - 3 student has filed any complaint against anyone in the school', '1 - 4 student has filed any complaint against anyone in the school', 21),
(22, '5 - 5 of the behavioral indicators have been manifested by the students all the time', '4 - 4 of the behavioral indicators have been manifested by the students all the time', '3 - 3 of the behavioral indicators have been manifested by the students all the time', '2 - 2 of the behavioral indicators have been manifested by the students all the time', '1 - 1 of the behavioral indicators have been manifested by the students sometimes', 22),
(23, '5 - 5 of the action steps/activities were done and met with valid MOVs, resulting to 100% promotion rate.', '4 - 4 of the action steps/activities were done and met with valid MOVs, resulting to 95% - 99% promotion rate.', '3 - 3-4 of the action steps/activities were done and met with valid MOVs, resulting to 90% - 94% promotion rate', '2 -2-3 of the action steps/activities were done and met with valid MOVs, resulting to 85% - 89% promotion rate.', '1 - 1-2 of the action steps/activities were done and met with valid MOVs, resulting to 84% or less than promotion rate..', 23),
(24, '	\r\n5 - 4 of the action steps have been done with complete MOVs, resulting 0% dropout and 100% promotion of students.', '4 - 3 of the action steps have been done with complete MOVs, resulting 0.1% - 1% dropout and 90% - 99% promotion of students.', '3 - 2 of the action steps have been done with complete MOVs, resulting 1.1% - 2% dropout and 80% - 89% promotion of students.', '2 - 1 of the action steps have been done with complete MOVs, resulting 2.1% - 3% dropout and 75% - 79% promotion of students.', '1 - 0 of the action steps have been done with complete MOVs, resulting 3.1% and higher and 74% and lower promotion of students.', 24),
(25, '	\r\n5 - All students passed the subject, no one has dropped out, and winners emerged in various contest outside the school.', '4 - All students passed the subject, no one has dropped out, and winners emerged in various contest outside the school.', '3 - All students passed the subject, no one has dropped out, and no students participated in various contest.', '2 - 3 or more students have failed in the subject, have dropped out, and no one participated in various,', '1 - Other seminars offered by professional organizations with 1 MOV.', 25),
(26, '5 - 5 of the action steps/ activities were done and met with valid MVOs.', '4 - 4 of the action steps/ activities were done and met with valid MVOs.', '3 - 3 of the action steps/ activities were done and met with valid MVOs.', '2 - 2 of the action steps/ activities were done and met with valid MVOs.', '1 - 1 of the action steps/ activities were done and met with valid MVOs.', 26),
(27, '5 - To participate in at least 5 activities in the locality', '4 - To participate in at least 4 activities in the locality', '3 - To participate in at least 3 activities in the locality', '2 - To participate in at least 2 activities in the locality', '1 - To participate in at least 1 activities in the locality', 27),
(28, '\r\n5 - 5 of the action steps have been done with complete MVOs', '4 - 4 of the action steps have been done with complete MVOs', '3 - 3 of the action steps have been done with complete MVOs', '2 - 2 of the action steps have been done with complete MVOs', '1 - 1 of the action steps have been done with complete MVOs', 28),
(29, '5 - Has attended all DepEd required training programs and other seminars offered by professional organizations with 5 MOVs', '4 - Has attended all DepEd required training programs and other seminars offered by professional organizations with 4 MOVs', '3 -Has attended all DepEd required training programs and other seminars offered by professional organizations with 3 MOVs', '2 - Has attended all DepEd required training programs and other seminars offered by professional organizations with 2 MOVs', '1 - Has attended all DepEd required training programs and other seminars offered by professional organizations with 1 MOVs', 29);

-- --------------------------------------------------------

--
-- Table structure for table `ipcrms_records`
--

CREATE TABLE IF NOT EXISTS `ipcrms_records` (
  `IPCR_Records_ID` int(10) unsigned NOT NULL,
  `overall_rating` float NOT NULL,
  `adjectival_rating` enum('Outstanding','Very Satisfactory','Satisfactory','Unsatisfactory','Poor') NOT NULL,
  `Rating_ID` int(10) unsigned NOT NULL,
  `emp_No` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `oes_exam`
--

CREATE TABLE IF NOT EXISTS `oes_exam` (
  `exam_no` int(10) unsigned NOT NULL,
  `exam_title` varchar(100) NOT NULL,
  `exam_type` enum('Short Quiz','Long Quiz','Pretest','PostTest','Periodical Test') NOT NULL,
  `no_of_items` int(10) unsigned NOT NULL,
  `exam_duration` int(10) unsigned NOT NULL,
  `exam_status` enum('Open','Closed','Unposted') NOT NULL,
  `exam_dateadded` date NOT NULL,
  `exam_password` varchar(100) NOT NULL,
  `exam_opendate` datetime NOT NULL,
  `exam_closedate` datetime NOT NULL,
  `question_per_page` int(11) DEFAULT NULL,
  `shuffle` enum('Yes','No') NOT NULL,
  `passing_grade` int(11) NOT NULL,
  `exam_review` enum('Yes','No') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oes_exam`
--

INSERT INTO `oes_exam` (`exam_no`, `exam_title`, `exam_type`, `no_of_items`, `exam_duration`, `exam_status`, `exam_dateadded`, `exam_password`, `exam_opendate`, `exam_closedate`, `question_per_page`, `shuffle`, `passing_grade`, `exam_review`) VALUES
(7, 'Grammar, Vocabulary, and Sentence Completing', 'Short Quiz', 15, 15, 'Closed', '2018-04-02', '+ufM9yhci3jlQ6qcMYlPR6aqq7GuTocOS5lG5ZxzP6Y=', '2018-04-02 10:56:00', '2018-04-03 22:56:00', 3, 'Yes', 75, 'No'),
(9, 'AP - 1st Long Exam', 'Short Quiz', 12, 20, 'Open', '2018-04-02', 'rEqbiBtYxeOa4ZSRiIuwkVh532h7w2Ldbgtv+UJ47ek=', '2018-04-02 11:55:00', '2018-04-10 23:55:00', 0, 'No', 50, 'No'),
(10, 'Numerical Reasoning ', 'Long Quiz', 9, 60, 'Closed', '2018-04-02', 'rEqbiBtYxeOa4ZSRiIuwkVh532h7w2Ldbgtv+UJ47ek=', '2018-04-02 12:00:00', '2018-04-03 13:00:00', 5, 'Yes', 75, 'Yes'),
(12, 'Test on Correct Grammar', 'Short Quiz', 11, 15, 'Open', '2018-04-04', '+ufM9yhci3jlQ6qcMYlPR6aqq7GuTocOS5lG5ZxzP6Y=', '2018-04-04 08:45:00', '2018-04-05 20:06:00', 3, 'Yes', 75, 'Yes'),
(13, 'Grammar', 'Short Quiz', 7, 15, 'Open', '2018-04-04', 'rEqbiBtYxeOa4ZSRiIuwkVh532h7w2Ldbgtv+UJ47ek=', '2018-04-04 08:44:00', '2018-04-04 20:45:00', 2, 'Yes', 75, 'No'),
(14, 'Sample Exam', 'Short Quiz', 9, 15, 'Open', '2018-04-04', 'rEqbiBtYxeOa4ZSRiIuwkVh532h7w2Ldbgtv+UJ47ek=', '2018-04-04 10:01:00', '2018-04-04 22:02:00', 2, 'Yes', 75, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `oes_exam_answer`
--

CREATE TABLE IF NOT EXISTS `oes_exam_answer` (
  `answer_no` int(10) unsigned NOT NULL,
  `content_no` int(10) unsigned NOT NULL,
  `lrn` int(10) unsigned NOT NULL,
  `answer` varchar(100) NOT NULL,
  `points_earned` float unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=502 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oes_exam_answer`
--

INSERT INTO `oes_exam_answer` (`answer_no`, `content_no`, `lrn`, `answer`, `points_earned`) VALUES
(337, 183, 2204, 'fondness', 1),
(338, 171, 2204, 'feet', 1),
(339, 177, 2204, 'disagree', 1),
(340, 180, 2204, '', 0),
(341, 176, 2204, '', 0),
(342, 175, 2204, '', 0),
(343, 174, 2204, '', 0),
(344, 181, 2204, '', 0),
(345, 170, 2204, '', 0),
(346, 178, 2204, '', 0),
(347, 173, 2204, '', 0),
(348, 184, 2204, '', 0),
(349, 172, 2204, '', 0),
(350, 179, 2204, '', 0),
(351, 182, 2204, '', 0),
(353, 186, 2204, 'aklk', 0),
(356, 188, 2204, 'Di_Ko_knows', 0),
(359, 191, 2204, 'Me', 0),
(361, 194, 2204, 'Wara', 1),
(364, 198, 2204, 'Lamesa', 1),
(368, 201, 2204, 'Jose_Protacio_Rizal_Mercado_Realonda_Y__Alonzo', 0),
(371, 204, 2204, 'Saan?', 0),
(374, 207, 2204, 'Nuno_sa_punso', 1),
(377, 208, 2204, 'Liza', 0),
(380, 209, 2204, '7', 1),
(382, 210, 2204, 'Kim_Taehyung', 1),
(384, 211, 2204, 'Maybe', 0),
(385, 195, 9999, '2nd', 0),
(386, 206, 9999, 'clint', 0),
(387, 202, 9999, '1', 1),
(388, 199, 9999, '11', 0),
(389, 190, 9999, 'hace', 0),
(390, 190, 9999, 'jane', 0),
(391, 190, 9999, 'diane', 0),
(392, 192, 9999, 'false', 0),
(393, 203, 9999, '22', 0),
(394, 205, 9999, 'mama_ko', 0),
(395, 197, 9999, 'bodak', 0),
(396, 205, 20175, 'mama_ko', 0),
(397, 195, 201722, '3rd_floor', 1),
(398, 190, 11101, 'shanley', 0.333333),
(399, 192, 20175, 'false', 0),
(400, 192, 201722, 'true', 1),
(401, 190, 11101, 'nicole', 0.333333),
(402, 202, 20175, 'wala', 0),
(403, 199, 20175, '2', 1),
(404, 190, 11101, 'elma', 0),
(405, 197, 201722, 'cardi_b', 1),
(406, 190, 20175, 'noel', 0),
(407, 197, 11101, 'lol', 0),
(408, 199, 201722, '2', 1),
(409, 190, 20175, 'nicole', 0.333333),
(410, 202, 11101, 'saro', 0),
(411, 202, 201722, 'hehe', 0),
(412, 195, 11101, '3rd_floor', 1),
(413, 190, 20175, 'jomae', 0),
(414, 197, 20175, 'bts', 0),
(415, 205, 201722, 'barbs', 1),
(416, 206, 11101, 'barbs', 1),
(417, 206, 201722, 'barbs', 1),
(418, 195, 20175, 'basement', 0),
(419, 205, 11101, 'mama_ko', 0),
(420, 203, 201722, '4', 1),
(421, 190, 201722, 'fndksj', 0),
(422, 206, 20175, 'barbs', 1),
(423, 203, 11101, 'bintana', 0),
(424, 203, 20175, '5', 0),
(425, 190, 201722, 'klgdsjkl', 0),
(426, 192, 11101, 'true', 1),
(427, 190, 201722, 'kljsd', 0),
(428, 199, 11101, '2', 1),
(444, 247, 2204, 'painted', 1),
(445, 244, 2204, 'its', 1),
(446, 245, 2204, 'hypotheses', 1),
(447, 246, 2204, 'witnessed', 1),
(448, 243, 2204, 'know', 1),
(449, 241, 2204, 'searching', 1),
(450, 242, 2204, 'feet', 1),
(451, 244, 30001, 'its', 1),
(452, 246, 30001, 'witnessed', 1),
(453, 243, 30001, 'knows', 0),
(454, 241, 30001, 'searching', 1),
(455, 245, 30001, 'hypotheses', 1),
(456, 247, 30001, 'painted', 1),
(457, 242, 30001, 'foot', 0),
(458, 241, 201722, 'searching', 1),
(459, 246, 201722, 'witnessed', 1),
(460, 242, 201722, '', 0),
(461, 243, 201722, '', 0),
(462, 244, 201722, '', 0),
(463, 247, 201722, '', 0),
(464, 245, 201722, '', 0),
(465, 247, 30005, 'painted', 1),
(466, 241, 30005, 'for_searching', 0),
(467, 245, 30005, 'hypotheses', 1),
(468, 244, 30005, 'its', 1),
(469, 243, 30005, 'known', 0),
(470, 246, 30005, 'witnessed', 1),
(471, 242, 30005, 'foot', 0),
(472, 241, 201721, 'searching', 1),
(473, 247, 201721, 'painted', 1),
(474, 244, 201721, 'its', 1),
(475, 243, 201721, 'know', 1),
(476, 246, 201721, '', 0),
(477, 242, 201721, '', 0),
(478, 245, 201721, '', 0),
(479, 243, 201718, 'know', 1),
(480, 246, 201718, 'witnessed', 1),
(481, 241, 201718, 'searching', 1),
(482, 247, 201718, 'painted', 1),
(483, 245, 201718, 'hypotheses', 1),
(484, 244, 201718, 'their', 0),
(485, 242, 201718, 'foot', 0),
(486, 244, 1101, '', 0),
(487, 243, 1101, '', 0),
(488, 242, 1101, '', 0),
(489, 241, 1101, '', 0),
(490, 247, 1101, '', 0),
(491, 245, 1101, '', 0),
(492, 246, 1101, '', 0),
(493, 252, 2204, 'know', 1),
(494, 248, 2204, 'irony', 1),
(495, 249, 2204, 'wer', 0),
(496, 249, 2204, '', 0),
(497, 249, 2204, '', 0),
(498, 249, 2204, '', 0),
(499, 249, 2204, '', 0),
(500, 251, 2204, 'feet', 1),
(501, 250, 2204, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `oes_exam_content`
--

CREATE TABLE IF NOT EXISTS `oes_exam_content` (
  `content_no` int(10) unsigned NOT NULL,
  `question_no` int(10) unsigned NOT NULL,
  `exam_no` int(10) unsigned NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=253 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oes_exam_content`
--

INSERT INTO `oes_exam_content` (`content_no`, `question_no`, `exam_no`, `points`) VALUES
(170, 2, 7, 1),
(171, 3, 7, 1),
(172, 4, 7, 1),
(173, 5, 7, 1),
(174, 6, 7, 1),
(175, 7, 7, 1),
(176, 8, 7, 1),
(177, 9, 7, 1),
(178, 10, 7, 1),
(179, 11, 7, 1),
(180, 13, 7, 1),
(181, 14, 7, 1),
(182, 15, 7, 1),
(183, 16, 7, 1),
(184, 12, 7, 1),
(186, 17, 9, 1),
(188, 18, 9, 1),
(190, 22, 10, 1),
(191, 19, 9, 1),
(192, 23, 10, 1),
(194, 20, 9, 1),
(195, 24, 10, 1),
(197, 25, 10, 1),
(198, 21, 9, 1),
(199, 33, 10, 1),
(201, 38, 9, 1),
(202, 34, 10, 1),
(203, 35, 10, 1),
(204, 39, 9, 1),
(205, 36, 10, 1),
(206, 37, 10, 1),
(207, 40, 9, 1),
(208, 41, 9, 1),
(209, 42, 9, 1),
(210, 43, 9, 1),
(211, 44, 9, 1),
(232, 45, 12, 1),
(233, 46, 12, 1),
(234, 47, 12, 1),
(235, 48, 12, 1),
(236, 49, 12, 1),
(237, 50, 12, 1),
(238, 52, 12, 1),
(239, 53, 12, 1),
(240, 54, 12, 3),
(241, 2, 13, 1),
(242, 3, 13, 1),
(243, 4, 13, 1),
(244, 5, 13, 1),
(245, 6, 13, 1),
(246, 7, 13, 1),
(247, 8, 13, 1),
(248, 55, 14, 1),
(249, 56, 14, 5),
(250, 2, 14, 1),
(251, 3, 14, 1),
(252, 4, 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `oes_exam_group`
--

CREATE TABLE IF NOT EXISTS `oes_exam_group` (
  `exam_no` int(10) unsigned NOT NULL,
  `sched_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oes_exam_group`
--

INSERT INTO `oes_exam_group` (`exam_no`, `sched_id`) VALUES
(9, 2),
(10, 43),
(7, 44),
(12, 44),
(13, 44),
(14, 44),
(10, 54),
(10, 59);

-- --------------------------------------------------------

--
-- Table structure for table `oes_exam_logistics`
--

CREATE TABLE IF NOT EXISTS `oes_exam_logistics` (
  `logistic_id` int(10) unsigned NOT NULL,
  `exam_no` int(10) unsigned NOT NULL,
  `no_of_passers` int(10) unsigned NOT NULL,
  `no_failed` int(10) unsigned NOT NULL,
  `no_takers` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `oes_exam_result`
--

CREATE TABLE IF NOT EXISTS `oes_exam_result` (
  `res_id` int(10) unsigned NOT NULL,
  `exam_no` int(10) unsigned NOT NULL,
  `lrn` int(20) unsigned NOT NULL,
  `exam_score` float unsigned NOT NULL,
  `equivalent_grade` float unsigned NOT NULL,
  `result_remarks` enum('Failed.','Passed!') NOT NULL,
  `exam_datetime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oes_exam_result`
--

INSERT INTO `oes_exam_result` (`res_id`, `exam_no`, `lrn`, `exam_score`, `equivalent_grade`, `result_remarks`, `exam_datetime`) VALUES
(49, 7, 2204, 3, 20, 'Failed.', '2018-04-02 11:31:40'),
(51, 9, 2204, 5, 41.67, 'Failed.', '2018-04-02 12:02:29'),
(53, 10, 9999, 1, 11.11, 'Failed.', '2018-04-02 12:09:14'),
(54, 10, 20175, 2.33333, 25.93, 'Failed.', '2018-04-02 12:09:58'),
(55, 10, 201722, 7, 77.78, 'Passed!', '2018-04-02 12:09:59'),
(56, 10, 11101, 4.66667, 51.85, 'Failed.', '2018-04-02 12:09:59'),
(59, 13, 2204, 7, 100, 'Passed!', '2018-04-04 09:05:59'),
(60, 13, 7777, 0, 0, 'Failed.', '2018-04-04 09:08:30'),
(61, 13, 30001, 5, 71.43, 'Failed.', '2018-04-04 09:14:39'),
(62, 13, 201722, 2, 28.57, 'Failed.', '2018-04-04 09:15:48'),
(63, 13, 30002, 0, 0, 'Failed.', '2018-04-04 09:16:12'),
(64, 13, 30005, 4, 57.14, 'Failed.', '2018-04-04 09:21:37'),
(65, 13, 201718, 5, 71.43, 'Failed.', '2018-04-04 09:26:28'),
(66, 13, 201721, 4, 57.14, 'Failed.', '2018-04-04 09:26:57'),
(67, 13, 1101, 0, 0, 'Failed.', '2018-04-04 09:28:10'),
(68, 14, 2204, 3, 33.33, 'Failed.', '2018-04-04 10:07:02');

-- --------------------------------------------------------

--
-- Table structure for table `oes_question_bank`
--

CREATE TABLE IF NOT EXISTS `oes_question_bank` (
  `question_no` int(10) unsigned NOT NULL,
  `question` text NOT NULL,
  `question_type` enum('Identification','Multiple Choice','Enumeration') NOT NULL,
  `subject_id` int(10) unsigned NOT NULL,
  `emp_rec_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oes_question_bank`
--

INSERT INTO `oes_question_bank` (`question_no`, `question`, `question_type`, `subject_id`, `emp_rec_id`) VALUES
(2, 'Did you have any problem ________ our house?', 'Multiple Choice', 50006, 26),
(3, 'Most basketball players are 6 ___________ tall or more.', 'Multiple Choice', 50006, 26),
(4, 'These children _______ how to improvise more props for the play.', 'Multiple Choice', 50006, 26),
(5, 'The company will upgrade __________ computer systems next week.', 'Multiple Choice', 50006, 26),
(6, 'You have too many __________ but few time to prove you''re right.', 'Multiple Choice', 50006, 26),
(7, 'Neither Sarah nor Tina _________ the crime yesterday.', 'Multiple Choice', 50006, 26),
(8, 'We had our house _______ in yellow.', 'Multiple Choice', 50006, 26),
(9, 'I think it''s not a great idea. I totally ____________.', 'Multiple Choice', 50006, 26),
(10, 'Flight Z735 _________ yesterday. 350 passengers died in that accident.', 'Multiple Choice', 50006, 26),
(11, 'If you are (ambivalent) with the answers, analyze the given problem.', 'Multiple Choice', 50006, 26),
(12, 'Teenagers are (susceptible) to peer influence.', 'Multiple Choice', 50006, 26),
(13, 'Reading words without understanding their meaning is (futile).', 'Multiple Choice', 50006, 26),
(14, 'Their (clandestine) affair remained unknown for three years.', 'Multiple Choice', 50006, 26),
(15, 'They say love is like a firework, a (fleeting) moment.', 'Multiple Choice', 50006, 26),
(16, 'Cassy has a strong (penchant) in collecting cars.', 'Multiple Choice', 50006, 26),
(17, 'Pambansang Avon', 'Identification', 50001, 2),
(18, 'Nata na gadan si jose rizal?', 'Identification', 50001, 2),
(19, 'Sisay naka discover kang pilipinas', 'Identification', 50001, 2),
(20, 'Sisay mas magayon?', 'Multiple Choice', 50001, 2),
(21, 'Kung makaon ka sain ka matukaw?', 'Multiple Choice', 50001, 2),
(22, 'Sisay ang mga nakaputi digdi (ex. noel)', 'Enumeration', 50013, 1),
(23, 'true or false', 'Multiple Choice', 50013, 1),
(24, 'anong floor tayo nakastay ', 'Identification', 50013, 1),
(25, 'sino singer ng bodak yellow', 'Identification', 50013, 1),
(26, 'favorite band', 'Identification', 50013, 1),
(33, '1 + 1', 'Identification', 50013, 1),
(34, 'nagbili si mama ng 2 eggs ilan ang talong?', 'Identification', 50013, 1),
(35, '2 + 2', 'Identification', 50013, 1),
(36, 'sino ang pinaka maganda', 'Multiple Choice', 50013, 1),
(37, 'si clint o si barbs', 'Identification', 50013, 1),
(38, 'Ano ang totoong pangalan ni Jose Rizal?', 'Multiple Choice', 50001, 2),
(39, 'Saan matatagpuan ang Bulkang Mayon? PS : Hindi siya sa Naga', 'Identification', 50001, 2),
(40, 'Ano ang pinakamaliit na anyong lupa?', 'Multiple Choice', 50001, 2),
(41, 'Sino ang mas maganda? Liza, Nadine or Kathryn?', 'Identification', 50001, 2),
(42, 'Ilan ang members ng BTS?', 'Multiple Choice', 50001, 2),
(43, 'Ano ang totoong pangalan ni V ng BTS?', 'Multiple Choice', 50001, 2),
(44, 'Last question : Bakla ba ang kpop?', 'Multiple Choice', 50001, 2),
(45, 'The measure of choosing well is whether or not man likes what he _____________.', 'Multiple Choice', 50006, 26),
(46, 'The family of Ms. Victoria Sanchez does not live here ______________.', 'Multiple Choice', 50006, 26),
(47, 'Almost two-thirds of the population today ____________ poor.', 'Multiple Choice', 50006, 26),
(48, 'The ____________ that, for various reasons, girls spent less time working with computers than boys.', 'Multiple Choice', 50006, 26),
(49, 'Everyone in the field of entertainment ___________________ to watch the FAMAS awards.', 'Multiple Choice', 50006, 26),
(50, 'The moden space explorers have gone ______________ earlier explorers.', 'Multiple Choice', 50006, 26),
(51, 'The victim''s father refused revenge when he said:', 'Multiple Choice', 50006, 26),
(52, 'The digital video disc player is my sister''s. How about this?', 'Multiple Choice', 50006, 26),
(53, 'The figure of speech that uses words that means the opposite of what you are trying to convey.', 'Identification', 50006, 26),
(54, 'What are the different kinds of tenses?', 'Enumeration', 50006, 26),
(55, 'The figure of speech that uses words that means the opposite of the you are tying to convey', 'Identification', 50006, 26),
(56, 'wer', 'Enumeration', 50006, 26);

-- --------------------------------------------------------

--
-- Table structure for table `oes_ques_enum`
--

CREATE TABLE IF NOT EXISTS `oes_ques_enum` (
  `enum_id` int(10) unsigned NOT NULL,
  `question_no` int(10) unsigned NOT NULL,
  `en_key_answers` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oes_ques_enum`
--

INSERT INTO `oes_ques_enum` (`enum_id`, `question_no`, `en_key_answers`) VALUES
(9, 22, 'nicole'),
(10, 22, 'shanley'),
(11, 22, 'irma'),
(20, 54, 'Present'),
(21, 54, 'Past'),
(22, 54, 'Future'),
(23, 56, 'wewe'),
(24, 56, 'ewrwe'),
(25, 56, 'werwe'),
(26, 56, 'dasdasd'),
(27, 56, 'dsadasd');

-- --------------------------------------------------------

--
-- Table structure for table `oes_ques_iden`
--

CREATE TABLE IF NOT EXISTS `oes_ques_iden` (
  `iden_id` int(10) unsigned NOT NULL,
  `question_no` int(10) unsigned NOT NULL,
  `id_key_answer` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oes_ques_iden`
--

INSERT INTO `oes_ques_iden` (`iden_id`, `question_no`, `id_key_answer`) VALUES
(8, 26, 'all_time_low'),
(17, 17, 'Eagle'),
(18, 18, 'nabadil'),
(19, 19, 'Kardo_Dalisay'),
(20, 24, '3rd_floor'),
(21, 25, 'cardi_b'),
(22, 33, '2'),
(23, 34, '1'),
(24, 35, '4'),
(25, 39, 'Albay'),
(26, 39, 'Legazpi'),
(27, 37, 'barbs'),
(28, 41, 'Nadine'),
(29, 41, 'nadine'),
(32, 53, 'Irony'),
(33, 55, 'Irony');

-- --------------------------------------------------------

--
-- Table structure for table `oes_ques_mulchoice`
--

CREATE TABLE IF NOT EXISTS `oes_ques_mulchoice` (
  `mul_id` int(10) unsigned NOT NULL,
  `question_no` int(10) unsigned NOT NULL,
  `choice` text NOT NULL,
  `mul_key_answer` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=742 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oes_ques_mulchoice`
--

INSERT INTO `oes_ques_mulchoice` (`mul_id`, `question_no`, `choice`, `mul_key_answer`) VALUES
(560, 9, 'misagree', 'disagree'),
(561, 9, 'unagree', 'disagree'),
(562, 9, 'inagree', 'disagree'),
(563, 10, 'crushed', 'crashed'),
(564, 10, 'crash', 'crashed'),
(565, 10, 'crushing', 'crashed'),
(566, 11, 'confusion', 'uncertain'),
(567, 11, 'innocent', 'uncertain'),
(568, 11, 'unaware', 'uncertain'),
(569, 13, 'unnecessary', 'useless'),
(570, 13, 'helpless', 'useless'),
(571, 13, 'avoidable', 'useless'),
(572, 14, 'forbidden', 'secret'),
(573, 14, 'surprise', 'secret'),
(574, 14, 'unacceptable', 'secret'),
(575, 15, 'unforgettable', 'brief'),
(576, 15, 'shiny', 'brief'),
(577, 15, 'remarkable', 'brief'),
(578, 16, 'belief', 'fondness'),
(579, 16, 'route', 'fondness'),
(580, 16, 'hobby', 'fondness'),
(581, 12, 'flexible', 'inclined'),
(582, 12, 'dependable', 'inclined'),
(583, 12, 'inspired', 'inclined'),
(592, 23, 'false', 'true'),
(593, 20, 'Audrey', 'Wara'),
(594, 20, 'Barbin', 'Wara'),
(598, 21, 'Tukawan', 'Lamesa'),
(600, 21, 'Bankgo', 'Lamesa'),
(601, 21, 'balakadaw', 'Lamesa'),
(602, 38, 'Jose_Protacio_Mercado_Alonzo_Y_Realonda_Rizal', 'Jose_Protacio_Rizal_Mercado_Alonzo_Y_Realonda'),
(603, 38, 'Jose_Protacio_Mercado_Alonzo_RealondaY_Rizal', 'Jose_Protacio_Rizal_Mercado_Alonzo_Y_Realonda'),
(604, 38, 'Jose_Protacio_Rizal_Mercado_Realonda_Y__Alonzo', 'Jose_Protacio_Rizal_Mercado_Alonzo_Y_Realonda'),
(605, 36, 'mama_ko', 'barbs'),
(606, 40, 'Bulkan', 'Nuno_sa_punso'),
(607, 40, 'Bundok', 'Nuno_sa_punso'),
(608, 40, 'Burol', 'Nuno_sa_punso'),
(609, 42, '5', '7'),
(610, 42, '9', '7'),
(611, 42, '6', '7'),
(612, 43, 'Jeon_Jungkook', 'Kim_Taehyung'),
(613, 43, 'Min_Yoongi', 'Kim_Taehyung'),
(614, 43, 'Kim_Namjoon', 'Kim_Taehyung'),
(615, 44, 'No', 'Yes'),
(616, 44, 'Maybe', 'Yes'),
(643, 51, '"An_eye_for_an_eye"', '"Don''t_take_the_law_into_your_hands"'),
(644, 51, '"Justice_is_always_delayed"', '"Don''t_take_the_law_into_your_hands"'),
(645, 51, '"Give_him_the_other_cheek"', '"Don''t_take_the_law_into_your_hands"'),
(691, 45, 'is_choosing', 'chose'),
(692, 45, 'has_chosen', 'chose'),
(693, 45, 'choose', 'chose'),
(694, 46, 'no_more', 'anymore'),
(695, 46, 'any_more', 'anymore'),
(696, 46, 'any_longer', 'anymore'),
(697, 47, 'are', 'is'),
(698, 47, 'were', 'is'),
(699, 47, 'has_been', 'is'),
(700, 48, 'studies_revealing', 'studies_revealed'),
(701, 48, 'studies_reveal', 'studies_revealed'),
(702, 48, 'studies_have_been', 'studies_revealed'),
(703, 49, 'were_certainly_excited', 'is_certainly_excited'),
(704, 49, 'was_excited', 'is_certainly_excited'),
(705, 49, 'are_certainly_excited', 'is_certainly_excited'),
(706, 50, 'farther_than', 'further_than'),
(707, 50, 'further_from', 'further_than'),
(708, 50, 'father_on', 'further_than'),
(709, 52, 'This_is_his', 'This_is_hers'),
(710, 52, 'This_is_of_him', 'This_is_hers'),
(711, 52, 'This_is_him', 'This_is_hers'),
(721, 5, 'there', 'its'),
(722, 5, 'their', 'its'),
(723, 5, 'it''s', 'its'),
(724, 6, 'hypothesis', 'hypotheses'),
(725, 6, 'hypothesises', 'hypotheses'),
(726, 6, 'hypothesess', 'hypotheses'),
(727, 7, 'witness', 'witnessed'),
(728, 7, 'witnessing', 'witnessed'),
(729, 7, 'witnesses', 'witnessed'),
(730, 8, 'painting_', 'painted'),
(731, 8, 'to_paint', 'painted'),
(732, 8, 'paint', 'painted'),
(733, 2, 'search', 'searching'),
(734, 2, 'to_search', 'searching'),
(735, 2, 'for_searching', 'searching'),
(736, 3, 'foot', 'feet'),
(737, 3, 'foots', 'feet'),
(738, 3, 'feets', 'feet'),
(739, 4, 'knew', 'know'),
(740, 4, 'knows', 'know'),
(741, 4, 'known', 'know');

-- --------------------------------------------------------

--
-- Table structure for table `pims_children`
--

CREATE TABLE IF NOT EXISTS `pims_children` (
  `child_ID` int(5) unsigned NOT NULL,
  `child_name` varchar(110) DEFAULT NULL,
  `child_birthdate` date DEFAULT NULL,
  `emp_No` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pims_children`
--

INSERT INTO `pims_children` (`child_ID`, `child_name`, `child_birthdate`, `emp_No`) VALUES
(1, 'Danielle Borbe', '2005-12-12', 4567891),
(2, 'Ashley Balde', '2005-12-12', 4743128),
(3, 'Lukee Cater', '2005-12-12', 4901154),
(4, 'Danielle Borbe', '2005-12-12', 4990111),
(5, 'Ashley Balde', '2005-12-12', 5000129),
(6, 'Lukee Cater', '2005-12-12', 5001094),
(7, 'Danielle Borbe', '2005-12-12', 5002157),
(8, 'Ashley Balde', '2005-12-12', 5110945),
(9, 'Lukee Cater', '2005-12-12', 5143417),
(10, 'Danielle Borbe', '2005-12-12', 5166431),
(11, 'Ashley Balde', '2005-12-12', 5201107),
(12, 'Lukee Cater', '2005-12-12', 5210011),
(13, 'Danielle Borbe', '2005-12-12', 5221094),
(14, 'Ashley Balde', '2005-12-12', 5231607),
(15, 'Danica Bon', '2005-12-12', 5287126),
(16, 'Marie Digby', '2005-12-12', 5309127),
(17, 'Ashley Cas', '2005-12-12', 5340912),
(18, 'Zack Falcon', '2005-12-12', 5353113),
(19, 'Blake Fernandez', '2005-12-12', 5400127),
(20, 'Roma Joy Calla', '2005-12-12', 5412398),
(21, 'Tricia Pacala', '2005-12-12', 5432123),
(22, 'Rahnia Vesarius', '2005-12-12', 5501298),
(23, 'Elijah Montefalco', '2005-12-12', 5513092),
(24, 'Angelica de los Santos', '2005-12-12', 5566126),
(25, 'Jeric Tan', '2005-12-12', 5677342),
(26, 'Dave Franco', '2005-12-12', 5756153),
(27, 'Reid Alleje', '2005-12-12', 5880365),
(28, 'Bradley Mayor', '2005-12-12', 5901112),
(29, 'Heather Barrameda', '2005-12-12', 5902312),
(30, 'Patrick Alim', '2005-12-12', 5143417),
(31, 'Grace Roxas', '2005-12-12', 5143417),
(32, 'Kajik Riego', '2005-12-12', 5143417),
(33, 'Snow Riego', '2005-12-12', 5902312),
(34, 'Andra Cater', '2005-12-12', 50011248),
(35, 'Reina Lunas', '2005-12-12', 50011249),
(36, 'Zamiel Mercadejas', '2005-12-12', 50011250),
(37, 'Rao Lopez', '2005-12-12', 50011251),
(38, 'Savannah Mirabueno', '2005-12-12', 50011252),
(39, 'Janno Majadas', '2005-12-12', 50011253),
(40, 'Zarrick Ocampo', '2005-12-12', 50011254),
(41, 'Amiel Casaul', '2005-12-12', 50011255),
(42, 'Vincent Hidalgo', '2005-12-12', 4912093);

-- --------------------------------------------------------

--
-- Table structure for table `pims_cs_eligibility`
--

CREATE TABLE IF NOT EXISTS `pims_cs_eligibility` (
  `cse_ID` int(10) unsigned NOT NULL,
  `career_service` varchar(100) DEFAULT NULL,
  `rating` enum('PASSED','FAILED') DEFAULT NULL,
  `exam_date` date DEFAULT NULL,
  `exam_place` varchar(100) DEFAULT NULL,
  `license_no` int(20) unsigned DEFAULT NULL,
  `license_validity_date` date DEFAULT NULL,
  `emp_No` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pims_cs_eligibility`
--

INSERT INTO `pims_cs_eligibility` (`cse_ID`, `career_service`, `rating`, `exam_date`, `exam_place`, `license_no`, `license_validity_date`, `emp_No`) VALUES
(1, 'Civil Service Eligibility Examination (Professional)', 'PASSED', '1988-03-16', 'Aquinas University, Legazpi City', 100091991, NULL, 4567891),
(2, 'Civil Service Eligibility Examination (Professional)', 'PASSED', '1991-08-10', 'Bicol College, Daraga Albay', 290008712, NULL, 4743128),
(3, 'Civil Service Eligibility Examination (Professional)', 'PASSED', '1998-03-23', 'BUCIT, Legazpi City', 901124391, NULL, 4901154),
(4, 'Civil Service Eligibility Examination (Professional)', 'PASSED', '1991-08-10', 'Bicol College, Daraga Albay', 209111278, NULL, 4912093),
(5, 'Driver/s License (Professional)', 'PASSED', '1988-03-16', 'Rawis, Legazpi City', 320091991, '0000-00-00', 4990054),
(6, 'Barangay Eligibility', 'PASSED', '1991-08-10', 'Legazpi City, Albay', 8890012, NULL, 4990111),
(7, 'Civil Service Eligibility Examination (Professional)', 'PASSED', '1998-03-23', 'BUCIT, Legazpi City', 901124391, NULL, 5000129),
(8, 'Civil Service Eligibility Examination (Professional)', 'PASSED', '1991-08-10', 'BUCS, Legazpi City', 602992563, NULL, 5001094),
(9, 'Civil Service Eligibility Examination (Professional)', 'PASSED', '1988-03-16', 'Aquinas University, Legazpi City', 100091991, NULL, 5002157),
(10, 'Civil Service Eligibility Examination (Professional)', 'PASSED', '1991-08-10', 'Bicol College, Daraga Albay', 290008712, NULL, 5110945),
(11, 'Civil Service Eligibility Examination (Professional)', 'PASSED', '1998-03-23', 'BUCIT, Legazpi City', 901124391, NULL, 5143417),
(12, 'Civil Service Eligibility Examination (Professional)', 'PASSED', '1991-08-10', 'Bicol College, Daraga Albay', 209111278, NULL, 5166431),
(13, 'Driver/s License (Professional)', 'PASSED', '1988-03-16', 'Rawis, Legazpi City', 320091991, '0000-00-00', 5201107),
(14, 'Barangay Eligibility', 'PASSED', '1991-08-10', 'Legazpi City, Albay', 8890012, NULL, 5309127),
(15, 'Civil Service Eligibility Examination (Professional)', 'PASSED', '1998-03-23', 'BUCIT, Legazpi City', 901124391, NULL, 5221094),
(16, 'Civil Service Eligibility Examination (Professional)', 'PASSED', '1991-08-10', 'BUCS, Legazpi City', 602992563, NULL, 5231607),
(17, 'Civil Service Eligibility Examination (Professional)', 'PASSED', '1988-03-16', 'Aquinas University, Legazpi City', 100091991, NULL, 5287126),
(18, 'Civil Service Eligibility Examination (Professional)', 'PASSED', '1991-08-10', 'Bicol College, Daraga Albay', 290008712, NULL, 5309127),
(19, 'Civil Service Eligibility Examination (Professional)', 'PASSED', '1998-03-23', 'BUCIT, Legazpi City', 901124391, NULL, 5340912),
(20, 'Civil Service Eligibility Examination (Professional)', 'PASSED', '1991-08-10', 'Bicol College, Daraga Albay', 209111278, NULL, 5353113),
(21, 'Driver/s License (Professional)', 'PASSED', '1988-03-16', 'Rawis, Legazpi City', 320091991, '0000-00-00', 5400127),
(22, 'Barangay Eligibility', 'PASSED', '1991-08-10', 'Legazpi City, Albay', 8890012, NULL, 5412398),
(23, 'Civil Service Eligibility Examination (Professional)', 'PASSED', '1998-03-23', 'BUCIT, Legazpi City', 901124391, NULL, 5432123),
(24, 'Civil Service Eligibility Examination (Professional)', 'PASSED', '1991-08-10', 'BUCS, Legazpi City', 602992563, NULL, 5501298),
(25, 'Civil Service Eligibility Examination (Professional)', 'PASSED', '1991-08-10', 'BUCS, Legazpi City', 602992563, NULL, 5513092),
(26, 'Civil Service Eligibility Examination (Professional)', 'PASSED', '1991-08-10', 'BUCS, Legazpi City', 602992563, NULL, 5566126),
(27, 'Civil Service Eligibility Examination (Professional)', 'PASSED', '1991-08-10', 'BUCS, Legazpi City', 602992563, NULL, 5677342),
(28, 'Civil Service Eligibility Examination (Professional)', 'PASSED', '1991-08-10', 'BUCS, Legazpi City', 602992563, NULL, 5756153),
(29, 'Civil Service Eligibility Examination (Professional)', 'PASSED', '1991-08-10', 'BUCS, Legazpi City', 602992563, NULL, 5880365),
(30, 'Civil Service Eligibility Examination (Professional)', 'PASSED', '1991-08-10', 'BUCS, Legazpi City', 602992563, NULL, 5901112),
(31, 'Civil Service Eligibility Examination (Professional)', 'PASSED', '1998-03-23', 'BUCIT, Legazpi City', 901124391, NULL, 5902312),
(32, 'Civil Service Eligibility Examination (Professional)', 'PASSED', '1991-08-10', 'BUCS, Legazpi City', 602992563, NULL, 50011248),
(33, 'Civil Service Eligibility Examination (Professional)', 'PASSED', '1988-03-16', 'Aquinas University, Legazpi City', 100091991, NULL, 50011249),
(34, 'Civil Service Eligibility Examination (Professional)', 'PASSED', '1991-08-10', 'Bicol College, Daraga Albay', 290008712, NULL, 50011250),
(35, 'Civil Service Eligibility Examination (Professional)', 'PASSED', '1998-03-23', 'BUCIT, Legazpi City', 901124391, NULL, 50011251),
(36, 'Civil Service Eligibility Examination (Professional)', 'PASSED', '1991-08-10', 'Bicol College, Daraga Albay', 209111278, NULL, 50011252),
(37, 'Driver/s License (Professional)', 'PASSED', '1988-03-16', 'Rawis, Legazpi City', 320091991, '0000-00-00', 50011253),
(38, 'Barangay Eligibility', 'PASSED', '1991-08-10', 'Legazpi City, Albay', 8890012, NULL, 50011254),
(39, 'Civil Service Eligibility Examination (Professional)', 'PASSED', '1998-03-23', 'BUCIT, Legazpi City', 901124391, NULL, 50011255);

-- --------------------------------------------------------

--
-- Table structure for table `pims_department`
--

CREATE TABLE IF NOT EXISTS `pims_department` (
  `dept_ID` int(10) unsigned NOT NULL,
  `dept_name` varchar(45) NOT NULL,
  `office_org_code` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pims_department`
--

INSERT INTO `pims_department` (`dept_ID`, `dept_name`, `office_org_code`) VALUES
(1, 'English Department', 8100),
(2, 'Filipino Department', 8100),
(3, 'Mathematics Department', 8100),
(4, 'Araling Panlipunan Department', 8100),
(5, 'Science Department', 8100),
(6, 'Values Education Department', 8100),
(7, 'MAPEH Department', 8100),
(8, 'TLE Department', 8100),
(9, 'Economics Department', 8100),
(10, 'Accounting Department', 8100),
(11, 'Research Department', 8100),
(12, 'Technical Department', 8100),
(13, 'Auditing Department', 8100),
(14, 'Property & Supply Department', 8100),
(15, 'Cash & Finance Department', 8100),
(16, 'Records Department', 8100),
(17, 'IT Services Department', 8100);

-- --------------------------------------------------------

--
-- Table structure for table `pims_educational_background`
--

CREATE TABLE IF NOT EXISTS `pims_educational_background` (
  `ed_back` int(10) unsigned NOT NULL,
  `elementary_school_name` varchar(110) DEFAULT NULL,
  `elementary_academic_yr` varchar(45) DEFAULT NULL,
  `secondary_school_name` varchar(45) DEFAULT NULL,
  `secondary_academic_yr` varchar(25) DEFAULT NULL,
  `vocational_school_name` varchar(45) DEFAULT NULL,
  `vocational_course` varchar(45) DEFAULT NULL,
  `vocational_academic_yr` varchar(10) DEFAULT NULL,
  `tertiary_school_name` varchar(110) DEFAULT NULL,
  `tertiary_academic_yr` varchar(25) DEFAULT NULL,
  `tertiary_degrees` varchar(55) DEFAULT NULL,
  `gradStud_school` varchar(45) DEFAULT NULL,
  `gradStud_yr` varchar(10) DEFAULT NULL,
  `gradStud_course` varchar(45) DEFAULT NULL,
  `highest_units` double DEFAULT NULL,
  `honor_or_award` varchar(220) DEFAULT NULL,
  `affiliations` varchar(110) DEFAULT NULL,
  `emp_No` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pims_educational_background`
--

INSERT INTO `pims_educational_background` (`ed_back`, `elementary_school_name`, `elementary_academic_yr`, `secondary_school_name`, `secondary_academic_yr`, `vocational_school_name`, `vocational_course`, `vocational_academic_yr`, `tertiary_school_name`, `tertiary_academic_yr`, `tertiary_degrees`, `gradStud_school`, `gradStud_yr`, `gradStud_course`, `highest_units`, `honor_or_award`, `affiliations`, `emp_No`) VALUES
(1, 'Matnog Central Elem. School', '1992-1998', 'Matnog National High School', '1998-2002', NULL, NULL, NULL, 'Sorsogon Community College', '2002-2006', 'Bachelor in Education', 'UPLB', '2007-2011', 'BS Pharmacy', NULL, 'Cum Laude', NULL, 4567891),
(2, 'San Francisco Elem. School', '1987-1993', 'Arimbay High School', '1993-1997', NULL, NULL, NULL, 'San Francisco Institute', '1997-2001', 'Bachelor of Arts in Education', NULL, NULL, NULL, NULL, 'Dean''s Lister', 'University School Council', 4743128),
(3, 'San Isidro Elem. School', '1999-2005', 'Tabaco National High School', '2005-2009', NULL, NULL, NULL, 'Daniel B. Pena Memorial College Foundation', '2009-2013', 'BS Accountancy', NULL, NULL, NULL, NULL, NULL, NULL, 4901154),
(4, 'Daraga Elem. School', '1992-1998', 'Daraga High School', '1998-2002', NULL, NULL, NULL, 'Bicol College', '2002-2006', 'BS Food Technology', NULL, NULL, NULL, NULL, 'Cooking Fest 2nd Runner Up', NULL, 4912093),
(5, 'Tabaco Northwest School', '1997-2003', 'Legazpi Central High School', '2003-2007', NULL, NULL, NULL, 'Bicol University, Legazpi City', '2007-2012', 'BS Accountancy', NULL, NULL, NULL, NULL, 'Summa Cum Laude', NULL, 5002157),
(6, 'Pagasa Elem. School', '1988-1994', 'Pagasa National High School', '1994-1998', NULL, NULL, NULL, 'Aquinas University of Legazpi', '1998-2002', 'AB Communication', NULL, NULL, NULL, NULL, 'DevComm Writing 1st Runner Up', 'School Publication Editor-in-Chief', 5110945),
(7, 'Upper Bonga Elem. School', '1977-1983', 'Sogod National High School', '1983-1989', NULL, NULL, NULL, 'Marian College', '1989-1993', 'BEED in Secondary Education', NULL, NULL, NULL, NULL, 'Cum Laude', NULL, 5166431),
(8, 'Guinobatan East Central School', '1984-1989', 'Malipo National High School', '1989-1995', NULL, NULL, NULL, 'BU College of Forestry', '1995-1999', 'BS Agriculture', NULL, NULL, NULL, NULL, NULL, 'College Based Organization Vice-President A.Y. 1996-1998', 5221094),
(9, 'Daraga Elem. School', '1972-1979', 'Daraga High School', '1979-1983', NULL, NULL, NULL, 'Bicol University, College of Education', '1983-1987', 'BA Secondary Education', NULL, NULL, NULL, NULL, 'Dean''s Lister A.Y. 1985-1986', NULL, 5231607),
(10, 'Tiwi Central School', '1997-2003', 'Daraga High School', '2003-2007', NULL, NULL, NULL, 'Daraga Community College', '2007-2009', 'Information System', NULL, NULL, NULL, NULL, NULL, NULL, 5287126),
(11, 'Albay Central School', '1997-2003', 'Legazpi Central High School', '2003-2007', NULL, NULL, NULL, 'STI Legazpi City', '2007-2011', 'BS Computer Science', NULL, NULL, NULL, NULL, NULL, NULL, 5309127),
(12, 'Pilar I Central School', '1975-1984', 'Pilar National Comprehensive HS', '1984-1988', NULL, NULL, NULL, 'Bicol University, Legazpi City', '1988-1992', 'AB English', NULL, NULL, NULL, NULL, 'Regional Press Con. 3rd Runner Up', 'Budyong, CAL Publication', 5340912),
(13, 'Guinobatan East Central School', '1995-2002', 'Batbat High School', '2002-2006', NULL, NULL, NULL, 'Guinobatan College Foundation', '2006-2010', 'BA Education in Secondary Major in Biological Science', NULL, NULL, NULL, NULL, NULL, NULL, 5353113),
(14, 'Malinao Central Elem. School', '1988-1994', 'Malinao National High School', '1995-1999', NULL, NULL, NULL, 'TESDA', '1999-2001', 'Electrical Works', NULL, NULL, NULL, NULL, NULL, NULL, 5400127),
(15, 'Poblacion Elem. School', '1978-1984', 'Albay Central School', '1988-1992', NULL, NULL, NULL, 'Bicol University, Legazpi City', '1992-1996', 'BS Chemistry', NULL, NULL, NULL, NULL, NULL, NULL, 5412398),
(16, 'Guinobatan West Central School', '2001-2007', 'Masarawag National High School', '2007-2011', NULL, NULL, NULL, 'Bicol University, Daraga Albay', '2011-2015', 'BS Economics', NULL, NULL, NULL, NULL, 'Dean''s Lister A.Y. 2014-2015', NULL, 5432123),
(17, 'Camalig Soth Central School', '1988-1997', 'Bariw National High School', '1997-2001', NULL, NULL, NULL, 'Bicol College', '2002-2006', 'BS Food Technology', NULL, NULL, NULL, NULL, NULL, NULL, 5501298),
(18, 'Libtong Elem. School', '1997-2003', 'Sto. Domingo National High School', '2003-2007', NULL, NULL, NULL, 'Mariners Academy', '2007-2011', 'BS Criminology', NULL, NULL, NULL, NULL, NULL, NULL, 5513092),
(19, 'Bogna Elem. School', '1973-1979', 'Bonga National High School', '1981-1985', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5677342),
(20, 'Tabaco South Central elem. School', '1975-1982', 'Tabaco National High School', '1982-1986', NULL, NULL, NULL, 'TESDA', '1986-1988', 'Electronics', NULL, NULL, NULL, NULL, NULL, NULL, 5756153),
(21, 'The Hague Academy', '1997-2003', 'Legazpi Central High School', '2003-2007', NULL, NULL, NULL, 'Bicol University, Legazpi City', '2007-2011', 'BS Computer Science', NULL, NULL, NULL, NULL, 'CPC 2nd Runner Up', NULL, 5880365),
(22, 'Sto. Domingo Elementary School', '1997-2003', 'Sto. Domingo High School', '2003-2007', NULL, NULL, NULL, 'BU Tabaco Campus', '2007-2011', 'Bachelor of  Secondary Education', NULL, NULL, NULL, NULL, 'Magna Cum Laude', NULL, 4990054),
(23, 'Cabangan Elem. School', '1987-1993', 'Daraga High School', '1993-1997', NULL, NULL, NULL, 'Bicol College', '1997-2001', 'Bachelor in Secondary Education', NULL, NULL, NULL, NULL, NULL, NULL, 4990111),
(24, 'Cabangan Elem. School', '1987-1993', 'Daraga High School', '1993-1997', NULL, NULL, NULL, 'Bicol College', '1997-2001', 'Bachelor in Secondary Education', NULL, NULL, NULL, NULL, NULL, NULL, 50011249),
(25, 'Cabangan Elem. School', '1987-1993', 'Daraga High School', '1993-1997', 'asd', 'asd', '1993-1997', 'Bicol College', '1997-2001', 'Bachelor in Secondary Education', 'University of the Philippines, Diliman', '2001-2005', 'BS Metallurgy', NULL, 'Cum Laude', 'Student Service', 50011252);

-- --------------------------------------------------------

--
-- Table structure for table `pims_employment_records`
--

CREATE TABLE IF NOT EXISTS `pims_employment_records` (
  `emp_rec_ID` int(10) unsigned NOT NULL,
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
  `dept_ID` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pims_employment_records`
--

INSERT INTO `pims_employment_records` (`emp_rec_ID`, `complete_item_no`, `work_stat`, `role_type`, `emp_status`, `date_joined`, `date_retired`, `div_code`, `biometric_ID`, `school_ID`, `appointment_date`, `faculty_type`, `job_title_code`, `emp_No`, `dept_ID`) VALUES
(1, '89A72ReV', 'WORKING', 'Principal', 'PERMANENT', '2006-06-10', NULL, 4100, '65456', 8100, '2006-10-10', 'Non Teaching', 'SP1', 5143417, NULL),
(2, 'DF4656', 'RETIRED', 'Employee', 'PERMANENT', '2005-04-19', '2018-05-09', 4501, '123456', 8100, '2005-04-19', 'Teaching', 'MTCHR1', 4990111, 1),
(3, 'FD5609', 'WORKING', 'Employee', 'PERMANENT', '2005-04-19', NULL, 78678, 'HASS34', 8100, '2005-04-19', 'Teaching', 'HTEACH1', 4743128, 1),
(6, 'OSEDF-3453459', 'WORKING', 'Employee', 'PERMANENT', '2017-09-12', NULL, 2, '9876', 1225, '2017-09-12', 'Teaching', 'HTEACH1', 4912093, 3),
(9, 'FD56Z09', 'WORKING', 'Employee', 'PERMANENT', '2005-04-19', NULL, 78678, 'HASZS34', 8100, '2005-04-19', 'Teaching', 'TCH2', 5902312, 2),
(10, 'DFAS90', 'WORKING', 'Manager', 'PERMANENT', '2005-04-19', NULL, 46523, 'JUGJH89', 8100, '2005-04-19', 'Non Teaching', 'SUO1', 50011249, NULL),
(11, 'JHBVHJV', 'WORKING', 'Employee', 'PERMANENT', '2005-04-19', NULL, 67578, 'KHGJH12', 8100, '2005-04-19', 'Teaching', 'TCH1', 5566126, 3),
(12, 'DFzS90', 'WORKING', 'Employee', 'PERMANENT', '2005-04-19', NULL, 41523, 'JUGKH89', 8100, '2005-04-19', 'Non Teaching', 'HTEACH4', 5000129, 3),
(13, 'JLBVHJV', 'WORKING', 'Employee', 'PERMANENT', '2005-04-19', NULL, 67278, 'KH9JH12', 8100, '2005-04-19', 'Teaching', 'HTEACH3', 5880365, 4),
(14, 'OSEC-DECSB-HTEACH1-394542-2015', 'RETIRED', 'Employee', 'PERMANENT', '2017-10-04', '2018-05-10', 164, '40989355', 302261, '2015-10-09', 'Teaching', 'HTEACH1', 4990054, 4),
(16, 'DFYS90', 'WORKING', 'Employee', 'PERMANENT', '2005-04-19', NULL, 41523, 'LUAKH89', 8100, '2005-04-19', 'Teaching', 'TCH2', 5287126, 4),
(17, 'JLBVHIV', 'WORKING', 'Employee', 'PERMANENT', '2005-04-19', NULL, 67878, 'KH9JH02', 8100, '2005-04-19', 'Teaching', 'HTEACH4', 5432123, 5),
(18, 'DFYSD0', 'WORKING', 'Employee', 'PERMANENT', '2005-04-19', NULL, 40523, 'LUAKB89', 8100, '2005-04-19', 'Teaching', 'TCH2', 5412398, 5),
(19, 'OYBVHIV', 'WORKING', 'Employee', 'PERMANENT', '2005-04-19', NULL, 67178, 'KM9JH02', 8100, '2005-04-19', 'Teaching', 'HTEACH3', 5110945, 6),
(20, 'DFQSD0', 'WORKING', 'Employee', 'PERMANENT', '2005-04-19', NULL, 40583, 'LUAMB89', 8100, '2005-04-19', 'Teaching', 'TCH3', 5501298, 6),
(21, 'OYBSHIV', 'WORKING', 'Employee', 'PERMANENT', '2005-04-19', NULL, 66178, 'KR9JH02', 8100, '2005-04-19', 'Teaching', 'HTEACH4', 5002157, 7),
(22, 'EFQSD0', 'WORKING', 'Employee', 'PERMANENT', '2005-04-19', NULL, 48583, 'LVAMB89', 8100, '2005-04-19', 'Teaching', 'TCH1', 5231607, 7),
(23, 'PYBSHIV', 'WORKING', 'Employee', 'PERMANENT', '2005-04-19', NULL, 66188, 'LR9JH02', 8100, '2005-04-19', 'Teaching', 'TCH1', 5756153, 8),
(26, 'EFRSD0', 'WORKING', 'Employee', 'PERMANENT', '2005-04-19', NULL, 48584, 'LVAMB99', 8100, '2005-04-19', 'Teaching', 'HTEACH5', 5201107, 8),
(27, 'OYBTHIV', 'WORKING', 'Employee', 'PERMANENT', '2005-04-19', NULL, 66183, 'LR10JH02', 8100, '2005-04-19', 'Teaching', 'HTEACH6', 5166431, 9),
(28, 'OYCTHIV', 'WORKING', 'Employee', 'PERMANENT', '2005-04-19', NULL, 67183, 'L10JH02', 8100, '2005-04-19', 'Teaching', 'TCH3', 5309127, 9),
(29, '67865786', 'WORKING', 'Manager', 'PERMANENT', '2004-11-21', NULL, 553732, 'RHE3S', 8100, '2004-11-21', 'Non Teaching', 'RK1', 50011250, NULL),
(30, '231456', 'WORKING', 'Manager', 'PERMANENT', '2004-11-21', NULL, 78655, 'FU25V', 8100, '2004-11-21', 'Non Teaching', 'HRM1', 50011251, NULL),
(31, '987554', 'WORKING', 'Employee', 'PERMANENT', '2004-11-21', NULL, 54335, '87CGH', 8100, '2004-11-21', 'Teaching', 'ICTD', 50011252, NULL),
(32, '786578', 'WORKING', 'Employee', 'PERMANENT', '2004-11-21', NULL, 3276, '03DJ73', 8100, '2004-11-21', 'Non Teaching', 'NURS1', 50011253, NULL),
(33, '39872', 'WORKING', 'Employee', 'PERMANENT', '2004-11-21', NULL, 89734, '1DF8934', 8100, '2004-11-21', 'Non Teaching', 'CASH1', 50011254, NULL),
(34, 'JD563LO', 'WORKING', 'Employee', 'PERMANENT', '2002-04-03', NULL, 4500, 'LH345B', 8100, '2002-04-03', 'Teaching', 'INST1', 5513092, 1),
(35, 'FGHDF34', 'WORKING', 'Employee', 'PERMANENT', '2005-09-04', NULL, 4500, 'HS673DF', 8100, '2005-09-04', 'Teaching', 'MTCHR1', 5901112, 1),
(36, 'HDF344C', 'WORKING', 'Employee', 'PERMANENT', '2004-04-11', NULL, 7800, 'JICV13', 8100, '2004-04-11', 'Non Teaching', 'ADOF1', 5677342, NULL),
(37, 'HDBT44C', 'WORKING', 'Principal', 'PERMANENT', '2004-04-11', NULL, 7800, 'JJCCV13', 8100, '2004-04-11', 'Non Teaching', 'ASSP', 5221094, NULL),
(38, 'HDBT49C', 'WORKING', 'Principal', 'PERMANENT', '2004-04-11', NULL, 7800, 'JZCCV13', 8100, '2004-04-11', 'Non Teaching', 'SECSP2', 5001094, NULL),
(39, 'HJBT49C', 'WORKING', 'Employee', 'PERMANENT', '2004-04-11', NULL, 7800, 'JZYCV13', 8100, '2004-04-11', 'Teaching', 'TCH2', 5400127, 4),
(40, 'FHGBGN', 'WORKING', 'Employee', 'PERMANENT', '2004-04-11', NULL, 8436, 'DFGBCV12', 8100, '2004-04-11', 'Teaching', 'TCH1', 5340912, 7),
(41, 'FOG6GN', 'WORKING', 'Employee', 'PERMANENT', '2004-04-11', NULL, 8976, 'KFGBUV12', 8100, '2004-04-11', 'Teaching', 'ASSP', 50011255, NULL),
(43, 'FOG6TN', 'WORKING', 'Employee', 'PERMANENT', '2004-04-11', NULL, 0, 'KFGOUV12', 8100, '2004-04-11', 'Teaching', 'TCH1', 50011248, 3),
(44, 'FOG6TT', 'WORKING', 'Employee', 'PERMANENT', '2004-04-11', NULL, 5976, 'MFGOUV12', 8100, '2004-04-11', 'Teaching', 'TCH1', 5353113, 8),
(45, 'FO2641', 'WORKING', 'Employee', 'PERMANENT', '2004-04-11', NULL, 5976, 'MF09UV12', 8100, '2004-04-11', 'Teaching', 'TCH1', 5210011, 6),
(46, 'FZ2641', 'WORKING', 'Employee', 'PERMANENT', '2004-04-11', NULL, 5876, 'MFIVUV12', 8100, '2004-04-11', 'Teaching', 'TCH1', 4567891, 4),
(47, 'FZ2BN1', 'WORKING', 'Employee', 'PERMANENT', '2004-04-11', NULL, 5806, '7AIVUV12', 8100, '2004-04-11', 'Teaching', 'TCH1', 4901154, 6);

-- --------------------------------------------------------

--
-- Table structure for table `pims_family_background`
--

CREATE TABLE IF NOT EXISTS `pims_family_background` (
  `fb_ID` int(10) unsigned NOT NULL,
  `spouse_firstname` varchar(45) DEFAULT NULL,
  `spouse_middlename` varchar(45) DEFAULT NULL,
  `spouse_lastname` varchar(45) DEFAULT NULL,
  `spouse_extension_name` varchar(45) DEFAULT NULL,
  `spouse_occupation` varchar(40) DEFAULT NULL,
  `spouse_business_name` varchar(40) DEFAULT NULL,
  `spouse_business_addr` varchar(40) DEFAULT NULL,
  `spouse_tel_no` varchar(20) DEFAULT NULL,
  `father_fname` varchar(45) DEFAULT NULL,
  `father_mname` varchar(45) DEFAULT NULL,
  `father_lname` varchar(45) DEFAULT NULL,
  `father_extension_name` varchar(45) DEFAULT NULL,
  `father_birthdate` date DEFAULT NULL,
  `father_occupation` varchar(45) DEFAULT NULL,
  `mother_fname` varchar(45) DEFAULT NULL,
  `mother_mname` varchar(45) DEFAULT NULL,
  `mother_maidenname` varchar(45) DEFAULT NULL,
  `mother_lname` varchar(45) DEFAULT NULL,
  `mother_birthdate` date DEFAULT NULL,
  `mother_occupation` varchar(45) DEFAULT NULL,
  `children_name` varchar(45) DEFAULT NULL,
  `children_birthdate` date DEFAULT NULL,
  `emp_No` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pims_family_background`
--

INSERT INTO `pims_family_background` (`fb_ID`, `spouse_firstname`, `spouse_middlename`, `spouse_lastname`, `spouse_extension_name`, `spouse_occupation`, `spouse_business_name`, `spouse_business_addr`, `spouse_tel_no`, `father_fname`, `father_mname`, `father_lname`, `father_extension_name`, `father_birthdate`, `father_occupation`, `mother_fname`, `mother_mname`, `mother_maidenname`, `mother_lname`, `mother_birthdate`, `mother_occupation`, `children_name`, `children_birthdate`, `emp_No`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Vincent', 'Alegre', 'Hidalgo', '', '1960-12-21', 'Architect', 'Ysabella', 'Velasquez', 'Riego', 'Hidalgo', '1965-02-26', '', '', '0000-00-00', 5566126),
(2, 'Marien', 'Logo', 'Llanco', NULL, NULL, NULL, NULL, NULL, 'Vincent', 'Cano', 'Llanco', '', '1955-03-15', '', 'Lilia', 'Reyes', 'Cuanqo', 'Llanco', '1962-09-09', '', '', '0000-00-00', 4567891),
(3, 'Rica', 'Ceriola', 'Ludovice', NULL, NULL, NULL, NULL, NULL, 'Mario', 'Bueza', 'Ludovice', '', '1954-07-23', '', 'Amelia', 'Bueno', 'Lima', 'Ludovice', '1961-12-26', '', '', '0000-00-00', 4743128),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jude Michael ', 'Fernandez', 'Llona', '', '1968-04-19', 'Business Man', 'Karina', 'Heras', 'Burce', 'Llona', '1971-09-12', 'Business Woman', '', '0000-00-00', 4901154),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Angelo', 'Prieto', 'Casin', '', '1947-02-22', '', 'Victoria', 'Lopez', 'Cater', 'Casin', '1956-01-30', '', '', '0000-00-00', 4912093),
(6, 'Lorraine', 'dela Vega', 'Riego', NULL, NULL, NULL, NULL, NULL, 'Emmanuel', 'Vesarius', 'Riego', '', '1960-11-20', 'Business Man', 'Veronica', 'Montero', 'Mercadejas', 'Riego', '1968-02-26', '', '', '0000-00-00', 4990054),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Amiel', 'Martinez', 'Bio', '', '1950-08-11', '', 'Feliza', 'Ocampo', '', 'Bio', '1957-06-04', '', '', '0000-00-00', 5000129),
(8, 'Dylan', 'Guevarra', 'Anderson', NULL, NULL, NULL, NULL, NULL, 'Daniel', 'Brutas', 'Ricardo', '', '1959-12-30', '', 'Teresa', 'Illana', 'Mercado', 'Brutas', '1965-03-17', '', '', '0000-00-00', 5001094),
(9, 'Patricia', 'Bonaobra', 'Padilla', NULL, NULL, NULL, NULL, NULL, 'Marlon', 'Suarez', 'Padilla', '', '1956-06-09', '', 'Ma. Ellen', 'Trilles', 'Silvano', 'Padilla', '1956-08-01', '', '', '0000-00-00', 5210011),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Alfred', 'Breva', 'Nasol', '', '1968-10-11', 'Electrician', 'Jessica', 'Lala', 'Lopez', 'Nasol', '1970-11-10', 'Business Woman', '', '0000-00-00', 5432123),
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Johann', 'Alegre', 'Nieva', '', '1960-12-21', 'Architect', 'Ysabella', 'Velasquez', 'Riego', 'Hidalgo', '1965-02-26', '', '', '0000-00-00', 5340912),
(12, 'Marien', 'Logo', 'Llanco', NULL, NULL, NULL, NULL, NULL, 'Allan', 'Cano', 'Guevarra', '', '1955-03-15', '', 'Lilia', 'Reyes', 'Cuanqo', 'Llanco', '1962-09-09', '', '', '0000-00-00', 5756153),
(13, 'Rica', 'Ceriola', 'Ludovice', NULL, NULL, NULL, NULL, NULL, 'Mario', 'Bueza', 'Ludovice', '', '1954-07-23', '', 'Amelia', 'Bueno', 'Lima', 'Ludovice', '1961-12-26', '', '', '0000-00-00', 5880365),
(14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jude Michael ', 'Fernandez', 'Llona', '', '1968-04-19', 'Business Man', 'Karina', 'Heras', 'Burce', 'Llona', '1971-09-12', 'Business Woman', '', '0000-00-00', 5902312),
(15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Angelo', 'Prieto', 'Casin', '', '1947-02-22', '', 'Victoria', 'Lopez', 'Cater', 'Casin', '1956-01-30', '', '', '0000-00-00', 50011248),
(16, 'Lorraine', 'dela Vega', 'Riego', NULL, NULL, NULL, NULL, NULL, 'Emmanuel', 'Vesarius', 'Padre', '', '1960-11-20', 'Business Man', 'Veronica', 'Montero', 'Mercadejas', 'Riego', '1968-02-26', '', '', '0000-00-00', 50011249),
(17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Amiel', 'Martinez', 'Bio', '', '1950-08-11', '', 'Feliza', 'Ocampo', '', 'Bio', '1957-06-04', '', '', '0000-00-00', 50011250),
(18, 'Dylan', 'Guevarra', 'Anderson', NULL, NULL, NULL, NULL, NULL, 'Daniel', 'Brutas', 'Ricardo', '', '1959-12-30', '', 'Teresa', 'Illana', 'Mercado', 'Brutas', '1965-03-17', '', '', '0000-00-00', 5201107),
(19, 'Patricia', 'Bonaobra', 'Padilla', NULL, NULL, NULL, NULL, NULL, 'Marlon', 'Suarez', 'Padilla', '', '1956-06-09', '', 'Ma. Ellen', 'Trilles', 'Silvano', 'Padilla', '1956-08-01', '', '', '0000-00-00', 50011253),
(20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Alfred', 'Breva', 'Nasol', '', '1968-10-11', 'Electrician', 'Jessica', 'Lala', 'Lopez', 'Nasol', '1970-11-10', 'Business Woman', '', '0000-00-00', 5353113),
(21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Vincent', 'Alegre', 'Hidalgo', '', '1960-12-21', 'Architect', 'Ysabella', 'Velasquez', 'Riego', 'Hidalgo', '1965-02-26', '', '', '0000-00-00', 5566126),
(22, 'Patricia', 'Bonaobra', 'Barrameda', 'Barrameda', 'sdf', 'sdf', 'asd', 'sdf', 'Marlon', 'Suarez', 'Barrameda', 'asdasdasdasdasd', '1956-06-09', 'asd', 'Ma. Ellen', 'Trilles', 'Silvano', 'Padilla', '1956-08-01', 'asd', 'asd', '2018-04-02', 50011252),
(23, 'Rica', 'Ceriola', 'Ludovice', NULL, NULL, NULL, NULL, NULL, 'Mario', 'Bueza', 'Ludovice', '', '1954-07-23', '', 'Amelia', 'Bueno', 'Lima', 'Ludovice', '1961-12-26', '', '', '0000-00-00', 4743128),
(24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jude Michael ', 'Fernandez', 'Llona', '', '1968-04-19', 'Business Man', 'Karina', 'Heras', 'Burce', 'Llona', '1971-09-12', 'Business Woman', '', '0000-00-00', 4901154),
(25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Angelo', 'Prieto', 'Casin', '', '1947-02-22', '', 'Victoria', 'Lopez', 'Cater', 'Casin', '1956-01-30', '', '', '0000-00-00', 4912093),
(26, 'Lorraine', 'dela Vega', 'Riego', NULL, NULL, NULL, NULL, NULL, 'Emmanuel', 'Vesarius', 'Riego', '', '1960-11-20', 'Business Man', 'Veronica', 'Montero', 'Mercadejas', 'Riego', '1968-02-26', '', '', '0000-00-00', 4990054),
(27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Amiel', 'Martinez', 'Bio', '', '1950-08-11', '', 'Feliza', 'Ocampo', '', 'Bio', '1957-06-04', '', '', '0000-00-00', 5000129),
(28, 'Dylan', 'Guevarra', 'Anderson', NULL, NULL, NULL, NULL, NULL, 'Daniel', 'Brutas', 'Ricardo', '', '1959-12-30', '', 'Teresa', 'Illana', 'Mercado', 'Brutas', '1965-03-17', '', '', '0000-00-00', 5001094),
(29, 'Patricia', 'Bonaobra', 'Padilla', NULL, NULL, NULL, NULL, NULL, 'Marlon', 'Suarez', 'Padilla', '', '1956-06-09', '', 'Ma. Ellen', 'Trilles', 'Silvano', 'Padilla', '1956-08-01', '', '', '0000-00-00', 5210011),
(30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Alfred', 'Breva', 'Nasol', '', '1968-10-11', 'Electrician', 'Jessica', 'Lala', 'Lopez', 'Nasol', '1970-11-10', 'Business Woman', '', '0000-00-00', 5432123);

-- --------------------------------------------------------

--
-- Table structure for table `pims_field`
--

CREATE TABLE IF NOT EXISTS `pims_field` (
  `field_ID` int(11) unsigned NOT NULL,
  `major` int(10) unsigned DEFAULT NULL,
  `minor` int(10) unsigned DEFAULT NULL,
  `related` int(10) unsigned DEFAULT NULL,
  `emp_No` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pims_field`
--

INSERT INTO `pims_field` (`field_ID`, `major`, `minor`, `related`, `emp_No`) VALUES
(1, 50001, 50002, 50003, 4567891),
(2, 50002, 50003, 50004, 4743128),
(4, 50003, 50004, 50006, 4901154),
(5, 50004, 50006, 50007, 4912093),
(6, 50006, NULL, 50007, 4990054),
(7, 50010, 50011, NULL, 4990111),
(8, 50002, 50011, NULL, 5166431),
(9, 50003, NULL, NULL, 5309127),
(10, 50002, NULL, NULL, 5340912),
(11, 50007, NULL, NULL, 5231607),
(12, 50011, NULL, NULL, 50011255),
(13, 50007, NULL, NULL, 50011254),
(14, 50001, 50002, 50003, 5000129),
(15, 50002, 50003, 50004, 5001094),
(16, 50003, 50004, 50006, 5002157),
(17, 50004, 50006, 50007, 5110945),
(18, 50006, NULL, 50007, 5143417),
(19, 50010, 50011, NULL, 5201107),
(20, 50002, 50011, NULL, 5210011),
(21, 50003, NULL, NULL, 5221094),
(22, 50002, NULL, NULL, 5287126),
(23, 50007, NULL, NULL, 5309127),
(24, 50011, NULL, NULL, 5340912),
(25, 50007, NULL, NULL, 5353113),
(26, 50001, 50002, 50003, 5400127),
(27, 50002, 50003, 50004, 5412398),
(28, 50003, 50004, 50006, 5432123),
(29, 50004, 50006, 50007, 5501298),
(30, 50006, NULL, 50007, 5513092),
(31, 50010, 50011, NULL, 5566126),
(32, 50002, 50011, NULL, 5677342),
(33, 50003, NULL, NULL, 5756153),
(34, 50002, NULL, NULL, 5880365),
(35, 50007, NULL, NULL, 5901112),
(36, 50011, NULL, NULL, 5902312),
(37, 50007, NULL, NULL, 50011248),
(38, 50001, 50002, 50003, 50011249),
(39, 50002, 50003, 50004, 50011250);

-- --------------------------------------------------------

--
-- Table structure for table `pims_job_title`
--

CREATE TABLE IF NOT EXISTS `pims_job_title` (
  `job_title_code` varchar(45) NOT NULL,
  `job_title_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pims_job_title`
--

INSERT INTO `pims_job_title` (`job_title_code`, `job_title_name`) VALUES
('A1', 'Accountant I'),
('A2', 'Accountant II'),
('A3', 'Accountant III'),
('ADOF1', 'Administrative Officer I'),
('ASSP', 'Assistant Special School Principal'),
('CASH1', 'Cashier I'),
('CMM', 'Construction and Maintenance Man'),
('DENT1', 'Dentist I'),
('DORMG1', 'Dormitory Manager I'),
('EPS', 'Education Program Supervisor'),
('ESUP1', 'Education Supervisor I'),
('EXED2', 'Executive Director II'),
('HRM1', 'Human Resource Manager I'),
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
('PDO1', 'Project Development Officer I'),
('PPROS', 'Publication Production Supervisor'),
('R1', 'Registrar I'),
('RK1', 'Record Keeper'),
('SADAS1', 'Senior Administrative Assistant I'),
('SECG1', 'Security Guard I'),
('SECSP2', 'Secondary School Principal'),
('SP1', 'School Principal I'),
('SP2', 'School Principal II'),
('SP3', 'School Principal III'),
('SP4', 'School Principal IV'),
('SPET1', 'Special Education Teacher I'),
('SPSP1', 'Special School Principal I'),
('SPSP2', 'Special School Principal II'),
('SUO1', 'Supply Officer I'),
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
  `leave_ID` int(10) unsigned NOT NULL,
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
  `leave_bal_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pims_leave`
--

INSERT INTO `pims_leave` (`leave_ID`, `type`, `date_submitted`, `date_responded`, `leave_start`, `leave_end`, `place_to_be_visited`, `purpose`, `approved_by`, `attachment`, `attachment_name`, `attachment_type`, `leave_application_status`, `leave_bal_id`) VALUES
(1, 'Official', '2017-10-02', '2017-10-03', '2017-10-03 13:00:00', '2017-10-05 17:00:00', 'Naga', 'Contest', 'Secondary School Principal', NULL, 'Juan Dela Cruz', NULL, 'Approved', 2),
(2, 'Personal', '2017-08-07', '2017-08-08', '2017-08-09 09:00:00', '2017-08-11 12:00:00', 'Cam. Norte', 'Paternity Leave', 'SECONDARY SCHOOL PRINCIPAL', NULL, NULL, NULL, 'APPROVED', 16),
(3, 'Personal', '2017-08-15', '2017-08-15', '2017-08-16 13:00:00', '2017-08-22 17:00:00', 'Mandaluyong City', 'Orthopedic Session of son', 'SECONDARY SCHOOL PRINCIPAL', NULL, NULL, NULL, 'APPROVED', 5),
(4, 'Official', '2017-06-19', '2017-06-20', '2017-06-22 08:00:00', '2017-06-26 17:00:00', NULL, 'Project Construction', 'SECONDARY SCHOOL PRINCIPAL', NULL, NULL, NULL, 'APPROVED', 1),
(5, 'Personal', '2017-09-12', '2017-09-14', '2017-09-18 09:00:00', '2017-09-29 17:00:00', 'Singapore', 'Family Matters', 'SECONDARY SCHOOL PRINCIPAL', NULL, 'Jose Sta. Ana', NULL, 'APPROVED', 18),
(6, 'Official', '2016-10-14', '2016-10-18', '2016-10-17 12:00:00', '2016-10-20 17:00:00', '', 'Seminar & Workshop', 'SECONDARY SCHOOL PRINCIPAL', NULL, '', NULL, 'APPROVED', 16),
(7, 'Personal', '2017-07-04', '2017-07-04', '2017-07-04 13:00:00', '2017-07-05 17:00:00', 'Camarines Sur', 'Confidential', 'SECONDARY SCHOOL PRINCIPAL', NULL, '', NULL, 'APPROVED', 4),
(8, 'Official', '2017-09-18', '2017-09-18', '2017-09-19 08:00:00', '2017-09-22 12:00:00', 'Masbate', 'Official Travel', 'SECONDARY SCHOOL PRINCIPAL', NULL, '', NULL, 'APPROVED', 7),
(9, 'Official', '2017-02-06', '2017-03-07', '2017-02-08 07:00:00', '2017-02-10 17:00:00', 'Batangas', 'Science Contest', 'SECONDARY SCHOOL PRINCIPAL', NULL, 'Juan dela Cruz\r\nShanley Rosero', NULL, 'APPROVED', 12),
(10, 'Official', '2016-11-15', '2016-11-16', '2016-11-17 07:00:00', '2016-11-18 07:00:00', 'Sorsogon', 'Workshop', 'SECONDARY SCHOOL PRINCIPAL', NULL, NULL, NULL, 'APPROVED', 14),
(11, 'Official', '2017-01-09', '2017-01-10', '2017-01-10 07:00:00', '2017-01-12 12:00:00', NULL, 'OB', 'SECONDARY SCHOOL PRINCIPAL', NULL, NULL, NULL, 'APPROVED', 17),
(13, 'Personal', '2017-10-16', '2017-10-16', '2017-10-17 08:00:00', '2017-10-19 17:00:00', 'Catanduanes', 'Family Matters', 'SECONDARY SCHOOL PRINCIPAL', NULL, NULL, NULL, 'APPROVED', 9),
(14, 'Personal', '2016-07-25', '2016-07-25', '2016-07-26 09:00:00', '2016-08-01 17:00:00', NULL, 'Random matters', 'SECONDARY SCHOOL PRINCIPAL', NULL, NULL, NULL, 'APPROVED', 6),
(15, 'Personal', '2016-06-19', '2016-06-20', '2016-06-22 08:00:00', '2016-06-26 17:00:00', NULL, NULL, 'SECONDARY SCHOOL PRINCIPAL', NULL, NULL, NULL, 'DISAPPROVED', 15),
(16, 'Personal', '2017-09-12', '2017-09-14', '2017-09-18 09:00:00', '2017-09-29 17:00:00', 'Singapore', 'Family Matters', 'SECONDARY SCHOOL PRINCIPAL', NULL, NULL, NULL, 'CANCELLED', 12),
(17, 'Official', '2016-11-14', '2016-11-15', '2016-11-17 12:00:00', '2016-11-20 17:00:00', '', 'Seminar & Workshop', 'SECONDARY SCHOOL PRINCIPAL', NULL, '', NULL, 'APPROVED', 6),
(18, 'Personal', '2017-07-04', '2017-07-04', '2017-07-04 13:00:00', '2017-07-05 17:00:00', 'Camarines Sur', 'Confidential', 'SECONDARY SCHOOL PRINCIPAL', NULL, '', NULL, 'CANCELLED', 17),
(19, 'Official', '2017-09-18', '2017-09-18', '2017-09-19 08:00:00', '2017-09-22 12:00:00', 'Masbate', 'Official Travel', 'SECONDARY SCHOOL PRINCIPAL', NULL, '', NULL, 'APPROVED', 9),
(20, 'Official', '2016-10-14', '2016-10-18', '2016-10-17 12:00:00', '2016-10-20 17:00:00', '', 'Seminar & Workshop', 'SECONDARY SCHOOL PRINCIPAL', NULL, '', NULL, 'APPROVED', 16),
(21, 'Personal', '2017-07-05', '2017-07-05', '2017-07-06 13:00:00', '2017-07-15 17:00:00', 'Palawan', 'Confidential', 'SECONDARY SCHOOL PRINCIPAL', NULL, '', NULL, 'DISAPPROVED', 1),
(22, 'Official', '2016-09-18', '2016-09-18', '2016-09-19 08:00:00', '2016-09-22 12:00:00', 'Daet, Cam. Norte', 'Official Travel', 'SECONDARY SCHOOL PRINCIPAL', NULL, '', NULL, 'CANCELLED', 7),
(23, 'Official', '2017-07-19', '2017-07-20', '2017-07-22 08:00:00', '2017-07-26 17:00:00', NULL, 'Project Construction', 'SECONDARY SCHOOL PRINCIPAL', NULL, NULL, NULL, 'APPROVED', 1),
(24, 'Personal', '2017-10-12', '2017-10-14', '2017-10-18 09:00:00', '2017-10-29 17:00:00', 'Cagayan de Oro', NULL, 'SECONDARY SCHOOL PRINCIPAL', NULL, 'Jose Sta. Ana', NULL, 'DISAPPROVED', 18),
(25, 'Personal', '2018-01-20', '2018-04-02', '2018-01-22 00:00:00', '2018-01-26 00:00:00', 'My House', 'To Sleep Personally', 'Cruz, Jeremy Natividad', NULL, NULL, NULL, 'Approved', 21),
(26, 'Official', '2018-04-02', '0000-00-00', '2018-04-01 00:00:00', '2018-04-16 00:00:00', 'Manila', 'Conference', 'None', 0x55457344424251414141414941473567755562454367763630414141414530424141416e41414141634768774c58426b5a69316e5a57356c636d4630615739754c58567a6157356e4c575a775a4759766157356b5a5867756347687764592f4c43734977454558584b66516673684353516e7a7570466278515665436775412b4e464d74784362474242587833303162745737634a4f52793575544f5a4b61504f67774d6e463168674a4a6369377866485432666b79674f6734352f34415358634d587064705853543961647a6f585938674d30695648584a432b6b56316831762f54737a5a4b573349464e56576b706d5a754353384c49677244684b497052474f544b414d2b4f74424a6766734856766566535159516659594136676c75657745314c4a6277374a71774676423539787975756e732b55644b6579495479416d675a4c6b4a4b4f422f3558396b7577595731426632712b57364957575a663175732f505a68746e74624e314e70752b4146424c41775155414141414341414359626c474846656955586f4141414364414141414a6741414148426f634331775a4759745a3256755a584a6864476c766269313163326c755a79316d6347526d4c33527665584d75644868303830764d5462554f7153784935655679537331544d4452514345387353633677646b6f734b556b74716c514979613873357556797a4573487370307969314b4b4664784c3836783955354d7a45764d796b784e7a6f417143556e507a533149566e424f4c724b464d6948686f586a35494d4b5859476b517175414e74342b58795471314d796764797258314c6935484d384d704d4c3034734c375a32796f63704251425153774543464141554141414143414275594c6c4778416f4c2b7441414141424e415141414a7741414141414141414142414341414141414141414141634768774c58426b5a69316e5a57356c636d4630615739754c58567a6157356e4c575a775a4759766157356b5a5867756347687755457342416851414641414141416741416d4735526878586f6c4636414141416e5141414143594141414141414141414151416741414141465145414148426f634331775a4759745a3256755a584a6864476c766269313163326c755a79316d6347526d4c33527665584d75644868305545734642674141414141434141494171514141414e4d424141414141413d3d, 'php-pdf-generation-using-fpdf.zip', 'application/x-zip-compressed', 'Pending', 23),
(28, 'Official', '2018-04-02', '0000-00-00', '2018-04-01 00:00:00', '2018-04-07 00:00:00', 'Manila City', 'Conference', 'None', NULL, NULL, NULL, 'Pending', 23),
(30, 'Personal', '2018-04-02', '0000-00-00', '2018-04-02 00:00:00', '2018-04-06 00:00:00', 'Sample Place', 'Sample Purpose', 'None', NULL, NULL, NULL, 'Pending', 23);

-- --------------------------------------------------------

--
-- Table structure for table `pims_leave_balance`
--

CREATE TABLE IF NOT EXISTS `pims_leave_balance` (
  `leave_bal_ID` int(10) unsigned NOT NULL,
  `leave_credits` varchar(20) NOT NULL,
  `leave_status` varchar(45) NOT NULL,
  `emp_No` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pims_leave_balance`
--

INSERT INTO `pims_leave_balance` (`leave_bal_ID`, `leave_credits`, `leave_status`, `emp_No`) VALUES
(1, '3', 'Pending', 4567891),
(2, '2', 'Pending', 5513092),
(3, '5', 'Pending', 4743128),
(4, '0', 'Finished', 4912093),
(5, '3', 'Pending', 5166431),
(6, '6', 'Pending', 5677342),
(7, '3', 'Pending', 5231607),
(8, '5', 'Pending', 5340912),
(9, '1', 'Pending', 5221094),
(10, '1', 'Pending', 4912093),
(11, '8', 'Pending', 4743128),
(12, '2', 'Pending', 5287126),
(13, '1', 'Pending', 5309127),
(14, '0', 'Finished', 5110945),
(15, '6', 'Pending', 4901154),
(16, '2', 'Pending', 5353113),
(17, '0', 'Finished', 5513092),
(18, '9', 'Pending', 5501298),
(19, '4', 'Pending', 5166431),
(20, '0', 'Finished', 5432123),
(21, '-1', 'Unknown', 50011252),
(22, '-2', 'Unknown', 5143417),
(23, '0', 'Pending', 50011253);

-- --------------------------------------------------------

--
-- Table structure for table `pims_messages`
--

CREATE TABLE IF NOT EXISTS `pims_messages` (
  `p_mes_id` int(10) unsigned NOT NULL,
  `cms_account_ID` int(10) unsigned NOT NULL,
  `p_message` text NOT NULL,
  `p_status` enum('0','1') NOT NULL,
  `p_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `p_part_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pims_messages`
--

INSERT INTO `pims_messages` (`p_mes_id`, `cms_account_ID`, `p_message`, `p_status`, `p_time`, `p_part_id`) VALUES
(1, 77, 'mfewojgfwefgewf', '0', '2018-04-01 10:17:12', 23),
(2, 77, 'afjwenfnewlgf', '0', '2018-04-01 10:17:14', 23),
(3, 77, 'wnfkwnrglkwrn', '0', '2018-04-01 10:17:15', 23),
(4, 77, 'weghwekgnkwrng', '0', '2018-04-01 10:17:16', 23),
(5, 77, 'weihfnherwlngv', '0', '2018-04-01 10:17:17', 23),
(6, 77, 'idshnfgwoengerwl', '0', '2018-04-01 10:17:18', 23),
(7, 77, 'ilwdbnogfewrjbgv', '0', '2018-04-01 10:17:19', 23),
(8, 77, 'nevgfwkbnv', '0', '2018-04-01 10:17:20', 23),
(9, 77, 'wnegkwnrbgvl', '0', '2018-04-01 10:17:22', 23),
(10, 77, 'swbgevewp;l.gnv', '0', '2018-04-01 10:17:23', 23),
(11, 72, 'Hello Sir!', '1', '2018-04-02 07:36:23', 25),
(12, 95, 'The BU students really work hard for this system. ', '1', '2018-04-02 22:01:44', 26),
(13, 95, 'Sir', '1', '2018-04-02 22:01:44', 26),
(14, 95, 'dhfhd', '1', '2018-04-02 22:01:44', 26),
(15, 95, 'hfdhdf', '1', '2018-04-02 22:01:44', 26),
(16, 95, 'dfhdf', '1', '2018-04-02 22:01:44', 26),
(17, 95, 'hdfhd', '1', '2018-04-02 22:01:44', 26),
(18, 95, 'dhdfh', '1', '2018-04-02 22:01:45', 26),
(19, 95, 'dhdfh', '1', '2018-04-02 22:01:45', 26),
(20, 95, 'dhdfh', '1', '2018-04-02 22:01:45', 26),
(21, 95, 'hdf', '1', '2018-04-02 22:01:45', 26),
(22, 95, 'asd', '1', '2018-04-02 22:02:12', 26),
(23, 77, 'hey', '1', '2018-04-02 22:02:14', 26),
(24, 95, 'jolkm;', '0', '2018-04-03 07:11:46', 28),
(25, 95, 'hello', '0', '2018-04-03 07:12:01', 29),
(26, 95, 'hello', '0', '2018-04-03 07:12:21', 30),
(27, 95, 'gutyj', '1', '2018-04-04 01:53:59', 26),
(28, 95, 'sf,asfas', '1', '2018-04-04 01:53:58', 26),
(29, 77, 'po?', '1', '2018-04-04 01:54:02', 26),
(30, 95, 'Failed tayo/', '1', '2018-04-04 01:54:20', 26),
(31, 95, 'Hahaha', '1', '2018-04-04 01:54:23', 26),
(32, 77, 'haha rip', '1', '2018-04-04 01:54:32', 26),
(33, 95, 'haha may pic na ako', '1', '2018-04-04 01:56:15', 26);

-- --------------------------------------------------------

--
-- Table structure for table `pims_other_info`
--

CREATE TABLE IF NOT EXISTS `pims_other_info` (
  `oi_ID` int(10) unsigned NOT NULL,
  `special_skills` varchar(100) DEFAULT NULL,
  `hobbies` varchar(100) DEFAULT NULL,
  `oi_recognition` varchar(100) DEFAULT NULL,
  `org_membership` varchar(100) DEFAULT NULL,
  `emp_No` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pims_other_info`
--

INSERT INTO `pims_other_info` (`oi_ID`, `special_skills`, `hobbies`, `oi_recognition`, `org_membership`, `emp_No`) VALUES
(1, 'Technical Skills', 'Cooking', NULL, 'KALIPI', 50011255),
(2, 'Computing Skills', 'Eating, Cooking', NULL, 'KALIPI', 50011254),
(3, 'Managerial Skills', 'Playing Volleyball', NULL, 'KALIPI', 50011253),
(4, 'Technical Skills', 'Golf', NULL, 'KALIPI', 50011252),
(5, 'Technical Skills', 'Singing', NULL, 'KALIPI', 50011251),
(6, 'Managerial Skills', 'Cooking', NULL, 'SEDP Inc.', 50011250),
(7, 'Technical Skills', 'Movie Watching', NULL, 'KALIPI', 50011249),
(8, 'Technical Skills', 'Cooking', NULL, 'KALIPI', 50011248),
(9, 'Computer & Technical Skills', 'Cooking', NULL, 'KALIPI', 5902312),
(10, 'Technical Skills', 'Movie Watching, Singing', NULL, NULL, 5901112),
(11, 'Technical Skills', 'Billiard', NULL, 'KALIPI', 5880365),
(12, 'Managerial Skills', 'Cooking', NULL, 'KALIPI', 5756153),
(13, 'Technical Skills', 'Online Gaming', NULL, 'SEDP Inc.', 5677342),
(14, 'Accounting Skills', 'Cooking', NULL, 'KALIPI', 5566126),
(15, 'Technical Skills', 'Dancing', NULL, 'KALIPI', 5513092),
(16, 'Computing Skills', 'Sports', NULL, 'KALIPI', 5501298),
(17, 'Technical Skills', 'Cooking', NULL, 'KALIPI', 5432123),
(18, 'Computer & Technical Skills', 'Cooking', NULL, 'KALIPI', 5412398),
(19, 'Technical Skills', 'Cooking', NULL, 'SEDP Inc.', 5400127),
(20, 'Technical Skills', 'Cooking', NULL, 'KALIPI', 5353113),
(21, 'Managerial Skills', 'Movie Watching', NULL, 'KALIPI', 5340912),
(22, 'Technical Skills', 'Cooking', NULL, 'SEDP Inc.', 5309127),
(23, 'Computer & Technical Skills', 'Cooking', NULL, 'KABAYAN', 5287126),
(24, 'Technical Skills', 'Cooking', NULL, 'KALIPI', 5231607),
(25, 'Managerial Skills', 'Movie Watching', NULL, 'SEDP Inc.', 5221094),
(26, 'Technical Skills', 'Jogging, Dancing', NULL, 'KALIPI', 5210011),
(27, 'Computer & Technical Skills', 'Cooking', NULL, 'KALIPI', 5201107),
(28, 'Technical Skills', 'Cooking', NULL, 'KALIPI', 5166431),
(29, 'Computer & Technical Skills', 'Cooking', NULL, 'KALIPI', 5143417),
(30, 'Technical Skills', 'Playing Outdoor Games', NULL, 'KALIPI', 5110945),
(31, 'Managerial Skills', 'Cooking', NULL, 'KALIPI', 5002157),
(32, 'Technical Skills', 'Cooking', NULL, 'KALIPI', 5001094),
(33, 'Computer & Technical Skills', 'Cooking', NULL, 'KALIPI', 5000129),
(34, 'Technical Skills', 'Cooking', NULL, 'KALIPI', 4990111),
(35, 'Technical Skills', 'Online Gaming, Cooking', NULL, NULL, 4990054),
(36, 'Computer & Technical Skills', 'Cooking', NULL, 'KALIPI', 4912093),
(37, 'Technical Skills', 'Sports, Cooking', NULL, 'KALIPI', 4901154),
(38, 'Technical Skills', 'Cooking', NULL, 'KALIPI', 4743128),
(39, 'Computing Skills', 'Cooking', NULL, 'KALIPI', 4567891);

-- --------------------------------------------------------

--
-- Table structure for table `pims_participant`
--

CREATE TABLE IF NOT EXISTS `pims_participant` (
  `p_part_id` int(10) unsigned NOT NULL,
  `p_user_one` int(10) unsigned NOT NULL,
  `p_user_two` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pims_participant`
--

INSERT INTO `pims_participant` (`p_part_id`, `p_user_one`, `p_user_two`) VALUES
(23, 77, 98),
(24, 77, 75),
(25, 72, 77),
(26, 95, 77),
(27, 95, 75),
(28, 95, 98),
(29, 95, 84),
(30, 95, 217);

-- --------------------------------------------------------

--
-- Table structure for table `pims_personnel`
--

CREATE TABLE IF NOT EXISTS `pims_personnel` (
  `emp_No` int(10) unsigned NOT NULL,
  `P_picture` longblob,
  `P_fname` varchar(45) NOT NULL,
  `P_mname` varchar(45) DEFAULT NULL,
  `P_lname` varchar(45) NOT NULL,
  `P_extension_name` varchar(5) DEFAULT NULL,
  `P_email` varchar(45) DEFAULT NULL,
  `pims_gender` enum('Male','Female') NOT NULL,
  `pims_age` int(10) unsigned DEFAULT NULL,
  `pims_birthdate` date NOT NULL,
  `place_of_birth` varchar(115) DEFAULT NULL,
  `height_m` double DEFAULT NULL,
  `weight_kg` double DEFAULT NULL,
  `temp_address_street` varchar(110) DEFAULT NULL,
  `temp_address_house_no` int(10) unsigned DEFAULT NULL,
  `temp_address_subdivision_village` varchar(55) DEFAULT NULL,
  `temp_address_barangay` varchar(45) DEFAULT NULL,
  `temp_address_municipality_city` varchar(45) DEFAULT NULL,
  `temp_address_province` varchar(45) DEFAULT NULL,
  `temp_address_zipCode` int(10) unsigned NOT NULL,
  `perm_address_street` varchar(45) DEFAULT NULL,
  `perm_address_house_no` int(10) unsigned DEFAULT NULL,
  `perm_address_subdivision_village` varchar(55) DEFAULT NULL,
  `perm_address_barangay` varchar(45) DEFAULT NULL,
  `perm_address_municipality_city` varchar(45) DEFAULT NULL,
  `perm_address_province` varchar(45) DEFAULT NULL,
  `perm_address_zipCode` int(10) unsigned DEFAULT NULL,
  `nationality` varchar(45) DEFAULT NULL,
  `dual_citznshp_by_birth` varchar(55) DEFAULT NULL,
  `dual_citznshp_by_naturalization` varchar(55) DEFAULT NULL,
  `bloodtype` varchar(5) DEFAULT NULL,
  `civil_status` enum('SINGLE','MARRIED','LIVE-IN','SEPARATED','WIDOW','WIDOWER','DIVORCED') DEFAULT NULL,
  `pims_religion` varchar(45) DEFAULT NULL,
  `pims_image_type` varchar(45) DEFAULT NULL,
  `pims_contact_no` varchar(20) DEFAULT NULL,
  `pims_telephone_no` varchar(45) DEFAULT NULL,
  `GSIS_No` varchar(25) DEFAULT NULL,
  `PAG_IBIG_id` varchar(45) DEFAULT NULL,
  `SSS_no` varchar(45) DEFAULT NULL,
  `TIN_no` varchar(45) DEFAULT NULL,
  `PHILHEALTH_no` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=50011256 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pims_personnel`
--

INSERT INTO `pims_personnel` (`emp_No`, `P_picture`, `P_fname`, `P_mname`, `P_lname`, `P_extension_name`, `P_email`, `pims_gender`, `pims_age`, `pims_birthdate`, `place_of_birth`, `height_m`, `weight_kg`, `temp_address_street`, `temp_address_house_no`, `temp_address_subdivision_village`, `temp_address_barangay`, `temp_address_municipality_city`, `temp_address_province`, `temp_address_zipCode`, `perm_address_street`, `perm_address_house_no`, `perm_address_subdivision_village`, `perm_address_barangay`, `perm_address_municipality_city`, `perm_address_province`, `perm_address_zipCode`, `nationality`, `dual_citznshp_by_birth`, `dual_citznshp_by_naturalization`, `bloodtype`, `civil_status`, `pims_religion`, `pims_image_type`, `pims_contact_no`, `pims_telephone_no`, `GSIS_No`, `PAG_IBIG_id`, `SSS_no`, `TIN_no`, `PHILHEALTH_no`) VALUES
(4567891, NULL, 'Vincent', 'Reyes', 'Llanco', 'IV', 'vincereyes@gmail.com', 'Male', 33, '1985-01-27', 'Matnog, Sorsogon', 1.61, 56, NULL, 11, NULL, 'Em''s', 'Legazpi City', 'Albay', 4505, 'San Andres', 90, 'Happy Homes', 'Cobo', 'Tabaco City', 'Albay', 4511, 'Filipino', NULL, NULL, 'AB', 'MARRIED', 'Roman Catholic', 'image/png', '09123456789', '099-012', 'CM 3456121', '585511', NULL, NULL, '1239876');
INSERT INTO `pims_personnel` (`emp_No`, `P_picture`, `P_fname`, `P_mname`, `P_lname`, `P_extension_name`, `P_email`, `pims_gender`, `pims_age`, `pims_birthdate`, `place_of_birth`, `height_m`, `weight_kg`, `temp_address_street`, `temp_address_house_no`, `temp_address_subdivision_village`, `temp_address_barangay`, `temp_address_municipality_city`, `temp_address_province`, `temp_address_zipCode`, `perm_address_street`, `perm_address_house_no`, `perm_address_subdivision_village`, `perm_address_barangay`, `perm_address_municipality_city`, `perm_address_province`, `perm_address_zipCode`, `nationality`, `dual_citznshp_by_birth`, `dual_citznshp_by_naturalization`, `bloodtype`, `civil_status`, `pims_religion`, `pims_image_type`, `pims_contact_no`, `pims_telephone_no`, `GSIS_No`, `PAG_IBIG_id`, `SSS_no`, `TIN_no`, `PHILHEALTH_no`) VALUES
(4743128, NULL, 'Joseph', 'Bueno', 'Ludovice', NULL, 'joseph@gmail.com', 'Male', 37, '1980-08-22', 'Sto.Domingo, Albay', 1.66, 61, 'Flores St.', NULL, NULL, 'Mabini', 'Sto. Domingo', 'Albay', 4508, 'Flores St.', NULL, NULL, 'Mabini', 'Sto. Domingo', 'Albay', 4508, 'Filipino', NULL, NULL, 'O', 'MARRIED', 'Born Again', 'image/png', '09999954321', '003-008', 'EF 122517', '789671', '98081', '7551', '321335');
INSERT INTO `pims_personnel` (`emp_No`, `P_picture`, `P_fname`, `P_mname`, `P_lname`, `P_extension_name`, `P_email`, `pims_gender`, `pims_age`, `pims_birthdate`, `place_of_birth`, `height_m`, `weight_kg`, `temp_address_street`, `temp_address_house_no`, `temp_address_subdivision_village`, `temp_address_barangay`, `temp_address_municipality_city`, `temp_address_province`, `temp_address_zipCode`, `perm_address_street`, `perm_address_house_no`, `perm_address_subdivision_village`, `perm_address_barangay`, `perm_address_municipality_city`, `perm_address_province`, `perm_address_zipCode`, `nationality`, `dual_citznshp_by_birth`, `dual_citznshp_by_naturalization`, `bloodtype`, `civil_status`, `pims_religion`, `pims_image_type`, `pims_contact_no`, `pims_telephone_no`, `GSIS_No`, `PAG_IBIG_id`, `SSS_no`, `TIN_no`, `PHILHEALTH_no`) VALUES
(4901154, NULL, 'Michael', 'Herras', 'Llona', 'Jr.', 'mikellona@gmail.com', 'Male', 25, '1993-04-04', 'Ziga Memorial Hospital, Tabaco City', 1.57, 55, NULL, NULL, NULL, 'San Isidro', 'Malilipot', 'Albay', 4508, NULL, NULL, NULL, 'San Isidro', 'Malilipot', 'Albay', 4508, 'Filipino', NULL, NULL, 'O', 'SINGLE', 'Roman Catholic', 'image/png', NULL, '999-097', 'RT 09824271', '767632', '008321461', '1100643', '45431611');
INSERT INTO `pims_personnel` (`emp_No`, `P_picture`, `P_fname`, `P_mname`, `P_lname`, `P_extension_name`, `P_email`, `pims_gender`, `pims_age`, `pims_birthdate`, `place_of_birth`, `height_m`, `weight_kg`, `temp_address_street`, `temp_address_house_no`, `temp_address_subdivision_village`, `temp_address_barangay`, `temp_address_municipality_city`, `temp_address_province`, `temp_address_zipCode`, `perm_address_street`, `perm_address_house_no`, `perm_address_subdivision_village`, `perm_address_barangay`, `perm_address_municipality_city`, `perm_address_province`, `perm_address_zipCode`, `nationality`, `dual_citznshp_by_birth`, `dual_citznshp_by_naturalization`, `bloodtype`, `civil_status`, `pims_religion`, `pims_image_type`, `pims_contact_no`, `pims_telephone_no`, `GSIS_No`, `PAG_IBIG_id`, `SSS_no`, `TIN_no`, `PHILHEALTH_no`) VALUES
(4912093, NULL, 'Savannah', 'Lopez', 'Casin', NULL, 'vannah23@gmail.com', 'Female', 31, '1986-12-14', 'Sagpon, Daraga, Albay', 1.49, 45, '', NULL, NULL, 'Sagpon', 'Daraga', 'Albay', 4504, NULL, NULL, NULL, 'San Vicente', 'Tabaco City', 'Albay', 4511, 'Filipino', NULL, NULL, 'A', 'SINGLE', 'Iglesia Ni Cristo', 'image/png', '09876123401', NULL, 'CM 9871243', '501246', '3321980', '190232', '0219324');
INSERT INTO `pims_personnel` (`emp_No`, `P_picture`, `P_fname`, `P_mname`, `P_lname`, `P_extension_name`, `P_email`, `pims_gender`, `pims_age`, `pims_birthdate`, `place_of_birth`, `height_m`, `weight_kg`, `temp_address_street`, `temp_address_house_no`, `temp_address_subdivision_village`, `temp_address_barangay`, `temp_address_municipality_city`, `temp_address_province`, `temp_address_zipCode`, `perm_address_street`, `perm_address_house_no`, `perm_address_subdivision_village`, `perm_address_barangay`, `perm_address_municipality_city`, `perm_address_province`, `perm_address_zipCode`, `nationality`, `dual_citznshp_by_birth`, `dual_citznshp_by_naturalization`, `bloodtype`, `civil_status`, `pims_religion`, `pims_image_type`, `pims_contact_no`, `pims_telephone_no`, `GSIS_No`, `PAG_IBIG_id`, `SSS_no`, `TIN_no`, `PHILHEALTH_no`) VALUES
(4990054, NULL, 'Radleigh', 'Montero', 'Riego', NULL, 'joseph@gmail.com', 'Male', 27, '1990-08-22', 'Sto.Domingo, Albay', 1.57, 61, 'Flores St.', NULL, NULL, 'Mabini', 'Sto. Domingo', 'Albay', 4508, 'Flores \r\n\r\nSt.', NULL, NULL, 'Mabini', 'Sto. Domingo', 'Albay', 4508, 'Filipino', NULL, NULL, 'O', 'MARRIED', 'Born Again', 'image/png', '09011112321', '123-008', 'CL 98980', '888801', '0044281', '755991', '39995');
INSERT INTO `pims_personnel` (`emp_No`, `P_picture`, `P_fname`, `P_mname`, `P_lname`, `P_extension_name`, `P_email`, `pims_gender`, `pims_age`, `pims_birthdate`, `place_of_birth`, `height_m`, `weight_kg`, `temp_address_street`, `temp_address_house_no`, `temp_address_subdivision_village`, `temp_address_barangay`, `temp_address_municipality_city`, `temp_address_province`, `temp_address_zipCode`, `perm_address_street`, `perm_address_house_no`, `perm_address_subdivision_village`, `perm_address_barangay`, `perm_address_municipality_city`, `perm_address_province`, `perm_address_zipCode`, `nationality`, `dual_citznshp_by_birth`, `dual_citznshp_by_naturalization`, `bloodtype`, `civil_status`, `pims_religion`, `pims_image_type`, `pims_contact_no`, `pims_telephone_no`, `GSIS_No`, `PAG_IBIG_id`, `SSS_no`, `TIN_no`, `PHILHEALTH_no`) VALUES
(4990111, NULL, 'Bryan', 'Nivera', 'Solis', NULL, 'ryansolis@ymail.com', 'Male', 36, '1981-10-01', 'Guinobatan, Albay', 1.67, 50, 'Rizal St.', 210, NULL, 'Cabangan', 'Legazpi City', 'Albay', 4505, 'Mabini St.', 210, NULL, 'Poblacion', 'Legazpi City', 'Albay', 4505, 'Filipino', NULL, NULL, 'AB', 'SINGLE', 'Roman Catholic', 'image/png', '0908642469', NULL, 'IO 228000', '9000511', '1001821', '1100118', '0000117');
INSERT INTO `pims_personnel` (`emp_No`, `P_picture`, `P_fname`, `P_mname`, `P_lname`, `P_extension_name`, `P_email`, `pims_gender`, `pims_age`, `pims_birthdate`, `place_of_birth`, `height_m`, `weight_kg`, `temp_address_street`, `temp_address_house_no`, `temp_address_subdivision_village`, `temp_address_barangay`, `temp_address_municipality_city`, `temp_address_province`, `temp_address_zipCode`, `perm_address_street`, `perm_address_house_no`, `perm_address_subdivision_village`, `perm_address_barangay`, `perm_address_municipality_city`, `perm_address_province`, `perm_address_zipCode`, `nationality`, `dual_citznshp_by_birth`, `dual_citznshp_by_naturalization`, `bloodtype`, `civil_status`, `pims_religion`, `pims_image_type`, `pims_contact_no`, `pims_telephone_no`, `GSIS_No`, `PAG_IBIG_id`, `SSS_no`, `TIN_no`, `PHILHEALTH_no`) VALUES
(5000129, NULL, 'Shirley', 'Bio', 'Rodriguez', NULL, 'shie_R12@gmail.com', 'Female', 32, '1985-04-29', 'Pilar, Sorsogon', 1.49, 51, NULL, 6, 'Luna St.', 'Cabangan', 'Legazpi City', 'Albay', 4505, 'Luna St.', 6, NULL, 'Barriada', 'Legazpi City', 'Albay', 4505, 'Filipino', NULL, NULL, 'B', 'MARRIED', 'Roman Catholic', 'image/png', '09098621811', NULL, 'CM 8888002', '6099909', '00001182', '044123', '111221');
INSERT INTO `pims_personnel` (`emp_No`, `P_picture`, `P_fname`, `P_mname`, `P_lname`, `P_extension_name`, `P_email`, `pims_gender`, `pims_age`, `pims_birthdate`, `place_of_birth`, `height_m`, `weight_kg`, `temp_address_street`, `temp_address_house_no`, `temp_address_subdivision_village`, `temp_address_barangay`, `temp_address_municipality_city`, `temp_address_province`, `temp_address_zipCode`, `perm_address_street`, `perm_address_house_no`, `perm_address_subdivision_village`, `perm_address_barangay`, `perm_address_municipality_city`, `perm_address_province`, `perm_address_zipCode`, `nationality`, `dual_citznshp_by_birth`, `dual_citznshp_by_naturalization`, `bloodtype`, `civil_status`, `pims_religion`, `pims_image_type`, `pims_contact_no`, `pims_telephone_no`, `GSIS_No`, `PAG_IBIG_id`, `SSS_no`, `TIN_no`, `PHILHEALTH_no`) VALUES
(5001094, NULL, 'Lyka', 'Ricardo', 'Brutas', NULL, 'lyka_doll@ymail.com', 'Female', 31, '1986-09-21', 'Guinobatan, Albay', 1.59, 53, 'Mabini St.', 210, NULL, 'Poblacion', 'Legazpi City', 'Albay', 4505, 'Mabini St.', 210, NULL, 'Poblacion', 'Legazpi City', 'Albay', 4505, 'Filipino', NULL, NULL, 'O', 'MARRIED', 'Roman Catholic', 'image/png', '09923797112', NULL, 'KL 98125901', '999111', '000811', '122001', '000128');
INSERT INTO `pims_personnel` (`emp_No`, `P_picture`, `P_fname`, `P_mname`, `P_lname`, `P_extension_name`, `P_email`, `pims_gender`, `pims_age`, `pims_birthdate`, `place_of_birth`, `height_m`, `weight_kg`, `temp_address_street`, `temp_address_house_no`, `temp_address_subdivision_village`, `temp_address_barangay`, `temp_address_municipality_city`, `temp_address_province`, `temp_address_zipCode`, `perm_address_street`, `perm_address_house_no`, `perm_address_subdivision_village`, `perm_address_barangay`, `perm_address_municipality_city`, `perm_address_province`, `perm_address_zipCode`, `nationality`, `dual_citznshp_by_birth`, `dual_citznshp_by_naturalization`, `bloodtype`, `civil_status`, `pims_religion`, `pims_image_type`, `pims_contact_no`, `pims_telephone_no`, `GSIS_No`, `PAG_IBIG_id`, `SSS_no`, `TIN_no`, `PHILHEALTH_no`) VALUES
(5002157, NULL, 'Hannah', '', 'Bonina', '', 'hannahb@ymail,com', 'Female', 26, '1991-04-19', 'Bombon, Tabaco City, Albay', 1.53, 61, NULL, 401, NULL, 'Bitano', 'Legazpi City', 'Albay', 4505, NULL, 401, NULL, 'Bitano', 'Legazpi City', 'Albay', 4505, 'Filipino', NULL, NULL, 'O', 'SINGLE', 'Roman Catholic', 'image/png', '09120854321', NULL, 'CM 6670125', NULL, NULL, NULL, '672013');
INSERT INTO `pims_personnel` (`emp_No`, `P_picture`, `P_fname`, `P_mname`, `P_lname`, `P_extension_name`, `P_email`, `pims_gender`, `pims_age`, `pims_birthdate`, `place_of_birth`, `height_m`, `weight_kg`, `temp_address_street`, `temp_address_house_no`, `temp_address_subdivision_village`, `temp_address_barangay`, `temp_address_municipality_city`, `temp_address_province`, `temp_address_zipCode`, `perm_address_street`, `perm_address_house_no`, `perm_address_subdivision_village`, `perm_address_barangay`, `perm_address_municipality_city`, `perm_address_province`, `perm_address_zipCode`, `nationality`, `dual_citznshp_by_birth`, `dual_citznshp_by_naturalization`, `bloodtype`, `civil_status`, `pims_religion`, `pims_image_type`, `pims_contact_no`, `pims_telephone_no`, `GSIS_No`, `PAG_IBIG_id`, `SSS_no`, `TIN_no`, `PHILHEALTH_no`) VALUES
(5110945, NULL, 'Dylan', 'Llanco', 'Anderson', NULL, 'dyanderson@ymail.com', 'Male', 36, '1981-11-30', 'Rawis, Albay', 1.66, 59, NULL, NULL, NULL, 'Pagasa', 'Rawis', 'Albay', 4505, NULL, NULL, NULL, 'Pagasa', 'Rawis', 'Albay', 4505, 'Filipino', NULL, NULL, 'O', 'MARRIED', 'Roman Catholic', 'image/png', NULL, '011-821', 'CD 9701001', '1200178', '0961001', '386400', '97830012');
INSERT INTO `pims_personnel` (`emp_No`, `P_picture`, `P_fname`, `P_mname`, `P_lname`, `P_extension_name`, `P_email`, `pims_gender`, `pims_age`, `pims_birthdate`, `place_of_birth`, `height_m`, `weight_kg`, `temp_address_street`, `temp_address_house_no`, `temp_address_subdivision_village`, `temp_address_barangay`, `temp_address_municipality_city`, `temp_address_province`, `temp_address_zipCode`, `perm_address_street`, `perm_address_house_no`, `perm_address_subdivision_village`, `perm_address_barangay`, `perm_address_municipality_city`, `perm_address_province`, `perm_address_zipCode`, `nationality`, `dual_citznshp_by_birth`, `dual_citznshp_by_naturalization`, `bloodtype`, `civil_status`, `pims_religion`, `pims_image_type`, `pims_contact_no`, `pims_telephone_no`, `GSIS_No`, `PAG_IBIG_id`, `SSS_no`, `TIN_no`, `PHILHEALTH_no`) VALUES
(5143417, NULL, 'Jeremy', 'Natividad', 'Cruz', NULL, 'jeremy1234@gmail.com', 'Male', 41, '1977-01-16', 'Rawis, Albay', 1.59, 0, NULL, 1001, NULL, '', 'Rawis', 'Albay', 4508, NULL, NULL, NULL, 'Tayhi', 'Tabaco City', 'Albay', 4511, 'Filipino', NULL, NULL, 'O', 'MARRIED', 'Roman Catholic', '', '0913713881', NULL, '456543', '2345345', '254534', '5645654', '235345');
INSERT INTO `pims_personnel` (`emp_No`, `P_picture`, `P_fname`, `P_mname`, `P_lname`, `P_extension_name`, `P_email`, `pims_gender`, `pims_age`, `pims_birthdate`, `place_of_birth`, `height_m`, `weight_kg`, `temp_address_street`, `temp_address_house_no`, `temp_address_subdivision_village`, `temp_address_barangay`, `temp_address_municipality_city`, `temp_address_province`, `temp_address_zipCode`, `perm_address_street`, `perm_address_house_no`, `perm_address_subdivision_village`, `perm_address_barangay`, `perm_address_municipality_city`, `perm_address_province`, `perm_address_zipCode`, `nationality`, `dual_citznshp_by_birth`, `dual_citznshp_by_naturalization`, `bloodtype`, `civil_status`, `pims_religion`, `pims_image_type`, `pims_contact_no`, `pims_telephone_no`, `GSIS_No`, `PAG_IBIG_id`, `SSS_no`, `TIN_no`, `PHILHEALTH_no`) VALUES
(5166431, NULL, 'Lea', 'Abay', 'Cerino', NULL, 'lealea@gmail.com', 'Female', 48, '1969-08-28', 'Sogod, Bacacay, Albay', 1.54, 62, NULL, NULL, 'Amada Sbdv.', 'Sogod', 'Bacacay', 'Albay', 4509, NULL, NULL, 'Amada Sbdv.', 'Sogod', 'Bacacay', 'Albay', 4509, 'Filipino', NULL, NULL, 'B', 'MARRIED', 'Roman Catholic', 'image/png', NULL, '123-888', 'ST 18740174', '2139000', '00989800', '4510021', '887000');
INSERT INTO `pims_personnel` (`emp_No`, `P_picture`, `P_fname`, `P_mname`, `P_lname`, `P_extension_name`, `P_email`, `pims_gender`, `pims_age`, `pims_birthdate`, `place_of_birth`, `height_m`, `weight_kg`, `temp_address_street`, `temp_address_house_no`, `temp_address_subdivision_village`, `temp_address_barangay`, `temp_address_municipality_city`, `temp_address_province`, `temp_address_zipCode`, `perm_address_street`, `perm_address_house_no`, `perm_address_subdivision_village`, `perm_address_barangay`, `perm_address_municipality_city`, `perm_address_province`, `perm_address_zipCode`, `nationality`, `dual_citznshp_by_birth`, `dual_citznshp_by_naturalization`, `bloodtype`, `civil_status`, `pims_religion`, `pims_image_type`, `pims_contact_no`, `pims_telephone_no`, `GSIS_No`, `PAG_IBIG_id`, `SSS_no`, `TIN_no`, `PHILHEALTH_no`) VALUES
(5201107, NULL, 'Julia', 'Belen', 'Palma', '', 'jpalma@gmail.com', 'Female', 48, '1969-12-29', 'Sagpon, Daraga, Albay', 1.65, 56, '', 0, '', 'Sagpon', 'Daraga', 'Albay', 4504, NULL, 0, NULL, 'Sagpon', 'Daraga', 'Albay', 4504, 'Filipino', NULL, NULL, 'O', 'MARRIED', 'Roman Catholic', 'image/png', '', '563-420', 'BL 437802', '33331', '700282', '690086', '8888111');
INSERT INTO `pims_personnel` (`emp_No`, `P_picture`, `P_fname`, `P_mname`, `P_lname`, `P_extension_name`, `P_email`, `pims_gender`, `pims_age`, `pims_birthdate`, `place_of_birth`, `height_m`, `weight_kg`, `temp_address_street`, `temp_address_house_no`, `temp_address_subdivision_village`, `temp_address_barangay`, `temp_address_municipality_city`, `temp_address_province`, `temp_address_zipCode`, `perm_address_street`, `perm_address_house_no`, `perm_address_subdivision_village`, `perm_address_barangay`, `perm_address_municipality_city`, `perm_address_province`, `perm_address_zipCode`, `nationality`, `dual_citznshp_by_birth`, `dual_citznshp_by_naturalization`, `bloodtype`, `civil_status`, `pims_religion`, `pims_image_type`, `pims_contact_no`, `pims_telephone_no`, `GSIS_No`, `PAG_IBIG_id`, `SSS_no`, `TIN_no`, `PHILHEALTH_no`) VALUES
(5210011, NULL, 'Rommel', 'Trilles', 'Padilla', NULL, 'padillarommel@ymail.com', 'Male', 36, '1981-10-01', 'Guinobatan, Albay', 1.59, 53, 'Mabini St.', 210, NULL, 'Poblacion', 'Legazpi City', 'Albay', 4505, 'Mabini St.', 210, NULL, 'Poblacion', 'Legazpi City', 'Albay', 4505, 'Filipino', NULL, NULL, 'O', 'MARRIED', 'Roman Catholic', 'image/png', '0987654321673', NULL, 'FJ 716781', '9553311', '1143221', '687331', '0999007');
INSERT INTO `pims_personnel` (`emp_No`, `P_picture`, `P_fname`, `P_mname`, `P_lname`, `P_extension_name`, `P_email`, `pims_gender`, `pims_age`, `pims_birthdate`, `place_of_birth`, `height_m`, `weight_kg`, `temp_address_street`, `temp_address_house_no`, `temp_address_subdivision_village`, `temp_address_barangay`, `temp_address_municipality_city`, `temp_address_province`, `temp_address_zipCode`, `perm_address_street`, `perm_address_house_no`, `perm_address_subdivision_village`, `perm_address_barangay`, `perm_address_municipality_city`, `perm_address_province`, `perm_address_zipCode`, `nationality`, `dual_citznshp_by_birth`, `dual_citznshp_by_naturalization`, `bloodtype`, `civil_status`, `pims_religion`, `pims_image_type`, `pims_contact_no`, `pims_telephone_no`, `GSIS_No`, `PAG_IBIG_id`, `SSS_no`, `TIN_no`, `PHILHEALTH_no`) VALUES
(5221094, NULL, 'Liza', 'Ricardo', 'Lim', NULL, 'ricardo11@ymail.com', 'Female', 41, '1976-09-21', 'Guinobatan, Albay', 1.46, 58, 'Mabini St.', 210, NULL, 'Poblacion', 'Legazpi City', 'Albay', 4505, 'Mabini St.', 210, NULL, 'Poblacion', 'Legazpi City', 'Albay', 4505, 'Filipino', NULL, NULL, 'O', 'MARRIED', 'Roman Catholic', 'image/png', '09881230912', NULL, 'AB 1368101', NULL, NULL, NULL, '10931740');
INSERT INTO `pims_personnel` (`emp_No`, `P_picture`, `P_fname`, `P_mname`, `P_lname`, `P_extension_name`, `P_email`, `pims_gender`, `pims_age`, `pims_birthdate`, `place_of_birth`, `height_m`, `weight_kg`, `temp_address_street`, `temp_address_house_no`, `temp_address_subdivision_village`, `temp_address_barangay`, `temp_address_municipality_city`, `temp_address_province`, `temp_address_zipCode`, `perm_address_street`, `perm_address_house_no`, `perm_address_subdivision_village`, `perm_address_barangay`, `perm_address_municipality_city`, `perm_address_province`, `perm_address_zipCode`, `nationality`, `dual_citznshp_by_birth`, `dual_citznshp_by_naturalization`, `bloodtype`, `civil_status`, `pims_religion`, `pims_image_type`, `pims_contact_no`, `pims_telephone_no`, `GSIS_No`, `PAG_IBIG_id`, `SSS_no`, `TIN_no`, `PHILHEALTH_no`) VALUES
(5231607, NULL, 'Joann', 'Atibo', 'Pacala', '', 'jpacala@gmail.com', 'Female', 53, '1964-12-29', 'Sagpon, Daraga, Albay', 1.61, 58, '', 0, '', 'Sagpon', 'Daraga', 'Albay', 4504, NULL, 0, NULL, 'Sagpon', 'Daraga', 'Albay', 4504, 'Filipino', NULL, NULL, 'O', 'MARRIED', 'Roman Catholic', 'image/png', '', '123-4560', 'CM 89612220', '01117821', '01923167', '6712191', '11433441');
INSERT INTO `pims_personnel` (`emp_No`, `P_picture`, `P_fname`, `P_mname`, `P_lname`, `P_extension_name`, `P_email`, `pims_gender`, `pims_age`, `pims_birthdate`, `place_of_birth`, `height_m`, `weight_kg`, `temp_address_street`, `temp_address_house_no`, `temp_address_subdivision_village`, `temp_address_barangay`, `temp_address_municipality_city`, `temp_address_province`, `temp_address_zipCode`, `perm_address_street`, `perm_address_house_no`, `perm_address_subdivision_village`, `perm_address_barangay`, `perm_address_municipality_city`, `perm_address_province`, `perm_address_zipCode`, `nationality`, `dual_citznshp_by_birth`, `dual_citznshp_by_naturalization`, `bloodtype`, `civil_status`, `pims_religion`, `pims_image_type`, `pims_contact_no`, `pims_telephone_no`, `GSIS_No`, `PAG_IBIG_id`, `SSS_no`, `TIN_no`, `PHILHEALTH_no`) VALUES
(5287126, NULL, 'Armie', 'Fernandez', 'Herrera', 'IV', 'afherrera@gmail.com', 'Male', 25, '1992-12-13', 'Tigbi, Tiwi, Albay', 2.01, 75, '', 0, '269', 'Busay', 'Daraga', 'Albay', 4503, NULL, 269, NULL, 'Busay', 'Daraga', 'Albay', 4503, 'Filipino', NULL, NULL, 'B', 'SINGLE', 'Roman Catholic', 'image/png', '09766526112', NULL, 'GH 76715231', '79801369', '187300', '6989209', '3320465');
INSERT INTO `pims_personnel` (`emp_No`, `P_picture`, `P_fname`, `P_mname`, `P_lname`, `P_extension_name`, `P_email`, `pims_gender`, `pims_age`, `pims_birthdate`, `place_of_birth`, `height_m`, `weight_kg`, `temp_address_street`, `temp_address_house_no`, `temp_address_subdivision_village`, `temp_address_barangay`, `temp_address_municipality_city`, `temp_address_province`, `temp_address_zipCode`, `perm_address_street`, `perm_address_house_no`, `perm_address_subdivision_village`, `perm_address_barangay`, `perm_address_municipality_city`, `perm_address_province`, `perm_address_zipCode`, `nationality`, `dual_citznshp_by_birth`, `dual_citznshp_by_naturalization`, `bloodtype`, `civil_status`, `pims_religion`, `pims_image_type`, `pims_contact_no`, `pims_telephone_no`, `GSIS_No`, `PAG_IBIG_id`, `SSS_no`, `TIN_no`, `PHILHEALTH_no`) VALUES
(5309127, NULL, 'Leo', 'Villar', 'Acosta', 'V', 'leoacosta@gmail.com', 'Male', 27, '1990-12-29', 'Legazpi City', 1.71, 60, 'Mabini St.', 89, NULL, 'Barriada', 'Legazpi City', 'Al', 4501, 'Mabini St.', 89, NULL, 'Barriada', 'Legazpi City', 'Albay', 4501, 'Filipino', NULL, NULL, 'O', 'SINGLE', 'Roman Catholic', 'image/png', '09456512090', '900-001', 'BG 2890811', '902300', '00012752', '6579000', '0113628');
INSERT INTO `pims_personnel` (`emp_No`, `P_picture`, `P_fname`, `P_mname`, `P_lname`, `P_extension_name`, `P_email`, `pims_gender`, `pims_age`, `pims_birthdate`, `place_of_birth`, `height_m`, `weight_kg`, `temp_address_street`, `temp_address_house_no`, `temp_address_subdivision_village`, `temp_address_barangay`, `temp_address_municipality_city`, `temp_address_province`, `temp_address_zipCode`, `perm_address_street`, `perm_address_house_no`, `perm_address_subdivision_village`, `perm_address_barangay`, `perm_address_municipality_city`, `perm_address_province`, `perm_address_zipCode`, `nationality`, `dual_citznshp_by_birth`, `dual_citznshp_by_naturalization`, `bloodtype`, `civil_status`, `pims_religion`, `pims_image_type`, `pims_contact_no`, `pims_telephone_no`, `GSIS_No`, `PAG_IBIG_id`, `SSS_no`, `TIN_no`, `PHILHEALTH_no`) VALUES
(5340912, NULL, 'Mark', 'Bobis', 'Masbate', 'Jr.', 'markmark@gmail.com', 'Male', 51, '1967-03-29', 'Pilar, Sorsogon', 1.58, 63, NULL, 9, 'Corpuz St.', 'Cabangan', 'Legazpi City', 'Albay', 4505, 'Corpuz St.', 9, NULL, 'Cabangan', 'Legazpi City', 'Albay', 4505, 'Filipino', NULL, NULL, 'B', 'SEPARATED', 'Roman Catholic', 'image/png', '09091234567', NULL, 'PB 8761254', '6786139', '209031', '090962', '111239');
INSERT INTO `pims_personnel` (`emp_No`, `P_picture`, `P_fname`, `P_mname`, `P_lname`, `P_extension_name`, `P_email`, `pims_gender`, `pims_age`, `pims_birthdate`, `place_of_birth`, `height_m`, `weight_kg`, `temp_address_street`, `temp_address_house_no`, `temp_address_subdivision_village`, `temp_address_barangay`, `temp_address_municipality_city`, `temp_address_province`, `temp_address_zipCode`, `perm_address_street`, `perm_address_house_no`, `perm_address_subdivision_village`, `perm_address_barangay`, `perm_address_municipality_city`, `perm_address_province`, `perm_address_zipCode`, `nationality`, `dual_citznshp_by_birth`, `dual_citznshp_by_naturalization`, `bloodtype`, `civil_status`, `pims_religion`, `pims_image_type`, `pims_contact_no`, `pims_telephone_no`, `GSIS_No`, `PAG_IBIG_id`, `SSS_no`, `TIN_no`, `PHILHEALTH_no`) VALUES
(5353113, NULL, 'Rizza', 'Avila', 'de los Santos', NULL, 'rizzasantos11@gmail.com', 'Female', 31, '1987-01-31', 'Basud,Guinobatan, Albay', 1.59, 54, NULL, NULL, NULL, 'Basud', 'Guinobatan', 'Albay', 4501, NULL, NULL, NULL, 'Basud', 'Guinobatan', 'Albay', 4501, 'Filipino', NULL, NULL, 'O', 'SINGLE', 'Roman Catholic', 'image/png', NULL, '2000-555', 'FG 293710', '8924001', '011477', '9909113', '7643133');
INSERT INTO `pims_personnel` (`emp_No`, `P_picture`, `P_fname`, `P_mname`, `P_lname`, `P_extension_name`, `P_email`, `pims_gender`, `pims_age`, `pims_birthdate`, `place_of_birth`, `height_m`, `weight_kg`, `temp_address_street`, `temp_address_house_no`, `temp_address_subdivision_village`, `temp_address_barangay`, `temp_address_municipality_city`, `temp_address_province`, `temp_address_zipCode`, `perm_address_street`, `perm_address_house_no`, `perm_address_subdivision_village`, `perm_address_barangay`, `perm_address_municipality_city`, `perm_address_province`, `perm_address_zipCode`, `nationality`, `dual_citznshp_by_birth`, `dual_citznshp_by_naturalization`, `bloodtype`, `civil_status`, `pims_religion`, `pims_image_type`, `pims_contact_no`, `pims_telephone_no`, `GSIS_No`, `PAG_IBIG_id`, `SSS_no`, `TIN_no`, `PHILHEALTH_no`) VALUES
(5400127, NULL, 'Mariel', 'Cerino', 'Casaul', NULL, 'mariel_lala@edu.ph', 'Female', 38, '1979-05-03', 'Bagumbayan , Malinao, Albay', 1.64, 59, NULL, NULL, NULL, 'Puro', 'Legazpi City', 'Albay', 4504, NULL, 10, NULL, 'Bagumbayan', 'Malinao', 'Albay', 4512, 'Filipino', NULL, NULL, 'O', 'LIVE-IN', 'Roman Catholic', 'image/png', NULL, '999-7000', 'EF 9081230', '6700123', '1320898', '0113009', '1090911');
INSERT INTO `pims_personnel` (`emp_No`, `P_picture`, `P_fname`, `P_mname`, `P_lname`, `P_extension_name`, `P_email`, `pims_gender`, `pims_age`, `pims_birthdate`, `place_of_birth`, `height_m`, `weight_kg`, `temp_address_street`, `temp_address_house_no`, `temp_address_subdivision_village`, `temp_address_barangay`, `temp_address_municipality_city`, `temp_address_province`, `temp_address_zipCode`, `perm_address_street`, `perm_address_house_no`, `perm_address_subdivision_village`, `perm_address_barangay`, `perm_address_municipality_city`, `perm_address_province`, `perm_address_zipCode`, `nationality`, `dual_citznshp_by_birth`, `dual_citznshp_by_naturalization`, `bloodtype`, `civil_status`, `pims_religion`, `pims_image_type`, `pims_contact_no`, `pims_telephone_no`, `GSIS_No`, `PAG_IBIG_id`, `SSS_no`, `TIN_no`, `PHILHEALTH_no`) VALUES
(5412398, NULL, 'Dave', 'Franco', 'Valleroso', 'II', 'daveyfranco@ymail.com', 'Male', 47, '1970-06-04', 'Ontario, Canada', 1.78, 72, 'Imelda', 61, 'Imperial Sbdv.', '', 'Legazpi City', 'Albay', 4505, 'JP. Rizal St.', NULL, NULL, 'Poblacion', 'Makati City', '', 1200, 'Filipino-Canadian', NULL, NULL, NULL, 'MARRIED', 'Roman Catholic', 'image/png', NULL, '123-456', 'PB 123476', '123890', '091373', '927163', '200134');
INSERT INTO `pims_personnel` (`emp_No`, `P_picture`, `P_fname`, `P_mname`, `P_lname`, `P_extension_name`, `P_email`, `pims_gender`, `pims_age`, `pims_birthdate`, `place_of_birth`, `height_m`, `weight_kg`, `temp_address_street`, `temp_address_house_no`, `temp_address_subdivision_village`, `temp_address_barangay`, `temp_address_municipality_city`, `temp_address_province`, `temp_address_zipCode`, `perm_address_street`, `perm_address_house_no`, `perm_address_subdivision_village`, `perm_address_barangay`, `perm_address_municipality_city`, `perm_address_province`, `perm_address_zipCode`, `nationality`, `dual_citznshp_by_birth`, `dual_citznshp_by_naturalization`, `bloodtype`, `civil_status`, `pims_religion`, `pims_image_type`, `pims_contact_no`, `pims_telephone_no`, `GSIS_No`, `PAG_IBIG_id`, `SSS_no`, `TIN_no`, `PHILHEALTH_no`) VALUES
(5432123, NULL, 'Charisse', 'Lala', 'Nasol', NULL, 'charisse_n@gmail.com', 'Female', 23, '1994-06-30', 'Guinobatan, Albay', 1.56, 50, 'Lapu-Lapu', 41, NULL, 'Cruzada', 'Guinobatan', 'Albay', 4501, 'Lapu-Lapu', 41, NULL, 'Cruzada', 'Guinobatan', 'Albay', 4501, 'Filipino', NULL, NULL, 'O', 'SINGLE', 'Roman Catholic', 'image/png', '09876543219', NULL, 'CM 1234567', '00012345', '098765', '12345', '55512');
INSERT INTO `pims_personnel` (`emp_No`, `P_picture`, `P_fname`, `P_mname`, `P_lname`, `P_extension_name`, `P_email`, `pims_gender`, `pims_age`, `pims_birthdate`, `place_of_birth`, `height_m`, `weight_kg`, `temp_address_street`, `temp_address_house_no`, `temp_address_subdivision_village`, `temp_address_barangay`, `temp_address_municipality_city`, `temp_address_province`, `temp_address_zipCode`, `perm_address_street`, `perm_address_house_no`, `perm_address_subdivision_village`, `perm_address_barangay`, `perm_address_municipality_city`, `perm_address_province`, `perm_address_zipCode`, `nationality`, `dual_citznshp_by_birth`, `dual_citznshp_by_naturalization`, `bloodtype`, `civil_status`, `pims_religion`, `pims_image_type`, `pims_contact_no`, `pims_telephone_no`, `GSIS_No`, `PAG_IBIG_id`, `SSS_no`, `TIN_no`, `PHILHEALTH_no`) VALUES
(5501298, NULL, 'Francis', 'Barrera', 'Acosta', 'Jr.', 'fbarrera@gmail.com', 'Male', 35, '1982-09-16', 'Camalig, Albay', 1.69, 50, '', 0, '', 'Sumlang', 'Camalig', 'Albay', 4502, NULL, 0, NULL, 'Sumlang', 'Camalig', 'Albay', 4502, 'Filipino', NULL, NULL, 'O', 'SINGLE', 'Roman Catholic', 'image/png', '09123097543', NULL, 'JK 89910235', '092343267', '', '', '10902614');
INSERT INTO `pims_personnel` (`emp_No`, `P_picture`, `P_fname`, `P_mname`, `P_lname`, `P_extension_name`, `P_email`, `pims_gender`, `pims_age`, `pims_birthdate`, `place_of_birth`, `height_m`, `weight_kg`, `temp_address_street`, `temp_address_house_no`, `temp_address_subdivision_village`, `temp_address_barangay`, `temp_address_municipality_city`, `temp_address_province`, `temp_address_zipCode`, `perm_address_street`, `perm_address_house_no`, `perm_address_subdivision_village`, `perm_address_barangay`, `perm_address_municipality_city`, `perm_address_province`, `perm_address_zipCode`, `nationality`, `dual_citznshp_by_birth`, `dual_citznshp_by_naturalization`, `bloodtype`, `civil_status`, `pims_religion`, `pims_image_type`, `pims_contact_no`, `pims_telephone_no`, `GSIS_No`, `PAG_IBIG_id`, `SSS_no`, `TIN_no`, `PHILHEALTH_no`) VALUES
(5513092, NULL, 'Roger', 'Ponce', 'Abitria', 'I', 'roger11@gmail.com', 'Male', 26, '1992-02-19', 'Sto. Domingo, Albay', 1.58, 61, 'Luna St.', 11, NULL, 'Libtong', 'Sto. Domingo', 'Albay', 4505, 'Luna St.', 11, NULL, 'Libtong', 'Sto. Domingo', 'Albay', 4505, 'Filip', NULL, NULL, 'A', 'SINGLE', 'Roman Catholic', 'image/png', '09912376512', '022-305', 'LP 12090816', '90801132', '03218742', '1652665', '7772001');
INSERT INTO `pims_personnel` (`emp_No`, `P_picture`, `P_fname`, `P_mname`, `P_lname`, `P_extension_name`, `P_email`, `pims_gender`, `pims_age`, `pims_birthdate`, `place_of_birth`, `height_m`, `weight_kg`, `temp_address_street`, `temp_address_house_no`, `temp_address_subdivision_village`, `temp_address_barangay`, `temp_address_municipality_city`, `temp_address_province`, `temp_address_zipCode`, `perm_address_street`, `perm_address_house_no`, `perm_address_subdivision_village`, `perm_address_barangay`, `perm_address_municipality_city`, `perm_address_province`, `perm_address_zipCode`, `nationality`, `dual_citznshp_by_birth`, `dual_citznshp_by_naturalization`, `bloodtype`, `civil_status`, `pims_religion`, `pims_image_type`, `pims_contact_no`, `pims_telephone_no`, `GSIS_No`, `PAG_IBIG_id`, `SSS_no`, `TIN_no`, `PHILHEALTH_no`) VALUES
(5566126, NULL, 'Vincent', 'Velasquez', 'Hidalgo', 'Jr.', 'afherrera@gmail.com', 'Male', 26, '1992-02-28', 'Tigbi, \r\n\r\nTiwi, Albay', 1.89, 70, '', 0, '269', 'Busay', 'Daraga', 'Albay', 4503, NULL, 269, NULL, 'Busay', 'Daraga', 'Albay', 4503, 'Filipino', NULL, NULL, 'B', 'SINGLE', 'Roman Catholic', 'image/png', '09788821121', NULL, 'XZ 888821', '555369', '174330', '699909', '008565');
INSERT INTO `pims_personnel` (`emp_No`, `P_picture`, `P_fname`, `P_mname`, `P_lname`, `P_extension_name`, `P_email`, `pims_gender`, `pims_age`, `pims_birthdate`, `place_of_birth`, `height_m`, `weight_kg`, `temp_address_street`, `temp_address_house_no`, `temp_address_subdivision_village`, `temp_address_barangay`, `temp_address_municipality_city`, `temp_address_province`, `temp_address_zipCode`, `perm_address_street`, `perm_address_house_no`, `perm_address_subdivision_village`, `perm_address_barangay`, `perm_address_municipality_city`, `perm_address_province`, `perm_address_zipCode`, `nationality`, `dual_citznshp_by_birth`, `dual_citznshp_by_naturalization`, `bloodtype`, `civil_status`, `pims_religion`, `pims_image_type`, `pims_contact_no`, `pims_telephone_no`, `GSIS_No`, `PAG_IBIG_id`, `SSS_no`, `TIN_no`, `PHILHEALTH_no`) VALUES
(5677342, NULL, 'Lilia', 'Belgica', 'Bermas', NULL, 'rizza_12@gmail.com', 'Female', 52, '1965-11-29', 'Bonga, Bacacay, Albay', 1.66, 63, NULL, 31, NULL, 'Upper Bonga', 'Bacacay', 'Al', 4508, NULL, 31, NULL, 'Upper Bonga', 'Bacacay', 'Albay', 4508, 'Filipino', NULL, NULL, 'O', 'MARRIED', 'Roman Catholic', 'image/png', '09564782134', NULL, 'YU 207852', '5601133', '0808211', '7779010', '82243009');
INSERT INTO `pims_personnel` (`emp_No`, `P_picture`, `P_fname`, `P_mname`, `P_lname`, `P_extension_name`, `P_email`, `pims_gender`, `pims_age`, `pims_birthdate`, `place_of_birth`, `height_m`, `weight_kg`, `temp_address_street`, `temp_address_house_no`, `temp_address_subdivision_village`, `temp_address_barangay`, `temp_address_municipality_city`, `temp_address_province`, `temp_address_zipCode`, `perm_address_street`, `perm_address_house_no`, `perm_address_subdivision_village`, `perm_address_barangay`, `perm_address_municipality_city`, `perm_address_province`, `perm_address_zipCode`, `nationality`, `dual_citznshp_by_birth`, `dual_citznshp_by_naturalization`, `bloodtype`, `civil_status`, `pims_religion`, `pims_image_type`, `pims_contact_no`, `pims_telephone_no`, `GSIS_No`, `PAG_IBIG_id`, `SSS_no`, `TIN_no`, `PHILHEALTH_no`) VALUES
(5756153, NULL, 'Juan', 'Lopez', 'Dela Cruz', 'II', 'jdlcruz@edu.ph', 'Male', 50, '1967-09-12', 'San Lorenzo, Tabaco City', 1.49, 56, 'Rizal St.', 4, NULL, 'Basud', 'Daraga', 'Albay', 4503, NULL, 7, NULL, 'San Lorenzo', 'Tabaco City', 'Albay', 4510, 'Filipino', NULL, NULL, 'AB', 'MARRIED', 'Roman Catholic', 'image/png', '09123498457', NULL, 'CD 0130891', '8798703', '9812002', '009954211', '0912341');
INSERT INTO `pims_personnel` (`emp_No`, `P_picture`, `P_fname`, `P_mname`, `P_lname`, `P_extension_name`, `P_email`, `pims_gender`, `pims_age`, `pims_birthdate`, `place_of_birth`, `height_m`, `weight_kg`, `temp_address_street`, `temp_address_house_no`, `temp_address_subdivision_village`, `temp_address_barangay`, `temp_address_municipality_city`, `temp_address_province`, `temp_address_zipCode`, `perm_address_street`, `perm_address_house_no`, `perm_address_subdivision_village`, `perm_address_barangay`, `perm_address_municipality_city`, `perm_address_province`, `perm_address_zipCode`, `nationality`, `dual_citznshp_by_birth`, `dual_citznshp_by_naturalization`, `bloodtype`, `civil_status`, `pims_religion`, `pims_image_type`, `pims_contact_no`, `pims_telephone_no`, `GSIS_No`, `PAG_IBIG_id`, `SSS_no`, `TIN_no`, `PHILHEALTH_no`) VALUES
(5880365, NULL, 'Adrianna', 'Cooper', 'Lima', NULL, 'adriannalima@edu.ph', 'Female', 26, '1991-10-01', 'Hague, The Netherlands', 1.83, 65, 'Pagasa St.', 404, NULL, 'Bonifacio', 'Guinobatan ', 'Albay', 4501, 'Pagasa St.', 404, NULL, 'Bonifacio', 'Guinobatan', 'Albay', 4501, 'British-Filipino', NULL, NULL, 'AB', 'LIVE-IN', 'Roman Catholic', 'image/png', '09124109769', '099-123', 'CM 728941', '89365', '239801', '77521', '4769192');
INSERT INTO `pims_personnel` (`emp_No`, `P_picture`, `P_fname`, `P_mname`, `P_lname`, `P_extension_name`, `P_email`, `pims_gender`, `pims_age`, `pims_birthdate`, `place_of_birth`, `height_m`, `weight_kg`, `temp_address_street`, `temp_address_house_no`, `temp_address_subdivision_village`, `temp_address_barangay`, `temp_address_municipality_city`, `temp_address_province`, `temp_address_zipCode`, `perm_address_street`, `perm_address_house_no`, `perm_address_subdivision_village`, `perm_address_barangay`, `perm_address_municipality_city`, `perm_address_province`, `perm_address_zipCode`, `nationality`, `dual_citznshp_by_birth`, `dual_citznshp_by_naturalization`, `bloodtype`, `civil_status`, `pims_religion`, `pims_image_type`, `pims_contact_no`, `pims_telephone_no`, `GSIS_No`, `PAG_IBIG_id`, `SSS_no`, `TIN_no`, `PHILHEALTH_no`) VALUES
(5901112, NULL, 'Shanley', 'Rosero', 'Reyes', NULL, 'shasha@gmail.com', 'Female', 26, '1992-03-29', 'Pilar, Sorsogon', 1.49, 51, NULL, 6, 'Luna St.', 'Cabangan', 'Legazpi City', 'Albay', 4505, 'Luna St.', 6, NULL, 'Cabangan', 'Legazpi City', 'Albay', 4505, 'Filipino', NULL, NULL, 'B', 'MARRIED', 'Roman Catholic', 'image/png', '09091111110', NULL, 'PC 98292001', '611109', '007862', '0011123', '1911101');
INSERT INTO `pims_personnel` (`emp_No`, `P_picture`, `P_fname`, `P_mname`, `P_lname`, `P_extension_name`, `P_email`, `pims_gender`, `pims_age`, `pims_birthdate`, `place_of_birth`, `height_m`, `weight_kg`, `temp_address_street`, `temp_address_house_no`, `temp_address_subdivision_village`, `temp_address_barangay`, `temp_address_municipality_city`, `temp_address_province`, `temp_address_zipCode`, `perm_address_street`, `perm_address_house_no`, `perm_address_subdivision_village`, `perm_address_barangay`, `perm_address_municipality_city`, `perm_address_province`, `perm_address_zipCode`, `nationality`, `dual_citznshp_by_birth`, `dual_citznshp_by_naturalization`, `bloodtype`, `civil_status`, `pims_religion`, `pims_image_type`, `pims_contact_no`, `pims_telephone_no`, `GSIS_No`, `PAG_IBIG_id`, `SSS_no`, `TIN_no`, `PHILHEALTH_no`) VALUES
(5902312, NULL, 'Mark', 'Angelo', 'Lobete', 'III', 'mark_a11@gmail.com', 'Male', 46, '1972-03-29', 'Pilar, Sorsogon', 1.63, 63, NULL, 6, 'Luna St.', 'Cabangan', 'Legazpi City', 'Albay', 4505, 'Luna St.', 6, NULL, 'Cabangan', 'Legazpi City', 'Albay', 4505, 'Filipino', NULL, NULL, 'B', 'MARRIED', 'Roman Catholic', 'image/png', '0909172815', NULL, 'PB 01182301', '6000119', '0902131', '011111', '1901721');
INSERT INTO `pims_personnel` (`emp_No`, `P_picture`, `P_fname`, `P_mname`, `P_lname`, `P_extension_name`, `P_email`, `pims_gender`, `pims_age`, `pims_birthdate`, `place_of_birth`, `height_m`, `weight_kg`, `temp_address_street`, `temp_address_house_no`, `temp_address_subdivision_village`, `temp_address_barangay`, `temp_address_municipality_city`, `temp_address_province`, `temp_address_zipCode`, `perm_address_street`, `perm_address_house_no`, `perm_address_subdivision_village`, `perm_address_barangay`, `perm_address_municipality_city`, `perm_address_province`, `perm_address_zipCode`, `nationality`, `dual_citznshp_by_birth`, `dual_citznshp_by_naturalization`, `bloodtype`, `civil_status`, `pims_religion`, `pims_image_type`, `pims_contact_no`, `pims_telephone_no`, `GSIS_No`, `PAG_IBIG_id`, `SSS_no`, `TIN_no`, `PHILHEALTH_no`) VALUES
(50011248, NULL, 'Patrick', 'Herrera', 'Acosta', 'Jr.', 'trickacosta@gmail.com', 'Male', 28, '1989-06-16', 'Camalig, \r\n\r\nAlbay', 1.79, 62, '', 0, '', 'Sumlang', 'Camalig', 'Albay', 4501, NULL, 0, NULL, 'Libtong', 'Guinobatan', 'Albay', 4502, 'Filipino', NULL, NULL, 'A', 'SINGLE', 'Roman Catholic', 'image/png', '090928011', NULL, 'HI 0091299', '00921267', '33224210', '90001', '1110014');
INSERT INTO `pims_personnel` (`emp_No`, `P_picture`, `P_fname`, `P_mname`, `P_lname`, `P_extension_name`, `P_email`, `pims_gender`, `pims_age`, `pims_birthdate`, `place_of_birth`, `height_m`, `weight_kg`, `temp_address_street`, `temp_address_house_no`, `temp_address_subdivision_village`, `temp_address_barangay`, `temp_address_municipality_city`, `temp_address_province`, `temp_address_zipCode`, `perm_address_street`, `perm_address_house_no`, `perm_address_subdivision_village`, `perm_address_barangay`, `perm_address_municipality_city`, `perm_address_province`, `perm_address_zipCode`, `nationality`, `dual_citznshp_by_birth`, `dual_citznshp_by_naturalization`, `bloodtype`, `civil_status`, `pims_religion`, `pims_image_type`, `pims_contact_no`, `pims_telephone_no`, `GSIS_No`, `PAG_IBIG_id`, `SSS_no`, `TIN_no`, `PHILHEALTH_no`) VALUES
(50011249, NULL, 'Lloyd', NULL, 'Garcia', NULL, NULL, 'Male', 43, '1975-01-01', 'Daraga, Albay', 168, 70, NULL, NULL, NULL, 'San Roque', 'Legazpi City', 'Albay', 4500, NULL, NULL, NULL, 'San Roque', 'Legazpi City', 'Albay', 4500, 'Filipino', NULL, NULL, NULL, 'SINGLE', NULL, 'image/png', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `pims_personnel` (`emp_No`, `P_picture`, `P_fname`, `P_mname`, `P_lname`, `P_extension_name`, `P_email`, `pims_gender`, `pims_age`, `pims_birthdate`, `place_of_birth`, `height_m`, `weight_kg`, `temp_address_street`, `temp_address_house_no`, `temp_address_subdivision_village`, `temp_address_barangay`, `temp_address_municipality_city`, `temp_address_province`, `temp_address_zipCode`, `perm_address_street`, `perm_address_house_no`, `perm_address_subdivision_village`, `perm_address_barangay`, `perm_address_municipality_city`, `perm_address_province`, `perm_address_zipCode`, `nationality`, `dual_citznshp_by_birth`, `dual_citznshp_by_naturalization`, `bloodtype`, `civil_status`, `pims_religion`, `pims_image_type`, `pims_contact_no`, `pims_telephone_no`, `GSIS_No`, `PAG_IBIG_id`, `SSS_no`, `TIN_no`, `PHILHEALTH_no`) VALUES
(50011250, NULL, 'Salome', NULL, 'Macinas', NULL, 'salome_macinas_yahoo.com', 'Male', 36, '1982-01-18', 'Legazpi City', 165, 67, NULL, NULL, NULL, 'Sagpon', 'Albay', 'Bicol', 4500, NULL, NULL, NULL, 'Sagpon', 'Legazpi', 'Bicol', 4500, 'Filipino', NULL, NULL, NULL, 'SINGLE', NULL, 'image/png', NULL, NULL, '450321', NULL, NULL, NULL, NULL);
INSERT INTO `pims_personnel` (`emp_No`, `P_picture`, `P_fname`, `P_mname`, `P_lname`, `P_extension_name`, `P_email`, `pims_gender`, `pims_age`, `pims_birthdate`, `place_of_birth`, `height_m`, `weight_kg`, `temp_address_street`, `temp_address_house_no`, `temp_address_subdivision_village`, `temp_address_barangay`, `temp_address_municipality_city`, `temp_address_province`, `temp_address_zipCode`, `perm_address_street`, `perm_address_house_no`, `perm_address_subdivision_village`, `perm_address_barangay`, `perm_address_municipality_city`, `perm_address_province`, `perm_address_zipCode`, `nationality`, `dual_citznshp_by_birth`, `dual_citznshp_by_naturalization`, `bloodtype`, `civil_status`, `pims_religion`, `pims_image_type`, `pims_contact_no`, `pims_telephone_no`, `GSIS_No`, `PAG_IBIG_id`, `SSS_no`, `TIN_no`, `PHILHEALTH_no`) VALUES
(50011251, NULL, 'Andres', NULL, 'Dela Torre', NULL, 'andres_delatorre@ivyaguas.com', 'Male', 146, '1872-01-30', 'Legazpi', 179, 59, NULL, NULL, NULL, 'Sagpon', 'Albay', 'Bicol', 4500, NULL, NULL, NULL, 'Sagpom', 'Albay', 'Bicol', 4500, 'Filipino', NULL, NULL, NULL, 'SINGLE', NULL, 'image/png', NULL, NULL, '987313', NULL, NULL, NULL, NULL);
INSERT INTO `pims_personnel` (`emp_No`, `P_picture`, `P_fname`, `P_mname`, `P_lname`, `P_extension_name`, `P_email`, `pims_gender`, `pims_age`, `pims_birthdate`, `place_of_birth`, `height_m`, `weight_kg`, `temp_address_street`, `temp_address_house_no`, `temp_address_subdivision_village`, `temp_address_barangay`, `temp_address_municipality_city`, `temp_address_province`, `temp_address_zipCode`, `perm_address_street`, `perm_address_house_no`, `perm_address_subdivision_village`, `perm_address_barangay`, `perm_address_municipality_city`, `perm_address_province`, `perm_address_zipCode`, `nationality`, `dual_citznshp_by_birth`, `dual_citznshp_by_naturalization`, `bloodtype`, `civil_status`, `pims_religion`, `pims_image_type`, `pims_contact_no`, `pims_telephone_no`, `GSIS_No`, `PAG_IBIG_id`, `SSS_no`, `TIN_no`, `PHILHEALTH_no`) VALUES
(50011252, NULL, 'Ricardo', NULL, 'Barrameda', NULL, 'ricardo_barrameda@yahoo.com', 'Male', 36, '1982-01-18', 'Legazpi City', 165, 67, 'Morales', 12234, NULL, 'Sagpon', 'Legazpi', 'Bicol', 4500, 'Morales', 12234, NULL, 'Sagpon', 'Legazpi', 'Bicol', 4500, 'Filipino', NULL, NULL, 'O', 'MARRIED', 'Roman Catholic', 'image/png', '092014343', '36453287462', '097343098', '11111111', '1111111', '1111', '1111111111111111111111');
INSERT INTO `pims_personnel` (`emp_No`, `P_picture`, `P_fname`, `P_mname`, `P_lname`, `P_extension_name`, `P_email`, `pims_gender`, `pims_age`, `pims_birthdate`, `place_of_birth`, `height_m`, `weight_kg`, `temp_address_street`, `temp_address_house_no`, `temp_address_subdivision_village`, `temp_address_barangay`, `temp_address_municipality_city`, `temp_address_province`, `temp_address_zipCode`, `perm_address_street`, `perm_address_house_no`, `perm_address_subdivision_village`, `perm_address_barangay`, `perm_address_municipality_city`, `perm_address_province`, `perm_address_zipCode`, `nationality`, `dual_citznshp_by_birth`, `dual_citznshp_by_naturalization`, `bloodtype`, `civil_status`, `pims_religion`, `pims_image_type`, `pims_contact_no`, `pims_telephone_no`, `GSIS_No`, `PAG_IBIG_id`, `SSS_no`, `TIN_no`, `PHILHEALTH_no`) VALUES
(50011253, NULL, 'Claire', NULL, 'Mendenilla', NULL, 'claire_reddragon@ivyaguas.com', 'Female', 146, '1872-01-30', 'Legazpi', 179, 59, 'Sample Street', NULL, NULL, 'Sagpon', 'Albay', 'Bicol', 4500, NULL, NULL, NULL, 'Sagpom', 'Albay', 'Bicol', 4500, 'Filipino', NULL, NULL, NULL, 'SINGLE', NULL, 'image/png', NULL, NULL, '435245', NULL, NULL, NULL, NULL);
INSERT INTO `pims_personnel` (`emp_No`, `P_picture`, `P_fname`, `P_mname`, `P_lname`, `P_extension_name`, `P_email`, `pims_gender`, `pims_age`, `pims_birthdate`, `place_of_birth`, `height_m`, `weight_kg`, `temp_address_street`, `temp_address_house_no`, `temp_address_subdivision_village`, `temp_address_barangay`, `temp_address_municipality_city`, `temp_address_province`, `temp_address_zipCode`, `perm_address_street`, `perm_address_house_no`, `perm_address_subdivision_village`, `perm_address_barangay`, `perm_address_municipality_city`, `perm_address_province`, `perm_address_zipCode`, `nationality`, `dual_citznshp_by_birth`, `dual_citznshp_by_naturalization`, `bloodtype`, `civil_status`, `pims_religion`, `pims_image_type`, `pims_contact_no`, `pims_telephone_no`, `GSIS_No`, `PAG_IBIG_id`, `SSS_no`, `TIN_no`, `PHILHEALTH_no`) VALUES
(50011254, NULL, 'Vanessa', NULL, 'Madera', NULL, 'vanessa_PoeSzx@yahoo.com', 'Female', 36, '1982-01-18', 'Legazpi City', 165, 67, NULL, NULL, NULL, 'Sagpon', 'Albay', 'Bicol', 4500, NULL, NULL, NULL, 'Sagpon', 'Legazpi', 'Bicol', 4500, 'Filipino', NULL, NULL, NULL, 'SINGLE', NULL, 'image/png', NULL, NULL, '9867343', NULL, NULL, NULL, NULL);
INSERT INTO `pims_personnel` (`emp_No`, `P_picture`, `P_fname`, `P_mname`, `P_lname`, `P_extension_name`, `P_email`, `pims_gender`, `pims_age`, `pims_birthdate`, `place_of_birth`, `height_m`, `weight_kg`, `temp_address_street`, `temp_address_house_no`, `temp_address_subdivision_village`, `temp_address_barangay`, `temp_address_municipality_city`, `temp_address_province`, `temp_address_zipCode`, `perm_address_street`, `perm_address_house_no`, `perm_address_subdivision_village`, `perm_address_barangay`, `perm_address_municipality_city`, `perm_address_province`, `perm_address_zipCode`, `nationality`, `dual_citznshp_by_birth`, `dual_citznshp_by_naturalization`, `bloodtype`, `civil_status`, `pims_religion`, `pims_image_type`, `pims_contact_no`, `pims_telephone_no`, `GSIS_No`, `PAG_IBIG_id`, `SSS_no`, `TIN_no`, `PHILHEALTH_no`) VALUES
(50011255, NULL, 'MJ', NULL, 'Balmedina', NULL, NULL, 'Female', 146, '1872-02-13', 'Legazpi City', 3, 80, NULL, NULL, NULL, 'Gapo 16', 'Legazpi', 'Albay', 4500, NULL, NULL, NULL, 'Gapo 16', 'Legazpi', 'Albay', 4500, 'Filipino', NULL, NULL, NULL, 'WIDOW', NULL, 'image/png', NULL, NULL, '654344', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pims_profile_updates`
--

CREATE TABLE IF NOT EXISTS `pims_profile_updates` (
  `p_update_id` int(10) unsigned NOT NULL,
  `emp_No` int(10) unsigned NOT NULL,
  `p_update_date` date NOT NULL,
  `p_update_status` enum('Pending','Approved','Disapproved') NOT NULL,
  `p_update_table` enum('1','2','3','4','5','6','7','8','9') DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pims_profile_updates`
--

INSERT INTO `pims_profile_updates` (`p_update_id`, `emp_No`, `p_update_date`, `p_update_status`, `p_update_table`) VALUES
(1, 5143417, '2018-04-01', 'Approved', '1'),
(2, 50011253, '2018-04-02', 'Pending', '1'),
(3, 50011253, '2018-04-02', 'Approved', '1'),
(4, 50011252, '2018-04-02', 'Approved', '1'),
(6, 5143417, '2018-04-02', 'Pending', '1'),
(8, 50011252, '2018-04-02', 'Disapproved', '3'),
(10, 50011252, '2018-04-02', 'Approved', '1'),
(11, 50011252, '2018-04-02', 'Pending', '1'),
(14, 50011252, '2018-04-03', 'Pending', '1'),
(15, 50011252, '2018-04-03', 'Pending', '1'),
(22, 50011252, '2018-04-03', 'Disapproved', '1'),
(23, 50011252, '2018-04-03', 'Pending', '1'),
(25, 50011252, '2018-04-03', 'Disapproved', '2'),
(26, 50011252, '2018-04-03', 'Pending', '6'),
(29, 5143417, '2018-04-03', 'Pending', '1'),
(31, 5143417, '2018-04-03', 'Pending', '1'),
(32, 50011252, '2018-04-03', 'Pending', '2'),
(35, 50011252, '2018-04-03', 'Approved', '2'),
(36, 50011252, '2018-04-03', 'Approved', '2'),
(38, 50011252, '2018-04-03', 'Approved', '2'),
(41, 50011252, '2018-04-03', 'Pending', '3'),
(42, 50011252, '2018-04-03', 'Approved', '3'),
(43, 50011252, '2018-04-03', 'Approved', '6'),
(46, 50011252, '2018-04-03', 'Approved', '5'),
(48, 50011252, '2018-04-03', 'Pending', '8'),
(49, 50011252, '2018-04-03', 'Pending', '8'),
(52, 50011252, '2018-04-04', 'Approved', '2'),
(53, 50011252, '2018-04-04', 'Approved', '1'),
(54, 50011252, '2018-04-04', 'Approved', '1');

-- --------------------------------------------------------

--
-- Table structure for table `pims_profile_update_list`
--

CREATE TABLE IF NOT EXISTS `pims_profile_update_list` (
  `p_update_list_id` int(10) unsigned NOT NULL,
  `p_update_id` int(10) unsigned NOT NULL,
  `p_column_name` text NOT NULL,
  `p_data_column` enum('p_data_int','p_data_text','p_data_blob') NOT NULL,
  `p_data_int` int(11) DEFAULT NULL,
  `p_data_text` text,
  `p_data_blob` longblob
) ENGINE=InnoDB AUTO_INCREMENT=184 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pims_profile_update_list`
--

INSERT INTO `pims_profile_update_list` (`p_update_list_id`, `p_update_id`, `p_column_name`, `p_data_column`, `p_data_int`, `p_data_text`, `p_data_blob`) VALUES
(1, 1, 'P_picture', 'p_data_blob', NULL, '', NULL);
INSERT INTO `pims_profile_update_list` (`p_update_list_id`, `p_update_id`, `p_column_name`, `p_data_column`, `p_data_int`, `p_data_text`, `p_data_blob`) VALUES
(2, 2, 'P_picture', 'p_data_blob', NULL, '', NULL),
(3, 3, 'temp_address_street', 'p_data_text', NULL, 'Sample Street', NULL),
(4, 4, 'P_email', 'p_data_text', NULL, 'ricardo_barrameda@yahoo.com', NULL),
(5, 4, 'temp_address_barangay', 'p_data_text', NULL, 'Sagpon', NULL),
(6, 4, 'perm_address_barangay', 'p_data_text', NULL, 'Sagpon', NULL),
(7, 4, 'temp_address_municipality_city', 'p_data_text', NULL, 'Legazpi', NULL),
(8, 4, 'perm_address_municipality_city', 'p_data_text', NULL, 'Legazpi', NULL),
(9, 4, 'temp_address_province', 'p_data_text', NULL, 'Bicol', NULL),
(10, 4, 'perm_address_province', 'p_data_text', NULL, 'Bicol', NULL),
(11, 4, 'temp_address_zipCode', 'p_data_int', 4500, NULL, NULL),
(12, 4, 'perm_address_zipCode', 'p_data_int', 4500, NULL, NULL),
(13, 4, 'temp_address_street', 'p_data_text', NULL, 'Morales', NULL),
(14, 4, 'perm_address_street', 'p_data_text', NULL, 'Morales', NULL),
(15, 4, 'temp_address_house_no', 'p_data_int', 12234, NULL, NULL),
(16, 4, 'perm_address_house_no', 'p_data_int', 12234, NULL, NULL),
(17, 4, 'temp_address_subdivision_village', 'p_data_text', NULL, NULL, NULL),
(18, 4, 'perm_address_subdivision_village', 'p_data_text', NULL, NULL, NULL),
(19, 6, 'temp_address_house_no', 'p_data_int', 1002, NULL, NULL),
(40, 8, 'elementary_school_name', 'p_data_text', NULL, '', NULL),
(41, 8, 'elementary_academic_yr', 'p_data_text', NULL, '-', NULL),
(42, 8, 'secondary_school_name', 'p_data_text', NULL, NULL, NULL),
(43, 8, 'secondary_academic_yr', 'p_data_text', NULL, NULL, NULL),
(44, 8, 'tertiary_school_name', 'p_data_text', NULL, NULL, NULL),
(45, 8, 'tertiary_academic_yr', 'p_data_text', NULL, NULL, NULL),
(46, 8, 'tertiary_degrees', 'p_data_text', NULL, NULL, NULL),
(47, 8, 'honor_or_award', 'p_data_text', NULL, NULL, NULL),
(48, 8, 'affiliations', 'p_data_text', NULL, NULL, NULL),
(68, 10, 'PAG_IBIG_id', 'p_data_text', NULL, '11111111', NULL),
(69, 10, 'SSS_no', 'p_data_text', NULL, '1111111', NULL),
(70, 10, 'TIN_no', 'p_data_text', NULL, '1111', NULL),
(71, 10, 'PHILHEALTH_no', 'p_data_text', NULL, '1111111111111111111111', NULL),
(72, 10, 'pims_contact_no', 'p_data_text', NULL, '092014343', NULL),
(73, 10, 'pims_telephone_no', 'p_data_text', NULL, '36453287462', NULL),
(74, 11, 'dual_citznshp_by_birth', 'p_data_text', NULL, 'Filipino', NULL),
(90, 14, 'pims_contact_no', 'p_data_text', NULL, '', NULL),
(91, 14, 'dual_citznshp_by_birth', 'p_data_text', NULL, 'asd', NULL),
(92, 15, 'pims_contact_no', 'p_data_text', NULL, '', NULL),
(98, 22, 'dual_citznshp_by_naturalization', 'p_data_text', NULL, 'asdasd', NULL),
(99, 23, 'dual_citznshp_by_naturalization', 'p_data_text', NULL, 'asd', NULL),
(100, 25, 'spouse_extension_name', 'p_data_text', NULL, 'Barrameda', NULL),
(101, 26, 'complete_item_no', 'p_data_text', NULL, '987554', NULL),
(102, 26, 'work_stat', 'p_data_text', NULL, 'WORKING', NULL),
(103, 26, 'role_type', 'p_data_text', NULL, 'Employee', NULL),
(104, 26, 'emp_status', 'p_data_text', NULL, 'PERMANENT', NULL),
(105, 26, 'date_joined', 'p_data_text', NULL, '2004-11-21', NULL),
(106, 26, 'div_code', 'p_data_int', 54335, NULL, NULL),
(107, 26, 'biometric_ID', 'p_data_text', NULL, '87CGH', NULL),
(108, 26, 'school_ID', 'p_data_int', 8100, NULL, NULL),
(109, 26, 'appointment_date', 'p_data_text', NULL, '2004-11-21', NULL),
(110, 29, 'dual_citznshp_by_naturalization', 'p_data_text', NULL, '2', NULL),
(111, 31, 'perm_address_house_no', 'p_data_int', 1, NULL, NULL),
(112, 32, 'spouse_extension_name', 'p_data_text', NULL, 'Barrameda', NULL),
(113, 35, 'spouse_extension_name', 'p_data_text', NULL, 'sdfds', NULL),
(114, 35, 'spouse_occupation', 'p_data_text', NULL, 'sdf', NULL),
(115, 35, 'spouse_business_name', 'p_data_text', NULL, 'sdf', NULL),
(116, 35, 'spouse_extension_name', 'p_data_text', NULL, 'sdfds', NULL),
(117, 35, 'spouse_tel_no', 'p_data_text', NULL, 'sdf', NULL),
(118, 35, 'father_occupation', 'p_data_text', NULL, 'asd', NULL),
(119, 35, 'mother_occupation', 'p_data_text', NULL, 'asd', NULL),
(120, 35, 'children_name', 'p_data_text', NULL, 'asd', NULL),
(121, 35, 'children_birthdate', 'p_data_text', NULL, '2018-04-02', NULL),
(122, 36, 'spouse_business_addr', 'p_data_text', NULL, 'asd', NULL),
(123, 38, 'father_extension_name', 'p_data_text', NULL, 'asdasdasdasdasd', NULL),
(124, 41, 'honor_or_award', 'p_data_text', NULL, 'asd', NULL),
(125, 41, 'affiliations', 'p_data_text', NULL, 'asd', NULL),
(126, 41, 'highest_units', 'p_data_text', NULL, 'asd', NULL),
(127, 42, 'vocational_school_name', 'p_data_text', NULL, 'asd', NULL),
(128, 42, 'vocational_course', 'p_data_text', NULL, 'asd', NULL),
(129, 42, 'vocational_academic_yr', 'p_data_text', NULL, '1993-1997', NULL),
(130, 42, 'gradStud_school', 'p_data_text', NULL, 'asd', NULL),
(131, 42, 'gradStud_course', 'p_data_text', NULL, 'asd', NULL),
(132, 42, 'gradStud_yr', 'p_data_text', NULL, '2001-2005', NULL),
(133, 42, 'honor_or_award', 'p_data_text', NULL, 'qwe', NULL),
(134, 42, 'affiliations', 'p_data_text', NULL, 'qwe', NULL),
(135, 42, 'highest_units', 'p_data_text', NULL, 'qwe', NULL),
(136, 43, 'complete_item_no', 'p_data_text', NULL, '987554', NULL),
(137, 43, 'work_stat', 'p_data_text', NULL, 'WORKING', NULL),
(138, 43, 'role_type', 'p_data_text', NULL, 'Employee', NULL),
(139, 43, 'emp_status', 'p_data_text', NULL, 'PERMANENT', NULL),
(140, 43, 'date_joined', 'p_data_text', NULL, '2004-11-21', NULL),
(141, 43, 'div_code', 'p_data_int', 54335, NULL, NULL),
(142, 43, 'biometric_ID', 'p_data_text', NULL, '87CGH', NULL),
(143, 43, 'school_ID', 'p_data_int', 8100, NULL, NULL),
(144, 43, 'appointment_date', 'p_data_text', NULL, '2004-11-21', NULL),
(150, 46, 'training_title', 'p_data_text', NULL, 'asd', NULL),
(151, 46, 'location', 'p_data_text', NULL, 'asd', NULL),
(152, 46, 'date_start', 'p_data_text', NULL, '2018-04-02', NULL),
(153, 46, 'date_finish', 'p_data_text', NULL, '2018-04-06', NULL),
(154, 46, 'no_of_hours', 'p_data_int', 1, NULL, NULL),
(155, 46, 'conducted_by', 'p_data_text', NULL, 'asd', NULL),
(156, 46, 'training_type', 'p_data_text', NULL, 'Managerial', NULL),
(157, 48, 'career_service', 'p_data_text', NULL, '', NULL),
(158, 48, 'rating', 'p_data_text', NULL, 'PASSED', NULL),
(159, 48, 'exam_date', 'p_data_text', NULL, '', NULL),
(160, 48, 'exam_place', 'p_data_text', NULL, '', NULL),
(161, 48, 'license_no', 'p_data_int', 0, NULL, NULL),
(162, 48, 'license_validity_date', 'p_data_text', NULL, '', NULL),
(163, 49, 'career_service', 'p_data_text', NULL, 'asd', NULL),
(164, 49, 'rating', 'p_data_text', NULL, 'PASSED', NULL),
(165, 49, 'exam_date', 'p_data_text', NULL, '2018-04-02', NULL),
(166, 49, 'exam_place', 'p_data_text', NULL, 'asd', NULL),
(167, 49, 'license_no', 'p_data_int', 123, NULL, NULL),
(168, 49, 'license_validity_date', 'p_data_text', NULL, '2018-04-20', NULL),
(181, 52, 'spouse_extension_name', 'p_data_text', NULL, 'Barrameda', NULL);
INSERT INTO `pims_profile_update_list` (`p_update_list_id`, `p_update_id`, `p_column_name`, `p_data_column`, `p_data_int`, `p_data_text`, `p_data_blob`) VALUES
(182, 53, 'P_picture', 'p_data_blob', NULL, 'image/jpeg', NULL);
INSERT INTO `pims_profile_update_list` (`p_update_list_id`, `p_update_id`, `p_column_name`, `p_data_column`, `p_data_int`, `p_data_text`, `p_data_blob`) VALUES
(183, 54, 'P_picture', 'p_data_blob', NULL, 'image/png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pims_question_info`
--

CREATE TABLE IF NOT EXISTS `pims_question_info` (
  `qi_ID` int(10) unsigned NOT NULL,
  `consanguinity_3rDegree` enum('Yes','No') NOT NULL,
  `consanguinity_4thDegree` enum('Yes','No') NOT NULL,
  `degree_details` varchar(150) DEFAULT NULL,
  `been_guilty` enum('Yes','No') NOT NULL,
  `criminallyCharged` enum('Yes','No') NOT NULL,
  `criminallyCharged_date` date DEFAULT NULL,
  `criminallyCharged_caseStatus` varchar(55) DEFAULT NULL,
  `been_convicted` enum('Yes','No') NOT NULL,
  `separated_fromService` enum('Yes','No') NOT NULL,
  `been_aCandidate` enum('Yes','No') NOT NULL,
  `resigned_GovtService` enum('Yes','No') NOT NULL,
  `were_immigrant` enum('Yes','No') NOT NULL,
  `were_immigrant_country` varchar(25) DEFAULT NULL,
  `indigenous_member` enum('Yes','No') NOT NULL,
  `indigenous_memberGroup` varchar(55) DEFAULT NULL,
  `PWD` enum('Yes','No') NOT NULL,
  `solo_parent` enum('Yes','No') NOT NULL,
  `solo_parentID` varchar(15) DEFAULT NULL,
  `emp_No` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pims_question_info`
--

INSERT INTO `pims_question_info` (`qi_ID`, `consanguinity_3rDegree`, `consanguinity_4thDegree`, `degree_details`, `been_guilty`, `criminallyCharged`, `criminallyCharged_date`, `criminallyCharged_caseStatus`, `been_convicted`, `separated_fromService`, `been_aCandidate`, `resigned_GovtService`, `were_immigrant`, `were_immigrant_country`, `indigenous_member`, `indigenous_memberGroup`, `PWD`, `solo_parent`, `solo_parentID`, `emp_No`) VALUES
(1, 'No', 'Yes', 'Related by Consanguinity', 'No', 'No', NULL, NULL, 'No', 'No', 'No', 'No', 'Yes', 'Canada', 'No', NULL, 'No', 'Yes', '12094-9838822', 4567891),
(2, 'No', 'Yes', 'Related by Affinity', 'No', 'No', NULL, NULL, 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, '', 'No', NULL, 4743128),
(3, 'No', 'Yes', 'Related by Consanguinity', 'No', 'No', NULL, NULL, 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, 'No', 'Yes', '12094-9838822', 4901154),
(4, 'No', 'No', NULL, 'No', 'No', NULL, NULL, 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, '', 'No', NULL, 4912093),
(5, 'No', 'No', NULL, 'No', 'No', NULL, NULL, 'No', 'No', 'No', 'No', 'Yes', 'Albania', 'No', NULL, 'No', 'Yes', '12094-9838822', 4990054),
(6, 'No', 'Yes', 'Related by Consanguinity', 'No', 'No', NULL, NULL, 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, '', 'No', NULL, 4990111),
(7, 'No', 'Yes', 'Related by Affinity', 'No', 'No', NULL, NULL, 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, 'No', 'Yes', '12094-9838822', 5000129),
(8, 'No', 'No', NULL, 'No', 'No', NULL, NULL, 'No', 'No', 'No', 'No', 'Yes', 'Belgium', 'No', NULL, '', 'No', NULL, 5001094),
(9, 'No', 'No', NULL, 'No', 'No', NULL, NULL, 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, 'No', 'Yes', '12094-9838822', 5002157),
(10, 'No', 'Yes', 'Related by Consanguinity', 'No', 'No', NULL, NULL, 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, '', 'No', NULL, 5110945),
(11, 'No', 'No', NULL, 'No', 'No', NULL, NULL, 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, 'No', 'Yes', '12094-9838822', 5143417),
(12, 'No', 'No', NULL, 'No', 'No', NULL, NULL, 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, '', 'No', NULL, 5166431),
(13, 'No', 'No', NULL, 'No', 'No', NULL, NULL, 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, 'No', 'Yes', '12094-9838822', 5201107),
(14, 'No', 'Yes', 'Related by Consanguinity', 'No', 'No', NULL, NULL, 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, '', 'No', NULL, 5210011),
(15, 'No', 'Yes', 'Related by Consanguinity', 'No', 'No', NULL, NULL, 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, 'No', 'Yes', '12094-9838822', 5221094),
(16, 'No', 'No', NULL, 'No', 'No', NULL, NULL, 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, '', 'No', NULL, 5231607),
(17, 'No', 'Yes', 'Related by Affinity', 'No', 'No', NULL, NULL, 'No', 'No', 'No', 'No', 'Yes', 'Italy', 'No', NULL, 'No', 'Yes', '12094-9838822', 5287126),
(18, 'No', 'No', NULL, 'No', 'No', NULL, NULL, 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, '', 'No', NULL, 5309127),
(19, 'No', 'No', NULL, 'No', 'No', NULL, NULL, 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, 'No', 'Yes', '12094-9838822', 5231607),
(20, 'No', 'No', NULL, 'No', 'No', NULL, NULL, 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, '', 'No', NULL, 5110945),
(21, 'No', 'Yes', 'Related by Consanguinity', 'No', 'No', NULL, NULL, 'No', 'No', 'No', 'No', 'Yes', 'Columbia', 'No', NULL, 'No', 'Yes', '12094-9838822', 4567891),
(22, 'No', 'No', NULL, 'No', 'No', NULL, NULL, 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, '', 'No', NULL, 4743128),
(23, 'No', 'No', NULL, 'No', 'No', NULL, NULL, 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, 'No', 'Yes', '12094-9838822', 4901154),
(24, 'No', 'Yes', 'Related by Affinity', 'No', 'No', NULL, NULL, 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, '', 'No', NULL, 5501298),
(25, 'No', 'No', NULL, 'No', 'No', NULL, NULL, 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, 'No', 'Yes', '12094-9838822', 5513092),
(26, 'No', 'No', NULL, 'No', 'No', NULL, NULL, 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, '', 'No', NULL, 5566126),
(27, 'No', 'Yes', 'Related by Consanguinity', 'No', 'No', NULL, NULL, 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, 'No', 'Yes', '12094-9838822', 5677342),
(28, 'No', 'No', NULL, 'No', 'No', NULL, NULL, 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, '', 'No', NULL, 5756153),
(29, 'No', 'Yes', 'Related by Affinity', 'No', 'No', NULL, NULL, 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, 'No', 'Yes', '12094-9838822', 5880365),
(30, 'No', 'No', NULL, 'No', 'No', NULL, NULL, 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, '', 'No', NULL, 5901112),
(31, 'No', 'Yes', 'Related by Affinity', 'No', 'No', NULL, NULL, 'No', 'No', 'No', 'No', 'Yes', 'Sweden', 'No', NULL, 'No', 'Yes', '12094-9838822', 5902312),
(32, 'No', 'Yes', 'Related by Affinity', 'No', 'No', NULL, NULL, 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, '', 'No', NULL, 50011248),
(33, 'No', 'Yes', 'Related by Affinity', 'No', 'No', NULL, NULL, 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, 'No', 'Yes', '12094-9838822', 50011249),
(34, 'No', 'No', NULL, 'No', 'No', NULL, NULL, 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, '', 'No', NULL, 50011250),
(35, 'No', 'No', NULL, 'No', 'No', NULL, NULL, 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, 'No', 'Yes', '12094-9838822', 50011251),
(36, 'No', 'Yes', 'Related by Consanguinity', 'No', 'No', NULL, NULL, 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, '', 'No', NULL, 50011252),
(37, 'No', 'No', NULL, 'No', 'No', NULL, NULL, 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, 'No', 'Yes', '12094-9838822', 50011253),
(38, 'No', 'No', NULL, 'No', 'No', NULL, NULL, 'No', 'No', 'No', 'No', 'Yes', 'Maldives', 'No', NULL, '', 'No', NULL, 50011254),
(39, 'No', 'Yes', 'Related by Affinity', 'No', 'No', NULL, NULL, 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, 'No', 'Yes', '12094-9838822', 50011255);

-- --------------------------------------------------------

--
-- Table structure for table `pims_ref`
--

CREATE TABLE IF NOT EXISTS `pims_ref` (
  `r_No` int(10) unsigned NOT NULL,
  `r_name` varchar(150) DEFAULT NULL,
  `r_address` varchar(150) DEFAULT NULL,
  `r_telno` int(15) unsigned DEFAULT NULL,
  `emp_No` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pims_ref`
--

INSERT INTO `pims_ref` (`r_No`, `r_name`, `r_address`, `r_telno`, `emp_No`) VALUES
(1, 'Maria Palma', 'Bitano, Legazpi City', 709767666, 50011255),
(2, 'Clarisse Bueno', 'Daraga, Albay', 8797002, 50011254),
(3, 'Maria Palma', 'Bitano, Legazpi City', 709767666, 50011253),
(4, 'Clarisse Bueno', 'Daraga, Albay', 8797002, 50011252),
(5, 'Maria Palma', 'Bitano, Legazpi City', 709767666, 50011251),
(6, 'Clarisse Bueno', 'Daraga, Albay', 8797002, 50011250),
(7, 'Maria Palma', 'Bitano, Legazpi City', 709767666, 50011249),
(8, 'Clarisse Bueno', 'Daraga, Albay', 8797002, 50011248),
(9, 'Maria Palma', 'Bitano, Legazpi City', 709767666, 5902312),
(10, 'Clarisse Bueno', 'Daraga, Albay', 8797002, 5901112),
(11, 'Clarisse Bueno', 'Daraga, Albay', 8797002, 5880365),
(12, 'Maria Palma', 'Bitano, Legazpi City', 709767666, 5756153),
(13, 'Clarisse Bueno', 'Daraga, Albay', 8797002, 5677342),
(14, 'Clarisse Bueno', 'Daraga, Albay', 8797002, 5566126),
(15, 'Maria Palma', 'Bitano, Legazpi City', 709767666, 5513092),
(16, 'Clarisse Bueno', 'Daraga, Albay', 8797002, 5501298),
(17, 'Maria Palma', 'Bitano, Legazpi City', 709767666, 5432123),
(18, 'Clarisse Bueno', 'Daraga, Albay', 8797002, 5412398),
(19, 'Maria Palma', 'Bitano, Legazpi City', 709767666, 5400127),
(20, 'Clarisse Bueno', 'Daraga, Albay', 8797002, 5353113),
(21, 'Clarisse Bueno', 'Daraga, Albay', 8797002, 5340912),
(22, 'Maria Palma', 'Bitano, Legazpi City', 709767666, 5309127),
(23, 'Maria Palma', 'Bitano, Legazpi City', 709767666, 5287126),
(24, 'Clarisse Bueno', 'Daraga, Albay', 8797002, 5231607),
(25, 'Maria Palma', 'Bitano, Legazpi City', 709767666, 5221094),
(26, 'Clarisse Bueno', 'Daraga, Albay', 8797002, 5210011),
(27, 'Maria Palma', 'Bitano, Legazpi City', 709767666, 5201107),
(28, 'Clarisse Bueno', 'Daraga, Albay', 8797002, 5166431),
(29, 'Clarisse Bueno', 'Daraga, Albay', 8797002, 5143417),
(30, 'Maria Palma', 'Bitano, Legazpi City', 709767666, 5110945),
(31, 'Clarisse Bueno', 'Daraga, Albay', 8797002, 5002157),
(32, 'Maria Palma', 'Bitano, Legazpi City', 709767666, 5001094),
(33, 'Maria Palma', 'Bitano, Legazpi City', 709767666, 5000129),
(34, 'Clarisse Bueno', 'Daraga, Albay', 8797002, 4990111),
(35, 'Maria Palma', 'Bitano, Legazpi City', 709767666, 4990054),
(36, 'Clarisse Bueno', 'Daraga, Albay', 8797002, 4912093),
(37, 'Maria Palma', 'Bitano, Legazpi City', 709767666, 4901154),
(38, 'Clarisse Bueno', 'Daraga, Albay', 8797002, 4743128),
(39, 'Clarisse Bueno', 'Daraga, Albay', 8797002, 4567891),
(40, 'Maria Palma', 'Bitano, Legazpi City', 709767666, 50011255),
(41, 'Clarisse Bueno', 'Daraga, Albay', 8797002, 50011251),
(42, 'Clarisse Bueno', 'Daraga, Albay', 8797002, 5432123),
(43, 'Maria Palma', 'Bitano, Legazpi City', 709767666, 5400127),
(44, 'Clarisse Bueno', 'Daraga, Albay', 8797002, 50011250),
(45, 'Clarisse Bueno', 'Daraga, Albay', 8797002, 50011251),
(46, 'Maria Palma', 'Bitano, Legazpi City', 709767666, 4990111);

-- --------------------------------------------------------

--
-- Table structure for table `pims_service_records`
--

CREATE TABLE IF NOT EXISTS `pims_service_records` (
  `servRec_ID` int(10) unsigned NOT NULL,
  `inclusive_date_start` date NOT NULL,
  `inclusive_date_end` varchar(20) DEFAULT NULL,
  `designation` varchar(45) DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `place_of_assignment` varchar(45) DEFAULT NULL,
  `srce_of_fund` varchar(45) DEFAULT NULL,
  `remarks` varchar(45) DEFAULT NULL,
  `emp_rec_ID` int(10) unsigned NOT NULL,
  `sr_status` enum('PERMANENT','TEMPORARY','PROBATIONARY') DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pims_service_records`
--

INSERT INTO `pims_service_records` (`servRec_ID`, `inclusive_date_start`, `inclusive_date_end`, `designation`, `salary`, `place_of_assignment`, `srce_of_fund`, `remarks`, `emp_rec_ID`, `sr_status`) VALUES
(1, '2018-04-02', '2018-04-10', 'Teacher II', 10000, 'PNHS', 'BSP', 'NBC#448,''96', 46, 'PERMANENT'),
(2, '2018-03-12', '2018-03-27', 'Teacher I', 20000, 'PNHS', 'BSP', 'NBC#511', 46, 'PERMANENT'),
(3, '2018-04-28', '2018-05-05', 'Teacher I', 21000, 'PNHS', 'BSP', 'NBC#512', 46, 'PERMANENT'),
(4, '2018-03-12', '2018-03-27', 'Teacher II', 10000, 'PNHS', 'BSP', 'NBC#511', 46, 'PERMANENT');

-- --------------------------------------------------------

--
-- Table structure for table `pims_timestamp`
--

CREATE TABLE IF NOT EXISTS `pims_timestamp` (
  `timestamp_id` int(10) unsigned NOT NULL,
  `time_in` datetime NOT NULL,
  `time_out` datetime DEFAULT NULL,
  `emp_rec_ID` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pims_training_programs`
--

CREATE TABLE IF NOT EXISTS `pims_training_programs` (
  `training_ID` int(10) unsigned NOT NULL,
  `training_title` varchar(110) NOT NULL,
  `location` varchar(45) NOT NULL,
  `date_start` date NOT NULL,
  `date_finish` date NOT NULL,
  `no_of_hours` int(10) unsigned NOT NULL,
  `training_type` enum('Managerial','Supervisory','Technical','etc.') NOT NULL,
  `conducted_by` varchar(45) NOT NULL,
  `others` varchar(45) DEFAULT NULL,
  `emp_No` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pims_training_programs`
--

INSERT INTO `pims_training_programs` (`training_ID`, `training_title`, `location`, `date_start`, `date_finish`, `no_of_hours`, `training_type`, `conducted_by`, `others`, `emp_No`) VALUES
(1, 'Scientific Innovation Training & Workshop', 'Mandaluyong City', '2017-10-03', '2017-10-04', 14, 'Supervisory', 'The Vanguard', NULL, 5000129),
(2, 'Wikang Filipino: Millenials blah blah blah', 'Camarines Sur', '2017-10-11', '2017-10-13', 20, 'Technical', 'Shane Bio', NULL, 5000129),
(3, 'Innovative Teaching Strategies Training & Contest', 'Macau', '2017-08-03', '2017-08-09', 14, 'Supervisory', 'Inditers', NULL, 5002157),
(4, 'Narrowing the gap between the uneducated and the .....', 'Sorsogon', '2016-10-11', '2016-10-13', 20, 'Supervisory', 'The Vanguard', NULL, 4990054),
(5, 'Science & Technology Innovation', 'Naga City, Cam Sur', '2017-09-18', '2017-09-19', 18, 'Technical', 'TNHS Alumni', NULL, 50011252),
(6, 'Leadership Training ', 'Sorsogon City', '2016-11-12', '2016-11-12', 8, 'Supervisory', 'Inditers', NULL, 50011252),
(7, 'Engineer a Better Future', 'Pasay City', '2017-10-04', '2017-10-07', 18, 'Technical', 'The Vanguard', NULL, 5143417),
(8, 'Team Building: "Building a staunch foundation"', 'Bacacay, Albay', '2018-01-09', '2018-01-09', 6, 'Supervisory', 'Inditers', NULL, 5143417),
(9, 'Digital Innovation Catalyst', 'Sto. Domingo, Albay', '2017-10-17', '2017-10-17', 6, 'Technical', 'Alex Rolde', NULL, 50011252),
(10, 'Risk & Disaster Preparedness Blah Blah', 'Legaspi City', '2018-01-09', '2018-01-10', 12, 'Supervisory', 'Inditers', NULL, 5143417),
(11, 'Scientific Innovation Training & Workshop', 'Mandaluyong City', '2017-10-03', '2017-10-04', 14, 'Technical', 'The Vanguard', NULL, 4567891),
(12, 'Developing a Substantial Foundation Program', 'Camarines Sur', '2017-10-11', '2017-10-13', 20, 'Technical', 'Inditers', NULL, 4743128),
(13, 'Innovative Teaching', 'Macau', '2017-08-03', '2017-08-09', 14, 'Technical', 'Leonardo Decaprio', NULL, 4901154),
(14, 'Narrowing the gap between the uneducated and the .....', 'Sorsogon', '2016-10-11', '2016-10-13', 20, 'Technical', 'The Vanguard', NULL, 4912093),
(15, 'Science & Technology Innovation', 'Naga City, Cam Sur', '2017-09-18', '2017-09-19', 18, 'Technical', 'Shiloh Fernandez', NULL, 4990054),
(16, 'Leadership Training ', 'Tabaco City', '2016-11-12', '2016-11-12', 8, 'Technical', 'The', NULL, 4990111),
(17, 'Engineer a Better Future', 'Pasay City', '2017-10-04', '2017-10-07', 18, 'Technical', 'The Vanguard', NULL, 5000129),
(18, 'Team Building: "Building a staunch foundation"', 'Bacacay, Albay', '2018-01-09', '2018-01-09', 6, 'Supervisory', 'Inditers', NULL, 5001094),
(19, 'ABC Program', 'Ligao, Albay', '2017-10-17', '2017-10-17', 6, 'Technical', 'The Varsitarian', NULL, 5002157),
(20, 'Risk & Disaster Preparedness', 'Pilar, Sorsogon City', '2018-01-09', '2018-01-10', 12, 'Supervisory', 'Inditers', NULL, 5110945),
(21, 'Innovation Training & Workshop', 'Mandaluyong City', '2017-10-03', '2017-10-04', 14, 'Technical', 'The Vanguard', NULL, 5143417),
(22, 'Building a Substantial Foundation Program', 'Camarines Sur', '2017-10-11', '2017-10-13', 20, 'Technical', 'Inditers', NULL, 5166431),
(23, 'Teaching Innovation in Science and Life', 'Macau', '2017-08-03', '2017-08-09', 14, 'Managerial', 'Unibe', NULL, 5201107),
(24, 'Team building ', 'Sorsogon', '2016-10-11', '2016-10-13', 20, 'Managerial', 'Varsitarian', NULL, 5210011),
(25, 'Science & Technology Innovation', 'Naga City, Cam Sur', '2017-09-18', '2017-09-19', 18, 'Managerial', 'Filmora', NULL, 5221094),
(26, 'As Juan: Leadership Training ', 'Tabaco City', '2016-11-12', '2016-11-12', 8, 'Technical', 'The Vanguard', NULL, 5231607),
(27, 'Engineer a Better Future', 'Pasay City', '2017-10-04', '2017-10-07', 18, 'Managerial', 'The Vanguard', NULL, 5287126),
(28, 'Team Building: "Building a staunch foundation"', 'Bacacay, Albay', '2018-01-09', '2018-01-09', 6, 'Supervisory', 'Inditers', NULL, 5309127),
(29, 'ABC Program', 'Ligao, Albay', '2017-10-17', '2017-10-17', 6, 'Technical', 'The Vanguard', NULL, 5340912),
(30, 'Risk & Disaster Preparedness', 'Pilar, Sorsogon City', '2018-01-09', '2018-01-10', 12, 'Supervisory', 'Inditers', NULL, 5353113),
(31, 'Scientific Innovation Training & Workshop', 'Mandaluyong City', '2017-10-03', '2017-10-04', 14, 'Technical', 'The Vanguard', NULL, 5400127),
(32, 'Developing a Substantial Foundation Program', 'Camarines Sur', '2017-10-11', '2017-10-13', 20, 'Technical', 'Inditers', NULL, 5412398),
(33, 'Innovative Teaching', 'Macau', '2017-08-03', '2017-08-09', 14, 'Technical', 'The Vanguard', NULL, 5432123),
(34, 'Narrowing the gap between the uneducated and the .....', 'Sorsogon', '2016-10-11', '2016-10-13', 20, 'Technical', 'The Vanguard', NULL, 5501298),
(35, 'Science & Technology Innovation', 'Naga City, Cam Sur', '2017-09-18', '2017-09-19', 18, 'Technical', 'Max Irons', NULL, 5513092),
(36, 'Leadership Training ', 'Tabaco City', '2016-11-12', '2016-11-12', 8, 'Technical', 'The Vanguard', NULL, 5566126),
(37, 'Engineer a Better Future', 'Pasay City', '2017-10-04', '2017-10-07', 18, 'Technical', 'The Varsitarian', NULL, 5677342),
(38, 'Team Building: "Building a staunch foundation"', 'Bacacay, Albay', '2018-01-09', '2018-01-09', 6, 'Supervisory', 'Inditers', NULL, 5756153),
(39, 'ABC Program', 'Ligao, Albay', '2017-10-17', '2017-10-17', 6, 'Technical', 'Inditers', NULL, 5880365),
(40, 'Risk & Disaster Preparedness', 'Pilar, Sorsogon City', '2018-01-09', '2018-01-10', 12, 'Supervisory', 'Inditers', NULL, 5901112),
(41, 'Innovation Training & Workshop', 'Mandaluyong City', '2017-10-03', '2017-10-04', 14, 'Managerial', 'The Varsitarian', NULL, 5902312),
(42, 'Building a Substantial Foundation Program', 'Camarines Sur', '2017-10-11', '2017-10-13', 20, 'Technical', 'Inditers', NULL, 50011248),
(43, 'Teaching Innovation in Science and Life', 'Macau', '2017-08-03', '2017-08-09', 14, 'Managerial', 'The Vanguard', NULL, 50011249),
(44, 'Team building ', 'Sorsogon', '2016-10-11', '2016-10-13', 20, 'Technical', 'Filmora', NULL, 50011250),
(45, 'Science & Technology Innovation', 'Naga City, Cam Sur', '2017-09-18', '2017-09-19', 18, 'Managerial', 'The Vanguard', NULL, 50011251),
(46, 'As Juan: Leadership Training ', 'Tabaco City', '2016-11-12', '2016-11-12', 8, 'Technical', 'Inditers', NULL, 50011252),
(47, 'Engineer a Better Future', 'Pasay City', '2017-10-04', '2017-10-07', 18, 'Managerial', 'Inditers', NULL, 50011253),
(48, 'Team Building: "Building a staunch foundation"', 'Bacacay, Albay', '2018-01-09', '2018-01-09', 6, 'Managerial', 'The Vanguard', NULL, 50011254),
(49, 'Faculty Awareness Program', 'Ligao, Albay', '2017-10-17', '2017-10-17', 6, 'Technical', 'The Vanguard', NULL, 50011255),
(50, 'Risk & Disaster Preparedness', 'Pilar, Sorsogon City', '2018-01-09', '2018-01-10', 12, 'Technical', 'The Vanguard', NULL, 50011251),
(51, 'asd', 'asd', '2018-04-02', '2018-04-06', 1, 'Managerial', 'asd', NULL, 50011252);

-- --------------------------------------------------------

--
-- Table structure for table `pims_voluntary_work`
--

CREATE TABLE IF NOT EXISTS `pims_voluntary_work` (
  `vw_ID` int(10) unsigned NOT NULL,
  `org_name_address` varchar(200) DEFAULT NULL,
  `vw_date_from` date DEFAULT NULL,
  `vw_date_to` date DEFAULT NULL,
  `vw_no_of_hrs` int(10) unsigned DEFAULT NULL,
  `vw_position` varchar(55) DEFAULT NULL,
  `emp_No` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pims_voluntary_work`
--

INSERT INTO `pims_voluntary_work` (`vw_ID`, `org_name_address`, `vw_date_from`, `vw_date_to`, `vw_no_of_hrs`, `vw_position`, `emp_No`) VALUES
(1, 'ABC Inc., Makati City', '2014-04-02', '2014-11-30', 2100, NULL, 50011255),
(2, 'New Market Inc., Makati City', '2014-04-02', '2014-11-30', 2100, NULL, 50011254),
(3, 'A&C Inc., BGC Taguig City', '2014-04-02', '2014-11-30', 2100, NULL, 50011253),
(4, 'Laile Corp., Bacoor City,Cavite', '2014-04-02', '2014-11-30', 2100, NULL, 50011252),
(5, 'CDF Inc., Makati City', '2014-04-02', '2014-11-30', 2100, NULL, 50011251),
(6, 'Azore Foundation, Pasig City', '2014-04-02', '2014-11-30', 2100, NULL, 50011250),
(7, 'Childrens Haven Foundation, Ortigas City', '2014-04-02', '2014-11-30', 2100, NULL, 50011249),
(8, 'ABC Inc., Makati City', '2014-04-02', '2014-11-30', 2100, NULL, 50011248),
(9, 'Pen for A Cause F., Sta.Rosa, Laguna', '2014-04-02', '2014-11-30', 2100, NULL, 5902312),
(10, 'New Market Inc., Makati City', '2014-04-02', '2014-11-30', 2100, NULL, 5901112),
(11, 'ABC Inc., Makati City', '2014-04-02', '2014-11-30', 2100, NULL, 5880365),
(12, 'ABC Inc., Makati City', '2014-04-02', '2014-11-30', 2100, NULL, 5756153),
(13, 'Lend a Hand Foundation, 5th Av. Mandaluyong City', '2014-04-02', '2014-11-30', 2100, NULL, 5677342),
(14, 'E&M Corp., Cavite', '2014-04-02', '2014-11-30', 2100, NULL, 5566126),
(15, 'Azore Foundation, Pasig City', '2014-04-02', '2014-11-30', 2100, NULL, 5513092),
(16, 'Childrens Haven Foundation, Ortigas City', '2014-04-02', '2014-08-30', 900, NULL, 5501298),
(17, 'ABC Inc., Mak ti City', '2014-04-02', '2014-11-30', 2100, NULL, 5432123),
(18, 'Childrens Haven Foundation, Ortigas City', '2014-04-02', '2014-11-30', 2100, NULL, 5412398),
(19, 'Safe Haven Foundation, Batangas', '2014-04-02', '2014-11-30', 2100, NULL, 5400127),
(20, 'Lend a Hand Foundation, 5th Av. Mandaluyong City', '2014-04-02', '2014-11-30', 2100, NULL, 5353113),
(21, 'ABC Inc., Makati City', '2014-04-02', '2014-11-30', 2100, NULL, 5340912),
(22, 'E&M Corp., Cavite', '2014-04-02', '2014-11-30', 2100, NULL, 5309127),
(23, 'ABC Inc., Makati City', '2014-04-02', '2014-11-30', 2100, NULL, 5287126),
(24, 'Lend a Hand Foundation, 5th Av. Mandaluyong City', '2014-04-02', '2014-11-30', 2100, NULL, 5231607),
(25, 'ABC Inc., Makati City', '2014-04-02', '2014-11-30', 2100, NULL, 5221094),
(26, 'E&M Corp., Cavite', '2014-04-02', '2014-11-30', 2100, NULL, 5210011),
(27, 'Lend a Hand Foundation, 5th Av. Mandaluyong City', '2014-04-02', '2014-11-30', 2100, NULL, 5201107),
(28, 'B&Y Foundation, Makati City', '2014-04-02', '2014-11-30', 2100, NULL, 5166431),
(29, 'Azore Foundation, Pasig City', '2014-04-02', '2014-11-30', 2100, NULL, 5143417),
(30, 'ABC Inc., Makati City', '2014-04-02', '2014-11-30', 2100, NULL, 5110945),
(31, 'E&M Corp., Cavite', '2014-04-02', '2014-11-30', 2100, NULL, 5002157),
(32, 'Stonebrook Printing , Makati City', '2009-04-02', '2010-11-30', 4600, 'Chief Editor', 5001094),
(33, 'A&C Inc., BGC Taguig City', '2012-04-02', '2012-11-30', 2100, NULL, 5000129),
(34, 'Laile Corp., Bacoor City,Cavite', '2008-04-02', '2008-11-30', 2100, NULL, 4990111),
(35, 'CDF Inc., Makati City', '2014-04-02', '2014-11-30', 2100, NULL, 4990054),
(36, 'Azore Foundation, Pasig City', '2006-07-11', '2006-12-21', 345, NULL, 4912093),
(37, 'Childrens Haven Foundation, Ortigas City', '2014-04-02', '2014-11-30', 2100, NULL, 4901154),
(38, 'ABC Inc., Makati City', '2014-04-02', '2014-11-30', 2100, NULL, 4743128),
(39, 'VHRV Holdings, BGC Taguig City', '2017-03-12', '2017-06-12', 540, 'COO', 4567891);

-- --------------------------------------------------------

--
-- Table structure for table `pims_work_experience`
--

CREATE TABLE IF NOT EXISTS `pims_work_experience` (
  `we_ID` int(10) unsigned NOT NULL,
  `we_date_from` date DEFAULT NULL,
  `we_date_to` date DEFAULT NULL,
  `we_position` varchar(55) DEFAULT NULL,
  `we_department` varchar(55) DEFAULT NULL,
  `agency` varchar(100) DEFAULT NULL,
  `office` varchar(100) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `we_monthly_salary` double unsigned DEFAULT NULL,
  `pay_grade` varchar(20) DEFAULT NULL,
  `appointment_status` varchar(45) DEFAULT NULL,
  `govt_service` enum('Yes','No') DEFAULT NULL,
  `emp_No` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pims_work_experience`
--

INSERT INTO `pims_work_experience` (`we_ID`, `we_date_from`, `we_date_to`, `we_position`, `we_department`, `agency`, `office`, `company`, `we_monthly_salary`, `pay_grade`, `appointment_status`, `govt_service`, `emp_No`) VALUES
(1, '2016-10-03', '2018-03-07', 'Cashier', 'Cash Department', NULL, NULL, 'ABC Inc.', 12, '15,000', 'Permanent', 'No', 50011251),
(2, '2016-10-03', '2018-03-07', 'Accountant I', 'Finance Department', NULL, NULL, 'ABC Inc.', 12, '15,000', 'Permanent', 'No', 50011252),
(3, '2016-10-03', '2018-03-07', 'Asst. Cashier', 'Cash Department', NULL, NULL, 'ABC Inc.', 12, '15,000', 'Permanent', 'No', 50011250),
(4, '2016-10-03', '2018-03-07', 'Supply Admin', 'Supply Department', NULL, NULL, 'ABC Inc.', 12, '15,000', 'Permanent', 'No', 4567891),
(5, '2016-10-03', '2018-03-07', 'Finance Admin.', 'Budget & Finance Department', NULL, NULL, 'ABC Inc.', 12, '15,000', 'Permanent', 'No', 4743128),
(6, '2016-10-03', '2018-03-07', 'Cashier', 'Cash Department', NULL, NULL, 'ABC Inc.', 12, '15,000', 'Permanent', 'No', 4901154),
(7, '2016-10-03', '2018-03-07', 'Part-Time Teacher', 'NULL', 'ABC Inc.', NULL, 'ABC Inc.', 12, '15,000', 'Permanent', 'No', 4990054),
(8, '2016-10-03', '2018-03-07', 'Sales Assistant', 'Sales Department', NULL, NULL, 'New Market Corp.', 12, '15,000', 'Permanent', 'No', 4912093),
(9, '2016-10-03', '2018-03-07', 'Cashier', 'Cash Department', NULL, NULL, 'ABC Inc.', 12, '15,000', 'Permanent', 'No', 4990111),
(10, '2016-10-03', '2018-03-07', 'Cashier', 'Cash Department', NULL, NULL, 'ABC Inc.', 12, '15,000', 'Permanent', 'No', 5110945);

-- --------------------------------------------------------

--
-- Table structure for table `pms_iar`
--

CREATE TABLE IF NOT EXISTS `pms_iar` (
  `iar_no` int(10) unsigned NOT NULL,
  `iar_status` enum('Partial','Complete') NOT NULL,
  `received_date` date NOT NULL,
  `ins_date` date NOT NULL,
  `iar_date` date NOT NULL,
  `inv_num` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pms_iar`
--

INSERT INTO `pms_iar` (`iar_no`, `iar_status`, `received_date`, `ins_date`, `iar_date`, `inv_num`) VALUES
(1, 'Complete', '2018-04-04', '2018-04-04', '2018-04-03', '9876543'),
(2, 'Complete', '2018-04-04', '2018-04-04', '2018-04-03', '1122'),
(3, 'Complete', '2018-04-07', '2018-04-07', '2018-04-03', '1111110'),
(4, 'Complete', '2018-04-08', '2018-04-08', '2018-04-03', '10101'),
(5, 'Complete', '2018-04-19', '2018-04-26', '2018-04-03', '87000'),
(6, 'Complete', '2018-04-10', '2018-04-10', '2018-04-04', '987643345'),
(7, 'Complete', '2018-04-11', '2018-04-11', '2018-04-04', '76567'),
(8, 'Complete', '2018-04-05', '2018-04-05', '2018-04-04', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `pms_iar_con`
--

CREATE TABLE IF NOT EXISTS `pms_iar_con` (
  `iar_id` int(10) unsigned NOT NULL,
  `po_id` int(10) unsigned NOT NULL,
  `iar_no` int(10) unsigned NOT NULL,
  `received_qty` int(11) NOT NULL,
  `next_del_date` date DEFAULT NULL,
  `status` enum('COMPLETE','NOT COMPLETE') NOT NULL,
  `inserted` enum('0','1') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pms_iar_con`
--

INSERT INTO `pms_iar_con` (`iar_id`, `po_id`, `iar_no`, `received_qty`, `next_del_date`, `status`, `inserted`) VALUES
(1, 2, 1, 1, '0000-00-00', 'COMPLETE', '1'),
(2, 3, 1, 2, '0000-00-00', 'COMPLETE', '1'),
(3, 4, 2, 4, '0000-00-00', 'COMPLETE', '1'),
(4, 6, 3, 1, '0000-00-00', 'COMPLETE', '1'),
(5, 7, 3, 10, '0000-00-00', 'COMPLETE', '1'),
(6, 5, 4, 5, '0000-00-00', 'COMPLETE', '1'),
(7, 1, 5, 2, '0000-00-00', 'COMPLETE', '1'),
(8, 8, 6, 1, '0000-00-00', 'COMPLETE', '1'),
(9, 9, 6, 2, '0000-00-00', 'COMPLETE', '1'),
(10, 11, 7, 3, '0000-00-00', 'COMPLETE', '0'),
(11, 12, 7, 3, '0000-00-00', 'COMPLETE', '0'),
(12, 13, 8, 2, '0000-00-00', 'COMPLETE', '0');

-- --------------------------------------------------------

--
-- Table structure for table `pms_po`
--

CREATE TABLE IF NOT EXISTS `pms_po` (
  `po_no` int(10) unsigned NOT NULL,
  `company_id` int(10) unsigned NOT NULL,
  `po_date` date NOT NULL,
  `delivery_term` enum('Pick Up','Delivery') NOT NULL,
  `payment_term` enum('Check','Cash','Credit') NOT NULL,
  `check_no` varchar(50) DEFAULT NULL,
  `delivery_date` date NOT NULL,
  `po_total` double DEFAULT NULL,
  `po_status` varchar(20) NOT NULL,
  `po_update_date` date NOT NULL,
  `po_seen` enum('0','1') DEFAULT '0',
  `po_sp_seen` enum('1','0') NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pms_po`
--

INSERT INTO `pms_po` (`po_no`, `company_id`, `po_date`, `delivery_term`, `payment_term`, `check_no`, `delivery_date`, `po_total`, `po_status`, `po_update_date`, `po_seen`, `po_sp_seen`) VALUES
(1, 6, '2018-04-03', 'Delivery', 'Cash', NULL, '2018-04-03', 111000, 'Approved', '0000-00-00', '1', '0'),
(2, 7, '2018-04-03', 'Pick Up', 'Cash', NULL, '2018-04-03', 1150, 'Approved', '0000-00-00', '1', '0'),
(3, 1, '2018-04-03', 'Pick Up', 'Cash', NULL, '2018-04-03', 800, 'Approved', '0000-00-00', '1', '0'),
(4, 1, '2018-04-03', 'Pick Up', 'Cash', NULL, '2018-04-05', 5, 'Approved', '0000-00-00', '1', '0'),
(5, 9, '2018-04-03', 'Pick Up', 'Cash', NULL, '2018-04-06', 32, 'Approved', '0000-00-00', '1', '0'),
(6, 9, '2018-04-04', 'Delivery', 'Cash', NULL, '2018-04-25', 250, 'Approved', '0000-00-00', '1', '0'),
(7, 6, '2018-04-04', 'Delivery', 'Check', NULL, '2018-04-23', 0, 'Pending', '0000-00-00', '1', '0'),
(8, 6, '2018-04-04', 'Delivery', 'Check', NULL, '2018-04-24', 108000, 'Approved1', '0000-00-00', '1', '0'),
(9, 1, '2018-04-04', 'Pick Up', 'Cash', NULL, '2018-04-22', 135, 'Approved', '0000-00-00', '1', '0'),
(10, 12, '2018-04-04', 'Pick Up', 'Cash', NULL, '2018-04-04', 500, 'Approved', '0000-00-00', '1', '0'),
(11, 1, '2018-04-04', 'Pick Up', 'Cash', NULL, '2018-04-17', 100, 'Denied', '0000-00-00', '1', '0'),
(12, 3, '2018-04-04', 'Pick Up', 'Cash', NULL, '2018-04-11', 244, 'Pending', '0000-00-00', '1', '0'),
(13, 1, '2018-04-04', 'Delivery', 'Cash', NULL, '2018-04-04', 2000, 'Pending', '0000-00-00', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `pms_po_con`
--

CREATE TABLE IF NOT EXISTS `pms_po_con` (
  `po_id` int(10) unsigned NOT NULL,
  `po_no` int(10) unsigned NOT NULL,
  `pr_id` int(10) unsigned NOT NULL,
  `unit_cost` double NOT NULL,
  `tot_amt` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pms_po_con`
--

INSERT INTO `pms_po_con` (`po_id`, `po_no`, `pr_id`, `unit_cost`, `tot_amt`) VALUES
(1, 1, 1, 55500, 111000),
(2, 2, 3, 350, 350),
(3, 2, 4, 400, 800),
(4, 3, 5, 200, 800),
(5, 4, 9, 1, 5),
(6, 5, 10, 2, 2),
(7, 5, 11, 3, 30),
(8, 6, 12, 200, 200),
(9, 6, 13, 25, 50),
(10, 8, 14, 18000, 108000),
(11, 9, 15, 20, 60),
(12, 9, 16, 25, 75),
(13, 10, 17, 250, 500),
(14, 11, 18, 25, 100),
(15, 12, 19, 55, 110),
(16, 12, 20, 67, 134),
(17, 13, 21, 500, 1000),
(18, 13, 22, 500, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `pms_pr`
--

CREATE TABLE IF NOT EXISTS `pms_pr` (
  `pr_no` int(10) unsigned NOT NULL,
  `pr_date` date DEFAULT NULL,
  `pr_total` double NOT NULL,
  `pr_status` enum('Pending','Approved','Denied','Finished') NOT NULL,
  `pr_update_date` date NOT NULL,
  `pr_seen` enum('0','1') DEFAULT '0',
  `pr_sp_seen` enum('1','0') NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pms_pr`
--

INSERT INTO `pms_pr` (`pr_no`, `pr_date`, `pr_total`, `pr_status`, `pr_update_date`, `pr_seen`, `pr_sp_seen`) VALUES
(1, '2018-04-03', 16000, 'Approved', '0000-00-00', '1', '0'),
(2, '2018-04-03', 60000, 'Approved', '0000-00-00', '1', '0'),
(3, '2018-04-03', 1800, 'Approved', '0000-00-00', '1', '0'),
(4, '2018-04-03', 3290, 'Approved', '0000-00-00', '1', '0'),
(5, '2018-04-03', 37, 'Approved', '0000-00-00', '1', '0'),
(6, '2018-04-04', 600, 'Approved', '0000-00-00', '1', '0'),
(7, '2018-04-04', 105000, 'Approved', '0000-00-00', '1', '0'),
(8, '2018-04-04', 135, 'Approved', '0000-00-00', '1', '0'),
(9, '2018-04-04', 1000, 'Approved', '0000-00-00', '1', '0'),
(10, '2018-04-04', 310, 'Approved', '0000-00-00', '1', '0'),
(11, '2018-04-04', 370, 'Approved', '0000-00-00', '1', '0'),
(12, '2018-04-04', 900, 'Denied', '0000-00-00', '1', '0'),
(13, '2018-04-04', 940, 'Denied', '0000-00-00', '1', '0'),
(14, '2018-04-04', 30000, 'Pending', '0000-00-00', '1', '0'),
(15, '2018-04-04', 60000, 'Approved', '0000-00-00', '1', '0'),
(16, '2018-04-04', 1000, 'Pending', '0000-00-00', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `pms_pr_con`
--

CREATE TABLE IF NOT EXISTS `pms_pr_con` (
  `pr_id` int(10) unsigned NOT NULL,
  `pr_no` int(10) unsigned NOT NULL,
  `req_item_id` int(10) unsigned NOT NULL,
  `est_unit_cost` double NOT NULL,
  `est_cost` double NOT NULL,
  `ins_po` enum('1','0') NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pms_pr_con`
--

INSERT INTO `pms_pr_con` (`pr_id`, `pr_no`, `req_item_id`, `est_unit_cost`, `est_cost`, `ins_po`) VALUES
(1, 1, 5, 8000, 16000, '1'),
(2, 2, 6, 30000, 60000, '0'),
(3, 3, 2, 200, 200, '1'),
(4, 3, 3, 400, 800, '1'),
(5, 3, 4, 200, 800, '1'),
(6, 4, 10, 10, 40, '0'),
(7, 4, 11, 450, 2250, '0'),
(8, 4, 12, 500, 1000, '0'),
(9, 5, 7, 1, 5, '1'),
(10, 5, 8, 2, 2, '1'),
(11, 5, 9, 3, 30, '1'),
(12, 6, 13, 500, 500, '1'),
(13, 6, 14, 50, 100, '1'),
(14, 7, 15, 17500, 105000, '1'),
(15, 8, 16, 20, 60, '1'),
(16, 8, 17, 25, 75, '1'),
(17, 9, 18, 500, 1000, '1'),
(18, 10, 19, 20, 80, '1'),
(19, 10, 20, 60, 120, '1'),
(20, 10, 21, 55, 110, '1'),
(21, 11, 22, 125, 250, '1'),
(22, 11, 23, 60, 120, '1'),
(23, 12, 26, 50, 150, '0'),
(24, 12, 27, 300, 600, '0'),
(25, 12, 28, 30, 150, '0'),
(26, 13, 29, 70, 140, '0'),
(27, 13, 30, 400, 800, '0'),
(28, 14, 24, 10000, 20000, '0'),
(29, 14, 25, 10000, 10000, '0'),
(30, 15, 37, 30000, 60000, '0'),
(31, 16, 38, 500, 500, '0'),
(32, 16, 39, 500, 500, '0');

-- --------------------------------------------------------

--
-- Table structure for table `pms_ris`
--

CREATE TABLE IF NOT EXISTS `pms_ris` (
  `ris_no` int(10) unsigned NOT NULL,
  `emp_No` int(10) unsigned NOT NULL,
  `req_date` date NOT NULL,
  `req_status` enum('Pending','Denied','Approved') NOT NULL DEFAULT 'Pending',
  `remarks` varchar(100) DEFAULT NULL,
  `ris_update_date` date NOT NULL,
  `reason` text NOT NULL,
  `ris_seen` enum('0','1') DEFAULT '0',
  `ris_admin_seen` enum('1','0') NOT NULL DEFAULT '0',
  `ris_sp_seen` enum('1','0') NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pms_ris`
--

INSERT INTO `pms_ris` (`ris_no`, `emp_No`, `req_date`, `req_status`, `remarks`, `ris_update_date`, `reason`, `ris_seen`, `ris_admin_seen`, `ris_sp_seen`) VALUES
(1, 5287126, '2018-04-03', 'Denied', NULL, '0000-00-00', 'For clinic', '0', '1', '0'),
(2, 5231607, '2018-04-03', 'Approved', NULL, '0000-00-00', 'For Intrams 2018', '1', '1', '0'),
(3, 4743128, '2018-04-03', 'Approved', NULL, '0000-00-00', 'For ICT room', '0', '1', '0'),
(4, 50011250, '2018-04-03', 'Approved', NULL, '0000-00-00', 'For record keeping', '0', '1', '0'),
(5, 5287126, '2018-04-03', 'Approved', NULL, '0000-00-00', 'For Clinic', '0', '1', '0'),
(6, 50011250, '2018-04-03', 'Approved', NULL, '0000-00-00', 'For records', '0', '1', '0'),
(7, 5231607, '2018-04-03', 'Approved', NULL, '0000-00-00', 'Room usage', '1', '1', '0'),
(8, 5231607, '2018-04-04', 'Approved', NULL, '0000-00-00', 'equipment for computer laboratory', '0', '1', '0'),
(9, 5231607, '2018-04-04', 'Approved', NULL, '0000-00-00', 'For BMI', '0', '1', '0'),
(10, 5231607, '2018-04-04', 'Approved', NULL, '0000-00-00', 'For monitoring  of the weight of the athletes', '0', '1', '0'),
(11, 5231607, '2018-04-04', 'Approved', NULL, '0000-00-00', 'For lesson plan', '0', '1', '0'),
(12, 5287126, '2018-04-04', 'Approved', NULL, '0000-00-00', 'For protection', '0', '1', '0'),
(13, 5201107, '2018-04-04', 'Approved', NULL, '0000-00-00', 'For Nutrition Month Celebration', '0', '1', '0'),
(14, 5201107, '2018-04-04', 'Approved', NULL, '0000-00-00', 'For visual competition', '0', '1', '0'),
(15, 5201107, '2018-04-04', 'Approved', NULL, '0000-00-00', 'For planting', '0', '1', '0'),
(16, 4567891, '2018-04-04', 'Approved', NULL, '0000-00-00', 'For geography activity', '0', '1', '0'),
(17, 4567891, '2018-04-04', 'Denied', NULL, '0000-00-00', 'For independence day celebration', '0', '1', '0'),
(18, 50011255, '2018-04-04', 'Pending', NULL, '0000-00-00', 'For records', '0', '1', '0'),
(19, 50011249, '2018-04-04', 'Approved', NULL, '0000-00-00', 'For records of procuement', '0', '1', '0'),
(20, 5231607, '2018-04-04', 'Approved', NULL, '0000-00-00', 'intrams', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `pms_ris_req`
--

CREATE TABLE IF NOT EXISTS `pms_ris_req` (
  `req_item_id` int(10) unsigned NOT NULL,
  `req_item` varchar(200) NOT NULL,
  `req_desc` varchar(200) NOT NULL,
  `req_unit` enum('Piece','Ream','Box','Can','Unit','Bundle','Roll') NOT NULL,
  `req_qty` int(10) unsigned NOT NULL,
  `ris_no` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pms_ris_req`
--

INSERT INTO `pms_ris_req` (`req_item_id`, `req_item`, `req_desc`, `req_unit`, `req_qty`, `ris_no`) VALUES
(1, 'Stethoscope', 'Good Life', 'Piece', 2, 1),
(2, 'Volleyball net', '3m x 8m', 'Piece', 1, 2),
(3, 'Basketball', 'Rubber', 'Piece', 2, 2),
(4, 'Chess Board', 'Official Size', 'Piece', 4, 2),
(5, 'Projector', 'Epson', 'Unit', 2, 3),
(6, 'Personal Computer', 'i3', 'Unit', 2, 4),
(7, 'Cotton', 'Balls', 'Box', 5, 5),
(8, 'Alcohol', '300mL box', 'Box', 1, 5),
(9, 'Betadine', '25mL', 'Piece', 10, 5),
(10, 'Divider', 'Folder', 'Piece', 4, 6),
(11, 'Clear Book', 'Long', 'Piece', 5, 6),
(12, 'Bond Paper', 'Long', 'Ream', 2, 6),
(13, 'Emergency Light', 'Firefly', 'Piece', 1, 7),
(14, 'Feather Duster', 'Colored', 'Piece', 2, 7),
(15, 'Laptop', 'Acer', 'Unit', 6, 8),
(16, 'Measuring tape', 'White', 'Piece', 3, 9),
(17, 'Chalk', 'White', 'Box', 3, 9),
(18, 'Weighing Scale', 'Digital', 'Piece', 2, 10),
(19, 'Record book', 'Long', 'Piece', 4, 11),
(20, 'Ballpen', 'Red', 'Box', 2, 11),
(21, 'Ballpen', 'Black', 'Box', 2, 11),
(22, 'Face Mask', 'Regular', 'Bundle', 2, 12),
(23, 'Glove', 'Plastic', 'Bundle', 2, 12),
(24, 'Stove', 'Electric', 'Unit', 2, 13),
(25, 'Oven', 'Microwave', 'Unit', 1, 13),
(26, 'T-square', 'Plastic', 'Piece', 3, 14),
(27, 'Canvass', '2m x 2m', 'Piece', 2, 14),
(28, 'Paint', 'Acrylic Black', 'Piece', 5, 14),
(29, 'Shovel', 'Hand', 'Piece', 2, 15),
(30, 'Rake', 'Small', 'Unit', 2, 15),
(31, 'Globe', 'Small', 'Piece', 2, 16),
(32, 'Map', 'World', 'Piece', 2, 16),
(33, 'Manila Paper', 'Yellow', 'Piece', 10, 17),
(34, 'Flag', 'Philippine', 'Piece', 5, 17),
(35, 'Log Book', 'Large', 'Piece', 5, 18),
(36, 'Ballpen', 'Black', 'Box', 1, 18),
(37, 'Personal Computer', 'i3', 'Unit', 2, 19),
(38, 'net', 'basketaball', 'Piece', 1, 20),
(39, 'soccerball', 'official size', 'Piece', 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `pms_supplier`
--

CREATE TABLE IF NOT EXISTS `pms_supplier` (
  `company_id` int(10) unsigned NOT NULL,
  `company_name` varchar(45) NOT NULL,
  `sup_address` varchar(45) NOT NULL,
  `sup_contact` varchar(14) NOT NULL,
  `supp_status` enum('Active','Inactive') DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pms_supplier`
--

INSERT INTO `pms_supplier` (`company_id`, `company_name`, `sup_address`, `sup_contact`, `supp_status`) VALUES
(1, 'Lucky Educational Supplies', 'Legazpi City', '0909123568', 'Active'),
(2, 'Department of Budget and Management', 'Legazpi CIty', '(052) 888 0987', 'Active'),
(3, 'Jebson', 'Daraga Albay', '(052)765 2434', 'Active'),
(4, 'Octagon', 'Legazpi City', '(052)123 4567', 'Active'),
(5, 'Acer', 'Legazpi City', '09576878988', 'Active'),
(6, 'JMB Albay Gadgets', 'Old Albay, Legazpi CIty', '468-172-000', 'Active'),
(7, 'Ibalon Education Supply & Gen Merch', 'Legazpi City', '999909124900', 'Active'),
(8, 'Winson Educational Supply', 'Daraga, Albay', '098765098', 'Active'),
(9, 'Citi Hardware', 'Old Albay, Legazpi City', '09876547654', 'Active'),
(10, 'The Hardware Depot', 'Legazpi City', '09876543321', 'Active'),
(11, 'FJM Construction Supply & Gen Merch', 'Washington Drive, Legazpi City', '(052)481 0304', 'Active'),
(12, 'Roberts Gen Merchandise', 'Imperial St., Legazpi City', '(052) 480 642', 'Active'),
(13, 'Asiatic Merchandise Co.', 'Brgy. Oro Site, Legazpi City', '(052) 480 8118', 'Active'),
(14, 'Ercon Lumber and Gen Merch', 'Regidor St, Daraga, Albay', '9876541234', 'Active'),
(15, 'Botica Mica', 'Sagpon, Daraga, Albay', '0975434567', 'Active'),
(16, 'De Luxxe Medical Supplies', 'Sagpon, Daraga, Albay', '9456789865', 'Active'),
(17, 'Denvers Computer Shop', 'Legazpi City', '09473862979', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `prs_add_info`
--

CREATE TABLE IF NOT EXISTS `prs_add_info` (
  `info_id` int(10) unsigned NOT NULL,
  `spouse_name` varchar(45) DEFAULT NULL,
  `career_status` enum('Employed','Unemployed','---') NOT NULL,
  `no_of_dependents` varchar(45) NOT NULL,
  `Q1` varchar(45) NOT NULL,
  `Q2` varchar(45) NOT NULL,
  `register` enum('Registered','Not Registered') NOT NULL,
  `emp_no` int(10) unsigned NOT NULL,
  `civil_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prs_add_info`
--

INSERT INTO `prs_add_info` (`info_id`, `spouse_name`, `career_status`, `no_of_dependents`, `Q1`, `Q2`, `register`, `emp_no`, `civil_id`) VALUES
(1, NULL, 'Employed', '1', '', '', 'Registered', 5501298, 1),
(2, 'Acosta, Lea V', 'Employed', '2', 'No', 'No', 'Registered', 5309127, 2),
(3, NULL, 'Employed', '1', '', '', 'Registered', 5110945, 1),
(5, NULL, 'Employed', '2', '', '', 'Registered', 50011252, 1),
(6, NULL, 'Employed', '0', '', '', 'Registered', 5002157, 1),
(7, NULL, 'Employed', '0', '', '', 'Registered', 5166431, 1),
(8, NULL, 'Employed', '0', '', '', 'Registered', 5143417, 1),
(9, NULL, 'Employed', '3', '', '', 'Registered', 5756153, 1),
(10, NULL, 'Employed', '0', '', '', 'Registered', 50011251, 1),
(11, NULL, 'Employed', '0', '', '', 'Registered', 50011254, 1),
(12, NULL, 'Employed', '0', '', '', 'Registered', 50011249, 1),
(13, NULL, 'Employed', '0', '', '', 'Registered', 5287126, 1),
(14, NULL, 'Employed', '0', '', '', 'Registered', 5566126, 1),
(15, NULL, 'Employed', '0', '', '', 'Registered', 5880365, 1),
(16, NULL, 'Employed', '0', '', '', 'Registered', 5902312, 1),
(17, NULL, 'Employed', '0', '', '', 'Registered', 4743128, 1),
(18, NULL, 'Employed', '0', '', '', 'Registered', 50011250, 1),
(19, NULL, 'Employed', '0', '', '', 'Registered', 50011253, 1),
(20, NULL, 'Employed', '0', '', '', 'Registered', 5432123, 1),
(21, NULL, 'Employed', '0', '', '', 'Registered', 5231607, 1),
(22, NULL, 'Employed', '0', '', '', 'Registered', 5201107, 1),
(23, NULL, 'Employed', '0', '', '', 'Registered', 4990054, 1),
(24, NULL, 'Employed', '0', '', '', 'Registered', 5000129, 1),
(25, NULL, 'Employed', '0', '', '', 'Registered', 4990111, 1),
(26, NULL, 'Employed', '0', '', '', 'Registered', 5412398, 1),
(27, NULL, 'Employed', '1', '', '', 'Registered', 5513092, 1),
(28, NULL, 'Employed', '0', '', '', 'Registered', 4912093, 1),
(29, NULL, 'Employed', '1', '', '', 'Registered', 5901112, 1),
(30, NULL, 'Employed', '1', '', '', 'Registered', 50011255, 1),
(31, NULL, 'Employed', '1', '', '', 'Registered', 5677342, 1),
(32, NULL, 'Employed', '1', '', '', 'Registered', 5001094, 1),
(33, NULL, 'Employed', '0', '', '', 'Registered', 50011248, 1),
(34, NULL, 'Employed', '0', '', '', 'Registered', 5221094, 1),
(35, NULL, 'Employed', '0', '', '', 'Registered', 4567891, 1),
(36, NULL, 'Employed', '1', '', '', 'Registered', 4901154, 1),
(37, NULL, 'Employed', '0', '', '', 'Registered', 5340912, 1),
(38, NULL, 'Employed', '0', '', '', 'Registered', 5400127, 1),
(39, NULL, 'Employed', '0', '', '', 'Registered', 5210011, 1),
(40, NULL, 'Employed', '0', '', '', 'Registered', 5353113, 1);

-- --------------------------------------------------------

--
-- Table structure for table `prs_allowance`
--

CREATE TABLE IF NOT EXISTS `prs_allowance` (
  `allowance_id` int(10) unsigned NOT NULL,
  `allowance` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prs_allowance`
--

INSERT INTO `prs_allowance` (`allowance_id`, `allowance`) VALUES
(1, '3500.00');

-- --------------------------------------------------------

--
-- Table structure for table `prs_charges`
--

CREATE TABLE IF NOT EXISTS `prs_charges` (
  `charges_id` int(10) unsigned NOT NULL,
  `ch_amount` decimal(10,4) DEFAULT NULL,
  `emp_No` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prs_civil_status`
--

CREATE TABLE IF NOT EXISTS `prs_civil_status` (
  `civil_id` int(10) unsigned NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prs_civil_status`
--

INSERT INTO `prs_civil_status` (`civil_id`, `status`) VALUES
(1, 'Single'),
(2, 'Married'),
(3, 'Widowed');

-- --------------------------------------------------------

--
-- Table structure for table `prs_deduction`
--

CREATE TABLE IF NOT EXISTS `prs_deduction` (
  `deduction_id` int(10) unsigned NOT NULL,
  `late` decimal(10,2) DEFAULT NULL,
  `emp_No` int(10) unsigned NOT NULL,
  `gsis_id` int(10) unsigned DEFAULT NULL,
  `charges_id` int(10) unsigned DEFAULT NULL,
  `tax_id` int(10) unsigned NOT NULL,
  `philhealth_id` int(10) unsigned DEFAULT NULL,
  `pagibig_id` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prs_dtr_rec`
--

CREATE TABLE IF NOT EXISTS `prs_dtr_rec` (
  `id` int(11) NOT NULL,
  `personnel` varchar(45) NOT NULL,
  `personnel_id` varchar(45) NOT NULL,
  `date` varchar(45) NOT NULL,
  `department` varchar(45) NOT NULL,
  `absent_day` varchar(45) NOT NULL,
  `afl_day` varchar(45) NOT NULL,
  `out_day` varchar(45) NOT NULL,
  `onduty_day` varchar(45) NOT NULL,
  `ot_workday` varchar(45) NOT NULL,
  `ot_holiday` varchar(45) NOT NULL,
  `late_times` varchar(45) NOT NULL,
  `late_min` varchar(45) NOT NULL,
  `le_times` varchar(45) NOT NULL,
  `le_min` varchar(45) NOT NULL,
  `date_import` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prs_dtr_rec`
--

INSERT INTO `prs_dtr_rec` (`id`, `personnel`, `personnel_id`, `date`, `department`, `absent_day`, `afl_day`, `out_day`, `onduty_day`, `ot_workday`, `ot_holiday`, `late_times`, `late_min`, `le_times`, `le_min`, `date_import`) VALUES
(61, 'Roger Ponce Abitria', '5513092', '', 'English Department', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2018-03-03 15:41:17'),
(62, 'Patrick Herrera Acosta', '50011248', '', 'Mathematics Department', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2018-03-03 15:41:17'),
(63, 'Leo Villar Acosta', '5309127', '', 'Economics Department', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2018-03-03 15:41:17'),
(64, 'Francis Barrera Acosta', '5501298', '', 'Values Education Department', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2018-03-03 15:41:17'),
(65, 'Dylan Llanco Anderson', '5110945', '', 'Values Education', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2018-03-03 15:41:17'),
(66, 'MJ Balmedina', '50011255', '', 'Science Department', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2018-03-03 15:41:17'),
(67, 'Hannah Bonina', '5002157', '', 'MAPEH Department', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2018-03-03 15:41:17'),
(68, 'Lyka Ricardo Brutas', '5001094', '', 'Mathematics Department', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2018-03-03 15:41:17'),
(69, 'Mariel Cerino Casaul', '5400127', '', 'Araling Panlipunan Department', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2018-03-03 15:41:17'),
(70, 'Savannah Lopez Casin', '4912093', '', 'English Department', '', '', '', '', '', '', '1', '2', '', '', '2018-03-03 15:41:17'),
(71, 'Lea Abay Cerino', '5166431', '', 'Economics Department', '', '', '', '', '', '', '1', '2', '', '', '2018-03-03 15:41:17'),
(72, 'Rizza Avila de los Santos', '5353113', '', 'TLE Department', '', '', '', '', '', '', '1', '2', '', '', '2018-03-03 15:41:17'),
(73, 'Juan Lopez Dela Cruz', '5756153', '', 'TLE Department', '', '', '', '', '', '', '1', '2', '', '', '2018-03-03 15:41:17'),
(74, 'Armie Fernandez Herrera', '5287126', '', 'Araling Panlipunan Department', '', '', '', '', '', '', '1', '2', '', '', '2018-03-03 15:41:17'),
(75, 'Vincent Velasquez Hidalgo', '5566126', '', 'Mathematics Department', '', '', '', '', '', '', '1', '2', '', '', '2018-03-03 15:41:17'),
(76, 'Adrianna Cooper Lima', '5880365', '', 'Araling Panlipunan Department', '', '', '', '', '', '', '1', '2', '', '', '2018-03-03 15:41:17'),
(77, 'Vincent Reyes Llanco', '4567891', '', 'Araling Panlipunan Department', '', '', '', '', '', '', '2', '2', '', '', '2018-03-03 15:41:17'),
(78, 'Michael Herras Llona', '4901154', '', 'Values Education Department', '', '', '', '', '', '', '2', '1', '', '', '2018-03-03 15:41:17'),
(79, 'Mark Angelo Lobete', '5902312', '', 'Filipino Department', '', '', '', '', '', '', '1', '2', '', '', '2018-03-03 15:41:17'),
(80, 'Joseph Bueno Ludovice', '4743128', '', 'English Department', '', '', '', '', '', '', '1', '2', '', '', '2018-03-03 15:41:18'),
(81, 'Roger Ponce Abitria', '5513092', '', 'English Department', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2018-04-04 10:13:43'),
(82, 'Patrick Herrera Acosta', '50011248', '', 'Mathematics Department', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2018-04-04 10:13:43'),
(83, 'Leo Villar Acosta', '5309127', '', 'Economics Department', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2018-04-04 10:13:43'),
(84, 'Francis Barrera Acosta', '5501298', '', 'Values Education Department', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2018-04-04 10:13:43'),
(85, 'Dylan Llanco Anderson', '5110945', '', 'Values Education', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2018-04-04 10:13:43'),
(86, 'MJ Balmedina', '50011255', '', 'Science Department', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2018-04-04 10:13:43'),
(87, 'Hannah Bonina', '5002157', '', 'MAPEH Department', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2018-04-04 10:13:43'),
(88, 'Lyka Ricardo Brutas', '5001094', '', 'Mathematics Department', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2018-04-04 10:13:43'),
(89, 'Mariel Cerino Casaul', '5400127', '', 'Araling Panlipunan Department', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2018-04-04 10:13:43'),
(90, 'Savannah Lopez Casin', '4912093', '', 'English Department', '', '', '', '', '', '', '1', '2', '', '', '2018-04-04 10:13:43'),
(91, 'Lea Abay Cerino', '5166431', '', 'Economics Department', '', '', '', '', '', '', '1', '2', '', '', '2018-04-04 10:13:43'),
(92, 'Rizza Avila de los Santos', '5353113', '', 'TLE Department', '', '', '', '', '', '', '1', '2', '', '', '2018-04-04 10:13:44'),
(93, 'Juan Lopez Dela Cruz', '5756153', '', 'TLE Department', '', '', '', '', '', '', '1', '2', '', '', '2018-04-04 10:13:44'),
(94, 'Armie Fernandez Herrera', '5287126', '', 'Araling Panlipunan Department', '', '', '', '', '', '', '1', '2', '', '', '2018-04-04 10:13:44'),
(95, 'Vincent Velasquez Hidalgo', '5566126', '', 'Mathematics Department', '', '', '', '', '', '', '1', '2', '', '', '2018-04-04 10:13:44'),
(96, 'Adrianna Cooper Lima', '5880365', '', 'Araling Panlipunan Department', '', '', '', '', '', '', '1', '2', '', '', '2018-04-04 10:13:44'),
(97, 'Vincent Reyes Llanco', '4567891', '', 'Araling Panlipunan Department', '', '', '', '', '', '', '2', '2', '', '', '2018-04-04 10:13:44'),
(98, 'Michael Herras Llona', '4901154', '', 'Values Education Department', '', '', '', '', '', '', '2', '1', '', '', '2018-04-04 10:13:44'),
(99, 'Mark Angelo Lobete', '5902312', '', 'Filipino Department', '', '', '', '', '', '', '1', '2', '', '', '2018-04-04 10:13:44'),
(100, 'Joseph Bueno Ludovice', '4743128', '', 'English Department', '', '', '', '', '', '', '1', '2', '', '', '2018-04-04 10:13:44');

-- --------------------------------------------------------

--
-- Table structure for table `prs_grade`
--

CREATE TABLE IF NOT EXISTS `prs_grade` (
  `grade_id` int(10) unsigned NOT NULL,
  `grade` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prs_grade`
--

INSERT INTO `prs_grade` (`grade_id`, `grade`) VALUES
(1, 'GRADE 1'),
(2, 'GRADE 2'),
(3, 'GRADE 3'),
(4, 'GRADE 4'),
(5, 'GRADE 5'),
(6, 'GRADE 6'),
(7, 'GRADE 7'),
(8, 'GRADE 8'),
(9, 'GRADE 9'),
(10, 'GRADE 10'),
(11, 'GRADE 11'),
(12, 'GRADE 12'),
(13, 'GRADE 13'),
(14, 'GRADE 14'),
(15, 'GRADE 15'),
(16, 'GRADE 16'),
(17, 'GRADE 17'),
(18, 'GRADE 18'),
(19, 'GRADE 19'),
(20, 'GRADE 20'),
(21, 'GRADE 21'),
(22, 'GRADE 22'),
(23, 'GRADE 23'),
(24, 'GRADE 24'),
(25, 'GRADE 25'),
(26, 'GRADE 26'),
(27, 'GRADE 27'),
(28, 'GRADE 28'),
(29, 'GRADE 29'),
(30, 'GRADE 30'),
(31, 'GRADE 31'),
(32, 'GRADE 32'),
(33, 'GRADE 33');

-- --------------------------------------------------------

--
-- Table structure for table `prs_gsis`
--

CREATE TABLE IF NOT EXISTS `prs_gsis` (
  `gsis_id` int(10) unsigned NOT NULL,
  `gsis_percentage` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prs_gsis`
--

INSERT INTO `prs_gsis` (`gsis_id`, `gsis_percentage`) VALUES
(1, '9');

-- --------------------------------------------------------

--
-- Table structure for table `prs_loan`
--

CREATE TABLE IF NOT EXISTS `prs_loan` (
  `loan_id` int(10) unsigned NOT NULL,
  `loan_name` varchar(45) DEFAULT NULL,
  `loan_amount` decimal(10,2) NOT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `loan_status` enum('ONGOING','PAID') NOT NULL,
  `emp_no` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prs_loan`
--

INSERT INTO `prs_loan` (`loan_id`, `loan_name`, `loan_amount`, `date_start`, `date_end`, `loan_status`, `emp_no`) VALUES
(1, 'CALAMITY LOAN', '250.00', '2018-01-11', '2018-06-21', 'ONGOING', 5513092),
(2, 'EA Rural Bank Inc', '100.00', '2018-01-02', '2018-06-07', 'ONGOING', 5513092),
(4, 'Pagibig Loan', '950.00', '2018-02-24', '2018-03-24', 'PAID', 50011252),
(5, 'GSIS Loan', '500.00', '2018-02-24', '2018-03-24', 'PAID', 50011255),
(6, 'Pagibig Loan', '300.00', '2018-02-24', '2018-03-24', 'PAID', 5110945),
(7, 'GSIS Loan', '900.00', '2018-02-24', '2018-04-24', 'PAID', 5002157),
(8, 'Pagibig Loan', '600.00', '2018-02-24', '2018-03-24', 'PAID', 50011249),
(9, 'GSIS Loan', '500.00', '2018-02-24', '2018-04-24', 'PAID', 5287126),
(10, 'bank loan', '1000.00', '2018-05-09', '2020-05-12', 'ONGOING', 50011248),
(11, 'Conso Loan', '300.00', '2018-04-18', '2018-07-20', 'ONGOING', 50011248);

-- --------------------------------------------------------

--
-- Table structure for table `prs_loan_pay`
--

CREATE TABLE IF NOT EXISTS `prs_loan_pay` (
  `loan_report` int(10) unsigned NOT NULL,
  `pay_loan_name` varchar(25) NOT NULL,
  `pay_loan_amount` varchar(45) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `loan_status` varchar(45) NOT NULL,
  `pay_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `emp_no` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prs_loan_pay`
--

INSERT INTO `prs_loan_pay` (`loan_report`, `pay_loan_name`, `pay_loan_amount`, `date_start`, `date_end`, `loan_status`, `pay_date`, `emp_no`) VALUES
(1, 'bank loan', '1000.00', '2018-05-09', '2020-05-12', 'ONGOING', '2018-03-04 00:00:00', 50011248),
(2, 'Conso Loan', '300.00', '2018-04-18', '2018-07-20', 'ONGOING', '2018-03-04 00:00:00', 50011248),
(3, 'CALAMITY LOAN', '250.00', '2018-01-11', '2018-06-21', 'ONGOING', '2018-03-04 00:00:00', 5513092),
(4, 'EA Rural Bank Inc', '100.00', '2018-01-02', '2018-06-07', 'ONGOING', '2018-03-04 00:00:00', 5513092);

-- --------------------------------------------------------

--
-- Table structure for table `prs_mtr`
--

CREATE TABLE IF NOT EXISTS `prs_mtr` (
  `prs_attendance_id` int(10) unsigned NOT NULL,
  `emp_No` int(10) unsigned NOT NULL,
  `time_issued` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `monthly_cost` decimal(10,2) DEFAULT NULL,
  `time` int(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=178 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prs_mtr`
--

INSERT INTO `prs_mtr` (`prs_attendance_id`, `emp_No`, `time_issued`, `monthly_cost`, `time`) VALUES
(1, 5143417, '2018-01-17 20:02:38', '0.00', 0),
(2, 50011249, '2018-01-17 20:02:38', '0.00', 0),
(3, 5000129, '2018-01-17 20:02:38', '0.00', 0),
(4, 50011250, '2018-01-17 20:02:39', '0.00', 0),
(5, 50011251, '2018-01-17 20:02:39', '0.00', 0),
(6, 50011252, '2018-01-17 20:02:39', '0.00', 0),
(7, 50011253, '2018-01-17 20:02:39', '0.00', 0),
(8, 50011254, '2018-01-17 20:02:39', '0.00', 0),
(9, 4990111, '2018-01-17 20:02:47', '0.00', 0),
(10, 4743128, '2018-01-17 20:02:47', '0.00', 0),
(11, 4912093, '2018-01-17 20:02:47', '0.00', 0),
(12, 4990054, '2018-01-17 20:02:47', '0.00', 0),
(13, 5902312, '2018-01-17 20:02:47', '0.00', 0),
(14, 5566126, '2018-01-17 20:02:47', '0.00', 0),
(15, 5880365, '2018-01-17 20:02:48', '0.00', 0),
(16, 5287126, '2018-01-17 20:02:48', '0.00', 0),
(17, 5432123, '2018-01-17 20:02:48', '0.00', 0),
(18, 5412398, '2018-01-17 20:02:48', '0.00', 0),
(19, 5110945, '2018-01-17 20:02:48', '0.00', 0),
(20, 5501298, '2018-01-17 20:02:48', '0.00', 0),
(21, 5002157, '2018-01-17 20:02:48', '0.00', 0),
(22, 5231607, '2018-01-17 20:02:49', '0.00', 0),
(23, 5756153, '2018-01-17 20:02:49', '0.00', 0),
(24, 5201107, '2018-01-17 20:02:49', '0.00', 0),
(25, 5166431, '2018-01-17 20:02:49', '0.00', 0),
(26, 5309127, '2018-01-17 20:02:49', '0.00', 0),
(27, 5513092, '2018-01-17 20:02:49', '0.00', 0),
(28, 5901112, '2018-01-17 20:02:49', '0.00', 0),
(29, 4990111, '2018-02-17 20:04:11', '0.00', 0),
(30, 4743128, '2018-02-17 20:04:12', '0.00', 0),
(31, 4912093, '2018-02-17 20:04:12', '0.00', 0),
(32, 4990054, '2018-02-17 20:04:12', '0.00', 0),
(33, 5902312, '2018-02-17 20:04:12', '0.00', 0),
(34, 5566126, '2018-02-17 20:04:12', '0.00', 0),
(35, 5880365, '2018-02-17 20:04:12', '0.00', 0),
(36, 5287126, '2018-02-17 20:04:13', '0.00', 0),
(37, 5432123, '2018-02-17 20:04:13', '0.00', 0),
(38, 5412398, '2018-02-17 20:04:13', '0.00', 0),
(39, 5110945, '2018-02-17 20:04:13', '0.00', 0),
(40, 5501298, '2018-02-17 20:04:13', '0.00', 0),
(41, 5002157, '2018-02-17 20:04:13', '0.00', 0),
(42, 5231607, '2018-02-17 20:04:13', '0.00', 0),
(43, 5756153, '2018-02-17 20:04:13', '0.00', 0),
(44, 5201107, '2018-02-17 20:04:13', '0.00', 0),
(45, 5166431, '2018-02-17 20:04:13', '0.00', 0),
(46, 5309127, '2018-02-17 20:04:13', '0.00', 0),
(47, 5513092, '2018-02-17 20:04:14', '0.00', 0),
(48, 5901112, '2018-02-17 20:04:14', '0.00', 0),
(49, 4990111, '2018-02-17 20:04:22', '0.00', 0),
(50, 4743128, '2018-02-17 20:04:22', '0.00', 0),
(51, 4912093, '2018-02-17 20:04:22', '0.00', 0),
(52, 4990054, '2018-02-17 20:04:22', '0.00', 0),
(53, 5902312, '2018-02-17 20:04:22', '0.00', 0),
(54, 5566126, '2018-02-17 20:04:22', '0.00', 0),
(55, 5880365, '2018-02-17 20:04:22', '0.00', 0),
(56, 5287126, '2018-02-17 20:04:23', '0.00', 0),
(57, 5432123, '2018-02-17 20:04:23', '0.00', 0),
(58, 5412398, '2018-02-17 20:04:23', '0.00', 0),
(59, 5110945, '2018-02-17 20:04:23', '0.00', 0),
(60, 5501298, '2018-02-17 20:04:23', '0.00', 0),
(61, 5002157, '2018-02-17 20:04:23', '0.00', 0),
(62, 5231607, '2018-02-17 20:04:24', '0.00', 0),
(63, 5756153, '2018-02-17 20:04:24', '0.00', 0),
(64, 5201107, '2018-02-17 20:04:24', '0.00', 0),
(65, 5166431, '2018-02-17 20:04:24', '0.00', 0),
(66, 5309127, '2018-02-17 20:04:24', '0.00', 0),
(67, 5513092, '2018-02-17 20:04:24', '0.00', 0),
(68, 5901112, '2018-02-17 20:04:24', '0.00', 0),
(69, 4990111, '2018-03-17 20:05:22', '0.00', 0),
(70, 4743128, '2018-03-17 20:05:23', '0.00', 0),
(71, 4912093, '2018-03-17 20:05:23', '0.00', 0),
(72, 4990054, '2018-03-17 20:05:23', '0.00', 0),
(73, 5902312, '2018-03-17 20:05:23', '0.00', 0),
(74, 5566126, '2018-03-17 20:05:23', '0.00', 0),
(75, 5880365, '2018-03-17 20:05:23', '0.00', 0),
(76, 5287126, '2018-03-17 20:05:23', '0.00', 0),
(77, 5432123, '2018-03-17 20:05:23', '0.00', 0),
(78, 5412398, '2018-03-17 20:05:23', '0.00', 0),
(79, 5110945, '2018-03-17 20:05:23', '0.00', 0),
(80, 5501298, '2018-03-17 20:05:23', '0.00', 0),
(81, 5002157, '2018-03-17 20:05:24', '0.00', 0),
(82, 5231607, '2018-03-17 20:05:24', '0.00', 0),
(83, 5756153, '2018-03-17 20:05:24', '0.00', 0),
(84, 5201107, '2018-03-17 20:05:24', '0.00', 0),
(85, 5166431, '2018-03-17 20:05:24', '0.00', 0),
(86, 5309127, '2018-03-17 20:05:24', '0.00', 0),
(87, 5513092, '2018-03-17 20:05:24', '0.00', 0),
(88, 5901112, '2018-03-17 20:05:24', '0.00', 0),
(89, 4990111, '2018-03-17 20:05:30', '0.00', 0),
(90, 4743128, '2018-03-17 20:05:30', '0.00', 0),
(91, 4912093, '2018-03-17 20:05:30', '0.00', 0),
(92, 4990054, '2018-03-17 20:05:30', '0.00', 0),
(93, 5902312, '2018-03-17 20:05:31', '0.00', 0),
(94, 5566126, '2018-03-17 20:05:31', '0.00', 0),
(95, 5880365, '2018-03-17 20:05:31', '0.00', 0),
(96, 5287126, '2018-03-17 20:05:31', '0.00', 0),
(97, 5432123, '2018-03-17 20:05:31', '0.00', 0),
(98, 5412398, '2018-03-17 20:05:31', '0.00', 0),
(99, 5110945, '2018-03-17 20:05:31', '0.00', 0),
(100, 5501298, '2018-03-17 20:05:31', '0.00', 0),
(101, 5002157, '2018-03-17 20:05:31', '0.00', 0),
(102, 5231607, '2018-03-17 20:05:31', '0.00', 0),
(103, 5756153, '2018-03-17 20:05:31', '0.00', 0),
(104, 5201107, '2018-03-17 20:05:31', '0.00', 0),
(105, 5166431, '2018-03-17 20:05:31', '0.00', 0),
(106, 5309127, '2018-03-17 20:05:31', '0.00', 0),
(107, 5513092, '2018-03-17 20:05:32', '0.00', 0),
(108, 5901112, '2018-03-17 20:05:32', '0.00', 0),
(109, 4990111, '2018-04-17 20:06:06', '0.00', 0),
(110, 4743128, '2018-04-17 20:06:06', '0.00', 0),
(111, 4912093, '2018-04-17 20:06:06', '0.00', 0),
(112, 4990054, '2018-04-17 20:06:06', '0.00', 0),
(113, 5902312, '2018-04-17 20:06:06', '0.00', 0),
(114, 5566126, '2018-04-17 20:06:07', '0.00', 0),
(115, 5880365, '2018-04-17 20:06:07', '0.00', 0),
(116, 5287126, '2018-04-17 20:06:07', '0.00', 0),
(117, 5432123, '2018-04-17 20:06:07', '0.00', 0),
(118, 5412398, '2018-04-17 20:06:07', '0.00', 0),
(119, 5110945, '2018-04-17 20:06:07', '0.00', 0),
(120, 5501298, '2018-04-17 20:06:07', '0.00', 0),
(121, 5002157, '2018-04-17 20:06:07', '0.00', 0),
(122, 5231607, '2018-04-17 20:06:07', '0.00', 0),
(123, 5756153, '2018-04-17 20:06:07', '0.00', 0),
(124, 5201107, '2018-04-17 20:06:08', '0.00', 0),
(125, 5166431, '2018-04-17 20:06:08', '0.00', 0),
(126, 5309127, '2018-04-17 20:06:08', '0.00', 0),
(127, 5513092, '2018-04-17 20:06:08', '0.00', 0),
(128, 5901112, '2018-04-17 20:06:08', '0.00', 0),
(129, 4990111, '2018-04-17 20:06:21', '0.00', 0),
(130, 4743128, '2018-04-17 20:06:21', '0.00', 0),
(131, 4912093, '2018-04-17 20:06:21', '0.00', 0),
(132, 4990054, '2018-04-17 20:06:21', '0.00', 0),
(133, 5902312, '2018-04-17 20:06:21', '0.00', 0),
(134, 5566126, '2018-04-17 20:06:21', '0.00', 0),
(135, 5880365, '2018-04-17 20:06:21', '0.00', 0),
(136, 5287126, '2018-04-17 20:06:21', '0.00', 0),
(137, 5432123, '2018-04-17 20:06:21', '0.00', 0),
(138, 5412398, '2018-04-17 20:06:21', '0.00', 0),
(139, 5110945, '2018-04-17 20:06:22', '0.00', 0),
(140, 5501298, '2018-04-17 20:06:22', '0.00', 0),
(141, 5002157, '2018-04-17 20:06:22', '0.00', 0),
(142, 5231607, '2018-04-17 20:06:22', '0.00', 0),
(143, 5756153, '2018-04-17 20:06:22', '0.00', 0),
(144, 5201107, '2018-04-17 20:06:22', '0.00', 0),
(145, 5166431, '2018-04-17 20:06:22', '0.00', 0),
(146, 5309127, '2018-04-17 20:06:22', '0.00', 0),
(147, 5513092, '2018-04-17 20:06:22', '0.00', 0),
(148, 5901112, '2018-04-17 20:06:22', '0.00', 0),
(149, 4990111, '2018-05-08 21:25:21', '0.00', 0),
(150, 4743128, '2018-05-08 21:25:21', '0.00', 0),
(151, 4912093, '2018-05-08 21:25:22', '0.00', 0),
(152, 5902312, '2018-05-08 21:25:22', '0.00', 0),
(153, 5566126, '2018-05-08 21:25:22', '0.00', 0),
(154, 5880365, '2018-05-08 21:25:22', '0.00', 0),
(155, 4990054, '2018-05-08 21:25:22', '0.00', 0),
(156, 5287126, '2018-05-08 21:25:22', '0.00', 0),
(157, 5432123, '2018-05-08 21:25:23', '0.00', 0),
(158, 5412398, '2018-05-08 21:25:23', '0.00', 0),
(159, 5110945, '2018-05-08 21:25:23', '0.00', 0),
(160, 5501298, '2018-05-08 21:25:24', '0.00', 0),
(161, 5002157, '2018-05-08 21:25:24', '0.00', 0),
(162, 5231607, '2018-05-08 21:25:24', '0.00', 0),
(163, 5756153, '2018-05-08 21:25:24', '0.00', 0),
(164, 5201107, '2018-05-08 21:25:24', '0.00', 0),
(165, 5166431, '2018-05-08 21:25:25', '0.00', 0),
(166, 5309127, '2018-05-08 21:25:25', '0.00', 0),
(167, 50011252, '2018-05-08 21:25:26', '0.00', 0),
(168, 5513092, '2018-05-08 21:25:26', '0.00', 0),
(169, 5901112, '2018-05-08 21:25:26', '0.00', 0),
(170, 5400127, '2018-05-08 21:25:27', '0.00', 0),
(171, 5340912, '2018-05-08 21:25:27', '0.00', 0),
(172, 50011255, '2018-05-08 21:25:27', '0.00', 0),
(173, 50011248, '2018-05-08 21:25:27', '0.00', 0),
(174, 5353113, '2018-05-08 21:25:28', '0.00', 0),
(175, 5210011, '2018-05-08 21:25:28', '0.00', 0),
(176, 4567891, '2018-05-08 21:25:28', '0.00', 0),
(177, 4901154, '2018-05-08 21:25:28', '0.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `prs_pagibig`
--

CREATE TABLE IF NOT EXISTS `prs_pagibig` (
  `pagibig_id` int(10) unsigned NOT NULL,
  `pi_amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prs_pagibig`
--

INSERT INTO `prs_pagibig` (`pagibig_id`, `pi_amount`) VALUES
(1, '100.00');

-- --------------------------------------------------------

--
-- Table structure for table `prs_payslip`
--

CREATE TABLE IF NOT EXISTS `prs_payslip` (
  `payslip_id` int(10) unsigned NOT NULL,
  `Basic_pay` decimal(10,2) DEFAULT NULL,
  `allowance` decimal(10,2) DEFAULT NULL,
  `gross_pay` decimal(10,2) DEFAULT NULL,
  `Net_pay` decimal(10,2) DEFAULT NULL,
  `emp_No` int(10) unsigned NOT NULL,
  `deduction_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prs_philhealth`
--

CREATE TABLE IF NOT EXISTS `prs_philhealth` (
  `philhealth_id` int(10) unsigned NOT NULL,
  `ph_range_fr` decimal(10,2) DEFAULT NULL,
  `ph_range_to` decimal(10,2) DEFAULT NULL,
  `ph_salary_base` decimal(10,2) DEFAULT NULL,
  `ph_total_monthly_premium` decimal(10,2) DEFAULT NULL,
  `ph_employee_share` decimal(10,2) DEFAULT NULL,
  `ph_employee_share1` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prs_philhealth`
--

INSERT INTO `prs_philhealth` (`philhealth_id`, `ph_range_fr`, `ph_range_to`, `ph_salary_base`, `ph_total_monthly_premium`, `ph_employee_share`, `ph_employee_share1`) VALUES
(1, '0.00', '8999.99', '200.00', '100.00', '100.00', '100.00'),
(2, '9000.00', '9999.99', '9000.00', '225.00', '112.50', '112.50'),
(3, '10000.00', '10999.99', '10000.00', '250.00', '125.00', '125.00'),
(4, '11000.00', '11999.99', '11000.00', '275.00', '137.50', '137.50'),
(5, '12000.00', '12999.99', '12000.00', '300.00', '150.00', '150.00'),
(6, '13000.00', '13999.99', '13000.00', '325.00', '162.50', '162.50'),
(7, '14000.00', '14999.99', '14000.00', '350.00', '175.00', '175.00'),
(8, '15000.00', '15999.99', '15000.00', '375.00', '187.50', '187.50'),
(9, '16000.00', '16999.99', '16000.00', '400.00', '200.00', '200.00'),
(10, '17000.00', '17999.99', '17000.00', '425.00', '212.50', '212.50'),
(11, '18000.00', '18999.99', '18000.00', '450.00', '225.00', '225.00'),
(12, '19000.00', '19999.99', '19000.00', '475.00', '237.50', '237.50'),
(13, '20000.00', '29999.99', '20000.00', '500.00', '250.00', '250.00'),
(14, '21000.00', '21999.99', '21000.00', '525.00', '262.50', '261.50'),
(15, '22000.00', '22999.99', '22000.00', '550.00', '275.00', '275.50'),
(16, '23000.00', '23999.99', '23000.00', '575.00', '287.50', '287.50'),
(17, '24000.00', '24999.99', '24000.00', '600.00', '300.00', '300.00'),
(18, '25000.00', '25999.99', '25000.00', '625.00', '312.50', '312.50'),
(19, '26000.00', '26999.99', '26000.00', '650.00', '325.00', '325.00'),
(20, '27000.00', '27999.99', '27000.00', '675.00', '337.50', '337.50'),
(21, '28000.00', '28999.99', '28000.00', '700.00', '350.00', '350.00'),
(22, '29000.00', '29999.99', '29000.00', '725.00', '362.50', '362.50'),
(23, '30000.00', '30999.99', '30000.00', '800.00', '375.00', '375.00'),
(24, '31000.00', '31999.99', '31000.00', '825.00', '387.50', '387.50'),
(25, '32000.00', '32999.99', '32000.00', '850.00', '400.00', '400.00'),
(26, '33000.00', '33999.99', '33000.00', '875.00', '412.50', '412.50'),
(27, '34000.00', '34999.99', '34000.00', '900.00', '425.00', '425.00'),
(28, '35000.00', '200000.00', '35000.00', '875.00', '437.50', '437.50');

-- --------------------------------------------------------

--
-- Table structure for table `prs_ph_change`
--

CREATE TABLE IF NOT EXISTS `prs_ph_change` (
  `prs_change_id` int(10) unsigned NOT NULL,
  `change_range_fr` varchar(45) DEFAULT NULL,
  `change_range_to` varchar(45) DEFAULT NULL,
  `change_salary_base` varchar(45) DEFAULT NULL,
  `change_monthly_premium` varchar(45) DEFAULT NULL,
  `change_share` varchar(45) DEFAULT NULL,
  `change_share1` varchar(45) DEFAULT NULL,
  `change_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prs_report`
--

CREATE TABLE IF NOT EXISTS `prs_report` (
  `report_id` int(10) unsigned NOT NULL,
  `rep_basic_pay` decimal(10,2) DEFAULT NULL,
  `rep_allowance` decimal(10,2) DEFAULT NULL,
  `rep_gross_pay` decimal(10,2) DEFAULT NULL,
  `absent_cost` decimal(10,2) DEFAULT NULL,
  `rep_net_pay` decimal(10,2) DEFAULT NULL,
  `date_issued` date DEFAULT NULL,
  `total_ph` varchar(45) DEFAULT NULL,
  `rep_pi_total` decimal(10,2) DEFAULT NULL,
  `total_gsis` decimal(10,2) DEFAULT NULL,
  `total_tax` varchar(45) DEFAULT NULL,
  `emp_No` int(10) unsigned DEFAULT NULL,
  `total_deduction` decimal(10,2) DEFAULT NULL,
  `loan` decimal(10,2) NOT NULL,
  `report_sign` varchar(45) NOT NULL,
  `time_report_sign` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prs_report`
--

INSERT INTO `prs_report` (`report_id`, `rep_basic_pay`, `rep_allowance`, `rep_gross_pay`, `absent_cost`, `rep_net_pay`, `date_issued`, `total_ph`, `rep_pi_total`, `total_gsis`, `total_tax`, `emp_No`, `total_deduction`, `loan`, `report_sign`, `time_report_sign`) VALUES
(1, '22361.00', '3500.00', '25861.00', '0.00', '22434.71', '2018-03-04', '312.50', '100.00', '2327.49', '686.304', 50011249, '3426.29', '0.00', 'LastMonthSign', '2018-04-04 10:25:21'),
(2, '21868.00', '3500.00', '25368.00', '0.00', '22120.67', '2018-03-04', '312.50', '100.00', '2283.12', '551.715', 50011252, '3247.34', '0.00', 'LastMonthSign', '2018-04-04 10:25:21'),
(3, '21868.00', '3500.00', '25368.00', '0.00', '22120.67', '2018-03-04', '312.50', '100.00', '2283.12', '551.715', 50011253, '3247.34', '0.00', 'LastMonthSign', '2018-04-04 10:25:21'),
(4, '21387.00', '3500.00', '24887.00', '0.00', '20174.88', '2018-03-04', '300.00', '100.00', '2239.83', '2072.2925', 50011250, '4712.12', '0.00', 'LastMonthSign', '2018-04-04 10:25:21'),
(5, '36111.00', '3500.00', '39611.00', '0.00', '31105.96', '2018-03-04', '437.50', '100.00', '3564.99', '4402.554', 5143417, '8505.04', '0.00', 'LastMonthSign', '2018-04-04 10:25:22'),
(6, '16986.00', '3500.00', '20486.00', '42.68', '17208.70', '2018-03-04', '250.00', '100.00', '1843.74', '1083.565', 50011255, '3319.98', '0.00', 'LastMonthSign', '2018-04-04 10:25:22'),
(7, '21387.00', '3500.00', '24887.00', '0.00', '20174.88', '2018-03-04', '300.00', '100.00', '2239.83', '2072.2925', 50011254, '4712.12', '0.00', 'LastMonthSign', '2018-04-04 10:25:22'),
(8, '21626.00', '3500.00', '25126.00', '0.00', '21966.51', '2018-03-04', '312.50', '100.00', '2261.34', '485.649', 50011251, '3159.49', '0.00', 'LastMonthSign', '2018-04-04 10:25:22'),
(9, '32747.00', '3500.00', '36247.00', '0.00', '28963.09', '2018-03-04', '437.50', '100.00', '3262.23', '3484.182', 5221094, '7283.91', '0.00', 'LastMonthSign', '2018-04-04 10:25:22'),
(10, '26441.00', '3500.00', '29941.00', '62.38', '26198.67', '2018-03-04', '362.50', '100.00', '2694.69', '585.144', 5309127, '3804.71', '0.00', 'LastMonthSign', '2018-04-04 10:25:22'),
(11, '30396.00', '3500.00', '33896.00', '0.00', '27483.00', '2018-03-04', '412.50', '100.00', '3050.64', '2849.859', 5201107, '6413.00', '0.00', 'LastMonthSign', '2018-04-04 10:25:22'),
(12, '21387.00', '3500.00', '24887.00', '103.70', '20174.88', '2018-03-04', '300.00', '100.00', '2239.83', '2072.2925', 5756153, '4815.82', '0.00', 'LastMonthSign', '2018-04-04 10:25:22'),
(13, '26441.00', '3500.00', '29941.00', '62.38', '24998.67', '2018-03-04', '362.50', '100.00', '2694.69', '1785.144', 5110945, '5004.71', '0.00', 'LastMonthSign', '2018-04-04 10:25:22'),
(14, '23257.00', '3500.00', '26757.00', '0.00', '22996.71', '2018-03-04', '325.00', '100.00', '2408.13', '927.162', 4990054, '3760.29', '0.00', 'LastMonthSign', '2018-04-04 10:25:22'),
(15, '30044.00', '3500.00', '33544.00', '0.00', '27258.78', '2018-03-04', '412.50', '100.00', '3018.96', '2753.763', 5432123, '6285.22', '0.00', 'LastMonthSign', '2018-04-04 10:25:22'),
(16, '25290.00', '3500.00', '28790.00', '119.96', '24274.23', '2018-03-04', '350.00', '100.00', '2591.10', '1474.671', 4567891, '4635.73', '0.00', 'LastMonthSign', '2018-04-04 10:25:22'),
(17, '32215.00', '3500.00', '35715.00', '74.41', '28624.20', '2018-03-04', '437.50', '100.00', '3214.35', '3338.946', 5002157, '7165.20', '0.00', 'LastMonthSign', '2018-04-04 10:25:22'),
(18, '25573.00', '3500.00', '29073.00', '121.14', '24445.75', '2018-03-04', '362.50', '100.00', '2616.57', '1548.18', 5880365, '4748.39', '0.00', 'LastMonthSign', '2018-04-04 10:25:22'),
(19, '30751.00', '3500.00', '34251.00', '0.00', '27700.39', '2018-03-04', '425.00', '100.00', '3082.59', '2943.024', 5000129, '6550.61', '0.00', 'LastMonthSign', '2018-04-04 10:25:22'),
(20, '21626.00', '3500.00', '25126.00', '0.00', '21966.51', '2018-03-04', '312.50', '100.00', '2261.34', '485.649', 5231607, '3159.49', '0.00', 'LastMonthSign', '2018-04-04 10:25:22'),
(21, '23517.00', '3500.00', '27017.00', '112.57', '23153.58', '2018-03-04', '337.50', '100.00', '2431.53', '994.392', 4912093, '3975.99', '0.00', 'LastMonthSign', '2018-04-04 10:25:22'),
(22, '22113.00', '3500.00', '25613.00', '106.72', '22276.73', '2018-03-04', '312.50', '100.00', '2305.17', '618.6', 4743128, '3442.99', '0.00', 'LastMonthSign', '2018-04-04 10:25:23'),
(23, '25290.00', '3500.00', '28790.00', '119.96', '24274.23', '2018-03-04', '350.00', '100.00', '2591.10', '1474.671', 5400127, '4635.73', '0.00', 'LastMonthSign', '2018-04-04 10:25:23'),
(24, '23257.00', '3500.00', '26757.00', '111.49', '22996.71', '2018-03-04', '325.00', '100.00', '2408.13', '927.162', 5353113, '3871.78', '0.00', 'LastMonthSign', '2018-04-04 10:25:23'),
(25, '25290.00', '3500.00', '28790.00', '0.00', '24274.23', '2018-03-04', '350.00', '100.00', '2591.10', '1474.671', 5210011, '4515.77', '0.00', 'LastMonthSign', '2018-04-04 10:25:23'),
(26, '23257.00', '3500.00', '26757.00', '111.49', '22996.71', '2018-03-04', '325.00', '100.00', '2408.13', '927.162', 5287126, '3871.78', '0.00', 'LastMonthSign', '2018-04-04 10:25:23'),
(27, '27656.00', '3500.00', '31156.00', '64.91', '24845.12', '2018-03-04', '387.50', '100.00', '2804.04', '1719.339', 50011248, '6375.79', '0.00', 'LastMonthSign', '2018-04-04 10:25:23'),
(28, '21387.00', '3500.00', '24887.00', '0.00', '20174.88', '2018-03-04', '300.00', '100.00', '2239.83', '2072.2925', 4990111, '4712.12', '0.00', 'LastMonthSign', '2018-04-04 10:25:23'),
(29, '24047.00', '3500.00', '27547.00', '57.39', '23491.19', '2018-03-04', '337.50', '100.00', '2479.23', '1139.082', 5501298, '4113.20', '0.00', 'LastMonthSign', '2018-04-04 10:25:23'),
(30, '27656.00', '3500.00', '31156.00', '64.91', '25755.12', '2018-03-04', '387.50', '100.00', '2804.04', '2109.339', 5001094, '5465.79', '0.00', 'LastMonthSign', '2018-04-04 10:25:23'),
(31, '21868.00', '3500.00', '25368.00', '52.85', '21875.67', '2018-03-04', '312.50', '100.00', '2283.12', '446.715', 5513092, '3545.19', '0.00', 'LastMonthSign', '2018-04-04 10:25:23'),
(32, '23780.00', '3500.00', '27280.00', '113.67', '23321.11', '2018-03-04', '337.50', '100.00', '2455.20', '1066.191', 5902312, '4072.56', '0.00', 'LastMonthSign', '2018-04-04 10:25:23'),
(33, '23257.00', '3500.00', '26757.00', '0.00', '22996.71', '2018-03-04', '325.00', '100.00', '2408.13', '927.162', 5412398, '3760.29', '0.00', 'LastMonthSign', '2018-04-04 10:25:23'),
(34, '23257.00', '3500.00', '26757.00', '0.00', '22996.71', '2018-03-04', '325.00', '100.00', '2408.13', '927.162', 5340912, '3760.29', '0.00', 'LastMonthSign', '2018-04-04 10:25:23'),
(35, '30396.00', '3500.00', '33896.00', '0.00', '27483.00', '2018-03-04', '412.50', '100.00', '3050.64', '2849.859', 5901112, '6413.00', '0.00', 'LastMonthSign', '2018-04-04 10:25:23'),
(36, '25290.00', '3500.00', '28790.00', '59.98', '24274.23', '2018-03-04', '350.00', '100.00', '2591.10', '1474.671', 4901154, '4575.75', '0.00', 'LastMonthSign', '2018-04-04 10:25:24'),
(37, '34306.00', '3500.00', '37806.00', '157.53', '29956.17', '2018-03-04', '437.50', '100.00', '3402.54', '3909.789', 5166431, '8007.35', '0.00', 'LastMonthSign', '2018-04-04 10:25:24'),
(38, '21387.00', '3500.00', '24887.00', '103.70', '20174.88', '2018-03-04', '300.00', '100.00', '2239.83', '2072.2925', 5566126, '4815.82', '0.00', 'LastMonthSign', '2018-04-04 10:25:24'),
(39, '27656.00', '3500.00', '31156.00', '0.00', '25755.12', '2018-03-04', '387.50', '100.00', '2804.04', '2109.339', 5677342, '5400.88', '0.00', 'LastMonthSign', '2018-04-04 10:25:24');

-- --------------------------------------------------------

--
-- Table structure for table `prs_salary`
--

CREATE TABLE IF NOT EXISTS `prs_salary` (
  `salary_id` int(10) unsigned NOT NULL,
  `step` varchar(45) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `grade_id` int(10) unsigned DEFAULT NULL,
  `sal_memo_id` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1065 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prs_salary`
--

INSERT INTO `prs_salary` (`salary_id`, `step`, `amount`, `grade_id`, `sal_memo_id`) VALUES
(1, 'STEP 1', '9471.00', 1, 1),
(2, 'STEP 2', '9568.00', 1, 1),
(3, 'STEP 3', '9660.00', 1, 1),
(4, 'STEP 4', '9753.00', 1, 1),
(5, 'STEP 5', '9846.00', 1, 1),
(6, 'STEP 6', '9949.00', 1, 1),
(7, 'STEP 7', '10036.00', 1, 1),
(8, 'STEP 8', '10132.00', 1, 1),
(9, 'STEP 1', '10159.00', 2, 1),
(10, 'STEP 2', '10255.00', 2, 1),
(11, 'STEP 3', '10351.00', 2, 1),
(12, 'STEP 4', '10449.00', 2, 1),
(13, 'STEP 5', '10547.00', 2, 1),
(14, 'STEP 6', '10647.00', 2, 1),
(15, 'STEP 7', '10747.00', 2, 1),
(16, 'STEP 8', '10898.00', 2, 1),
(17, 'STEP 1', '10883.00', 3, 1),
(18, 'STEP 2', '10895.00', 3, 1),
(19, 'STEP 3', '11089.00', 3, 1),
(20, 'STEP 4', '11193.00', 3, 1),
(21, 'STEP 5', '11298.00', 3, 1),
(22, 'STEP 6', '11405.00', 3, 1),
(23, 'STEP 7', '11512.00', 3, 1),
(24, 'STEP 8', '11621.00', 3, 1),
(25, 'STEP 1', '11658.00', 4, 1),
(26, 'STEP 2', '11767.00', 4, 1),
(27, 'STEP 3', '11878.00', 4, 1),
(28, 'STEP 4', '11990.00', 4, 1),
(29, 'STEP 5', '12103.00', 4, 1),
(30, 'STEP 6', '12217.00', 4, 1),
(31, 'STEP 7', '12333.00', 4, 1),
(32, 'STEP 8', '12448.00', 4, 1),
(33, 'STEP 1', '9478.00', 1, 2),
(34, 'STEP 2', '9568.00', 1, 2),
(35, 'STEP 3', '9660.00', 1, 2),
(36, 'STEP 4', '9753.00', 1, 2),
(37, 'STEP 5', '9846.00', 1, 2),
(38, 'STEP 6', '9949.00', 1, 2),
(39, 'STEP 7', '10036.00', 1, 2),
(40, 'STEP 8', '10132.00', 1, 2),
(41, 'STEP 1', '10159.00', 2, 2),
(42, 'STEP 2', '10255.00', 2, 2),
(43, 'STEP 3', '10351.00', 2, 2),
(44, 'STEP 4', '10449.00', 2, 2),
(45, 'STEP 5', '10547.00', 2, 2),
(46, 'STEP 6', '10647.00', 2, 2),
(47, 'STEP 7', '10747.00', 2, 2),
(48, 'STEP 8', '10898.00', 2, 2),
(49, 'STEP 1', '10883.00', 3, 2),
(50, 'STEP 2', '10895.00', 3, 2),
(51, 'STEP 3', '11089.00', 3, 2),
(52, 'STEP 4', '11193.00', 3, 2),
(53, 'STEP 5', '11298.00', 3, 2),
(54, 'STEP 6', '11405.00', 3, 2),
(55, 'STEP 7', '11512.00', 3, 2),
(56, 'STEP 8', '11621.00', 3, 2),
(57, 'STEP 1', '11658.00', 4, 2),
(58, 'STEP 2', '11767.00', 4, 2),
(59, 'STEP 3', '11878.00', 4, 2),
(60, 'STEP 4', '11990.00', 4, 2),
(61, 'STEP 5', '12103.00', 4, 2),
(62, 'STEP 6', '12217.00', 4, 2),
(63, 'STEP 7', '12333.00', 4, 2),
(64, 'STEP 8', '12448.00', 4, 2),
(65, 'STEP 1', '9479.00', 1, 3),
(66, 'STEP 2', '9568.00', 1, 3),
(67, 'STEP 3', '9660.00', 1, 3),
(68, 'STEP 4', '9753.00', 1, 3),
(69, 'STEP 5', '9846.00', 1, 3),
(70, 'STEP 6', '9949.00', 1, 3),
(71, 'STEP 7', '10036.00', 1, 3),
(72, 'STEP 8', '10132.00', 1, 3),
(73, 'STEP 1', '10159.00', 2, 3),
(74, 'STEP 2', '10255.00', 2, 3),
(75, 'STEP 3', '10351.00', 2, 3),
(76, 'STEP 4', '10449.00', 2, 3),
(77, 'STEP 5', '10547.00', 2, 3),
(78, 'STEP 6', '10647.00', 2, 3),
(79, 'STEP 7', '10747.00', 2, 3),
(80, 'STEP 8', '10898.00', 2, 3),
(81, 'STEP 1', '10883.00', 3, 3),
(82, 'STEP 2', '10895.00', 3, 3),
(83, 'STEP 3', '11089.00', 3, 3),
(84, 'STEP 4', '11193.00', 3, 3),
(85, 'STEP 5', '11298.00', 3, 3),
(86, 'STEP 6', '11405.00', 3, 3),
(87, 'STEP 7', '11512.00', 3, 3),
(88, 'STEP 8', '11621.00', 3, 3),
(89, 'STEP 1', '11658.00', 4, 3),
(90, 'STEP 2', '11767.00', 4, 3),
(91, 'STEP 3', '11878.00', 4, 3),
(92, 'STEP 4', '11990.00', 4, 3),
(93, 'STEP 5', '12103.00', 4, 3),
(94, 'STEP 6', '12217.00', 4, 3),
(95, 'STEP 7', '12333.00', 4, 3),
(96, 'STEP 8', '12448.00', 4, 3),
(97, 'STEP 1', '9479.00', 1, 4),
(98, 'STEP 2', '9568.00', 1, 4),
(99, 'STEP 3', '9660.00', 1, 4),
(100, 'STEP 4', '9753.00', 1, 4),
(101, 'STEP 5', '9846.00', 1, 4),
(102, 'STEP 6', '9949.00', 1, 4),
(103, 'STEP 7', '10036.00', 1, 4),
(104, 'STEP 8', '10132.00', 1, 4),
(105, 'STEP 1', '10159.00', 2, 4),
(106, 'STEP 2', '10255.00', 2, 4),
(107, 'STEP 3', '10351.00', 2, 4),
(108, 'STEP 4', '10449.00', 2, 4),
(109, 'STEP 5', '10547.00', 2, 4),
(110, 'STEP 6', '10647.00', 2, 4),
(111, 'STEP 7', '10747.00', 2, 4),
(112, 'STEP 8', '10898.00', 2, 4),
(113, 'STEP 1', '10883.00', 3, 4),
(114, 'STEP 2', '10895.00', 3, 4),
(115, 'STEP 3', '11089.00', 3, 4),
(116, 'STEP 4', '11193.00', 3, 4),
(117, 'STEP 5', '11298.00', 3, 4),
(118, 'STEP 6', '11405.00', 3, 4),
(119, 'STEP 7', '11512.00', 3, 4),
(120, 'STEP 8', '11621.00', 3, 4),
(121, 'STEP 1', '11658.00', 4, 4),
(122, 'STEP 2', '11767.00', 4, 4),
(123, 'STEP 3', '11878.00', 4, 4),
(124, 'STEP 4', '11990.00', 4, 4),
(125, 'STEP 5', '12103.00', 4, 4),
(126, 'STEP 6', '12217.00', 4, 4),
(127, 'STEP 7', '12333.00', 4, 4),
(128, 'STEP 8', '12448.00', 4, 4),
(129, 'STEP 1', '12488.00', 5, 1),
(130, 'STEP 2', '12644.00', 5, 1),
(131, 'STEP 3', '12725.00', 5, 1),
(132, 'STEP 4', '12844.00', 5, 1),
(133, 'STEP 5', '12965.00', 5, 1),
(134, 'STEP 6', '13087.00', 5, 1),
(135, 'STEP 7', '13211.00', 5, 1),
(136, 'STEP 8', '13335.00', 5, 1),
(137, 'STEP 1', '13378.00', 6, 1),
(138, 'STEP 2', '13504.00', 6, 1),
(139, 'STEP 3', '13630.00', 6, 1),
(140, 'STEP 4', '13795.00', 6, 1),
(141, 'STEP 5', '13889.00', 6, 1),
(142, 'STEP 6', '14020.00', 6, 1),
(143, 'STEP 7', '14152.00', 6, 1),
(144, 'STEP 8', '14285.00', 6, 1),
(145, 'STEP 1', '14331.00', 7, 1),
(146, 'STEP 2', '14466.00', 7, 1),
(147, 'STEP 3', '14602.00', 7, 1),
(148, 'STEP 4', '14740.00', 7, 1),
(149, 'STEP 5', '14878.00', 7, 1),
(150, 'STEP 6', '15018.00', 7, 1),
(151, 'STEP 7', '15159.00', 7, 1),
(152, 'STEP 8', '15303.00', 7, 1),
(153, 'STEP 1', '15368.00', 8, 1),
(154, 'STEP 2', '15519.00', 8, 1),
(155, 'STEP 3', '15670.00', 8, 1),
(156, 'STEP 4', '15823.00', 8, 1),
(157, 'STEP 5', '15978.00', 8, 1),
(158, 'STEP 6', '16133.00', 8, 1),
(159, 'STEP 7', '16291.00', 8, 1),
(160, 'STEP 8', '16450.00', 8, 1),
(161, 'STEP 1', '16512.00', 9, 1),
(162, 'STEP 2', '16671.00', 9, 1),
(163, 'STEP 3', '16830.00', 9, 1),
(164, 'STEP 4', '16992.00', 9, 1),
(165, 'STEP 5', '17155.00', 9, 1),
(166, 'STEP 6', '17319.00', 9, 1),
(167, 'STEP 7', '17485.00', 9, 1),
(168, 'STEP 8', '17653.00', 9, 1),
(169, 'STEP 1', '17730.00', 10, 1),
(170, 'STEP 2', '17900.00', 10, 1),
(171, 'STEP 3', '18071.00', 10, 1),
(172, 'STEP 4', '18245.00', 10, 1),
(173, 'STEP 5', '18420.00', 10, 1),
(174, 'STEP 6', '18634.00', 10, 1),
(175, 'STEP 7', '18775.00', 10, 1),
(176, 'STEP 8', '18955.00', 10, 1),
(177, 'STEP 1', '19077.00', 11, 1),
(178, 'STEP 2', '19286.00', 11, 1),
(179, 'STEP 3', '19496.00', 11, 1),
(180, 'STEP 4', '19709.00', 11, 1),
(181, 'STEP 5', '19925.00', 11, 1),
(182, 'STEP 6', '20142.00', 11, 1),
(183, 'STEP 7', '20362.00', 11, 1),
(184, 'STEP 8', '20585.00', 11, 1),
(185, 'STEP 1', '20651.00', 12, 1),
(186, 'STEP 2', '20870.00', 12, 1),
(187, 'STEP 3', '21091.00', 12, 1),
(188, 'STEP 4', '21315.00', 12, 1),
(189, 'STEP 5', '21540.00', 12, 1),
(190, 'STEP 6', '21769.00', 12, 1),
(191, 'STEP 7', '21999.00', 12, 1),
(192, 'STEP 8', '22232.00', 12, 1),
(193, 'STEP 1', '22328.00', 13, 1),
(194, 'STEP 2', '22564.00', 13, 1),
(195, 'STEP 3', '22804.00', 13, 1),
(196, 'STEP 4', '23045.00', 13, 1),
(197, 'STEP 5', '23289.00', 13, 1),
(198, 'STEP 6', '23536.00', 13, 1),
(199, 'STEP 7', '23786.00', 13, 1),
(200, 'STEP 8', '24037.00', 13, 1),
(201, 'STEP 1', '24141.00', 14, 1),
(202, 'STEP 2', '24396.00', 14, 1),
(203, 'STEP 3', '24655.00', 14, 1),
(204, 'STEP 4', '24916.00', 14, 1),
(205, 'STEP 5', '25180.00', 14, 1),
(206, 'STEP 6', '25447.00', 14, 1),
(207, 'STEP 7', '25717.00', 14, 1),
(208, 'STEP 8', '25989.00', 14, 1),
(209, 'STEP 1', '26192.00', 15, 1),
(210, 'STEP 2', '26489.00', 15, 1),
(211, 'STEP 3', '26790.00', 15, 1),
(212, 'STEP 4', '27094.00', 15, 1),
(213, 'STEP 5', '27401.00', 15, 1),
(214, 'STEP 6', '27712.00', 15, 1),
(215, 'STEP 7', '28027.00', 15, 1),
(216, 'STEP 8', '28344.00', 15, 1),
(217, 'STEP 1', '28417.00', 16, 1),
(218, 'STEP 2', '28740.00', 16, 1),
(219, 'STEP 3', '29066.00', 16, 1),
(220, 'STEP 4', '29396.00', 16, 1),
(221, 'STEP 5', '29729.00', 16, 1),
(222, 'STEP 6', '30066.00', 16, 1),
(223, 'STEP 7', '30408.00', 16, 1),
(224, 'STEP 8', '30752.00', 16, 1),
(225, 'STEP 1', '30831.00', 17, 1),
(226, 'STEP 2', '31183.00', 17, 1),
(227, 'STEP 3', '31536.00', 17, 1),
(228, 'STEP 4', '31893.00', 17, 1),
(229, 'STEP 5', '32255.00', 17, 1),
(230, 'STEP 6', '32622.00', 17, 1),
(231, 'STEP 7', '32991.00', 17, 1),
(232, 'STEP 8', '33366.00', 17, 1),
(233, 'STEP 1', '33452.00', 18, 1),
(234, 'STEP 2', '33831.00', 18, 1),
(235, 'STEP 3', '34215.00', 18, 1),
(236, 'STEP 4', '34603.00', 18, 1),
(237, 'STEP 5', '34996.00', 18, 1),
(238, 'STEP 6', '35393.00', 18, 1),
(239, 'STEP 7', '35795.00', 18, 1),
(240, 'STEP 8', '36201.00', 18, 1),
(241, 'STEP 1', '36409.00', 19, 1),
(242, 'STEP 2', '36857.00', 19, 1),
(243, 'STEP 3', '37312.00', 19, 1),
(244, 'STEP 4', '37771.00', 19, 1),
(245, 'STEP 5', '38237.00', 19, 1),
(246, 'STEP 6', '38709.00', 19, 1),
(247, 'STEP 7', '39186.00', 19, 1),
(248, 'STEP 8', '39670.00', 19, 1),
(249, 'STEP 1', '39768.00', 20, 1),
(250, 'STEP 2', '40259.00', 20, 1),
(251, 'STEP 3', '40755.00', 20, 1),
(252, 'STEP 4', '41258.00', 20, 1),
(253, 'STEP 5', '41766.00', 20, 1),
(254, 'STEP 6', '42281.00', 20, 1),
(255, 'STEP 7', '42802.00', 20, 1),
(256, 'STEP 8', '43330.00', 20, 1),
(257, 'STEP 1', '43439.00', 21, 1),
(258, 'STEP 2', '43974.00', 21, 1),
(259, 'STEP 3', '44517.00', 21, 1),
(260, 'STEP 4', '45066.00', 21, 1),
(261, 'STEP 5', '45621.00', 21, 1),
(262, 'STEP 6', '46183.00', 21, 1),
(263, 'STEP 7', '46753.00', 21, 1),
(264, 'STEP 8', '47329.00', 21, 1),
(265, 'STEP 1', '47448.00', 22, 1),
(266, 'STEP 2', '48032.00', 22, 1),
(267, 'STEP 3', '48625.00', 22, 1),
(268, 'STEP 4', '49224.00', 22, 1),
(269, 'STEP 5', '49831.00', 22, 1),
(270, 'STEP 6', '50445.00', 22, 1),
(271, 'STEP 7', '51067.00', 22, 1),
(272, 'STEP 8', '51697.00', 22, 1),
(273, 'STEP 1', '51826.00', 23, 1),
(274, 'STEP 2', '52466.00', 23, 1),
(275, 'STEP 3', '53112.00', 23, 1),
(276, 'STEP 4', '53767.00', 23, 1),
(277, 'STEP 5', '54430.00', 23, 1),
(278, 'STEP 6', '55101.00', 23, 1),
(279, 'STEP 7', '55781.00', 23, 1),
(280, 'STEP 8', '56468.00', 23, 1),
(281, 'STEP 1', '56610.00', 24, 1),
(282, 'STEP 2', '57308.00', 24, 1),
(283, 'STEP 3', '58014.00', 24, 1),
(284, 'STEP 4', '58730.00', 24, 1),
(285, 'STEP 5', '59453.00', 24, 1),
(286, 'STEP 6', '60187.00', 24, 1),
(287, 'STEP 7', '60928.00', 24, 1),
(288, 'STEP 8', '61697.00', 24, 1),
(289, 'STEP 1', '67690.00', 26, 1),
(290, 'STEP 2', '68524.00', 26, 1),
(291, 'STEP 3', '69369.00', 26, 1),
(292, 'STEP 4', '70224.00', 26, 1),
(293, 'STEP 5', '71090.00', 26, 1),
(294, 'STEP 6', '71967.00', 26, 1),
(295, 'STEP 7', '72855.00', 26, 1),
(296, 'STEP 8', '73751.00', 26, 1),
(297, 'STEP 1', '73937.00', 27, 1),
(298, 'STEP 2', '74849.00', 27, 1),
(299, 'STEP 3', '75771.00', 27, 1),
(300, 'STEP 4', '76705.00', 27, 1),
(301, 'STEP 5', '77651.00', 27, 1),
(302, 'STEP 6', '78608.00', 27, 1),
(303, 'STEP 7', '79577.00', 27, 1),
(304, 'STEP 8', '80567.00', 27, 1),
(305, 'STEP 1', '80760.00', 28, 1),
(306, 'STEP 2', '81756.00', 28, 1),
(307, 'STEP 3', '82764.00', 28, 1),
(308, 'STEP 4', '83784.00', 28, 1),
(309, 'STEP 5', '84817.00', 28, 1),
(310, 'STEP 6', '85862.00', 28, 1),
(311, 'STEP 7', '86921.00', 28, 1),
(312, 'STEP 8', '87993.00', 28, 1),
(313, 'STEP 1', '88214.00', 29, 1),
(314, 'STEP 2', '89301.00', 29, 1),
(315, 'STEP 3', '90402.00', 29, 1),
(316, 'STEP 4', '91516.00', 29, 1),
(317, 'STEP 5', '92644.00', 29, 1),
(318, 'STEP 6', '93786.00', 29, 1),
(319, 'STEP 7', '94943.00', 29, 1),
(320, 'STEP 8', '96113.00', 29, 1),
(321, 'STEP 1', '96354.00', 30, 1),
(322, 'STEP 2', '97543.00', 30, 1),
(323, 'STEP 3', '98745.00', 30, 1),
(324, 'STEP 4', '99962.00', 30, 1),
(325, 'STEP 5', '101195.00', 30, 1),
(326, 'STEP 6', '102442.00', 30, 1),
(327, 'STEP 7', '103705.00', 30, 1),
(328, 'STEP 8', '104984.00', 30, 1),
(329, 'STEP 1', '117086.00', 31, 1),
(330, 'STEP 2', '118623.00', 31, 1),
(331, 'STEP 3', '120180.00', 31, 1),
(332, 'STEP 4', '121758.00', 31, 1),
(333, 'STEP 5', '123356.00', 31, 1),
(334, 'STEP 6', '124975.00', 31, 1),
(335, 'STEP 7', '126616.00', 31, 1),
(336, 'STEP 8', '128278.00', 31, 1),
(337, 'STEP 1', '135376.00', 32, 1),
(338, 'STEP 2', '137174.00', 32, 1),
(339, 'STEP 3', '138996.00', 32, 1),
(340, 'STEP 4', '140843.00', 32, 1),
(341, 'STEP 5', '142714.00', 32, 1),
(342, 'STEP 6', '144610.00', 32, 1),
(343, 'STEP 7', '146531.00', 32, 1),
(344, 'STEP 8', '148478.00', 32, 1),
(345, 'STEP 1', '160924.00', 33, 1),
(346, 'STEP 2', '165752.00', 33, 1),
(347, 'STEP 1', '61971.00', 25, 1),
(348, 'STEP 2', '62735.00', 25, 1),
(349, 'STEP 3', '63508.00', 25, 1),
(350, 'STEP 4', '64291.00', 25, 1),
(351, 'STEP 5', '65083.00', 25, 1),
(352, 'STEP 6', '65885.00', 25, 1),
(353, 'STEP 7', '66698.00', 25, 1),
(354, 'STEP 8', '67520.00', 25, 1),
(355, 'STEP 1', '12975.00', 5, 2),
(356, 'STEP 2', '13117.00', 5, 2),
(357, 'STEP 3', '13206.00', 5, 2),
(358, 'STEP 4', '13322.00', 5, 2),
(359, 'STEP 5', '13440.00', 5, 2),
(360, 'STEP 6', '13559.00', 5, 2),
(361, 'STEP 7', '13679.00', 5, 2),
(362, 'STEP 8', '13799.00', 5, 2),
(363, 'STEP 1', '13851.00', 6, 2),
(364, 'STEP 2', '13973.00', 6, 2),
(365, 'STEP 3', '14096.00', 6, 2),
(366, 'STEP 4', '14221.00', 6, 2),
(367, 'STEP 5', '14347.00', 6, 2),
(368, 'STEP 6', '14474.00', 6, 2),
(369, 'STEP 7', '14602.00', 6, 2),
(370, 'STEP 8', '14731.00', 6, 2),
(371, 'STEP 1', '14785.00', 7, 2),
(372, 'STEP 2', '14916.00', 7, 2),
(373, 'STEP 3', '15048.00', 7, 2),
(374, 'STEP 4', '15181.00', 7, 2),
(375, 'STEP 5', '15315.00', 7, 2),
(376, 'STEP 6', '15450.00', 7, 2),
(377, 'STEP 7', '15587.00', 7, 2),
(378, 'STEP 8', '15725.00', 7, 2),
(379, 'STEP 1', '15818.00', 8, 2),
(380, 'STEP 2', '15969.00', 8, 2),
(381, 'STEP 3', '16121.00', 8, 2),
(382, 'STEP 4', '16275.00', 8, 2),
(383, 'STEP 5', '16430.00', 8, 2),
(384, 'STEP 6', '16586.00', 8, 2),
(385, 'STEP 7', '16744.00', 8, 2),
(386, 'STEP 8', '16903.00', 8, 2),
(387, 'STEP 1', '16986.00', 9, 2),
(388, 'STEP 2', '17142.00', 9, 2),
(389, 'STEP 3', '17299.00', 9, 2),
(390, 'STEP 4', '17458.00', 9, 2),
(391, 'STEP 5', '17618.00', 9, 2),
(392, 'STEP 6', '17780.00', 9, 2),
(393, 'STEP 7', '17943.00', 9, 2),
(394, 'STEP 8', '18108.00', 9, 2),
(395, 'STEP 1', '18217.00', 10, 2),
(396, 'STEP 2', '18385.00', 10, 2),
(397, 'STEP 3', '18553.00', 10, 2),
(398, 'STEP 4', '18724.00', 10, 2),
(399, 'STEP 5', '18896.00', 10, 2),
(400, 'STEP 6', '19095.00', 10, 2),
(401, 'STEP 7', '19244.00', 10, 2),
(402, 'STEP 8', '19421.00', 10, 2),
(403, 'STEP 1', '19620.00', 11, 2),
(404, 'STEP 2', '19853.00', 11, 2),
(405, 'STEP 3', '20088.00', 11, 2),
(406, 'STEP 4', '20326.00', 11, 2),
(407, 'STEP 5', '20567.00', 11, 2),
(408, 'STEP 6', '20811.00', 11, 2),
(409, 'STEP 7', '21058.00', 11, 2),
(410, 'STEP 8', '21307.00', 11, 2),
(411, 'STEP 1', '21387.00', 12, 2),
(412, 'STEP 2', '21626.00', 12, 2),
(413, 'STEP 3', '21868.00', 12, 2),
(414, 'STEP 4', '22113.00', 12, 2),
(415, 'STEP 5', '22361.00', 12, 2),
(416, 'STEP 6', '22611.00', 12, 2),
(417, 'STEP 7', '22864.00', 12, 2),
(418, 'STEP 8', '23120.00', 12, 2),
(419, 'STEP 1', '23257.00', 13, 2),
(420, 'STEP 2', '23517.00', 13, 2),
(421, 'STEP 3', '23780.00', 13, 2),
(422, 'STEP 4', '24047.00', 13, 2),
(423, 'STEP 5', '24315.00', 13, 2),
(424, 'STEP 6', '24587.00', 13, 2),
(425, 'STEP 7', '24863.00', 13, 2),
(426, 'STEP 8', '25141.00', 13, 2),
(427, 'STEP 1', '25290.00', 14, 2),
(428, 'STEP 2', '25573.00', 14, 2),
(429, 'STEP 3', '25859.00', 14, 2),
(430, 'STEP 4', '26149.00', 14, 2),
(431, 'STEP 5', '26441.00', 14, 2),
(432, 'STEP 6', '26737.00', 14, 2),
(433, 'STEP 7', '27036.00', 14, 2),
(434, 'STEP 8', '27339.00', 14, 2),
(435, 'STEP 1', '27656.00', 15, 2),
(436, 'STEP 2', '27887.00', 15, 2),
(437, 'STEP 3', '28214.00', 15, 2),
(438, 'STEP 4', '28544.00', 15, 2),
(439, 'STEP 5', '28877.00', 15, 2),
(440, 'STEP 6', '29214.00', 15, 2),
(441, 'STEP 7', '29557.00', 15, 2),
(442, 'STEP 8', '29902.00', 15, 2),
(443, 'STEP 1', '30044.00', 16, 2),
(444, 'STEP 2', '30396.00', 16, 2),
(445, 'STEP 3', '30751.00', 16, 2),
(446, 'STEP 4', '31111.00', 16, 2),
(447, 'STEP 5', '31474.00', 16, 2),
(448, 'STEP 6', '31843.00', 16, 2),
(449, 'STEP 7', '32215.00', 16, 2),
(450, 'STEP 8', '32592.00', 16, 2),
(451, 'STEP 1', '32747.00', 17, 2),
(452, 'STEP 2', '33131.00', 17, 2),
(453, 'STEP 3', '33518.00', 17, 2),
(454, 'STEP 4', '33909.00', 17, 2),
(455, 'STEP 5', '34306.00', 17, 2),
(456, 'STEP 6', '34707.00', 17, 2),
(457, 'STEP 7', '35113.00', 17, 2),
(458, 'STEP 8', '35524.00', 17, 2),
(459, 'STEP 1', '35693.00', 18, 2),
(460, 'STEP 2', '36111.00', 18, 2),
(461, 'STEP 3', '36532.00', 18, 2),
(462, 'STEP 4', '36960.00', 18, 2),
(463, 'STEP 5', '37392.00', 18, 2),
(464, 'STEP 6', '37829.00', 18, 2),
(465, 'STEP 7', '38272.00', 18, 2),
(466, 'STEP 8', '38719.00', 18, 2),
(467, 'STEP 1', '39151.00', 19, 2),
(468, 'STEP 2', '39685.00', 19, 2),
(469, 'STEP 3', '40227.00', 19, 2),
(470, 'STEP 4', '40776.00', 19, 2),
(471, 'STEP 5', '41333.00', 19, 2),
(472, 'STEP 6', '41898.00', 19, 2),
(473, 'STEP 7', '42470.00', 19, 2),
(474, 'STEP 8', '43051.00', 19, 2),
(475, 'STEP 1', '47779.00', 21, 2),
(476, 'STEP 2', '48432.00', 21, 2),
(477, 'STEP 3', '49904.00', 21, 2),
(478, 'STEP 4', '49764.00', 21, 2),
(479, 'STEP 5', '50443.00', 21, 2),
(480, 'STEP 6', '51132.00', 21, 2),
(481, 'STEP 7', '51831.00', 21, 2),
(482, 'STEP 8', '51539.00', 21, 2),
(483, 'STEP 1', '52738.00', 22, 2),
(484, 'STEP 2', '53503.00', 22, 2),
(485, 'STEP 3', '54234.00', 22, 2),
(486, 'STEP 4', '54975.00', 22, 2),
(487, 'STEP 5', '55726.00', 22, 2),
(488, 'STEP 6', '56487.00', 22, 2),
(489, 'STEP 7', '57258.00', 22, 2),
(490, 'STEP 8', '58040.00', 22, 2),
(491, 'STEP 1', '58310.00', 23, 2),
(492, 'STEP 2', '59106.00', 23, 2),
(493, 'STEP 3', '59913.00', 23, 2),
(494, 'STEP 4', '60732.00', 23, 2),
(495, 'STEP 5', '61561.00', 23, 2),
(496, 'STEP 6', '62402.00', 23, 2),
(497, 'STEP 7', '63255.00', 23, 2),
(498, 'STEP 8', '64118.00', 23, 2),
(499, 'STEP 1', '64416.00', 24, 2),
(500, 'STEP 2', '65296.00', 24, 2),
(501, 'STEP 3', '66187.00', 24, 2),
(502, 'STEP 4', '67092.00', 24, 2),
(503, 'STEP 5', '68008.00', 24, 2),
(504, 'STEP 6', '68937.00', 24, 2),
(505, 'STEP 7', '69878.00', 24, 2),
(506, 'STEP 8', '70832.00', 24, 2),
(507, 'STEP 1', '71476.00', 25, 2),
(508, 'STEP 2', '72452.00', 25, 2),
(509, 'STEP 3', '73441.00', 25, 2),
(510, 'STEP 4', '74444.00', 25, 2),
(511, 'STEP 5', '75461.00', 25, 2),
(512, 'STEP 6', '76491.00', 25, 2),
(513, 'STEP 7', '77536.00', 25, 2),
(514, 'STEP 8', '78595.00', 25, 2),
(515, 'STEP 1', '78960.00', 26, 2),
(516, 'STEP 2', '80039.00', 26, 2),
(517, 'STEP 3', '81132.00', 26, 2),
(518, 'STEP 4', '82240.00', 26, 2),
(519, 'STEP 5', '83363.00', 26, 2),
(520, 'STEP 6', '84502.00', 26, 2),
(521, 'STEP 7', '85657.00', 26, 2),
(522, 'STEP 8', '86825.00', 26, 2),
(523, 'STEP 1', '87229.00', 27, 2),
(524, 'STEP 2', '88420.00', 27, 2),
(525, 'STEP 3', '89628.00', 27, 2),
(526, 'STEP 4', '90852.00', 27, 2),
(527, 'STEP 5', '92093.00', 27, 2),
(528, 'STEP 6', '93351.00', 27, 2),
(529, 'STEP 7', '94625.00', 27, 2),
(530, 'STEP 8', '95925.00', 27, 2),
(531, 'STEP 1', '96363.00', 28, 2),
(532, 'STEP 2', '97679.00', 28, 2),
(533, 'STEP 3', '99013.00', 28, 2),
(534, 'STEP 4', '100366.00', 28, 2),
(535, 'STEP 5', '101736.00', 28, 2),
(536, 'STEP 6', '103126.00', 28, 2),
(537, 'STEP 7', '104534.00', 28, 2),
(538, 'STEP 8', '105962.00', 28, 2),
(539, 'STEP 1', '106454.00', 29, 2),
(540, 'STEP 2', '107908.00', 29, 2),
(541, 'STEP 3', '109382.00', 29, 2),
(542, 'STEP 4', '110875.00', 29, 2),
(543, 'STEP 5', '112390.00', 29, 2),
(544, 'STEP 6', '113925.00', 29, 2),
(545, 'STEP 7', '115481.00', 29, 2),
(546, 'STEP 8', '117058.00', 29, 2),
(547, 'STEP 1', '117601.00', 30, 2),
(548, 'STEP 2', '119208.00', 30, 2),
(549, 'STEP 3', '120836.00', 30, 2),
(550, 'STEP 4', '122486.00', 30, 2),
(551, 'STEP 5', '124159.00', 30, 2),
(552, 'STEP 6', '125855.00', 30, 2),
(553, 'STEP 7', '127573.00', 30, 2),
(554, 'STEP 8', '129316.00', 30, 2),
(555, 'STEP 1', '152325.00', 31, 2),
(556, 'STEP 2', '154649.00', 31, 2),
(557, 'STEP 3', '157008.00', 31, 2),
(558, 'STEP 4', '159404.00', 31, 2),
(559, 'STEP 5', '161836.00', 31, 2),
(560, 'STEP 6', '164305.00', 31, 2),
(561, 'STEP 7', '166812.00', 31, 2),
(562, 'STEP 8', '169357.00', 31, 2),
(563, 'STEP 1', '177929.00', 32, 2),
(564, 'STEP 2', '180700.00', 32, 2),
(565, 'STEP 3', '183513.00', 32, 2),
(566, 'STEP 4', '186372.00', 32, 2),
(567, 'STEP 5', '189274.00', 32, 2),
(568, 'STEP 6', '192221.00', 32, 2),
(569, 'STEP 7', '195215.00', 32, 2),
(570, 'STEP 8', '198255.00', 32, 2),
(571, 'STEP 1', '215804.00', 33, 2),
(572, 'STEP 2', '222278.00', 33, 2),
(573, 'STEP 1', '43250.00', 20, 2),
(574, 'STEP 2', '43841.00', 20, 2),
(575, 'STEP 3', '44440.00', 20, 2),
(576, 'STEP 4', '45047.00', 20, 2),
(577, 'STEP 5', '45662.00', 20, 2),
(578, 'STEP 6', '46285.00', 20, 2),
(579, 'STEP 7', '46917.00', 20, 2),
(580, 'STEP 8', '47559.00', 20, 2),
(581, 'STEP 1', '13481.00', 5, 3),
(582, 'STEP 2', '13606.00', 5, 3),
(583, 'STEP 3', '13705.00', 5, 3),
(584, 'STEP 4', '13818.00', 5, 3),
(585, 'STEP 5', '13932.00', 5, 3),
(586, 'STEP 6', '14047.00', 5, 3),
(587, 'STEP 7', '14163.00', 5, 3),
(588, 'STEP 8', '14280.00', 5, 3),
(589, 'STEP 1', '14340.00', 6, 3),
(590, 'STEP 2', '14459.00', 6, 3),
(591, 'STEP 3', '14578.00', 6, 3),
(592, 'STEP 4', '14699.00', 6, 3),
(593, 'STEP 5', '14820.00', 6, 3),
(594, 'STEP 6', '14942.00', 6, 3),
(595, 'STEP 7', '15066.00', 6, 3),
(596, 'STEP 8', '15190.00', 6, 3),
(597, 'STEP 1', '15254.00', 7, 3),
(598, 'STEP 2', '15380.00', 7, 3),
(599, 'STEP 3', '15507.00', 7, 3),
(600, 'STEP 4', '15635.00', 7, 3),
(601, 'STEP 5', '15765.00', 7, 3),
(602, 'STEP 6', '15895.00', 7, 3),
(603, 'STEP 7', '16026.00', 7, 3),
(604, 'STEP 8', '16158.00', 7, 3),
(605, 'STEP 1', '16282.00', 8, 3),
(606, 'STEP 2', '16433.00', 8, 3),
(607, 'STEP 3', '16585.00', 8, 3),
(608, 'STEP 4', '16739.00', 8, 3),
(609, 'STEP 5', '16895.00', 8, 3),
(610, 'STEP 6', '17051.00', 8, 3),
(611, 'STEP 7', '17209.00', 8, 3),
(612, 'STEP 8', '17369.00', 8, 3),
(613, 'STEP 1', '17473.00', 9, 3),
(614, 'STEP 2', '17627.00', 9, 3),
(615, 'STEP 3', '17781.00', 9, 3),
(616, 'STEP 4', '17937.00', 9, 3),
(617, 'STEP 5', '18095.00', 9, 3),
(618, 'STEP 6', '18253.00', 9, 3),
(619, 'STEP 7', '18413.00', 9, 3),
(620, 'STEP 8', '18575.00', 9, 3),
(621, 'STEP 1', '18718.00', 10, 3),
(622, 'STEP 2', '18883.00', 10, 3),
(623, 'STEP 3', '19048.00', 10, 3),
(624, 'STEP 4', '19215.00', 10, 3),
(625, 'STEP 5', '19384.00', 10, 3),
(626, 'STEP 6', '19567.00', 10, 3),
(627, 'STEP 7', '19725.00', 10, 3),
(628, 'STEP 8', '19898.00', 10, 3),
(629, 'STEP 1', '20179.00', 11, 3),
(630, 'STEP 2', '20437.00', 11, 3),
(631, 'STEP 3', '20698.00', 11, 3),
(632, 'STEP 4', '20963.00', 11, 3),
(633, 'STEP 5', '21231.00', 11, 3),
(634, 'STEP 6', '21502.00', 11, 3),
(635, 'STEP 7', '21777.00', 11, 3),
(636, 'STEP 8', '22055.00', 11, 3),
(637, 'STEP 1', '22149.00', 12, 3),
(638, 'STEP 2', '22410.00', 12, 3),
(639, 'STEP 3', '22674.00', 12, 3),
(640, 'STEP 4', '22942.00', 12, 3),
(641, 'STEP 5', '23212.00', 12, 3),
(642, 'STEP 6', '23486.00', 12, 3),
(643, 'STEP 7', '23736.00', 12, 3),
(644, 'STEP 8', '24043.00', 12, 3),
(645, 'STEP 1', '24224.00', 13, 3),
(646, 'STEP 2', '24510.00', 13, 3),
(647, 'STEP 3', '24799.00', 13, 3),
(648, 'STEP 4', '25091.00', 13, 3),
(649, 'STEP 5', '25387.00', 13, 3),
(650, 'STEP 6', '25686.00', 13, 3),
(651, 'STEP 7', '25989.00', 13, 3),
(652, 'STEP 8', '26296.00', 13, 3),
(653, 'STEP 1', '26494.00', 14, 3),
(654, 'STEP 2', '26806.00', 14, 3),
(655, 'STEP 3', '27122.00', 14, 3),
(656, 'STEP 4', '27442.00', 14, 3),
(657, 'STEP 5', '27766.00', 14, 3),
(658, 'STEP 6', '28093.00', 14, 3),
(659, 'STEP 7', '28424.00', 14, 3),
(660, 'STEP 8', '28759.00', 14, 3),
(661, 'STEP 1', '29010.00', 15, 3),
(662, 'STEP 2', '29359.00', 15, 3),
(663, 'STEP 3', '29713.00', 15, 3),
(664, 'STEP 4', '30071.00', 15, 3),
(665, 'STEP 5', '30432.00', 15, 3),
(666, 'STEP 6', '30799.00', 15, 3),
(667, 'STEP 7', '31170.00', 15, 3),
(668, 'STEP 8', '31545.00', 15, 3),
(669, 'STEP 1', '31765.00', 16, 3),
(670, 'STEP 2', '32147.00', 16, 3),
(671, 'STEP 3', '32535.00', 16, 3),
(672, 'STEP 4', '32926.00', 16, 3),
(673, 'STEP 5', '33323.00', 16, 3),
(674, 'STEP 6', '33724.00', 16, 3),
(675, 'STEP 7', '34130.00', 16, 3),
(676, 'STEP 8', '34541.00', 16, 3),
(677, 'STEP 1', '34781.00', 17, 3),
(678, 'STEP 2', '35201.00', 17, 3),
(679, 'STEP 3', '35624.00', 17, 3),
(680, 'STEP 4', '36053.00', 17, 3),
(681, 'STEP 5', '36487.00', 17, 3),
(682, 'STEP 6', '36927.00', 17, 3),
(683, 'STEP 7', '37371.00', 17, 3),
(684, 'STEP 8', '37821.00', 17, 3),
(685, 'STEP 1', '38085.00', 18, 3),
(686, 'STEP 2', '38543.00', 18, 3),
(687, 'STEP 3', '39007.00', 18, 3),
(688, 'STEP 4', '39477.00', 18, 3),
(689, 'STEP 5', '39952.00', 18, 3),
(690, 'STEP 6', '40433.00', 18, 3),
(691, 'STEP 7', '40920.00', 18, 3),
(692, 'STEP 8', '41413.00', 18, 3),
(693, 'STEP 1', '42099.00', 19, 3),
(694, 'STEP 2', '42730.00', 19, 3),
(695, 'STEP 3', '43371.00', 19, 3),
(696, 'STEP 4', '44020.00', 19, 3),
(697, 'STEP 5', '44680.00', 19, 3),
(698, 'STEP 6', '45350.00', 19, 3),
(699, 'STEP 7', '46030.00', 19, 3),
(700, 'STEP 8', '46720.00', 19, 3),
(701, 'STEP 1', '47037.00', 20, 3),
(702, 'STEP 2', '47742.00', 20, 3),
(703, 'STEP 3', '48457.00', 20, 3),
(704, 'STEP 4', '49184.00', 20, 3),
(705, 'STEP 5', '49921.00', 20, 3),
(706, 'STEP 6', '50669.00', 20, 3),
(707, 'STEP 7', '51428.00', 20, 3),
(708, 'STEP 8', '52199.00', 20, 3),
(709, 'STEP 1', '52554.00', 21, 3),
(710, 'STEP 2', '53341.00', 21, 3),
(711, 'STEP 3', '54141.00', 21, 3),
(712, 'STEP 4', '54952.00', 21, 3),
(713, 'STEP 5', '55776.00', 21, 3),
(714, 'STEP 6', '56612.00', 21, 3),
(715, 'STEP 7', '57460.00', 21, 3),
(716, 'STEP 8', '58322.00', 21, 3),
(717, 'STEP 1', '58717.00', 22, 3),
(718, 'STEP 2', '59597.00', 22, 3),
(719, 'STEP 3', '60491.00', 22, 3),
(720, 'STEP 4', '61397.00', 22, 3),
(721, 'STEP 5', '62318.00', 22, 3),
(722, 'STEP 6', '63252.00', 22, 3),
(723, 'STEP 7', '64200.00', 22, 3),
(724, 'STEP 8', '65162.00', 22, 3),
(725, 'STEP 1', '65604.00', 23, 3),
(726, 'STEP 2', '66587.00', 23, 3),
(727, 'STEP 3', '67585.00', 23, 3),
(728, 'STEP 4', '68598.00', 23, 3),
(729, 'STEP 5', '69627.00', 23, 3),
(730, 'STEP 6', '70670.00', 23, 3),
(731, 'STEP 7', '71730.00', 23, 3),
(732, 'STEP 8', '72805.00', 23, 3),
(733, 'STEP 1', '73299.00', 24, 3),
(734, 'STEP 2', '74397.00', 24, 3),
(735, 'STEP 3', '75512.00', 24, 3),
(736, 'STEP 4', '76644.00', 24, 3),
(737, 'STEP 5', '77793.00', 24, 3),
(738, 'STEP 6', '78959.00', 24, 3),
(739, 'STEP 7', '80143.00', 24, 3),
(740, 'STEP 8', '81344.00', 24, 3),
(741, 'STEP 1', '82439.00', 25, 3),
(742, 'STEP 2', '83674.00', 25, 3),
(743, 'STEP 3', '84928.00', 25, 3),
(744, 'STEP 4', '86201.00', 25, 3),
(745, 'STEP 5', '87493.00', 25, 3),
(746, 'STEP 6', '88805.00', 25, 3),
(747, 'STEP 7', '90136.00', 25, 3),
(748, 'STEP 8', '91487.00', 25, 3),
(749, 'STEP 1', '92108.00', 26, 3),
(750, 'STEP 2', '93488.00', 26, 3),
(751, 'STEP 3', '94889.00', 26, 3),
(752, 'STEP 4', '96312.00', 26, 3),
(753, 'STEP 5', '97755.00', 26, 3),
(754, 'STEP 6', '99221.00', 26, 3),
(755, 'STEP 7', '100708.00', 26, 3),
(756, 'STEP 8', '102217.00', 26, 3),
(757, 'STEP 1', '102910.00', 27, 3),
(758, 'STEP 2', '104453.00', 27, 3),
(759, 'STEP 3', '106019.00', 27, 3),
(760, 'STEP 4', '107608.00', 27, 3),
(761, 'STEP 5', '109221.00', 27, 3),
(762, 'STEP 6', '110858.00', 27, 3),
(763, 'STEP 7', '112519.00', 27, 3),
(764, 'STEP 8', '114210.00', 27, 3),
(765, 'STEP 1', '114981.00', 28, 3),
(766, 'STEP 2', '116704.00', 28, 3),
(767, 'STEP 3', '118453.00', 28, 3),
(768, 'STEP 4', '120229.00', 28, 3),
(769, 'STEP 5', '122031.00', 28, 3),
(770, 'STEP 6', '123860.00', 28, 3),
(771, 'STEP 7', '125716.00', 28, 3),
(772, 'STEP 8', '127601.00', 28, 3),
(773, 'STEP 1', '128467.00', 29, 3),
(774, 'STEP 2', '130392.00', 29, 3),
(775, 'STEP 3', '132346.00', 29, 3),
(776, 'STEP 4', '134300.00', 29, 3),
(777, 'STEP 5', '136343.00', 29, 3),
(778, 'STEP 6', '138387.00', 29, 3),
(779, 'STEP 7', '140461.00', 29, 3),
(780, 'STEP 8', '142566.00', 29, 3),
(781, 'STEP 1', '143534.00', 30, 3),
(782, 'STEP 2', '145685.00', 30, 3),
(783, 'STEP 3', '147869.00', 30, 3),
(784, 'STEP 4', '150085.00', 30, 3),
(785, 'STEP 5', '152335.00', 30, 3),
(786, 'STEP 6', '154618.00', 30, 3),
(787, 'STEP 7', '156935.00', 30, 3),
(788, 'STEP 8', '159288.00', 30, 3),
(789, 'STEP 1', '198168.00', 31, 3),
(790, 'STEP 2', '201615.00', 31, 3),
(791, 'STEP 3', '205121.00', 31, 3),
(792, 'STEP 4', '208689.00', 31, 3),
(793, 'STEP 5', '212318.00', 31, 3),
(794, 'STEP 6', '216011.00', 31, 3),
(795, 'STEP 7', '219768.00', 31, 3),
(796, 'STEP 8', '223590.00', 31, 3),
(797, 'STEP 1', '233857.00', 32, 3),
(798, 'STEP 2', '238035.00', 32, 3),
(799, 'STEP 3', '242288.00', 32, 3),
(800, 'STEP 4', '246618.00', 32, 3),
(801, 'STEP 5', '215024.00', 32, 3),
(802, 'STEP 6', '255509.00', 32, 3),
(803, 'STEP 7', '260074.00', 32, 3),
(804, 'STEP 8', '264721.00', 32, 3),
(805, 'STEP 1', '289401.00', 33, 3),
(806, 'STEP 2', '298083.00', 33, 3),
(839, 'STEP 1', '14007.00', 5, 4),
(840, 'STEP 2', '14115.00', 5, 4),
(841, 'STEP 3', '14223.00', 5, 4),
(842, 'STEP 4', '14332.00', 5, 4),
(843, 'STEP 5', '14442.00', 5, 4),
(844, 'STEP 6', '14553.00', 5, 4),
(845, 'STEP 7', '14665.00', 5, 4),
(846, 'STEP 8', '14777.00', 5, 4),
(847, 'STEP 1', '14847.00', 6, 4),
(848, 'STEP 2', '14961.00', 6, 4),
(849, 'STEP 3', '15076.00', 6, 4),
(850, 'STEP 4', '15192.00', 6, 4),
(851, 'STEP 5', '15309.00', 6, 4),
(852, 'STEP 6', '15426.00', 6, 4),
(853, 'STEP 7', '15545.00', 6, 4),
(854, 'STEP 8', '15664.00', 6, 4),
(855, 'STEP 1', '15738.00', 7, 4),
(856, 'STEP 2', '15859.00', 7, 4),
(857, 'STEP 3', '15981.00', 7, 4),
(858, 'STEP 4', '16104.00', 7, 4),
(859, 'STEP 5', '16227.00', 7, 4),
(860, 'STEP 6', '16352.00', 7, 4),
(861, 'STEP 7', '16477.00', 7, 4),
(862, 'STEP 8', '16604.00', 7, 4),
(863, 'STEP 1', '16758.00', 8, 4),
(864, 'STEP 2', '16910.00', 8, 4),
(865, 'STEP 3', '17063.00', 8, 4),
(866, 'STEP 4', '17217.00', 8, 4),
(867, 'STEP 5', '17217.00', 8, 4),
(868, 'STEP 6', '17372.00', 8, 4),
(869, 'STEP 7', '17529.00', 8, 4),
(870, 'STEP 8', '17688.00', 8, 4),
(871, 'STEP 1', '17975.00', 9, 4),
(872, 'STEP 2', '18125.00', 9, 4),
(873, 'STEP 3', '18277.00', 9, 4),
(874, 'STEP 4', '18430.00', 9, 4),
(875, 'STEP 5', '18584.00', 9, 4),
(876, 'STEP 6', '18739.00', 9, 4),
(877, 'STEP 7', '18896.00', 9, 4),
(878, 'STEP 8', '19054.00', 9, 4),
(879, 'STEP 1', '19233.00', 10, 4),
(880, 'STEP 2', '19394.00', 10, 4),
(881, 'STEP 3', '19556.00', 10, 4),
(882, 'STEP 4', '19720.00', 10, 4),
(883, 'STEP 5', '19884.00', 10, 4),
(884, 'STEP 6', '20051.00', 10, 4),
(885, 'STEP 7', '20218.00', 10, 4),
(886, 'STEP 8', '20387.00', 10, 4),
(887, 'STEP 1', '20754.00', 11, 4),
(888, 'STEP 2', '21038.00', 11, 4),
(889, 'STEP 3', '21327.00', 11, 4),
(890, 'STEP 4', '21619.00', 11, 4),
(891, 'STEP 5', '21915.00', 11, 4),
(892, 'STEP 6', '22216.00', 11, 4),
(893, 'STEP 7', '22520.00', 11, 4),
(894, 'STEP 8', '22829.00', 11, 4),
(895, 'STEP 1', '22938.00', 12, 4),
(896, 'STEP 2', '23222.00', 12, 4),
(897, 'STEP 3', '23510.00', 12, 4),
(898, 'STEP 4', '23801.00', 12, 4),
(899, 'STEP 5', '24096.00', 12, 4),
(900, 'STEP 6', '24395.00', 12, 4),
(901, 'STEP 7', '24697.00', 12, 4),
(902, 'STEP 8', '25003.00', 12, 4),
(903, 'STEP 1', '25232.00', 13, 4),
(904, 'STEP 2', '25545.00', 13, 4),
(905, 'STEP 3', '25861.00', 13, 4),
(906, 'STEP 4', '26181.00', 13, 4),
(907, 'STEP 5', '26506.00', 13, 4),
(908, 'STEP 6', '26834.00', 13, 4),
(909, 'STEP 7', '27166.00', 13, 4),
(910, 'STEP 8', '27503.00', 13, 4),
(911, 'STEP 1', '27755.00', 14, 4),
(912, 'STEP 2', '28099.00', 14, 4),
(913, 'STEP 3', '28447.00', 14, 4),
(914, 'STEP 4', '28800.00', 14, 4),
(915, 'STEP 5', '29156.00', 14, 4),
(916, 'STEP 6', '29517.00', 14, 4),
(917, 'STEP 7', '29883.00', 14, 4),
(918, 'STEP 8', '30253.00', 14, 4),
(919, 'STEP 1', '30531.00', 15, 4),
(920, 'STEP 2', '30909.00', 15, 4),
(921, 'STEP 3', '31292.00', 15, 4),
(922, 'STEP 4', '31680.00', 15, 4),
(923, 'STEP 5', '32072.00', 15, 4),
(924, 'STEP 6', '32496.00', 15, 4),
(925, 'STEP 7', '32871.00', 15, 4),
(926, 'STEP 8', '33279.00', 15, 4),
(927, 'STEP 1', '33584.00', 16, 4),
(928, 'STEP 2', '34000.00', 16, 4),
(929, 'STEP 3', '34584.00', 16, 4),
(930, 'STEP 4', '34872.00', 16, 4),
(931, 'STEP 5', '35279.00', 16, 4),
(932, 'STEP 6', '35716.00', 16, 4),
(933, 'STEP 7', '36159.00', 16, 4),
(934, 'STEP 8', '36606.00', 16, 4),
(935, 'STEP 1', '36942.00', 17, 4),
(936, 'STEP 2', '37400.00', 17, 4),
(937, 'STEP 3', '37836.00', 17, 4),
(938, 'STEP 4', '38332.00', 17, 4),
(939, 'STEP 5', '38807.00', 17, 4),
(940, 'STEP 6', '39288.00', 17, 4),
(941, 'STEP 7', '39774.00', 17, 4),
(942, 'STEP 8', '40267.00', 17, 4),
(943, 'STEP 1', '40637.00', 18, 4),
(944, 'STEP 2', '41140.00', 18, 4),
(945, 'STEP 3', '41650.00', 18, 4),
(946, 'STEP 4', '42165.00', 18, 4),
(947, 'STEP 5', '42688.00', 18, 4),
(948, 'STEP 6', '43217.00', 18, 4),
(949, 'STEP 7', '43752.00', 18, 4),
(950, 'STEP 8', '44294.00', 18, 4),
(951, 'STEP 1', '45269.00', 19, 4),
(952, 'STEP 2', '46008.00', 19, 4),
(953, 'STEP 3', '46759.00', 19, 4),
(954, 'STEP 4', '47522.00', 19, 4),
(955, 'STEP 5', '48298.00', 19, 4),
(956, 'STEP 6', '49086.00', 19, 4),
(957, 'STEP 7', '49888.00', 19, 4),
(958, 'STEP 8', '50702.00', 19, 4),
(959, 'STEP 1', '51155.00', 20, 4),
(960, 'STEP 2', '51989.00', 20, 4),
(961, 'STEP 3', '52838.00', 20, 4),
(962, 'STEP 4', '53700.00', 20, 4),
(963, 'STEP 5', '54577.00', 20, 4),
(964, 'STEP 6', '55468.00', 20, 4),
(965, 'STEP 7', '56373.00', 20, 4),
(966, 'STEP 8', '57293.00', 20, 4),
(967, 'STEP 1', '57805.00', 21, 4),
(968, 'STEP 2', '58748.00', 21, 4),
(969, 'STEP 3', '59707.00', 21, 4),
(970, 'STEP 4', '60681.00', 21, 4),
(971, 'STEP 5', '61672.00', 21, 4),
(972, 'STEP 6', '62678.00', 21, 4),
(973, 'STEP 7', '63701.00', 21, 4),
(974, 'STEP 8', '64741.00', 21, 4),
(975, 'STEP 1', '65319.00', 22, 4),
(976, 'STEP 2', '66385.00', 22, 4),
(977, 'STEP 3', '67469.00', 22, 4),
(978, 'STEP 4', '68570.00', 22, 4),
(979, 'STEP 5', '69689.00', 22, 4),
(980, 'STEP 6', '70827.00', 22, 4),
(981, 'STEP 7', '71938.00', 22, 4),
(982, 'STEP 8', '73157.00', 22, 4),
(983, 'STEP 1', '73811.00', 23, 4),
(984, 'STEP 2', '75015.00', 23, 4),
(985, 'STEP 3', '76240.00', 23, 4),
(986, 'STEP 4', '77484.00', 23, 4),
(987, 'STEP 5', '78749.00', 23, 4),
(988, 'STEP 6', '80034.00', 23, 4),
(989, 'STEP 7', '81340.00', 23, 4),
(990, 'STEP 8', '82668.00', 23, 4),
(991, 'STEP 1', '83406.00', 24, 4),
(992, 'STEP 2', '84767.00', 24, 4),
(993, 'STEP 3', '86151.00', 24, 4),
(994, 'STEP 4', '87557.00', 24, 4),
(995, 'STEP 5', '88986.00', 24, 4),
(996, 'STEP 6', '90439.00', 24, 4),
(997, 'STEP 7', '91915.00', 24, 4),
(998, 'STEP 8', '93415.00', 24, 4),
(999, 'STEP 1', '95083.00', 25, 4),
(1000, 'STEP 2', '96635.00', 25, 4),
(1001, 'STEP 3', '98212.00', 25, 4),
(1002, 'STEP 4', '99815.00', 25, 4),
(1003, 'STEP 5', '101444.00', 25, 4),
(1004, 'STEP 6', '103100.00', 25, 4),
(1005, 'STEP 7', '104783.00', 25, 4),
(1006, 'STEP 8', '106493.00', 25, 4),
(1007, 'STEP 1', '107444.00', 26, 4),
(1008, 'STEP 2', '109197.00', 26, 4),
(1009, 'STEP 3', '110980.00', 26, 4),
(1010, 'STEP 4', '112791.00', 26, 4),
(1011, 'STEP 5', '114632.00', 26, 4),
(1012, 'STEP 6', '116503.00', 26, 4),
(1013, 'STEP 7', '118404.00', 26, 4),
(1014, 'STEP 8', '120337.00', 26, 4),
(1015, 'STEP 1', '121411.00', 27, 4),
(1016, 'STEP 2', '123393.00', 27, 4),
(1017, 'STEP 3', '125407.00', 27, 4),
(1018, 'STEP 4', '127454.00', 27, 4),
(1019, 'STEP 5', '129534.00', 27, 4),
(1020, 'STEP 6', '131648.00', 27, 4),
(1021, 'STEP 7', '133797.00', 27, 4),
(1022, 'STEP 8', '135981.00', 27, 4),
(1023, 'STEP 1', '137195.00', 28, 4),
(1024, 'STEP 2', '139434.00', 28, 4),
(1025, 'STEP 3', '141710.00', 28, 4),
(1026, 'STEP 4', '144023.00', 28, 4),
(1027, 'STEP 5', '146373.00', 28, 4),
(1028, 'STEP 6', '148763.00', 28, 4),
(1029, 'STEP 7', '151191.00', 28, 4),
(1030, 'STEP 8', '153658.00', 28, 4),
(1031, 'STEP 1', '155030.00', 29, 4),
(1032, 'STEP 2', '157561.00', 29, 4),
(1033, 'STEP 3', '160132.00', 29, 4),
(1034, 'STEP 4', '162746.00', 29, 4),
(1035, 'STEP 5', '165402.00', 29, 4),
(1036, 'STEP 6', '168102.00', 29, 4),
(1037, 'STEP 7', '170845.00', 29, 4),
(1038, 'STEP 8', '173634.00', 29, 4),
(1039, 'STEP 1', '175184.00', 30, 4),
(1040, 'STEP 2', '178043.00', 30, 4),
(1041, 'STEP 3', '180949.00', 30, 4),
(1042, 'STEP 4', '183903.00', 30, 4),
(1043, 'STEP 5', '186904.00', 30, 4),
(1044, 'STEP 6', '189955.00', 30, 4),
(1045, 'STEP 7', '193055.00', 30, 4),
(1046, 'STEP 8', '195206.00', 30, 4),
(1047, 'STEP 1', '257809.00', 31, 4),
(1048, 'STEP 2', '261844.00', 31, 4),
(1049, 'STEP 3', '267978.00', 31, 4),
(1050, 'STEP 4', '273212.00', 31, 4),
(1051, 'STEP 5', '278549.00', 31, 4),
(1052, 'STEP 6', '283989.00', 31, 4),
(1053, 'STEP 7', '289536.00', 31, 4),
(1054, 'STEP 8', '295191.00', 31, 4),
(1055, 'STEP 1', '307365.00', 32, 4),
(1056, 'STEP 2', '313564.00', 32, 4),
(1057, 'STEP 3', '319887.00', 32, 4),
(1058, 'STEP 4', '326338.00', 32, 4),
(1059, 'STEP 5', '332919.00', 32, 4),
(1060, 'STEP 6', '339633.00', 32, 4),
(1061, 'STEP 7', '346483.00', 32, 4),
(1062, 'STEP 8', '353470.00', 32, 4),
(1063, 'STEP 1', '388096.00', 33, 4),
(1064, 'STEP 2', '399739.00', 33, 4);

-- --------------------------------------------------------

--
-- Table structure for table `prs_salary_history`
--

CREATE TABLE IF NOT EXISTS `prs_salary_history` (
  `history_id` int(11) NOT NULL,
  `his_step` varchar(45) NOT NULL,
  `his_grade` varchar(45) DEFAULT NULL,
  `his_sal_memo` varchar(45) DEFAULT NULL,
  `date_change` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prs_salary_memo`
--

CREATE TABLE IF NOT EXISTS `prs_salary_memo` (
  `sal_memo_id` int(10) unsigned NOT NULL,
  `salary_memo` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prs_salary_memo`
--

INSERT INTO `prs_salary_memo` (`sal_memo_id`, `salary_memo`) VALUES
(1, 'Salary Memo 1'),
(2, 'Salary Memo 2'),
(3, 'Salary Memo 3'),
(4, 'Salary Memo 4');

-- --------------------------------------------------------

--
-- Table structure for table `prs_salary_record`
--

CREATE TABLE IF NOT EXISTS `prs_salary_record` (
  `sal_rec_id` int(10) unsigned NOT NULL,
  `grade_id` int(10) unsigned NOT NULL,
  `salary_id` int(10) unsigned NOT NULL,
  `emp_no` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prs_salary_record`
--

INSERT INTO `prs_salary_record` (`sal_rec_id`, `grade_id`, `salary_id`, `emp_no`) VALUES
(2, 14, 431, 5309127),
(3, 14, 431, 5110945),
(5, 12, 413, 50011252),
(6, 16, 449, 5002157),
(7, 17, 455, 5166431),
(8, 18, 460, 5143417),
(9, 12, 411, 5756153),
(10, 12, 412, 50011251),
(11, 12, 411, 50011254),
(12, 12, 415, 50011249),
(13, 13, 419, 5287126),
(14, 12, 411, 5566126),
(15, 14, 428, 5880365),
(16, 13, 421, 5902312),
(17, 12, 414, 4743128),
(18, 12, 411, 50011250),
(19, 12, 413, 50011253),
(20, 16, 443, 5432123),
(21, 12, 412, 5231607),
(22, 16, 444, 5201107),
(23, 13, 419, 4990054),
(24, 16, 445, 5000129),
(25, 12, 411, 4990111),
(26, 13, 419, 5412398),
(27, 12, 413, 5513092),
(28, 13, 420, 4912093),
(29, 16, 444, 5901112),
(30, 9, 387, 50011255),
(31, 15, 435, 5677342),
(32, 15, 435, 5001094),
(33, 15, 435, 50011248),
(34, 17, 451, 5221094),
(35, 14, 427, 4567891),
(36, 14, 427, 4901154),
(37, 13, 419, 5340912),
(38, 14, 427, 5400127),
(39, 14, 427, 5210011),
(40, 13, 419, 5353113),
(42, 13, 422, 5501298);

-- --------------------------------------------------------

--
-- Table structure for table `prs_save_report`
--

CREATE TABLE IF NOT EXISTS `prs_save_report` (
  `savereport` int(11) NOT NULL,
  `filename` varchar(45) DEFAULT NULL,
  `file_location` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `date_create` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prs_save_report`
--

INSERT INTO `prs_save_report` (`savereport`, `filename`, `file_location`, `type`, `date_create`) VALUES
(1, 'PayrollTableMar2018.pdf', 'payrollreport/PayrollTableMar2018.pdf', 'table', '2018-04-04 10:27:08'),
(2, 'PayrollRegistryMar2018.pdf', 'payrollreport/PayrollRegistryMar2018.pdf', 'registry', '2018-04-04 10:27:10'),
(3, 'PayrollSlipMar2018.pdf', 'payrollreport/PayrollSlipMar2018.pdf', 'Slip', '2018-04-04 10:27:35');

-- --------------------------------------------------------

--
-- Table structure for table `prs_setting`
--

CREATE TABLE IF NOT EXISTS `prs_setting` (
  `setting_id` int(10) unsigned NOT NULL,
  `name_setting` varchar(45) DEFAULT NULL,
  `changes` varchar(45) DEFAULT NULL,
  `special_attribute` varchar(45) NOT NULL,
  `date_change` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prs_setting`
--

INSERT INTO `prs_setting` (`setting_id`, `name_setting`, `changes`, `special_attribute`, `date_change`) VALUES
(14, 'PAGIBIG', '100', '', '2018-03-29 11:09:36'),
(15, 'Allowance', '2000', '', '2018-03-29 11:11:13'),
(16, 'GSIS', '10', '', '2018-03-29 11:11:26'),
(17, 'PAGIBIG', '100.00', '', '2018-03-29 11:11:26'),
(18, 'GSIS', '9', '', '2018-03-29 11:11:33'),
(19, 'PAGIBIG', '100.00', '', '2018-03-29 11:11:33'),
(20, 'birtable', NULL, '', '2018-04-02 06:10:17'),
(21, 'SALARY MEMO', '3', 'Salary Memo', '2018-04-02 06:57:19'),
(22, 'Allowance', '3000.00', '', '2018-04-02 14:37:26'),
(23, 'Allowance', '3500.00', '', '2018-04-02 14:37:52'),
(24, 'SALARY MEMO', '2', 'Salary Memo', '2018-04-04 02:15:51');

-- --------------------------------------------------------

--
-- Table structure for table `prs_stat_ex`
--

CREATE TABLE IF NOT EXISTS `prs_stat_ex` (
  `stat_id` int(10) unsigned NOT NULL,
  `percentage` varchar(45) NOT NULL,
  `exemption` decimal(10,2) NOT NULL,
  `number` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prs_stat_ex`
--

INSERT INTO `prs_stat_ex` (`stat_id`, `percentage`, `exemption`, `number`) VALUES
(1, '0', '0.00', '1'),
(2, '5', '0.00', '2'),
(3, '10', '41.67', '3'),
(4, '15', '208.33', '4'),
(5, '20', '708.33', '5'),
(6, '25', '1875.00', '6'),
(7, '30', '4166.67', '7'),
(8, '32', '10416.67', '8');

-- --------------------------------------------------------

--
-- Table structure for table `prs_tax_amount`
--

CREATE TABLE IF NOT EXISTS `prs_tax_amount` (
  `id` int(10) unsigned NOT NULL,
  `amount_fr` decimal(10,2) NOT NULL,
  `tax_id` int(10) unsigned NOT NULL,
  `stat_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prs_tax_amount`
--

INSERT INTO `prs_tax_amount` (`id`, `amount_fr`, `tax_id`, `stat_id`) VALUES
(97, '1.00', 1, 1),
(98, '0.00', 1, 2),
(99, '833.00', 1, 3),
(100, '2500.00', 1, 4),
(101, '5833.00', 1, 5),
(102, '11667.00', 1, 6),
(103, '20833.00', 1, 7),
(104, '41667.00', 1, 8),
(105, '1.00', 2, 1),
(106, '4167.00', 2, 2),
(107, '5000.00', 2, 3),
(108, '6667.00', 2, 4),
(109, '10000.00', 2, 5),
(110, '15833.00', 2, 6),
(111, '25000.00', 2, 7),
(112, '45833.00', 2, 8),
(113, '1.00', 3, 1),
(114, '6250.00', 3, 2),
(115, '7083.00', 3, 3),
(116, '8750.00', 3, 4),
(117, '12083.00', 3, 5),
(118, '17917.00', 3, 6),
(119, '27083.00', 3, 7),
(120, '47917.00', 3, 8),
(121, '1.00', 4, 1),
(122, '8333.00', 4, 2),
(123, '9167.00', 4, 3),
(124, '10833.00', 4, 4),
(125, '14167.00', 4, 5),
(126, '20000.00', 4, 6),
(127, '29000.00', 4, 7),
(128, '50000.00', 4, 8),
(129, '1.00', 5, 1),
(130, '10417.00', 5, 2),
(131, '11250.00', 5, 3),
(132, '12917.00', 5, 4),
(133, '16250.00', 5, 5),
(134, '22083.00', 5, 6),
(135, '31250.00', 5, 7),
(136, '52083.00', 5, 8),
(137, '1.00', 6, 1),
(138, '12500.00', 6, 2),
(139, '13333.00', 6, 3),
(140, '15000.00', 6, 4),
(141, '18333.00', 6, 5),
(142, '24167.00', 6, 6),
(143, '33333.00', 6, 7),
(144, '54167.00', 6, 8);

-- --------------------------------------------------------

--
-- Table structure for table `prs_tax_change`
--

CREATE TABLE IF NOT EXISTS `prs_tax_change` (
  `idprs_tax_change` int(10) unsigned NOT NULL,
  `change_range_fr` decimal(10,2) DEFAULT NULL,
  `change_range_to` decimal(10,2) DEFAULT NULL,
  `exemption` decimal(10,2) DEFAULT NULL,
  `tax_base` decimal(10,2) DEFAULT NULL,
  `tax_percentage` int(11) DEFAULT NULL,
  `tax_change` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prs_withholding_tax`
--

CREATE TABLE IF NOT EXISTS `prs_withholding_tax` (
  `tax_id` int(10) unsigned NOT NULL,
  `tax_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prs_withholding_tax`
--

INSERT INTO `prs_withholding_tax` (`tax_id`, `tax_name`) VALUES
(1, 'Z'),
(2, 'S/ME'),
(3, 'ME/S1'),
(4, 'ME/S2'),
(5, 'ME/S3'),
(6, 'ME/S4');

-- --------------------------------------------------------

--
-- Table structure for table `scms_bmi_rec`
--

CREATE TABLE IF NOT EXISTS `scms_bmi_rec` (
  `bmi_no` int(10) unsigned NOT NULL,
  `height` varchar(12) NOT NULL,
  `weight` varchar(12) NOT NULL,
  `bmi` int(10) unsigned NOT NULL,
  `nutri_status` enum('Normal','Wasted','Severely Wasted','Overweight','Obese') NOT NULL,
  `cms_account_ID` int(10) unsigned NOT NULL,
  `bmi_date_of_update` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `scms_bmi_rec`
--

INSERT INTO `scms_bmi_rec` (`bmi_no`, `height`, `weight`, `bmi`, `nutri_status`, `cms_account_ID`, `bmi_date_of_update`) VALUES
(6, '150', '40', 18, 'Wasted', 277, '2018-03-26'),
(7, '150', '56', 25, 'Normal', 278, '2018-03-26'),
(8, '151', '41', 18, 'Wasted', 279, '2018-03-26'),
(9, '151', '41', 18, 'Wasted', 280, '2018-03-26'),
(10, '151', '41', 18, 'Wasted', 271, '2018-03-26'),
(11, '151', '41', 18, 'Wasted', 272, '2018-03-26'),
(12, '151', '41', 18, 'Wasted', 273, '2018-03-26'),
(13, '151', '67', 29, 'Overweight', 281, '2018-03-26'),
(14, '155', '47', 20, 'Normal', 282, '2018-03-26'),
(15, '160', '46', 18, 'Wasted', 283, '2018-03-26'),
(16, '155', '46', 19, 'Normal', 284, '2018-03-26'),
(17, '150', '56', 25, 'Normal', 285, '2018-03-26'),
(18, '158', '61', 24, 'Normal', 286, '2018-03-26'),
(19, '150', '40', 18, 'Wasted', 287, '2018-03-26'),
(25, '150', '56', 25, 'Normal', 288, '2018-03-26'),
(26, '158', '60', 24, 'Normal', 289, '2018-03-26'),
(27, '155', '46', 19, 'Normal', 290, '2018-03-26'),
(28, '155', '46', 19, 'Normal', 291, '2018-03-26'),
(29, '155', '46', 19, 'Normal', 292, '2018-03-26'),
(30, '155', '46', 19, 'Normal', 293, '2018-03-26'),
(31, '155', '46', 19, 'Severely Wasted', 294, '2018-03-26'),
(32, '159', '38', 15, 'Severely Wasted', 295, '2018-03-26'),
(33, '150', '56', 26, 'Normal', 296, '2018-03-26'),
(34, '156', '40', 16, 'Wasted', 297, '2018-03-26'),
(35, '151', '41', 19, 'Normal', 298, '2018-03-26'),
(36, '155 ', '46', 20, 'Normal', 299, '2018-03-26'),
(37, '150', '56', 25, 'Normal', 300, '2018-03-26'),
(38, '160', '55', 21, 'Normal', 301, '2018-03-28'),
(39, '160', '55', 21, 'Normal', 303, '2018-03-28'),
(40, '160', '55', 21, 'Normal', 304, '2018-03-28'),
(41, '160', '55', 21, 'Normal', 305, '2018-03-28'),
(42, '150', '42', 19, 'Normal', 324, '2018-04-02');

-- --------------------------------------------------------

--
-- Table structure for table `scms_consultation`
--

CREATE TABLE IF NOT EXISTS `scms_consultation` (
  `patient_id` int(10) unsigned NOT NULL,
  `complaint` varchar(200) NOT NULL,
  `diagnosis` varchar(200) NOT NULL,
  `treatment` varchar(100) NOT NULL,
  `disposition` varchar(100) NOT NULL,
  `cons_date` date NOT NULL,
  `cons_time_in` varchar(20) NOT NULL,
  `cons_time_out` varchar(20) DEFAULT NULL,
  `cms_account_ID` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `scms_consultation`
--

INSERT INTO `scms_consultation` (`patient_id`, `complaint`, `diagnosis`, `treatment`, `disposition`, `cons_date`, `cons_time_in`, `cons_time_out`, `cms_account_ID`) VALUES
(1, 'chest tightness	', 'asthma', 'medicine intake	', 'Stay in clinic', '2017-09-18', '09:36:00', '11:30', 279),
(2, 'chest tightness	', 'asthma', 'medicine intake	', 'Stay in clinic', '2017-09-18', '09:36:00', '11:30', 280),
(3, 'chest tightness	', 'asthma', 'medicine intake	', 'Stay in clinic', '2017-09-18', '09:36:00', '11:30', 281),
(4, 'chest tightness	', 'asthma', 'medicine intake	', 'Stay in clinic', '2017-09-18', '09:36:00', '11:30', 282),
(5, 'chest tightness	', 'asthma', 'medicine intake	', 'Stay in clinic', '2017-09-18', '09:36:00', '11:30', 283),
(6, 'headache', 'fever', 'medicine intake', 'Back to classroom', '2018-03-28', '15:02', '15:20', 319),
(7, 'headache', 'fever', 'medicine intake', 'Send home', '2018-03-28', '13:02', '13:20', 75),
(8, 'stomachache', 'diarrhea', 'medicine intake', 'Send home', '2018-03-28', '13:20', '13:30', 275),
(9, 'stomachache', 'diarrhea', 'medicine intake', 'Send home', '2018-03-28', '13:20', '13:30', 279),
(10, 'stomachache', 'diarrhea', 'medicine intake', 'Send home', '2018-03-28', '13:20', '13:30', 316),
(11, 'stomachache', 'diarrhea', 'medicine intake', 'Back to classroom', '2018-03-28', '13:20', '13:30', 71),
(12, 'stomachache', 'diarrhea', 'medicine intake', 'Back to classroom', '2018-03-28', '09:45', '09:50', 292),
(13, 'stomachache', 'diarrhea', 'medicine intake', 'Back to classroom', '2018-03-28', '09:45', '09:50', 279),
(14, 'stomachache', 'diarrhea', 'medicine intake', 'Back to classroom', '2018-03-28', '09:45', '09:50', 276),
(15, 'stomachache', 'diarrhea', 'medicine intake', 'Back to classroom', '2018-03-28', '09:45', '22:00', 279),
(16, 'stomachache', 'diarrhea', 'medicine intake', 'Back to classroom', '2018-03-28', '13:20', '13:30', 279),
(17, 'Itchy butt', 'hemmoroids', 'sleep', 'Send home', '2018-03-28', '02:01', '14:06', 271),
(18, 'stomachache', 'diarrhea', 'medicine intake', 'Back to classroom', '2018-04-02', '09:30', '10:39', 276),
(19, 'headache', 'fever', 'check up and medicine intake', 'Back to classroom', '2018-04-02', '13:30', '13:45', 325),
(20, 'fever, coughing', 'flu', 'medicine intake and rest', 'Back to classroom', '2018-04-02', '10:30', '11:50', 279),
(21, 'flu', 'asthma', 'medicine intake and rest', 'Stay in clinic', '2018-04-02', '14:39', '', 279),
(22, 'stomachache', 'dysmenorrhea', 'medicine intake', 'Back to classroom', '2018-04-02', '14:00', '14:07', 279),
(23, 'headache', 'flu', 'medicine intake', 'Back to classroom', '2018-04-02', '15:12', '15:23', 317),
(24, 'headache', 'flu', 'medicine intake and rest', 'Back to classroom', '2018-04-02', '12:23', '13:24', 325),
(25, 'headache', 'fever', 'medicine intake', 'Back to classroom', '2018-04-03', '13:30', '13:45', 325),
(26, 'headache', 'fever', 'medicine intake', 'Back to classroom', '2018-04-04', '12:56', '13:12', 279);

-- --------------------------------------------------------

--
-- Table structure for table `scms_equipment`
--

CREATE TABLE IF NOT EXISTS `scms_equipment` (
  `equip_code` varchar(10) NOT NULL,
  `equip_name` varchar(50) NOT NULL,
  `equip_status` enum('Working fine','Needs replacement','Need repair') NOT NULL,
  `equip_stocks` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `scms_equipment`
--

INSERT INTO `scms_equipment` (`equip_code`, `equip_name`, `equip_status`, `equip_stocks`) VALUES
('11234', 'nebulizer', 'Working fine', 2),
('E012I12', 'Automatic BP', 'Working fine', 0),
('EE1111', 'wheelchair', 'Need repair', 1),
('EE1112', 'Sharps container	', 'Working fine', 5),
('EE1113', 'Stainless steel', 'Need repair', 5),
('EE1114', 'Weighing scale	', 'Need repair', 0),
('EE1115', '	Stethoscope', 'Working fine', 1);

-- --------------------------------------------------------

--
-- Table structure for table `scms_illness`
--

CREATE TABLE IF NOT EXISTS `scms_illness` (
  `illness_no` int(10) unsigned NOT NULL,
  `illness_name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `scms_illness`
--

INSERT INTO `scms_illness` (`illness_no`, `illness_name`) VALUES
(1, 'Diabetes'),
(2, 'Meningitis'),
(3, 'Tuberculosis'),
(4, 'Pneumonia'),
(5, 'Fainting Spells'),
(6, 'Heart Disorder'),
(7, 'Urinary Disorder'),
(8, 'Epilepsy/Seizures'),
(9, 'Scoliosis'),
(10, 'Psoriasis'),
(11, 'Vitiligo'),
(12, 'Atopic Dermatitis'),
(13, 'Impetigo');

-- --------------------------------------------------------

--
-- Table structure for table `scms_illness_hist_line`
--

CREATE TABLE IF NOT EXISTS `scms_illness_hist_line` (
  `history_no` int(10) unsigned NOT NULL,
  `medrec_id` int(10) unsigned NOT NULL,
  `illness_no` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `scms_illness_hist_line`
--

INSERT INTO `scms_illness_hist_line` (`history_no`, `medrec_id`, `illness_no`) VALUES
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5),
(6, 6, 4),
(7, 7, 1),
(8, 7, 4),
(9, 9, 5),
(10, 10, 1),
(11, 10, 2),
(12, 10, 3),
(13, 10, 4),
(14, 11, 1),
(16, 1, 1),
(17, 16, 1),
(18, 17, 1),
(19, 18, 1),
(20, 19, 3);

-- --------------------------------------------------------

--
-- Table structure for table `scms_immune_rec_line`
--

CREATE TABLE IF NOT EXISTS `scms_immune_rec_line` (
  `rec_no` int(10) unsigned NOT NULL,
  `medrec_id` int(10) unsigned NOT NULL,
  `vaccine_no` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `scms_immune_rec_line`
--

INSERT INTO `scms_immune_rec_line` (`rec_no`, `medrec_id`, `vaccine_no`) VALUES
(2, 2, 5),
(3, 3, 7),
(4, 4, 3),
(5, 5, 4),
(6, 6, 1),
(7, 6, 2),
(8, 6, 3),
(9, 6, 4),
(10, 6, 5),
(11, 6, 6),
(12, 6, 7),
(13, 6, 8),
(14, 6, 9),
(16, 7, 1),
(17, 7, 3),
(18, 7, 4),
(19, 7, 5),
(20, 7, 6),
(21, 7, 7),
(22, 7, 8),
(23, 7, 9),
(24, 7, 10),
(25, 9, 3),
(26, 9, 4),
(27, 9, 6),
(28, 9, 7),
(29, 9, 8),
(30, 9, 9),
(31, 9, 10),
(32, 10, 1),
(33, 10, 2),
(34, 10, 3),
(35, 10, 4),
(36, 11, 1),
(37, 11, 2),
(38, 11, 3),
(39, 11, 4),
(40, 11, 5),
(41, 11, 6),
(42, 11, 7),
(43, 11, 8),
(44, 11, 9),
(45, 11, 10),
(46, 12, 1),
(47, 12, 2),
(48, 12, 3),
(49, 12, 4),
(50, 12, 5),
(51, 12, 6),
(52, 12, 7),
(53, 12, 8),
(54, 12, 9),
(55, 12, 10),
(56, 1, 4),
(57, 13, 1),
(58, 13, 2),
(59, 13, 3),
(62, 16, 1),
(63, 16, 2),
(64, 17, 1),
(65, 17, 2),
(66, 18, 1),
(67, 18, 2),
(68, 19, 1),
(69, 19, 2),
(70, 19, 3);

-- --------------------------------------------------------

--
-- Table structure for table `scms_immunization`
--

CREATE TABLE IF NOT EXISTS `scms_immunization` (
  `vaccine_no` int(10) unsigned NOT NULL,
  `vaccine_name` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `scms_immunization`
--

INSERT INTO `scms_immunization` (`vaccine_no`, `vaccine_name`) VALUES
(1, 'DPT/DT'),
(2, 'Polio'),
(3, 'Measles'),
(4, 'Mumps'),
(5, 'Rubella'),
(6, 'Typhoid Injection'),
(7, 'Tetanus Booster	'),
(8, 'Hepatitis A'),
(9, 'Hepatitis B'),
(10, 'Varicella');

-- --------------------------------------------------------

--
-- Table structure for table `scms_medicine`
--

CREATE TABLE IF NOT EXISTS `scms_medicine` (
  `med_no` int(10) unsigned NOT NULL,
  `gen_name` varchar(100) DEFAULT NULL,
  `brand_name` varchar(100) NOT NULL,
  `stocks` int(10) unsigned NOT NULL,
  `exp_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1719 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `scms_medicine`
--

INSERT INTO `scms_medicine` (`med_no`, `gen_name`, `brand_name`, `stocks`, `exp_date`) VALUES
(10, 'Ibuprofen Paracetamol', 'Alaxan FR', 120, '2020-12-30'),
(11, 'Diphenhydramine HCI', 'Allerin', 100, '2020-11-02'),
(12, 'Cetirizine', 'Allerkid', 100, '2021-09-12'),
(13, 'Loratadine', 'Allerta', 100, '2021-09-12'),
(14, 'Mometasone Furoate', 'Allerta Dermatic', 100, '2021-09-12'),
(15, 'Cetirizine Dihydrochloride', 'Allerteen', 100, '2021-09-12'),
(18, 'Phenylephrine HCI', 'Bioflu', 94, '2021-09-12'),
(19, 'Paracetamol ', 'Biogesic', 96, '2021-09-12'),
(20, 'Loperamide', 'Diatabs', 90, '2022-01-11'),
(21, 'Mefenamic Acid', 'Dolfenal ', 98, '2021-10-02'),
(22, 'Ibuprofen', 'Medicol Advance', 100, '2022-01-11'),
(23, 'Paracetamol', 'Decolgen Forte', 100, '2021-10-02'),
(24, 'Enzyplex', 'Enzyplex', 100, '2022-01-11'),
(25, 'Ambroxol HCI', 'Expel OD', 100, '2021-10-02'),
(26, 'Iron Folix', 'Hemerate FA', 100, '2022-01-11'),
(27, 'Juvenaid', 'Juvenaid', 100, '2021-10-02'),
(28, 'Ibuprofen', 'Medical Advance 400', 100, '2022-01-11'),
(29, 'Ambroxol', 'Myracof', 100, '2021-10-02'),
(30, 'Paracetamol', 'Rexidol Forte', 100, '2022-01-11'),
(31, 'Paracetamol', 'Nafarin-A', 100, '2021-10-02'),
(32, 'Phenylephrine,Paracetamol', 'Neozep Forte', 97, '2022-01-11'),
(1617, 'Cetirizine Phenylephrine', 'Alnix Plus', 100, '2021-09-12'),
(1718, 'Cetirizine diHCI', 'Alnix', 100, '2021-09-12');

-- --------------------------------------------------------

--
-- Table structure for table `scms_medrec`
--

CREATE TABLE IF NOT EXISTS `scms_medrec` (
  `medrec_id` int(10) unsigned NOT NULL,
  `eyeglass` varchar(50) DEFAULT NULL,
  `ear_infection` varchar(50) DEFAULT NULL,
  `allergies` varchar(200) DEFAULT NULL,
  `eye_cond_desc` varchar(200) DEFAULT NULL,
  `ear_cond_desc` varchar(200) DEFAULT NULL,
  `emer_contact_name` varchar(50) NOT NULL,
  `emer_contact_no` varchar(11) NOT NULL,
  `relationship` varchar(50) DEFAULT NULL,
  `date_of_update` date NOT NULL,
  `cms_account_ID` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `scms_medrec`
--

INSERT INTO `scms_medrec` (`medrec_id`, `eyeglass`, `ear_infection`, `allergies`, `eye_cond_desc`, `ear_cond_desc`, `emer_contact_name`, `emer_contact_no`, `relationship`, `date_of_update`, `cms_account_ID`) VALUES
(1, 'Yes', 'Yes', 'Seafood', 'Myopia', 'Middle  earcondition', 'Ana Reyes', '4294967295', 'Guardian', '2018-04-03', 279),
(2, 'Yes', 'No', 'Pollen', 'Color blindness', '', 'Tim Cruz', '09294967295', 'Guardian', '2018-03-26', 280),
(3, 'Yes', 'No', 'Seafood', 'Farsighted', NULL, 'Helen Diaz', '4294967295', 'Guardian', '2018-03-26', 281),
(4, 'Yes', 'No', 'Pollen', 'Color blindness', NULL, 'Angel Bien', '4294967295', 'Guardian', '2018-03-26', 282),
(5, 'Yes', 'No', 'Seafood', 'Farsighted', NULL, 'Jose Chavit', '4294967295', 'Guardian', '2018-03-26', 283),
(6, 'Yes', 'Yes', 'shrimp, crab', 'Myopia', 'Middle Ear Infection', 'Karlo Arancillo', '09125678888', 'Brother', '2017-03-28', 278),
(7, 'No', 'No', 'milk', '', '', 'John Pacala', '09556564777', 'Sister', '2017-03-28', 78),
(9, 'No', 'No', '', '', '', 'Jane Francisco', '09999999231', 'Katulong', '2018-03-28', 324),
(10, 'Yes', 'No', 'seafood', 'farsighted', 'N/A', 'Lorna Herrera', '09123456781', 'Wife', '2018-04-02', 69),
(11, 'Yes', 'No', 'crab', 'Nearsighted', '', 'Nilda Ativo', '09125678881', 'Cousin', '2018-04-03', 318),
(12, 'Yes', 'No', 'crab', 'Nearsighted', '', 'Nilda Ativo', '09125678881', 'Cousin', '2018-04-03', 318),
(13, 'No', 'No', 'milk', '', '', 'John Pacala', '09556564777', 'Sister', '2018-04-03', 78),
(16, 'Yes', 'Yes', 'shrimp, crab', 'Myopia', 'Middle Ear Infection', 'Karlo Arancillo', '09125678888', 'Brother', '2018-04-03', 278),
(17, 'No', 'No', 'seafood', '', '', 'Bea Solis', '09123456666', 'Wife', '2018-04-03', 70),
(18, 'No', 'No', 'seafood', '', '', 'Paula Lustria', '09123455667', 'Sister', '2018-04-04', 274),
(19, 'No', 'No', 'Pollen', '', '', 'Bryan llanera', '09123456782', 'father', '2018-04-04', 305);

-- --------------------------------------------------------

--
-- Table structure for table `scms_prescription`
--

CREATE TABLE IF NOT EXISTS `scms_prescription` (
  `pre_id` int(10) unsigned NOT NULL,
  `patient_id` int(10) unsigned NOT NULL,
  `med_no` int(10) unsigned NOT NULL,
  `pres_qty` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `scms_prescription`
--

INSERT INTO `scms_prescription` (`pre_id`, `patient_id`, `med_no`, `pres_qty`) VALUES
(1, 1, 10, 1),
(2, 2, 11, 2),
(3, 3, 12, 1),
(4, 4, 13, 1),
(5, 6, 18, 1),
(6, 7, 19, 1),
(7, 8, 20, 1),
(8, 9, 20, 1),
(9, 10, 20, 1),
(10, 11, 20, 1),
(11, 12, 20, 1),
(12, 13, 20, 1),
(13, 14, 20, 1),
(14, 15, 20, 1),
(15, 16, 20, 1),
(16, 17, 32, 2),
(17, 18, 20, 1),
(18, 19, 19, 1),
(19, 20, 32, 1),
(20, 20, 19, 1),
(21, 21, 18, 1),
(22, 22, 21, 2),
(23, 23, 18, 2),
(24, 24, 18, 1),
(25, 25, 19, 1),
(26, 26, 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `scms_supplies`
--

CREATE TABLE IF NOT EXISTS `scms_supplies` (
  `supp_no` int(10) unsigned NOT NULL,
  `supp_name` varchar(25) NOT NULL,
  `supp_stocks` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `scms_supplies`
--

INSERT INTO `scms_supplies` (`supp_no`, `supp_name`, `supp_stocks`) VALUES
(5, 'alcohol swabs', 50),
(6, 'disposable gloves', 50),
(7, 'disposable glove', 50),
(8, 'Gauze bandages', 50),
(9, 'Medical tape', 50),
(10, 'Ace bandages', 49),
(11, 'Tongue depressors', 0),
(12, 'Hand sanitizer', 50),
(13, 'Chlorox wipes', 50),
(14, 'Paper exam gowns', 50);

-- --------------------------------------------------------

--
-- Table structure for table `sis_attendance`
--

CREATE TABLE IF NOT EXISTS `sis_attendance` (
  `attend_id` int(20) unsigned NOT NULL,
  `attend_month` enum('January','February','March','April','May','June','July','August','September','October','November','December') NOT NULL,
  `total_days_present` int(5) unsigned NOT NULL,
  `total_days_absent` int(5) unsigned NOT NULL,
  `rec_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=200 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sis_attendance`
--

INSERT INTO `sis_attendance` (`attend_id`, `attend_month`, `total_days_present`, `total_days_absent`, `rec_id`) VALUES
(70, 'June', 19, 2, 175),
(71, 'July', 19, 2, 175),
(72, 'August', 19, 2, 175),
(73, 'June', 19, 2, 176),
(74, 'July', 19, 2, 176),
(75, 'August', 19, 2, 176),
(76, 'June', 15, 6, 220),
(77, 'July', 15, 6, 220),
(78, 'August', 15, 6, 220),
(79, 'June', 18, 3, 167),
(80, 'July', 22, 0, 167),
(81, 'August', 18, 2, 167),
(82, 'June', 18, 3, 169),
(83, 'July', 22, 0, 169),
(84, 'August', 18, 2, 169),
(85, 'June', 18, 3, 168),
(86, 'July', 22, 0, 168),
(87, 'August', 18, 2, 168),
(88, 'June', 19, 2, 197),
(89, 'July', 19, 2, 197),
(90, 'August', 19, 2, 197),
(91, 'June', 19, 2, 199),
(92, 'July', 19, 2, 199),
(93, 'August', 19, 2, 199),
(95, 'July', 15, 6, 200),
(96, 'August', 15, 6, 200),
(98, 'July', 18, 3, 201),
(99, 'August', 18, 3, 201),
(100, 'September', 19, 2, 175),
(101, 'October', 19, 2, 175),
(102, 'September', 19, 2, 176),
(103, 'October', 19, 2, 176),
(104, 'September', 15, 6, 220),
(105, 'October', 15, 6, 220),
(106, 'September', 18, 3, 167),
(107, 'October', 22, 0, 167),
(108, 'September', 18, 3, 169),
(109, 'October', 22, 0, 169),
(110, 'September', 18, 3, 168),
(111, 'October', 22, 0, 168),
(112, 'September', 19, 2, 197),
(113, 'October', 19, 2, 197),
(114, 'September', 19, 2, 199),
(115, 'October', 19, 2, 199),
(116, 'September', 15, 6, 200),
(117, 'October', 15, 6, 200),
(118, 'September', 18, 3, 201),
(119, 'October', 18, 3, 201),
(120, 'November', 19, 2, 175),
(121, 'December', 19, 2, 175),
(122, 'January', 19, 2, 175),
(123, 'November', 19, 2, 176),
(124, 'December', 19, 2, 176),
(125, 'January', 19, 2, 176),
(126, 'November', 15, 6, 220),
(127, 'December', 15, 6, 220),
(128, 'January', 15, 6, 220),
(129, 'November', 18, 3, 167),
(130, 'December', 22, 0, 167),
(131, 'January', 18, 2, 167),
(132, 'November', 18, 3, 169),
(133, 'December', 22, 0, 169),
(134, 'January', 18, 2, 169),
(135, 'November', 18, 3, 168),
(136, 'December', 22, 0, 168),
(137, 'January', 18, 2, 168),
(138, 'November', 19, 2, 197),
(139, 'December', 19, 2, 197),
(140, 'January', 19, 2, 197),
(141, 'November', 19, 2, 199),
(142, 'December', 19, 2, 199),
(143, 'January', 19, 2, 199),
(144, 'November', 15, 6, 200),
(145, 'December', 15, 6, 200),
(146, 'January', 15, 6, 200),
(147, 'November', 18, 3, 201),
(148, 'December', 18, 3, 201),
(149, 'January', 18, 3, 201),
(150, 'February', 19, 2, 175),
(151, 'March', 19, 2, 175),
(152, 'February', 19, 2, 176),
(153, 'March', 19, 2, 176),
(154, 'February', 15, 6, 220),
(155, 'March', 15, 6, 220),
(156, 'February', 18, 3, 167),
(157, 'March', 22, 0, 167),
(158, 'February', 18, 3, 169),
(159, 'March', 22, 0, 169),
(160, 'February', 18, 3, 168),
(161, 'March', 22, 0, 168),
(162, 'February', 19, 2, 197),
(163, 'March', 19, 2, 197),
(164, 'February', 19, 2, 199),
(165, 'March', 19, 2, 199),
(166, 'February', 15, 6, 200),
(167, 'March', 15, 6, 200),
(168, 'February', 18, 3, 201),
(169, 'March', 18, 3, 201),
(171, 'July', 19, 2, 175),
(172, 'August', 19, 2, 175),
(174, 'July', 19, 2, 176),
(175, 'August', 19, 2, 176),
(177, 'July', 15, 6, 220),
(178, 'August', 15, 6, 220),
(180, 'July', 22, 0, 167),
(181, 'August', 18, 2, 167),
(183, 'July', 22, 0, 169),
(184, 'August', 18, 2, 169),
(186, 'July', 22, 0, 168),
(187, 'August', 18, 2, 168),
(189, 'July', 19, 2, 197),
(190, 'August', 19, 2, 197),
(192, 'July', 19, 2, 199),
(193, 'August', 19, 2, 199),
(195, 'July', 15, 6, 200),
(196, 'August', 15, 6, 200),
(198, 'July', 18, 3, 201),
(199, 'August', 18, 3, 201);

-- --------------------------------------------------------

--
-- Table structure for table `sis_cv`
--

CREATE TABLE IF NOT EXISTS `sis_cv` (
  `cv_id` int(15) unsigned NOT NULL,
  `rec_id` int(15) unsigned NOT NULL,
  `sis_cv_quarter` enum('1st','2nd','3rd','4th') NOT NULL,
  `cv_1_1` varchar(5) NOT NULL DEFAULT 'NO',
  `cv_1_2` varchar(5) NOT NULL DEFAULT 'NO',
  `cv_2_1` varchar(5) NOT NULL DEFAULT 'NO',
  `cv_2_2` varchar(5) NOT NULL DEFAULT 'NO',
  `cv_3` varchar(5) NOT NULL DEFAULT 'NO',
  `cv_4_1` varchar(5) NOT NULL DEFAULT 'NO',
  `cv_4_2` varchar(5) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sis_cv`
--

INSERT INTO `sis_cv` (`cv_id`, `rec_id`, `sis_cv_quarter`, `cv_1_1`, `cv_1_2`, `cv_2_1`, `cv_2_2`, `cv_3`, `cv_4_1`, `cv_4_2`) VALUES
(1, 175, '1st', 'AO', 'AO', 'AO', 'AO', 'AO', 'AO', 'AO'),
(2, 175, '2nd', 'AO', 'AO', 'AO', 'AO', 'AO', 'AO', 'AO'),
(3, 175, '3rd', 'AO', 'AO', 'AO', 'AO', 'AO', 'AO', 'AO'),
(4, 175, '4th', 'AO', 'AO', 'AO', 'AO', 'AO', 'AO', 'AO');

-- --------------------------------------------------------

--
-- Table structure for table `sis_f137_rel`
--

CREATE TABLE IF NOT EXISTS `sis_f137_rel` (
  `f137_id` int(10) unsigned NOT NULL,
  `lrn` int(10) unsigned NOT NULL,
  `date_rel` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sis_f137_rel`
--

INSERT INTO `sis_f137_rel` (`f137_id`, `lrn`, `date_rel`) VALUES
(1, 1101, '2018-04-02'),
(2, 1101, '2018-04-03'),
(3, 1101, '2018-04-03'),
(4, 1101, '2018-04-03'),
(5, 1101, '2018-04-03'),
(6, 1101, '2018-04-03'),
(7, 1101, '2018-04-04');

-- --------------------------------------------------------

--
-- Table structure for table `sis_grade`
--

CREATE TABLE IF NOT EXISTS `sis_grade` (
  `grade_id` int(15) unsigned NOT NULL,
  `rec_id` int(15) unsigned NOT NULL,
  `subject_id` int(10) unsigned DEFAULT NULL,
  `grade_val` int(5) unsigned NOT NULL,
  `grade_remarks` enum('Passed','Failed') NOT NULL,
  `sis_grade_quarter` enum('1st','2nd','3rd','4th','Average','Final') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=563 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sis_grade`
--

INSERT INTO `sis_grade` (`grade_id`, `rec_id`, `subject_id`, `grade_val`, `grade_remarks`, `sis_grade_quarter`) VALUES
(37, 175, 50003, 13, 'Passed', '1st'),
(38, 176, 50003, 78, 'Passed', '1st'),
(39, 220, 50003, 81, 'Passed', '1st'),
(40, 167, 50003, 82, 'Passed', '1st'),
(41, 169, 50003, 58, 'Failed', '1st'),
(42, 168, 50003, 82, 'Passed', '1st'),
(43, 197, 50003, 88, 'Passed', '1st'),
(44, 199, 50003, 90, 'Passed', '1st'),
(45, 200, 50003, 74, 'Failed', '1st'),
(46, 201, 50003, 70, 'Failed', '1st'),
(47, 175, 50003, 84, 'Passed', '2nd'),
(48, 176, 50003, 78, 'Passed', '2nd'),
(49, 220, 50003, 81, 'Passed', '2nd'),
(50, 167, 50003, 82, 'Passed', '2nd'),
(51, 169, 50003, 58, 'Failed', '2nd'),
(52, 168, 50003, 82, 'Passed', '2nd'),
(53, 197, 50003, 88, 'Passed', '2nd'),
(54, 199, 50003, 90, 'Passed', '2nd'),
(55, 200, 50003, 74, 'Failed', '2nd'),
(56, 201, 50003, 70, 'Failed', '2nd'),
(57, 175, 50003, 84, 'Passed', '3rd'),
(58, 176, 50003, 78, 'Passed', '3rd'),
(59, 220, 50003, 81, 'Passed', '3rd'),
(60, 167, 50003, 82, 'Passed', '3rd'),
(61, 169, 50003, 58, 'Failed', '3rd'),
(62, 168, 50003, 82, 'Passed', '3rd'),
(63, 197, 50003, 88, 'Passed', '3rd'),
(64, 199, 50003, 90, 'Passed', '3rd'),
(65, 200, 50003, 74, 'Failed', '3rd'),
(66, 201, 50003, 70, 'Failed', '3rd'),
(67, 175, 50003, 75, 'Passed', '4th'),
(68, 176, 50003, 78, 'Passed', '4th'),
(69, 220, 50003, 81, 'Passed', '4th'),
(70, 167, 50003, 82, 'Passed', '4th'),
(71, 169, 50003, 58, 'Failed', '4th'),
(72, 168, 50003, 82, 'Passed', '4th'),
(73, 197, 50003, 88, 'Passed', '4th'),
(74, 199, 50003, 90, 'Passed', '4th'),
(75, 200, 50003, 74, 'Failed', '4th'),
(76, 201, 50003, 70, 'Failed', '4th'),
(77, 175, 50003, 84, 'Passed', 'Average'),
(78, 176, 50003, 78, 'Passed', 'Average'),
(79, 220, 50003, 81, 'Passed', 'Average'),
(80, 167, 50003, 82, 'Passed', 'Average'),
(81, 169, 50003, 58, 'Failed', 'Average'),
(82, 168, 50003, 82, 'Passed', 'Average'),
(83, 197, 50003, 88, 'Passed', 'Average'),
(84, 199, 50003, 90, 'Passed', 'Average'),
(85, 200, 50003, 74, 'Failed', 'Average'),
(86, 201, 50003, 70, 'Failed', 'Average'),
(87, 175, 50006, 84, 'Passed', '1st'),
(88, 176, 50006, 78, 'Passed', '1st'),
(89, 220, 50006, 81, 'Passed', '1st'),
(90, 167, 50006, 82, 'Passed', '1st'),
(91, 169, 50006, 58, 'Failed', '1st'),
(92, 168, 50006, 82, 'Passed', '1st'),
(93, 197, 50006, 88, 'Passed', '1st'),
(94, 199, 50006, 90, 'Passed', '1st'),
(95, 200, 50006, 74, 'Failed', '1st'),
(96, 201, 50006, 70, 'Failed', '1st'),
(97, 175, 50006, 99, 'Passed', '2nd'),
(98, 176, 50006, 78, 'Passed', '2nd'),
(99, 220, 50006, 81, 'Passed', '2nd'),
(100, 167, 50006, 82, 'Passed', '2nd'),
(101, 169, 50006, 58, 'Failed', '2nd'),
(102, 168, 50006, 82, 'Passed', '2nd'),
(103, 197, 50006, 88, 'Passed', '2nd'),
(104, 199, 50006, 90, 'Passed', '2nd'),
(105, 200, 50006, 74, 'Failed', '2nd'),
(106, 201, 50006, 70, 'Failed', '2nd'),
(107, 175, 50006, 84, 'Passed', '3rd'),
(108, 176, 50006, 78, 'Passed', '3rd'),
(109, 220, 50006, 81, 'Passed', '3rd'),
(110, 167, 50006, 82, 'Passed', '3rd'),
(111, 169, 50006, 58, 'Failed', '3rd'),
(112, 168, 50006, 82, 'Passed', '3rd'),
(113, 197, 50006, 88, 'Passed', '3rd'),
(114, 199, 50006, 90, 'Passed', '3rd'),
(115, 200, 50006, 74, 'Failed', '3rd'),
(116, 201, 50006, 70, 'Failed', '3rd'),
(117, 175, 50006, 84, 'Passed', '4th'),
(118, 176, 50006, 78, 'Passed', '4th'),
(119, 220, 50006, 81, 'Passed', '4th'),
(120, 167, 50006, 82, 'Passed', '4th'),
(121, 169, 50006, 58, 'Failed', '4th'),
(122, 168, 50006, 82, 'Passed', '4th'),
(123, 197, 50006, 88, 'Passed', '4th'),
(124, 199, 50006, 90, 'Passed', '4th'),
(125, 200, 50006, 74, 'Failed', '4th'),
(126, 201, 50006, 70, 'Failed', '4th'),
(127, 175, 50006, 84, 'Passed', 'Average'),
(128, 176, 50006, 78, 'Passed', 'Average'),
(129, 220, 50006, 81, 'Passed', 'Average'),
(130, 167, 50006, 82, 'Passed', 'Average'),
(131, 169, 50006, 58, 'Failed', 'Average'),
(132, 168, 50006, 82, 'Passed', 'Average'),
(133, 197, 50006, 88, 'Passed', 'Average'),
(134, 199, 50006, 90, 'Passed', 'Average'),
(135, 200, 50006, 74, 'Failed', 'Average'),
(136, 201, 50006, 70, 'Failed', 'Average'),
(137, 175, 50013, 84, 'Passed', '1st'),
(138, 176, 50013, 78, 'Passed', '1st'),
(139, 220, 50013, 81, 'Passed', '1st'),
(140, 167, 50013, 82, 'Passed', '1st'),
(141, 169, 50013, 58, 'Failed', '1st'),
(142, 168, 50013, 82, 'Passed', '1st'),
(143, 197, 50013, 88, 'Passed', '1st'),
(144, 199, 50013, 90, 'Passed', '1st'),
(145, 200, 50013, 74, 'Failed', '1st'),
(146, 201, 50013, 70, 'Failed', '1st'),
(147, 175, 50013, 84, 'Passed', '2nd'),
(148, 176, 50013, 78, 'Passed', '2nd'),
(149, 220, 50013, 81, 'Passed', '2nd'),
(150, 167, 50013, 82, 'Passed', '2nd'),
(151, 169, 50013, 58, 'Failed', '2nd'),
(152, 168, 50013, 82, 'Passed', '2nd'),
(153, 197, 50013, 88, 'Passed', '2nd'),
(154, 199, 50013, 90, 'Passed', '2nd'),
(155, 200, 50013, 74, 'Failed', '2nd'),
(156, 201, 50013, 70, 'Failed', '2nd'),
(157, 175, 50013, 84, 'Passed', '3rd'),
(158, 176, 50013, 78, 'Passed', '3rd'),
(159, 220, 50013, 81, 'Passed', '3rd'),
(160, 167, 50013, 82, 'Passed', '3rd'),
(161, 169, 50013, 58, 'Failed', '3rd'),
(162, 168, 50013, 82, 'Passed', '3rd'),
(163, 197, 50013, 88, 'Passed', '3rd'),
(164, 199, 50013, 90, 'Passed', '3rd'),
(165, 200, 50013, 74, 'Failed', '3rd'),
(166, 201, 50013, 70, 'Failed', '3rd'),
(167, 175, 50013, 84, 'Passed', '4th'),
(168, 176, 50013, 78, 'Passed', '4th'),
(169, 220, 50013, 81, 'Passed', '4th'),
(170, 167, 50013, 82, 'Passed', '4th'),
(171, 169, 50013, 58, 'Failed', '4th'),
(172, 168, 50013, 82, 'Passed', '4th'),
(173, 197, 50013, 88, 'Passed', '4th'),
(174, 199, 50013, 90, 'Passed', '4th'),
(175, 200, 50013, 74, 'Failed', '4th'),
(176, 201, 50013, 70, 'Failed', '4th'),
(177, 175, 50013, 84, 'Passed', 'Average'),
(178, 176, 50013, 78, 'Passed', 'Average'),
(179, 220, 50013, 81, 'Passed', 'Average'),
(180, 167, 50013, 82, 'Passed', 'Average'),
(181, 169, 50013, 58, 'Failed', 'Average'),
(182, 168, 50013, 82, 'Passed', 'Average'),
(183, 197, 50013, 88, 'Passed', 'Average'),
(184, 199, 50013, 90, 'Passed', 'Average'),
(185, 200, 50013, 74, 'Failed', 'Average'),
(186, 201, 50013, 70, 'Failed', 'Average'),
(187, 175, 50007, 84, 'Passed', '1st'),
(188, 176, 50007, 78, 'Passed', '1st'),
(189, 220, 50007, 81, 'Passed', '1st'),
(190, 167, 50007, 82, 'Passed', '1st'),
(191, 169, 50007, 58, 'Failed', '1st'),
(192, 168, 50007, 82, 'Passed', '1st'),
(193, 197, 50007, 88, 'Passed', '1st'),
(194, 199, 50007, 90, 'Passed', '1st'),
(195, 200, 50007, 74, 'Failed', '1st'),
(196, 201, 50007, 70, 'Failed', '1st'),
(197, 175, 50007, 84, 'Passed', '2nd'),
(198, 176, 50007, 78, 'Passed', '2nd'),
(199, 220, 50007, 81, 'Passed', '2nd'),
(200, 167, 50007, 82, 'Passed', '2nd'),
(201, 169, 50007, 58, 'Failed', '2nd'),
(202, 168, 50007, 82, 'Passed', '2nd'),
(203, 197, 50007, 88, 'Passed', '2nd'),
(204, 199, 50007, 90, 'Passed', '2nd'),
(205, 200, 50007, 74, 'Failed', '2nd'),
(206, 201, 50007, 70, 'Failed', '2nd'),
(207, 175, 50007, 84, 'Passed', '3rd'),
(208, 176, 50007, 78, 'Passed', '3rd'),
(209, 220, 50007, 81, 'Passed', '3rd'),
(210, 167, 50007, 82, 'Passed', '3rd'),
(211, 169, 50007, 58, 'Failed', '3rd'),
(212, 168, 50007, 82, 'Passed', '3rd'),
(213, 197, 50007, 88, 'Passed', '3rd'),
(214, 199, 50007, 90, 'Passed', '3rd'),
(215, 200, 50007, 74, 'Failed', '3rd'),
(216, 201, 50007, 70, 'Failed', '3rd'),
(217, 175, 50007, 84, 'Passed', '4th'),
(218, 176, 50007, 78, 'Passed', '4th'),
(219, 220, 50007, 81, 'Passed', '4th'),
(220, 167, 50007, 82, 'Passed', '4th'),
(221, 169, 50007, 58, 'Failed', '4th'),
(222, 168, 50007, 82, 'Passed', '4th'),
(223, 197, 50007, 88, 'Passed', '4th'),
(224, 199, 50007, 90, 'Passed', '4th'),
(225, 200, 50007, 74, 'Failed', '4th'),
(226, 201, 50007, 70, 'Failed', '4th'),
(227, 175, 50007, 90, 'Passed', 'Average'),
(228, 176, 50007, 78, 'Passed', 'Average'),
(229, 220, 50007, 81, 'Passed', 'Average'),
(230, 167, 50007, 82, 'Passed', 'Average'),
(231, 169, 50007, 58, 'Failed', 'Average'),
(232, 168, 50007, 82, 'Passed', 'Average'),
(233, 197, 50007, 88, 'Passed', 'Average'),
(234, 199, 50007, 90, 'Passed', 'Average'),
(235, 200, 50007, 74, 'Failed', 'Average'),
(236, 201, 50007, 70, 'Failed', 'Average'),
(237, 175, 50001, 87, 'Passed', '1st'),
(238, 176, 50001, 78, 'Passed', '1st'),
(239, 220, 50001, 81, 'Passed', '1st'),
(240, 167, 50001, 82, 'Passed', '1st'),
(241, 169, 50001, 58, 'Failed', '1st'),
(242, 168, 50001, 82, 'Passed', '1st'),
(243, 197, 50001, 88, 'Passed', '1st'),
(244, 199, 50001, 90, 'Passed', '1st'),
(245, 200, 50001, 74, 'Failed', '1st'),
(246, 201, 50001, 70, 'Failed', '1st'),
(247, 175, 50001, 84, 'Passed', '2nd'),
(248, 176, 50001, 78, 'Passed', '2nd'),
(249, 220, 50001, 81, 'Passed', '2nd'),
(250, 167, 50001, 82, 'Passed', '2nd'),
(251, 169, 50001, 58, 'Failed', '2nd'),
(252, 168, 50001, 82, 'Passed', '2nd'),
(253, 197, 50001, 88, 'Passed', '2nd'),
(254, 199, 50001, 90, 'Passed', '2nd'),
(255, 200, 50001, 74, 'Failed', '2nd'),
(256, 201, 50001, 70, 'Failed', '2nd'),
(367, 175, 50001, 84, 'Passed', '4th'),
(368, 176, 50001, 78, 'Passed', '4th'),
(369, 220, 50001, 81, 'Passed', '4th'),
(370, 167, 50001, 82, 'Passed', '4th'),
(371, 169, 50001, 58, 'Failed', '4th'),
(372, 168, 50001, 82, 'Passed', '4th'),
(373, 197, 50001, 88, 'Passed', '4th'),
(374, 199, 50001, 90, 'Passed', '4th'),
(375, 200, 50001, 74, 'Failed', '4th'),
(376, 201, 50001, 70, 'Failed', '4th'),
(377, 175, 50001, 84, 'Passed', 'Average'),
(378, 176, 50001, 78, 'Passed', 'Average'),
(379, 220, 50001, 81, 'Passed', 'Average'),
(380, 167, 50001, 82, 'Passed', 'Average'),
(381, 169, 50001, 58, 'Failed', 'Average'),
(382, 168, 50001, 82, 'Passed', 'Average'),
(383, 197, 50001, 88, 'Passed', 'Average'),
(384, 199, 50001, 90, 'Passed', 'Average'),
(385, 200, 50001, 74, 'Failed', 'Average'),
(386, 201, 50001, 70, 'Failed', 'Average'),
(387, 175, 50011, 84, 'Passed', '1st'),
(388, 176, 50011, 78, 'Passed', '1st'),
(389, 220, 50011, 81, 'Passed', '1st'),
(390, 167, 50011, 82, 'Passed', '1st'),
(391, 169, 50011, 58, 'Failed', '1st'),
(392, 168, 50011, 82, 'Passed', '1st'),
(393, 197, 50011, 88, 'Passed', '1st'),
(394, 199, 50011, 90, 'Passed', '1st'),
(395, 200, 50011, 74, 'Failed', '1st'),
(396, 201, 50011, 70, 'Failed', '1st'),
(397, 175, 50011, 84, 'Passed', '2nd'),
(398, 176, 50011, 78, 'Passed', '2nd'),
(399, 220, 50011, 81, 'Passed', '2nd'),
(400, 167, 50011, 82, 'Passed', '2nd'),
(401, 169, 50011, 58, 'Failed', '2nd'),
(402, 168, 50011, 82, 'Passed', '2nd'),
(403, 197, 50011, 88, 'Passed', '2nd'),
(404, 199, 50011, 90, 'Passed', '2nd'),
(405, 200, 50011, 74, 'Failed', '2nd'),
(406, 201, 50011, 70, 'Failed', '2nd'),
(407, 175, 50011, 84, 'Passed', '3rd'),
(408, 176, 50011, 78, 'Passed', '3rd'),
(409, 220, 50011, 81, 'Passed', '3rd'),
(410, 167, 50011, 82, 'Passed', '3rd'),
(411, 169, 50011, 58, 'Failed', '3rd'),
(412, 168, 50011, 82, 'Passed', '3rd'),
(413, 197, 50011, 88, 'Passed', '3rd'),
(414, 199, 50011, 90, 'Passed', '3rd'),
(415, 200, 50011, 74, 'Failed', '3rd'),
(416, 201, 50011, 70, 'Failed', '3rd'),
(417, 175, 50011, 84, 'Passed', '4th'),
(418, 176, 50011, 78, 'Passed', '4th'),
(419, 220, 50011, 81, 'Passed', '4th'),
(420, 167, 50011, 82, 'Passed', '4th'),
(421, 169, 50011, 58, 'Failed', '4th'),
(422, 168, 50011, 82, 'Passed', '4th'),
(423, 197, 50011, 88, 'Passed', '4th'),
(424, 199, 50011, 90, 'Passed', '4th'),
(425, 200, 50011, 74, 'Failed', '4th'),
(426, 201, 50011, 70, 'Failed', '4th'),
(427, 175, 50011, 84, 'Passed', 'Average'),
(428, 176, 50011, 78, 'Passed', 'Average'),
(429, 220, 50011, 81, 'Passed', 'Average'),
(430, 167, 50011, 82, 'Passed', 'Average'),
(431, 169, 50011, 58, 'Failed', 'Average'),
(432, 168, 50011, 82, 'Passed', 'Average'),
(433, 197, 50011, 88, 'Passed', 'Average'),
(434, 199, 50011, 90, 'Passed', 'Average'),
(435, 200, 50011, 74, 'Failed', 'Average'),
(436, 201, 50011, 70, 'Failed', 'Average'),
(437, 175, 50004, 84, 'Passed', '1st'),
(438, 176, 50004, 78, 'Passed', '1st'),
(439, 220, 50004, 81, 'Passed', '1st'),
(440, 167, 50004, 82, 'Passed', '1st'),
(441, 169, 50004, 58, 'Failed', '1st'),
(442, 168, 50004, 82, 'Passed', '1st'),
(443, 197, 50004, 88, 'Passed', '1st'),
(444, 199, 50004, 90, 'Passed', '1st'),
(445, 200, 50004, 74, 'Failed', '1st'),
(446, 201, 50004, 70, 'Failed', '1st'),
(447, 175, 50004, 84, 'Passed', '2nd'),
(448, 176, 50004, 78, 'Passed', '2nd'),
(449, 220, 50004, 81, 'Passed', '2nd'),
(450, 167, 50004, 82, 'Passed', '2nd'),
(451, 169, 50004, 58, 'Failed', '2nd'),
(452, 168, 50004, 82, 'Passed', '2nd'),
(453, 197, 50004, 88, 'Passed', '2nd'),
(454, 199, 50004, 90, 'Passed', '2nd'),
(455, 200, 50004, 74, 'Failed', '2nd'),
(456, 201, 50004, 70, 'Failed', '2nd'),
(457, 175, 50004, 14, 'Passed', '3rd'),
(458, 176, 50004, 78, 'Passed', '3rd'),
(459, 220, 50004, 81, 'Passed', '3rd'),
(460, 167, 50004, 82, 'Passed', '3rd'),
(461, 169, 50004, 58, 'Failed', '3rd'),
(462, 168, 50004, 82, 'Passed', '3rd'),
(463, 197, 50004, 88, 'Passed', '3rd'),
(464, 199, 50004, 90, 'Passed', '3rd'),
(465, 200, 50004, 74, 'Failed', '3rd'),
(466, 201, 50004, 70, 'Failed', '3rd'),
(467, 175, 50004, 76, 'Passed', '4th'),
(468, 176, 50004, 78, 'Passed', '4th'),
(469, 220, 50004, 81, 'Passed', '4th'),
(470, 167, 50004, 82, 'Passed', '4th'),
(471, 169, 50004, 58, 'Failed', '4th'),
(472, 168, 50004, 82, 'Passed', '4th'),
(473, 197, 50004, 88, 'Passed', '4th'),
(474, 199, 50004, 90, 'Passed', '4th'),
(475, 200, 50004, 74, 'Failed', '4th'),
(476, 201, 50004, 70, 'Failed', '4th'),
(477, 175, 50004, 84, 'Passed', 'Average'),
(478, 176, 50004, 78, 'Passed', 'Average'),
(479, 220, 50004, 81, 'Passed', 'Average'),
(480, 167, 50004, 82, 'Passed', 'Average'),
(481, 169, 50004, 58, 'Failed', 'Average'),
(482, 168, 50004, 82, 'Passed', 'Average'),
(483, 197, 50004, 88, 'Passed', 'Average'),
(484, 199, 50004, 90, 'Passed', 'Average'),
(485, 200, 50004, 74, 'Failed', 'Average'),
(486, 201, 50004, 70, 'Failed', 'Average'),
(487, 175, 50002, 84, 'Passed', '1st'),
(488, 176, 50002, 78, 'Passed', '1st'),
(489, 220, 50002, 81, 'Passed', '1st'),
(490, 167, 50002, 82, 'Passed', '1st'),
(491, 169, 50002, 58, 'Failed', '1st'),
(492, 168, 50002, 82, 'Passed', '1st'),
(493, 197, 50002, 88, 'Passed', '1st'),
(494, 199, 50002, 90, 'Passed', '1st'),
(495, 200, 50002, 74, 'Failed', '1st'),
(496, 201, 50002, 70, 'Failed', '1st'),
(497, 175, 50002, 84, 'Passed', '2nd'),
(498, 176, 50002, 78, 'Passed', '2nd'),
(499, 220, 50002, 81, 'Passed', '2nd'),
(500, 167, 50002, 82, 'Passed', '2nd'),
(501, 169, 50002, 58, 'Failed', '2nd'),
(502, 168, 50002, 82, 'Passed', '2nd'),
(503, 197, 50002, 88, 'Passed', '2nd'),
(504, 199, 50002, 90, 'Passed', '2nd'),
(505, 200, 50002, 74, 'Failed', '2nd'),
(506, 201, 50002, 70, 'Failed', '2nd'),
(507, 175, 50002, 84, 'Passed', '3rd'),
(508, 176, 50002, 78, 'Passed', '3rd'),
(509, 220, 50002, 81, 'Passed', '3rd'),
(510, 167, 50002, 82, 'Passed', '3rd'),
(511, 169, 50002, 58, 'Failed', '3rd'),
(512, 168, 50002, 82, 'Passed', '3rd'),
(513, 197, 50002, 88, 'Passed', '3rd'),
(514, 199, 50002, 90, 'Passed', '3rd'),
(515, 200, 50002, 74, 'Failed', '3rd'),
(516, 201, 50002, 70, 'Failed', '3rd'),
(517, 175, 50002, 12, 'Passed', '4th'),
(518, 176, 50002, 78, 'Passed', '4th'),
(519, 220, 50002, 81, 'Passed', '4th'),
(520, 167, 50002, 82, 'Passed', '4th'),
(521, 169, 50002, 58, 'Failed', '4th'),
(522, 168, 50002, 82, 'Passed', '4th'),
(523, 197, 50002, 88, 'Passed', '4th'),
(524, 199, 50002, 90, 'Passed', '4th'),
(525, 200, 50002, 74, 'Failed', '4th'),
(526, 201, 50002, 70, 'Failed', '4th'),
(527, 175, 50002, 84, 'Passed', 'Average'),
(528, 176, 50002, 78, 'Passed', 'Average'),
(529, 220, 50002, 81, 'Passed', 'Average'),
(530, 167, 50002, 82, 'Passed', 'Average'),
(531, 169, 50002, 58, 'Failed', 'Average'),
(532, 168, 50002, 82, 'Passed', 'Average'),
(533, 197, 50002, 88, 'Passed', 'Average'),
(534, 199, 50002, 90, 'Passed', 'Average'),
(535, 200, 50002, 74, 'Failed', 'Average'),
(536, 201, 50002, 70, 'Failed', 'Average'),
(543, 175, NULL, 86, 'Passed', 'Final'),
(544, 176, NULL, 78, 'Passed', 'Final'),
(545, 220, NULL, 81, 'Passed', 'Final'),
(546, 167, NULL, 82, 'Passed', 'Final'),
(547, 169, NULL, 58, 'Failed', 'Final'),
(548, 168, NULL, 82, 'Passed', 'Final'),
(549, 197, NULL, 88, 'Passed', 'Final'),
(550, 199, NULL, 90, 'Passed', 'Final'),
(551, 200, NULL, 74, 'Failed', 'Final'),
(552, 201, NULL, 70, 'Failed', 'Final'),
(553, 175, 50001, 84, 'Passed', '3rd'),
(554, 176, 50001, 78, 'Passed', '3rd'),
(555, 220, 50001, 81, 'Passed', '3rd'),
(556, 167, 50001, 82, 'Passed', '3rd'),
(557, 169, 50001, 58, 'Failed', '3rd'),
(558, 168, 50001, 82, 'Passed', '3rd'),
(559, 197, 50001, 88, 'Passed', '3rd'),
(560, 199, 50001, 90, 'Passed', '3rd'),
(561, 200, 50001, 74, 'Failed', '3rd'),
(562, 201, 50001, 70, 'Failed', '3rd');

-- --------------------------------------------------------

--
-- Table structure for table `sis_parent_guardian`
--

CREATE TABLE IF NOT EXISTS `sis_parent_guardian` (
  `pg_id` int(10) unsigned NOT NULL,
  `lrn` int(20) unsigned NOT NULL,
  `sis_f_lname` varchar(20) NOT NULL,
  `sis_f_fname` varchar(20) NOT NULL,
  `sis_f_mname` varchar(20) DEFAULT NULL,
  `sis_f_ext` varchar(10) DEFAULT NULL,
  `sis_f_work` varchar(50) NOT NULL,
  `sis_m_lname` varchar(20) NOT NULL,
  `sis_m_fname` varchar(20) NOT NULL,
  `sis_m_mname` varchar(20) DEFAULT NULL,
  `sis_m_ext` varchar(10) DEFAULT NULL,
  `sis_m_work` varchar(50) NOT NULL,
  `sis_g_lname` varchar(20) NOT NULL,
  `sis_g_fname` varchar(20) NOT NULL,
  `sis_g_mname` varchar(20) DEFAULT NULL,
  `sis_g_ext` varchar(10) DEFAULT NULL,
  `guardian_relation` varchar(20) DEFAULT NULL,
  `f_contact` varchar(15) DEFAULT NULL,
  `m_contact` varchar(15) DEFAULT NULL,
  `g_contact` varchar(15) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=162 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sis_parent_guardian`
--

INSERT INTO `sis_parent_guardian` (`pg_id`, `lrn`, `sis_f_lname`, `sis_f_fname`, `sis_f_mname`, `sis_f_ext`, `sis_f_work`, `sis_m_lname`, `sis_m_fname`, `sis_m_mname`, `sis_m_ext`, `sis_m_work`, `sis_g_lname`, `sis_g_fname`, `sis_g_mname`, `sis_g_ext`, `guardian_relation`, `f_contact`, `m_contact`, `g_contact`) VALUES
(107, 30001, 'Southgate', 'Atilio', 'Ira', NULL, 'Business man', 'Paterson', 'Alannah', 'Walton', NULL, 'Self Employed', '', '', '', NULL, '', '09558235', '09005882', ''),
(108, 30005, 'Arnold', 'Sigfrido', 'Emilia', '', 'Clerk', 'Marino', 'Posie', 'Laurissa', '', 'House Wife', '', '', '', '', '', '09985563', '09085937139', ''),
(109, 30002, 'Peck', 'Topaz', 'Carol', NULL, 'Marine', 'Winslow', 'Arlen', 'Primula', NULL, 'CEO', '', '', '', NULL, '', '09175592219', '09175689255', ''),
(110, 1102, 'Lustria', 'Christal', 'Caelan', NULL, 'WORKER', 'Lustria', 'Lilian', 'Donelle', NULL, 'WORKER', 'Chance', 'Sandalio', 'Lela', NULL, 'Ate', '9085937140', '9172064795', '9175689256'),
(111, 1103, 'Aldemo', 'Genesis', 'Javier', NULL, 'WORKER', 'Aldemo', 'Reenie', 'Isidoro', NULL, 'WORKER', 'Bissette', 'Kelsi', 'Marje', NULL, 'Ninong', '9085937141', '9172064796', '9175689257'),
(112, 2202, 'Baliat', 'Nieves', 'Celeste', NULL, 'WORKER', 'Baliat', 'Salud', 'Tamera', NULL, 'WORKER', 'Derby', 'Tyron', 'Imogene', NULL, 'Ninang', '9085937142', '9172064797', '9175689258'),
(113, 2203, 'Ebrada', 'August', 'Clay', NULL, 'WORKER', 'Ebrada', 'Shaelyn', 'Tiburcio', NULL, 'WORKER', 'Haden', 'Tamera', 'Jennifer', NULL, 'Tito', '9085937143', '9172064798', '9175689259'),
(114, 9999, 'Arancillo', 'Gerardo', 'Villalva', NULL, 'WORKER', 'Arancillo', 'Lea', 'BendaÃ±a', NULL, 'WORKER', 'Cheshire', 'Ford', 'Erma', NULL, 'Cousin', '9085937145', '9172064800', '9175689261'),
(115, 1101, 'Guim', 'Shelton', 'Imogen', '', 'WORKER', 'Guim', 'Tawny', 'Agata', '', 'WORKER', 'Abel', 'Monna', 'Liddy', '', 'Kuya', '9085937139', '9172064794', '9175689255'),
(116, 2204, 'Lumibao', 'Marco', 'Conway', NULL, 'WORKER', 'Lumibao', 'Elaine', 'Booker', NULL, 'WORKER', 'Smalls', 'Claudia', 'Driskoll', NULL, 'Tita', '9085937144', '9172064799', '9175689260'),
(117, 11102, 'Mon', 'Alan', 'Sonnie', NULL, 'WORKER', 'Mon', 'Katlyn', 'Watkin', NULL, 'WORKER', 'Daubney', 'Maura', 'Elroy', NULL, 'Uncle', '9085937147', '9172064802', '9175689263'),
(118, 20171, 'Ogama', 'Tawnee', 'Eutimio', NULL, 'WORKER', 'Ogama', 'Linden', 'Clarissa', NULL, 'WORKER', 'Bass', 'Dahlia', 'Channing', NULL, 'Friend', '9085937148', '9172064803', '9175689264'),
(119, 20172, 'Bagasbas', 'Jasper', 'Evander', NULL, 'WORKER', 'Bagasbas', 'Rita', 'Chavez', NULL, 'WORKER', 'Tracy', 'Jillian', 'Ike', NULL, 'Best Friend', '9085937149', '9172064804', '9175689265'),
(120, 11101, 'Gapayao', 'Will', 'Miguelito', NULL, 'WORKER', 'Gapayao', 'Letty', 'Rowina', NULL, 'WORKER', 'Graves', 'Melesina', 'Willa', NULL, 'Aunt', '9085937146', '9172064801', '9175689262'),
(121, 20173, 'Monilla', 'Flick', 'Daniel', NULL, 'WORKER', 'Monilla', 'Montague', 'Mirta', NULL, 'WORKER', 'Lucas', 'Abigayle', 'Luna', NULL, 'Fiance', '9085937150', '9172064805', '9175689266'),
(122, 20174, 'Ballesteros', 'Barney', 'Royce', NULL, 'WORKER', 'Ballesteros', 'Linnet', 'Tria', NULL, 'WORKER', 'Porras', 'Eliza', 'Octavio', NULL, 'Yaya', '9085937151', '9172064806', '9175689267'),
(123, 20175, 'Abanilla', 'Trace', 'Brayden', NULL, 'WORKER', 'Abanilla', 'Kory', 'Epifanio', NULL, 'WORKER', 'Noel', 'Kiara', 'Carmen', NULL, 'Katulong', '9085937152', '9172064807', '9175689268'),
(124, 20176, 'Ponteres', 'Elfleda', 'Terell', NULL, 'WORKER', 'Ponteres', 'Alethea', 'Merlyn', NULL, 'WORKER', 'Alexander', 'Verna', 'Erica', NULL, 'Cousin', '9085937153', '9172064808', '9175689269'),
(125, 20177, 'Mars', 'Mckenna', 'Victor', NULL, 'WORKER', 'Mars', 'Bernadine', 'Ira', NULL, 'WORKER', 'Wyatt', 'Cordell', 'Daly', NULL, 'Aunt', '9085937154', '9172064809', '9175689270'),
(126, 20178, 'Bernardo', 'Nelson', 'Simone', NULL, 'WORKER', 'Bernardo', 'Len', 'Kaylyn', NULL, 'WORKER', 'Rhodes', 'Ema', 'Tits', NULL, 'Uncle', '9085937155', '9172064810', '9175689271'),
(127, 20179, 'Jose', 'Chance', 'Kerenza', NULL, 'WORKER', 'Jose', 'Nohemi', 'Eireann', NULL, 'WORKER', 'Echevarria', 'Joy', 'Maddie', NULL, 'Yaya', '9085937156', '9172064811', '9175689272'),
(128, 101010, 'Arancillo', 'Visitacion', 'Gaynor', NULL, 'WORKER', 'Arancillo', 'Olivia', 'Lester', NULL, 'WORKER', '', '', '', NULL, '', '9085937157', '9172064812', ''),
(129, 201710, 'Muico', 'Kameron', 'Rupert', NULL, 'WORKER', 'Muico', 'Lita', 'Africa', NULL, 'WORKER', 'Ayton', 'Wilmer', 'Lacy', NULL, 'Katulong', '9085937158', '9172064813', '9175689274'),
(130, 201711, 'Mondero', 'Toby', 'Marina', NULL, 'WORKER', 'Mondero', 'Lora', 'Leone', NULL, 'WORKER', 'Wilmer', 'Stacee', 'Roxanne', NULL, 'Ate', '9085937159', '9172064814', '9175689275'),
(131, 201712, 'Octavo', 'Jonah', 'Spirit', NULL, 'WORKER', 'Octavo', 'Eloisa', 'Barclay', NULL, 'WORKER', 'Spear', 'Lotus', 'Delma', NULL, 'Kuya', '9085937160', '9172064815', '9175689276'),
(132, 201713, 'Sofranes', 'Kelvin', 'Jake', NULL, 'WORKER', 'Sofranes', 'Alexstraza', 'Suzy', NULL, 'WORKER', 'Baines', 'Wilkie', 'Meryl', NULL, 'Kuya', '9085937161', '9172064816', '9175689277'),
(133, 201714, 'Olayta', 'Jarred', 'Bud', NULL, 'WORKER', 'Olayta', 'Breanne', 'Lawson', NULL, 'WORKER', 'Powers', 'Everett', 'Oli', NULL, 'Tito', '9085937162', '9172064817', '9175689278'),
(134, 201715, 'Arevalo', 'Joe', 'Flick', NULL, 'WORKER', 'Arevalo', 'Elodia', 'Dee', NULL, 'WORKER', 'Tash', 'Salud', 'Virgilio', NULL, 'TIto', '9085937163', '9172064818', '9175689279'),
(135, 201716, 'Abogado', 'Maximiliano', 'Waldroup', NULL, 'WORKER', 'Abogado', 'Daniela', 'Booth', NULL, 'WORKER', 'Hernandez', 'Elpidio', 'Aaliyah', NULL, 'TIta', '9085937164', '9172064819', '9175689280'),
(136, 201717, 'Candidato', 'Paulino', 'Heath', NULL, 'WORKER', 'Candidato', 'Amanda', 'Langdon', NULL, 'WORKER', '', '', '', NULL, '', '9085937165', '9172064820', ''),
(137, 201718, 'Moico', 'Sofronio', 'Dixon', NULL, 'WORKER', 'Moico', 'Madylyn', 'Jen', NULL, 'WORKER', '', '', '', NULL, '', '9085937166', '9172064821', ''),
(138, 201719, 'Velasco', 'Ruben', 'Meriwether', NULL, 'WORKER', 'Velasco', 'Isadore', 'Clifton', NULL, 'WORKER', '', '', '', NULL, '', '9085937167', '9172064822', ''),
(139, 201720, 'Literal', 'Adolfo', 'Winston', NULL, 'WORKER', 'Literal', 'Velda', 'Cassandra', NULL, 'WORKER', '', '', '', NULL, '', '9085937168', '9172064823', ''),
(140, 201721, 'Cauilan', 'Modesta', 'Carry', NULL, 'WORKER', 'Cauilan', 'Jacqueline', 'Taylor', NULL, 'WORKER', '', '', '', NULL, '', '9085937169', '9172064824', ''),
(141, 201722, 'Llanera', 'Sommer', 'Stew', NULL, 'WORKER', 'Llanera', 'Robertina', 'Lonnie', NULL, 'WORKER', '', '', '', NULL, '', '9085937170', '9172064825', ''),
(142, 201723, 'Layante', 'Faron', 'Alishia', NULL, 'WORKER', 'Layante', 'Clemency', 'Ready', NULL, 'WORKER', '', '', '', NULL, '', '9085937171', '9172064826', ''),
(143, 201724, 'Domingo', 'Chuy', 'Ethelbert', NULL, 'WORKER', 'Domingo', 'Callie', 'Lavena', NULL, 'WORKER', '', '', '', NULL, '', '9085937172', '9172064827', ''),
(144, 201725, 'Chavez', 'Tomas', 'Javier', NULL, 'WORKER', 'Chavez', 'Bienvenida', 'Kathie', NULL, 'WORKER', '', '', '', NULL, '', '9085937173', '9172064828', ''),
(145, 201726, 'San Jose', 'Christopher', 'Dee', NULL, 'WORKER', 'San Jose', 'Alexus', 'Inocencio', NULL, 'WORKER', '', '', '', NULL, '', '9085937174', '9172064829', ''),
(146, 201727, 'Gonzaga', 'Jimmy', 'Rodolfo', NULL, 'WORKER', 'Gonzaga', 'Emmie', 'Paul', NULL, 'WORKER', '', '', '', NULL, '', '9085937175', '9172064830', ''),
(147, 201728, 'Rivera', 'Deryck', 'Eccleston', NULL, 'WORKER', 'Rivera', 'Teofila', 'Leland', NULL, 'WORKER', '', '', '', NULL, '', '9085937176', '9172064831', ''),
(148, 201729, 'Curtis', 'Jerry', 'Robert', NULL, 'WORKER', 'Curtis', 'Yvette', 'Spencer', NULL, 'WORKER', '', '', '', NULL, '', '9085937177', '9172064832', ''),
(149, 201730, 'Navarro', 'Dex', 'Tolbert', NULL, 'WORKER', 'Navarro', 'Bryanne', 'Heather', NULL, 'WORKER', '', '', '', NULL, '', '9085937178', '9172064833', ''),
(150, 201731, 'Mendoza', 'Vasco', 'Merrit', NULL, 'WORKER', 'Mendoza', 'Malachi', 'Richardine', NULL, 'WORKER', '', '', '', NULL, '', '9085937179', '9172064834', ''),
(151, 201732, 'Richards', 'Sinclair', 'Delgado', NULL, 'WORKER', 'Richards', 'Wilhelmina', 'Chet', NULL, 'WORKER', '', '', '', NULL, '', '9085937180', '9172064835', ''),
(152, 201733, 'Soberano', 'Grenville', 'Jolene', NULL, 'WORKER', 'Soberano', 'Kylie', 'Jakeman', NULL, 'WORKER', '', '', '', NULL, '', '9085937181', '9172064836', ''),
(153, 201734, 'Gil', 'Christian', 'Felipa', NULL, 'WORKER', 'Gil', 'Eulalia', 'Elsa', NULL, 'WORKER', '', '', '', NULL, '', '9085937182', '9172064837', ''),
(154, 333333, 'Ativo', 'Ramona', 'Luvinia', NULL, 'WORKER', 'Ativo', 'Juanita', 'Gracianas', NULL, 'WORKER', '', '', '', NULL, '', '9085937183', '9172064838', ''),
(155, 333334, 'Tallada', 'Buddy', 'Cicely', NULL, 'WORKER', 'Tallada', 'Sancha', 'Aston', NULL, 'WORKER', '', '', '', NULL, '', '9085937184', '9172064839', ''),
(156, 333335, 'Lim', 'Gaz', 'Patricio', NULL, 'WORKER', 'Lim', 'Jillie', 'Paco', NULL, 'WORKER', '', '', '', NULL, '', '9085937185', '9172064840', ''),
(157, 333336, 'Barrameda', 'Johnnie', 'Osbert', NULL, 'WORKER', 'Barrameda', 'Francisca', 'Hilario', NULL, 'WORKER', '', '', '', NULL, '', '9085937186', '9172064841', ''),
(158, 333337, 'Mendiola', 'Isidro', 'Christianne', NULL, 'WORKER', 'Mendiola', 'Diana', 'Emory', NULL, 'WORKER', '', '', '', NULL, '', '9085937187', '9172064842', ''),
(159, 333338, 'Ford', 'Anacleto', 'Gilberto', NULL, 'WORKER', 'Ford', 'Juliet', 'Beringer', NULL, 'WORKER', '', '', '', NULL, '', '9085937188', '9172064843', ''),
(160, 7777, 'Southgate', 'Atilio', 'Ira', NULL, 'Business man', 'Paterson', 'Alannah', 'Walton', NULL, 'Self Employed', '', '', '', NULL, '', '09558235', '09005882', ''),
(161, 5882566, 'Arancillo', 'Gerando', 'Villalva', 'Sr.', 'Retired', 'Arancillo', 'Lea', 'BendaÃ±a', 'III', 'Government Employee', 'Phillips', 'Joss', 'Toribio', 'Jr.', 'Cousin', '09145523', '09175592219', '099852773');

-- --------------------------------------------------------

--
-- Table structure for table `sis_student`
--

CREATE TABLE IF NOT EXISTS `sis_student` (
  `lrn` int(20) unsigned NOT NULL,
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
  `trnsf_in_date` date DEFAULT NULL,
  `trnf_out_date` date DEFAULT NULL,
  `drp` date DEFAULT NULL,
  `house_no` int(10) unsigned DEFAULT NULL,
  `street` varchar(50) DEFAULT NULL,
  `brng` varchar(50) NOT NULL,
  `munic` varchar(50) NOT NULL,
  `sis_elem` varchar(100) DEFAULT NULL,
  `date_enrolled` date NOT NULL,
  `accelerated` enum('Yes','No','','') DEFAULT NULL,
  `cct_recepient` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5882567 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sis_student`
--

INSERT INTO `sis_student` (`lrn`, `sis_image`, `stu_fname`, `stu_mname`, `stu_lname`, `sis_b_day`, `plc_birth`, `sis_gender`, `sis_religion`, `m_tounge`, `ethnic`, `stu_status`, `stu_contact`, `trnsf_in_date`, `trnf_out_date`, `drp`, `house_no`, `street`, `brng`, `munic`, `sis_elem`, `date_enrolled`, `accelerated`, `cct_recepient`) VALUES
(1101, '', 'Emmanuel', 'Candia', 'Guim', '1997-10-03', 'Sorsogon', 'Male', 'Roman Catholic', 'Tagalog', 'NA', 'Enrolled', '955412231', NULL, NULL, NULL, 1215, 'Candint', 'Bitano', 'Sorsogon', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(1102, NULL, 'Paolo', 'Toca', 'Lustria', '1998-02-22', 'Legazpi', 'Male', 'Roman Catholic', 'Bicol', 'NA', 'Enrolled', '1995323', NULL, NULL, NULL, 1215432, 'Ferrari', 'Gogon', 'Legazpi City', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(1103, NULL, 'Jericho', 'Yonzon', 'Aldemo', '1998-05-19', 'Sorsogon', 'Male', 'Roman Catholic', 'Bicol', 'NA', 'Enrolled', '14656', NULL, NULL, NULL, 121264546, 'fed street', 'pinakain', 'Sorsi', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(2202, NULL, 'Clint', '', 'Baliat', '1996-04-15', 'Guinobatan', 'Male', 'Roman Catholic', 'Bicol', 'NA', 'Enrolled', '155483', NULL, NULL, NULL, 1142123, 'dsfgs', 'afasfd', 'wqeqwe', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(2203, NULL, 'Jester', 'De Villa', 'Ebrada', '1998-07-13', 'Legazpi', 'Male', 'Roman Catholic', 'Bicol', 'NA', 'Enrolled', '212456', NULL, NULL, NULL, 41254, 'aef', 'asdf', 'sdf', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(2204, NULL, 'Romeo Aaron', '', 'Lumibao', '1997-10-03', 'Daraga', 'Male', 'Roman Catholic', 'Bicol', 'NA', 'Enrolled', '2211254', NULL, NULL, NULL, 1212344, 'efwef', 'qwr', 'sdfgsdfg', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(7777, NULL, 'Thelma', 'Katelynn', 'Hayley', '1995-02-18', 'Daraga', 'Female', 'Muslim', 'Arabic', 'NA', 'Enrolled', '091352664', NULL, NULL, NULL, 46582, 'Ibara', 'Salvacion', 'Gogon', 'Local Elementary School', '2017-04-20', 'No', 'No'),
(9999, NULL, 'Karl Vincent', 'BendaÃ±a', 'Arancillo', '1996-11-14', 'Legazpi City', 'Male', 'Muslim', 'Tagalog', 'NA', 'Enrolled', '09177773656', NULL, NULL, NULL, 1234, '3rd Street Our Ladys Village', 'Bitano', 'Legazpi City', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(11101, NULL, 'Nicole', '', 'Gapayao', '2000-01-20', 'Sorsogon', 'Female', 'Roman catholic', 'Tagalog', 'NA', 'Enrolled', '23121564', NULL, NULL, NULL, 663452, 'qweqweqwe', 'edi wow', 'Camalic', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(11102, NULL, 'Jess', 'Besa', 'Mon', '1995-05-05', 'Caloocan', 'Female', 'Roman Catholic', 'Tagalog', 'NA', 'Enrolled', '151231', NULL, NULL, NULL, 663452, 'qweqweqwe', 'edi wow', 'Camalic', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(20171, NULL, 'Jona', '', 'Ogama', '1995-05-05', 'Albay', 'Female', 'Roman Catholic', 'bicol', 'NA', 'Enrolled', '151232', NULL, NULL, NULL, 0, '', 'Mauraro', 'Guinobatan', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(20172, NULL, 'Alvin', '', 'Bagasbas', '1995-05-05', 'Bulacan', 'Male', 'Roman Catholic', 'bicol', 'NA', 'Enrolled', '151233', NULL, NULL, NULL, 0, '', 'Sta.Maria', 'Bulacan', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(20173, NULL, 'Jane', '', 'Monilla', '1995-05-05', 'Legazpi', 'Female', 'Catholic', 'bicol', 'NA', 'Enrolled', '151234', NULL, NULL, NULL, 0, '', 'Morga', 'Guinobatan', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(20174, NULL, 'Jake', '', 'Ballesteros', '1998-07-13', 'Legazpi', 'Male', 'Catholic', 'tagalog', 'NA', 'Enrolled', '151235', NULL, NULL, NULL, 0, '', 'Sta.Maria', 'Bulacan', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(20175, NULL, 'Thea', '', 'Abanilla', '1998-07-13', 'Legazpi', 'Female', 'Catholic', 'english', 'NA', 'Enrolled', '151236', NULL, NULL, NULL, 0, '', 'San Jose', 'Mandaluyong', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(20176, NULL, 'Christine', '', 'Ponteres', '1998-07-13', 'Legazpi', 'Female', 'Catholic', 'tagalog', 'NA', 'Enrolled', '151237', NULL, NULL, NULL, 0, '', 'guyong', 'sta. maria', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(20177, NULL, 'Bruno', '', 'Mars', '1998-07-13', 'Legazpi', 'Male', 'Catholic', 'English', 'NA', 'Dropped', '151238', NULL, NULL, '2018-04-02', 0, '', 'Washington', 'DC', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(20178, NULL, 'Kathryn', '', 'Bernardo', '1998-07-13', 'Legazpi', 'Female', 'Iglesia', 'tagalog', 'NA', 'Enrolled', '151239', NULL, NULL, NULL, 0, '', 'Tinago', 'Quezon', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(20179, NULL, 'Cristal', '', 'Jose', '1998-07-13', 'Legazpi', 'Female', 'Catholic', 'tagalog', 'NA', 'Enrolled', '151240', NULL, NULL, NULL, 0, '', 'San Juan', 'Quezon', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(30001, NULL, 'Thelma', 'Katelynn', 'Hayley', '1995-02-18', 'Daraga', 'Female', 'Muslim', 'Arabic', 'NA', 'Enrolled', '091352664', NULL, NULL, NULL, 46582, 'Ibara', 'Salvacion', 'Gogon', 'Local Elementary School', '2017-04-20', 'No', 'No'),
(30002, NULL, 'Jayme', 'Margarita', 'Dodge', '2001-03-18', 'Legazpi', 'Female', 'Jew', 'DarageÃ±o', 'NA', 'Enrolled', '091352664', NULL, NULL, NULL, 73859, '5th street', 'Our Lady''s Village', 'Bitano', 'Local Elementary School', '2017-04-25', 'No', 'No'),
(30005, '', 'Cordelia', 'DroÃ±o', 'Parish', '1998-05-20', 'Palawan', 'Female', 'Born Again', 'Bicol', 'NA', 'Enrolled', '091352664', NULL, NULL, NULL, 46851, 'Rizal', 'Ayala', 'Washington', 'Local Elementary School', '2017-04-19', 'No', 'No'),
(101010, NULL, 'Denver', 'BendaÃ±a', 'Arancillo', '1998-07-13', 'Legazpi', 'Male', 'Roman Catholic', 'Tagalog', 'NA', 'Enrolled', '9175689255', NULL, NULL, NULL, 1173, '5th street', 'Our Ladys Village', 'Bitano', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(201710, NULL, 'Margie', '', 'Muico', '1998-07-13', 'Legazpi', 'Female', 'Catholic', 'bicol', 'NA', 'Enrolled', '9294545075', NULL, NULL, NULL, 0, '', 'Galang', 'Urdaneta', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(201711, NULL, 'Mildred', '', 'Mondero', '1998-07-13', 'Legazpi', 'Female', 'Catholic', 'waray', 'NA', 'Enrolled', '9294545076', NULL, NULL, NULL, 0, '', 'Angatel', 'Urbiz', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(201712, NULL, 'Anna', '', 'Octavo', '1998-07-13', 'Legazpi', 'Female', 'Catholic', 'bicol', 'NA', 'Enrolled', '9294545077', NULL, NULL, NULL, 0, '', 'Malipo', 'Guinobatan', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(201713, NULL, 'Jazmin', '', 'Sofranes', '1998-07-13', 'Legazpi', 'Female', 'Catholic', 'tagalog', 'NA', 'Enrolled', '9294545078', NULL, NULL, NULL, 0, '', 'sagpon', 'Caloocan', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(201714, NULL, 'Josie', '', 'Olayta', '1998-07-13', 'Legazpi', 'Female', 'Catholic', 'tagalog', 'NA', 'Enrolled', '9294545079', NULL, NULL, NULL, 0, '', 'Em''s', 'Daraga', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(201715, NULL, 'Jucel', '', 'Arevalo', '1998-07-13', 'Legazpi', 'Male', 'Roman Catholic', 'bicol', 'NA', 'Enrolled', '9294545080', NULL, NULL, NULL, 0, '', 'Poblacion', 'Ligao City', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(201716, NULL, 'Roberto', '', 'Abogado', '1998-07-13', 'Legazpi', 'Male', 'Catholic', 'bicol', 'NA', 'Enrolled', '9294545081', NULL, NULL, NULL, 0, '', 'Calzada', 'Daet', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(201717, NULL, 'Joy', '', 'Candidato', '1998-07-13', 'Legazpi', 'Female', 'Catholic', 'bicol', 'NA', 'Enrolled', '9294545082', NULL, NULL, NULL, 0, '', 'Barriada', 'Legazpi City', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(201718, NULL, 'Cassandra', '', 'Moico', '1998-07-13', 'Legazpi', 'Female', 'Catholic', 'bicol', 'NA', 'Enrolled', '9294545083', NULL, NULL, NULL, 0, '', 'Em''s', 'Daraga', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(201719, NULL, 'Kent', '', 'Velasco', '1998-07-13', 'Legazpi', 'Male', 'Catholic', 'bicol', 'NA', 'Enrolled', '9294545084', NULL, NULL, NULL, 0, '', 'Ilawod', 'Guinobatan', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(201720, NULL, 'Charles', '', 'Literal', '1998-07-13', 'Legazpi', 'Male', 'Roman Catholic', 'bicol', 'NA', 'Enrolled', '9294545085', NULL, NULL, NULL, 0, '', 'Morga', 'Guinobatan', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(201721, NULL, 'Cj', '', 'Cauilan', '1998-07-13', 'Legazpi', 'Male', 'Catholic', 'bicol', 'NA', 'Enrolled', '9294545086', NULL, NULL, NULL, 0, '', 'Bascaran', 'Guinobatan', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(201722, NULL, 'Jasper', '', 'Llanera', '1998-07-13', 'Legazpi', 'Male', 'Catholic', 'bicol', 'NA', 'Enrolled', '9294545087', NULL, NULL, NULL, 0, '', 'Travesia', 'Guinobatan', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(201723, NULL, 'Noel', '', 'Layante', '1998-07-13', 'Legazpi', 'Male', 'Catholic', 'bicol', 'NA', 'Enrolled', '9294545088', NULL, NULL, NULL, 0, '', 'Libas', 'Guinobatan', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(201724, NULL, 'Matteo', '', 'Domingo', '1998-07-13', 'Legazpi', 'Male', 'Catholic', 'english', 'NA', 'Enrolled', '9294545089', NULL, NULL, NULL, 0, '', 'San Jose', 'Tabacco', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(201725, NULL, 'Steffi', '', 'Chavez', '1998-07-13', 'Legazpi', 'Female', 'Catholic', 'tagalog', 'NA', 'Enrolled', '9294545090', NULL, NULL, NULL, 0, '', 'Poblacion', 'Makati City', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(201726, NULL, 'Julie', '', 'San Jose', '1998-07-13', 'Legazpi', 'Female', 'Catholic', 'tagalog', 'NA', 'Enrolled', '9294545091', NULL, NULL, NULL, 0, '', 'San Jose', 'Urdaneta', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(201727, NULL, 'Toni', '', 'Gonzaga', '1998-07-13', 'Legazpi', 'Female', 'Catholic', 'tagalog', 'NA', 'Enrolled', '9294545092', NULL, NULL, NULL, 0, '', '1', 'Pasig City', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(201728, NULL, 'Marian', '', 'Rivera', '1998-07-13', 'Legazpi', 'Female', 'Catholic', 'tagalog', 'NA', 'Enrolled', '9294545093', NULL, NULL, NULL, 0, '', 'Galang', 'Legazpi City', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(201729, NULL, 'Anne', '', 'Curtis', '1998-07-13', 'Legazpi', 'Female', 'Catholic', 'tagalog', 'NA', 'Enrolled', '9294545094', NULL, NULL, NULL, 0, '', 'Timog', 'Quezon City', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(201730, NULL, 'Vhong', '', 'Navarro', '1998-07-13', 'Legazpi', 'Male', 'Catholic', 'tagalog', 'NA', 'Enrolled', '9294545095', NULL, NULL, NULL, 0, '', 'Morga', 'Daraga', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(201731, NULL, 'Maine', '', 'Mendoza', '1998-07-13', 'Legazpi', 'Female', 'Catholic', 'tagalog', 'NA', 'Enrolled', '9294545096', NULL, NULL, NULL, 0, '', 'Sta.Maria', 'Bulacan', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(201732, NULL, 'Alden', '', 'Richards', '1998-07-13', 'Legazpi', 'Male', 'Catholic', 'tagalog', 'NA', 'Enrolled', '9294545097', NULL, NULL, NULL, 0, '', 'Sta. Cruz', 'Laguna', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(201733, NULL, 'Liza', '', 'Soberano', '1998-07-13', 'Legazpi', 'Female', 'Catholic', 'tagalog', 'NA', 'Enrolled', '9294545098', NULL, NULL, NULL, 0, '', 'Sagpon', 'Legazpi City', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(201734, NULL, 'Enrique', '', 'Gil', '1998-07-13', 'Legazpi', 'Male', 'Catholic', 'bicol', 'NA', 'Enrolled', '9294545099', NULL, NULL, NULL, 0, '', 'Galang', 'Quezon', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(333333, NULL, 'Nico', 'Villaraza', 'Ativo', '1998-07-13', 'Caloocan', 'Male', 'Roman Catholic', 'Tagalog', 'NA', 'Enrolled', '9294545075', NULL, NULL, NULL, 663452, 'qweqweqwe', 'edi wow', 'Camalic', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(333334, NULL, 'Glen', 'Reyes', 'Tallada', '1998-07-13', 'Legazpi', 'Male', 'Catholic', 'bicol', 'NA', 'Enrolled', '5252362', NULL, NULL, NULL, 24, 'Rizal', 'Sagpon', 'Daraga', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(333335, NULL, 'Val', '', 'Lim', '1998-07-13', 'Legazpi', 'Male', 'Catholic', 'tagalog', 'NA', 'Enrolled', '9294545075', NULL, NULL, NULL, 54, '', 'Sagpon', 'Legazpi City', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(333336, NULL, 'Brent', '', 'Barrameda', '1998-07-13', 'Legazpi City', 'Male', 'Roman Catholic', 'tagalog', 'NA', 'Enrolled', '9294545076', NULL, NULL, NULL, 65, '', 'Seventeen', 'Legazpi City', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(333337, NULL, 'Kim', '', 'Mendiola', '1998-07-13', 'Donsol', 'Male', 'Catholic', 'tagalog', 'NA', 'Enrolled', '9294545077', NULL, NULL, NULL, 54, 'Mabini', 'Cruzada', 'Donsol', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(333338, NULL, 'Daniel', '', 'Ford', '1998-07-13', 'Legazpi', 'Male', 'Catholic', 'tagalog', 'NA', 'Enrolled', '9294545078', NULL, NULL, NULL, 0, '', 'shaw', 'Makati', 'Local Elementary School', '2014-04-25', 'No', 'No'),
(5882566, NULL, 'Karl Vincent', 'BendaÃ±a', 'Arancillo', '1993-11-14', 'Legazpi', 'Male', 'Roman Catholic', 'Tagalog', 'NA', 'Enrolled', '09177779255', NULL, NULL, NULL, 1173, '5th street', 'Our Lady''s Village', 'Bitano', 'Bicol University Elementary', '2018-04-02', 'Yes', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `sis_stu_rec`
--

CREATE TABLE IF NOT EXISTS `sis_stu_rec` (
  `rec_id` int(15) unsigned NOT NULL,
  `lrn` int(20) unsigned NOT NULL,
  `section_id` int(10) unsigned DEFAULT NULL,
  `sy_id` int(15) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=222 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sis_stu_rec`
--

INSERT INTO `sis_stu_rec` (`rec_id`, `lrn`, `section_id`, `sy_id`) VALUES
(167, 30001, 13, 8),
(168, 30005, 13, 8),
(169, 30002, 13, 8),
(170, 1102, 26, 8),
(171, 1103, 26, 8),
(172, 2202, 26, 8),
(173, 2203, 25, 8),
(174, 9999, 14, 8),
(175, 1101, 13, 8),
(176, 2204, 13, 8),
(177, 11102, 14, 8),
(178, 20171, 14, 8),
(179, 20172, 20, 8),
(180, 11101, 14, 8),
(181, 20173, 20, 8),
(182, 20174, 20, 8),
(183, 20175, 20, 8),
(184, 20176, 26, 8),
(185, 20177, 26, 8),
(186, 20178, 26, 8),
(187, 20179, 26, 8),
(188, 101010, 37, 8),
(189, 201710, 37, 8),
(190, 201711, 37, 8),
(191, 201712, 37, 8),
(192, 201713, 37, 8),
(193, 201714, 45, 8),
(194, 201715, 45, 8),
(195, 201716, 45, 8),
(196, 201717, 45, 8),
(197, 201718, 13, 8),
(198, 201719, 27, 8),
(199, 201720, 13, 8),
(200, 201721, 13, 8),
(201, 201722, 13, 8),
(202, 201723, 27, 8),
(203, 201724, 27, 8),
(204, 201725, 27, 8),
(205, 201726, 27, 8),
(206, 201727, 40, 8),
(207, 201728, 40, 8),
(208, 201729, 40, 8),
(209, 201730, 40, 8),
(210, 201731, 47, 8),
(211, 201732, 47, 8),
(212, 201733, 47, 8),
(213, 201734, 47, 8),
(214, 333333, 16, 8),
(215, 333334, 16, 8),
(216, 333335, 16, 8),
(217, 333336, 16, 8),
(218, 333337, 16, 8),
(219, 333338, 16, 8),
(220, 7777, 13, 8),
(221, 5882566, 8, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cms_account`
--
ALTER TABLE `cms_account`
  ADD PRIMARY KEY (`cms_account_ID`), ADD UNIQUE KEY `cms_account_ID` (`cms_account_ID`,`cms_username`), ADD KEY `account_student_idx` (`lrn`), ADD KEY `account_emp_idx` (`emp_no`);

--
-- Indexes for table `cms_achievement`
--
ALTER TABLE `cms_achievement`
  ADD PRIMARY KEY (`cms_achievement_ID`);

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
  ADD PRIMARY KEY (`cms_memo_ID`), ADD KEY `memo_account_idx` (`cms_account_id`);

--
-- Indexes for table `cms_news`
--
ALTER TABLE `cms_news`
  ADD PRIMARY KEY (`cms_news_ID`), ADD KEY `news_account_idx` (`cms_account_id`);

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
  ADD PRIMARY KEY (`cms_priv_id`), ADD KEY `job_title_code` (`job_title_code`);

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
  ADD PRIMARY KEY (`cms_feedback_ID`), ADD UNIQUE KEY `cms_feedback_ID_UNIQUE` (`cms_feedback_ID`);

--
-- Indexes for table `cms_viewcount`
--
ALTER TABLE `cms_viewcount`
  ADD PRIMARY KEY (`cms_viewcount_ID`);

--
-- Indexes for table `css_credentials`
--
ALTER TABLE `css_credentials`
  ADD PRIMARY KEY (`cred_id`), ADD KEY `emp_cred_idx` (`emp_rec_id`), ADD KEY `sub_cred_idx` (`subject_id`);

--
-- Indexes for table `css_loads`
--
ALTER TABLE `css_loads`
  ADD KEY `max_load_ney` (`emp_rec_id`);

--
-- Indexes for table `css_schedule`
--
ALTER TABLE `css_schedule`
  ADD PRIMARY KEY (`SCHED_ID`), ADD KEY `sched_sub_idx` (`subject_id`), ADD KEY `sched_emp_idx` (`emp_rec_id`), ADD KEY `sched_sy_idx` (`sy_id`), ADD KEY `sched_sec_idx` (`section_id`);

--
-- Indexes for table `css_school_yr`
--
ALTER TABLE `css_school_yr`
  ADD PRIMARY KEY (`sy_id`);

--
-- Indexes for table `css_section`
--
ALTER TABLE `css_section`
  ADD PRIMARY KEY (`SECTION_ID`), ADD KEY `sec_sy_idx` (`sy_id`), ADD KEY `sec_emp_idx` (`emp_rec_id`);

--
-- Indexes for table `css_subject`
--
ALTER TABLE `css_subject`
  ADD PRIMARY KEY (`subject_id`), ADD KEY `sub_dept_idx` (`dept_id`);

--
-- Indexes for table `css_time`
--
ALTER TABLE `css_time`
  ADD PRIMARY KEY (`time_id`), ADD KEY `sy_id_index` (`sy_id`);

--
-- Indexes for table `dms_archive`
--
ALTER TABLE `dms_archive`
  ADD PRIMARY KEY (`archive_id`), ADD KEY `arch_emp_idx` (`emp_No`);

--
-- Indexes for table `dms_archive_date`
--
ALTER TABLE `dms_archive_date`
  ADD PRIMARY KEY (`arch_date_id`);

--
-- Indexes for table `dms_doc_type`
--
ALTER TABLE `dms_doc_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `dms_message`
--
ALTER TABLE `dms_message`
  ADD PRIMARY KEY (`mes_id`), ADD KEY `doc_mes_idx` (`type_id`), ADD KEY `rec_mes_idx` (`rec_no`), ADD KEY `account_mes_idx` (`cms_account_id`), ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `dms_receiver`
--
ALTER TABLE `dms_receiver`
  ADD PRIMARY KEY (`rec_no`), ADD KEY `rec_account_idx` (`cms_account_id`);

--
-- Indexes for table `ims_borrow`
--
ALTER TABLE `ims_borrow`
  ADD PRIMARY KEY (`borrow_id`), ADD KEY `bor_stor_idx` (`stor_id`), ADD KEY `bor_emp_idx` (`emp_no`);

--
-- Indexes for table `ims_facility`
--
ALTER TABLE `ims_facility`
  ADD PRIMARY KEY (`fac_id`);

--
-- Indexes for table `ims_storage`
--
ALTER TABLE `ims_storage`
  ADD PRIMARY KEY (`stor_id`), ADD KEY `storage_idx_iar` (`iar_id`), ADD KEY `ims_storage_ibfk_3` (`emp_no`);

--
-- Indexes for table `ipcrms_content`
--
ALTER TABLE `ipcrms_content`
  ADD PRIMARY KEY (`ipcr_res_id`), ADD KEY `eemp_content_idx` (`emp_No`), ADD KEY `obj_id_idx` (`OBJ_ID`), ADD KEY `content_sy` (`sy_id`);

--
-- Indexes for table `ipcrms_due_date`
--
ALTER TABLE `ipcrms_due_date`
  ADD PRIMARY KEY (`Rating_ID`), ADD KEY `rp_sy_idx` (`sy_id`);

--
-- Indexes for table `ipcrms_kra`
--
ALTER TABLE `ipcrms_kra`
  ADD PRIMARY KEY (`KRA_ID`), ADD KEY `mfo_kra_idx` (`MFO_ID`);

--
-- Indexes for table `ipcrms_mfo`
--
ALTER TABLE `ipcrms_mfo`
  ADD PRIMARY KEY (`MFO_ID`);

--
-- Indexes for table `ipcrms_monitoring`
--
ALTER TABLE `ipcrms_monitoring`
  ADD PRIMARY KEY (`monitoring_id`), ADD KEY `monitor_records_idx` (`ipcr_records_id`);

--
-- Indexes for table `ipcrms_obj`
--
ALTER TABLE `ipcrms_obj`
  ADD PRIMARY KEY (`obj_id`), ADD KEY `OBJ_KRA_idx` (`KRA_ID`);

--
-- Indexes for table `ipcrms_perf_indicator`
--
ALTER TABLE `ipcrms_perf_indicator`
  ADD PRIMARY KEY (`perf_id`), ADD KEY `PERF_OBJ_idx` (`OBJ_ID`);

--
-- Indexes for table `ipcrms_records`
--
ALTER TABLE `ipcrms_records`
  ADD PRIMARY KEY (`IPCR_Records_ID`), ADD KEY `fk_IPCR_Records_Rating_Period1_idx` (`Rating_ID`), ADD KEY `rec_emp_idx` (`emp_No`);

--
-- Indexes for table `oes_exam`
--
ALTER TABLE `oes_exam`
  ADD PRIMARY KEY (`exam_no`);

--
-- Indexes for table `oes_exam_answer`
--
ALTER TABLE `oes_exam_answer`
  ADD PRIMARY KEY (`answer_no`), ADD KEY `con_exam_idx` (`content_no`), ADD KEY `lrn_ans_idx` (`lrn`);

--
-- Indexes for table `oes_exam_content`
--
ALTER TABLE `oes_exam_content`
  ADD PRIMARY KEY (`content_no`), ADD KEY `content_bank_idx` (`question_no`), ADD KEY `con_ans_idx` (`exam_no`);

--
-- Indexes for table `oes_exam_group`
--
ALTER TABLE `oes_exam_group`
  ADD PRIMARY KEY (`exam_no`,`sched_id`), ADD KEY `sched_id` (`sched_id`);

--
-- Indexes for table `oes_exam_logistics`
--
ALTER TABLE `oes_exam_logistics`
  ADD PRIMARY KEY (`logistic_id`), ADD KEY `exam_exam_result_teacher` (`exam_no`);

--
-- Indexes for table `oes_exam_result`
--
ALTER TABLE `oes_exam_result`
  ADD PRIMARY KEY (`res_id`), ADD KEY `student_exam_result_student_idx` (`lrn`), ADD KEY `exam_exam_result_student` (`exam_no`);

--
-- Indexes for table `oes_question_bank`
--
ALTER TABLE `oes_question_bank`
  ADD PRIMARY KEY (`question_no`), ADD KEY `qbank_sub_idx` (`subject_id`), ADD KEY `qbank_emprec_idx` (`emp_rec_id`);

--
-- Indexes for table `oes_ques_enum`
--
ALTER TABLE `oes_ques_enum`
  ADD PRIMARY KEY (`enum_id`), ADD KEY `question_bank_ques_enum_idx` (`question_no`);

--
-- Indexes for table `oes_ques_iden`
--
ALTER TABLE `oes_ques_iden`
  ADD PRIMARY KEY (`iden_id`), ADD KEY `question_bank_ques_iden_idx` (`question_no`);

--
-- Indexes for table `oes_ques_mulchoice`
--
ALTER TABLE `oes_ques_mulchoice`
  ADD PRIMARY KEY (`mul_id`), ADD KEY `question_bank_ques_mulchoice_idx` (`question_no`);

--
-- Indexes for table `pims_children`
--
ALTER TABLE `pims_children`
  ADD PRIMARY KEY (`child_ID`), ADD KEY `emp_No` (`emp_No`);

--
-- Indexes for table `pims_cs_eligibility`
--
ALTER TABLE `pims_cs_eligibility`
  ADD PRIMARY KEY (`cse_ID`), ADD KEY `emp_No` (`emp_No`);

--
-- Indexes for table `pims_department`
--
ALTER TABLE `pims_department`
  ADD PRIMARY KEY (`dept_ID`);

--
-- Indexes for table `pims_educational_background`
--
ALTER TABLE `pims_educational_background`
  ADD PRIMARY KEY (`ed_back`), ADD KEY `emp_No_edbg` (`emp_No`);

--
-- Indexes for table `pims_employment_records`
--
ALTER TABLE `pims_employment_records`
  ADD PRIMARY KEY (`emp_rec_ID`), ADD UNIQUE KEY `biometrics_ID_UNIQUE` (`biometric_ID`), ADD UNIQUE KEY `complete_item_no_UNIQUE` (`complete_item_no`), ADD KEY `dept_ID_idx` (`dept_ID`), ADD KEY `jt_emprec_idx` (`job_title_code`), ADD KEY `emp_No_emprec` (`emp_No`), ADD KEY `emp_No` (`emp_No`), ADD KEY `dept_ID` (`dept_ID`);

--
-- Indexes for table `pims_family_background`
--
ALTER TABLE `pims_family_background`
  ADD PRIMARY KEY (`fb_ID`), ADD UNIQUE KEY `fb_ID_UNIQUE` (`fb_ID`), ADD KEY `emp_NO_idx` (`emp_No`);

--
-- Indexes for table `pims_field`
--
ALTER TABLE `pims_field`
  ADD PRIMARY KEY (`field_ID`), ADD KEY `emp_No` (`emp_No`), ADD KEY `major` (`major`), ADD KEY `minor` (`minor`), ADD KEY `related` (`related`);

--
-- Indexes for table `pims_job_title`
--
ALTER TABLE `pims_job_title`
  ADD PRIMARY KEY (`job_title_code`);

--
-- Indexes for table `pims_leave`
--
ALTER TABLE `pims_leave`
  ADD PRIMARY KEY (`leave_ID`), ADD KEY `fk_PIMS_LEAVE_PIMS_LEAVE_BALANCE1_idx` (`leave_bal_id`);

--
-- Indexes for table `pims_leave_balance`
--
ALTER TABLE `pims_leave_balance`
  ADD PRIMARY KEY (`leave_bal_ID`), ADD UNIQUE KEY `PIMS_LEAVE_BALANCEcol_UNIQUE` (`leave_bal_ID`), ADD KEY `emp_No_idx` (`emp_No`);

--
-- Indexes for table `pims_messages`
--
ALTER TABLE `pims_messages`
  ADD PRIMARY KEY (`p_mes_id`), ADD KEY `user_mes_idx` (`p_part_id`), ADD KEY `account_mess_idx` (`cms_account_ID`);

--
-- Indexes for table `pims_other_info`
--
ALTER TABLE `pims_other_info`
  ADD PRIMARY KEY (`oi_ID`);

--
-- Indexes for table `pims_participant`
--
ALTER TABLE `pims_participant`
  ADD PRIMARY KEY (`p_part_id`), ADD KEY `user_one_idx` (`p_user_one`), ADD KEY `user_two_idx` (`p_user_two`);

--
-- Indexes for table `pims_personnel`
--
ALTER TABLE `pims_personnel`
  ADD PRIMARY KEY (`emp_No`), ADD UNIQUE KEY `P_Name` (`P_fname`,`P_mname`,`P_lname`), ADD UNIQUE KEY `PAG_IBIG_id_UNIQUE` (`PAG_IBIG_id`), ADD UNIQUE KEY `SSS_no_UNIQUE` (`SSS_no`), ADD UNIQUE KEY `TIN_no_UNIQUE` (`TIN_no`), ADD UNIQUE KEY `GSIS_No_UNIQUE` (`GSIS_No`), ADD UNIQUE KEY `PHILHEALTH_no_UNIQUE` (`PHILHEALTH_no`);

--
-- Indexes for table `pims_profile_updates`
--
ALTER TABLE `pims_profile_updates`
  ADD PRIMARY KEY (`p_update_id`), ADD KEY `prof_up_emp_idx` (`emp_No`);

--
-- Indexes for table `pims_profile_update_list`
--
ALTER TABLE `pims_profile_update_list`
  ADD PRIMARY KEY (`p_update_list_id`), ADD KEY `p_update_p_list_idx` (`p_update_id`);

--
-- Indexes for table `pims_question_info`
--
ALTER TABLE `pims_question_info`
  ADD PRIMARY KEY (`qi_ID`), ADD KEY `emp_No` (`emp_No`);

--
-- Indexes for table `pims_ref`
--
ALTER TABLE `pims_ref`
  ADD PRIMARY KEY (`r_No`), ADD KEY `emp_No` (`emp_No`);

--
-- Indexes for table `pims_service_records`
--
ALTER TABLE `pims_service_records`
  ADD PRIMARY KEY (`servRec_ID`), ADD KEY `sr_emp_rec_idx` (`emp_rec_ID`);

--
-- Indexes for table `pims_timestamp`
--
ALTER TABLE `pims_timestamp`
  ADD PRIMARY KEY (`timestamp_id`), ADD KEY `fk_PIMS_TIMESTAMP_PIMS_EMPLOYMENT_RECORDS1_idx` (`emp_rec_ID`);

--
-- Indexes for table `pims_training_programs`
--
ALTER TABLE `pims_training_programs`
  ADD PRIMARY KEY (`training_ID`), ADD KEY `emp_No_idx` (`emp_No`);

--
-- Indexes for table `pims_voluntary_work`
--
ALTER TABLE `pims_voluntary_work`
  ADD PRIMARY KEY (`vw_ID`);

--
-- Indexes for table `pims_work_experience`
--
ALTER TABLE `pims_work_experience`
  ADD PRIMARY KEY (`we_ID`), ADD KEY `emp_No` (`emp_No`);

--
-- Indexes for table `pms_iar`
--
ALTER TABLE `pms_iar`
  ADD PRIMARY KEY (`iar_no`);

--
-- Indexes for table `pms_iar_con`
--
ALTER TABLE `pms_iar_con`
  ADD PRIMARY KEY (`iar_id`), ADD KEY `iar_con_po_con_idx` (`po_id`), ADD KEY `iar_con_iar_idx` (`iar_no`);

--
-- Indexes for table `pms_po`
--
ALTER TABLE `pms_po`
  ADD PRIMARY KEY (`po_no`), ADD KEY `po_supplier_idx` (`company_id`);

--
-- Indexes for table `pms_po_con`
--
ALTER TABLE `pms_po_con`
  ADD PRIMARY KEY (`po_id`), ADD KEY `po_con_po_idx` (`po_no`), ADD KEY `po_con_pr_con_idx` (`pr_id`);

--
-- Indexes for table `pms_pr`
--
ALTER TABLE `pms_pr`
  ADD PRIMARY KEY (`pr_no`);

--
-- Indexes for table `pms_pr_con`
--
ALTER TABLE `pms_pr_con`
  ADD PRIMARY KEY (`pr_id`), ADD KEY `con_ris_req_idx` (`req_item_id`), ADD KEY `con_pr_idx` (`pr_no`);

--
-- Indexes for table `pms_ris`
--
ALTER TABLE `pms_ris`
  ADD PRIMARY KEY (`ris_no`), ADD KEY `rs_emp_idx` (`emp_No`);

--
-- Indexes for table `pms_ris_req`
--
ALTER TABLE `pms_ris_req`
  ADD PRIMARY KEY (`req_item_id`), ADD KEY `trans_ris_idx` (`ris_no`);

--
-- Indexes for table `pms_supplier`
--
ALTER TABLE `pms_supplier`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `prs_add_info`
--
ALTER TABLE `prs_add_info`
  ADD PRIMARY KEY (`info_id`), ADD KEY `add_inf_civil_idx` (`civil_id`), ADD KEY `add_inf_emp_idx` (`emp_no`);

--
-- Indexes for table `prs_allowance`
--
ALTER TABLE `prs_allowance`
  ADD PRIMARY KEY (`allowance_id`);

--
-- Indexes for table `prs_charges`
--
ALTER TABLE `prs_charges`
  ADD PRIMARY KEY (`charges_id`), ADD KEY `chrges_emp_idx` (`emp_No`);

--
-- Indexes for table `prs_civil_status`
--
ALTER TABLE `prs_civil_status`
  ADD PRIMARY KEY (`civil_id`);

--
-- Indexes for table `prs_deduction`
--
ALTER TABLE `prs_deduction`
  ADD PRIMARY KEY (`deduction_id`), ADD KEY `dd_tax_idx` (`tax_id`), ADD KEY `dd_ch_idx` (`charges_id`), ADD KEY `dd_gsis_idx` (`gsis_id`), ADD KEY `ded_emp_idx` (`emp_No`), ADD KEY `dd_ph_idx` (`philhealth_id`), ADD KEY `dd_pi_idx` (`pagibig_id`);

--
-- Indexes for table `prs_dtr_rec`
--
ALTER TABLE `prs_dtr_rec`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prs_grade`
--
ALTER TABLE `prs_grade`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `prs_gsis`
--
ALTER TABLE `prs_gsis`
  ADD PRIMARY KEY (`gsis_id`);

--
-- Indexes for table `prs_loan`
--
ALTER TABLE `prs_loan`
  ADD PRIMARY KEY (`loan_id`), ADD KEY `loan_emp_idx` (`emp_no`);

--
-- Indexes for table `prs_loan_pay`
--
ALTER TABLE `prs_loan_pay`
  ADD PRIMARY KEY (`loan_report`), ADD KEY `loan_pay_emp_idx` (`emp_no`);

--
-- Indexes for table `prs_mtr`
--
ALTER TABLE `prs_mtr`
  ADD PRIMARY KEY (`prs_attendance_id`), ADD KEY `mtr_emp_idx` (`emp_No`);

--
-- Indexes for table `prs_pagibig`
--
ALTER TABLE `prs_pagibig`
  ADD PRIMARY KEY (`pagibig_id`);

--
-- Indexes for table `prs_payslip`
--
ALTER TABLE `prs_payslip`
  ADD PRIMARY KEY (`payslip_id`), ADD KEY `py_emp_idx` (`emp_No`), ADD KEY `py_dd_idx` (`deduction_id`);

--
-- Indexes for table `prs_philhealth`
--
ALTER TABLE `prs_philhealth`
  ADD PRIMARY KEY (`philhealth_id`);

--
-- Indexes for table `prs_ph_change`
--
ALTER TABLE `prs_ph_change`
  ADD PRIMARY KEY (`prs_change_id`);

--
-- Indexes for table `prs_report`
--
ALTER TABLE `prs_report`
  ADD PRIMARY KEY (`report_id`), ADD KEY `rep_emp_idx` (`emp_No`);

--
-- Indexes for table `prs_salary`
--
ALTER TABLE `prs_salary`
  ADD PRIMARY KEY (`salary_id`), ADD KEY `salary_grade_idx` (`grade_id`), ADD KEY `salary_memo_idx` (`sal_memo_id`);

--
-- Indexes for table `prs_salary_history`
--
ALTER TABLE `prs_salary_history`
  ADD PRIMARY KEY (`history_id`);

--
-- Indexes for table `prs_salary_memo`
--
ALTER TABLE `prs_salary_memo`
  ADD PRIMARY KEY (`sal_memo_id`);

--
-- Indexes for table `prs_salary_record`
--
ALTER TABLE `prs_salary_record`
  ADD PRIMARY KEY (`sal_rec_id`), ADD KEY `sr_salary_idx` (`salary_id`), ADD KEY `sr_gradefd_idx` (`grade_id`), ADD KEY `sr_emp_idx` (`emp_no`);

--
-- Indexes for table `prs_save_report`
--
ALTER TABLE `prs_save_report`
  ADD PRIMARY KEY (`savereport`);

--
-- Indexes for table `prs_setting`
--
ALTER TABLE `prs_setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `prs_stat_ex`
--
ALTER TABLE `prs_stat_ex`
  ADD PRIMARY KEY (`stat_id`);

--
-- Indexes for table `prs_tax_amount`
--
ALTER TABLE `prs_tax_amount`
  ADD PRIMARY KEY (`id`), ADD KEY `tax_amt_withholding_idx` (`tax_id`), ADD KEY `tax_amt_stat_idx` (`stat_id`);

--
-- Indexes for table `prs_tax_change`
--
ALTER TABLE `prs_tax_change`
  ADD PRIMARY KEY (`idprs_tax_change`);

--
-- Indexes for table `prs_withholding_tax`
--
ALTER TABLE `prs_withholding_tax`
  ADD PRIMARY KEY (`tax_id`);

--
-- Indexes for table `scms_bmi_rec`
--
ALTER TABLE `scms_bmi_rec`
  ADD PRIMARY KEY (`bmi_no`), ADD KEY `rec_account_idx` (`cms_account_ID`);

--
-- Indexes for table `scms_consultation`
--
ALTER TABLE `scms_consultation`
  ADD PRIMARY KEY (`patient_id`), ADD KEY `consultation_account_idx` (`cms_account_ID`);

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
  ADD PRIMARY KEY (`history_no`), ADD KEY `illness_illness_hist_line_idx` (`illness_no`), ADD KEY `medrec_illness_hist_line_idx` (`medrec_id`);

--
-- Indexes for table `scms_immune_rec_line`
--
ALTER TABLE `scms_immune_rec_line`
  ADD PRIMARY KEY (`rec_no`), ADD KEY `medrec_immune_rec_line_idx` (`medrec_id`), ADD KEY `immunization_immune_rec_line_idx` (`vaccine_no`);

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
  ADD PRIMARY KEY (`medrec_id`), ADD KEY `medrec_account_idx` (`cms_account_ID`);

--
-- Indexes for table `scms_prescription`
--
ALTER TABLE `scms_prescription`
  ADD PRIMARY KEY (`pre_id`), ADD KEY `consultation_prescription_idx` (`patient_id`), ADD KEY `medicine_prescription_idx` (`med_no`);

--
-- Indexes for table `scms_supplies`
--
ALTER TABLE `scms_supplies`
  ADD PRIMARY KEY (`supp_no`);

--
-- Indexes for table `sis_attendance`
--
ALTER TABLE `sis_attendance`
  ADD PRIMARY KEY (`attend_id`), ADD KEY `attnd_rec_idx` (`rec_id`);

--
-- Indexes for table `sis_cv`
--
ALTER TABLE `sis_cv`
  ADD PRIMARY KEY (`cv_id`), ADD KEY `rec_id` (`rec_id`);

--
-- Indexes for table `sis_f137_rel`
--
ALTER TABLE `sis_f137_rel`
  ADD PRIMARY KEY (`f137_id`), ADD KEY `lrn_f137_idx` (`lrn`);

--
-- Indexes for table `sis_grade`
--
ALTER TABLE `sis_grade`
  ADD PRIMARY KEY (`grade_id`), ADD KEY `stu_rec_grade_idx` (`rec_id`), ADD KEY `sched_grade_idx` (`subject_id`);

--
-- Indexes for table `sis_parent_guardian`
--
ALTER TABLE `sis_parent_guardian`
  ADD PRIMARY KEY (`pg_id`), ADD KEY `student_parent_guardian` (`lrn`);

--
-- Indexes for table `sis_student`
--
ALTER TABLE `sis_student`
  ADD PRIMARY KEY (`lrn`);

--
-- Indexes for table `sis_stu_rec`
--
ALTER TABLE `sis_stu_rec`
  ADD PRIMARY KEY (`rec_id`), ADD KEY `student_stu_rec_idx` (`lrn`), ADD KEY `school_yr_stu_rec_idx` (`sy_id`), ADD KEY `stud_rec_sec_idx` (`section_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cms_account`
--
ALTER TABLE `cms_account`
  MODIFY `cms_account_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=326;
--
-- AUTO_INCREMENT for table `cms_achievement`
--
ALTER TABLE `cms_achievement`
  MODIFY `cms_achievement_ID` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cms_album`
--
ALTER TABLE `cms_album`
  MODIFY `cms_album_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=99;
--
-- AUTO_INCREMENT for table `cms_gpta`
--
ALTER TABLE `cms_gpta`
  MODIFY `cms_gpta_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `cms_image`
--
ALTER TABLE `cms_image`
  MODIFY `cms_image_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=884;
--
-- AUTO_INCREMENT for table `cms_memo`
--
ALTER TABLE `cms_memo`
  MODIFY `cms_memo_ID` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `cms_news`
--
ALTER TABLE `cms_news`
  MODIFY `cms_news_ID` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `cms_orgchart`
--
ALTER TABLE `cms_orgchart`
  MODIFY `cms_orgchart_ID` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `cms_privilege`
--
ALTER TABLE `cms_privilege`
  MODIFY `cms_priv_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `cms_project`
--
ALTER TABLE `cms_project`
  MODIFY `cms_project_ID` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cms_site_feedback`
--
ALTER TABLE `cms_site_feedback`
  MODIFY `cms_feedback_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=404;
--
-- AUTO_INCREMENT for table `cms_viewcount`
--
ALTER TABLE `cms_viewcount`
  MODIFY `cms_viewcount_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `css_credentials`
--
ALTER TABLE `css_credentials`
  MODIFY `cred_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `css_schedule`
--
ALTER TABLE `css_schedule`
  MODIFY `SCHED_ID` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=158;
--
-- AUTO_INCREMENT for table `css_school_yr`
--
ALTER TABLE `css_school_yr`
  MODIFY `sy_id` int(15) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `css_section`
--
ALTER TABLE `css_section`
  MODIFY `SECTION_ID` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=374;
--
-- AUTO_INCREMENT for table `css_subject`
--
ALTER TABLE `css_subject`
  MODIFY `subject_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50016;
--
-- AUTO_INCREMENT for table `css_time`
--
ALTER TABLE `css_time`
  MODIFY `time_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT for table `dms_archive`
--
ALTER TABLE `dms_archive`
  MODIFY `archive_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dms_archive_date`
--
ALTER TABLE `dms_archive_date`
  MODIFY `arch_date_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dms_doc_type`
--
ALTER TABLE `dms_doc_type`
  MODIFY `type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `dms_message`
--
ALTER TABLE `dms_message`
  MODIFY `mes_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `dms_receiver`
--
ALTER TABLE `dms_receiver`
  MODIFY `rec_no` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `ims_borrow`
--
ALTER TABLE `ims_borrow`
  MODIFY `borrow_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `ims_facility`
--
ALTER TABLE `ims_facility`
  MODIFY `fac_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `ims_storage`
--
ALTER TABLE `ims_storage`
  MODIFY `stor_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `ipcrms_content`
--
ALTER TABLE `ipcrms_content`
  MODIFY `ipcr_res_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=423;
--
-- AUTO_INCREMENT for table `ipcrms_due_date`
--
ALTER TABLE `ipcrms_due_date`
  MODIFY `Rating_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ipcrms_kra`
--
ALTER TABLE `ipcrms_kra`
  MODIFY `KRA_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `ipcrms_mfo`
--
ALTER TABLE `ipcrms_mfo`
  MODIFY `MFO_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ipcrms_monitoring`
--
ALTER TABLE `ipcrms_monitoring`
  MODIFY `monitoring_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ipcrms_obj`
--
ALTER TABLE `ipcrms_obj`
  MODIFY `obj_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `ipcrms_perf_indicator`
--
ALTER TABLE `ipcrms_perf_indicator`
  MODIFY `perf_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `ipcrms_records`
--
ALTER TABLE `ipcrms_records`
  MODIFY `IPCR_Records_ID` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `oes_exam`
--
ALTER TABLE `oes_exam`
  MODIFY `exam_no` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `oes_exam_answer`
--
ALTER TABLE `oes_exam_answer`
  MODIFY `answer_no` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=502;
--
-- AUTO_INCREMENT for table `oes_exam_content`
--
ALTER TABLE `oes_exam_content`
  MODIFY `content_no` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=253;
--
-- AUTO_INCREMENT for table `oes_exam_logistics`
--
ALTER TABLE `oes_exam_logistics`
  MODIFY `logistic_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `oes_exam_result`
--
ALTER TABLE `oes_exam_result`
  MODIFY `res_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `oes_question_bank`
--
ALTER TABLE `oes_question_bank`
  MODIFY `question_no` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `oes_ques_enum`
--
ALTER TABLE `oes_ques_enum`
  MODIFY `enum_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `oes_ques_iden`
--
ALTER TABLE `oes_ques_iden`
  MODIFY `iden_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `oes_ques_mulchoice`
--
ALTER TABLE `oes_ques_mulchoice`
  MODIFY `mul_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=742;
--
-- AUTO_INCREMENT for table `pims_department`
--
ALTER TABLE `pims_department`
  MODIFY `dept_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `pims_educational_background`
--
ALTER TABLE `pims_educational_background`
  MODIFY `ed_back` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `pims_employment_records`
--
ALTER TABLE `pims_employment_records`
  MODIFY `emp_rec_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `pims_family_background`
--
ALTER TABLE `pims_family_background`
  MODIFY `fb_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `pims_field`
--
ALTER TABLE `pims_field`
  MODIFY `field_ID` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `pims_leave`
--
ALTER TABLE `pims_leave`
  MODIFY `leave_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `pims_leave_balance`
--
ALTER TABLE `pims_leave_balance`
  MODIFY `leave_bal_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `pims_messages`
--
ALTER TABLE `pims_messages`
  MODIFY `p_mes_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `pims_participant`
--
ALTER TABLE `pims_participant`
  MODIFY `p_part_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `pims_personnel`
--
ALTER TABLE `pims_personnel`
  MODIFY `emp_No` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50011256;
--
-- AUTO_INCREMENT for table `pims_profile_updates`
--
ALTER TABLE `pims_profile_updates`
  MODIFY `p_update_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `pims_profile_update_list`
--
ALTER TABLE `pims_profile_update_list`
  MODIFY `p_update_list_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=184;
--
-- AUTO_INCREMENT for table `pims_ref`
--
ALTER TABLE `pims_ref`
  MODIFY `r_No` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `pims_service_records`
--
ALTER TABLE `pims_service_records`
  MODIFY `servRec_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pims_timestamp`
--
ALTER TABLE `pims_timestamp`
  MODIFY `timestamp_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pims_training_programs`
--
ALTER TABLE `pims_training_programs`
  MODIFY `training_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `pms_iar`
--
ALTER TABLE `pms_iar`
  MODIFY `iar_no` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pms_iar_con`
--
ALTER TABLE `pms_iar_con`
  MODIFY `iar_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pms_po`
--
ALTER TABLE `pms_po`
  MODIFY `po_no` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `pms_po_con`
--
ALTER TABLE `pms_po_con`
  MODIFY `po_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `pms_pr`
--
ALTER TABLE `pms_pr`
  MODIFY `pr_no` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `pms_pr_con`
--
ALTER TABLE `pms_pr_con`
  MODIFY `pr_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `pms_ris`
--
ALTER TABLE `pms_ris`
  MODIFY `ris_no` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `pms_ris_req`
--
ALTER TABLE `pms_ris_req`
  MODIFY `req_item_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `pms_supplier`
--
ALTER TABLE `pms_supplier`
  MODIFY `company_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `prs_add_info`
--
ALTER TABLE `prs_add_info`
  MODIFY `info_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `prs_allowance`
--
ALTER TABLE `prs_allowance`
  MODIFY `allowance_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `prs_charges`
--
ALTER TABLE `prs_charges`
  MODIFY `charges_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prs_civil_status`
--
ALTER TABLE `prs_civil_status`
  MODIFY `civil_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `prs_deduction`
--
ALTER TABLE `prs_deduction`
  MODIFY `deduction_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prs_dtr_rec`
--
ALTER TABLE `prs_dtr_rec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `prs_grade`
--
ALTER TABLE `prs_grade`
  MODIFY `grade_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `prs_gsis`
--
ALTER TABLE `prs_gsis`
  MODIFY `gsis_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `prs_loan`
--
ALTER TABLE `prs_loan`
  MODIFY `loan_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `prs_loan_pay`
--
ALTER TABLE `prs_loan_pay`
  MODIFY `loan_report` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `prs_mtr`
--
ALTER TABLE `prs_mtr`
  MODIFY `prs_attendance_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=178;
--
-- AUTO_INCREMENT for table `prs_pagibig`
--
ALTER TABLE `prs_pagibig`
  MODIFY `pagibig_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `prs_payslip`
--
ALTER TABLE `prs_payslip`
  MODIFY `payslip_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prs_philhealth`
--
ALTER TABLE `prs_philhealth`
  MODIFY `philhealth_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `prs_ph_change`
--
ALTER TABLE `prs_ph_change`
  MODIFY `prs_change_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prs_report`
--
ALTER TABLE `prs_report`
  MODIFY `report_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `prs_salary`
--
ALTER TABLE `prs_salary`
  MODIFY `salary_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1065;
--
-- AUTO_INCREMENT for table `prs_salary_history`
--
ALTER TABLE `prs_salary_history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prs_salary_memo`
--
ALTER TABLE `prs_salary_memo`
  MODIFY `sal_memo_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `prs_salary_record`
--
ALTER TABLE `prs_salary_record`
  MODIFY `sal_rec_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `prs_save_report`
--
ALTER TABLE `prs_save_report`
  MODIFY `savereport` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `prs_setting`
--
ALTER TABLE `prs_setting`
  MODIFY `setting_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `prs_stat_ex`
--
ALTER TABLE `prs_stat_ex`
  MODIFY `stat_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `prs_tax_amount`
--
ALTER TABLE `prs_tax_amount`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=145;
--
-- AUTO_INCREMENT for table `prs_tax_change`
--
ALTER TABLE `prs_tax_change`
  MODIFY `idprs_tax_change` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prs_withholding_tax`
--
ALTER TABLE `prs_withholding_tax`
  MODIFY `tax_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `scms_bmi_rec`
--
ALTER TABLE `scms_bmi_rec`
  MODIFY `bmi_no` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `scms_consultation`
--
ALTER TABLE `scms_consultation`
  MODIFY `patient_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `scms_illness`
--
ALTER TABLE `scms_illness`
  MODIFY `illness_no` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `scms_illness_hist_line`
--
ALTER TABLE `scms_illness_hist_line`
  MODIFY `history_no` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `scms_immune_rec_line`
--
ALTER TABLE `scms_immune_rec_line`
  MODIFY `rec_no` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `scms_immunization`
--
ALTER TABLE `scms_immunization`
  MODIFY `vaccine_no` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `scms_medicine`
--
ALTER TABLE `scms_medicine`
  MODIFY `med_no` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1719;
--
-- AUTO_INCREMENT for table `scms_medrec`
--
ALTER TABLE `scms_medrec`
  MODIFY `medrec_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `scms_prescription`
--
ALTER TABLE `scms_prescription`
  MODIFY `pre_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `scms_supplies`
--
ALTER TABLE `scms_supplies`
  MODIFY `supp_no` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `sis_attendance`
--
ALTER TABLE `sis_attendance`
  MODIFY `attend_id` int(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=200;
--
-- AUTO_INCREMENT for table `sis_cv`
--
ALTER TABLE `sis_cv`
  MODIFY `cv_id` int(15) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sis_f137_rel`
--
ALTER TABLE `sis_f137_rel`
  MODIFY `f137_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `sis_grade`
--
ALTER TABLE `sis_grade`
  MODIFY `grade_id` int(15) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=563;
--
-- AUTO_INCREMENT for table `sis_parent_guardian`
--
ALTER TABLE `sis_parent_guardian`
  MODIFY `pg_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=162;
--
-- AUTO_INCREMENT for table `sis_student`
--
ALTER TABLE `sis_student`
  MODIFY `lrn` int(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5882567;
--
-- AUTO_INCREMENT for table `sis_stu_rec`
--
ALTER TABLE `sis_stu_rec`
  MODIFY `rec_id` int(15) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=222;
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
-- Constraints for table `css_credentials`
--
ALTER TABLE `css_credentials`
ADD CONSTRAINT `emp_cred` FOREIGN KEY (`emp_rec_id`) REFERENCES `pims_employment_records` (`emp_rec_ID`) ON UPDATE CASCADE,
ADD CONSTRAINT `sub_cred` FOREIGN KEY (`subject_id`) REFERENCES `css_subject` (`subject_id`) ON UPDATE CASCADE;

--
-- Constraints for table `css_loads`
--
ALTER TABLE `css_loads`
ADD CONSTRAINT `css_loads_ibfk_1` FOREIGN KEY (`emp_rec_id`) REFERENCES `pims_employment_records` (`emp_rec_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `css_schedule`
--
ALTER TABLE `css_schedule`
ADD CONSTRAINT `sched_emp` FOREIGN KEY (`emp_rec_id`) REFERENCES `pims_employment_records` (`emp_rec_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `sched_sec` FOREIGN KEY (`section_id`) REFERENCES `css_section` (`SECTION_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `sched_sub` FOREIGN KEY (`subject_id`) REFERENCES `css_subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `sched_sy` FOREIGN KEY (`sy_id`) REFERENCES `css_school_yr` (`sy_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `css_time`
--
ALTER TABLE `css_time`
ADD CONSTRAINT `css_time_ibfk_1` FOREIGN KEY (`sy_id`) REFERENCES `css_school_yr` (`sy_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dms_archive`
--
ALTER TABLE `dms_archive`
ADD CONSTRAINT `arch_emp` FOREIGN KEY (`emp_No`) REFERENCES `pims_personnel` (`emp_No`) ON UPDATE CASCADE;

--
-- Constraints for table `dms_message`
--
ALTER TABLE `dms_message`
ADD CONSTRAINT `account_mes` FOREIGN KEY (`cms_account_id`) REFERENCES `cms_account` (`cms_account_ID`) ON UPDATE CASCADE,
ADD CONSTRAINT `dms_message_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `dms_doc_type` (`type_id`) ON UPDATE CASCADE,
ADD CONSTRAINT `rec_mes` FOREIGN KEY (`rec_no`) REFERENCES `dms_receiver` (`rec_no`) ON UPDATE CASCADE;

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
ADD CONSTRAINT `ims_storage_ibfk_1` FOREIGN KEY (`iar_id`) REFERENCES `pms_iar_con` (`iar_id`) ON UPDATE CASCADE,
ADD CONSTRAINT `ims_storage_ibfk_3` FOREIGN KEY (`emp_no`) REFERENCES `pims_personnel` (`emp_No`);

--
-- Constraints for table `ipcrms_content`
--
ALTER TABLE `ipcrms_content`
ADD CONSTRAINT `eemp_content` FOREIGN KEY (`emp_No`) REFERENCES `pims_personnel` (`emp_No`) ON UPDATE CASCADE,
ADD CONSTRAINT `ipcrms_content_ibfk_1` FOREIGN KEY (`sy_id`) REFERENCES `css_school_yr` (`sy_id`) ON UPDATE CASCADE,
ADD CONSTRAINT `obj_id` FOREIGN KEY (`OBJ_ID`) REFERENCES `ipcrms_obj` (`obj_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ipcrms_due_date`
--
ALTER TABLE `ipcrms_due_date`
ADD CONSTRAINT `rp_sy` FOREIGN KEY (`sy_id`) REFERENCES `css_school_yr` (`sy_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ipcrms_kra`
--
ALTER TABLE `ipcrms_kra`
ADD CONSTRAINT `mfo_kra` FOREIGN KEY (`MFO_ID`) REFERENCES `ipcrms_mfo` (`MFO_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `ipcrms_monitoring`
--
ALTER TABLE `ipcrms_monitoring`
ADD CONSTRAINT `monitor_records` FOREIGN KEY (`ipcr_records_id`) REFERENCES `ipcrms_records` (`IPCR_Records_ID`) ON UPDATE CASCADE;

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
-- Constraints for table `ipcrms_records`
--
ALTER TABLE `ipcrms_records`
ADD CONSTRAINT `fk_IPCR_Records_Rating_Period1` FOREIGN KEY (`Rating_ID`) REFERENCES `ipcrms_due_date` (`Rating_ID`) ON UPDATE CASCADE,
ADD CONSTRAINT `rec_emp` FOREIGN KEY (`emp_No`) REFERENCES `pims_personnel` (`emp_No`) ON UPDATE CASCADE;

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
-- Constraints for table `oes_exam_group`
--
ALTER TABLE `oes_exam_group`
ADD CONSTRAINT `oes_exam_group_ibfk_1` FOREIGN KEY (`exam_no`) REFERENCES `oes_exam` (`exam_no`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `oes_exam_group_ibfk_2` FOREIGN KEY (`sched_id`) REFERENCES `css_schedule` (`SCHED_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

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
ADD CONSTRAINT `qbank_emprec` FOREIGN KEY (`emp_rec_id`) REFERENCES `pims_employment_records` (`emp_rec_ID`) ON UPDATE CASCADE,
ADD CONSTRAINT `qbank_sub` FOREIGN KEY (`subject_id`) REFERENCES `css_subject` (`subject_id`) ON UPDATE CASCADE;

--
-- Constraints for table `oes_ques_enum`
--
ALTER TABLE `oes_ques_enum`
ADD CONSTRAINT `question_bank_ques_enum` FOREIGN KEY (`question_no`) REFERENCES `oes_question_bank` (`question_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `oes_ques_iden`
--
ALTER TABLE `oes_ques_iden`
ADD CONSTRAINT `question_bank_ques_iden` FOREIGN KEY (`question_no`) REFERENCES `oes_question_bank` (`question_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `oes_ques_mulchoice`
--
ALTER TABLE `oes_ques_mulchoice`
ADD CONSTRAINT `question_bank_ques_mulchoice` FOREIGN KEY (`question_no`) REFERENCES `oes_question_bank` (`question_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pims_children`
--
ALTER TABLE `pims_children`
ADD CONSTRAINT `emp_No_fkkkk` FOREIGN KEY (`emp_No`) REFERENCES `pims_personnel` (`emp_No`) ON UPDATE CASCADE;

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
-- Constraints for table `pims_field`
--
ALTER TABLE `pims_field`
ADD CONSTRAINT `emp_No_fk` FOREIGN KEY (`emp_No`) REFERENCES `pims_personnel` (`emp_No`),
ADD CONSTRAINT `fk_major` FOREIGN KEY (`major`) REFERENCES `css_subject` (`subject_id`) ON UPDATE CASCADE,
ADD CONSTRAINT `fk_minor` FOREIGN KEY (`minor`) REFERENCES `css_subject` (`subject_id`) ON UPDATE CASCADE,
ADD CONSTRAINT `fk_related` FOREIGN KEY (`related`) REFERENCES `css_subject` (`subject_id`) ON UPDATE CASCADE;

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
-- Constraints for table `pims_messages`
--
ALTER TABLE `pims_messages`
ADD CONSTRAINT `account_mess` FOREIGN KEY (`cms_account_ID`) REFERENCES `cms_account` (`cms_account_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `user_mes` FOREIGN KEY (`p_part_id`) REFERENCES `pims_participant` (`p_part_id`) ON UPDATE CASCADE;

--
-- Constraints for table `pims_participant`
--
ALTER TABLE `pims_participant`
ADD CONSTRAINT `user_one` FOREIGN KEY (`p_user_one`) REFERENCES `cms_account` (`cms_account_ID`) ON UPDATE CASCADE,
ADD CONSTRAINT `user_two` FOREIGN KEY (`p_user_two`) REFERENCES `cms_account` (`cms_account_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `pims_profile_updates`
--
ALTER TABLE `pims_profile_updates`
ADD CONSTRAINT `prof_up_emp` FOREIGN KEY (`emp_No`) REFERENCES `pims_personnel` (`emp_No`) ON UPDATE CASCADE;

--
-- Constraints for table `pims_profile_update_list`
--
ALTER TABLE `pims_profile_update_list`
ADD CONSTRAINT `p_update_p_list` FOREIGN KEY (`p_update_id`) REFERENCES `pims_profile_updates` (`p_update_id`) ON UPDATE CASCADE;

--
-- Constraints for table `pims_question_info`
--
ALTER TABLE `pims_question_info`
ADD CONSTRAINT `fk_emp_No` FOREIGN KEY (`emp_No`) REFERENCES `pims_personnel` (`emp_No`) ON UPDATE CASCADE;

--
-- Constraints for table `pims_ref`
--
ALTER TABLE `pims_ref`
ADD CONSTRAINT `fkk_emp_No` FOREIGN KEY (`emp_No`) REFERENCES `pims_personnel` (`emp_No`) ON UPDATE CASCADE;

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
ADD CONSTRAINT `iar_con_iar` FOREIGN KEY (`iar_no`) REFERENCES `pms_iar` (`iar_no`) ON UPDATE CASCADE,
ADD CONSTRAINT `iar_con_po_con` FOREIGN KEY (`po_id`) REFERENCES `pms_po_con` (`po_id`) ON UPDATE CASCADE;

--
-- Constraints for table `pms_po`
--
ALTER TABLE `pms_po`
ADD CONSTRAINT `po_supplier` FOREIGN KEY (`company_id`) REFERENCES `pms_supplier` (`company_id`) ON UPDATE CASCADE;

--
-- Constraints for table `pms_po_con`
--
ALTER TABLE `pms_po_con`
ADD CONSTRAINT `po_con_po` FOREIGN KEY (`po_no`) REFERENCES `pms_po` (`po_no`) ON UPDATE CASCADE,
ADD CONSTRAINT `po_con_pr_con` FOREIGN KEY (`pr_id`) REFERENCES `pms_pr_con` (`pr_id`) ON UPDATE CASCADE;

--
-- Constraints for table `pms_pr_con`
--
ALTER TABLE `pms_pr_con`
ADD CONSTRAINT `pr_con_pr` FOREIGN KEY (`pr_no`) REFERENCES `pms_pr` (`pr_no`) ON UPDATE CASCADE,
ADD CONSTRAINT `pr_con_ris_req` FOREIGN KEY (`req_item_id`) REFERENCES `pms_ris_req` (`req_item_id`) ON UPDATE CASCADE;

--
-- Constraints for table `pms_ris`
--
ALTER TABLE `pms_ris`
ADD CONSTRAINT `rs_emp` FOREIGN KEY (`emp_No`) REFERENCES `pims_personnel` (`emp_No`) ON UPDATE CASCADE;

--
-- Constraints for table `pms_ris_req`
--
ALTER TABLE `pms_ris_req`
ADD CONSTRAINT `trans_ris` FOREIGN KEY (`ris_no`) REFERENCES `pms_ris` (`ris_no`) ON UPDATE CASCADE;

--
-- Constraints for table `prs_add_info`
--
ALTER TABLE `prs_add_info`
ADD CONSTRAINT `add_inf_civil` FOREIGN KEY (`civil_id`) REFERENCES `prs_civil_status` (`civil_id`) ON UPDATE CASCADE,
ADD CONSTRAINT `add_inf_emp` FOREIGN KEY (`emp_no`) REFERENCES `pims_personnel` (`emp_No`) ON UPDATE CASCADE;

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
-- Constraints for table `prs_loan_pay`
--
ALTER TABLE `prs_loan_pay`
ADD CONSTRAINT `loan_pay_emp` FOREIGN KEY (`emp_no`) REFERENCES `pims_personnel` (`emp_No`) ON UPDATE CASCADE;

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
-- Constraints for table `prs_salary`
--
ALTER TABLE `prs_salary`
ADD CONSTRAINT `salary_grade` FOREIGN KEY (`grade_id`) REFERENCES `prs_grade` (`grade_id`) ON UPDATE CASCADE,
ADD CONSTRAINT `salary_memo` FOREIGN KEY (`sal_memo_id`) REFERENCES `prs_salary_memo` (`sal_memo_id`) ON UPDATE CASCADE;

--
-- Constraints for table `prs_salary_record`
--
ALTER TABLE `prs_salary_record`
ADD CONSTRAINT `sr_empsdfds` FOREIGN KEY (`emp_no`) REFERENCES `pims_personnel` (`emp_No`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `sr_gradefd` FOREIGN KEY (`grade_id`) REFERENCES `prs_grade` (`grade_id`) ON UPDATE CASCADE,
ADD CONSTRAINT `sr_salarysdf` FOREIGN KEY (`salary_id`) REFERENCES `prs_salary` (`salary_id`) ON UPDATE CASCADE;

--
-- Constraints for table `prs_tax_amount`
--
ALTER TABLE `prs_tax_amount`
ADD CONSTRAINT `tax_amt_stat` FOREIGN KEY (`stat_id`) REFERENCES `prs_stat_ex` (`stat_id`) ON UPDATE CASCADE,
ADD CONSTRAINT `tax_amt_withholding` FOREIGN KEY (`tax_id`) REFERENCES `prs_withholding_tax` (`tax_id`) ON UPDATE CASCADE;

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
-- Constraints for table `sis_cv`
--
ALTER TABLE `sis_cv`
ADD CONSTRAINT `sis_cv_ibfk_1` FOREIGN KEY (`rec_id`) REFERENCES `sis_stu_rec` (`rec_id`) ON UPDATE CASCADE;

--
-- Constraints for table `sis_f137_rel`
--
ALTER TABLE `sis_f137_rel`
ADD CONSTRAINT `lrn_f137` FOREIGN KEY (`lrn`) REFERENCES `sis_student` (`lrn`) ON UPDATE CASCADE;

--
-- Constraints for table `sis_grade`
--
ALTER TABLE `sis_grade`
ADD CONSTRAINT `css_grade` FOREIGN KEY (`subject_id`) REFERENCES `css_subject` (`subject_id`) ON UPDATE CASCADE,
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
ADD CONSTRAINT `school_yr_stu_rec` FOREIGN KEY (`sy_id`) REFERENCES `css_school_yr` (`sy_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `sis_stu_rec_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `css_section` (`SECTION_ID`) ON UPDATE CASCADE,
ADD CONSTRAINT `student_stu_rec` FOREIGN KEY (`lrn`) REFERENCES `sis_student` (`lrn`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
