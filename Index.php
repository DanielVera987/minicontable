<?php 
declare(strict_types=1);
session_start();
require_once 'vendor/autoload.php';
require_once "config.php";
if(isset($_SESSION['Authorization']) && isset($_SESSION['id'])){
  require_once "view/layout/header.php";
}


$nombreControlador = (isset($_GET['c'])) ? $_GET['c'] : false;
$nombreMetodo = (isset($_GET['a'])) ? $_GET['a'] : false;

if($nombreControlador && file_exists("App/Controllers/{$nombreControlador}Controller.php")){
  $nombreControlador = '\\App\\Controllers\\'.$nombreControlador.'Controller';
}else{
  $nombreControlador = '\\App\\Controllers\\'.__CLASSDEFAULT__.'Controller';
}

if($nombreMetodo && method_exists($nombreControlador,$nombreMetodo)){
  $nombreControlador::$nombreMetodo();
}else{
  ($nombreControlador) ? $nombreControlador::index() : '';
}

if(isset($_SESSION['Authorization']) && isset($_SESSION['id'])){
  require_once "view/layout/footer.php";
}
