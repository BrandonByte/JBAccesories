<?php
  include("conectbd.php");
  $Conectarbd = Conectar();
  $Valores = "id_tipo_Cliente = '".$_POST['id_tipo_Cliente']."', tipo = '".$_POST['tipo']."'";
  $Query = "UPDATE tipo_cliente SET ".$Valores." WHERE id_tipo_Cliente = '".$_POST['id_tipo_Cliente']."'";
    if($Exito = $Conectarbd->query($Query))
      header('Location: tipo_cliente.php');
    else
    { var_dump($Query); 
      exit;
    }
    $Conectarbd->close();
?>