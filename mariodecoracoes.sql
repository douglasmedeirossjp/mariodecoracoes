-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29-Nov-2016 às 02:17
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mariodecoracoes`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `imagem` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `titulo` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `link` text COLLATE latin1_general_ci,
  `ordem` int(11) DEFAULT NULL,
  `ativo` varchar(1) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagina`
--

CREATE TABLE `pagina` (
  `id` int(11) NOT NULL,
  `titulo` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `titulo_menu` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `url_amigavel` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `conteudo` text COLLATE latin1_general_ci NOT NULL,
  `ativo` char(1) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `pagina`
--

INSERT INTO `pagina` (`id`, `titulo`, `titulo_menu`, `url_amigavel`, `conteudo`, `ativo`) VALUES
(1, 'Empresa', 'Empresa', 'empresa', '<p>\r\nMario Decorações já atua no mercado de Festas há muitos anos, atendendo toda Curitiba e região Metropolitana.\r\n</p>   \r\n         \r\n<p>\r\nEspecialista em criar decorações, com idéias e estilos variados, sugerindo opções para que seu evento seja um sucesso.\r\n</p>\r\n         \r\n<p>\r\nSempre prezando pela satisfação dos clientes, oferecendo produtos e serviços de qualidade, profissionais qualificados e muito bom gosto.\r\n</p>        \r\n    \r\n<p>\r\nAgende um horário conosco, e solicite um orçamento sem compromisso. \r\n</p>             \r\n       ', 'S'),
(2, 'Serviços', 'Serviços', 'servicos', '', 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `permissao` text COLLATE latin1_general_ci NOT NULL,
  `status` char(1) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`id`, `titulo`, `permissao`, `status`) VALUES
(1, 'Administrador', 'a:2:{i:0;s:13:\\"permissao-total\\";}', 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `login` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nome` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `senha` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `perfil` int(11) NOT NULL,
  `ultimoLogin` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `tokenLogin` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `validadeToken` datetime DEFAULT NULL,
  `status` char(1) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `login`, `nome`, `senha`, `email`, `perfil`, `ultimoLogin`, `tokenLogin`, `validadeToken`, `status`) VALUES
(1, 'douglas.medeiros', 'Douglas Adriano de Medeiros', '$2a$08$2sGQinTFe3GF/YqAYQ66auL9o6HeFCQryHdqUDvuEVN0J1vdhimii', 'douglas.medeiross@gmail.com', 1, '2016-11-28 22:10:31 em ::1', '$2a$08$2M1rIEK90nclzMYgniCmAuKAwZFgt9ob8z6p.jjId.Tg3NyD/jBdq', '2016-11-28 23:35:48', 'A'),
(2, 'mariodecoracoes', 'Mário Decorações', '$2a$08$2sGQinTFe3GF/YqAYQ66auL9o6HeFCQryHdqUDvuEVN0J1vdhimii', 'contato@mariodecoracoes.com.br', 1, '2016-10-18 23:22:48 em ::1', NULL, NULL, 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagina`
--
ALTER TABLE `pagina`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pagina`
--
ALTER TABLE `pagina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
