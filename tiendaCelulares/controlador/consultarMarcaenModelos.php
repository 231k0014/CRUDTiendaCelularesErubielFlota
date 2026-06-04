<?php 
require_once "../conexionBD.php";

$database = new Conexion();
$db = $database->conectar();


// consulta para marcas
$sql = "SELECT * FROM marcas";
$stmt = $db->prepare($sql);
$stmt->execute();
$marcas = $stmt->fetchAll(PDO::FETCH_ASSOC);


// consulta para modelos
$sql2 = "SELECT * from modelos";

$stmt2 = $db->prepare($sql2);
$stmt2->execute();
$modelos = $stmt2->fetchAll(PDO::FETCH_ASSOC);


// con este codigo cargamos la vista
require_once "../vista/registrarModelo.php";
?>
