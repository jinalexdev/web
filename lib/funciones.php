<?php

function e($s) {
    return htmlspecialchars($s, ENT_QUOTES);
}

function formatearFecha($fechaISO) { // 2023-10-26
    // Devolver fecha en formato: 26/10/2023
    $dt = DateTime::createFromFormat('Y-m-d', $fechaISO);
    if ($dt === FALSE) {
        return "";
    }
    else {
        return $dt->format('d/m/Y');
    }
}

function formatearFechaLarga($fechaISO) { // 2023-10-26
    // Devolver fecha en formato: 26 octubre 2023
    $dt = DateTime::createFromFormat('Y-m-d', $fechaISO);
    if ($dt === FALSE) {
        return "";
    }
    else {
        return IntlDateFormatter::formatObject($dt,
            "d MMMM yyyy", "es-ES");
    }
}

function formatearFechaHora($fechaISO) { // 2023-10-26 14:50:30
    // Devolver fecha en formato: 26/10/2023 14:50
    $dt = DateTime::createFromFormat('Y-m-d H:i:s', $fechaISO);
    if ($dt === FALSE) {
        return "";
    }
    else {
        return $dt->format('d/m/Y H:i');
    }
}

function formatearFechaHoraLarga($fechaISO) { // 2023-10-26 14:50:30
    // Devolver fecha en formato: 26 octubre 2023, 14:50
    $dt = DateTime::createFromFormat('Y-m-d H:i:s', $fechaISO);
    if ($dt === FALSE) {
        return "";
    }
    else {
        return IntlDateFormatter::formatObject($dt,
            "d MMMM yyyy, HH:mm", "es-ES");
    }
 
    }
    function formateradecimal($num){
        $formatted_number = number_format($num, 2, ",", ".");

        // Return the formatted number
        return $formatted_number;
      }
