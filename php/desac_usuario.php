<?php

include 'conexion.php';
include 'sweetalert.php';

$id = $_GET['id'];

$query = "UPDATE usuarios SET estatus='0' WHERE id=$id" ;

$ejecutar = mysqli_query($conexion, $query);

if ($ejecutar) {
    echo '
    <script>
        Swal.fire({
        icon: "success",
        title: "Usuario Desactivado",
        text: "El usuario fue desactivado exitosamente",
        showConfirmButton: true,
        confirmButtonText: "Cerrar"
        }).then(function(result){
        if(result.value){                   
        window.location = "../usuarios.php";
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
        text: "El usuario no fue desactivado",
        showConfirmButton: true,
        confirmButtonText: "Cerrar"
        }).then(function(result){
        if(result.value){                   
        window.location = "../usuarios.php";
        }
        });
    </script>
    ';
}

mysqli_close ($conexion);

?>