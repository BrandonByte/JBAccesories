<?php
  try{
    $identi=$_GET['id'];
    include("conectbd.php");
    $Conectarbd = Conectar();  
    $query="SELECT * FROM producto WHERE id_producto='".$identi."' limit 1";
    //var_dump($query);
  //  die;
    $Results = $Conectarbd->query($query);
    $Reg = $Results->fetch(PDO::FETCH_ASSOC);
  }
  catch(PDOException $e)
     {
     echo $query . "<br>" . $e->getMessage();
     }
  $conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="colors.css">
  <link rel="icon" type="image/png" href="Icons/icono.png"/>   
  <link rel="stylesheet" type="text/css" href="Icons/fontAwesome/all.css">
  <link rel="stylesheet" type="text/css" href="Icons/fontAwesome/v4-shims.css">
  <title>Editar Producto</title>
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
    <h1 style="margin-left: 11%; font-family: 'calibri', Garamond, 'Comic Sans';">Modificar producto</h1><hr>
        <form  method="POST" action="modificar_producto.php" method="post" class="CajaRegistro" name="actualizar_cliente">
          <div id="Cont-tipo">
                        <div id="CajaGuardar" style="margin-top:0px;">
                          <label class="control-label" for="id_producto">Id Producto:</label>
                          <input type="text" value="<?php echo $Reg['id_producto'] ?>" readonly style="background: #f3E2A9;" name="id_producto" id="CajaLlenado" size="30" maxlength="30"Autofocus;>
                      </div>

                      <div id="CajaGuardar" style="margin-top:10px";>
                          <label class="control-label" for="nombre">Nombre:</label>
                          <input name="nombre" id="CajaLlenado" placeholder="nombre del producto" type="text" value="<?php echo $Reg['nombre'] ?>" size="30" maxlength="30" Autofocus autocomplete="off";> </div>
                        

                      <div id="CajaGuardar" style="margin-top:10px";>
                                  <label class="control-label">Marca</label>
                                  <select name='marca'>
                                    <?php
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
                      <div id="CajaGuardar" style="margin-top:10px";>
                                  <label class="control-label">Categoria</label>
                                  <select name='categoria'>
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
                          <input name="cantidad" id="CajaLlenado" value="<?php echo $Reg['cantidad'] ?>" placeholder="cantidad" type="number" size="30" maxlength="30" Autofocus required autocomplete="off";>
                      </div>

                      <div id="CajaGuardar" style="margin-top:10px";>
                          <label class="control-label" for="referencia">Referencia:</label>
                          <input name="referencia" id="CajaLlenado" value="<?php echo $Reg['referencia'] ?>"  placeholder="referencia del producto" type="text" size="30" maxlength="30" Autofocus required autocomplete="off";>
                      </div>

                      <div id="CajaGuardar" style="margin-top:10px";>
                          <label class="control-label" for="garantia">Garantia:</label>
                          <input name="garantia" id="CajaLlenado" value="<?php echo $Reg['garantia'] ?>"  placeholder="Garantia del producto" type="number" size="30" maxlength="30" Autofocus required autocomplete="off";>
                      </div>

                      <div id="CajaGuardar" style="margin-top:10px";>
                          <label class="control-label" for="vlr_venta">Valor:</label>
                          <input name="vlr_venta" id="CajaLlenado" value="<?php echo $Reg['vlr_venta'] ?>"  placeholder="Valor del producto" type="number" size="30" maxlength="30" Autofocus required autocomplete="off";>
                      </div>

                      <div id="CajaGuardar" style="margin-top:10px";>
                          <label class="control-label" for="caracteristicas">Caracteristicas:</label>
                          <input name="caracteristicas" id="CajaLlenado" value="<?php echo $Reg['caracteristicas'] ?>"  placeholder="Caracteristicas del producto" type="text" size="30" maxlength="200" Autofocus required autocomplete="off";>
                      </div>

                      <div id="CajaGuardar" style="margin-top:10px";>
                          <label class="control-label" for="foto">foto:</label>
                          <input name="foto" id="CajaLlenado" value="<?php echo $Reg['foto'] ?>"  placeholder="foto del producto" type="text" size="30" maxlength="200" Autofocus required autocomplete="off";>
                      </div>

                      <div id="CajaGuardar" style="margin-top:10px">
                          <button type="submit" class="BtRegistrar">Modificar</button>
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