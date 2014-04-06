<?php

class m131127_132557_create_db_scheme extends CDbMigration {

    public function up() {
        $this->execute("SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
SET time_zone = '+00:00';


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `superneur`
--

-- --------------------------------------------------------

--
-- Table structure for table `sprnr_balance`
--

CREATE TABLE IF NOT EXISTS `sprnr_balance` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `balance` int(10) unsigned DEFAULT NULL,
  `type` tinyint(1) DEFAULT '0',
  `expiration_date` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sprnr_balance_user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sprnr_balance_history`
--

CREATE TABLE IF NOT EXISTS `sprnr_balance_history` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `amount` int(10) unsigned DEFAULT NULL,
  `reason` varchar(45) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `project_id` int(10) unsigned DEFAULT NULL,
  `milestone_id` int(10) unsigned DEFAULT NULL,
  `payment_id` int(10) unsigned DEFAULT NULL,
  `balance_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sprnr_balance_history_project` (`project_id`),
  KEY `fk_sprnr_balance_history_balance` (`balance_id`),
  KEY `fk_sprnr_balance_history_milestone` (`milestone_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sprnr_categories`
--

CREATE TABLE IF NOT EXISTS `sprnr_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `type` tinyint(1) DEFAULT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sprnr_categories_parent` (`parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sprnr_faqs`
--

CREATE TABLE IF NOT EXISTS `sprnr_faqs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(500) DEFAULT NULL,
  `answer` text,
  `category_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sprnr_faqs_category_idx` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
-- Table structure for table `sprnr_invoices`
--

CREATE TABLE IF NOT EXISTS `sprnr_invoices` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `user_id` int(10) unsigned zerofill DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sprnr_invoices_user` (`user_id`)
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sprnr_news`
--

CREATE TABLE IF NOT EXISTS `sprnr_news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `body` text,
  `published` tinyint(1) DEFAULT '0',
  `featured` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
-- Table structure for table `sprnr_pages`
--

CREATE TABLE IF NOT EXISTS `sprnr_pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `post` varchar(500) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sprnr_posts_user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sprnr_projects_skills`
--

CREATE TABLE IF NOT EXISTS `sprnr_projects_skills` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int(10) unsigned DEFAULT NULL,
  `skill_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sprnr_projects_categories_projects` (`project_id`),
  KEY `fk_sprnr_projects_skills_skill` (`skill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `icon` varchar(45) DEFAULT NULL,
  `position` int(10) unsigned DEFAULT NULL,
  `created` datetime DEFAULT NULL COMMENT '\n',
  `updated` datetime DEFAULT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sprnr_tree_parent_idx` (`parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------
-- -----------------------------------------------------
-- Table `shft_settings`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `sprnr_settings` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `key` VARCHAR(45) NOT NULL ,
  `value` VARCHAR(500) NOT NULL ,
  `description` VARCHAR(500) NOT NULL ,
  `created` DATETIME NOT NULL ,
  `updated` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `key_UNIQUE` (`key` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;
-- ------------------------------------------------------
--
-- Table structure for table `sprnr_users`
--

CREATE TABLE IF NOT EXISTS `sprnr_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(60) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `title` varchar(45) DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `password` varchar(123) NOT NULL,
  `verified` tinyint(4) NOT NULL DEFAULT '0',
  `activated` tinyint(4) NOT NULL DEFAULT '0',
  `activation_code` varchar(45) DEFAULT NULL,
  `activation_date` varchar(45) DEFAULT NULL,
  `banned` varchar(45) NOT NULL DEFAULT '0',
  `token` char(123) DEFAULT NULL,
  `token_date` datetime NOT NULL,
  `login_token` varchar(45) DEFAULT NULL,
  `last_login` char(123) DEFAULT NULL,
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
  UNIQUE KEY `verified_UNIQUE` (`verified`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `token_UNIQUE` (`token`),
  UNIQUE KEY `phone_UNIQUE` (`phone`),
  UNIQUE KEY `activation_code_UNIQUE` (`activation_code`),
  UNIQUE KEY `new_email_UNIQUE` (`new_email`),
  UNIQUE KEY `new_phone_UNIQUE` (`new_phone`),
  UNIQUE KEY `login_token_UNIQUE` (`login_token`),
  KEY `fk_sprnr_users_createdBy` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sprnr_users_skills`
--

CREATE TABLE IF NOT EXISTS `sprnr_users_skills` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `skill_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sprnr_users_skills_user` (`user_id`),
  KEY `fk_sprnr_users_skills_skill` (`skill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sprnr_balance`
--
ALTER TABLE `sprnr_balance`
  ADD CONSTRAINT `fk_sprnr_balance_user` FOREIGN KEY (`user_id`) REFERENCES `sprnr_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sprnr_balance_history`
--
ALTER TABLE `sprnr_balance_history`
  ADD CONSTRAINT `fk_sprnr_balance_history_balance` FOREIGN KEY (`balance_id`) REFERENCES `sprnr_balance` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sprnr_balance_history_milestone` FOREIGN KEY (`milestone_id`) REFERENCES `sprnr_milestones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sprnr_balance_history_project` FOREIGN KEY (`project_id`) REFERENCES `sprnr_projects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sprnr_bookmarks`
--
ALTER TABLE `sprnr_bookmarks`
  ADD CONSTRAINT `fk_sprnr_bookmarks_project` FOREIGN KEY (`project_id`) REFERENCES `sprnr_projects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sprnr_bookmarks_user` FOREIGN KEY (`user_id`) REFERENCES `sprnr_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sprnr_categories`
--
ALTER TABLE `sprnr_categories`
  ADD CONSTRAINT `fk_sprnr_categories_parent` FOREIGN KEY (`parent_id`) REFERENCES `sprnr_categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sprnr_comments`
--
ALTER TABLE `sprnr_comments`
  ADD CONSTRAINT `fk_sprnr_comments_milestone` FOREIGN KEY (`model_id`) REFERENCES `sprnr_milestones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sprnr_comments_news` FOREIGN KEY (`model_id`) REFERENCES `sprnr_news` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sprnr_comments_parent` FOREIGN KEY (`parent_id`) REFERENCES `sprnr_comments` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sprnr_comments_portfolio` FOREIGN KEY (`model_id`) REFERENCES `sprnr_portfolio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sprnr_comments_posts` FOREIGN KEY (`model_id`) REFERENCES `sprnr_posts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
-- Constraints for table `sprnr_faqs`
--
ALTER TABLE `sprnr_faqs`
  ADD CONSTRAINT `fk_sprnr_faqs_category` FOREIGN KEY (`category_id`) REFERENCES `sprnr_tree` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Constraints for table `sprnr_invoices`
--
ALTER TABLE `sprnr_invoices`
  ADD CONSTRAINT `fk_sprnr_invoices_user` FOREIGN KEY (`user_id`) REFERENCES `sprnr_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sprnr_media`
--
ALTER TABLE `sprnr_media`
  ADD CONSTRAINT `fk_sprnr_media_legaldocuments` FOREIGN KEY (`model_id`) REFERENCES `sprnr_legal_documents` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sprnr_media_messages` FOREIGN KEY (`model_id`) REFERENCES `sprnr_messages` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sprnr_media_news` FOREIGN KEY (`model_id`) REFERENCES `sprnr_news` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sprnr_media_portfolio` FOREIGN KEY (`model_id`) REFERENCES `sprnr_portfolio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sprnr_media_posts` FOREIGN KEY (`model_id`) REFERENCES `sprnr_posts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Constraints for table `sprnr_posts`
--
ALTER TABLE `sprnr_posts`
  ADD CONSTRAINT `fk_sprnr_posts_user` FOREIGN KEY (`user_id`) REFERENCES `sprnr_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sprnr_projects`
--
ALTER TABLE `sprnr_projects`
  ADD CONSTRAINT `fk_sprnr_project_owner` FOREIGN KEY (`owner_id`) REFERENCES `sprnr_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sprnr_projects_skills`
--
ALTER TABLE `sprnr_projects_skills`
  ADD CONSTRAINT `fk_sprnr_projects_skills_skill` FOREIGN KEY (`skill_id`) REFERENCES `sprnr_categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Constraints for table `sprnr_tree`
--
ALTER TABLE `sprnr_tree`
  ADD CONSTRAINT `fk_sprnr_tree_parent` FOREIGN KEY (`parent_id`) REFERENCES `sprnr_tree` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sprnr_users_skills`
--
ALTER TABLE `sprnr_users_skills`
  ADD CONSTRAINT `fk_sprnr_users_skills_skill` FOREIGN KEY (`skill_id`) REFERENCES `sprnr_tree` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sprnr_users_skills_user` FOREIGN KEY (`user_id`) REFERENCES `sprnr_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;");

    }

    public function down() {
        echo "m131127_132557_create_db_scheme does not support migration down.\n";
        return false;
    }

    /*
      // Use safeUp/safeDown to do migration with transaction
      public function safeUp()
      {
      }

      public function safeDown()
      {
      }
     */
}
