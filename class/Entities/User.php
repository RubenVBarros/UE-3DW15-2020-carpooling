<?php

namespace App\Entities;

use DateTime;

class User
{
    private $id;
    private $firstname;
    private $lastname;
    private $email;
    private $birthday;
    private $cars;
    private $bookings;
    private $annonce;
    private $comments;


    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }
 
    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function getBirthday(): DateTime
    {
        return $this->birthday;
    }

    public function setBirthday(DateTime $birthday): void
    {
        $this->birthday = $birthday;
    }

    /*
        Getter et Setters pour les relations avec Voiture,Annonce, Commentaire d'annonce et Réservations
    */

    public function getCars(): array 
    {
        return $this->cars;
    }
    public function setCars(array $cars)
    {
        $this->cars = $cars;
    }
    public function getBookings(): array 
    {
        return $this->bookings;
    }
    public function setBookings(array $bookings)
    {
        $this->bookings = $bookings;
    }
    public function getAnnonce(): array 
    {
        return $this->annonce;
    }
    public function setAnnonce(array $annonce)
    {
        $this->annonce = $annonce;
    }
    
    public function getComments()
    {
        return $this->comments;
    }
    
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }
}
