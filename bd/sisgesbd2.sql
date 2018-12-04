-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04-Dez-2018 às 02:10
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE sisgesbd;
USE sisgesbd;

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
  `email` varchar(33) NOT NULL,
  `telefone` varchar(33) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bolsistas`
--

INSERT INTO `bolsistas` (`id`, `nome`, `horario`, `email`, `telefone`) VALUES
(2, 'Akacia', 'M', 'akacia@gmail.com', ''),
(3, 'Bismark', 'M', 'bismark@gmail.com', ''),
(4, 'Raiane', 'T', 'raiane@gmail.com', ''),
(5, 'Samara', 'T', 'samara@gmail.com', ''),
(6, 'Petronildo', 'T', 'petronildo@gmail.com', ''),
(7, 'Clara', 'N', 'clara@gmail.com', '(88) 1234567890'),
(8, 'Junior', 'N', 'junior@gmail.com', ''),
(9, 'Luana', 'N', 'luana@gmail.com', ''),
(10, 'Denys', 'N', 'denysboy@gmail.com', ''),
(12, 'Fernando ', 'M', 'fernando@gmail.com', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `escalas`
--

CREATE TABLE `escalas` (
  `id` int(11) NOT NULL,
  `dia` varchar(22) NOT NULL,
  `supervisor` varchar(33) NOT NULL,
  `dados` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `escalas`
--

INSERT INTO `escalas` (`id`, `dia`, `supervisor`, `dados`) VALUES
(5, '3/12/2018', 'user', '{\"segunda\":{\"manha\":[[\"2\",\"Balcao\"],[\"3\",\"Guarda Volumes\"],[\"12\",\"Checkout\"]],\"tarde\":[[\"4\",\"Checkout\"],[\"5\",\"Balcao\"],[\"6\",\"Guarda Volumes\"]],\"noite\":[[\"7\",\"Balcao\"],[\"8\",\"Balcao\"],[\"9\",\"Guarda Volumes\"],[\"10\",\"Checkout\"]]},\"teru00e7a\":{\"manha\":[[\"2\",\"Checkout\"],[\"3\",\"Guarda Volumes\"],[\"12\",\"Balcao\"]],\"tarde\":[[\"4\",\"Checkout\"],[\"5\",\"Guarda Volumes\"],[\"6\",\"Balcao\"]],\"noite\":[[\"7\",\"Checkout\"],[\"8\",\"Guarda Volumes\"],[\"9\",\"Balcao\"],[\"10\",\"Balcao\"]]},\"quarta\":{\"manha\":[[\"2\",\"Checkout\"],[\"3\",\"Balcao\"],[\"12\",\"Guarda Volumes\"]],\"tarde\":[[\"4\",\"Guarda Volumes\"],[\"5\",\"Checkout\"],[\"6\",\"Balcao\"]],\"noite\":[[\"7\",\"Balcao\"],[\"8\",\"Checkout\"],[\"9\",\"Guarda Volumes\"],[\"10\",\"Balcao\"]]},\"quinta\":{\"manha\":[[\"2\",\"Balcao\"],[\"3\",\"Guarda Volumes\"],[\"12\",\"Checkout\"]],\"tarde\":[[\"4\",\"Guarda Volumes\"],[\"5\",\"Checkout\"],[\"6\",\"Balcao\"]],\"noite\":[[\"7\",\"Balcao\"],[\"8\",\"Checkout\"],[\"9\",\"Guarda Volumes\"],[\"10\",\"Balcao\"]]},\"sexta\":{\"manha\":[[\"2\",\"Balcao\"],[\"3\",\"Guarda Volumes\"],[\"12\",\"Checkout\"]],\"tarde\":[[\"4\",\"Guarda Volumes\"],[\"5\",\"Balcao\"],[\"6\",\"Checkout\"]],\"noite\":[[\"7\",\"Balcao\"],[\"8\",\"Balcao\"],[\"9\",\"Guarda Volumes\"],[\"10\",\"Checkout\"]]}}');

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
(1, 'Balcao', 2),
(2, 'Checkout', 1),
(3, 'Guarda Volumes', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `escalas`
--
ALTER TABLE `escalas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
