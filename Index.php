<?php declare(strict_types=1);
require_once 'vendor/autoload.php';
require_once "config.php";

use App\Models\Ingresos;

$saludo = Ingresos::saludo();
var_dump($saludo);