const req = new XMLHttpRequest();

document.addEventListener('DOMContentLoaded', 
function Ofertas()
{
     req.onload = function ShowProductos(){
     var selectP = document.getElementById("POferta");
    
     selectP.innerHTML = req.responseText;
}
    req.open("GET", "OfertasProductos.php?");
    req.send();

}, false);