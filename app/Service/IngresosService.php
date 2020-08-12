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
    try {
      $sql =  $this->_db->prepare("select * from ingresos");
      $sql->execute();

      $obj = $sql->fetchAll(PDO::FETCH_CLASS, '\\App\\Models\\Ingreso');
      $result = json_decode(json_encode($obj), true); 
      
      if(count($result) == 0){
        $result = [
          'error' => 'no hay egresos'
        ];
      }

      return $result;
    } catch (PDOException $error) {
      return $error->getMessage(); 
    }
  }

  public function create(Ingreso $model) : int
  {
    try {
      if(empty($model)) throw new PDOException("Verifique que sea de tipo Egreso");
      $sql = $this->_db->prepare('INSERT INTO ingresos (user_id, fecha, cliente, concepto, importe, iva, iva_ret, isr_ret, neto,created_at, updated_at) VALUES (:user_id, :fecha, :cliente, :concepto, :importe, :iva, :iva_ret, :isr_ret, :neto, :created_at, :update_at)');

      $sql->execute([
        'user_id' => $model->user_id,
        'fecha' => $model->fecha,
        'cliente' => $model->cliente,
        'concepto' => $model->concepto,
        'importe' => $model->importe,
        'iva' => $model->iva,
        'iva_ret' => $model->iva_ret,
        'isr_ret' => $model->isr_ret,
        'neto' => $model->neto,
        'created_at' => $model->fecha,
        'update_at' => $model->fecha
      ]);
      
      $id = $this->_db->lastInsertId();

      return $id;
    } catch (PDOException $error) {
      return $error->getMessage();
    }
  }

  public function getId(int $id) : Array 
  {
    try {
      if(!$id || $id < 0) throw new PDOException("El valor no es de tipo Integer");
      $sql = $this->_db->prepare('SELECT * FROM ingresos WHERE id = :id');

      $sql->execute(['id' => $id]);
      $obj = $sql->fetchAll(PDO::FETCH_CLASS, '\\App\\Models\\Ingreso');
      $result = json_decode(json_encode($obj), true); 

      if(count($result) == 0){
        $result = [
          'error' => 'no existe el egreso'
        ];
      }

      return $result;
    } catch (PDOException $error) {
      return $error->getMessage();
    }
  }

  public function update(Ingreso $model)
  {
    try {
      if(empty($model)) throw new PDOException("Verifique que sea de tipo Egreso");
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
      if(!$id || $id < 0) throw new PDOException("El valor no es de tipo Integer");

      $sql = $this->_db->prepare('DELETE FROM ingresos WHERE id = :id');
    
      $sql->execute(['id' => $id]);

      return 1;
    } catch (PDOException $error) {
      return $error->getMessage();
    }
  }
}