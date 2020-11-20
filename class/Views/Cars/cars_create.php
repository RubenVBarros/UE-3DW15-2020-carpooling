<?php

use App\Controllers\CarsController;

require '../../../vendor/autoload.php';

$controller = new CarsController();
echo $controller->createCars();
?>
<link rel="stylesheet" href="../../CSS/views.css">

<form method="post" action="cars_create.php" name ="carsCreateForm">
<p>Création d'une voiture</p>
    <label for="brand">Marque</label>
    <input type="text" name="brand">
    <br />
    <label for="color">Couleur :</label>
    <input type="text" name="color">
    <br />
    <label for="model">Modèle :</label>
    <input type="text" name="model">
    <br />
    <input id='bouton' type="submit" value="Créer une voiture">
</form>