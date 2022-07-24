var req = new XMLHttpRequest();
var req2 = new XMLHttpRequest();

document.addEventListener('DOMContentLoaded', 
function opciones()
{
    req.onload = function opcAdministrador(){
    var prendas = document.getElementById("producto");
    
    prendas.innerHTML = req.responseText;
}
    req.open("GET", "OpcionesAdministrador.php?");
    req.send();

}, false);

function Borrar(id)
{
    var idp = id;
    if (confirm("¿Borrar?") == true) 
    {
        alert(idp);
        window.location.href = "BorrarPrenda.php?idp=" + idp;
    }
}

function Editar(id)
{
    var sendid = id;
    req2.open("GET", "GetProductoId.php?id=" + sendid);
    req2.send();

    window.location.href = "EditarPrenda.html";
}