-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Дек 30 2015 г., 14:06
-- Версия сервера: 5.6.24
-- Версия PHP: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `storage`
--

-- --------------------------------------------------------

--
-- Структура таблицы `ads`
--

CREATE TABLE IF NOT EXISTS `ads` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ads`
--

INSERT INTO `ads` (`id`, `image`, `url`, `visible`) VALUES
(1, 'Desert.jpg', 'https://site1.com', 1),
(3, 'Koala.jpg', 'https://site2.com', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `billing_dates`
--

CREATE TABLE IF NOT EXISTS `billing_dates` (
  `id` int(11) NOT NULL,
  `last_billed_mo` int(10) unsigned NOT NULL,
  `bill_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` tinyint(3) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `employees`
--

INSERT INTO `employees` (`id`, `login`, `password`, `first_name`, `last_name`, `email`, `phone`, `address`, `created`, `updated`, `role`) VALUES
(1, 'admin', '$2y$10$53bb40283dcdb006d464au1jH8z09aPCxVsPpXpw6i7SxEoQPcl7e', 'AdminName', 'AdminLastName', 'admin@site.com', '65465465465', 'my address', '2015-12-25 11:46:48', '2015-12-25 11:46:48', 1),
(2, 'test1', '$2y$10$53bb40283dcdb006d464au1jH8z09aPCxVsPpXpw6i7SxEoQPcl7e', 'test2', 'test', 'test@test.com', '5646546', 'asd asd as sa a s', '2015-12-26 07:14:41', '2015-12-26 07:14:41', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `shopper_billing_records`
--

CREATE TABLE IF NOT EXISTS `shopper_billing_records` (
  `record_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `in_carrier_id` int(11) NOT NULL,
  `in_tracking_id` int(11) NOT NULL,
  `our_price` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `customer_pays` decimal(10,2) NOT NULL,
  `customer_paid` decimal(10,2) NOT NULL,
  `transaction_cost` decimal(10,2) NOT NULL,
  `cleared_amount` decimal(10,2) NOT NULL,
  `our_part` decimal(10,2) NOT NULL,
  `provider_part` decimal(10,2) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `transaction_end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `billed` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `billing_dates`
--
ALTER TABLE `billing_dates`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `shopper_billing_records`
--
ALTER TABLE `shopper_billing_records`
  ADD PRIMARY KEY (`record_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `billing_dates`
--
ALTER TABLE `billing_dates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `shopper_billing_records`
--
ALTER TABLE `shopper_billing_records`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
