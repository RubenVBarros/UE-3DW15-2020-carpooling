<?php

use App\Controllers\UsersController;
use App\Services\CarsService;

require '../../../vendor/autoload.php';

$controller = new UsersController();
echo $controller->createUser();

$carsService = new CarsService();
$cars = $carsService->getCars();

?>
<link rel="stylesheet" href="../../CSS/views.css">

<form method="post" action="users_create.php" name ="userCreateForm">
<p>Création d'un utilisateur</p>

    <label for="firstname">Prénom :</label>
    <input type="text" name="firstname">
    <br />
    <label for="lastname">Nom :</label>
    <input type="text" name="lastname">
    <br />
    <label for="email">Email :</label>
    <input type="text" name="email">
    <br />
    <label for="birthday">Date d'anniversaire au format dd-mm-yyyy :</label>
    <input type="text" name="birthday">
    <br />
    <label for="cars">Voitures :</label>
    <?php foreach ($cars as $car): ?>
    <br/>
    <?php $carName = $car->getBrand() . ' ' . $car->getColor() . ' ' . $car->getModel(); ?>
    <br />
    <input type="checkbox" name="cars[]" value="<?php echo $car->getId();?>"> <?php echo $carName; ?>
    <br />
    <?php endforeach; ?>
    <input  id='bouton' type="submit" value="Créer un utilisateur">
</form>