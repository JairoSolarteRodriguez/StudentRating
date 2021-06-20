<?php
    require_once('../../Usuarios/Modelo/Usuarios.php');
    require_once('../Modelo/Docentes.php');

    $ModeloUsuarios = new Usuarios();
    $ModeloUsuarios->authSession();

    $ModeloDocentes = new Docentes();
    $Id = $_GET['Id'];
    $InformacionDocentes = $ModeloDocentes->getById($Id);

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
    <h1>Editar Docente</h1>

    <form action="../Controladores/edit.php" method="POST">
        <input type="hidden" name="Id" value="<?= $Id; ?>">
        <?php 
            if($InformacionDocentes != null):
                foreach($InformacionDocentes as $Info):
        ?>
        <label for="Nombre">Nombre</label><br>
        <input type="text" autocomplete="off" required placeholder="Nombre" name="Nombre" value="<?= $Info['NOMBRE']; ?>"><br><br>

        <label for="Apellido">Apellido</label><br>
        <input type="text" autocomplete="off" required placeholder="Apellido" name="Apellido" value="<?= $Info['APELLIDO']; ?>"><br><br>

        <label for="Usuario">Nombre Usuario</label><br>
        <input type="text" autocomplete="off" required placeholder="Nombre Usuario" name="Usuario" value="<?= $Info['USUARIO']; ?>"><br><br>

        <label for="Contrasena">Contraseña</label><br>
        <input type="password" autocomplete="off" required placeholder="Contraseña" name="Contrasena" value="<?= $Info['PASSWORD'];?>"><br><br>

        <label for="Estado">Estado</label>
        <select name="Estado" required>
            <option value="<?= $Info['ESTADO']; ?>" selected><?= $Info['ESTADO']; ?></option>
            <option value="Activo">Activo</option>
            <option value="Inactivo">Inactivo</option>
        </select><br><br>
        <?php
                endforeach;
            endif;
        ?>
        <input type="submit" value="Editar Docente">
    </form>
</body>
</html>