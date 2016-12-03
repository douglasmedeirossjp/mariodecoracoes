-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 03-Dez-2016 às 05:18
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
  `titulo` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `link` text COLLATE latin1_general_ci,
  `ordem` int(11) DEFAULT NULL,
  `novaguia` char(1) COLLATE latin1_general_ci NOT NULL,
  `ativo` varchar(1) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `banner`
--

INSERT INTO `banner` (`id`, `imagem`, `titulo`, `link`, `ordem`, `novaguia`, `ativo`) VALUES
(1, 'http://localhost/mariodecoracoes/repositorio/arquivos/enviados/ckfinder/images/Banner/casamento-fd.jpg', 'FD', '', 1, 'N', 'S'),
(2, 'http://localhost/mariodecoracoes/repositorio/arquivos/enviados/ckfinder/images/Banner/casamento-fd.jpg', 'Casamento Fabiely e Douglas', '', 1, 'N', 'S'),
(3, 'http://localhost/mariodecoracoes/repositorio/arquivos/enviados/ckfinder/images/Banner/casamento-fd.jpg', 'Teste', '', 1, 'N', 'N'),
(4, 'http://localhost/mariodecoracoes/repositorio/arquivos/enviados/ckfinder/images/Banner/casamento-fd.jpg', 'Teste', '', 1, 'N', 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `informacao`
--

CREATE TABLE `informacao` (
  `id` int(11) NOT NULL,
  `telefone` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `celular` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `endereco` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `numero` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `bairro` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `cidade` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `estado` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `horario_atendimento` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `googlemaps` text COLLATE latin1_general_ci NOT NULL,
  `mensagem_contato` text COLLATE latin1_general_ci NOT NULL,
  `facebook` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `instagram` varchar(255) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `informacao`
--

INSERT INTO `informacao` (`id`, `telefone`, `celular`, `endereco`, `numero`, `bairro`, `cidade`, `estado`, `horario_atendimento`, `email`, `googlemaps`, `mensagem_contato`, `facebook`, `instagram`) VALUES
(1, '3283-6165', '', 'Rua Voluntários da Pátria', '344', 'Centro', 'São José dos Pinhais', 'PR', 'Segunda à sexta das 8h às 18h', 'contato@mariodecoracoes.com.br', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1799.98689859175!2d-49.20469395862485!3d-25.539249720018113!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94dcfa075a2e1e73%3A0xa17e276a7867dea4!2zTWFyaW8gRGVjb3Jhw6fDtWVz!5e0!3m2!1spt-BR!2sbr!4v1480737696471" width="100%" height="850" frameborder="0" style="border:0" allowfullscreen></iframe>', '<p>Agende um hor&aacute;rio conosco e solicite um or&ccedil;amento sem compromisso.</p>\r\n', 'http://www.facebook.com.br/mariodecoracoes', 'http://www.instagram.com/mariodecoracoes');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagina`
--

CREATE TABLE `pagina` (
  `id` int(11) NOT NULL,
  `titulo` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `titulo_menu` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `url_amigavel` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `conteudo` text COLLATE latin1_general_ci NOT NULL,
  `ativo` char(1) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `pagina`
--

INSERT INTO `pagina` (`id`, `titulo`, `titulo_menu`, `url_amigavel`, `conteudo`, `ativo`) VALUES
(1, 'Empresa', 'Empresa', 'empresa', '<p><img alt="" src="http://localhost/mariodecoracoes/repositorio/arquivos/enviados/ckfinder/images/13962743_1071898222892220_3503984245799545611_n.jpg" style="border-style:solid; border-width:0px; float:left; height:263px; margin:0px 10px; width:350px" />Mario Decora&ccedil;&otilde;es j&aacute; atua no mercado de Festas h&aacute; muitos anos, atendendo toda Curitiba e regi&atilde;o Metropolitana.</p>\r\n\r\n<p>Especialista em criar decora&ccedil;&otilde;es, com id&eacute;ias e estilos variados, sugerindo op&ccedil;&otilde;es para que seu evento seja um sucesso.</p>\r\n\r\n<p>Sempre prezando pela satisfa&ccedil;&atilde;o dos clientes, oferecendo produtos e servi&ccedil;os de qualidade, profissionais qualificados e muito bom gosto.</p>\r\n\r\n<p>Agende um hor&aacute;rio conosco, e solicite um or&ccedil;amento sem compromisso.</p>\r\n', 'S'),
(2, 'Serviços', 'Serviços', 'servicos', '<p>Atendemos os mais variados eventos, criamos arranjos diversos com flores naturais.&nbsp;<br />\r\n<br />\r\nNossas especialidades s&atilde;o:<br />\r\n<br />\r\n- Casamentos;&nbsp;<br />\r\n- 15 anos;<br />\r\n- Formatura;<br />\r\n- Ambienta&ccedil;&atilde;o;&nbsp;<br />\r\n- Eventos em Geral;&nbsp;<br />\r\n<br />\r\nConhe&ccedil;a um pouco mais de nossos servi&ccedil;os em nossa galeria de imagens<strong>.</strong></p>\r\n', 'S');

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
(1, 'douglas.medeiros', 'Douglas Adriano de Medeiros', '$2a$08$2sGQinTFe3GF/YqAYQ66auL9o6HeFCQryHdqUDvuEVN0J1vdhimii', 'douglas.medeiross@gmail.com', 1, '2016-12-03 01:32:08 em ::1', '$2a$08$GuIXRlFyAb0Y.ekqQc.PAe3J0cGm4uCl7GphNJqZuwBOzHFDuxk5a', '2016-12-03 02:42:33', 'A'),
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
-- Indexes for table `informacao`
--
ALTER TABLE `informacao`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `informacao`
--
ALTER TABLE `informacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
