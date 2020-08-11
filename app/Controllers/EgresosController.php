<?php
namespace App\Controllers;

use App\Models\Egreso,
    App\Service\EgresosService,
    Helpers\Validator;

class EgresosController
{
  public static function index()
  {
    $egresos = new EgresosService();
    $egresos = $egresos->all();
    require_once 'view/egresos/index.php';
  }

  public static function create()
  {
    require_once 'view/egresos/create.php';
  }

  public static function created()
  {
    $newEgreso = new Egreso();
    $newEgreso = new Egreso();
    $newEgreso->id = (isset($_POST['id'])) ? $_POST['id'] : false ;
    $newEgreso->user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : false ;
    $newEgreso->fecha = (isset($_POST['fecha'])) ? $_POST['fecha'] : false ;
    $newEgreso->proveedor = (isset($_POST['proveedor'])) ? $_POST['proveedor'] : false ;
    $newEgreso->ieps = (isset($_POST['ieps'])) ? $_POST['ieps'] : false ;
    $newEgreso->importe = (isset($_POST['importe'])) ? $_POST['importe'] : false ;
    $newEgreso->iva = (isset($_POST['iva'])) ? $_POST['iva'] : false ;
    $newEgreso->total = (isset($_POST['total'])) ? $_POST['total'] : false ;

    $validator = Validator::ValidatorEgresoCreate($newEgreso);

    if($validator != 'exito') var_dump($validator);

    $crearEgreso = new EgresosService;
    $crearEgreso->create($newEgreso);

    if($crearEgreso != 1) var_dump($crearEgreso);

    require_once 'view/egresos/create.php';
  }

  public static function show()
  {
    $id = (isset($_GET['id'])) ? $_GET['id'] : 'fail' ;
    if(!is_numeric($id)) header('Location: '. __URL__ . 'error');

    $getById = new EgresosService;
    $egreso = $getById->getId($id);

    var_dump($egreso);
    //require_once 'view/egreso/show.php';
  }

  public static function update()
  {
    $newEgreso = new Egreso();
    $newEgreso->id = (isset($_POST['id'])) ? $_POST['id'] : false ;
    $newEgreso->user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : false ;
    $newEgreso->fecha = (isset($_POST['fecha'])) ? $_POST['fecha'] : false ;
    $newEgreso->proveedor = (isset($_POST['proveedor'])) ? $_POST['proveedor'] : false ;
    $newEgreso->ieps = (isset($_POST['ieps'])) ? $_POST['ieps'] : false ;
    $newEgreso->importe = (isset($_POST['importe'])) ? $_POST['importe'] : false ;
    $newEgreso->iva = (isset($_POST['iva'])) ? $_POST['iva'] : false ;
    $newEgreso->total = (isset($_POST['total'])) ? $_POST['total'] : false ;

    $validator = Validator::ValidatorEgresoCreate($newEgreso);

    if($validator != 'exito') var_dump($validator);

    $crearEgreso = new EgresosService;
    $crearEgreso->update($newEgreso, $newEgreso->id);

    if($crearEgreso != 1) var_dump($crearEgreso);

    require_once 'view/egresos/create.php';
  }

  public static function destroy()
  {
    $id = (isset($_GET['id'])) ? $_GET['id'] : 'fail' ;
    if(!is_numeric($id)) header('Location: '. __URL__ . 'error');

    $getById = new EgresosService;
    $ingreso = $getById->destroy($id);

    var_dump($ingreso);
    //require_once 'view/egresos/show.php';
  }
}