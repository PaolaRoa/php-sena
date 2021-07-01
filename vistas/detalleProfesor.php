<p class="fs-2"> Detalle Usuario </p>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id Usuario</th>
      <th scope="col">Documento</th>
      <th scope="col">Nombre</th>
      <th scope="col">Correo</th>
   
    </tr>
  </thead>
  <tbody>


  <?php
    foreach ($profesor as $p) {
  ?>
    <tr>
      <th scope="row"><?php echo $p['idusuarios']?></th>
      <td><?php echo $p['documento']?></td>
      <td><?php echo $p['nombre']?></td>
      <td><?php echo $p['email']?></td>
      

    </tr>
<?php
 }
?>
   
  </tbody>
</table>