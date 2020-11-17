<?php

use App\Controllers\AnnonceCommentsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new AnnonceCommentsController;
echo $controller->getAnnonceComments();
?>