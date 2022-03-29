-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Mar-2022 às 13:26
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `motoristas`
--

CREATE TABLE `motoristas` (
  `id` int(11) NOT NULL,
  `cadastro` date NOT NULL,
  `nome` varchar(32) NOT NULL,
  `veiculo` varchar(16) NOT NULL,
  `placa` varchar(8) NOT NULL,
  `telefone` varchar(16) NOT NULL,
  `endereco` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `saida` date NOT NULL,
  `volumes` int(11) NOT NULL,
  `valor` float NOT NULL,
  `peso` float NOT NULL,
  `rota` varchar(8) NOT NULL,
  `cod_cliente` varchar(16) NOT NULL,
  `nome_cliente` varchar(64) NOT NULL,
  `bairro_cliente` varchar(32) NOT NULL,
  `cidade_cliente` varchar(32) NOT NULL,
  `endereco_cliente` varchar(64) NOT NULL,
  `cod_distribuidora` int(11) NOT NULL,
  `motorista` varchar(16) NOT NULL,
  `status` varchar(16) NOT NULL,
  `observacao` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Índices para tabela `motoristas`
--
ALTER TABLE `motoristas`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `distribuidoras`
--
ALTER TABLE `distribuidoras`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `motoristas`
--
ALTER TABLE `motoristas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `notas_fiscais`
--
ALTER TABLE `notas_fiscais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
