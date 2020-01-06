-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30 март 2019 в 13:24
-- Версия на сървъра: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Структура на таблица `categories`
--

CREATE TABLE `categories` (
  `category_id` int(100) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(26, 'Development');

-- --------------------------------------------------------

--
-- Структура на таблица `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(100) NOT NULL,
  `comment_post_id` int(100) NOT NULL,
  `comment_date` date NOT NULL,
  `comment_author` varchar(100) NOT NULL,
  `comment_email` varchar(100) NOT NULL,
  `comment_text` text NOT NULL,
  `comment_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура на таблица `portfolios`
--

CREATE TABLE `portfolios` (
  `portfolio_id` int(100) NOT NULL,
  `portfolio_name` varchar(100) NOT NULL,
  `portfolio_category` varchar(100) NOT NULL,
  `portfolio_img_bg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `portfolios`
--

INSERT INTO `portfolios` (`portfolio_id`, `portfolio_name`, `portfolio_category`, `portfolio_img_bg`) VALUES
(25, 'Portfolio', 'Development', '02-thumbnail.jpg');

-- --------------------------------------------------------

--
-- Структура на таблица `posts`
--

CREATE TABLE `posts` (
  `post_id` int(100) NOT NULL,
  `post_category` varchar(100) NOT NULL,
  `post_title` varchar(100) NOT NULL,
  `post_author` varchar(100) NOT NULL,
  `post_date` date NOT NULL,
  `post_comment_number` int(11) NOT NULL,
  `post_image` text NOT NULL,
  `post_text` text NOT NULL,
  `post_tags` text NOT NULL,
  `post_hits` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `posts`
--

INSERT INTO `posts` (`post_id`, `post_category`, `post_title`, `post_author`, `post_date`, `post_comment_number`, `post_image`, `post_text`, `post_tags`, `post_hits`) VALUES
(25, 'Development', 'Development', 'TOBSTERA', '2019-03-30', 8, 'comany.jpg', 'Web developer, a programmer who specializes in, or is specifically engaged in, the development of World Wide Web applications\r\n', 'dev,programming,development', 0),
(26, 'Development', 'Cryptography', 'TOBSTERA', '2019-03-30', 8, 'blog-post.jpg', 'Cryptography or cryptology (from Ancient Greek: ÎºÏÏ…Ï€Ï„ÏŒÏ‚, translit. kryptÃ³s &quot;hidden, secret&quot;; and Î³ÏÎ¬Ï†ÎµÎ¹Î½ graphein, &quot;to write&quot;, or -Î»Î¿Î³Î¯Î± -logia, &quot;study&quot;, respectively[1]) is the practice and study of techniques for secure communication in the presence of third parties called adversaries.', 'crypto,cryptography', 0);

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `user_id` int(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`) VALUES
(11, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`portfolio_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `portfolio_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
