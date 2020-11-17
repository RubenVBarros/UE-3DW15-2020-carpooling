<?php

namespace App\Controllers;

use App\Services\AnnonceCommentsService;

class AnnonceCommentsController
{
    /**
     * Return the html for the create action.
     */
    public function createAnnonceComments(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['idAnnonce']) &&
            isset($_POST['idUser']) &&
            isset($_POST['comment'])) {

            // Create the Annonce comments :
            
            $annoncesService = new AnnonceCommentsService();
            $isOk = $annoncesService->setAnnonceComments(
                null,
                intval($_POST['idAnnonce']),
                intval($_POST['idUser']),
                $_POST['comment']
            );
            if ($isOk) {
                $html = 'Commentaire d\'annonce créé avec succès.';
            } else {
                $html = "Erreur lors de la création du commentaire de l'annonce.";
            }
        }

        return $html;
    }

    /**
     * Return the html for the read action.
     */
    public function getAnnonceComments(): string
    {
        $html = '';

        // Get all Annonces Comments:
        $annoncesService = new AnnonceCommentsService();
        $annonces = $annoncesService->getAnnonceComments();

        // Get html :
        foreach ($annonces as $annonce) {
            $html .=
                '#' . 
                $annonce->getId() . ' ' .
                $annonce->getIdAnnonce() . ' ' .
                $annonce->getIdUser() . ' ' .
                $annonce->getComment() . ' ' . '<br />';
        }

        return $html;
    }

    /**
     * Update the Annonce comments.
     */
    public function updateAnnonceComments(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id']) &&
            isset($_POST['idAnnonce']) &&
            isset($_POST['idUser']) &&
            isset($_POST['comment'])) {
            // Update the car :
            $AnnoncesService = new AnnonceCommentsService();
            $isOk = $AnnoncesService->setAnnonceComments(
                intval($_POST['id']),
                intval($_POST['idAnnonce']),
                intval($_POST['idUser']),
                $_POST['comment']
            );
            if ($isOk) {
                $html = 'Commentaire d\'annonce mise à jour avec succès.';
            } else {
                $html = "Erreur lors de la mise à jour du commentaire de l'annonce.";
            }
        }

        return $html;
    }

    /**
     * Delete an Annonce comments.
     */
    public function deleteAnnonceComments(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id'])) {
            // Delete the car :
            $AnnoncesService = new AnnonceCommentsService();
            $isOk = $AnnoncesService->deleteAnnonceComments($_POST['id']);
            if ($isOk) {
                $html = 'Commentaire d\'annonce supprimé avec succès.';
            } else {
                $html = "Erreur lors de la supression du commentaire de l'annonce.";
            }
        }

        return $html;
    }
}
