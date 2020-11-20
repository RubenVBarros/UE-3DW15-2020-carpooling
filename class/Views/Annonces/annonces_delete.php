<?php

use App\Controllers\AnnoncesController;

require '../../../vendor/autoload.php';

$controller = new AnnoncesController();
echo $controller->deleteAnnonce();
?>
<link rel="stylesheet" href="../../CSS/views.css">

<form method="post" action="annonces_delete.php" name ="annonceDeleteForm">
<p>Supression d'une annonce</p>

    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <input id='bouton' type="submit" value="Supprimer une annonce">
</form>