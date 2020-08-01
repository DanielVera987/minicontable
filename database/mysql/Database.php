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
        __CONFIG__["DB"]["HOST"],
        __CONFIG__["DB"]["USER"],
        __CONFIG__["DB"]["PASSWORD"]
      );

      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

      self::$db = $pdo;
    }

    return self::$db;
  }
}