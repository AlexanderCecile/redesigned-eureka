# This was hell. I feel like I've barely scratched the surface, too.

CREATE DATABASE IF NOT EXISTS `socmed` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `socmed`;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

CREATE TABLE `user` (
    `user_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `username` TEXT COLLATE utf8mb4_bin NOT NULL UNIQUE,
    `password_hash` TEXT NOT NULL,
    `first_name` TEXT NULL,
    `middle_name` TEXT NULL,
    `last_name` TEXT NULL,
    CONSTRAINT PRIMARY KEY (`user_id`)
);

CREATE TABLE `publication` (
    `publication_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `user_id` INT UNSIGNED NOT NULL,
    `publication_title` TEXT NOT NULL,
    `publication_body` TEXT NOT NULL,
    `timestamp` TIMESTAMP,
    `publication_status` ENUM('public', 'private') NOT NULL,
    CONSTRAINT PRIMARY KEY (`publication_id`),
    /*
    Might be impossible to make this sort of constraint since the publication_id column has the AUTO_INCREMENT attribute
    CONSTRAINT CHECK (`parent_publication_id` IN `publication_id`) ENFORCED,
    */
    CONSTRAINT FOREIGN KEY (`user_id`) REFERENCES user (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE `comment` (
    `comment_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `user_id` INT UNSIGNED NOT NULL,
    `publication_id` INT UNSIGNED NOT NULL,
    `comment_body` TEXT NOT NULL,
    `timestamp` TIMESTAMP,
    CONSTRAINT PRIMARY KEY (`comment_id`),
    CONSTRAINT FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT FOREIGN KEY (`publication_id`) REFERENCES `publication` (`publication_id`) ON DELETE CASCADE ON UPDATE CASCADE
);


INSERT INTO `user` (`user_id`, `username`, `password_hash`) VALUES (NULL, 'username1', 'passwdhash');

INSERT INTO `user` (`user_id`, `username`, `password_hash`) VALUES (NULL, 'username2', 'passwdhash');

INSERT INTO `publication` (`publication_id`, `user_id`, `publication_title`, `publication_body`, `timestamp`, `publication_status`) VALUES (NULL, '1', 'Some title 1', 'A body', NULL, 'public');

INSERT INTO `publication` (`publication_id`, `user_id`, `publication_title`, `publication_body`, `timestamp`, `publication_status`) VALUES (NULL, '1', 'Some title 2', 'A body 2', NULL, 'public');

INSERT INTO `comment` (`comment_id`, `user_id`, `publication_id`, `comment_body`, `timestamp`) VALUES (NULL, '1', '1', 'Comment 1 body', NULL);

INSERT INTO `comment` (`comment_id`, `user_id`, `publication_id`, `comment_body`, `timestamp`) VALUES (NULL, '2', '1', 'Comment 2 body', NULL);