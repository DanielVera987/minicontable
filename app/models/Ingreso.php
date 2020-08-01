<?php
namespace App\Models;

class Ingreso {
  private $id;
  private $user_id;
  private $fecha;
  private $cliente;
  private $concepto;
  private $importe;
  private $iva;
  private $iva_ret;
  private $isr_ret;
  private $neto;
  private $created_at;
  private $updated_at;
}