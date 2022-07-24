var req = new XMLHttpRequest();

document.addEventListener('DOMContentLoaded', 
function Seccion()
{
     req.onload = function MenuSecciones(){
     var prendas = document.getElementById("producto");
    
     prendas.innerHTML = req.responseText;
}
    req.open("GET", "MenuSecciones.php?");
    req.send();

}, false);