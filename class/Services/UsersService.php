<?php

namespace App\Services;

use App\Entities\Annonce;
use App\Entities\User;
use App\Entities\Car;
use DateTime;

class UsersService
{
    /**
     * Create or update an user. mettre méthode en string
     */
    public function setUser(?string $id, string $firstname, string $lastname, string $email, string $birthday): string
    {
        $userId = '';

        $dataBaseService = new DataBaseService();
        $birthdayDateTime = new DateTime($birthday);
        if (empty($id)) {
            $userId = $dataBaseService->createUser($firstname, $lastname, $email, $birthdayDateTime);
        } else {
            $dataBaseService->updateUser($id, $firstname, $lastname, $email, $birthdayDateTime);
            $userId = $id;
        }

        return $userId;
    }

    /**
     * Return all users.
     */
    public function getUsers(): array
    {
        $users = [];

        $dataBaseService = new DataBaseService();
        $usersDTO = $dataBaseService->getUsers();
        if (!empty($usersDTO)) {
            foreach ($usersDTO as $userDTO) {
                $user = new User();
                $user->setId($userDTO['id']);
                $user->setFirstname($userDTO['firstname']);
                $user->setLastname($userDTO['lastname']);
                $user->setEmail($userDTO['email']);
                $date = new DateTime($userDTO['birthday']);
                if ($date !== false) {
                    $user->setbirthday($date);
                }
                // Get cars of this user :
                $cars = $this->getUserCars($userDTO['id']);
                $user->setCars($cars);

                // Get announces of this user :
                $annonce = $this->getUserAnnonces($userDTO['id']);
                $user->setAnnonce($annonce);

                $users[] = $user;
            }
        }
        return $users;
    }

    /**
     * Delete an user.
     */
    public function deleteUser(string $id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteUser($id);

        return $isOk;
    }

    /**
     * Create relation between user and his car.
     */
    public function setUserCars(string $idUser,string $idCar): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->setUserCar($idUser,$idCar);

        return $isOk;   
    }

    /**
     * Get car of given user id.
     */
    public function getUserCars(string $idUser): array
    {
        $userCars = [];

        $dataBaseService = new DataBaseService();
        $userCarsDTO = $dataBaseService->getUserCars($idUser);
        if(!empty($userCarsDTO))
        {
            foreach($userCarsDTO as $userCarDTO)
            {
                $car = new Car();
                $car->setId($userCarDTO['id']);
                $car->setBrand($userCarDTO['brand']);
                $car->setColor($userCarDTO['color']);
                $car->setModel($userCarDTO['model']);
                $userCars[] = $car;
            }
        }
        return $userCars;
    }
    /**
     * Create relation between user and his annoucement.
     */
    public function setUserAnnonces(string $idUser,string $idAnnonce): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->setUserAnnonce($idUser,$idAnnonce);

        return $isOk;   
    }

    /**
     * Get announce of given user id.
     */
    public function getUserAnnonces(string $idUser): array
    {
        $userAnnonces = [];

        $dataBaseService = new DataBaseService();
        $userAnnoncesDTO = $dataBaseService->getUserAnnonces($idUser);
        if(!empty($userAnnoncesDTO))
        {
            foreach($userAnnoncesDTO as $userAnnonceDTO)
            {
                $annonce = new Annonce();
                $annonce->setId($userAnnonceDTO['id']);
                $annonce->setTitle($userAnnonceDTO['title']);
                $annonce->setText($userAnnonceDTO['texte']);

                //On vérifie la date de publication
                $datePubli = new DateTime($userAnnonceDTO['datePubli']);
                if ($datePubli !== false) {
                    $annonce->setPubli($datePubli);
                }
                $userAnnonces[] = $annonce;
            }
        }
        return $userAnnonces;
    }
}
