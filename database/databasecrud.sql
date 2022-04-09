-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 09, 2022 at 04:07 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `databasecrud`
--

-- --------------------------------------------------------

--
-- Table structure for table `pozicije`
--

DROP TABLE IF EXISTS `pozicije`;
CREATE TABLE IF NOT EXISTS `pozicije` (
  `pozicije_id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(255) NOT NULL,
  PRIMARY KEY (`pozicije_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pozicije`
--

INSERT INTO `pozicije` (`pozicije_id`, `position`) VALUES
(1, 'programmer'),
(2, 'manager'),
(3, 'designer'),
(4, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `projekat`
--

DROP TABLE IF EXISTS `projekat`;
CREATE TABLE IF NOT EXISTS `projekat` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(255) NOT NULL,
  `project_desc` varchar(255) NOT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projekat`
--

INSERT INTO `projekat` (`project_id`, `project_name`, `project_desc`) VALUES
(1, 'Centar za licni razvoj', 'U nasoj ustanovi bavimo se licnim i personalnim razvojom.'),
(2, 'Infohub', 'Predsavljanje najnovijih tehnologija u IT svetu.'),
(4, 'Next.js', 'Prezentacija novih tehnologija u IT svetu.'),
(5, 'Gatsby.js  ', 'Shoping cart in progress'),
(6, 'Laravel', 'Laravel je programski jezik zasnovan na php backend tehnologiji.');

-- --------------------------------------------------------

--
-- Table structure for table `zadatak`
--

DROP TABLE IF EXISTS `zadatak`;
CREATE TABLE IF NOT EXISTS `zadatak` (
  `task_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_name` varchar(255) NOT NULL,
  `task_description` varchar(255) NOT NULL,
  `project_task_id` int(11) NOT NULL,
  `worker_task_id` int(11) NOT NULL,
  `deadline` date NOT NULL,
  PRIMARY KEY (`task_id`),
  KEY `foreign_task_project` (`project_task_id`),
  KEY `foreign_task_worker` (`worker_task_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zadatak`
--

INSERT INTO `zadatak` (`task_id`, `task_name`, `task_description`, `project_task_id`, `worker_task_id`, `deadline`) VALUES
(7, 'Kreacija za deset dana', 'Cao', 1, 34, '2022-04-14'),
(8, 'Kreacija 5 dana', 'Kreacija', 1, 34, '2022-04-11'),
(9, 'lalal', 'lflasfs', 1, 34, '2022-04-10'),
(11, 'ffdasfasdf', 'sfdafdasf', 1, 34, '2022-04-12'),
(12, 'dada', 'fsdfafasf', 5, 80, '2022-04-08');

-- --------------------------------------------------------

--
-- Table structure for table `zaposleni`
--

DROP TABLE IF EXISTS `zaposleni`;
CREATE TABLE IF NOT EXISTS `zaposleni` (
  `zaposleni_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `staff_first_name` varchar(255) NOT NULL,
  `staff_last_name` varchar(255) NOT NULL,
  `staff_payment` float NOT NULL,
  `staff_email` varchar(255) NOT NULL,
  `staff_password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`zaposleni_id`),
  KEY `stuff_id_index` (`staff_id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zaposleni`
--

INSERT INTO `zaposleni` (`zaposleni_id`, `staff_id`, `staff_first_name`, `staff_last_name`, `staff_payment`, `staff_email`, `staff_password`) VALUES
(34, 4, 'John', 'Doe', 140000, 'admin@admin.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(35, 4, 'Jasar', 'Ahmedovski', 180000, 'jasarahmedovski@gmail.com', '5a4d22dca85f3b97a58c9309608806b3'),
(64, 3, 'Danijel', 'Doe', 110000, 'danije_doe@gmail.com', NULL),
(76, 1, 'Hanna', 'Starblitz', 160000, 'hanna_s@hotmail.com', NULL),
(77, 1, 'Slobodan', 'Cvetkovic', 80000, 'slobo_cvet@gmail.com', NULL),
(80, 2, 'Rastko', 'Dragojlovic', 120000, 'rastko_dragojlovic@gmail.com', NULL),
(83, 1, 'Dragica', 'Milivojevic', 150000, 'dragica_m@gmail.com', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `zadatak`
--
ALTER TABLE `zadatak`
  ADD CONSTRAINT `foreign_task_project` FOREIGN KEY (`project_task_id`) REFERENCES `projekat` (`project_id`),
  ADD CONSTRAINT `foreign_task_worker` FOREIGN KEY (`worker_task_id`) REFERENCES `zaposleni` (`zaposleni_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `zaposleni`
--
ALTER TABLE `zaposleni`
  ADD CONSTRAINT `zaposleni_pozicije` FOREIGN KEY (`staff_id`) REFERENCES `pozicije` (`pozicije_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
