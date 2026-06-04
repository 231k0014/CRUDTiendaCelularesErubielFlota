<?php 
/** @var array $marcas */
/** @var array $modelos */
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Modelo</title>

    <!-- Fuente -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #e3f0ff, #f7fbff);
            margin: 0;
            padding: 0;
        }

        .header {
            position: relative; /* Agregado para poder mover el botón de regresar */
            background: #2b6cb0;
            color: white;
            padding: 18px;
            text-align: center;
            font-size: 24px;
            font-weight: 600;
            letter-spacing: 1px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        /* ESTILOS DEL BOTÓN DE REGRESAR */
        .btn-regresar {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            background: #e3f0ff;
            color: #2b6cb0;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.25s ease;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .btn-regresar:hover {
            background: #ffffff;
            transform: translateY(-50%) scale(1.05);
        }

        .main-container {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin: 40px;
            flex-wrap: wrap;
        }

        .container {
            background: #ffffff;
            width: 420px;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .title {
            font-size: 20px;
            font-weight: 600;
            color: #1a365d;
            margin-bottom: 20px;
            text-align: center;
        }

        h2 {
            font-size: 15px;
            font-weight: 400;
            color: #2c5282;
            margin-bottom: 10px;
        }

        input, select {
            width: 95%;
            padding: 8px;
            border-radius: 6px;
            border: 1px solid #cbd5e0;
            outline: none;
            font-family: 'Poppins', sans-serif;
            margin-top: 5px;
        }

        input:focus, select:focus {
            border-color: #3182ce;
            box-shadow: 0 0 5px rgba(49,130,206,0.3);
        }

        button {
            background: #3182ce;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.25s ease;
        }

        button:hover {
            background: #2b6cb0;
            transform: translateY(-2px);
            box-shadow: 0 5px 12px rgba(0,0,0,0.15);
        }

        /* Estilo para el botón de borrar */
        .btn-eliminar {
            background: #e53e3e;
            padding: 6px 12px;
            font-size: 12px;
        }

        .btn-eliminar:hover {
            background: #c53030;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        th {
            background: #3182ce;
            color: white;
            padding: 10px;
        }

        td {
            padding: 8px;
            text-align: center;
            border-bottom: 1px solid #e2e8f0;
        }

        tr:hover {
            background: #f1f5f9;
        }

        .mensaje {
            text-align: center;
            color: #718096;
        }
    </style>
</head>

<body>

    <div class="header">
        <!-- BOTÓN PARA REGRESAR AL INDEX -->
        <a href="../index.php" class="btn-regresar">⬅ Regresar</a>
        Sistema Gestor de Celulares
    </div>

    <div class="main-container">

        <!-- IZQUIERDA: FORMULARIO -->
        <div class="container">
            <div class="title">Registrar Modelo</div>

            <form action="../controlador/guardarModelo.php" method="POST">

                <h2>Nombre del modelo</h2>
                <input type="text" name="nombreModelo" id="nombreModelo" required>

                <h2>Selecciona la marca</h2>
                <select name="idMarcaSeleccionada" id="idMarcaSeleccionada" required>
                    <option value="">--Seleccione--</option>

                    <?php foreach ($marcas as $row): ?>
                        <option value="<?= $row['id_marca'] ?>">
                            <?= $row['nombre'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <br><br>

                <div style="text-align:center;">
                    <button type="submit">Guardar</button>
                </div>

            </form>
        </div>

        <!-- DERECHA: TABLA -->
        <div class="container">
            <div class="title">Modelos registrados</div>

            <?php if(count($modelos) > 0): ?>

            <table>
                
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Acciones</th> <!-- Nueva columna -->
                </tr>

                <?php foreach($modelos as $fila): ?>
                <tr>
                    <td><?php echo $fila['id']; ?></td>
                    <td><?php echo $fila['nombre']; ?></td>
                    <td><?php echo $fila['id_marca']; ?></td>
                    <td>
                        <form action="../controlador/eliminarModelo.php" method="POST" style="margin: 0;">
                            <input type="hidden" name="id_modelo" value="<?php echo $fila['id']; ?>">
                            <button type="submit" class="btn-eliminar" onclick="return confirm('¿Seguro que quieres borrar este modelo?');">Borrar</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>

            </table>

            <?php else: ?>

            <p class="mensaje">No se encontraron resultados.</p>

            <?php endif; ?>
        </div>

    </div>




    <script>
        // Leemos la URL actual
        const urlParams = new URLSearchParams(window.location.search);
        const status = urlParams.get('status');

        if (status === 'exito') {
            // Mostramos la alerta emergente nativa del navegador
            alert("Modelo guardado con éxito.");
            
            // Este truco limpia la URL quitando el "?status=exito" 
            // para que si el usuario recarga la página, no le vuelva a salir el mensaje
            window.history.replaceState(null, null, window.location.pathname);
        } else if (status === 'error') {
            alert("Ocurrió un error al guardar el modelo.");
            window.history.replaceState(null, null, window.location.pathname);
        }
    </script>

</body>
</html>