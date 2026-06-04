<?php
require_once "../conexionBD.php";

$database = new Conexion();
$db = $database->conectar();

$id_color = $_POST['id_color'];

try {
    $sql = "DELETE FROM colores WHERE id = :id_color";
    $stmt = $db->prepare($sql);
    
    $stmt->execute([
        ':id_color' => $id_color
    ]);

    header("Location: consultarColor.php");
    exit();

} catch(PDOException $e){
    echo "Error al eliminar el color: " . $e->getMessage();
}
?>