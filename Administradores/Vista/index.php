<?php
    require_once('../../Usuarios/Modelo/Usuarios.php');
    require_once('../Modelo/Administradores.php');
    
    if(!$_GET){
        header("Location: index.php?pagina=1");
    }

    //ARTICULOS POR PAGINAS Y VALOR DE INICIO DEL LIMIT DE FUNCION GET
    $articulosPorPagina = 10;
    $start = ($_GET['pagina']-1)*$articulosPorPagina;

    $ModeloUsuarios = new Usuarios();
    $ModeloUsuarios->authSessionAdmin();
    $ModeloUsuarios->authSession();

    $ModeloAdministradores = new Administradores();

    // OBTENER EL NUMERO DE PAGINAS DINAMICAMENTE
    // PASAMOS POR PARAMETRO CUANTOS ELEMENTOS POR PAGINA QUIERO QUE TENGA.
    $paginas = $ModeloAdministradores->pagi($articulosPorPagina);
?>
<!DOCTYPE html>
<html lang="es">
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
                        <a href="#" class="nav-link text-light dark-hover dropdown-item">Administradores</a>
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
    <div class="container-xl mt-3">
        <h1 class="container text-center mb-3">Administradores</h1>

        <div class="input-group mb-4 container">
            <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
            <input type="search" class="form-control" placeholder="Buscar">
        </div>

        <div class="d-flex justify-content-between">
            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#add_admin">Registrar Administrador</button>

            <?php if(isset($_GET['exito'])): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Registro eliminado exitosamente.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
        </div>

        <?php
            require_once('add.php');
        ?>

        <div class="table-responsive mb-2">
            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>APELLIDO</th>
                        <th>USUARIO</th>
                        <th>PERFIL</th>
                        <th>ESTADO</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $Administradores = $ModeloAdministradores->get($start, $articulosPorPagina);
                        if($Administradores != null):
                            foreach($Administradores as $Admin):
                    ?>
                <tr>
                    <td class="align-middle"><?= $Admin['ID_USUARIO'];?></td>
                    <td class="align-middle"><?= $Admin['NOMBRE'];?></td>
                    <td class="align-middle"><?= $Admin['APELLIDO'];?></td>
                    <td class="align-middle"><?= $Admin['USUARIO'];?></td>
                    <td class="align-middle"><?= $Admin['PERFIL'];?></td>
                    <td class="align-middle"><?= $Admin['ESTADO'];?></td>
                    <td class="align-middle">
                        <a href="edit.php?Id=<?= $Admin['ID_USUARIO'];?>" class="btn btn-primary"><i class="bi bi-pen"></i> Editar</a>
                        <a href="delete.php?Id=<?= $Admin['ID_USUARIO'];?>" class="btn btn-danger"><i class="bi bi-trash2-fill"></i> Borrar</a>
                    </td>
                </tr>
                    <?php
                            endforeach;
                        endif;
                    ?>
                </tbody>
            </table>

        </div>
        <nav>
            <ul class="pagination justify-content-center">
                <li class="page-item <?php echo $_GET['pagina']<=1? 'disabled': '' ?>">
                    <a href="index.php?pagina=<?=$_GET['pagina']-1; ?>" class="page-link">Anterior</a>
                </li>
                <?php for($i=0; $i<$paginas; $i++): ?>
                    <li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active': '' ?>">
                        <a href="index.php?pagina=<?= $i+1 ?>" class="page-link"><?= $i+1?></a>
                    </li>
                <?php endfor; ?>
                <li class="page-item <?php echo $_GET['pagina']>=$paginas? 'disabled': '' ?>">
                    <a href="index.php?pagina=<?=$_GET['pagina']+1; ?>" class="page-link">Siguiente</a>
                </li>
            </ul>
        </nav>
    </div>

    <script src="../../Js/dark-mode.js"></script>
    <script src="../../Js/validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>