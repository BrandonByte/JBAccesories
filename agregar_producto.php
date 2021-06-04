<?php
  include("conectbd.php");
  $Conectarbd = conectar();
    $valores = " '".$_POST['id_producto']."','".$_POST['nombre']."','".$_POST['marca']."','".$_POST['categoria']."','".$_POST['cantidad']."','".$_POST['referencia']."','".$_POST['garantia']."','".$_POST['vlr_venta']."','".$_POST['caracteristicas']."', 'dfvdfv'";
    $identificador =  "'".$_POST['id_producto']."'";
    $stmt = $Conectarbd->prepare("SELECT id_producto from producto where id_producto = $identificador");
    $stmt->execute([$identificador]);
    $userExists = $stmt->fetchColumn();
    if(!$userExists)
    {
        $query = "INSERT INTO producto(id_producto, nombre, id_marca, id_categoria, cantidad, referencia, garantia, 
vlr_venta, caracteristicas, foto) VALUES (".$valores.")";
        if($exito = $Conectarbd->query($query)){
            echo"<script>alert('El producto ha sido agregado correctamente'); window.location='productos.php';</script>";
            exit;
        }
        else
        {
            var_dump($query); die;
        }
    }
    else
    {
        echo"<script>alert('El producto ya existe'); window.location='pag_agregar_producto.php';</script>";
        exit;
    }
    $Conectarbd = null;
?>