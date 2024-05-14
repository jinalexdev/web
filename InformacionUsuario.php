<?php
require_once __DIR__ . '/lib/funciones.php';
require_once __DIR__ . '/modelos/usuario.php';
require_once __DIR__ . '/modelos/socio.php';
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
$usuariodatos = usuario:: usuariodatos();
include __DIR__ . '/include/cabeceranav.php';
?>
<link rel="stylesheet" href="css/socio.css">




    <h1> Informacion Usuario  </h1>
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Nombre y apellido</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?= e($usuariodatos -> Nombre) ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Email</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?= e($usuariodatos -> Email) ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Saldo</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?= e($usuariodatos -> Saldo) . "€" ?></p>
                    </div>
                </div>
                <?php if($socio = socio :: datossocios($usuario -> idUsuario) !== null )  : ?>
                    <?php $socio = socio :: datossocios($usuario -> idUsuario) ?>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Tipo de Suscripcion</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?= e($socio -> suscripcion) ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Fecha Suscripcion</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?= e($socio -> fechaSuscripcion) ?></p>
                    </div>
                </div>
                <?php endif ; ?>
            </div>
        </div>

    </div>
   

<?php include __DIR__ . '/include/pie.php'; ?>

<script src="/proyecto_avion/js/cambiardatos.js"></script>
<script>
validarContrasena(); // Llamar a la función para que se ejecute al cargar la página
</script>
</script>