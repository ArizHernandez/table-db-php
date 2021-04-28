<?php
require("../conexion.php");

$db = new DBConnection;
$reservaciones = $db->obtenerDatosDB($_GET["opcion"]); 

echo json_encode($reservaciones);