<?php
  session_start();
  if($_SESSION['rol']!= 'admin'){
    echo "Usted no esta autorizado para acceder a este recurso";
}
else{
?>
<h1 class="h3 mb-3">Estudiantes</h1>

<div class="col-12 d-flex flex-column align-items-lg-start align-items-md-center flex-lg-row justify-content-lg-around align-items-center"> 

    <div class="col-12 col-md-8 col-lg-3 bg-light border rounded p-2 m-3 m-lg-0"> 
        
    <ul class="nav flex-row flex-md-column flex-lg-column ">
 
  <li class="nav-item">
    <a class="nav-link" href="../controladores/EstudianteControlador.php?action=create">Agregar Estudiante</a>
    <a class="nav-link" href="../controladores/EstudianteControlador.php?action=list">Estudiantes registrados</a>

    
  </li>



</ul>

   </div>

    <div class="col-12 col-md-8 col-lg-8 bg-light border rounded p-5">

    <?php 


if (!isset($subVista))
     $subVista="crudIntro.php";

   require $subVista;

?>
        
    </div>


</div>
<?php
}
?>