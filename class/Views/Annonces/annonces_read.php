<?php

use App\Controllers\AnnoncesController;

require '../../../vendor/autoload.php';

$controller = new AnnoncesController();
echo $controller->getAnnonces();
?>


