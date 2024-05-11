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
    <nav class="navbar navbar-expand-md fixed-top   navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Contactos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu1">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu1">

                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="<?= $link_active ?>" href="index.php">Mis Contactos</a>
                    </li>
                    <li class="nav-item">
                        <a class="<?= $link_active2 ?>" href="nuevocontacto.php">Nuevo</a>
                    </li>
                </ul>
                <ul class="navbar-nav bg-primary">
                    <li class="nav-item dropdown bg-primary">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown" data-bs-toggle="dropdown">

                            <?= $usuario->Nombre ?>

                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="Micuenta.php?id=<?= $usuario->idUsuario ?>">Mi
                                    Cuenta</a>
                            </li>
                            <li><a class=" dropdown-item" href="logout.php">Cerrar sesion</a></li>

                        </ul>
                    </li>
                </ul>


            </div>
        </div>
    </nav>



    

    </nav>
 
    <div class="container">