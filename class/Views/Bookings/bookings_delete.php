<?php

use App\Controllers\BookingsController;

require '../../../vendor/autoload.php';

$controller = new BookingsController();
echo $controller->deleteBooking();
?>

<link rel="stylesheet" href="../../CSS/views.css">

<form method="post" action="bookings_delete.php" name ="bookingDeleteForm">
<p>Supression d'une réservation</p>

    <label for="id_booking">Id :</label>
    <input type="text" name="id_booking">
    <br />
    <input id='bouton' type="submit" value="Supprimer une reservation">
</form>