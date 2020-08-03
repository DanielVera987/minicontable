<?php declare(strict_types=1);
require_once 'vendor/autoload.php';
require_once "config.php";

use App\Models\Egreso,
    App\Service\EgresosService;

/* $createEgreso = new Egreso;
$createEgreso->user_id = 1;
$createEgreso->fecha = date('Y-m-d');
$createEgreso->proveedor = 'Sheila Vera';
$createEgreso->ieps = 10.22;
$createEgreso->importe = 10.00;
$createEgreso->iva = 16.00;
$createEgreso->total = 200.00;
$create = new EgresosService;
var_dump($create->create($createEgreso)); */

/* $getEgresos = new EgresosService();
var_dump($getEgresos->all()); */

/* $getEgreso = new EgresosService();
var_dump($getEgreso->getId(1)); */

/*$updateEgreso = new Egreso();
$updateEgreso->fecha = date('Y-m-d');
$updateEgreso->proveedor = "Daniel Vera";
$updateEgreso->ieps = "12.00";
$updateEgreso->importe = "1000.00";
$updateEgreso->iva = "16.00";
$updateEgreso->total = "10000.00";
$update = new EgresosService();
$a = $update->update($updateEgreso, 1);
var_dump($a); */

$deleteEgreso = new EgresosService();
$deleteEgreso->destroy(1);
