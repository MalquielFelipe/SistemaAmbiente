-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11/06/2025 às 18:48
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_ambiente`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_ambiente`
--

CREATE TABLE `tb_ambiente` (
  `id_ambiente` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `capacidade` int(11) NOT NULL,
  `fk_bloco` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tb_ambiente`
--

INSERT INTO `tb_ambiente` (`id_ambiente`, `nome`, `tipo`, `capacidade`, `fk_bloco`) VALUES
(9, 'A', 'A', 23, 1),
(10, 'Professor', 'LABORATORIO', 34, 3),
(11, 'Aluno', 'SALA_DE_AULA', 45, 7);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_bloco_ambiente`
--

CREATE TABLE `tb_bloco_ambiente` (
  `id_bloco` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tb_bloco_ambiente`
--

INSERT INTO `tb_bloco_ambiente` (`id_bloco`, `descricao`) VALUES
(1, 'Térreo 1'),
(2, 'Primeiro Andar'),
(3, 'Bloco 2'),
(4, 'Bloco '),
(5, 'Bloco3'),
(6, 'Bloco4'),
(7, 'Bloco 5'),
(8, 'Bloco 6'),
(9, 'Bloco 1'),
(10, '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_reserva`
--

CREATE TABLE `tb_reserva` (
  `id` int(11) NOT NULL,
  `horario` datetime NOT NULL,
  `horario_fim` datetime NOT NULL,
  `fk_ambiente` int(11) NOT NULL,
  `fk_cpf` char(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tb_reserva`
--

INSERT INTO `tb_reserva` (`id`, `horario`, `horario_fim`, `fk_ambiente`, `fk_cpf`) VALUES
(2, '2025-05-05 01:55:00', '2025-05-31 22:06:14', 9, '222222222'),
(4, '2025-06-06 16:54:00', '2025-06-07 16:54:00', 9, '123');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `cpf` char(14) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` char(11) DEFAULT NULL,
  `tipo_usuario` varchar(100) NOT NULL,
  `senha` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`cpf`, `nome`, `email`, `telefone`, `tipo_usuario`, `senha`) VALUES
('123', 'Malq', 'malq@gmail.com', '123', '1', '123456'),
('16794184087', 'Marcelo Macedo', 'Mac@gmail.com', '(45)3444223', 'Professor', '678'),
('213', 'Anna', 'fg@gmail.com', '2233445', '3', '123'),
('222222222', 'malloln', 'wlod@gmail', '2233445', '3', '134'),
('35149442020', 'JEAN MARCELO', 'JEAN@GMAIL.COM', '4533377777', 'ALUNO', '789'),
('81405963026', 'Joao Macedo', 'joa@gmail.com', '(45)2345121', 'Assistente', '456'),
('vd', 'sgdf', 'fg@gmail.com', '2233445', 'gsd', 'sgd');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_ambiente`
--
ALTER TABLE `tb_ambiente`
  ADD PRIMARY KEY (`id_ambiente`),
  ADD KEY `fk_bloco` (`fk_bloco`);

--
-- Índices de tabela `tb_bloco_ambiente`
--
ALTER TABLE `tb_bloco_ambiente`
  ADD PRIMARY KEY (`id_bloco`);

--
-- Índices de tabela `tb_reserva`
--
ALTER TABLE `tb_reserva`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ambiente` (`fk_ambiente`),
  ADD KEY `fk_cpf` (`fk_cpf`);

--
-- Índices de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`cpf`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_ambiente`
--
ALTER TABLE `tb_ambiente`
  MODIFY `id_ambiente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `tb_bloco_ambiente`
--
ALTER TABLE `tb_bloco_ambiente`
  MODIFY `id_bloco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tb_reserva`
--
ALTER TABLE `tb_reserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tb_ambiente`
--
ALTER TABLE `tb_ambiente`
  ADD CONSTRAINT `tb_ambiente_ibfk_1` FOREIGN KEY (`fk_bloco`) REFERENCES `tb_bloco_ambiente` (`id_bloco`);

--
-- Restrições para tabelas `tb_reserva`
--
ALTER TABLE `tb_reserva`
  ADD CONSTRAINT `tb_reserva_ibfk_1` FOREIGN KEY (`fk_ambiente`) REFERENCES `tb_ambiente` (`id_ambiente`),
  ADD CONSTRAINT `tb_reserva_ibfk_2` FOREIGN KEY (`fk_cpf`) REFERENCES `tb_usuario` (`cpf`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
