<?php
require_once __DIR__ . '/modelos/usuario.php';
require_once __DIR__ . '/modelos/empleados.php';
require_once __DIR__ . '/lib/funciones.php';
session_start();
$tituloPagina = "Aviones SL";
$link_active = "nav-link";
$link_active2 = "nav-link active";

if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
    if($usuario -> Admin !== 1){
        die();
    }
} else {
    $usuario = null;
    header('Location: login.php');
}

if (isset($_GET['pag'])) {
    $pag = $_GET['pag'];
} else {
    $pag = 1;
}
$empleado = new Empleado();
$empleados = empleado::listadoempleados($pag);
$numlistados = Empleado::cuenta();
$numPaginas = ceil($numlistados / TAM_PAGINA);
include __DIR__ . '/include/cabeceranav.php';
?>
<link rel="stylesheet" href="css/empleado.css">
<h1> Tabla de empleados </h1>

<hr></hr>
<a href="nuevoempleado.php" class="btn btn-sm btn-success">
<i class="bi bi-person-add"></i>        Nuevo </a>
<br>
<table class="table  table-striped table-hover table-bordered ">
    <thead class="table-primary">
        <tr>
            <th >Nombre</th>
            <th>Apellido</th>
            <th>Edad</th>
            <th> Salario </th>
            <th> Cargo </th>
            <th> DNI </th>
            <th> Editar</th>
            <th> Borrar </th>
        </tr>
    </thead>
    <tbody class="table-hover">


        <?php foreach ($empleados as $empleado) : ?>
      
            <br>
            <td ><?= e($empleado['nombre']) ?></td>
            <td><?=  e($empleado['apellido']) ?></td>
            <td><?= e($empleado['edad']) ?></td>
            <td> 
            <?= e($empleado['salario']). "€" ?>
            </td>
            <td> 
            <?= e($empleado['nombre_Cargo']) ?>
            </td>
            <td> 
            <?= e($empleado['dni']) ?>
            </td>
            <td>   <a href="nuevoempleado.php?id=<?= $empleado["idEmpleado"] ?>" class="btn btn-sm btn-primary">
            <i class="bi bi-pencil-square"></i> Editar </a>
                   </td>
            <td> <a href="#" class="btn btn-sm btn-danger " data-bs-toggle="modal"
                    data-bs-target="#modalborrar<?= $empleado["idEmpleado"]   ?>">
                    <i class="bi bi-trash2"></i>    Borrar
                </a>
            </td>
        </tr>
       
        <div class="modal fade" data-bs-dismiss="modal" id="modalborrar<?= $empleado["idEmpleado"]  ?>">
            <div class="modal-dialog" data-bs-dismiss="modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal.tittle">Borrar Empleado</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <p>Seguro que quiere borrar al empleado <strong><?= e($empleado["nombre"]." ". e($empleado["apellido"])) ?></strong>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button data-id="<?= $empleado["idEmpleado"] ?>" class=" btn btn-danger btnborrar">
                            Borrar Empleado
                        </button>
                        <a href="#" class="btn btn-danger" data-bs-dismiss="modal">
                            Cancelar
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
       
    </tbody>
    </thead>
</table>
<nav>
    <ul class="pagination justify-content-center">
        <li class="page-item <?php if ($pag == 1) echo "disabled"; ?> ">
            <a class="page-link" href="empleados.php?pag=<?= $pag - 1 ?> ">&lt;&lt;</a>
        </li>

        <?php for ($i = 1; $i <= $numPaginas; $i++) : ?>
        <li class="page-item <?php if ($pag == $i)  echo "active" ?>">
            <a class="page-link" href="empleados.php?pag=<?= $i ?>"><?= $i ?></a>
            </a>
        </li>
        <?php endfor; ?>

        <li class="page-item">
            <!-- aquí uso operador ternario en lugar de if -->
            <a class="page-link <?= ($pag == $numPaginas) ? "disabled" : "" ?> "
                href="empleados.php?pag=<?= $pag + 1 ?>">&gt;&gt;</a>
        </li>
    </ul>
</nav>

<script src="/proyecto_avion/include/cambiardatos.js"></script> <script>
    validarContrasena(); // Llamar a la función para que se ejecute al cargar la página
  </script>
<?php include __DIR__ . '/include/piesinfooter.php'; ?>