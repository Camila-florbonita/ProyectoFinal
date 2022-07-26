// fetch('./VerificarLogin.php')
//     .then(function (res) {
//         return res.text();
//     }).then(function (text) {
//         var datos = JSON.parse(text);
        
//         if (datos.id_us == "0") {
//             window.location.replace("./login.html");
//         }
        
//     });

var VerifyLogin = new XMLHttpRequest();

document.addEventListener('DOMContentLoaded', 
function VerificarLogin()
{
    VerifyLogin.onload = function Verification()
    {
        var sesion;
        sesion = VerifyLogin.responseText;
        if (sesion == 0)
        {
            window.location.replace("./login.html");
        }
    }
    VerifyLogin.open("GET", "VerificarLogin.php?");
    VerifyLogin.send();

    

}, false);

// document.addEventListener('DOMContentLoaded', 
// function VerificarLogin()
// {
//     VerifyLogin.onload = function VerificarLogin(){
//         sesion = VerifyLogin.open("GET", "VerificarLogin.php?");
//         VerifyLogin.send();
//      if (session == 0)
//      {
//         window.location.replace("./login.html");
//      }
// }

// }, false);