<?php

include 'conexion.php';
include 'sweetalert.php';

$id = $_GET['id'];

$query = "UPDATE usuarios SET estatus='1' WHERE id=$id" ;

$ejecutar = mysqli_query($conexion, $query);

if ($ejecutar) {
    echo '
    <script>
        Swal.fire({
        icon: "success",
        title: "Usuario Activado",
        text: "El usuario fue activado exitosamente",
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
        text: "El usuario no fue activado",
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