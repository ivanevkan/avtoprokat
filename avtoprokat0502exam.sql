-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 30 2024 г., 11:58
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `avtoprokat0502exam`
--

-- --------------------------------------------------------

--
-- Структура таблицы `arenda`
--

CREATE TABLE `arenda` (
  `id_arenda` int NOT NULL,
  `id_user` int NOT NULL,
  `id_car` int NOT NULL,
  `date` date NOT NULL,
  `days` int NOT NULL,
  `summ` decimal(11,2) NOT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `arenda`
--

INSERT INTO `arenda` (`id_arenda`, `id_user`, `id_car`, `date`, `days`, `summ`, `status`) VALUES
(3, 2, 2, '2024-11-30', 4, '6000.00', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `car`
--

CREATE TABLE `car` (
  `id_car` int NOT NULL,
  `id_marka` int NOT NULL,
  `model` varchar(30) NOT NULL,
  `stoimost_day` decimal(11,2) NOT NULL,
  `zalog` decimal(9,0) NOT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `car`
--

INSERT INTO `car` (`id_car`, `id_marka`, `model`, `stoimost_day`, `zalog`, `status`) VALUES
(1, 1, 'Калина', '1400.00', '3000', 1),
(2, 1, 'Приора', '1500.00', '4000', 1),
(3, 2, '412', '1500.00', '2500', 1),
(4, 2, '2140', '1450.00', '2500', 1),
(5, 3, 'Ока 1111', '1200.00', '1200', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `marka`
--

CREATE TABLE `marka` (
  `id_marka` int NOT NULL,
  `name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `marka`
--

INSERT INTO `marka` (`id_marka`, `name`) VALUES
(1, 'Lada'),
(2, 'Москвич'),
(3, 'КамАЗ');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `name` varchar(60) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id_user`, `name`, `login`, `password`) VALUES
(1, 'Васильев Василий Васильевич', 'vasily', 'vasily'),
(2, 'Петров Пётр Петрович', 'petrov', 'petrov'),
(3, 'Иванов Иван Иванович', 'ivanovich', 'ivanovich');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `arenda`
--
ALTER TABLE `arenda`
  ADD PRIMARY KEY (`id_arenda`),
  ADD KEY `id_car` (`id_car`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id_car`),
  ADD KEY `id_marka` (`id_marka`);

--
-- Индексы таблицы `marka`
--
ALTER TABLE `marka`
  ADD PRIMARY KEY (`id_marka`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `arenda`
--
ALTER TABLE `arenda`
  MODIFY `id_arenda` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `car`
--
ALTER TABLE `car`
  MODIFY `id_car` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `marka`
--
ALTER TABLE `marka`
  MODIFY `id_marka` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `arenda`
--
ALTER TABLE `arenda`
  ADD CONSTRAINT `arenda_ibfk_1` FOREIGN KEY (`id_car`) REFERENCES `car` (`id_car`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `arenda_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`id_marka`) REFERENCES `marka` (`id_marka`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
