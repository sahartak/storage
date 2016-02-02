CREATE DATABASE `map2`;
CREATE TABLE `country` (
  `id` varchar(5) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;
CREATE TABLE `data_mcdonalds2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lng` double NOT NULL,
  `lat` double NOT NULL,
  `address` varchar(256) NOT NULL,
  `city` varchar(64) DEFAULT NULL,
  `region` varchar(32) DEFAULT NULL,
  `postalcode` varchar(20) DEFAULT NULL,
  `phone_1` varchar(20) DEFAULT NULL,
  `cosRadLat` double DEFAULT NULL,
  `radLon` double DEFAULT NULL,
  `sinRadLat` double DEFAULT NULL,
  `store_pic` varchar(256) DEFAULT NULL,
  `store_name` varchar(32) DEFAULT NULL,
  `operation_hours` varchar(256) DEFAULT NULL,
  `description` varchar(64) DEFAULT NULL,
  `country` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `data_mcdonalds_idx1` (`lng`) USING BTREE,
  KEY `data_mcdonalds_idx2` (`lat`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9263 DEFAULT CHARSET=utf8;
CREATE TABLE `region` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

CREATE TABLE `user_settings` (
  `user_id` int(11) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  `added_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '0',
  `store_name` varchar(150) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `region` varchar(45) DEFAULT NULL,
  `postal_code` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



