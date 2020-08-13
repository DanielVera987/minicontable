<?php
namespace Helpers;

use App\Models\Ingreso;
use App\Models\Egreso;
use Exception;

class Validator
{

  public static function ValidatorIngresoCreate(Ingreso $model)
  {
    try {
      if(!$model->user_id || !is_numeric($model->user_id)) throw new Exception("El user_id debe ser numero");
      if(!$model->fecha) throw new Exception("La fecha debe ser tipo Date");
      $isValidFecha = self::validarFecha($model->fecha);
      if(!$isValidFecha) throw new Exception("La fecha debe ser tipo Date2");
      if(!$model->cliente) throw new Exception("Debe indicar el nombre del cliente");
      if(!$model->importe || !is_numeric($model->importe)) throw new Exception("El concepto debe ser numero");
      if(!$model->iva || !is_numeric($model->iva)) throw new Exception("El concepto debe ser numero");
      if(!$model->iva_ret || !is_numeric($model->iva_ret)) throw new Exception("El concepto debe ser numero");
      if(!$model->isr_ret || !is_numeric($model->isr_ret)) throw new Exception("El concepto debe ser numero");
      if(!$model->neto || !is_numeric($model->neto)) throw new Exception("El concepto debe ser numero");

      return 'exito';
    } catch (Exception $th) {
      return $th->getMessage();
    }
  }

  public static function ValidatorEgresoCreate(Egreso $model)
  {
    try {
      if(!$model->user_id || !is_numeric($model->user_id)) throw new Exception("El user_id debe ser numero");
      if(!$model->fecha) throw new Exception("La fecha debe ser tipo Date");
      $isValidFecha = self::validarFecha($model->fecha);
      if(!$isValidFecha) throw new Exception("La fecha debe ser tipo Date");
      if(!$model->proveedor) throw new Exception("Debe indicar el nombre del proveedor");
      if(!$model->ieps || !is_numeric($model->ieps)) throw new Exception("El ieps debe ser numero");
      if(!$model->importe || !is_numeric($model->importe)) throw new Exception("El concepto debe ser numero");
      if(!$model->iva || !is_numeric($model->iva)) throw new Exception("El concepto debe ser numero");
      if(!$model->total || !is_numeric($model->total)) throw new Exception("El total debe ser numero");

      return 'exito';
    } catch (Exception $th) {
      return $th->getMessage();
    }
  }

  public static function validarFecha($fecha){
    $valores = explode('-', $fecha);
    if(count($valores) == 3 && checkdate($valores[1], $valores[2], $valores[0])){
      return true;
      }
    return false;
  }
}