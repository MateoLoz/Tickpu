<?php
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
include 'templates/carrusel.php';
include 'templates/cabecera.php';
include 'templates/slider.php';


$usuario;
?>

    <br>
    <?php if($mensaje!=""){?>
    <div class="alert alert-success">
    <?php echo $mensaje;?>
      
      <a href="mostrarcarrito.php" class="badge badge-success">Ver carrito</a>
    
      </div>
      <?php }?>

      <?php 
      $sentencia = $pdo->prepare('SELECT * FROM `productos`');
      $sentencia->execute();
      $listaproducto = $sentencia->fetchAll(PDO::FETCH_ASSOC);
       // print_r($listaproducto);
      ?>
      <?php
      foreach($listaproducto as $producto){ ?>


        <div class="contenedor">
        <div class="card__container">
            <article class="card__article">
                <img  src="<?php echo $producto['img']; ?>"  alt="<?php echo $producto['nombre']; ?> " class="card__img">

                <div class="card__data">
                    <h4> <span> <?php echo $producto['nombre']; ?> </span></h4>
                    <h4>$ <?php echo $producto['precio']; ?></h4>
                    <form action="" method="post">
                         <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['id'],COD,KEY);?>">
                         <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['nombre'],COD,KEY); ?>">
                         <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['precio'],COD,KEY); ?>">
                         <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY);?>">
                       <button class=" btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar al carrito</button>
                       </form>
                </div>
            </article>
        </div>
 </div>
        </div>

      <?php }
      ?>

         <section class="publi">
              <figure onclick="myTic()">
               <img src="/TIENDA/img/TICKPASS.png" alt="Tickpass" class="card_img" >
                 <figcaption>Tickpass</figcaption>
                  <a href="https://www.instagram.com/tick.pass/"></a>
           </figure>
           <figure  onclick="myFunction()">
               <img src="/TIENDA/img/blanco.png" alt="El-Club" class="card_img">
               <figcaption>El Club</figcaption>
              </figure>  


              <script>
                function myTic() {
                    window.location.href = "https://www.instagram.com/tick.pass/";
               }
               function myFunction() {
                    window.location.href = "https://www.instagram.com/elclub.prod/";
               }
               
               </script>
   </section>
   

        <?php
         include'templates/pie.php';
        ?>

  











