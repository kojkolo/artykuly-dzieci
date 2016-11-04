CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) unsigned DEFAULT NULL,
  `name` varchar(128) NOT NULL,
  `description` text,
  `hidden` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_name` (`name`)
)  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `category_products` (
  `id` int(11) unsigned NOT NULL,
  `categories_id` int(11) unsigned NOT NULL,
  `products_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
)  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `delivery_destinations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `surname` varchar(32) NOT NULL,
  `company_name` varchar(64) DEFAULT NULL,
  `street_number` varchar(64) NOT NULL,
  `postal_code` varchar(6) NOT NULL,
  `city` varchar(64) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
)  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `delivery_methods` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `cost` double(3,2) DEFAULT NULL,
  `hidden` tinyint(1) NOT NULL DEFAULT '1',
  `description` text,
  PRIMARY KEY (`id`)
)  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delivery_methods_id` int(3) unsigned NOT NULL,
  `delivery_destinations_id` int(11) unsigned NOT NULL,
  `payment_methods_id` int(3) unsigned NOT NULL,
  `status_orders_id` int(2) unsigned NOT NULL,
  PRIMARY KEY (`id`)
  )  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `order_products` (
  `order_id` int(11) unsigned NOT NULL,
  `product_id` int(11) unsigned NOT NULL,
  `tax_id` int(3) unsigned NOT NULL,
  `quantity` int(11) unsigned NOT NULL,
  `pcs_price` double(5,2) DEFAULT NULL,
  PRIMARY KEY (`order_id`,`product_id`)
)  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `payment_methods` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `available` tinyint(1) NOT NULL DEFAULT '0',
  `description` text,
  PRIMARY KEY (`id`)
)  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `netto_price` double(5,2) NOT NULL,
  `quantity` int(5) NOT NULL DEFAULT '0',
  `description` text,
  `image` varchar(128) DEFAULT NULL,
  `available` tinyint(1) DEFAULT '0',
  `tax_id` int(3) unsigned NOT NULL,
  PRIMARY KEY (`id`)
)  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_name` (`name`)
)   DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'login', 'Login privileges, granted after account confirmation'),
(2, 'admin', 'Administrative user, has access to everything.');

CREATE TABLE IF NOT EXISTS `roles_users` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`)
)  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `status_orders` (
  `id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
)  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `taxes` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `rate` double(3,2) NOT NULL,
  `name` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
)  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(254) NOT NULL,
  `username` varchar(32) NOT NULL DEFAULT '',
  `password` varchar(64) NOT NULL,
  `logins` int(10) unsigned NOT NULL DEFAULT '0',
  `last_login` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_username` (`username`),
  UNIQUE KEY `uniq_email` (`email`)
)  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `user_tokens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `user_agent` varchar(40) NOT NULL,
  `token` varchar(40) NOT NULL,
  `created` int(10) unsigned NOT NULL,
  `expires` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_token` (`token`),
  KEY `expires` (`expires`)
) DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

ALTER TABLE user_tokens ADD FOREIGN KEY (`user_id`) REFERENCES users (`id`);
ALTER TABLE orders ADD FOREIGN KEY (`user_id`) REFERENCES users (`id`);
ALTER TABLE orders ADD FOREIGN KEY (`payment_methods_id`) REFERENCES payment_methods (`id`);
ALTER TABLE orders ADD FOREIGN KEY (`delivery_methods_id`) REFERENCES delivery_methods (`id`);
ALTER TABLE orders ADD FOREIGN KEY (`status_orders_id`) REFERENCES status_orders (`id`);
ALTER TABLE orders ADD FOREIGN KEY (`delivery_destinations_id`) REFERENCES delivery_destinations (`id`);
ALTER TABLE categories ADD FOREIGN KEY (`parent_id`) REFERENCES categories (`parent_id`);
ALTER TABLE category_products ADD FOREIGN KEY (`categories_id`) REFERENCES categories (`id`);
ALTER TABLE category_products ADD FOREIGN KEY (`products_id`) REFERENCES products (`id`);
ALTER TABLE order_products ADD FOREIGN KEY (`product_id`) REFERENCES products (`id`);
ALTER TABLE order_products ADD FOREIGN KEY (`tax_id`) REFERENCES taxes (`id`);
ALTER TABLE products ADD FOREIGN KEY (`tax_id`) REFERENCES taxes (`id`);
ALTER TABLE roles_users ADD FOREIGN KEY (`role_id`) REFERENCES roles (`id`);
ALTER TABLE roles_users ADD FOREIGN KEY (`user_id`) REFERENCES users (`id`);
