<?php

    include '../php/conexion.php';
    include '../php/redireccion.php';
    
    $historiallogin = "SELECT *, u.nombres AS nombreusuario, r.nombre AS rolusuario FROM historial_inicio_sesion h LEFT JOIN usuarios u on (h.usuario_id = u.id) INNER JOIN roles r ON (u.rol_id = r.id) ORDER BY h.id DESC limit 20";

    $ejecutarhistorial = mysqli_query($conexion, $historiallogin);

    $historialsesiones = $ejecutarhistorial;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial Inicio de Sesion</title>
    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/consulta.css">
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

            <a href="cultivos.php" class="seleccion">
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

            <a href="sensores_humedad.php">
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

            <a href="usuarios.php">
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
        <h1>HISTORIAL INICIO DE SESION</h1>
        <br>
    <div class="contenedor_login">
        <a href="../php/historial_inicio_sesion.php"><button>Exportar Registros</button></a>
        <table id="tabla_historial_inicio_sesion">
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Rol</th>
                        <th>Fecha Inicio de Sesion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach ($historialsesiones as $historialsesion) {
                    ?>
                    <tr>
                        <td><?php echo $historialsesion['nombreusuario']?></td>
                        <td><?php echo $historialsesion['rolusuario']?></td>
                        <td><?php echo $historialsesion['fecha_registro']?></td>
                    </tr> 
                <?php
                }
                ?>
                </tbody>
            </table>
    </div>
    </main>
</body>
</html>