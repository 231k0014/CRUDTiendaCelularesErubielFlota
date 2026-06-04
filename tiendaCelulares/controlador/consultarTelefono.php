<?php
require_once "../conexionBD.php";

$database = new Conexion();
$db = $database->conectar();

// consulta marcas para el select
$sqlMarcas = "SELECT * FROM marcas";
$stmt = $db->prepare($sqlMarcas);
$stmt->execute();
$marcas = $stmt->fetchAll(PDO::FETCH_ASSOC);

// consulta modelos para el select
$sqlModelos = "SELECT * FROM modelos";
$stmt = $db->prepare($sqlModelos);
$stmt->execute();
$modelos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// consulta colores para el select
$sqlColores = "SELECT * FROM colores";
$stmt = $db->prepare($sqlColores);
$stmt->execute();
$colores = $stmt->fetchAll(PDO::FETCH_ASSOC);

// consulta precios para el select
$sqlPrecios = "SELECT * FROM precios";
$stmt = $db->prepare($sqlPrecios);
$stmt->execute();
$precios = $stmt->fetchAll(PDO::FETCH_ASSOC);

// consulta inventario de teléfonos 
$sqlTelefonos = "SELECT 
            telefonos.id AS id_telefono, 
            telefonos.imei, 
            telefonos.id_marca, 
            telefonos.id_modelo, 
            telefonos.id_color, 
            telefonos.id_precio, 
            telefonos.fecha_registro,
            telefonos.vendido,       
            telefonos.baja,
            marcas.nombre AS nombre_marca, 
            modelos.nombre AS nombre_modelo, 
            colores.nombre AS nombre_color,
            precios.precio_final
        FROM telefonos
        INNER JOIN marcas ON telefonos.id_marca = marcas.id_marca
        INNER JOIN modelos ON telefonos.id_modelo = modelos.id
        INNER JOIN colores ON telefonos.id_color = colores.id
        INNER JOIN precios ON telefonos.id_precio = precios.id
        ";

$stmt = $db->prepare($sqlTelefonos);
$stmt->execute();
$telefonos_registrados = $stmt->fetchAll(PDO::FETCH_ASSOC);

require_once "../vista/registrarTelefono.php";
?>