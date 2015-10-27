-- --------------------------------------------------------
-- Host:                         sql.pmag.local
-- Server version:               10.0.21-MariaDB - MariaDB Server
-- Server OS:                    Linux
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for cef
CREATE DATABASE IF NOT EXISTS `cef` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `cef`;


-- Dumping structure for table cef.agencias
CREATE TABLE IF NOT EXISTS `agencias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `numero` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `gerente` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.


-- Dumping structure for view cef.lista
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `lista` (
	`cpf` CHAR(11) NOT NULL COLLATE 'utf8_unicode_ci',
	`nome` VARCHAR(75) NOT NULL COLLATE 'utf8_unicode_ci',
	`novaconta` TINYINT(1) NOT NULL,
	`numero` CHAR(4) NOT NULL COLLATE 'utf8_unicode_ci',
	`agencia` VARCHAR(60) NOT NULL COLLATE 'utf8_unicode_ci',
	`gerente` VARCHAR(60) NOT NULL COLLATE 'utf8_unicode_ci',
	`telefone` CHAR(20) NOT NULL COLLATE 'utf8_unicode_ci',
	`endereco` VARCHAR(125) NOT NULL COLLATE 'utf8_unicode_ci'
) ENGINE=MyISAM;


-- Dumping structure for table cef.servidores
CREATE TABLE IF NOT EXISTS `servidores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cpf` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `novaconta` tinyint(1) NOT NULL,
  `agencia_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`),
  KEY `agencia` (`agencia_id`),
  CONSTRAINT `agencia` FOREIGN KEY (`agencia_id`) REFERENCES `agencias` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.


-- Dumping structure for view cef.lista
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `lista`;
CREATE ALGORITHM=UNDEFINED DEFINER=`diego.27439`@`172.16.254.232` SQL SECURITY DEFINER VIEW `lista` AS select `servidores`.`cpf` AS `cpf`,`servidores`.`nome` AS `nome`,`servidores`.`novaconta` AS `novaconta`,`agencias`.`numero` AS `numero`,`agencias`.`nome` AS `agencia`,`agencias`.`gerente` AS `gerente`,`agencias`.`telefone` AS `telefone`,`agencias`.`endereco` AS `endereco` from (`servidores` join `agencias`) where (`servidores`.`agencia_id` = `agencias`.`id`) order by `servidores`.`nome`;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
