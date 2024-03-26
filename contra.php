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
     
     <a href="account.php" class="badge badge-success">Volver a mi cuenta</a>
   
     </div>
     <?php }?>




<tr>
<h3 class="text-center" style="color:white;"> Cambiar Contraseña</h3>
  <td colspan="5">
  <form action="" method="post">
   <div class="alert alert-dark" role="alert">

   <div class="form-group">

      <label for="my-input">Nombre</label>

      <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre" required>
      <label for="my-input">Contraseña antigua</label>

      <input id="password" class="form-control" type="password" name="old" placeholder="contraseña" required>
      
      <label for="my-input">Contraseña nueva</label>

          <input id="password" class="form-control" type="password" name="nuevo" placeholder="contraseña" required>

       </div>
    </div>
  <button class="btn-warning btn-sm" style="border-radius:10px; border-style:none;"type="submit" name="btnAccion" value="mod" >Guardiar cambios</button>
 </form>
  
  </td>
</tr>


<?php 

include 'templates/pie.php';

?>