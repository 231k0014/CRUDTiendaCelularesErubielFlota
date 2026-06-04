<?php

require_once "../conexionBD.php";

$database = new Conexion();
$db = $database->conectar();

$nombre = $_POST['nombreModelo'];
$id_marca = $_POST['idMarcaSeleccionada'];


try {

    $sql = "INSERT INTO modelos (nombre, id_marca)
            VALUES (:nombre, :id_marca)";

    $stmt = $db->prepare($sql);

    $activo=1;

    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':id_marca', $id_marca);

    $stmt->execute();

    header("Location: ../controlador/consultarMarcaenModelos.php?status=exito");
    exit();

} catch(PDOException $e){
    header("Location: ../controlador/consultarMarcaenModelos.php?status=error");
    exit();
}

?>