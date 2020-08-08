<?php
namespace App\Controllers;

use App\Models\User,
    App\Service\UserService;
use Exception;

class UserController {

  public static function index()
  {
    if(!isset($_SESSION['Authorization']) && !isset($_SESSION['id'])){
      require_once "view/auth.php";
    }else{
      header("Location: " . __URL__ . 'dashboard');
    }
  }

  public static function login()
  {
    try {
      $email = ($_POST['email']) ? $_POST['email'] : false;
      $password = ($_POST['password']) ? $_POST['password'] : false;

      if(!$email || !$password) throw new Exception("Error al autenticarse");

      $user = new User;
      $user->email = $email;
      $user->password = $password;
      $login = new UserService;
      $verificar = $login->login($user);


    } catch (Exception $th) {
      //throw $th;
    }
    
  }
}