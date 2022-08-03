var reqGS = new XMLHttpRequest();
function Secciones(seccion)
{
    
    var secc = seccion;
    reqGS.open("GET", "GetSeccion.php?seccion=" + secc);
    reqGS.send();

    window.location.href = "MenuSeccionesSinCuenta.html";
    // alert(seccion);
}