<?php

use App\Controllers\BookingsController;

require '../../../vendor/autoload.php';

$controller = new BookingsController();
echo $controller->updateBooking();
?>
<link rel="stylesheet" href="../../CSS/views.css">

<form method="post" action="bookings_update.php" name ="bookingUpdateForm">
<p>Mise à jour d'une réservation</p>

    <label for="id_booking">Id :</label>
    <input type="text" name="id_booking">
    <br />

    <label for="id_user">Id d'utilisateur :</label>
    <input type="text" name="id_user">
    <br />

    <label for="departure_city">Ville de départ :</label>
    <input type="text" name="departure_city">
    <br />

    <label for="arrival_city">Ville d'arrivée:</label>
    <input type="text" name="arrival_city">
    <br />

    <label for="departure_date">Date de départ au format dd-mm-yyyy:</label>
    <input type="text" name="departure_date">
    <br />

    <label for="arrival_date">Date d'arrivée au format dd-mm-yyyy:</label>
    <input type="text" name="arrival_date">
    <br />
    <input id='bouton' type="submit" value="Modifier une réservation">
</form>