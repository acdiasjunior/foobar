-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Mai 02, 2012 as 12:35 AM
-- Versão do Servidor: 5.1.53
-- Versão do PHP: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Banco de Dados: `viacom`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `configuracoes`
--

CREATE TABLE IF NOT EXISTS `configuracoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parametro` varchar(200) DEFAULT NULL,
  `valor` varchar(200) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;
