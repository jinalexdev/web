<?php
require_once __DIR__ . '/modelos/usuario.php';
session_start();
$titulopagina = "Inicio";
$index = "index";
if(!isset($_SESSION["usuario"])){
    header('Location: login.php');
}
$tituloPagina = "Aviones SL";
$link_active = "nav-link";
$link_active2 = "nav-link active";

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

<script>
const divElement = document.createElement('div');
const formulario = document.getElementById('formcambiarusuario'); // Suponiendo que el formulario tiene un selector único
const nombreInput = document.querySelector('input[name="usuario"]');
const contraseñaInput = document.querySelector('input[name="contraseña"]');
const AlertaSuperior = document.getElementById('alerta-superior');
const botonEnviar = document.getElementById('boton');
const regex = new RegExp(/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z0-9])(?!.*\s).{8,}$/);
// Agregar escucha de evento al botón de enviar
botonEnviar.addEventListener('click', (evento) => {
  evento.preventDefault(); // Evitar el envío predeterminado del formulario

  // Lógica de validación
  let valido = true;


// Add the <div> element next to the password input
contraseñaInput.parentNode.insertBefore(divElement, contraseñaInput.nextSibling);
  if (contraseñaInput.value.trim() === '') {
    valido = false;
    divElement.classList.add("invalid-feedback");
divElement.textContent = "Contraseña vacia";
    contraseñaInput.classList.add('is-invalid'); // Agregar clase Bootstrap para estilo de error
    // Opcionalmente mostrar un mensaje de error cerca del input
} else if (!regex.test(contraseñaInput.value)) {
    valido = false;
    divElement.classList.add("invalid-feedback");
   divElement.textContent = "La contraseña tiene que contener una mayúscula una minuscula  8 caracteres y un caracter especial";
    contraseñaInput.classList.add('is-invalid');

  } else {
    contraseñaInput.classList.remove('is-invalid'); // Eliminar estilo de error
    
  }

  // Si la validación pasa, enviar el formulario
  if (valido) {
    formulario.submit();
  } else {
    
  }
});

</script>


