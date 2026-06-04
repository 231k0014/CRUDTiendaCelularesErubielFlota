<?php 
/** @var array $marcas */
/** @var array $modelos */
/** @var array $colores */
/** @var array $precios */
/** @var array $telefonos_registrados */
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Teléfonos</title>

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
            padding: 15px; 
            text-align: center;
            font-size: 22px; 
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
            padding: 6px 14px;
            border-radius: 6px;
            font-size: 13px;
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
            align-items: flex-start; 
            gap: 20px; 
            margin: 25px 20px; 
            flex-wrap: wrap; 
        }

        .container {
            background: #ffffff;
            width: 320px; 
            padding: 20px 25px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .table-container {
            width: auto; 
            flex: 1; 
            min-width: 650px; 
            max-width: 950px; 
        }

        .title {
            font-size: 20px; 
            font-weight: 600;
            color: #1a365d;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px; 
        }

        .full {
            grid-column: span 2;
        }

        label {
            font-size: 13px; 
            color: #2c5282;
            font-weight: 600;
        }

        input, select {
            width: 100%;
            padding: 7px; 
            border-radius: 6px;
            border: 1px solid #cbd5e0;
            outline: none;
            font-family: 'Poppins', sans-serif;
            margin-top: 4px;
            box-sizing: border-box; 
            font-size: 13px;
        }

        /* Estilo para inputs de solo lectura */
        input[readonly] {
            background-color: #f7fafc;
            color: #718096;
            cursor: not-allowed;
        }

        input:focus:not([readonly]), select:focus {
            border-color: #3182ce;
            box-shadow: 0 0 5px rgba(49,130,206,0.3);
        }

        button {
            color: white;
            border: none;
            padding: 10px;
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
            font-size: 12px; 
        }

        th {
            background: #3182ce;
            color: white;
            padding: 10px 8px;
        }

        td {
            padding: 10px 8px;
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
            font-size: 14px;
        }

        .badge {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 11px; 
            font-weight: 600;
        }
        .badge-no {
            background-color: #e2e8f0;
            color: #4a5568;
        }
        .badge-si {
            background-color: #feb2b2;
            color: #c53030;
        }
        .badge-vendido {
            background-color: #c6f6d5;
            color: #2f855a;
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
            <div class="title" id="tituloFormulario">Ingresar Teléfono</div>

            <form action="../controlador/guardarTelefono.php" method="POST" id="formTelefonos">
                
                <input type="hidden" name="id_telefono" id="id_telefono" value="">

                <div class="form-grid">

                    <div class="full">
                        <label>IMEI del equipo</label>
                        <input type="text" name="imei" id="inputImei" required placeholder="Ej. 354892019...">
                    </div>

                    <div>
                        <label>Marca</label>
                        <select name="id_marca" id="selectMarca" required>
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
                        <select name="id_modelo" id="selectModelo" required>
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
                        <select name="id_color" id="selectColor" required>
                            <option value="">--Seleccione--</option>
                            <?php foreach ($colores as $row): ?>
                                <option value="<?= $row['id'] ?>">
                                    <?= $row['nombre'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div>
                        <label>Precio</label>
                        <select name="id_precio" id="selectPrecio" required>
                            <option value="">--Seleccione--</option>
                            <?php foreach ($precios as $row): ?>
                                <option value="<?= $row['id'] ?>" 
                                        data-marca="<?= $row['id_marca'] ?>" 
                                        data-modelo="<?= $row['id_modelo'] ?>" 
                                        data-color="<?= $row['id_color'] ?>">
                                    $<?= number_format($row['precio_final'], 2) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="full">
                        <label>Fecha de registro</label>
                        <input type="date" name="fecha_registro" id="inputFecha" value="<?= date('Y-m-d'); ?>" readonly required>
                    </div>

                    <div class="full botones-container">
                        <button type="submit" name="accion" value="guardar" id="btnGuardar" class="btn-guardar">Guardar Nuevo</button>
                        
                        <button type="submit" name="accion" value="actualizar" id="btnActualizar" class="btn-actualizar" style="display: none;">Actualizar</button>
                        
                        <button type="submit" name="accion" value="eliminar" id="btnEliminar" class="btn-eliminar" style="display: none;" onclick="return confirm('¿Seguro que quieres borrar este teléfono?');">Eliminar</button>
                        
                        <button type="button" id="btnCancelar" class="btn-cancelar" style="display: none;" onclick="limpiarFormulario()">Cancelar</button>
                    </div>

                </div>

            </form>
        </div>

        <div class="container table-container">
            <div class="title">Teléfonos en inventario</div>
            
            <?php if(!empty($telefonos_registrados)): ?>
            <table>
                <thead>
                    <tr>
                        <th>IMEI</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Color</th>
                        <th>Precio</th> 
                        <th>Fecha</th>
                        <th>Vendido</th>
                        <th>Baja</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($telefonos_registrados as $fila): ?>
                    <tr onclick="cargarDatos(
                        '<?= $fila['id_telefono'] ?>', 
                        '<?= $fila['imei'] ?>', 
                        '<?= $fila['id_marca'] ?>', 
                        '<?= $fila['id_modelo'] ?>', 
                        '<?= $fila['id_color'] ?>', 
                        '<?= $fila['id_precio'] ?>', 
                        '<?= $fila['fecha_registro'] ?>'
                    )">
                        <td><?= $fila['imei'] ?></td>
                        <td><?= $fila['nombre_marca'] ?></td>
                        <td><?= $fila['nombre_modelo'] ?></td>
                        <td><?= $fila['nombre_color'] ?></td>

                        <td style="font-weight: 600; color: #2b6cb0;">
                            $<?= isset($fila['precio_final']) ? number_format($fila['precio_final'], 2) : '0.00' ?>
                        </td>

                        <td><?= $fila['fecha_registro'] ?></td>
                        
                        <td>
                            <?php if(isset($fila['vendido']) && $fila['vendido'] == 1): ?>
                                <span class="badge badge-vendido">Sí</span>
                            <?php else: ?>
                                <span class="badge badge-no">No</span>
                            <?php endif; ?>
                        </td>

                        <td>
                            <?php if(isset($fila['baja']) && $fila['baja'] == 1): ?>
                                <span class="badge badge-si">Sí</span>
                            <?php else: ?>
                                <span class="badge badge-no">No</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
                <p class="mensaje">Aún no hay teléfonos registrados.</p>
            <?php endif; ?>

        </div>

    </div>

    <script>
    // Guardamos en memoria todas las opciones de precios y modelos originales
    const todasLasOpcionesDePrecio = Array.from(document.getElementById('selectPrecio').options);
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
        
        // Al cambiar los modelos, forzamos a que también se actualicen los precios
        filtrarPrecios();
    }

    function filtrarPrecios() {
        const marcaSel = document.getElementById('selectMarca').value;
        const modeloSel = document.getElementById('selectModelo').value;
        const colorSel = document.getElementById('selectColor').value;
        const precioSelect = document.getElementById('selectPrecio');
        
        precioSelect.innerHTML = '';
        precioSelect.appendChild(todasLasOpcionesDePrecio[0]);

        if (marcaSel !== "" && modeloSel !== "" && colorSel !== "") {
            let encontramosPrecio = false;

            for (let i = 1; i < todasLasOpcionesDePrecio.length; i++) {
                const opcion = todasLasOpcionesDePrecio[i];
                
                if (opcion.getAttribute('data-marca') === marcaSel &&
                    opcion.getAttribute('data-modelo') === modeloSel &&
                    opcion.getAttribute('data-color') === colorSel) {
                    
                    precioSelect.appendChild(opcion); 
                    encontramosPrecio = true;
                }
            }

            if (!encontramosPrecio) {
                const opt = document.createElement('option');
                opt.value = "";
                opt.text = "No hay precios para esta combinación";
                precioSelect.appendChild(opt);
            }
        }
    }

    // CAMBIO: selectMarca ahora llama a filtrarModelos (que internamente llama a filtrarPrecios)
    document.getElementById('selectMarca').addEventListener('change', filtrarModelos);
    document.getElementById('selectModelo').addEventListener('change', filtrarPrecios);
    document.getElementById('selectColor').addEventListener('change', filtrarPrecios);

    function cargarDatos(id, imei, marca, modelo, color, precio, fecha) {
        document.getElementById('id_telefono').value = id;
        document.getElementById('inputImei').value = imei;
        
        // 1. Asignar marca
        document.getElementById('selectMarca').value = marca;
        
        // 2. Filtrar modelos basándose en la marca asignada
        filtrarModelos();
        
        // 3. Asignar modelo (ahora que ya están filtrados)
        document.getElementById('selectModelo').value = modelo;
        
        // 4. Asignar color
        document.getElementById('selectColor').value = color;
        
        // 5. Filtrar precios basándose en las 3 selecciones
        filtrarPrecios();

        // 6. Asignar precio
        document.getElementById('selectPrecio').value = precio;
        
        document.getElementById('inputFecha').value = fecha;

        document.getElementById('tituloFormulario').innerText = "Modificar teléfono";

        document.getElementById('btnGuardar').style.display = 'none';
        document.getElementById('btnActualizar').style.display = 'block';
        document.getElementById('btnEliminar').style.display = 'block';
        document.getElementById('btnCancelar').style.display = 'block';
    }

    function limpiarFormulario() {
        document.getElementById('formTelefonos').reset();
        document.getElementById('id_telefono').value = "";
        document.getElementById('tituloFormulario').innerText = "Ingresar Teléfono";
        
        document.getElementById('inputFecha').value = "<?= date('Y-m-d'); ?>";
        
        // Restaurar listas
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