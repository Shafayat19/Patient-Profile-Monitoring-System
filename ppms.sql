-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 09, 2019 at 08:42 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppms`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
CREATE TABLE IF NOT EXISTS `doctor` (
  `d_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dname` varchar(255) NOT NULL,
  `phone` int(25) NOT NULL,
  `dfield` varchar(255) NOT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`d_id`, `email`, `password`, `dname`, `phone`, `dfield`) VALUES
(11, 'reba@yahoo.com', '1234', 'Dr. Reba Zakia', 1711125234, 'ENT, Head and Neck Surgery'),
(4, 'farhaaz@yahoo.com', '1234', 'Dr. Farhaaz Kader Newaz', 171111111, 'Cardiac and Vascular Surgery'),
(3, 'tariq@yahoo.com', '1234', 'Dr. Tariqul Islam', 171234567, 'Cardiac and Vascular Surgery'),
(5, 'rubina@yahoo.com', '1234', 'Dr. Rubina Mahboob', 171234567, 'Cardiology (Interventional)'),
(6, 'ishtiaque@yahoo.com', '1234', 'Dr. Ishtiaque Hossain', 1711423456, 'Cardiology (Interventional)'),
(7, 'masnoon@yahoo.com', '1234', 'Dr. Masnoon Abanti', 1711423456, 'Dental and Maxillofacial Surgery'),
(8, 'zakia@yahoo.com', '1234', 'Dr. Zakia Mahruz', 171142356, 'Dermatology'),
(9, 'jasmin@yahoo.com', '1234', 'Dr. Jasmin Manzoor', 711121534, 'Dermatology'),
(10, 'nawab@yahoo.com', '1234', 'Dr. Nawab Ilias', 1711123525, 'Endocrinology'),
(12, 'zaarif@yahoo.com', '1234', 'Dr. Zaarif Qadri', 171113018, 'Gastroenterology'),
(13, 'tazwar@yahoo.com', '1234', 'Dr. Tazwar Ishrak', 1711644017, 'Gastroenterology'),
(14, 'rubina@yahoo.com', '1234', 'Dr. Rubina Khan', 1711429021, 'IVF'),
(15, 'mahbooba@yahoo.com', '1234', 'Dr. Mahbooba Ahmed', 1711429023, 'IVF'),
(16, 'shahjahan@yahoo.com', '1234', 'Dr. Shahjahan Rahmat', 1711123444, 'Neuro Surgery and Neuromedicine'),
(17, 'babul@yahoo.com', '1234', 'Dr. Babul Ahmed', 1711123555, 'Neuro Surgery and Neuromedicine'),
(18, 'redwana@yahoo.com', '1234', 'Dr. Redwana Nasrin', 1711123666, 'OB/GYN'),
(19, 'fahima@yahoo.com', '1234', 'Dr. Fahima Fatemi', 1711123050, 'OB/GYN'),
(21, 'zeba@yahoo.com', '1234', 'Dr. Zeba Nasrin', 1711123191, 'Opthalmology'),
(22, 'sushma@yahoo.com', '1234', 'Dr. Sushma Nahrin', 1711123166, 'Pediatrics'),
(23, 'kader@yahoo.com', '1234', 'Dr. Kader Khan', 1711123152, 'Urology');

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

DROP TABLE IF EXISTS `issue`;
CREATE TABLE IF NOT EXISTS `issue` (
  `p_id` int(11) NOT NULL,
  `cdiagno` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `diagno` varchar(255) NOT NULL,
  `med` varchar(255) NOT NULL,
  `dname` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `cdate` varchar(255) NOT NULL,
  `ndate` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue`
--

INSERT INTO `issue` (`p_id`, `cdiagno`, `sex`, `diagno`, `med`, `dname`, `time`, `cdate`, `ndate`) VALUES
(15, 'Muscle pain', 'Male', 'No', 'Napa', 'Dr. Zakia', '12:02', '2019-04-10', '2019-04-17');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `pic` varchar(250) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `primaryD` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`p_id`, `email`, `password`, `pic`, `name`, `age`, `sex`, `primaryD`) VALUES
(14, 'israt222@gmail.com', '1122', 'diya.jpeg', 'Israt Jahan Diya', '23', 'Female', 'Fever, Chest Pain, Mild paralysis on left hand'),
(15, 'ratul@gmail.com', '123', '3.png', 'Md. Hasibul Alam Ratul', '24', 'Male', 'Muscle pain'),
(20, 'shafayat.oshman@yahoo.com', '1234', 'shafayat.jpg', 'Shafayat Osman', '24', 'Male', 'Muscle Atrophy with Mild Jaundice'),
(21, 'hcomputer05@gmail.com', '2211', '', 'Md. Shah Alam', '50', 'Male', 'Heart patient');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
CREATE TABLE IF NOT EXISTS `report` (
  `p_id` int(11) NOT NULL,
  `rname` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`p_id`, `rname`, `file`) VALUES
(20, 'Biochemistry', 'Biochemistry.pdf'),
(20, 'Dehydroepiandrosteron', 'Dehydroepiandrosteron Sulfate.pdf'),
(20, 'Hematology', 'Hematology.pdf'),
(20, 'Lipid Profile', 'Lipid Profile - Serum.pdf'),
(20, 'Liver Function', 'Liver Function Test.pdf'),
(21, 'Biochemistry', 'biochemistry report.pdf'),
(21, 'culture test', 'culture test.pdf'),
(21, 'Doppler study', 'Doppler study.pdf'),
(21, 'hormone report', 'hormone report.pdf'),
(21, 'tomography report', 'tomography report.pdf'),
(14, 'Biochemical_analysis', 'Biochemical_analysis_report.pdf'),
(14, 'Hematological_report', 'Hematological_report.pdf'),
(14, 'Hematology_report-2', 'Hematology_report-2.pdf');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
