<?php
require_once __DIR__ . '/modelos/usuario.php';
session_start();
$_POST["usuario"];

$usuario = $_SESSION["usuario"];
if($_POST["usuario"] != ""){
    $usuario -> Nombre = $_POST["usuario"];
}
$usuario->Contrasena = password_hash($_POST["contraseña"], PASSWORD_DEFAULT);
$usuario -> Actualizarusuario();
header("Location: index.php");
?>