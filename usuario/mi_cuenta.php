<?php

    include '../php/conexion.php';
    include '../php/redireccion.php';

    $usuario_activo=$_SESSION['usuario'];

    $validar_usuario_activo = mysqli_query ($conexion, "SELECT *, h.fecha_registro AS ultimaconexion, r.nombre AS rolusuario FROM usuarios u 
    LEFT JOIN historial_inicio_sesion h on (u.rol_id = h.id) LEFT JOIN roles r on (u.rol_id = r.id) WHERE u.usuario='$usuario_activo'");
    $resultado= mysqli_fetch_array($validar_usuario_activo);

    $usuario_activo_id = $resultado['id'];
    $usuario_activo_usuario = $resultado['usuario'];
    $usuario_activo_nombres = $resultado['nombres'];
    $usuario_activo_apellidos = $resultado['apellidos'];
    $usuario_activo_tipo_documento = $resultado['tipo_documento'];
    $usuario_activo_documento_identidad = $resultado['documento_identidad'];
    $usuario_activo_correo = $resultado['correo'];
    $usuario_activo_usuario = $resultado['usuario'];
    $usuario_activo_rol = $resultado['rolusuario'];
    $usuario_activo_conexion = $resultado['ultimaconexion'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Cuenta</title>
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

            <a href="mi_cuenta.php" class="seleccion">
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
        <h1>Mi Cuenta</h1>
        <br>
    <div class="contenedor_login">
        <a href="editar_mi_cuenta.php? id=<?php echo $usuario_activo_id?> &
                                        nombres=<?php echo $usuario_activo_nombres?> &
                                        apellidos=<?php echo $usuario_activo_apellidos?> &
                                        tipo_documento=<?php echo $usuario_activo_tipo_documento?> &
                                        correo=<?php echo $usuario_activo_correo?> &
                                        documento_identidad=<?php echo $usuario_activo_documento_identidad?> &
                                        usuario=<?php echo $usuario_activo_usuario?>"><button>Editar Mi Cuenta</button></a>
        <table id="tabla_usuarios">
                <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Tipo de Documento de Identidad</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $usuario_activo_nombres?></td>
                        <td><?php echo $usuario_activo_apellidos?></td>
                        <td><?php echo $usuario_activo_tipo_documento?></td>
                    </tr>
                </tbody>
                <thead>
                    <tr>
                        <th>Numero de Documento de Identidad</th>
                        <th>Correo Electronico</th>
                        <th>Usuario</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $usuario_activo_documento_identidad?></td>
                        <td><?php echo $usuario_activo_correo?></td>
                        <td><?php echo $usuario_activo_usuario?></td>
                    </tr>
                </tbody>
                <thead>
                    <tr>
                        <th>Rol</th>
                        <th colspan="2">Ultima Conexion</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $usuario_activo_rol?></td>
                        <td colspan="2"><?php echo $usuario_activo_conexion?></td>
                    </tr>
                </tbody>
            </table>
            
    </div>
    </main>
</body>
</html>