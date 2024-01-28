<?php
require 'conexion.php';

$id = $_GET['id'];

echo $id;

$query=mysqli_query($conexion,"SELECT * FROM auditoria_sistema_riego WHERE sistema_riego_id='$id' ORDER BY id DESC limit 100");
$documento_sistema_riego="historial_sistema_riego.xls";
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename=' .$documento_sistema_riego);
header('Pragma: no-cache');
header('Expires: 0');
echo '<table border=1>';
echo '<tr>';
echo '<th colspan=6 rowspan=2>Registro Valores Sensor de Humedad</th>';
echo '</tr>';
echo '<tr>';
echo '</tr>';
echo '<tr><th>Humedad</th><th>Temperatura</th><th>Tiempo de Riego</th><th>Fecha de Registro</th></tr>';
while ($row=mysqli_fetch_array($query)) {
    echo '<tr>';
    echo '<td>'.$row['auditoria_humedad'].'</td>';
    echo '<td>'.$row['auditoria_temperatura'].'</td>';
    echo '<td>'.$row['tiempo_riego'].'</td>';
    echo '<td>'.$row['fecha_registro'].'</td>';
    echo '</tr>';
}
echo '</table>';