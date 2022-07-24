var reqID = new XMLHttpRequest();
function getProductId(id_p)
{
    var sendid = id_p;
    console.log("why");
    reqID.open("GET", "GetProductoId.php?id=" + sendid);
    reqID.send();

    window.location.href = "ProductoSinCuenta.html";

}