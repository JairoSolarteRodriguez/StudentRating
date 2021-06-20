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
        }elseif($error == 'badLastName'){
            echo '<strong style="color: red;">Introduzca correctamente el campo Apellido (Solo caracteres alfabeticos)</strong>';
        }elseif($error == 'badUser'){
            echo '<strong style="color: red;">Introduzca correctamente el campo Usuario (Solo caracteres alfa-numéricos Ej: 123Usuario)</strong>';
        }elseif($error == 'lowPass'){
            echo '<strong style="color: red;">La contraseña debe tener mas de 5 caracteres</strong>';
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
    <h1>Registrar Administrador</h1>

    <form action="../Controladores/add.php" method="POST">
        <label for="Nombre">Nombre</label><br>
        <input type="text" autocomplete="off" required placeholder="Nombre" name="Nombre"><br><br>

        <label for="Apellido">Apellido</label><br>
        <input type="text" autocomplete="off" required placeholder="Apellido" name="Apellido"><br><br>

        <label for="Usuario">Nombre Usuario</label><br>
        <input type="text" autocomplete="off" required placeholder="Nombre Usuario" name="Usuario"><br><br>

        <label for="Contrasena">Contraseña</label><br>
        <input type="password" autocomplete="off" required placeholder="Contraseña" name="Contrasena"><br><br>

        <input type="submit" value="Registrar Administrador">
    </form>
</body>
</html>