/*create database matchmaker*/
CREATE DATABASE matchmaker;
/*database.php*/
GRANT SELECT,INSERT,UPDATE,DELETE on matchmaker.* to module3@'localhost';
/*create table users*/
CREATE TABLE users(
id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
name VARCHAR(60) NOT NULL,
email VARCHAR(100) NOT NULL,
pictureUrl VARCHAR(250) NOT NULL,
description TEXT NOT NULL,
age TINYINT UNSIGNED NOT NULL,
posted TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,--current time
PRIMARY KEY (id),
UNIQUE key emailaddress (email)
) engine = INNODB DEFAULT character SET = utf8 COLLATE = utf8_general_ci;