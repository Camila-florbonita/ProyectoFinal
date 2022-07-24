var req = new XMLHttpRequest();

document.addEventListener('DOMContentLoaded', 
function historial()
{
     req.onload = function HistorialUsuario(){
     var prendas = document.getElementById("producto");
    
     prendas.innerHTML = req.responseText;
}
    req.open("GET", "ListaDeDeseos.php?");
    req.send();

}, false);