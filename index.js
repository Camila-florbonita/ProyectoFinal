var req = new XMLHttpRequest();
var req2 = new XMLHttpRequest();

document.addEventListener('DOMContentLoaded', 
function index()
{
     req.onload = function IndexInicio(){
     var prendas = document.getElementById("sugerenciasOf");
    
     prendas.innerHTML = req.responseText;
}
    req.open("GET", "indexOf.php?");
    req.send();

    req2.onload = function IndexInicio2(){
        var prendas2 = document.getElementById("sugerenciasSug");
       
        prendas2.innerHTML = req2.responseText;
   }
       req2.open("GET", "indexRec.php?");
       req2.send();

}, false);