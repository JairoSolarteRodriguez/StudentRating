<?php
    require_once('../../Usuarios/Modelo/Usuarios.php');

    $ModeloUsuarios = new Usuarios();
    $ModeloUsuarios->authSession();

    if(isset($_GET['error'])){
        $error = $_GET['error'];

        if($error == 'no_empty'){
            echo '<strong style="color: red;">No puede dejar campos en blanco</strong>';
        }elseif($error == 'badName'){
            echo '<strong style="color: red;">Introduzca correctamente el campo Nombre (Solo caracteres alfabeticos)</strong>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Notas</title>
</head>
<body>
    <h1>Registrar Materia</h1>

    <form action="../Controladores/add.php" method="POST">
        <label for="Nombre">Nombre Materia</label><br>
        <input type="text" autocomplete="off" required placeholder="Nombre Materia" name="Nombre"><br><br>

        <input type="submit" value="Registrar Materia">
    </form>
</body>
</html>