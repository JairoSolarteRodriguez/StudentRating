<?php
    require_once('../../Usuarios/Modelo/Usuarios.php');
    require_once('../Modelo/Estudiantes.php');
    require_once('../../Metodos.php');

    $ModeloUsuarios = new Usuarios();
    $ModeloUsuarios->authSession();

    $ModeloEstudiantes = new Estudiantes();
    $Id = $_GET['Id']; //obtiene el id del estudiante al cual modificar
    $InformacionEstudiante = $ModeloEstudiantes->getById($Id);

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
    <h1>Editar Estudiante</h1>

    <form action="../Controladores/edit.php" method="POST">
        <input type="hidden" name="Id" value="<?= $Id; ?>">
        <?php
            if($InformacionEstudiante != null):
                foreach($InformacionEstudiante as $Info):
        ?>
        <label for="Nombre">Nombre</label><br>
        <input type="text" autocomplete="off" required placeholder="Nombre" name="Nombre" value="<?= $Info['NOMBRE'];?>"><br><br>

        <label for="Apellido">Apellido</label><br>
        <input type="text" autocomplete="off" required placeholder="Apellido" name="Apellido" value="<?= $Info['APELLIDO']; ?>"><br><br>

        <label for="Documento">Document</label><br>
        <input type="text" autocomplete="off" required placeholder="Documento" name="Documento" value="<?= $Info['DOCUMENTO']; ?>"><br><br>

        <label for="Correo">Correo</label><br>
        <input type="email" autocomplete="off" required placeholder="Correo" name="Correo" value="<?= $Info['CORREO']; ?>"   ><br><br>

        <label for="Materia">Materia</label><br>
        <select name="Materia" required>
            <option value="<?= $Info['MATERIA'];?>"><?= $Info['MATERIA'];?></option>
            
            <?php
                $Materias = $ModeloMetodos->getMaterias();
                if($Materias != null):
                    foreach($Materias as $Materia):
            ?>
            <option value="<?= $Materia['MATERIA'];?>"><?= $Materia['MATERIA'];?></option>
            <?php
                    endforeach;
                endif;
            ?> 
        </select><br><br>

        <label for="Docente">Docente</label><br>
        <select name="Docente" required>
            <option value="<?= $Info['DOCENTE']; ?>"><?= $Info['DOCENTE']; ?></option>
            <?php
                $Docentes = $ModeloMetodos->getDocentes();
                if($Docentes != null):
                    foreach($Docentes as $Docente):
            ?>
            <option value="<?= $Docente['NOMBRE']. ' ' .$Docente['APELLIDO']; ?>"><?= $Docente['NOMBRE']. ' ' .$Docente['APELLIDO']; ?></option>
            <?php
                    endforeach;
                endif;
            ?>
        </select><br><br>

        <label for="Promedio">Promedio</label><br>
        <input type="number" autocomplete="off" required placeholder="Promedio" name="Promedio" value="<?= $Info['PROMEDIO']; ?>"><br><br>
        <?php
                endforeach;
            endif;
        ?>
        <input type="submit" value="Editar Estudiante">
    </form>
</body>
</html>