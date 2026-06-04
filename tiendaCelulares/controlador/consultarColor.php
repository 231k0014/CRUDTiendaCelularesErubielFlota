<?php
require_once "../conexionBD.php";

$database = new Conexion();
$db = $database->conectar();


$sql = "SELECT * FROM colores";

$stmt = $db->prepare($sql);
//$stmt->bindParam(':nombre', $nombre);
$stmt->execute();

$colores = $stmt->fetchAll(PDO::FETCH_ASSOC);

require_once "../vista/registrarColor.php";
?>