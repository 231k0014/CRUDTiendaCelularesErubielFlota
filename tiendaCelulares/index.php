<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema Gestor de Celulares</title>

    <!-- Fuente moderna -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #e3f0ff, #f7fbff);
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }

        .header {
            background: #2b6cb0;
            color: white;
            padding: 18px;
            text-align: center;
            font-size: 24px;
            font-weight: 600;
            letter-spacing: 1px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        /* Contenedor que abraza a las dos secciones para ponerlas lado a lado */
        .main-wrapper {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            gap: 40px;
            margin: 50px 20px;
            flex-wrap: wrap; /* Si la pantalla es chiquita, se bajan solos */
        }

        /* Usamos una sola clase para ambos cuadros blancos y ahorrar código */
        .panel-container {
            background: #ffffff;
            width: 380px;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .title {
            font-size: 20px;
            font-weight: 600;
            color: #1a365d;
            margin-bottom: 25px;
            text-align: center;
            border-bottom: 2px solid #e3f0ff;
            padding-bottom: 10px;
        }

        /* Acomodamos las opciones en filas (texto a la izq, botón a la der) */
        .section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #edf2f7;
        }

        /* Le quitamos la rayita al último de la lista */
        .section:last-child {
            border-bottom: none;
        }

        h2 {
            font-size: 15px;
            font-weight: 500;
            color: #2c5282;
            margin: 0;
        }

        button {
            background: #3182ce;
            color: white;
            border: none;
            padding: 8px 18px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.25s ease;
        }

        button:hover {
            background: #2b6cb0;
            transform: translateY(-2px);
            box-shadow: 0 5px 12px rgba(0,0,0,0.15);
        }

        a {
            text-decoration: none;
        }
    </style>
</head>

<body>

    <div class="header">
        Sistema Gestor de Celulares
    </div>

    <!-- Abrimos el contenedor flex para acomodarlos horizontalmente -->
    <div class="main-wrapper">

        <!-- SECCIÓN 1: CONTROL DE TELÉFONOS -->
        <div class="panel-container">
            <div class="title">Control de Teléfonos</div>

            <div class="section">
                <h2>Registrar Teléfono</h2>
                <a href="controlador/consultarTelefono.php">
                    <button>Acceder</button>
                </a>
            </div>

            <div class="section">
                <h2>Vender Teléfono</h2>
                <!-- Por ahora va al mismo archivo, si luego haces otro le cambias aquí -->
                <a href="controlador/consultarVentas.php">
                    <button>Acceder</button>
                </a>
            </div>

            <div class="section">
                <h2>Dar de baja</h2>
                <a href="controlador/consultarBajas.php">
                    <button>Acceder</button>
                </a>
            </div>
        </div>


        <!-- SECCIÓN 2: PANEL DE REGISTRO (Catálogos) -->
        <div class="panel-container">
            <div class="title">Panel de Registro</div>

            <div class="section">
                <h2>Registrar Marca</h2>
                <a href="controlador/consultarMarca.php">
                    <button>Acceder</button>
                </a>
            </div>

            <div class="section">
                <h2>Registrar Modelo</h2>
                <a href="controlador/consultarMarcaenModelos.php">
                    <button>Acceder</button>
                </a>
            </div>

            <div class="section">
                <h2>Registrar Color</h2>
                <a href="controlador/consultarColor.php">
                    <button>Acceder</button>
                </a>
            </div>

            <div class="section">
                <h2>Registrar Precios</h2>
                <a href="controlador/consultarPrecios.php">
                    <button>Acceder</button>
                </a>
            </div>
        </div>

    </div>

</body>
</html>