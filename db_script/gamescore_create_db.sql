CREATE DATABASE `gamescore`;

/*kör rad 1 först sen resten av tabellerna*/

CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `publishDate` datetime NOT NULL,
  `content` TEXT NOT NULL,
  `image` MEDIUMBLOB NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `user` (
  `id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profilepic` mediumblob DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` varchar(255) NOT NULL,
  `receiver_id` varchar(255) NOT NULL,
  `message_text` text NOT NULL,
  `sent_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`message_id`),
  KEY `fk_messages_sender_id` (`sender_id`),
  KEY `fk_messages_receiver_id` (`receiver_id`),
  CONSTRAINT `fk_messages_sender` FOREIGN KEY (`sender_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_messages_receiver` FOREIGN KEY (`receiver_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `game` (
  `title` varchar(255) NOT NULL,
  `gameinfo` text NOT NULL,
  `agerating` int(11) NOT NULL,
  `releasedate` date NOT NULL,
  `publisher` varchar(255) DEFAULT NULL,
  `developer` varchar(255) DEFAULT NULL,
  `genre` enum('FPS','RPG','Adventure','Fantasy','MMORPG','Survival','Battle Royal','MOBA','RTS') NOT NULL,
  `platform` enum('PC','Playstation','Xbox','Nintendo') NOT NULL,
  `averagerating` float DEFAULT NULL,
  `coverimg` mediumblob DEFAULT NULL,
  `trailerurl` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `friends` (
  `user_id_a` varchar(255) NOT NULL,
  `user_id_b` varchar(255) NOT NULL,
  `status` enum('pending','accepted') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`user_id_a`,`user_id_b`),
  KEY `fk_friends_user_b` (`user_id_b`),
  CONSTRAINT `fk_friends_user_a` FOREIGN KEY (`user_id_a`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_friends_user_b` FOREIGN KEY (`user_id_b`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `CONSTRAINT_1` CHECK (`user_id_a` <> `user_id_b`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `forum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post` varchar(255) NOT NULL,
  `postdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `content` text NOT NULL,
  `reply` text DEFAULT NULL,
  `replycount` int(11) NOT NULL,
  `replydate` datetime NOT NULL,
  `forumcol` varchar(45) DEFAULT NULL,
  `fk_userId` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK från users_idx` (`fk_userId`),
  CONSTRAINT `fk_userId` FOREIGN KEY (`fk_userId`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `review` (
  `user_id` varchar(255) NOT NULL,
  `game_title` varchar(255) NOT NULL,
  `rating` float NOT NULL,
  `content` text DEFAULT NULL,
  `reviewdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`user_id`,`game_title`),
  KEY `fk_review_game` (`game_title`),
  CONSTRAINT `fk_review_game` FOREIGN KEY (`game_title`) REFERENCES `game` (`title`),
  CONSTRAINT `fk_review_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;