<p class="fs-2"> Detalle Estudiante </p>

<table class="table">
  <thead>
    <tr>
    <th scope="col">Documento</th>
      <th scope="col">Nombre</th>
      <th scope="col">email</th>
      <th scope="col">Nota 1</th>
      <th scope="col">Nota 2</th>
      <th scope="col">Nota 3</th>
      <th scope="col">Promedio</th>
    </tr>
  </thead>
  <tbody>


  <?php
    foreach ($estudiante as $e) {
  ?>
    <tr>
    <th scope="row"><?php echo $e['documento']?></th>
      <td><?php echo $e['nombre']?></td>
      <td><?php echo $e['email']?></td>
      <td><?php echo $e['nota1']?></td>
      <td><?php echo $e['nota2']?></td>
      <td><?php echo $e['nota3']?></td>
      <td><?php echo $e['promedio']?></td>
    </tr>
<?php
 }
?>
   
  </tbody>
</table>