<?php

namespace App\Services;

use App\Entities\Booking;
use DateTime;

class BookingsService
{
    /**
     * Create or update an booking.
     */
    public function setBooking(?int $idbooking, int $iduser, string $departure_city, string $arrival_city, string $departure_date, string $arrival_date): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $departureDateTime = new DateTime($departure_date);
        $arrivalDateTime = new DateTime($arrival_date);
        if (empty($idbooking)) {
            $isOk = $dataBaseService->createBookings($iduser, $departure_city, $arrival_city,$departureDateTime,$arrivalDateTime);
        } else {
            $isOk = $dataBaseService->updateBookings($idbooking, $iduser,$departure_city, $arrival_city,$departureDateTime, $arrivalDateTime);
        }

        return $isOk;
    }

    /**
     * Return all booking.
     */
    public function getBookings(): array
    {
        $bookings = [];

        $dataBaseService = new DataBaseService();
        $bookingsDTO = $dataBaseService->getBookings();
        if (!empty($bookingsDTO)) {
            foreach ($bookingsDTO as $bookingDTO) {
                $booking = new Booking();
                $booking->setIdbooking($bookingDTO['id_booking']);
                $booking->setIduser($bookingDTO['id_user']);
                $booking->setDepartureCity($bookingDTO['departure_city']);
                $booking->setArrivalCity($bookingDTO['arrival_city']);

                //On vérifie la date de départ
                $dateDepart = new DateTime($bookingDTO['departure_date']);
                if ($dateDepart !== false) {
                    $booking->setDepartureDate($dateDepart);
                }

                $dateArrivee = new DateTime($bookingDTO['arrival_date']);
                //On vérifie la date d'arrivée
                if ($dateArrivee !== false) {
                    $booking->setDepartureDate($dateArrivee);
                }
                $bookings[] = $booking;
            }
        }

        return $bookings;
    }

    /**
     * Delete an booking.
     */
    public function deleteBooking(string $idbooking): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteBookings($idbooking);

        return $isOk;
    }
}
