var reqB = new XMLHttpRequest();

document.addEventListener('DOMContentLoaded', 
function busqueda()
{
    reqB.onload = function FindPrendas(){
    var prendas = document.getElementById("producto");
    
    prendas.innerHTML = reqB.responseText;
}
    reqB.open("GET", "Buscar.php?");
    reqB.send();

}, false);