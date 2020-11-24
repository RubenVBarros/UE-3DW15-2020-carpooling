<?php

namespace App\Services;

use App\Entities\Annonce;
use DateTime;

class AnnoncesService
{
    /**
     * Create or update an Annonce.
     */
    public function setAnnonce(?int $id, string $title, string $text, string $publi): string
    {
        $annonceId = '';

        $dataBaseService = new DataBaseService();
        $publiDateTime = new DateTime($publi);
        if (empty($id)) {
            $annonceId = $dataBaseService->createAnnonce($title, $text, $publiDateTime);
        } else {
            $dataBaseService->updateAnnonce($id, $title, $text, $publiDateTime);
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
                $annonce->setPubli($annonceDTO['datePubli']);

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
    public function setAnnonceUsers(string $idAnnonce,string $idUser): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->setAnnonceUser($idAnnonce,$idUser);

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
                $annonceUsers[] = $annonce;
            }
        }
        return $annonceUsers;
    }
}
