<?php

use App\Controllers\AnnoncesController;

require '../../../vendor/autoload.php';

$controller = new AnnoncesController();
echo $controller->createAnnonce();
?>

<p>Création d'une Annonce</p>
<form method="post" action="annonces_create.php" name ="annoncesCreateForm">
    <label for="title">Titre</label>
    <input type="text" name="title">
    <br />
    <label for="texte">Texte :</label> 
    <textarea name="texte"></textarea>
    <br />
    <!-- <label for="datePubli">Date :</label>
    <input type="date" name="datePubli"> -->
    
    <label for="datePubli">Date de publication au format dd-mm-yyyy:</label>
    <input type="text" name="datePubli">
    <br />
    <input type="submit" value="Créer une annonce">
</form>