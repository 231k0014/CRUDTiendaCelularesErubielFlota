<?php

require_once "../conexionBD.php";

$database = new Conexion();
$db = $database->conectar();

$id_marca = $_POST['idMarcaSeleccionada'];
$id_modelo = $_POST['idModeloSeleccionada'];
$id_color = $_POST['idColorSeleccionada'];
$precio_inicial = $_POST['precio_inicial'];
$precio_final = $_POST['precio_final'];

try {

    $sql = "INSERT INTO precios (id_marca, id_modelo, id_color, precio_inicial, precio_final)
            VALUES (:id_marca, :id_modelo, :id_color, :precio_inicial, :precio_final)";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(':id_marca', $id_marca);
    $stmt->bindParam(':id_modelo', $id_modelo);
    $stmt->bindParam(':id_color', $id_color);
    $stmt->bindParam(':precio_inicial', $precio_inicial);
    $stmt->bindParam(':precio_final', $precio_final);

    $stmt->execute();

    echo "Registro guardado correctamente";

} catch(PDOException $e){
    echo "Error al guardar: " . $e->getMessage();
}

?>
