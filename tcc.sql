-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Tempo de geração: 24-Set-2025 às 00:06
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `nome` varchar(15) NOT NULL,
  `classificacao` int(2) NOT NULL,
  `texto` text NOT NULL,
  `salvos` varchar(1) NOT NULL,
  `curtida` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `post`
--

INSERT INTO `post` (`id`, `foto`, `nome`, `classificacao`, `texto`, `salvos`, `curtida`) VALUES
(0, 'img/no_login.png', 'eu', 10, 'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla', '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuaria`
--

CREATE TABLE `usuaria` (
  `foto` varchar(30) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `datanas` date NOT NULL,
  `idade` int(2) NOT NULL,
  `senha` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuaria`
--

INSERT INTO `usuaria` (`foto`, `nome`, `username`, `datanas`, `idade`, `senha`) VALUES
('img/no_login.png', 'kkk', 'kkk', '2007-09-26', 17, '$2y$10$MKYeDhR40O9eFU5JZKINXe3UuOOeyJ7Z4xGm8Lp5at9LyBojRxIaq'),
('img/no_login.png', 'teste', 'teste123', '2013-03-12', 12, '$2y$10$69FtOw4UNNdiXLcArOEKAePYsjH2mEMDQ.1jEsam4D9.0vdGhw57O');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuaria`
--
ALTER TABLE `usuaria`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
