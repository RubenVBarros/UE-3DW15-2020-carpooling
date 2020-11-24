<?php

namespace App\Entities;

class Car
{
    private $id;
    private $brand;
    private $color;
    private $model;

    /*
       Getters
    */
    public function getId(): string
    {
        return $this->id;
    }
    public function getBrand(): string
    {
        return $this->brand;
    }
    public function getColor(): string
    {
        return $this->color;
    }
    public function getModel(): string
    {
        return $this->model;
    }

    /*
        Setters
    */
    public function setId(string $id): void
    {
        $this->id = $id;

    }
    public function setBrand(string $brand): void
    {
        $this->brand = $brand;

    }
    public function setColor(string $color): void
    {
        $this->color = $color;

    }
    public function setModel(string $model): void
    {
        $this->model = $model;

    }
}