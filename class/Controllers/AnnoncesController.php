<?php

namespace App\Controllers;

use App\Services\AnnoncesService;

class AnnoncesController
{
    /**
     * Return the html for the create action.
     */
    public function createAnnonce(): string
    {
        $html = '';
        $isOk = false;

        // If the form have been submitted :
        if (isset($_POST['title']) &&
            isset($_POST['texte']) &&
            isset($_POST['datePubli'])) {
            // Create the annonce :

            $annoncesService = new AnnoncesService();
            $isOk = $annoncesService->setAnnonce(
                null,
                $_POST['title'],
                $_POST['texte'],
                $_POST['datePubli']
            );
            if ($isOk) {
                $html = 'Annonce créé avec succès.';
            } else {
                $html = "Erreur lors de la création de l'annonce.";
            }
        }

        return $html;
    }

    /**
     * Return the html for the read action.
     */
    public function getAnnonces(): string
    {
        $html = '';

        // Get all Annonces :
        $annoncesService = new AnnoncesService();
        $annonces = $annoncesService->getAnnonces();

        // Get html :
        foreach ($annonces as $annonce) {
            $html .=
                '#' . $annonce->getId() . ' ' .
                $annonce->getTitle() . ' ' .
                $annonce->getText() . ' ' .
                $annonce->getPubli() . ' ' . '<br />';
        }

        return $html;
    }

    /**
     * Update the car.
     */
    public function updateAnnonce(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id']) &&
            isset($_POST['title']) &&
            isset($_POST['texte']) &&
            isset($_POST['datePubli'])) {
            // Update the car :
            $annoncesService = new AnnoncesService();
            $isOk = $annoncesService->setAnnonce(
                $_POST['id'],
                $_POST['title'],
                $_POST['texte'],
                $_POST['datePubli']
            );
            if ($isOk) {
                $html = 'Annonce mise à jour avec succès.';
            } else {
                $html = "Erreur lors de la mise à jour de l'annonce.";
            }
        }

        return $html;
    }

    /**
     * Delete an car.
     */
    public function deleteAnnonce(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id'])) {
            // Delete the car :
            $AnnoncesService = new AnnoncesService();
            $isOk = $AnnoncesService->deleteAnnonce($_POST['id']);
            if ($isOk) {
                $html = 'Annonce supprimé avec succès.';
            } else {
                $html = "Erreur lors de la supression de l'annonce.";
            }
        }

        return $html;
    }
}
