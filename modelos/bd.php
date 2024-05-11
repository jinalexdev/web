<?php
const TAM_PAGINA = 3;

function abrirBD()
{
    $bd = new mysqli(
        "localhost",   // Servidor
        "root",   // Usuario
        "root",     // Contraseña
        "proyecto_aviones"
    ); // Esquema
    if ($bd->connect_errno) {
        die("Error de conexión: " . $bd->connect_error);
    }
    $bd->set_charset("utf8mb4");
    return $bd;
}