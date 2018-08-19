-- ************************************** `user`
CREATE TABLE `user`(
    `user_id` INT(11) NOT NULL AUTO_INCREMENT,
    `first_name` VARCHAR(256) NOT NULL,
    `last_name` VARCHAR(256) NOT NULL,
    `email` VARCHAR(256) NOT NULL,
    `password_hash` VARCHAR(256) NOT NULL,
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `user_type` VARCHAR(50) DEFAULT NULL,
    PRIMARY KEY(`user_id`)
);
-- ************************************** `migraine`
CREATE TABLE `migraine`(
    `migraine_id` INT(11) NOT NULL AUTO_INCREMENT,
    `user_id` INT(11) NOT NULL,
    `start_time` DATETIME NOT NULL,
    `end_time` DATETIME DEFAULT NULL,
    `location` VARCHAR(256) DEFAULT NULL,
    `weather` VARCHAR(256) DEFAULT NULL,
    `duration` VARCHAR(256) DEFAULT NULL,
    `severity` VARCHAR(256) DEFAULT NULL,
    `remedy` VARCHAR(256) DEFAULT NULL,
    `notes` VARCHAR(2048) DEFAULT NULL,
    PRIMARY KEY(`migraine_id`, `user_id`),
    KEY `fkIdx_47`(`user_id`)
);
