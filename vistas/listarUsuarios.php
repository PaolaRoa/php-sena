<table class="table">
  <thead>
    <tr>
      <th scope="col">Codigo</th>
      <th scope="col">Nombre</th>
      <th scope="col">Correo</th>
      <th scope="col">Contraseña</th>
      <th scope="col">Pais</th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>


  <?php
    foreach ($listaUsuarios as $usuario) {
  ?>
    <tr>
      <th scope="row"><?php echo $usuario['codigo']?></th>
      <td><?php echo $usuario['nombre']?></td>
      <td><?php echo $usuario['correo']?></td>
      <td><?php echo $usuario['contrasena']?></td>
      <td><?php echo $usuario['pais']?></td>
      <td> <a href="../controladores/usuarioDetalleControlador.php?id=<?php echo $usuario['codigo']?>"> Detalle </a> </td>
      <td> <a href="../controladores/usuarioDatosEditarControlador.php?id=<?php echo $usuario['codigo']?>"> Editar </a> </td>
      <td> <a href="../controladores/usuarioDetalleBorrarControlador.php?id=<?php echo $usuario['codigo']?>"> Borrar </a> </td>

    </tr>
<?php
 }
?>
   
  </tbody>
</table>