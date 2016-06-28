-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 28-Jun-2016 às 01:00
-- Versão do servidor: 5.5.49-0ubuntu0.14.04.1
-- versão do PHP: 5.5.9-1ubuntu4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `challenge`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE IF NOT EXISTS `contato` (
  `seqContato` int(11) NOT NULL AUTO_INCREMENT,
  `seqUsuario` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `telefone` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`seqContato`),
  KEY `seqUsuario` (`seqUsuario`),
  KEY `seqUsuario_2` (`seqUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=69 ;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`seqContato`, `seqUsuario`, `email`, `telefone`) VALUES
(64, 73, 'dinartmf@gmail.com', '+55 83 99654-4974'),
(65, 74, 'dinartmf@gmail1.com', ''),
(66, 75, 'dinartmf@gmail.coms', ''),
(67, 76, 'dinartmf@gmail.comm', ''),
(68, 77, 'dinartmf@gmail.comx', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `documento`
--

CREATE TABLE IF NOT EXISTS `documento` (
  `seqDocumento` int(11) NOT NULL AUTO_INCREMENT,
  `seqUsuario` int(11) NOT NULL,
  `tipoDocumento` int(1) NOT NULL,
  `numDocumento` varchar(60) NOT NULL,
  PRIMARY KEY (`seqDocumento`),
  KEY `seqUsuario` (`seqUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Extraindo dados da tabela `documento`
--

INSERT INTO `documento` (`seqDocumento`, `seqUsuario`, `tipoDocumento`, `numDocumento`) VALUES
(47, 73, 1, ''),
(48, 74, 1, ''),
(49, 75, 1, ''),
(50, 76, 1, ''),
(51, 77, 1, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE IF NOT EXISTS `endereco` (
  `seqEndereco` int(11) NOT NULL AUTO_INCREMENT,
  `seqUsuario` int(11) NOT NULL,
  `logradouro` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `codPostal` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `localidade` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `pais` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`seqEndereco`),
  KEY `seqUsuario` (`seqUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`seqEndereco`, `seqUsuario`, `logradouro`, `codPostal`, `localidade`, `pais`) VALUES
(46, 73, 'Rua Jorn GenÃ©sio G Filho, 103 - Ap. 202 - Jardim Cid UniversitÃ¡ria', '58052280', 'JoÃ£o Pessoa', 'Brasil'),
(47, 74, '', '58052280', 'JoÃ£o Pessoa', 'Brasil'),
(48, 75, '', '58052280', 'JoÃ£o Pessoa', 'Brasil'),
(49, 76, '', '58052280', 'JoÃ£o Pessoa', 'Brasil'),
(50, 77, '', '58052280', 'JoÃ£o Pessoa', 'Brasil');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `seqUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(40) COLLATE utf8_bin NOT NULL,
  `apelido` varchar(60) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`seqUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=78 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`seqUsuario`, `nome`, `password`, `apelido`) VALUES
(73, 'Dinart', 'dinart141516', 'Filho'),
(74, 'Dinart', 'M', 'Filho'),
(75, 'Dinart', 'M', 'Filho'),
(76, 'Dinart', 'c63ae6dd4fc9f9dda66970e827d13f7c73fe841c', 'Filho'),
(77, 'Dinart', 'c63ae6dd4fc9f9dda66970e827d13f7c73fe841c', 'Filho');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `contato`
--
ALTER TABLE `contato`
  ADD CONSTRAINT `usuarioContato` FOREIGN KEY (`seqUsuario`) REFERENCES `usuario` (`seqUsuario`);

--
-- Limitadores para a tabela `documento`
--
ALTER TABLE `documento`
  ADD CONSTRAINT `usuarioDocumento` FOREIGN KEY (`seqUsuario`) REFERENCES `usuario` (`seqUsuario`);

--
-- Limitadores para a tabela `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `usuarioEndereco` FOREIGN KEY (`seqUsuario`) REFERENCES `usuario` (`seqUsuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
