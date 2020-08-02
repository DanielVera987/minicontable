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

    try {
      $sql = $this->_db->prepare('SELECT * FROM ingresos WHERE id = :id');

      $sql->execute(['id' => $id]);
      $result = $sql->fetchAll(PDO::FETCH_CLASS, '\\App\\Models\\Ingreso');

      return $result;
    } catch (PDOException $error) {
      return $error->getMessage();
    }
  }

  public function update(Ingreso $model)
  {
    try {
      $sql = $this->_db->prepare('UPDATE ingresos SET fecha = :fecha, cliente = :cliente, concepto = :concepto, importe = :importe, iva = :iva, iva_ret = :iva_ret, isr_ret = :isr_ret, neto = :neto where id = :id');

      $sql->execute([
        'fecha' => $model->fecha,
        'cliente' => $model->cliente,
        'concepto' => $model->concepto,
        'importe' => $model->importe,
        'iva' => $model->iva,
        'iva_ret' => $model->iva_ret,
        'isr_ret' => $model->isr_ret,
        'neto' => $model->neto,
        'id' => $model->id
      ]);

      return 1;
    } catch (PDOException $error) {
      return $error->getMessage();
    }
  }

  public function destroy(int $id)
  {
    try {
      $sql = $this->_db->prepare('DELETE FROM ingresos WHERE id = :id');
    
      $sql->execute(['id' => $id]);

      return 1;
    } catch (PDOException $error) {
      return $error->getMessage();
    }
  }
}