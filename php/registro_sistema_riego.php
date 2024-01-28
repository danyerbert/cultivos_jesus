<?php

    include 'conexion.php';
    include 'sweetalert.php';

    $numero_bien_nacional = $_POST['numero_bien_nacional'];
    $descripcion = $_POST['descripcion'];

    $query = "INSERT INTO sistema_riego(numero_bien_nacional, descripcion)
    VALUES ('$numero_bien_nacional', '$descripcion')";


    //Validar que el numero de bien no se repita
    $consulta_num_bien = "SELECT * FROM sistema_riego WHERE numero_bien_nacional='$numero_bien_nacional'";
    $validar_num_bien = mysqli_query ($conexion, $consulta_num_bien);

    if (mysqli_num_rows ($validar_num_bien) > 0) {
        echo '
        <script>
            Swal.fire({
            icon: "warning",
            title: "Inténtelo Nuevamente",
            text: "Ya existe un sistema de riego registrado con ese numero de bien nacional",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"
            }).then(function(result){
            if(result.value){                   
            window.location = "../sistemas_riego.php";
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
            title: "Sistema de Riego Registrado",
            text: "El sistema de riego fue registrado exitosamente",
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
            title: "Registro Fallido",
            text: "El sistema de riego no fue registrado",
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