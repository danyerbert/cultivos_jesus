
document.getElementById("recuperar_contrasena").addEventListener("click", recuperar);
document.getElementById("iniciar_sesion").addEventListener("click", iniciarSesion);

var contenedor_login = document.querySelector(".contenedor_login");
var formulario_login = document.querySelector(".formulario_login");
var formulario_recuperacion = document.querySelector(".formulario_recuperacion");
var caja_fondo_login = document.querySelector(".caja__fondo-login");
var caja_fondo_recuperacion = document.querySelector(".caja__fondo-recuperacion");

function recuperar(){
    formulario_recuperacion.style.display = "block";
    contenedor_login.style.left = "410px";
    formulario_login.style.display = "none";
    caja_fondo_recuperacion.style.opacity = "1";
    caja_fondo_login.style.opacity = "0";
}

function iniciarSesion(){
    formulario_recuperacion.style.display = "none";
    contenedor_login.style.left = "10px";
    formulario_login.style.display = "block";
    caja_fondo_recuperacion.style.opacity = "0";
    caja_fondo_login.style.opacity = "1";
}