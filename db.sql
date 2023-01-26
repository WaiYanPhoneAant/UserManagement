
--Database Creation
CREATE DATABASE DatabaseName;


-- user Creation
CREATE TABLE users (
    `id` int NOT NULL AUTO_INCREMENT,
    `name` varchar(100) NOT NULL,
    `email` varchar(255) NOT NULL,
    `role` tinyint DEFAULT '0',
    `password` varchar(255) NOT NULL,
    `address` text,
    `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)

    );


-- role table creation

CREATE TABLE `role` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role_id` int NOT NULL,
  `role_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `role_id` (`role_id`)

);