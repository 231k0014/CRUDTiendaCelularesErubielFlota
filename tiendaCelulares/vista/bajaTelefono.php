<?php 
/** @var array $marcas */
/** @var array $telefonos_disponibles */
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Baja de Teléfonos</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background: linear-gradient(135deg, #e3f0ff, #f7fbff); margin: 0; padding: 0; }
        .header { position: relative; background: #2b6cb0; color: white; padding: 15px; text-align: center; font-size: 22px; font-weight: 600; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .btn-regresar { position: absolute; left: 20px; top: 50%; transform: translateY(-50%); background: #e3f0ff; color: #2b6cb0; text-decoration: none; padding: 6px 14px; border-radius: 6px; font-size: 13px; font-weight: 600; transition: all 0.25s ease; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .btn-regresar:hover { background: #ffffff; transform: translateY(-50%) scale(1.05); }
        .main-container { display: flex; justify-content: center; align-items: flex-start; gap: 20px; margin: 25px 20px; flex-wrap: wrap; }
        .container { background: #ffffff; width: 340px; padding: 20px 25px; border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
        .table-container { width: auto; flex: 1; min-width: 650px; max-width: 950px; }
        .title { font-size: 20px; font-weight: 600; color: #1a365d; margin-bottom: 20px; text-align: center; }
        .form-grid { display: grid; grid-template-columns: 1fr; gap: 15px; } 
        label { font-size: 13px; color: #2c5282; font-weight: 600; display: block; margin-bottom: 3px; }
        input, select, textarea { width: 100%; padding: 8px; border-radius: 6px; border: 1px solid #cbd5e0; outline: none; font-family: 'Poppins', sans-serif; box-sizing: border-box; font-size: 13px; }
        textarea { resize: none; height: 80px; } /* Estilo para el cuadro de motivo */
        input:focus, select:focus, textarea:focus { border-color: #e53e3e; box-shadow: 0 0 5px rgba(229,62,62,0.3); }
        
        #buscadorEquipos { background-color: #fff5f5; border-color: #feb2b2; font-weight: 600;}
        #buscadorEquipos:focus { background-color: #ffffff; border-color: #e53e3e; }

        button { color: white; border: none; padding: 12px; border-radius: 6px; cursor: pointer; font-size: 14px; transition: all 0.25s ease; width: 100%; margin-top: 15px; font-weight: 600; background: #e53e3e; }
        button:hover { background: #c53030; transform: translateY(-2px); box-shadow: 0 5px 12px rgba(0,0,0,0.15); }
        
        table { width: 100%; border-collapse: collapse; font-size: 13px; }
        th { background: #e53e3e; color: white; padding: 10px 8px; } 
        td { padding: 10px 8px; text-align: center; border-bottom: 1px solid #e2e8f0; }
        tr:hover { background: #f1f5f9; }
        .mensaje { text-align: center; color: #718096; font-style: italic; font-size: 14px; }
    </style>
</head>
<body>

    <div class="header">
        <a href="../index.php" class="btn-regresar">⬅ Regresar</a>
        Sistema Gestor de Celulares
    </div>

    <div class="main-container">

        <div class="container">
            <div class="title">Dar de Baja Equipo</div>

            <form action="../controlador/guardarBaja.php" method="POST">
                <div class="form-grid">
                    
                    <div>
                        <label>Buscar (IMEI, Marca o Modelo)</label>
                        <input type="text" id="buscadorEquipos" placeholder="Ej. 354892... o Samsung">
                    </div>

                    <div>
                        <label>Seleccionar Equipo</label>
                        <select name="id_telefono" id="selectTelefono" required>
                            <option value="">--Seleccione un equipo--</option>
                            <?php foreach ($telefonos_disponibles as $tel): ?>
                                <option value="<?= $tel['id_telefono'] ?>">
                                    IMEI: <?= $tel['imei'] ?> - <?= $tel['marca'] ?> <?= $tel['modelo'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div>
                        <label>Motivo / Descripción de la baja</label>
                        <textarea name="descripcion" placeholder="¿Por qué se está dando de baja?" required></textarea>
                    </div>

                    <button type="submit" onclick="return confirm('¿Estás seguro de que deseas dar de baja este equipo?');">Confirmar Baja</button>
                </div>
            </form>
        </div>

        <div class="container table-container">
            <div class="title">Historial de Bajas</div>
            
            <?php if(!empty($telefonos_baja)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Folio</th>
                        <th>Fecha Baja</th>
                        <th>Equipo</th>
                        <th>IMEI</th>
                        <th>Motivo / Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($telefonos_baja as $baja): ?>
                    <tr>
                        <td>#<?= str_pad($baja['id_baja'], 4, "0", STR_PAD_LEFT) ?></td>
                        <td><?= $baja['fecha_baja'] ?></td>
                        <td><?= $baja['marca'] ?> <?= $baja['modelo'] ?></td>
                        <td><?= $baja['imei'] ?></td>
                        <td style="text-align: left; max-width: 200px; word-wrap: break-word; font-style: italic; color: #4a5568;">
                            <?= htmlspecialchars($baja['descripcion']) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
                <p class="mensaje">No hay equipos dados de baja.</p>
            <?php endif; ?>
        </div>
    </div>

    <script>
        const todasLasOpcionesEquipos = Array.from(document.getElementById('selectTelefono').options);
        const buscadorInput = document.getElementById('buscadorEquipos');
        const selectTelefono = document.getElementById('selectTelefono');

        buscadorInput.addEventListener('input', function() {
            const textoBuscado = this.value.toLowerCase(); 
            selectTelefono.innerHTML = '';
            selectTelefono.appendChild(todasLasOpcionesEquipos[0]);
            let encontramosCoincidencias = false;

            for (let i = 1; i < todasLasOpcionesEquipos.length; i++) {
                const opcion = todasLasOpcionesEquipos[i];
                const textoDeLaOpcion = opcion.text.toLowerCase();

                if (textoDeLaOpcion.includes(textoBuscado)) {
                    selectTelefono.appendChild(opcion);
                    encontramosCoincidencias = true;
                }
            }

            if (!encontramosCoincidencias) {
                const opt = document.createElement('option');
                opt.value = "";
                opt.text = "No se encontraron equipos...";
                selectTelefono.appendChild(opt);
            }
        });

        const urlParams = new URLSearchParams(window.location.search);
        const status = urlParams.get('status');

        if (status === 'exito') {
            alert("¡Equipo dado de baja correctamente!");
            window.history.replaceState(null, null, window.location.pathname);
        } else if (status === 'error') {
            alert("Ocurrió un error al dar de baja el equipo.");
            window.history.replaceState(null, null, window.location.pathname);
        }
    </script>
</body>
</html>