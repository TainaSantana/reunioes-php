-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Out-2020 às 02:45
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `reunioes`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ata_cad`
--

CREATE TABLE `ata_cad` (
  `id` int(10) NOT NULL,
  `reu_titulo` varchar(250) DEFAULT 'NULL',
  `ata_descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ata_cad`
--

INSERT INTO `ata_cad` (`id`, `reu_titulo`, `ata_descricao`) VALUES
(1, NULL, 'teste da tabela ata');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_ata`
--

CREATE TABLE `cad_ata` (
  `id` int(10) NOT NULL,
  `pauta_descricao` text NOT NULL,
  `pauta_criado_em` datetime NOT NULL DEFAULT current_timestamp(),
  `pauta_atualizado_em` datetime DEFAULT NULL,
  `fk_reuniao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cad_ata`
--

INSERT INTO `cad_ata` (`id`, `pauta_descricao`, `pauta_criado_em`, `pauta_atualizado_em`, `fk_reuniao`) VALUES
(1, 'Na reuniao foi tratado sobre tais e tais assuntos', '2020-08-28 00:46:25', NULL, 1),
(2, 'renuao 2', '2020-08-28 01:02:26', NULL, 2),
(3, 'essa reuniao tratou de varios nadas', '2020-08-28 01:05:58', NULL, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_reuniao`
--

CREATE TABLE `cad_reuniao` (
  `reu_id` int(10) NOT NULL,
  `reu_titulo` varchar(255) NOT NULL,
  `reu_data_inicio` date DEFAULT NULL,
  `reu_hora_inicio` time DEFAULT NULL,
  `reu_data_fim` date DEFAULT NULL,
  `reu_hora_fim` time DEFAULT NULL,
  `reu_descricao` text NOT NULL,
  `reu_pauta` text NOT NULL,
  `reu_criado_em` datetime NOT NULL DEFAULT current_timestamp(),
  `reu_atualizado_rem` datetime DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `slug` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cad_reuniao`
--

INSERT INTO `cad_reuniao` (`reu_id`, `reu_titulo`, `reu_data_inicio`, `reu_hora_inicio`, `reu_data_fim`, `reu_hora_fim`, `reu_descricao`, `reu_pauta`, `reu_criado_em`, `reu_atualizado_rem`, `email`, `slug`) VALUES
(1, 'Reuniao para discutir o PHP Part 3', '2020-08-27', '10:00:00', '2020-08-27', '15:00:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', ' Cras neque tortor, semper a commodo eget, auctor sit amet eros. Etiam egestas in felis at venenatis. Suspendisse malesuada, ante blandit euismod efficitur, mauris ipsum euismod nisi, sit amet cursus magna metus nec leo. Pellentesque maximus quam ut nisi volutpat bibendum vitae quis augue.', '2020-08-26 23:27:20', '2020-09-12 01:44:02', 'tmz@gmail.com', 'reuniao-php'),
(2, 'Nunc ut libero sed tellus fermentum facilisis vel in felis', '2020-08-28', '05:42:00', '2020-08-28', '06:42:00', 'Nunc malesuada nisi eget varius tempus. Suspendisse sed nibh ac ligula ullamcorper tempor eu in elit.', 'Aliquam aliquam nunc magna, vel feugiat est commodo et. Suspendisse tincidunt urna id tincidunt gravida. Quisque porttitor, risus non semper imperdiet, ante massa posuere lorem, ac dapibus enim turpis ac enim. Vivamus eget elementum elit.', '2020-08-27 01:42:20', '2020-09-11 23:51:49', 'hrhte5h@gmail.com', 'teste-de-form'),
(3, 'Reuniao de teste do PDO', '2020-08-25', '10:00:00', '2020-08-25', '15:00:00', 'In fringilla quam purus, in feugiat augue condimentum in. Morbi pharetra massa nec felis vulputate, eget ornare nisi elementum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. ', ' Vestibulum ac venenatis felis. In porta purus lorem, at varius quam tincidunt at. Quisque eget neque fermentum, vulputate nisi eget, volutpat risus. Nulla vitae metus at quam aliquam luctus sit amet a velit. Fusce sit amet tellus ut quam efficitur suscipit in porttitor ligula. Quisque commodo blandit felis sit amet euismod. Aenean sagittis efficitur accumsan.', '2020-08-28 01:05:03', NULL, NULL, 'reuniao-pdo'),
(4, 'Reuniao de testes', '2020-09-10', '05:45:00', '2020-09-10', '05:45:00', 'Reuniao de teste', 'Donec et dui varius, elementum neque quis, dictum augue. Quisque sed placerat eros. Morbi ac sem eros. Quisque non purus lectus. Morbi ligula lorem, blandit nec maximus a, placerat id metus. Nulla interdum arcu felis, eget scelerisque nunc elementum sed.', '2020-09-03 02:46:03', NULL, 'teste124@gmail.com', ''),
(5, 'teste de cadastro do site', '2020-09-14', '19:35:00', '2020-09-21', '20:35:00', 'Pellentesque pretium ac leo ut mattis. Nam vehicula, ligula ut auctor tincidunt, nibh quam tristique sem, at finibus nibh risus nec urna. Suspendisse potenti.', 'Nullam facilisis fermentum vehicula. Suspendisse eget mauris id nisl sollicitudin ultrices. Phasellus in magna venenatis, egestas tortor in, dignissim elit. Nulla facilisi. Phasellus ac orci libero. Sed eget aliquam nibh, eget sagittis velit. Nulla sed cursus tellus, vitae elementum nulla.', '2020-09-03 15:35:57', NULL, 'tj@gmail.com', ''),
(6, 'teste no lds-tes', '2020-09-21', '20:37:00', '2020-09-22', '21:37:00', 'teste de lsd cadastro', 'Praesent ut massa ac eros condimentum blandit. Curabitur sed tincidunt massa. Pellentesque interdum mi augue, sit amet mollis lectus tristique vel. Cras tempor viverra neque. Ut dapibus neque odio, id porta risus dapibus sit amet.\r\n\r\n', '2020-09-03 15:37:44', NULL, 'tj@gmail.com', ''),
(7, 'Teste de cadastro de formulários', '2020-09-03', '17:26:00', '2020-09-07', '19:26:00', 'Donec eget condimentum tortor. Sed ac dolor sem. Vivamus ut diam nunc.  ', 'Nam consectetur mauris id nulla lobortis rhoncus. Morbi volutpat dolor sit amet lectus accumsan interdum. Sed consectetur ipsum quis tincidunt tristique. Sed hendrerit iaculis ante, non scelerisque arcu luctus quis. Sed molestie eget odio non suscipit.', '2020-09-03 17:26:42', NULL, 'tj@gmail.com', ''),
(8, 'Reuniao para processar php', '2020-09-07', '20:36:00', '2020-09-07', '19:36:00', 'Pellentesque pretium ac leo ut mattis. Nam vehicula, ligula ut auctor tincidunt, nibh quam tristique sem, at finibus nibh risus nec urna. ', 'Suspendisse potenti. Nullam facilisis fermentum vehicula. Suspendisse eget mauris id nisl sollicitudin ultrices. Phasellus in magna venenatis, egestas tortor in, dignissim elit. Nulla facilisi.', '2020-09-03 17:39:09', NULL, 'tj@gmail.com', ''),
(9, 'Reuniao de teste de form', '2020-09-07', '19:41:00', '2020-09-07', '19:41:00', 'Phasellus ac orci libero. Sed eget aliquam nibh, eget sagittis velit. Nulla sed cursus tellus, vitae elementum nulla.', ' Praesent ut massa ac eros condimentum blandit. Curabitur sed tincidunt massa. Pellentesque interdum mi augue, sit amet mollis lectus tristique vel. Cras tempor viverra neque. Ut dapibus neque odio, id porta risus dapibus sit amet.', '2020-09-03 17:41:43', NULL, 'tj@gmail.com', ''),
(12, 'Reuniao de cadastro mais email', '2020-09-04', '19:59:00', '2020-09-07', '19:59:00', 'Donec eget condimentum tortor. Sed ac dolor sem. Vivamus ut diam nunc. Nam consectetur mauris id nulla lobortis rhoncus. Morbi volutpat dolor sit amet lectus accumsan interdum.', 'Sed consectetur ipsum quis tincidunt tristique. Sed hendrerit iaculis ante, non scelerisque arcu luctus quis. Sed molestie eget odio non suscipit. Donec et nibh ac ex dictum congue. Etiam porta, lectus ut tristique placerat, neque felis imperdiet eros, id lacinia mauris justo id quam.', '2020-09-03 18:08:41', NULL, 'teste@teste.com', ''),
(13, 'Reuniao para testar se esta cadastrando', '2020-09-14', '07:15:00', '2020-09-21', '04:19:00', 'Reuniao para testar se esta cadastrando no banco de dados', 'Sed tempus ornare sapien at vehicula. Vestibulum placerat, neque nec cursus aliquet, massa mauris bibendum velit, vitae finibus lectus lectus in diam. Mauris urna enim, lacinia id rhoncus vel, placerat ut nunc.', '2020-09-12 01:15:48', NULL, 'teste', ''),
(14, 'Testar campo de textarea', '2020-09-21', '06:18:00', '2020-09-22', '05:18:00', 'Donec vel nisi enim. Aenean dignissim, arcu nec tincidunt maximus, sem elit aliquet est, quis sodales leo metus sit amet nulla. ', 'Phasellus facilisis arcu eros, vitae posuere justo posuere nec. Praesent gravida augue at velit pretium volutpat. Fusce egestas finibus urna, non finibus magna porttitor eu. Suspendisse potenti. Vivamus hendrerit hendrerit enim sit amet consectetur. Nullam ligula arcu, aliquet non eros finibus, hendrerit tempus nisi. Vivamus in arcu nec purus suscipit dapibus imperdiet et tellus.', '2020-09-12 01:18:41', NULL, 'teste', ''),
(15, 'Reuniao para testar pauta', '2020-09-21', '04:30:00', '2020-09-14', '04:30:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras neque tortor, semper a commodo eget, auctor sit amet eros. Etiam egestas in felis at venenatis.', 'Suspendisse malesuada, ante blandit euismod efficitur, mauris ipsum euismod nisi, sit amet cursus magna metus nec leo. Pellentesque maximus quam ut nisi volutpat bibendum vitae quis augue. Nunc ut libero sed tellus fermentum facilisis vel in felis. Nunc malesuada nisi eget varius tempus. Suspendisse sed nibh ac ligula ullamcorper tempor eu in elit. Aliquam aliquam nunc magna, vel feugiat est commodo et. Suspendisse tincidunt urna id tincidunt gravida.', '2020-09-12 01:30:47', NULL, '', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `ata_cad`
--
ALTER TABLE `ata_cad`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cad_ata`
--
ALTER TABLE `cad_ata`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reuniao` (`fk_reuniao`);

--
-- Índices para tabela `cad_reuniao`
--
ALTER TABLE `cad_reuniao`
  ADD PRIMARY KEY (`reu_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `ata_cad`
--
ALTER TABLE `ata_cad`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `cad_ata`
--
ALTER TABLE `cad_ata`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `cad_reuniao`
--
ALTER TABLE `cad_reuniao`
  MODIFY `reu_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cad_ata`
--
ALTER TABLE `cad_ata`
  ADD CONSTRAINT `fk_reuniao` FOREIGN KEY (`fk_reuniao`) REFERENCES `cad_reuniao` (`reu_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
