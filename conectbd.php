<?php
function Conectar(){
    $Servidor = "localhost";
    $Based = "gamer";
    $Usuario = "Admin";
    $Clave = "12345";
        try {
          $conn = new PDO("mysql:host=$Servidor;dbname=$Based;", $Usuario, $Clave);
        } catch (PDOException $e) {
          die('Fallo en: ' . $e->getMessage());
        }
        return $conn;
    }
?>
