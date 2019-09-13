-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 01 2019 г., 12:41
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `www`
--

-- --------------------------------------------------------

--
-- Структура таблицы `accs`
--

CREATE TABLE IF NOT EXISTS `accs` (
  `name` text NOT NULL,
  `id` int(11) NOT NULL,
  `pass` text NOT NULL,
  `mail` int(11) NOT NULL,
  `sex` int(11) NOT NULL,
  `skin` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `cash` int(11) NOT NULL,
  `bank` int(11) NOT NULL,
  `pnumber` int(11) NOT NULL,
  `regip` text NOT NULL,
  `lastip` text NOT NULL,
  `exp` int(11) NOT NULL,
  `licenses` int(11) NOT NULL,
  `credits` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `accs`
--

INSERT INTO `accs` (`name`, `id`, `pass`, `mail`, `sex`, `skin`, `level`, `cash`, `bank`, `pnumber`, `regip`, `lastip`, `exp`, `licenses`, `credits`) VALUES
('Jason_Steward', 1, 'qweqwe123123', 0, 1, 223, 32, 125478568, 4862448, 77777, '', '', 20, 1, '85412');

-- --------------------------------------------------------

--
-- Структура таблицы `bans`
--

CREATE TABLE IF NOT EXISTS `bans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` text NOT NULL,
  `admin_name` text NOT NULL,
  `date` date NOT NULL,
  `reason` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `bans`
--

INSERT INTO `bans` (`id`, `user_name`, `admin_name`, `date`, `reason`) VALUES
(1, 'Pot_Altrhaida', 'Kek', '2018-04-17', 'lox');

-- --------------------------------------------------------

--
-- Структура таблицы `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` text NOT NULL,
  `money` int(11) NOT NULL,
  `text` text NOT NULL,
  `uses` text NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `logs`
--

INSERT INTO `logs` (`date`, `name`, `money`, `text`, `uses`, `id`) VALUES
('2019-05-01 07:38:44', 'Jason_Steward', 560, 'передал деньги <a href="/panel/Frederick_Wayne">Frederick_Wayne</a>', 'Такси', 1),
('2019-05-01 07:38:48', 'Jason_Steward', 100001, 'передал деньги <a href="/panel/Frederick_Wayne">Frederick_Wayne</a>', 'Такси', 2),
('2019-05-01 07:38:50', 'Jason_Steward', 0, 'вышел с сервера', 'Выход', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ЭТО НЕ НУЖНАЯ ТАБЛИЦА` int(11) NOT NULL AUTO_INCREMENT,
  `МНЕ ПРОСТО ЕЁ ЛЕНЬ БЫЛО УДАЛЯТЬ` text NOT NULL,
  `pass` text NOT NULL,
  `admin` int(11) NOT NULL,
  `helper` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `money` int(11) NOT NULL,
  `bank` int(11) NOT NULL,
  `donate` text NOT NULL,
  `regip` text NOT NULL,
  `lastip` text NOT NULL,
  `warn` int(11) NOT NULL,
  `lastupdate` text NOT NULL,
  `resetprofile` text NOT NULL,
  `black_list` int(11) NOT NULL,
  `admin_dostup_1` int(11) NOT NULL,
  `admin_dostup_2` int(11) NOT NULL,
  `admin_dostup_3` int(11) NOT NULL,
  `admin_dostup_4` int(11) NOT NULL,
  `admin_dostup_5` int(11) NOT NULL,
  `admin_dostup_6` int(11) NOT NULL,
  PRIMARY KEY (`ЭТО НЕ НУЖНАЯ ТАБЛИЦА`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
