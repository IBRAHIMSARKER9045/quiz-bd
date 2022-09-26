-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2022 at 03:49 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `icon` varchar(60) NOT NULL,
  `uid` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `icon`, `uid`, `created`) VALUES
(8, 'PRE-SCHOOL', 'preSchool1', 4, '2022-03-29 10:56:17'),
(9, 'PRIMARY SCHOOL', 'primary', 4, '2022-03-29 10:56:41'),
(10, 'HIGH SCHOOL', 'high', 4, '2022-03-29 10:57:23'),
(11, 'SCONDARY', 'SCONDARY', 4, '2022-03-29 10:58:05'),
(12, 'HIGHER-SCONDARY', 'HIGHER-SCONDARY', 4, '2022-03-29 11:01:09'),
(14, 'Degree', 'Degree', 5, '2022-03-31 23:48:13'),
(15, 'Honours', 'Honours', 5, '2022-03-31 23:48:34'),
(16, 'Masters', 'Masters', 5, '2022-03-31 23:48:51'),
(17, 'Engineering', 'Engineering', 5, '2022-03-31 23:49:24'),
(18, 'BCS', 'BCS', 5, '2022-03-31 23:50:02'),
(19, 'Admission Test', 'Admission Test', 5, '2022-03-31 23:50:49'),
(20, 'Job Preparetion', 'Job Preparetion', 5, '2022-03-31 23:51:03'),
(21, 'Sports', 'Sports', 5, '2022-03-31 23:51:53'),
(22, 'Islamic', 'Islamic', 5, '2022-03-31 23:52:50'),
(23, 'General Knowledge', 'General Knowledge', 5, '2022-03-31 23:54:15'),
(24, 'IELTS', 'IELTS', 5, '2022-03-31 23:56:13'),
(25, 'ICT', 'ICT', 5, '2022-04-01 14:57:32'),
(26, 'History', 'History', 5, '2022-04-01 14:58:17'),
(27, 'Science', 'Science', 5, '2022-04-01 14:58:37'),
(28, 'Mathematics', 'Mathematics', 5, '2022-04-01 15:00:07'),
(29, 'xyz', '', 9, '2022-04-18 10:31:24'),
(30, 'abcd', '', 9, '2022-04-18 10:33:46');

-- --------------------------------------------------------

--
-- Table structure for table `category_quiz`
--

CREATE TABLE `category_quiz` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `scid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) NOT NULL,
  `uid` int(11) NOT NULL,
  `name` varchar(65) NOT NULL,
  `email` varchar(65) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `reply` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `uid`, `name`, `email`, `message`, `reply`) VALUES
(4, 4, 'IRIN ', 'irinbinteabbas17@gmail.com', 'Can I Print the Quizzes?', 'Yes, you can print any of the individual quizzes. Printed quizzes make ideal entertainment on long journeys, family get-togethers and times when a computer isn\'t to hand. And all the time students are consolidating their school learning!'),
(5, 4, 'IRIN ', 'irinabbas15@gmail.com', 'Are the Quizzes Copyrighted?', 'Yes, all our quizzes are subject to copyright restriction but we allow our subscribers to print the quizzes; provided that they are reproduced in the exact form that our software generates (every sheet must show the Education Quizzes details at the bottom of the quiz). Use of any of the materials without showing the Education Quizzes details is a breach of our copyright. Legal action will be taken against any school that uses the quizzes without our express permission. After all, we have to make a living!'),
(6, 4, 'IRIN ', 'irinbinteabbas17@gmail.com', 'How do I Find Quizzes on a Particular Subject?', 'Navigating the site is easily done by clicking the buttons on the top of every page.'),
(7, 4, 'IRIN BINTE ABBAS', 'irinbinteabbas17@gmail.com', 'Can I Print the Quizzes?', 'Yes, you can print any of the individual quizzes. Printed quizzes make ideal entertainment on long journeys, family get-togethers and times when a computer isn\'t to hand. And all the time students are consolidating their school learning!'),
(8, 11, 'ibrahim', 'sarket', 'I am ibrahim sarker', ''),
(9, 10, 'ibrahim', 'irinbinteabbas17@gmail.com', 'sdsefdh', '');

-- --------------------------------------------------------

--
-- Table structure for table `leaderboard`
--

CREATE TABLE `leaderboard` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `name` text NOT NULL,
  `qsetid` int(11) NOT NULL,
  `score` decimal(8,2) NOT NULL,
  `examtime` timestamp NOT NULL DEFAULT current_timestamp(),
  `comment` varchar(80) NOT NULL,
  `parcentile` varchar(3) NOT NULL,
  `updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leaderboard`
--

INSERT INTO `leaderboard` (`id`, `uid`, `name`, `qsetid`, `score`, `examtime`, `comment`, `parcentile`, `updated`) VALUES
(88, 4, 'IRIN BINTE ABBAS', 1, '4.00', '2022-04-20 07:44:07', 'comment', '0', NULL),
(91, 4, 'IRIN BINTE ABBAS', 7, '4.00', '2022-04-20 07:46:38', 'comment', '0', NULL),
(95, 4, 'IRIN BINTE ABBAS', 6, '4.00', '2022-04-21 07:53:43', 'comment', '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `id` int(11) UNSIGNED NOT NULL,
  `uid` int(11) NOT NULL,
  `question` varchar(512) NOT NULL,
  `answer` varchar(512) DEFAULT NULL,
  `q_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `quizes`
--

CREATE TABLE `quizes` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `scid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `question` varchar(512) NOT NULL,
  `op1` varchar(256) NOT NULL,
  `op2` varchar(256) NOT NULL,
  `op3` varchar(256) NOT NULL,
  `op4` varchar(256) NOT NULL,
  `ans` varchar(12) NOT NULL,
  `uid` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quizes`
--

INSERT INTO `quizes` (`id`, `cid`, `scid`, `tid`, `question`, `op1`, `op2`, `op3`, `op4`, `ans`, `uid`, `created`, `deleted`) VALUES
(3, 9, 7, 4, 'What is the past form of \"Go\" ?', 'Goes', 'Went', 'Gone', 'Go', 'Went', 4, '2022-03-29 11:48:04', NULL),
(4, 9, 7, 3, '\"I go to school.\" - Identify the tense ?', 'Past tense', 'Present tense', 'Future tense', 'Past perfect tense', 'Present tens', 4, '2022-03-29 11:56:00', NULL),
(5, 9, 8, 5, 'What is the value of \"( 1 + 1 )\" ?', '1', '2', '3', '4', '2', 4, '2022-03-29 11:58:20', NULL),
(6, 9, 8, 5, '( 5 + 9 ) = ?', '11', '12', '13', '14', '14', 4, '2022-03-29 12:00:29', NULL),
(7, 9, 8, 6, '( 100 - 99 ) = ?', '1', '2', '3', '4', '1', 4, '2022-03-29 12:01:42', NULL),
(8, 9, 8, 6, '( 20 - 10 ) = ?', '10', '20', '30', '40', '10', 4, '2022-03-29 12:04:42', NULL),
(9, 8, 10, 7, 'Which word starts with \"B\"?', 'Appel', 'Ball', 'Bat', 'Cap', 'A', 5, '2022-04-02 03:48:55', NULL),
(10, 8, 10, 7, 'Which word starts with \"A\"? ', 'fish', 'Man', 'Banana', 'Cap', '', 5, '2022-04-02 04:01:09', NULL),
(11, 8, 10, 7, 'Which word starts with \"C\"?', 'fish', 'Man', 'Banana', 'Cap', 'Cap', 5, '2022-04-02 04:01:38', NULL),
(12, 8, 10, 7, 'Which word starts with E?', 'Egg', 'goat', 'zoo', 'X-ray', 'Egg', 5, '2022-04-02 04:05:04', NULL),
(14, 8, 10, 7, 'Which word starts with F?', 'foot ball', 'man', 'duck', 'fish', 'foot ball', 5, '2022-04-02 04:59:14', NULL),
(15, 8, 10, 7, 'Which word starts with H?', 'Hand', 'Man', 'Ball', 'fish', 'Hand', 5, '2022-04-02 05:00:22', NULL),
(16, 8, 10, 8, 'The meaning of the word man?', 'মানুষ', 'গরু', 'বই', 'কবুতর', 'মানুষ', 5, '2022-04-02 05:04:01', NULL),
(17, 8, 10, 8, 'The meaning of the word \"Doll\"?', 'বই', 'বল', 'মই', 'পুতুল', 'পুতুল', 5, '2022-04-02 05:06:06', NULL),
(18, 8, 10, 8, 'The meaning of the word ”Book\"', 'হাত', 'ছাতা', 'কলম', 'বই', 'বই', 5, '2022-04-02 05:07:42', NULL),
(19, 8, 10, 8, 'The meaning of the word ”Pen\"?', 'হাত', 'ছাতা', 'কলম', 'বই', 'কলম', 5, '2022-04-02 05:08:42', NULL),
(20, 8, 10, 8, 'The meaning of the word \"Hen\"?', 'হাত', 'ছাতা', 'কবুতর', 'বই', 'কবুতর', 5, '2022-04-02 05:10:01', NULL),
(21, 8, 11, 16, 'নিচের কোনটি “এক”?', '১', '২', '৫', '৭', '১', 5, '2022-04-02 05:11:47', NULL),
(22, 8, 11, 16, 'নিচের কোনটি ”পাঁচ”?', '১', '২', '৫', '৭', '৫', 5, '2022-04-02 05:12:54', NULL),
(23, 8, 11, 16, 'নিচের কোনটি “এক শত”?', '২০০', '৫০০', '১০', '১০০', '১০০', 5, '2022-04-02 05:14:16', NULL),
(24, 8, 11, 14, '৫+৪=?', '২০', '৮', '৭', '৯', '9', 5, '2022-04-02 05:15:42', NULL),
(25, 8, 11, 14, '২০+৬৫=?', '৫৫', '৭৫', '৮৫', '৯০', '৮৫', 5, '2022-04-02 05:16:40', NULL),
(26, 8, 11, 14, '১০০+৫০=?', '১৫০', '৭৫', '১২০', '১৪০', '১৫০', 5, '2022-04-02 05:17:36', NULL),
(27, 8, 11, 14, '৭৫+৩০=?', '১৫০', '১০০', '১২০', '১৪০', '১০০', 5, '2022-04-02 05:18:38', NULL),
(28, 8, 11, 15, '১৫০-১০০=?', '১০০', '৭৫', '৬০', '৫০', '৫০', 5, '2022-04-02 05:21:51', NULL),
(29, 8, 11, 15, '১২০-৫০=?', '১০০', '৭০', '৬০', '৫০', '৭০', 5, '2022-04-02 05:22:32', NULL),
(30, 9, 8, 6, '13+14', '27', '28', '29', '30', '27', 4, '2022-04-04 03:53:24', NULL),
(31, 9, 8, 6, '50+60=?', '100', '110', '120', '130', '110', 4, '2022-04-04 03:54:13', NULL),
(32, 9, 8, 6, '7+9 = ?', '15', '16', '17', '18', '15', 4, '2022-04-04 03:55:02', NULL),
(33, 9, 8, 5, '22+22 =?', '44', '34', '46', '48', '44', 4, '2022-04-04 03:57:33', NULL),
(34, 9, 8, 5, '15 + 15 = ?', '30 ', '40', '50', '60', '30', 4, '2022-04-04 03:58:31', NULL),
(35, 9, 8, 5, '6+6 = ?', '12', '13', '14', '15', '12', 4, '2022-04-04 03:59:12', NULL),
(36, 9, 8, 5, '50 + 40 = ?', '100', '90', '80', '110', '90', 4, '2022-04-04 04:00:09', NULL),
(37, 9, 8, 5, '4 + 4 = ?', '9', '8', '10', '12', '8', 4, '2022-04-04 04:00:55', NULL),
(38, 9, 8, 5, '12 + 12 = ?', '24', '25', '26', '27', '24', 4, '2022-04-04 04:01:45', NULL),
(39, 9, 8, 5, '9 + 9 = ?', '18', '19', '20', '16', '18', 4, '2022-04-04 04:02:26', NULL),
(40, 9, 8, 5, '5 + 5 =?', '10', '11', '12', '13', '10', 4, '2022-04-04 04:03:05', NULL),
(41, 9, 8, 5, '14 + 14 = ?', '27', '26', '28', '30', '28', 4, '2022-04-04 04:04:01', NULL),
(42, 9, 8, 5, '10 + 10 = ?', '20', '30', '40', '10', '20', 4, '2022-04-04 04:04:45', NULL),
(43, 9, 8, 5, '3 + 9 = ?', '10', '11', '12', '13', '12', 4, '2022-04-04 04:06:07', NULL),
(44, 9, 8, 5, '45 + 45 = ?', '80', '90', '100', '70', '90', 4, '2022-04-04 04:06:51', NULL),
(45, 9, 8, 5, '250 + 250 = ?', '300', '400', '500', '600', '500', 4, '2022-04-04 04:07:50', NULL),
(46, 9, 8, 5, '1 + 0 = ?', '10', '0', '1', '00', '1', 4, '2022-04-04 04:08:41', NULL),
(47, 9, 8, 5, '33 + 17 = ?', '30', '40', '50', '60', '50', 4, '2022-04-04 04:09:47', NULL),
(48, 9, 8, 6, '10 - 1 = ?\n', '5', '6', '7', '9', '9', 4, '2022-04-04 04:19:19', NULL),
(49, 9, 8, 6, '11 - 2 = ?', '10', '9', '8', '7', '9', 4, '2022-04-04 04:19:53', NULL),
(50, 9, 8, 6, '13 - 4 = ?', '10', '9', '8', '7', '9', 4, '2022-04-04 04:20:38', NULL),
(51, 9, 8, 6, '17 -9 = ?', '10', '9', '8', '7', '8', 4, '2022-04-04 04:21:07', NULL),
(52, 9, 8, 6, '22-14=?', '10', '9', '8', '7', '8', 4, '2022-04-04 04:21:35', NULL),
(53, 9, 8, 6, '35 - 28= ?', '10', '9', '8', '7', '7', 4, '2022-04-04 04:22:03', NULL),
(54, 9, 8, 6, '30 - 20 =?', '10', '9', '8', '7', '10', 4, '2022-04-04 04:22:29', NULL),
(55, 9, 8, 6, '10 - 3 = ?', '10', '9', '8', '7', '10', 4, '2022-04-04 04:22:41', NULL),
(56, 9, 8, 6, '30 - 23 = ?', '10', '9', '8', '7', '7', 4, '2022-04-04 04:23:06', NULL),
(57, 9, 8, 6, '32 - 24 = ?', '10', '9', '8', '7', '8', 4, '2022-04-04 04:23:28', NULL),
(58, 9, 8, 6, '39 - 30 = ?', '10', '9', '8', '7', '9', 4, '2022-04-04 04:23:59', NULL),
(59, 9, 8, 6, '13 -5 = ?', '10', '9', '8', '7', '8', 4, '2022-04-04 04:24:20', NULL),
(60, 9, 8, 6, '30 - 22 = ?', '10', '9', '8', '7', '8', 4, '2022-04-04 04:24:38', NULL),
(61, 9, 8, 6, '19 - 10 = ?', '10', '9', '8', '7', '9', 4, '2022-04-04 04:26:14', NULL),
(62, 9, 8, 6, '55 - 46', '10', '9', '8', '7', '9', 4, '2022-04-04 04:26:36', NULL),
(63, 9, 7, 4, 'what is the past form of \"Eat\"?', 'Eat', 'ate', 'Eaten', 'it', 'ate', 4, '2022-04-04 04:31:00', NULL),
(64, 9, 7, 4, 'what is the pas participle form of \"Eat\"?', 'Eat', 'ate', 'Eaten', 'it', 'Eaten', 4, '2022-04-04 04:31:38', NULL),
(65, 9, 7, 4, 'What is the present form of Eat?', 'Eat', 'ate', 'Eaten', 'it', 'Eat', 4, '2022-04-04 04:32:22', NULL),
(66, 9, 7, 4, 'what is the past participle form of \"Go\" ?', 'Go', 'went ', 'gone', 'goes', 'gone', 4, '2022-04-04 04:33:18', NULL),
(67, 9, 7, 4, 'what is the past form of \"Do\"?', 'Do', 'Did', 'Done', 'Does', 'Did', 4, '2022-04-04 04:34:21', NULL),
(68, 9, 7, 4, 'what is the past- participle form of  \"Do\" ?', 'Do', 'Did', 'Done', 'Does', 'Done', 4, '2022-04-04 04:35:12', NULL),
(69, 9, 7, 4, 'what is the past form of run ?', 'run', 'ran', 'rin', 'reen', 'ran', 4, '2022-04-04 04:39:15', NULL),
(70, 9, 7, 4, 'what is the past participle form of run?', 'run', 'ran', 'rin', 'reen', 'run', 4, '2022-04-04 04:39:48', NULL),
(71, 9, 7, 4, 'what is the past form of come ?', 'come', 'came', 'comes', 'com', 'came', 4, '2022-04-04 04:40:46', NULL),
(72, 9, 7, 4, 'what is the past participle form of come ?', 'come', 'came', 'comes', 'com', 'come', 4, '2022-04-04 04:41:12', NULL),
(73, 9, 7, 4, 'what is the past form of arrive ?', 'Arrive', 'Arrived', 'arrives', 'arrove', 'Arrived', 4, '2022-04-04 04:42:33', NULL),
(74, 9, 7, 4, 'what is the past form of write ?', 'write', 'wrote', 'written', 'writes', 'wrote', 4, '2022-04-04 04:43:34', NULL),
(75, 9, 7, 4, 'what is the past participle form of write ?', 'write', 'wrote', 'written', 'writes', 'written', 4, '2022-04-04 04:44:02', NULL),
(76, 9, 7, 4, 'what is the past form of count ?', 'counted', 'count', 'counting', 'counts', 'count', 4, '2022-04-04 04:47:10', NULL),
(77, 8, 10, 7, 'a', 'a', 's', 'd', 'd', 's', 4, '2022-04-04 09:10:54', NULL),
(78, 8, 10, 7, 'Match The letter  : G', 'E', 'F', 'G', 'H', 'G', 9, '2022-04-17 08:45:06', NULL),
(79, 8, 10, 7, 'Which word is started with B ?', 'BALL', 'APPLE', 'CAP', 'DOLL', 'BALL', 9, '2022-04-17 08:45:12', NULL),
(80, 8, 10, 7, 'E__G?', 'E', 'F', 'G', 'H', 'G', 9, '2022-04-17 08:45:16', NULL),
(81, 8, 10, 7, 'Match the letter :  A', 'A', 'B', 'C', 'D', 'A', 9, '2022-04-17 08:45:20', NULL),
(82, 8, 10, 7, 'Match the letter :  A', 'A', 'B', 'C', 'D', 'A', 9, '2022-04-17 08:45:24', NULL),
(83, 8, 10, 7, 'APP__E?', 'A', 'P', 'L', 'E', 'L', 9, '2022-04-17 08:45:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quizset`
--

CREATE TABLE `quizset` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `scid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `setname` varchar(60) NOT NULL,
  `quizset` text DEFAULT NULL,
  `status` set('1','2','3') NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quizset`
--

INSERT INTO `quizset` (`id`, `cid`, `scid`, `tid`, `setname`, `quizset`, `status`, `created`) VALUES
(1, 9, 8, 5, 'Set - 1', '6,5,33,34,35', '1', '2022-04-04 04:14:34'),
(2, 9, 8, 5, 'Set - 2', '36,37,38,39,40', '1', '2022-04-04 04:15:32'),
(4, 9, 8, 5, 'Set - 3', '41,42,43,44,45', '1', '2022-04-04 04:17:46'),
(6, 9, 8, 6, 'Set - 1', '7,8,48,49,50', '1', '2022-04-04 04:27:42'),
(7, 9, 8, 6, 'Set - 2', '51,52,53,54,55', '1', '2022-04-04 04:28:23'),
(8, 9, 8, 6, 'Set - 3', '56,57,58,59,60', '1', '2022-04-04 04:28:56'),
(10, 9, 7, 4, 'Set - 2', '67,68,69,70,71', '1', '2022-04-04 04:50:06'),
(11, 9, 7, 4, 'Set - 3', '72,73,74,75,76', '1', '2022-04-04 04:50:37'),
(12, 9, 7, 4, 'Set - 1', '3,63,64,65,66', '1', '2022-04-04 04:52:10'),
(13, 8, 10, 7, 'Quiz Set-01', '9,10,11,12,13', '1', '2022-04-10 09:10:09'),
(14, 8, 10, 8, 'Quiz Set - 01', '16,17,18,19,20', '1', '2022-04-10 09:11:25'),
(15, 8, 11, 14, 'Quiz Set-01', '24,25,26,27', '1', '2022-04-10 09:12:27'),
(16, 9, 7, 4, 'Quiz Set-04', '63,64,65,66,67', '1', '2022-04-10 09:18:23'),
(17, 9, 7, 4, 'Quiz Set-05', '67,68,69,70,71', '1', '2022-04-10 09:20:09'),
(19, 8, 10, 7, 'Quiz Set - 02', '79,80,81,82,83', '1', '2022-04-17 08:46:39'),
(20, 7, 3, 4, 'set1', '56,57,58', '1', '2022-04-20 09:38:42'),
(21, 7, 3, 4, 'set1', '56,57,58', '1', '2022-04-20 09:39:06'),
(22, 8, 10, 7, '1', 'Array', '', '2022-04-20 10:23:54'),
(23, 8, 10, 7, '1', 'Array', '', '2022-04-20 10:24:17'),
(24, 8, 10, 8, '1', 'Array', '1', '2022-04-20 10:27:45'),
(25, 0, 0, 0, '1', '', '1', '2022-04-20 10:28:28'),
(26, 8, 10, 7, '1', 'Array', '1', '2022-04-20 10:33:23');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `qsetid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `uans` varchar(12) NOT NULL,
  `correct` set('1','0') NOT NULL,
  `points` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `uid`, `qsetid`, `qid`, `uans`, `correct`, `points`, `created`) VALUES
(556, 4, 1, 5, '2', '1', 1, '2022-04-20 07:44:07'),
(557, 4, 1, 6, '14', '1', 1, '2022-04-20 07:44:07'),
(558, 4, 1, 33, '44', '1', 1, '2022-04-20 07:44:07'),
(559, 4, 1, 34, '30 ', '1', 1, '2022-04-20 07:44:07'),
(560, 4, 1, 35, '15', '0', 0, '2022-04-20 07:44:07'),
(571, 4, 7, 51, '8', '1', 1, '2022-04-20 07:46:38'),
(572, 4, 7, 52, '8', '1', 1, '2022-04-20 07:46:38'),
(573, 4, 7, 53, '7', '1', 1, '2022-04-20 07:46:38'),
(574, 4, 7, 54, '10', '1', 1, '2022-04-20 07:46:38'),
(575, 4, 7, 55, '7', '0', 0, '2022-04-20 07:46:38'),
(591, 4, 6, 7, '1', '1', 1, '2022-04-21 07:53:43'),
(592, 4, 6, 8, '10', '1', 1, '2022-04-21 07:53:43'),
(593, 4, 6, 48, '9', '1', 1, '2022-04-21 07:53:43'),
(594, 4, 6, 49, '8', '0', 0, '2022-04-21 07:53:43'),
(595, 4, 6, 50, '9', '1', 1, '2022-04-21 07:53:43');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `icon` varchar(60) NOT NULL,
  `uid` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `cid`, `name`, `icon`, `uid`, `created`) VALUES
(7, 9, 'ENGLISH', 'ENGLISH', 4, '2022-03-29 11:23:06'),
(8, 9, 'MATHEMATICS', 'MATHEMATICS', 4, '2022-03-29 11:23:23'),
(10, 8, 'English', 'ENGLISH', 5, '2022-04-01 00:02:48'),
(11, 8, 'Math', 'MATHEMATICS', 5, '2022-04-01 00:04:48'),
(12, 8, 'Bangla', 'Bangla', 5, '2022-04-01 00:05:25'),
(13, 9, 'Bangla', 'Bangla', 5, '2022-04-01 00:06:02'),
(16, 9, 'Islamic-Studies', 'Islamic-Studies', 5, '2022-04-01 00:07:36'),
(17, 9, 'Science', 'Science', 5, '2022-04-01 00:08:08'),
(18, 9, 'Bangladesh and Global stydies', 'Bangladesh and Global stydies', 5, '2022-04-01 00:08:43'),
(19, 9, 'General-Knowledge', 'General Knowledge', 5, '2022-04-01 00:11:06'),
(20, 9, 'Sports', 'Sports', 5, '2022-04-01 00:11:27'),
(21, 10, 'Bangla', 'Bangla', 5, '2022-04-01 00:12:32'),
(22, 10, 'English', 'ENGLISH', 5, '2022-04-01 00:13:02'),
(23, 10, 'Math', 'MATHEMATICS', 5, '2022-04-01 00:14:15'),
(24, 10, 'Agriculture-studies', 'Agriculture-studies', 5, '2022-04-01 00:16:08'),
(25, 10, 'Science', 'Science', 5, '2022-04-01 00:16:37'),
(26, 10, 'English Grammar', 'eng', 5, '2022-04-01 00:20:59'),
(28, 11, 'Bangla-Grammar', 'Bangla-Grammar', 5, '2022-04-01 00:26:34'),
(29, 11, 'Bangla', 'Bangla', 5, '2022-04-01 00:27:38'),
(30, 11, 'English ', 'ENGLISH', 5, '2022-04-01 00:28:19'),
(31, 11, 'English Grammar', 'eng', 5, '2022-04-01 00:28:50'),
(32, 11, 'Math', 'MATHEMATICS', 5, '2022-04-01 00:29:03'),
(33, 11, 'ICT', 'ICT', 5, '2022-04-01 00:29:15'),
(34, 11, 'Physics', 'Physics', 5, '2022-04-01 00:30:11'),
(35, 11, 'chemistry', 'chemistry', 5, '2022-04-01 00:30:37'),
(36, 11, 'Biology', 'Biology', 5, '2022-04-01 00:30:58'),
(37, 11, 'History ', 'History', 5, '2022-04-01 00:31:23'),
(38, 11, 'Geography and Environment', 'Geography and Environment', 5, '2022-04-01 00:32:13'),
(39, 11, 'Economics', 'Economics', 5, '2022-04-01 00:32:29'),
(40, 11, 'Agricultural studies', 'Agriculture-studies', 5, '2022-04-01 00:33:29'),
(41, 11, 'Civics', 'Civics', 5, '2022-04-01 00:33:46'),
(42, 11, 'Accounting', 'Accounting', 5, '2022-04-01 00:34:00'),
(43, 11, 'Finance and Banking', 'Finance and Banking', 5, '2022-04-01 00:34:26'),
(44, 11, 'Islamic studies', 'Islamic', 5, '2022-04-01 00:35:49'),
(46, 11, 'Bangladesh and Global studies', 'Bangladesh and Global stydies', 5, '2022-04-01 00:36:42'),
(49, 12, 'Bangla Grammar', 'Bangla-Grammar', 5, '2022-04-01 00:38:39'),
(50, 12, 'English', 'ENGLISH', 5, '2022-04-01 00:39:07'),
(51, 12, 'English Grammer', 'eng', 5, '2022-04-01 00:39:19'),
(52, 12, 'ICT', 'ICT', 5, '2022-04-01 00:40:28'),
(53, 12, 'Accounting', 'Accounting', 5, '2022-04-01 00:40:53'),
(54, 12, 'Management', 'Management', 5, '2022-04-01 00:41:14'),
(55, 12, 'Higher math ', 'hm', 5, '2022-04-01 00:41:59'),
(56, 11, 'Accounting', 'Accounting', 5, '2022-04-01 00:52:44'),
(57, 12, 'Bangla', 'Bangla', 5, '2022-04-01 01:12:14'),
(58, 12, 'Chemistry', 'Chemistry', 5, '2022-04-01 01:12:46'),
(59, 12, 'Biology', 'Biology', 5, '2022-04-01 01:13:06'),
(60, 12, 'Physics', 'Physics', 5, '2022-04-01 01:13:19'),
(61, 12, 'General knowledge', 'General knowledge', 5, '2022-04-01 01:14:05'),
(62, 14, 'Bangla', 'Bangla', 5, '2022-04-01 01:16:04'),
(63, 14, 'English', 'ENGLISH', 5, '2022-04-01 01:16:13'),
(64, 14, 'Economics', 'Economics', 5, '2022-04-01 01:16:27'),
(65, 14, 'political and cultural History', 'political and cultural History', 5, '2022-04-01 01:17:42'),
(66, 14, 'Philosophy', 'Philosophy', 5, '2022-04-01 01:17:57'),
(67, 14, 'sociology', 'sociology', 5, '2022-04-01 01:18:10'),
(68, 14, 'Accounting', 'Accounting', 5, '2022-04-01 01:18:24'),
(69, 14, 'Management', 'Management', 5, '2022-04-01 01:18:39'),
(70, 14, 'Marketing', 'Marketing', 5, '2022-04-01 01:18:56'),
(71, 14, 'finance and marketing', 'finance and marketing', 5, '2022-04-01 01:19:13'),
(72, 14, 'Microbiology', 'Microbiology', 5, '2022-04-01 01:19:33'),
(73, 14, 'Zoology', 'Zoology', 5, '2022-04-01 01:19:44'),
(74, 14, 'Mathematics', 'Mathematics', 5, '2022-04-01 01:19:57'),
(77, 15, 'Bangla', 'Bangla', 5, '2022-04-01 15:01:20'),
(78, 15, 'English', 'English', 5, '2022-04-01 15:01:32'),
(79, 15, 'Mathematics', 'Mathematics', 5, '2022-04-01 15:01:58'),
(80, 15, 'Economics', 'Economics', 5, '2022-04-01 15:02:21'),
(81, 15, 'Political science', 'political and cultural History', 5, '2022-04-01 15:02:37'),
(82, 15, 'Zoology', 'Zoology', 5, '2022-04-01 15:02:46'),
(83, 15, 'Chemistry', 'Chemistry', 5, '2022-04-01 15:03:15'),
(84, 15, 'Social science', 'Social science', 5, '2022-04-01 15:07:01'),
(85, 15, 'Physics', 'Physics', 5, '2022-04-01 15:07:34'),
(86, 15, 'Finance', '', 5, '2022-04-01 15:07:57'),
(87, 15, 'Management', '', 5, '2022-04-01 15:08:12'),
(88, 15, 'History', 'History', 5, '2022-04-01 15:08:25'),
(89, 15, 'Islamic Studies', 'Islamic Studies', 5, '2022-04-01 15:08:46'),
(90, 15, 'Ict', 'ICT', 5, '2022-04-01 15:09:07'),
(91, 15, 'General knowledge', '', 5, '2022-04-01 15:09:41'),
(92, 16, 'Bangla', 'Bangla', 5, '2022-04-01 15:10:09'),
(93, 16, 'English', 'English', 5, '2022-04-01 15:10:18'),
(94, 16, 'Mathematics', 'Mathematics', 5, '2022-04-01 15:10:37'),
(95, 16, 'Economics', 'Economics', 5, '2022-04-01 15:10:53'),
(96, 16, 'Political science', '', 5, '2022-04-01 15:11:22'),
(97, 16, 'History', 'History', 5, '2022-04-01 15:11:36'),
(98, 16, 'Philosophy', '', 5, '2022-04-01 15:11:48'),
(99, 16, 'General knowledge ', 'General knowledge ', 5, '2022-04-01 15:12:28'),
(100, 16, 'Physics', 'Physics', 5, '2022-04-01 15:12:53'),
(101, 16, 'Chemistry', 'Chemistry', 5, '2022-04-01 15:13:06'),
(102, 16, 'Biology', '', 5, '2022-04-01 15:13:22'),
(103, 16, 'Zoology', '', 5, '2022-04-01 15:13:33'),
(104, 16, 'Accounting', 'Accounting', 5, '2022-04-01 15:13:56'),
(105, 16, 'Finance', '', 5, '2022-04-01 15:14:13'),
(106, 16, 'Management', 'Management', 5, '2022-04-01 15:14:27'),
(107, 17, 'Math', '', 5, '2022-04-01 15:15:17'),
(108, 17, 'Civil Engineering', '', 5, '2022-04-01 15:15:44'),
(109, 17, 'Computer science', 'ICT', 5, '2022-04-01 15:16:03'),
(110, 17, 'Mechanical engineering ', '', 5, '2022-04-01 15:16:28'),
(111, 17, 'Electrical Engineering ', '', 5, '2022-04-01 15:16:54'),
(112, 17, 'Physics', '', 5, '2022-04-01 15:17:27'),
(113, 17, 'Chemistry', 'Chemistry', 5, '2022-04-01 15:17:37'),
(114, 17, 'English', 'English', 5, '2022-04-01 15:17:47'),
(115, 17, 'Programing ', '', 5, '2022-04-01 15:18:14'),
(116, 17, 'General knowledge', 'General knowledge', 5, '2022-04-01 15:18:39'),
(117, 18, 'Bangla', 'Bangla', 5, '2022-04-01 15:19:08'),
(118, 18, 'English', 'English', 5, '2022-04-01 15:19:16'),
(119, 18, 'Mathematics', 'Mathematics', 5, '2022-04-01 15:19:30'),
(120, 18, 'General knowledge ', 'General knowledge', 5, '2022-04-01 15:20:08'),
(121, 18, 'Mental ability', '', 5, '2022-04-01 15:22:36'),
(122, 18, 'Moral values ​​and good govern', '', 5, '2022-04-01 15:25:42'),
(123, 19, 'Bangla', 'Bangla', 5, '2022-04-01 15:26:10'),
(124, 19, 'English', 'English', 5, '2022-04-01 15:26:19'),
(125, 19, 'mathematic ', 'Mathematics', 5, '2022-04-01 15:28:03'),
(126, 19, 'finance', '', 5, '2022-04-01 15:28:46'),
(127, 19, 'Banking ', '', 5, '2022-04-01 15:29:00'),
(128, 19, 'Management', '', 5, '2022-04-01 15:29:12'),
(129, 19, 'Accounting', 'Accounting', 5, '2022-04-01 15:29:26'),
(130, 19, 'Physics', '', 5, '2022-04-01 15:29:50'),
(131, 19, 'Chemistry', 'Chemistry', 5, '2022-04-01 15:30:01'),
(132, 19, 'Biology', '', 5, '2022-04-01 15:30:16'),
(133, 19, 'ICT', 'ICT', 5, '2022-04-01 15:30:25'),
(134, 19, 'General knowdge ', 'General knowledge ', 5, '2022-04-01 15:32:39'),
(135, 20, 'General knowledge ', 'General knowledge ', 5, '2022-04-01 15:33:34'),
(136, 20, 'ICT', 'ICT', 5, '2022-04-01 15:33:45'),
(137, 20, 'Biology', '', 5, '2022-04-01 15:33:57'),
(138, 20, 'Chemistry', 'Chemistry', 5, '2022-04-01 15:34:07'),
(139, 20, 'Physics', '', 5, '2022-04-01 15:34:16'),
(140, 20, 'mathematics', 'Mathematics', 5, '2022-04-01 15:34:39'),
(141, 20, 'bangla', 'Bangla', 5, '2022-04-01 15:34:47'),
(142, 20, 'English', 'English', 5, '2022-04-01 15:34:55'),
(143, 20, 'History', 'History', 5, '2022-04-01 15:35:22'),
(144, 21, 'Cricket', '', 5, '2022-04-01 15:36:11'),
(145, 21, 'Foot Ball', '', 5, '2022-04-01 15:36:23'),
(146, 21, 'Volli ball', '', 5, '2022-04-01 15:36:41'),
(147, 21, 'Bat Minton', '', 5, '2022-04-01 15:36:59'),
(148, 21, 'Olympic', '', 5, '2022-04-01 15:37:20'),
(149, 22, 'Islamic History', '', 5, '2022-04-01 15:38:01'),
(150, 22, 'Hadith', '', 5, '2022-04-01 15:38:28'),
(151, 22, 'Quaran', '', 5, '2022-04-01 15:38:58'),
(152, 22, 'Prophet', '', 5, '2022-04-01 15:39:29'),
(153, 22, 'Masla masael', '', 5, '2022-04-01 15:39:48'),
(154, 23, 'Current world', '', 5, '2022-04-01 15:40:36'),
(155, 23, 'Bangladesh affairs', '', 5, '2022-04-01 15:42:52'),
(156, 23, 'International affairs', '', 5, '2022-04-01 15:43:24'),
(157, 23, 'Sports', '', 5, '2022-04-01 15:43:36'),
(158, 23, 'Science', 'Science', 5, '2022-04-01 15:43:46'),
(159, 24, 'Reading', '', 5, '2022-04-01 15:45:30'),
(160, 24, 'Listening', '', 5, '2022-04-01 15:45:56'),
(161, 24, 'Spoken', '', 5, '2022-04-01 15:46:07'),
(162, 24, 'Written', '', 5, '2022-04-01 15:46:15'),
(163, 24, 'Vocabulary', '', 5, '2022-04-01 15:46:33'),
(164, 24, 'Grammar', '', 5, '2022-04-01 15:46:55'),
(165, 24, 'Literature', '', 5, '2022-04-01 15:47:06'),
(166, 25, 'Basis Concept Of IT', '', 5, '2022-04-01 15:48:04'),
(167, 25, 'HTML', '', 5, '2022-04-01 15:48:22'),
(168, 25, 'Css', '', 5, '2022-04-01 15:48:28'),
(169, 25, 'Bootstarp', '', 5, '2022-04-01 15:48:37'),
(170, 25, 'java script', '', 5, '2022-04-01 15:48:50'),
(171, 25, 'PHP', '', 5, '2022-04-01 15:48:58'),
(172, 25, 'Angular', '', 5, '2022-04-01 15:49:11'),
(173, 25, 'Laravel', '', 5, '2022-04-01 15:49:22'),
(174, 25, 'WordPress', '', 5, '2022-04-01 15:49:36'),
(175, 25, 'Codington', '', 5, '2022-04-01 15:50:03'),
(176, 25, 'C#', '', 5, '2022-04-01 15:50:15'),
(177, 25, 'Phythom', '', 5, '2022-04-01 15:50:22'),
(178, 25, 'java', '', 5, '2022-04-01 15:50:28'),
(179, 25, 'C++', '', 5, '2022-04-01 15:50:35'),
(180, 26, 'Ancient Bangla', '', 5, '2022-04-01 15:53:31'),
(181, 26, 'Partition of Bengal', '', 5, '2022-04-01 15:54:22'),
(182, 26, 'Bengali language movement', '', 5, '2022-04-01 15:54:54'),
(183, 26, '1954 East Bengal Legislative A', '', 5, '2022-04-01 15:55:39'),
(184, 26, ' Six Point', '', 5, '2022-04-01 15:56:02'),
(185, 26, 'Mass uprising in East Pakistan', '', 5, '2022-04-01 15:58:01'),
(186, 26, 'Independent War', '', 5, '2022-04-01 15:59:05'),
(187, 27, 'Physics', 'Physics', 5, '2022-04-01 15:59:56'),
(188, 27, 'Chemistry', 'Chemistry', 5, '2022-04-01 16:00:06'),
(189, 27, 'Biology', '', 5, '2022-04-01 16:00:13'),
(190, 27, 'computer science', '', 5, '2022-04-01 16:00:25'),
(191, 27, 'Zoology', '', 5, '2022-04-01 16:00:36'),
(192, 28, 'Algebra', '', 5, '2022-04-01 16:01:53'),
(193, 28, 'Calculus', '', 5, '2022-04-01 16:02:08'),
(194, 28, 'Matrix', '', 5, '2022-04-01 16:02:19'),
(195, 28, 'Linier algebra', '', 5, '2022-04-01 16:02:31'),
(196, 28, 'trigonometry', '', 5, '2022-04-01 16:02:57'),
(197, 28, 'Geometry', '', 5, '2022-04-01 16:03:12'),
(198, 28, 'dimension', '', 5, '2022-04-01 16:03:31');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `scid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `icon` varchar(60) NOT NULL,
  `uid` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `cid`, `scid`, `name`, `icon`, `uid`, `created`, `updated`) VALUES
(3, 9, 7, 'TENSE', 'tense', 4, '2022-03-29 11:33:14', '2022-04-04 03:19:26'),
(4, 9, 7, 'VERB', 'verb', 4, '2022-03-29 11:33:56', '2022-04-04 03:19:36'),
(5, 9, 8, 'ADDITION', 'addition', 4, '2022-03-29 11:35:21', '2022-04-04 03:19:48'),
(6, 9, 8, 'SUBTRACTION', 'subtraction', 4, '2022-03-29 11:36:43', '2022-04-04 03:20:01'),
(7, 8, 10, 'Alphabet', 'alphabet', 5, '2022-04-01 16:04:29', '2022-04-04 03:20:10'),
(8, 8, 10, 'woard meaning', 'word_meaning', 5, '2022-04-02 03:34:49', '2022-04-04 03:20:47'),
(9, 8, 10, 'make  word', 'make_word', 5, '2022-04-02 03:35:55', '2022-04-04 03:20:57'),
(10, 8, 12, 'Bornomala', 'bornomala', 5, '2022-04-02 03:36:40', '2022-04-04 03:39:14'),
(11, 8, 12, 'শব্দ গঠন', 'bornomala', 5, '2022-04-02 03:39:03', '2022-04-04 03:39:57'),
(12, 8, 12, 'বাক্য তৈরি', 'bornomala', 5, '2022-04-02 03:39:58', '2022-04-04 03:39:45'),
(13, 8, 12, 'শব্দার্থ', 'bornomala', 5, '2022-04-02 03:40:30', '2022-04-10 09:59:33'),
(14, 8, 11, 'যোগ', 'addition', 5, '2022-04-02 03:42:13', '2022-04-04 05:55:57'),
(15, 8, 11, 'বিয়োগ', 'subtraction', 5, '2022-04-02 03:42:35', '2022-04-04 05:56:07'),
(16, 8, 11, 'সংখ্যা পরিচিতি', 'sonkha', 5, '2022-04-02 03:43:52', '2022-04-10 09:58:47'),
(17, 9, 7, 'word meaning', 'word_meaning', 5, '2022-04-02 05:24:20', '2022-04-04 06:02:55'),
(18, 9, 7, ' sentence making', 'make_word', 5, '2022-04-02 05:26:28', '2022-04-04 06:03:03'),
(19, 9, 7, 'Grammar', 'eng', 5, '2022-04-02 05:26:54', '2022-04-10 10:00:30'),
(20, 9, 8, 'যোগ', 'addition', 5, '2022-04-02 05:27:45', '2022-04-04 05:57:20'),
(21, 9, 8, 'বিয়োগ', 'subtraction', 5, '2022-04-02 05:28:02', '2022-04-04 05:57:26'),
(22, 9, 8, 'গুন', 'primaryMath', 5, '2022-04-02 05:28:14', '2022-04-04 05:58:50'),
(23, 9, 8, 'ভাগ', 'primaryMath', 5, '2022-04-02 05:28:34', '2022-04-04 05:58:58'),
(24, 9, 8, 'ল.সা.গু', 'primaryMath', 5, '2022-04-02 05:28:59', '2022-04-04 05:59:09'),
(25, 9, 8, 'গ.সা.গু', 'primaryMath', 5, '2022-04-02 05:29:20', '2022-04-04 05:59:42'),
(26, 9, 13, 'শব্দার্থ', '', 5, '2022-04-02 05:30:06', NULL),
(27, 9, 13, 'বাক্য রচনা', '', 5, '2022-04-02 05:30:28', NULL),
(28, 9, 13, 'ব্যাকারন', '', 5, '2022-04-02 05:31:01', NULL),
(29, 9, 13, 'সাহিত্য', '', 5, '2022-04-02 05:31:26', NULL),
(30, 9, 16, 'সূরা', '', 5, '2022-04-02 05:32:14', NULL),
(31, 9, 16, 'হাদিস', '', 5, '2022-04-02 05:32:28', NULL),
(32, 9, 16, 'অনান্য', '', 5, '2022-04-02 05:32:59', NULL),
(33, 9, 17, 'পরিবেশ', '', 5, '2022-04-02 05:33:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userquiz`
--

CREATE TABLE `userquiz` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `scid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `question` varchar(512) NOT NULL,
  `op1` varchar(512) NOT NULL,
  `op2` varchar(512) NOT NULL,
  `op3` varchar(512) NOT NULL,
  `op4` varchar(512) NOT NULL,
  `ans` varchar(512) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userquiz`
--

INSERT INTO `userquiz` (`id`, `uid`, `cid`, `scid`, `tid`, `question`, `op1`, `op2`, `op3`, `op4`, `ans`, `created`) VALUES
(1, 4, 8, 10, 7, 'APP__E?', 'A', 'P', 'L', 'E', 'L', '2022-04-17 08:36:06'),
(2, 4, 8, 10, 7, 'Match the letter :  A', 'A', 'B', 'C', 'D', 'A', '2022-04-17 08:37:31'),
(3, 4, 8, 10, 7, 'E__G?', 'E', 'F', 'G', 'H', 'G', '2022-04-17 08:38:18'),
(4, 4, 8, 10, 7, 'Which word is started with B ?', 'BALL', 'APPLE', 'CAP', 'DOLL', 'BALL', '2022-04-17 08:39:18'),
(5, 4, 8, 10, 7, 'Match The letter  : G', 'E', 'F', 'G', 'H', 'G', '2022-04-17 08:40:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(512) NOT NULL,
  `email` varchar(80) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `password` varchar(256) NOT NULL,
  `role` set('1','2','3','4') NOT NULL DEFAULT '1',
  `images` varchar(512) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `email`, `phone`, `password`, `role`, `images`, `created`, `updated`) VALUES
(4, 'IRIN BINTE ABBAS', '', 'irinbinteabbas17@gmail.com', '01995793975', '$2y$10$KgC5o2eZTNivq0.kgy/22e2rF2qfHcMMupYWVQxTdsMNOhyC5kguW', '1', 'profile1', '2022-03-29 10:27:29', '2022-04-11 08:03:38'),
(5, 'ibrahim', '', 'ibrahim000@gmail.com', '01995793975', '$2y$10$.150Wtt14wU3FBjbXdLB5eEAoBbDZxDDiaJGEVNDVh7N.syvptGMO', '1', '', '2022-03-31 23:38:55', '2022-04-10 08:35:16'),
(6, 'ibrahim', '', 'ibrahim111@gmail.com', '1234556', '$2y$10$rp0EJyntNztPgekuJ2.5UOc.CvYVsfigt5H.KjUVf29eqNlzSG.r6', '1', 'profile', '2022-04-01 14:46:00', '2022-04-04 08:25:19'),
(9, 'Irin', '', 'irinabbas15@gmail.com', '01995793975', '$2y$10$9JyuHXc1cypxgeNw6hqnU..JQ/M1UmenkfHc4jg01TMEZhJsrgBAi', '2', '', '2022-04-04 08:12:27', '2022-04-11 08:03:32'),
(10, 'feroj', 'Raghunathpur', 'mohammadferj33@gmail.com', '01684783197', '$2y$10$.tJv6N/BSRfspoFfV7vZEeNeGQYDryKqSjZnnMHjP7caCIahWcUaS', '1', '1649063846_624ab7a6bdaf89.84023614.png', '2022-04-04 08:27:56', '2022-04-04 09:17:26'),
(11, 'adnan', '', 'adnan@gmail.com', '01670270120', '$2y$10$UH4Gj0L.3oNrHR7dsfX01Osjn2lNs6R8XgdJrZaUTTOrMmz2sE.ga', '2', '', '2022-04-04 08:48:30', '2022-04-10 08:55:53'),
(12, 'Adnan', '', 'adnan1@gmail.com', '01670270120', '$2y$10$8vGq1nPMO4FP4kASvYqYfe5pbcA0uIodxG1Vmlh7.KyMGJufVGL26', '1', '', '2022-04-10 08:58:11', NULL),
(13, 'admin123 admin', '', 'admin@gmail.com', '0195465656', '$2y$10$.rXmtUIsK4j6wz0n7T95ae5F7SCWt.5J586hzEDwrkJBPoN3zCZIK', '1', '', '2022-04-11 09:02:53', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `category_quiz`
--
ALTER TABLE `category_quiz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_id` (`quiz_id`),
  ADD KEY `cid` (`cid`),
  ADD KEY `scid` (`scid`),
  ADD KEY `tid` (`tid`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaderboard`
--
ALTER TABLE `leaderboard`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_quizset` (`uid`,`qsetid`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizes`
--
ALTER TABLE `quizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `cid` (`cid`),
  ADD KEY `scid` (`scid`),
  ADD KEY `tid` (`tid`);

--
-- Indexes for table `quizset`
--
ALTER TABLE `quizset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_set_quiz` (`uid`,`qsetid`,`qid`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cid` (`cid`),
  ADD KEY `scid` (`scid`);

--
-- Indexes for table `userquiz`
--
ALTER TABLE `userquiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `category_quiz`
--
ALTER TABLE `category_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `leaderboard`
--
ALTER TABLE `leaderboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quizes`
--
ALTER TABLE `quizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `quizset`
--
ALTER TABLE `quizset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=616;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `userquiz`
--
ALTER TABLE `userquiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_quiz`
--
ALTER TABLE `category_quiz`
  ADD CONSTRAINT `category_quiz_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `quizes` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `category_quiz_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `categories` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `category_quiz_ibfk_3` FOREIGN KEY (`scid`) REFERENCES `subcategories` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `category_quiz_ibfk_4` FOREIGN KEY (`tid`) REFERENCES `topics` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `quizes`
--
ALTER TABLE `quizes`
  ADD CONSTRAINT `quizes_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `quizes_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `categories` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `quizes_ibfk_3` FOREIGN KEY (`scid`) REFERENCES `subcategories` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `quizes_ibfk_4` FOREIGN KEY (`tid`) REFERENCES `topics` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `results_ibfk_2` FOREIGN KEY (`qsetid`) REFERENCES `quizset` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `results_ibfk_3` FOREIGN KEY (`qid`) REFERENCES `quizes` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `categories` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `categories` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `topics_ibfk_2` FOREIGN KEY (`scid`) REFERENCES `subcategories` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
