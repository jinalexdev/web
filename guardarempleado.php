<?php
require_once __DIR__ . '/modelos/usuario.php';
require_once __DIR__ . '/modelos/empleados.php';
session_start();
$dniRegex = "/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]$/i";

if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
    if($usuario -> Admin !== 1){
        die();
    }
} else {
    $usuario = null;
    header('Location: login.php');
}
$id = $_POST["id"];
if ($id == 0) {
    $empleado = new Empleado();
    $empleado -> idEmpleado = 0;
} else {
    $empleado = empleado::cargaEmpleado($id);
}



$empleado -> nombre = $_POST["nombre"];
$empleado -> apellido = $_POST["apellido"];
$empleado -> edad = $_POST["edad"];
$empleado -> salario = $_POST["salario"];
$empleado -> id_Cargo = $_POST["cargo"];
$empleado -> dni = $_POST["dni"];
$errores = [];

if($empleado -> salario < 0){
    $errores['salario'] = "El salario no puede ser negativo";
}
if($empleado -> edad < 0){
    $errores['edad'] = "La edad no puede ser negativa";
}
if (!preg_match($dniRegex, $empleado -> dni)) {
    $errores['dni'] = "dni formado no valido";
  } 
if ($empleado->nombre == '') {
    $errores['nombre'] = "nombre  requerido";
}

if ($empleado->apellido == '') {
    $errores['apellido'] = "apellido requerido";
}
if ($empleado->edad == "") {
    $errores['edad'] = " edad requerida";
}
if($empleado -> salario == ""){
    $errores['salario'] = " salario requqerido";
}
if($empleado -> dni == ""){
    $errores['dni'] = "dni requerido";
}
if ( $empleado -> cargaEmpleado($_POST["dni"])) {
    $errores['dni'] = "Ya existe este dni";
}
if (count($errores) > 0) {
    $_SESSION['errores'] = $errores;
    $_SESSION["datos"] = $empleado;
    // pasar el id de la variable
    header("Location: nuevoempleado.php");
} else {
    // lo guardo en la base de datos si esta todo correcto
    var_dump($empleado -> dni);
    $empleado -> guardarEmpleado();
    header("Location: empleados.php");
}
?>