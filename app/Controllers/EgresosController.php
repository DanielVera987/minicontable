<?php
namespace App\Controllers;

use App\Models\Egreso,
    App\Service\EgresosService,
    PDO,
    PDOException;

class EgresosController
{
  public static function index()
  {
    echo "Hola desde index egresos";
  }
}