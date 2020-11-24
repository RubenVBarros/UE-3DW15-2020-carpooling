<?php

use App\Controllers\AnnoncesController;
use App\Services\BookingsService;
use App\Services\CarsService;
use App\Services\UsersService;

require '../../../vendor/autoload.php';

$controller = new AnnoncesController();
echo $controller->createAnnonce();

$usersService = new UsersService();
$users = $usersService->getUsers();

$bookingService = new BookingsService();
$bookings = $bookingService->getBookings();

$carsService = new CarsService();
$cars = $carsService->getCars();
?>
<link rel="stylesheet" href="../../CSS/views.css">

<form method="post" action="annonces_create.php" name ="annoncesCreateForm">
<p>Création d'une Annonce</p>

    <label for="title">Titre</label>
    <input type="text" name="title">
    <br />
    <br/>

    <label for="texte">Texte :</label>
    <textarea name="texte"></textarea>
    <br />
    <!-- <br />

    <label for="datePubli">Date de publication au format dd-mm-yyyy:</label>
    <input type="text" name="datePubli">
    <br /> -->

    <label for="users">Utilisateurs :</label>
    <select name="users">
    <?php foreach ($users as $user){ ?>
        <option value=<?php echo $user->getId();?>><?php echo $user->getFirstname() . ' ' . $user->getLastName() . ' ' ?></option>
    <?php } ?>
    </select>
    <br>
    <label for="booking">Reservations :</label>
    <select name="booking">
    <?php foreach ($bookings as $booking){ ?>
        <option value=<?php echo $booking->getIdbooking();?>><?php echo $booking->getDepartureCity() . ' -> ' . $booking->getArrivalCity() . ' : ' . date_format($booking->getDepartureDate(), "d/m/Y") . " -> ". date_format($booking->getArrivalDate(), "d/m/Y") ?></option>
    <?php } ?>
    </select>
    <br>
    <label for="cars">Voitures :</label>
    <select name="cars">
    <?php foreach ($cars as $car){ ?>
        <option value=<?php echo $car->getId();?>><?php echo $car->getBrand() . ' ' . $car->getModel() . ' '. $car->getColor() ?></option>
    <?php } ?>
    </select>
    <br>
    <input id ='bouton' type="submit" value="Créer une annonce">
</form>