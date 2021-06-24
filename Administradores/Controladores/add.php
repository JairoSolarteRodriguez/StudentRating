<?php 
    require_once('../Modelo/Administradores.php');

    if($_POST){
        $ModeloAdministradores = new Administradores();

        $Nombre = $_POST['Nombre'];
        $Apellido = $_POST['Apellido'];
        $Usuario = $_POST['Usuario'];
        $Contra =  $_POST['Contrasena'];
        $Password = hash('sha512', $Contra);

        $ModeloAdministradores->add($Nombre, $Apellido, $Usuario, $Password);    
    }else{
        header('Location: ../Vista/index.php?pagina=1');
    }
?>