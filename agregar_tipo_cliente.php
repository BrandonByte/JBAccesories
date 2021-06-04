<?php
  include("conectbd.php");
  $Conectarbd = conectar();
    $valores = " '".$_POST['id_tipo_Cliente']."','".$_POST['tipo']."'";
    $identificador =  "'".$_POST['id_tipo_Cliente']."'";
    $stmt = $Conectarbd->prepare("SELECT id_tipo_Cliente from tipo_cliente where id_tipo_Cliente = $identificador");
    $stmt->execute([$identificador]);
    $userExists = $stmt->fetchColumn();
    if(!$userExists)
    {
        $query = "INSERT INTO tipo_cliente(id_tipo_Cliente,tipo) VALUES (".$valores.")";
        if($exito = $Conectarbd->query($query))
            header('location: tipo_cliente.php');
    }
    else
    {
        echo"<script>alert('El tipo_cliente ya existe'); window.location='pag_agregar_tipo.php';</script>";
        exit;
    }
    $Conectarbd = null;
?>