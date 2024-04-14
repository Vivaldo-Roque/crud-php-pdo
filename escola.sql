--
-- Banco de dados: `escola`
--

CREATE DATABASE `escola`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `notas`
--

CREATE TABLE `notas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `disciplina` varchar(50) NOT NULL,
  `n1` float NOT NULL,
  `n2` float NOT NULL,
  `notafinal` float NOT NULL,
  PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Ler dados na tabela `notas`
--

SELECT * FROM `notas`;

--
-- Inserir dado na tabela `notas`
--

INSERT INTO `notas` (`id`, `disciplina`, `n1`, `n2`, `notafinal`) VALUES
(1, 'mat', 20, 20, 20);


--
-- Atualizar dado na tabela `notas`
--

UPDATE `notas` SET `disciplina`= 'mat', `n1` = 15, `n2` = 15, `notafinal` = 15 WHERE `id` = 1;

--
-- Deletar dado na tabela `notas`
--

DELETE FROM `notas` WHERE `id` = 1;
