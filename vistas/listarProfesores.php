
<?php
  if(isset($errormsg)){
    echo "<div class='alert alert-warning' role='alert'>";
    echo $errormsg;
    echo "</div>";
  }
  if(isset($msg)){
    echo "<div class='alert alert-success' role='alert'>";
    echo $msg;
    echo "</div>";

  }
?>
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
      <td> <a href="../controladores/DetalleProfesorControlador.php?id=<?php echo $profe['idusuarios']?>"> Detalle </a> </td>
      <td> <a href="../controladores/EditarProfesorControlador.php?id=<?php echo $profe['idusuarios']?>"> Editar </a> </td>
      <td onClick = confirmDelete(<?php echo $profe['idusuarios']?>)>Borrar</td>

    </tr>
<?php
 }
?>
   
  </tbody>
</table>

<script>
        const confirmDelete =(id)=> (
              Swal.fire({
            title: '¿seguro?',
            text: "Despues de eliminar no podras revertirlo",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#45EE88',
            confirmButtonText: 'eliminar',
            cancelButtonText: 'cancelar',
            cancelButtonColor: '#EE6E45',
          }).then((result) => {
            if (result.isConfirmed) {
              
              window.location=`../controladores/EliminarProfesorControlador.php?id=${id}`;
            }
          })
        )
    </script>