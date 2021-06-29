<?php

    require_once('../../Usuarios/Modelo/Usuarios.php');
    require_once('../Modelo/Estudiantes.php');

    $ModeloUsuarios = new Usuarios();

    //cuando intente acceder a una ruta especifica por medio de la url el methodo authSession se encargara
    //de comprovar si hay una session y si no hay una session, de indiato sacara a la persona y la enviara a que inicie session
    $ModeloUsuarios->authSession();

    $ModeloEstudiantes = new Estudiantes();


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



    <?php
        if($ModeloUsuarios->getPerfil() == 'Docente'):
            ?>
            <nav class="navbar navbar-expand-md navbar-light" id="nav">
                <div class="container">
                    <a href="#" class="navbar-brand text-light fs-3 nav-link">Student<span class="fw-bold">Rating</span></a>
                    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav"><span class="navbar-toggler-icon"></span></button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link text-light  dropdown-item">Estudiantes</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle text-light " id="user" data-bs-toggle="dropdown">
                                    <i class="bi bi-person-circle"></i> <?= $ModeloUsuarios->getNombre();?> - <?= $ModeloUsuarios->getPerfil(); ?> </a>

                                <div class="dropdown-menu" id="drop" aria-labelledby="navbarScrollingDropdown">
                                    <!-- ARREGLAR ACA EL ROL -->
                                    <a href="#" class=" dropdown-item nav-link text-light px-3">Perfil</a>
                                    <a href="#" class=" dropdown-item nav-link text-light px-3">Cursos</a>
                                    <div class="dropdown-divider bg-light"></div>
                                    <a href="../../Usuarios/Controladores/salir.php" class=" dropdown-item nav-link text-light px-3"><i class="bi bi-box-arrow-right"></i> Salir</a>
                                    <a href="#" class=" dropdown-item nav-link text-light px-3" id="mode"><i class="bi bi-moon-fill verify" id="icon"> oscuro</i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <?php
        else:
            ?>
        <nav class="navbar navbar-expand-md navbar-light" id="nav">
            <div class="container">
                <a href="#" class="navbar-brand text-light fs-3 nav-link">Student<span class="fw-bold">Rating</span></a>
                <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav"><span class="navbar-toggler-icon"></span></button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="../../Administradores/Vista/index.php" class="nav-link text-light  dropdown-item">Administradores</a>
                        </li>
                        <li class="nav-item">
                            <a href="../../Docentes/Vista/index.php" class="nav-link text-light  dropdown-item">Docentes</a>
                        </li>
                        <li class="nav-item">
                            <a href="../../Materias/Vista/index.php" class="nav-link text-light  dropdown-item">Materias</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-light  dropdown-item">Estudiantes</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle text-light " id="user" data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle"></i> <?= $ModeloUsuarios->getNombre(); ?></a>

                            <div class="dropdown-menu" id="drop" aria-labelledby="navbarScrollingDropdown">
                                <!-- ARREGLAR ACA EL ROL -->
                                <a href="#" class="disabled  dropdown-item nav-link text-light px-3">Rol: <?= $ModeloUsuarios->getPerfil();?></a>
                                <div class="dropdown-divider bg-light"></div>
                                <a href="#" class=" dropdown-item nav-link text-light px-3">Perfil</a>
                                <div class="dropdown-divider bg-light"></div>
                                <a href="../../Usuarios/Controladores/salir.php" class=" dropdown-item nav-link text-light px-3"><i class="bi bi-box-arrow-right"></i> Salir</a>
                                <a href="#" class=" dropdown-item nav-link text-light px-3" id="mode"><i class="bi bi-moon-fill verify" id="icon"> Oscuro</i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
            <?php
        endif;
    ?>

    <div class="container-xl mt-5">
        <h1 class="container text-center mb-4">Estudiantes</h1>

        <div class="input-group mb-4 container">
            <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
            <input type="search" class="form-control" placeholder="Buscar">
        </div>
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#add_student">Registrar Estudiante</button>
        
        <?php require_once('add.php'); ?>

        <div class="table-responsive">
            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>APELLIDO</th>
                        <th>DOCUMENTO</th>
                        <th>CORREO</th>
                        <th>MATERIA</th>
                        <th>DOCENTE</th>
                        <th>PROMEDIO</th>
                        <th>FECHA REGISTRO</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $Estudiantes = $ModeloEstudiantes->get();
                        
                        if($Estudiantes != null): // Valida si no esta vacio el array que obtiene los datos de la bbdd.
                            foreach($Estudiantes as $Estudiante):
                    ?>
                    <tr>
                        <td class="align-middle"><?= $Estudiante['ID_ESTUDIANTE']; ?></td>
                        <td class="align-middle"><?= $Estudiante['NOMBRE']; ?></td>
                        <td class="align-middle"><?= $Estudiante['APELLIDO']; ?></td>
                        <td class="align-middle"><?= $Estudiante['DOCUMENTO']; ?></td>
                        <td class="align-middle"><?= $Estudiante['CORREO']; ?></td>
                        <td class="align-middle"><?= $Estudiante['MATERIA']; ?></td>
                        <td class="align-middle"><?= $Estudiante['DOCENTE']; ?></td>
                        <td class="align-middle"><?= $Estudiante['PROMEDIO']; ?>%</td>
                        <td class="align-middle"><?= $Estudiante['FECHA_REGISTRO']; ?></td>
                        <td class="align-middle">
                            <!-- Pasa el id por get para obtener el id del elemento que va a editar -->
                            <a href="edit.php?Id=<?= $Estudiante['ID_ESTUDIANTE']; ?>" class="btn btn-primary"><i class="bi bi-pen"></i> Editar</a>
                            <a href="delete.php?Id=<?= $Estudiante['ID_ESTUDIANTE']; ?>" class="btn btn-danger"><i class="bi bi-trash2-fill"></i> Borrar</a>
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
    <script src="../../Js/validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>