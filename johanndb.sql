-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Jan-2023 às 03:07
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
-- Banco de dados: `johanndb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administradores`
--

CREATE TABLE `administradores` (
  `cod_pessoa` int(6) UNSIGNED NOT NULL,
  `nome` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `senha` varchar(15) NOT NULL DEFAULT '12345',
  `cpf` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `administradores`
--

INSERT INTO `administradores` (`cod_pessoa`, `nome`, `email`, `senha`, `cpf`) VALUES
(1, 'Maria da Silva', 'maria@gmail.com', '12345', ''),
(2, 'João da Silva', 'joao@gmail.com', '12345', ''),
(4, 'Johann Waltzer', 'jcwaltzer@gmail.com', '123', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `quadrinhos`
--

CREATE TABLE `quadrinhos` (
  `cod_livro` int(6) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sinopse` varchar(999) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `preço` varchar(100) NOT NULL,
  `imagem` varchar(50) NOT NULL DEFAULT 'foto.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `quadrinhos`
--

INSERT INTO `quadrinhos` (`cod_livro`, `nome`, `sinopse`, `autor`, `preço`, `imagem`) VALUES
(4, 'Absolute Sandman Vol.1', 'Vou revelar-te o que é o medo num punhado de pó.\" Foi essa frase de T.S. Eliot que serviu para embalar o lançamento dessa série e também dar asas à imaginação de Neil Gaiman, um britânico destinado a criar uma das séries mais revolucionárias e inovadoras dos quadrinhos contemporâneos.', 'Neil Gaiman, varios', '159,90', '61YNpOiCpbL.jpg'),
(5, 'Batman - A piada mortal', 'Do premiado roteirista Alan Moore (Watchmen, V de Vingança) conta como um dia ruim na vida de um homem pode significar a linha que separa a sanidade da loucura.', 'Alan Moore, Brian Bolland', '39,90', '2065243185_1SZ.webp'),
(6, 'Arena', 'Ele ganhou uma segunda chance, mas teria que enfrentar seu pior inimigo… Ele mesmo!!!  Rômulo Cruz, um artista ma que pode mudar seu destino, Arena, umrcial frustrado com os percalços da vida, é convidado por José Prado, um antigo colega de tatame, a participar de um evento torneio de MMA que busca ser tão grande quando o UFC. Aos 39 anos de idade, trabalhando como instrutor de defesa pessoal e sem perspectiva de vida, Rômulo reluta em aceitar. O que ele não sabe é que o Arena está afundado em dívidas e, por conta de um capricho do destino, sua participação pode ser a única coisa capaz de salvar José de cair nas mãos de um perigoso agiota. Mas Rômulo prefere passar as noites em uma casa noturna, assistindo aos shows da prostituta e dançarina Ana Maya, por quem é apaixonado em segredo.', 'Alexandre Callari,  Alan Patrick', '89,90', 'arena-capa.jpeg'),
(7, 'Ronin - Edição Definitiva', 'Ronin é uma graphic novel da DC Comics, escrita e desenhada por Frank Miller e colorida por Lynn Varley', 'Frank Miller, Lynn Varley', '122,90', 'A1B99Q6aaJL.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `cod_usuario` int(6) UNSIGNED NOT NULL,
  `nome` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `senha` varchar(15) NOT NULL DEFAULT '12345'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`cod_usuario`, `nome`, `email`, `senha`) VALUES
(1, 'Guilherme', 'guilherme@gmail', '123'),
(2, 'Esther', 'esther@gmail', '123'),
(3, 'Marcus', 'marcus@gmail');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`cod_pessoa`);

--
-- Índices para tabela `quadrinhos`
--
ALTER TABLE `quadrinhos`
  ADD PRIMARY KEY (`cod_livro`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cod_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administradores`
--
ALTER TABLE `administradores`
  MODIFY `cod_pessoa` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `quadrinhos`
--
ALTER TABLE `quadrinhos`
  MODIFY `cod_livro` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `cod_usuario` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
