<?php
require 'conexion.php';
$query=mysqli_query($conexion,"SELECT * FROM cultivos WHERE estatus = '0'");
$documento_cultivos_desac="cultivos.xls";
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename=' .$documento_cultivos_desac);
header('Pragma: no-cache');
header('Expires: 0');
echo '<table border=1>';
echo '<tr>';
echo '<th colspan=6 rowspan=2>Informacion Cultivos Desactivados</th>';
echo '</tr>';
echo '<tr>';
echo '</tr>';
echo '<tr><th>Nombre</th><th>Usuario</th><th>Tipo de Cultivo</th><th>Sensor Humedad</th><th>Inicio de Cultivo</th><th>Tipo de Siembra</th><th>Sistema de Riego</th><th>Ubicacion</th></tr>';
while ($row=mysqli_fetch_array($query)) {
    echo '<tr>';
    echo '<td>'.$row['nombre'].'</td>';
    echo '<td>'.$row['usuario'].'</td>';
    echo '<td>'.$row['tipocultivo_id'].'</td>';
    echo '<td>'.$row['sensor_humedad_id'].'</td>';
    echo '<td>'.$row['inicio_cultivo_id'].'</td>';
    echo '<td>'.$row['tipo_siembra_id'].'</td>';
    echo '<td>'.$row['sistema_riego_id'].'</td>';
    echo '<td>'.$row['ubicacion'].'</td>';
    echo '</tr>';
}
echo '</table>';