<?php
  include("conectbd.php");
  $Conectarbd = conectar();
    $valores = "'".$_POST['id_cliente']."','".$_POST['nombre']."','".$_POST['direccion']."','".$_POST['barrioconjunto']."','".$_POST['correo']."','".$_POST['observacion']."','".$_POST['tipo_cliente']."'";
    $identificador =  "'".$_POST['id_cliente']."'";
    $stmt = $Conectarbd->prepare("SELECT id_cliente from cliente where id_cliente = $identificador");
    $stmt->execute([$identificador]);
    $userExists = $stmt->fetchColumn();
    if(!$userExists)
    {
        $query = "INSERT INTO cliente(id_cliente , nombre, direccion, barrioconjunto, correo, observacion, tipo_cliente) VALUES (".$valores.")";
        if($exito = $Conectarbd->query($query))
        	echo"<script>alert('El cliente se ha registrado'); window.location='cliente.php'';</script>";
        else
        {
            var_dump($query); die;
        }
    }
    else
    {
        echo"<script>alert('El cliente ya existe'); window.location='pag_agregar_cliente.php';</script>";
        exit;
    }
    $Conectarbd = null;
?>