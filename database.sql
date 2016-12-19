--
-- Baza danych: `sklepinternetowy`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(11) unsigned NOT NULL,
  `parent_id` int(11) unsigned DEFAULT NULL,
  `name` varchar(128) NOT NULL,
  `description` text,
  `hidden` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `description`, `hidden`) VALUES
(1, NULL, 'kat 1', 'op kat 1', 1),
(2, 1, 'kat 2', 'ghsghd', 1),
(3, 1, 'pod kat 1', 'op pod kat 1', 1),
(5, 3, 'pod kat 3 1', 'op pod kat 3 1', 1),
(7, NULL, 'kat 3', 'op kat 3', 1),
(8, NULL, 'kat 4', 'pod kat 3 1', 1),
(9, 8, 'pod kat 8 1', 'op pod kat 8 1', 0),
(10, 5, 'agadf gdf', 'dfhsdfh', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `category_products`
--

CREATE TABLE IF NOT EXISTS `category_products` (
`id` int(11) unsigned NOT NULL,
  `categories_id` int(11) unsigned NOT NULL,
  `products_id` int(11) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `category_products`
--

INSERT INTO `category_products` (`id`, `categories_id`, `products_id`) VALUES
(36, 5, 15),
(38, 7, 16),
(39, 1, 17),
(40, 9, 18),
(41, 3, 14);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `delivery_destinations`
--

CREATE TABLE IF NOT EXISTS `delivery_destinations` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(32) NOT NULL,
  `surname` varchar(32) NOT NULL,
  `company_name` varchar(64) DEFAULT NULL,
  `street_number` varchar(64) NOT NULL,
  `postal_code` varchar(6) NOT NULL,
  `city` varchar(64) NOT NULL,
  `phone_number` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `delivery_destinations`
--

INSERT INTO `delivery_destinations` (`id`, `name`, `surname`, `company_name`, `street_number`, `postal_code`, `city`, `phone_number`) VALUES
(7, 'Jan', 'Kowalski', '', 'Cos 11/21', '12-345', 'Warszawa', '123-456-789'),
(8, 'Jan', 'Kowalski', '', 'Cos 11/21', '12-345', 'Warszawa', '123-456-789'),
(9, 'Jan', 'Kowalski', '', 'Cos 11/21', '12-345', 'Warszawa', '123-456-789'),
(10, 'Jan', 'Kowalski', '', 'Cos 11/21', '12-345', 'Warszawa', '123-456-789'),
(11, 'Jan', 'Kowalski', '', 'Cos 11/21', '12-345', 'Warszawa', '123-456-789'),
(12, 'sdfhfbd', 'xcvbxcvb', 'Super firma S.A.', 'Cos 11/21', '22352', 'Warszawa', '3t34t3wt'),
(13, 'Marek', 'Nowak', '', 'COs 123/12', '11-123', 'Kraków', '321-321-123'),
(14, 'klient1', 'klinent1', 'podoleupsdfgjtuh', 'siema 33/45', '34-555', 'kololololoo', '233456689');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `delivery_methods`
--

CREATE TABLE IF NOT EXISTS `delivery_methods` (
`id` int(3) unsigned NOT NULL,
  `name` varchar(64) NOT NULL,
  `cost` double(6,2) DEFAULT NULL,
  `hidden` tinyint(1) NOT NULL DEFAULT '1',
  `description` text
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `delivery_methods`
--

INSERT INTO `delivery_methods` (`id`, `name`, `cost`, `hidden`, `description`) VALUES
(1, 'Kurier DHL', 25.25, 0, 'Dostawa w ciągu 3 dni roboczych.'),
(2, 'Kurier GLS', 15.30, 0, 'Dostawa w ciągu 7 dni.'),
(3, 'Poczta polska', 10.00, 0, 'Dostawa w ciągu 2 tygodni');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delivery_methods_id` int(3) unsigned NOT NULL,
  `delivery_destinations_id` int(11) unsigned NOT NULL,
  `payment_methods_id` int(3) unsigned NOT NULL,
  `status_orders_id` int(2) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `date`, `delivery_methods_id`, `delivery_destinations_id`, `payment_methods_id`, `status_orders_id`) VALUES
(4, 1, '2016-12-16 12:22:27', 2, 10, 2, 3),
(5, 1, '2016-12-16 12:29:30', 2, 11, 2, 4),
(6, 1, '2016-12-16 12:32:52', 3, 12, 1, 4),
(7, 1, '2016-12-16 13:49:02', 1, 13, 1, 3),
(8, 15, '2016-12-16 13:52:05', 1, 14, 2, 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `order_products`
--

CREATE TABLE IF NOT EXISTS `order_products` (
  `orders_id` int(11) unsigned NOT NULL,
  `product_id` int(11) unsigned NOT NULL,
  `tax_id` int(3) unsigned NOT NULL,
  `quantity` int(11) unsigned NOT NULL,
  `pcs_price` double(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `order_products`
--

INSERT INTO `order_products` (`orders_id`, `product_id`, `tax_id`, `quantity`, `pcs_price`) VALUES
(4, 14, 2, 1, 101.00),
(4, 15, 3, 6, 34.34),
(4, 17, 1, 2, 44.44),
(5, 14, 2, 1, 101.00),
(5, 15, 3, 6, 34.34),
(5, 17, 1, 2, 44.44),
(6, 14, 2, 1, 101.00),
(6, 15, 3, 6, 34.34),
(6, 17, 1, 2, 44.44),
(7, 14, 2, 5, 101.00),
(8, 14, 2, 3, 101.00);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `payment_methods`
--

CREATE TABLE IF NOT EXISTS `payment_methods` (
`id` int(3) unsigned NOT NULL,
  `name` varchar(64) NOT NULL,
  `available` tinyint(1) NOT NULL DEFAULT '0',
  `description` text
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `available`, `description`) VALUES
(1, 'Płatność przy odbiorze', 1, 'gotówka lub karta'),
(2, 'Płatność przelewem', 1, 'Przelew bankowy');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(128) NOT NULL,
  `netto_price` double(7,2) NOT NULL,
  `quantity` int(5) NOT NULL DEFAULT '0',
  `description` text,
  `image` varchar(128) DEFAULT NULL,
  `available` tinyint(1) DEFAULT '0',
  `tax_id` int(3) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `products`
--

INSERT INTO `products` (`id`, `name`, `netto_price`, `quantity`, `description`, `image`, `available`, `tax_id`) VALUES
(14, 'Duis sit amet sapien quis libero porttitor auctor ut at magna.', 101.00, 12, ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel lectus lobortis, bibendum nibh ac, scelerisque orci. Ut commodo purus urna, sed porta quam posuere ut. Nulla tristique tellus arcu, faucibus laoreet nisi fermentum a. Pellentesque vel nisi euismod dolor efficitur pellentesque. Maecenas auctor vel ligula faucibus porta. Donec malesuada arcu nec venenatis accumsan. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean commodo bibendum elit, a cursus nisi. Mauris auctor gravida sapien, et semper arcu volutpat in. Donec ac tortor augue. Sed quis nulla sodales, tempor dui eu, feugiat erat. Vivamus pretium ipsum est, vel pretium ante ultrices id. Ut imperdiet ac risus a consectetur.\n\nFusce tincidunt augue tellus, ac malesuada dui egestas convallis. Mauris ut sapien ac purus varius euismod. Pellentesque aliquet arcu nibh, eget porta sem ultricies in. Nulla eleifend eros at libero condimentum, vel elementum ligula varius. Sed lacinia odio sed scelerisque rutrum. Proin tristique odio enim, in rutrum nunc efficitur sed. Vestibulum vestibulum leo quis mi gravida, tempor euismod metus tristique.\n\nSed at dui semper, ullamcorper orci a, bibendum neque. Etiam eu viverra dui, ut facilisis urna. Mauris malesuada enim a eleifend mollis. Duis mollis massa metus, quis tempus odio convallis quis. Aliquam sapien lacus, imperdiet at turpis a, suscipit viverra lacus. Maecenas luctus scelerisque elit in mattis. In hac habitasse platea dictumst. Sed ut tincidunt orci, eu fermentum ligula. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus quis porta orci. Donec ut erat eu orci condimentum ornare. Etiam nulla orci, sodales efficitur nunc in, semper mollis mauris. Maecenas at elit laoreet, viverra felis a, facilisis ligula. Maecenas et scelerisque dolor. Nunc rutrum orci sit amet ullamcorper ornare. ', 'hkzl7gchyoaogcwr5vap.jpg', 1, 2),
(15, 'asgasg', 34.34, 233, 'dfshdsfhsd', 'c9vetrgcz9k9pxn0i8nw.jpg', 1, 3),
(16, 'pluszak', 17.59, 166, 'zabawka pluszak dla dzieci ponize trzeciego roku zycia miekka w dotyku i kolorowa z grzechotka', 'zo7suxqiladd1wvyifvk.jpg', 1, 1),
(17, 'gerthreth', 44.44, 234, 'erthrth', 'hkzl7gchyoaogcwr5vap.jpg', 0, 1),
(18, 'argerhh', 12.54, 346, 'jdfndfgndg', 'dq8bwkxjww7bp4zhi7sz.jpg', 0, 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(32) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'login', 'Login privileges, granted after account confirmation'),
(2, 'admin', 'Administrative user, has access to everything.');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `roles_users`
--

CREATE TABLE IF NOT EXISTS `roles_users` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `roles_users`
--

INSERT INTO `roles_users` (`user_id`, `role_id`) VALUES
(1, 1),
(4, 1),
(5, 1),
(6, 1),
(8, 1),
(10, 1),
(11, 1),
(13, 1),
(14, 1),
(15, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `status_orders`
--

CREATE TABLE IF NOT EXISTS `status_orders` (
`id` int(2) unsigned NOT NULL,
  `name` varchar(64) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `status_orders`
--

INSERT INTO `status_orders` (`id`, `name`, `description`) VALUES
(1, 'Przyjęcie zamówienia', 'Opis przyjęcia'),
(2, 'W trakcie realizacji', 'Opis w trakcie'),
(3, 'Zrealizowane', 'Opis zrealizowane'),
(4, 'Zamówienie anulowane', 'Opis zamówienia anulowanego');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `taxes`
--

CREATE TABLE IF NOT EXISTS `taxes` (
`id` int(3) unsigned NOT NULL,
  `rate` double(5,2) NOT NULL,
  `name` varchar(64) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `taxes`
--

INSERT INTO `taxes` (`id`, `rate`, `name`) VALUES
(1, 23.00, 'podatek VAT 23'),
(2, 7.00, 'podatek 7%'),
(3, 5.00, 'podatek 5%'),
(4, 13.00, 'podatek 13%');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) unsigned NOT NULL,
  `email` varchar(254) NOT NULL,
  `username` varchar(32) NOT NULL DEFAULT '',
  `password` varchar(64) NOT NULL,
  `logins` int(10) unsigned NOT NULL DEFAULT '0',
  `last_login` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `logins`, `last_login`) VALUES
(1, 'gurzigod@gmail.com', 'gurzigod', 'b349e5ef3c810441ba3d74675696e90ca0e329182f304fbca87f0c2fc6009acb', 55, 1481898573),
(4, 'user1@o2.pl', 'user1', '610c7b8a67f808998c2f99832b56b59d036717b817ed2abfc78703133b3eb184', 0, NULL),
(5, 'user2@o2.pl', 'user2', '610c7b8a67f808998c2f99832b56b59d036717b817ed2abfc78703133b3eb184', 0, NULL),
(6, 'user3@o2.pl', 'user3', '610c7b8a67f808998c2f99832b56b59d036717b817ed2abfc78703133b3eb184', 0, NULL),
(8, 'u4@o2.pl', 'u4', '610c7b8a67f808998c2f99832b56b59d036717b817ed2abfc78703133b3eb184', 0, NULL),
(10, 'ktos@o2.pl', 'user4', '610c7b8a67f808998c2f99832b56b59d036717b817ed2abfc78703133b3eb184', 1, 1478696172),
(11, 'user5@o2.pl', 'user5', '610c7b8a67f808998c2f99832b56b59d036717b817ed2abfc78703133b3eb184', 1, 1478696221),
(13, 'libront7@o2.pl', 'libront7', 'fc623f5c84823d9720856553b0defc2482c6e7807011322ea6fd97ba4bd385d5', 0, NULL),
(14, 'krzysoolloo@o2.pl', 'krzysoolloo', '610c7b8a67f808998c2f99832b56b59d036717b817ed2abfc78703133b3eb184', 1, 1481124363),
(15, 'klient@op.pl', 'klient1', '9eaceaad22803824c05620a2a2225ebba568a43deee6a9392f2aea98355e8822', 1, 1481896288);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_tokens`
--

CREATE TABLE IF NOT EXISTS `user_tokens` (
`id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `user_agent` varchar(40) NOT NULL,
  `token` varchar(40) NOT NULL,
  `created` int(10) unsigned NOT NULL,
  `expires` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `uniq_name` (`name`), ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `category_products`
--
ALTER TABLE `category_products`
 ADD PRIMARY KEY (`id`), ADD KEY `categories_id` (`categories_id`), ADD KEY `products_id` (`products_id`);

--
-- Indexes for table `delivery_destinations`
--
ALTER TABLE `delivery_destinations`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_methods`
--
ALTER TABLE `delivery_methods`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`), ADD KEY `payment_methods_id` (`payment_methods_id`), ADD KEY `delivery_methods_id` (`delivery_methods_id`), ADD KEY `status_orders_id` (`status_orders_id`), ADD KEY `delivery_destinations_id` (`delivery_destinations_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
 ADD PRIMARY KEY (`orders_id`,`product_id`), ADD KEY `product_id` (`product_id`), ADD KEY `tax_id` (`tax_id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`), ADD KEY `tax_id` (`tax_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `uniq_name` (`name`);

--
-- Indexes for table `roles_users`
--
ALTER TABLE `roles_users`
 ADD PRIMARY KEY (`user_id`,`role_id`), ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `status_orders`
--
ALTER TABLE `status_orders`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `uniq_username` (`username`), ADD UNIQUE KEY `uniq_email` (`email`);

--
-- Indexes for table `user_tokens`
--
ALTER TABLE `user_tokens`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `uniq_token` (`token`), ADD KEY `expires` (`expires`), ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT dla tabeli `category_products`
--
ALTER TABLE `category_products`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT dla tabeli `delivery_destinations`
--
ALTER TABLE `delivery_destinations`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT dla tabeli `delivery_methods`
--
ALTER TABLE `delivery_methods`
MODIFY `id` int(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `orders`
--
ALTER TABLE `orders`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT dla tabeli `payment_methods`
--
ALTER TABLE `payment_methods`
MODIFY `id` int(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `products`
--
ALTER TABLE `products`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT dla tabeli `roles`
--
ALTER TABLE `roles`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `status_orders`
--
ALTER TABLE `status_orders`
MODIFY `id` int(2) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `taxes`
--
ALTER TABLE `taxes`
MODIFY `id` int(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT dla tabeli `user_tokens`
--
ALTER TABLE `user_tokens`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `categories`
--
ALTER TABLE `categories`
ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`);

--
-- Ograniczenia dla tabeli `category_products`
--
ALTER TABLE `category_products`
ADD CONSTRAINT `category_products_ibfk_1` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`),
ADD CONSTRAINT `category_products_ibfk_2` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`);

--
-- Ograniczenia dla tabeli `orders`
--
ALTER TABLE `orders`
ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
ADD CONSTRAINT `orders_ibfk_10` FOREIGN KEY (`delivery_destinations_id`) REFERENCES `delivery_destinations` (`id`),
ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`payment_methods_id`) REFERENCES `payment_methods` (`id`),
ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`delivery_methods_id`) REFERENCES `delivery_methods` (`id`),
ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`status_orders_id`) REFERENCES `status_orders` (`id`),
ADD CONSTRAINT `orders_ibfk_5` FOREIGN KEY (`delivery_destinations_id`) REFERENCES `delivery_destinations` (`id`),
ADD CONSTRAINT `orders_ibfk_6` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
ADD CONSTRAINT `orders_ibfk_7` FOREIGN KEY (`payment_methods_id`) REFERENCES `payment_methods` (`id`),
ADD CONSTRAINT `orders_ibfk_8` FOREIGN KEY (`delivery_methods_id`) REFERENCES `delivery_methods` (`id`),
ADD CONSTRAINT `orders_ibfk_9` FOREIGN KEY (`status_orders_id`) REFERENCES `status_orders` (`id`);

--
-- Ograniczenia dla tabeli `order_products`
--
ALTER TABLE `order_products`
ADD CONSTRAINT `order_products_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
ADD CONSTRAINT `order_products_ibfk_2` FOREIGN KEY (`tax_id`) REFERENCES `taxes` (`id`),
ADD CONSTRAINT `order_products_ibfk_3` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`);

--
-- Ograniczenia dla tabeli `products`
--
ALTER TABLE `products`
ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`tax_id`) REFERENCES `taxes` (`id`);

--
-- Ograniczenia dla tabeli `roles_users`
--
ALTER TABLE `roles_users`
ADD CONSTRAINT `roles_users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
ADD CONSTRAINT `roles_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
ADD CONSTRAINT `roles_users_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `user_tokens`
--
ALTER TABLE `user_tokens`
ADD CONSTRAINT `user_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
ADD CONSTRAINT `user_tokens_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
