-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29/09/2023 às 00:10
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `portalaluno`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluno`
--

CREATE TABLE `aluno` (
  `RA` varchar(13) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `CPF` char(11) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `primeiro_acesso` bit(1) NOT NULL,
  `token` varchar(64) NULL,
  `expiracao_token` datetime NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `aluno`
--

INSERT INTO `aluno` (`RA`, `nome`, `CPF`, `data_nascimento`, `email`, `telefone`, `senha`, `primeiro_acesso`) VALUES
('', '', '', '0000-00-00', '', '', '$2y$10$yWkNbjK5hEzfdKcPQqkKDuiSLWC2mWMSYmg3RlPLzTT', b'1'),
('2920148521255', 'Helio Jesus', '36987145823', '2005-08-15', 'Helio@fatec.com', '11852469853', '$2y$10$87ddLFn.GcwBpSIsqLKmz.9xkzcAAa2MHpATBC0svWT', b'1'),
('2920482111009', 'Lais Teixeira', '39871726813', '1993-03-12', 'laiscostast@fatec.com', '11994853110', '$2y$10$thj0uwxGR2DsdBlFt46xGuV.GAVsC.A2xt2AEhE7ScE', b'0'),
('2920482111030', 'Marcos Berto', '39871726589', '2001-11-24', 'marcos@berto.com', '119958422165', '$2y$10$dYZEDWKsoYtxZIVo7lBywudeCMBLchRXHmf4FZU1POU', b'0'),
('2920482111225', 'Lais Pereira', '39871726813', '2005-11-13', 'lais@fatec.com', '11994853110', '$2y$10$U.7Lzew1X2OqeJDoRz4czOUrI0FE0oMAQYXsxyffWPK', b'0');

-- --------------------------------------------------------

--
-- Estrutura para tabela `curso`
--

CREATE TABLE `curso` (
  `cod_curso` int(11) NOT NULL,
  `nome_curso` varchar(20) DEFAULT NULL,
  `turno` varchar(20) DEFAULT NULL,
  `duracao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `dia_semana`
--

CREATE TABLE `dia_semana` (
  `cod_dia_semana` int(11) NOT NULL,
  `dia_semana` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `dia_semana`
--

INSERT INTO `dia_semana` (`cod_dia_semana`, `dia_semana`) VALUES
(1, 'Segunda-Feira'),
(2, 'Terça-Feira'),
(3, 'Quarta-Feira'),
(4, 'Quinta-Feira'),
(5, 'Sexta-Feira'),
(6, 'Sábado'),
(7, 'Domingo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `cod_disciplina` int(11) NOT NULL,
  `nome_disciplina` varchar(20) DEFAULT NULL,
  `carga_horaria` int(11) DEFAULT NULL,
  `duracao` int(11) DEFAULT NULL,
  `semestre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `horario`
--

CREATE TABLE `horario` (
  `cod_horario` int(11) NOT NULL,
  `hora` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `professor`
--

CREATE TABLE `professor` (
  `cod_professor` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`RA`);

--
-- Índices de tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`cod_curso`);

--
-- Índices de tabela `dia_semana`
--
ALTER TABLE `dia_semana`
  ADD PRIMARY KEY (`cod_dia_semana`);

--
-- Índices de tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`cod_disciplina`);

--
-- Índices de tabela `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`cod_horario`);

--
-- Índices de tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`cod_professor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
