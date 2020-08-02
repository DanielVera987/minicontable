<?php 
namespace App\Service;

use App\Models\Egreso,
    Database\Mysql\Database,
    PDO,
    PDOException,
    App\Models\Ingreso;
use PDOStatement;

//

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

      $result[] = $sql->fetchAll(PDO::FETCH_CLASS, '\\App\\Models\\Ingreso');
    } catch (PDOException $error) {
      print 'Ocurrio un error al consultar';
    }

    return $result;
  }

  public function create(Ingreso $model) : int
  {
    $result = [];

    try {
      $sql = $this->_db->prepare('INSERT INTO ingresos (user_id, fecha, cliente, concepto, importe, iva, iva_ret, isr_ret, neto,created_at, updated_at) VALUES (:user_id, :fecha, :cliente, :concepto, :importe, :iva, :iva_ret, :isr_ret, :neto, :created_at, :update_at)');

      $sql->execute([
        'user_id' => '1',
        'fecha' => date('Y-m-d'),
        'cliente' => $model->cliente,
        'concepto' => $model->concepto,
        'importe' => $model->importe,
        'iva' => $model->iva,
        'iva_ret' => $model->iva_ret,
        'isr_ret' => $model->isr_ret,
        'neto' => $model->neto,
        'created_at' => date('Y-m-d'),
        'update_at' => date('Y-m-d')
      ]);

      return 1;
    } catch (PDOException $error) {
      return $error->getMessage();
    }
  }

  public function getId(int $id) : Array 
  {
    $result = [];

    return $result;
  }
}