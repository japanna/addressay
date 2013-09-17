-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 09, 2012 at 04:24 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `averages`
--

CREATE TABLE IF NOT EXISTS `averages` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `address` char(100) NOT NULL,
  `latlng` char(30) NOT NULL,
  `lat` float(9,6) NOT NULL,
  `lng` float(9,6) NOT NULL,
  `parking` int(10) unsigned NOT NULL,
  `transportation` int(10) unsigned NOT NULL,
  `dining` int(10) unsigned NOT NULL,
  `social` int(10) unsigned NOT NULL,
  `family` int(10) unsigned NOT NULL,
  `shopping` int(10) unsigned NOT NULL,
  `recreation` int(10) unsigned NOT NULL,
  `culture` int(10) unsigned NOT NULL,
  `total_score` int(10) unsigned NOT NULL,
  `votes` int(10) unsigned NOT NULL DEFAULT '1',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `latlng` (`latlng`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `averages`
--

INSERT INTO `averages` (`ID`, `address`, `latlng`, `lat`, `lng`, `parking`, `transportation`, `dining`, `social`, `family`, `shopping`, `recreation`, `culture`, `total_score`, `votes`, `time`) VALUES
(1, '901 Mission St, San Francisco, CA 94103, USA', '37.782447,-122.406646', 37.782448, -122.406647, 31, 79, 59, 66, 15, 30, 45, 85, 410, 1, '2012-12-09 07:34:55'),
(2, '5 Mint Plaza, San Francisco, CA 94103, USA', '37.78287,-122.407904', 37.782871, -122.407906, 21, 80, 81, 76, 21, 40, 44, 86, 449, 1, '2012-12-09 07:33:30'),
(3, '2 Mint Plaza, San Francisco, CA 94103, USA', '37.783138,-122.407756', 37.783138, -122.407761, 25, 91, 77, 80, 22, 40, 39, 96, 470, 1, '2012-12-09 07:45:24'),
(4, '801 Mission St, San Francisco, CA 94103, USA', '37.784272,-122.404031', 37.784271, -122.404030, 27, 75, 68, 36, 69, 67, 73, 100, 515, 1, '2012-12-09 07:38:12'),
(5, '851 Mission St, San Francisco, CA 94103, USA', '37.784412,-122.404296', 37.784412, -122.404297, 56, 84, 62, 66, 31, 39, 63, 94, 495, 1, '2012-12-09 07:46:13'),
(6, '12 4th St, San Francisco, CA 94103, USA', '37.785308,-122.405558', 37.785309, -122.405556, 1, 90, 62, 67, 13, 25, 39, 93, 390, 1, '2012-12-09 07:36:23'),
(7, '2 3rd St, San Francisco, CA 94103, USA', '37.787643,-122.403475', 37.787643, -122.403473, 1, 94, 55, 71, 32, 39, 60, 90, 442, 1, '2012-12-09 07:39:35'),
(8, '1 Mint Plaza, San Francisco, CA 94103, USA', '37.7833,-122.407209', 37.783298, -122.407211, 10, 100, 69, 71, 26, 58, 61, 100, 495, 1, '2012-12-09 08:42:25'),
(9, '692 Howard St, San Francisco, CA 94103, USA', '37.785182,-122.400307', 37.785183, -122.400307, 29, 60, 63, 43, 71, 79, 86, 100, 531, 1, '2012-12-09 08:47:17'),
(10, '771 Mission St, San Francisco, CA 94103, USA', '37.78535,-122.40311', 37.785351, -122.403107, 44, 94, 57, 62, 94, 54, 86, 100, 591, 1, '2012-12-09 08:59:02'),
(11, '721 Market St, San Francisco, CA 94103, USA', '37.786856,-122.403905', 37.786858, -122.403908, 130, 189, 191, 171, 125, 121, 200, 200, 1327, 2, '2012-12-09 09:05:20');

-- --------------------------------------------------------

--
-- Table structure for table `reviewed`
--

CREATE TABLE IF NOT EXISTS `reviewed` (
  `userID` char(26) NOT NULL,
  `address` char(100) NOT NULL,
  `latlng` char(30) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `transportation` int(3) unsigned NOT NULL,
  `parking` int(3) unsigned NOT NULL,
  `dining` int(3) unsigned NOT NULL,
  `social` int(3) unsigned NOT NULL,
  `shopping` int(3) unsigned NOT NULL,
  `recreation` int(3) unsigned NOT NULL,
  `culture` int(3) unsigned NOT NULL,
  `family` int(3) unsigned NOT NULL,
  `total_score` int(3) unsigned NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviewed`
--

INSERT INTO `reviewed` (`userID`, `address`, `latlng`, `lat`, `lng`, `transportation`, `parking`, `dining`, `social`, `shopping`, `recreation`, `culture`, `family`, `total_score`, `time`) VALUES
('0qc780l2j8h966lbup1u5tqdp5', '5 Mint Plaza, San Francisco, CA 94103, USA', '37.78287,-122.407904', 37.782871, -122.407906, 80, 21, 81, 76, 40, 44, 86, 21, 449, '2012-12-09 07:33:29'),
('0qc780l2j8h966lbup1u5tqdp5', '901 Mission St, San Francisco, CA 94103, USA', '37.782447,-122.406646', 37.782448, -122.406647, 79, 31, 59, 66, 30, 45, 85, 15, 410, '2012-12-09 07:34:55'),
('0qc780l2j8h966lbup1u5tqdp5', '12 4th St, San Francisco, CA 94103, USA', '37.785308,-122.405558', 37.785309, -122.405556, 90, 1, 62, 67, 25, 39, 93, 13, 390, '2012-12-09 07:36:23'),
('0qc780l2j8h966lbup1u5tqdp5', '801 Mission St, San Francisco, CA 94103, USA', '37.784272,-122.404031', 37.784271, -122.404030, 75, 27, 68, 36, 67, 73, 100, 69, 515, '2012-12-09 07:38:12'),
('0qc780l2j8h966lbup1u5tqdp5', '2 3rd St, San Francisco, CA 94103, USA', '37.787643,-122.403475', 37.787643, -122.403473, 94, 1, 55, 71, 39, 60, 90, 32, 442, '2012-12-09 07:39:35'),
('0qc780l2j8h966lbup1u5tqdp5', '2 Mint Plaza, San Francisco, CA 94103, USA', '37.783138,-122.407756', 37.783138, -122.407761, 91, 25, 77, 80, 40, 39, 96, 22, 470, '2012-12-09 07:45:24'),
('0qc780l2j8h966lbup1u5tqdp5', '851 Mission St, San Francisco, CA 94103, USA', '37.784412,-122.404296', 37.784412, -122.404297, 84, 56, 62, 66, 39, 63, 94, 31, 495, '2012-12-09 07:46:13'),
('0qc780l2j8h966lbup1u5tqdp5', '1 Mint Plaza, San Francisco, CA 94103, USA', '37.7833,-122.407209', 37.783298, -122.407211, 100, 10, 69, 71, 58, 61, 100, 26, 495, '2012-12-09 08:42:25'),
('0qc780l2j8h966lbup1u5tqdp5', '692 Howard St, San Francisco, CA 94103, USA', '37.785182,-122.400307', 37.785183, -122.400307, 60, 29, 63, 43, 79, 86, 100, 71, 531, '2012-12-09 08:47:17'),
('0qc780l2j8h966lbup1u5tqdp5', '771 Mission St, San Francisco, CA 94103, USA', '37.78535,-122.40311', 37.785351, -122.403107, 94, 44, 57, 62, 54, 86, 100, 94, 591, '2012-12-09 08:59:02'),
('0qc780l2j8h966lbup1u5tqdp5', '721 Market St, San Francisco, CA 94103, USA', '37.786856,-122.403905', 37.786858, -122.403908, 90, 60, 91, 96, 60, 100, 100, 53, 650, '2012-12-09 09:05:20');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
