-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220624.1c2b611173
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Jun-2022 às 00:27
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimo`
--

CREATE TABLE `emprestimo` (
  `id` int(11) NOT NULL,
  `curso` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomeAluno` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dataEmprestimo` date NOT NULL,
  `tituloLivro` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dataDevolucao` date NOT NULL,
  `status` enum('Pendente','Devolvido') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `emprestimo`
--

INSERT INTO `emprestimo` (`id`, `curso`, `nomeAluno`, `dataEmprestimo`, `tituloLivro`, `dataDevolucao`, `status`) VALUES
(19, '', 'Jorge', '2022-06-22', 'Fundamentos Java', '2022-06-24', 'Devolvido'),
(18, '', 'Murilo', '2022-03-16', 'Programando em C++', '2022-07-29', 'Pendente'),
(16, '', 'Andersson', '2022-02-22', 'Python Básico', '2022-09-29', 'Pendente'),
(17, '', 'André', '2022-04-20', 'Python Básico', '2022-08-31', 'Devolvido'),
(20, '', 'Jonas', '2022-06-22', 'Lógica de Programação', '2022-09-13', 'Devolvido'),
(21, '', 'Bruno', '2022-06-07', 'Tudo Sobre Hardware', '2022-08-31', 'Devolvido'),
(22, '', 'Marcia', '2022-04-20', 'Programando em C++', '2022-09-29', 'Pendente');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



