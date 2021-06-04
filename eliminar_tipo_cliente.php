<?php
  include("conectbd.php");
  $Conectarbd = Conectar();
  
  $Valores =isset($_GET['id']) ? $_GET['id'] : 0;

  $Query = "delete from tipo_cliente WHERE id_tipo_Cliente = '".$Valores."'";
    if($Exito = $Conectarbd->query($Query))
      header('Location: tipo_cliente.php');
    else
    { var_dump($Query); 
      exit;
    }
    $Conectarbd->close();
?>