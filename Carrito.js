var req = new XMLHttpRequest();
var req2 = new XMLHttpRequest();
var req3 = new XMLHttpRequest();

document.addEventListener('DOMContentLoaded', 
function carrito()
{
     req.onload = function CarritoUsuario(){
     var prendas = document.getElementById("producto");
    
     prendas.innerHTML = req.responseText;
}
    req.open("GET", "Carrito.php?");
    req.send();

    req2.onload = function CarritoUsuarioTotal(){
        var total = document.getElementById("ctotal");
       
        total.textContent = req2.responseText;
   }
       req2.open("GET", "CarritoTotal.php?");
       req2.send();

}, false);

function remove(id)
{
    req3.open("GET", "CarritoQuitar.php?id_h=" + id);
    req3.send();
    window.location.href = "CarritoDeCompras.html";
}