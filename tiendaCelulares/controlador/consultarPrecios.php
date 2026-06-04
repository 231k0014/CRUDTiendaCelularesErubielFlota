<?php
require_once "../conexionBD.php";

$database = new Conexion();
$db = $database->conectar();


$sql = "SELECT * FROM marcas";

$stmt = $db->prepare($sql);
//$stmt->bindParam(':nombre', $nombre);
$stmt->execute();

$marcas = $stmt->fetchAll(PDO::FETCH_ASSOC);


$sqlModelos = " SELECT * FROM modelos";
$stmt = $db->prepare($sqlModelos);
//$stmt->bindParam(':nombre', $nombre);
$stmt->execute();

$modelos = $stmt->fetchAll(PDO::FETCH_ASSOC);


$sqlColores = " SELECT * FROM colores";
$stmt = $db->prepare($sqlColores);
//$stmt->bindParam(':nombre', $nombre);
$stmt->execute();

$colores = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sqlPrecios = " SELECT * FROM precios";
$stmt = $db->prepare($sqlPrecios);
//$stmt->bindParam(':nombre', $nombre);
$stmt->execute();

$precios = $stmt->fetchAll(PDO::FETCH_ASSOC);


$sqlPreciosConNombre = "SELECT 
            precios.id AS id_precio, 
            precios.id_marca, 
            precios.id_modelo, 
            precios.id_color, 
            precios.precio_inicial, 
            precios.precio_final,
            marcas.nombre AS nombre_marca, 
            modelos.nombre AS nombre_modelo, 
            colores.nombre AS nombre_color
        FROM precios
        INNER JOIN marcas ON precios.id_marca = marcas.id_marca
        INNER JOIN modelos ON precios.id_modelo = modelos.id
        INNER JOIN colores ON precios.id_color = colores.id";

$stmt = $db->prepare($sqlPreciosConNombre);
$stmt->execute();

// Le pongo $precios_registrados para que conecte con la vista que armamos
$precios_registrados = $stmt->fetchAll(PDO::FETCH_ASSOC);




require_once "../vista/registrarPrecios.php";
?>