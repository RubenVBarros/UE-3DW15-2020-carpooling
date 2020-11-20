<?php
require __DIR__ . '/vendor/autoload.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="class/CSS/style.css">
    </head>

<div class = 'wrap'>
<h1>Bienvenue sur notre site de covoiturage</h1>
    <div class = 'wrap1'>
    <input type="checkbox" id="tab-1" name="tabs">
    <label for="tab-1"><div>Menu annonce</div><div class="cross"></div></label>
        <div class = 'content'>
            <li><a href="class/Views/Annonces/annonces_create.php">Créer une annonce</a></li>
            <li><a href="class/Views/Annonces/annonces_update.php">Modifier une annonce</a></li>
            <li><a href="class/Views/Annonces/annonces_delete.php">Supprimer une annonce</a></li>
            <li><a href="class/Views/Annonces/annonces_read.php">Voir les annonces</a></li>
        </div>
    </div>

    <div class = 'wrap2'>
    <input type="checkbox" id="tab-2" name="tabs">
    <label for="tab-2"><div>Menu commentaire d'annonce</div><div class="cross"></div></label>
        <div class = 'content'>
            <li><a href="class/Views/AnnoncesComments/annoncescomments_create.php">Créer un commentaire d'annonce</a></li>
            <li><a href="class/Views/AnnoncesComments/annoncescomments_update.php">Modifier un commentaire d'annonce</a></li>
            <li><a href="class/Views/AnnoncesComments/annoncescomments_delete.php">Supprimer un commentaire d'annonce</a></li>
            <li><a href="class/Views/AnnoncesComments/annoncescomments_read.php">Voir les commentaires d'annonces</a></li>
        </div>
    </div>

    <div class = 'wrap3'>
    <input type="checkbox" id="tab-3" name="tabs">
    <label for="tab-3"><div>Menu réservation</div><div class="cross"></div></label>
        <div class = 'content'>
            <li><a href="class/Views/Bookings/bookings_create.php">Créer une réservation</a></li>
            <li><a href="class/Views/Bookings/bookings_update.php">Modifier une réservation</a></li>
            <li><a href="class/Views/Bookings/bookings_delete.php">Supprimer une réservation</a></li>
            <li><a href="class/Views/Bookings/bookings_read.php">Voir les réservations</a></li>
        </div>
    </div>

    <div class = 'wrap4'>
    <input type="checkbox" id="tab-4" name="tabs">
    <label for="tab-4"><div>Menu voiture</div><div class="cross"></div></label>
        <div class = 'content'>
            <li><a href="class/Views/Cars/cars_create.php">Créer une voiture</a></li>
            <li><a href="class/Views/Cars/cars_update.php">Modifier une voiture</a></li>
            <li><a href="class/Views/Cars/cars_delete.php">Supprimer une voiture</a></li>
            <li><a href="class/Views/Cars/cars_read.php">Voir les voitures</a></li>
        </div>
    </div>

    <div class = 'wrap5'>
    <input type="checkbox" id="tab-5" name="tabs">
    <label for="tab-5"><div>Menu utilisateur</div><div class="cross"></div></label>
        <div class = 'content'>
            <li><a href="class/Views/Users/users_create.php">Créer un utilisateur</a></li>
            <li><a href="class/Views/Users/users_update.php">Modifier un utilisateur</a></li>
            <li><a href="class/Views/Users/users_delete.php">Supprimer un utilisateur</li>
            <li><a href="class/Views/Users/users_read.php">Voir les utilisateurs</a></li>
        </div>    
    </div>

</div>


</html>