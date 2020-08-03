<?php
namespace App\Service;

use Database\Mysql\Database,
    App\Models\Egreso,
    PDO,
    PDOException;

class EgresosService 
{
  private $_bd;

  public function __construct()
  {
    $this->_bd = Database::get();
  }

  public function all() : Array
  {
    $result = [];

    try {
      $sql = $this->_bd->prepare('SELECT * FROM egresos');
      $sql->execute();

      $result = $sql->fetchAll(PDO::FETCH_CLASS, '\\App\\Models\\Egreso');

      return $result;
    } catch (PDOException $error) {
      return $error->getMessage();
    }
  }

  public function create(Egreso $model)
  {
    try {
      $sql = $this->_bd->prepare('INSERT INTO egresos (user_id, fecha, proveedor, ieps, importe, iva, total, created_at, updated_at) VALUE (:user_id, :fecha, :proveedor, :ieps, :importe, :iva, :total, :created_at, :updated_at)');

      $sql->execute([
        'user_id' => $model->user_id,
        'fecha' => $model->fecha,
        'proveedor' => $model->proveedor,
        'ieps' => $model->ieps,
        'importe' => $model->importe,
        'iva' => $model->iva,
        'total' => $model->total,
        'created_at' => date('Y-m-d'),
        'updated_at' => date('Y-m-d')
      ]);

      return 1;
    } catch (PDOException $error) {
      return $error->getMessage();
    }
  }

  public function getId(int $id)
  {
    $result = [];

    try {
      $sql = $this->_bd->prepare("SELECT * FROM egresos WHERE id = :id");
      $sql->execute(["id" => $id]);

      $result = $sql->fetchAll(PDO::FETCH_CLASS, "\\App\\Models\\Egreso");

      return $result;
    } catch (PDOException $error) {
      return $error->getMessage();
    }
  }

  public function update(Egreso $model, int $id)
  {
    try {
      $sql = $this->_bd->prepare("UPDATE egresos SET fecha = :fecha, proveedor = :proveedor, ieps = :ieps, importe = :importe, iva = :iva, total = :total, updated_at = :updated_at");

      $sql->execute([
        'fecha' => $model->fecha,
        'proveedor' => $model->proveedor,
        'ieps' => $model->ieps,
        'importe' => $model->importe,
        'iva' => $model->iva,
        'total' => $model->total,
        'updated_at' => date('Y-m-d')
      ]);

      return 1;
    } catch (PDOException $error) {
      return $error;
    }
  }

  public function destroy(int $id)
  {
    try {
      $sql = $this->_bd->prepare("DELETE FROM egresos WHERE id = :id");
      $sql->execute(["id" => $id]);
    } catch (PDOException $error) {
      return $error;
    }
  }
}
