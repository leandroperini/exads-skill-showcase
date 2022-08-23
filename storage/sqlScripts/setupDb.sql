CREATE DATABASE IF NOT EXISTS `exads`;
USE `exads`;

CREATE TABLE IF NOT EXISTS `tv_series`
(
    `id`      bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `title`   varchar(50)         NOT NULL,
    `channel` varchar(50)         NOT NULL,
    `gender`  varchar(50)         NOT NULL,
    PRIMARY KEY (`id`),
    KEY `channel` (`channel`),
    KEY `gender` (`gender`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `tv_series_intervals`
(
    `id`           bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `id_tv_series` bigint(20) unsigned NOT NULL,
    `week_day`     tinyint(1) unsigned NOT NULL,
    `show_time`    TINYINT(2) UNSIGNED NOT NULL,
    PRIMARY KEY (`id`),
    KEY `FK_tv_series_tv_series_interval` (`id_tv_series`),
    KEY `week_day` (`week_day`),
    KEY `show_time` (`show_time`),
    CONSTRAINT `FK_tv_series_tv_series_interval` FOREIGN KEY (`id_tv_series`) REFERENCES `tv_series` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB;
