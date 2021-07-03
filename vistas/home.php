
<form class="form-signin" action="../controladores/LoginControlador.php" method="POST">
<link rel="stylesheet" href="../assets/css/layout.css">

<form class="estiloLogin" action="../controladores/LoginControlador.php" method="POST">
  <!-- existe mensaje de error? -->
  <?php
    if(isset($errorMsg)){
    echo "<div class='alert alert-warning' role='alert'>";
    echo $errorMsg;
    echo  "</div>";

        }
  ?>
  <h1 class="h3 mb-3 font-weight-normal">Inicio de sesión</h1>
  <label for="inputEmail" class="sr-only">Correo eléctronico</label>
  <input type="email" id="email" name="email" class="form-control" placeholder="usuario@mail.com" required autofocus>
  <label for="inputPassword" class="sr-only" ">Contraseña</label>
  <input type="password" id="clave" name="clave" class="form-control" placeholder="Contraseña" required>
  <button class="btn btn-lg btn-primary btn-block m-2" type="submit">Iniciar sesión</button>
</form>


