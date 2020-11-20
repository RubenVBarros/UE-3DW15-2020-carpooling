<?php

use App\Controllers\CarsController;

require '../../../vendor/autoload.php';

$controller = new CarsController();
echo $controller->deleteCars();
?>

<p>Supression d'une voiture</p>
<form method="post" action="cars_delete.php" name ="carDeleteForm">
    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <input type="submit" value="Supprimer une voiture">
</form>