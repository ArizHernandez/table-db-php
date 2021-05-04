<?php
require("../conexion.php");

$db = new DBConnection;
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$hora = $_POST["hora"];
$fecha = $_POST["fecha"];
$servicio = $_POST["servicio"];

try{
  $db->createReservaDB($nombre, $apellido, $hora, $fecha, $servicio);
  echo "Ingresado correctamente";
  header("Location: ../index.php");
  exit();
} catch(PDOException $e) {
  echo $e->getMessage();
}