<?php

    include 'conexion.php';
    include 'sweetalert.php';

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $sensor_humedad_id = $_POST['sensor_humedad'];
    $sistema_riego_id = $_POST['sistema_riego'];
    $ubicacion = $_POST{'ubicacion'};

    $query = "UPDATE cultivos SET nombre='$nombre', sensor_humedad_id='$sensor_humedad_id', sistema_riego_id=$sistema_riego_id, ubicacion='$ubicacion' WHERE id=$id" ;
    $ejecutar = mysqli_query($conexion, $query);

    if ($ejecutar) {
        echo '
        <script>
            Swal.fire({
            icon: "success",
            title: "Cultivo Actualizado",
            text: "El cultivo fue actualizado exitosamente",
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
            title: "Actualizacion Fallida",
            text: "El cultivo no fue actualizado",
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