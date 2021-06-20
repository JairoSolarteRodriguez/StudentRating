<?php
    require_once('../../Usuarios/Modelo/Usuarios.php');
    require_once('../Modelo/Materias.php');

    $ModeloUsuarios = new Usuarios();
    $ModeloUsuarios->authSessionAdmin();
    $ModeloUsuarios->authSession();

    $ModeloMaterias = new Materias();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../css/vistas.css">
    <title>Sistema de Notas</title>
</head>
<body>

    <nav class="navbar navbar-expand-md navbar-light bg-dark" id="nav"> 
        <div class="container">
            <a href="#" class="navbar-brand text-light fs-3 nav-link">Student<span class="fw-bold">Rating</span></a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav"><span class="navbar-toggler-icon"></span></button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="../../Administradores/Vista/index.php" class="nav-link text-light dark-hover dropdown-item">Administradores</a>
                    </li>
                    <li class="nav-item">
                        <a href="../../Docentes/Vista/index.php" class="nav-link text-light dark-hover dropdown-item">Docentes</a>
                    </li>
                    <li class="nav-item">
                        <a href="../../Materias/Vista/index.php" class="nav-link text-light dark-hover dropdown-item">Materias</a>
                    </li>
                    <li class="nav-item">
                        <a href="../../Estudiantes/Vista/index.php" class="nav-link text-light dark-hover dropdown-item">Estudiantes</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle text-light dark-hover" id="user" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle"></i> <?= $ModeloUsuarios->getNombre(); ?></a>

                        <div class="dropdown-menu bg-dark" id="drop" aria-labelledby="navbarScrollingDropdown">
                            <!-- ARREGLAR ACA EL ROL -->
                            <a href="#" class="disabled dark-hover dropdown-item nav-link text-light px-3">Rol: <?= $ModeloUsuarios->getPerfil();?></a>
                            <div class="dropdown-divider bg-light"></div>
                            <a href="#" class="dark-hover dropdown-item nav-link text-light px-3">Perfil</a>
                            <div class="dropdown-divider bg-light"></div>
                            <a href="../../Usuarios/Controladores/salir.php" class="dark-hover dropdown-item nav-link text-light px-3"><i class="bi bi-box-arrow-right"></i> Salir</a>
                            <a href="#" class="dark-hover dropdown-item nav-link text-light px-3" id="mode"><i class="bi bi-moon-fill bi-sun" id="icon"> Claro</i></a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-xl mt-5">
        <h1 class="container text-center mb-4">Materias</h1>

        <div class="input-group mb-4 container">
            <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
            <input type="search" class="form-control" placeholder="Buscar">
        </div>
        <a href="add.php" class="btn btn-primary mb-3">Registrar Materia</a>

        <div class="table-responsive">
            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE MATERIA</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $Materias = $ModeloMaterias->get();
                        if($Materias != null):
                            foreach($Materias as $Materia):
                    ?>
                    <tr>
                        <td class="align-middle"><?= $Materia['ID_MATERIA']; ?></td>
                        <td class="align-middle"><?= $Materia['MATERIA']; ?></td>
                        <td class="align-middle">
                            <a href="edit.php?Id=<?= $Materia['ID_MATERIA'];?>" class="btn btn-primary"><i class="bi bi-pen"></i> Editar</a>
                            <a href="delete.php?Id=<?= $Materia['ID_MATERIA'];?>" class="btn btn-danger"><i class="bi bi-trash2-fill"></i> Eliminar</a>
                        </td>
                    </tr>
                    <?php
                            endforeach;
                        endif;
                    ?>
                </tbody>                
            </table>

            <nav>
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a href="#" class="page-link">Anterior</a>
                    </li>
                    <li class="page-item active">
                        <a href="#" class="page-link">1</a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link">2</a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link">3</a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link">Siguiente</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>


    <script src="../../Js/dark-mode.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>