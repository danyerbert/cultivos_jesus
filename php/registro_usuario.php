<?php

    include 'conexion.php';
    include 'sweetalert.php';
    if ($_POST) {
        # Esta validacion es simple, es para comprobar que existe un envio. Se pueden hacer de diferente formas, pero eso queda de parte de ustedes.
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
        mysqli_close ($conexion);
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
        $nombres = $_POST['nombres'];
        # Validamos que los caracteres que se guardaron en la variable sean los permitidos.
        if (!preg_match("/[a-zA-Z\s]{4,20}/", $nombres)) {
            # Mensaje para notificar que el nombre no cumplio con los caracteres establecidos para el registro
            echo '
            <script>
                Swal.fire({
                icon: "error",
                title: "Registro Fallido",
                text: "Los nombres no cumplen con los caracteres especificados.",
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
        $apellidos = $_POST['apellidos'];
        if (!preg_match("/[a-zA-Z\s]{20}/", $apellidos)) {
             # Mensaje para notificar que los apellidos no cumplen con los caracteres establecidos para el registro
             echo '
             <script>
                 Swal.fire({
                 icon: "error",
                 title: "Registro Fallido",
                 text: "Los apellidos no cumplen con los caracteres especificados.",
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
        $tipo_documento = $_POST['tipo_documento'];
        if ($tipo_documento == "") {
             # Mensaje para notificar que el debe seleccionar un tipo de documento.
             echo '
             <script>
                 Swal.fire({
                 icon: "error",
                 title: "Registro Fallido",
                 text: "Seleccione un tipo de documento.",
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
        $documento_identidad = $_POST['documento_identidad'];
        if (!preg_match("/\b/", $documento_identidad)) {
             # Mensaje para notificar que el documento ingresado no son numeros.
             echo '
             <script>
                 Swal.fire({
                 icon: "error",
                 title: "Registro Fallido",
                 text: "Debe ingresar solo datos numericos.",
                 showConfirmButton: true,
                 confirmButtonText: "Cerrar"
                 }).then(function(result){
                 if(result.value){                   
                 window.location = "../usuarios.php";
                 }
                 });
             </script>
             ';
        }elseif (!preg_match("/[0-9]{8,9}/", $documento_identidad)) {
           # Mensaje para notificar que el documento ingresado no son numeros.
           echo '
           <script>
               Swal.fire({
               icon: "error",
               title: "Registro Fallido",
               text: "Debe ingresar solo datos numericos.",
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
        $correo = $_POST['correo']; 
        if (!preg_match("/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/", $correo)) {
            # Mensaje para notificar que el correo ingresado no es correcto.
            echo '
            <script>
                Swal.fire({
                icon: "error",
                title: "Registro Fallido",
                text: "Debe ingresar un correo valido.",
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
        $usuario = $_POST['usuario'];
        if (!preg_match("/[a-zA-Z]{9,11}/", $usuario)) {
            # Mensaje para notificar que el usuario no esta en el formato solicitado.
            echo '
            <script>
                Swal.fire({
                icon: "error",
                title: "Registro Fallido",
                text: "Debe ingresar un usuario con los caracteres validos.",
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
        $contrasena = $_POST['contrasena'];
        if (!preg_match("/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/", $contrasena)) {
            # Mensaje para notificar que la contraseña no cumple con los caracteres especifico.
            echo '
            <script>
                Swal.fire({
                icon: "error",
                title: "Registro Fallido",
                text: "Debe ingresar una contraseña con los caracteres especificos.",
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
        $rol = $_POST['rol'];
        if ($rol == "") {
            #Mensaje para verificar si envian el rol vacio.
            echo '
            <script>
                Swal.fire({
                icon: "error",
                title: "Registro Fallido",
                text: "El rol no debe estar vacio.",
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
        $contrasena_encriptada = md5($contrasena);

        $query = "INSERT INTO usuarios(nombres, apellidos, tipo_documento, documento_identidad, correo, usuario, contrasena, rol_id)
        VALUES ('$nombres', '$apellidos', '$tipo_documento', '$documento_identidad', '$correo', '$usuario', '$contrasena_encriptada', '$rol' )";
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
    }
    
    
?>