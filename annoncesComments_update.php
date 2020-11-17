<?php

use App\Controllers\AnnonceCommentsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new AnnonceCommentsController;
echo $controller->updateAnnonceComments();
?>

<p>Modification d'un commentaire d'une annonce</p>
<form method="post" action="annoncesComments_update.php" name ="annoncesCommentsUpdateForm">
    <label for="id">Id :</label>
    <input type="text" name="id">
    <br>
    <label for="idAnnonce">Id Annonce : </label>
    <input type="text" name="idAnnonce">
    <br />

    <label for="idUser">Id User :</label>
    <input type="text" name="idUser">
    <br />
    <label for="comment">Commentaire :</label> 
    <textarea name="comment"></textarea>
    <br>
    <input type="submit" value="Modifier un commentaire d'une annonce">
</form>
