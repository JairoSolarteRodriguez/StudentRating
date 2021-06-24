<?php
    require_once('../../Usuarios/Modelo/Usuarios.php');
    require_once('../Modelo/Materias.php');

    $ModeloUsuarios = new Usuarios();
    $ModeloUsuarios->authSession();

    $ModeloMaterias = new Materias();
    $Id = $_GET['Id'];
    $InformacionMateria = $ModeloMaterias->getById($Id);
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
    <div class="container mt-5">
        <div class="form-group w-50">
        <h1 class="text-center">Editar Materia</h1>
            <form action="../Controladores/edit.php" method="POST" id="formulario">
                <input type="hidden" name="Id" value="<?= $Id; ?>">
                <?php
                    if($InformacionMateria != null):
                        foreach($InformacionMateria as $Info):
                ?>
                <label for="Nombre" class="form-label">Nombre Materia</label>
                <div class="position-relative" id="grupo_nombre">
                    <input type="text" autocomplete="off" required placeholder="Nombre Materia" name="Nombre" value="<?= $Info['MATERIA']; ?>" class="form-control"><i class="bi position-absolute px-2" style="top: 4px; right: 0; "></i>
                    <p class="formulario_error alert alert-danger fw-light visually-hidden mt-2" style="font-size: 0.85rem;">El nombre de la materia tiene que ser de 1 a 40 caracteres y solo puede contener letras</p>
                </div>
                <?php
                        endforeach;
                    endif;
                ?>
                <input type="submit" value="Editar Materia" class="btn btn-danger mt-3 w-100" form="formulario">
            </form>
            <a href="index.php?pagina=1" class="btn btn-primary mt-2 w-100">Regresar</a>
        </div>
    </div>

    <script src="../../Js/validate.js"></script>
</body>
</html>