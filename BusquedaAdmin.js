var req = new XMLHttpRequest();

document.addEventListener('DOMContentLoaded', 
function buscar()
{
    req.onload = function buscarAdministrador(){
    var prendas = document.getElementById("producto");
    
    prendas.innerHTML = req.responseText;
}
    req.open("GET", "BusquedaAdmin.php?");
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