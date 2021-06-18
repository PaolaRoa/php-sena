<form class="row g-3" action="../controladores/usuarioCrearControlador.php" method="post">
<div class="col-12">
    <label class="form-label">Codigo</label>
    <input type="text" class="form-control" name="codigo" placeholder="0000" value="<?php echo $codigo ?>" required>
  </div>

  <?php 

if (isset($ErrorCodigo))
    
     echo "<div class='alert alert-danger' role='alert'> $ErrorCodigo </div>"

 
?>


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
  <label>Escoge tu país
    <input class="form-control" list="pais" name="pais" /></label>
    <datalist id="pais">
    <?php 
      if(isset($paises)){
        foreach ($paises as $pais) {
          echo "<option value='".$pais['nombre']."'>";
        }
        }
    ?>
      
    </datalist>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Sign in</button>
  </div>
</form>