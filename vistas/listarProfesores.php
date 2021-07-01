<table class="table">
  <thead>
    <tr>
      <th scope="col">Documento</th>
      <th scope="col">Nombre</th>
      <th scope="col">email</th>
      <th scope="col">id usuario</th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>


  <?php
  
    foreach ($listaProfesor as $profe) {
  ?>
    <tr>
      <th scope="row"><?php echo $profe['documento']?></th>
      <td><?php echo $profe['nombre']?></td>
      <td><?php echo $profe['email']?></td>
      <td><?php echo $profe['idusuarios']?></td>
      <td> <a href="../controladores/DetalleProfesorControlador.php?id=<?php echo $profe['codigo']?>"> Detalle </a> </td>
      <td> <a href="../controladores/EditarProfesorControlador.php?id=<?php echo $profe['codigo']?>"> Editar </a> </td>
      <td> <a href="../controladores/BorrarProfesorControlador.php?id=<?php echo $profe['codigo']?>"> Borrar </a> </td>

    </tr>
<?php
 }
?>
   
  </tbody>
</table>