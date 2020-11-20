<?php

use App\Controllers\UsersController;

require '../../../vendor/autoload.php';

$controller = new UsersController();
echo $controller->deleteUser();
?>
<link rel="stylesheet" href="../../CSS/views.css">

<form method="post" action="users_delete.php" name ="userDeleteForm">
<p>Supression d'un utilisateur</p>

    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <input id='bouton' type="submit" value="Supprimer un utilisateur">
</form>