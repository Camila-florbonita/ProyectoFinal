var reqMS = new XMLHttpRequest();

document.addEventListener('DOMContentLoaded', 
function Seccion()
{
     reqMS.onload = function MenuSecciones(){
     var prendas = document.getElementById("producto");
    
     prendas.innerHTML = reqMS.responseText;
     
}
    reqMS.open("GET", "MenuSecciones.php?");
    reqMS.send();

}, false);