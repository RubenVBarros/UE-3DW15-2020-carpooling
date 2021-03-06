<?php

namespace App\Services;

use DateTime;
use Exception;
use PDO;

class DataBaseService
{
    const HOST = '127.0.0.1';
    const PORT = '3306';
    const DATABASE_NAME = 'carpooling';
    const MYSQL_USER = 'root';
    const MYSQL_PASSWORD = '';

    private $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO(
                'mysql:host=' . self::HOST . ';port=' . self::PORT . ';dbname=' . self::DATABASE_NAME,
                self::MYSQL_USER,
                self::MYSQL_PASSWORD
            );
            $this->connection->exec('SET CHARACTER SET utf8');
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }

    /**
     * Create an user.
     */
    public function createUser(string $firstname, string $lastname, string $email, DateTime $birthday): string
    {
        $userId = '';

        $data = [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'birthday' => $birthday->format(DateTime::ATOM),
        ];
        $sql = 'INSERT INTO users (firstname, lastname, email, birthday) VALUES (:firstname, :lastname, :email, :birthday)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);
        if ($isOk) {
            $userId = $this->connection->lastInsertId();
        }

        return $userId;
    }

    /**
     * Return all users.
     */
    public function getUsers(): array
    {
        $users = [];

        $sql = 'SELECT * FROM users';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $users = $results;
        }

        return $users;
    }

    /**
     * Update an user.
     */
    public function updateUser(string $id, string $firstname, string $lastname, string $email, DateTime $birthday): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'birthday' => $birthday->format(DateTime::ATOM),
        ];
        $sql = 'UPDATE users SET firstname = :firstname, lastname = :lastname, email = :email, birthday = :birthday WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Delete an user.
     */
    public function deleteUser(string $id): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
        ];
        $sql = 'DELETE FROM users WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /*
        Adding cars
    */
    public function createCars(string $brand, string $color, string $model): bool
    {
        $isOk = false;

        $data = [
            'brand' => $brand,
            'color' => $color,
            'model' => $model,
        ];
        $sql = 'INSERT INTO cars (brand, color, model) VALUES (:brand, :color, :model)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }


    /*
        Get a car
    */
    public function getCars(): array
    {
        $cars = [];

        $sql = 'SELECT * FROM cars';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $cars = $results;
        }

        return $cars;
    }

    /* 
        Update cars
    */
    public function updateCars(int $id, string $brand, string $color, string $model): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
            'brand' => $brand,
            'color' => $color,
            'model' => $model,
        ];
        $sql = 'UPDATE cars SET brand = :brand, color = :color, model = :model WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /*
        Delete a car
    */
    public function deleteCars(string $id): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
        ];
        $sql = 'DELETE FROM cars WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /*
        Adding bookings
    */
    public function createBookings(int $iduser, string $departure_city, string $arrival_city, DateTime $departure_date, DateTime $arrival_date): bool
    {
        $isOk = false;

        $data = [
            'id_user' => $iduser,
            'departure_city' => $departure_city,
            'arrival_city' => $arrival_city,
            'departure_date' => $departure_date->format(DateTime::ATOM),
            'arrival_date' => $arrival_date->format(DateTime::ATOM),
        ];
        $sql = 'INSERT INTO bookings (id_user, departure_city, arrival_city,departure_date, arrival_date) VALUES (:id_user, :departure_city, :arrival_city,:departure_date, :arrival_date)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /*
        Get a booking
    */
    public function getBookings(): array
    {
        $bookings = [];

        $sql = 'SELECT * FROM bookings';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $bookings = $results;
        }

        return $bookings;
    }

    /* 
        Update a booking
    */
    public function updateBookings(int $idbooking, int $iduser, string $departurecity, string $arrivalcity, DateTime $departuredate, DateTime $arrivaldate): bool
    {
        $isOk = false;

        $data = [
            'id_booking' => $idbooking,
            'id_user' => $iduser,
            'departure_city' => $departurecity,
            'arrival_city' => $arrivalcity,
            'departure_date' => $departuredate->format(DateTime::ATOM),
            'arrival_date' => $arrivaldate->format(DateTime::ATOM),
        ];
        $sql = 'UPDATE bookings SET id_user = :id_user, departure_city = :departure_city, arrival_city = :arrival_city, departure_date = :departure_date, arrival_date = :arrival_date WHERE id_booking = :id_booking;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /*
        Delete a booking
    */
    public function deleteBookings(string $id): bool
    {
        $isOk = false;

        $data = [
            'id_booking' => $id,
        ];
        $sql = 'DELETE FROM bookings WHERE id_booking = :id_booking;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }


    /**
     * Create an Annonce
     */
    public function createAnnonce(string $title, string $text, int $idBooking, int $idCar): int
    {
        $idAnnonce = 0;

        $data = [
            'title' => $title,
            'texte' => $text,
            'datePubli' => date("Y-m-d H:i:s")
        ];

        $sql = 'INSERT INTO annonces (title, texte, datePubli) VALUES (:title, :texte, :datePubli)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);



        $idAnnonce = $this->connection->lastInsertId();

        $this->setAnnonceBooking($idAnnonce, $idBooking);
        $this->setAnnonceCars($idAnnonce, $idCar);

        return $idAnnonce;
    }

    /**
     * Return all annonces.
     */
    public function getAnnonces(): array
    {
        $users = [];

        $sql = 'SELECT * FROM annonces';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $users = $results;
        }

        return $users;
    }

    /**
     * Update an annonce.
     */
    public function updateAnnonce(int $id, string $title, string $text): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
            'title' => $title,
            'texte' => $text,
            'datePubli' => date("Y-m-d H:i:s")
        ];

        $sql = 'UPDATE annonces SET title = :title, texte = :texte, datePubli = :datePubli WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Delete an Annonce.
     */
    public function deleteAnnonce(string $id): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
        ];
        $sql = 'DELETE FROM annonces WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Create an Annonce
     */
    public function createAnnonceComments(int $idAnnonce, int $idUser, string $comment): bool
    {
        $isOk = false;

        $dataComment = [
            'comment' => $comment,
            'date' => date("Y-m-d H:i:s")
        ];

        $sql = 'INSERT INTO comments (comments, date) VALUES (:comment, :date)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($dataComment);

        $idComment = $this->connection->lastInsertId();

        $this->setCommentAnnonce($idAnnonce, $idComment);
        $this->setCommentUser($idUser, $idComment);

        return $isOk;
    }

    /**
     * Return all annonces.
     */
    public function getAnnonceComments(): array
    {
        $users = [];

        $sql = 'SELECT * FROM comments';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $users = $results;
        }

        return $users;
    }

    /**
     * Update an annonce.
     */
    public function updateAnnonceComments(int $id, int $idAnnonce, int $idUser, string $comment): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
            'idAnnonce' => $idAnnonce,
            'idUser' => $idUser,
            'comment' => $comment
        ];

        $sql = 'UPDATE comments SET idAnnonce = :idAnnonce, idUser = :idUser, comments = :comment WHERE id = :id';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Delete an Annonce.
     */
    public function deleteAnnonceComments(int $id): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
        ];

        $sql = 'DELETE FROM comments WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Create relation between an user and his car.
     */
    public function setUserCar(string $id_users, string $id_cars): bool
    {
        $isOk = false;

        $data = [
            'id_users' => $id_users,
            'id_cars' => $id_cars,
        ];

        $sql = 'INSERT INTO users_cars(id_users, id_cars) VALUES (:id_users, :id_cars)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    public function getUserCars(string $idUser): array
    {
        $usersCars = [];

        $data = [
            'id_users' => $idUser,
        ];
        $sql = '
            SELECT c.*
            FROM cars as c
            LEFT JOIN users_cars as uc ON uc.id_cars = c.id
            WHERE uc.id_users = :id_users';
        $query = $this->connection->prepare($sql);
        $query->execute($data);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $usersCars = $results;
        }
        return $usersCars;
    }
    /**
     * Create relation between an user and his announce.
     */
    public function setUserAnnonce(string $id_users, string $id_annonce): bool
    {
        $isOk = false;

        $data = [
            'id_users' => $id_users,
            'id_annonce' => $id_annonce,
        ];

        $sql = 'INSERT INTO users_cars(id_users,id_annonce) VALUES (:id_users, :id_annonce)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Create relation between an user and his announce.
     */
    public function getUserAnnonces(string $idUser): array
    {
        $usersAnnonces = [];

        $data = [
            'id_users' => $idUser,
        ];
        $sql = '
            SELECT a.*
            FROM annonces as a
            LEFT JOIN users_annonce as ua ON ua.id_annonce = a.id
            WHERE ua.id_users = :id_users';
        $query = $this->connection->prepare($sql);
        $query->execute($data);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $usersAnnonces = $results;
        }
        return $usersAnnonces;
    }

    /**
     * Create relation between an user and his announce.
     */
    public function setAnnonceUser(string $id_annonce, string $id_users): bool
    {
        $isOk = false;

        $data = [
            'id_users' => $id_users,
            'id_annonce' => $id_annonce,
        ];

        $sql = 'INSERT INTO users_annonce(id_users,id_annonce) VALUES (:id_users, :id_annonce)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Create relation between an user and his announce.
     */
    public function getAnnonceUser(string $idAnnonce): array
    {
        $annonceUsers = [];

        $data = [
            'id_annonce' => $idAnnonce,
        ];
        $sql = '
            SELECT u.*
            FROM users as u
            LEFT JOIN users_annonce as ua ON ua.id_annonce = a.id
            WHERE ua.id_users = :id_users';
        $query = $this->connection->prepare($sql);
        $query->execute($data);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $annonceUsers = $results;
        }
        return $annonceUsers;
    }

    public function setCommentAnnonce($idAnnonce, $idComment): bool
    {
        $isOk = false;


        $data = [
            'idAnnonce' => $idAnnonce,
            'idComment' => $idComment
        ];

        $sql = 'INSERT INTO annonce_comment VALUES (:idAnnonce, :idComment)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    public function getCommentAnnonce($idAnnonce): array
    {
        $annonceComments = [];

        $data = [
            'id_annonce' => $idAnnonce,
        ];
        $sql = '
            SELECT c.*
            FROM comments as c
            LEFT JOIN annonce_comment ac ON ac.id_comment = c.id
            WHERE ac.id_annonce = :id_annonce';
        $query = $this->connection->prepare($sql);
        $query->execute($data);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $annonceComments = $results;
        }
        return $annonceComments;
    }

    public function setCommentUser($idUser, $idComment): bool
    {
        $isOk = false;


        $data = [
            'idUser' => $idUser,
            'idComment' => $idComment
        ];

        $sql = 'INSERT INTO user_comment VALUES (:idUser, :idComment)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }
    public function getCommentUser($idUser): array
    {
        $annonceComments = [];

        $data = [
            'id_user' => $idUser,
        ];
        $sql = '
            SELECT c.*
            FROM comments as c
            LEFT JOIN user_comment uc ON uc.id_comment = c.id
            WHERE uc.id_user = :id_user';
        $query = $this->connection->prepare($sql);
        $query->execute($data);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $annonceComments = $results;
        }
        return $annonceComments;
    }

    public function setAnnonceCars($idUser, $idComment): bool
    {
        $isOk = false;


        $data = [
            'idUser' => $idUser,
            'idComment' => $idComment
        ];

        $sql = 'INSERT INTO annonce_cars VALUES (:idUser, :idComment)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }
    public function getAnnonceCars($idAnnonce): array
    {
        $annonceComments = [];

        $data = [
            'id_annonce' => $idAnnonce,
        ];
        $sql = '
            SELECT c.*
            FROM cars as c
            LEFT JOIN annonce_cars ac ON ac.id_cars = c.id
            WHERE ac.id_annonce = :id_annonce';
        $query = $this->connection->prepare($sql);
        $query->execute($data);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $annonceComments = $results;
        }
        return $annonceComments;
    }

    public function setAnnonceBooking($idAnnonce, $idBooking): bool
    {
        $isOk = false;


        $data = [
            'idAnnonce' => $idAnnonce,
            'idBooking' => $idBooking
        ];

        $sql = 'INSERT INTO annonce_booking VALUES (:idAnnonce, :idBooking)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }
    public function getAnnonceBooking($idAnnonce): array
    {
        $annonceComments = [];

        $data = [
            'id_annonce' => $idAnnonce,
        ];
        $sql = '
            SELECT b.*
            FROM bookings as b
            LEFT JOIN annonce_booking ab ON ab.id_booking = b.id_booking
            WHERE ab.id_annonce = :id_annonce';
        $query = $this->connection->prepare($sql);
        $query->execute($data);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $annonceComments = $results;
        }

        return $annonceComments;
    }
}
