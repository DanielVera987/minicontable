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
} 