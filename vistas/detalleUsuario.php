<p class="fs-2"> Detalle Usuario </p>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Codigo</th>
      <th scope="col">Nombre</th>
      <th scope="col">Correo</th>
      <th scope="col">Contraseña</th>
   
    </tr>
  </thead>
  <tbody>


  <?php
    foreach ($usuario as $u) {
  ?>
    <tr>
      <th scope="row"><?php echo $u['codigo']?></th>
      <td><?php echo $u['nombre']?></td>
      <td><?php echo $u['correo']?></td>
      <td><?php echo $u['contrasena']?></td>
      

    </tr>
<?php
 }
?>
   
  </tbody>
</table>