var req = new XMLHttpRequest();

document.addEventListener('DOMContentLoaded', 
function buscar()
{
    req.onload = function buscarAdministrador(){
    var prendas = document.getElementById("producto");
    
    prendas.innerHTML = req.responseText;
}
    req.open("GET", "BusquedaAdmin.php?");
    req.send();

}, false);