<p class="fs-2"> Editar Estudiante </p>

<form class="row g-3" action="../controladores/GuardarEdicionEstudianteControlador.php" method="post">
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
  <div>
  <label class="form-label">Nota 1</label>
    <input min=0 max=5 step=0.1 type="number" class="form-control" name="nota1" placeholder="ingrese la nota 1"  value="<?php echo $nota1 ?>" required>
  </div>
  <div>
  <label class="form-label">Nota 2</label>
    <input min=0 max=5 step=0.1 type="number" class="form-control" name="nota1" placeholder="ingrese la nota 2"  value="<?php echo $nota2 ?>" required>
  </div>
  <div>
  <label class="form-label">Nota 3</label>
    <input min=0 max=5 step=0.1 type="number" class="form-control" name="nota1" placeholder="ingrese la nota 3"  value="<?php echo $nota3 ?>" required>
  </div>
  <div>
  <label class="form-label">Promedio</label>
    <input min=0 max=5 step=0.1 type="number" readonly class="form-control" name="nota1" placeholder="ingrese la nota 1"  value="<?php echo $promedio ?>" required>
  </div>
  <div class="col-12">
    <input readonly type="hidden" class="form-control" name="idusuarios" placeholder="xxxxxx"  value="<?php echo $idusuarios ?>" required>
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-primary"> Actualizar Datos </button>
  </div>
</form>