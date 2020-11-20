<?php

use App\Controllers\CarsController;

require '../../../vendor/autoload.php';

$controller = new CarsController();
echo $controller->updateCars();
?>

<p>Mise à jour d'une voiture</p>
<form method="post" action="cars_update.php" name ="carUpdateForm">
    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <label for="brand">Marque :</label>
    <input type="text" name="brand">
    <br />
    <label for="color">Color :</label>
    <input type="text" name="color">
    <br />
    <label for="model">Modèle :</label>
    <input type="text" name="model">
    <br />
    <input type="submit" value="Modifier une voiture">
</form>