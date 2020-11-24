<?php

namespace App\Controllers;

use App\Entities\User;
use App\Services\AnnoncesService;

class AnnoncesController
{
    /**
     * Return the html for the create action.
     */
    public function createAnnonce(): string
    {
        $html = '';

        // If the form have been submitted :
        if (
            isset($_POST['title']) &&
            isset($_POST['texte']) &&
            isset($_POST['users']) &&
            isset($_POST['booking']) &&
            isset($_POST['cars'])
        ) {
            // Create the annonce :

            $annoncesService = new AnnoncesService();
            $idAnnonce = $annoncesService->setAnnonce(
                null,
                $_POST['title'],
                $_POST['texte'],
                $_POST['booking'],
                $_POST['cars']
            );
            //Create the annonce-users relation
            if (!empty($_POST['users'])) {
                $idUser = $_POST['users'];
                $isOk = $annoncesService->setAnnonceUsers($idAnnonce, $idUser);
            }
            if ($idAnnonce && $isOk) {
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

        $html = '
        <table>
        <thead>
            <tr>
                <td>Numero Annonce</td>                
                <td>Titre</td>                
                <td>Contenu</td>                
                <td>Date de publication d\'annonce</td>                
                <td>Ville de Départ</td>                
                <td>Ville d\'arrivée</td>                
                <td>Date de départ </td>                
                <td>Date d\'arrivée</td>                
                <td>Voiture</td>                
            </tr>
        </thead>
        <tbody>';
        // Get html :
        foreach ($annonces as $annonce) {
            $html .= '
            <tr>
                <td>' . $annonce->getId() . '</td>
                <td>' . $annonce->getTitle() . '</td>
                <td>' . $annonce->getText() . '</td>
                <td>' . $annonce->getPubli()  . '</td>
            ';

            $annoncesBooking = $annoncesService->getAnnonceBookings( $annonce->getId() );
            foreach($annoncesBooking as $annonceBooking){
                $date_departure = date_create($annonceBooking->getBooking()['departure_date']);
                $date_departure = date_format($date_departure, 'd/m/Y');
                $date_arrival = date_create($annonceBooking->getBooking()['arrival_date']);
                $date_arrival = date_format($date_arrival, "d/m/Y");
                $html .='
                
                <td>' . $annonceBooking->getBooking()['departure_city'] . '</td>
                <td>' . $annonceBooking->getBooking()['arrival_city'] . '</td>
                <td>' . $date_departure . '</td>
                <td>' . $date_arrival. '</td>
                ';
            }

            
            $annoncesCars = $annoncesService->getAnnonceCars( $annonce->getId() );
            foreach($annoncesCars as $annonceCars){
                $html .='
                
                <td>' . $annonceCars->getCars()['brand'] . '</td>
                <td>' . $annonceCars->getCars()['model'] . '</td>
                ';
            }
            
            $html .= '</tr>';
        }

        $html .= '</tbody></table>';

        return $html;
    }

    /**
     * Update the car.
     */
    public function updateAnnonce(): string
    {
        $html = '';

        // If the form have been submitted :
        if (
            isset($_POST['id']) &&
            isset($_POST['title']) &&
            isset($_POST['texte']) &&
            isset($_POST['datePubli'])
        ) {
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
