<?php
require_once __DIR__ . '/modelos/usuario.php';
session_start();
$email = $_POST['Email'];
$contrasena = $_POST['Contrasena'];
$usuario = Usuario::cargaLogin($email);
$_errores = [];
// filtro email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_errores["error-email"] = "Introduce un email correcto";
}

if ($usuario) {
    if (password_verify($contrasena, $usuario->Contrasena)) {
        $_SESSION['usuario'] = $usuario;
        header('Location: index.php');
        die();
    }
    else{
        $_errores["contrasena"] = "Contraseña incorrecta";
        
    }
}
$_SESSION["correo"] = $_POST["Email"];
$_SESSION['errores'] = $_errores;
$_SESSION['error-login'] = "Nombre de usuario o contraseña incorrectos";
header('Location: login.php');
