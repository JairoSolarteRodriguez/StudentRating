<?php
    require_once('../Modelo/Administradores.php');

    if($_POST){
            $ModeloAdministradores = new Administradores();
            
            $Id = $_POST['Id'];
            $Nombre = $_POST['Nombre'];
            $Apellido = $_POST['Apellido'];
            $Usuario = $_POST['Usuario'];
            $Contra =  $_POST['Contrasena'];
            $Password = hash('sha512', $Contra);
            $Estado = $_POST['Estado'];

    
            $ModeloAdministradores->update($Id, $Nombre, $Apellido, $Usuario, $Password, $Estado);

    }else{
        header('Location: ../Vista/index.php?pagina=1');
    }
?>