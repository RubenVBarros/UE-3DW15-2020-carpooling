<?php

use App\Controllers\AnnonceCommentsController;

require '../../../vendor/autoload.php';

$controller = new AnnonceCommentsController;
echo $controller->createAnnonceComments();
?>

<p>Création d'un commentaire d'une annonce</p>

<form method="post" action="annoncesComments_create.php" name ="annoncesCommentsCreateForm">
    <label for="idAnnonce">Id Annonce : </label>
    <input type="text" name="idAnnonce">
    <br />

    <label for="idUser">Id User :</label>
    <input type="text" name="idUser">
    <br />

    <label for="comment">Commentaire :</label> 
    <textarea name="comment"></textarea>
    <br>
    <input type="submit" value="Ecrire un commentaire d'une annonce">
</form>