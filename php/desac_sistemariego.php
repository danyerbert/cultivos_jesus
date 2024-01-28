<?php

include 'conexion.php';
include 'sweetalert.php';

$id = $_GET['id'];

$query = "UPDATE sistema_riego SET estatus='0' WHERE id=$id" ;

$ejecutar = mysqli_query($conexion, $query);

if ($ejecutar) {
    echo '
    <script>
        Swal.fire({
        icon: "success",
        title: "Sistema de Riego Desactivado",
        text: "El sistema de riego fue desactivado exitosamente",
        showConfirmButton: true,
        confirmButtonText: "Cerrar"
        }).then(function(result){
        if(result.value){                   
        window.location = "../sistemas_riego.php";
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
        text: "El Sistema de Riego no fue desactivado",
        showConfirmButton: true,
        confirmButtonText: "Cerrar"
        }).then(function(result){
        if(result.value){                   
        window.location = "../sistemas_riego.php";
        }
        });
    </script>
    ';
}

mysqli_close ($conexion);

?>