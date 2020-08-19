<?php
namespace App\Controllers;

use App\Models\Ingreso,
    App\Service\IngresosService,
    Helpers\Validator,
    Helpers\Controllers,
    Helpers\Cfdi,
    Exception;

class IngresosController extends Controllers
{
  public static function index()
  {
    self::auth();
    $ingresos = new IngresosService();
    $ingresos = $ingresos->all();
    require_once 'view/ingresos/index.php';
  }

  public static function create()
  {
    self::auth();
    require_once 'view/ingresos/create.php';
  }

  public static function created()
  {
    try {
      self::auth();
      $newIngreso = new Ingreso();
      $newIngreso->user_id = (isset($_SESSION['id'])) ? $_SESSION['id'] : false ;
      $newIngreso->fecha = (isset($_POST['fecha'])) ? $_POST['fecha'] : false ;
      $newIngreso->cliente = (isset($_POST['cliente'])) ? $_POST['cliente'] : false ;
      $newIngreso->concepto = (isset($_POST['concepto'])) ? $_POST['concepto'] : false ;
      $newIngreso->importe = (isset($_POST['importe'])) ? $_POST['importe'] : false ;
      $newIngreso->iva = (isset($_POST['iva'])) ? $_POST['iva'] : false ;
      $newIngreso->iva_ret = (isset($_POST['iva_ret'])) ? $_POST['iva_ret'] : false ;
      $newIngreso->isr_ret = (isset($_POST['isr_ret'])) ? $_POST['isr_ret'] : false ;
      $newIngreso->neto = (isset($_POST['neto'])) ? $_POST['neto'] : false ;

      $validator = Validator::ValidatorIngresoCreate($newIngreso);

      if($validator != 'exito'){
        $_SESSION['error'] = $validator;
        throw new Exception($validator);
      } 

      $crearIngreso = new IngresosService;
      $respuesta = $crearIngreso->create($newIngreso);

      if(!is_numeric($respuesta)){
        $_SESSION['error'] = $respuesta;
        throw new Exception($respuesta);
      }else{
        $_SESSION['success'] = "Ingreso Creado";
      }

    } catch (Exception $th) {
      //throw $th;
    }

    header('Location:' . __URL__ . 'ingresos/create');
  }

  public static function show()
  {
    self::auth();
    $id = (isset($_GET['id'])) ? $_GET['id'] : 'fail' ;
    if(!is_numeric($id)) {
      header('Location: '. __URL__ . 'error');
      exit;
    }

    $getById = new IngresosService;
    $ingreso = $getById->getId($id);

    require_once 'view/ingresos/update.php';
  }

  public static function update()
  {
      self::auth();
      $id = $_POST['id'];
      $newIngreso = new Ingreso();
      $newIngreso->id = (isset($_POST['id'])) ? $_POST['id'] : false ;
      $newIngreso->user_id = (isset($_SESSION['id'])) ? $_SESSION['id'] : false ;
      $newIngreso->fecha = (isset($_POST['fecha'])) ? $_POST['fecha'] : false ;
      $newIngreso->cliente = (isset($_POST['cliente'])) ? $_POST['cliente'] : false ;
      $newIngreso->concepto = (isset($_POST['concepto'])) ? $_POST['concepto'] : false ;
      $newIngreso->importe = (isset($_POST['importe'])) ? $_POST['importe'] : false ;
      $newIngreso->iva = (isset($_POST['iva'])) ? $_POST['iva'] : false ;
      $newIngreso->iva_ret = (isset($_POST['iva_ret'])) ? $_POST['iva_ret'] : false ;
      $newIngreso->isr_ret = (isset($_POST['isr_ret'])) ? $_POST['isr_ret'] : false ;
      $newIngreso->neto = (isset($_POST['neto'])) ? $_POST['neto'] : false ;

      $validator = Validator::ValidatorIngresoCreate($newIngreso);

      if($validator != 'exito'){
        $_SESSION['error'] = $validator;
        throw new Exception($validator);
      }

      $crearIngreso = new IngresosService;
      $respuesta = $crearIngreso->update($newIngreso);

      if(!is_numeric($respuesta)){
        $_SESSION['error'] = $respuesta;
        throw new Exception($respuesta);
      }else{
        $_SESSION['success'] = "Ingreso Creado";
      }

    header('Location:' . __URL__ . 'ingresos/show/' . $id);
  }

  public static function destroy()
  {
    self::auth();
    $id = (isset($_GET['id'])) ? $_GET['id'] : 'fail' ;
    if(!is_numeric($id)) header('Location: '. __URL__ . 'error');

    $getById = new IngresosService;
    $ingreso = $getById->destroy($id);
    
    header("Location: " . __URL__ . "ingresos");
  }

  public static function importar()
  {
    try {
      self::auth();
      $result = Cfdi::importCfdi3('file3.xml');
      $fecha = explode("T", $result['fecha']);
      
      $newIngreso = new Ingreso();
      $newIngreso->user_id = (isset($_SESSION['id'])) ? $_SESSION['id'] : false ;
      $newIngreso->fecha = $fecha[0];
      $newIngreso->cliente = $result['receptorNombre'];
      $newIngreso->concepto = (int)intVal($result['concepto']['Importe']);
      $newIngreso->importe = (int)intVal($result['concepto']['Importe']);
      $newIngreso->iva = intVal($result['traslado']['Importe']);
      $newIngreso->iva_ret = 1;
      $newIngreso->isr_ret = 1;
      $newIngreso->neto = intVal($result['total']);
      

      $validator = Validator::ValidatorIngresoCreate($newIngreso);

      if($validator != 'exito'){
        $_SESSION['error'] = $validator;
        throw new Exception($validator);
      } 

      $crearIngreso = new IngresosService;
      $respuesta = $crearIngreso->create($newIngreso);

      //Crear los items

      if(!is_numeric($respuesta)){
        $_SESSION['error'] = $respuesta;
        throw new Exception($respuesta);
      }else{
        $_SESSION['success'] = "Ingreso Creado";
      }

    } catch (Exception $th) {
      //throw $th;
    }

    header('Location:' . __URL__ . 'ingresos/create');
  }
}