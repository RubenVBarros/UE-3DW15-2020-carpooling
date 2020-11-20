<?php

use App\Controllers\AnnonceCommentsController;

require '../../../vendor/autoload.php';

$controller = new AnnonceCommentsController;
echo $controller->getAnnonceComments();
?>