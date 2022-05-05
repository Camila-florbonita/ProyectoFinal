const req = new XMLHttpRequest();
const req2 = new XMLHttpRequest();
const req3 = new XMLHttpRequest();
const req4 = new XMLHttpRequest();

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
    productPrice.textContent = req2.responseText;
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
    var productImage = document.getElementById("productImage");
    productImage.src = "ImagenesPrendas/" + req4.responseText + ".jpg";
}
    
    req4.open("GET", "GetProductImage.php?");
    req4.send();

}, false);

