
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="colors.css">
  <link rel="icon" type="image/png" href="Icons/icono.png"/>   
  <link rel="stylesheet" type="text/css" href="Icons/fontAwesome/all.css">
  <link rel="stylesheet" type="text/css" href="Icons/fontAwesome/v4-shims.css">
  <title>Agregar tipo cliente</title>
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
        <img style="margin-left: -8px;" class="Logo" src="Icons/icono.png">
      </div>
    </div>
</div>

  <div class="modi">
    <h1 style="margin-left: 11%; font-family: 'calibri', Garamond, 'Comic Sans';">Agregar Tipo Cliente</h1><hr>
        <form  method="POST" action="agregar_tipo_cliente.php" method="post" class="CajaRegistro" name="actualizar_cliente">
          <div id="Cont-tipo">
                      <div id="CajaGuardar" style="margin-top:0px;">
                          <label class="control-label" for="id_tipo_Cliente">Id Tipo Cliente:</label>
                          <input type="text" name="id_tipo_Cliente" id="CajaLlenado" placeholder="identificacion del tipo"  size="30" maxlength="30"Autofocus required autocomplete="off"; >
                     </div>

                      <div id="CajaGuardar" style="margin-top:10px";>
                          <label class="control-label" for="tipo">Tipo:</label>
                          <input name="tipo" id="CajaLlenado" placeholder="tipo del cliente" type="text" size="30" maxlength="30" Autofocus required autocomplete="off";>
                      </div>

                      <div id="CajaGuardar" style="margin-top:10px">
                          <button type="submit" class="BtRegistrar">Registrar</button>
                      </div>
                      <div id="CajaGuardar" style="margin-top: 10px">
                        <button type="button" class="BtCancelar" onclick="location.href='tipo_cliente.php'">Cancelar</button>
                      </div>
          </div>
        </form>

	 </div>
</Body>
<!-- fnm nfwoleknmwfoikpenifpke -->
</HTML>