var imagen = document.getElementById('imagenusuario');
var selectedFIle = document.getElementById('selectedFile');

selectedFIle.addEventListener('change',function(){
    let datos = new FormData();
    datos.append('image', selectedFIle.files[0]);
    fetch('php/cargarImagen.php', {
            method: 'POST',
            body: datos
        })
    .then(function(res){
        return res.text();
    }).then(function(text){
        var datos = JSON.parse(text);
        console.log(datos);
    });    
    
    fetch('php/verimagen.php')
    .then(function(res){
        return res.text();
    }).then(function(text){
        var datos = JSON.parse(text);
        console.log(datos);
        if(datos.imagen != 'No esxiste') imagen.setAttribute('src','data:image/webp;base64,' + datos.imagen);
    });
});