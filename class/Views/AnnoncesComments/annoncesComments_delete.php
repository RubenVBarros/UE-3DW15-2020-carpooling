<?php

use App\Controllers\AnnonceCommentsController;

require '../../../vendor/autoload.php';

$controller = new AnnonceCommentsController;
echo $controller->deleteAnnonceComments();
?>

<link rel="stylesheet" href="../../CSS/views.css">

<form method="post" action="annoncesComments_delete.php" name ="annoncesCommentsDeleteForm">
<p>Supression d'un commentaire d'une annonce</p>

    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <input id = 'bouton' type="submit" value="Supprimer un commentaire d'une annonce">
</form>