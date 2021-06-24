<?php
    require_once('../Modelo/Materias.php');
    
    if($_POST){
        $ModeloMaterias = new Materias();
            
        $Id = $_POST['Id'];
        $NombreMateria = $_POST['Nombre'];
        
        $ModeloMaterias->update($Id, $NombreMateria);

    }else{
        header('Location: ../Vista/index.php');
    }
?>