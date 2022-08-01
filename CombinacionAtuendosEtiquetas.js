var req = new XMLHttpRequest();

document.addEventListener('DOMContentLoaded', 
function combinacion()
{
     req.onload = function combAtuendos(){
     var prendas = document.getElementById("producto");
    
     prendas.innerHTML = req.responseText;
}
    req.open("GET", "AlgoritmoEtiquetas.php?");
    req.send();

}, false);