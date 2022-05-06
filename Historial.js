const req = new XMLHttpRequest();

document.addEventListener('DOMContentLoaded', 
function historial()
{
     req.onload = function HistorialUsuario(){
     var prendas = document.getElementById("producto");
    
     prendas.innerHTML = req.responseText;
}
    req.open("GET", "Historial.php?");
    req.send();

}, false);