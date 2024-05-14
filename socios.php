<?php
require_once __DIR__ . '/modelos/usuario.php';
session_start();
if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
} else {
    $usuario = null;
    header('Location: login.php');
}
$tituloPagina = "Socios";
$link_active = "nav-link active ";
$link_active2 = "nav-link ";
include __DIR__ . '/include/cabeceranav.php';


?>
<link rel="stylesheet" href="css/socio.css">
<div id="message-container"></div>
<div id="contenedor" class="row grid grid-cols-3 gap-4" style="padding-top: 50px;">
    <div class="card mb-3" style="background-color: #cd7f50;">
        <div class="card-header ">
            <h5 class="card-title">Suscripción Bronce</h5>
            <div id="subscription-icon-container"></div>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <input type="hidden" id="rango" name="rango" value="bronce">
                <li class="list-group-item">Pesaje de < 5 kg gratis</li>
                <li class="list-group-item">Descuentos en hoteles 5%</li>
                <li class="list-group-item">Descuentos por billete un 5%</li>
                <li class="list-group-item">Precio: €5.99/mes</li>
            </ul>
            <a href="#" class="btn y mt-3 botonSuscribirse" style="background-color: #cd7f50; ">Suscribirse</a>
        </div>
    </div>


    <div class="card mb-3" style="background-color: #cccccc; ">
        <div class="card-header ">
            <h5 class="card-title">Suscripción Plata</h5>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <input type="hidden" id="rango" name="rango" value="plata">
                <li class="list-group-item">Pesaje de < 20 kg gratis</li>
                <li class="list-group-item">Descuentos en hoteles 10%</li>
                <li class="list-group-item">Descuentos por billete 10%</li>
                <li class="list-group-item">Precio: €10.99/mes</li>
            </ul>
            <a href="#" class="btn  mt-3 botonSuscribirse"
                style="background-color: #cccccc; color: #333333;">Suscribirse</a>
        </div>
    </div>
    <div class="card mb-3" style="background-color: #ffd700; color: #000;">
        <div class="card-header ">
            <h5 class="card-title">Suscripción Oro</h5>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <input type="hidden" id="rango" name="rango" value="oro">
                <li class="list-group-item">Pesaje de < 30 kg gratis</li>
                <li class="list-group-item">Descuentos en hoteles 15%</li>
                <li class="list-group-item">Descuentos por billete 15%</li>
                <li class="list-group-item">Precio: €15.99/mes</li>
            </ul>
            <a href="#" class="btn  mt-3 botonSuscribirse"
                style="background-color: #ffd700; color: #000;">Suscribirse</a>
        </div>
    </div>
</div>

<?php include __DIR__ . '/include/pie.php'; ?>


<script src="/proyecto_avion/js/cambiardatos.js"></script>
<script>
validarContrasena(); // Llamar a la función para que se ejecute al cargar la página
</script>

<script>
let botonSuscribirse = document.querySelectorAll(".botonSuscribirse");
let messageDisplayed = false;
botonSuscribirse.forEach((el) => {
    el.addEventListener("click", (e) => {

        let closestInput = e.target.closest('.card').querySelector('#rango');
        let iconContainer = e.target.closest('.card').querySelector('#subscription-icon-container');
        // Verifica el valor en la consola
        let params = new FormData();
        params.append('rango', closestInput.value);
        fetch('guardarsocio.php', {
                method: 'POST',
                body: params
            })
            .then(response => {
                if (response.ok) {
                    response.json().then(data => {
                        // Handle subscription data here
                        if (!messageDisplayed) {

                            let messageContainer = document.getElementById(
                                'message-container');
                            let alertElement = document.createElement('div');
                            alertElement.classList.add('alert', 'alert-warning',
                                'role="alert"'); // Add Bootstrap classes

                            // Set alert content
                            alertElement.textContent = data.message;

                            // Append alert to container
                            messageContainer.appendChild(alertElement);
                            console.log(data.suscipcion);
                            $(alertElement).fadeOut(4000)

                        }
                        messageDisplayed = true;
                    });
                } else {
                    console.error("Error:", response.status);
                }
            })
            .catch(error => {
                console.error("Error:", error);
            });
    });
});
botonSuscribirse.forEach((el) => {
    el.addEventListener("click", () => {
        messageDisplayed = false; // Reset del boton
    });
});


</script>
