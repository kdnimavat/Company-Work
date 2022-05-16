-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 13, 2022 at 02:16 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_blog`
--

CREATE TABLE `detail_blog` (
  `articleId` int(30) NOT NULL,
  `articleTitle` varchar(300) NOT NULL,
  `articleCategory` text NOT NULL,
  `articleDescrip` text NOT NULL,
  `articleImage` text NOT NULL,
  `articleDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_blog`
--

INSERT INTO `detail_blog` (`articleId`, `articleTitle`, `articleCategory`, `articleDescrip`, `articleImage`, `articleDate`, `status`, `user_id`) VALUES
(1, 'PHP Laravel', 'Education', 'Laravel is an open-source web application PHP framework, which is robust and easy to understand. It uses a model-view-controller design pattern. Laravel reuses the existing components of different frameworks which helps in developing a web application. This makes web applications thus designed is more structured and pragmatic.', 'download.jpeg', '2022-05-13 12:07:41', 1, 1),
(2, 'Angular ', 'Education', 'Angular is a platform and framework for building single-page client applications using HTML and TypeScript. Angular is written in TypeScript. It implements core and optional functionality as a set of TypeScript libraries that you import into your applications.', 'angular.jpg', '2022-05-13 12:08:18', 1, 1),
(3, 'C#', 'Education', 'C# is pronounced \"C-Sharp\".\nIt is an object-oriented programming language created by Microsoft that runs on the .NET Framework.\n\nC# has roots from the C family, and the language is close to other popular languages like C++ and Java.\n\nThe first version was released in year 2002. The latest version, C# 8, was released in September 2019', 'c.jpg', '2022-05-13 12:08:51', 1, 2),
(4, 'DJANGO', 'Education', 'Django is a high-level Python web framework that enables rapid development of secure and maintainable websites. Built by experienced developers, Django takes care of much of the hassle of web development, so you can focus on writing your app without needing to reinvent the wheel.', 'django.jfif', '2022-05-13 08:45:04', 1, 2),
(5, 'JAVA', 'Education', 'JAVA was developed by James Gosling at Sun Micro systems Inc in the year 1995, later acquired by Oracle Corporation. It is a simple programming language. Java makes writing, compiling, and debugging programming easy. It helps to create reusable code and modular programs.', 'java.webp', '2022-05-13 12:09:37', 1, 2),
(7, 'React JS', 'Education', 't was created by Jordan Walke, who was a software engineer at Facebook. It was initially developed and maintained by Facebook and was later used in its products like WhatsApp & Instagram. Facebook developed ReactJS in 2011 in its newsfeed section, but it was released to the public in the month of May 2013.', 'react.png', '2022-05-13 12:10:52', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(120) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `mobile_no`, `password`, `image`) VALUES
(1, 'Kuldip', 'Nimavat', 'kd@gmail.com', '9106975570', 'b1bccd6ec5e0690e2ee9dd2a3160a18e', '150a0f81-12ff-4604-8c66-ab2a07389f47.jpg'),
(2, 'Jasmin', 'Isapara', 'jasmin.arsenaltech@gmail.com', '9067043443', '0187f302d2b9457deec3e58f3319f5d1', 'e5ee6adc-ba27-47b3-9b46-aeeb39bbc0c4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_blog`
--
ALTER TABLE `detail_blog`
  ADD PRIMARY KEY (`articleId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_blog`
--
ALTER TABLE `detail_blog`
  MODIFY `articleId` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
