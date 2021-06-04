<?php
  function login(){
    session_start();
    include("conectbd.php");
    $Conectarbd= Conectar();
    $message='';
    if(!empty($_POST['Usuario']) && !empty($_POST['Clave'])){
      $records = $Conectarbd->prepare('select Id_Usuario, Nombre, Contraseña, Tipo_usuario from usuarios where Nombre=:Usuario');
      $records->bindParam(':Usuario', $_POST['Usuario']);
      $records->execute();
      $results = $records -> fetch(PDO::FETCH_ASSOC);
  
      $message = '';
      
  
      if(count($results)>=1 && password_verify($_POST['Clave'], $results['Contraseña'])){
        $_SESSION['user_id']= $results['Id_Usuario'];
        $_SESSION['Tipo_usuario']=$results['Tipo_usuario'];
  
        header('location: index.php');
      } else{
        $message= 'lo siento contraseñas no coinciden';
        die;
      }
    }
    if(isset($_SESSION['user_id'])){
      $records =  $Conectarbd->prepare('select Id_Usuario, Nombre, Contraseña, Tipo_usuario from usuarios where Id_Usuario=:id');
      $records->bindParam(':id', $_SESSION['user_id']);
      $records->execute();
      $results = $records -> fetch(PDO::FETCH_ASSOC);
      $user = null;
      $tipo = null;
      if(count($results)>0){
        $user = $results;
      }
    }
  
    if(!empty($_POST['Id_Usuario']) && !empty($_POST['NombreU']) && !empty($_POST['Clave']) && !empty($_POST['CorreoU'])){
      $sql = "insert into usuarios(Id_Usuario, Nombre, Contraseña, Correo, Tipo_usuario) VALUES (:Id_Usuario, :NombreU, :Clave, :CorreoU, 'Usuario')";
      $stmt = $Conectarbd->prepare($sql);
      $stmt->bindParam(':Id_Usuario',$_POST['Id_Usuario']);
      $stmt->bindParam(':NombreU',$_POST['NombreU']);
      $password = password_hash($_POST['Clave'], PASSWORD_BCRYPT);
      $stmt->bindParam(':Clave', $password);
      $stmt->bindParam(':CorreoU',$_POST['CorreoU']);
  
      $valores = "'".$_POST['Id_Usuario']."','".$_POST['NombreU']."','".$_POST['DirU']."','".$_POST['BarrioU']."','".$_POST['CorreoU']."'";
          $query = "INSERT INTO cliente(id_cliente , nombre, direccion, barrioconjunto, correo) VALUES (".$valores.")";
          $exito = $Conectarbd->query($query);
      if($stmt->execute())
        $message = 'Successfully created new user';
       else
        $message = 'sorry datos erroneos';
    }
  }
?>

