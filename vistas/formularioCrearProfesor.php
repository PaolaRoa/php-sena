<form class="row g-3" action="../controladores/CrearProfesorControlador.php" method="POST">
<div class="col-12">
  <label class="form-label">Documento</label>
    <input type="text" class="form-control" name="documento" placeholder="Nombre Apellido" value="<?php echo $nombre ?>" required>
  </div>
  <div class="col-12">
  <label class="form-label">Nombre</label>
    <input type="text" class="form-control" name="nombre" placeholder="Nombre Apellido" value="<?php echo $nombre ?>" required>
  </div>
  <div class="col-12">
  <label class="form-label">Correo electrónico</label>
    <input type="email" class="form-control" name="email" placeholder="usuario@dominio"  value="<?php echo $correo ?>" required>
  </div>
  <div class="col-12">
  <label class="form-label">Contraseña</label>
    <input type="text" class="form-control" name="clave" placeholder="xxxxxx"  value="<?php echo $contrasena ?>" required>
  </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
  </div>
</form>