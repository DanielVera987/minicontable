<?php 
namespace App\Service;

use App\Models\Egreso,
    Database\Mysql\Database,
    PDO,
    PDOException;
use App\Models\Ingreso;

class IngresosService 
{

  private $_db;

  public function __construct()
  {
    $this->_db = Database::get();
  }

  public function all() : Array
  {
    $result = [];

    try {
      $sql =  $this->_db->prepare("select * from ingresos");
      $sql->execute();

      $result[] = $sql->fetchAll(PDO::FETCH_CLASS, '\\App\\Model\\Ingreso');
    } catch (PDOException $error) {
      print 'Ocurrio un error al consultar';
    }

    return $result;
  }

  public function create(Ingreso $model) : void
  {
    
  }
}