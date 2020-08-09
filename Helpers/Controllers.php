<?php 
namespace Helpers;

class Controllers{

  public static function auth()
  {
    if(!isset($_SESSION['Authorization']) && !isset($_SESSION['id'])){
      header("Location: " . __URL__);
      exit;
    }
  }
}