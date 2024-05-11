<?php
require_once __DIR__ . '/modelos/usuario.php';
session_start();
$titulopagina = "Inicio";

if(!isset($_SESSION["usuario"])){
    header('Location: login.php');
}
$usuario = $_SESSION["usuario"];
include __DIR__ . '/include/cabeceranav.php';
?>

<h1>a</h1><h1>a</h1><h1>a</h1><h1>a</h1>
<div>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4977644154150810"
     crossorigin="anonymous"></script>
<!-- anuncio2 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-4977644154150810"
     data-ad-slot="3329760284"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>

<?php include __DIR__ . '/include/pie.php'; ?>


