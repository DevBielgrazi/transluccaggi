-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Mar-2022 às 20:54
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `distribuidoras`
--

CREATE TABLE `distribuidoras` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notas_fiscais`
--

CREATE TABLE `notas_fiscais` (
  `numero` varchar(16) NOT NULL,
  `serie` varchar(16) NOT NULL,
  `emissao` date NOT NULL,
  `entrada` date NOT NULL,
  `valor` float NOT NULL,
  `peso` float NOT NULL,
  `cod_cliente` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices para tabela `distribuidoras`
--
ALTER TABLE `distribuidoras`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices para tabela `notas_fiscais`
--
ALTER TABLE `notas_fiscais`
  ADD PRIMARY KEY (`numero`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `distribuidoras`
--
ALTER TABLE `distribuidoras`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
