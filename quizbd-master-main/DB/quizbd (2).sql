-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2022 at 11:05 AM
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
(8, 'PRE-SCHOOL', '', 4, '2022-03-29 10:56:17'),
(9, 'PRIMARY SCHOOL', '', 4, '2022-03-29 10:56:41'),
(10, 'HIGH SCHOOL', '', 4, '2022-03-29 10:57:23'),
(11, 'SCONDARY', '', 4, '2022-03-29 10:58:05'),
(12, 'HIGHER-SCONDARY', '', 4, '2022-03-29 11:01:09'),
(14, 'Degree', '', 5, '2022-03-31 23:48:13'),
(15, 'Honours', '', 5, '2022-03-31 23:48:34'),
(16, 'Masters', '', 5, '2022-03-31 23:48:51'),
(17, 'Engineering', '', 5, '2022-03-31 23:49:24'),
(18, 'BCS', '', 5, '2022-03-31 23:50:02'),
(19, 'Admission Test', '', 5, '2022-03-31 23:50:49'),
(20, 'Job Preparetion', '', 5, '2022-03-31 23:51:03'),
(21, 'Sports', '', 5, '2022-03-31 23:51:53'),
(22, 'Islamic', '', 5, '2022-03-31 23:52:50'),
(23, 'General Knowledge', '', 5, '2022-03-31 23:54:15'),
(24, 'IELTS', '', 5, '2022-03-31 23:56:13'),
(25, 'ICT', '', 5, '2022-04-01 14:57:32'),
(26, 'History', '', 5, '2022-04-01 14:58:17'),
(27, 'Science', '', 5, '2022-04-01 14:58:37'),
(28, 'Mathematics', '', 5, '2022-04-01 15:00:07');

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
  `name` int(65) NOT NULL,
  `email` int(65) NOT NULL,
  `message` varchar(1000) NOT NULL
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
(29, 8, 11, 15, '১২০-৫০=?', '১০০', '৭০', '৬০', '৫০', '৭০', 5, '2022-04-02 05:22:32', NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `qsetid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `ans` varchar(12) NOT NULL,
  `correct` set('1','0') NOT NULL,
  `points` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(7, 9, 'ENGLISH', 'C:fakepathistockphoto-1047570732-170667a.jpg', 4, '2022-03-29 11:23:06'),
(8, 9, 'MATHEMATICS', 'C:fakepathmaths2.jpg', 4, '2022-03-29 11:23:23'),
(10, 8, 'English', '', 5, '2022-04-01 00:02:48'),
(11, 8, 'Math', '', 5, '2022-04-01 00:04:48'),
(12, 8, 'Bangla', '', 5, '2022-04-01 00:05:25'),
(13, 9, 'Bangla', '', 5, '2022-04-01 00:06:02'),
(16, 9, 'Islamic-Studies', '', 5, '2022-04-01 00:07:36'),
(17, 9, 'Science', '', 5, '2022-04-01 00:08:08'),
(18, 9, 'Bangladesh and Global stydies', '', 5, '2022-04-01 00:08:43'),
(19, 9, 'General-Knowledge', '', 5, '2022-04-01 00:11:06'),
(20, 9, 'Sports', '', 5, '2022-04-01 00:11:27'),
(21, 10, 'Bangla', '', 5, '2022-04-01 00:12:32'),
(22, 10, 'English', '', 5, '2022-04-01 00:13:02'),
(23, 10, 'Math', '', 5, '2022-04-01 00:14:15'),
(24, 10, 'Agriculture-studies', '', 5, '2022-04-01 00:16:08'),
(25, 10, 'Science', '', 5, '2022-04-01 00:16:37'),
(26, 10, 'English Grammar', '', 5, '2022-04-01 00:20:59'),
(28, 11, 'Bangla-Grammar', '', 5, '2022-04-01 00:26:34'),
(29, 11, 'Bangla', '', 5, '2022-04-01 00:27:38'),
(30, 11, 'English ', '', 5, '2022-04-01 00:28:19'),
(31, 11, 'English Grammar', '', 5, '2022-04-01 00:28:50'),
(32, 11, 'Math', '', 5, '2022-04-01 00:29:03'),
(33, 11, 'ICT', '', 5, '2022-04-01 00:29:15'),
(34, 11, 'Physics', '', 5, '2022-04-01 00:30:11'),
(35, 11, 'chemistry', '', 5, '2022-04-01 00:30:37'),
(36, 11, 'Biology', '', 5, '2022-04-01 00:30:58'),
(37, 11, 'History ', '', 5, '2022-04-01 00:31:23'),
(38, 11, 'Geography and Environment', '', 5, '2022-04-01 00:32:13'),
(39, 11, 'Economics', '', 5, '2022-04-01 00:32:29'),
(40, 11, 'Agricultural studies', '', 5, '2022-04-01 00:33:29'),
(41, 11, 'Civics', '', 5, '2022-04-01 00:33:46'),
(42, 11, 'Accounting', '', 5, '2022-04-01 00:34:00'),
(43, 11, 'Finance and Banking', '', 5, '2022-04-01 00:34:26'),
(44, 11, 'Islamic studies', '', 5, '2022-04-01 00:35:49'),
(46, 11, 'Bangladesh and Global studies', '', 5, '2022-04-01 00:36:42'),
(49, 12, 'Bangla Grammar', '', 5, '2022-04-01 00:38:39'),
(50, 12, 'English', '', 5, '2022-04-01 00:39:07'),
(51, 12, 'English Grammer', '', 5, '2022-04-01 00:39:19'),
(52, 12, 'ICT', '', 5, '2022-04-01 00:40:28'),
(53, 12, 'Accounting', '', 5, '2022-04-01 00:40:53'),
(54, 12, 'Management', '', 5, '2022-04-01 00:41:14'),
(55, 12, 'Higher math ', '', 5, '2022-04-01 00:41:59'),
(56, 11, 'Accounting', 'C:fakepathdigital.png', 5, '2022-04-01 00:52:44'),
(57, 12, 'Bangla', '', 5, '2022-04-01 01:12:14'),
(58, 12, 'Chemistry', '', 5, '2022-04-01 01:12:46'),
(59, 12, 'Biology', '', 5, '2022-04-01 01:13:06'),
(60, 12, 'Physics', '', 5, '2022-04-01 01:13:19'),
(61, 12, 'General knowledge', '', 5, '2022-04-01 01:14:05'),
(62, 14, 'Bangla', '', 5, '2022-04-01 01:16:04'),
(63, 14, 'English', '', 5, '2022-04-01 01:16:13'),
(64, 14, 'Economics', '', 5, '2022-04-01 01:16:27'),
(65, 14, 'political and cultural History', '', 5, '2022-04-01 01:17:42'),
(66, 14, 'Philosophy', '', 5, '2022-04-01 01:17:57'),
(67, 14, 'sociology', '', 5, '2022-04-01 01:18:10'),
(68, 14, 'Accounting', '', 5, '2022-04-01 01:18:24'),
(69, 14, 'Management', '', 5, '2022-04-01 01:18:39'),
(70, 14, 'Marketing', '', 5, '2022-04-01 01:18:56'),
(71, 14, 'finance and marketing', '', 5, '2022-04-01 01:19:13'),
(72, 14, 'Microbiology', '', 5, '2022-04-01 01:19:33'),
(73, 14, 'Zoology', '', 5, '2022-04-01 01:19:44'),
(74, 14, 'Mathmatics', '', 5, '2022-04-01 01:19:57'),
(77, 15, 'Bangla', '', 5, '2022-04-01 15:01:20'),
(78, 15, 'English', '', 5, '2022-04-01 15:01:32'),
(79, 15, 'Mathematics', '', 5, '2022-04-01 15:01:58'),
(80, 15, 'Economics', '', 5, '2022-04-01 15:02:21'),
(81, 15, 'Political science', '', 5, '2022-04-01 15:02:37'),
(82, 15, 'Zoology', '', 5, '2022-04-01 15:02:46'),
(83, 15, 'Chemistry', '', 5, '2022-04-01 15:03:15'),
(84, 15, 'Social science', '', 5, '2022-04-01 15:07:01'),
(85, 15, 'Physics', '', 5, '2022-04-01 15:07:34'),
(86, 15, 'Finance', '', 5, '2022-04-01 15:07:57'),
(87, 15, 'Management', '', 5, '2022-04-01 15:08:12'),
(88, 15, 'History', '', 5, '2022-04-01 15:08:25'),
(89, 15, 'Islamic Studies', '', 5, '2022-04-01 15:08:46'),
(90, 15, 'Ict', '', 5, '2022-04-01 15:09:07'),
(91, 15, 'General knowledge', '', 5, '2022-04-01 15:09:41'),
(92, 16, 'Bangla', '', 5, '2022-04-01 15:10:09'),
(93, 16, 'English', '', 5, '2022-04-01 15:10:18'),
(94, 16, 'Mathematics', '', 5, '2022-04-01 15:10:37'),
(95, 16, 'Economics', '', 5, '2022-04-01 15:10:53'),
(96, 16, 'Political science', '', 5, '2022-04-01 15:11:22'),
(97, 16, 'History', '', 5, '2022-04-01 15:11:36'),
(98, 16, 'Philosophy', '', 5, '2022-04-01 15:11:48'),
(99, 16, 'General knowledge ', '', 5, '2022-04-01 15:12:28'),
(100, 16, 'Physics', '', 5, '2022-04-01 15:12:53'),
(101, 16, 'Chemistry', '', 5, '2022-04-01 15:13:06'),
(102, 16, 'Biology', '', 5, '2022-04-01 15:13:22'),
(103, 16, 'Zoology', '', 5, '2022-04-01 15:13:33'),
(104, 16, 'Accounting', '', 5, '2022-04-01 15:13:56'),
(105, 16, 'Finance', '', 5, '2022-04-01 15:14:13'),
(106, 16, 'Management', '', 5, '2022-04-01 15:14:27'),
(107, 17, 'Math', '', 5, '2022-04-01 15:15:17'),
(108, 17, 'Civil Engineering', '', 5, '2022-04-01 15:15:44'),
(109, 17, 'Computer science', '', 5, '2022-04-01 15:16:03'),
(110, 17, 'Mechanical engineering ', '', 5, '2022-04-01 15:16:28'),
(111, 17, 'Electrical Engineering ', '', 5, '2022-04-01 15:16:54'),
(112, 17, 'Physics', '', 5, '2022-04-01 15:17:27'),
(113, 17, 'Chemistry', '', 5, '2022-04-01 15:17:37'),
(114, 17, 'English', '', 5, '2022-04-01 15:17:47'),
(115, 17, 'Programing ', '', 5, '2022-04-01 15:18:14'),
(116, 17, 'General knowledge', '', 5, '2022-04-01 15:18:39'),
(117, 18, 'Bangla', '', 5, '2022-04-01 15:19:08'),
(118, 18, 'English', '', 5, '2022-04-01 15:19:16'),
(119, 18, 'Mathematics', '', 5, '2022-04-01 15:19:30'),
(120, 18, 'General knowledge ', '', 5, '2022-04-01 15:20:08'),
(121, 18, 'Mental ability', '', 5, '2022-04-01 15:22:36'),
(122, 18, 'Moral values ​​and good govern', '', 5, '2022-04-01 15:25:42'),
(123, 19, 'Bangla', '', 5, '2022-04-01 15:26:10'),
(124, 19, 'English', '', 5, '2022-04-01 15:26:19'),
(125, 19, 'mathematic ', '', 5, '2022-04-01 15:28:03'),
(126, 19, 'finance', '', 5, '2022-04-01 15:28:46'),
(127, 19, 'Banking ', '', 5, '2022-04-01 15:29:00'),
(128, 19, 'Management', '', 5, '2022-04-01 15:29:12'),
(129, 19, 'Accounting', '', 5, '2022-04-01 15:29:26'),
(130, 19, 'Physics', '', 5, '2022-04-01 15:29:50'),
(131, 19, 'Chemistry', '', 5, '2022-04-01 15:30:01'),
(132, 19, 'Biology', '', 5, '2022-04-01 15:30:16'),
(133, 19, 'ICT', '', 5, '2022-04-01 15:30:25'),
(134, 19, 'General knowdge ', '', 5, '2022-04-01 15:32:39'),
(135, 20, 'General knowledge ', '', 5, '2022-04-01 15:33:34'),
(136, 20, 'ICT', '', 5, '2022-04-01 15:33:45'),
(137, 20, 'Biology', '', 5, '2022-04-01 15:33:57'),
(138, 20, 'Chemistry', '', 5, '2022-04-01 15:34:07'),
(139, 20, 'Physics', '', 5, '2022-04-01 15:34:16'),
(140, 20, 'mathematics', '', 5, '2022-04-01 15:34:39'),
(141, 20, 'bangla', '', 5, '2022-04-01 15:34:47'),
(142, 20, 'English', '', 5, '2022-04-01 15:34:55'),
(143, 20, 'History', '', 5, '2022-04-01 15:35:22'),
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
(158, 23, 'Science', '', 5, '2022-04-01 15:43:46'),
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
(187, 27, 'Physics', '', 5, '2022-04-01 15:59:56'),
(188, 27, 'Chemistry', '', 5, '2022-04-01 16:00:06'),
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
(3, 9, 7, 'TENSE', 'C:fakepathillustration-kid-boy-demonstrating-different-260nw', 4, '2022-03-29 11:33:14', NULL),
(4, 9, 7, 'VERB', 'C:fakepathimages (5).jpg', 4, '2022-03-29 11:33:56', '2022-03-29 11:34:14'),
(5, 9, 8, 'ADDITION', 'C:fakepathaddition.jpg', 4, '2022-03-29 11:35:21', NULL),
(6, 9, 8, 'SUBTRACTION', 'C:fakepathdownload (2).jpg', 4, '2022-03-29 11:36:43', NULL),
(7, 8, 10, 'Alphabet', '', 5, '2022-04-01 16:04:29', NULL),
(8, 8, 10, 'woard meaning', '', 5, '2022-04-02 03:34:49', NULL),
(9, 8, 10, 'make  word', '', 5, '2022-04-02 03:35:55', NULL),
(10, 8, 12, 'Bornomala', '', 5, '2022-04-02 03:36:40', NULL),
(11, 8, 12, 'শব্দ গঠন', '', 5, '2022-04-02 03:39:03', NULL),
(12, 8, 12, 'বাক্য তৈরি', '', 5, '2022-04-02 03:39:58', NULL),
(13, 8, 12, 'শব্দার্থ', '', 5, '2022-04-02 03:40:30', NULL),
(14, 8, 11, 'যোগ', '', 5, '2022-04-02 03:42:13', NULL),
(15, 8, 11, 'বিয়োগ', '', 5, '2022-04-02 03:42:35', NULL),
(16, 8, 11, 'সংখ্যা পরিচিতি', '', 5, '2022-04-02 03:43:52', NULL),
(17, 9, 7, 'word meaning', '', 5, '2022-04-02 05:24:20', NULL),
(18, 9, 7, ' sentence making', '', 5, '2022-04-02 05:26:28', NULL),
(19, 9, 7, 'Grammar', '', 5, '2022-04-02 05:26:54', NULL),
(20, 9, 8, 'যোগ', '', 5, '2022-04-02 05:27:45', NULL),
(21, 9, 8, 'বিয়োগ', '', 5, '2022-04-02 05:28:02', NULL),
(22, 9, 8, 'গুন', '', 5, '2022-04-02 05:28:14', NULL),
(23, 9, 8, 'ভাগ', '', 5, '2022-04-02 05:28:34', NULL),
(24, 9, 8, 'ল.সা.গু', '', 5, '2022-04-02 05:28:59', NULL),
(25, 9, 8, 'গ.সা.গু', '', 5, '2022-04-02 05:29:20', NULL),
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
(4, 'IRIN BINTE ABBAS', '', 'irinbinteabbas17@gmail.com', '01995793975', '$2y$10$KgC5o2eZTNivq0.kgy/22e2rF2qfHcMMupYWVQxTdsMNOhyC5kguW', '2', '', '2022-03-29 10:27:29', '2022-03-29 10:30:05'),
(5, 'ibrahim', '', 'ibrahim000@gmail.com', '01995793975', '$2y$10$.150Wtt14wU3FBjbXdLB5eEAoBbDZxDDiaJGEVNDVh7N.syvptGMO', '2', '', '2022-03-31 23:38:55', NULL),
(6, 'ibrahim', '', 'ibrahim111@gmail.com', '1234556', '$2y$10$rp0EJyntNztPgekuJ2.5UOc.CvYVsfigt5H.KjUVf29eqNlzSG.r6', '1', '', '2022-04-01 14:46:00', NULL);

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
  ADD KEY `uid` (`uid`),
  ADD KEY `qsetid` (`qsetid`),
  ADD KEY `qid` (`qid`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `category_quiz`
--
ALTER TABLE `category_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quizes`
--
ALTER TABLE `quizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `quizset`
--
ALTER TABLE `quizset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
