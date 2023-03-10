DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
    `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `fname` VARCHAR(100) NOT NULL,
    `lname` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `bdate` DATETIME NOT NULL,
    `session` VARCHAR(100) NOT NULL,
    `phone` VARCHAR(100) NOT NULL,
    `sex` VARCHAR(100) NOT NULL,
    `class` VARCHAR(100) NOT NULL,
    `language` VARCHAR(100) NOT NULL,
    `ordinateur` VARCHAR(100) NOT NULL,
    `tranches` VARCHAR(100) NOT NULL,
    `formation_ype` VARCHAR(100) NOT NULL,
    `etablissement` VARCHAR(100) NOT NULL,
    `yaounde` VARCHAR(100) NOT NULL,

    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
    `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL,
    `password` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `admins` (`name`, `password`) VALUES ('Admin', 'Caysti2023'), ('Admin2', 'Caysti2022');