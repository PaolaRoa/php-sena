
        <h1 class="h3 mb-3"> Quines Somos </h1>

<div class="col-12 d-flex flex-column align-items-lg-start align-items-md-center flex-lg-row justify-content-lg-around align-items-center"> 

    <div class="col-12 col-md-8 col-lg-3 bg-light border rounded p-2 m-3 m-lg-0"> 
        
    <ul class="nav flex-row flex-md-column flex-lg-column ">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="../controladores/rutasControlador.php?rutaOpc=1&SubRutaOpc=0">Mision</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../controladores/rutasControlador.php?rutaOpc=1&SubRutaOpc=1">Vision</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../controladores/rutasControlador.php?rutaOpc=1&SubRutaOpc=2">Empresa</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../controladores/rutasControlador.php?rutaOpc=1&SubRutaOpc=3">Formulario</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="../controladores/rutasControlador.php?rutaOpc=1&SubRutaOpc=4">Tabla</a>
  </li>


</ul>

   </div>

    <div class="col-12 col-md-8 col-lg-8 bg-light border rounded p-5">

    <?php 

if (!isset($subVista))
     $subVista="mision.php";

   require $subVista;

?>
        
    </div>


</div>