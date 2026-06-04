<?php

require_once "../conexionBD.php";

$database = new Conexion();
$db = $database->conectar();

$nombre = $_POST['nombre'];



// codigo para insertar datos en marcas
try {

    $sql = "INSERT INTO marcas (nombre)
            VALUES (:nombre)";

    $stmt = $db->prepare($sql);

    $activo=1;

    $stmt->bindParam(':nombre', $nombre);

    $stmt->execute();

    header("Location: ../controlador/consultarMarca.php?status=exito");
    exit();

} catch(PDOException $e){

    header("Location: ../controlador/consultarMarca.php?status=exito");
    exit();
}


?>