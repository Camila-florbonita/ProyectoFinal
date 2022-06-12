var cerrar_sesion = document.getElementById('logout');

cerrar_sesion.addEventListener("click", function () {
    fetch('./Logout.php').then(function () {
        preventBack();
        setTimeout("preventBack()", 0);  
        window.onunload = function () {null};
        window.location.replace("./");
    });
});

function preventBack() {window.history.forward();}  
// function logout() {
//     fetch('./Logout.php').then(function () {
//         window.location.replace("./");

//     });
// }