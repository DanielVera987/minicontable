<?php
namespace App\Controllers;

use App\Models\User,
    App\Service\UserService;
use Exception;

class UserController {

  public static function index()
  {
    if(!isset($_SESSION['Authorization']) && !isset($_SESSION['id'])){
      require_once "view/auth/auth.php";
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
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)) throw new Exception("Debe ser un correo electronico");

      $user = new User;
      $user->email = $email;
      $user->password = $password;
      $login = new UserService;
      $verificar = $login->login($user);


    } catch (Exception $th) {
      echo $th->getMessage();
    }
    
  }

  public static function register()
  {
    session_destroy();
    require_once "view/auth/register.php";
  }

  public static function posRegister()
  {
    try {
      $nombre = ($_POST['nombre']) ? $_POST['nombre'] : false;
      $apellido = ($_POST['apellido']) ? $_POST['apellido'] : false;
      $email = ($_POST['email']) ? $_POST['email'] : false;
      $password = ($_POST['password']) ? $_POST['password'] : false;

      if(!$email || !$password || !$nombre || !$apellido) throw new Exception("Hay algo mal con los datos");
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)) throw new Exception("Debe ser un correo electronico");

      $user = new User;
      $user->nombre = $nombre;
      $user->apellido = $apellido;
      $user->email = $email;
      $user->password = $password;
      $newUser = new UserService;

      $respuesta = $newUser->register($user);

      if(!$respuesta) throw new Exception("Fallo al registrarse");

      if(is_numeric($respuesta))
      {
        $_SESSION["Authorization"] = true;
        $_SESSION['id'] = $respuesta; 

        header("Location: " . __URL__ . 'dashboard');
      }
      
      header("Location: " . __URL__ . 'user/register');
    } catch (Exception $th) {
      $_SESSION['error'] = $th->getMessage();
    }
  }


}