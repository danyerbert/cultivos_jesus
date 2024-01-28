<?php

    include '../php/conexion.php';
    include '../php/redireccion.php';
    
    $ssistemasriegoregistrados = "SELECT * FROM sistema_riego WHERE estatus = '0'";

    $ejecutarsistemas = mysqli_query($conexion, $ssistemasriegoregistrados);

    $datossistemas = $ejecutarsistemas;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistemas de Riego Desactivados</title>
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
        <h1>Sistemas de Riego</h1>
        <br>
    <div class="contenedor_login">
        <a href="../php/excel_sistemas_riego_desac.php"><button>Exportar Registros</button></a>
        <a href="sistemas_riego.php"><button>Sistemas de Riego Activos</button></a>
        <table id="tabla_sistemas_riego_hum">
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
                        foreach ($datossistemas as $datossistema) {
                    ?>
                    <tr>
                        <td><?php echo $datossistema['numero_bien_nacional']?></td>
                        <td><?php echo $datossistema['descripcion']?></td>
                        <td><?php echo $datossistema['fecha_registro']?></td>
                        
                        <td>
                        <a href="auditoria_sistema.php?
                        id=<?php echo $datossistema['id']?>"><button class="registro">Historial</a></button>
                        <a><button class="editar">Editar</button></a>
                        <a href="../php/act_sistemariego.php?
                        id=<?php echo $datossistema['id']?>"><button class="activar">Activar</a></button>
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