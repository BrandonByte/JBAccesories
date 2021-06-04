<?php
  include("conectbd.php");
  $Conectarbd = conectar();
    $valores = " '".$_POST['id_marca']."','".$_POST['marca']."'";
    $identificador =  "'".$_POST['id_marca']."'";
    $stmt = $Conectarbd->prepare("SELECT id_marca from marca where id_marca = $identificador");
    $stmt->execute([$identificador]);
    $userExists = $stmt->fetchColumn();
    if(!$userExists)
    {
        $query = "INSERT INTO marca(id_marca,marca) VALUES (".$valores.")";
        if($exito = $Conectarbd->query($query))
            header('location: marcas.php');
    }
    else
    {
        echo"<script>alert('La marca ya existe'); window.location='pag_agregar_marca.php';</script>";
        exit;
    }
    $Conectarbd = null;
?>