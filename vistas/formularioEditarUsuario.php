<p class="fs-2"> Editar Datos  Usuario </p>

<form class="row g-3" action="../controladores/usuarioEditarControlador.php" method="post">
<div class="col-12">
    <label class="form-label">Codigo: <strong> <?php echo $codigo ?> </strong> </label>
    <input type="hidden"  name="codigo"  value="<?php echo $codigo ?>" >
  </div>

  <div class="col-12">
  <label class="form-label">Nombre</label>
    <input type="text" class="form-control" name="nombre" placeholder="Nombre Apellido" value="<?php echo $nombre ?>" required>
  </div>
  <div class="col-12">
  <label class="form-label">Correo</label>
    <input type="email" class="form-control" name="correo" placeholder="usuario@dominio"  value="<?php echo $correo ?>" required>
  </div>
  <div class="col-12">
  <label class="form-label">Contrasena</label>
    <input type="text" class="form-control" name="contrasena" placeholder="xxxxxx"  value="<?php echo $contrasena ?>" required>
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-primary"> Actualizar Datos </button>
  </div>
</form>