<?php
require_once "../conexionBD.php";

$database = new Conexion();
$db = $database->conectar();

$accion = isset($_POST['accion']) ? $_POST['accion'] : '';

$id_telefono = isset($_POST['id_telefono']) ? $_POST['id_telefono'] : ''; 
$imei = isset($_POST['imei']) ? $_POST['imei'] : '';
$id_marca = isset($_POST['id_marca']) ? $_POST['id_marca'] : '';
$id_modelo = isset($_POST['id_modelo']) ? $_POST['id_modelo'] : '';
$id_color = isset($_POST['id_color']) ? $_POST['id_color'] : '';
$id_precio = isset($_POST['id_precio']) ? $_POST['id_precio'] : '';
$fecha_registro = isset($_POST['fecha_registro']) ? $_POST['fecha_registro'] : '';
$baja = isset($_POST['baja']) ? $_POST['baja'] : 0;
$vendido = isset($_POST['vendido']) ? $_POST['vendido'] : 0;

try {
    $db->beginTransaction();

    if ($accion === 'guardar') {
        $sql = "INSERT INTO telefonos (imei, id_marca, id_modelo, id_color, id_precio, fecha_registro) 
                VALUES (:imei, :marca, :modelo, :color, :precio, :fecha)";
        
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':imei' => $imei,
            ':marca' => $id_marca,
            ':modelo' => $id_modelo,
            ':color' => $id_color,
            ':precio' => $id_precio,
            ':fecha' => $fecha_registro
        ]);

    } elseif ($accion === 'actualizar') {
        $sql = "UPDATE telefonos 
                SET imei = :imei, id_marca = :marca, id_modelo = :modelo, id_color = :color, 
                    id_precio = :precio, fecha_registro = :fecha, baja = :baja, vendido = :vendido
                WHERE id = :id_telefono";
        
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':imei' => $imei,
            ':marca' => $id_marca,
            ':modelo' => $id_modelo,
            ':color' => $id_color,
            ':precio' => $id_precio,
            ':fecha' => $fecha_registro,
            ':baja' => $baja,
            ':vendido' => $vendido,
            ':id_telefono' => $id_telefono
        ]);

    } elseif ($accion === 'eliminar') {
        $sql = "DELETE FROM telefonos WHERE id = :id_telefono";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':id_telefono' => $id_telefono
        ]);
    }

    $db->commit();

    header("Location: consultarTelefono.php?status=exito");
    exit();

} catch(PDOException $e) {
    if ($db->inTransaction()) {
        $db->rollBack();
    }
    
    header("Location: consultarTelefono.php?status=error");
    exit();
}
?>