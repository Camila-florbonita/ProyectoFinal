var req = new XMLHttpRequest();
var req2 = new XMLHttpRequest();
var req3 = new XMLHttpRequest();
var req4 = new XMLHttpRequest();
var req5 = new XMLHttpRequest();
var req6 = new XMLHttpRequest();
var req7 = new XMLHttpRequest();
var req8 = new XMLHttpRequest();

document.addEventListener('DOMContentLoaded', 
function producto()
{
    req.onload = function InfoProducto()
    {

    var productName = document.getElementById("productName");
    productName.textContent = req.responseText;
}
    req.open("GET", "GetProductName.php?");
    req.send();

req2.onload = function InfoProducto2()
{
    var productPrice = document.getElementById("productPrice");
    productPrice.innerHTML = req2.responseText;
}
    
    req2.open("GET", "GetProductPrice.php?");
    req2.send();

req3.onload = function InfoProducto3()
{
    var productDesc = document.getElementById("productDesc");
    productDesc.textContent = req3.responseText;
}
    
    req3.open("GET", "GetProductDesc.php?");
    req3.send();

    req4.onload = function InfoProducto4()
{
    var productInfo = document.getElementById("productInfo");
    productInfo.innerHTML = req4.responseText;
}
    
    req4.open("GET", "GetProductInfo.php?");
    req4.send();

    req5.onload = function InfoProducto5()
{
    var productImage = document.getElementById("productImage");
    productImage.src = req5.responseText;
}
    
    req5.open("GET", "GetProductImage.php?");
    req5.send();


}, false);

