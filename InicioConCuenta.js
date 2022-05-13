const req = new XMLHttpRequest();

document.addEventListener('DOMContentLoaded', 
function inicio()
{
     req.onload = function InicioUsuario(){
     var prendas = document.getElementById("elementoR");
     var container = document.getElementById("recomendaciones");
    
     container.innerHTML = req.responseText;
}
    req.open("GET", "Algoritmo.php?");
    req.send();

}, false);