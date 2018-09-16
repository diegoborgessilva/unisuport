-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29-Nov-2016 às 19:14
-- Versão do servidor: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unisuport`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', NULL),
('criar-procedimento', '2', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, 'admin pode criar procedimentos', NULL, NULL, NULL, NULL),
('criar-procedimento', 1, 'permite que o usuario crie um procedimento.', NULL, NULL, NULL, NULL),
('criar-treinamento', 1, 'permite que o usuario crie treinamento', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'criar-procedimento'),
('admin', 'criar-treinamento');

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagem`
--

CREATE TABLE `mensagem` (
  `idMensagem` int(11) NOT NULL,
  `id_de` int(11) NOT NULL,
  `id_para` int(11) NOT NULL,
  `mensagem` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `lido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `mensagem`
--

INSERT INTO `mensagem` (`idMensagem`, `id_de`, `id_para`, `mensagem`, `time`, `lido`) VALUES
(1, 3, 1, 'Oi Lucas', 1433864460, 1),
(2, 3, 1, 'Outra mensagem da maria pro lucas', 1433864490, 1),
(3, 1, 3, 'Oi maria tudo bem, sou lucas', 1433864649, 1),
(4, 3, 1, 'Oi lucas, blz? é a maria denovo', 1433865949, 1),
(5, 1, 3, 'Tudo beleza sim :) até mais 8)', 1433866082, 1),
(6, 3, 1, 'Teste em aula 1', 1434405824, 1),
(7, 3, 1, 'Test', 1434406351, 1),
(8, 1, 3, 'Test em aula, maria!', 1434406472, 1),
(9, 3, 1, 'Certo, lucas!', 1434406480, 1),
(10, 3, 1, 'Olá lucas, tudo bem? este é um teste de som', 1434407254, 1),
(11, 3, 1, 'Este é outro teste de som', 1434407269, 1),
(12, 1, 3, 'Olá maria, recebi sua mensagem!', 1434407279, 1),
(13, 1, 3, 'Outra mensagem do lugas para a maria no firefox', 1434407306, 1),
(14, 3, 1, 'Mensagem da maria pro lugas denovo', 1434407323, 1),
(15, 1, 3, 'Teste de nova mensagem do lucas', 1434407441, 1),
(17, 1, 3, 'test', 1434407589, 1),
(18, 3, 1, 'Esta é uma mensagem de teste', 1434407664, 1),
(19, 2, 1, 'Oi lucas', 1434413216, 1),
(20, 1, 2, 'Fala ae joão', 1434413223, 1),
(21, 2, 1, 'Tudo de boa?', 1434413257, 1),
(22, 1, 2, 'Aham!', 1434413263, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1479133393);

-- --------------------------------------------------------

--
-- Estrutura da tabela `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `conteudo` text NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `post`
--

INSERT INTO `post` (`id`, `titulo`, `autor`, `conteudo`, `data`) VALUES
(10, 'Mudança de IP - Sistema COB', 'Diego Borges SIlva', 'Prezados,\r\n\r\nNeste fim de semana será executado a change ch3, onde será impactado o endereço de acesso ao sistema COB.\r\nSerá enviado um comunicado a todos os usuário explicado o fato.\r\n\r\nPrevisão de normalização de acesso para domingo anoite.\r\nPor fim encaminhado um comunicado a todos os usuários com o novo endereço de acesso.\r\n', '2016-11-15 14:47:46');

-- --------------------------------------------------------

--
-- Estrutura da tabela `procedimento`
--

CREATE TABLE `procedimento` (
  `idProcedimento` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `file` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `procedimento`
--

INSERT INTO `procedimento` (`idProcedimento`, `titulo`, `descricao`, `categoria`, `status`, `file`) VALUES
(5, 'Proxy - Alemanha', 'Endereço de Proxy e configuração de portas - Alemanha', 'Rede', 1, 'referencias.txt'),
(8, 'THTH', 'THTHT', 'HTHTH', 1, 'IE.docx'),
(9, 'fF', 'fFF', 'FFF', 1, 'Estagio.mdl');

-- --------------------------------------------------------

--
-- Estrutura da tabela `treinamento`
--

CREATE TABLE `treinamento` (
  `idTreinamento` int(100) NOT NULL,
  `codigo` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `treinamento`
--

INSERT INTO `treinamento` (`idTreinamento`, `codigo`, `nome`, `descricao`, `categoria`, `file`) VALUES
(17, 'A52345', 'Outlook 2010 - Manutenção de Perfis', 'Abordagem do gerenciamento de perfil em um mesmo Outlook.', 'Office', 'Outlook - Perfis.pdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(250) NOT NULL,
  `authKey` varchar(250) NOT NULL,
  `accessToken` varchar(250) NOT NULL,
  `activate` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `authKey`, `accessToken`, `activate`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'test100key', '100-token', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(100) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `sobrenome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dasId` varchar(10) NOT NULL,
  `telefone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nome`, `sobrenome`, `email`, `dasId`, `telefone`) VALUES
(1, 'Diego', 'Silva', 'diego.2.silva@atos.net', 'a588555', '43 9839 7149'),
(2, 'Felipe ', 'Abreu', 'felipe.abreu@atos.net', 'a578666', '43 9668 0658');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `horario` datetime NOT NULL,
  `limite` datetime NOT NULL,
  `blocks` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `foto`, `nome`, `email`, `horario`, `limite`, `blocks`) VALUES
(1, 'lucas.jpg', 'Lucas Silva', 'lucas.designer@hotmail.com.br', '2015-06-15 23:51:53', '2015-06-16 02:21:00', ''),
(2, '', 'João Souza', 'joao@hotmail.com', '2015-06-16 02:06:47', '2015-06-16 02:08:45', ''),
(3, '', 'Maria da Silva', 'mariasilva@gmail.com', '2016-11-29 19:13:01', '2016-11-29 19:15:01', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `mensagem`
--
ALTER TABLE `mensagem`
  ADD PRIMARY KEY (`idMensagem`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `titulo` (`titulo`);

--
-- Indexes for table `procedimento`
--
ALTER TABLE `procedimento`
  ADD PRIMARY KEY (`idProcedimento`);

--
-- Indexes for table `treinamento`
--
ALTER TABLE `treinamento`
  ADD PRIMARY KEY (`idTreinamento`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mensagem`
--
ALTER TABLE `mensagem`
  MODIFY `idMensagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `procedimento`
--
ALTER TABLE `procedimento`
  MODIFY `idProcedimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `treinamento`
--
ALTER TABLE `treinamento`
  MODIFY `idTreinamento` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Limitadores para a tabela `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
