<?php
  include("conectbd.php");
  $Conectarbd = Conectar();
  $Valores = "id_marca = '".$_POST['id_marca']."', marca = '".$_POST['marca']."'";
  $Query = "UPDATE marca SET ".$Valores." WHERE id_marca = '".$_POST['id_marca']."'";
    if($Exito = $Conectarbd->query($Query))
      header('Location: marcas.php');
    else
    { var_dump($Query); 
      exit;
    }
    $Conectarbd->close();
?>