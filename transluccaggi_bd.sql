-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Jun-2022 às 20:29
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

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
  `endereco` varchar(128) NOT NULL,
  `cod_distribuidora` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `custos`
--

CREATE TABLE `custos` (
  `mes` date NOT NULL,
  `descricao` varchar(16) NOT NULL,
  `valor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `devolucoes`
--

CREATE TABLE `devolucoes` (
  `id` int(11) NOT NULL,
  `nota` varchar(16) NOT NULL,
  `parcial` varchar(16) NOT NULL,
  `valor` float NOT NULL,
  `volumes` int(11) NOT NULL,
  `cidade` varchar(16) NOT NULL,
  `cliente` varchar(32) NOT NULL,
  `cod_cliente` int(16) NOT NULL,
  `motivo` varchar(32) NOT NULL,
  `protocolo` int(11) NOT NULL,
  `tipo` varchar(16) NOT NULL,
  `status` varchar(16) NOT NULL
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fretes`
--

CREATE TABLE `fretes` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `id_motorista` int(11) NOT NULL,
  `motorista` varchar(32) NOT NULL,
  `valor` float NOT NULL,
  `saidas` int(11) NOT NULL
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
  `endereco` varchar(64) NOT NULL,
  `cpf` varchar(16) NOT NULL,
  `rg` varchar(16) NOT NULL,
  `nascimento` date NOT NULL,
  `naturalidade` varchar(32) NOT NULL,
  `cnh` varchar(16) NOT NULL,
  `validade_cnh` date NOT NULL,
  `categoria_cnh` varchar(4) NOT NULL,
  `cep` int(11) NOT NULL,
  `banco` varchar(16) NOT NULL,
  `cod_banco` int(11) NOT NULL,
  `agencia_banco` int(11) NOT NULL,
  `conta_banco` int(11) NOT NULL,
  `ano_veiculo` varchar(8) NOT NULL,
  `cor_veiculo` varchar(16) NOT NULL,
  `renavam` int(11) NOT NULL,
  `num_chassi` varchar(32) NOT NULL,
  `antt` int(11) NOT NULL,
  `categoria_antt` varchar(4) NOT NULL,
  `validade_antt` date NOT NULL
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
  `motorista` varchar(32) NOT NULL,
  `status` varchar(16) NOT NULL,
  `observacao` varchar(128) NOT NULL,
  `tentativas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `login` varchar(16) NOT NULL,
  `senha` varchar(32) NOT NULL
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
-- Índices para tabela `devolucoes`
--
ALTER TABLE `devolucoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `distribuidoras`
--
ALTER TABLE `distribuidoras`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices para tabela `fretes`
--
ALTER TABLE `fretes`
  ADD PRIMARY KEY (`id`);

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
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
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
-- AUTO_INCREMENT de tabela `devolucoes`
--
ALTER TABLE `devolucoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `distribuidoras`
--
ALTER TABLE `distribuidoras`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fretes`
--
ALTER TABLE `fretes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
