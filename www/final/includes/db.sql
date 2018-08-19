

-- ************************************** `severity_id`

CREATE TABLE `severity_id`
(
 `severity_type_id` INT NOT NULL AUTO_INCREMENT ,
 `severity_type`    VARCHAR(256) NOT NULL ,

PRIMARY KEY (`severity_type_id`)
);





-- ************************************** `remedy_types`

CREATE TABLE `remedy_types`
(
 `remedy_id`   INT NOT NULL AUTO_INCREMENT ,
 `remedy_type` VARCHAR(256) NOT NULL ,

PRIMARY KEY (`remedy_id`)
);





-- ************************************** `migraine_location`

CREATE TABLE `migraine_location`
(
 `location_id`   INT NOT NULL AUTO_INCREMENT ,
 `location_name` VARCHAR(256) NOT NULL ,

PRIMARY KEY (`location_id`)
);





-- ************************************** `user`

CREATE TABLE `user`
(
  `user_id`       int(11) NOT NULL,
  `first_name`    varchar(256) NOT NULL,
  `last_name`     varchar(256) NOT NULL,
  `email`         varchar(256) NOT NULL,
  `password`      varchar(256) NOT NULL,
  `password_salt` varchar(256) NOT NULL,
  `password_hash` varchar(256) NOT NULL,
  `created_at`    datetime DEFAULT CURRENT_TIMESTAMP,
  `user_type`     varchar(50) DEFAULT NULL,

PRIMARY KEY (`user_id`)
);





-- ************************************** `user_types`

CREATE TABLE `user_types`
(
 `user_type_id` INT NOT NULL AUTO_INCREMENT ,
 `user_id`      INTEGER NOT NULL ,
 `user_type`    VARCHAR(256) NOT NULL ,

PRIMARY KEY (`user_type_id`, `user_id`),
KEY `fkIdx_99` (`user_id`),
CONSTRAINT `FK_99` FOREIGN KEY `fkIdx_99` (`user_id`) REFERENCES `user` (`user_id`)
);





-- ************************************** `migraine`
CREATE TABLE `migraine`
(
  `migraine_id` int(11) NOT NULL,
  `location_id` int(11) DEFAULT NULL,
  `severity_type_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime DEFAULT NULL,
  `location` varchar(256) DEFAULT NULL,
  `weather` varchar(256) DEFAULT NULL,
  `duration` varchar(256) DEFAULT NULL,
  `severity` varchar(256) DEFAULT NULL,
  `remedy` varchar(256) DEFAULT NULL,
  `notes` varchar(2048) DEFAULT NULL,

PRIMARY KEY (`migraine_id`, `user_id`),
KEY `fkIdx_47` (`user_id`),
CONSTRAINT `FK_47` FOREIGN KEY `fkIdx_47` (`user_id`) REFERENCES `user` (`user_id`),
KEY `fkIdx_62` (`location_id`),
CONSTRAINT `FK_62` FOREIGN KEY `fkIdx_62` (`location_id`) REFERENCES `migraine_location` (`location_id`),
KEY `fkIdx_142` (`severity_type_id`),
CONSTRAINT `FK_142` FOREIGN KEY `fkIdx_142` (`severity_type_id`) REFERENCES `severity_id` (`severity_type_id`)
);





-- ************************************** `remedy_taken`

CREATE TABLE `remedy_taken`
(
 `remedy_taken_id` INT NOT NULL AUTO_INCREMENT ,
 `migraine_id`     INTEGER NOT NULL ,
 `user_id`         INTEGER NOT NULL ,
 `remedy_id`       INTEGER NOT NULL ,
 `remedy_type_id`  INTEGER NOT NULL ,
 `remedy_time`     DATETIME NOT NULL ,

PRIMARY KEY (`remedy_taken_id`, `remedy_id`),
KEY `fkIdx_118` (`user_id`),
CONSTRAINT `FK_118` FOREIGN KEY `fkIdx_118` (`user_id`) REFERENCES `user` (`user_id`),
KEY `fkIdx_126` (`migraine_id`, `user_id`),
CONSTRAINT `FK_126` FOREIGN KEY `fkIdx_126` (`migraine_id`, `user_id`) REFERENCES `migraine` (`migraine_id`, `user_id`),
KEY `fkIdx_130` (`remedy_id`),
CONSTRAINT `FK_130` FOREIGN KEY `fkIdx_130` (`remedy_id`) REFERENCES `remedy_types` (`remedy_id`)
);
