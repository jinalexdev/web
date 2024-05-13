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
$empleado = new Empleado();
$empleado -> nombre = $_POST["nombre"];
$empleado -> apellido = $_POST["apellido"];
$empleado -> edad = $_POST["edad"];
$empleado -> salario = $_POST["salario"];
$empleado -> id_cargo = $_POST["cargo"];
$empleado -> dni = $_POST["dni"];
$empleado -> insertar();


?>