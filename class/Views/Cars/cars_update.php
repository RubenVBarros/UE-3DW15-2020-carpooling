<?php

use App\Controllers\CarsController;

require '../../../vendor/autoload.php';

$controller = new CarsController();
echo $controller->updateCars();
?>
<link rel="stylesheet" href="../../CSS/views.css">

<form method="post" action="cars_update.php" name ="carUpdateForm">
<p>Mise à jour d'une voiture</p>

    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <label for="brand">Marque :</label>
    <input type="text" name="brand">
    <br />
    <label for="color">Couleur :</label>
    <input type="text" name="color">
    <br />
    <label for="model">Modèle :</label>
    <input type="text" name="model">
    <br />
    <input id='bouton' type="submit" value="Modifier une voiture">
</form>