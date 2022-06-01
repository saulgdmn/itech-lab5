-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 01 2022 г., 23:07
-- Версия сервера: 10.4.24-MariaDB
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `itech`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id_category`, `name`) VALUES
(0, 'Laptop'),
(1, 'CPU'),
(2, 'RAM');

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE `items` (
  `id_item` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `quality` varchar(30) NOT NULL,
  `fid_vendor` int(11) NOT NULL,
  `fid_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`id_item`, `name`, `price`, `quantity`, `quality`, `fid_vendor`, `fid_category`) VALUES
(0, 'ASUS X555QG', 15000, 10, 'fine', 0, 0),
(1, 'a10-4600m', 9000, 15, 'excellent', 1, 1),
(2, 'Kingston Fury DDR4-3200 16384', 3000, 20, 'good', 2, 2),
(3, 'IdeaPad 3 15IIL05', 18899, 15, 'good', 3, 0),
(4, 'Ryzen 9 5900X', 15700, 15, 'excellent', 1, 1),
(5, 'Value Ram SO-DIMM 8Gb DDR4 PC2', 1440, 20, 'fine', 2, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `vendors`
--

CREATE TABLE `vendors` (
  `id_vendor` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `vendors`
--

INSERT INTO `vendors` (`id_vendor`, `name`) VALUES
(0, 'ASUS'),
(1, 'AMD'),
(2, 'Kingston'),
(3, 'Lenovo');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Индексы таблицы `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `fk_vendor` (`fid_vendor`),
  ADD KEY `fk_category` (`fid_category`);

--
-- Индексы таблицы `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id_vendor`);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`fid_category`) REFERENCES `category` (`id_category`),
  ADD CONSTRAINT `fk_vendor` FOREIGN KEY (`fid_vendor`) REFERENCES `vendors` (`id_vendor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
