-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 19-Jan-2020 às 22:37
-- Versão do servidor: 5.7.26
-- versão do PHP: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurante`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alimento`
--

DROP TABLE IF EXISTS `alimento`;
CREATE TABLE IF NOT EXISTS `alimento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nome_alimento` varchar(45) NOT NULL,
  `Preco` float NOT NULL,
  `Stock` int(11) NOT NULL,
  `Tipo_Alimento_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Alimento_Tipo_Alimento1_idx` (`Tipo_Alimento_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `alimento`
--

INSERT INTO `alimento` (`id`, `Nome_alimento`, `Preco`, `Stock`, `Tipo_Alimento_id`) VALUES
(1, 'bitoque', 12, 12, 1),
(2, 'bacalhau à bras', 12, 5, 1),
(3, 'feijoada', 20, 12, 1),
(4, 'pizza', 12, 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `auth_assignment_user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1542726747),
('author', '10', 1543841835),
('author', '11', 1543842038),
('author', '12', 1543842069),
('author', '13', 1543842292),
('author', '14', 1543843852),
('author', '15', 1543843936),
('author', '16', 1543844322),
('author', '17', 1543850198),
('author', '18', 1543853044),
('author', '19', 1543853391),
('author', '2', 1542820913),
('author', '20', 1543853457),
('author', '21', 1543854115),
('author', '22', 1543856166),
('author', '23', 1545250843),
('author', '24', 1545581953),
('author', '25', 1548187866),
('author', '3', 1543840798),
('author', '4', 1543841040),
('author', '5', 1543841094),
('author', '6', 1543841216),
('author', '7', 1543841316),
('author', '8', 1543841518),
('author', '9', 1543841643);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, NULL, NULL, NULL, 1542726233, 1542726233),
('author', 1, NULL, NULL, NULL, 1542726233, 1542726233),
('createAlimento', 2, 'Cria um Alimento', NULL, NULL, 1542726233, 1542726233),
('createClassificacao', 2, 'Cria uma classificação', NULL, NULL, 1542726233, 1542726233),
('createEncomenda', 2, 'Cria uma encomenda', NULL, NULL, 1542726233, 1542726233),
('createMesa', 2, 'Criar Mesa', NULL, NULL, 1542726233, 1542726233),
('createReserva', 2, 'Criar Reserva', NULL, NULL, 1542726233, 1542726233),
('createTipoAlimento', 2, 'Criar TipoAlimento', NULL, NULL, 1542726233, 1542726233),
('createVenda', 2, 'Criar Venda', NULL, NULL, 1542726233, 1542726233),
('deleteAlimento', 2, 'Apaga uma Alimento', NULL, NULL, 1542726233, 1542726233),
('deleteClassificacao', 2, 'Apaga uma classificação', NULL, NULL, 1542726233, 1542726233),
('deleteEncomenda', 2, 'Apaga uma encomenda', NULL, NULL, 1542726233, 1542726233),
('deleteMesa', 2, 'Eliminar Mesa', NULL, NULL, 1542726233, 1542726233),
('deleteReserva', 2, 'Eliminar Reserva', NULL, NULL, 1542726233, 1542726233),
('deleteTipoAlimento', 2, 'Eliminar TipoAlimento', NULL, NULL, 1542726233, 1542726233),
('deleteVenda', 2, 'Eliminar Venda', NULL, NULL, 1542726233, 1542726233),
('readAlimento', 2, 'le um Alimento', NULL, NULL, 1542726233, 1542726233),
('readClassificacao', 2, 'le uma classificação', NULL, NULL, 1542726233, 1542726233),
('readEncomenda', 2, 'le uma encomenda', NULL, NULL, 1542726233, 1542726233),
('readMesa', 2, 'Ler Mesa', NULL, NULL, 1542726233, 1542726233),
('readReserva', 2, 'Ler Reserva', NULL, NULL, 1542726233, 1542726233),
('readTipoAlimento', 2, 'Ler TipoAlimento', NULL, NULL, 1542726233, 1542726233),
('readVenda', 2, 'Ler Venda', NULL, NULL, 1542726233, 1542726233),
('updateAlimento', 2, 'altera um Alimento', NULL, NULL, 1542726233, 1542726233),
('updateClassificacao', 2, 'altera uma classificação', NULL, NULL, 1542726233, 1542726233),
('updateEncomenda', 2, 'Altera uma encomenda', NULL, NULL, 1542726233, 1542726233),
('updateMesa', 2, 'Atualizar Mesa', NULL, NULL, 1542726233, 1542726233),
('updateReserva', 2, NULL, NULL, NULL, 1542726233, 1542726233),
('updateTipoAlimento', 2, 'Atualizar TipoAlimento', NULL, NULL, 1542726233, 1542726233),
('updateVenda', 2, 'Atualizar Venda', NULL, NULL, 1542726233, 1542726233);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'author'),
('author', 'createAlimento'),
('author', 'createClassificacao'),
('admin', 'createEncomenda'),
('author', 'createEncomenda'),
('admin', 'createMesa'),
('author', 'createMesa'),
('admin', 'createReserva'),
('author', 'createReserva'),
('admin', 'createTipoAlimento'),
('author', 'createVenda'),
('admin', 'deleteClassificacao'),
('author', 'deleteClassificacao'),
('admin', 'readAlimento'),
('author', 'readAlimento'),
('admin', 'readClassificacao'),
('author', 'readClassificacao'),
('admin', 'readEncomenda'),
('author', 'readEncomenda'),
('admin', 'readMesa'),
('author', 'readMesa'),
('admin', 'readReserva'),
('author', 'readReserva'),
('admin', 'readTipoAlimento'),
('author', 'readTipoAlimento'),
('admin', 'readVenda'),
('author', 'readVenda'),
('author', 'updateAlimento'),
('admin', 'updateClassificacao'),
('author', 'updateClassificacao'),
('admin', 'updateEncomenda'),
('author', 'updateEncomenda'),
('author', 'updateMesa'),
('admin', 'updateReserva'),
('author', 'updateReserva'),
('author', 'updateTipoAlimento'),
('author', 'updateVenda');

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `classificaçao`
--

DROP TABLE IF EXISTS `classificaçao`;
CREATE TABLE IF NOT EXISTS `classificaçao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero_estrelas` int(11) NOT NULL,
  `Descriçao` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(11) NOT NULL,
  `Nome` varchar(20) NOT NULL,
  `Telemovel` int(9) NOT NULL,
  `Morada` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `Nome`, `Telemovel`, `Morada`) VALUES
(1, 'aaa', 123457689, 'asdsadsa'),
(2, 'Utilizador', 123456789, 'fwarfwf'),
(13, 'wfwrfwr', 12414, 'fefwef'),
(22, 'afa', 9124555, 'rua do calra'),
(23, 'Ihor Kuzma', 911863654, 'Monte Real'),
(24, 'kuzomaaaaaaaaaa', 987654321, 'kuzomaaaaaaaaaa'),
(25, 'serhiy', 123456789, 'dsadasdas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `linhavenda`
--

DROP TABLE IF EXISTS `linhavenda`;
CREATE TABLE IF NOT EXISTS `linhavenda` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `id_alimento` int(100) NOT NULL,
  `quantidade` int(5) NOT NULL,
  `id_venda` int(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_alimento` (`id_alimento`,`id_venda`),
  KEY `id_venda` (`id_venda`)
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `linhavenda`
--

INSERT INTO `linhavenda` (`id`, `id_alimento`, `quantidade`, `id_venda`) VALUES
(1, 1, 3, 1),
(2, 1, 1, 1),
(3, 1, 0, 51),
(4, 1, 0, 51),
(5, 3, 0, 51),
(6, 2, 0, 5),
(7, 3, 0, 6),
(8, 2, 0, 52),
(9, 3, 0, 52),
(10, 3, 0, 9),
(11, 1, 0, 53),
(12, 2, 1, 54),
(13, 2, 1, 54),
(14, 3, 1, 54),
(15, 1, 1, 55),
(16, 2, 1, 55),
(17, 1, 1, 55),
(18, 1, 1, 55),
(19, 1, 1, 56),
(20, 1, 1, 56),
(21, 1, 1, 56),
(22, 3, 1, 56),
(23, 2, 1, 56),
(24, 1, 1, 56),
(25, 3, 1, 56),
(26, 3, 1, 56),
(27, 1, 1, 56),
(28, 1, 1, 56),
(29, 1, 1, 57),
(30, 1, 1, 57),
(31, 3, 1, 57),
(32, 1, 1, 57),
(33, 2, 1, 58),
(34, 3, 1, 58),
(35, 1, 1, 58),
(36, 1, 1, 58),
(37, 2, 1, 58),
(38, 1, 1, 59),
(39, 1, 1, 59),
(40, 1, 1, 62),
(41, 1, 1, 62),
(42, 1, 1, 62),
(43, 1, 1, 62),
(44, 2, 1, 65),
(45, 2, 1, 65),
(46, 1, 1, 65),
(47, 1, 1, 65),
(48, 1, 1, 65),
(49, 2, 13, 66),
(50, 1, 12, 66),
(52, 3, 12, 66),
(54, 1, 12, 66),
(55, 2, 12, 66),
(56, 2, 12, 67),
(57, 1, 12, 67),
(58, 3, 12, 67),
(59, 1, 12, 67),
(60, 1, 12, 67),
(61, 2, 12, 67),
(62, 1, 12, 67),
(63, 1, 12, 68),
(64, 1, 1, 68),
(65, 1, 1, 68),
(66, 1, 1, 68),
(67, 2, 1, 68),
(68, 2, 1, 68),
(69, 1, 12, 68),
(70, 1, 12, 68),
(71, 1, 1, 68),
(72, 1, 1, 68),
(73, 1, 1, 68),
(74, 1, 1, 68),
(75, 1, 1, 68),
(76, 1, 1, 69),
(77, 1, 1, 69),
(78, 1, 1, 70),
(79, 1, 1, 70),
(80, 1, 1, 71),
(81, 1, 1, 71),
(82, 1, 1, 72),
(83, 1, 1, 72),
(84, 1, 1, 72),
(85, 1, 1, 72),
(86, 1, 1, 72),
(87, 1, 1, 72),
(88, 1, 1, 72),
(89, 1, 1, 72),
(90, 1, 1, 72),
(91, 1, 2, 72),
(92, 1, 2, 73),
(93, 1, 2, 73),
(94, 1, 2, 73),
(95, 2, 2, 73),
(96, 1, 2, 73),
(97, 1, 2, 73),
(98, 1, 2, 73),
(99, 1, 2, 74),
(100, 1, 2, 74),
(101, 1, 1, 74),
(102, 1, 1, 74),
(103, 1, 1, 78),
(104, 1, 1, 78),
(105, 1, 1, 79),
(106, 1, 1, 79),
(107, 2, 1, 80),
(108, 2, 1, 80),
(109, 1, 1, 81),
(110, 1, 1, 81),
(111, 1, 1, 81),
(112, 1, 1, 81),
(113, 1, 1, 82),
(114, 1, 1, 82),
(115, 2, 1, 83),
(116, 1, 1, 84),
(117, 2, 1, 85),
(118, 2, 2, 86),
(119, 1, 2, 89),
(120, 2, 3, 89),
(121, 3, 1, 89),
(122, 1, 2, 93),
(123, 3, 1, 93),
(124, 2, 1, 93),
(125, 1, 3, 97),
(126, 3, 2, 97),
(127, 2, 1, 97),
(128, 1, 2, 99),
(129, 3, 1, 99),
(130, 2, 2, 101),
(131, 3, 1, 101),
(132, 1, 2, 103),
(133, 2, 2, 103),
(134, 3, 2, 103),
(135, 1, 2, 106),
(136, 3, 2, 106),
(137, 2, 1, 106),
(138, 2, 1, 108),
(139, 1, 1, 109),
(140, 1, 1, 110),
(141, 2, 1, 111),
(142, 1, 1, 112),
(143, 1, 1, 113),
(144, 2, 1, 114),
(145, 4, 1, 115),
(146, 4, 1, 116),
(147, 4, 1, 117),
(148, 4, 1, 118);

-- --------------------------------------------------------

--
-- Estrutura da tabela `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mesa`
--

DROP TABLE IF EXISTS `mesa`;
CREATE TABLE IF NOT EXISTS `mesa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Lugares` int(11) NOT NULL,
  `Reserva_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Mesa_Reserva1_idx` (`Reserva_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1542644638),
('m140602_111327_create_menu_table', 1542644658),
('m160312_050000_create_user', 1542644658),
('m140506_102106_rbac_init', 1542646335),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1542646335),
('m130524_201442_init', 1542724671),
('m181119_165426_init_rbac', 1542726233);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

DROP TABLE IF EXISTS `reserva`;
CREATE TABLE IF NOT EXISTS `reserva` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Numero_pessoas` int(11) NOT NULL,
  `Cliente_id` int(11) NOT NULL,
  `Data_reserva` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Reserva_Cliente_idx` (`Cliente_id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `reserva`
--

INSERT INTO `reserva` (`id`, `Numero_pessoas`, `Cliente_id`, `Data_reserva`) VALUES
(1, 2, 1, '2018-12-14'),
(5, 7, 1, '2017-12-14'),
(6, 6, 2, '2018-12-14'),
(7, 6, 2, '2017-12-14'),
(8, 5, 24, '2018-05-05'),
(9, 5, 24, '2018-05-05'),
(10, 98, 24, '2018-05-06'),
(11, 2, 24, '2018-05-06'),
(12, 5, 24, '2018-05-05'),
(13, 98, 2, '2018-05-06'),
(14, 25, 2, '2018-05-25'),
(15, 2, 2, '2018-05-05'),
(16, 2, 2, '2018-05-25'),
(17, 66, 2, '2018-05-25'),
(18, 5, 25, '2019-11-11'),
(19, 1, 25, '2019-11-11'),
(20, 2, 25, '2019-11-11'),
(21, 2, 25, '2019-01-01'),
(22, 2, 25, '2019-11-11'),
(23, 5, 25, '2019-11-11'),
(24, 5, 25, '2019-01-25'),
(25, 1, 25, '2019-01-22'),
(26, 5, 23, '2019-11-04'),
(27, 10, 23, '2019-12-24'),
(28, 12, 23, '2019-12-26'),
(29, 15, 23, '2019-12-24'),
(30, 10, 23, '2019-01-01'),
(31, 10, 23, '2019-01-01'),
(32, 25, 1, '2019-09-09'),
(33, 25, 1, '2019-09-09'),
(34, 25, 23, '2019-09-09'),
(35, 25, 23, '2019-09-09'),
(36, 25, 23, '2019-09-09'),
(37, 25, 23, '2019-02-02'),
(38, 25, 23, '2019-02-02'),
(39, 2, 23, '2019-02-02'),
(40, 2, 23, '2019-02-02'),
(41, 20, 23, '2020-01-01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipoalimento`
--

DROP TABLE IF EXISTS `tipoalimento`;
CREATE TABLE IF NOT EXISTS `tipoalimento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipoalimento`
--

INSERT INTO `tipoalimento` (`id`) VALUES
(1),
(2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipovenda`
--

DROP TABLE IF EXISTS `tipovenda`;
CREATE TABLE IF NOT EXISTS `tipovenda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipovenda`
--

INSERT INTO `tipovenda` (`id`, `descricao`) VALUES
(1, 'encomenda'),
(2, 'reserva');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Cy4mw9qJ-l7wWU3RJqpNo9ybeuYtUS49', '$2y$13$8rkf2wjvtiN1Tjx.thXMBONhwcGjAKmUfTJzxbtZ/fIcs5rcLD1DO', NULL, 'admin@admin.pt', 10, 1542726747, 1542726747),
(2, 'user', 'L2Qi8o9IcBJbsyE2orEWfJRTMpDug4ca', '$2y$13$QEex1kN6WyD7GdldfX4kgO9us451HQp5vGDKHaRxoIGdVw0SXCxgC', NULL, 'user@user.pt', 10, 1542820913, 1542820913),
(13, 'ccc', '4K0L2uR5iKUFJbDfzC5Sdv0kFbMH7FYN', '$2y$13$EwunopPnuoqA4EMHCXa.zOdVJlMOXph196k8MLLjmDR4y2SS1C4VO', NULL, 'kjgh@sad.com', 10, 1543842292, 1543842292),
(14, 'uuu', 'lr1sCRX-RL6bxZm9omn5eYEEXcSfoIf6', '$2y$13$s2r9tHsWBp/HtuTEeDt4a.IAF2AVEvT1.QvBT3IxoOGsevAFCiXxq', NULL, 'uuu@uuu.com', 10, 1543843852, 1543843852),
(15, 'ihor', '2QWFvT4dXiiBNS96TNBJHq3OHBkldhRN', '$2y$13$q1arjKyRqDkxUHAfvpf6Dul7FFSvOgFcralmlXAai9GfKhjIR25P2', NULL, 'ihor@ihot.com', 10, 1543843936, 1543843936),
(16, 'atuamae', 'mHdkFHpqEK7qCkQgZDw0uKd_65yMP4E8', '$2y$13$FDCAs6x6LOzUHPjOB3SxOefmAHGN/wg3TFWoR3OF3BaFmOikSyGRm', NULL, 'edsqddsaf@dsads.sad', 10, 1543844322, 1543844322),
(17, 'kjdf', 'o66Aa3-McgiYOAvwgxaAJTAp8rHGyXO_', '$2y$13$H7AlC2xk3fJ.RMF/5LYuvuhUCa1Cct7MAIvy4U6bgpEpSoWpbMgqa', NULL, 'diiuwr@hoieg.com', 10, 1543850198, 1543850198),
(18, 'asdadgoi', '9Xs1UuARl459FWNgvmYEscBWyRPzPiwG', '$2y$13$ztj2fNGBCB6j7qU0MCwzw.sqk7u.KZzfTI256qX9yVcFJNqK73Awy', NULL, 'sodighrwi@eoijgirw.com', 10, 1543853044, 1543853044),
(19, 'afiaho', 'ZbVCoT1Z0WqpFtby0PvD9gMUhuhmAv66', '$2y$13$pkmpXxF2CCcym/n4u3YWF.j8GsN/Q55B10d.pgI6lUGcBklhCvA6O', NULL, 'dgeg@peogr.com', 10, 1543853391, 1543853391),
(20, 'asdsafd', 'QytKkjPDf8ocDJ3WYsopkqCMGIQEIH4d', '$2y$13$WSpUmfK9e8V531NUYYz53ONqqaBT53wEKhxH57eUo3VNPytXfB2Ba', NULL, 'efirwefer@ofvoe.com', 10, 1543853457, 1543853457),
(21, 'fde', 'L7XmFHDt2DgpM8dXpPoWup0i-ZexqnYG', '$2y$13$zek6N5QvKWxDX/pv6Kw2/e7UyOWyljPsarbUVRTSyFtGrVNAweg/a', NULL, 'admin@eougouer.com', 10, 1543854115, 1543854115),
(22, 'ashfgasif', 'pEALwFJN85jmeb4n6nyiVEl1LKbrCLyx', '$2y$13$oeajB8qXzqrMTXExOq2yVeNJy7UbToFMwhKeL4F4iR53.8UDzuvD6', NULL, 'sodihos@sfjgsadfe.com', 10, 1543856166, 1543856166),
(23, 'kuzma', 'w6aZBqVoHtECjB9mFkubLDpYwPmhsTVu', '$2y$13$.ucKqj8WYpEX6flQprPOEOV/vRRbjQWwxs5.Ity9Zj5nWJ2WZcnuq', NULL, 'kuzma@kuzma.com', 10, 1545250843, 1545250843),
(24, 'kuzomaaaaaaaaaa', 'D6cFFAuPCCVl78MAMBOiypIuyAcvxzaV', '$2y$13$/ht78xXZoQxhAIkLkkNLPOE6iE9d8RMEgc.F7bMnZ7kks74lsU/.q', NULL, 'kuzomaaaaaaaaaa@kuzomaaaaaaaaaa.com', 10, 1545581953, 1545581953),
(25, 'serhiy', 'JiAvgP2tItwKfqB0xZ7YpeQ0K6pRGPoV', '$2y$13$knshxRTDp/cmgTVR3Aos/urrro5PcYUinijE8cI.Bs8x4YknZCyKW', NULL, 'serhiy@serhiy.com', 10, 1548187866, 1548187866);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

DROP TABLE IF EXISTS `vendas`;
CREATE TABLE IF NOT EXISTS `vendas` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `Cliente_id` int(11) NOT NULL,
  `Tipo_venda_id` int(11) NOT NULL,
  `id_mesa` int(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Vendas_Cliente1_idx` (`Cliente_id`),
  KEY `fk_Vendas_Tipo_venda1_idx` (`Tipo_venda_id`),
  KEY `id_mesa` (`id_mesa`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id`, `Cliente_id`, `Tipo_venda_id`, `id_mesa`) VALUES
(1, 22, 1, 0),
(2, 1, 1, 0),
(3, 1, 1, 0),
(4, 1, 1, 0),
(5, 1, 1, 0),
(6, 1, 1, 0),
(7, 1, 1, 0),
(8, 1, 1, 0),
(9, 1, 1, 0),
(10, 1, 1, 0),
(11, 1, 1, 0),
(12, 1, 1, 0),
(18, 1, 1, 0),
(19, 1, 2, 0),
(20, 1, 2, 0),
(21, 1, 1, 0),
(22, 1, 1, 0),
(23, 1, 1, 0),
(24, 1, 1, 0),
(25, 1, 1, 0),
(26, 1, 1, 0),
(27, 1, 1, 0),
(28, 2, 1, 0),
(29, 2, 1, 0),
(30, 2, 1, 0),
(31, 2, 1, 0),
(32, 2, 1, 0),
(33, 2, 1, 0),
(34, 2, 1, 0),
(35, 2, 1, 0),
(36, 2, 1, 0),
(37, 2, 1, 0),
(38, 2, 1, 0),
(39, 2, 1, 0),
(40, 2, 1, 0),
(41, 2, 1, 0),
(42, 2, 1, 0),
(43, 2, 1, 0),
(44, 2, 1, 0),
(45, 2, 1, 0),
(46, 2, 1, 0),
(47, 2, 1, 0),
(48, 2, 1, 0),
(49, 2, 1, 0),
(50, 2, 1, 0),
(51, 2, 1, 0),
(52, 2, 1, 0),
(53, 2, 1, 0),
(54, 2, 1, 0),
(55, 2, 1, 0),
(56, 2, 1, 0),
(57, 2, 1, 0),
(58, 2, 1, 0),
(59, 1, 1, 0),
(60, 1, 1, 0),
(61, 1, 1, 0),
(62, 1, 1, 0),
(63, 1, 1, 0),
(64, 1, 1, 0),
(65, 1, 1, 0),
(66, 1, 1, 0),
(67, 1, 1, 0),
(68, 1, 1, 0),
(69, 1, 1, 0),
(70, 1, 1, 0),
(71, 1, 1, 0),
(72, 1, 1, 0),
(73, 1, 1, 0),
(74, 1, 1, 0),
(75, 1, 1, 0),
(76, 1, 1, 0),
(77, 1, 1, 0),
(78, 1, 1, 0),
(79, 1, 1, 0),
(80, 1, 1, 0),
(81, 1, 1, 0),
(82, 1, 1, 0),
(83, 1, 1, 0),
(84, 1, 1, 0),
(85, 1, 1, 0),
(86, 1, 1, 0),
(87, 1, 1, 0),
(88, 1, 1, 0),
(89, 1, 1, 0),
(90, 1, 1, 0),
(91, 1, 1, 0),
(92, 2, 1, 0),
(93, 24, 1, 0),
(94, 24, 1, 0),
(95, 24, 1, 0),
(96, 2, 1, 0),
(97, 24, 1, 0),
(98, 24, 1, 0),
(99, 24, 1, 0),
(100, 2, 1, 0),
(101, 25, 1, 0),
(102, 25, 1, 0),
(103, 25, 1, 0),
(104, 25, 1, 0),
(105, 25, 1, 0),
(106, 2, 1, 0),
(107, 23, 1, 0),
(108, 23, 1, 0),
(109, 23, 1, 0),
(110, 23, 1, 0),
(111, 23, 1, 0),
(112, 23, 1, 0),
(113, 23, 1, 0),
(114, 23, 1, 0),
(115, 23, 1, 0),
(116, 23, 1, 0),
(117, 23, 1, 0),
(118, 23, 1, 0);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `alimento`
--
ALTER TABLE `alimento`
  ADD CONSTRAINT `fk_Alimento_Tipo_Alimento1` FOREIGN KEY (`Tipo_Alimento_id`) REFERENCES `tipoalimento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Limitadores para a tabela `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`);

--
-- Limitadores para a tabela `linhavenda`
--
ALTER TABLE `linhavenda`
  ADD CONSTRAINT `linhavenda_ibfk_1` FOREIGN KEY (`id_venda`) REFERENCES `vendas` (`id`),
  ADD CONSTRAINT `linhavenda_ibfk_2` FOREIGN KEY (`id_alimento`) REFERENCES `alimento` (`id`);

--
-- Limitadores para a tabela `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Limitadores para a tabela `mesa`
--
ALTER TABLE `mesa`
  ADD CONSTRAINT `FK_id` FOREIGN KEY (`id`) REFERENCES `vendas` (`id_mesa`),
  ADD CONSTRAINT `fk_Mesa_Reserva1` FOREIGN KEY (`Reserva_id`) REFERENCES `reserva` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`Cliente_id`) REFERENCES `user` (`id`);

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `fk_Vendas_Tipo_venda1` FOREIGN KEY (`Tipo_venda_id`) REFERENCES `tipovenda` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `vendas_ibfk_1` FOREIGN KEY (`Cliente_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
