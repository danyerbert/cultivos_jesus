<?php
require 'conexion.php';
$query=mysqli_query($conexion,"SELECT * FROM sistema_riego WHERE estatus = '0'");
$documento_sistema_riego_desac="sistema_riego.xls";
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename=' .$documento_sistema_riego_desac);
header('Pragma: no-cache');
header('Expires: 0');
echo '<table border=1>';
echo '<tr>';
echo '<th colspan=6 rowspan=2>Informacion Sistemas de Riego Desactivados</th>';
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