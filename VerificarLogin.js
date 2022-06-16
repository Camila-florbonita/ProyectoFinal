fetch('./VerificarLogin.php')
    .then(function (res) {
        return res.text();
    }).then(function (text) {
        var datos = JSON.parse(text);
        
        if (datos.id_us == "0") {
            window.location.replace("./login.html");
        }
        
    });