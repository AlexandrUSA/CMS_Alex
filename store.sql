-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 09 2018 г., 23:58
-- Версия сервера: 5.7.20
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `store`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(200) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `title`, `slug`) VALUES
(1, 'Наша команда', 'team'),
(2, 'Контакты', 'contacts'),
(3, 'Услуги', 'services'),
(4, 'Наш блог', 'blog'),
(5, 'Новости', 'news'),
(6, 'Последние дела', 'last'),
(7, 'Новости', 'news');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(200) NOT NULL,
  `title` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `count` int(11) NOT NULL,
  `price` float NOT NULL,
  `description` text NOT NULL,
  `catalog_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `title`, `brand`, `count`, `price`, `description`, `catalog_id`) VALUES
(1, 'КОСТЮМ M564 СЕРЫЙ', 'Veore Clothing', 25, 24.4, 'Костюм состоит из юбки-карандаш и кофты прямого кроя. Юбка с широкой резинкой другого цвета от основного цвета юбки. У кофты круглый вырез, отделан резинкой. Рукав длинный, вточной. На рукавах металлические вставки по низу рукава. ', 3),
(2, 'ЮБКА M448 ЧЕРНАЯ', 'gucci', 23, 32, 'Классическая женская юбка расклешенной формы. Резинка узкая. Застежка сзади:молния. Перед отделан заклепками. ', 3),
(3, 'Ноутбук Lenovo IdeaPad 110-15IBR', 'Lenovo', 12, 550.5, '15.6\" 1366 x 768 глянцевый, Intel Celeron N3060 1600 МГц, 2 ГБ, 128 Гб (SSD), Intel HD Graphics 400, DOS, цвет крышки черный, цвет корпуса черный', 5),
(4, 'Монитор Acer EB192Qb', 'Acer', 7, 120, '18.5\", 16:9, 1366x768, TN+Film, 60 Hz, интерфейсы D-Sub (VGA)', 6),
(7, 'Мобильный телефон Alcatel One Touch 1016D Black', 'Alcatel', 58, 45, 'экран 1.8\" TFT (128x160), аккумулятор 400 мАч, Dual SIM, цвет черный', 5),
(8, 'ТУФЛИ Q219 КРАСНЫ', 'Araz', 57, 55, 'Сезон: материал верха - иск.кожа (лак), высота каблука - 10,5 см , полнота до 9 см. Не на широкую ногу. ', 4),
(9, 'Роликовые коньки-трансофрмеры для девочек PW-232-B 29', 'Velcro', 68, 94, 'Пластиковая рама, полиуретановые колеса 72x76 mm, подшипник ABEC-5, шнуровка ботинка, застежка \"Velcro\". На этой же фабрике в Китае размещают свои заказы, такие известные мировые бренды и торговые сети как \"K2\", \"ROCES\", \"WALMART\", \"CARREFOUR\", \"TRU\", что подтверждает качество производимой продукции. Отличный вариант как для начинающих любителей роликовых коньков, так и любителей со стажем.  Простая система регулировки размера. ', 10),
(10, 'Кровать из массива 3601 с основанием, цвет - белый с патиной', 'Белдрев', 10, 600, 'Кровать из массива гевеи со встроенным ортопедическим основанием для матраса. Визуальная демократичность с легкими винтажными нотками составляют стилевую концепцию этой модели. Приятный цвет и универсальная форма позволяют кровати достойно соответствовать большинству интерьерных решений. Отличный вариант для того, кто ценит в мебели удобство и практичность!', 2),
(100, 'ЛЕГИНСЫ ЖЕНСКИЕ', 'topsport', 34, 17.94, 'егинсы женские для спорта и отдыха выполнены из трикотажного полотна. Легинсы длиной до щиколоток, плотно облегающие ноги по всей длине с высокой талией. Задние половинки на кокетке фигурной формы. По низу задних половинок наклонные рельефы. Нижняя часть задних половинок с вертикальным членением состоит из трех частей. Средняя часть - отделочная жаккардовая тесьма.', 10),
(101, 'ДЖЕМПЕР ЖЕНСКИЙ', 'topsport', 18, 9.9, 'Джемпер женский изготовлен из трикотажного полотна, длиной до середины бедер. Полуприлегающего силуэта. Горловина круглой формы. Рукава короткие.', 10);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status`, `order_date`) VALUES
(3, 3, 'Доставка', '2018-01-11'),
(4, 8, 'Ждет оплаты', '2018-01-12'),
(5, 1, 'Завершен', '2018-01-04'),
(6, 9, 'Доставка', '2018-01-10'),
(7, 5, 'Анулирован', '2018-01-11'),
(8, 3, 'Новый', '2018-01-09'),
(9, 5, 'Завершен', '2018-01-05'),
(10, 8, 'Доставка', '2018-01-10'),
(11, 7, 'Ждет оплаты', '2018-01-09'),
(12, 2, 'Завершен', '2018-01-03');

-- --------------------------------------------------------

--
-- Структура таблицы `order_structure`
--

CREATE TABLE `order_structure` (
  `id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_structure`
--

INSERT INTO `order_structure` (`id`, `product_id`, `price`) VALUES
(3, 7, 45),
(4, 8, 55),
(5, 3, 550),
(6, 9, 94),
(7, 1, 24),
(8, 7, 45),
(9, 4, 120),
(10, 10, 600),
(11, 1, 24),
(12, 100, 17.94);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(70) NOT NULL,
  `role` enum('admin','moderator','user','') NOT NULL DEFAULT 'user',
  `hash` varchar(32) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '0',
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `birthday`, `email`, `password`, `role`, `hash`, `is_active`, `reg_date`, `last_update`) VALUES
(12, 'Alexandr', 'Grinevich', '2001-01-08', 'AlexandrUSA@yandex.ru', 'b59c67bf196a4758191e42f76670ceba', 'admin', 'f800ece0a9fdfac83f51d24e638d083f', 1, '2018-02-05 00:31:32', '2018-02-05 00:31:32');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_structure`
--
ALTER TABLE `order_structure`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `order_structure`
--
ALTER TABLE `order_structure`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
