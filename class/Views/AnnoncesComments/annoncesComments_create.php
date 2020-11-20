<?php

use App\Controllers\AnnonceCommentsController;

require '../../../vendor/autoload.php';

$controller = new AnnonceCommentsController;
echo $controller->createAnnonceComments();
?>

<link rel="stylesheet" href="../../CSS/views.css">

<form method="post" action="annoncesComments_create.php" name ="annoncesCommentsCreateForm">
<p>Création d'un commentaire d'une annonce</p>

    <label for="idAnnonce">Id Annonce : </label>
    <input type="text" name="idAnnonce">
    <br />
    <br />

    <label for="idUser">Id User :</label>
    <input type="text" name="idUser">
    <br />
    <br />

    <label for="comment">Commentaire :</label> 
    <textarea name="comment"></textarea>
    <br>
    <input id = 'bouton' type="submit" value="Ecrire un commentaire d'une annonce">
</form>