-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2024 at 06:29 PM
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
-- Database: `iaz-forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'PHP'),
(2, 'MySQL'),
(3, 'CodeIgniter'),
(4, 'Database');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `id` int(11) NOT NULL,
  `thread_id` int(11) NOT NULL,
  `content` mediumtext NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`id`, `thread_id`, `content`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(87, 1169, '<h3>Lorem Ipsum</h3><p>lorem, ipsum dolor sit amet consectetur adipisicing elit. Enim voluptate ratione veniam porro impedit earum tempora eaque, maiores, ipsam praesentium aliquam amet magnam cum libero hic dolore repellendus ipsa rerum.</p>', '2024-07-23 06:43:56', 194, '2024-07-23 17:15:29', 200),
(88, 1169, '<p><strong>Codeigniter 4 </strong>salah satu <i>framework</i> PHP yang memudahkan <i>developer </i>untuk mengembangkan aplikasi berbasis web.</p>', '2024-07-23 06:49:11', 194, NULL, NULL),
(89, 1170, '<p>mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm</p>', '2024-07-23 18:01:42', 203, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE `thread` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `content` mediumtext NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`id`, `title`, `category_id`, `content`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1169, 'Codeigniter 4', 3, '<figure class=\"image\"><img style=\"aspect-ratio:400/419;\" src=\"http://iaz-forum.test/uploads/thread/1721716332_b6a378ae25ae8287fa46.jpg\" width=\"400\" height=\"419\"></figure><p><strong>Codeigniter 4</strong></p><p><i>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem numquam quaerat saepe beatae, enim ea assumenda molestias quasi eaque aspernatur perspiciatis fuga autem. Impedit nam enim at illo assumenda. Nam.</i></p>', '2024-07-23 06:32:16', 200, '2024-07-23 17:18:07', 203),
(1170, 'PHP', 1, '<h2><strong>Lorem ipsum dolor sit, amet consectetur</strong>&nbsp;</h2><h2>adipisicing elit. Dolorem numquam quaerat saepe beatae, enim ea assumenda molestias quasi eaque aspernatur perspiciatis fuga autem. Impedit nam enim at illo assumenda. Nam.</h2>', '2024-07-23 06:36:31', 200, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `salt` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `address` text NOT NULL COMMENT 'Maks. 255 karakter(teks)',
  `phone_number` varchar(15) NOT NULL,
  `avatar` varchar(50) DEFAULT NULL,
  `role` enum('Admin','Member') NOT NULL,
  `status` enum('Active','Not active') NOT NULL DEFAULT 'Not active',
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `salt`, `name`, `email`, `birthdate`, `address`, `phone_number`, `avatar`, `role`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(193, 'anreyy', 'c8123806644ab3345a3cc5c99d99766c', '6695e9a3de1793.81900502', 'Muhammad Anriyadi', 'anriyadi@mail.com', '2024-07-16', 'Cluster Taman Sari, Jl. Purnama Sari, Kelurahan Tangkerang Selatan, Kecamatan Bukit Raya', '0819-9057-6161', '1721100707_fe9869c629e4e6738b53.jpg', 'Admin', 'Active', '2024-07-16 03:31:47', 0, NULL, NULL),
(194, 'IAZ2024', '35822fd6301d24bbfa53fb75b6ff8104', '669e63aec150f7.23808006', 'IAZ2024z', 'iaz@mail.com', '2024-07-26', 'Cluster Taman Sari, Jl. Purnama Sari, Kelurahan Tangkerang Selatan, Kecamatan Bukit Raya', '0819-9057-6161', '1721716975_42f28ed0ca7854b48be6.jpg', 'Member', 'Active', '2024-07-16 07:12:18', 0, '2024-07-23 06:42:55', 0),
(196, 'adminadmin', '46f22d3783b00fa07b7cf41da8ca1e8d', '66968a1b7b5743.45774437', 'Raihan Yudi Syukma', 'raihanys03@gmail.com', '2024-07-20', 'Cluster Taman Sari, Jl. Purnama Sari, Kelurahan Tangkerang Selatan, Kecamatan Bukit Raya', '0819-9057-6161', '1721141787_936d5cb3221b35dfa459.jpg', 'Member', 'Not active', '2024-07-16 14:56:27', 0, NULL, NULL),
(197, 'raihanyudisyukma26723', 'ef0c5397f2f9416faabc634f6224b8f6', '66977a179fe682.55374824', 'Raihan Yudi Syukma', 'raihanys03@gmail.com', '2024-07-17', 'Cluster Taman Sari, Jl. Purnama Sari, Kelurahan Tangkerang Selatan, Kecamatan Bukit Raya', '0819-9057-6161', '1721203223_984467628fa85f572fdd.jpg', 'Admin', 'Active', '2024-07-17 08:00:23', 0, NULL, NULL),
(200, 'Raihan2003', 'ef446338e699ad8784f4ad7253c21ee2', '669b856049b183.71934001', 'Raihan Yudi Syukma', 'raihanys03@gmail.com', '2003-07-26', 'Cluster Taman Sari, Jl. Purnama Sari, Kelurahan Tangkerang Selatan, Kecamatan Bukit Raya, Kota Pekanbaru', '0819-9057-6161', '1721717476_0078bcbf08d2cb0f413a.jpg', 'Admin', 'Active', '2024-07-20 07:44:10', 0, '2024-07-23 06:51:16', 0),
(201, 'Yud2003', '43b2a67a70f03f5bf3c93a71c8513d55', '669deb3a91deb6.38378636', 'Raihan Yudi Syukma', 'raihan@mail.com', '2024-07-12', 'Cluster Taman Sari, Jl. Purnama Sari, Kelurahan Tangkerang Selatan, Kecamatan Bukit Raya', '0819-9057-6161', '1721627306_7ac25295ca2ee0399774.jpg', 'Admin', 'Active', '2024-07-22 05:16:42', 0, '2024-07-22 05:48:26', 0),
(202, 'RaihanYudi', 'e5863869d44f09a8d8b8e2447b6eee88', '669e0cbb3b2aa3.37351408', 'Raihan Yudi', 'raihany03@gmail.com', '2024-07-27', 'Cluster Taman Sari, Jl. Purnama Sari, Kelurahan Tangkerang Selatan, Kecamatan Bukit Raya', '0819-9057-6161', '1721633752_90d74038507e0de5fe2a.jpg', 'Member', 'Active', '2024-07-22 07:28:01', 0, '2024-07-22 07:35:52', 0),
(203, 'Nurhasanah2002', '1afc0406e5e73e9dc2d734677fa1ff78', '669fe5ba878572.60270901', 'Nurhasanah2002', 'Nurhasanah2002@mail.com', '2024-08-02', 'Cluster Taman Sari, Jl. Purnama Sari, Kelurahan Tangkerang Selatan, Kecamatan Bukit Raya', '0819-9057-6161', '1721755066_a812b13d6403a7414971.jpg', 'Admin', 'Active', '2024-07-23 17:17:46', 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_thread` (`thread_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `thread`
--
ALTER TABLE `thread`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`category_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `thread`
--
ALTER TABLE `thread`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1171;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `reply_ibfk_1` FOREIGN KEY (`thread_id`) REFERENCES `thread` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reply_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reply_ibfk_4` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `thread`
--
ALTER TABLE `thread`
  ADD CONSTRAINT `thread_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `thread_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `thread_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
