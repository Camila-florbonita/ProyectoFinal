const reqC = new XMLHttpRequest();

document.addEventListener('DOMContentLoaded', 
function Calificacion()
{
     reqC.onload = function ShowCalif(){
     var calif = document.getElementById("CalifTotal");
    
     calif.textContent = reqC.responseText;
}
    reqC.open("GET", "ShowRating.php?");
    reqC.send();

}, false);