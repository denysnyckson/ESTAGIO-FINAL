-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24-Nov-2018 às 05:46
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisgesbd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bolsistas`
--

CREATE TABLE `bolsistas` (
  `id` int(11) NOT NULL,
  `nome` varchar(33) NOT NULL,
  `horario` varchar(13) NOT NULL,
  `email` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bolsistas`
--

INSERT INTO `bolsistas` (`id`, `nome`, `horario`, `email`) VALUES
(1, 'Denys Nyckson', 'N', 'denysboy@gmail.com'),
(2, 'Fernando José', 'M', 'fernando.jose@gmail.com'),
(3, 'Akacia', 'M', 'akacia@gmail.com'),
(4, 'Clara', 'N', 'clara@gmail.com'),
(5, 'Bismark', 'M', 'bissmark'),
(6, 'Everton', 'M', 'evertonfrnds@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `escalas`
--

CREATE TABLE `escalas` (
  `id` int(11) NOT NULL,
  `data` varchar(11) NOT NULL,
  `supervisor` varchar(33) NOT NULL,
  `dados` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcoes`
--

CREATE TABLE `funcoes` (
  `id` int(11) NOT NULL,
  `nome` varchar(33) NOT NULL,
  `qnt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcoes`
--

INSERT INTO `funcoes` (`id`, `nome`, `qnt`) VALUES
(1, 'balcao', 2),
(2, 'checkout', 1),
(3, 'guarda_volumes', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `gestor`
--

CREATE TABLE `gestor` (
  `id` int(11) NOT NULL,
  `nome` varchar(35) NOT NULL,
  `user` varchar(35) NOT NULL,
  `pass` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `gestor`
--

INSERT INTO `gestor` (`id`, `nome`, `user`, `pass`) VALUES
(1, 'Fernando', 'fernando', 'fernando'),
(2, 'Lara', 'lara', 'lara');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bolsistas`
--
ALTER TABLE `bolsistas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `escalas`
--
ALTER TABLE `escalas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `funcoes`
--
ALTER TABLE `funcoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gestor`
--
ALTER TABLE `gestor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bolsistas`
--
ALTER TABLE `bolsistas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `escalas`
--
ALTER TABLE `escalas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `funcoes`
--
ALTER TABLE `funcoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gestor`
--
ALTER TABLE `gestor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
