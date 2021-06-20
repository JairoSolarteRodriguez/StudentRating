<?php
    require_once('../Modelo/Materias.php');

    $error = null;
    
    if($_POST){
        $error = null;    

        if(!empty($_POST['Nombre'])){
            $ModeloMaterias = new Materias();
            
            $Id = $_POST['Id'];
            $NombreMateria = $_POST['Nombre'];

            if(!is_string($NombreMateria) || preg_match("/[0-9]/", $NombreMateria) || !preg_match("/[a-zA-Z ]+/", $Nombre)){
                $error = 'badName';
            }else{
                $error = 'ok';
                $ModeloMaterias->update($Id, $NombreMateria);
            }
        }else{
            $Id = $_POST['Id'];
            $error = 'no_empty';
        }

        if($error != null && $error != 'ok'){
            header("Location: ../Vista/edit.php?Id=$Id&error=$error");
        }

    }else{
        header('Location: ../Vista/index.php');
    }
?>