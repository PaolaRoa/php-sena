<div class='alert alert-danger' role='alert'> Desea Elimnar los Datos del Siguiete usuario ? </div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Codigo</th>
      <th scope="col">Nombre</th>
      <th scope="col">Correo</th>
      <th scope="col">Contraseña</th>

      <th scope="col"> </th>
   
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

      <td> 
        <form class="row g-3" action="../controladores/usuarioBorrarControlador.php" method="post">
        <input type="hidden"  name="codigo"  value="<?php echo $u['codigo'] ?>" >
        <div class="col-12">
         <button type="submit" class="btn btn-danger"> Borrar  Datos </button>
            </div>
            </form>

      
      </td>
      

    </tr>
<?php
 }
?>
   
  </tbody>
</table>