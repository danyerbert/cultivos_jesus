<?php

    include '../php/conexion.php';
    include '../php/redireccion.php';
    
    $cultivosregistrados = "SELECT * , u.nombres AS nombreusuario, s.descripcion AS descripcionsensor, m.nombre AS mesinicio, 
    c.nombre AS cultivonombre, sr.descripcion AS descripcionsistema, c.id AS idcultivo FROM cultivos c left join usuarios u on (c.usuario_id = u.id) left join sistema_riego sr on (c.sistema_riego_id = sr.id)
    left join sensor_temp_hum s on (c.sensor_humedad_id = s.id) left join meses m on (c.inicio_cultivo_id = m.id) where c.estatus = '0'";

    $ejecutarcultivos = mysqli_query($conexion, $cultivosregistrados);

    $datoscultivos = $ejecutarcultivos;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cultivos</title>
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
        <h1>CULTIVOS DESACTIVADOS</h1>
        <br>
    <div class="contenedor_login">
        <a href="../php/excel_cultivos_desactivados.php"><button>Exportar Registros</button></a>
        <a href="cultivos.php"><button>Cultivos Activos</button></a>
        <table id="tabla_inf_cultivos">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Usuario</th>
                        <th>Sensor Humedad</th>
                        <th>Inicio de Cultivo</th>
                        <th>Sistema de Riego</th>
                        <th>Ubicacion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach ($datoscultivos as $datoscultivo) {
                    ?>
                    <tr>
                        <td><?php echo $datoscultivo['nombre']?></td>
                        <td><?php echo $datoscultivo['usuario_id']?></td>
                        <td><?php echo $datoscultivo['sensor_humedad_id']?></td>
                        <td><?php echo $datoscultivo['inicio_cultivo_id']?></td>
                        <td><?php echo $datoscultivo['sistema_riego_id']?></td>
                        <td><?php echo $datoscultivo['ubicacion']?></td>
                        
                        <td>
                        <a href="editar_cultivo.php?
                        id=<?php echo $datoscultivo['idcultivo']?> &
                        nombre=<?php echo $datoscultivo['cultivonombre']?> &
                        sensor_humedad_id=<?php echo $datoscultivo['sensor_humedad_id']?> &
                        inicio_cultivo_id=<?php echo $datoscultivo['inicio_cultivo_id']?> &
                        sistema_riego_id=<?php echo $datoscultivo['sistema_riego_id']?> &
                        ubicacion=<?php echo $datoscultivo['ubicacion']?>
                        "><button class="editar">Editar</button></a>
                        <a href="../php/act_cultivo.php?
                        id=<?php echo $datoscultivo['idcultivo']?>" class="textoactivar"><button class="activar">Activar</a></button>
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