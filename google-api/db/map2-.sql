# SQL Manager Lite for MySQL 5.5.3.46192
# ---------------------------------------
# Host     : localhost
# Port     : 3306
# Database : map2




SET FOREIGN_KEY_CHECKS=0;

USE `map2`;

#
# Dropping database objects
#

DROP TABLE IF EXISTS `user_settings`;
DROP TABLE IF EXISTS `user_location`;
DROP TABLE IF EXISTS `store_info`;
DROP TABLE IF EXISTS `store_hours3`;
DROP TABLE IF EXISTS `store_hours2`;
DROP TABLE IF EXISTS `region`;
DROP TABLE IF EXISTS `data_mcdonalds2`;
DROP TABLE IF EXISTS `country`;

#
# Structure for the `country` table :
#

CREATE TABLE `country` (
  `id` VARCHAR(5) COLLATE utf8_general_ci NOT NULL,
  `name` VARCHAR(100) COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Structure for the `data_mcdonalds2` table :
#

CREATE TABLE `data_mcdonalds2` (
  `id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `lng` DOUBLE DEFAULT NULL,
  `lat` DOUBLE DEFAULT NULL,
  `address` VARCHAR(256) COLLATE utf8_general_ci DEFAULT NULL,
  `city` VARCHAR(64) COLLATE utf8_general_ci DEFAULT NULL,
  `region` VARCHAR(32) COLLATE utf8_general_ci DEFAULT NULL,
  `postalcode` VARCHAR(20) COLLATE utf8_general_ci DEFAULT NULL,
  `phone_1` VARCHAR(20) COLLATE utf8_general_ci DEFAULT NULL,
  `cosRadLat` DOUBLE DEFAULT NULL,
  `radLon` DOUBLE DEFAULT NULL,
  `sinRadLat` DOUBLE DEFAULT NULL,
  `store_pic` VARCHAR(256) COLLATE utf8_general_ci DEFAULT NULL,
  `store_name` VARCHAR(32) COLLATE utf8_general_ci DEFAULT NULL,
  `operation_hours` TEXT COLLATE utf8_general_ci,
  `description` VARCHAR(64) COLLATE utf8_general_ci DEFAULT NULL,
  `country` VARCHAR(5) COLLATE utf8_general_ci DEFAULT NULL,
  `street1` VARCHAR(200) COLLATE utf8_general_ci DEFAULT NULL,
  `street2` VARCHAR(100) COLLATE utf8_general_ci DEFAULT NULL,
  `work_contact` VARCHAR(45) COLLATE utf8_general_ci DEFAULT NULL,
  `home_contact` VARCHAR(45) COLLATE utf8_general_ci DEFAULT NULL,
  `mobile` VARCHAR(45) COLLATE utf8_general_ci DEFAULT NULL,
  `fax_no` VARCHAR(45) COLLATE utf8_general_ci DEFAULT NULL,
  `website` VARCHAR(255) COLLATE utf8_general_ci DEFAULT NULL,
  `status` INTEGER(2) UNSIGNED DEFAULT 1,
  `sun` CHAR(24) COLLATE utf8_general_ci DEFAULT NULL,
  `mon` CHAR(24) COLLATE utf8_general_ci DEFAULT NULL,
  `tue` CHAR(24) COLLATE utf8_general_ci DEFAULT NULL,
  `wed` CHAR(24) COLLATE utf8_general_ci DEFAULT NULL,
  `thu` CHAR(24) COLLATE utf8_general_ci DEFAULT NULL,
  `fri` CHAR(24) COLLATE utf8_general_ci DEFAULT NULL,
  `sat` CHAR(24) COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `data_mcdonalds_idx1` (`lng`) USING BTREE,
  KEY `data_mcdonalds_idx2` (`lat`) USING BTREE
) ENGINE=InnoDB
AUTO_INCREMENT=9283 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Structure for the `region` table :
#

CREATE TABLE `region` (
  `id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `region` VARCHAR(150) COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB
AUTO_INCREMENT=66 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Structure for the `store_hours2` table :
#

CREATE TABLE `store_hours2` (
  `id` INTEGER(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mon` CHAR(24) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tue` CHAR(24) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wed` CHAR(24) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thu` CHAR(24) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fri` CHAR(24) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sat` CHAR(24) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sun` CHAR(24) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `id` (`id`) USING BTREE
) ENGINE=InnoDB
AUTO_INCREMENT=1 CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci'
;

#
# Structure for the `store_hours3` table :
#

CREATE TABLE `store_hours3` (
  `id` INTEGER(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mon_open` TIME DEFAULT NULL,
  `mon_close` TIME(6) DEFAULT NULL,
  PRIMARY KEY (`id`) USING HASH,
  UNIQUE KEY `id` (`id`) USING HASH
) ENGINE=MEMORY
AUTO_INCREMENT=1 CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci'
;

#
# Structure for the `store_info` table :
#

CREATE TABLE `store_info` (
  `id` INTEGER(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `lng` DOUBLE DEFAULT NULL,
  `lat` DOUBLE DEFAULT NULL,
  `address` VARCHAR(256) COLLATE utf8_general_ci DEFAULT NULL,
  `city` VARCHAR(64) COLLATE utf8_general_ci DEFAULT NULL,
  `region` VARCHAR(32) COLLATE utf8_general_ci DEFAULT NULL,
  `postalcode` VARCHAR(20) COLLATE utf8_general_ci DEFAULT NULL,
  `phone_1` VARCHAR(20) COLLATE utf8_general_ci DEFAULT NULL,
  `cosRadLat` DOUBLE DEFAULT NULL,
  `radLon` DOUBLE DEFAULT NULL,
  `sinRadLat` DOUBLE DEFAULT NULL,
  `store_pic` VARCHAR(256) COLLATE utf8_general_ci DEFAULT NULL,
  `store_name` VARCHAR(32) COLLATE utf8_general_ci DEFAULT NULL,
  `operation_hours` TEXT COLLATE utf8_general_ci,
  `description` VARCHAR(64) COLLATE utf8_general_ci DEFAULT NULL,
  `country` VARCHAR(5) COLLATE utf8_general_ci DEFAULT NULL,
  `street1` VARCHAR(200) COLLATE utf8_general_ci DEFAULT NULL,
  `street2` VARCHAR(100) COLLATE utf8_general_ci DEFAULT NULL,
  `work_contact` VARCHAR(45) COLLATE utf8_general_ci DEFAULT NULL,
  `home_contact` VARCHAR(45) COLLATE utf8_general_ci DEFAULT NULL,
  `mobile` VARCHAR(45) COLLATE utf8_general_ci DEFAULT NULL,
  `fax_no` VARCHAR(45) COLLATE utf8_general_ci DEFAULT NULL,
  `website` VARCHAR(255) COLLATE utf8_general_ci DEFAULT NULL,
  `status` INTEGER(2) UNSIGNED DEFAULT 1,
  `sun` CHAR(24) COLLATE utf8_general_ci DEFAULT NULL,
  `mon` CHAR(24) COLLATE utf8_general_ci DEFAULT NULL,
  `tue` CHAR(24) COLLATE utf8_general_ci DEFAULT NULL,
  `wed` CHAR(24) COLLATE utf8_general_ci DEFAULT NULL,
  `thu` CHAR(24) COLLATE utf8_general_ci DEFAULT NULL,
  `fri` CHAR(24) COLLATE utf8_general_ci DEFAULT NULL,
  `sat` CHAR(24) COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `id` (`id`) USING BTREE
) ENGINE=InnoDB
AUTO_INCREMENT=9281 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Structure for the `user_location` table :
#

CREATE TABLE `user_location` (
  `id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `user_id` INTEGER(11) DEFAULT NULL,
  `added_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_primary` TINYINT(1) DEFAULT 0,
  `order` INTEGER(11) DEFAULT NULL,
  `status` INTEGER(2) UNSIGNED DEFAULT 1,
  `store_id` INTEGER(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB
AUTO_INCREMENT=93 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Structure for the `user_settings` table :
#

CREATE TABLE `user_settings` (
  `id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `user_id` INTEGER(11) DEFAULT NULL,
  `added_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_primary` TINYINT(1) DEFAULT 0,
  `order` INTEGER(11) DEFAULT NULL,
  `status` INTEGER(2) UNSIGNED DEFAULT 1,
  `store_id` INTEGER(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB
AUTO_INCREMENT=21 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

#
# Data for the `country` table  (LIMIT 0,500)
#

INSERT INTO `country` (`id`, `name`) VALUES
  ('AD','Andorra'),
  ('AE','United Arab Emirates'),
  ('AF','Afghanistan'),
  ('AG','Antigua and Barbuda'),
  ('AI','Anguilla'),
  ('AL','Albania'),
  ('AM','Armenia'),
  ('AN','Netherlands Antilles'),
  ('AO','Angola'),
  ('AQ','Antarctica'),
  ('AR','Argentina'),
  ('AS','American Samoa'),
  ('AT','Austria'),
  ('AU','Australia'),
  ('AW','Aruba'),
  ('AX','Åland Islands'),
  ('AZ','Azerbaijan'),
  ('BA','Bosnia and Herzegovina'),
  ('BB','Barbados'),
  ('BD','Bangladesh'),
  ('BE','Belgium'),
  ('BF','Burkina Faso'),
  ('BG','Bulgaria'),
  ('BH','Bahrain'),
  ('BI','Burundi'),
  ('BJ','Benin'),
  ('BL','Saint Barthélemy'),
  ('BM','Bermuda'),
  ('BN','Brunei'),
  ('BO','Bolivia'),
  ('BR','Brazil'),
  ('BS','Bahamas'),
  ('BT','Bhutan'),
  ('BV','Bouvet Island'),
  ('BW','Botswana'),
  ('BY','Belarus'),
  ('BZ','Belize'),
  ('CA','Canada'),
  ('CC','Cocos [Keeling] Islands'),
  ('CD','Congo - Kinshasa'),
  ('CF','Central African Republic'),
  ('CG','Congo - Brazzaville'),
  ('CH','Switzerland'),
  ('CI','Côte d’Ivoire'),
  ('CK','Cook Islands'),
  ('CL','Chile'),
  ('CM','Cameroon'),
  ('CN','China'),
  ('CO','Colombia'),
  ('CR','Costa Rica'),
  ('CU','Cuba'),
  ('CV','Cape Verde'),
  ('CX','Christmas Island'),
  ('CY','Cyprus'),
  ('CZ','Czech Republic'),
  ('DE','Germany'),
  ('DJ','Djibouti'),
  ('DK','Denmark'),
  ('DM','Dominica'),
  ('DO','Dominican Republic'),
  ('DZ','Algeria'),
  ('EC','Ecuador'),
  ('EE','Estonia'),
  ('EG','Egypt'),
  ('EH','Western Sahara'),
  ('ER','Eritrea'),
  ('ES','Spain'),
  ('ET','Ethiopia'),
  ('FI','Finland'),
  ('FJ','Fiji'),
  ('FK','Falkland Islands'),
  ('FM','Micronesia'),
  ('FO','Faroe Islands'),
  ('FR','France'),
  ('GA','Gabon'),
  ('GB','United Kingdom'),
  ('GD','Grenada'),
  ('GE','Georgia'),
  ('GF','French Guiana'),
  ('GG','Guernsey'),
  ('GH','Ghana'),
  ('GI','Gibraltar'),
  ('GL','Greenland'),
  ('GM','Gambia'),
  ('GN','Guinea'),
  ('GP','Guadeloupe'),
  ('GQ','Equatorial Guinea'),
  ('GR','Greece'),
  ('GS','South Georgia and the South Sandwich Islands'),
  ('GT','Guatemala'),
  ('GU','Guam'),
  ('GW','Guinea-Bissau'),
  ('GY','Guyana'),
  ('HK','Hong Kong SAR China'),
  ('HM','Heard Island and McDonald Islands'),
  ('HN','Honduras'),
  ('HR','Croatia'),
  ('HT','Haiti'),
  ('HU','Hungary'),
  ('ID','Indonesia'),
  ('IE','Ireland'),
  ('IL','Israel'),
  ('IM','Isle of Man'),
  ('IN','India'),
  ('IO','British Indian Ocean Territory'),
  ('IQ','Iraq'),
  ('IR','Iran'),
  ('IS','Iceland'),
  ('IT','Italy'),
  ('JE','Jersey'),
  ('JM','Jamaica'),
  ('JO','Jordan'),
  ('JP','Japan'),
  ('KE','Kenya'),
  ('KG','Kyrgyzstan'),
  ('KH','Cambodia'),
  ('KI','Kiribati'),
  ('KM','Comoros'),
  ('KN','Saint Kitts and Nevis'),
  ('KP','North Korea'),
  ('KR','South Korea'),
  ('KW','Kuwait'),
  ('KY','Cayman Islands'),
  ('KZ','Kazakhstan'),
  ('LA','Laos'),
  ('LB','Lebanon'),
  ('LC','Saint Lucia'),
  ('LI','Liechtenstein'),
  ('LK','Sri Lanka'),
  ('LR','Liberia'),
  ('LS','Lesotho'),
  ('LT','Lithuania'),
  ('LU','Luxembourg'),
  ('LV','Latvia'),
  ('LY','Libya'),
  ('MA','Morocco'),
  ('MC','Monaco'),
  ('MD','Moldova'),
  ('ME','Montenegro'),
  ('MF','Saint Martin'),
  ('MG','Madagascar'),
  ('MH','Marshall Islands'),
  ('MK','Macedonia'),
  ('ML','Mali'),
  ('MM','Myanmar [Burma]'),
  ('MN','Mongolia'),
  ('MO','Macau SAR China'),
  ('MP','Northern Mariana Islands'),
  ('MQ','Martinique'),
  ('MR','Mauritania'),
  ('MS','Montserrat'),
  ('MT','Malta'),
  ('MU','Mauritius'),
  ('MV','Maldives'),
  ('MW','Malawi'),
  ('MX','Mexico'),
  ('MY','Malaysia'),
  ('MZ','Mozambique'),
  ('NA','Namibia'),
  ('NC','New Caledonia'),
  ('NE','Niger'),
  ('NF','Norfolk Island'),
  ('NG','Nigeria'),
  ('NI','Nicaragua'),
  ('NL','Netherlands'),
  ('NO','Norway'),
  ('NP','Nepal'),
  ('NR','Nauru'),
  ('NU','Niue'),
  ('NZ','New Zealand'),
  ('OM','Oman'),
  ('PA','Panama'),
  ('PE','Peru'),
  ('PF','French Polynesia'),
  ('PG','Papua New Guinea'),
  ('PH','Philippines'),
  ('PK','Pakistan'),
  ('PL','Poland'),
  ('PM','Saint Pierre and Miquelon'),
  ('PN','Pitcairn Islands'),
  ('PR','Puerto Rico'),
  ('PS','Palestinian Territories'),
  ('PT','Portugal'),
  ('PW','Palau'),
  ('PY','Paraguay'),
  ('QA','Qatar'),
  ('RE','Réunion'),
  ('RO','Romania'),
  ('RS','Serbia'),
  ('RU','Russia'),
  ('RW','Rwanda'),
  ('SA','Saudi Arabia'),
  ('SB','Solomon Islands'),
  ('SC','Seychelles'),
  ('SD','Sudan'),
  ('SE','Sweden'),
  ('SG','Singapore'),
  ('SH','Saint Helena'),
  ('SI','Slovenia'),
  ('SJ','Svalbard and Jan Mayen'),
  ('SK','Slovakia'),
  ('SL','Sierra Leone'),
  ('SM','San Marino'),
  ('SN','Senegal'),
  ('SO','Somalia'),
  ('SR','Suriname'),
  ('ST','São Tomé and Príncipe'),
  ('SV','El Salvador'),
  ('SY','Syria'),
  ('SZ','Swaziland'),
  ('TC','Turks and Caicos Islands'),
  ('TD','Chad'),
  ('TF','French Southern Territories'),
  ('TG','Togo'),
  ('TH','Thailand'),
  ('TJ','Tajikistan'),
  ('TK','Tokelau'),
  ('TL','Timor-Leste'),
  ('TM','Turkmenistan'),
  ('TN','Tunisia'),
  ('TO','Tonga'),
  ('TR','Turkey'),
  ('TT','Trinidad and Tobago'),
  ('TV','Tuvalu'),
  ('TW','Taiwan'),
  ('TZ','Tanzania'),
  ('UA','Ukraine'),
  ('UG','Uganda'),
  ('UM','U.S. Minor Outlying Islands'),
  ('US','selected=\"selected\">United States'),
  ('UY','Uruguay'),
  ('UZ','Uzbekistan'),
  ('VA','Vatican City'),
  ('VC','Saint Vincent and the Grenadines'),
  ('VE','Venezuela'),
  ('VG','British Virgin Islands'),
  ('VI','U.S. Virgin Islands'),
  ('VN','Vietnam'),
  ('VU','Vanuatu'),
  ('WF','Wallis and Futuna'),
  ('WS','Samoa'),
  ('YE','Yemen'),
  ('YT','Mayotte'),
  ('ZA','South Africa'),
  ('ZM','Zambia'),
  ('ZW','Zimbabwe');

#
# Data for the `data_mcdonalds2` table  (LIMIT 0,500)
#

INSERT INTO `data_mcdonalds2` (`id`, `lng`, `lat`, `address`, `city`, `region`, `postalcode`, `phone_1`, `cosRadLat`, `radLon`, `sinRadLat`, `store_pic`, `store_name`, `operation_hours`, `description`, `country`, `street1`, `street2`, `work_contact`, `home_contact`, `mobile`, `fax_no`, `website`, `status`, `sun`, `mon`, `tue`, `wed`, `thu`, `fri`, `sat`) VALUES
  (8871,-73.90165,40.8837,'5765 Broadway','Bronx','43','10001','(212) 555-1001',0.7560397049201084,-1.2898271151564675,0.6545257554782052,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','5765 Broadway',NULL,NULL,NULL,NULL,NULL,NULL,2,'','','','','','',''),
  (9146,-74.01228370000001,40.7029581,'1560 Broadway','Manhattan','43','10001','(212) 555-1001',0.7574646617741722,-1.2912770823391468,0.65287616449319,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','6 water street','',NULL,NULL,NULL,NULL,NULL,2,'','','','','','',''),
  (9147,-73.950572,40.826617,'3543 49 Broadway','Manhattan','43','10001','(212) 555-1001',0.7566914246360652,-1.290680965133128,0.6537721987682269,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','3543 49 Broadway',NULL,NULL,NULL,NULL,NULL,NULL,2,'','','','','','',''),
  (9148,-73.986806,40.750863,'972 6th Ave','Manhattan','43','10001','(212) 555-1001',0.7575551523057567,-1.2913133677342958,0.652771162977503,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','972 6th Ave',NULL,NULL,NULL,NULL,NULL,NULL,2,'','','','','','',''),
  (9149,-73.993015,40.752521,'490  8th Ave','Manhattan','43','10001','(212) 555-1001',0.7575362623845368,-1.291421735227552,0.6527930845011045,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','490  8th Ave',NULL,NULL,NULL,NULL,NULL,NULL,2,'','','','','','',''),
  (9150,-74.006099,40.71443,'809/811 6th Ave/28th','Manhattan','43','10001','(212) 555-1001',0.7579700805132459,-1.2916500941068831,0.6522893200465141,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','809/811 6th Ave/28th',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9151,-73.98367,40.76221,'1651 Broadway','Manhattan','43','10001','(212) 555-1001',0.7574258610109109,-1.2912586342089531,0.6529211782994025,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','1651 Broadway',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9152,-73.98005,40.73738,'336 E 23rd St','Manhattan','43','10001','(212) 555-1001',0.757708743229505,-1.2911954532900312,0.6525928749485119,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','336 E 23rd St',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9153,-73.9779,40.75623,'14 E 47th St','Manhattan','43','10001','(212) 555-1001',0.7574940027187937,-1.2911579287111132,0.6528421216841482,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','14 E 47th St',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9154,-73.97364,40.74812,'729 2nd Ave/39th St','Manhattan','43','10001','(212) 555-1001',0.7575864024532148,-1.2910835776849783,0.6527348947451758,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','729 2nd Ave/39th St',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9155,-73.97002,40.78961,'638 Columbus Ave','Manhattan','43','10001','(212) 555-1001',0.7571135343069267,-1.291020396766056,0.6532833199839668,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','638 Columbus Ave',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9156,-73.99696,40.74765,'335 8th Ave','Manhattan','43','10001','(212) 555-1001',0.7575917568430621,-1.2914905884665433,0.6527286802059816,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','335 8th Ave',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9157,-73.92719,40.86512,'208 Dyckman St','Manhattan','43','10001','(212) 555-1001',0.7562519161998194,-1.2902728722474268,0.6542805508679754,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','208 Dyckman St',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9195,-73.98592,40.72649,'102 1st Ave','Manhattan','43','10001','(212) 555-1001',0.7578327654919551,-1.2912979041171229,0.6524488482224605,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','102 1st Ave',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9196,-73.98824,40.71873,'114 Delancey St','Manhattan','43','10001','(212) 555-1001',0.7579211246145707,-1.2913383957557694,0.6523462032256985,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','114 Delancey St',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9197,-74.001914,40.649906,'1188 6th Ave','Manhattan','43','10001','(212) 555-1001',0.7587041794109617,-1.291577052077687,0.651435313860355,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','1188 6th Ave',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9199,-73.95724,40.76593,'1286 1st Ave','Manhattan','43','10001','(212) 555-1001',0.7573834676920471,-1.290797343687651,0.6529703537426258,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','1286 1st Ave',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9200,-73.741877,40.668428,'139th & Adam Clayton Powell','Manhattan','43','10001','(212) 555-1001',0.7584935503526594,-1.2870385502506785,0.6516805460295848,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','139th & Adam Clayton Powell',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9202,-73.95458,40.77773,'1499 3rd Ave & 85th St','Manhattan','43','10001','(212) 555-1001',0.7572489731362441,-1.2907509179295482,0.6531263221491719,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','1499 3rd Ave & 85th St',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9203,-73.98927,40.75058,'151 W 34th St','Manhattan','43','10001','(212) 555-1001',0.7575583765172298,-1.291356372647065,0.6527674211911768,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','151 W 34th St',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9204,-73.99747,40.74184,'154 W 14th & 7th Ave','Manhattan','43','10001','(212) 555-1001',0.757657942005184,-1.2914994896457286,0.652651854296354,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','154 W 14th & 7th Ave',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9205,-74.01012,40.70938,'160 Broadway','Manhattan','43','10001','(212) 555-1001',0.7580275697803915,-1.2917202737961058,0.6522225106915842,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','160 Broadway',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9206,-74.01057,40.71628,'167 Chambers St','Manhattan','43','10001','(212) 555-1001',0.7579490186149633,-1.2917281277777397,0.6523137934925292,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','167 Chambers St',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9207,-73.98024,40.75306,'18 E 42nd St','Manhattan','43','10001','(212) 555-1001',0.7575301213145298,-1.2911987694156097,0.6528002108617872,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','18 E 42nd St',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9210,-73.94608,40.78992,'1872 3rd Ave','Manhattan','43','10001','(212) 555-1001',0.7571099996929316,-1.2906025649431285,0.6532874163528402,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','1872 3rd Ave',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9211,-73.94283,40.79382,'1997 3rd Ave','Manhattan','43','10001','(212) 555-1001',0.7570655300751621,-1.2905458417424387,0.6533389496823327,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','1997 3rd Ave',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9212,-73.98236,40.77755,'2049 Broadway','Manhattan','43','10001','(212) 555-1001',0.7572510249893628,-1.291235770395752,0.6531239431781378,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','2049 Broadway',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9213,-74.0052,40.72867,'208 Varick St','Manhattan','43','10001','(212) 555-1001',0.7578079404537045,-1.2916344035969076,0.6524776819059137,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','208 Varick St',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9214,-73.98924,40.71284,'213 Madison St','Manhattan','43','10001','(212) 555-1001',0.7579881817295194,-1.2913558490482893,0.6522682855684285,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','213 Madison St',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9215,-73.94893,40.80938,'215 W 125th St','Manhattan','43','10001','(212) 555-1001',0.756888072789885,-1.2906523068268105,0.6535445243198154,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','215 W 125th St',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9216,-73.98779,40.75624,'220 W 42nd St','Manhattan','43','10001','(212) 555-1001',0.7574938887763369,-1.2913305417741354,0.6528422538917824,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','220 W 42nd St',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9217,-73.979,40.78559,'2271 Broadway','Manhattan','43','10001','(212) 555-1001',0.7571593682617789,-1.2911771273328851,0.6532301975976187,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','2271 Broadway',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9218,-73.97231,40.79439,'2549 Broadway','Manhattan','43','10001','(212) 555-1001',0.7570590303756908,-1.2910603648059265,0.6533464812231095,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','2549 Broadway',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9219,-73.993018,40.7232456,'26 Bowery','Manhattan','NY','10001','(212) 555-1001',0.757964160491948,-1.29149215926287,0.6522961991378889,'download.jpg','Brooklyn Store name 2v','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','260 Bowery','',NULL,NULL,NULL,NULL,NULL,2,'closed','closed','closed','closed','closed','closed','closed'),
  (9220,-74.00105,40.71862,'262 Canal St','Manhattan','43','10001','(212) 555-1001',0.757922377027976,-1.29156197243295,0.6523447481203958,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','262 Canal St',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9221,-73.98962,40.72973,'27 3rd Ave & St Marks Pl','Manhattan','43','10001','(212) 555-1001',0.7577958691671426,-1.2913624812994469,0.65249170161253,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','27 3rd Ave & St Marks Pl',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9222,-73.967846,40.79998,'2726 Broadway','Manhattan','43','10001','(212) 555-1001',0.7569952837385292,-1.2909824533081176,0.6534203397489428,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','2726 Broadway',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9223,-73.98038,40.75147,'280 Madison Ave','Manhattan','43','10001','(212) 555-1001',0.7575482367085684,-1.2912012128765624,0.6527791885926961,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','280 Madison Ave',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9224,-74.00516,40.71563,'317 Broadway','Manhattan','43','10001','(212) 555-1001',0.7579564188314329,-1.2916337054652067,0.6523051947916936,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','317 Broadway',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9225,-73.98471,40.74796,'341 5th Ave','Manhattan','43','10001','(212) 555-1001',0.75758822522995,-1.2912767856331742,0.652732779162296,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','341 5th Ave',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9226,-73.95318,40.82225,'3410 Broadway 138th St','Manhattan','43','10001','(212) 555-1001',0.7567412519930284,-1.2907264833200203,0.6537145229624503,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','3410 Broadway 138th St',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9227,-73.95293,40.81075,'354 W 125th St','Manhattan','43','10001','(212) 555-1001',0.7568724456633681,-1.2907221199968901,0.6535626220918328,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','354 W 125th St',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9228,-73.99077,40.73669,'39 Union Sq W','Manhattan','43','10001','(212) 555-1001',0.7577166022016567,-1.2913825525858447,0.652583749987675,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','39 Union Sq W',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9229,-73.98398,40.74316,'401 Park Ave S','Manhattan','43','10001','(212) 555-1001',0.7576429057847968,-1.2912640447296344,0.6526693093090632,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','401 Park Ave S',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9230,-73.98248,40.73117,'404 E 14th St','Manhattan','43','10001','(212) 555-1001',0.7577794700227213,-1.2912378647908545,0.6525107468939372,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','404 E 14th St',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9231,-73.982786,40.669271,'405 6th Ave','Manhattan','43','10001','(212) 555-1001',0.7584839620128407,-1.2912432054983656,0.6516917057699165,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','405 6th Ave',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9232,-73.93592,40.85012,'4259 Broadway','Manhattan','43','10001','(212) 555-1001',0.7564231805291844,-1.2904252394911258,0.6540825421597131,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"5:30 2\",\"break_start\":\"1:30 2\",\"break_end\":\"2:30 2\"},\"tue\":{\"status\":\"Opened\",\"open\":\"06:30 1\",\"close\":\"5:30 2\",\"break_start\":\"1:30 2\",\"break_end\":\"2:30 2\"},\"wed\":{\"status\":\"Opened\",\"open\":\"7:30 1\",\"close\":\"6:30 2\",\"break_start\":null,\"break_end\":null},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','4259 Broadway',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9233,-73.99946,40.75443,'427 10th Ave & 34th','Manhattan','43','10001','(212) 555-1001',0.7575145119851163,-1.2915342216978432,0.6528183239860467,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','427 10th Ave & 34th',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9234,-73.984134,40.663558,'429 7th Ave','Manhattan','43','10001','(212) 555-1001',0.7585489388524348,-1.2912667325366824,0.6516160735938341,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','429 7th Ave',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9235,-73.942034,40.812221,'444 Lenox Ave @ 132nd','Manhattan','43','10001','(212) 555-1001',0.75685566598226,-1.290531948921593,0.6535820536631569,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','444 Lenox Ave @ 132nd',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9236,-73.97468,40.75304,'451 Lexington Ave','Manhattan','43','10001','(212) 555-1001',0.7575303491847443,-1.291101729109199,0.6527999464338515,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','451 Lexington Ave',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9237,-74.00481,40.70826,'52 Fulton St','Manhattan','43','10001','(212) 555-1001',0.7580403190774642,-1.2916275968128248,0.6522076928808309,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','52 Fulton St',NULL,NULL,NULL,NULL,NULL,NULL,2,'closed','11111101111000000','closed','closed','closed','closed','closed'),
  (9238,-73.909695,40.874817,'5201 Broadway @ 225th','Manhattan','43','10001','(212) 555-1001',0.75614117193397,-1.2899675268947903,0.6544085330329383,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','5201 Broadway @ 225th',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9239,-73.99672,40.7378,'541 6th Ave & 14th St','Manhattan','43','10001','(212) 555-1001',0.7577039594535234,-1.2914863996763384,0.6525984292261615,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','541 6th Ave & 14th St',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9240,-73.98808,40.75468,'556 7th Ave','Manhattan','43','10001','(212) 555-1001',0.7575116635206126,-1.291335603228966,0.6528216292604238,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','556 7th Ave',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9242,-74.01411827514647,40.71054762727025,'6 Water St','Manhattan','43','10001','(212) 555-1001',0.7581016710183109,-1.2917571002433228,0.6521363786810583,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Closed\"},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','6 Water St','',NULL,NULL,NULL,NULL,NULL,2,'closed','closed','closed','closed','closed','closed','closed'),
  (9243,-73.95853,40.8158,'600 W 125th St','Manhattan','43','10001','(212) 555-1001',0.7568148382844602,-1.2908198584350017,0.6536293296299259,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','600 W 125th St',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9244,-73.92124,40.86744,'608 W 207th St','Manhattan','43','10001','(212) 555-1001',0.7562254226882226,-1.290169025156933,0.6543111722109131,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','608 W 207th St',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9245,-73.99332,40.74191,'686 6th Ave','Manhattan','43','10001','(212) 555-1001',0.7576571446399577,-1.2914270584817706,0.6526527799496652,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','686 6th Ave',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9246,-73.98892,40.75816,'688 8th Ave','Manhattan','43','10001','(212) 555-1001',0.7574720113971234,-1.2913502639946828,0.6528676373890776,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','688 8th Ave',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9247,-73.99332,40.72925,'724 Broadway','Manhattan','43','10001','(212) 555-1001',0.7578013354422469,-1.2914270584817706,0.6524853530938048,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','724 Broadway',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9248,-73.98924,40.76336,'735 9th Ave','Manhattan','43','10001','(212) 555-1001',0.7574127558903799,-1.2913558490482893,0.6529363806792663,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','735 9th Ave',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9250,-73.94449,40.80752,'79 W 125th St','Manhattan','43','10001','(212) 555-1001',0.7569092884880458,-1.2905748142080218,0.6535199530240222,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','79 W 125th St',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9251,-73.97073,40.75615,'824 3rd Ave 50th St ','Manhattan','43','10001','(212) 555-1001',0.7574949142576168,-1.2910327886037452,0.652841064022359,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','824 3rd Ave 50th St ',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9253,-73.98334,40.76591,'946 8th Ave & 56th','Manhattan','43','10001','(212) 555-1001',0.7573836956216528,-1.2912528746224217,0.6529700893658817,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','946 8th Ave & 56th',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9254,-73.96712,40.76087,'966 3rd Ave','Manhattan','43','10001','(212) 555-1001',0.7574411309403498,-1.290969782217748,0.6529034638901863,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','966 3rd Ave',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9255,-73.96481,40.756,'969 1st Ave','Manhattan','43','10001','(212) 555-1001',0.7574966233889299,-1.290929465112027,0.6528390809030735,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','969 1st Ave',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9256,-73.9916,40.74969,'Penn Station/Lower Level','Manhattan','43','10001','(212) 555-1001',0.7575685161431017,-1.2913970388186364,0.6527556536321527,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','Penn Station/Lower Level',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9258,-74.0006,40.73051,'136 W 3rd St','Manhattan','43','10001','(212) 555-1001',0.7577869863566646,-1.291554118451316,0.6525020178577873,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','136 W 3rd St',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9259,-73.9397,40.79858,'2142 3rd Ave','Manhattan','43','10001','(212) 555-1001',0.7570112495834048,-1.2904912129368513,0.6534018426697097,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','2142 3rd Ave',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9260,-73.94432,40.83438,'3794 Broadway','Manhattan','43','10001','(212) 555-1001',0.756602838154587,-1.2905718471482934,0.6538747168199914,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','3794 Broadway',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9261,-73.939111,40.842518,'4040 Broadway & 170','Manhattan','43','10001','(212) 555-1001',0.7565099574966424,-1.290480932947557,0.6539821742283412,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','4040 Broadway & 170',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9262,-73.97894,40.74487,'480 3rd Ave & 33rd St','Manhattan','43','10001','(212) 555-1001',0.7576234264468515,-1.2911760801353338,0.6526919209695582,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','480 3rd Ave & 33rd St',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9263,-73.99563254643556,40.782294115998255,'','ny','ny','10004',NULL,NULL,NULL,NULL,NULL,'Hetauda Org','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}',NULL,'us','6 water street','brooklyn',NULL,NULL,NULL,NULL,NULL,2,'','','','','','',''),
  (9265,-74.01625298906242,40.745494780292,NULL,'kathmandu','kathmandu','44600',NULL,NULL,NULL,NULL,NULL,NULL,'{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}',NULL,'Nepal','maitidevi','',NULL,NULL,NULL,NULL,NULL,2,'','','','','','',''),
  (9266,83.99558789999992,28.237987,NULL,'Pokhara','kaski','33700',NULL,NULL,NULL,NULL,NULL,NULL,'{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}',NULL,'Nepal','Ganeshtol','4',NULL,NULL,NULL,NULL,NULL,2,'','','','','','',''),
  (9267,-74.01521707690426,40.75175192493697,NULL,'Manhattan','NY','10001',NULL,NULL,NULL,NULL,NULL,NULL,'{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}',NULL,'US','429 7th Ave','',NULL,NULL,NULL,NULL,NULL,2,'','','','','','',''),
  (9268,85.33494329999996,27.7051799,NULL,'kathmandu','kathmandu','44600',NULL,NULL,NULL,NULL,NULL,NULL,'{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}',NULL,'Nepal','maitidevi','',NULL,NULL,NULL,NULL,NULL,2,'','','','','','',''),
  (9269,85.34527800000001,27.6850439,NULL,'kathmandu','kathmandu','44600',NULL,NULL,NULL,NULL,NULL,NULL,'{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}',NULL,'Nepal','tinkune','subidhanagar',NULL,NULL,NULL,NULL,NULL,2,'','','','','','',''),
  (9270,85.34527800000001,27.6850439,NULL,'kathmandu','kathmandu','44600',NULL,NULL,NULL,NULL,NULL,NULL,'{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}',NULL,'Nepal','tinkune','subidhanagar',NULL,NULL,NULL,NULL,NULL,2,'','','','','','',''),
  (9271,85.34527800000001,27.6850439,NULL,'kathmandu','kathmandu','44600',NULL,NULL,NULL,NULL,NULL,NULL,'{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}',NULL,'Nepal','tinkune','subidhanagar',NULL,NULL,NULL,NULL,NULL,2,'','','','','','',''),
  (9272,85.34527800000001,27.6850439,NULL,'kathmandu','kathmandu','44600',NULL,NULL,NULL,NULL,NULL,NULL,'{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}',NULL,'Nepal','tinkune','subidhanagar',NULL,NULL,NULL,NULL,NULL,2,'','','','','','',''),
  (9273,-74.0256673474122,40.73827924306153,NULL,'kathmandu','kathmandu','44600',NULL,NULL,NULL,NULL,NULL,NULL,'{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}',NULL,'Nepal','tinkune','subidhanagar',NULL,NULL,NULL,NULL,NULL,2,'','','','','','',''),
  (9274,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Kantipur Publication','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,'closed','closed','closed','closed','closed','closed','closed'),
  (9275,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'My test Organization 2','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','  test 212',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,'closed','closed','closed','closed','closed','closed','closed'),
  (9276,85.33494329999996,27.7051799,NULL,'kathmandu','kathmandu','44600',NULL,NULL,NULL,NULL,NULL,'Test','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}',' Test','Nepal','maitidevi','','12345','','','','',2,'closed','11111101111000000','closed','closed','closed','closed','closed'),
  (9277,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Test 123','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,'closed','closed','closed','closed','closed','closed','closed'),
  (9278,85.34527800000001,27.6850439,NULL,'kathmandu','kathmandu','44600',NULL,NULL,NULL,NULL,NULL,'Kantipur Publication','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}',' This is test description!','Nepal','tinkune','subidhanagar','9856034616','','','','',2,'closed','closed','closed','closed','closed','closed','closed'),
  (9279,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,'closed','11111111111000000','closed','closed','closed','closed','closed'),
  (9280,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,'closed','11111111111000000','closed','closed','closed','closed','closed'),
  (9281,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
  (9282,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

#
# Data for the `region` table  (LIMIT 0,500)
#

INSERT INTO `region` (`id`, `region`) VALUES
  (1,'Alabama'),
  (2,'Alaska'),
  (3,'American Samoa'),
  (4,'Arizona'),
  (5,'Arkansas'),
  (6,'Armed Forces Africa'),
  (7,'Armed Forces Americas'),
  (8,'Armed Forces Canada'),
  (9,'Armed Forces Europe'),
  (10,'Armed Forces Middle East'),
  (11,'Armed Forces Pacific'),
  (12,'California'),
  (13,'Colorado'),
  (14,'Connecticut'),
  (15,'Delaware'),
  (16,'District of Columbia'),
  (17,'Federated States Of Micronesia'),
  (18,'Florida'),
  (19,'Georgia'),
  (20,'Guam'),
  (21,'Hawaii'),
  (22,'Idaho'),
  (23,'Illinois'),
  (24,'Indiana'),
  (25,'Iowa'),
  (26,'Kansas'),
  (27,'Kentucky'),
  (28,'Louisiana'),
  (29,'Maine'),
  (30,'Marshall Islands'),
  (31,'Maryland'),
  (32,'Massachusetts'),
  (33,'Michigan'),
  (34,'Minnesota'),
  (35,'Mississippi'),
  (36,'Missouri'),
  (37,'Montana'),
  (38,'Nebraska'),
  (39,'Nevada'),
  (40,'New Hampshire'),
  (41,'New Jersey'),
  (42,'New Mexico'),
  (43,'New York'),
  (44,'North Carolina'),
  (45,'North Dakota'),
  (46,'Northern Mariana Islands'),
  (47,'Ohio'),
  (48,'Oklahoma'),
  (49,'Oregon'),
  (50,'Palau'),
  (51,'Pennsylvania'),
  (52,'Puerto Rico'),
  (53,'Rhode Island'),
  (54,'South Carolina'),
  (55,'South Dakota'),
  (56,'Tennessee'),
  (57,'Texas'),
  (58,'Utah'),
  (59,'Vermont'),
  (60,'Virgin Islands'),
  (61,'Virginia'),
  (62,'Washington'),
  (63,'West Virginia'),
  (64,'Wisconsin'),
  (65,'Wyoming');

#
# Data for the `store_info` table  (LIMIT 0,500)
#

INSERT INTO `store_info` (`id`, `lng`, `lat`, `address`, `city`, `region`, `postalcode`, `phone_1`, `cosRadLat`, `radLon`, `sinRadLat`, `store_pic`, `store_name`, `operation_hours`, `description`, `country`, `street1`, `street2`, `work_contact`, `home_contact`, `mobile`, `fax_no`, `website`, `status`, `sun`, `mon`, `tue`, `wed`, `thu`, `fri`, `sat`) VALUES
  (8871,-73.90165,40.8837,'5765 Broadway','Bronx','43','10001','(212) 555-1001',0.7560397049201084,-1.2898271151564675,0.6545257554782052,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','5765 Broadway',NULL,NULL,NULL,NULL,NULL,NULL,2,'','','','','','',''),
  (9146,-74.01228370000001,40.7029581,'1560 Broadway','Manhattan','43','10001','(212) 555-1001',0.7574646617741722,-1.2912770823391468,0.65287616449319,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Closed\"},\"tue\":{\"status\":\"Opened\",\"open\":\"7:30 1\",\"close\":\"8:00 2\",\"break_start\":\"1:00 2\",\"break_end\":\"2:00 2\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','6 water street','',NULL,NULL,NULL,NULL,NULL,2,'closed','closed','closed','closed','closed','closed','closed'),
  (9147,-73.950572,40.826617,'3543 49 Broadway','Manhattan','43','10001','(212) 555-1001',0.7566914246360652,-1.290680965133128,0.6537721987682269,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','3543 49 Broadway',NULL,NULL,NULL,NULL,NULL,NULL,2,'','','','','','',''),
  (9148,-73.986806,40.750863,'972 6th Ave','Manhattan','43','10001','(212) 555-1001',0.7575551523057567,-1.2913133677342958,0.652771162977503,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','972 6th Ave',NULL,NULL,NULL,NULL,NULL,NULL,2,'','','','','','',''),
  (9149,-73.993015,40.752521,'490  8th Ave','Manhattan','43','10001','(212) 555-1001',0.7575362623845368,-1.291421735227552,0.6527930845011045,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','490  8th Ave',NULL,NULL,NULL,NULL,NULL,NULL,2,'','','','','','',''),
  (9150,-74.006099,40.71443,'809/811 6th Ave/28th','Manhattan','43','10001','(212) 555-1001',0.7579700805132459,-1.2916500941068831,0.6522893200465141,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','809/811 6th Ave/28th',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9151,-73.98367,40.76221,'1651 Broadway','Manhattan','43','10001','(212) 555-1001',0.7574258610109109,-1.2912586342089531,0.6529211782994025,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','1651 Broadway',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9152,-73.98005,40.73738,'336 E 23rd St','Manhattan','43','10001','(212) 555-1001',0.757708743229505,-1.2911954532900312,0.6525928749485119,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','336 E 23rd St',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9153,-73.9779,40.75623,'14 E 47th St','Manhattan','43','10001','(212) 555-1001',0.7574940027187937,-1.2911579287111132,0.6528421216841482,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','14 E 47th St',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9154,-73.97364,40.74812,'729 2nd Ave/39th St','Manhattan','43','10001','(212) 555-1001',0.7575864024532148,-1.2910835776849783,0.6527348947451758,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','729 2nd Ave/39th St',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9155,-73.97002,40.78961,'638 Columbus Ave','Manhattan','43','10001','(212) 555-1001',0.7571135343069267,-1.291020396766056,0.6532833199839668,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','638 Columbus Ave',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9156,-73.99696,40.74765,'335 8th Ave','Manhattan','43','10001','(212) 555-1001',0.7575917568430621,-1.2914905884665433,0.6527286802059816,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','335 8th Ave',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9157,-73.92719,40.86512,'208 Dyckman St','Manhattan','43','10001','(212) 555-1001',0.7562519161998194,-1.2902728722474268,0.6542805508679754,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','208 Dyckman St',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9195,-73.98592,40.72649,'102 1st Ave','Manhattan','43','10001','(212) 555-1001',0.7578327654919551,-1.2912979041171229,0.6524488482224605,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','102 1st Ave',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9196,-73.98824,40.71873,'114 Delancey St','Manhattan','43','10001','(212) 555-1001',0.7579211246145707,-1.2913383957557694,0.6523462032256985,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','114 Delancey St',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9197,-74.001914,40.649906,'1188 6th Ave','Manhattan','43','10001','(212) 555-1001',0.7587041794109617,-1.291577052077687,0.651435313860355,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','1188 6th Ave',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9199,-73.95724,40.76593,'1286 1st Ave','Manhattan','43','10001','(212) 555-1001',0.7573834676920471,-1.290797343687651,0.6529703537426258,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','1286 1st Ave',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9200,-73.741877,40.668428,'139th & Adam Clayton Powell','Manhattan','43','10001','(212) 555-1001',0.7584935503526594,-1.2870385502506785,0.6516805460295848,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','139th & Adam Clayton Powell',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9202,-73.95458,40.77773,'1499 3rd Ave & 85th St','Manhattan','43','10001','(212) 555-1001',0.7572489731362441,-1.2907509179295482,0.6531263221491719,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','1499 3rd Ave & 85th St',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9203,-74.01629400234378,40.747659981570436,'151 W 34th St','Manhattan','43','10001','(212) 555-1001',0.7575583765172298,-1.291356372647065,0.6527674211911768,'download.jpg','Demo Store name2','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}',' TEst description3','US','21 W 34th St','','1','2','3','4','5',2,'closed','closed','closed','closed','closed','closed','closed'),
  (9204,-73.99747,40.74184,'154 W 14th & 7th Ave','Manhattan','43','10001','(212) 555-1001',0.757657942005184,-1.2914994896457286,0.652651854296354,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','154 W 14th & 7th Ave',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9205,-74.03146970351565,40.66704253015391,'160 Broadway','Manhattan','43','10001','(212) 555-1001',0.7580275697803915,-1.2917202737961058,0.6522225106915842,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Closed\"},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','160 Broadway','',NULL,NULL,NULL,NULL,NULL,2,'closed','closed','closed','closed','closed','closed','closed'),
  (9206,-74.01057,40.71628,'167 Chambers St','Manhattan','43','10001','(212) 555-1001',0.7579490186149633,-1.2917281277777397,0.6523137934925292,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','167 Chambers St',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9207,-73.98024,40.75306,'18 E 42nd St','Manhattan','43','10001','(212) 555-1001',0.7575301213145298,-1.2911987694156097,0.6528002108617872,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','18 E 42nd St',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9210,-73.94608,40.78992,'1872 3rd Ave','Manhattan','43','10001','(212) 555-1001',0.7571099996929316,-1.2906025649431285,0.6532874163528402,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','1872 3rd Ave',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9211,-73.94283,40.79382,'1997 3rd Ave','Manhattan','43','10001','(212) 555-1001',0.7570655300751621,-1.2905458417424387,0.6533389496823327,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','1997 3rd Ave',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9212,-73.98236,40.77755,'2049 Broadway','Manhattan','43','10001','(212) 555-1001',0.7572510249893628,-1.291235770395752,0.6531239431781378,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','2049 Broadway',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9213,-74.0052,40.72867,'208 Varick St','Manhattan','43','10001','(212) 555-1001',0.7578079404537045,-1.2916344035969076,0.6524776819059137,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','208 Varick St',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9214,-73.98924,40.71284,'213 Madison St','Manhattan','43','10001','(212) 555-1001',0.7579881817295194,-1.2913558490482893,0.6522682855684285,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','213 Madison St',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9215,-73.94893,40.80938,'215 W 125th St','Manhattan','43','10001','(212) 555-1001',0.756888072789885,-1.2906523068268105,0.6535445243198154,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','215 W 125th St',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9216,-73.98779,40.75624,'220 W 42nd St','Manhattan','43','10001','(212) 555-1001',0.7574938887763369,-1.2913305417741354,0.6528422538917824,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','220 W 42nd St',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9217,-73.979,40.78559,'2271 Broadway','Manhattan','43','10001','(212) 555-1001',0.7571593682617789,-1.2911771273328851,0.6532301975976187,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','2271 Broadway',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9218,-73.97231,40.79439,'2549 Broadway','Manhattan','43','10001','(212) 555-1001',0.7570590303756908,-1.2910603648059265,0.6533464812231095,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','2549 Broadway',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9219,-73.993018,40.7232456,'26 Bowery','Manhattan','NY','10001','(212) 555-1001',0.757964160491948,-1.29149215926287,0.6522961991378889,'download.jpg','Brooklyn Store name v','{\"mon\":{\"status\":\"Closed\"},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','260 Bowery','',NULL,NULL,NULL,NULL,NULL,2,'closed','closed','closed','closed','closed','closed','closed'),
  (9220,-74.00105,40.71862,'262 Canal St','Manhattan','43','10001','(212) 555-1001',0.757922377027976,-1.29156197243295,0.6523447481203958,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','262 Canal St',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9221,-73.98962,40.72973,'27 3rd Ave & St Marks Pl','Manhattan','43','10001','(212) 555-1001',0.7577958691671426,-1.2913624812994469,0.65249170161253,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','27 3rd Ave & St Marks Pl',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9222,-73.967846,40.79998,'2726 Broadway','Manhattan','43','10001','(212) 555-1001',0.7569952837385292,-1.2909824533081176,0.6534203397489428,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','2726 Broadway',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9223,-73.98038,40.75147,'280 Madison Ave','Manhattan','43','10001','(212) 555-1001',0.7575482367085684,-1.2912012128765624,0.6527791885926961,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','280 Madison Ave',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9224,-74.00516,40.71563,'317 Broadway','Manhattan','43','10001','(212) 555-1001',0.7579564188314329,-1.2916337054652067,0.6523051947916936,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','317 Broadway',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9225,-73.98471,40.74796,'341 5th Ave','Manhattan','43','10001','(212) 555-1001',0.75758822522995,-1.2912767856331742,0.652732779162296,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','341 5th Ave',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9226,-73.95318,40.82225,'3410 Broadway 138th St','Manhattan','43','10001','(212) 555-1001',0.7567412519930284,-1.2907264833200203,0.6537145229624503,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','3410 Broadway 138th St',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9227,-73.95293,40.81075,'354 W 125th St','Manhattan','43','10001','(212) 555-1001',0.7568724456633681,-1.2907221199968901,0.6535626220918328,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','354 W 125th St',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9228,-73.99077,40.73669,'39 Union Sq W','Manhattan','43','10001','(212) 555-1001',0.7577166022016567,-1.2913825525858447,0.652583749987675,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','39 Union Sq W',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9229,-73.98398,40.74316,'401 Park Ave S','Manhattan','43','10001','(212) 555-1001',0.7576429057847968,-1.2912640447296344,0.6526693093090632,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','401 Park Ave S',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9230,-73.98248,40.73117,'404 E 14th St','Manhattan','43','10001','(212) 555-1001',0.7577794700227213,-1.2912378647908545,0.6525107468939372,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','404 E 14th St',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9231,-73.982786,40.669271,'405 6th Ave','Manhattan','43','10001','(212) 555-1001',0.7584839620128407,-1.2912432054983656,0.6516917057699165,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','405 6th Ave',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9232,-73.93592,40.85012,'4259 Broadway','Manhattan','43','10001','(212) 555-1001',0.7564231805291844,-1.2904252394911258,0.6540825421597131,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','4259 Broadway',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9233,-73.99946,40.75443,'427 10th Ave & 34th','Manhattan','43','10001','(212) 555-1001',0.7575145119851163,-1.2915342216978432,0.6528183239860467,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','427 10th Ave & 34th',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9234,-73.984134,40.663558,'429 7th Ave','Manhattan','43','10001','(212) 555-1001',0.7585489388524348,-1.2912667325366824,0.6516160735938341,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','429 7th Ave',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9235,-73.942034,40.812221,'444 Lenox Ave @ 132nd','Manhattan','43','10001','(212) 555-1001',0.75685566598226,-1.290531948921593,0.6535820536631569,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','444 Lenox Ave @ 132nd',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9236,-74.01840931401364,40.74392964600508,'451 Lexington Ave','Manhattan','ny','10001','(212) 555-1001',0.7575303491847443,-1.291101729109199,0.6527999464338515,'download.jpg','Demo Store name2','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:59 1\",\"close\":\"7:59 2\",\"break_start\":\": 2\",\"break_end\":\": 2\"},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}',' TEst description2','US','41 Lexington Ave','','1','2','3','4','5',2,'closed','closed','closed','closed','closed','closed','closed'),
  (9237,-74.00481,40.70826,'52 Fulton St','Manhattan','43','10001','(212) 555-1001',0.7580403190774642,-1.2916275968128248,0.6522076928808309,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','52 Fulton St',NULL,NULL,NULL,NULL,NULL,NULL,2,'closed','11111101111000000','closed','closed','closed','closed','closed'),
  (9238,-73.909695,40.874817,'5201 Broadway @ 225th','Manhattan','43','10001','(212) 555-1001',0.75614117193397,-1.2899675268947903,0.6544085330329383,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','5201 Broadway @ 225th',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9239,-73.99672,40.7378,'541 6th Ave & 14th St','Manhattan','43','10001','(212) 555-1001',0.7577039594535234,-1.2914863996763384,0.6525984292261615,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','541 6th Ave & 14th St',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9240,-73.98808,40.75468,'556 7th Ave','Manhattan','43','10001','(212) 555-1001',0.7575116635206126,-1.291335603228966,0.6528216292604238,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','556 7th Ave',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9242,-74.02537569218748,40.69421246458813,'6 Water St','Manhattan','43','10001','(212) 555-1001',0.7581016710183109,-1.2917571002433228,0.6521363786810583,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Closed\"},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','6 Water St','',NULL,NULL,NULL,NULL,NULL,2,'closed','closed','closed','closed','closed','closed','closed'),
  (9243,-73.95853,40.8158,'600 W 125th St','Manhattan','43','10001','(212) 555-1001',0.7568148382844602,-1.2908198584350017,0.6536293296299259,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','600 W 125th St',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9244,-73.92124,40.86744,'608 W 207th St','Manhattan','43','10001','(212) 555-1001',0.7562254226882226,-1.290169025156933,0.6543111722109131,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','608 W 207th St',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9245,-73.99332,40.74191,'686 6th Ave','Manhattan','43','10001','(212) 555-1001',0.7576571446399577,-1.2914270584817706,0.6526527799496652,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','686 6th Ave',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9246,-73.98892,40.75816,'688 8th Ave','Manhattan','43','10001','(212) 555-1001',0.7574720113971234,-1.2913502639946828,0.6528676373890776,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','688 8th Ave',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9247,-73.99332,40.72925,'724 Broadway','Manhattan','43','10001','(212) 555-1001',0.7578013354422469,-1.2914270584817706,0.6524853530938048,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','724 Broadway',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9248,-73.98924,40.76336,'735 9th Ave','Manhattan','43','10001','(212) 555-1001',0.7574127558903799,-1.2913558490482893,0.6529363806792663,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','735 9th Ave',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9250,-73.94449,40.80752,'79 W 125th St','Manhattan','43','10001','(212) 555-1001',0.7569092884880458,-1.2905748142080218,0.6535199530240222,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','79 W 125th St',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9251,-73.97073,40.75615,'824 3rd Ave 50th St ','Manhattan','43','10001','(212) 555-1001',0.7574949142576168,-1.2910327886037452,0.652841064022359,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','824 3rd Ave 50th St ',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9253,-73.98334,40.76591,'946 8th Ave & 56th','Manhattan','43','10001','(212) 555-1001',0.7573836956216528,-1.2912528746224217,0.6529700893658817,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','946 8th Ave & 56th',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9254,-73.96712,40.76087,'966 3rd Ave','Manhattan','43','10001','(212) 555-1001',0.7574411309403498,-1.290969782217748,0.6529034638901863,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','966 3rd Ave',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9255,-73.96481,40.756,'969 1st Ave','Manhattan','43','10001','(212) 555-1001',0.7574966233889299,-1.290929465112027,0.6528390809030735,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','969 1st Ave',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9256,-73.9916,40.74969,'Penn Station/Lower Level','Manhattan','43','10001','(212) 555-1001',0.7575685161431017,-1.2913970388186364,0.6527556536321527,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','Penn Station/Lower Level',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9258,-74.0006,40.73051,'136 W 3rd St','Manhattan','43','10001','(212) 555-1001',0.7577869863566646,-1.291554118451316,0.6525020178577873,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','136 W 3rd St',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9259,-73.9397,40.79858,'2142 3rd Ave','Manhattan','43','10001','(212) 555-1001',0.7570112495834048,-1.2904912129368513,0.6534018426697097,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','2142 3rd Ave',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9260,-73.94432,40.83438,'3794 Broadway','Manhattan','43','10001','(212) 555-1001',0.756602838154587,-1.2905718471482934,0.6538747168199914,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','3794 Broadway',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9261,-73.939111,40.842518,'4040 Broadway & 170','Manhattan','43','10001','(212) 555-1001',0.7565099574966424,-1.290480932947557,0.6539821742283412,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','4040 Broadway & 170',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9262,-73.97894,40.74487,'480 3rd Ave & 33rd St','Manhattan','43','10001','(212) 555-1001',0.7576234264468515,-1.2911760801353338,0.6526919209695582,'download.jpg','Demo Store name','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','TEst description','US','480 3rd Ave & 33rd St',NULL,NULL,NULL,NULL,NULL,NULL,1,'','','','','','',''),
  (9263,-73.99563254643556,40.782294115998255,'','ny','ny','10004',NULL,NULL,NULL,NULL,NULL,'Hetauda Org','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}',NULL,'us','6 water street','brooklyn',NULL,NULL,NULL,NULL,NULL,2,'','','','','','',''),
  (9265,-74.01625298906242,40.745494780292,NULL,'kathmandu','kathmandu','44600',NULL,NULL,NULL,NULL,NULL,NULL,'{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}',NULL,'Nepal','maitidevi','',NULL,NULL,NULL,NULL,NULL,2,'','','','','','',''),
  (9266,83.99558789999992,28.237987,NULL,'Pokhara','kaski','33700',NULL,NULL,NULL,NULL,NULL,NULL,'{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}',NULL,'Nepal','Ganeshtol','4',NULL,NULL,NULL,NULL,NULL,2,'','','','','','',''),
  (9267,-74.01521707690426,40.75175192493697,NULL,'Manhattan','NY','10001',NULL,NULL,NULL,NULL,NULL,NULL,'{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}',NULL,'US','429 7th Ave','',NULL,NULL,NULL,NULL,NULL,2,'','','','','','',''),
  (9268,85.33494329999996,27.7051799,NULL,'kathmandu','kathmandu','44600',NULL,NULL,NULL,NULL,NULL,NULL,'{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}',NULL,'Nepal','maitidevi','',NULL,NULL,NULL,NULL,NULL,2,'','','','','','',''),
  (9269,85.34527800000001,27.6850439,NULL,'kathmandu','kathmandu','44600',NULL,NULL,NULL,NULL,NULL,NULL,'{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}',NULL,'Nepal','tinkune','subidhanagar',NULL,NULL,NULL,NULL,NULL,2,'','','','','','',''),
  (9270,85.34527800000001,27.6850439,NULL,'kathmandu','kathmandu','44600',NULL,NULL,NULL,NULL,NULL,NULL,'{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}',NULL,'Nepal','tinkune','subidhanagar',NULL,NULL,NULL,NULL,NULL,2,'','','','','','',''),
  (9271,85.34527800000001,27.6850439,NULL,'kathmandu','kathmandu','44600',NULL,NULL,NULL,NULL,NULL,NULL,'{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}',NULL,'Nepal','tinkune','subidhanagar',NULL,NULL,NULL,NULL,NULL,2,'','','','','','',''),
  (9272,85.34527800000001,27.6850439,NULL,'kathmandu','kathmandu','44600',NULL,NULL,NULL,NULL,NULL,NULL,'{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}',NULL,'Nepal','tinkune','subidhanagar',NULL,NULL,NULL,NULL,NULL,2,'','','','','','',''),
  (9273,-74.0256673474122,40.73827924306153,NULL,'kathmandu','kathmandu','44600',NULL,NULL,NULL,NULL,NULL,NULL,'{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}',NULL,'Nepal','tinkune','subidhanagar',NULL,NULL,NULL,NULL,NULL,2,'','','','','','',''),
  (9274,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Kantipur Publication','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,'closed','closed','closed','closed','closed','closed','closed'),
  (9275,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'My test Organization 2','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}','  test 212',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,'closed','closed','closed','closed','closed','closed','closed'),
  (9276,85.33494329999996,27.7051799,NULL,'kathmandu','kathmandu','44600',NULL,NULL,NULL,NULL,NULL,'Test','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}',' Test','Nepal','maitidevi','','12345','','','','',2,'closed','11111101111000000','closed','closed','closed','closed','closed'),
  (9277,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Test 123','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,'closed','closed','closed','closed','closed','closed','closed'),
  (9278,85.34527800000001,27.6850439,NULL,'kathmandu','kathmandu','44600',NULL,NULL,NULL,NULL,NULL,'Kantipur Publication','{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}',' This is test description!','Nepal','tinkune','subidhanagar','9856034616','','','','',2,'closed','closed','closed','closed','closed','closed','closed'),
  (9279,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,'closed','11111111111000000','closed','closed','closed','closed','closed'),
  (9280,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'{\"mon\":{\"status\":\"Opened\",\"open\":\"7:00 1\",\"close\":\"7:00 2\",\"break_start\":null,\"break_end\":null},\"tue\":{\"status\":\"Closed\"},\"wed\":{\"status\":\"Closed\"},\"thu\":{\"status\":\"Closed\"},\"fri\":{\"status\":\"Closed\"},\"sat\":{\"status\":\"Closed\"},\"sun\":{\"status\":\"Closed\"}}',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,'closed','11111111111000000','closed','closed','closed','closed','closed');

#
# Data for the `user_location` table  (LIMIT 0,500)
#

INSERT INTO `user_location` (`id`, `user_id`, `added_date`, `is_primary`, `order`, `status`, `store_id`) VALUES
  (81,110011,'2016-01-06 15:09:59',0,7,1,9236),
  (85,110011,'2016-01-06 16:55:23',0,1,1,9205),
  (86,110011,'2016-01-08 14:20:49',0,6,1,9237),
  (88,110011,'2016-01-12 14:56:43',0,5,1,9225),
  (90,110011,'2016-01-12 19:56:27',0,4,1,9146),
  (91,110011,'2016-01-22 13:23:22',0,3,1,9207),
  (92,110011,'2016-01-28 22:34:58',0,2,1,9197);

#
# Data for the `user_settings` table  (LIMIT 0,500)
#

INSERT INTO `user_settings` (`id`, `user_id`, `added_date`, `is_primary`, `order`, `status`, `store_id`) VALUES
  (19,110011,'2016-01-15 02:07:31',0,NULL,1,9197);



