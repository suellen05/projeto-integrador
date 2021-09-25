-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Set-2021 às 20:38
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_projeto_integracao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_clientes`
--

CREATE TABLE `tb_clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `endereco` varchar(50) DEFAULT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `senha` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_clientes`
--

INSERT INTO `tb_clientes` (`id`, `nome`, `endereco`, `cidade`, `estado`, `telefone`, `cpf`, `email`, `senha`) VALUES
(40, 'leticia', 'maranhao', 'americana', 'sp', '19000', '111222333', 'leticia@hotmail.com', '12345678'),
(51, 'Jheniffer', 'Rua Albano Angolini, 79', 'Santa Bárbara D\'Oeste', 'SP', '11933826654', '457.457.478-04', 'jhenifferbaldi@gmail.com', '12345678'),
(52, 'Maria Da Silva', 'Rua do Trigo', 'Santa Bárbara D\'Oeste', 'SP', '(19) 98748-5869', '12547825608', 'maria@gmail.com', '12345678'),
(54, 'Luiza Martins', 'Rua do Centeio', 'Santa Bárbara D\'Oeste', 'SP', '(19) 99999-8888', '02415786209', 'luiza@gmail.com', '12345678');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_itens_pedido`
--

CREATE TABLE `tb_itens_pedido` (
  `id` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_itens_pedido`
--

INSERT INTO `tb_itens_pedido` (`id`, `id_produto`, `quantidade`, `id_pedido`) VALUES
(1, 3, 1, 1),
(2, 6, 2, 1),
(3, 5, 1, 2),
(4, 2, 1, 3),
(5, 4, 1, 4),
(6, 2, 2, 5),
(7, 4, 1, 5),
(8, 1, 1, 6),
(9, 2, 1, 6),
(10, 3, 1, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pedidos`
--

CREATE TABLE `tb_pedidos` (
  `id` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_cliente` int(11) NOT NULL,
  `valor_total` float(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_pedidos`
--

INSERT INTO `tb_pedidos` (`id`, `data`, `id_cliente`, `valor_total`) VALUES
(1, '2021-09-21 00:37:13', 51, 400.00),
(2, '2021-09-21 00:38:30', 51, 170.00),
(3, '2021-09-21 00:38:44', 51, 110.00),
(4, '2021-09-21 00:51:04', 40, 170.00),
(5, '2021-09-24 21:49:41', 51, 390.00),
(6, '2021-09-24 22:06:20', 51, 460.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produtos`
--

CREATE TABLE `tb_produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `marca` varchar(150) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `estoque` int(11) NOT NULL,
  `preco` float(10,2) NOT NULL,
  `tamanho` varchar(5) NOT NULL,
  `fotos` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_produtos`
--

INSERT INTO `tb_produtos` (`id`, `nome`, `marca`, `modelo`, `estoque`, `preco`, `tamanho`, `fotos`) VALUES
(1, 'Bolsa Goyard Saint Louis', 'GOYARD', '1140-004', 10, 150.00, 'G', 'img/goyard-saint-louis.jpg,img/Bolsa1fr.jpg'),
(2, 'Bolsa Gucci Marmont Bucket', 'GUCCI', 'Marmont Bucket', 7, 110.00, 'G', 'img/gucci-marmont.jpg, img/bolsa-gucci-fundo.jpg'),
(3, 'Bolsa Louis Vuitton Alma BB', 'LOUIS VUITTON', 'Alma BB', 5, 200.00, 'G', 'img/viton-alma.jpeg,img/bolsa-alma-fundo.jpeg'),
(4, 'Bolsa Louis Vuitton', 'LOUIS VUITTON', 'Manhattan', 8, 170.00, 'G', 'img/vuitton-manhattan.jpeg,img/bolsa-manhattan-fundo.jpeg'),
(5, 'Bolsa Louis Neverfull', 'LOUIS VUITTON', 'Neverfull', 8, 170.00, 'G', 'img/vuitton-neverfull.jpg'),
(6, 'Carteira Louis Vuitton', 'LOUIS VUITTON', 'Carteira Ziper', 12, 100.00, 'G', 'img/carteira-louis-vuitton.png'),
(7, 'Bolsa Chanel', 'CHANEL', 'Tote', 8, 170.00, 'G', 'img/chanel-calfskin.jpg'),
(8, 'Bolsa Louis Vuitton Eva', 'LOUIS VUITTON', 'Eva', 8, 150.00, 'G', 'img/bolsa-louis-vuitton-eva.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_clientes`
--
ALTER TABLE `tb_clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_itens_pedido`
--
ALTER TABLE `tb_itens_pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_itens_pedido_id_pedido` (`id_pedido`),
  ADD KEY `fk_itens_pedido_id_produto` (`id_produto`);

--
-- Índices para tabela `tb_pedidos`
--
ALTER TABLE `tb_pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pedidos_id_cliente` (`id_cliente`);

--
-- Índices para tabela `tb_produtos`
--
ALTER TABLE `tb_produtos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_clientes`
--
ALTER TABLE `tb_clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de tabela `tb_itens_pedido`
--
ALTER TABLE `tb_itens_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tb_pedidos`
--
ALTER TABLE `tb_pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tb_produtos`
--
ALTER TABLE `tb_produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
