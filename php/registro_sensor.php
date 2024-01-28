<?php

    include 'conexion.php';
    include 'sweetalert.php';

    $numero_bien_nacional = $_POST['numero_bien_nacional'];
    $descripcion = $_POST['descripcion'];

    $query = "INSERT INTO sensor_temp_hum(numero_bien_nacional, descripcion)
    VALUES ('$numero_bien_nacional', '$descripcion')";


    //Validar que el numero de bien no se repita
    $consulta_num_bien = "SELECT * FROM sensor_temp_hum WHERE numero_bien_nacional='$numero_bien_nacional'";
    $validar_num_bien = mysqli_query ($conexion, $consulta_num_bien);

    if (mysqli_num_rows ($validar_num_bien) > 0) {
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
            title: "Sensor Registrado",
            text: "El sensor fue registrado exitosamente",
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
            title: "Registro Fallido",
            text: "El sensor no fue registrado",
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