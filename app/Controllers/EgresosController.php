<?php
namespace App\Controllers;

use App\Models\Egreso,
    App\Service\EgresosService,
    Helpers\Validator;
use Exception;

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
    try {
      $newEgreso = new Egreso();
      $newEgreso->user_id = (isset($_SESSION['id'])) ? $_SESSION['id'] : false ;
      $newEgreso->fecha = (isset($_POST['fecha'])) ? $_POST['fecha'] : false ;
      $newEgreso->proveedor = (isset($_POST['proveedor'])) ? $_POST['proveedor'] : false ;
      $newEgreso->ieps = (isset($_POST['ieps'])) ? $_POST['ieps'] : false ;
      $newEgreso->importe = (isset($_POST['importe'])) ? $_POST['importe'] : false ;
      $newEgreso->iva = (isset($_POST['iva'])) ? $_POST['iva'] : false ;
      $newEgreso->total = (isset($_POST['total'])) ? $_POST['total'] : false ;

      $validator = Validator::ValidatorEgresoCreate($newEgreso);

      if($validator != 'exito'){
        $_SESSION['error'] = $validator;
        throw new Exception($validator);
      } 

      $crearEgreso = new EgresosService;
      $respuesta = $crearEgreso->create($newEgreso);

      if(!is_numeric($respuesta)){
        $_SESSION['error'] = $respuesta;
        throw new Exception($respuesta);
      }else{
        $_SESSION['success'] = "Egreso Creado";
      }
    } catch (Exception $th) {
      //throw $th;
    }

    header("Location: " . __URL__ . "egresos/create");
  }

  public static function show()
  {
    $id = (isset($_GET['id'])) ? $_GET['id'] : 'fail' ;
    if(!is_numeric($id)) header('Location: '. __URL__ . 'error');

    $getById = new EgresosService;
    $egreso = $getById->getId($id);

    require_once 'view/egresos/update.php';
  }

  public static function update()
  {
    try {
      $id = $_POST['id'];
      $newEgreso = new Egreso();
      $newEgreso->id = (isset($_POST['id'])) ? $_POST['id'] : false ;
      $newEgreso->user_id = (isset($_SESSION['id'])) ? $_SESSION['id'] : false ;
      $newEgreso->fecha = (isset($_POST['fecha'])) ? $_POST['fecha'] : false ;
      $newEgreso->proveedor = (isset($_POST['proveedor'])) ? $_POST['proveedor'] : false ;
      $newEgreso->ieps = (isset($_POST['ieps'])) ? $_POST['ieps'] : false ;
      $newEgreso->importe = (isset($_POST['importe'])) ? $_POST['importe'] : false ;
      $newEgreso->iva = (isset($_POST['iva'])) ? $_POST['iva'] : false ;
      $newEgreso->total = (isset($_POST['total'])) ? $_POST['total'] : false ;

      $validator = Validator::ValidatorEgresoCreate($newEgreso);

      if($validator != 'exito'){
        $_SESSION['error'] = $validator;
        throw new Exception($validator);
      } 

      $crearEgreso = new EgresosService;
      $respuesta = $crearEgreso->update($newEgreso, $id);

      if(!is_numeric($respuesta)){
        $_SESSION['error'] = $respuesta;
        throw new Exception($respuesta);
      }else{
        $_SESSION['success'] = "Egreso Editado";
      }
    } catch (Exception $th) {
      $_SESSION['error'] = $th->getMessage();
    }
    
    header("Location: " . __URL__ . "egresos/show/" . $id);
  }

  public static function destroy()
  {
    try {
      $id = (isset($_GET['id'])) ? $_GET['id'] : 'fail' ;
      if(!is_numeric($id)) header('Location: '. __URL__ . 'error');

      $getById = new EgresosService;
      $ingreso = $getById->destroy($id);

      if(!is_numeric($ingreso)){
        $_SESSION['error'] = $ingreso;
        throw new Exception($ingreso);
      }else{
        $_SESSION['success'] = "Egreso Eliminado";
      }
    } catch (Exception $th) {
      $_SESSION['error'] = $th->getMessage();
    }
    
    header("Location: " . __URL__ . "egresos");
  }
}