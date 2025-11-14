CREATE DATABASE IF NOT EXISTS movies CHARSET utf8mb4;
USE movies;

CREATE TABLE IF NOT EXISTS `grant`(
id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
`name` VARCHAR(50) UNIQUE NOT NULL
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS category(
id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
`name` VARCHAR(50) UNIQUE NOT NULL
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `account`(
id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
firstname VARCHAR(50) NOT NULL,
lastname VARCHAR(50) NOT NULL,
email VARCHAR(50) UNIQUE NOT NULL,
`password` VARCHAR(100) NOT NULL,
id_grant INT NOT NULL
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS movie(
id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
title VARCHAR(50) NOT NULL,
`description` VARCHAR(255) NOT NULL,
publish_at DATE NOT NULL,
duration INT,
cover VARCHAR(255) 
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS account_movie(
id_account INT,
id_movie INT,
PRIMARY KEY(id_account, id_movie) 
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS movie_category(
id_category INT,
id_movie INT,
PRIMARY KEY(id_movie, id_category) 
)ENGINE=InnoDB;

-- jointures
ALTER TABLE `account`
ADD CONSTRAINT fk_attribute_grant
FOREIGN KEY(id_grant) 
REFERENCES `grant`(id) 
ON DELETE CASCADE;

ALTER TABLE account_movie
ADD CONSTRAINT fk_watch_account
FOREIGN KEY(id_account) 
REFERENCES `account`(id);

ALTER TABLE account_movie
ADD CONSTRAINT fk_watch_movie
FOREIGN KEY(id_movie) 
REFERENCES movie(id);

ALTER TABLE movie_category
ADD CONSTRAINT fk_completed_movie
FOREIGN KEY(id_movie) 
REFERENCES movie(id);

ALTER TABLE movie_category
ADD CONSTRAINT fk_completed_category
FOREIGN KEY(id_category) 
REFERENCES category(id);