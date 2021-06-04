<?php
  include("conectbd.php");
  $Conectarbd = Conectar();
  $Valores = "id_cliente = '".$_POST['id_cliente']."', nombre = '".$_POST['nombre']."', direccion= '".$_POST['direccion']."', barrioconjunto= '".$_POST['barrioconjunto']."', correo='".$_POST['correo']."',observacion='".$_POST['observacion']."', tipo_cliente='".$_POST['tipo']."'";

  $Query = "UPDATE cliente SET ".$Valores." WHERE id_cliente = '".$_POST['id_cliente']."'";
    if($Exito = $Conectarbd->query($Query))
      header('Location: clientes.php');
    else
    { var_dump($Query); 
      exit;
    }
    $Conectarbd->close();
?>