<?php
require_once __DIR__ . "../modelos/usuario.php";
session_start();
$usuario = new Usuario();
$usuario->Nombre = $_POST['Nombre'];
$usuario->Email = $_POST['Email'];
$usuario->Contrasena = $_POST['Contrasena'];
$usuario -> Saldo = 5000;
$usuario -> Admin = 0;
$usuario -> idUsuario = 0;
$errores = [];
$regex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z0-9])(?!.*\s).{8,}$/';
if ($usuario->Nombre == '') {
    $errores['nombre'] = "Nombre completo requerido";
}
if ($usuario->Email == '') {
    $errores['Email'] = " Email requerido";
} else {

    $existente = Usuario::cargaLogin($usuario->Email);
    if ($existente) {
        $errores['Email'] = "Ya existe un usuario con este Email";
    }
}
if ($usuario->Contrasena == '') {
    $errores['pwd'] = "Contraseña requerida";
    
}
else if(!preg_match($regex,$usuario -> Contrasena)){
    $errores['pwd'] = "Contraseña  no cumple con los requisitos";
}

if (count($errores) > 0) {
    $_SESSION['errores'] = $errores;
    $_SESSION['datos'] = $usuario;
    header('Location:  registro.php');
   
} else {
    // Hash de la contraseña
    $usuario->Contrasena = password_hash($usuario->Contrasena, PASSWORD_DEFAULT);
    $usuario->insertar();
    $_SESSION['usuario'] = $usuario;
    header('Location: index.php');
}
