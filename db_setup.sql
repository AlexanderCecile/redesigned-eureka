# This was hell. I feel like I've barely scratched the surface, too.

CREATE DATABASE IF NOT EXISTS `socmed` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `socmed`;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

CREATE TABLE `user` (
    `user_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `username` TEXT NOT NULL UNIQUE,
    `password_hash` TEXT NOT NULL,
    CONSTRAINT PRIMARY KEY (`user_id`)
);


CREATE TABLE `profile` (
    `profile_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `user_id` INT UNSIGNED NOT NULL UNIQUE,
    `first_name` TEXT NOT NULL,
    `middle_name` TEXT NULL,
    `last_name` TEXT NOT NULL,
    CONSTRAINT PRIMARY KEY (`profile_id`),
    CONSTRAINT FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE `publication` (
    `publication_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `profile_id` INT UNSIGNED NOT NULL,
    `publication_title` TEXT NOT NULL,
    `publication_text` TEXT NOT NULL,
    `timestamp` TIMESTAMP,
    `publication_status` ENUM('public', 'private'),
    CONSTRAINT PRIMARY KEY (`publication_id`),
    CONSTRAINT FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `publication_comment` (
    `publication_comment_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `profile_id` INT UNSIGNED NOT NULL,
    `publication_id` INT UNSIGNED NOT NULL,
    `timestamp` TIMESTAMP,
    CONSTRAINT PRIMARY KEY (`publication_comment_id`),
    CONSTRAINT FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT FOREIGN KEY (`publication_id`) REFERENCES `publication` (`publication_id`)
);