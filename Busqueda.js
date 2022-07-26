var reqB = new XMLHttpRequest();

document.addEventListener('DOMContentLoaded', 
function busqueda()
{
    reqB.onload = function FindPrendas(){
    var prendas = document.getElementById("producto");
    
    prendas.innerHTML = req.responseText;
}
    reqB.open("GET", "Buscar.php?");
    reqB.send();

}, false);