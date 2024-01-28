<?php

    include 'conexion.php';
    include 'sweetalert.php';

    session_start();

    $usuario_activo = $_SESSION['usuario'];

    // $prueba = "SELECT * FROM usuarios WHERE usuario='$usuario_activo'";

    $validar_usuario_activo = mysqli_query ($conexion, "SELECT * FROM usuarios WHERE usuario='$usuario_activo'");
    $resultado= mysqli_fetch_array($validar_usuario_activo);
    
    $nombre = $_POST['nombre'];
    $usuario = $resultado['id'];
    $consulta_cultivo = $_POST['consulta_cultivo'];
    $sensor_humedad = $_POST['sensor_humedad'];
    $mes_inicio_cultivo = $_POST['mes_inicio_cultivo'];
    $sistema_riego = $_POST['sistema_riego'];
    $ubicacion = $_POST['ubicacion'];
    $consulta_cultivo = $_POST['consulta_cultivo'];
    

    $query = "INSERT INTO cultivos(nombre, usuario_id, sensor_humedad_id, inicio_cultivo_id, sistema_riego_id, ubicacion, infcultivos_id)
    VALUES ('$nombre', $usuario, $sensor_humedad, $mes_inicio_cultivo, $sistema_riego, '$ubicacion', $consulta_cultivo)";

    $ejecutar = mysqli_query($conexion, $query);

    if ($ejecutar) {
        echo '
        <script>
            Swal.fire({
            icon: "success",
            title: "Cultivo Registrado",
            text: "El cultivo fue registrado exitosamente",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"
            }).then(function(result){
            if(result.value){                   
            window.location = "../cultivos.php";
            }
            });
        </script>
        ';
    } else {
        echo '
        <script>
            Swal.fire({
            icon: "error",
            title: "Registro Fallido",
            text: "El cultivo no fue registrado",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"
            }).then(function(result){
            if(result.value){                   
            window.location = "../cultivos.php";
            }
            });
        </script>
        ';
    }

    mysqli_close ($conexion);
    
?>