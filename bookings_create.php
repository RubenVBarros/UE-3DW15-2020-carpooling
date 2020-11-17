<?php

use App\Controllers\BookingsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new BookingsController();
echo $controller->createBooking();
?>

<p>Création d'une réservation</p>
<form method="post" action="bookings_create.php" name ="bookingsCreateForm">
    <label for="id_user">Id d'utilisateur</label>
    <input type="text" name="id_user">
    <br />
    <label for="departure_city">Ville de départ :</label>
    <input type="text" name="departure_city">
    <br />
    <label for="arrival_city">Ville d'arrivée :</label>
    <input type="text" name="arrival_city">
    <br />
    <label for="departure_date">Date de départ au format dd-mm-yyyy:</label>
    <input type="text" name="departure_date">
    <br />
    <label for="arrival_date">Date d'arrivée au format dd-mm-yyyy:</label>
    <input type="text" name="arrival_date">
    <br />
    <input type="submit" value="Créer une réservation">
</form>