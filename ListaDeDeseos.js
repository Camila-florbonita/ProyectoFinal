var req = new XMLHttpRequest();
var req3 = new XMLHttpRequest();

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

function remove(id)
{
    req3.open("GET", "ListaQuitar.php?id_h=" + id);
    req3.send();
    window.location.href = "ListaDeDeseos.html";
}