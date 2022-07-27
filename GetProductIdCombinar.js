var reqID = new XMLHttpRequest();
function getProductId(id_p)
{
    var sendid = id_p;
    reqID.open("GET", "GetProductoId.php?id=" + sendid);
    reqID.send();

    window.location.href = "CombinacionAtuendos.html";
}