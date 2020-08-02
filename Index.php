<?php declare(strict_types=1);
require_once 'vendor/autoload.php';
require_once "config.php";

 use App\Models\Ingreso,
    App\Service\IngresosService;

/*$ingreso = new Ingreso;
$ingreso->user_id = '1';
$ingreso->fecha = date('d M Y');
$ingreso->cliente = 'Daniel Vera';
$ingreso->concepto = 'Pago de internet';
$ingreso->importe = 122.0000;
$ingreso->iva = 12.0000;
$ingreso->iva_ret = 54.0000;
$ingreso->isr_ret = 10.0000;
$ingreso->neto = 5000.0000;
$service = new IngresosService;
var_dump($service->create($ingreso)); */

$getIngresos = new IngresosService;
var_dump($getIngresos->all());



