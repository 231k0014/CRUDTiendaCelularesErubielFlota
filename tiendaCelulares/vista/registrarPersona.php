<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Registro de Persona</title>
    </head>

    <body>

        <h2>Registro de Persona</h2>

        <form action="../controlador/guardarPersona.php" method="POST">

            <label>Nombre:</label><br>
            <input type="text" name="nombre" required><br><br>

            <label>Apellido Paterno:</label><br>
            <input type="text" name="apellido_paterno" required><br><br>

            <label>Apellido Materno:</label><br>
            <input type="text" name="apellido_materno" required><br><br>

            <button type="submit">Guardar</button>

        </form>

    </body>
</html>