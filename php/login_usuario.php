<?php 
    
    include 'sweetalert.php';

   session_start();

    include 'conexion.php';

    $usuario = $_POST['usuario'];
    if (!preg_match("/[a-z0-9]{4,20}/", $usuario)) {
        echo '
            <script>
                Swal.fire({
                icon: "error",
                title: "Usuario no encontrado",
                text: "Por favor verifique los datos e intentelo nuevamente",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"
                }).then(function(result){
                if(result.value){                   
                window.location = "../index.php";
                }
                });
            </script>
    ';
    }
    $contrasena = $_POST['contrasena'];
    // if (!preg_match("/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/", $contrasena)) {
    //     echo '
    //         <script>
    //             Swal.fire({
    //             icon: "error",
    //             title: "Usuario no encontrado",
    //             text: "Por favor verifique los datos e intentelo nuevamente",
    //             showConfirmButton: true,
    //             confirmButtonText: "Cerrar"
    //             }).then(function(result){
    //             if(result.value){                   
    //             window.location = "../index.php";
    //             }
    //             });
    //         </script>
    // ';
    // }
    $contrasena_encriptada = md5($contrasena);

    $validar_login = mysqli_query ($conexion, "SELECT * FROM usuarios WHERE
    usuario='$usuario' and contrasena='$contrasena_encriptada' and estatus='1'");

    $resultado= mysqli_fetch_array($validar_login);

    $usuario_activo=$resultado['id'];

    $query = "INSERT INTO historial_inicio_sesion (usuario_id)
    VALUES ($usuario_activo)";

    switch ($resultado['rol_id']) {
        case 1:
            # En este caso ya verificado que sea el super-administrador lo redirigue a la vista del administrador.
            $_SESSION['usuario'] = $usuario;
            header("location: ../superadministrador/inicio.php");
            $historial_inicio_sesion = mysqli_query ($conexion, $query);
                exit;
            break;
        case 2:
            # En este caso ya verificado que sea el administrador lo redirigue a la vista del administrador.
            $_SESSION['usuario'] = $usuario;
            header("location: ../administrador/inicio.php");
            $historial_inicio_sesion = mysqli_query ($conexion, $query);
                exit;
            break;
        case 3:
            # En este caso ya verificado que sea el usuario lo redirigue a la vista del usuario.
            $_SESSION['usuario'] = $usuario;
            header("location: ../usuario/inicio.php");
            $historial_inicio_sesion = mysqli_query ($conexion, $query);
                exit;
            break;
        default:
            # si no pertenece a ninguno de los roles, se devolvera a incio
            echo '
            <script>
                Swal.fire({
                icon: "error",
                title: "Usuario no encontrado",
                text: "Por favor verifique los datos e intentelo nuevamente",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"
                }).then(function(result){
                if(result.value){                   
                window.location = "../index.php";
                }
                });
            </script>
    ';
            break;
    }

// if($resultado['rol_id']==1) {
//     $_SESSION['usuario'] = $usuario;
//     header("location: ../superadministrador/inicio.php");
//     $historial_inicio_sesion = mysqli_query ($conexion, $query);
//     exit;
// }
// else if($resultado['rol_id']==2) {
//     $_SESSION['usuario'] = $usuario;
//     header("location: ../administrador/inicio.php");
//     $historial_inicio_sesion = mysqli_query ($conexion, $query);
//     exit;
// /* if(mysqli_num_rows ($validar_login) > 0) {
//     $_SESSION['usuario'] = $usuario;
//     header("location: ../inicio.php");
//     exit; */
// } else if($resultado['rol_id']==3) {
//     $_SESSION['usuario'] = $usuario;
//     header("location: ../usuario/inicio.php");
//     $historial_inicio_sesion = mysqli_query ($conexion, $query);
//     exit;
    
// }  else {
//     echo '
//     <script>
//         Swal.fire({
//         icon: "error",
//         title: "Usuario no encontrado",
//         text: "Por favor verifique los datos e intentelo nuevamente",
//         showConfirmButton: true,
//         confirmButtonText: "Cerrar"
//         }).then(function(result){
//         if(result.value){                   
//         window.location = "../index.php";
//         }
//         });
//     </script>
//     ';

//     exit;
// }

?>