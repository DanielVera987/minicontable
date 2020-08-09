<?php
namespace App\Controllers;

class DashboardController {

  public static function index()
  {
    session_destroy();
    echo "Bienvenido";
  }
}