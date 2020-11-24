<?php

use App\Controllers\AnnoncesController;
use App\Services\UsersService;

require '../../../vendor/autoload.php';

$controller = new AnnoncesController();
echo $controller->createAnnonce();

$usersService = new UsersService();
$users = $usersService->getUsers();
?>
<link rel="stylesheet" href="../../CSS/views.css">

<form method="post" action="annonces_create.php" name ="annoncesCreateForm">
<p>Création d'une Annonce</p>

    <label for="title">Titre</label>
    <input type="text" name="title">
    <br />
    <br/>

    <label for="texte">Texte :</label>
    <textarea name="texte"></textarea>
    <br />
    <br />

    <label for="datePubli">Date de publication au format dd-mm-yyyy:</label>
    <input type="text" name="datePubli">
    <br />

    <label for="users">Utilisateurs :</label>
    <?php foreach ($users as $user): ?>
    <br/>
    <?php $userName = $user->getFirstname() . ' ' . $user->getLastName() . ' ' ?>
    <br />
    <input type="radio" name="users[]" value="<?php echo $user->getId();?>"> <?php echo $userName; ?>
    <br />
    <?php endforeach; ?>
    <input id ='bouton' type="submit" value="Créer une annonce">
</form>