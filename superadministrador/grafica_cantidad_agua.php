<?php

    include '../php/redireccion.php';

$database ="controldecultivos"; $user = 'root';

$pass = '';

$id_sistema_riego = $_GET['sistema_riego_id'];

$anio = 0;

$pastel_jsonTable = 0;

try {

$conn = new PDO("mysql:host=localhost; dbname=$database", $user, $pass); $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$barra = $conn->query("SELECT MONTHNAME(fecha_registro) as Mes, sum(litros_agua_hora) as cantidad_agua_mes FROM auditoria_sistema_riego WHERE sistema_riego_id = $id_sistema_riego GROUP BY YEAR(fecha_registro)");

$barra_rows = array();

$barra_table = array();

$barra_table['cols'] = array(

array('label' => 'Mes', 'type' => 'string'), array('label' => 'Cantidad Agua por Mes', 'type' => 'number')

);

foreach($barra as $b){

$barra_temp = array();

$barra_temp[] = array('v' => (string) $b['Mes']);

$barra_temp[] = array('v' => (int) $b['cantidad_agua_mes']);

$barra_rows[] = array('c' => $barra_temp);

}

$barra_table['rows'] = $barra_rows;

$barra_jsonTable = json_encode($barra_table);

} catch (PDOException $e) { echo 'ERROR: '.$e->getMessage();

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistemas de Riego</title>
    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/consulta.css">
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

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

            <a href="sistemas_riego.php" class="seleccion">
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
    <script type="text/javascript">

google.load('visualization', '1', {'packages':["corechart"]});

google.setOnLoadCallback(drawChartBarra);function drawChartBarra() {

var data = new google.visualization.DataTable(<?=$barra_jsonTable?>);

var option = {

title: 'Grafica',

is3D: 'true',

width: 800,

height: 500

};

var chart = new google.visualization.BarChart(document.getElementById('grafico_Barra'));

chart.draw(data, option);

}

</script>

    <main>
        <h1>GRAFICA CANTIDAD DE AGUA POR MES</h1>
        <br>
    <div class="contenedor_login">
    <div id="grafico_Barra">
    </div>
    </main>
</body>
</html>