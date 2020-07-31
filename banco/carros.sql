-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31-Jul-2020 às 14:24
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `carros`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ativos`
--

CREATE TABLE `ativos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observacao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `carros`
--

CREATE TABLE `carros` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ativo` int(11) NOT NULL DEFAULT 1,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marca` int(11) NOT NULL DEFAULT 1,
  `modelo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `carros`
--

INSERT INTO `carros` (`id`, `ativo`, `nome`, `marca`, `modelo`, `created_at`, `updated_at`) VALUES
(1, 2, 'onix', 1, 'onix', '2020-07-31 06:40:44', '2020-07-31 06:40:44'),
(2, 2, 'joy', 2, 'joy', '2020-07-31 06:51:05', '2020-07-31 06:51:05'),
(3, 2, 'cruze', 1, 'cruze', '2020-07-31 07:44:25', '2020-07-31 07:44:25'),
(4, 1, 'corsa', 1, 'corsa', '2020-07-31 11:08:25', '2020-07-31 11:08:25'),
(5, 1, 'idea', 3, 'idea adventure', '2020-07-31 11:12:29', '2020-07-31 11:12:29'),
(6, 2, 'joy', 1, 'joy', '2020-07-31 13:14:40', '2020-07-31 13:14:40');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ativo` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `marcas`
--

CREATE TABLE `marcas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ativo` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `marcas`
--

INSERT INTO `marcas` (`id`, `ativo`, `nome`, `created_at`, `updated_at`) VALUES
(1, 1, 'Chevrolet', '2020-07-31 05:32:23', '2020-07-31 05:32:23'),
(2, 1, 'Volkswagen', '2020-07-31 05:34:28', '2020-07-31 05:34:28'),
(3, 1, 'Fiat', '2020-07-31 05:34:28', '2020-07-31 05:34:28'),
(4, 1, 'Renault', '2020-07-31 05:34:28', '2020-07-31 05:34:28'),
(5, 1, 'Ford', '2020-07-31 05:34:46', '2020-07-31 05:34:46'),
(16, 1, 'Toyota', '2020-07-31 05:37:30', '2020-07-31 05:37:30'),
(17, 1, 'Hyundai', '2020-07-31 05:37:31', '2020-07-31 05:37:31'),
(18, 1, 'Jeep', '2020-07-31 05:37:31', '2020-07-31 05:37:31'),
(19, 1, 'Honda', '2020-07-31 05:37:31', '2020-07-31 05:37:31'),
(20, 1, 'Nissan', '2020-07-31 05:37:31', '2020-07-31 05:37:31'),
(21, 1, 'Citroën', '2020-07-31 05:37:31', '2020-07-31 05:37:31'),
(22, 1, 'Mitsubishi', '2020-07-31 05:37:31', '2020-07-31 05:37:31'),
(23, 1, 'Peugeot', '2020-07-31 05:37:31', '2020-07-31 05:37:31'),
(24, 1, 'Chery', '2020-07-31 05:37:31', '2020-07-31 05:37:31'),
(25, 1, 'BMW', '2020-07-31 05:37:31', '2020-07-31 05:37:31'),
(26, 1, 'Mercedes-Benz', '2020-07-31 05:38:26', '2020-07-31 05:38:26'),
(27, 1, 'Kia', '2020-07-31 05:38:26', '2020-07-31 05:38:26'),
(28, 1, 'Audi', '2020-07-31 05:38:26', '2020-07-31 05:38:26'),
(29, 1, 'Volvo', '2020-07-31 05:38:26', '2020-07-31 05:38:26'),
(30, 1, 'Land Rover', '2020-07-31 05:38:26', '2020-07-31 05:38:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_07_29_055211_create_categorias_table', 1),
(2, '2020_07_29_055229_create_carros_table', 1),
(3, '2020_07_29_055438_create_marcas_table', 1),
(4, '2020_07_29_055630_create_ativos_table', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `ativos`
--
ALTER TABLE `ativos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `carros`
--
ALTER TABLE `carros`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `ativos`
--
ALTER TABLE `ativos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `carros`
--
ALTER TABLE `carros`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
