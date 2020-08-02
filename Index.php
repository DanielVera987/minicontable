<?php declare(strict_types=1);
require_once 'vendor/autoload.php';
require_once "config.php";

use App\Models\Egreso,
    App\Service\EgresosService;

$createEgreso = new Egreso;
$createEgreso->user_id = 1;
$createEgreso->fecha = date('Y-m-d');
$createEgreso->proveedor = 'Sheila Vera';
$createEgreso->ieps = 10.22;
$createEgreso->importe = 10.00;
$createEgreso->iva = 16.00;
$createEgreso->total = 200.00;
$create = new EgresosService;
var_dump($create->create($createEgreso));
