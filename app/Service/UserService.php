<?php
namespace App\Service;

use Database\Mysql\Database,
    App\Models\User,
    PDO,
    PDOException;
use Exception;

class UserService 
{
  private $_bd;

  public function __construct()
  {
    $this->_bd = Database::get();    
  }

  public function login(User $user)
  {
    try {
      $sql = $this->_bd->prepare('SELECT * FROM users WHERE email = :email');
      $sql->execute([
        "email" => $user->email
      ]);
      $result = $sql->fetchAll(PDO::FETCH_CLASS, 'App\\Models\\User');

      $hash = $result[0]->password;
      
      if (password_verify($user->password, $hash)) {
        return $result;
      } else {
        throw new Exception("Contraseña no valida");
      }
    } catch (Exception $th) {
      return $th->getMessage();
    }
  }

  public function register(User $user)
  {
    try {
      $sql = $this->_bd->prepare('INSERT INTO users (nombre, apellido, email, password, created_at, updated_at) VALUE (:nombre, :apellido, :email, :password, :created_at, :updated_at)');

      $pwd = password_hash($user->password, PASSWORD_DEFAULT);

      $sql->execute([
        "nombre" => $user->nombre,
        "apellido" => $user->apellido,
        "email" => $user->email,
        "password" => $pwd,
        "created_at" => date('Y-m-d'),
        "updated_at" => date('Y-m-d')
      ]);
      
      $id = $this->_bd->lastInsertId();;

      return $id;
    } catch (PDOException $th) {
      return $th->getMessage();
    }
  }

  public function update(User $user)
  {
    try {
      $sql = $this->_bd->prepare('UPDATE users SET nombre = :nombre, apellido = :apellido, email = :email, password = :password, updated_at = :updated_at');

      $pwd = password_hash($user->password, PASSWORD_DEFAULT);

      $sql->execute([
        "nombre" => $user->nombre,
        "apellido" => $user->apellido,
        "email" => $user->email,
        "password" => $pwd,
        "updated_at" => date('Y-m-d')
      ]);

      return 1;
    } catch (Exception $th) {
      return $th->getMessage();
    }
  }
}