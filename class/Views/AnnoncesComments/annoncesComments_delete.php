<?php

use App\Controllers\AnnonceCommentsController;

require '../../../vendor/autoload.php';

$controller = new AnnonceCommentsController;
echo $controller->deleteAnnonceComments();
?>

<p>Supression d'un commentaire d'une annonce</p>
<form method="post" action="annoncesComments_delete.php" name ="annoncesCommentsDeleteForm">
    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <input type="submit" value="Supprimer un commentaire d'une annonce">
</form>