<?php 
/** @var array $resultados */
/** @var array $modelos */
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Resultados de búsqueda</title>
    </head>

    <body>

        <h2>Resultados encontrados</h2>

        <?php if(count($resultados) > 0): ?>

        <table border="0">

        <tr>
            <th>ID</th>
            <th>Nombre</th>
        </tr>

        <?php foreach($resultados as $fila): ?>

        <tr>
            <td><?php echo $fila['id_marca']; ?></td>
            <td><?php echo $fila['nombre']; ?></td>
        </tr>

        <?php endforeach; ?>

        </table>

        <?php else: ?>

        <p>No se encontraron resultados.</p>

        <?php endif; ?>

    </body>
</html>