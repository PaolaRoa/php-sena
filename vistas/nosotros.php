
        <h1 class="h3 mb-3"> COLEGIO NEW COLOMBIA </h1>
<link rel="stylesheet" href="../assets/css/layout.css">
        
        <h1 class="h3 mb-3"> Quienes Somos  </h1>

<div class="align-items-md-center flex-lg-row justify-content-lg-around align-items-center"> 

    <div class="contenedorPrincipal"> 
        
    <ul class="nav flex-row flex-row-md-column flex-row-lg-column ">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="../controladores/rutasControlador.php?rutaOpc=1&SubRutaOpc=0">Misión</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../controladores/rutasControlador.php?rutaOpc=1&SubRutaOpc=1">Visión</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../controladores/rutasControlador.php?rutaOpc=1&SubRutaOpc=2">Historia</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="../controladores/rutasControlador.php?rutaOpc=1&SubRutaOpc=4">Contactos</a>
  </li>


</ul>

   </div>
    

    
    <div class="contenedorSubVista">

            <?php 

        if (!isset($subVista))
            $subVista="mision.php";

          require $subVista;

        ?>
                
    </div>


</div>