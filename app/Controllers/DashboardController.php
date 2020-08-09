<?php
namespace App\Controllers;

use Helpers\controllers;

class DashboardController extends controllers{

  public static function index()
  {
    self::auth();
    require_once "view/dashboard/index.php";
  }

}