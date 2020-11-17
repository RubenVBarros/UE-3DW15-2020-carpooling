<?php

use App\Controllers\CarsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new CarsController();
echo $controller->createCars();
?>

<p>Création d'une voiture</p>
<form method="post" action="cars_create.php" name ="carsCreateForm">
    <label for="brand">Marque</label>
    <input type="text" name="brand">
    <br />
    <label for="color">Couleur :</label>
    <input type="text" name="color">
    <br />
    <label for="model">Modèle :</label>
    <input type="text" name="model">
    <br />
    <input type="submit" value="Créer une voiture">
</form>