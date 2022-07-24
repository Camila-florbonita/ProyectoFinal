var reqqq = new XMLHttpRequest();
var req2 = new XMLHttpRequest();

document.addEventListener('DOMContentLoaded', 
function inicio()
{
     reqqq.onload = function InicioUsuario(){
     var prendas = document.getElementById("recomendaciones");
    
     prendas.innerHTML = reqqq.responseText;
}
    reqqq.open("GET", "Algoritmo.php?");
    reqqq.send();

    req2.onload = function IndexInicio(){
        var prendas = document.getElementById("sugerenciasOf");
       
        prendas.innerHTML = req2.responseText;
   }
       req2.open("GET", "indexOf.php?");
       req2.send();

}, false);