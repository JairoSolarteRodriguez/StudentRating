<?php 
    require_once('../Modelo/Administradores.php');

    $error = null;

    if($_POST){

        $ModeloAdministradores = new Administradores();

        $Nombre = $_POST['Nombre'];
        $Apellido = $_POST['Apellido'];
        $Usuario = $_POST['Usuario'];
        $Contra =  $_POST['Contrasena'];
        $Password = hash('sha512', $Contra);

        $ModeloAdministradores->add($Nombre, $Apellido, $Usuario, $Password);

        header('Location: ../Vista/index.php');
    
    }else{
        header('Location: ../Vista/index.php');
    }
?>