
CREATE DATABASE matchmaker;


CREATE TABLE users(
id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
name VARCHAR(60) NOT NULL,
email VARCHAR(100) NOT NULL,
pictureUrl VARCHAR(250) NOT NULL,
description TINYTEXT,
age TINYINT UNSIGNED NOT NULL,
posted datetime NOT NULL,
PRIMARY KEY (id),
UNIQUE key emailaddress (email)
) engine = INNODB DEFAULT character SET = utf8 COLLATE = utf8_general_ci;