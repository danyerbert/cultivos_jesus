<?php
require 'conexion.php';
$query=mysqli_query($conexion,"SELECT * FROM sensor_temp_hum WHERE estatus = '1'");
$documento_sensores="sensores_humedad.xls";
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename=' .$documento_sensores);
header('Pragma: no-cache');
header('Expires: 0');
echo '<table border=1>';
echo '<tr>';
echo '<th colspan=6 rowspan=2>Informacion Sensores Registrados</th>';
echo '</tr>';
echo '<tr>';
echo '</tr>';
echo '<tr><th>Numero de Bien Nacional</th><th>Descripcion</th><th>Fecha de Registro</th></tr>';
while ($row=mysqli_fetch_array($query)) {
    echo '<tr>';
    echo '<td>'.$row['numero_bien_nacional'].'</td>';
    echo '<td>'.$row['descripcion'].'</td>';
    echo '<td>'.$row['fecha_registro'].'</td>';
    echo '</tr>';
}
echo '</table>';