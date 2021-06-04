<?php
  include("conectbd.php");
  $Conectarbd = Conectar();
  
  $Valores =isset($_GET['id']) ? $_GET['id'] : 0;

  $Query = "delete from marca WHERE id_marca = '".$Valores."'";
    if($Exito = $Conectarbd->query($Query))
      header('Location: marcas.php');
    else
    { var_dump($Query); 
      exit;
    }
    $Conectarbd->close();
?>