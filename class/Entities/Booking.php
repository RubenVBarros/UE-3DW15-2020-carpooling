<?php

namespace App\Entities;

//Utilisation du type date pour la base de donnée
use DateTime;

class Booking
{
    private $id_booking;
    private $id_user;
    private $departure_city;
    private $arrival_city;
    private $departure_date;
    private $arrival_date;

    /*
        Getters
    */
    public function getIdbooking(): int
    {
        return $this->id_booking;
    }
    public function getIduser(): User
    {
        return $this->id_user;
    }
    public function getDepartureCity(): string
    {
        return $this->departure_city;
    }
    public function getArrivalCity(): string
    {
        return $this->arrival_city;
    }
    public function getDepartureDate(): DateTime
    {
        return $this->departure_date;
    }
    public function getArrivalDate(): DateTime
    {
        return $this->arrival_date;
    }

    /*
        Setters
    */
    public function setIdbooking(int $id_booking): void
    {
        $this->id_booking = $id_booking;
    }
    public function setIduser(User $id_user): void
    {
        $this->id_user = $id_user;
    }
    public function setDepartureCity(string $departure_city): void
    {
        $this->departure_city = $departure_city;
    }
    public function setArrivalCity(string $arrival_city): void
    {
        $this->arrival_city = $arrival_city;
    }
    public function setDepartureDate(DateTime $departure_date): void
    {
        $this->departure_date = $departure_date;
    }
    public function setArrivalDate(DateTime $arrival_date): void
    {
        $this->arrival_date = $arrival_date;
    }
}