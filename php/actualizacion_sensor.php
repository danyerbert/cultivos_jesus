<?php

    include 'conexion.php';
    include 'sweetalert.php';

    $id = $_POST['id'];
    $numero_bien_nacional = $_POST['numero_bien_nacional'];
    $descripcion = $_POST['descripcion'];

    $query = "UPDATE sensor_temp_hum SET numero_bien_nacional='$numero_bien_nacional', descripcion='$descripcion' WHERE id=$id" ;

    //Validar que el numero de bien no se repita
    $consulta_num_bien = "SELECT * FROM sensor_temp_hum WHERE numero_bien_nacional='$numero_bien_nacional'";
    $validar_num_bien = mysqli_query ($conexion, $consulta_num_bien);

    if (mysqli_num_rows ($validar_num_bien) > 1) {
        echo '
        <script>
            Swal.fire({
            icon: "warning",
            title: "Inténtelo Nuevamente",
            text: "Ya existe un sensor registrado con ese numero de bien nacional",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"
            }).then(function(result){
            if(result.value){                   
            window.location = "../sensores_humedad.php";
            }
            });
        </script>
        ';
        exit ();
        mysqli_close ($conexion);
    }
    //Fin validación bien nacional

    $ejecutar = mysqli_query($conexion, $query);

    if ($ejecutar) {
        echo '
        <script>
            Swal.fire({
            icon: "success",
            title: "Sensor de Humedad Actualizado",
            text: "El sensor fue actualizado exitosamente",
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
            title: "Actualizacion Fallida",
            text: "El sensor no fue actualizado",
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