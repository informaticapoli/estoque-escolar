-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.1.36-community-log - MySQL Community Server (GPL)
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para estoque_escolar
CREATE DATABASE IF NOT EXISTS `estoque_escolar` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `estoque_escolar`;

-- Copiando estrutura para tabela estoque_escolar.cardapio
CREATE TABLE IF NOT EXISTS `cardapio` (
  `id_cardapio` int(11) NOT NULL AUTO_INCREMENT,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `nome_cardapio` varchar(100) NOT NULL,
  PRIMARY KEY (`id_cardapio`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela estoque_escolar.cardapio: 23 rows
/*!40000 ALTER TABLE `cardapio` DISABLE KEYS */;
INSERT INTO `cardapio` (`id_cardapio`, `status`, `nome_cardapio`) VALUES
	(1, 1, 'galinhada'),
	(2, 1, 'galinhada'),
	(3, 1, 'galinhada'),
	(4, 1, 'feijoada'),
	(5, 1, 'arroz'),
	(6, 0, 'Arroz com carne moida'),
	(7, 0, ''),
	(8, 0, 'Frango com arroz'),
	(9, 0, 'Lasanha'),
	(10, 0, 'FeijÃ£o com linguiÃ§a'),
	(11, 0, 'sfdsd'),
	(12, 0, ''),
	(13, 0, 'Galinhada'),
	(14, 0, 'Galinhada'),
	(15, 0, 'sdfgdfg'),
	(16, 0, 'Farofa'),
	(17, 0, 'Feijao e arroz'),
	(18, 0, 'Farinha'),
	(19, 0, 'sdfjds'),
	(20, 0, 'sdfjds'),
	(21, 0, 'sdfjds'),
	(22, 0, 'sdfs'),
	(23, 0, 'Galinhada');
/*!40000 ALTER TABLE `cardapio` ENABLE KEYS */;

-- Copiando estrutura para tabela estoque_escolar.entrada_nota
CREATE TABLE IF NOT EXISTS `entrada_nota` (
  `id_nota` int(11) NOT NULL AUTO_INCREMENT,
  `data_entrada` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_fornecedor` int(11) NOT NULL,
  `numero_nota` varchar(100) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `qtn_produto` float NOT NULL DEFAULT '0',
  `id_recurso` int(11) DEFAULT NULL,
  `valor_produto` float(10,3) NOT NULL DEFAULT '0.000',
  `total_nota` float(10,3) NOT NULL DEFAULT '0.000',
  `status` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_nota`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela estoque_escolar.entrada_nota: 17 rows
/*!40000 ALTER TABLE `entrada_nota` DISABLE KEYS */;
INSERT INTO `entrada_nota` (`id_nota`, `data_entrada`, `id_fornecedor`, `numero_nota`, `id_produto`, `qtn_produto`, `id_recurso`, `valor_produto`, `total_nota`, `status`) VALUES
	(2, '2022-10-25 22:56:13', 3, '35', 0, 0, 0, 0.000, 200.000, 0),
	(3, '2022-10-25 22:56:50', 3, '35', 0, 0, 0, 0.000, 200.000, 0),
	(4, '2022-10-25 22:58:07', 5, '65', 0, 0, 0, 0.000, 855.000, 0),
	(5, '2022-10-25 22:58:32', 7, '95', 0, 0, 0, 0.000, 85.000, 0),
	(6, '2022-11-03 22:31:26', 1, '4', 0, 0, 435, 0.000, 435.000, 0),
	(7, '2022-11-03 22:35:54', 1, '345', 0, 0, 656, 0.000, 66.000, 0),
	(8, '2022-11-03 22:36:25', 1, '345', 0, 0, 656, 0.000, 66.000, 0),
	(9, '2022-11-04 23:28:39', 5, '5', 0, 0, 4, 0.000, 1233.000, 0),
	(10, '2022-11-07 22:20:43', 7, '78', 0, 0, 1, 0.000, 100.000, 0),
	(11, '2022-11-08 22:47:20', 3, '3', 0, 0, NULL, 0.000, 120.000, 1),
	(12, '2022-11-10 21:49:52', 3, '3', 0, 0, NULL, 0.000, 1233.000, 1),
	(13, '2022-11-10 21:57:29', 3, '2', 0, 0, NULL, 0.000, 3435.000, 1),
	(14, '2022-11-10 22:02:06', 3, '4', 0, 0, NULL, 0.000, 325.000, 1),
	(15, '2022-11-10 22:10:48', 8, '3', 0, 0, NULL, 0.000, 4546.000, 0),
	(16, '2022-11-10 22:11:27', 9, '3', 0, 0, NULL, 0.000, 456.000, 0),
	(17, '2022-11-10 22:12:01', 7, '5', 0, 0, NULL, 0.000, 567.000, 0),
	(18, '2022-11-16 21:56:09', 3, '34', 0, 0, NULL, 0.000, 354.000, 0);
/*!40000 ALTER TABLE `entrada_nota` ENABLE KEYS */;

-- Copiando estrutura para tabela estoque_escolar.estoque
CREATE TABLE IF NOT EXISTS `estoque` (
  `id_estoque` int(11) NOT NULL AUTO_INCREMENT,
  `id_nota` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `qtn_produto` float NOT NULL,
  PRIMARY KEY (`id_estoque`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela estoque_escolar.estoque: 4 rows
/*!40000 ALTER TABLE `estoque` DISABLE KEYS */;
INSERT INTO `estoque` (`id_estoque`, `id_nota`, `id_produto`, `qtn_produto`) VALUES
	(1, 0, 1, 11313),
	(2, 0, 3, 4643),
	(3, 0, 5, 227),
	(4, 0, 2, 8);
/*!40000 ALTER TABLE `estoque` ENABLE KEYS */;

-- Copiando estrutura para tabela estoque_escolar.fornecedor
CREATE TABLE IF NOT EXISTS `fornecedor` (
  `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT,
  `nome_fornecedor` varchar(100) NOT NULL,
  `endereco_fornecedor` varchar(100) NOT NULL,
  `contato_fornecedor` varchar(100) NOT NULL,
  `telefone1` varchar(14) NOT NULL,
  `telefone2` varchar(14) DEFAULT NULL,
  `e_mail` varchar(100) DEFAULT NULL,
  `cnpj` varchar(17) DEFAULT NULL,
  PRIMARY KEY (`id_fornecedor`),
  UNIQUE KEY `cnpj` (`cnpj`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela estoque_escolar.fornecedor: 11 rows
/*!40000 ALTER TABLE `fornecedor` DISABLE KEYS */;
INSERT INTO `fornecedor` (`id_fornecedor`, `nome_fornecedor`, `endereco_fornecedor`, `contato_fornecedor`, `telefone1`, `telefone2`, `e_mail`, `cnpj`) VALUES
	(1, 'Jb', 'Av SDFSDF', '5465', '4565', '565', 'dfg@gmail.com', NULL),
	(2, 'Jb', 'Av SDFSDF', '5465', '4565', '565', 'dfg@gmail.com', NULL),
	(3, 'Jb', 'Av SDFSDF', '5465', '4565', '565', 'dfg@gmail.com', NULL),
	(4, 'Jb3', 'Euvaldo Lodi', 'Joao', '65847984765', '2454', 'jb@gmail.com', '123'),
	(5, 'gfdfg', 'sdfsd', 'sdfsd', 'sdfsd', '', '', NULL),
	(6, 'sdfsd', 'sdfsd', 'sdf', 'sdfsd', '', '', '1234'),
	(7, 'XatÃ£o', 'Av Brasilia', 'JosÃ©', '545463123', '65465445454', 'xatao@gmail.com', '545454543213213'),
	(8, 'Agricultura', 'Rua AraxÃ¡', 'Maria', '453645756', '345345345', 'agricultuta@gmail.com', '354163546546546'),
	(9, 'ABC', 'Rua Brasil', 'Joao', '6547654', '', 'abc@gmail.com', '879846321321'),
	(10, 'sdfsdf', 'ertert', 'erte', 'rte', '', 'nanan@gmail.com', '543453'),
	(11, 'fsdfsadf', 'hjghdf', 'fgdf', 'dfgdf', '', 'lsfjksdlkjas@gmail.com', '5434534');
/*!40000 ALTER TABLE `fornecedor` ENABLE KEYS */;

-- Copiando estrutura para tabela estoque_escolar.info_produtos_entrada
CREATE TABLE IF NOT EXISTS `info_produtos_entrada` (
  `id_info` int(11) NOT NULL AUTO_INCREMENT,
  `id_nota` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `data_validade` date NOT NULL,
  `qtd` decimal(10,2) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id_info`)
) ENGINE=MyISAM AUTO_INCREMENT=87 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela estoque_escolar.info_produtos_entrada: 35 rows
/*!40000 ALTER TABLE `info_produtos_entrada` DISABLE KEYS */;
INSERT INTO `info_produtos_entrada` (`id_info`, `id_nota`, `id_produto`, `data_validade`, `qtd`, `valor`) VALUES
	(78, 17, 3, '0000-00-00', 4556.00, 454.00),
	(77, 17, 3, '0000-00-00', 45.00, 56.00),
	(64, 14, 1, '0000-00-00', 3.00, 34.00),
	(75, 17, 1, '0000-00-00', 567.00, 4.00),
	(74, 17, 1, '0000-00-00', 45.00, 4667.00),
	(62, 14, 5, '0000-00-00', 6.00, 67.00),
	(61, 14, 1, '0000-00-00', 5.00, 45.00),
	(60, 13, 5, '0000-00-00', 4.00, 45.00),
	(59, 13, 1, '0000-00-00', 4.00, 45.00),
	(58, 13, 1, '0000-00-00', 4.00, 45.00),
	(54, 0, 1, '0000-00-00', 4.00, 34.00),
	(56, 12, 1, '0000-00-00', 2.00, 34.00),
	(52, 0, 3, '0000-00-00', 34.00, 3.00),
	(51, 0, 5, '0000-00-00', 3.00, 45.00),
	(48, 11, 1, '0000-00-00', 34.00, 645.00),
	(47, 11, 3, '0000-00-00', 3.00, 6.00),
	(40, 8, 1, '0000-00-00', 2.00, 23.00),
	(66, 16, 5, '0000-00-00', 200.00, 251.00),
	(65, 15, 1, '0000-00-00', 12.00, 350.00),
	(63, 14, 2, '0000-00-00', 4.00, 45.00),
	(72, 17, 1, '0000-00-00', 4.00, 45.00),
	(57, 12, 5, '0000-00-00', 4.00, 45.00),
	(73, 17, 1, '0000-00-00', 567.00, 45.00),
	(76, 17, 1, '0000-00-00', 10000.00, 10000.00),
	(46, 11, 1, '0000-00-00', 6.00, 56.00),
	(45, 11, 5, '0000-00-00', 3.00, 34.00),
	(55, 0, 5, '0000-00-00', 4.00, 45.00),
	(79, 17, 1, '0000-00-00', 4.00, 4.00),
	(80, 17, 1, '0000-00-00', 4.00, 4.00),
	(81, 17, 3, '0000-00-00', 4.00, 4.00),
	(82, 17, 3, '0000-00-00', 4.00, 4.00),
	(83, 17, 1, '0000-00-00', 10.00, 10.00),
	(84, 17, 1, '0000-00-00', 54.00, 45.00),
	(85, 17, 5, '0000-00-00', 4.00, 45.00),
	(86, 0, 1, '0000-00-00', 34.00, 0.00);
/*!40000 ALTER TABLE `info_produtos_entrada` ENABLE KEYS */;

-- Copiando estrutura para tabela estoque_escolar.item_cardapio
CREATE TABLE IF NOT EXISTS `item_cardapio` (
  `id_item_card` int(11) NOT NULL AUTO_INCREMENT,
  `id_produto` int(11) DEFAULT NULL,
  `qtd_mat` decimal(10,2) DEFAULT '0.00',
  `qtd_vesp` decimal(10,2) DEFAULT '0.00',
  `qtd_not` decimal(10,2) DEFAULT '0.00',
  `id_cardapio` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_item_card`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela estoque_escolar.item_cardapio: 49 rows
/*!40000 ALTER TABLE `item_cardapio` DISABLE KEYS */;
INSERT INTO `item_cardapio` (`id_item_card`, `id_produto`, `qtd_mat`, `qtd_vesp`, `qtd_not`, `id_cardapio`) VALUES
	(1, 5, 5.00, 0.00, 0.00, NULL),
	(2, 1, 0.00, 0.00, 0.00, NULL),
	(3, 3, 3.00, 4.00, 5.00, NULL),
	(4, 3, 3.00, 4.00, 5.00, NULL),
	(5, 3, 3.00, 4.00, 5.00, NULL),
	(6, 1, 5.00, 5.00, 5.00, NULL),
	(7, 1, 5.00, 5.00, 5.00, NULL),
	(8, 1, 5.00, 5.00, 5.00, NULL),
	(9, 1, 4.00, 45.00, 5.00, NULL),
	(10, 1, 4.00, 45.00, 5.00, NULL),
	(11, 1, 4.00, 45.00, 5.00, NULL),
	(12, 5, 4.00, 56.00, 5.00, NULL),
	(13, 5, 4.00, 56.00, 5.00, NULL),
	(14, 5, 4.00, 56.00, 5.00, NULL),
	(15, 5, 4.00, 56.00, 5.00, NULL),
	(16, 5, 4.00, 56.00, 5.00, NULL),
	(17, 5, 4.00, 56.00, 5.00, NULL),
	(18, 5, 4.00, 56.00, 5.00, NULL),
	(19, 5, 4.00, 56.00, 5.00, NULL),
	(20, 1, 4.00, 6.00, 5.00, NULL),
	(21, 1, 3.00, 4.00, 5.00, NULL),
	(22, 1, 3.00, 4.00, 5.00, NULL),
	(23, 1, 3.00, 4.00, 5.00, NULL),
	(24, 1, 3.00, 4.00, 5.00, NULL),
	(25, 1, 456.00, 456.00, 5456.00, NULL),
	(26, 5, 4.00, 66.00, 6.00, NULL),
	(27, 5, 4.00, 5.00, 6.00, NULL),
	(28, 5, 4.00, 5.00, 6.00, NULL),
	(29, 1, 5.00, 5.00, 6.00, NULL),
	(30, 1, 5.00, 5.00, 6.00, NULL),
	(31, 5, 5.00, 3.00, 4.00, NULL),
	(32, 1, 55.00, 4.00, 5.00, NULL),
	(33, 1, 55.00, 4.00, 5.00, NULL),
	(34, 1, 55.00, 4.00, 5.00, NULL),
	(35, 1, 55.00, 4.00, 5.00, NULL),
	(36, 1, 5.00, 4.00, 3.00, NULL),
	(37, 1, 5.00, 4.00, 3.00, NULL),
	(38, 1, 5.00, 4.00, 3.00, NULL),
	(39, 1, 56.00, 56.00, 56.00, NULL),
	(40, 1, 56.00, 56.00, 5.00, NULL),
	(41, 1, 56.00, 56.00, 5.00, NULL),
	(42, 1, 56.00, 56.00, 5.00, NULL),
	(43, 1, 56.00, 56.00, 5.00, NULL),
	(44, 1, 56.00, 56.00, 5.00, 21),
	(45, 1, 56.00, 56.00, 5.00, 21),
	(46, 1, 56.00, 56.00, 5.00, 21),
	(47, 1, 56.00, 56.00, 5.00, 21),
	(48, 1, 56.00, 56.00, 5.00, 21),
	(49, 3, 45.00, 65.00, 56.00, 22);
/*!40000 ALTER TABLE `item_cardapio` ENABLE KEYS */;

-- Copiando estrutura para tabela estoque_escolar.produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `nome_produto` varchar(100) NOT NULL,
  `unidade_medida` varchar(3) NOT NULL,
  `data_validade` date NOT NULL,
  `id_nota` int(11) NOT NULL,
  `id_fornecedor` int(11) NOT NULL,
  `id_recurso` int(11) NOT NULL,
  PRIMARY KEY (`id_produto`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela estoque_escolar.produtos: 5 rows
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` (`id_produto`, `nome_produto`, `unidade_medida`, `data_validade`, `id_nota`, `id_fornecedor`, `id_recurso`) VALUES
	(1, 'Arroz', 'kg', '0002-05-06', 0, 0, 0),
	(2, 'Arroz 5', 'kg', '0000-00-00', 0, 0, 0),
	(3, 'Batata', 'kg', '2022-12-10', 56, 1, 0),
	(4, 'Batata', 'kg', '2022-02-20', 4, 9, 2),
	(5, 'Feijao', 'kg', '2022-03-04', 2, 4, 2);
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;

-- Copiando estrutura para tabela estoque_escolar.recurso
CREATE TABLE IF NOT EXISTS `recurso` (
  `id_recurso` int(11) NOT NULL AUTO_INCREMENT,
  `nome_recurso` varchar(100) NOT NULL,
  PRIMARY KEY (`id_recurso`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela estoque_escolar.recurso: 2 rows
/*!40000 ALTER TABLE `recurso` DISABLE KEYS */;
INSERT INTO `recurso` (`id_recurso`, `nome_recurso`) VALUES
	(0, 'Estado'),
	(2, 'Fazenda');
/*!40000 ALTER TABLE `recurso` ENABLE KEYS */;

-- Copiando estrutura para tabela estoque_escolar.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `nivel` int(11) NOT NULL,
  `desativado` int(11) NOT NULL,
  `token` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela estoque_escolar.usuarios: 1 rows
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `usuario`, `nome`, `senha`, `nivel`, `desativado`, `token`) VALUES
	(0, 'Nat', 'Natallia', '1234', 0, 0, 'ed009dffdf8c824c603abd43e4787f17');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
