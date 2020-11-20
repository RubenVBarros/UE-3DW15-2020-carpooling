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
    public function createUser(string $firstname, string $lastname, string $email, DateTime $birthday): bool
    {
        $isOk = false;

        $data = [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'birthday' => $birthday->format(DateTime::ATOM),
        ];
        $sql = 'INSERT INTO users (firstname, lastname, email, birthday) VALUES (:firstname, :lastname, :email, :birthday)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
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
    public function createBookings(int $iduser, string $departure_city, string $arrival_city,DateTime $departure_date, DateTime $arrival_date): bool
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
    public function updateBookings(int $idbooking, int $iduser,string $departurecity, string $arrivalcity, DateTime $departuredate, DateTime $arrivaldate): bool
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
    public function createAnnonce(string $title, string $text, DateTime $publi): bool
    {
        $isOk = false;

        $data = [
            'title' => $title,
            'texte' => $text,
            'publi' => $publi->format("Y-m-d")
        ];

        $sql = 'INSERT INTO annonce (title, texte, datePubli) VALUES (:title, :texte, :datePubli)';
        $query = $this->connection->prepare($sql);
        
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Return all annonces.
     */
    public function getAnnonces(): array
    {
        $users = [];

        $sql = 'SELECT * FROM annonce';
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
    public function updateAnnonce(int $id, string $title, string $text, DateTime $publi): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
            'title' => $title,
            'texte' => $text,
            'publi' => $publi->format("Y-m-d")
        ];

        $sql = 'UPDATE annonce SET title = :title, texte = :texte, datePubli = :datePubli WHERE id = :id;';
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
        $sql = 'DELETE FROM annonce WHERE id = :id;';
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

        $data = [
            'idAnnonce' => $idAnnonce,
            'idUser' => $idUser,
            'comment' => $comment
        ];

        $sql = 'INSERT INTO annoncecomments (idAnnonce, idUser, comments) VALUES (:idAnnonce, :idUser, :comment)';
        $query = $this->connection->prepare($sql);
        
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Return all annonces.
     */
    public function getAnnonceComments(): array
    {
        $users = [];

        $sql = 'SELECT * FROM annoncecomments';
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

        $sql = 'UPDATE annoncecomments SET idAnnonce = :idAnnonce, idUser = :idUser, comments = :comment WHERE id = :id';
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

        $sql = 'DELETE FROM annoncecomments WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }
}
