//Ejecutar función al momento de hacer click

document.getElementById("abrir_boton").addEventListener("click", abrir_cerrar_menu)

var menu_lateral = document.getElementById("menu_lateral");
var abrir_boton = document.getElementById("abrir_boton");
var body = document.getElementById("body");

//Mostrar y ocultar el menú

function abrir_cerrar_menu() {
    body.classList.toggle("desplazamiento");
    menu_lateral.classList.toggle("desplazamiento_lateral");
}

if (window.innerWidth < 760) {
    body.classList.add("desplazamiento");
    menu_lateral.classList.add("desplazamiento_lateral");
}