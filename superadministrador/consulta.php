<?php
    include '../php/conexion.php';
    include '../php/redireccion.php';
    
    $consulta = "SELECT *, mi.nombre AS inicio, mf.nombre AS fin FROM inf_cultivos i left join epocacultivo e on i.id = e.inf_cultivos_id  INNER join meses mi  on (e.inicio_cultivo = mi.id)  INNER join meses mf  on (e.fin_cultivo = mf.id);" ;
    
    $ejecutar = mysqli_query($conexion, $consulta);

    $infcultivos = $ejecutar;

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content=”text/html>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informacion Cultivos</title>
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

            <a href="cultivos.php" class="opcion">
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

            <a href="consulta.php" class="seleccion">
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
        <h1>INFORMACION DE LOS CULTIVOS</h1>
        <br>
        <br>
        <div>
            <table id="tabla_inf_cultivos">
                <thead>
                    <tr>
                        <th rowspan="2">Cultivo</th>
                        <th rowspan="2">Epoca de Siembra Recomendada (meses)</th>
                        <th rowspan="2">Ciclo</th>
                        <th rowspan="2">Rendimiento</th>
                        <th colspan="2">Distancia de Siembra</th>
                        <th colspan="2">Tipo de Siembra</th>
                    </tr>
                    <td>Hileras (cm)</td>
                    <td>Plantas (cm)</td>
                    <td>Directa</td>
                    <td>Transplante</td>
                </thead>
                <tbody>
                    <?php 
                        foreach ($infcultivos as $infcultivo) {
                    ?>
                    <tr>
                        <td><?php echo $infcultivo['nombre_cultivo']?></td>
                        <td><?php echo $infcultivo['inicio']?> - <?php echo $infcultivo['fin']?></td>
                        <td><?php echo $infcultivo['ciclo_dias']?></td>
                        <td><?php echo $infcultivo['rendimiento']?></td>
                        <td><?php echo $infcultivo['distancia_hileras']?></td>
                        <td><?php echo $infcultivo['distancia_plantas']?></td>
                        <?php if ($infcultivo['siembra_directa']==1) { ?>
                        <td><?php  echo 'x'  ?></td>
                        <?php } else { ?>
                        <td><?php  echo ''  ?></td>
                        <?php } ?>
                        <?php if ($infcultivo['siembra_trasplante']==1) { ?>
                        <td><?php  echo 'x'  ?></td>
                        <?php } else { ?>
                        <td><?php  echo ''  ?></td>
                        <?php } ?>
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