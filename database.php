<?php

class Database
{
    private $hostname = "localhost"; // colocal la ip donde se encuentra la base de datos
    private $database = "proyecto";
    private $username = "root";
    private $password = "";
    private $charset = "utf8";

    function conectar ()
    {
        try 
        {
            $conexion = "mysql:host=" . $this->hostname . "; dbname=" . $this->database . ";
            charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // GENERA EXCEPCIONES EN CASO DE QUE HAYA CON LA CONEXION
                PDO::ATTR_EMULATE_PREPARES => false // configuracion para evitar que las preparaciones que hagamos para las consultas no sean emuladas sino sean reales y seguras
            ];
    
            $pdo = new PDO($conexion, $this->username, $this->password, $options);
    
            return $pdo;

        }
        catch (PDOException $e)
        {
            echo 'Error conexion: ' . $e->getMessage();
            exit;
        }
    }
}

?>