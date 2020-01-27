-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 27 2020 г., 17:08
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `fw`
--

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `lang_code` varchar(10) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `excerpt` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `lang_code`, `category_id`, `title`, `excerpt`, `text`, `keywords`, `description`) VALUES
(1, 'ru', 2, 'Адаптивный дизайн сайта и основные стратегии по его внедрению', 'Адаптивный дизайн сайта — это совершенно новый подход к дизайну, который привлекает к себе все больше внимания, но, учитывая, насколько сильно он отличается от традиционных методов разработки, вначале он может показаться заоблачно сложным для начинающих в', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia optio odit unde quam dolore vel vitae in! Obcaecati velit rem alias exercitationem error eveniet autem, voluptatibus esse ab placeat blanditiis omnis! Necessitatibus, officia velit, laboriosam deleniti quis aperiam? Nesciunt inventore consequuntur dolores, excepturi magnam illum modi unde quis sit deserunt.</p>', 'адаптивный дизайн', 'Адаптивный дизайн сайта и основные стратегии по его внедрению'),
(2, 'ru', 2, 'Советы по выравниванию иконок в тексте', 'Иконки сейчас очень популярны, они дополняют контент (в большинстве случаев). Но с другой стороны они могут доставить немало хлопот. Если вы определились с форматом (SVG или шрифты-иконки?) и создали сами иконки, все равно по мере разработки будут всплыва', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia optio odit unde quam dolore vel vitae in! Obcaecati velit rem alias exercitationem error eveniet autem, voluptatibus esse ab placeat blanditiis omnis! Necessitatibus, officia velit, laboriosam deleniti quis aperiam? Nesciunt inventore consequuntur dolores, excepturi magnam illum modi unde quis sit deserunt.</p>', 'ключевики', 'мета-описание'),
(3, 'ru', 1, 'Редко используемые селекторы JQuery', 'Селекторы в JQuery играют главенствующую роль. Большинство методов в JQuery работают только на каких-то элементах, поэтому перед их использованием необходимо выбрать какой-либо тег. К примеру, чтобы прикрепить событие click к кнопке, эту кнопку сначала не', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia optio odit unde quam dolore vel vitae in! Obcaecati velit rem alias exercitationem error eveniet autem, voluptatibus esse ab placeat blanditiis omnis! Necessitatibus, officia velit, laboriosam deleniti quis aperiam? Nesciunt inventore consequuntur dolores, excepturi magnam illum modi unde quis sit deserunt.</p>', NULL, NULL),
(4, 'ru', 4, 'Тестовый пост', 'lorem ipsum...', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia optio odit unde quam dolore vel vitae in! Obcaecati velit rem alias exercitationem error eveniet autem, voluptatibus esse ab placeat blanditiis omnis! Necessitatibus, officia velit, laboriosam deleniti quis aperiam? Nesciunt inventore consequuntur dolores, excepturi magnam illum modi unde quis sit deserunt.</p>', '', ''),
(5, 'ru', 4, 'Тестовый пост 2', 'Краткое описание статьи \"Тестовый пост\"', '42342', '', ''),
(7, 'en', 2, 'ENАдаптивный дизайн сайта и основные стратегии по его внедрению', 'ENАдаптивный дизайн сайта — это совершенно новый подход к дизайну, который привлекает к себе все больше внимания, но, учитывая, насколько сильно он отличается от традиционных методов разработки', '<p>ENLorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia optio odit unde quam dolore vel vitae in! Obcaecati velit rem alias exercitationem error eveniet autem, voluptatibus esse ab placeat blanditiis omnis! Necessitatibus, officia velit, laboriosam deleniti quis aperiam? Nesciunt inventore consequuntur dolores, excepturi magnam illum modi unde quis sit deserunt.</p>', 'адаптивный дизайн', 'Адаптивный дизайн сайта и основные стратегии по его внедрению');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
