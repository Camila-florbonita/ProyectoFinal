function getProductId(id_p)
{
    var sendid = id_p;
    req.open("GET", "GetProductoId.php?id=" + sendid);
    req.send();

    window.location.href = "ProductoConCuenta.html";
}