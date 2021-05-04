<?php 
class DBConnection{
  
  private $user="usuarioAR";
  private $password="root";
  private $dbName="appsalon";
  private $dbServer="127.0.0.1";
  private $db;

  public function __construct(){
    try {
      $this->db = new PDO("sqlsrv:server=$this->dbServer;database=$this->dbName", $this->user, $this->password);
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  public function obtenerDatosDB($opcion){
    $query = "SELECT {$opcion} FROM reservaciones";
    return $this->db->query($query)->fetchAll();
  }

  public function createReservaDB($nombre, $apellido, $hora, $fecha, $servicios){
    $query = "INSERT INTO reservaciones (nombre, apellido, hora, fecha, servicios) VALUES ('{$nombre}', '{$apellido}', '{$hora}', '{$fecha}', '{$servicios}');";
    return $this->db->query($query);
  }
}