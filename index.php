
<?php   

	session_start();
	include("conectbd.php");
	$Conectarbd= Conectar();

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
			<?php if(!empty($user)): ?>
				<div>
					<?php if($user['Tipo_usuario'] == 'Admin'){?>
						<h3 style="margin-left: 85%; margin-top: -19px; color: white;">Admin <?= $user['Nombre'] ?> </h3>
						<h4 style="margin-left: 85%; color: white";>Tu estas Logueado
						<a style="color: white"; href="logout.php">Salir</a>
						<?php } else{?>

						<h3 style="margin-left: 85%; margin-top: -19px; color: white;">Bienvenido <?= $user['Nombre'] ?> </h3>
						<h4 style="margin-left: 85%; color: white";>Tu estas Logueado
						<a style="color: white"; href="logout.php">Salir</a>
						<?php } ?>
				</div>
			<?php else: ?>

			<div class="Cuenta" onmouseover="Mostrar_Usuario()" onmouseout="Ocultar_usuario()">

					<i class="far fa-user"></i>
					<figcaption>Mi Cuenta</figcaption> 
				<form class = "Ingresar" id="Ingresar" action="index.php" method="post">
					<div id="usuario">
						<p class="Letras">Username or email address *</p>
						<input id="Usuario" type="text" class="BotonUsuario" placeholder="Nombre de usuario" size="30" maxlength="30" Autofocus required autocomplete="off" name="Usuario">
					</div>
					<div id="password">
						<p class="Letras">Password *</p>
						<input type="password" class="BotonPassword" placeholder="Contraseña" size="30" maxlength="30"  required autocomplete="nope" name="Clave">
					</div>
					<div id="CajaBoton">
						<input type='submit' name="Ingresar" Value="Iniciar Sesion" class="BtInicio">
					</div>
					<div id="Nuevo_Cliente">
						<p class="Letras">Nuevo Cliente <a class="a_new" href="registrar_cliente.php">Registrese?</a></p>
					</div>
				</form>

			</div>
			<?php endif;  ?>
			

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

		<div id="Principal">
			<div>
				<img class="Logo" src="Icons/icono.png">

				<div class="contacto">

					<span class="icon" onclick="BuscarPro()"><i class="fa fa-search"></i></span>
					
					<input onkeypress="validar(event)" type="search" id="schpro" placeholder="Buscar..." style="height: 30px;">
				</div>
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
				<li><a href="" class="barra-enlace">Inicio</a></li>
				<li><a href="" class="barra-enlace">Tienda</a></li>
				<li><a href="" class="barra-enlace">Equipos Armados</a>
				</li>

				<?php if(!empty($user)){?>
						<?php if($user['Tipo_usuario'] == 'Admin'){?>
						<li><a>Administracion</a>
							<li><a style="cursor: pointer;" onclick='WinOpen2("tipo_cliente.php")' class="barra-enlace">Tipo Cliente</a></li>
							<li><a style="cursor: pointer;" onclick='WinOpen2("productos.php")' class="barra-enlace">Productos</a></li>
							<li><a style="cursor: pointer;" onclick='WinOpen2("marcas.php")' class="barra-enlace">Marcas</a></li>
							<li><a style="cursor: pointer;" onclick='WinOpen2("clientes.php")' class="barra-enlace">Clientes</a></li>
						</li>
						<?php }
					}
						?>
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
		<div id="iconos">
					<input type="radio" name="filtro" id="todo" category="all" onclick="Filtrar()">
						<label for="all"><img class="img-ico" src="Icons/all.png">
								<figcaption>TODO</figcaption>
						</label>

					<input type="radio" name="filtro" id="category_item" category="cpu">
						<label for="cpu"><img class="img-ico" src="Icons/chip.png">
								<figcaption>CPU</figcaption>
						</label>
					
					<input id="category_item" name="filtro" type="radio" category="board">
						<label for="board">
							<img class="img-ico" src="Icons/board.png">
							<figcaption>BOARD</figcaption>
						</label>
					
					<input id="category_item" name="filtro" type="radio" category="gpu">
						<label for="gpu">
							<img class="img-ico" src="Icons/gpu.png">
							<figcaption>GPU</figcaption>
						</label>

					<input id="hdd" name="filtro" type="radio">
						<label for="hdd">
							<img class="img-ico" src="Icons/HDD.png">
							<figcaption>HDD</figcaption>
						</label>

					<input id="audio" name="filtro" type="radio">
						<label for="audio">
							<img class="img-ico" src="Icons/audio.png">
							<figcaption>AUDIO</figcaption>
						</label>

					<input id="chasis" name="filtro" type="radio">
						<label for="chasis">		
							<img class="img-ico" src="Icons/chasis.png">
							<figcaption>CHASIS</figcaption>
						</label>
						
					<input id="monitor" name="filtro" type="radio">
						<label for="monitor">		
							<img class="img-ico" src="Icons/monitor.png">
							<figcaption>MONITOR</figcaption>
						</label>
					<input id="teclado" name="filtro" type="radio">
						<label for="teclado">		
							<img class="img-ico" src="Icons/teclado.png">
							<figcaption>TECLADO</figcaption>
						</label>

					<input id="raton" name="filtro" type="radio">
						<label for="raton">		
							<img class="img-ico" src="Icons/raton.png">
							<figcaption>MOUSE</figcaption>
						</label>	
					
					<input id="torres" name="filtro" type="radio">
						<label for="torres">		
							<img class="img-ico" src="Icons/torres.png">
							<figcaption>TORRES</figcaption>
						</label>	
						

					<input id="portatiles" name="filtro" type="radio">
						<label for="portatiles">		
							<img class="img-ico" src="Icons/portatiles.png">
							<figcaption>PORTÁTIL</figcaption>
						</label>	
						
					<input id="silla" name="filtro" type="radio">
						<label for="silla">		
							<img class="img-ico" src="Icons/silla.png">
							<figcaption>SILLAS</figcaption>
						</label>

					<input id="tarjetadesonido" name="filtro" type="radio">
						<label for="tarjetadesonido">		
							<img class="img-ico" src="Icons/tarjetadesonido.png">
							<figcaption>SONIDO</figcaption>
						</label>

					<input id="fuentedepoder" name="filtro" type="radio">
						<label for="fuentedepoder">		
							<img class="img-ico" src="Icons/fuentedepoder.png">
						<figcaption>FUENTE</figcaption>
						</label>


			<div class="renglon" style="position: absolute; height: 42px; margin-top: 75px; margin-bottom: 5px;">
				<div class="renglon" style=" display: inline-flex; height: 15px; font-size: 15px; padding: 10px 45px;">
					<ul style="width: 100px;margin-left: 0px;">Categoria:</ul>
					<ul style="width: 100px; margin-left: 200px;">Marca:</ul>
				</div>

				<select id="pdrcateg" name="idcat" class="bt1" onchange="Filtrar()" style=" margin-top: 10px; position: absolute; margin-left: -360px; width: 160px;">
					<option value="n/n" > Todas...</option>
					<?php 
						$Conectbase = Conectar();
						$Query = "Select *from categoria order by categoria;";
						if($Result = $Conectbase -> query($Query)){
							while ($Reg = $Result->fetch(PDO::FETCH_ASSOC)){
								echo "<option value='".$Reg['id_categoria']."'>".$Reg['categoria']."</option>";
							}
						}
						$Result = null;
						$Conectbase = null;
					?>
					</option>
				</select>

				<select id="pdrmarca" name="idmar" class="bt1" onchange="Filtrar()" style=" margin-top: 10px; position: absolute; margin-left: -90px; width: 160px;">
					<option value="n/n" >Todas...</option>
					<?php 
						$Conectbase = Conectar();
						$Query = "Select *from marca order by marca;";
						if($Result = $Conectbase -> query($Query)){
							while ($Reg= $Result->fetch(PDO::FETCH_ASSOC)){
								echo "<option value='".$Reg['id_marca']."'>".$Reg['marca']."</option>";
							}
						}
						$Result = null;
						$Conectbase = null;
					?>
						<a href=""></a>
					</option>

				</select>
			</div>
			<div class="productos-img"  style="margin-top: 5px;" >
				<?php 
					$Conectbase = Conectar();
					$Query = "Select id_producto, nombre, marca, categoria, vlr_venta, foto from producto inner join marca on producto.id_marca=marca.id_marca inner join categoria on producto.id_categoria = categoria.id_categoria";
					if($Result = $Conectbase -> query($Query)){
						while ($Reg= $Result->fetch(PDO::FETCH_ASSOC)){
						$Tmp = "<div onmouseover='Mostrar_Carrito()' onmouseout='Ocultar_Carrito()' class='marpro' id='".$Reg['id_producto']."'>";
						$Tmp .= "<img src= '".$Reg['foto']."'><p>".$Reg['nombre']."</p>";
						$Tmp .= "<p>" .$Reg['categoria']."</p>";
						$Tmp .= "<p>" .$Reg['marca']."</p>";
						$Tmp .= "<p class='vlr_venta'>$" .$Reg['vlr_venta']."</p>";
						$Tmp .= "<a class='Aparecer_Carrito' href='#'>Añadir al carrito</a></div>";
							echo $Tmp;
						}
					}
					$Result = null;
					$Conectbase = null;
				?>
			</div>
		</div>

<footer>
	<p>Gamer Accesories © 2020</p>
</footer>
<script src="jquery.js"></script>
<script src="main.js"></script>

</body>
</html>