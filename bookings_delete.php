<?php

use App\Controllers\BookingsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new BookingsController();
echo $controller->deleteBooking();
?>

<p>Supression d'une réservation</p>
<form method="post" action="bookings_delete.php" name ="bookingDeleteForm">
    <label for="id_booking">Id :</label>
    <input type="text" name="id_booking">
    <br />
    <input type="submit" value="Supprimer une reservation">
</form>