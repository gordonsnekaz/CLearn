-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2021 at 11:20 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clearn`
--

-- --------------------------------------------------------

--
-- Table structure for table `assesment`
--

CREATE TABLE `assesment` (
  `assesment_title` varchar(100) DEFAULT NULL,
  `assesment_description` varchar(100) DEFAULT NULL,
  `assesment_time` varchar(100) DEFAULT NULL,
  `assesment_range` int(11) DEFAULT NULL,
  `assesment_start` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assesment`
--

INSERT INTO `assesment` (`assesment_title`, `assesment_description`, `assesment_time`, `assesment_range`, `assesment_start`) VALUES
('Intoduction to C', 'C programming langiage desrciption', '3:10', 10, 0),
('Control loops in C', 'Control loops in C programming language.', '2:40', 20, 10);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_title` varchar(100) NOT NULL,
  `project_description` varchar(100) NOT NULL,
  `project_time` varchar(100) NOT NULL,
  `project_document` varchar(100) NOT NULL,
  `project_video` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_title`, `project_description`, `project_time`, `project_document`, `project_video`) VALUES
('Car rental system', 'A basic car rental system with basic functionality', '12:55', '', ''),
('Fees management System', 'A basic feess management system', '10:40', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `qtn` varchar(200) NOT NULL,
  `qtn_answer1` varchar(100) DEFAULT NULL,
  `qtn_answer2` varchar(100) DEFAULT NULL,
  `qtn_answer3` varchar(100) DEFAULT NULL,
  `qtn_answer4` varchar(100) DEFAULT NULL,
  `qtn_correct_answer` varchar(1) DEFAULT NULL,
  `qtn_order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qtn`, `qtn_answer1`, `qtn_answer2`, `qtn_answer3`, `qtn_answer4`, `qtn_correct_answer`, `qtn_order`) VALUES
('Question Eight here', 'One', 'Two', 'Three', 'Four', 'B', 8),
('Question Eighteen here', 'One', 'Two', 'Three', 'Four', 'B', 18),
('Question Eleven here', 'One', 'Two', 'Three', 'Four', 'C', 11),
('Question Fifteen here', 'One', 'Two', 'Three', 'Four', 'C', 15),
('Question Five here', 'One', 'Two', 'Three', 'Four', 'C', 5),
('Question Four here', 'One', 'Two', 'Three', 'Four', 'D', 4),
('Question Fourteen here', 'One', 'Two', 'Three', 'Four', 'B', 14),
('Question Nine here', 'One', 'Two', 'Three', 'Four', 'C', 9),
('Question Nineteen here', 'One', 'Two', 'Three', 'Four', 'A', 19),
('Question one here', 'One', 'Two', 'Three', 'Four', 'A', 1),
('Question Seven here', 'One', 'Two', 'Three', 'Four', 'A', 7),
('Question Seventeen here', 'One', 'Two', 'Three', 'Four', 'C', 17),
('Question Six here', 'One', 'Two', 'Three', 'Four', 'B', 6),
('Question Sixteen here', 'One', 'Two', 'Three', 'Four', 'D', 16),
('Question Ten here', 'One', 'Two', 'Three', 'Four', 'D', 10),
('Question Thirteen here', 'One', 'Two', 'Three', 'Four', 'A', 13),
('Question Three here', 'One', 'Two', 'Three', 'Four', 'C', 3),
('Question Twelve here', 'One', 'Two', 'Three', 'Four', 'B', 12),
('Question Twenty here', 'One', 'Two', 'Three', 'Four', 'B', 20),
('Question Two here', 'One', 'Two', 'Three', 'Four', 'B', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tutorials`
--

CREATE TABLE `tutorials` (
  `user_reg_number` varchar(100) DEFAULT NULL,
  `tutorial_1` int(3) DEFAULT NULL,
  `tutorial_2` int(3) DEFAULT NULL,
  `tutorial_3` int(3) DEFAULT NULL,
  `tutorial_4` int(3) DEFAULT NULL,
  `tutorial_5` int(3) DEFAULT NULL,
  `tutorial_6` int(3) DEFAULT NULL,
  `tutorial_7` int(3) DEFAULT NULL,
  `tutorial_8` int(3) DEFAULT NULL,
  `tutorial_9` int(3) DEFAULT NULL,
  `tutorial_10` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutorials`
--

INSERT INTO `tutorials` (`user_reg_number`, `tutorial_1`, `tutorial_2`, `tutorial_3`, `tutorial_4`, `tutorial_5`, `tutorial_6`, `tutorial_7`, `tutorial_8`, `tutorial_9`, `tutorial_10`) VALUES
('C20141181L', 30, 0, 0, 0, 100, 0, 0, 0, 0, 0),
('C20140896O', 100, 60, 0, 0, 0, 0, 0, 0, 0, 0),
('C20142159Y', 100, 0, 70, 0, 0, 0, 0, 0, 0, 0),
('C20142118R', 100, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('C20142310O', 100, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('C20142039C', 100, 0, 80, 0, 0, 0, 0, 0, 0, 0),
('C20142126E', 100, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('C20142173P', 100, 70, 60, 25, 0, 0, 0, 0, 0, 0),
('C20141912O', 100, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('C20143041Y', 100, 20, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tutorials_definition`
--

CREATE TABLE `tutorials_definition` (
  `tutorial_key` varchar(100) NOT NULL,
  `tutorial_definition` varchar(100) NOT NULL,
  `tutorial_description` varchar(100) DEFAULT NULL,
  `tutorial_time` varchar(100) DEFAULT NULL,
  `tutorial_document` varchar(100) DEFAULT NULL,
  `tutorial_video` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutorials_definition`
--

INSERT INTO `tutorials_definition` (`tutorial_key`, `tutorial_definition`, `tutorial_description`, `tutorial_time`, `tutorial_document`, `tutorial_video`) VALUES
('tutorial_1', 'Intoduction to C', 'C programming langiage desrciption', '2:33', NULL, NULL),
('tutorial_10', 'File input and output ', 'Files in c programming language.', '6:44', NULL, NULL),
('tutorial_2', 'Basic output program', 'Basic output program in C programming language.', '1:59', NULL, NULL),
('tutorial_3', 'Data types in C', 'Data types in C programming language', '5:12', NULL, NULL),
('tutorial_4', 'Input and output in C', 'Input and outout in C programming language', '4:10', NULL, NULL),
('tutorial_5', 'Conditional Execution', 'Conditional statements in C programming language.', '6:00', NULL, NULL),
('tutorial_6', 'Control loops in C', 'Control loops in C programming language.', '10:11', NULL, NULL),
('tutorial_7', 'Functions in C', 'Description for Function in C programming language.', '9:10', NULL, NULL),
('tutorial_8', 'Arrays and Pointers', 'Arrays and pointers in C programming language.', '4:40', NULL, NULL),
('tutorial_9', 'Structures in C', 'Structures in C programming language description.', '7:34', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_reg_number` char(100) NOT NULL,
  `user_password` char(100) NOT NULL,
  `user_name` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_reg_number`, `user_password`, `user_name`) VALUES
('C20140896O', '2222', 'Chida lordshare'),
('C20141181L', '111', 'Chasuruka Takunda'),
('C20141782T', '1212', 'Manzini Takudzwa'),
('C20141912O', '9999', 'Kambele Natasha'),
('C20142039C', '6666', 'Chimulambe Carol'),
('C20142118R', '1313', 'Masimba Desmond'),
('C20142126E', '7777', 'Dangare Alvin'),
('C20142159Y', '3333', 'Chikunda Simbiso'),
('C20142173P', '8888', 'Gumera Tonderai'),
('C20142310O', '5555', 'Chimudzeka Tanaka'),
('C20142347L', '4444', 'Chimbeva Panashe'),
('C20142893B', '1414', 'Masosonore Gashirai'),
('C20143041Y', '1010', 'Kanyimo Lina');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assesment`
--
ALTER TABLE `assesment`
  ADD UNIQUE KEY `assesment_range` (`assesment_range`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD UNIQUE KEY `project_title` (`project_title`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`qtn`);

--
-- Indexes for table `tutorials`
--
ALTER TABLE `tutorials`
  ADD KEY `user_reg_number` (`user_reg_number`);

--
-- Indexes for table `tutorials_definition`
--
ALTER TABLE `tutorials_definition`
  ADD PRIMARY KEY (`tutorial_key`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_reg_number`),
  ADD UNIQUE KEY `user_reg_number` (`user_reg_number`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tutorials`
--
ALTER TABLE `tutorials`
  ADD CONSTRAINT `tutorials_ibfk_1` FOREIGN KEY (`user_reg_number`) REFERENCES `users` (`user_reg_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
