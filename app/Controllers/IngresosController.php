<?php
namespace App\Controllers;

use App\Models\Ingreso,
    App\Service\IngresosService,
    Helpers\Validator;

class IngresosController
{
  public static function index()
  {
    $ingresos = new IngresosService();
    $ingresos = $ingresos->all();
    require_once 'view/ingresos/index.php';
  }

  public static function create()
  {
    require_once 'view/ingresos/create.php';
  }

  public static function created()
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

    $validator = Validator::ValidatorIngresoCreate($newIngreso);

    if($validator != 'exito') var_dump($validator);

    $crearIngreso = new IngresosService;
    $crearIngreso->create($newIngreso);

    if($crearIngreso != 1) var_dump($crearIngreso);

    require_once 'view/ingresos/create.php';
  }

  public static function show()
  {
    $id = (isset($_GET['id'])) ? $_GET['id'] : 'fail' ;
    if(!is_numeric($id)) header('Location: '. __URL__ . 'error');

    $getById = new IngresosService;
    $ingreso = $getById->getId($id);

    var_dump($ingreso);
    //require_once 'view/ingresos/show.php';
  }

  public static function update()
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

    $validator = Validator::ValidatorIngresoCreate($newIngreso);

    if($validator != 'exito') var_dump($validator);

    $crearIngreso = new IngresosService;
    $crearIngreso->update($newIngreso);

    if($crearIngreso != 1) var_dump($crearIngreso);

    require_once 'view/ingresos/create.php';
  }

  public static function destroy()
  {
    $id = (isset($_GET['id'])) ? $_GET['id'] : 'fail' ;
    if(!is_numeric($id)) header('Location: '. __URL__ . 'error');

    $getById = new IngresosService;
    $ingreso = $getById->destroy($id);
    
    header("Location: " . __URL__ . "ingresos");
  }
}