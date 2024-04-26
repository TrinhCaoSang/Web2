CREATE DATABASE IF NOT EXISTS `checkbox`;

USE `checkbox`;

CREATE TABLE IF NOT EXISTS `permissions` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `authority_name` VARCHAR(255) NOT NULL,
    `permission_name` VARCHAR(255) NOT NULL,
    `permission_view` TINYINT(1) DEFAULT 0,
    `permission_add` TINYINT(1) DEFAULT 0,
    `permission_edit` TINYINT(1) DEFAULT 0,
    `permission_delete` TINYINT(1) DEFAULT 0
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;