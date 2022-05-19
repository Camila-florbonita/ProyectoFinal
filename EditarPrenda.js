const req = new XMLHttpRequest();
const req2 = new XMLHttpRequest();

document.addEventListener('DOMContentLoaded', 
function edicion()
{
    req.onload = function FindPrendas(){
    var selectP = document.getElementById("elegirPrenda");
    
    selectP.innerHTML = req.responseText;
}
    req.open("GET", "OfertasProductos.php?");
    req.send();
    

}, false);

function getPrenda()
{
    var valorP = document.getElementById("elegirPrenda").value;
    req2.onload = function FindPrendas()
    {
    
    }
    req2.open("GET", "GetPrendaEditar.php?id=" + valorP);
    req2.send();
}