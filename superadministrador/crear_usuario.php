<?php
    include '../php/redireccion.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario</title>
    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/cultivos.css">
</head>

<body id="body">
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

            <a href="usuarios.php" class="seleccion">
                <div class="opcion">
                    <i class="lni lni-users" title="Usuarios"></i>
                    <h4>Usuarios</h4>
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
        <h1>REGISTRO DE USUARIO</h1>
        <br>
        <div class="contenedor_login">
            <form action="../php/registro_usuario.php" method="post" class="formulario_registro">
                <label for="nombre">Nombres:</label><br>
                <input type="text" placeholder="Nombres" name="nombres" required pattern="[a-zA-Z\s]{4,20}"
                    title="Maximo de caracteres 20." maxlenth="20">
                <br>
                <br>
                <label for="apellido">Apellidos:</label><br>
                <input type="text" placeholder="Apellidos" name="apellidos" required pattern="[a-zA-Z\s]{20}"
                    title="Maximo de caracteres 20." maxlenth="20">
                <br>
                <br>
                <label>Tipo de Documento de Identidad:</label>
                <br>
                <select name="tipo_documento" required>
                    <option value="" disable>Seleccionar</option>
                    <option value="1">Cédula</option>
                    <option value="2">Pasaporte</option>
                </select>
                <br>
                <input type="text" placeholder="Nº Documento de Identidad" name="documento_identidad" required
                    pattern="[0-9]{8,9}" title="Maximo de caracteres permitidos 9." maxlenth="9">
                <br>
                <br>
                <label for="correo">Correo electronico</label>
                <br>
                <input type="text" placeholder="Correo Electronico" name="correo" required>
                <br>
                <br>
                <label>Rol:</label>
                <br>
                <select name="rol" required>
                    <option value="">Seleccionar</option>
                    <option value="1">SuperAdministrador</option>
                    <option value="2">Administrador</option>
                    <option value="3">Usuario</option>
                </select>
                <br>
                <br>
                <label for="usuario">Usuario</label>
                <br>
                <input type="text" placeholder="Usuario" name="usuario" required patter="[a-zA-Z]{9,11}"
                    title="El usuario solo debe tener iniciales de su nombre y su cedula.">
                <!-- El usuario a registrar debera ser de la siguiente forma. Las iniciales de nombre con su apellido y su cedula es decir su se llama "Julio Ramirez", el usuario seria Jr(Numero de cedula) -->
                <br>
                <br>
                <label for="password">Contraseña</label>
                <br>
                <input type="password" placeholder="Contraseña" name="contrasena" required
                    pattern="(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}" maxlenth="16">
                <br>
                <button>Registrar</button>
            </form>
        </div>
    </main>
</body>

</html>