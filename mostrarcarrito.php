<?php session_start();

?>



<?php
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
include 'templates/cabecera.php';



?>

</br>
</br>
<br>
<div class="li">
<h3 style="color: white;">Lista del carrito</h3>
</div>
<?php $total =0; ?>
<?php if(!empty($_SESSION['CARRITO'])) {  ?>
<table class="table table-light  table-bordered">
    <tbody>
        <tr>
            <td  width="15%"> <b>Descripcion</b></td>
            <td width="15%" class="text-center"><b>Cantidad</b></td>
            <td width="20%"class="text-center"><b>Precio</b></td>
            <td width="20%"class="text-center"><b>Total</b></td>
            <td width="5%">--</td>
        </tr>
        <?php foreach($_SESSION['CARRITO'] as $indice=>$producto){ ?>
        <tr>
            <td width="15%"><?php echo $producto['nombre'] ?></td>
            <td width="15%"class="text-center"><?php echo $producto['cantidad'] ?></td>
            <td width="20%"class="text-center"><?php echo $producto['precio'] ?></td>
            <td width="20%"class="text-center"> <?php echo number_format($producto['precio']*$producto['cantidad'],2);  ?> </td>
            <td width="5%">
                
            <form action="" method="post">
             
            <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['id'],COD,KEY);?>">
            
            <button class="btn btn-danger" 
            typer="submit"
            name="btnAccion" 
            value="Eliminar">Eliminar</button>

            </form>
            
        
        </td>
        </tr>
        <?php $total = $total+($producto['precio']*$producto['cantidad']); ?>
        <?php } ?>
        <tr>
            <td colspan="3" align="right"><h3>Total</h3></td>
            <td align="center" <h3><?php echo number_format($total,2);?> </h3></td>
            <td></td>
        </tr>
          <tr>
            <td colspan="5">
            <form action="pagar.php" method="post">
             <div class="alert alert-dark" role="alert">
             <div class="form-group">
                <label for="my-input">Nombre y Apellido</label>
                <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Por favor escribe tu nombre y Apellido" required>
                <label for="my-input">correo:</label>
                <input id="apellido" class="form-control" type="text" name="correo" placeholder="Por favor escribe tu correo" required>
                <label for="my-input">numero de telefono</label>
                <input id="email" class="form-control" type="telefono" name="telefono" placeholder="Por favor escribe tu nunero de telefono" required>
             </div>

             <small id="emailHelp" class="form-text text-muted">
                Los codigos qr se enviaran a este correo.
             </small>
             </div>
              <button class="btn-primary btn-lg btn-block" type="submit" name="btnAccion" value="proceder">Proceder a pagar</button>
            </form>
            

            </td>
          </tr>

    </tbody>
</table>


<?php }else {  ?>
<div class="alert alert-success" role="alert">
    No hay productos en el carrito.
</div>
<?php } ?>


<?php include 'templates/pie.php';  ?>