CREATE DATABASE movie_catalog;
USE movie_catalog;

DROP TABLE IF EXISTS `directors`;
CREATE TABLE IF NOT EXISTS `directors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `directors_films`;
CREATE TABLE IF NOT EXISTS `directors_films` (
  `films_id` int NOT NULL,
  `directors_id` int NOT NULL,
  PRIMARY KEY (`films_id`, `directors_id`),
  KEY `fk_directorsfilms_director_id` (`directors_id`),
  KEY `fk_directorsfilms_film_id` (`films_id`)
);


DROP TABLE IF EXISTS `films`;
CREATE TABLE IF NOT EXISTS `films` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `synopsis` text,
  `review` text,
  `image_url` varchar(255) DEFAULT NULL,
  `year` int DEFAULT NULL,
  `review_score` int DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `genres_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_films_genre_id` (`genres_id`)
);

DROP TABLE IF EXISTS `genres`;
CREATE TABLE IF NOT EXISTS `genres` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `lists`;
CREATE TABLE IF NOT EXISTS `lists` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `users_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_lists_users_id` (`users_id`)
);


DROP TABLE IF EXISTS `lists_films`;
CREATE TABLE IF NOT EXISTS `lists_films` (
  `lists_id` int NOT NULL,
  `films_id` int NOT NULL,
  PRIMARY KEY (`lists_id`, `films_id`),
  KEY `fk_listsfilms_films_id` (`films_id`),
  KEY `fk_listsfilms_lists_id` (`lists_id`)
);

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);

ALTER TABLE `directors_films`
  ADD CONSTRAINT `fk_directorsfilms_director_id` FOREIGN KEY (`directors_id`) REFERENCES `directors` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_directorsfilms_film_id` FOREIGN KEY (`films_id`) REFERENCES `films` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `films`
  ADD CONSTRAINT `fk_films_genre_id` FOREIGN KEY (`genres_id`) REFERENCES `genres` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `lists`
  ADD CONSTRAINT `fk_lists_users_id` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `lists_films`
  ADD CONSTRAINT `fk_listsfilms_films_id` FOREIGN KEY (`films_id`) REFERENCES `films` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_listsfilms_lists_id` FOREIGN KEY (`lists_id`) REFERENCES `lists` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
