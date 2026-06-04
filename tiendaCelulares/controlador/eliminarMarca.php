<?php
require_once "../conexionBD.php";

$database = new Conexion();
$db = $database->conectar();

$id_marca = $_POST['id_marca'];

try {
    $sql = "DELETE FROM marcas WHERE id_marca = :id_marca";
    $stmt = $db->prepare($sql);
    
    $stmt->execute([
        ':id_marca' => $id_marca
    ]);

    header("Location: consultarMarca.php");
    exit();

} catch(PDOException $e){
    echo "Error al eliminar: " . $e->getMessage();
}
?>