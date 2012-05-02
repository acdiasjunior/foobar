/*
SQLyog Community v9.51 
MySQL - 5.5.16-log : Database - viacom
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`viacom` /*!40100 DEFAULT CHARACTER SET latin1 */;

/*Table structure for table `clientes` */

DROP TABLE IF EXISTS `clientes`;

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(50) DEFAULT NULL,
  `empresa` varchar(100) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `telefone` varchar(14) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `situacao` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `clientes` */

/*Table structure for table `configuracoes` */

DROP TABLE IF EXISTS `configuracoes`;

CREATE TABLE `configuracoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parametro` varchar(200) DEFAULT NULL,
  `valor` varchar(200) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `configuracoes` */

insert  into `configuracoes`(`id`,`parametro`,`valor`,`created`,`modified`) values (1,'email_aprovador_operadora','teste@email.com','2012-05-02 15:43:41','2012-05-02 15:43:57');
insert  into `configuracoes`(`id`,`parametro`,`valor`,`created`,`modified`) values (2,'email_aprovador_agencia','teste@email.com','2012-05-02 15:43:41','2012-05-02 15:43:57');
insert  into `configuracoes`(`id`,`parametro`,`valor`,`created`,`modified`) values (3,'email_aprovador_cliente','teste@email.com','2012-05-02 15:43:41','2012-05-02 15:43:57');
insert  into `configuracoes`(`id`,`parametro`,`valor`,`created`,`modified`) values (4,'email_aprovador_outros','teste@email.com','2012-05-02 15:43:41','2012-05-02 15:43:57');

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT NULL,
  `grupo` char(1) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `departamento` varchar(50) DEFAULT NULL,
  `telefone` varchar(14) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id`,`username`,`password`,`created`,`modified`,`ativo`,`grupo`,`nome`,`email`,`departamento`,`telefone`) values (1,'admin','3d5973889ab156ac13a80054cc4fd2f5253a98c9f26e65cdffd056559961be0a','2012-05-02 15:43:04','2012-05-02 15:44:13',1,'A','Administrador','teste@email.com','','3236-9003');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
