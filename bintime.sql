-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июл 19 2019 г., 11:53
-- Версия сервера: 10.1.40-MariaDB
-- Версия PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bintime`
--

-- --------------------------------------------------------

--
-- Структура таблицы `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `zip` int(11) NOT NULL,
  `country` varchar(2) NOT NULL,
  `city` varchar(30) NOT NULL,
  `street` varchar(40) NOT NULL,
  `house` varchar(10) NOT NULL,
  `flat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `zip`, `country`, `city`, `street`, `house`, `flat`) VALUES
(2, 5, 33666, 'US', 'New York', 'Green', '25', '2'),
(3, 5, 55588, 'UK', 'London', 'Downing', '36', '9'),
(4, 5, 22266, 'RU', 'St. Petersburg', 'Zelenaya', '22', ''),
(5, 6, 77744, 'UA', 'Kahovka', 'Ushakova', '62', '36'),
(8, 8, 99666, 'Но', 'Wellington', 'Road', '89', '39'),
(9, 9, 2255, 'UA', 'Kiev', 'Grushevskogo', '64', '698'),
(10, 10, 66998, 'UA', 'Boyarka', 'Main', '98', ''),
(11, 11, 66999, 'UA', 'Kharkov', 'White', '63', ''),
(13, 5, 69854, 'UA', 'Sumy', 'Grivni', '87', '1'),
(14, 5, 69354, 'RU', 'Gorkiy', 'Horoshaya', '65', ''),
(15, 5, 44564, 'GZ', 'Koval', 'Lame', '58', ''),
(16, 5, 44999, 'MN', 'Rand', 'Geek', '87', ''),
(17, 5, 33666, 'JS', 'Horn', 'Lomb', '7', ''),
(18, 5, 88999, 'NB', 'Malan', 'Wern', '8', ''),
(19, 5, 33467, 'KR', 'Ntuh', 'Fent', '96', '88'),
(20, 5, 55666, 'MN', 'Junr', 'Gteer', '8', '1e'),
(23, 5, 44333, 'JU', 'Feen', 'Poom', '34', '11'),
(25, 12, 44666, 'HY', 'Bgern', 'Hnurr', '76', '');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `date` datetime NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`, `surname`, `gender`, `date`, `email`) VALUES
(5, 'roman89', 'Nghvb37g', 'Roman', 'Panshyn', 'male', '2019-07-17 20:51:52', 'romanpanshyn@gmail.com'),
(6, 'ivan34', 'G37vklo', 'Ivan', 'Zhuravlev', 'male', '2019-07-19 09:23:11', 'ivanzhuravlev@gmail.com'),
(8, 'jade23', 'Gh7fmko98', 'Jade', 'Smith', 'female', '2019-07-19 10:19:56', 'jadesmith2@gmail.com'),
(9, 'taras56', 'Fh38gndkms', 'Taras', 'Shevchenko', 'male', '2019-07-19 10:26:06', 'tarasshevchenko@gmail.com'),
(10, 'stepan8', 'Tybnm*3g', 'Stepan', 'Bandera', 'male', '2019-07-19 10:27:12', 'stepanbandera@gmail.com'),
(11, 'vladimir45', 'G38gHye3m', 'Vladimir', 'Kocherga', 'male', '2019-07-19 10:28:51', 'vladimkoch66@gmail.com'),
(12, 'vasyl9', 'Vd3grt%', 'Vasyl', 'Kozhak', 'no_information', '2019-07-19 10:31:28', 'vaskozh@gmail.com');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
