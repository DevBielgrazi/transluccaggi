-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Mar-2022 às 14:27
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
(1, '1', 'Gabriel da Silva Vieira', 'NÂO', '2022-03-29', 'VP3', 'São José dos Campos', 'Jardim Satélite', '273 Rua Cruzália', 1),
(2, '2', 'Farma Leste Drog Perf', 'SIM', '2022-03-29', 'VP2', 'São José dos Campos', 'Jardim América', 'Rua Andorra, 500', 2),
(3, '3', 'Paulo Roberto', 'SIM', '2022-03-29', 'VP6', 'Cunha', 'Falcão', 'Av das Flores, 234', 3),
(4, '4', 'Breno Nascimento da Silva', 'NÂO', '2022-03-29', 'VP2', 'São José dos Campos', 'Bosque dos Eucaliptos', 'Av Andrômeda, 1254', 4);

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
(1, 'DPC', 2.5, '2022-03-29'),
(2, 'Maccaus', 2.5, '2022-03-29'),
(3, 'Vale Natubras', 3.5, '2022-03-29'),
(4, 'Tavares', 2.5, '2022-03-29');

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

--
-- Extraindo dados da tabela `motoristas`
--

INSERT INTO `motoristas` (`id`, `cadastro`, `nome`, `veiculo`, `placa`, `telefone`, `endereco`) VALUES
(1, '2022-03-29', 'Gabriel', 'Fiorino', 'pxs2f21', '12991966010', '273 Rua Cruzália');

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
  `observacao` varchar(128) NOT NULL,
  `tentativas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `notas_fiscais`
--

INSERT INTO `notas_fiscais` (`id`, `numero`, `serie`, `emissao`, `entrada`, `saida`, `volumes`, `valor`, `peso`, `rota`, `cod_cliente`, `nome_cliente`, `bairro_cliente`, `cidade_cliente`, `endereco_cliente`, `cod_distribuidora`, `motorista`, `status`, `observacao`, `tentativas`) VALUES
(1, '1', '1', '2022-03-28', '2022-03-29', '2022-03-30', 2, 145.98, 78.765, 'VP3', '1', 'Gabriel da Silva Vieira', 'Jardim Satélite', 'São José dos Campos', '273 Rua Cruzália', 1, 'Gabriel', 'DISPONÍVEL', '', 0),
(2, '2', '1', '2022-03-27', '2022-03-28', '2022-03-30', 5, 458.98, 145.9, 'VP2', '2', 'Farma Leste Drog Perf', 'Jardim América', 'São José dos Campos', 'Rua Andorra, 500', 2, 'Gabriel', 'DISPONÍVEL', '', 0),
(3, '4', '55', '2022-03-28', '2022-03-29', '2022-03-29', 8, 17169.7, 677.57, 'VP6', '3', 'Paulo Roberto', 'Falcão', 'Cunha', 'Av das Flores, 234', 3, 'Gabriel', 'DISPONÍVEL', '', 0),
(4, '3', '55', '2022-03-15', '2022-03-19', '2022-03-30', 78, 4566.78, 168.753, 'VP2', '4', 'Breno Nascimento da Silva', 'Bosque dos Eucaliptos', 'São José dos Campos', 'Av Andrômeda, 1254', 4, 'Gabriel', 'DISPONÍVEL', '', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `distribuidoras`
--
ALTER TABLE `distribuidoras`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `motoristas`
--
ALTER TABLE `motoristas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `notas_fiscais`
--
ALTER TABLE `notas_fiscais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
