<?php

namespace App\Services;

use App\Entities\Annonce;
use DateTime;

class AnnoncesService
{
    /**
     * Create or update an Annonce.
     */
    public function setAnnonce(?int $id, string $title, string $text, int $idBooking, int $idCar): string
    {
        $annonceId = '';

        $dataBaseService = new DataBaseService();
        if (empty($id)) {
            $annonceId = $dataBaseService->createAnnonce($title, $text, $idBooking, $idCar);
        } else {
            $dataBaseService->updateAnnonce($id, $title, $text);
            $annonceId = $id;
        }

        return $annonceId;
    }

    /**
     * Return all Annonce.
     */
    public function getAnnonces(): array
    {
        $annonces = [];

        $dataBaseService = new DataBaseService();
        $annoncesDTO = $dataBaseService->getAnnonces();
        if (!empty($annoncesDTO)) {
            foreach ($annoncesDTO as $annonceDTO) {
                $annonce = new Annonce();
                $annonce->setId($annonceDTO['id']);
                $annonce->setTitle($annonceDTO['title']);
                $annonce->setText($annonceDTO['texte']);
                $date = date_create($annonceDTO['datePubli']);
                $date = date_format($date, 'd/m/Y');
                $annonce->setPubli($date);

                // Get announce of this user :
                $user = $this->getAnnonceUsers($annonceDTO['id']);
                $annonce->setUsers($user);

                $annonces[] = $annonce;
            }
        }

        return $annonces;
    }

    /**
     * Delete an Annonce.
     */
    public function deleteAnnonce(string $id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteAnnonce($id);

        return $isOk;
    }
    /**
     * Create relation between annoucement and his user.
     */
    public function setAnnonceUsers(string $idAnnonce, string $idUser): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->setAnnonceUser($idAnnonce, $idUser);

        return $isOk;
    }

    /**
     * Get announce of given user id.
     */
    public function getAnnonceUsers(string $idAnnonce): array
    {
        $annonceUsers = [];

        $dataBaseService = new DataBaseService();
        $userAnnoncesDTO = $dataBaseService->getUserAnnonces($idAnnonce);
        if (!empty($userAnnoncesDTO)) {
            foreach ($userAnnoncesDTO as $userAnnonceDTO) {
                $annonce = new Annonce();
                $annonce->setId($userAnnonceDTO['id']);
                $annonce->setTitle($userAnnonceDTO['title']);
                $annonce->setText($userAnnonceDTO['texte']);

                //On vérifie la date de publication
                $datePubli = new DateTime($userAnnonceDTO['datePubli']);
                if ($datePubli !== false) {
                    $annonce->setPubli($datePubli);
                }
                $annonceUsers[] = $annonce;
            }
        }
        return $annonceUsers;
    }
    /**
     * Create relation between annoucement and his booking.
     */
    public function setAnnonceBooking(string $idAnnonce, string $idBooking): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->setAnnonceBooking($idAnnonce, $idBooking);

        return $isOk;
    }


    /**
     * Get announce of given user id.
     */
    public function getAnnonceBookings(string $idAnnonce): array
    {
        $annonceBookings = [];
        

        $dataBaseService = new DataBaseService();
        $annoncesBookingsDTO = $dataBaseService->getAnnonceBooking($idAnnonce);
        
        if (!empty($annoncesBookingsDTO)) {
            foreach ($annoncesBookingsDTO as $annonceBookingsDTO) {
                $annonce = new Annonce();
                $booking = [
                    'departure_city'=>$annonceBookingsDTO["departure_city"],
                    'arrival_city' =>$annonceBookingsDTO["arrival_city"],
                    'departure_date' =>$annonceBookingsDTO["departure_date"],
                    'arrival_date' =>$annonceBookingsDTO["arrival_date"]
                ];

                $annonce->setBooking($booking);
                $annonceBookings[] = $annonce;
            }
        }
        return $annonceBookings;
    }

    /**
     * Get announce of given user id.
     */
    public function getAnnonceCars(string $idAnnonce): array
    {
        $annonceCars = [];
        

        $dataBaseService = new DataBaseService();
        $annoncesCarsDTO = $dataBaseService->getAnnonceCars($idAnnonce);
        
        if (!empty($annoncesCarsDTO)) {
            foreach ($annoncesCarsDTO as $annonceCarsDTO) {
                $annonce = new Annonce();
                $cars = [
                    'brand'=>$annonceCarsDTO["brand"],
                    'model' =>$annonceCarsDTO["model"]
                ];

                $annonce->setCars($cars);
                $annonceCars[] = $annonce;
            }
        }
        return $annonceCars;
    }
}
