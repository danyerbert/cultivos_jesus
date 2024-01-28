<?php

    include '../php/conexion.php';
    include '../php/redireccion.php';
    
    $sensoresregistrados = "SELECT * FROM sensor_temp_hum WHERE estatus = '1'";

    $ejecutarsensores = mysqli_query($conexion, $sensoresregistrados);

    $datossensores = $ejecutarsensores;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sensores Humedad y Temperatura</title>
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

            <a href="sensores_humedad.php" class="seleccion">
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
        <h1>SENSORES DE HUMEDAD Y TEMPERATURA</h1>
        <br>
    <div class="contenedor_login">
        <a href="crear_sensor_hum.php"><button>Añadir Sensor</button></a>
        <a href="../php/excel_sensores_hum.php"><button>Exportar Registros</button></a>
        <a href="sensores_hum_desactivados.php"><button>Sensores Desactivados</button></a>
        <table id="tabla_sensores_hum">
                <thead>
                    <tr>
                        <th>Numero de Bien Nacional</th>
                        <th>Descripcion</th>
                        <th>Fecha de Registro</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach ($datossensores as $datossensor) {
                    ?>
                    <tr>
                        <td><?php echo $datossensor['numero_bien_nacional']?></td>
                        <td><?php echo $datossensor['descripcion']?></td>
                        <td><?php echo $datossensor['fecha_registro']?></td>
                        
                        <td>
                        <a href="auditoria_humedad.php?
                        id=<?php echo $datossensor['id']?>"><button class="registro">Historial</a></button>
                        <a href="editar_sensor.php?
                        id=<?php echo $datossensor['id']?> &
                        numero_bien_nacional=<?php echo $datossensor['numero_bien_nacional']?> &
                        descripcion=<?php echo $datossensor['descripcion']?>
                        "><button class="editar">Editar</button></a>
                        <a href="../php/desac_sensor.php?
                        id=<?php echo $datossensor['id']?>"><button class="eliminar">Desactivar</a></button>
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