-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Мар 18 2019 г., 08:18
-- Версия сервера: 5.6.39-83.1
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


--
-- Структура таблицы `b24portal`
--

CREATE TABLE `b24portal` (
  `PORTAL` char(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ACCESS_TOKEN` char(70) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `REFRESH_TOKEN` char(70) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `MEMBER_ID` char(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `forms_forms`
--

CREATE TABLE `forms_forms` (
  `iid` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `igroup_id` int(11) NOT NULL,
  `iya_counter_id` int(11) NOT NULL,
  `cya_metrika_target` varchar(255) NOT NULL,
  `icrm` int(11) NOT NULL,
  `bemail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `forms_target_url`
--

CREATE TABLE `forms_target_url` (
  `iid` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `ctitle` varchar(255) NOT NULL,
  `csource_id` varchar(255) NOT NULL,
  `ctarget_url` varchar(255) NOT NULL,
  `cmail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `forms_turn_groups`
--

CREATE TABLE `forms_turn_groups` (
  `iid` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `forms_turn_groups_managers`
--

CREATE TABLE `forms_turn_groups_managers` (
  `iid` int(11) NOT NULL,
  `igroups_id` int(11) NOT NULL,
  `imanagers_id` int(11) NOT NULL,
  `iturn_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `forms_turn_managers`
--

CREATE TABLE `forms_turn_managers` (
  `iid` int(11) NOT NULL,
  `ib24_user_id` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `b24portal`
--
ALTER TABLE `b24portal`
  ADD PRIMARY KEY (`PORTAL`);

--
-- Индексы таблицы `forms_forms`
--
ALTER TABLE `forms_forms`
  ADD PRIMARY KEY (`iid`);

--
-- Индексы таблицы `forms_target_url`
--
ALTER TABLE `forms_target_url`
  ADD PRIMARY KEY (`iid`),
  ADD UNIQUE KEY `ctarget_url` (`ctarget_url`);

--
-- Индексы таблицы `forms_turn_groups`
--
ALTER TABLE `forms_turn_groups`
  ADD PRIMARY KEY (`iid`);

--
-- Индексы таблицы `forms_turn_groups_managers`
--
ALTER TABLE `forms_turn_groups_managers`
  ADD PRIMARY KEY (`iid`);

--
-- Индексы таблицы `forms_turn_managers`
--
ALTER TABLE `forms_turn_managers`
  ADD PRIMARY KEY (`iid`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `forms_forms`
--
ALTER TABLE `forms_forms`
  MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `forms_target_url`
--
ALTER TABLE `forms_target_url`
  MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `forms_turn_groups`
--
ALTER TABLE `forms_turn_groups`
  MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `forms_turn_groups_managers`
--
ALTER TABLE `forms_turn_groups_managers`
  MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `forms_turn_managers`
--
ALTER TABLE `forms_turn_managers`
  MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--
