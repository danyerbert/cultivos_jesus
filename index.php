
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sistema Control de Cultivos</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">
</head>
<nav>
<img class="logo" src="imagenes/universidad.png">
<img align="right" class="logo" src="imagenes/logo.png">
</nav>
<body>
    <div class="contenedor_principal">

        <div class="caja__fondo">

            <div class="caja__fondo-recuperacion">
            <h3>Iniciar Sesion</h3>
            <p>Sistema de Información Integral para el Control del Proceso de Riego de Cultivos</p>
            <button id="iniciar_sesion">Iniciar Sesion</button>
            </div>

            <div class="caja__fondo-login">
                <h3>Bienvenido</h3>
                <p>Sistema de Información Integral para el Control del Proceso de Riego de Cultivos</p>
                <button id="recuperar_contrasena">Recuperar Contraseña</button>
            </div>

        </div>
        <div class="contenedor_login">
            <form action="php/login_usuario.php" method="post" class="formulario_login">
                <h2>Iniciar Sesión</h2>
                <input type="text" placeholder="Usuario" name="usuario">
                <input type="password" placeholder="Contraseña" name="contrasena" id="Contrasena">
                <img src="imagenes/mostrar.png" class=iconomostrar id="Ojo">
                <button>Ingresar</button>
            </form>

            <form action="" method="post" class="formulario_recuperacion">
                <h2>Recuperar Contraseña</h2>
                <p>Por favor ingrese su direccion de correo electronico relacionada a un usuario</p>
                <input type="text" placeholder="Correo Electronico" name="correo">
                <button>Enviar</button>
            </form>

        </div>
    </div>
    <br>
    <br>
    <br>
    <h4 class="autores" align="center">Autores: Jesus Rosales, Julio Ramirez</h4>
    <h4 class="autores" align="center">Tutora: Prof. Carina Garcia</h4>
    <script src="js/mostrarcontrasena.js"></script>
    <script src="js/recuperar_contrasena.js"></script>
</body>
</html>