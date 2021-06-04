<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="colors.css">
	<link rel="icon" type="image/png" href="Icons/icono.png"/>	 
	<link rel="stylesheet" type="text/css" href="Icons/fontAwesome/all.css">
	<link rel="stylesheet" type="text/css" href="Icons/fontAwesome/v4-shims.css">
	<title>Clientes</title>
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
			<div id="Principal">
			<div>
				<img style="margin-left: -10px;" class="Logo" src="Icons/icono.png">
				<h1 style="float: center; margin-top: -30px; font-size: 20px;">Clientes</h1>
			</div>
		</div>
</div>
	
	<form id="Añadir" action="pag_agregar_cliente.php" method="post">
		<input id="imgAña" type=image src="Icons/añadir.png" width="70" height="75">
	</form>

		<table>
			<thead>
				<tr>
					<th>Id Cliente</th>
					<th>Nombre</th>
					<th>Direccion</th>
					<th>Barrio/Conjunto</th>
					<th>Correo</th>
					<th>Observacion</th>
					<th>Tipo de Cliente</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
						<?php include("conectbd.php");
						$Conectarbd = Conectar();?>
						<?php foreach ($Conectarbd->query('SELECT * from cliente') as $row){ ?>
						<tr>
						<td><?php echo $row['id_cliente']?></td>
						<td><?php echo $row['nombre'] ?></td>
						<td><?php echo $row['direccion'] ?></td>
						<td><?php echo $row['barrioconjunto'] ?></td>
						<td><?php echo $row['correo'] ?></td>
						<td><?php echo $row['observacion'] ?></td>
						<td><?php echo $row['tipo_cliente'] ?></td>
							<td><a href="pag_modificar_cliente.php?id=<?php echo $row['id_cliente']; ?>"> <img style='width: 35px; height: 35px;' src="Icons/editar.png" alt="submit"></a></td>
							<td><a href="#" onclick="preguntar(<?php echo $row['id_cliente']; ?>)"> <img style='width: 35px; height: 35px;' src="Icons/eliminar.png"></a></td>
						</tr>
				<?php
				}
				?>
		</tbody>
		</table>
		<script type="text/javascript">
				function preguntar(id){
					if(confirm('¿Esta seguro que desea eliminar el registro con id ' + id + '?'))
						{
									window.location.href = 'eliminar_cliente.php?id=' + id;
						}
					}
		</script>
</Body>


<!-- fnm nfwoleknmwfoikpenifpke -->

</HTML>



</body>
</html>