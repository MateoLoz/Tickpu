



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TICKPASS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

  <link rel="icon" href="img/TPicka.ico" >

    <!-- MP script -->
    

    
</head>

<body class="body">
     <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <img src="img/TICKPASS.png" width="70px" height="50px">
      <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div id="my-nav" class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="tienda.php"><box-icon type='solid' name='home'> </box-icon> Home</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link " href="mostrarcarrito.php" > <box-icon type='solid' name='cart'> </box-icon> Carrito(<?php
            echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);
                 ?>)</a>
          </li>
        
         <?php if(empty($_SESSION['usuario'])){?>
          <li class="nav-item active">
             <a class="nav-link" href="register.php"> Registro</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="sesion.php">Inicio Sesion</a>
           </li>
          <?php }?>
          <?php if(!empty($_SESSION['usuario'])){?>

            <li class="nav-item active">
               <a class="nav-link" href="account.php"><img src="img/iconos/user.png" alt="agregar" width="24px" height="24px"> <?php echo $_SESSION['usuario'] ?></a>
             </li>
             <?php }?>

             <?php if(!empty($_SESSION['usuario']) && $_SESSION['usuario'] == 'TickpassAdmin' && $_SESSION['contra'] == 'Tickp2024Admin2777341' ){?>
            <li class="nav-item active">
               <a class="nav-link" href="event.php"><img src="img/iconos/add.png" alt="agregar" width="24px" height="24px"> Agregar Evento</a>
            </li>
            <li class="nav-item active">
               <a class="nav-link" href="deleteevent.php"><img src="img/iconos/delete.png" alt="agregar" width="24px" height="24px"> Eliminar Evento</a>
           </li>
           <?php }?>


        </ul>
      </div>
     </nav>  
 <div class="container"> 