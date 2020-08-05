<?php
namespace App\Controllers;

use App\Models\Ingreso,
    App\Service\IngresosService,
    PDO,
    PDOException;

class IngresosController
{
  public static function index()
  {
    echo "Hola desde index ingresos";
  }
}