<?php
    include 'php/redireccion.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/Inicio.css">
</head>
<body>
    <main>
        <h1>Control del Proceso de Riego de Cultivos(SICPRC)</h1>
        <div class="container_box">
            <a href="cultivos.php">
            <div class="box">
                <i class="lni lni-grow"></i>
                <h5>Cultivos</h5>
                <h4>Cultivos</h4>
            </div>
            </a>
            <a href="sistemas_riego.php">
            <div class="box">
                <i class="lni lni-spray"></i>
                <h5>Sistema de Riego</h5>
                <h4>Sistema de Riego</h4>
            </div>
            </a>
            <a href="sensores_humedad.php">
            <div class="box">
                <i class="lni lni-ruler-alt"></i>
                <h5>Sensor de Humedad</h5>
                <h4>Sensor de Humedad</h4>
            </div>
            </a>
            <a href="consulta.php">
            <div class="box">
                <i class="lni lni-library"></i>
                <h5>Consulta</h5>
                <h4>Consulta</h4>
            </div>
            </a>
            <a href="usuarios.php">
            <div class="box">
                <i class="lni lni-users"></i>
                <h5>Usuarios</h5>
                <h4>Usuarios</h4>
            </div>
            </a>
            <a href="php/cerrar_sesion.php">
            <div class="box">
                <i class="lni lni-power-switch"></i>
                <h5>Cerrar Sesión</h5>
                <h4>Cerrar Sesión</h4>
            </div>
            </a>
        </div>
    </main>
    <h4 class="autores" align="center">Autores:Jesus Rosales, Julio Ramirez</h4>
    <h4 class="autores" align="center">Tutora: Prof. Carina Garcia</h4>
</body>
</html>