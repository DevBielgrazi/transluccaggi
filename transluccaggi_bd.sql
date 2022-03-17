-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Mar-2022 às 02:05
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `transluccaggi_bd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `codigo` varchar(16) NOT NULL,
  `nome` varchar(64) NOT NULL,
  `cadastro` date NOT NULL,
  `rota` int(11) NOT NULL,
  `cidade` varchar(32) NOT NULL,
  `bairro` varchar(32) NOT NULL,
  `endereco` varchar(64) NOT NULL,
  `cod_distribuidora` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`codigo`, `nome`, `cadastro`, `rota`, `cidade`, `bairro`, `endereco`, `cod_distribuidora`) VALUES
('174486', 'Odyney Edson Dos Santos', '2022-03-15', 4808, 'Cunha', 'Falcão', 'Al Francisco da Cunha Menezes', 45);

-- --------------------------------------------------------

--
-- Estrutura da tabela `distribuidoras`
--

CREATE TABLE `distribuidoras` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `distribuidoras`
--

INSERT INTO `distribuidoras` (`codigo`, `nome`) VALUES
(7, 'Servimed');

-- --------------------------------------------------------

--
-- Estrutura da tabela `notas_fiscais`
--

CREATE TABLE `notas_fiscais` (
  `numero` int(11) NOT NULL,
  `serie` int(11) NOT NULL,
  `emissao` date NOT NULL,
  `entrada` date NOT NULL,
  `valor` float NOT NULL,
  `peso` float NOT NULL,
  `cod_cliente` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `notas_fiscais`
--

INSERT INTO `notas_fiscais` (`numero`, `serie`, `emissao`, `entrada`, `valor`, `peso`, `cod_cliente`) VALUES
(1353449, 55, '2022-03-14', '2022-03-15', 17169.7, 677.57, '174486');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `distribuidoras`
--
ALTER TABLE `distribuidoras`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `distribuidoras`
--
ALTER TABLE `distribuidoras`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
