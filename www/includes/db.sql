

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
 `user_id`       INT NOT NULL AUTO_INCREMENT ,
 `first_name`    VARCHAR(256) NOT NULL ,
 `last_name`     VARCHAR(256) NOT NULL ,
 `email`         VARCHAR(256) NOT NULL ,
 `password`      VARCHAR(256) NOT NULL ,
 `password_salt` VARCHAR(256) NOT NULL ,
 `password_hash` VARCHAR(256) NOT NULL ,
 `created_at`    DATETIME DEFAULT CURRENT_TIMESTAMP,

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
 `migraine_id`      INT NOT NULL AUTO_INCREMENT ,
 `location_id`      INTEGER NOT NULL ,
 `user_id`          INTEGER NOT NULL ,
 `start_time`       DATETIME NOT NULL ,
 `end_time`         DATETIME NOT NULL ,
 `weather`          VARCHAR(1024) NOT NULL ,
 `duration`         VARCHAR(256) NOT NULL ,
 `severity`         VARCHAR(256) NOT NULL ,
 `severity_type_id` INTEGER NOT NULL ,
 `notes`            VARCHAR(2048) NOT NULL ,

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
