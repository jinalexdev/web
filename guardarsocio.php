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
$socio = new socio();
$socio-> idUsuario =  $usuario->idUsuario;
$rango = $_POST['rango'];
if ($socio = socio ::tieneSuscripcion($socio -> idUsuario) ) {
    // User is already subscribed
    $response = json_encode([
        "message" => "Ya estás suscrito al plan " . $socio->suscripcion . "!",
        "suscripcion" => $socio->suscripcion,
        "descuento" => $socio->descuento,
        "precio" => $socio->precio,
         // Add this if available
    ]);

    echo $response;
    exit;

    
}
else {
    // Proceed with new subscription
    // ... (Subscription logic remains the same)
    $socio = new socio();
    $socio-> idUsuario =  $usuario->idUsuario;
   
if($rango == "bronce"){
    $socio -> suscripcion = "bronce";
    $socio -> descuento = "5";
    $socio -> precio = 5.99;
    
}
else if($rango == "plata"){
    $socio -> suscripcion = "plata";
    $socio -> descuento = "10";
    $socio -> precio = 10.99;
}
else{
    $socio -> suscripcion = "oro";
    $socio -> descuento = "15";
    $socio -> precio = 15.99;
}
$response = json_encode([
    "message" => "Suscripción creada exitosamente al plan " . $socio->suscripcion . ".",
    "suscripcion" => $socio->suscripcion,
    "descuento" => $socio->descuento,
    "precio" => $socio->precio
]);

echo $response;
$socio->insertar();
}

?>