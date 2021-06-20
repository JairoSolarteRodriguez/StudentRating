<?php
    
    require_once('../Modelo/Estudiantes.php');

    if($_POST){
        $error = null;

        if(!empty($_POST['Nombre']) && !empty($_POST['Apellido']) && !empty($_POST['Documento']) && !empty($_POST['Correo']) && !empty($_POST['Materia']) && !empty($_POST['Docente']) && !empty($_POST['Promedio'])){

            $ModeloEstudiantes = new Estudiantes();

            $Nombre = $_POST['Nombre'];
            $Apellido = $_POST['Apellido'];
            $Documento = $_POST['Documento'];
            $Correo = $_POST['Correo'];
            $Materia = $_POST['Materia'];
            $Docente = $_POST['Docente'];
            $Promedio = $_POST['Promedio'];

            //Funciones con fechas... visitar documentacion date php
            $Fecha = date('Y-m-d');
    
            if(!is_string($Nombre) || preg_match("/[0-9]/", $Nombre) || !preg_match("/[a-zA-Z ]+/", $Nombre)){
                $error = 'badName';
            }elseif(!is_string($Apellido) || preg_match("/[0-9]/", $Apellido) || !preg_match("/[a-zA-Z ]+/", $Nombre)){
                $error = 'badLastName';
            }elseif(!is_numeric($Documento) || !filter_var($Documento, FILTER_VALIDATE_INT)){
                $error = 'badDoc';
            }elseif(!is_string($Correo) || !filter_var($Correo, FILTER_VALIDATE_EMAIL)){
                $error = 'badEmail';
            }elseif(!is_numeric($Promedio) || !filter_var($Promedio, FILTER_VALIDATE_INT)){
                $error = 'badProm';
            }elseif($Promedio < 0 || $Promedio > 100){
                $error = 'outProm';
            }else{
                $error = 'ok';
                $ModeloEstudiantes->add($Nombre, $Apellido, $Documento, $Correo, $Materia, $Docente, $Promedio, $Fecha);
            }
            
        }else{
            $error = 'no_empty';
        }

        if($error != null && $error != 'ok'){
            header("Location: ../Vista/add.php?error=$error");
        }
        
    }else{
        header('Location: ../../index.php');
    }
?>