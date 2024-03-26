<?php session_start();
?>
<?php 
include 'global/config.php';
include 'global/conexion.php';
include 'templates/cabecera.php';


?>

<?php 

if($_POST){

$nombre = $_POST['nombre'];
$pass = $_POST['password'];



$sentencia = $pdo-> prepare("SELECT * FROM `usuarios` WHERE nombre = :nombre AND contrasena = :password ;");

$sentencia->bindParam(":nombre",$nombre);
$sentencia->bindParam(":password",$pass);
$sentencia->execute();

if($sentencia){

  $_SESSION['usuario'] = $nombre;
  $_SESSION['contra'] = $pass;
    header('location:tienda.php');
    exit;

  }

if(!$sentencia){
    $mensaje = "Usuario o contraseña incorrectos!";
}


}








?>





<br>
<br>
<br>
<tr>
<h3 class="text-center" style="color:white;">Inicio Sesion</h3>
  <td colspan="5">
  <form action="" method="post">
   <div class="alert alert-dark" role="alert">

   <div class="form-group">

      <label for="my-input">Nombre</label>

      <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre" required>
      <label for="my-input">Contraseña</label>

      <input id="password" class="form-control" type="password" name="password" placeholder="contraseña" required>

       </div>
    </div>
  <button class="btn-primary btn-sm" style="border-radius:10px; border-style:none;"type="submit" name="btnAccion" value="sesion" >Iniciar Sesion</button>
 </form>
  
  </td>
</tr>


<?php 

include 'templates/pie.php';

?>