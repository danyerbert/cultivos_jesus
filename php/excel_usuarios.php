<?php
require 'conexion.php';
$query=mysqli_query($conexion,"SELECT * FROM usuarios where estatus = '1'");
$documento_usuario="usuarios.xls";
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename=' .$documento_usuario);
header('Pragma: no-cache');
header('Expires: 0');
echo '<table border=1>';
echo '<tr>';
echo '<th colspan=6 rowspan=2>Informacion Usuarios Registrados</th>';
echo '</tr>';
echo '<tr>';
echo '</tr>';
echo '<tr><th>Nombres</th><th>Apellidos</th><th>Documento Identidad</th><th>Correo</th><th>Usuario</th><th>Fecha de Registro</th></tr>';
while ($row=mysqli_fetch_array($query)) {
    echo '<tr>';
    echo '<td>'.$row['nombres'].'</td>';
    echo '<td>'.$row['apellidos'].'</td>';
    echo '<td>'.$row['documento_identidad'].'</td>';
    echo '<td>'.$row['correo'].'</td>';
    echo '<td>'.$row['usuario'].'</td>';
    echo '<td>'.$row['fecha_registro'].'</td>';
    echo '</tr>';
}
echo '</table>';