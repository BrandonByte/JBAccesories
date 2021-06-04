<?php
  include("conectbd.php");
  $Conectarbd = Conectar();
  
  $Valores =isset($_GET['id']) ? $_GET['id'] : 0;

  $Query = "delete from cliente WHERE id_cliente = '".$Valores."'";
    if($Exito = $Conectarbd->query($Query))
      header('Location: clientes.php');
    else
    { var_dump($Query); 
      exit;
    }
    $Conectarbd->close();
?>