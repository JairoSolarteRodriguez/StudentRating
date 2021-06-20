<?php
    require_once('../../Usuarios/Modelo/Usuarios.php');
    require_once('../Modelo/Materias.php');

    $ModeloUsuarios = new Usuarios();
    $ModeloUsuarios->authSession();

    $ModeloMaterias = new Materias();
    $Id = $_GET['Id'];
    $InformacionMateria = $ModeloMaterias->getById($Id);
    
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
    <h1>Editar Materia</h1>

    <form action="../Controladores/edit.php" method="POST">
    <input type="hidden" name="Id" value="<?= $Id; ?>">
        <?php
            if($InformacionMateria != null):
                foreach($InformacionMateria as $Info):
        ?>
        <label for="Nombre">Nombre Materia</label><br>
        <input type="text" autocomplete="off" required placeholder="Nombre Materia" name="Nombre" value="<?= $Info['MATERIA']; ?>"><br><br>
        <?php
                endforeach;
            endif;
        ?>
        <input type="submit" value="Editar Materia">
    </form>
</body>
</html>