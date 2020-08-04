<?php
namespace App\Service;

use Database\Mysql\Database,
    App\Models\User,
    PDO,
    PDOException;

class UserService 
{
  private $_bd;

  public function __construct()
  {
    $this->_bd = Database::get();    
  }

  public function login(User $user)
  {
    $result = [];

    try {
      //code
    } catch (\Throwable $th) {
      //throw $th;
    }
  }
}