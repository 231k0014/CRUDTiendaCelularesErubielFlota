<?php
require_once "../conexionBD.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $database = new Conexion();
    $db = $database->conectar();

    $id_telefono = $_POST['id_telefono'];
    $fecha_vendido = $_POST['fecha_vendido'];

    try {
        $db->beginTransaction();

        //realizamos el insert a la tabla de telefonos vendidos
        $sqlInsert = "INSERT INTO telefonos_vendidos (id_telefono, fecha_vendido) 
                      VALUES (:id_telefono, :fecha_vendido)";
        $stmtInsert = $db->prepare($sqlInsert);
        $stmtInsert->bindParam(':id_telefono', $id_telefono);
        $stmtInsert->bindParam(':fecha_vendido', $fecha_vendido);
        $stmtInsert->execute();

        // realizamos el uptade en ta tabla de telefonos en el inventario
        $sqlUpdate = "UPDATE telefonos SET vendido = 1 WHERE id = :id_telefono";
        $stmtUpdate = $db->prepare($sqlUpdate);
        $stmtUpdate->bindParam(':id_telefono', $id_telefono);
        $stmtUpdate->execute();

        // si no hay problema se realizan esos cambios
        $db->commit();

        header("Location: consultarVentas.php?status=exito");
        exit();

    } catch (PDOException $e) {
        $db->rollBack();
        
        header("Location: consultarVentas.php?status=error");
        exit();
    }
}
?>