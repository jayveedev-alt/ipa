/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 8.0.30 : Database - ict_live
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ict_live` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `ict_live`;

/*Table structure for table `app_question_answered` */

DROP TABLE IF EXISTS `app_question_answered`;

CREATE TABLE `app_question_answered` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `app_id` int DEFAULT NULL,
  `question_id` int DEFAULT NULL,
  `answer` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `application_types` */

DROP TABLE IF EXISTS `application_types`;

CREATE TABLE `application_types` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

/*Table structure for table `applications` */

DROP TABLE IF EXISTS `applications`;

CREATE TABLE `applications` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `type` int DEFAULT NULL,
  `ref_no` varchar(100) COLLATE utf8mb3_danish_ci DEFAULT NULL,
  `application_no` varchar(100) CHARACTER SET utf8mb3 DEFAULT NULL,
  `area_no` varchar(100) CHARACTER SET utf8mb3 DEFAULT NULL,
  `request_id` int DEFAULT NULL,
  `for_construction_owned` varchar(255) CHARACTER SET utf8mb3 DEFAULT NULL,
  `ownership_form` varchar(255) CHARACTER SET utf8mb3 DEFAULT NULL,
  `project_location` varchar(255) CHARACTER SET utf8mb3 DEFAULT NULL,
  `project_type_id` int DEFAULT NULL,
  `project_purpose` varchar(255) CHARACTER SET utf8mb3 DEFAULT NULL,
  `proj_lot` varchar(255) COLLATE utf8mb3_danish_ci DEFAULT NULL,
  `proj_blk` varchar(255) COLLATE utf8mb3_danish_ci DEFAULT NULL,
  `proj_tct` varchar(255) COLLATE utf8mb3_danish_ci DEFAULT NULL,
  `proj_tax_dec` varchar(255) COLLATE utf8mb3_danish_ci DEFAULT NULL,
  `proj_st` varchar(255) COLLATE utf8mb3_danish_ci DEFAULT NULL,
  `proj_brgy` varchar(255) COLLATE utf8mb3_danish_ci DEFAULT NULL,
  `proj_dist` varchar(255) COLLATE utf8mb3_danish_ci DEFAULT NULL,
  `proj_city` varchar(255) COLLATE utf8mb3_danish_ci DEFAULT NULL,
  `structure_type_id` int DEFAULT NULL,
  `occ_classified` varchar(100) CHARACTER SET utf8mb3 DEFAULT NULL,
  `units` int DEFAULT NULL,
  `total_floor_area` decimal(10,2) DEFAULT NULL,
  `lot_area` decimal(10,2) DEFAULT NULL,
  `total_estimated_cost` decimal(10,2) DEFAULT NULL,
  `proposed_date_cons` date DEFAULT NULL,
  `expected_date_comp` date DEFAULT NULL,
  `engineer_id` int DEFAULT '0' COMMENT 'user_id',
  `signed_date` date DEFAULT NULL,
  `prc_no` varchar(100) CHARACTER SET utf8mb3 DEFAULT NULL,
  `ptr_no` varchar(100) CHARACTER SET utf8mb3 DEFAULT NULL,
  `issued_at` datetime DEFAULT NULL,
  `validity` date DEFAULT NULL,
  `date_issued` date DEFAULT NULL,
  `is_registered` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_danish_ci;

/*Table structure for table `audit` */

DROP TABLE IF EXISTS `audit`;

CREATE TABLE `audit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `table_name` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci DEFAULT NULL,
  `table_value` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

/*Table structure for table `documents` */

DROP TABLE IF EXISTS `documents`;

CREATE TABLE `documents` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `request_id` int DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

/*Table structure for table `electronic_fees` */

DROP TABLE IF EXISTS `electronic_fees`;

CREATE TABLE `electronic_fees` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `desc` text,
  `amount` decimal(10,2) DEFAULT '0.00',
  `per` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

/*Table structure for table `positions` */

DROP TABLE IF EXISTS `positions`;

CREATE TABLE `positions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

/*Table structure for table `positions_status` */

DROP TABLE IF EXISTS `positions_status`;

CREATE TABLE `positions_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `position_id` int DEFAULT NULL,
  `status_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

/*Table structure for table `project_types` */

DROP TABLE IF EXISTS `project_types`;

CREATE TABLE `project_types` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `is_with_free_text` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

/*Table structure for table `questions` */

DROP TABLE IF EXISTS `questions`;

CREATE TABLE `questions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf32;

/*Table structure for table `request_logs` */

DROP TABLE IF EXISTS `request_logs`;

CREATE TABLE `request_logs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `applicant_id` int DEFAULT NULL,
  `request_id` int DEFAULT NULL,
  `status_id` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `requests` */

DROP TABLE IF EXISTS `requests`;

CREATE TABLE `requests` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `applicant_id` int DEFAULT NULL COMMENT 'user_id',
  `remarks` text,
  `is_new` tinyint(1) DEFAULT '1',
  `is_submitted` tinyint(1) DEFAULT '0',
  `is_approved` tinyint(1) DEFAULT '1',
  `updated_by` int DEFAULT '0',
  `updated_remarks` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `module` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

/*Table structure for table `statuses` */

DROP TABLE IF EXISTS `statuses`;

CREATE TABLE `statuses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

/*Table structure for table `structure_types` */

DROP TABLE IF EXISTS `structure_types`;

CREATE TABLE `structure_types` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `is_with_free_text` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `province` varchar(50) DEFAULT NULL,
  `region` varchar(50) DEFAULT NULL,
  `zip_code` int DEFAULT NULL,
  `position_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

/*Table structure for table `users_auth` */

DROP TABLE IF EXISTS `users_auth`;

CREATE TABLE `users_auth` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `role_id` int DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `pass_hash` varchar(255) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

/*Table structure for table `users_log` */

DROP TABLE IF EXISTS `users_log`;

CREATE TABLE `users_log` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `role_id` int DEFAULT NULL,
  `agent` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
