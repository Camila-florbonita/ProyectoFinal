var req = new XMLHttpRequest();

document.addEventListener('DOMContentLoaded', 
function configCuenta()
{
    req.onload = function cuenta(){
    var selectP = document.getElementById("confC");
    
    selectP.innerHTML = req.responseText;
}
    req.open("GET", "DatosCuenta.php?");
    req.send();
    

}, false);
