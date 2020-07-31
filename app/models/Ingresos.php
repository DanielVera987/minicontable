<?php
namespace App\Models;

class Ingresos {
  private $id;
  private $user_id;
  private $fecha;
  private $cliente;
  private $concepto;
  private $importe;
  private $iva;
  private $ivaRet;
  private $isrRet;
  private $neto;
  private $created_at;
  private $updated_at;

  public static function saludo()
  {
    return "Hola autoload";
  }
}