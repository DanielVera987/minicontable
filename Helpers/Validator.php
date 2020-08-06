<?php
namespace Helpers;

use App\Models\Ingreso;
use Exception;

class Validator
{

  public static function ValidatorIngresoCreate(Ingreso $model)
  {
    try {
      if(!$model->id || !is_numeric($model->id)) throw new Exception("El id debe ser numero");
      if(!$model->user_id || !is_numeric($model->user_id)) throw new Exception("El user_id debe ser numero");
      if(!$model->fecha || !checkdate($model->fecha)) throw new Exception("La fecha debe ser tipo Date");
    } catch (Exception $th) {
      return $th;
    }
    
  }
}