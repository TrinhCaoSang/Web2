SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `user`;

USE `user`;

CREATE TABLE IF NOT EXISTS `user_account` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `registerName` varchar(30) DEFAULT NULL,
    `registerEmail` varchar(255) DEFAULT NULL,
    `registerPassword` varchar(255) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

INSERT INTO `user_account` (`id`, `registerName`, `registerEmail`, `registerPassword`) VALUES
(1, 'U1', 'thehalfheart@gmail.com', 'thehalfheart'),
(2, 'U2', 'freetuts.net@gmail.com', 'freetuts'),
(3, 'U3', 'kingston@gmail.com', 'kingston'),
(4, 'U4', 'cafeviet@gmail.com', 'cafeviet'),
(5, 'U5', 'emailer@gmail.com', 'emailer');
