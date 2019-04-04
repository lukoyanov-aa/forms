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
-- Структура таблицы `forms_b24portal`
--

CREATE TABLE `forms_b24portal` (
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
  `ccrm` varchar(255) NOT NULL,
  `bemail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `forms_settings_crm_fields`
--

CREATE TABLE `forms_settings_crm_fields` (
  `iid` int(11) NOT NULL,
  `ctype` varchar(255) NOT NULL,
  `cfield` varchar(255) NOT NULL,
  `ctext` text NOT NULL,
  `cfields_type` varchar(255) NOT NULL,
  `iforms_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `forms_settings_form_fields`
--

CREATE TABLE `forms_settings_form_fields` (
  `iid` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `iform_id` int(11) NOT NULL,
  `ctitle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8; 

-- --------------------------------------------------------

--
-- Структура таблицы `forms_settings_mail_fields`
--

CREATE TABLE `forms_settings_mail_fields` (
  `iid` int(11) NOT NULL,
  `cfield` varchar(255) NOT NULL,
  `ctext` text,
  `cfields_type` varchar(255) NOT NULL,
  `iforms_id` int(11) NOT NULL
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
-- Индексы таблицы `forms_b24portal`
--
ALTER TABLE `forms_b24portal`
  ADD PRIMARY KEY (`PORTAL`);

--
-- Индексы таблицы `forms_forms`
--
ALTER TABLE `forms_forms`
  ADD PRIMARY KEY (`iid`);
  
--
-- Индексы таблицы `forms_settings_crm_fields`
--
ALTER TABLE `forms_settings_crm_fields`
  ADD PRIMARY KEY (`iid`);

--
-- Индексы таблицы `forms_settings_form_fields`
--
ALTER TABLE `forms_settings_form_fields`
  ADD PRIMARY KEY (`iid`);

--
-- Индексы таблицы `forms_settings_mail_fields`
--
ALTER TABLE `forms_settings_mail_fields`
  ADD PRIMARY KEY (`iid`),
  ADD UNIQUE KEY `cfield_iforms_id` (`cfield`,`iforms_id`);

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
-- AUTO_INCREMENT для таблицы `forms_settings_crm_fields`
--
ALTER TABLE `forms_settings_crm_fields`
  MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT;COMMIT;
--
-- AUTO_INCREMENT для таблицы `forms_settings_form_fields`
--
ALTER TABLE `forms_settings_form_fields`
  MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT;COMMIT;
--
-- AUTO_INCREMENT для таблицы `forms_settings_mail_fields`
--
ALTER TABLE `forms_settings_mail_fields`
  MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT;COMMIT;
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

--
-- Дамп данных таблицы `forms_turn_groups`
--

INSERT INTO `forms_turn_groups` (`iid`, `cname`) VALUES
(1, 'Основная группа');

--
-- Дамп данных таблицы `forms_target_url`
--

INSERT INTO `forms_target_url` (`iid`, `cname`, `ctitle`, `csource_id`, `ctarget_url`, `cmail`) VALUES
(1, 'По умолчанию', 'по умолчанию', 'WEB', 'default', '');

--
-- Дамп данных таблицы `forms_settings_form_fields`
--

INSERT INTO `forms_settings_form_fields` (`iid`, `cname`, `iform_id`, `ctitle`) VALUES
(1, 'name', 0, 'Имя'),
(2, 'phone', 0, 'Номер телефона'),
(3, 'target', 0, 'Место расположение формы'),
(4, 'url', 0, 'Страница');