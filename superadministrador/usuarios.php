<?php

    include '../php/conexion.php';
    include '../php/redireccion.php';
    
    $usuariosregistrados = "SELECT * FROM usuarios where estatus = '1'";

    $ejecutarusuarios = mysqli_query($conexion, $usuariosregistrados);

    $infusuarios = $ejecutarusuarios;

    $usuario_activo=$_SESSION['usuario'];

    $validar_usuario_activo = mysqli_query ($conexion, "SELECT * FROM usuarios WHERE usuario='$usuario_activo'");
    $resultado= mysqli_fetch_array($validar_usuario_activo);

    $usuario_activo_id = $resultado['id'];
    $usuario_activo_usuario = $resultado['usuario'];
    $usuario_activo_nombres = $resultado['nombres'];
    $usuario_activo_apellidos = $resultado['apellidos'];
    $usuario_activo_tipo_documento = $resultado['tipo_documento'];
    $usuario_activo_correo = $resultado['correo'];
    $usuario_activo_usuario = $resultado['usuario'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
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

            <a href="">
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
        <h1>USUARIOS</h1>
        <br>
    <div class="contenedor_login">
        <a href="crear_usuario.php"><button>Añadir Usuario</button></a>
        <a href="../php/excel_usuarios.php"><button>Exportar Registros</button></a>
        <a href="usuarios_desactivados.php"><button>Usuarios Desactivados</button></a>
        <a href="historial_inicio_sesion.php"><button>Historial Inicio de Sesion</button></a>
        <table id="tabla_usuarios">
                <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Documento de Identidad</th>
                        <th>Correo Electronico</th>
                        <th>Usuario</th>
                        <th>Fecha de Registro</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach ($infusuarios as $infusuario) {
                    ?>
                    <tr>
                        <td><?php echo $infusuario['nombres']?></td>
                        <td><?php echo $infusuario['apellidos']?></td>
                        <td><?php echo $infusuario['tipo_documento']." - ".$infusuario['documento_identidad']?></td>
                        <td><?php echo $infusuario['correo']?></td>
                        <td><?php echo $infusuario['usuario']?></td>
                        <td><?php echo $infusuario['fecha_registro']?></td>
                        <td>
                        <a href="editar_usuario.php?
                        id=<?php echo $infusuario['id']?> &
                        nombres=<?php echo $infusuario['nombres']?> &
                        apellidos=<?php echo $infusuario['apellidos']?> &
                        tipo_documento=<?php echo $infusuario['tipo_documento']?> &
                        documento_identidad=<?php echo $infusuario['documento_identidad']?> &
                        correo=<?php echo $infusuario['correo']?> &
                        usuario=<?php echo $infusuario['usuario']?> &
                        fecha_registro=<?php echo $infusuario['fecha_registro']?>
                        "><button class="editar">Editar</button></a>
                        <a href="../php/desac_usuario.php?
                        id=<?php echo $infusuario['id']?>" class="textoeliminar"><button class="eliminar">Desactivar</a></button>
                        </td> 
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