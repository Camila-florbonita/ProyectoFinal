const req = new XMLHttpRequest();

document.addEventListener('DOMContentLoaded', 
function Comentarios()
{
     req.onload = function ShowComents(){
     var selectP = document.getElementById("POferta");
    
     selectP.innerHTML = req.responseText;
}
    req.open("GET", "OfertasProductos.php?");
    req.send();

}, false);