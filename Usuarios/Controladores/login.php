<?php

    require_once('../Modelo/Usuarios.php');

    // Validar si el usuario esta ingresando correctamente, por el metodo POST.
    if($_POST){
        $Usuario = $_POST['Usuario'];
        $Contra = $_POST['Contrasena'];
        $Password = hash('sha512', $Contra);

        //Creacion de un objeto de la clase usuarios para acceder a los metodos
        $Modelo = new Usuarios();
        
        //Redirigir al usuario si es una conexion valida o invalida.
        if($Modelo->login($Usuario, $Password)){
            header('Location: ../../Estudiantes/Vista/index.php');
        }else{
            $error = 'invalid';
            header("Location: ../../index.php?error=$error");
        }

    }else{
        //En caso que el usuario este intentando ingresar por medio de la url lo redireccionara al index.
        header('Location: ../../index.php');
    }

?>