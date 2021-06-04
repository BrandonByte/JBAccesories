<?php
  include("conectbd.php");
  $Conectarbd = Conectar();
  
  $Valores =isset($_GET['id']) ? $_GET['id'] : 0;

  $Query = "delete from producto WHERE id_producto = '".$Valores."'";
    if($Exito = $Conectarbd->query($Query))
      header('Location: productos.php');
    else
    { var_dump($Query); 
      exit;
    }
    $Conectarbd->close();
?>