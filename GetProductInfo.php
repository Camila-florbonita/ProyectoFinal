<?PHP

session_start();

include "database.php";
$id = $_SESSION['id_p'];

    $query = "SELECT * from productos WHERE id_producto = '$id'";     // Esta linea hace la consulta
    $result = mysqli_query($conexion, $query); 

    while ($registro = mysqli_fetch_array($result)){ 
        echo "<div class='comment-box categories'>
        <p class='username category'>Prenda: </p>
        <p class='comment-text category'>", $registro['tipo_prenda'], "</p>
    </div>
    <div class='comment-box categories'>
        <p class='username category'>Género: </p>
        <p class='comment-text category'>", $registro['genero'], "</p>
    </div>
    <div class='comment-box categories'>
        <p class='username category'>Color: </p>
        <p class='comment-text category'>", $registro['color'], "</p>
    </div>
    <div class='comment-box categories'>
        <p class='username category'>Temporada: </p>
        <p class='comment-text category'>", $registro['temporada'], "</p>
    </div>
    <div class='comment-box categories'>
        <p class='username category'>Estilo: </p>
        <p class='comment-text category'>", $registro['estilo'], "</p>
    </div>
    <div class='comment-box categories'>
        <p class='username category'>Edad: </p>
        <p class='comment-text category'>", $registro['edad'], "</p>
    </div>
    <div class='comment-box categories'>
    <p class='username category'>Material: </p>
    <p class='comment-text category'>", $registro['material'], "</p>
    </div>
    <div class='comment-box categories'>
    <p class='username category'>Corte: </p>
    <p class='comment-text category'>", $registro['corte'], "</p>
    </div>
    <div class='comment-box categories'>
        <p class='username category'>Formalidad: </p>
        <p class='comment-text category'>", $registro['formalidad'], "</p>
    </div>
    <div class='comment-box categories'>
        <p class='username category'>Ocasión: </p>
        <p class='comment-text category'>", $registro['ocasion'], "</p>
    </div>";
}

?>