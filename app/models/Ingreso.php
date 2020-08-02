<?php
namespace App\Models;

class Ingreso {
  public $id;
  public $user_id;
  public $fecha;
  public $cliente;
  public $concepto;
  public $importe;
  public $iva;
  public $iva_ret;
  public $isr_ret;
  public $neto;
}