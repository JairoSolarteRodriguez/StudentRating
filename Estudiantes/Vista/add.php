<?php
    require_once('../../Usuarios/Modelo/Usuarios.php');
    require_once('../../Metodos.php');

    $ModeloUsuarios = new Usuarios();
    $ModeloUsuarios->authSession();//Autentifica si tiene una session iniciada.

    $ModeloMetodos = new Metodos();

    if(isset($_GET['error'])){
        $error = $_GET['error'];

        if($error == 'no_empty'){
            echo '<strong style="color: red;">No puede dejar campos en blanco</strong>';
        }elseif($error == 'badName'){
            echo '<strong style="color: red;">Introduzca correctamente el campo Nombre (Solo caracteres alfabeticos)</strong>';
        }elseif($error == 'badLastName'){
            echo '<strong style="color: red;">Introduzca correctamente el campo Apellido (Solo caracteres alfabeticos)</strong>';
        }elseif($error == 'badDoc'){
            echo '<strong style="color: red;">Introduzca correctamente el campo Documento (Solo caracteres numéricos)</strong>';
        }elseif($error == 'badEmail'){
            echo '<strong style="color: red;">Introduzca un email valido</strong>';
        }elseif($error == 'badProm'){
            echo '<strong style="color: red;">Introduzca correctamente el campo Promedio (Solo caracteres numéricos)</strong>';
        }elseif($error == 'outProm'){
            echo '<strong style="color: red;">Verifique el promedio del estudiante no puede estar por debajo de 0 ni por encima de 100</strong>';
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
    <h1>Registrar Estudiante</h1>

    <form action="../Controladores/add.php" method="POST">
        <label for="Nombre">Nombre</label><br>
        <input type="text" autocomplete="off" required placeholder="Nombre" name="Nombre"><br><br>

        <label for="Apellido">Apellido</label><br>
        <input type="text" autocomplete="off" required placeholder="Apellido" name="Apellido"><br><br>

        <label for="Documento">Documento</label><br>
        <input type="text" autocomplete="off" required placeholder="Documento" name="Documento"><br><br>

        <label for="Correo">Correo</label><br>
        <input type="email" autocomplete="off" required placeholder="Correo" name="Correo"><br><br>

        <label for="Materia">Materia</label><br>
        <select name="Materia" required>
            <option value="Seleccione" disabled selected>Seleccione</option>
            <?php
                $Materias = $ModeloMetodos->getMaterias();

                if($Materias != null): //Valida que el array contenga informacion de la bbdd.
                    foreach($Materias as $Materia):
                    ?>
                    <option value="<?= $Materia['MATERIA']; ?>"><?= $Materia['MATERIA']; ?></option>
                    <?php
                    endforeach;
                endif;
                ?>
        </select><br><br>

        <label for="Docente">Docente</label><br>
        <select name="Docente" required>
            <option value="Seleccione" disalbed selected>Seleccione</option>
            <?php
                $Docentes = $ModeloMetodos->getDocentes();

                if($Docentes != null){
                    foreach($Docentes as $Docente){
                        ?>
                        <option value="<?= $Docente['NOMBRE'] . ' ' . $Docente['APELLIDO']; ?>"><?= $Docente['NOMBRE'] . ' ' . $Docente['APELLIDO']; ?></option>
                        <?php
                    }
                }?>
        </select><br><br>

        <label for="Promedio">Promedio</label><br>
        <input type="number" autocomplete="off" required placeholder="Promedio" name="Promedio"><br><br>

        <input type="submit" value="Registrar Estudiante">
    </form>
</body>
</html>