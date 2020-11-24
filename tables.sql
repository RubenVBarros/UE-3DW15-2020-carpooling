CREATE TABLE `users` (
  `id` int AUTO_INCREMENT NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthday` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `birthday`) VALUES
(1, 'Vincent', 'Godé', 'hello@vincentgo.fr', '1990-11-08'),
(2, 'Albert', 'Dupond', 'sonemail@gmail.com', '1985-11-08'),
(3, 'Thomas', 'Dumoulin', 'sonemail2@gmail.com', '1985-10-08');

CREATE TABLE `cars` (
  `id` int AUTO_INCREMENT NOT NULL,
  `brand`varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `cars` (`id`, `brand`, `color`, `model`) VALUES
(1, 'Mercedes', 'Rouge', 'McLaren'),
(2, 'BMW', 'Bleu', 'Serie 3'),
(3, 'Citroen', 'Grise', 'Xsara');

CREATE TABLE `bookings` (
  `id_booking` int AUTO_INCREMENT NOT NULL,
  `id_user` int(11) NOT NULL,
  `departure_city` varchar(255) NOT NULL,
  `departure_date` datetime NOT NULL,
  `arrival_date` datetime NOT NULL,
  PRIMARY KEY (`id_booking`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `bookings` (`id_booking`, `id_user`, `departure_city`, 'arrival_city', `departure_date`,'arrival_date') VALUES
(1, '1', 'Paris', 'Marseille','2020-02-12','2020-02-13'),
(2, '2', 'Marseille', 'Lyon','2020-02-11','2020-02-14');

CREATE TABLE `annonces` (
  `id` int AUTO_INCREMENT NOT NULL,
  `title` varchar(255) NOT NULL,
  `texte` varchar(255) NOT NULL,
  `datePubli` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `annonces` (`id`, `title`, `texte`, `datePubli`) VALUES
(1, 'Voyage en Bulgarie', 'Je cherche une personne pour partir avec moi', '2020-02-12'),
(2, 'Voyage au sud de la france', 'Je cherche une personne qui habite dans le sud', '2020-02-12');

CREATE TABLE users_cars (
  id_users INT NOT NULL,
  id_cars INT NOT NULL,
  PRIMARY KEY(id_users,id_cars)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users_cars` (`id_users`, `id_cars`) VALUES
(1, 1),
(1, 2),
(2, 3);

CREATE TABLE users_bookings (
  id_users INT NOT NULL,
  id_bookings INT NOT NULL,
  PRIMARY KEY(id_users,id_bookings)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users_bookings` (`id_users`, `id_bookings`) VALUES
(1, 1),
(2, 3);

CREATE TABLE users_annonce (
  id_users INT NOT NULL,
  id_annonce INT NOT NULL,
  PRIMARY KEY(id_users,id_annonce)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users_annonce` (`id_users`, `id_annonce`) VALUES
(1, 1),
(1, 2);

CREATE TABLE comments(
    id INT AUTO_INCREMENT NOT NULL,
    comments VARCHAR(255),
    date DATETIME NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO comments VALUES ()

CREATE TABLE user_comment(
    id_user INT NOT NULL,
    id_comment INT NOT NULL,
    PRIMARY KEY(id_user, id_comment),
    FOREIGN KEY (id_comment) REFERENCES comments(id),
    FOREIGN KEY (id_user) REFERENCES users(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO user_comment VALUES ()

CREATE TABLE annonce_comment(
    id_annonce INT NOT NULL,
    id_comment INT NOT NULL,
    PRIMARY KEY(id_annonce, id_comment),
    FOREIGN KEY (id_comment) REFERENCES comments(id),
    FOREIGN KEY (id_annonce) REFERENCES annonces(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO annonce_comment VALUES ()

CREATE TABLE annonce_booking(
    id_annonce INT NOT NULL,
    id_booking INT NOT NULL,
    PRIMARY KEY(id_annonce, id_booking),
    FOREIGN KEY (id_booking) REFERENCES bookings(id_booking),
    FOREIGN KEY (id_annonce) REFERENCES annonces(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO annonce_booking VALUES ()

CREATE TABLE annonce_cars(
    id_annonce INT NOT NULL,
    id_cars INT NOT NULL,
    PRIMARY KEY(id_annonce, id_cars),
    FOREIGN KEY (id_cars) REFERENCES cars(id),
    FOREIGN KEY (id_annonce) REFERENCES annonces(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO annonce_cars VALUES ()
