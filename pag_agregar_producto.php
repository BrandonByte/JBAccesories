<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="colors.css">
  <link rel="icon" type="image/png" href="Icons/icono.png"/>   
  <link rel="stylesheet" type="text/css" href="Icons/fontAwesome/all.css">
  <link rel="stylesheet" type="text/css" href="Icons/fontAwesome/v4-shims.css">
  <title>Agregar Producto</title>
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
    <h1 style="margin-left: 11%; font-family: 'calibri', Garamond, 'Comic Sans';">Agregar Producto</h1><hr>
        <form  method="POST" action="agregar_producto.php" method="post" class="CajaRegistro" name="actualizar_producto">
          <div id="Cont-tipo">
                      <div id="CajaGuardar" style="margin-top:0px;">
                          <label class="control-label" for="id_producto">Id Producto:</label>
                          <input class="id_producto" type="text" name="id_producto" id="CajaLlenado" placeholder="identificacion del producto"  size="30" maxlength="30"Autofocus required pattern="[A-Za-z1-9]{1,15}" title="El Id debe ser alfanumerico, no se permite caracteres especiales" autocomplete="off"; >
                      </div>

                      <div id="CajaGuardar" style="margin-top:10px";>
                          <label class="control-label" for="nombre">Nombre:</label>
                          <input class="nombre" name="nombre" id="CajaLlenado" placeholder="nombre del producto" type="text" size="30" maxlength="30" Autofocus pattern="[A-Za-z1-9]{1,15}" title="El nombre debe ser solo texto, no se permite numeros ni caracteres especiales";> </div>
                        

                      <div id="CajaGuardar" style="margin-top:10px";>
                                  <label class="control-label">Marca</label>
                                  <select class="option" name='marca' required>
                                    <option  value="">Elija marca</option>
                                    <?php
                                        include("conectbd.php");
                                        $Conectarbd = Conectar();
                                        $Query = "SELECT * FROM marca ORDER BY id_marca;";
                                        if($Result = $Conectarbd->query($Query)){
                                          
                                          while($Registro=$Result->fetch(PDO::FETCH_ASSOC))
                                          { 
                                            //var_dump($Registro); die;
                                            echo "<option value='".$Registro['id_marca']."'>".$Registro['marca']."</option>";
                                          }

                                          $Result=null;
                                        }
                                          $Conectarbd =null;          
                                    ?>
                                  </select>
                                </div>
                      <div  id="CajaGuardar" style="margin-top:10px";>
                                  <label class="control-label">Categoria</label>
                                  <select class="Catego" name='categoria' required>
                                    <option  value="">Elija categoria</option>
                                    <?php
                                        $Conectarbd = Conectar();
                                        $Query = "SELECT * FROM categoria ORDER BY id_categoria;";
                                        if($Result = $Conectarbd->query($Query)){
                                          
                                          while($Registro=$Result->fetch(PDO::FETCH_ASSOC))
                                          { 
                                            //var_dump($Registro); die;
                                            echo "<option value='".$Registro['id_categoria']."'>".$Registro['categoria']."</option>";
                                          }

                                          $Result=null;
                                        }
                                          $Conectarbd =null;          
                                    ?>
                                  </select>
                                </div>
                      <div id="CajaGuardar" style="margin-top:10px";>
                          <label class="control-label" for="cantidad">Cantidad:</label>
                          <input class="cantidad" name="cantidad" id="CajaLlenado" placeholder="cantidad" type="number" size="30" maxlength="30" min="1" Autofocus;>
                      </div>

                      <div id="CajaGuardar" style="margin-top:10px";>
                          <label class="control-label" for="referencia">Referencia:</label>
                          <input class="referencia" name="referencia" id="CajaLlenado" placeholder="referencia del producto" type="text" size="30" maxlength="30" Autofocus pattern="[A-Za-z1-9]{1,15}" title="La referencia debe ser Alfanumerica, no se permite caracteres especiales" autocomplete="off";>
                      </div>

                      <div id="CajaGuardar" style="margin-top:10px";>
                          <label class="control-label" for="garantia">Garantia:</label>
                          <input class="garantia" name="garantia" id="CajaLlenado" placeholder="Garantia del producto" type="number" size="30" maxlength="30" min="0" max="3" Autofocus autocomplete="off";>
                      </div>

                      <div id="CajaGuardar" style="margin-top:10px";>
                          <label class="control-label" for="vlr_venta">Valor:</label>
                          <input class="vlr_venta" name="vlr_venta" id="CajaLlenado" placeholder="Valor del producto" type="number" size="30" maxlength="30" min="1" Autofocus autocomplete="off";>
                      </div>

                      <div id="CajaGuardar" style="margin-top:10px";>
                          <label class="control-label" for="caracteristicas">Caracteristicas:</label>
                          <input class="caracteristicas" name="caracteristicas" id="CajaLlenado" placeholder="Caracteristicas del producto" type="text" size="30" maxlength="200" Autofocus autocomplete="off";>
                      </div>

                    <!--  <div id="CajaGuardar" style="margin-top:10px";>
                          <label class="control-label" for="foto">foto:</label>
                          <input name="foto" id="CajaLlenado" placeholder="foto del producto" type="text" size="30" maxlength="200" Autofocus required autocomplete="off";>
                      </div>-->

                      <div id="CajaGuardar" style="margin-top:10px">
                          <button type="submit" class="BtRegistrar">Registrar</button>
                      </div>

                      <div id="CajaGuardar" style="margin-top: 10px">
                        <button type="button" class="BtCancelar" onclick="location.href='productos.php'">Cancelar</button>
                      </div>
          </div>
        </form>

	 </div>
</Body>
<!-- fnm nfwoleknmwfoikpenifpke -->
</HTML>