<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="colors.css">
  <link rel="icon" type="image/png" href="Icons/icono.png"/>   
  <link rel="stylesheet" type="text/css" href="Icons/fontAwesome/all.css">
  <link rel="stylesheet" type="text/css" href="Icons/fontAwesome/v4-shims.css">
  <title>Agregar Cliente</title>
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
    <h1 style="margin-left: 11%; font-family: 'calibri', Garamond, 'Comic Sans';">Agregar Cliente</h1><hr>
        <form  method="POST" action="agregar_cliente.php" method="post" class="CajaRegistro" name="actualizar_cliente">
          <div id="Cont-tipo">
                      <div id="CajaGuardar" style="margin-top:0px;">
                          <label class="control-label" for="id_cliente">Id Cliente:</label>
                          <input type="text" name="id_cliente" id="CajaLlenado" placeholder="identificacion del cliente"  size="30" maxlength="30"Autofocus required autocomplete="off"; >
                      </div>

                      <div id="CajaGuardar" style="margin-top:10px";>
                          <label class="control-label" for="nombre">Nombre:</label>
                          <input name="nombre" id="CajaLlenado" placeholder="nombre del cliente" type="text" size="30" maxlength="30" Autofocus required autocomplete="off";> </div>
                        
                       <div id="CajaGuardar" style="margin-top:10px";>
                          <label class="control-label" for="direccion">Direccion:</label>
                          <input name="direccion" id="CajaLlenado" placeholder="direccion del cliente" type="text" size="30" maxlength="30" Autofocus required autocomplete="off";>
                      </div>

                      <div id="CajaGuardar" style="margin-top:10px";>
                          <label class="control-label" for="barrioconjunto">Barrio/Conjunto:</label>
                          <input name="barrioconjunto" id="CajaLlenado" placeholder="barrio/conjunto del cliente" type="text" size="30" maxlength="30" Autofocus required autocomplete="off";> </div>

                      <div id="CajaGuardar" style="margin-top:10px";>
                          <label class="control-label" for="correo">Correo:</label>
                          <input name="correo" id="CajaLlenado" placeholder="correo del cliente" type="text" size="30" maxlength="30" Autofocus required autocomplete="off";> </div>

                      <div id="CajaGuardar" style="margin-top:10px";>
                          <label class="control-label" for="observacion">Observacion:</label>
                          <input name="observacion" id="CajaLlenado" placeholder="observaciones del cliente" type="text" size="30" maxlength="30" Autofocus required autocomplete="on";> </div>
                      

                      <div id="CajaGuardar" style="margin-top:10px";>
                                  <label class="control-label">Tipo cliente</label>
                                  <select name='tipo_cliente'>
                                    <option value="n/n">Elija tipo</option>
                                    <?php
                                        include("conectbd.php");
                                        $Conectarbd = Conectar();
                                        $Query = "SELECT * FROM tipo_cliente ORDER BY id_tipo_cliente;";
                                        if($Result = $Conectarbd->query($Query)){
                                          
                                          while($Registro=$Result->fetch(PDO::FETCH_ASSOC))
                                          { 
                                            //var_dump($Registro); die;
                                            echo "<option value='".$Registro['id_tipo_Cliente']."'>".$Registro['tipo']."</option>";
                                          }

                                          $Result=null;
                                        }
                                          $Conectarbd =null;          
                                    ?>
                                  </select>
                                </div>
                      <div id="CajaGuardar" style="margin-top:10px">
                          <button type="submit" class="BtRegistrar">Registrar</button>
                      </div>

                      <div id="CajaGuardar" style="margin-top: 10px">
                        <button type="button" class="BtCancelar" onclick="location.href='clientes.php'">Cancelar</button>
                      </div>
          </div>
        </form>

	 </div>
</Body>
<!-- fnm nfwoleknmwfoikpenifpke -->
</HTML>