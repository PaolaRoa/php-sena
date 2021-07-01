<p class="fs-2"> Editar Profesor </p>

<form class="row g-3" action="../controladores/GuardarEdicionProfesorControlador.php" method="post">
<div class="col-12">
    <label class="form-label">Documento: <strong> <?php echo $documento ?> </strong> </label>
    <input type="hidden"  name="documento"  value="<?php echo $documento ?>" >
  </div>

  <div class="col-12">
  <label class="form-label">Nombre</label>
    <input type="text" class="form-control" name="nombre" placeholder="Nombre Apellido" value="<?php echo $nombre ?>" required>
  </div>
  <div class="col-12">
  <label class="form-label">Correo</label>
    <input type="email" class="form-control" name="email" placeholder="usuario@dominio"  value="<?php echo $email ?>" required>
  </div>
  <div class="col-12">
  <label class="form-label">Id Usuarios</label>
    <input readonly type="text" class="form-control" name="idusuarios" placeholder="xxxxxx"  value="<?php echo $idusuarios ?>" required>
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-primary"> Actualizar Datos </button>
  </div>
</form>