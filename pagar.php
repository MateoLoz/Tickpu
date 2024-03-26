<?php
session_start();

include 'global/config.php';
include 'global/conexion.php';
include 'templates/cabecera.php';
include 'carrito.php';

?>






<?php



if($_POST){
    $total=0;
    $SID=session_id();
    $Correo=$_POST['correo']; 
    $nombre=$_POST['nombre'];
    $telefono=$_POST['telefono'];
    foreach($_SESSION['CARRITO'] as $indice=>$producto){
    $total=$total+($producto['precio']*$producto['cantidad']); 

}


 $sentencia= $pdo->prepare("INSERT INTO `ventas` 
(`id`, `nombreApe`, `telefono`, `correo`, `datos`, `fecha`, `total`, `status`, `clavetransaccion`)
 VALUES (NULL, :nombreApe, :telefono, :Correo, '', NOW(), :total, 'pendiente', :clavetransaccion);");
 
 $sentencia->bindParam( ":clavetransaccion",$SID);
 $sentencia->bindParam( ":Correo",$Correo);
 $sentencia->bindParam( ":total",$total);
 $sentencia->bindParam( ":telefono",$telefono);
 $sentencia->bindParam( ":nombreApe",$nombre);
 $sentencia->execute();
 $idVenta=$pdo->lastInsertId();

 foreach($_SESSION['CARRITO'] as $indice=>$producto){

    $sentencia= $pdo->prepare("INSERT INTO `detalleventa`
     (`id`, `idventa`, `idproducto`, `preciounitario`, `cantidad`)
      VALUES (NULL, :idventa, :idproducto, :preciounitario, :cantidad);");

       $sentencia->bindParam( ":idventa",$idVenta);
       $sentencia->bindParam( ":idproducto",$producto['id']);
       $sentencia->bindParam( ":preciounitario",$producto['precio']);
       $sentencia->bindParam( ":cantidad",$producto['cantidad']);
       $sentencia->execute();


 }


//  echo"<h3>".$total."</h3>";

}
?>
<script src="copy.js"></script>
</br>
</br>

 <div class="jumbotron text-center">
    <h1 class="display-4">  Paso Final!</h1>
    <hr class="my-4">
    <p class="lead">Estas a punto de pagar com mercadoPago la cantidad de:
        <h4>$<?php echo number_format($total,2); ?></h4>
    </p>
    <H3 class="text-start">CVU:</H3>

        <h4 id="miTexto">0000003100045383044346</h4>
    
    <H4 class="text-start">Alias<h5 id="alias">ANTONIGENNAROSEBA</h5></H4>
    
    <H4 class="text-start">Enviar comprobante a <h5 id="minum">+54 9 3812 50-0650</h5></H4>
<br><br>
<a href="https://www.mercadopago.com.ar/withdraw#from-section=menu"><button class="btn-primary btn-lg btn-block"  >Pagar</button><br></a>
    <small  class="form-text text-muted">
   El impacto del pago puede tardar entre 24 y 48hr al impactar recibira los codigos Qr
    </small>
    

 </div>




<?php include 'templates/pie.php';  ?>