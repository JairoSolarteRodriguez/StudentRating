<?php
    require_once('../Modelo/Materias.php');
    
    if($_POST){
        $ModeloMaterias = new Materias();
        $NombreMateria = $_POST['Nombre'];
        
        $ModeloMaterias->add($NombreMateria);
    }else{
        header('Location: ../Vistas/index.php?pagina=1');
    }
?>