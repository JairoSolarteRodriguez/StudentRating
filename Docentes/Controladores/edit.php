<?php 
    require_once('../Modelo/Docentes.php');

    if($_POST){
        $ModeloDocentes = new Docentes();

        $Id = $_POST['Id'];
        $Nombre = $_POST['Nombre'];
        $Apellido = $_POST['Apellido'];
        $Usuario = $_POST['Usuario'];
        $Contra =  $_POST['Contrasena'];
        $Password = hash('sha512', $Contra);
        $Estado = $_POST['Estado'];
    
        $ModeloDocentes->update($Id, $Nombre, $Apellido, $Usuario, $Password, $Estado);
    }else{
        header('Location: ../Vista/index.php');
    }
?>