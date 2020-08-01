<?php declare(strict_types=1);
require_once 'vendor/autoload.php';
require_once "config.php";

if($_GET["accion"])
{
  if(file_exists('Controllers/'.$_GET['accion'].".php"))
  {
    
  }
}

