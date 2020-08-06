<?php
namespace App\Controllers;

use App\Models\Ingreso,
    App\Service\IngresosService,
    Helpers\Validator,
    PDO,
    PDOException;

class IngresosController
{
  public static function index()
  {
    $ingresos = new IngresosService();
    $ingresos = $ingresos->all();
  }

  public static function create()
  {
    $newIngreso = new Ingreso();
    $newIngreso->id = (isset($_POST['id'])) ? $_POST['id'] : false ;
    $newIngreso->user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : false ;
    $newIngreso->fecha = (isset($_POST['fecha'])) ? $_POST['fecha'] : false ;
    $newIngreso->cliente = (isset($_POST['cliente'])) ? $_POST['cliente'] : false ;
    $newIngreso->concepto = (isset($_POST['concepto'])) ? $_POST['concepto'] : false ;
    $newIngreso->importe = (isset($_POST['importe'])) ? $_POST['importe'] : false ;
    $newIngreso->iva = (isset($_POST['iva'])) ? $_POST['iva'] : false ;
    $newIngreso->iva_ret = (isset($_POST['iva_ret'])) ? $_POST['iva_ret'] : false ;
    $newIngreso->isr_ret = (isset($_POST['isr_ret'])) ? $_POST['isr_ret'] : false ;
    $newIngreso->neto = (isset($_POST['neto'])) ? $_POST['neto'] : false ;

    var_dump($newIngreso);

    $validator = Validator::ValidatorIngresoCreate($newIngreso);
  }
}