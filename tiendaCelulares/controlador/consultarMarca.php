<?php
require_once "../conexionBD.php";

$database = new Conexion();
$db = $database->conectar();


$sql = "SELECT * FROM marcas";

$stmt = $db->prepare($sql);
//$stmt->bindParam(':nombre', $nombre);
$stmt->execute();

$marcas = $stmt->fetchAll(PDO::FETCH_ASSOC);

require_once "../vista/registrarMarca.php";
?>