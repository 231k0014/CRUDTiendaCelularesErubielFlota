<?php
require_once "../conexionBD.php";

$database = new Conexion();
$db = $database->conectar();

$accion = $_POST['accion'];

$id_precio = $_POST['id_precio'];
$id_marca = $_POST['idMarcaSeleccionada'];
$id_modelo = $_POST['idModeloSeleccionada'];
$id_color = $_POST['idColorSeleccionada'];
$precio_inicial = $_POST['precio_inicial'];
$precio_final = $_POST['precio_final'];

try {
    
    if ($accion === 'guardar') {
        $sql = "INSERT INTO precios (id_marca, id_modelo, id_color, precio_inicial, precio_final) 
                VALUES (:marca, :modelo, :color, :p_inicial, :p_final)";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':marca' => $id_marca,
            ':modelo' => $id_modelo,
            ':color' => $id_color,
            ':p_inicial' => $precio_inicial,
            ':p_final' => $precio_final
        ]);
    } 
    // para actualizar
    elseif ($accion === 'actualizar') {
        $sql = "UPDATE precios 
                SET id_marca = :marca, id_modelo = :modelo, id_color = :color, 
                    precio_inicial = :p_inicial, precio_final = :p_final 
                WHERE id = :id_precio"; 
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':marca' => $id_marca,
            ':modelo' => $id_modelo,
            ':color' => $id_color,
            ':p_inicial' => $precio_inicial,
            ':p_final' => $precio_final,
            ':id_precio' => $id_precio
        ]);
    } 
    //para eliminar
    elseif ($accion === 'eliminar') {
        // Para eliminar, solo necesitamos saber el ID
        $sql = "DELETE FROM precios WHERE id = :id_precio";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':id_precio' => $id_precio
        ]);
    }

    
    header("Location: consultarPrecios.php");
    exit();

} catch(PDOException $e) {
    echo "Híjole, hubo un error en la base de datos: " . $e->getMessage();
}
?>