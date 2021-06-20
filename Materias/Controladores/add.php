<?php
    require_once('../Modelo/Materias.php');
    
    $error = null;
    
    if($_POST){
        $error = null;
        
        if(!empty($_POST['Nombre'])){
            $ModeloMaterias = new Materias();
            
            $NombreMateria = $_POST['Nombre'];

            if(!is_string($NombreMateria) || preg_match("/[0-9]/", $NombreMateria) || !preg_match("/[a-zA-Z ]+/", $NombreMateria)){
                $error = 'badName';
            }else{
                $error = 'ok';
                $ModeloMaterias->add($NombreMateria);
            }
        }else{
            $error = 'no_empty';
        }

        if($error != null && $error != 'ok'){
            header("Location: ../Vista/add.php?error=$error");
        }

    }else{
        header('Location: ../Vistas/index.php');
    }
?>