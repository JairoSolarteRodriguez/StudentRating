<?php 
    require_once('../Modelo/Administradores.php');

    $error = null;

    if($_POST){

        if(!empty($_POST['Nombre']) && !empty($_POST['Apellido']) && !empty($_POST['Usuario']) && !empty($_POST['Contrasena'])){

            $ModeloAdministradores = new Administradores();
    
            $Nombre = $_POST['Nombre'];
            $Apellido = $_POST['Apellido'];
            $Usuario = $_POST['Usuario'];
            $Contra =  $_POST['Contrasena'];
            $Password = hash('sha512', $Contra);
    
            if(!is_string($Nombre) || preg_match("/[0-9]/", $Nombre) || !preg_match("/[a-zA-Z ]+/", $Nombre) ){
                $error = 'badName';
            }elseif(!is_string($Apellido) || preg_match("/[0-9]/", $Apellido) || !preg_match("/[a-zA-Z ]+/", $Nombre)){
                $error = 'badLastName';
            }elseif(!is_string($Usuario) || !ctype_alnum($Usuario) || is_numeric($Usuario)){
                $error = 'badUser';
            }elseif(strlen($Contra) < 6){
                $error = 'lowPass';
            }else{
                $error = 'ok';
                $ModeloAdministradores->add($Nombre, $Apellido, $Usuario, $Password);
            }
        }else{
            $error = 'no_empty';
        }

        if($error != null && $error != 'ok'){
            header("Location: ../Vista/add.php?error=$error");
        }

    }else{
        header('Location: ../Vista/index.php');
    }
?>