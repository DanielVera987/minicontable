<?php
namespace Database\Mysql;

use PDO;

class Database 
{
  private static $db;

  public static function get()
  {
    if(!self::$db)
    {
      $pdo = new PDO(
        __DB__["HOST"],
        __DB__["USER"],
        __DB__["PASSWORD"]
      );

      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

      self::$db = $pdo;
    }

    return self::$db;
  }
}