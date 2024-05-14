<?php
require_once __DIR__ . '/lib/funciones.php';
require_once __DIR__ . '/modelos/usuario.php';
require_once __DIR__ . '/modelos/empleados.php';
session_start();

if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
    if ($usuario->Admin != true) {
        http_response_code(403);
        die("Forbidden");
    }
}
if (isset($_POST['idempleado'])) {
    $idEmpleado = $_POST['idempleado'];
   
    // Perform logic to delete the employee with ID $idEmpleado
    empleado::borrarEmpleado($idEmpleado);
    // Send response (optional)
    echo json_encode(["message" => "Empleado borrado exitosamente"]); // JSON example
    exit;
  } else {
    echo "Error";
    exit;
  }





?>