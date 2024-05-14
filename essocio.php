<?php
require_once __DIR__ . '/modelos/socio.php';
require_once __DIR__ . '/modelos/usuario.php';
session_start();
if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
  
} else {
    $usuario = null;
    header('Location: login.php');
}
$socio = socio :: tieneSuscripcion($usuario -> idUsuario);
echo json_encode($socio);
?>