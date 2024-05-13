<!doctype html>
<html>

<head>
    <!-- Metas requeridos -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" />

    <title><?= $tituloPagina ?></title>
</head>

<body>
    <nav class="navbar navbar-expand-md fixed-top   navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Aviones</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu1">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu1">

                <ul class="navbar-nav me-auto">
                    <li class="nav-item">

                        <a class="<?= $link_active ?>" href="socios.php">Ser Socio</a>
                    </li>
                    <?php if ($usuario->Admin === 1) : ?>
                        <li class="nav-item">
                            <a class="<?= $link_active2 ?>" href="nuevocontacto.php">Empleados</a>
                        </li>
                    <?php endif; ?>
                </ul>
                <ul class="navbar-nav bg-dark">
                    <li class="nav-item dropdown bg-dark">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown" data-bs-toggle="dropdown">

                            <?= $usuario->Nombre ?>

                        </a>

                        <ul class="dropdown-menu dropdown-menu-end">

                            <li> <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal2" href="#">Cambiar datos</a>
                            </li>
                            <li><a class=" dropdown-item" href="logout.php">Cerrar sesion</a></li>

                        </ul>
                    </li>
                </ul>


            </div>
        </div>
    </nav>
    <form action="cambiardatosusuario.php" method="POST" id="formcambiarusuario">
        <div class="modal fade" id="modal2" data-bs-backdrop="static" data-bs-theme="light">

            <div class="modal-dialog">

                <div class="modal-content">
                    <div class="modal-header">

                        <h1 class="modal.tittle">Cambiar Datos</h1>
                        </br>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">

                            <label class="form-label" for="text">
                                Cambiar Nombre
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="bi bi-person-circle"></i>
                                    </span>



                                </div>
                                <input type="text" class="form-control" placeholder="Escribe el nombre" name="usuario">
                            </div>

                        </div>
                        <div class="mb-3">

                            <label class="form-label" for="text">
                                Cambiar Contraseña
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="bi bi-key"></i>
                                    </span>
                                </div>
                                <input type="password" class="form-control" placeholder="Escribe la contraseña" name="contraseña" id="contraseña">
                            </div>

                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary" id="boton">Modificar</button>
                        </div>
    </form>


    </div>



    </div>
    </div>
    </div>
    <div class="container" style="margin-top: 100px;">