<?php
    include '../php/redireccion.php';
    include '../php/conexion.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Mi Cuenta</title>
    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/cultivos.css">
</head>
<body id="body">
<?php
    $id = $_GET['id'];
    $nombres = $_GET['nombres'];
    $apellidos = $_GET['apellidos'];
    $tipo_documento = $_GET['tipo_documento'];
    $documento_identidad = $_GET['documento_identidad'];
    $correo = $_GET{'correo'};
    $usuario = $_GET['usuario'];
?>
    <header>
        <div class="icono_menu">
             <i class="lni lni-line-double" id="abrir_boton"></i>
        </div>
    </header>

    <div class="menu_lateral" id="menu_lateral">
        <div class="nombre_pagina">
            <i class="lni lni-sprout"></i>
            <h4>SICPRC</h4>
        </div>
        <div class="opciones_menu">

            <a href="inicio.php">
                <div class="opcion">
                    <i class="lni lni-grid-alt" title="Inicio"></i>
                    <h4>Inicio</h4>
                </div>
            </a>

            <a href="cultivos.php">
                <div class="opcion">
                    <i class="lni lni-grow" title="Cultivos"></i>
                    <h4>Cultivos</h4>
                </div>
            </a>

            <a href="sistemas_riego.php">
                <div class="opcion">
                    <i class="lni lni-spray" title="Sistema de Riego"></i>
                    <h4>Sistema de Riego</h4>
                </div>
            </a>

            <a href="sensor_humedad.php">
                <div class="opcion">
                    <i class="lni lni-ruler-alt" title="Sistema de Medición"></i>
                    <h4>Sensor de Humedad y Temperatura</h4>
                </div>
            </a>

            <a href="consulta.php">
                <div class="opcion">
                    <i class="lni lni-library" title="Consulta"></i>
                    <h4>Consulta</h4>
                </div>
            </a>

            <a href="mi_cuenta.php">
                <div class="opcion">
                    <i class="lni lni-user" title="Mi Cuenta"></i>
                    <h4>Mi Cuenta</h4>
                </div>
            </a>

            <a href="../php/cerrar_sesion.php">
                <div class="opcion">
                    <i class="lni lni-power-switch" title="Cerrar Sesión"></i>
                    <h4>Cerrar Sesión</h4>
                </div>
            </a>

        </div>
    </div>
    <script src="../js/script.js"></script>

    <main>
        <h1>Editar Mi Cuenta</h1>
        <br>
    <div class="contenedor_login">
        <form action="../php/actualizacion_mi_cuenta.php" method="post" class="formulario_registro">
            <input type="text" placeholder="Nombres" name="nombres" value="<?=$nombres?>">
            <br>
            <input type="text" placeholder="Apellidos" name="apellidos" value="<?=$apellidos?>">
           <!-- <br>
            <br>
            <label>Tipo de Documento de Identidad:</label>
            <br>
            <select name="tipo_documento" value="<?=$tipo_documento?>">
                <option value="1">Cédula</option>
                <option value="2">Pasaporte</option>
            </select> -->
            <br>
            <input type="text" placeholder="Nº Documento de Identidad" name="documento_identidad" value="<?=$documento_identidad?>">
            <br>
            <input type="text" placeholder="Correo Electronico" name="correo" value="<?=$correo?>">
            <br>
            <input type="text" placeholder="Usuario" name="usuario" value="<?=$usuario?>">
            <input type="password" placeholder="Contraseña" name="contrasena" value="">
            <br>
            <button>Actualizar</button>
            <input type="text" placeholder="Id" name="id" value="<?=$id?>"  style="visibility:hidden">
        </form>
    </div>
    </main>
</body>
</html>
