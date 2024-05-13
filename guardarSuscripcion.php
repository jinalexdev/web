<?php
require_once __DIR__ . '/modelos/socio.php';
require_once __DIR__ . '/modelos/usuario.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Access form data
    $rango = $_POST['rango'];
 
}
var_dump ( $_POST["rango"]);
if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
} else {
    $usuario = null;
    header('Location: login.php');
}


if($rango){
    $socio = new socio();
    $socio-> idUsuario =  $usuario->idUsuario;

if($rango == "bronce"){
    $socio -> suscripcion == "bronce";
    $socio -> descuento == "5";
    $socio -> precio == 5.99;
    
}
else if($rango == "plata"){
    $socio -> suscripcion == "plata";
    $socio -> descuento == "10";
    $socio -> precio == 10.99;
}
else{
    $socio -> suscripcion == "oro";
    $socio -> descuento == "15";
    $socio -> precio == 15.99;
}

$socio->insertar();
}

?>