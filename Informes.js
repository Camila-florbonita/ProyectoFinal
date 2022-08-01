var req = new XMLHttpRequest();

document.addEventListener('DOMContentLoaded', 
function informacion()
{
     req.onload = function informes(){
     var compras = document.getElementById("compras");
    
     compras.innerHTML = req.responseText;
}
    req.open("GET", "Informes.php?");
    req.send();

}, false);