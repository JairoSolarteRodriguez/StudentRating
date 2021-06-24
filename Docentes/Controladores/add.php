<?php
    require_once('../Modelo/Docentes.php');

    if($_POST){
        $ModeloDocentes = new Docentes();

        $Nombre = $_POST['Nombre'];
        $Apellido = $_POST['Apellido'];
        $Usuario = $_POST['Usuario'];
        $Contra =  $_POST['Contrasena'];
        $Password = hash('sha512', $Contra);

        $ModeloDocentes->add($Nombre, $Apellido, $Usuario, $Password);
    }else{
        header('Location: ../Vista/index.php');
    }


?>