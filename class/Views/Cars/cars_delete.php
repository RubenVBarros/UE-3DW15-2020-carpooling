<?php

use App\Controllers\CarsController;

require '../../../vendor/autoload.php';

$controller = new CarsController();
echo $controller->deleteCars();
?>
<link rel="stylesheet" href="../../CSS/views.css">

<form method="post" action="cars_delete.php" name ="carDeleteForm">
<p>Supression d'une voiture</p>

    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <input id='bouton' type="submit" value="Supprimer une voiture">
</form>