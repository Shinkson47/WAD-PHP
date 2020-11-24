SET NAMES utf8mb4;
SET TIME_ZONE='+00:00';
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;

--
-- Create the user account
--
CREATE USER 'simpleuser'@'localhost' IDENTIFIED BY 'simplepass';
GRANT SELECT, INSERT ON simple_sums_db.* TO simpleuser@localhost;

--
-- Remove existing database, if any, and then create an empty database
--

DROP DATABASE IF EXISTS `simple_sums_db`;

CREATE DATABASE IF NOT EXISTS simple_sums_db COLLATE utf8_unicode_ci;

--
-- Table structure for table `user_data`
--

USE simple_sums_db;

DROP TABLE IF EXISTS `user_data`;

CREATE TABLE `user_data` (
  `auto_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_port` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_agent` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `calculation_type` char(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value1` int(10) unsigned NOT NULL,
  `value2` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`auto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

FLUSH PRIVILEGES;
