-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Ago-2022 às 04:16
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistema`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comum`
--

CREATE TABLE `comum` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `senha` varchar(30) DEFAULT NULL,
  `valor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `comum`
--

INSERT INTO `comum` (`id`, `nome`, `cpf`, `email`, `senha`, `valor`) VALUES
(1, 'Fulano', 'teste', 'root', '123456', 24),
(2, 'ea', 'as', 'root', '123456', 0),
(3, 'egge', 'gege', 'root', '123456', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lojista`
--

CREATE TABLE `lojista` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) DEFAULT NULL,
  `cnpj` varchar(20) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `senha` varchar(30) DEFAULT NULL,
  `valor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `lojista`
--

INSERT INTO `lojista` (`id`, `nome`, `cnpj`, `email`, `senha`, `valor`) VALUES
(1, 'lojista', '4334', 'root', '123456', 32),
(2, 'lojistaaaaaa', '4334aaa', 'root', '123456', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `comum`
--
ALTER TABLE `comum`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `lojista`
--
ALTER TABLE `lojista`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `comum`
--
ALTER TABLE `comum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `lojista`
--
ALTER TABLE `lojista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
