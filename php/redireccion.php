<?php
    include 'sweetalert.php';

    session_start(); 

    if (!isset($_SESSION['usuario'])) {
        echo '
        <script>
            Swal.fire({
            icon: "error",
            title: "Error",
            text: "Por favor inicar sesión para acceder",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"
            }).then(function(result){
            if(result.value){                   
            window.location = "index.php";
            }
            });
        </script>
        ';
        session_destroy();
        die ();
    }

?>