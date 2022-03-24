-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Mar-2022 às 19:00
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
  `id` int(11) NOT NULL,
  `codigo` varchar(16) NOT NULL,
  `nome` varchar(64) NOT NULL,
  `agendar` varchar(4) NOT NULL,
  `cadastro` date NOT NULL,
  `rota` varchar(8) NOT NULL,
  `cidade` varchar(32) NOT NULL,
  `bairro` varchar(32) NOT NULL,
  `endereco` varchar(64) NOT NULL,
  `cod_distribuidora` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `codigo`, `nome`, `agendar`, `cadastro`, `rota`, `cidade`, `bairro`, `endereco`, `cod_distribuidora`) VALUES
(1, '1', 'Gabriel da Silva Vieira', 'SIM', '2022-03-24', 'VP3', 'São José dos Campos', 'Jardim Satélite', 'Rua Cruzália, 273', 1),
(2, '2', 'Odyney Edson Dos Santos', 'NÂO', '2022-03-24', 'VP3', 'São José dos Campos', 'Jardim Satélite', 'Rua Cruzália, 273', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `distribuidoras`
--

CREATE TABLE `distribuidoras` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(64) NOT NULL,
  `porcentagem` float NOT NULL,
  `cadastro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `distribuidoras`
--

INSERT INTO `distribuidoras` (`codigo`, `nome`, `porcentagem`, `cadastro`) VALUES
(1, 'DPC', 2.5, '2022-03-24');

-- --------------------------------------------------------

--
-- Estrutura da tabela `notas_fiscais`
--

CREATE TABLE `notas_fiscais` (
  `id` int(11) NOT NULL,
  `numero` varchar(16) NOT NULL,
  `serie` varchar(16) NOT NULL,
  `emissao` date NOT NULL,
  `entrada` date NOT NULL,
  `valor` float NOT NULL,
  `peso` float NOT NULL,
  `rota` varchar(8) NOT NULL,
  `cod_cliente` varchar(16) NOT NULL,
  `nome_cliente` varchar(64) NOT NULL,
  `bairro_cliente` varchar(32) NOT NULL,
  `cidade_cliente` varchar(32) NOT NULL,
  `endereco_cliente` varchar(64) NOT NULL,
  `cod_distribuidora` int(11) NOT NULL,
  `status` varchar(16) NOT NULL,
  `observacao` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `notas_fiscais`
--

INSERT INTO `notas_fiscais` (`id`, `numero`, `serie`, `emissao`, `entrada`, `valor`, `peso`, `rota`, `cod_cliente`, `nome_cliente`, `bairro_cliente`, `cidade_cliente`, `endereco_cliente`, `cod_distribuidora`, `status`, `observacao`) VALUES
(1, '1', '1', '2022-03-23', '2022-03-24', 17169.7, 145.879, 'VP3', '1', 'Gabriel da Silva Vieira', 'Jardim Satélite', 'São José dos Campos', 'Rua Cruzália, 273', 1, 'AGENDAR', ''),
(2, '2', '1', '2022-03-23', '2022-03-24', 17169.7, 145.879, 'VP3', '2', 'Odyney Edson Dos Santos', 'Jardim Satélite', 'São José dos Campos', 'Rua Cruzália, 273', 1, 'DISPONÍVEL', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `distribuidoras`
--
ALTER TABLE `distribuidoras`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices para tabela `notas_fiscais`
--
ALTER TABLE `notas_fiscais`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `distribuidoras`
--
ALTER TABLE `distribuidoras`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `notas_fiscais`
--
ALTER TABLE `notas_fiscais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
