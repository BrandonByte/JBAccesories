<?php
  include("conectbd.php");
  $Conectarbd = conectar();
    $valores = "'".$_POST['Id_Usuario']."','".$_POST['NombreU']."','".$_POST['DirU']."','".$_POST['BarrioU']."','".$_POST['CorreoU']."'";
    $identificador =  "'".$_POST['Id_Usuario']."'";
    $stmt = $Conectarbd->prepare("SELECT id_cliente from cliente where id_cliente = $identificador");
    $stmt->execute([$identificador]);
    $userExists = $stmt->fetchColumn();
    if(!$userExists)
    {
        $query = "INSERT INTO cliente(id_cliente , nombre, direccion, barrioconjunto, correo) VALUES (".$valores.")";
        if($exito = $Conectarbd->query($query))
            header('location: registrar_cliente.php');
        else
        {
            var_dump($query); die;
        }
    }
    else
    {
        echo"<script>alert('El cliente ya existe'); window.location='registrar_cliente.php';</script>";
        exit;
    }
    $Conectarbd = null;
?>