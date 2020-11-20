<?php

use App\Controllers\AnnoncesController;

require '../../../vendor/autoload.php';

$controller = new AnnoncesController();
echo $controller->updateAnnonce();
?>

<link rel="stylesheet" href="../../CSS/views.css">

<form method="post" action="annonces_update.php" name ="annoncesUpdateForm">
<p>Modification d'une Annonce</p>

    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <br />

    <label for="title">Titre : </label>
    <input type="text" name="title">
    <br />
    <br />

    <label for="texte">Texte :</label> 
    <textarea name="texte"></textarea>
    <br />
    <br />
    
    <label for="datePubli"> Date de publication au format dd-mm-yyyy:</label>
    <input type="text" name="datePubli">
    <br />
    <input id='bouton' type="submit" value="Modifier une annonce">
</form>
