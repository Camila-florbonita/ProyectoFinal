const req = new XMLHttpRequest();
function Secciones(seccion)
{
    
    var secc = seccion;
    req.open("GET", "GetSeccion.php?seccion=" + secc);
    req.send();

    window.location.href = "MenuSecciones.html";
    alert(seccion);
}