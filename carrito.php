<?php


$pdo;
$mensaje="";

if(isset($_POST['btnAccion']))
{
    switch($_POST['btnAccion'])
    {
      case 'Agregar':
          
         if(is_numeric( openssl_decrypt($_POST['id'],COD,KEY)))

         {
           $ID=openssl_decrypt($_POST['id'],COD,KEY);
           $mensaje.="ID:"." ".$ID."<br/>";
         } else
         {
           $mensaje.= "Algo salio mal...";
         }
         
          if(is_string(openssl_decrypt($_POST['nombre'],COD,KEY)))
          {
            $NOMBRE=openssl_decrypt($_POST['nombre'],COD,KEY);
            $mensaje.="Nombre: "." ".$NOMBRE."<br/>" ;
          }else{$mensaje.= "Algo salio mal..."; break;}
          
          if(is_numeric(openssl_decrypt($_POST['cantidad'],COD,KEY)))
          {
            $CANTIDAD=openssl_decrypt($_POST['cantidad'],COD,KEY);
            $mensaje.="Cantidad:"." ".$CANTIDAD."<br/>";
          }else{$mensaje.= "Algo salio mal..."; break;}

          if(is_numeric(openssl_decrypt($_POST['precio'],COD,KEY)))
          {
            $PRECIO=openssl_decrypt($_POST['precio'],COD,KEY);
            $mensaje.="Precio:"." ".$PRECIO."<br/>";
          }else{$mensaje.= "Algo salio mal..."; break;} 

          if (!isset($_SESSION['CARRITO']))
           {
             $producto=array(
             'id'=>$ID,
             'nombre'=>$NOMBRE,
             'cantidad'=>$CANTIDAD,
             'precio'=>$PRECIO
             );
             $_SESSION['CARRITO'][0]=$producto;
             $mensaje="Producto agregado al carrito";
            }
            
            else
            {

              $idProductos=array_column($_SESSION['CARRITO'],"id");
              
              if(in_array($ID,$idProductos)){
                  echo"<script>alert('El producto ya ha sido seleccionado');</script>";
                  $mensaje="";

              }else{
              $NumeroProductos=count($_SESSION['CARRITO']);
              $producto=array(
              'id'=>$ID,
              'nombre'=>$NOMBRE,
              'cantidad'=>$CANTIDAD,
              'precio'=>$PRECIO
              );

              $_SESSION['CARRITO'][$NumeroProductos]=$producto;
              $mensaje="Producto agregado al carrito";
            }
           }

            //$mensaje= print_r($_SESSION,true);
            
            
          break;

          case "Eliminar":
               
            if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
              
              $ID=openssl_decrypt($_POST['id'],COD,KEY);

              foreach($_SESSION['CARRITO'] as $indice=>$producto)
              {
                 
                if($producto['id']==$ID){
                      unset($_SESSION['CARRITO'][$indice]);              
                      $_SESSION['CARRITO']=array_values($_SESSION["CARRITO"]);

                 }

              }
            }
               
            else
            {
              $mensaje.= "Algo salio mal...";
            }
            
            break;

            case "add":


              if($_POST){
              $nombre = $_POST['nombre'];
              $precio = $_POST['precio'];
              $imagen = $_POST['imagen'];
              $descripcion = $_POST['descripcion'];
              
              
              
              
              $sentencia = $pdo->prepare("INSERT INTO 
              `productos` (`id`, `nombre`, `descripcion`, `precio`, `img`)
               VALUES (NULL, :nombre, :descripcion, :precio, :imagen);");
               $sentencia->bindParam( ":nombre",$nombre);
               $sentencia->bindParam( ":descripcion",$descripcion);
               $sentencia->bindParam( ":precio",$precio);
               $sentencia->bindParam( ":imagen",$imagen);
               $sentencia->execute();
              
              
               
              
              if ($sentencia) {
              $mensaje = "evento agregado correctamente!";
              }
              if(!$sentencia){
              $mensaje = "";
              }
              }

              break;


              case "delete":

                if($_POST){


                  $pat = $_POST['patron'];
                  
                  
                  $sentencia = $pdo->prepare("DELETE FROM `productos` WHERE nombre = :patron ;");
                  $sentencia ->bindParam(":patron",$pat);
                  $sentencia -> execute();
                  
                  if($sentencia){
                      $mensaje = "evento eliminado!";
                  }
                  
                  if(!$sentencia){
                     $mensaje = "";
                  }
                      
                  
                  }
                  
              break;


              case "register":
                if($_POST){

                  $nombre = $_POST['nombre'];
                  $password = $_POST['password'];
                  $rol = "user";
                  
                  $sentencia = $pdo-> prepare("INSERT INTO 
                  `usuarios` (`id`, `nombre`, `contrasena`, `rol`) 
                  VALUES (NULL, :nombre, :password, :rol)");
                  
                  $sentencia->bindParam(":nombre",$nombre);
                  $sentencia->bindParam(":password",$password);
                  $sentencia->bindParam(":rol",$rol);
                  $sentencia->execute();
                  
                  if($sentencia){
                      $mensaje = "Registro exitoso!";
                  }
                  
                  if(!$sentencia){
                      $mensaje = "Algo salio mal..";
                  }
                  
                  }

                  break;

                  case"mod":
                    if($_POST){
                      $name =$_POST['nombre'];
                      $old =$_POST['old'];
                      $nuevo = $_POST['nuevo'];
                      
                      $sentencia = $pdo->prepare("SELECT * FROM `usuarios` WHERE nombre = :nombre AND contrasena = :old;");
                      $sentencia->bindParam(":nombre",$name);
                      $sentencia->bindParam(":old",$old);
                      $sentencia->execute();
                      
                      if($sentencia){
                          $change = $pdo->prepare("UPDATE `usuarios` SET `contrasena` = :nuevo WHERE `usuarios`.`nombre` =  :nombre;");
                          $change->bindParam(":nuevo",$nuevo);
                          $change->bindParam(":nombre",$name);
                          $change->execute();
                      
                          if($change){
                      
                              $mensaje = "contraseña modificada de manera exitosa!";
                          }
                          if(!$change){
                              $mensaje = "Error algo salio mal!";
                          }
                      
                          $_SESSION['usuario'] = $name;
                          $_SESSION['contra'] = $nuevo;
                      }
                      
                      if(!$sentencia){
                          $mensaje = "Error contraseña o  usuario ingresado erroneo!";
                      }
                      }
                      break;

                      case "borr":


                        if($_POST){
                          $name =$_POST['nombre'];
                          $old =$_POST['old'];
                      
                          
                          $sentencia = $pdo->prepare("SELECT * FROM `usuarios` WHERE nombre = :nombre AND contrasena = :old;");
                          $sentencia->bindParam(":nombre",$name);
                          $sentencia->bindParam(":old",$old);
                          $sentencia->execute();
                          
                          if($sentencia){
                              $change = $pdo->prepare("DELETE  FROM `usuarios` WHERE nombre = :nombre AND contrasena = :old;");
                              $change->bindParam(":nombre",$name);
                              $change->bindParam(":old",$old);
                              $change->execute();
                          
                              if($change){
                          
                                  $mensaje = "Cuenta eliminada!";
                                  $_SESSION['usuario'] = null;
                                  $_SESSION['contra'] = null;
                              }
                              if(!$change){
                                  $mensaje = " algo salio mal!";
                              }
                          
                        
                        
                          }
                          
                          if(!$sentencia){
                              $mensaje = "Error contraseña o  usuario ingresado erroneo!";
                          }
                          }
    
                          break;

    }
}


?>