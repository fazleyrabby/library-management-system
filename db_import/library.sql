-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2019 at 08:57 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) NOT NULL,
  `book_name` varchar(240) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isbn` bigint(20) DEFAULT NULL,
  `author` varchar(240) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publisher` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active_status` int(11) DEFAULT '1' COMMENT '1=active,0=not active',
  `stock` int(11) DEFAULT NULL,
  `category` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `isbn`, `author`, `publisher`, `active_status`, `stock`, `category`, `created_at`, `updated_at`) VALUES
(1, 'The Nature of Space and Time', 691037914, 'Stephen W. Hawking; Roger Penrose', 'Princeton University Press., Princeton, N. J. 1996', 1, 15, NULL, '2019-05-28 13:01:47', '2019-05-28 07:01:47'),
(2, 'The Inflationary Universe', 201328402, 'Guth, Alan', 'Basic Books 1998', 0, 13, NULL, '2019-05-28 13:02:44', '2019-05-28 07:02:44'),
(3, 'Combinatorial Algorithms: An Update.', 898712319, 'Wilf, Herbert S', 'Soc. for Indust. Mathematics, Philadelphia, PA. 1989', 1, 10, NULL, '2019-05-28 14:00:45', '2019-05-28 08:00:45'),
(4, 'Giant Molecules. From Nylon to Nanotubes', 199550026, 'Gratzer, Walter', 'Oxford University Press, Oxford 2009', 1, 10, NULL, '2019-05-28 14:14:16', '2019-05-28 08:14:16');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `id` bigint(20) NOT NULL,
  `book_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `copies` int(11) DEFAULT NULL COMMENT 'number of books',
  `fine` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `borrow_date` date DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `status` int(11) DEFAULT '1' COMMENT '0=not active,1=borrowed,2=returned,3=not returned at time',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`id`, `book_id`, `student_id`, `copies`, `fine`, `borrow_date`, `expiration_date`, `return_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, NULL, '2019-07-16', '2019-07-26', '2019-07-10', 2, '2019-07-09 13:17:00', '2019-07-09 07:17:00'),
(2, 1, 3, 1, NULL, '2019-07-16', '2019-07-26', '2019-07-23', 2, '2019-07-16 18:33:03', '2019-07-16 12:33:03');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` tinyint(4) DEFAULT NULL COMMENT '1=superadmin,2=subadmin,3=staff,4=member',
  `status` int(11) DEFAULT '1' COMMENT '1=active,0=inactive,2=deleted',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1, '2019-05-26 00:40:00', '2019-05-25 18:40:00'),
(2, 'subadmin', '21232f297a57a5a743894a0e4a801fc3', 2, 1, '2019-07-23 11:49:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` bigint(20) NOT NULL,
  `name` varchar(240) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact` varchar(240) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(240) COLLATE utf8_unicode_ci DEFAULT NULL,
  `student_id` varchar(240) COLLATE utf8_unicode_ci DEFAULT NULL,
  `department` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `active_status` int(11) NOT NULL DEFAULT '1' COMMENT '0=not active,1=active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `contact`, `email`, `student_id`, `department`, `created_at`, `updated_at`, `active_status`) VALUES
(1, 'Hamidul Islam ', '0987654321', 'hamid@gmail.com', 'CSE01306219', 'CSE', '2019-05-28 00:47:42', '2019-05-27 18:47:42', 1),
(2, 'Md. Mohiuddin ', '0987654321', 'mohiuddin@gmail.com', 'EEE01104647', 'EEE', '2019-05-28 01:00:36', '2019-05-27 19:00:36', 1),
(3, 'Anwarul Ajim', '0987654321', 'ajim@gmail.com', 'EEE01207645', 'EEE', '2019-05-28 01:22:05', '2019-05-27 19:22:05', 1),
(4, 'Anwar Hossain', '0987654321', 'anwar@gmail.com', 'CSE01104565', 'CSE', '2019-05-28 01:25:30', '2019-05-27 19:25:30', 1),
(5, 'Monsur Ali', '0987654321', 'monsur@gmail.com', 'CSE01307654', 'CSE', '2019-05-28 01:29:51', '2019-05-27 19:29:51', 1),
(6, 'Md. Fazley Rabbi', '01954137632', 'fazley111@gmail.com', 'CSE01306242', 'CSE', '2019-05-28 11:13:17', '2019-05-28 05:13:17', 1),
(7, 'Saiful Islam', '0987654321', 'saiful@gmail.com', 'LLB01204534', 'LLB', '2019-05-28 11:15:24', '2019-05-28 05:15:24', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
