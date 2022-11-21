-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 21 2022 г., 23:21
-- Версия сервера: 8.0.24
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `registration_of_applications`
--

-- --------------------------------------------------------

--
-- Структура таблицы `contribution(entity)`
--

CREATE TABLE `contribution(entity)` (
  `id` int NOT NULL,
  `surname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `patronymic` varchar(255) NOT NULL,
  `inn` int NOT NULL,
  `org_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `ogrn` int NOT NULL,
  `org_inn` int NOT NULL,
  `kpp` int NOT NULL,
  `date_of_opening` date NOT NULL,
  `date_of_closing` date NOT NULL,
  `term` int NOT NULL,
  `bid (%)` int NOT NULL,
  `periodicity of capitalization` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `contribution(individual)`
--

CREATE TABLE `contribution(individual)` (
  `id` int NOT NULL,
  `surname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `patronymic` varchar(255) NOT NULL,
  `inn` int NOT NULL,
  `date_of_birth` date NOT NULL,
  `passport (series)` int NOT NULL,
  `passport (number)` int NOT NULL,
  `passport (date of issue)` date NOT NULL,
  `date_of_opening` date NOT NULL,
  `date_of_closing` date NOT NULL,
  `term (month)` int NOT NULL,
  `bid (%)` int NOT NULL,
  `periodicity of capitalization` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `credit(entity)`
--

CREATE TABLE `credit(entity)` (
  `id` int NOT NULL,
  `surname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `patronymic` varchar(255) NOT NULL,
  `inn` int NOT NULL,
  `name_of_company` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `OGRN` int NOT NULL,
  `inn(organization)` int NOT NULL,
  `kpp` int NOT NULL,
  `date_of_opening` date NOT NULL,
  `date_of_closing` date NOT NULL,
  `term(in_month)` int NOT NULL,
  `sum` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `credit(individual)`
--

CREATE TABLE `credit(individual)` (
  `id` int NOT NULL,
  `surname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `patronymic` varchar(255) NOT NULL,
  `inn` int NOT NULL,
  `date_of_birth` date NOT NULL,
  `passport (series)` int NOT NULL,
  `passport (number)` int NOT NULL,
  `passport (date of issue)` date NOT NULL,
  `date_of_opening` date NOT NULL,
  `date_of_closing` date NOT NULL,
  `term (month)` int NOT NULL,
  `sum` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `contribution(entity)`
--
ALTER TABLE `contribution(entity)`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `contribution(individual)`
--
ALTER TABLE `contribution(individual)`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `credit(entity)`
--
ALTER TABLE `credit(entity)`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `credit(individual)`
--
ALTER TABLE `credit(individual)`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `contribution(entity)`
--
ALTER TABLE `contribution(entity)`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `contribution(individual)`
--
ALTER TABLE `contribution(individual)`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `credit(entity)`
--
ALTER TABLE `credit(entity)`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `credit(individual)`
--
ALTER TABLE `credit(individual)`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
