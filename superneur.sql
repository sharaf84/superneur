-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 02, 2014 at 12:18 AM
-- Server version: 5.5.31
-- PHP Version: 5.5.9-1+sury.org~precise+1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `superneur`
--

-- --------------------------------------------------------

--
-- Table structure for table `sprnr_bookmarks`
--

CREATE TABLE IF NOT EXISTS `sprnr_bookmarks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int(10) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sprnr_bookmarks_project` (`project_id`),
  KEY `fk_sprnr_bookmarks_user` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sprnr_bookmarks`
--

INSERT INTO `sprnr_bookmarks` (`id`, `project_id`, `user_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sprnr_comments`
--

CREATE TABLE IF NOT EXISTS `sprnr_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `comment` varchar(4096) DEFAULT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `model` varchar(45) DEFAULT NULL,
  `model_id` int(10) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sprnr_comments_user` (`user_id`),
  KEY `fk_sprnr_comments_parent` (`parent_id`),
  KEY `fk_sprnr_comments_posts` (`model_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sprnr_complaints`
--

CREATE TABLE IF NOT EXISTS `sprnr_complaints` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) DEFAULT NULL,
  `description` varchar(4096) DEFAULT NULL,
  `from` int(10) unsigned DEFAULT NULL,
  `against` int(10) unsigned DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `type` tinyint(1) DEFAULT NULL,
  `project_id` int(10) unsigned DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `decision` text,
  PRIMARY KEY (`id`),
  KEY `fk_sprnr_complaints_from` (`from`),
  KEY `fk_sprnr_complaints_against` (`against`),
  KEY `fk_sprnr_complaints_project` (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sprnr_complaints`
--

INSERT INTO `sprnr_complaints` (`id`, `subject`, `description`, `from`, `against`, `created`, `updated`, `type`, `project_id`, `status`, `decision`) VALUES
(1, 'Complaints 1', 'Description', 2, 1, '2014-03-13 00:00:00', '2014-03-04 02:09:18', 0, 1, 1, 'Descionnmnmosakd');

-- --------------------------------------------------------

--
-- Table structure for table `sprnr_followers`
--

CREATE TABLE IF NOT EXISTS `sprnr_followers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `follower_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sprnr_follow_follower` (`follower_id`),
  KEY `fk_sprnr_follow_user` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `sprnr_followers`
--

INSERT INTO `sprnr_followers` (`id`, `user_id`, `follower_id`) VALUES
(1, 1, 2),
(2, 1, 2),
(3, 1, 2),
(4, 1, 2),
(5, 1, 2),
(6, 2, 1),
(7, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sprnr_groups`
--

CREATE TABLE IF NOT EXISTS `sprnr_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sprnr_groups`
--

INSERT INTO `sprnr_groups` (`id`, `name`, `created`, `updated`) VALUES
(1, 'g1', '2014-03-03 21:49:33', '2014-03-03 21:49:33');

-- --------------------------------------------------------

--
-- Table structure for table `sprnr_groups_users`
--

CREATE TABLE IF NOT EXISTS `sprnr_groups_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(10) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sprnr_groups_users_group` (`group_id`),
  KEY `fk_sprnr_groups_users_user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sprnr_legal_documents`
--

CREATE TABLE IF NOT EXISTS `sprnr_legal_documents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` tinyint(1) DEFAULT NULL,
  `reject_reason` varchar(45) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `project_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sprnr_legal_documents`
--

INSERT INTO `sprnr_legal_documents` (`id`, `status`, `reject_reason`, `created`, `updated`, `project_id`) VALUES
(1, 1, NULL, NULL, NULL, 1),
(2, 1, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sprnr_media`
--

CREATE TABLE IF NOT EXISTS `sprnr_media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `path` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `mime` varchar(45) DEFAULT NULL,
  `size` int(11) unsigned DEFAULT NULL,
  `title` varchar(45) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `embed` varchar(255) DEFAULT NULL,
  `model` varchar(45) DEFAULT NULL,
  `model_id` int(10) unsigned DEFAULT NULL,
  `featured` tinyint(1) DEFAULT '0',
  `type` tinyint(1) DEFAULT NULL,
  `position` int(10) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sprnr_media_posts` (`model_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `sprnr_media`
--

INSERT INTO `sprnr_media` (`id`, `path`, `file_name`, `mime`, `size`, `title`, `description`, `link`, `embed`, `model`, `model_id`, `featured`, `type`, `position`, `created`, `updated`) VALUES
(1, '/uploads/2014/02/26/', 'a52288919e16cdb85add858356bdbb0a06f57301.jpg', 'image/jpeg', 30144, '47056_495032917255393_1323598483_n.jpg', NULL, NULL, NULL, 'Users', 1, 0, 1, 1, '2014-02-26 05:50:50', '2014-02-26 05:50:50'),
(2, '/uploads/2014/02/26/', 'e6eac1318c0f93e826a27f6622f5944a5bdf384e.jpg', 'image/jpeg', 112416, '988687_494445320647486_1194932879_n.jpg', NULL, NULL, NULL, 'Users', 1, 0, 2, 2, '2014-02-26 05:51:24', '2014-02-26 05:51:24'),
(3, '/uploads/2014/02/26/', 'a52288919e16cdb85add858356bdbb0a06f57502.png', 'image/jpeg', 30144, 'a52288919e16cdb85add858356bdbb0a06f57502.png', NULL, NULL, NULL, 'Users', 2, 0, 1, 1, '2014-02-26 05:50:50', '2014-02-26 05:50:50'),
(4, '/uploads/2014/03/01/', '7195a0f8b876170603630ff022f26a4211419264.jpg', 'image/jpeg', 51814, '1521562_803551743004289_1200603665_n.jpg', NULL, NULL, NULL, NULL, NULL, 0, NULL, 3, '2014-03-01 17:22:35', '2014-03-01 17:22:35'),
(5, '/uploads/2014/03/01/', 'd30dc0c8308f35cf975daafd12664eef5c28296d.jpg', 'image/jpeg', 101289, '1948031_843938002298947_1414873732_n.jpg', NULL, NULL, NULL, NULL, NULL, 0, NULL, 4, '2014-03-01 17:22:35', '2014-03-01 17:22:35'),
(6, '/uploads/2014/02/26/', 'a52288919e16cdb85add858356bdbb0a06f57301.jpg', 'image/jpeg', 30144, '47056_495032917255393_1323598483_n.jpg', NULL, NULL, NULL, 'LegalDocuments', 1, 0, 1, 1, '2014-02-26 05:50:50', '2014-02-26 05:50:50'),
(7, '/uploads/2014/02/26/', 'a52288919e16cdb85add858356bdbb0a06f57301.jpg', 'image/jpeg', 30144, '47056_495032917255393_1323598483_n.jpg', NULL, NULL, NULL, 'LegalDocuments', 2, 0, 1, 1, '2014-02-26 05:50:50', '2014-02-26 05:50:50'),
(8, '/uploads/2014/03/03/', '73bd0a16af6c2deebc42e213437b25ff653484d2.jpg', 'image/jpeg', 62044, 'download (5).jpg', NULL, NULL, NULL, NULL, NULL, 0, NULL, 5, '2014-03-03 11:29:20', '2014-03-03 11:29:20'),
(10, '/uploads/2014/03/03/', '407e7af7680cff7b5f168ddee2888e8be17640ba.jpg', 'image/jpeg', 29707, 'download (3).jpg', NULL, NULL, NULL, 'Posts', 1, 0, NULL, 8, '2014-03-03 12:46:24', '2014-03-04 08:11:49'),
(11, '/uploads/2014/03/03/', '0b3029b73634ad751625648f857ed724d0b57d0a.jpg', 'image/jpeg', 40321, 'download (4).jpg', NULL, NULL, NULL, 'Posts', 1, 0, NULL, 7, '2014-03-03 12:46:24', '2014-03-04 08:11:49'),
(12, '/uploads/2014/03/03/', 'fa0a8a596e7f3d85441d931a8e6f9f7bba83eccb.jpg', 'image/jpeg', 62044, 'download (5).jpg', NULL, NULL, NULL, 'Posts', 1, 0, NULL, 6, '2014-03-03 12:46:24', '2014-03-04 08:11:49'),
(13, '/uploads/2014/03/03/', '1e2ace5a17ac15b98e335fa703ec91ed1ea801e7.jpg', 'image/jpeg', 71777, 'download (6).jpg', NULL, NULL, NULL, 'Posts', 1, 0, NULL, 9, '2014-03-03 12:46:25', '2014-03-04 08:11:16'),
(14, '/uploads/2014/03/03/', '1dfd67fc07d6db9c8ebb8d2bce2227ee6d517d60.jpg', 'image/jpeg', 33449, 'download.jpg', NULL, NULL, NULL, 'Projects', 1, 0, NULL, 11, '2014-03-03 20:18:12', '2014-03-04 08:11:16'),
(15, '/uploads/2014/03/03/', '4a3ecd57b853d7e18cd419d7d623aaae93014dec.jpg', 'image/jpeg', 32619, 'download (1).jpg', NULL, NULL, NULL, 'Projects', 1, 0, NULL, 10, '2014-03-03 20:18:12', '2014-03-04 08:11:16'),
(16, '/uploads/2014/03/03/', 'c273f2c2e0bfcd771a10f28ddc66103b077136f8.jpg', 'image/jpeg', 40126, 'download (2).jpg', NULL, NULL, NULL, 'Projects', 1, 0, NULL, 12, '2014-03-03 20:18:13', '2014-03-04 08:11:16'),
(17, '/uploads/2014/03/03/', '7c737411d74bcc2a39e90de1238d40b937f016f2.jpg', 'image/jpeg', 29707, 'download (3).jpg', NULL, NULL, NULL, 'LegalDocuments', 1, 0, NULL, 13, '2014-03-03 20:18:55', '2014-03-04 08:11:16'),
(18, '/uploads/2014/03/03/', '77f6cee292e96191cc32a4ba06fe00b01e556145.jpg', 'image/jpeg', 40321, 'download (4).jpg', NULL, NULL, NULL, 'LegalDocuments', 1, 0, NULL, 14, '2014-03-03 20:18:55', '2014-03-04 08:11:16'),
(19, '/uploads/2014/03/03/', 'f7a4f05da06f3e67a919144e4c3d21709071daa6.jpg', 'image/jpeg', 62044, 'download (5).jpg', NULL, NULL, NULL, 'LegalDocuments', 1, 0, NULL, 15, '2014-03-03 20:18:55', '2014-03-04 08:11:16'),
(20, '/uploads/2014/03/03/', '1ef4ae6c48d6ae8d2db9acbae36653f5451ec39e.jpg', 'image/jpeg', 72506, 'download (7).jpg', NULL, NULL, NULL, 'LegalDocuments', 1, 0, NULL, 16, '2014-03-03 20:18:55', '2014-03-04 08:11:16'),
(21, '/uploads/2014/03/03/', '57a3c1a52e51f6bf8aa00ad650db0ef160fd275d.jpg', 'image/jpeg', 71777, 'download (6).jpg', NULL, NULL, NULL, 'LegalDocuments', 1, 0, NULL, 17, '2014-03-03 20:18:56', '2014-03-04 08:11:16'),
(22, '/uploads/2014/03/03/', 'bfffbba862dff2fe82a92d334b21379887afc63d.jpg', 'image/jpeg', 56467, 'download (8).jpg', NULL, NULL, NULL, 'LegalDocuments', 1, 0, NULL, 18, '2014-03-03 20:18:56', '2014-03-04 08:11:16'),
(23, '/uploads/2014/03/04/', '379f428b36799d01b7768fe441f5f9b3ba67ec50.JPG', 'image/jpeg', 287555, 'fff.JPG', '', '', '', 'Posts', 23, 0, NULL, 19, '2014-03-04 02:48:06', '2014-03-04 08:11:16'),
(24, '/uploads/2014/03/04/', '69a7dbfee0e07f3a91d93bca183e635f34792537.jpg', 'image/jpeg', 27919, '59620_494224937336191_2062777588_n.jpg', NULL, NULL, NULL, 'Posts', 1, 0, NULL, 20, '2014-03-04 08:11:29', '2014-03-04 08:11:29'),
(26, '/uploads/2014/03/04/', '36eaef670ac56a18aecde790a5440df0130d67af.jpg', 'image/jpeg', 29707, 'download (3).jpg', '', '', '', 'Posts', 27, 0, NULL, 21, '2014-03-04 09:58:12', '2014-03-04 09:59:02'),
(27, '/uploads/2014/03/04/', 'e133c2ffe0363d03da116c318f8d9786d4634595.jpg', 'image/jpeg', 40321, 'download (4).jpg', NULL, NULL, NULL, 'Posts', 27, 0, NULL, 22, '2014-03-04 09:58:12', '2014-03-04 09:59:02'),
(28, '/uploads/2014/03/04/', '2ed647e7307734cdcf7fff513579c6c336b8ef81.jpg', 'image/jpeg', 62044, 'download (5).jpg', NULL, NULL, NULL, 'Posts', 27, 0, NULL, 23, '2014-03-04 09:58:12', '2014-03-04 09:59:02'),
(29, '/uploads/2014/04/01/', 'aea617e248dbe777f7257f1e0bfd8c99fe263c75.jpg', 'image/jpeg', 41036, 'project1-slide3.jpg', NULL, NULL, NULL, 'Posts', 31, 0, NULL, 24, '2014-04-01 22:50:53', '2014-04-01 22:50:53'),
(30, '/uploads/2014/04/01/', '03ee5098ff2ee65c169a22683e09bd17d0d591bd.jpg', 'image/jpeg', 21480, 'project_ thumb1.jpg', NULL, NULL, NULL, 'Posts', 31, 0, NULL, 25, '2014-04-01 22:50:53', '2014-04-01 22:50:53'),
(31, '/uploads/2014/04/01/', '5e97ed7ed9a248c9dd223cd0ed3358126d5eea41.jpg', 'image/jpeg', 21480, 'project_ thumb2.jpg', NULL, NULL, NULL, 'Posts', 31, 0, NULL, 26, '2014-04-01 22:50:53', '2014-04-01 22:50:53'),
(32, '/uploads/2014/04/01/', 'e7956e3ffe4ef390884ad80c7608a463d4069fb3.jpg', 'image/jpeg', 21480, 'project_ thumb3.jpg', NULL, NULL, NULL, 'Posts', 31, 0, NULL, 27, '2014-04-01 22:50:53', '2014-04-01 22:50:53'),
(33, '/uploads/2014/04/01/', 'e70a6a9044acc507c06c2b4db7d4cbbccd8f02fa.png', 'image/png', 7665, 'project_logo.png', NULL, NULL, NULL, 'Posts', 31, 0, NULL, 28, '2014-04-01 22:50:53', '2014-04-01 22:50:53');

-- --------------------------------------------------------

--
-- Table structure for table `sprnr_messages`
--

CREATE TABLE IF NOT EXISTS `sprnr_messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `message` varchar(4096) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `sender_id` int(10) unsigned DEFAULT NULL,
  `receiver_id` int(10) unsigned DEFAULT NULL,
  `project_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sprnr_messages_project` (`project_id`),
  KEY `fk_sprnr_messages_sender` (`sender_id`),
  KEY `fk_sprnr_messages_receiver` (`receiver_id`),
  KEY `fk_sprnr_messages_parent` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sprnr_messages`
--

INSERT INTO `sprnr_messages` (`id`, `message`, `created`, `updated`, `parent_id`, `sender_id`, `receiver_id`, `project_id`) VALUES
(1, 'Hello ma, How''re you', '2014-03-04 00:00:00', '2014-03-26 00:00:00', NULL, 1, 2, 1),
(2, 'Hello ma, How''re you', '2014-02-10 00:00:00', '2014-03-11 00:00:00', NULL, 1, 2, 1),
(3, 'Check Your inbox', '2014-02-18 00:00:00', NULL, NULL, 2, 1, 1),
(4, 'check', '2014-03-02 00:00:00', NULL, NULL, 1, 2, 1),
(5, 'Hello there', '2014-02-04 00:00:00', NULL, NULL, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sprnr_milestones`
--

CREATE TABLE IF NOT EXISTS `sprnr_milestones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `deliverables` varchar(500) DEFAULT NULL,
  `cost` int(10) unsigned DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `payment_status` tinyint(1) DEFAULT NULL,
  `progress` tinyint(3) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `delivery_date` datetime DEFAULT NULL,
  `proposal_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sprnr_milestones_proposal` (`proposal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sprnr_milestones`
--

INSERT INTO `sprnr_milestones` (`id`, `title`, `deliverables`, `cost`, `created`, `updated`, `status`, `payment_status`, `progress`, `start_date`, `delivery_date`, `proposal_id`) VALUES
(1, 'Milestone 1', 'Milestone 1Milestone 1Milestone 1Milestone 1Milestone 1Milestone 1Milestone 1Milestone 1Milestone 1Milestone 1Milestone 1Milestone 1Milestone 1Milestone 1Milestone 1Milestone 1Milestone 1Milestone 1Milestone 1Milestone 1', 100, '2014-03-01 00:00:00', '2014-03-01 00:00:00', 0, 0, 20, '2014-03-01 00:00:00', '2014-03-19 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sprnr_notifications`
--

CREATE TABLE IF NOT EXISTS `sprnr_notifications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `message` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `sender_id` int(10) unsigned DEFAULT NULL,
  `receiver_id` int(10) unsigned DEFAULT NULL,
  `project_id` int(10) unsigned DEFAULT NULL,
  `milestone_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sprnr_notifications_sender` (`sender_id`),
  KEY `fk_sprnr_notifications_receiver` (`receiver_id`),
  KEY `fk_sprnr_notifications_project` (`project_id`),
  KEY `fk_sprnr_notifications_milestone` (`milestone_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sprnr_payments`
--

CREATE TABLE IF NOT EXISTS `sprnr_payments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `operation` int(10) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `profit_percentage` decimal(5,2) DEFAULT NULL,
  `profit` decimal(10,2) DEFAULT NULL,
  `sender_id` int(10) unsigned DEFAULT NULL,
  `receiver_id` int(10) unsigned DEFAULT NULL,
  `project_id` int(10) unsigned DEFAULT NULL,
  `milestone_id` int(10) unsigned DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `token` char(81) DEFAULT NULL,
  `token_date` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sprnr_payments_sender` (`sender_id`),
  KEY `fk_sprnr_payments_receiver` (`receiver_id`),
  KEY `fk_sprnr_payments_project` (`project_id`),
  KEY `fk_sprnr_payments_milestone` (`milestone_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sprnr_payments`
--

INSERT INTO `sprnr_payments` (`id`, `operation`, `amount`, `profit_percentage`, `profit`, `sender_id`, `receiver_id`, `project_id`, `milestone_id`, `created`, `updated`, `token`, `token_date`, `status`) VALUES
(2, 2, 90.00, 0.00, 0.00, 2, 1, 2, NULL, '2014-03-10 00:00:00', '2014-03-06 00:00:00', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sprnr_portfolio`
--

CREATE TABLE IF NOT EXISTS `sprnr_portfolio` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `text` varchar(4096) DEFAULT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  `display` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sprnr_portfolio_user` (`user_id`),
  KEY `fk_sprnr_portfolio_category_idx` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sprnr_posts`
--

CREATE TABLE IF NOT EXISTS `sprnr_posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `position` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `sprnr_posts`
--

INSERT INTO `sprnr_posts` (`id`, `type`, `title`, `slug`, `description`, `body`, `image`, `date`, `end_date`, `position`, `status`, `created`, `updated`) VALUES
(1, 1, 'Page title test', 'page-title-test', 'Description', '<p>Body of the page</p>\r\n', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, '2014-03-03 12:11:56', '2014-03-03 12:46:30'),
(4, 0, '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 0, '2014-03-03 12:29:30', '2014-03-03 12:29:30'),
(5, 0, '', '-1', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, 0, '2014-03-03 12:56:57', '2014-03-03 12:56:57'),
(6, 0, '', '-2', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 4, 0, '2014-03-03 12:58:50', '2014-03-03 12:58:50'),
(7, 0, '', '-3', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 5, 0, '2014-03-03 12:59:36', '2014-03-03 12:59:36'),
(8, 0, '', '-4', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 6, 0, '2014-03-03 18:09:50', '2014-03-03 18:09:50'),
(9, 0, '', '-5', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 7, 0, '2014-03-03 19:41:34', '2014-03-03 19:41:34'),
(10, 0, '', '-6', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 8, 0, '2014-03-03 21:50:19', '2014-03-03 21:50:19'),
(11, 0, '', '-7', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 9, 0, '2014-03-03 23:50:02', '2014-03-03 23:50:02'),
(12, 0, '', '-8', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 0, '2014-03-04 00:15:36', '2014-03-04 00:15:36'),
(13, 0, '', '-9', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 11, 0, '2014-03-04 00:22:13', '2014-03-04 00:22:13'),
(14, 0, '', '-10', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 12, 0, '2014-03-04 00:26:43', '2014-03-04 00:26:43'),
(15, 0, '', '-11', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 13, 0, '2014-03-04 00:34:38', '2014-03-04 00:34:38'),
(16, 0, '', '-12', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 14, 0, '2014-03-04 00:42:43', '2014-03-04 00:42:43'),
(17, 7, 'How Are You ?', 'how-are-you', 'Fine Al7amdolellah asd', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 15, 1, '2014-03-04 00:45:09', '2014-03-04 00:52:07'),
(18, 0, '', '-13', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 16, 0, '2014-03-04 00:52:33', '2014-03-04 00:52:33'),
(19, 0, '', '-14', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 17, 0, '2014-03-04 01:00:27', '2014-03-04 01:00:27'),
(20, 3, 'Event 1', 'event-1', 'hgasd hagsjd anhsdj', '<p>hgahsd ajhsgdj ahsgdn</p>\r\n', '', '2014-03-20 00:00:00', '2014-03-21 00:00:00', 18, 1, '2014-03-04 01:04:49', '2014-03-04 01:36:43'),
(21, 0, '', '-15', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 19, 0, '2014-03-04 01:08:17', '2014-03-04 01:08:17'),
(22, 0, '', '-16', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 20, 0, '2014-03-04 02:47:43', '2014-03-04 02:47:43'),
(23, 0, '', '-17', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 21, 0, '2014-03-04 02:47:53', '2014-03-04 02:47:53'),
(24, 0, '', '-18', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 22, 0, '2014-03-04 09:55:20', '2014-03-04 09:55:20'),
(25, 1, 'About Us', 'about-us', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 23, 1, '2014-03-04 09:56:31', '2014-03-04 09:56:45'),
(26, 0, '', '-19', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 24, 0, '2014-03-04 09:57:17', '2014-03-04 09:57:17'),
(27, 0, '', '-20', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 25, 0, '2014-03-04 09:57:29', '2014-03-04 09:57:29'),
(28, 0, '', '-21', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 26, 0, '2014-03-04 10:26:48', '2014-03-04 10:26:48'),
(29, 0, '', '-22', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 27, 0, '2014-04-01 22:46:24', '2014-04-01 22:46:24'),
(30, 0, '', '-23', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 28, 0, '2014-04-01 22:46:41', '2014-04-01 22:46:41'),
(31, 0, '', '-24', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 29, 0, '2014-04-01 22:50:40', '2014-04-01 22:50:40');

-- --------------------------------------------------------

--
-- Table structure for table `sprnr_projects`
--

CREATE TABLE IF NOT EXISTS `sprnr_projects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(2500) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `type` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT '1',
  `status` tinyint(1) DEFAULT '0',
  `progress` tinyint(3) DEFAULT '0',
  `budget_type` tinyint(1) DEFAULT '1',
  `min_budget` int(10) unsigned DEFAULT NULL,
  `max_budget` int(10) unsigned DEFAULT NULL,
  `interval` tinyint(1) DEFAULT '0',
  `hours_per_interval` int(10) unsigned DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `publish_date` datetime DEFAULT NULL,
  `expiration_date` datetime DEFAULT NULL,
  `completion_date` datetime DEFAULT NULL,
  `min_score` int(10) unsigned DEFAULT NULL,
  `privacy` tinyint(1) DEFAULT '0',
  `seo_indexing` tinyint(1) DEFAULT '1',
  `owner_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sprnr_project_owner` (`owner_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `sprnr_projects`
--

INSERT INTO `sprnr_projects` (`id`, `title`, `description`, `slug`, `type`, `created`, `updated`, `enabled`, `status`, `progress`, `budget_type`, `min_budget`, `max_budget`, `interval`, `hours_per_interval`, `start_date`, `publish_date`, `expiration_date`, `completion_date`, `min_score`, `privacy`, `seo_indexing`, `owner_id`) VALUES
(1, 'Project One', 'Description of project one', 'slug-of-project', 1, '2014-02-17 00:00:00', '2014-02-17 00:00:00', 1, 1, 100, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1),
(2, 'Project One', 'Description of project one', 'slug-of-project', 1, '2014-02-17 00:00:00', '2014-02-17 00:00:00', 1, 0, 100, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1),
(3, 'Project One', 'Description of project one', 'slug-of-project', 1, '2014-02-17 00:00:00', '2014-02-17 00:00:00', 1, 0, 100, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1),
(4, 'Project One', 'Description of project one', 'slug-of-project', 1, '2014-02-17 00:00:00', '2014-02-17 00:00:00', 1, 0, 100, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1),
(5, 'Project One', 'Description of project one', 'slug-of-project', 1, '2014-02-17 00:00:00', '2014-02-17 00:00:00', 1, 0, 100, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL),
(6, 'Project One', 'Description of project one', 'slug-of-project', 1, '2014-02-17 00:00:00', '2014-02-17 00:00:00', 1, 0, 100, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL),
(7, 'Project One', 'Description of project one', 'slug-of-project', 1, '2014-02-17 00:00:00', '2014-02-17 00:00:00', 1, 0, 100, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL),
(8, 'Project One', 'Description of project one', 'slug-of-project', 1, '2014-02-17 00:00:00', '2014-02-17 00:00:00', 1, 0, 100, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL),
(9, 'Project One', 'Description of project one', 'slug-of-project', 1, '2014-02-17 00:00:00', '2014-02-17 00:00:00', 1, 0, 100, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL),
(10, 'Project One', 'Description of project one', 'slug-of-project', 1, '2014-02-17 00:00:00', '2014-02-17 00:00:00', 1, 0, 100, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL),
(11, 'Project One', 'Description of project one', 'slug-of-project', 1, '2014-02-17 00:00:00', '2014-02-17 00:00:00', 1, 0, 100, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL),
(12, 'Project One', 'Description of project one', 'slug-of-project', 1, '2014-02-17 00:00:00', '2014-02-17 00:00:00', 1, 0, 100, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL),
(13, 'Project One', 'Description of project one', 'slug-of-project', 1, '2014-02-17 00:00:00', '2014-02-17 00:00:00', 1, 0, 100, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL),
(14, 'Project One', 'Description of project one', 'slug-of-project', 1, '2014-02-17 00:00:00', '2014-02-17 00:00:00', 1, 0, 100, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL),
(15, 'Project One', 'Description of project one', 'slug-of-project', 1, '2014-02-17 00:00:00', '2014-02-17 00:00:00', 1, 0, 100, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL),
(16, 'Project One', 'Description of project one', 'slug-of-project', 1, '2014-02-17 00:00:00', '2014-02-17 00:00:00', 1, 0, 100, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL),
(17, 'Project One', 'Description of project one', 'slug-of-project', 1, '2014-02-17 00:00:00', '2014-02-17 00:00:00', 1, 0, 100, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL),
(18, 'Project One', 'Description of project one', 'slug-of-project', 1, '2014-02-17 00:00:00', '2014-02-17 00:00:00', 1, 0, 100, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL),
(19, 'Project One', 'Description of project one', 'slug-of-project', 1, '2014-02-17 00:00:00', '2014-02-17 00:00:00', 1, 0, 100, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL),
(20, 'Project One', 'Description of project one', 'slug-of-project', 1, '2014-02-17 00:00:00', '2014-02-17 00:00:00', 1, 0, 100, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL),
(21, 'Project One', 'Description of project one', 'slug-of-project', 1, '2014-02-17 00:00:00', '2014-02-17 00:00:00', 1, 0, 100, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL),
(22, 'Project One', 'Description of project one', 'slug-of-project', 1, '2014-02-17 00:00:00', '2014-02-17 00:00:00', 1, 0, 100, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL),
(23, 'Project One', 'Description of project one', 'slug-of-project', 1, '2014-02-17 00:00:00', '2014-02-17 00:00:00', 1, 0, 100, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL),
(24, 'Project One', 'Description of project one', 'slug-of-project', 1, '2014-02-17 00:00:00', '2014-02-17 00:00:00', 1, 0, 100, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL),
(25, 'check project creation', 'Descriptio', 'check-project-creation', 1, '2014-03-03 18:57:04', '2014-03-03 18:57:04', 1, 0, 2, 0, 123, 3434, 0, 21, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 1, 0, 2),
(26, 'create project', 'Descr', 'create-project', 1, '2014-03-03 19:44:43', '2014-03-03 19:44:43', 1, 0, 20, 1, 100, 200, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 4, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sprnr_proposals`
--

CREATE TABLE IF NOT EXISTS `sprnr_proposals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(500) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `activity` tinyint(1) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `started` tinyint(1) DEFAULT NULL,
  `duration` int(10) unsigned DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `project_id` int(10) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sprnr_proposals_project` (`project_id`),
  KEY `fk_sprnr_proposals_user` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sprnr_proposals`
--

INSERT INTO `sprnr_proposals` (`id`, `description`, `status`, `activity`, `start_date`, `started`, `duration`, `created`, `updated`, `project_id`, `user_id`) VALUES
(1, 'This is my proposal', 0, 1, '2014-03-17 00:00:00', 0, 20, '2014-03-01 00:00:00', '2014-03-01 00:00:00', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sprnr_recommendations`
--

CREATE TABLE IF NOT EXISTS `sprnr_recommendations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from` int(10) unsigned DEFAULT NULL,
  `to` int(10) unsigned DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sprnr_recommendations_from` (`from`),
  KEY `fk_sprnr_recommendations_to` (`to`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sprnr_reviews`
--

CREATE TABLE IF NOT EXISTS `sprnr_reviews` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) DEFAULT NULL,
  `review` varchar(4096) DEFAULT NULL,
  `from` int(10) unsigned DEFAULT NULL,
  `to` int(10) unsigned DEFAULT NULL,
  `commitment_rate` decimal(2,1) unsigned DEFAULT NULL,
  `quality_rate` decimal(2,1) unsigned DEFAULT NULL,
  `cost_rate` decimal(2,1) unsigned DEFAULT NULL,
  `availability_rate` decimal(2,1) unsigned DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `project_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sprnr_review_from` (`from`),
  KEY `fk_sprnr_review_to` (`to`),
  KEY `fk_sprnr_review_project` (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sprnr_reviews`
--

INSERT INTO `sprnr_reviews` (`id`, `subject`, `review`, `from`, `to`, `commitment_rate`, `quality_rate`, `cost_rate`, `availability_rate`, `created`, `updated`, `project_id`) VALUES
(1, 'Great design', 'Great design concepts by John Smith and his crew! Totally owned the WCG!, Best of luck for your future endeavours, Special thanks for Jane smith for her motivation ;)', 2, 1, 3.0, 2.0, 2.3, 4.0, '2014-02-25 00:00:00', '2014-02-26 00:00:00', 1),
(2, 'Great design', 'Great design concepts by John Smith and his crew! Totally owned the WCG!, Best of luck for your future endeavours, Special thanks for Jane smith for her motivation ;)', 2, 1, 3.0, 2.0, 3.0, 1.5, '2014-02-25 00:00:00', '2014-02-26 00:00:00', 2),
(3, 'Great design', 'Great design concepts by John Smith and his crew! Totally owned the WCG!, Best of luck for your future endeavours, Special thanks for Jane smith for her motivation ;)', 2, 1, 5.0, 2.0, 3.0, 4.0, '2014-02-25 00:00:00', '2014-02-26 00:00:00', 3),
(4, 'Great design', 'Great design concepts by John Smith and his crew! Totally owned the WCG!, Best of luck for your future endeavours, Special thanks for Jane smith for her motivation ;)', 2, 1, 3.0, 2.0, 3.0, 2.0, '2014-02-25 00:00:00', '2014-02-26 00:00:00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `sprnr_settings`
--

CREATE TABLE IF NOT EXISTS `sprnr_settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(45) NOT NULL,
  `value` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key_UNIQUE` (`key`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sprnr_settings`
--

INSERT INTO `sprnr_settings` (`id`, `key`, `value`, `description`, `created`, `updated`) VALUES
(1, 'maximum_budget', '10000', 'MAximum Budget', '2014-03-04 02:26:10', '2014-03-04 02:28:17');

-- --------------------------------------------------------

--
-- Table structure for table `sprnr_tree`
--

CREATE TABLE IF NOT EXISTS `sprnr_tree` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(3) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `link` varchar(255) NOT NULL,
  `icon` varchar(45) DEFAULT NULL,
  `level` int(11) NOT NULL,
  `position` int(10) unsigned DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `sprnr_tree`
--

INSERT INTO `sprnr_tree` (`id`, `type`, `name`, `slug`, `description`, `link`, `icon`, `level`, `position`, `created`, `updated`, `parent_id`) VALUES
(1, 0, 'Root', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL),
(6, 3, 'skdfsfd check', 'skdfsfd-check', '', '', NULL, 0, 1, '2014-03-03 14:24:17', '2014-03-03 15:27:15', 0),
(7, 3, 'Sub tree', 'sub-tree', 'Description', 'http://google.com', NULL, 0, 2, '2014-03-03 14:33:57', '2014-03-03 14:36:57', 6),
(8, 4, 'foooooooter', 'foooooooter', '', '', NULL, 0, 3, '2014-03-03 15:05:50', '2014-03-03 21:08:07', 0),
(9, 2, 'Cat1', 'cat1', NULL, '', NULL, 0, 4, '2014-03-03 16:15:23', '2014-03-03 16:15:23', 0),
(10, 2, 'Cat2', 'cat2', NULL, '', NULL, 0, 5, '2014-03-03 16:15:36', '2014-03-03 16:15:36', 0),
(11, 2, 'Skill1', 'skill1', NULL, '', NULL, 0, 6, '2014-03-03 16:16:25', '2014-03-03 16:16:25', 10),
(12, 4, 'men1', 'men1', NULL, '', NULL, 0, 7, '2014-03-04 10:00:42', '2014-03-04 10:00:42', 8),
(13, 2, 'sk', 'sk', NULL, '', NULL, 0, 8, '2014-03-04 10:09:53', '2014-03-04 10:09:53', 10);

-- --------------------------------------------------------

--
-- Table structure for table `sprnr_users`
--

CREATE TABLE IF NOT EXISTS `sprnr_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(60) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `balance` decimal(10,2) NOT NULL DEFAULT '0.00',
  `password` varchar(123) NOT NULL,
  `verified` tinyint(4) NOT NULL DEFAULT '0',
  `activated` tinyint(4) NOT NULL DEFAULT '0',
  `activation_code` varchar(45) DEFAULT NULL,
  `activation_date` varchar(45) DEFAULT NULL,
  `banned` varchar(45) NOT NULL DEFAULT '0',
  `token` char(123) DEFAULT NULL,
  `token_date` datetime NOT NULL,
  `login_token` char(123) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `national_id` bigint(20) DEFAULT NULL,
  `new_email` varchar(255) DEFAULT NULL,
  `new_phone` int(11) unsigned DEFAULT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `gender` tinyint(4) NOT NULL DEFAULT '0',
  `birthdate` datetime NOT NULL,
  `country_phone_code` smallint(3) NOT NULL,
  `phone` char(11) DEFAULT NULL,
  `facebook_identifier` varchar(255) NOT NULL,
  `metadata` text NOT NULL,
  `availability` tinyint(1) DEFAULT '1',
  `enabled` tinyint(1) DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `level` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `token_UNIQUE` (`token`),
  UNIQUE KEY `phone_UNIQUE` (`phone`),
  UNIQUE KEY `activation_code_UNIQUE` (`activation_code`),
  UNIQUE KEY `new_email_UNIQUE` (`new_email`),
  UNIQUE KEY `new_phone_UNIQUE` (`new_phone`),
  UNIQUE KEY `login_token_UNIQUE` (`login_token`),
  KEY `fk_sprnr_users_createdBy` (`created_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sprnr_users`
--

INSERT INTO `sprnr_users` (`id`, `username`, `email`, `type`, `balance`, `password`, `verified`, `activated`, `activation_code`, `activation_date`, `banned`, `token`, `token_date`, `login_token`, `last_login`, `national_id`, `new_email`, `new_phone`, `first_name`, `last_name`, `gender`, `birthdate`, `country_phone_code`, `phone`, `facebook_identifier`, `metadata`, `availability`, `enabled`, `created`, `updated`, `created_by`, `level`) VALUES
(1, 'master', 'a.abdelaziz.eg@gmail.com', 1, 1000.00, '$2a$13$aPgUuRdrwdj8O1eLloK7S.B.4HwEvn5y16HJZ51UgnqwWdTXLOdBe', 1, 1, NULL, NULL, '0', NULL, '0000-00-00 00:00:00', 'ya28d0rwJaakM3WI4OVrffvvZe20Mpf2qHZw4Poj_ddmY_QysSmqSlzmAn~_3rPk', '2014-03-16 20:33:39', NULL, NULL, NULL, '', '', 0, '0000-00-00 00:00:00', 0, NULL, '', '{"first_name":"Ahmed","last_name":"Abdelaziz","gender":"Male","company":"Superneur","title":"Senior Software Engineer","brief":"asd                         df ","website":"http:\\/\\/www.superneur.com","country":"ag","state":"Cairo","city":"Cairo","address":"Address","postal_code":"12345","timezone":"America\\/Mexico_City","country_code":"2","phone":"01004740817","account_type":"Work","access":"Public","security_question":"1","answer":"team"}', 1, 1, '2014-02-10 22:46:55', '2014-02-10 22:46:55', NULL, NULL),
(2, 'ahmed2', 'a.abdelaziz@superneur.com', 2, 200.00, '$2a$13$aPgUuRdrwdj8O1eLloK7S.B.4HwEvn5y16HJZ51UgnqwWdTXLOdBe', 1, 1, NULL, NULL, '0', NULL, '0000-00-00 00:00:00', '', '2014-02-25 22:40:22', NULL, NULL, NULL, 'Abdelrahman', 'Ahmed', 0, '0000-00-00 00:00:00', 0, '01004740817', '', '{"first_name":"Abdelrahman","last_name":"Ahmed","gender":"Male","company":"Life","title":"Senior Child","brief":"Breif","website":"http:\\/\\/www.superneur.com","country":"ag","state":"Cairo","city":"Cairo","address":"Address","postal_code":"12345","timezone":"America\\/Mexico_City","country_code":"2","phone":"01004740817","account_type":"Work","access":"Public","security_question":"1","answer":"team"}', 1, 1, '2014-02-10 22:46:55', '2014-03-03 19:39:10', NULL, NULL),
(3, 'user1', 'tabbakh_ahmed@yahoo.com', 3, 0.00, '$2a$13$YNG7txHr2P8f9klW5UPrxuxnClH8YOY3gsrMkC63TI/6Tf2.AyV/y', 0, 1, NULL, '2014-04-02 00:00:17', '0', NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, 'Ahmed', 'Abdelaziz', 0, '0000-00-00 00:00:00', 2, '81267876723', '', '', 1, 1, '2014-03-03 19:41:11', '2014-04-01 23:00:17', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_auth_assignment`
--

CREATE TABLE IF NOT EXISTS `tbl_auth_assignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` int(10) unsigned NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_auth_item`
--

CREATE TABLE IF NOT EXISTS `tbl_auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_auth_item_child`
--

CREATE TABLE IF NOT EXISTS `tbl_auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `fk_auth_item_child_child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_migration`
--

CREATE TABLE IF NOT EXISTS `tbl_migration` (
  `version` varchar(255) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_migration`
--

INSERT INTO `tbl_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1392065084),
('m131127_132557_create_db_scheme', 1392065096),
('m131127_134928_insert_master_user', 1392065215);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sprnr_bookmarks`
--
ALTER TABLE `sprnr_bookmarks`
  ADD CONSTRAINT `fk_sprnr_bookmarks_project` FOREIGN KEY (`project_id`) REFERENCES `sprnr_projects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sprnr_bookmarks_user` FOREIGN KEY (`user_id`) REFERENCES `sprnr_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sprnr_comments`
--
ALTER TABLE `sprnr_comments`
  ADD CONSTRAINT `fk_sprnr_comments_milestone` FOREIGN KEY (`model_id`) REFERENCES `sprnr_milestones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sprnr_comments_parent` FOREIGN KEY (`parent_id`) REFERENCES `sprnr_comments` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sprnr_comments_portfolio` FOREIGN KEY (`model_id`) REFERENCES `sprnr_portfolio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sprnr_comments_user` FOREIGN KEY (`user_id`) REFERENCES `sprnr_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sprnr_comment_model_project` FOREIGN KEY (`model_id`) REFERENCES `sprnr_projects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sprnr_comment_model_reviews` FOREIGN KEY (`model_id`) REFERENCES `sprnr_reviews` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sprnr_complaints`
--
ALTER TABLE `sprnr_complaints`
  ADD CONSTRAINT `fk_sprnr_complaints_against` FOREIGN KEY (`against`) REFERENCES `sprnr_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sprnr_complaints_from` FOREIGN KEY (`from`) REFERENCES `sprnr_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sprnr_complaints_project` FOREIGN KEY (`project_id`) REFERENCES `sprnr_projects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sprnr_followers`
--
ALTER TABLE `sprnr_followers`
  ADD CONSTRAINT `fk_sprnr_follow_follower` FOREIGN KEY (`follower_id`) REFERENCES `sprnr_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sprnr_follow_user` FOREIGN KEY (`user_id`) REFERENCES `sprnr_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sprnr_groups_users`
--
ALTER TABLE `sprnr_groups_users`
  ADD CONSTRAINT `fk_sprnr_groups_users_group` FOREIGN KEY (`group_id`) REFERENCES `sprnr_groups` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sprnr_groups_users_user` FOREIGN KEY (`user_id`) REFERENCES `sprnr_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sprnr_messages`
--
ALTER TABLE `sprnr_messages`
  ADD CONSTRAINT `fk_sprnr_messages_parent` FOREIGN KEY (`parent_id`) REFERENCES `sprnr_messages` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sprnr_messages_project` FOREIGN KEY (`project_id`) REFERENCES `sprnr_projects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sprnr_messages_receiver` FOREIGN KEY (`receiver_id`) REFERENCES `sprnr_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sprnr_messages_sender` FOREIGN KEY (`sender_id`) REFERENCES `sprnr_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sprnr_milestones`
--
ALTER TABLE `sprnr_milestones`
  ADD CONSTRAINT `fk_sprnr_milestones_proposal` FOREIGN KEY (`proposal_id`) REFERENCES `sprnr_proposals` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sprnr_notifications`
--
ALTER TABLE `sprnr_notifications`
  ADD CONSTRAINT `fk_sprnr_notifications_milestone` FOREIGN KEY (`milestone_id`) REFERENCES `sprnr_milestones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sprnr_notifications_project` FOREIGN KEY (`project_id`) REFERENCES `sprnr_projects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sprnr_notifications_receiver` FOREIGN KEY (`receiver_id`) REFERENCES `sprnr_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sprnr_notifications_sender` FOREIGN KEY (`sender_id`) REFERENCES `sprnr_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sprnr_payments`
--
ALTER TABLE `sprnr_payments`
  ADD CONSTRAINT `fk_sprnr_payments_milestone` FOREIGN KEY (`milestone_id`) REFERENCES `sprnr_milestones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sprnr_payments_project` FOREIGN KEY (`project_id`) REFERENCES `sprnr_projects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sprnr_payments_receiver` FOREIGN KEY (`receiver_id`) REFERENCES `sprnr_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sprnr_payments_sender` FOREIGN KEY (`sender_id`) REFERENCES `sprnr_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sprnr_portfolio`
--
ALTER TABLE `sprnr_portfolio`
  ADD CONSTRAINT `fk_sprnr_portfolio_category` FOREIGN KEY (`category_id`) REFERENCES `sprnr_tree` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sprnr_portfolio_user` FOREIGN KEY (`user_id`) REFERENCES `sprnr_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sprnr_projects`
--
ALTER TABLE `sprnr_projects`
  ADD CONSTRAINT `fk_sprnr_project_owner` FOREIGN KEY (`owner_id`) REFERENCES `sprnr_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sprnr_proposals`
--
ALTER TABLE `sprnr_proposals`
  ADD CONSTRAINT `fk_sprnr_proposals_project` FOREIGN KEY (`project_id`) REFERENCES `sprnr_projects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sprnr_proposals_user` FOREIGN KEY (`user_id`) REFERENCES `sprnr_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sprnr_recommendations`
--
ALTER TABLE `sprnr_recommendations`
  ADD CONSTRAINT `fk_sprnr_recommendations_from` FOREIGN KEY (`from`) REFERENCES `sprnr_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sprnr_recommendations_to` FOREIGN KEY (`to`) REFERENCES `sprnr_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sprnr_reviews`
--
ALTER TABLE `sprnr_reviews`
  ADD CONSTRAINT `fk_sprnr_review_from` FOREIGN KEY (`from`) REFERENCES `sprnr_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sprnr_review_project` FOREIGN KEY (`project_id`) REFERENCES `sprnr_projects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sprnr_review_to` FOREIGN KEY (`to`) REFERENCES `sprnr_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_auth_assignment`
--
ALTER TABLE `tbl_auth_assignment`
  ADD CONSTRAINT `fk_auth_assignment_itemname` FOREIGN KEY (`itemname`) REFERENCES `tbl_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_auth_item_child`
--
ALTER TABLE `tbl_auth_item_child`
  ADD CONSTRAINT `fk_auth_item_child_child` FOREIGN KEY (`child`) REFERENCES `tbl_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_auth_item_child_parent` FOREIGN KEY (`parent`) REFERENCES `tbl_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
