<?php

namespace App\Services;

use App\Entities\Annonce;
use DateTime;

class AnnoncesService
{
    /**
     * Create or update an Annonce.
     */
    public function setAnnonce(?int $id, string $title, string $text, string $publi): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $publiDateTime = new DateTime($publi);

        if (empty($id)) {
            $isOk = $dataBaseService->createAnnonce($title, $text, $publiDateTime);
        } else {
            $isOk = $dataBaseService->updateAnnonce($id, $title, $text, $publiDateTime);
        }

        return $isOk;
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
}
