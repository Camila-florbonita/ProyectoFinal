var reqB = new XMLHttpRequest();

document.addEventListener('DOMContentLoaded', 
function busqueda()
{
    req.onload = function FindPrendas(){
    var prendas = document.getElementById("producto");
    
    prendas.innerHTML = req.responseText;
}
    req.open("GET", "Buscar.php?");
    req.send();

}, false);