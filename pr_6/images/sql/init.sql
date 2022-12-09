CREATE DATABASE IF NOT EXISTS appDB;
CREATE USER IF NOT EXISTS 'user' @'%' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON appDB.* TO 'user' @'%';
FLUSH PRIVILEGES;
USE appDB;
-- Fix Russian language
SET NAMES utf8mb4;
-- Tables
CREATE TABLE IF NOT EXISTS users (
    ID INT(11) NOT NULL AUTO_INCREMENT,
    name CHAR(20) NOT NULL UNIQUE,
    password CHAR(40) NOT NULL,
    PRIMARY KEY (ID)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
CREATE TABLE IF NOT EXISTS timetable (
    ID INT(10) NOT NULL AUTO_INCREMENT,
    title VARCHAR(256) NOT NULL UNIQUE,
    auditorium VARCHAR(256) NOT NULL,
    PRIMARY KEY (ID)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
-- Admin (MD5)
INSERT INTO users (name, password)
VALUES (
        'user',
        '$apr1$yjk7lqtu$FSi3c8HhlftcCwecu/a.Z0' -- password
    ),
    (
        'denis',
        '$apr1$mijdn2fy$HUXVZWU4Ax9v/5j.IamoN0' -- 123
    );
-- timetable
INSERT INTO timetable (title, auditorium)
VALUES (
        'Разработка серверных частей интернет ресурсов',
        'И-212-б'
       ),
    ('Разработка баз данных', 'И-212-в');
