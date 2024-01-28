<?php

    include 'conexion.php';
    include 'sweetalert.php';

    $id = $_POST['id'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    //$tipo_documento = $_POST['tipo_documento'];
    $documento_identidad = $_POST['documento_identidad'];
    $correo = $_POST{'correo'};
    $usuario = $_POST['usuario']; 
    $contrasena = $_POST['contrasena'];
    $contrasena_encriptada = md5($contrasena);

    $query = "UPDATE usuarios SET nombres='$nombres', apellidos='$apellidos', documento_identidad=$documento_identidad, correo='$correo', usuario='$usuario', contrasena='$contrasena_encriptada' WHERE id=$id" ;

    //Validar que el correo no se repita
    $consulta_correo = "SELECT * FROM usuarios WHERE correo='$correo'";
    $validar_correo = mysqli_query ($conexion, $consulta_correo);

    if (mysqli_num_rows ($validar_correo) > 1) {
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

    if (mysqli_num_rows ($validar_usuario) > 1) {
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
            title: "Usuario Actualizado",
            text: "El usuario fue actualizado exitosamente",
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
            title: "Actualizacion Fallida",
            text: "El usuario no fue actualizado",
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