-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2026 at 06:35 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infochord_intern`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `bid` int(11) NOT NULL,
  `bh` varchar(200) NOT NULL,
  `bc` varchar(200) NOT NULL,
  `bd` varchar(1200) NOT NULL,
  `bi` varchar(200) NOT NULL,
  `uid` int(11) NOT NULL,
  `pdate` datetime NOT NULL DEFAULT current_timestamp(),
  `is_verified` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`bid`, `bh`, `bc`, `bd`, `bi`, `uid`, `pdate`, `is_verified`, `is_deleted`) VALUES
(5, 'Tribute to Soldiers', 'Travel & Heritage', 'The National War Memorial in Delhi stands as a solemn tribute to the valiant soldiers. ', 'img/war_memorial.jpg', 35, '2025-06-07 17:54:42', 1, 0),
(6, 'COVID Vaccine', 'Health & Wellness', 'The COVID-19 vaccine marked a turning point in the global fight against the pandemic. Developed in record time, it provided hope and protection to millions worldwide. These vaccines helped reduce severe illness, hospitalization, and death, especially among vulnerable groups. From Covishield and Covaxin in India to Pfizer and Moderna globally, each dose became a step toward normalcy. Mass vaccination drives showcased the power of science and global collaboration. ', 'img/vaccine.jpeg', 35, '2025-06-07 17:59:02', 1, 0),
(7, 'Waste to Road', 'Science & Infra', 'Using plastic waste to build roads offers a promising, environmentally friendly, and cost-effective solution to both plastic waste management and infrastructure development. Road constructed with recycled plastic are more durable, resilient to extreme weather conditions, and require less maintenance than traditional asphalt roads.', 'img/plastic.jpg', 38, '2025-06-07 19:34:46', 1, 0),
(8, 'Creating a Dynamic Blog Using jQuery AJAX', 'Web Development / jQuery / AJAX', 'Building a dynamic blog platform means more than just displaying static pages. In modern web applications, users expect real-time updates and seamless interactivity. This is where jQuery AJAX becomes a powerful tool. It allows developers to send and receive data from a server without refreshing the entire page. When working with blog posts—like headings, categories, and content—jQuery AJAX can drastically improve both performance and user experience.\r\n\r\nFor instance, when a user submits a new blog post, jQuery can capture the heading, category, and content fields, then send them to the backend using AJAX. The server processes the data and returns a success or error message, all without reloading the page. Similarly, you can fetch blog content dynamically by category, update posts in place, and even delete entries smoothly', 'img/download (1).jpeg', 34, '2025-06-25 21:10:24', 1, 0),
(9, 'Codeigniter', 'Web Development', 'An intuitive interface is one that feels natural and easy to use. Users should be able to navigate through your application without confusion. A well-designed interface minimizes the learning curve and reduces frustration, leading to higher user satisfaction\r\nCodeIgniter and User Experience\r\nUsing CodeIgniter for Intuitive Interfaces\r\nCodeIgniter is renowned for its simplicity and flexibility. Here’s how you can use it to enhance user experience:\r\nClean and Organized Code\r\nA clean codebase is essential for creating responsive and efficient applications. CodeIgniter’s MVC (Model-View-Controller) architecture helps in separating concerns and organizing code efficiently.', 'img/codeigniter.jpg', 40, '2025-06-27 09:46:14', 1, 0),
(10, 'Codeigniter', 'Web Development', 'An intuitive interface is one that feels natural and easy to use. Users should be able to navigate through your application without confusion. A well-designed interface minimizes the learning curve and reduces frustration, leading to higher user satisfaction.\r\nCodeIgniter and User Experience\r\nUsing CodeIgniter for Intuitive Interfaces\r\nCodeIgniter is renowned for its simplicity and flexibility. Here’s how you can use it to enhance user experience:\r\nClean and Organized Code\r\nA clean codebase is essential for creating responsive and efficient applications. CodeIgniter’s MVC (Model-View-Controller) architecture helps in separating concerns and organizing code efficiently.', 'img/codeigniter.jpg', 40, '2025-06-27 09:49:23', 1, 0),
(11, 'AI - Python', 'Machine learning', 'For a computer to think on its own and perform complex tasks to become AI – it must digest and internalize more and more information and logic over time. That process is machine learning. As the computer takes on more work, ML enables it to become ever more “intelligent.” This is how AI understands and reacts to nuances and distinct scenarios. Computer logic is only as sound as the data that feeds it. If an AI learns biased inputs, it will output biased decisions. This can even challenge organizations with the best of intentions. It’s not always apparent when a strategy contains an implicit bias, but it’s essential for AI practitioners to identify it and adjust accordingly.', 'img/Featured-image-AI-image-generators-by-Midjourney.jpg', 40, '2025-06-27 20:00:01', 1, 1),
(12, 'Power of Unconscious Mind', 'Book', '\r\nThe subconscious mind silently shapes our lives by storing memories, habits, and beliefs. It influences our decisions and reactions without conscious effort. By practicing affirmations, visualization, and mindfulness, we can reprogram our inner thoughts. This powerful force, when properly harnessed, can lead to lasting change and personal transformation.', 'img/download_blog.jpeg', 40, '2025-06-28 12:31:51', 0, 0),
(13, 'Power of Unconscious Mind', 'Book', 'The subconscious mind silently shapes our lives by storing memories, habits, and beliefs. It influences our decisions and reactions without conscious effort. By practicing affirmations, visualization, and mindfulness, we can reprogram our inner thoughts. This powerful force, when properly harnessed, can lead to lasting change and personal transformation.', 'img/download_blog.jpeg', 40, '2025-06-28 12:33:08', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `userdetail`
--

CREATE TABLE `userdetail` (
  `uid` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `img` varchar(500) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'user',
  `signupdate` datetime NOT NULL DEFAULT current_timestamp(),
  `is_verified` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userdetail`
--

INSERT INTO `userdetail` (`uid`, `name`, `email`, `mobile`, `password`, `img`, `role`, `signupdate`, `is_verified`, `is_deleted`) VALUES
(33, 'Admin', 'admin@gmail.com', ' 9358737046', 'admin', 'img/download.jpg', 'admin', '2025-06-06 19:32:19', 1, 1),
(34, 'Amit', 'amit@gmail.com', '1400888290', 'amit', 'img/18.6.2025.jpg', 'user', '2025-06-06 19:33:07', 1, 1),
(35, 'Karan', 'karan@gmail.com', '1200666699', 'karan', '', 'user', '2025-06-06 20:23:39', 0, 1),
(36, 'Ayush', 'ayush@gmail.com', '9358737074', 'ayush', 'img/adminprofile.jpeg', 'user', '2025-06-06 20:24:21', 1, 1),
(37, 'Ayush Kumar', 'abc@gmail.com', '9145994349', 'abc', '', 'user', '2025-06-06 20:33:05', 0, 1),
(38, 'Kunal', 'kunal@gmail.com', '7073681002', 'kunal', '', 'user', '2025-06-07 19:28:10', 0, 1),
(39, 'Vishnu', 'vishnu@gmail.com', '8974327645', 'vishnu', '', 'user', '2025-06-11 10:28:32', 0, 1),
(40, 'Raj Kumar', 'raj@gmail.com', '9856742349', 'raj', 'img/photo.jpeg', 'user', '2025-06-13 12:09:23', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `userdetail`
--
ALTER TABLE `userdetail`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `userdetail`
--
ALTER TABLE `userdetail`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
