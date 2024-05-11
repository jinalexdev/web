<?php
require_once __DIR__ . '/modelos/usuario.php';
require_once __DIR__ . '/lib/funciones.php';
require_once __DIR__ . '/lib/funciones.php';
session_start();

$tituloPagina = "Registro";
$usuario = new Usuario();
if (isset($_SESSION['errores'])) {
    $errores =  $_SESSION['errores'];
    $usuario = $_SESSION["datos"];
    unset($_SESSION['errores']);
  }

include __DIR__ . '/include/cabecera.php';
?>
<link rel="stylesheet" href="css\style.css">
<div class="registro">


    <form action="guardarRegistro.php" method="POST">
        <h1 style="text-align: center; font-family: 'Gill Sans';">Loguearse</h1>
        <div style="margin: 15px;">
            <div class="mb-3 ">
            <label for="Nombre">Nombre</label>
                <input type="text" class="form-control <?php if (isset($errores["nombre"])) echo 'is-invalid'; ?>" id="Nombre" name="Nombre" aria-describedby="Nombre" placeholder=" Nombre de usuario" value="<?php echo $usuario -> Nombre?>">
              
                <?php if (isset($errores['nombre'])): ?>
                <div class="invalid-feedback">
                    <?= e($errores['nombre']) ?>
                </div>
        <?php endif; ?>
      
            </div>
            <div class="mb-3 ">
            <label for="email">Email </label>
                <input type="email" class="form-control <?php if (isset($errores["Email"])) echo 'is-invalid'; ?>" id="email" aria-describedby="email" name="Email" placeholder="Introduce el email" value="<?php echo $usuario -> Email?>">
            
                <?php if (isset($errores['Email'])): ?>
                <div class="invalid-feedback">
                    <?= e($errores['Email']) ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="mb-3 ">
            <label for="Contrasena">Contraseña</label>
                <input type="password" class="form-control <?php if (isset($errores["pwd"])) echo 'is-invalid'; ?>" id="Contrasena" name="Contrasena" placeholder="Contraseña">
                <?php if (isset($errores['pwd'])): ?>
                <div class="invalid-feedback">
                    <?= e($errores['pwd']) ?>
                </div>
                <?php endif; ?>
            </div>
            </div>
            <div class="mb-3 text-center ">
                <button type="submit" class="btn btn-light">Registrase</button>
    </form>
    <p>Ya tienes cuenta? <a href="login.php">Loguearse</a></p>
    <div class="mb-3 text-center ">
        <p> o registrate con</p>
        <button class="gsi-material-button">
        <div class="gsi-material-button-state"></div>
        <div class="gsi-material-button-content-wrapper">
          <div class="gsi-material-button-icon">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" xmlns:xlink="http://www.w3.org/1999/xlink" style="display: block;">
              <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"></path>
              <path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"></path>
              <path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"></path>
              <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"></path>
              <path fill="none" d="M0 0h48v48H0z"></path>
            </svg>
          </div>
          <span class="gsi-material-button-contents">Sign in with Google</span>
          <span style="display: none;">Sign in with Google</span>
        </div>
        <button type="button" class="btn btn-light ">
        <i class="bi bi-twitter-x text-black"></i>
      </button>
      <br></br>

    </div>
  
</div>
</div>
</div>


<?php include __DIR__ . '/include/pie.php'; ?>