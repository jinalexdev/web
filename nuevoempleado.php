<?php
require_once __DIR__ . '/modelos/usuario.php';
require_once __DIR__ . '/modelos/empleados.php';
require_once __DIR__ . '/modelos/cargo.php';
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
$tituloPagina = "Aviones SL";
$link_active = "nav-link";
$link_active2 = "nav-link ";
$cargos = cargo :: listadocargo();
include __DIR__ . '/include/cabeceranav.php';
?>

<h1>Formulario de empleados</h1>
<form action="guardarEmpleado.php" method="post" class="row g-3">
    <input type="hidden" name="id" value="<?= $id ?>" />
    <div class="col-md-3">
        <label class="form-label" for="nombre">
            Nombre
        </label>
        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre">
    </div>
    <div class="col-md-6">
        <label class="form-label" for="apellido">
            Apellido
        </label>

        <input type="text" id="apellido" name="apellido" class="form-control" placeholder="apellido">
    </div>
    <div class="col-md-3">
        <label class="form-label" for=" edad">
            Edad
        </label>
        <input type="number" id="edad" name=" edad" class="form-control" placeholder=" Edad">
    </div>
    <div class="col-md-4">
        <label class="form-label" for="dni">
            DNI
        </label>
        <input type="text" id="dni" name="dni" class="form-control" placeholder="dni">
    </div>
    <div class="col-md-4">
        <label class="form-label" for="salario">
            Salario
        </label>
        <input type="number" id="salario" name="salario" class="form-control" placeholder="salario">
    </div>
    
    <select class="form-select" name="cargo" >
    <?php foreach ($cargos as $cargo) : ?>
     
        <option value=<?= $cargo["id_Cargo"] ?>><?= $cargo["nombre_Cargo"] ?></option>
       
        <?php endforeach;?>
    </select>
</br>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>


<?php include __DIR__ . '/include/pie.php'; ?>
<style>
form {
    margin-bottom: 100px;
    /* Adjust the value for your desired margin size */
}
</style>