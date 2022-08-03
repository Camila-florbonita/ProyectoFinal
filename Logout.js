var cerrar_sesion = document.getElementById('logout');

cerrar_sesion.addEventListener("click", function () {
    fetch('./Logout.php').then(function () {
        window.location.replace("./index.html");
    });
});
