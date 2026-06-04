<?php 
/** @var array $marcas */
/** @var array $modelos */
/** @var array $colores */
/** @var array $precios_registrados */
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de precios a teléfonos</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #e3f0ff, #f7fbff);
            margin: 0;
            padding: 0;
        }

        .header {
            position: relative; 
            background: #2b6cb0;
            color: white;
            padding: 18px;
            text-align: center;
            font-size: 24px;
            font-weight: 600;
            letter-spacing: 1px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

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
            width: 450px; 
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .table-container {
            width: 550px; 
        }

        .title {
            font-size: 22px;
            font-weight: 600;
            color: #1a365d;
            margin-bottom: 25px;
            text-align: center;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .full {
            grid-column: span 2;
        }

        label {
            font-size: 14px;
            color: #2c5282;
        }

        input, select {
            width: 100%;
            padding: 8px;
            border-radius: 6px;
            border: 1px solid #cbd5e0;
            outline: none;
            font-family: 'Poppins', sans-serif;
            margin-top: 5px;
            box-sizing: border-box; 
        }

        input:focus, select:focus {
            border-color: #3182ce;
            box-shadow: 0 0 5px rgba(49,130,206,0.3);
        }

        button {
            color: white;
            border: none;
            padding: 12px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.25s ease;
            width: 100%;
            margin-top: 5px;
            font-weight: 600;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 12px rgba(0,0,0,0.15);
        }

        .btn-guardar { background: #3182ce; }
        .btn-guardar:hover { background: #2b6cb0; }
        
        .btn-actualizar { background: #d69e2e; }
        .btn-actualizar:hover { background: #b7791f; }
        
        .btn-eliminar { background: #e53e3e; }
        .btn-eliminar:hover { background: #c53030; }

        .btn-cancelar { background: #a0aec0; }
        .btn-cancelar:hover { background: #718096; }

        .botones-container {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
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
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #e2e8f0;
        }

        tr:hover {
            background: #f1f5f9;
            cursor: pointer; 
        }

        .mensaje {
            text-align: center;
            color: #718096;
            font-style: italic;
        }
    </style>
</head>

<body>

    <div class="header">
        <a href="../index.php" class="btn-regresar">⬅ Regresar</a>
        Sistema Gestor de Celulares
    </div>

    <div class="main-container">

        <div class="container">
            <div class="title" id="tituloFormulario">Registro de precios</div>

            <form action="../controlador/gestionarPrecio.php" method="POST" id="formPrecios">
                
                <input type="hidden" name="id_precio" id="id_precio" value="">

                <div class="form-grid">

                    <div>
                        <label>Marca</label>
                        <select name="idMarcaSeleccionada" id="selectMarca" required>
                            <option value="">--Seleccione--</option>
                            <?php foreach ($marcas as $row): ?>
                                <option value="<?= $row['id_marca'] ?>">
                                    <?= $row['nombre'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div>
                        <label>Modelo</label>
                        <select name="idModeloSeleccionada" id="selectModelo" required>
                            <option value="">--Seleccione--</option>
                            <?php foreach ($modelos as $row): ?>
                                <option value="<?= $row['id'] ?>" data-marca="<?= isset($row['id_marca']) ? $row['id_marca'] : '' ?>">
                                    <?= $row['nombre'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div>
                        <label>Color</label>
                        <select name="idColorSeleccionada" id="selectColor" required>
                            <option value="">--Seleccione--</option>
                            <?php foreach ($colores as $row): ?>
                                <option value="<?= $row['id'] ?>">
                                    <?= $row['nombre'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div>
                        <label>Precio inicial</label>
                        <input type="text" name="precio_inicial" id="inputPrecioInicial" required>
                    </div>

                    <div class="full">
                        <label>Precio final</label>
                        <input type="text" name="precio_final" id="inputPrecioFinal" required>
                    </div>

                    <div class="full botones-container">
                        <button type="submit" name="accion" value="guardar" id="btnGuardar" class="btn-guardar">Guardar Nuevo</button>
                        <button type="submit" name="accion" value="actualizar" id="btnActualizar" class="btn-actualizar" style="display: none;">Actualizar</button>
                        <button type="submit" name="accion" value="eliminar" id="btnEliminar" class="btn-eliminar" style="display: none;" onclick="return confirm('¿Seguro que quieres borrar este precio?');">Eliminar</button>
                        <button type="button" id="btnCancelar" class="btn-cancelar" style="display: none;" onclick="limpiarFormulario()">Cancelar</button>
                    </div>

                </div>

            </form>
        </div>

        <div class="container table-container">
            <div class="title">Precios registrados</div>
            
            <?php if(!empty($precios_registrados)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Color</th>
                        <th>Precio Final</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($precios_registrados as $fila): ?>
                    <tr onclick="cargarDatos(
                        '<?= $fila['id_precio'] ?>', 
                        '<?= $fila['id_marca'] ?>', 
                        '<?= $fila['id_modelo'] ?>', 
                        '<?= $fila['id_color'] ?>', 
                        '<?= $fila['precio_inicial'] ?>', 
                        '<?= $fila['precio_final'] ?>'
                    )">
                        <td><?= $fila['nombre_marca'] ?></td>
                        <td><?= $fila['nombre_modelo'] ?></td>
                        <td><?= $fila['nombre_color'] ?></td>
                        <td>$<?= number_format($fila['precio_final'], 2) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
                <p class="mensaje">Aún no hay precios registrados.</p>
            <?php endif; ?>

        </div>

    </div>

    <script>
        // Guardamos en memoria todas las opciones de modelos originales
        const todasLasOpcionesDeModelo = Array.from(document.getElementById('selectModelo').options);

        // NUEVA FUNCIÓN: Filtrar Modelos según la Marca
        function filtrarModelos() {
            const marcaSel = document.getElementById('selectMarca').value;
            const modeloSelect = document.getElementById('selectModelo');
            
            // Vaciamos la lista de modelos
            modeloSelect.innerHTML = '';
            
            // Mantenemos la opción por defecto
            modeloSelect.appendChild(todasLasOpcionesDeModelo[0]);

            if (marcaSel !== "") {
                let encontramosModelo = false;

                for (let i = 1; i < todasLasOpcionesDeModelo.length; i++) {
                    const opcion = todasLasOpcionesDeModelo[i];
                    
                    // Filtramos por el data-marca
                    if (opcion.getAttribute('data-marca') === marcaSel) {
                        modeloSelect.appendChild(opcion);
                        encontramosModelo = true;
                    }
                }

                if (!encontramosModelo) {
                    const opt = document.createElement('option');
                    opt.value = "";
                    opt.text = "No hay modelos para esta marca";
                    modeloSelect.appendChild(opt);
                }
            }
        }

        // Ejecutar el filtro cuando cambie la marca
        document.getElementById('selectMarca').addEventListener('change', filtrarModelos);

        function cargarDatos(id, marca, modelo, color, p_inicial, p_final) {
            document.getElementById('id_precio').value = id;
            
            // 1. Asignar marca
            document.getElementById('selectMarca').value = marca;
            
            // 2. Filtrar modelos basándose en la marca asignada
            filtrarModelos();
            
            // 3. Asignar modelo y resto de datos
            document.getElementById('selectModelo').value = modelo;
            document.getElementById('selectColor').value = color;
            document.getElementById('inputPrecioInicial').value = p_inicial;
            document.getElementById('inputPrecioFinal').value = p_final;

            document.getElementById('tituloFormulario').innerText = "Modificar precio";

            document.getElementById('btnGuardar').style.display = 'none';
            document.getElementById('btnActualizar').style.display = 'block';
            document.getElementById('btnEliminar').style.display = 'block';
            document.getElementById('btnCancelar').style.display = 'block';
        }

        function limpiarFormulario() {
            document.getElementById('formPrecios').reset();
            document.getElementById('id_precio').value = "";
            document.getElementById('tituloFormulario').innerText = "Registro de precios";

            // Volvemos a limpiar la lista de modelos
            filtrarModelos();

            document.getElementById('btnGuardar').style.display = 'block';
            document.getElementById('btnActualizar').style.display = 'none';
            document.getElementById('btnEliminar').style.display = 'none';
            document.getElementById('btnCancelar').style.display = 'none';
        }

        // Inicializar listas vacías al cargar si no hay marca seleccionada
        filtrarModelos();
    </script>

</body>
</html>