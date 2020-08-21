<?php 
namespace App\Service;

use App\Models\Items,
    Database\Mysql\Database,
    PDO,
    PDOException,
    App\Models\Ingreso;
use PDOStatement;

class ItemsService
{
  private $_db;

  public function __construct()
  {
    $this->_db = Database::get();
  }

  public function create(Items $model)
  {
    try {
      if(empty($model)) throw new PDOException("Verifique que sea de tipo Ingreso");
      $sql = $this->_db->prepare('INSERT INTO items (facturaid, tipo, cantidad, descripcion, valorunitario, importe) VALUES (:facturaid, :tipo, :cantidad, :descripcion , :valorunitario, :importe)');

      $sql->execute([
        'facturaid' => $model->facturaid,
        'tipo' => $model->tipo,
        'cantidad' => $model->cantidad,
        'descripcion' => $model->descripcion ,
        'valorunitario' => $model->valorUnitario,
        'importe' => $model->importe,
      ]);
      
      $id = $this->_db->lastInsertId();

      return $id;
    } catch (PDOException $error) {
      return $error->getMessage();
    }
  }
  public function update(Items $model)
  {
    try {
      if(empty($model)) throw new PDOException("Verifique que sea de tipo Ingreso");
      $sql = $this->_db->prepare('UPDATE items SET facturaid=:facturaid, cantidad=:cantidad, descripcion=:descripcion, valorunitario=:valorunitario, importe=:importe where id=:id');

      $sql->execute([
        'id' => $model->id,
        'facturaid' => $model->facturaid,
        'cantidad' => $model->cantidad,
        'descripcion' => $model->descripcion ,
        'valorunitario' => $model->valorUnitario,
        'importe' => $model->importe,
      ]);

      return 1;
    } catch (PDOException $error) {
      return $error->getMessage();
    }
  }

  public function getByIdIngreso($id)
  {
    try {
      if(!$id || $id < 0) throw new PDOException("El valor no es de tipo Integer");
      $sql = $this->_db->prepare('SELECT * FROM items WHERE facturaid = :id');

      $sql->execute(['id' => $id]);
      $obj = $sql->fetchAll(PDO::FETCH_CLASS, '\\App\\Models\\Items');
      $result = json_decode(json_encode($obj), true); 

      if(count($result) == 0){
        $result = [
          'error' => 'no existe items'
        ];
      }

      return $result;
    } catch (PDOException $error) {
      return $error->getMessage();
    }
  }
} 