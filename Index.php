<?php 
/* 
Autor: Daniel Vera
Contacto: danielveraangulo703@gmail.com 
Fecha: 30/07/2020
*/

declare(strict_types=1);
require_once 'vendor/autoload.php';
require_once "config.php";

if(isset($_GET['c']))
{
  $nombre_controlador = $_GET['c'].'Controller';
}else
{
  echo "La pagina que buscas no existe1";
  exit();
}
  
if(class_exists($nombre_controlador))
{
  $controlador = new $nombre_controlador();
  
  if(isset($_GET['action']) && method_exists($controlador, $_GET['action']))
  {
    $action = $_GET['action'];
    $controlador->$action();
  }else
  {
    echo "La pagina que buscas no existe2";
  }
}
else
{
  echo "La pagina que buscas no existe3";
}