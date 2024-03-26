<?php

include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
include 'templates/cabecera.php';

?>

<?php 

if(isset($_POST['close'])){

  $_SESSION['usuario'] = null;
  $_SESSION['contra'] = null;
  header("location:tienda.php");
  exit;
}


?>
<br>
<br>
<br>
<h3 style="color: white;">Mi cuenta</h3>

<table class="table table-light  table-bordered">
  <thead>
    <tr>
      <th scope="col"width="10%"><img src="img/iconos/user.png" alt="agregar" width="24px" height="24px"></th>
      <th scope="col" width="30%">Nombre</th>
      <th scope="col" width="30%">Contraseña</th>
    </tr>
  </thead>

  <tbody>

    <tr>
      <th scope="row" width="10%"><form action="" method="post"><button class="btn btn-primary btn-sm" value="close" name="close">Cerrar sesion  </button></form></th>
      <td scope="col" width="30%"><?php echo $_SESSION['usuario'] ?></td>
      <td scope="col" width="30%"><?php echo $_SESSION['contra']  ?> &nbsp; &nbsp; <a href="contra.php"><button class="btn btn-primary btn-sm">Cambiar Contraseña</button></a>
       <a href="accdelete.php"><button class="btn btn-primary btn-sm">Eliminar cuenta</button></a></td>
       
      
</table>




<?php 

include 'templates/pie.php';

?>
