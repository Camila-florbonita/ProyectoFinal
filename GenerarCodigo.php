<?PHP

session_start();

include "database.php";

$abc = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");

//$correo = $_SESSION['correo'];

$codigo = rand(1000,9999);

$r = rand(1, 27);

$letra1 = $abc[$r - 1];

$r = rand(1, 27);

$letra2 = $abc[$r - 1];

$codigo = $codigo.$letra1.$letra2;
echo $codigo;


?>