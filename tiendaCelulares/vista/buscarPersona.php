<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Buscar Persona</title>
    </head>

    <body>

        <h2>Buscar Persona</h2>

        <form action="controllers/consultar_persona.php" method="GET">

            <label>Nombre:</label><br>
            <input type="text" name="nombre" required>

            <br><br>

            <button type="submit">Buscar</button>

        </form>

    </body>
</html>