<?php
require_once __DIR__ . '/modelos/usuario.php';
require_once __DIR__ . '/modelos/empleados.php';
require_once __DIR__ . '/modelos/cargo.php';
require_once __DIR__ . '/lib/funciones.php';
session_start();

if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
    if($usuario -> Admin !== 1){
        die();
    }
} else {
    $usuario = null;
    header('Location: login.php');
}
if (isset($_SESSION['errores'])) {
    // errores
    $errores = $_SESSION['errores'];
    $empleado = $_SESSION["datos"];
    $tituloPagina2 = "Nuevo Contenido";
    $id =  $empleado->idEmpleado;
    unset($_SESSION['errores']);
    unset($_SESSION['datos']);
    if($empleado -> idEmpleado != 0){
        $titulo = "Editar Empleado";
    }
    else{
        $titulo = "Nuevo Empleado";
    }
}
elseif (isset($_GET['id'])) {
    // editar
    $titulo = "Editar Empleado";
    $id= $_GET["id"];
   $empleado = empleado :: cargaEmpleado($id);
}
else{
    $titulo = "Nuevo Empleado";
    // nuevo
    $id = 0;
    $empleado  = new empleado();
}



$tituloPagina = "Aviones SL";
$link_active = "nav-link";
$link_active2 = "nav-link ";
$cargos = cargo :: listadocargo();

include __DIR__ . '/include/cabeceranav.php';
?>

<h1>Formulario de empleados</h1>
<h2><?php  echo   $titulo   ?></h1>
<form action="guardarEmpleado.php" method="post" class="row g-3">
    <input type="hidden" name="id" value="<?= $id ?>" />
    <div class="col-md-6">
        <label class="form-label" for="nombre">
            Nombre
        </label>
        <input type="text" id="nombre"  name="nombre" class="form-control <?php if (isset($errores["nombre"])) echo 'is-invalid'; ?>" placeholder="Nombre" value="<?= $empleado -> nombre ?>">
        <?php if (isset($errores['nombre'])) : ?>
          <div class="invalid-feedback">
            <?= e($errores['nombre']) ?>
          </div>
        <?php endif; ?>
    </div>
 
    <div class="col-md-6">
        <label class="form-label" for="apellido">
            Apellido
        </label>
        <input type="text" id="apellido" name="apellido" class="form-control <?php if (isset($errores["apellido"])) echo 'is-invalid'; ?>" placeholder="apellido" value="<?= $empleado -> apellido ?>">
        <?php if (isset($errores['apellido'])) : ?>
          <div class="invalid-feedback">
            <?= e($errores['apellido']) ?>
          </div>
        <?php endif; ?>
    </div>
  
    <div class="col-md-6">
        <label class="form-label" for=" edad">
            Edad
        </label>
        <input type="number" min="0" id="edad" name=" edad" class="form-control  <?php if (isset($errores["edad"])) echo 'is-invalid'; ?>" placeholder=" Edad"  value="<?= $empleado -> edad ?>">
         <?php if (isset($errores['edad'])) : ?>
          <div class="invalid-feedback">
            <?= e($errores['edad']) ?>
          </div>
        <?php endif; ?>
    </div>
    <div class="col-md-6">
        <label class="form-label" for="dni">
            DNI
        </label>
        <input type="text" id="dni" name="dni" class="form-control <?php if (isset($errores["dni"])) echo 'is-invalid'; ?>" placeholder="dni"   value="<?= $empleado -> dni?>">
        <?php if (isset($errores['dni'])) : ?>
          <div class="invalid-feedback">
            <?= e($errores['dni']) ?>
          </div>
        <?php endif; ?>
    </div>
    <div class="col-md-4">
        <label class="form-label" for="salario">
            Salario
        </label>
        <input type="number" id="salario" min="0" step="0.01" name="salario" class="form-control <?php if (isset($errores["salario"])) echo 'is-invalid'; ?>" placeholder="salario"  value="<?= $empleado -> salario?>">
        <?php if (isset($errores['salario'])) : ?>
          <div class="invalid-feedback">
            <?= e($errores['salario']) ?>
          </div>
        <?php endif; ?>
    </div>
    <div class="col-md-6">

    </div>
    <select class="form-select " name="cargo" >
    <?php foreach ($cargos as $cargo) : ?>
     
        <option value=<?= $cargo["id_Cargo"] ?>><?= $cargo["nombre_Cargo"] ?></option>
       
        <?php endforeach;?>
    </select>
  
</br>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>


<?php include __DIR__ . '/include/piesinfooter.php'; ?>
<style>
form {
    margin-bottom: 100px;
    /* Adjust the value for your desired margin size */
}
</style>