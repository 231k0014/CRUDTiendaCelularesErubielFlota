<?php
require_once "../conexionBD.php";

$database = new Conexion();
$db = $database->conectar();

$id_modelo = $_POST['id_modelo'];

try {
    $sql = "DELETE FROM modelos WHERE id = :id_modelo";
    $stmt = $db->prepare($sql);
    
    $stmt->execute([
        ':id_modelo' => $id_modelo
    ]);

    header("Location: consultarMarcaenModelos.php");
    exit();

} catch(PDOException $e){
    echo "Error al eliminar el modelo: " . $e->getMessage();
}
?>