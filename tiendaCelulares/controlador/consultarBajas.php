<?php
require_once "../conexionBD.php";
$database = new Conexion();
$db = $database->conectar();

// consultamos telefonos disponibles para bajas
$sqlDisponibles = "SELECT t.id as id_telefono, t.imei, m.nombre as marca, mo.nombre as modelo 
                   FROM telefonos t 
                   INNER JOIN marcas m ON t.id_marca = m.id_marca 
                   INNER JOIN modelos mo ON t.id_modelo = mo.id 
                   WHERE t.vendido = 0 AND t.baja = 0";
$stmtDisponibles = $db->prepare($sqlDisponibles);
$stmtDisponibles->execute();
$telefonos_disponibles = $stmtDisponibles->fetchAll(PDO::FETCH_ASSOC);

// consultamos que telefonos ya se dieron de baja
$sqlBajas = "SELECT b.id as id_baja, b.fecha_baja, b.descripcion, t.imei, m.nombre as marca, mo.nombre as modelo 
             FROM telefono_baja b 
             INNER JOIN telefonos t ON b.id_telefono = t.id
             INNER JOIN marcas m ON t.id_marca = m.id_marca
             INNER JOIN modelos mo ON t.id_modelo = mo.id
             ORDER BY b.id DESC";
$stmtBajas = $db->prepare($sqlBajas);
$stmtBajas->execute();
$telefonos_baja = $stmtBajas->fetchAll(PDO::FETCH_ASSOC);

require_once "../vista/bajaTelefono.php";
?>