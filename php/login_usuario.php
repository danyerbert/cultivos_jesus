<?php 
    
    include 'sweetalert.php';

   session_start();

    include 'conexion.php';

    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $contrasena_encriptada = md5($contrasena);

    $validar_login = mysqli_query ($conexion, "SELECT * FROM usuarios WHERE
    usuario='$usuario' and contrasena='$contrasena_encriptada' and estatus='1'");

    $resultado= mysqli_fetch_array($validar_login);

    $usuario_activo=$resultado['id'];

    $query = "INSERT INTO historial_inicio_sesion (usuario_id)
    VALUES ($usuario_activo)";

if($resultado['rol_id']==1) {
    $_SESSION['usuario'] = $usuario;
    header("location: ../superadministrador/inicio.php");
    $historial_inicio_sesion = mysqli_query ($conexion, $query);
    exit;
}
else if($resultado['rol_id']==2) {
    $_SESSION['usuario'] = $usuario;
    header("location: ../administrador/inicio.php");
    $historial_inicio_sesion = mysqli_query ($conexion, $query);
    exit;
/* if(mysqli_num_rows ($validar_login) > 0) {
    $_SESSION['usuario'] = $usuario;
    header("location: ../inicio.php");
    exit; */
} else if($resultado['rol_id']==3) {
    $_SESSION['usuario'] = $usuario;
    header("location: ../usuario/inicio.php");
    $historial_inicio_sesion = mysqli_query ($conexion, $query);
    exit;
    
}  else {
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

    exit;
}

?>