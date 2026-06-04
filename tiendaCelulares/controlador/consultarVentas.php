<?php
require_once "../conexionBD.php";
$database = new Conexion();
$db = $database->conectar();

// consultamos telefonos disponibles 
$sqlDisponibles = "SELECT t.id as id_telefono, t.imei, m.nombre as marca, mo.nombre as modelo 
                   FROM telefonos t 
                   INNER JOIN marcas m ON t.id_marca = m.id_marca 
                   INNER JOIN modelos mo ON t.id_modelo = mo.id 
                   WHERE t.vendido = 0 AND t.baja = 0";
$stmtDisponibles = $db->prepare($sqlDisponibles);
$stmtDisponibles->execute();
$telefonos_disponibles = $stmtDisponibles->fetchAll(PDO::FETCH_ASSOC);

// 2. hacemos consulta para las ventas realizadas
$sqlVentas = "SELECT tv.id as id_venta, tv.fecha_vendido, t.imei, m.nombre as marca, mo.nombre as modelo, p.precio_final 
              FROM telefonos_vendidos tv 
              INNER JOIN telefonos t ON tv.id_telefono = t.id
              INNER JOIN marcas m ON t.id_marca = m.id_marca
              INNER JOIN modelos mo ON t.id_modelo = mo.id
              INNER JOIN precios p ON t.id_precio = p.id
              ORDER BY tv.fecha_vendido DESC";
$stmtVentas = $db->prepare($sqlVentas);
$stmtVentas->execute();
$ventas_registradas = $stmtVentas->fetchAll(PDO::FETCH_ASSOC);

require_once "../vista/venderTelefono.php";
?>