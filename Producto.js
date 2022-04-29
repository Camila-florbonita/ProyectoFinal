const req = new XMLHttpRequest();


document.addEventListener('DOMContentLoaded', 
function producto()
{
    req.onload = function FindPrendas(){
    var producto = document.getElementById("producto");
    
    producto.innerHTML = req.responseText;
}
    req.open("GET", "Producto.php?");
    req.send();
    

}, false);