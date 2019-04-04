-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 02, 2019 at 08:33 PM
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
  `dfield` varchar(255) NOT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`d_id`, `email`, `password`, `dname`, `dfield`) VALUES
(1, 'zakia', '321', 'Dr. Zakia Mahruz', 'Dermatology');

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
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

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
