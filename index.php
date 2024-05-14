<?php
require_once __DIR__ . '/modelos/usuario.php';
session_start();
$index = "index";

$tituloPagina = "Aviones SL";
$link_active = "nav-link";
$link_active2 = "nav-link ";

if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
   
} else {
    $usuario = null;
    header('Location: login.php');
}
include __DIR__ . '/include/cabeceranav.php';
?>
<link rel="stylesheet" href="css/socio.css">
<h1>PISOS EN ALQUILER</h1>



<?php include __DIR__ . '/include/pie.php'; ?>

<script src="/proyecto_avion/js/cambiardatos.js"></script> <script>
    validarContrasena(); // Llamar a la función para que se ejecute al cargar la página
  </script>
  </script>



