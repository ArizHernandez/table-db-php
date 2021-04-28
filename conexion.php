<?php 
class DBConnection{
  
  private $db;

  public function __construct(){
    $this->db = new PDO('mysql:host=localhost;dbname=appsalon','root','');
  }

  public function obtenerDatosDB($opcion){
    $query = "SELECT {$opcion} FROM reservaciones";
    return $this->db->query($query)->fetchAll();
  }
}
