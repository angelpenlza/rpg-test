IF rpg EXISTS DROP rpg;
CREATE DATABASE rpg;

CREATE TABLE users(userID AUTO_INCREMENT PRIMARY KEY NOT NULL, username VARCHAR(255), password VARCHAR(255));
