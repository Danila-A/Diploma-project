-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 05 2022 г., 17:29
-- Версия сервера: 8.0.19
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `temp_avia`
--

-- --------------------------------------------------------

--
-- Структура таблицы `appclication`
--

CREATE TABLE `appclication` (
  `id_appclication` int NOT NULL,
  `id_vacancy` int NOT NULL,
  `date_application` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name_user` varchar(255) NOT NULL,
  `id_user` int NOT NULL,
  `email_appclication` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone_appclication` varchar(255) NOT NULL,
  `file_appclication` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status_app` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `appclication`
--

INSERT INTO `appclication` (`id_appclication`, `id_vacancy`, `date_application`, `name_user`, `id_user`, `email_appclication`, `phone_appclication`, `file_appclication`, `status_app`) VALUES
(14, 5, '2022-03-10 13:24:35', 'муняня', 11, 'asdfas@mail.ru', '12312312312', 'New_Total_English_-_Starter_Wordlist.pdf', 2),
(30, 1, '2022-05-23 21:04:52', 'Данила', 14, 'Danilaa@mail.ru', '+79200022449', 'Тело диплома Кошелев дубль 2.docx', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id_category` int NOT NULL,
  `name_category` varchar(255) NOT NULL,
  `sort_order` int NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id_category`, `name_category`, `sort_order`, `status`) VALUES
(1, 'специалисты', 1, 1),
(2, 'руководители', 2, 1),
(3, 'рабочие', 3, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `name_user` varchar(255) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `phone_user` varchar(255) NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id_user`, `name_user`, `email_user`, `phone_user`, `password_user`, `role`) VALUES
(1, 'Афганец', 'Afganec@yandex.ru', '+72312312324', '111', 'admin'),
(2, 'Женя', 'Zhenya@yandex.ru', '+72312312323', '121', NULL),
(3, 'Никита', 'Nikita@yandex.ru', '+72312312323', '222', NULL),
(4, 'Данила', 'danila@yandex.ru', '+12312312322', '123', NULL),
(5, 'Жека', 'Zheka@yandex.ru', '12312312312', '123', NULL),
(6, 'Никитос', 'Nikitos@yandex.ru', '12312312312', '123', NULL),
(11, 'муняня', 'asdfas@mail.ru', '12312312312', '123', NULL),
(13, 'Данила', 'dan4ik.rus@mail.ru', '12312312312', '123', NULL),
(14, 'Данила', 'Danilaa@mail.ru', '+79200022449', '123', NULL),
(15, 'admin', 'admin@mail.ru', '12343212341', '123', 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `vacancy`
--

CREATE TABLE `vacancy` (
  `id_vacancy` int NOT NULL,
  `name_vacancy` varchar(255) NOT NULL,
  `id_category` int NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `vacancy`
--

INSERT INTO `vacancy` (`id_vacancy`, `name_vacancy`, `id_category`, `status`) VALUES
(1, 'Сварщик', 3, 1),
(2, 'менеджер', 2, 1),
(3, 'Системный Администратор', 1, 1),
(5, 'Уборщик', 3, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `appclication`
--
ALTER TABLE `appclication`
  ADD PRIMARY KEY (`id_appclication`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Индексы таблицы `vacancy`
--
ALTER TABLE `vacancy`
  ADD PRIMARY KEY (`id_vacancy`),
  ADD KEY `id_category` (`id_category`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `appclication`
--
ALTER TABLE `appclication`
  MODIFY `id_appclication` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `vacancy`
--
ALTER TABLE `vacancy`
  MODIFY `id_vacancy` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `appclication`
--
ALTER TABLE `appclication`
  ADD CONSTRAINT `appclication_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ограничения внешнего ключа таблицы `vacancy`
--
ALTER TABLE `vacancy`
  ADD CONSTRAINT `vacancy_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
