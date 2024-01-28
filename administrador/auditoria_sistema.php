<?php

    include '../php/conexion.php';
    include '../php/redireccion.php';

    $id = $_GET['id'];
    
    $riegoauditoria = "SELECT * FROM auditoria_sistema_riego WHERE sistema_riego_id='$id' ORDER BY id DESC limit 10 ";

    $ejecutarriegos = mysqli_query($conexion, $riegoauditoria);

    $auditoriariegos = $ejecutarriegos;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Riego</title>
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
        <h1>Valores Registrados Sistema de Riego</h1>
        <br>
    <div class="contenedor_login">
        <a href="../php/historial_sistema_riego.php?
                        id=<?php echo $id?>"><button>Exportar Historial</button></a>
        <a href="sistemas_riego.php"><button>Sistemas de Riego Registrados</button></a>
        <table id="tabla_sensores_hum">
                <thead>
                    <tr>
                        <th>Humedad</th>
                        <th>Temperatura</th>
                        <th>Tiempo de Riego (min)</th>
                        <th>Fecha Registro</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach ($auditoriariegos as $auditoriariego) {
                    ?>
                    <tr>
                        <td><?php echo $auditoriariego['auditoria_humedad']?></td>
                        <td><?php echo $auditoriariego['auditoria_temperatura']?></td>
                        <td><?php echo $auditoriariego['tiempo_riego']?></td>
                        <td><?php echo $auditoriariego['fecha_registro']?></td>
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