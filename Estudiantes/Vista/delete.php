<?php
    require_once('../../Usuarios/Modelo/Usuarios.php');

    $ModeloUsuarios = new Usuarios();
    $ModeloUsuarios->authSession();

    $Id = $_GET['Id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Notas</title>
</head>
<body>
    <h1>Eliminar Estudiante</h1>
    <form action="../Controladores/delete.php" method="POST">
        <input type="hidden" name="Id" value="<?= $Id; ?>">
        <p>Estás seguro que deseas eliminar este estudiante?</p>
        <input type="submit" value="Eliminar Estudiante">
    </form>
</body>
</html>