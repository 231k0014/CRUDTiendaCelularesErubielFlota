<?php

require_once "../conexionBD.php";

$database = new Conexion();
$db = $database->conectar();

$nombre = $_POST['nombre'];
$apellido_paterno = $_POST['apellido_paterno'];
$apellido_materno = $_POST['apellido_materno'];



try {

    $sql = "INSERT INTO tc_personal (nombres, a_paterno, a_materno, activo)
            VALUES (:nombres, :apellido_paterno, :apellido_materno, :activo)";

    $stmt = $db->prepare($sql);

    $activo=1;

    $stmt->bindParam(':nombres', $nombre);
    $stmt->bindParam(':apellido_paterno', $apellido_paterno);
    $stmt->bindParam(':apellido_materno', $apellido_materno);
    $stmt->bindParam(':activo', $activo);

    $stmt->execute();

    echo "Registro guardado correctamente";

} catch(PDOException $e){

    echo "Error al guardar: " . $e->getMessage();
}

?>