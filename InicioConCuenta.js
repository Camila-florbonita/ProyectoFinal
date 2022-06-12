const req2 = new XMLHttpRequest();

document.addEventListener('DOMContentLoaded', 
function inicio()
{
     req.onload = function InicioUsuario(){
     var prendas = document.getElementById("recomendaciones");
    
     prendas.innerHTML = req.responseText;
}
    req.open("GET", "Algoritmo.php?");
    req.send();

    req2.onload = function IndexInicio(){
        var prendas = document.getElementById("sugerenciasOf");
       
        prendas.innerHTML = req2.responseText;
   }
       req2.open("GET", "indexOf.php?");
       req2.send();

}, false);