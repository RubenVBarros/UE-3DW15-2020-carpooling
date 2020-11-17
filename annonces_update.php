<?php

use App\Controllers\AnnoncesController;

require __DIR__ . '/vendor/autoload.php';

$controller = new AnnoncesController();
echo $controller->updateAnnonce();
?>

<p>Création d'une Annonce</p>
<form method="post" action="annonces_update.php" name ="annoncesUpdateForm">
    <label for="id">Id :</label>
    <input type="text" name="id">
    <br>
    <label for="title">Titre : </label>
    <input type="text" name="title">
    <br />
    <label for="texte">Texte :</label> 
    <textarea name="texte"></textarea>
    <br />
    <!-- <label for="datePubli">Date :</label>
    <input type="date" name="datePubli"> -->
    
    <label for="datePubli"> Date de publication au format dd-mm-yyyy:</label>
    <input type="text" name="datePubli">
    <br />
    <input type="submit" value="Modifier une annonce">
</form>
