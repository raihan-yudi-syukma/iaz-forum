-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2024 at 09:57 AM
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
(1, 'HTML'),
(2, 'CSS'),
(3, 'Javascript'),
(4, 'PHP'),
(5, 'Database'),
(6, 'CodeIgniter'),
(7, 'Bootstrap');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `thread_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `star` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `thread_id`, `user_id`, `star`) VALUES
(11, 1157, 168, 3),
(23, 1157, 195, 3),
(29, 1157, 172, 5);

-- --------------------------------------------------------

--
-- Stand-in structure for view `rating_view`
-- (See below for the actual view)
--
CREATE TABLE `rating_view` (
`thread_id` int(11)
,`star_sum` decimal(32,0)
,`star_count` bigint(21)
,`rating` decimal(33,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `id` int(11) NOT NULL,
  `thread_id` int(11) NOT NULL,
  `content` text NOT NULL COMMENT 'Maks. karakter 255.',
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`id`, `thread_id`, `content`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(72, 1157, 'Rerum facilis voluptates aut ipsum est distinctio omnis. Natus hic ut in voluptatibus eos laudantium. Eveniet enim qui sunt nobis velit aut. Exercitationem error delectus aut. Et aut debitis sit fugiat rerum ut et. Maiores libero vel ut consequuntur.', '2024-08-04 17:17:54', 168, NULL, NULL),
(73, 1157, 'Fuga quia ut voluptas id nostrum voluptatum. Nesciunt reprehenderit sunt omnis architecto numquam reiciendis. Ex sit rerum vel sequi. Repellendus quis dolorem consequatur deleniti voluptates et. Et alias quibusdam laboriosam doloremque ex. Exercitationem placeat quia vel perferendis magnam omnis quam. Recusandae quod nostrum non nihil aperiam aperiam. In ratione repellat ipsum enim enim ut debitis.', '2024-08-04 17:17:54', 168, NULL, NULL),
(74, 1157, 'A sit aliquam consequatur velit consequuntur. Expedita deleniti explicabo soluta repellendus aut. Aspernatur natus et reprehenderit officia fugit autem. Vel debitis id consequatur laboriosam voluptatum praesentium ut. Quidem dolores soluta ratione soluta aut quam molestiae. Rem fugit culpa quis non.', '2024-08-04 17:17:54', 168, NULL, NULL),
(75, 1157, 'Velit et ipsa laboriosam quia omnis accusantium distinctio aperiam. Maxime ab tempora veritatis ipsam officia neque architecto. Quia voluptatem ducimus officiis rerum sint voluptas. Explicabo eum laborum sit minima enim numquam consequatur. Fuga fuga reprehenderit aut aut ex aut. Modi possimus et soluta atque fuga reprehenderit ea.', '2024-08-04 17:17:54', 168, NULL, NULL),
(76, 1157, 'Amet delectus quae quasi dolorum soluta id nostrum. Ut ut aperiam ab libero rerum. Quaerat et voluptatem delectus sit. Sint sequi est autem quis. Harum modi aliquid dolores facere. At sed qui ex repellat id omnis architecto. Maiores est aut ut nobis.', '2024-08-04 17:17:54', 168, NULL, NULL),
(77, 1157, 'Minima consequatur sed ut impedit. Quia facilis cupiditate eos iure dolorem et. Debitis quidem ipsam ut. Nemo saepe tempora et voluptas. Praesentium suscipit consequatur harum maiores. Autem et placeat molestiae asperiores rerum repellendus nostrum ut. Nostrum expedita excepturi vitae totam recusandae. Eius doloribus laborum quo praesentium aut. Explicabo sapiente at optio.', '2024-08-04 17:17:54', 168, NULL, NULL),
(78, 1157, 'Quia dicta quasi dolorum. Velit tempore necessitatibus laboriosam facilis magni est. Ut dolor vel voluptatem ipsam est vero dolore. Vitae ipsam at architecto aut consequatur adipisci possimus. Veniam eos et non possimus. Hic sit velit vero asperiores autem facilis nesciunt.', '2024-08-04 17:17:54', 168, NULL, NULL),
(79, 1157, 'Temporibus temporibus rerum totam provident consequatur. Est eveniet accusantium et cum aspernatur explicabo aliquid. Id qui blanditiis nostrum voluptatem et. Et in voluptatem animi architecto et et. Dolores aut aspernatur aut. Voluptas aut sed eos sint nobis. Reiciendis eos cum odio tempore dolores. Voluptate vel est aut incidunt.', '2024-08-04 17:17:54', 168, NULL, NULL),
(80, 1157, 'Dolores cum adipisci tempora. Nihil quis molestiae eum sunt quas vitae. Ipsam voluptas iure molestiae ipsum aspernatur. Debitis voluptatibus dolores tenetur ea. Quaerat rerum aut dignissimos voluptatem sunt. Optio eius sed eaque quaerat rerum soluta.', '2024-08-04 17:17:54', 168, NULL, NULL),
(81, 1157, 'Voluptates voluptatem nemo quam quaerat voluptatem provident quo. Illo ullam magni accusamus iusto. Nostrum ut placeat reprehenderit nemo consectetur error pariatur. Molestiae occaecati autem unde. Ipsum magnam sit natus beatae voluptatem odit voluptatem officiis. Et ipsa qui mollitia similique molestiae illo fugit.', '2024-08-04 17:17:54', 168, NULL, NULL),
(82, 1157, 'Dignissimos earum est incidunt natus sunt ipsa in. Porro et earum consectetur est incidunt aliquid dolores et. Sed deserunt impedit alias distinctio mollitia consequuntur tenetur. Quia possimus beatae ut sint minus nam. Deleniti porro earum voluptatem tempore ex veniam non.', '2024-08-04 17:17:54', 168, NULL, NULL),
(83, 1157, 'Est veritatis eos blanditiis non et. Impedit labore est voluptas quaerat quo quo temporibus. Aut sed reprehenderit et ut. Nostrum delectus voluptas dolores laboriosam. Reiciendis est esse debitis sint omnis rerum. Laudantium et omnis dolor dolor vel similique omnis. Repudiandae veniam veritatis eum magnam sint molestias.', '2024-08-04 17:17:54', 168, NULL, NULL),
(84, 1157, 'Neque magni quod ut vero. Cupiditate aut est aut fuga. Qui et facere dolores harum quam ea ut. Est incidunt fugit odio est voluptas sunt. Harum culpa dolore sit incidunt doloremque. Est deserunt dolorum dolorem. Quae voluptate dolor eius voluptatibus. Repudiandae magnam temporibus et libero aut.', '2024-08-04 17:17:54', 168, NULL, NULL),
(85, 1157, 'Eos tempora expedita fugiat reprehenderit odit expedita atque. A placeat nihil qui veniam eveniet fugiat iusto. Voluptatibus doloribus aspernatur consequuntur. Distinctio natus dolores aut placeat non blanditiis. Possimus nam culpa non qui consequatur. Ullam consectetur numquam eum. Quam explicabo animi et minima quia ipsum.', '2024-08-04 17:17:54', 168, NULL, NULL),
(86, 1157, 'Dolor ea ut quaerat. Ut non magnam ut non. Qui explicabo non et reiciendis nihil quod ratione in. Quia nesciunt numquam qui dolorem maxime. Enim delectus magnam ducimus beatae fugit et. Est omnis expedita in reprehenderit deleniti nam. Dolor qui inventore dolore aut.', '2024-08-04 17:17:54', 168, NULL, NULL),
(87, 1157, 'Pariatur aut repellat dolores nam. Reiciendis cum qui hic voluptas reiciendis. Voluptas qui quidem doloribus soluta. Corrupti perspiciatis quia ex optio dicta quidem fuga. Ad adipisci amet commodi hic corporis autem. Aut dolor porro similique repudiandae assumenda est molestiae sed. Ut architecto ea vitae quia.', '2024-08-04 17:17:54', 168, NULL, NULL),
(88, 1157, 'Fuga odit voluptatum et ab expedita et veritatis. Nisi nihil non explicabo quasi dolor. Minima veritatis vel nam ratione. Non vero ipsa tempore. Eum aut suscipit maiores et odit rerum ut. Aut omnis ducimus assumenda placeat omnis ad odio. Et assumenda sit hic sit. Dignissimos qui et placeat eum.', '2024-08-04 17:17:54', 168, NULL, NULL),
(89, 1157, 'Fugit tenetur soluta quia dolore ex in ut. Quas quod nostrum earum aliquam omnis in. Omnis neque aut aut soluta. Debitis ipsam et harum recusandae omnis voluptatem. Est ad rem et nihil blanditiis corrupti. Et cupiditate quisquam nulla aut. Quo qui voluptas modi facere corporis quis. Dignissimos ex soluta sint assumenda.', '2024-08-04 17:17:54', 168, NULL, NULL),
(90, 1157, 'Dolores libero sapiente dolores dolores illum est. Omnis id non earum dolores molestiae. Soluta in et est a. Consequatur delectus quisquam quos quasi. Quam et animi et facere eaque. Et tenetur dolores et quis.', '2024-08-04 17:17:54', 168, NULL, NULL),
(91, 1157, 'Incidunt eius debitis quas neque ab deserunt. Nisi quia consequuntur quae sit quam vitae. Sed fuga error unde distinctio autem corrupti et. Ipsam maxime maxime tenetur. Assumenda accusantium veniam ad. Sequi voluptas eveniet temporibus velit. Perspiciatis est assumenda aut dolores. Nobis tenetur suscipit vitae harum deleniti ipsa accusantium.', '2024-08-04 17:17:54', 168, NULL, NULL),
(92, 1157, 'Excepturi quia exercitationem autem quis culpa. Necessitatibus quaerat fugit voluptatem voluptatem. Voluptas molestiae omnis et totam. Nam consequatur ad dolores ex assumenda itaque. Cumque voluptatum dignissimos praesentium architecto nisi repudiandae doloremque.', '2024-08-04 17:17:54', 168, NULL, NULL),
(93, 1157, 'Alias illo nemo explicabo quaerat iste est amet. Veritatis ratione quod magni itaque perferendis qui minus. Voluptatibus possimus ex laudantium eos et unde. Rerum magnam eligendi non velit ratione illum ea. Et in ad maiores ut aut. Neque ab nam eos nostrum alias eos. Cupiditate eos consequuntur nobis. Blanditiis sit doloribus repellat at accusantium autem. Cumque impedit aut et dicta accusantium ut.', '2024-08-04 17:17:54', 168, NULL, NULL),
(94, 1157, 'Voluptatem dignissimos aliquid nihil provident blanditiis sed repellat. Deleniti porro fuga saepe incidunt. Veniam aut enim consectetur animi aut consequatur. Impedit corrupti similique repellat molestiae. Magnam vero quos dignissimos.', '2024-08-04 17:17:54', 168, NULL, NULL),
(95, 1157, 'Ab hic omnis numquam id. Deleniti omnis eveniet accusantium placeat. Et cupiditate ipsa ad molestias esse. Quod est recusandae dolorem sit excepturi sit. Est distinctio est accusamus ducimus suscipit. Enim alias eos quia hic.', '2024-08-04 17:17:54', 168, NULL, NULL),
(96, 1157, 'Unde quia quis ipsum cumque totam sed. Corporis dolores quasi voluptate expedita. Ut tempora similique beatae et ullam facilis nisi pariatur. Et non architecto eum dolorem quia esse quod distinctio. Nihil corporis molestias qui ratione alias ea.', '2024-08-04 17:17:54', 168, NULL, NULL),
(97, 1157, 'Qui nesciunt quos omnis illo. Qui commodi nemo qui repellendus ducimus sunt asperiores est. Ullam voluptas eos doloremque perferendis. Ratione facilis quos voluptate deleniti. Esse est voluptatem ex eius.', '2024-08-04 17:17:54', 168, NULL, NULL),
(98, 1157, 'Sit ut qui et ad nemo nam et. A voluptatem voluptatibus odio aspernatur magnam voluptates. Itaque natus nihil neque aspernatur doloribus illum. Inventore sit doloribus in voluptas et. Minus vitae ratione saepe maiores quisquam fugit ea nam. Doloribus animi omnis nostrum est autem eaque. Omnis quod voluptatum inventore quae.', '2024-08-04 17:17:54', 168, NULL, NULL),
(99, 1157, 'Eum illo et culpa. Sint et et soluta laborum autem iste. Et omnis amet dolor quia blanditiis. Impedit qui reprehenderit soluta necessitatibus qui placeat iste. Enim est unde consequatur quia et. Sequi veritatis sint praesentium eius ut qui. Reprehenderit aut corporis deserunt animi illum.', '2024-08-04 17:17:54', 168, NULL, NULL),
(100, 1157, 'Id quasi incidunt quidem enim. Sequi consequatur laborum dolor qui. Impedit vitae non quis. Sed eligendi illum deserunt expedita. Nam ea possimus sint expedita.', '2024-08-04 17:17:54', 168, NULL, NULL),
(101, 1157, 'Dolorum odit dolores dignissimos ducimus aut soluta libero. Sint facilis ipsum voluptas nesciunt dolores. Sapiente voluptatem et aliquid maiores. Qui in sit est sunt et ullam. In facere quod optio veritatis aut. Ut aut debitis et perferendis quidem.', '2024-08-04 17:17:54', 168, NULL, NULL);

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
(1157, 'Framework CodeIgniter 4', 6, '<h2>Lorem ipsum</h2><blockquote><ul><li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla amet sapiente saepe incidunt commodi nemo vel enim voluptatibus repellendus, qui perferendis. Veritatis vel atque optio cumque quidem illo expedita voluptas.<br><br>Item 1</li><li>Item 2</li><li>Item 3</li></ul></blockquote>', '2024-08-04 16:09:43', 168, '2024-08-04 16:11:31', 168);

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
  `role` enum('Admin','Member') NOT NULL DEFAULT 'Member',
  `status` enum('Active','Not active','','') NOT NULL DEFAULT 'Not active',
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `salt`, `name`, `email`, `birthdate`, `address`, `phone_number`, `avatar`, `role`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(168, 'Raihanys03', 'd61cd2ad4cdc29f1e166214014cb692d', '66afa20fd93eb7.14474834', 'Raihan Yudi Syukma', 'raihanys03@gmail.com', '2003-07-26', 'Cluster Taman Sari, Jl. Purnama Sari, Kel. Tangkerang Selatan, Kec. Bukit Raya, Pekanbaru', '0819-9057-6161', '1722786319_4845484cccea5eefa093.jpg', 'Admin', 'Active', '2024-08-04 15:45:19', 0, NULL, NULL),
(229, 'janet95', '~rUm4^(N(fd3B.?&*7<q', '66afb716d148d7.58035249', 'Nayeli Roberts DDS', 'jarret.anderson@altenwerth.com', '2012-09-27', '3168 Barton Path Suite 421\nBobbiemouth, IA 04289', '719.210.1696', 'user-logo.jpeg', 'Member', 'Not active', '2024-08-04 17:15:02', 168, NULL, NULL),
(230, 'nrau', 'X#Tel71', '66afb716d40aa0.58545869', 'Addie O\'Keefe', 'hamill.adolfo@balistreri.biz', '1977-11-27', '93082 Ellen Inlet\nJudgehaven, NH 54088-5836', '+1-218-264-9442', 'user-logo.jpeg', 'Member', 'Not active', '2024-08-04 17:15:02', 168, NULL, NULL),
(231, 'ycole', '}DKY*q|j-[tZ(J*', '66afb716d55483.98251946', 'Ms. Princess Wiegand', 'davon.hills@hotmail.com', '1979-03-29', '3492 Kelsi Drive Apt. 393\nPort Christiana, NJ 51521', '940.543.3239', 'user-logo.jpeg', 'Member', 'Active', '2024-08-04 17:15:02', 168, NULL, NULL),
(232, 'schaden.valentine', '3;.04|vx96JL_', '66afb716d72352.70647276', 'Pattie Bernhard', 'assunta86@hamill.org', '2006-11-28', '9001 Camron Highway Suite 027\nNorth Rafael, SD 24457-8089', '1-917-519-2518', 'user-logo.jpeg', 'Member', 'Not active', '2024-08-04 17:15:02', 168, NULL, NULL),
(233, 'dexter.little', '~PKg9#YPUD-h]C@', '66afb716d8bfd7.27182562', 'Mr. Ruben Jakubowski', 'znicolas@yahoo.com', '1974-03-17', '56034 Herzog Forges Apt. 910\nPort Kaitlyn, ND 35444', '1-702-553-9774', 'user-logo.jpeg', 'Member', 'Not active', '2024-08-04 17:15:02', 168, NULL, NULL),
(235, 'donnelly.ryder', ',4@}74?vOx)', '66afb716db9980.25997760', 'Kaylin Zboncak', 'ashly.jacobi@bartoletti.com', '1992-07-05', '6067 Bert Points Apt. 545\nD\'Amoremouth, MO 38622-5441', '+1-463-948-0690', 'user-logo.jpeg', 'Member', 'Not active', '2024-08-04 17:15:02', 168, NULL, NULL),
(236, 'beer.bertha', 'Nuv\\j@rdD..PVt=_CZ', '66afb716dcea97.19607962', 'Turner Gutmann', 'jacobson.adrianna@yahoo.com', '2018-07-30', '10563 Wyman Hills\nKutchhaven, CO 42554-2385', '361.906.8887', 'user-logo.jpeg', 'Member', 'Not active', '2024-08-04 17:15:02', 168, NULL, NULL),
(237, 'baumbach.tom', '59]mQ7HdUi:qBXcpm0N', '66afb716de33f9.83881277', 'Chaya McKenzie', 'jkoelpin@ohara.com', '1972-04-23', '461 Koch Bypass\nSouth Johnnie, DE 14070-1179', '1-423-520-5203', 'user-logo.jpeg', 'Member', 'Not active', '2024-08-04 17:15:02', 168, NULL, NULL),
(238, 'gleichner.gerardo', 'L5Kb::fce!j-Z93v_E', '66afb716e355e4.09129498', 'Chaim Kling', 'keegan69@yahoo.com', '1995-09-19', '8405 Willy Oval Suite 350\nNew Arjunview, TX 43407-0918', '+1 (743) 525-99', 'user-logo.jpeg', 'Member', 'Not active', '2024-08-04 17:15:02', 168, NULL, NULL),
(239, 'cummerata.jakob', 'P=,1i<', '66afb716e4a611.04534387', 'Wilton Zemlak Jr.', 'willa.wiegand@hegmann.com', '2011-06-13', '401 Thompson Village\nNorth Jesse, NE 46571-1540', '+1.520.312.3183', 'user-logo.jpeg', 'Member', 'Not active', '2024-08-04 17:15:02', 168, NULL, NULL),
(240, 'rowe.lauren', 'lKacnaEq&P', '66afb716e5c172.17012986', 'Mrs. Jewel Carroll V', 'kassulke.stanford@herman.com', '1987-10-22', '68048 Tanner Court Apt. 959\nHyattshire, AK 46036', '+17024993686', 'user-logo.jpeg', 'Member', 'Not active', '2024-08-04 17:15:02', 168, NULL, NULL),
(241, 'mackenzie.sawayn', 'j^I<ZN1jVG#trq', '66afb716e733a9.60059382', 'Dr. Amya Zieme Jr.', 'edgar.lubowitz@hotmail.com', '1993-08-12', '51208 Sunny Route Apt. 771\nErickaside, MD 57625', '+1-254-965-5494', 'user-logo.jpeg', 'Member', 'Not active', '2024-08-04 17:15:02', 168, NULL, NULL),
(242, 'crice', '+Z{>*$0M\\i7pk`u|7R', '66afb716e97886.05097919', 'Dr. Anita Bradtke', 'kristopher.hahn@yahoo.com', '1970-05-03', '897 Christina Parks Suite 465\nLilliefort, IN 47394-8990', '(917) 433-2205', 'user-logo.jpeg', 'Member', 'Not active', '2024-08-04 17:15:02', 168, NULL, NULL),
(243, 'orlando69', '/0b!Ch*2?#', '66afb716eaef35.72788348', 'Mr. Lenny Dickens', 'cali91@hotmail.com', '2019-05-03', '1465 Reichel Island\nPort Pinkmouth, MT 90205', '505-215-0550', 'user-logo.jpeg', 'Member', 'Not active', '2024-08-04 17:15:02', 168, NULL, NULL),
(244, 'ryan.arjun', 'zUBPL)wu', '66afb716ec5672.87961383', 'Mr. Jalen Cole IV', 'asia.gibson@hegmann.com', '2021-12-23', '90655 Shanahan Estates\nSporerborough, ME 19275-7391', '+16463240706', 'user-logo.jpeg', 'Member', 'Not active', '2024-08-04 17:15:02', 168, NULL, NULL),
(245, 'fern47', '[auiPvxcrBrL?:|=wc', '66afb716edb503.89886397', 'Warren Bahringer', 'rolando00@harber.com', '1998-07-14', '4276 Lebsack Freeway Apt. 958\nSchoenland, MO 39629', '623.367.1402', 'user-logo.jpeg', 'Member', 'Not active', '2024-08-04 17:15:02', 168, NULL, NULL),
(246, 'wintheiser.tristian', '!wAqW;', '66afb716ef2dd8.76501220', 'Prof. Peyton Abbott', 'jada.flatley@boehm.net', '1996-11-06', '93508 Cartwright Lock\nGutkowskiton, SC 73353-5558', '+1-626-264-6134', 'user-logo.jpeg', 'Member', 'Not active', '2024-08-04 17:15:02', 168, NULL, NULL),
(247, 'mathias.dare', '<M15yH[E', '66afb716f05ef6.68560955', 'Prof. Darwin Botsford Jr.', 'nicholas10@gmail.com', '2009-11-14', '2871 Boehm Island\nKeelingchester, MS 02630', '+16782353991', 'user-logo.jpeg', 'Member', 'Not active', '2024-08-04 17:15:02', 168, NULL, NULL),
(248, 'gleichner.alexis', '@7_J8LD2|mm7@', '66afb716f1ec51.65374546', 'Veda Kovacek', 'elian32@mertz.info', '2016-03-20', '54531 Mya Grove Suite 277\nJessshire, AL 11601', '+1-781-679-0841', 'user-logo.jpeg', 'Member', 'Not active', '2024-08-04 17:15:02', 168, NULL, NULL),
(249, 'vhintz', 'Jz#\\pAQ/C3*{4.', '66afb716f36642.99413896', 'Alison Spencer Jr.', 'kay93@hotmail.com', '2013-10-24', '236 Emerald Dale\nEast Chloeshire, VA 66765-7261', '478.271.1348', 'user-logo.jpeg', 'Member', 'Not active', '2024-08-04 17:15:02', 168, NULL, NULL),
(250, 'tate26', 'g-K;\\-pEtP', '66afb717009412.35876840', 'Kraig O\'Kon', 'heathcote.friedrich@gmail.com', '1999-09-17', '912 Troy Pike\nOfeliamouth, MO 67869-1698', '573.548.1228', 'user-logo.jpeg', 'Member', 'Not active', '2024-08-04 17:15:03', 168, NULL, NULL),
(251, 'cartwright.caesar', 'iw!CA+}\'ELZ}', '66afb71701dba0.68433225', 'Mr. Arden Wilderman', 'jonathan.sawayn@jacobs.com', '2022-11-05', '9877 Pat Lock Apt. 208\nNorth Era, TX 10469-4621', '+19348158795', 'user-logo.jpeg', 'Member', 'Not active', '2024-08-04 17:15:03', 168, NULL, NULL),
(252, 'egoodwin', 'Lbg9A9zYoCTSt##w\'b*', '66afb7170371a2.76899605', 'Ms. Janae Hackett MD', 'teresa41@yahoo.com', '1998-06-30', '36145 Klein Mill Apt. 999\nWardborough, CA 93051-4771', '1-682-437-0582', 'user-logo.jpeg', 'Member', 'Not active', '2024-08-04 17:15:03', 168, NULL, NULL),
(253, 'orlando26', 'C!2cK(I', '66afb7170521a7.78531073', 'Prof. Reginald Gerlach', 'lavada39@miller.com', '2005-07-22', '104 Louie Extension Suite 739\nErnserborough, NC 63376-1840', '(307) 922-8287', 'user-logo.jpeg', 'Member', 'Not active', '2024-08-04 17:15:03', 168, NULL, NULL),
(254, 'abbie30', '\'kw!&YREam,3bcU', '66afb71706c502.38953625', 'Linnie Hegmann', 'bednar.daryl@bayer.com', '1998-12-03', '48042 Reichert Points Suite 731\nAmyside, TN 75192-6199', '+1.251.888.1484', 'user-logo.jpeg', 'Member', 'Not active', '2024-08-04 17:15:03', 168, NULL, NULL),
(255, 'hyatt.lilian', '!8.1]S2Q{`d4s~', '66afb717088c80.66081379', 'Lera Gottlieb V', 'gina36@gmail.com', '1975-11-23', '7068 Lubowitz Forges\nStarkshire, PA 66109', '+1-678-331-9560', 'user-logo.jpeg', 'Member', 'Not active', '2024-08-04 17:15:03', 168, NULL, NULL),
(256, 'willms.eugene', '_r2g2FAq', '66afb71709e6d2.67732365', 'Dr. Rosalinda Hills', 'hcole@hotmail.com', '1970-09-14', '70493 Christine Course\nNorth Floyd, GA 36374-6704', '302-730-6427', 'user-logo.jpeg', 'Member', 'Not active', '2024-08-04 17:15:03', 168, NULL, NULL),
(257, 'coralie45', 'ayed&O?3|sWy*', '66afb7170bb119.32813816', 'Mr. Percy Flatley V', 'caitlyn.crona@hotmail.com', '1989-02-18', '1797 Kris Landing Apt. 990\nNorth Albin, IN 18311-6618', '1-620-323-4602', 'user-logo.jpeg', 'Member', 'Not active', '2024-08-04 17:15:03', 168, NULL, NULL),
(258, 'jensen.christiansen', '=P_\'12VsL7T.s{2', '66afb7170d47d4.77933755', 'Hillard Effertz', 'dahlia.okuneva@sanford.net', '2000-04-30', '91107 Donnelly Drives Apt. 196\nAngelaville, AK 90025', '463.973.5500', 'user-logo.jpeg', 'Member', 'Not active', '2024-08-04 17:15:03', 168, NULL, NULL),
(259, 'Yudi2003', '0ec7a401f2a6b52ddc424aeb4af8268c', '66b19a9682cbc8.56854713', 'Yudi S.', 'yudi@mail.com', '2024-08-23', 'Cluster Taman Sari, Jl. Purnama Sari, Kelurahan Tangkerang Selatan, Kecamatan Bukit Raya', '0819-9057-6161', '1722915478_cdb1825dcc97628edb15.jpg', 'Member', 'Active', '2024-08-06 03:37:58', 0, NULL, NULL),
(260, 'SSSSSS001111', '90500e35e889ed41241f7b1492083837', '66b19cd53103b1.57750284', 'Raihan Yudi Syukma', 'sss@mail.com', '2024-08-10', 'Cluster Taman Sari, Jl. Purnama Sari, Kelurahan Tangkerang Selatan, Kecamatan Bukit Raya', '0819-9057-6161', '1722916053_1d11eb68b7e1f519f6b5.jpg', 'Admin', 'Active', '2024-08-06 03:47:33', 0, NULL, NULL),
(261, 'YudiSyukma2003', '4442bb9aa259dd81169afcd48b13b36b', '66b1ccc5279825.92685965', 'Yudi Syukma', 'yudi@mail.com', '2024-08-01', 'Cluster Taman Sari, Jl. Purnama Sari, Kelurahan Tangkerang Selatan, Kecamatan Bukit Raya', '0819-9057-6161', '1722928325_6637ae4a4f8ecf065f0d.jpg', 'Member', 'Active', '2024-08-06 07:12:05', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure for view `rating_view`
--
DROP TABLE IF EXISTS `rating_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `rating_view`  AS SELECT `rating`.`thread_id` AS `thread_id`, sum(`rating`.`star`) AS `star_sum`, count(`rating`.`star`) AS `star_count`, round(sum(`rating`.`star`) / count(`rating`.`star`),0) AS `rating` FROM `rating` GROUP BY `rating`.`thread_id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rating_ibfk_1` (`thread_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `thread`
--
ALTER TABLE `thread`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1191;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`thread_id`) REFERENCES `thread` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `reply_ibfk_1` FOREIGN KEY (`thread_id`) REFERENCES `thread` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reply_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `reply_ibfk_4` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

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
