<?php

include 'conexion.php';
include 'sweetalert.php';

$id = $_GET['id'];

$query = "UPDATE cultivos SET estatus='1' WHERE id=$id" ;

$ejecutar = mysqli_query($conexion, $query);

if ($ejecutar) {
    echo '
    <script>
        Swal.fire({
        icon: "success",
        title: "Cultivo Activado",
        text: "El cultivo fue activado exitosamente",
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
        title: "Error",
        text: "El Cultivo no fue activado",
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