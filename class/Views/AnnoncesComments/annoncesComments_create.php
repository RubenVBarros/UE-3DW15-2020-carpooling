<?php

use App\Controllers\AnnonceCommentsController;
use App\Services\AnnoncesService;
use App\Services\UsersService;

require '../../../vendor/autoload.php';

$controller = new AnnonceCommentsController;
echo $controller->createAnnonceComments();

$usersService = new UsersService();
$users = $usersService->getUsers();

$annonceService = new AnnoncesService();
$annonces = $annonceService->getAnnonces();
?>

<link rel="stylesheet" href="../../CSS/views.css">

<form method="post" action="annoncesComments_create.php" name="annoncesCommentsCreateForm">
    <p>Création d'un commentaire d'une annonce</p>

    <label for="idAnnonce">Id Annonce :</label>
    <select name="idAnnonce" >
        <?php
        foreach ($annonces as $annonce) {
        ?>
            <option value=<?php echo $annonce->getId()?>><?php echo $annonce->getId()?></option>
        <?php
        }
        ?>
    </select>
    <br>
    <label for="idUser">Id User :</label>
    <select name="idUser" >
        <?php
        foreach ($users as $user) {
        ?>
            <option value=<?php echo $user->getId()?>><?php echo $user->getId()?></option>
        <?php
        }
        ?>
    </select>

    <br>

    <label for="comment">Commentaire :</label>
    <textarea name="comment"></textarea>
    <br>
    <input id='bouton' type="submit" value="Ecrire un commentaire d'une annonce">
</form>