<?php
  include("conectbd.php");
  $Conectarbd = Conectar();
  $Valores = "id_producto = '".$_POST['id_producto']."', nombre = '".$_POST['nombre']."', id_marca= '".$_POST['marca']."', id_categoria= '".$_POST['categoria']."', cantidad='".$_POST['cantidad']."',referencia='".$_POST['referencia']."', garantia = '".$_POST['garantia']."',vlr_venta= '".$_POST['vlr_venta']."',caracteristicas= '".$_POST['caracteristicas']."',foto= '".$_POST['foto']."'";
  $Query = "UPDATE producto SET ".$Valores." WHERE id_producto = '".$_POST['id_producto']."'";
    if($Exito = $Conectarbd->query($Query))
      header('Location: productos.php');
    else
    { var_dump($Query); 
      exit;
    }
    $Conectarbd->close();
?>