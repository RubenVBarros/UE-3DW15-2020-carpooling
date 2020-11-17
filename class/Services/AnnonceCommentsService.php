<?php

namespace App\Services;

use App\Entities\AnnonceComments;

class AnnonceCommentsService
{
    /**
     * Create or update an Annonce.
     */
    public function setAnnonceComments(?int $id, int $idAnnonce, int $idUser, string $comment): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        
        if (empty($id)) {
            $isOk = $dataBaseService->createAnnonceComments($idAnnonce, $idUser, $comment);
        } else {
            $isOk = $dataBaseService->updateAnnonceComments($id, $idAnnonce, $idUser, $comment);
        }

        return $isOk;
    }

    /**
     * Return all Annonce.
     */
    public function getAnnonceComments(): array
    {
        $annonces = [];

        $dataBaseService = new DataBaseService();
        $annoncesDTO = $dataBaseService->getAnnonceComments();
        if (!empty($annoncesDTO)) {
            foreach ($annoncesDTO as $annonceDTO) {
                $annonce = new AnnonceComments();
                $annonce->setId($annonceDTO['id']);
                $annonce->setIdAnnonce($annonceDTO['idAnnonce']);
                $annonce->setIdUser($annonceDTO['idUser']);
                $annonce->setComment($annonceDTO['comments']);
                $annonces[] = $annonce;
            }
        }

        return $annonces;
    }

    /**
     * Delete an Annonce.
     */
    public function deleteAnnonceComments(int $id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteAnnonceComments($id);

        return $isOk;
    }
}
