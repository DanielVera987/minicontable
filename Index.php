<?php 
declare(strict_types=1);
require_once 'vendor/autoload.php';
require_once "config.php";

if(isset($_GET['c'])){
  $nombreControlador = $_GET['c'];

  if(file_exists("App/Controllers/{$nombreControlador}Controller.php")){
    $nombreControlador = '\\App\\Controllers\\'.$nombreControlador.'Controller';
  }
  else{
    $nombreControlador = false;
    error();
  }
}else{
  $nombreControlador = '\\App\\Controllers\\DashboardController';
}

if(isset($_GET['a'])){
  $nombreMetodo = $_GET['a'];

  if(method_exists($nombreControlador,$nombreMetodo)){
    $nombreControlador::$nombreMetodo();
  }else{
    ($nombreControlador) ? $nombreControlador::index() : '';
  }
}else{
  ($nombreControlador) ? $nombreControlador::index() : '';
}

function error(){
  $error = '\\App\\Controllers\\ErrorController';
  $error::index();
}