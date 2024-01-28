<?php

    include 'conexion.php';
    include 'sweetalert.php';

    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $tipo_documento = $_POST['tipo_documento'];
    $documento_identidad = $_POST['documento_identidad'];
    $correo = $_POST['correo']; 
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $rol = $_POST['rol'];
    $contrasena_encriptada = md5($contrasena);

    $query = "INSERT INTO usuarios(nombres, apellidos, tipo_documento, documento_identidad, correo, usuario, contrasena, rol_id)
    VALUES ('$nombres', '$apellidos', '$tipo_documento', '$documento_identidad', '$correo', '$usuario', '$contrasena_encriptada', '$rol' )";

    //echo $query;
    //Validar que el correo no se repita
    $consulta_correo = "SELECT * FROM usuarios WHERE correo='$correo'";
    $validar_correo = mysqli_query ($conexion, $consulta_correo);

    if (mysqli_num_rows ($validar_correo) > 0) {
        echo '
        <script>
            Swal.fire({
            icon: "warning",
            title: "Inténtelo Nuevamente",
            text: "Ya existe un usuario registrado con esa dirección de correo electrónico",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"
            }).then(function(result){
            if(result.value){                   
            window.location = "../usuarios.php";
            }
            });
        </script>
        ';
        exit ();
        mysqli_close ($conexion);
    }
    //Fin validación correo

    
    //Validar que el usuario no se repita
    $consulta_usuario = "SELECT * FROM usuarios WHERE usuario='$usuario'";
    $validar_usuario = mysqli_query ($conexion, $consulta_usuario);

    if (mysqli_num_rows ($validar_usuario) > 0) {
        echo '
        <script>
            Swal.fire({
            icon: "warning",
            title: "Inténtelo Nuevamente",
            text: "El nombre de usuario ingresado no está disponible",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"
            }).then(function(result){
            if(result.value){                   
            window.location = "../usuarios.php";
            }
            });
        </script>
        ';     
        exit ();
        mysqli_close ($conexion);
    }
    //Fin validación usuario

    $ejecutar = mysqli_query($conexion, $query);

    if ($ejecutar) {
        echo '
        <script>
            Swal.fire({
            icon: "success",
            title: "Usuario Registrado",
            text: "El usuario fue registrado exitosamente",
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
            title: "Registro Fallido",
            text: "El usuario no fue registrado",
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