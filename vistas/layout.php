<?php
         session_start();
       
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="../assets/css/misEstilos.css">
     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Taller Boostrap</title>
</head>
<body>

    <header>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
            <a class="navbar-brand" href="../controladores/rutasControlador.php?rutaOpc=0"></a>
            
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../controladores/rutasControlador.php?rutaOpc=0">Inicio</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../controladores/rutasControlador.php?rutaOpc=1">Nosotros</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../controladores/rutasControlador.php?rutaOpc=2">Servicios Estudiantiles</a>
                  </li>
                <?php
                  if($_SESSION['rol']=="admin"){
                    ?>
                  <li class="nav-item">
                    <a class="nav-link" href="../controladores/rutasControlador.php?rutaOpc=4">Profesores</a>
                  </li>
                <?php
                  }
                ?>
                <?php
                  if($_SESSION['rol']=="admin" || $_SESSION['rol']=="profesor"){
                    ?>
                  <li class="nav-item">
                    <a class="nav-link" href="../controladores/rutasControlador.php?rutaOpc=5">estudiantes</a>
                  </li>
                <?php
                  }
                ?>
                <?php
                  if($_SESSION['rol']=="estudiante"){
                    ?>
                  <li class="nav-item">
                    <a class="nav-link" href=<?php echo "../controladores/EstudianteVerNotasControlador.php?id=".$_SESSION['user']['idusuarios'].""?>>Mis Notas</a>
                  </li>
                <?php
                  }
                ?>
                <?php
                  if(isset($_SESSION['rol'])){
                    ?>
                  <li class="nav-item">
                    <a class="nav-link" href="../controladores/LogoutControlador.php">Salir</a>
                  </li>
                <?php
                  }
                ?>
                  
                </ul>
              </div>
            </div>
          </nav>

    </header>

    <main class="col-12 bg-white y p-4 d-flex flex-column align-items-center justify-content-start" >
    <?php 

     if (!isset($vista))
          $vista="home.php";

        require $vista;
    
   ?>
    </main>

    <footer id="footerA" class=" bg-dark d-flex justify-content-lg-around align-items-center">
       
    <div class="d-flex justify-content-lg-around align-items-center m-2">

        
        <div class="d-flex flex-column align-items-center">
             <p class="text-white m-0 p-0"> Colegio New Colombia  </p>
             <p class="text-white m-0 p-0 "> Bogotá D.C. </p>
             <p class="text-white m-0 p-0 "> Calle 202 No 28 - 31 Tel  </p>
        </div>
    </div>

    </footer>
    

    

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="../assets/js/bootstrap.bundle.min.js" ></script>




</body>
</html>