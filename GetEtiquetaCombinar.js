var reqEt = new XMLHttpRequest();
var reqV = new XMLHttpRequest();

function getEtiqueta()
{
    var etq = document.getElementById("etiquetas").value;
    var sendid = etq;
    alert(sendid);

    reqEt.onload = function Etiqueta(){
        var etiquetas = document.getElementById("etiqueta");
       
        etiquetas.innerHTML = reqEt.responseText;
   }
    reqEt.open("GET", "ElegirEtiqueta.php?etq=" + sendid);
    reqEt.send();
}
