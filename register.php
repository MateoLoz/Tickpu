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
     
     <a href="tienda.php" class="badge badge-success">Volver a la tienda</a>
   
     </div>
     <?php }?>


<tr>
<h3 class="text-center" style="color:white;">Registro</h3>
  <td colspan="5">
  <form action="" method="post">
   <div class="alert alert-dark" role="alert">

   <div class="form-group">

      <label for="my-input">Nombre</label>

      <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre" required>
      <label for="my-input">Contraseña</label>

      <input id="password" class="form-control" type="password" name="password"  placeholder="contraseña" required>

       </div>
    </div>
  <button class="btn-warning btn-sm" style="border-radius:10px; border-style:none;"type="submit" name="btnAccion" value="register" >Registrarme</button>
 </form>
  
  </td>
</tr>

<?php 

include 'templates/pie.php';

?>