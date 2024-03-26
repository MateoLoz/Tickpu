<?php

include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
include 'templates/cabecera.php';

?>
<br>
<br>
<br>
<?php if($mensaje!=""){?>
<div class="alert alert-success">
<?php echo $mensaje;?>
  
  <a href="tienda.php" class="badge badge-success">volver a la tienda</a>
 
  </div>
  <?php }?>

<tr>
<h3 class="text-center" style="color:white;">Eliminar Evento</h3>
   <td colspan="5">
   <form action="" method="post">
    <div class="alert alert-dark" role="alert">
    <div class="form-group">

       <label for="my-input">Nombre:</label>
       <input id="patron" class="form-control" type="text" name="patron" placeholder="Nombre" required>
    </div>
    </div>
     <button class="btn-danger btn-lg btn-block" style="border-radius:10px; border-style:none;"  type="submit" name="btnAccion" value="delete">Eliminar Evento</button>
   </form>
   
   </td>
 </tr>



 <?php 

include 'templates/pie.php';

?>