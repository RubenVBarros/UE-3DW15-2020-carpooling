<?php

namespace App\Controllers;

use App\Services\BookingsService;

class BookingsController
{
    /**
     * Return the html for the create action.
     */
    public function createBooking(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id_user']) &&
            isset($_POST['departure_city']) &&
            isset($_POST['arrival_city']) &&
            isset($_POST['departure_date']) &&
            isset($_POST['arrival_date'])) {
            // Create the booking :
            $BookingsService = new BookingsService();
            $isOk = $BookingsService->setBooking(
                null,
                $_POST['id_user'],
                $_POST['departure_city'],
                $_POST['arrival_city'],
                $_POST['departure_date'],
                $_POST['arrival_date']
            );
            if ($isOk) {
                $html = 'Réservation créé avec succès.';
            } else {
                $html = 'Erreur lors de la création de la réservation.';
            }
        }

        return $html;
    }

    /**
     * Return the html for the read action.
     */
    public function getBookings(): string
    {
        $html = '';

        // Get all bookings :
        $BookingsService = new BookingsService();
        $bookings = $BookingsService->getBookings();

        // Get html :
        foreach ($bookings as $booking) {
            $html .=
                '#' . $booking->getIdbooking() . ' ' .
                $booking->getIduser() . ' ' . //pas sur??
                $booking->getDepartureCity() . ' ' .
                $booking->getArrivalCity() . ' ' .
                $booking->getDepartureDate()->format('d-m-Y').
                $booking->getArrivalDate()->format('d-m-Y') . '<br />';
        }

        return $html;
    }

    /**
     * Update the booking.
     */
    public function updateBooking(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id_booking']) &&
            isset($_POST['id_user']) &&
            isset($_POST['departure_city']) &&
            isset($_POST['arrival_city']) &&
            isset($_POST['departure_date']) &&
            isset($_POST['arrival_date'])) {
            // Update the booking :
            $bookingsService = new BookingsService();
            $isOk = $bookingsService->setBooking(
                $_POST['id_booking'],
                $_POST['id_user'],
                $_POST['departure_city'],
                $_POST['arrival_city'],
                $_POST['departure_date'],
                $_POST['arrival_date']
            );
            if ($isOk) {
                $html = 'Réservation mise à jour avec succès.';
            } else {
                $html = 'Erreur lors de la mise à jour de la réservation.';
            }
        }

        return $html;
    }

    /**
     * Delete an booking.
     */
    public function deleteBooking(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id_booking'])) {
            // Delete the booking :
            $bookingsService = new BookingsService();
            $isOk = $bookingsService->deleteBooking($_POST['id_booking']);
            if ($isOk) {
                $html = 'Réservation supprimé avec succès.';
            } else {
                $html = 'Erreur lors de la supression de la réservation.';
            }
        }

        return $html;
    }
}
