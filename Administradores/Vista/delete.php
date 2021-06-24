<?php
    require_once('../../Usuarios/Modelo/Usuarios.php');

    $ModeloUsuarios = new Usuarios();
    $ModeloUsuarios->authSession();

    $Id = $_GET['Id'];
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
            <h1 class="text-center mb-4">Eliminar Administrador</h1>
            <form action="../Controladores/delete.php" method="POST">
                <input type="hidden" name="Id" value="<?= $Id;?>">

                <p class="alert alert-danger text-center">Estás seguro que deseas eliminar este administrador?<br>
                Si lo elimina será imposible recuperarlo.
                </p>
                <input type="submit" value="Eliminar Administrador" class="btn btn-danger mt-2 w-100">
            </form>
            <a href="index.php?pagina=1" class="btn btn-primary mt-2 w-100">Regresar</a>
        </div>
    </div>
</body>
</html>