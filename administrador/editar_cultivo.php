<?php
    include '../php/redireccion.php';
    include '../php/conexion.php'; 
    
    // Consulta Informacion Cultivo
    $infcultivosregistrados = "SELECT * FROM inf_cultivos";
    $ejecutarinfcultivos = mysqli_query($conexion, $infcultivosregistrados);
    $datosinfcultivos = $ejecutarinfcultivos;

    // Sensor Humedad
    $sensoresregistrados = "SELECT * FROM sensor_temp_hum";
    $ejecutarsensores = mysqli_query($conexion, $sensoresregistrados);
    $datossensores = $ejecutarsensores;

    // Mes Inicio Cultivo
    $mesesiniciocultivo = "SELECT * FROM meses";
    $ejecutarmeses = mysqli_query($conexion, $mesesiniciocultivo);
    $datosmeses = $ejecutarmeses;

    // Sistema de Riego
    $sistemariego = "SELECT * FROM sistema_riego";
    $ejecutarsistemariego = mysqli_query($conexion, $sistemariego);
    $datossistemasriego = $ejecutarsistemariego;
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cultivos</title>
    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/cultivos.css">
</head>
<body id="body">
<?php
    $id = $_GET['id'];
    $nombre = $_GET['nombre'];
    $sensor_humedad_id = $_GET['sensor_humedad_id'];
    $inicio_cultivo_id = $_GET['inicio_cultivo_id'];
    $sistema_riego_id = $_GET['sistema_riego_id'];
    $ubicacion = $_GET{'ubicacion'};
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
        <h1>Editar un Cultivo</h1>
        <br>
        <div class="contenedor_login">
            <form action="../php/actualizacion_cultivo.php" method="post" class="formulario_registro">
                
                <input type="text" placeholder="Nombre" name="nombre" required value="<?=$nombre?>"> 
                <br>
                <br>
                <label>Tipo de Cultivo:</label>
                <br>
                <select name="consulta_cultivo">
                    <option value=""></option>
                   <?php 
                        foreach ($datosinfcultivos as $datosinfcultivo) {
                    ?>
                    <option value="<?php echo $datosinfcultivo['id']?>"><?php echo $datosinfcultivo['nombre_cultivo']?></option>
                    <?php
                }
                ?>  
                </select>
                <br>
                <br>
                <label>Sensor de Humedad y Temperatura:</label>
                <br>
                <select name="sensor_humedad" required value="<?=$sensor_humedad_id?>">
                    <option value=""></option>
                   <?php 
                        foreach ($datossensores as $datossensor) {
                    ?>
                    <option value="<?php echo $datossensor['id']?>"><?php echo $datossensor['descripcion']?></option>
                    <?php
                }
                ?>  
                </select>
                <br>
                <br> 
                <label>Sistema de Riego:</label>
                <br>
                <select name="sistema_riego" required value="<?=$sistema_riego_id?>">
                    <option value=""></option>
                    <?php 
                        foreach ($datossistemasriego as $datossistemariego) {
                    ?>
                    <option value="<?php echo $datossistemariego['id']?>"><?php echo $datossistemariego['descripcion']?></option>
                    <?php
                }
                ?>  
                </select>
                <br>
                <input type="text" placeholder="Ubicacion" name="ubicacion" required value="<?=$ubicacion?>">
                <br> 
                <button>Actualizar</button>
                <input type="text" placeholder="Id" name="id" value="<?=$id?>" style="visibility:hidden">
            </form> 
        </div>
    </main>
</body>
</html>