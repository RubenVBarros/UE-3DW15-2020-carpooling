<?php

namespace App\Services;

use App\Entities\Car;

class CarsService
{
    /**
     * Create or update a car.
     */
    public function setCars(?int $id, string $brand, string $color, string $model): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        if (empty($id)) {
            $isOk = $dataBaseService->createCars($brand, $color,$model);
        } else {
            $isOk = $dataBaseService->updateCars($id, $brand, $color,$model);
        }

        return $isOk;
    }

    /**
     * Return all cars.
     */
    public function getCars(): array
    {
        $cars = [];

        $dataBaseService = new DataBaseService();
        $carsDTO = $dataBaseService->getCars();
        if (!empty($carsDTO)) {
            foreach ($carsDTO as $carDTO) {
                $car = new Car();
                $car->setId($carDTO['id']);
                $car->setBrand($carDTO['brand']);
                $car->setColor($carDTO['color']);
                $car->setModel($carDTO['model']);
                $cars[] = $car;
            }
        }

        return $cars;
    }

    /**
     * Delete a car.
     */
    public function deleteCars(string $id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteCars($id);

        return $isOk;
    }
}
