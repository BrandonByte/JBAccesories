<?php  
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
		

		if(count($results)>=1 && !password_verify($_POST['Clave'], $results['Contraseña'])){
			$_SESSION['user_id']= $results['Id_Usuario'];
			$_SESSION['Tipo_usuario']=$results['Tipo_usuario'];

			echo"<script>alert('La contraseña es erronea'); window.location='registrar_cliente.php';</script>";
		} else{
			$message= 'lo siento contraseñas no coinciden';
			echo"<script>alert('La contraseña es erronea'); window.location='registrar_cliente.php';</script>";
			exit;
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
		$identificador =  "'".$_POST['Id_Usuario']."'";
   		$stmt2 = $Conectarbd->prepare("SELECT Id_Usuario from usuarios where Id_Usuario = $identificador");
    	$stmt2->execute([$identificador]);
    	$userExists = $stmt2->fetchColumn();
    	if(!$userExists)
   		{
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
		 else
   		{
        echo"<script>alert('El Id_Usuario ya existe'); window.location='registrar_cliente.php';</script>";
        exit;
    	}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="colors.css">
	<link rel="icon" type="image/png" href="Icons/icono.png"/>	 
	<link rel="stylesheet" type="text/css" href="Icons/fontAwesome/all.css">
	<link rel="stylesheet" type="text/css" href="Icons/fontAwesome/v4-shims.css">
	<title>Gamer Accesories</title>
</head>
<body>
		<div class="Contenedor">
			<div class="Contactanos">
				Comunicate con nosotros: 
				<span style="margin: 0 0.5em;">
					<i class="fas fa-mobile"  aria-hidden="true"></i>
						 3108280133
				</span>
				|
				<span style="margin: 0 0.5em;">
					<i class="fa fa-whatsapp"></i>
						 3108280133
				</span>
				|
				<span style="margin: 0 0.5em;">
					<i class="fa fa-map-marker"></i>
						 Vereda playa
				</span>
			</div>
			<div class="RedesSociales">
				<i class="fab fa-facebook-f"></i>
				<i class="fab fa-instagram"></i>
				<i class="fab fa-youtube"></i>
				|
			</div>

			

			<div class="Publicidad">
				<span style="margin: 0 0.5em;">
					<i class="fas fa-truck"></i>		
					ENVÍOS GRATUITOS NACIONALES
				</span>
				|
				<span style="margin: 0 0.5em";>
					<i class="fas fa-shield-alt"></i>
					COMPRA FÁCIL Y 100% SEGURA
				</span>
			</div>

			<div class="Carrito">
				<span style="margin: 0 0.5em;">
					<i class="fas fa-shopping-cart"></i>
					($0)
				</span>

			</div>
		</div>

		<div id="Principal" style="height: 130px;">
			<div>
				<a href="index.php"><img style="margin-top: -20px;" class="Logo" src="Icons/icono.png"></a>
			</div>
			
		</div>

		<div id="barra">
			<div class="mostrar">
				<span>&#9776;</span>
			</div>
			<ul>
				<li>
					<img src="Icons/icono.png" alt="Logotipo" class="logo">
				</li>
				<li><a href="index.php" class="barra-enlace">Inicio</a></li>
				<li><a href="index.php" class="barra-enlace">Tienda</a></li>
				<li><a href="" class="barra-enlace">Equipos Armados</a></li>
			
				</a></li>
			</ul>
		</div>

		<div id="menu">
			<nav>
				<a href="" class="nav-enlace">Pc para gaming</a>
				<a href="" class="nav-enlace">Juegos Recomendados</a>
				<a href="" class="nav-enlace">Partes y accesorios</a>
				<a href="" class="nav-enlace">NVIDIA® GEFORCE®</a>
			</nav>
		</div>
		<div style="padding: 20px;">
			<label style="margin-left: 46.5%; ">MI CUENTA</label>
		</div>
		<div class="registrar">
			<form class="reg-ingresar" id="reg-ingresar" action="index.php" method="POST">
				<p class="titulo-form">LOGIN</p>
				<div class="CampoIngre">
					<div>
						<p>Username or email address *</p>
						<input class="Usua" type="text" name="Usuario" placeholder="Nombre de usuario" Autofocus required pattern="[A-Za-z1-9]{1,15}" title="El Usuario debe ser solo alfanumerico"  autocomplete="off">
					</div>
					<div id="pass">
						<p>Password *</p>
						<input class="pass" type="password" name="Clave" placeholder="Password" Autofocus required    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Debe contener al menos un número y una letra mayúscula y minúscula, y al menos 8 caracteres o más" autocomplete="off">
					</div>
					<div class="BtSubmit">
						<input type='submit' name="Iniciar" Value="Iniciar Sesion" class="BtInicio">
					</div>
				</div>
			</form>
			
			<form id="reg-registrar" action="registrar_cliente.php" method="POST">
				<p class="titulo-form">REGISTRAR</p>
				<?php if(!empty($message)): ?>
				<p style="margin-left: 50px; margin-top: 10px; position: absolute;"><?= $message ?></p>
			<?php endif; ?>
				<div class="CampoRegi">

					<div>
					<p>Id Usuario *</p>
					<input class="Id_U" type="text" name="Id_Usuario" placeholder="Id Usuario" pattern="[A-Za-z1-9]{1,15}" title="El Id debe ser alfanumerico, no se permite caracteres especiales" Autofocus required autocomplete="off">
					</div>
					<div>
						<p>Nombre de usuario *</p>
						<input class="NombreU" type="text" name="NombreU" placeholder="Nombre de usuario" Autofocus required  pattern="[A-Za-z]{1,15}" title="El nombre debe ser solo texto, no se permite numeros ni caracteres especiales"autocomplete="off">
					</div>
					<div>
						<p>Contraseña *</p>
						<input class="password" type="password" name="Clave" placeholder="Nombre de usuario" Autofocus required autocomplete="off"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Debe contener al menos un número y una letra mayúscula y minúscula, y al menos 8 caracteres o más">
					</div>
					<div>
						<p>Direccion *</p>
						<input class="DirU" type="text" name="DirU" placeholder="Direccion" Autofocus autocomplete="off">
					</div>
					<div>
						<p>Barrio o Conjunto *</p>
						<input class="BarrioU" type="text" name="BarrioU" placeholder="Barrio" Autofocus pattern="[A-Za-z1-9]{1,15}" title="El Barrio debe ser solo alfanumerico no se permite caracteres especiales" autocomplete="off">
					</div>
					<div>
						<p>Correo *</p>
						<input class="CorreoU" type="text" name="CorreoU" placeholder="Correo" Autofocus pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Debe tener la estructura e-mail estándar " required autocomplete="off">
					</div>
					<div class="BtSubmit" style="margin-top: 10px;">
						<input style="height: 40px;" type='submit' name="Registrar" Value="Registrarse" class="BtInicio">
					</div>
				</div>
			</form>
		</div>
<footer>
	<p>Gamer Accesories © 2020</p>
</footer>
<script src="jquery.js"></script>
<script src="main.js"></script>
</body>
</html>