<?php

use App\Controllers\CarsController;

require '../../../vendor/autoload.php';

$controller = new CarsController();
echo $controller->getCars();
