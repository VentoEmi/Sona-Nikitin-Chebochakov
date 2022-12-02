-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 02 2022 г., 09:24
-- Версия сервера: 5.7.38
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `sona`
--

-- --------------------------------------------------------

--
-- Структура таблицы `form`
--

CREATE TABLE `form` (
  `id` int(11) NOT NULL,
  `Check In` date NOT NULL,
  `Check Out` date NOT NULL,
  `guests` int(255) NOT NULL,
  `room_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `form_room`
--

CREATE TABLE `form_room` (
  `id` int(11) NOT NULL,
  `Room` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `form_room`
--

INSERT INTO `form_room` (`id`, `Room`) VALUES
(1, '1 ROOM\r\n'),
(2, '2 ROOM');

-- --------------------------------------------------------

--
-- Структура таблицы `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(255) NOT NULL,
  `size` int(255) NOT NULL,
  `capacity` int(255) NOT NULL,
  `bed` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `services` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `room`
--

INSERT INTO `room` (`id`, `name`, `price`, `size`, `capacity`, `bed`, `services`, `description`, `image`) VALUES
(1, 'Premium King Room', 200, 30, 4, 'King Bed', 'Wi-Fi, Bathroom, TV', 'Motorhome or Trailer that is the question for you. Here are some of the advantages and disadvantages of both, so you will be confident when purchasing an RV. When comparing Rvs, a motorhome or a travel trailer, should you buy a motorhome or fifth wheeler? The advantages and disadvantages of both are studied so that you can make your choice wisely when purchasing an RV. Possessing a motorhome or fifth wheel is an achievement of a lifetime. It can be similar to sojourning with your residence as you search the various sites of our great land, America.  The two commonly known recreational vehicle classes are the motorized and towable. Towable rvs are the travel trailers and the fifth wheel. The rv travel trailer or fifth wheel has the attraction of getting towed by a pickup or a car, thus giving the adaptability of possessing transportation for you when you are parked at your campsite.', 'https://static.tourvisor.ru/hotel_pics/verybig/47/drujba127-207108.jpg'),
(2, 'Gym', 300, 40, 10, 'mattress', 'horizontal bar, kettlebells', 'Memorizing gym equipment names and what they look like when starting your journey through fitness and putting together an exercise regiment can seem pretty daunting in the beginning.  One visit to your local public/private gym and it’s as if you’ve entered the Matrix, dozens of exercise machines roam the venue, and you’re not so sure if you’re the One prophesied to conquer them all.  We’ve put together this exercise equipment list to set you free from the unknown and expand your fitness horizons. This guide will help you put together an effective and informed workout regiment.', 'https://yourrealestaterescue.net/wp-content/uploads/2020/04/your-real-estate-rescue-fancy-home-gym-blog-post-1.jpg'),
(3, 'Lounge room', 350, 50, 6, 'presidential beds', 'bathroom, TV, hookah', 'Establishments made in the style of lounge areas with pleasant thoughtful interiors: nice soft sofas or other surfaces, zoning, decor. The hookah lounges have subdued diffused lights, soothing calm music plays. And of course there are hookahs. Thus, hookah lounge is a place for calm and relaxed leisure activities: meetings with friends, relaxing after a hard day, dating a girl.', 'https://ves.biz.ua/wp-content/uploads/2021/11/original_54221ad140c08845218b4585_5909bd46b418a.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `client` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `feedback` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `testimonials`
--

INSERT INTO `testimonials` (`id`, `client`, `text`, `feedback`) VALUES
(1, 'Vovaka Garila', 'The National Hotel Award is being held in 2022 for the fourth time. Every year the professional competition arouses more and more interest among both market participants and domestic tourists. Users of the resource now have the opportunity not only to get acquainted with the best representatives of the industry, but also to directly book a room in any of the nominating hotels directly on the website. Reservations are made without commission for hotels and any additional payments for guests.', 1),
(2, 'Lil Jeep', 'There are many decent 3 and 4* hotels in Turkey - these can be hospitable hotels in the heart of Turkish resort towns and cozy country ones, behind the doors of which there is beautiful nature, the staff is homely, and the prices for accommodation are pleasantly surprising. We have prepared a selection of Kemer 3 and 4* hotels with high ratings, good reviews and recommendations.', 5),
(3, 'Mihail Three Colors\r\n', 'Bad. Breakfast cost 250 rubles, on the spot they gave a ticket for 200 to the nearest cafe. Why not say it in advance? Then I would have gone with these 250 myself. There was almost nothing in the cafe (only pancakes and tea, two items on the menu), two portions of pancakes and tea turned out to be 110, the remaining 90 were gone. So-so story. In the reviews, many write about the Soviet repair. I expected to see a good repair, but very old and worn out. In fact, the repair is modern, but very, very cheap. We saved on everything. The furniture looks like cardboard, you can hear the whole hotel. There are cockroaches. And there wasn\'t even toilet paper. The room was the most economical. Clean, clean bedding, but cockroaches.', 2.7);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guests_id` (`guests`),
  ADD KEY `room_id` (`room_id`);

--
-- Индексы таблицы `form_room`
--
ALTER TABLE `form_room`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `form_room`
--
ALTER TABLE `form_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `form`
--
ALTER TABLE `form`
  ADD CONSTRAINT `form_ibfk_1` FOREIGN KEY (`guests`) REFERENCES `guests` (`id`),
  ADD CONSTRAINT `form_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `form_room` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
