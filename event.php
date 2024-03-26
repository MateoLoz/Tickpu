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
<br>
<tr>
<h3 class="text-center" style="color:white;">Crear Evento</h3>
   <td colspan="5">
   <form action="" method="post">
    <div class="alert alert-dark" role="alert">
    <div class="form-group">
       <label for="my-input">Nombre</label>
       <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre" required>
       <label for="my-input">precio</label>
       <input id="precio" class="form-control" type="text" name="precio" placeholder="precio" required>
       <label for="my-input">imagen</label>
       <input id="imagen" class="form-control" type="text" name="imagen" placeholder="imagen" required>
       <label for="my-input">descripcion</label>
      <input id="descripcion" class="form-control" type="text" name="descripcion" placeholder="descripcion" required>
    </div>
    </div>
     <button class="btn-primary btn-lg btn-block" type="submit" name="btnAccion" value="add">Agregar Evento</button>
   </form>
   
   </td>
 </tr>


 <?php 

include 'templates/pie.php';

?>
























