<?php

include 'conexion.php';
include 'sweetalert.php';

$id = $_GET['id'];

$query = "UPDATE sensor_temp_hum SET estatus='1' WHERE id=$id" ;

$ejecutar = mysqli_query($conexion, $query);

if ($ejecutar) {
    echo '
    <script>
        Swal.fire({
        icon: "success",
        title: "Sensor de Humedad Activado",
        text: "El sensor fue activado exitosamente",
        showConfirmButton: true,
        confirmButtonText: "Cerrar"
        }).then(function(result){
        if(result.value){                   
        window.location = "../sensores_humedad.php";
        }
        });
    </script>
    ';
} else {
    echo '
    <script>
        Swal.fire({
        icon: "error",
        title: "Error",
        text: "El Sensor de Humedad no fue activado",
        showConfirmButton: true,
        confirmButtonText: "Cerrar"
        }).then(function(result){
        if(result.value){                   
        window.location = "../sensores_humedad.php";
        }
        });
    </script>
    ';
}

mysqli_close ($conexion);

?>