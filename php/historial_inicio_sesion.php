<?php
require 'conexion.php';

$historiallogin = "";
$query=mysqli_query($conexion,"SELECT *, u.nombres AS nombreusuario, r.nombre AS rolusuario FROM historial_inicio_sesion h LEFT JOIN usuarios u on (h.usuario_id = u.id) INNER JOIN roles r ON (u.rol_id = r.id) ORDER BY h.id DESC limit 200");
$documento_historial="historial_inicio_sesion.xls";
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename=' .$documento_historial);
header('Pragma: no-cache');
header('Expires: 0');
echo '<table border=1>';
echo '<tr>';
echo '<th colspan=6 rowspan=2>Historial Inicio de Sesion</th>';
echo '</tr>';
echo '<tr>';
echo '</tr>';
echo '<tr><th>Usuario</th><th>Rol</th><th>Fecha de Registro</th></tr>';
while ($row=mysqli_fetch_array($query)) {
    echo '<tr>';
    echo '<td>'.$row['nombreusuario'].'</td>';
    echo '<td>'.$row['rolusuario'].'</td>';
    echo '<td>'.$row['fecha_registro'].'</td>';
    echo '</tr>';
}
echo '</table>';