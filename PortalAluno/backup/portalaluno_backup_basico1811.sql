-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19/11/2023 às 00:38
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
  `senha` varchar(100) DEFAULT NULL,
  `primeiro_acesso` int(1) NOT NULL,
  `token` varchar(64) DEFAULT NULL,
  `expiracao_token` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `aluno`
--

INSERT INTO `aluno` (`RA`, `nome`, `CPF`, `data_nascimento`, `email`, `telefone`, `senha`, `primeiro_acesso`, `token`, `expiracao_token`) VALUES
('2920482111009', 'Lais Berto Teixeira', '39871726894', '1993-12-02', 'laiscostast2@gmail.com', '11885654562', '85d733a2bbcf57d8b5db7bad387597980567d2f5ac832ad3548d4bb01dd5658c', 0, '9741caae08572ed64ade6d2abf09a727fb67249a50760edd4ed9f4d9a4c888d7', '2023-11-13 16:02:24'),
('2920482111030', 'Marcos Berto', '12345678985', '2001-11-24', 'laiscostast3@gmail.com', '11665874423', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 0, '263e2b9a244e59abd38ca38cdd0bdcca92f5728dfe1bb3fcf0c6a79156737754', '2023-11-17 19:04:17');

-- --------------------------------------------------------

--
-- Estrutura para tabela `calendario`
--

CREATE TABLE `calendario` (
  `id` int(30) NOT NULL,
  `ra` varchar(13) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `color` varchar(15) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `calendario`
--

INSERT INTO `calendario` (`id`, `ra`, `title`, `description`, `color`, `start`, `end`) VALUES
(66, '2920482111009', 'Show RBD', 'Show do RBD no morumbi', 'red', '2023-11-13 00:00:00', '2023-11-13 00:01:00'),
(69, '2920482111009', 'teste automacao', 'teste', 'gray', '2023-11-15 00:00:00', '2023-11-15 00:01:00'),
(70, '2920482111030', 'Aniversário', 'Meu aniversário', 'green', '2023-11-24 00:00:00', '2023-11-24 23:59:00'),
(71, '2920482111030', 'Jantar ANiversário', 'Jantar de aniversário com a Lais', 'red', '2023-11-24 20:00:00', '2023-11-24 20:01:00'),
(72, '2920482111030', 'ghjhgj', 'jhjhgj', 'blue', '2023-11-19 00:00:00', '2023-11-19 00:01:00'),
(73, '2920482111009', 'dsfdszf', 'dfdfdf', 'gray', '2023-11-19 00:00:00', '2023-11-19 00:01:00');

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
  `cod_disciplina` varchar(15) NOT NULL,
  `nome_disciplina` varchar(200) DEFAULT NULL,
  `carga` int(11) DEFAULT NULL,
  `cod_professor` int(11) NOT NULL,
  `semestre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `disciplina`
--

INSERT INTO `disciplina` (`cod_disciplina`, `nome_disciplina`, `carga`, `cod_professor`, `semestre`) VALUES
('Alg000', 'Algoritmos Lógica Programação', 80, 2, 1),
('Arq000', 'Arquitetura Organização Computadores', 80, 2, 1),
('Ban000', 'Banco Dados', 80, 7, 3),
('Com000', 'Computação Cognitiva', 80, 2, 6),
('Con000', 'Contabilidade', 40, 15, 2),
('Des000', 'Desenvolvimento Sistemas', 40, 2, 4),
('Emp000', 'Empreendedorismo', 40, 2, 1),
('Eng000', 'Engenharia Software I', 80, 11, 2),
('Eng001', 'Engenharia Software II', 80, 2, 3),
('Eng002', 'Engenharia Software III', 80, 2, 4),
('Est000', 'Estágio Supervisionado', 240, 10, 6),
('Est001', 'Estatística Aplicada', 80, 8, 2),
('Est002', 'Estruturas Dados', 80, 4, 3),
('Éti000', 'Ética Responsabilidade Profissional', 40, 2, 2),
('Ges000', 'Gestão Projetos', 80, 2, 5),
('Ges001', 'Gestão Equipes', 40, 2, 4),
('Ges002', 'Gestão Governança Tecnologia Informação', 40, 9, 6),
('Ing000', 'Inglês I', 40, 13, 1),
('Ing001', 'Inglês II', 40, 13, 2),
('Ing002', 'Inglês III', 40, 13, 3),
('Ing003', 'Inglês IV', 40, 13, 4),
('Ing004', 'Inglês V', 40, 10, 5),
('Ing005', 'Inglês VI', 40, 10, 6),
('Int000', 'Internet Coisas', 40, 12, 6),
('Int001', 'Inteligência Emocional Autoconhecimento', 40, 2, 1),
('Int002', 'Introdução ao Desenvolvimento Sistemas', 80, 2, 1),
('Int003', 'Interação Humano Computador', 40, 12, 3),
('Int004', 'Inteligência Artificial', 80, 2, 5),
('Lab000', 'Laboratório Banco Dados', 80, 7, 4),
('Lab001', 'Laboratório Engenharia Software', 80, 6, 6),
('Mat000', 'Matemática Discreta', 80, 15, 1),
('Met000', 'Metodologia Pesquisa Científico-tecnológica', 40, 3, 1),
('Pla000', 'Planejamento Financeiro', 40, 15, 3),
('Pro000', 'Programação para WEB', 80, 1, 3),
('Pro001', 'Programação Orientada a Objetos', 80, 2, 2),
('Pro002', 'Programação para Dispositivos Móveis I', 80, 4, 4),
('Pro003', 'Programação para Dispositivos Móveis II', 80, 4, 5),
('Pro004', 'Projeto Integrador I', 40, 2, 1),
('Pro005', 'Projeto Integrador II', 40, 2, 2),
('Pro006', 'Projeto Integrador III', 40, 2, 3),
('Pro007', 'Projeto Integrador IV', 40, 2, 4),
('Red000', 'Redes Computadores', 80, 12, 5),
('Seg000', 'Segurança Informação', 40, 6, 6),
('Sis000', 'Sistemas Distribuídos', 40, 9, 5),
('Sis001', 'Sistemas Informação', 80, 2, 2),
('Sis002', 'Sistemas Operacionais', 80, 2, 4),
('Tes000', 'Teste Software', 80, 6, 5),
('Tóp000', 'Tópicos em Bancos Dados Big Data', 80, 7, 6),
('Vis000', 'Visão Computacional', 80, 9, 6);

--
-- Acionadores `disciplina`
--
DELIMITER $$
CREATE TRIGGER `before_insert_disciplina` BEFORE INSERT ON `disciplina` FOR EACH ROW BEGIN
    SET NEW.nome_disciplina = REPLACE(NEW.nome_disciplina, ' de ', ' ');
    SET NEW.nome_disciplina = REPLACE(NEW.nome_disciplina, ' e ', ' ');
    SET NEW.nome_disciplina = REPLACE(NEW.nome_disciplina, ' da ', ' ');
    SET NEW.nome_disciplina = REPLACE(NEW.nome_disciplina, ' das ', ' ');

    SET @prefixo = SUBSTRING_INDEX(NEW.nome_disciplina, ' ', 3);
    SET @prefixo = LPAD(COALESCE(@prefixo, 'XXX'), 3, 'X');

    SET @contador = (SELECT COALESCE(MAX(CAST(SUBSTRING(cod_disciplina, 4) AS SIGNED)), -1) + 1 FROM disciplina WHERE cod_disciplina LIKE CONCAT(@prefixo, '%'));
    SET NEW.cod_disciplina = CONCAT(@prefixo, LPAD(@contador, 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `historico`
--

CREATE TABLE `historico` (
  `cod_historico` int(11) NOT NULL,
  `RA` varchar(13) NOT NULL,
  `cod_disciplina` varchar(15) NOT NULL,
  `media_final` float NOT NULL,
  `frequencia` decimal(10,0) NOT NULL,
  `aprovado` tinyint(1) NOT NULL,
  `observacao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `historico`
--

INSERT INTO `historico` (`cod_historico`, `RA`, `cod_disciplina`, `media_final`, `frequencia`, `aprovado`, `observacao`) VALUES
(1, '2920482111030', 'Alg000', 9.7, 0, 0, ''),
(2, '2920482111030', 'Arq000', 9, 0, 0, ''),
(3, '2920482111030', 'Emp000', 9, 90, 0, ''),
(4, '2920482111030', 'Ing000', 0, 85, 0, ''),
(5, '2920482111030', 'Int001', 0, 0, 0, ''),
(6, '2920482111030', 'Int002', 0, 0, 0, ''),
(7, '2920482111030', 'Mat000', 9.3, 95, 0, ''),
(8, '2920482111030', 'Met000', 0, 0, 0, ''),
(9, '2920482111030', 'Pro004', 0, 0, 0, '');

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
-- Estrutura para tabela `matricula`
--

CREATE TABLE `matricula` (
  `cod_matricula` int(11) NOT NULL,
  `ra` varchar(13) NOT NULL,
  `cod_disciplina` varchar(15) NOT NULL,
  `nota1` float NOT NULL,
  `nota2` float NOT NULL,
  `nota3` float NOT NULL,
  `faltas` int(11) NOT NULL,
  `Aprovado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `matricula`
--

INSERT INTO `matricula` (`cod_matricula`, `ra`, `cod_disciplina`, `nota1`, `nota2`, `nota3`, `faltas`, `Aprovado`) VALUES
(1, '2920482111009', 'Com000', 10, 9, 0, 0, 0),
(2, '2920482111009', 'Est000', 0, 0, 0, 0, 0),
(3, '2920482111009', 'Ges002', 0, 0, 0, 0, 0),
(4, '2920482111009', 'Ing005', 0, 0, 0, 0, 0),
(5, '2920482111009', 'Int000', 0, 0, 0, 0, 0),
(6, '2920482111009', 'Lab001', 0, 0, 0, 0, 0),
(7, '2920482111009', 'Seg000', 0, 0, 0, 0, 0),
(8, '2920482111009', 'Tóp000', 0, 0, 0, 0, 0),
(9, '2920482111009', 'Vis000', 0, 0, 0, 0, 0),
(10, '2920482111009', 'Alg000', 0, 0, 0, 0, 1),
(11, '2920482111009', 'Arq000', 0, 0, 0, 0, 1),
(12, '2920482111009', 'Emp000', 0, 0, 0, 0, 1),
(13, '2920482111009', 'Ing000', 0, 0, 0, 0, 1),
(14, '2920482111009', 'Int001', 0, 0, 0, 0, 1),
(15, '2920482111009', 'Int002', 0, 0, 0, 0, 1),
(16, '2920482111009', 'Mat000', 0, 0, 0, 0, 1),
(17, '2920482111009', 'Met000', 0, 0, 0, 0, 1),
(18, '2920482111009', 'Pro004', 0, 0, 0, 0, 1),
(19, '2920482111030', 'Ges000', 0, 0, 0, 0, 1),
(20, '2920482111030', 'Ing004', 0, 0, 0, 0, 1),
(21, '2920482111030', 'Int004', 0, 0, 0, 0, 1),
(22, '2920482111030', 'Pro003', 0, 0, 0, 0, 1),
(23, '2920482111030', 'Red000', 0, 0, 0, 0, 1),
(24, '2920482111030', 'Sis000', 0, 0, 0, 0, 1),
(25, '2920482111030', 'Tes000', 0, 0, 0, 0, 1),
(26, '2920482111030', 'Alg000', 10, 9, 10, 0, 1),
(27, '2920482111030', 'Arq000', 9, 8, 10, 0, 1),
(28, '2920482111030', 'Emp000', 10, 8, 9, 4, 1),
(29, '2920482111030', 'Ing000', 0, 0, 0, 6, 1),
(30, '2920482111030', 'Int001', 0, 0, 0, 0, 1),
(31, '2920482111030', 'Int002', 0, 0, 0, 0, 1),
(32, '2920482111030', 'Mat000', 10, 9, 9, 4, 1),
(33, '2920482111030', 'Met000', 0, 0, 0, 0, 1),
(34, '2920482111030', 'Pro004', 0, 0, 0, 0, 1);

--
-- Acionadores `matricula`
--
DELIMITER $$
CREATE TRIGGER `calcular_frequencia` AFTER UPDATE ON `matricula` FOR EACH ROW BEGIN
    DECLARE carga_horaria INT;
    DECLARE frequencia DECIMAL(5, 2);

    -- Obtém a carga horária da disciplina correspondente
    SELECT carga INTO carga_horaria
    FROM disciplina
    WHERE cod_disciplina = NEW.cod_disciplina;

    -- Calcula a frequência
    IF carga_horaria IS NOT NULL THEN
        SET frequencia = ((carga_horaria - NEW.faltas) / carga_horaria) * 100;

        -- Atualiza a coluna frequencia na tabela historico
        -- ou insere um novo registro se não existir
        UPDATE historico SET frequencia = frequencia
    WHERE historico.ra = NEW.ra AND historico.cod_disciplina = NEW.cod_disciplina;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `calcular_media` AFTER UPDATE ON `matricula` FOR EACH ROW BEGIN
    DECLARE media decimal(2,1);
    SET media = (NEW.nota1 + NEW.nota2 + NEW.nota3) / 3;
    UPDATE historico SET media_final = media
    WHERE historico.ra = NEW.ra AND historico.cod_disciplina = NEW.cod_disciplina;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `inserir_historico` AFTER INSERT ON `matricula` FOR EACH ROW BEGIN
    -- Insere um novo registro na tabela historico
    INSERT INTO historico (RA, cod_disciplina, media_final, frequencia, aprovado, observacao)
    VALUES (NEW.ra, NEW.cod_disciplina, 0, 0, 0, '')
    ON DUPLICATE KEY UPDATE RA = RA and cod_disciplina = cod_disciplina;  -- Não faz nada se a chave já existir
END
$$
DELIMITER ;

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
-- Despejando dados para a tabela `professor`
--

INSERT INTO `professor` (`cod_professor`, `nome`, `email`) VALUES
(1, 'Alexandro Tadeu Mathias de Souza', 'alexandro@example.com'),
(2, 'Ana Rosa Coiahy Tonão', 'ana@example.com'),
(3, 'Anderson Antonio de Lima', 'anderson@example.com'),
(4, 'Carla Fabiane Calixto da Silva Soares', 'carla@example.com'),
(5, 'Claudia Rodrigues de Carvalho', 'claudia@example.com'),
(6, 'Eliana Maria dos Santos', 'eliana@example.com'),
(7, 'Francisco Douglas Lima Abreu', 'francisco@example.com'),
(8, 'Luiz Carlos dos Santos Filho', 'luiz@example.com'),
(9, 'Marcia Aparecida Silva Bissaco', 'marcia@example.com'),
(10, 'Margarete Castilho', 'margarete@example.com'),
(11, 'Patricia Sarno Mendes', 'patricia@example.com'),
(12, 'Rogerio Pereira de Souza', 'rogerio@example.com'),
(13, 'Rosana Aparecida Bueno de Novais', 'rosana@example.com'),
(14, 'Sandra Helena da Silva de Santis', 'sandra@example.com'),
(15, 'Walter Eclache da Silva', 'walter@example.com');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`RA`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Índices de tabela `calendario`
--
ALTER TABLE `calendario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ra` (`ra`);

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
  ADD PRIMARY KEY (`cod_disciplina`),
  ADD KEY `fk_cod_professor` (`cod_professor`);

--
-- Índices de tabela `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`cod_historico`),
  ADD KEY `fk_RA_aluno` (`RA`),
  ADD KEY `fk_disciplina` (`cod_disciplina`);

--
-- Índices de tabela `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`cod_horario`);

--
-- Índices de tabela `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`cod_matricula`);

--
-- Índices de tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`cod_professor`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `calendario`
--
ALTER TABLE `calendario`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de tabela `historico`
--
ALTER TABLE `historico`
  MODIFY `cod_historico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `matricula`
--
ALTER TABLE `matricula`
  MODIFY `cod_matricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `calendario`
--
ALTER TABLE `calendario`
  ADD CONSTRAINT `calendario_ibfk_1` FOREIGN KEY (`ra`) REFERENCES `aluno` (`RA`);

--
-- Restrições para tabelas `disciplina`
--
ALTER TABLE `disciplina`
  ADD CONSTRAINT `fk_cod_professor` FOREIGN KEY (`cod_professor`) REFERENCES `professor` (`cod_professor`);

--
-- Restrições para tabelas `historico`
--
ALTER TABLE `historico`
  ADD CONSTRAINT `fk_RA_aluno` FOREIGN KEY (`RA`) REFERENCES `aluno` (`RA`),
  ADD CONSTRAINT `fk_disciplina` FOREIGN KEY (`cod_disciplina`) REFERENCES `disciplina` (`cod_disciplina`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
