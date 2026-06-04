<?php
require_once "../conexionBD.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $database = new Conexion();
    $db = $database->conectar();

    $id_telefono = isset($_POST['id_telefono']) ? $_POST['id_telefono'] : null;
    $descripcion = isset($_POST['descripcion']) ? trim($_POST['descripcion']) : null;

    if ($id_telefono && $descripcion) {
        try {
            $db->beginTransaction();
            $sqlInsert = "INSERT INTO telefono_baja (id_telefono, descripcion) VALUES (:id_telefono, :descripcion)";
            $stmtInsert = $db->prepare($sqlInsert);
            $stmtInsert->bindParam(':id_telefono', $id_telefono, PDO::PARAM_INT);
            $stmtInsert->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
            $stmtInsert->execute();

            $sqlUpdate = "UPDATE telefonos SET baja = 1 WHERE id = :id_telefono";
            $stmtUpdate = $db->prepare($sqlUpdate);
            $stmtUpdate->bindParam(':id_telefono', $id_telefono, PDO::PARAM_INT);
            $stmtUpdate->execute();

            $db->commit();

            header("Location: consultarBajas.php?status=exito");
            exit();

        } catch (PDOException $e) {
            if ($db->inTransaction()) {
                $db->rollBack();
            }
            
            header("Location: consultarBajas.php?status=error");
            exit();
        }
    } else {
        header("Location: consultarBajas.php?status=error");
        exit();
    }
}
?>