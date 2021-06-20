<?php
    ob_start();
    
    require_once("../../Conexion.php");
    session_start();

    class Usuarios extends Conexion{
        
        // Llamamos al constructor de la clase padre
        public function __construct(){
            $this->db = parent::__construct();
        }

        public function login($Usuario, $Password){
            $statement = $this->db->prepare("SELECT * FROM usuarios WHERE USUARIO = :Usuario AND PASSWORD = :Password");
            // Asignacion de valores parametro y variable
            $error = null;
            $statement->bindParam(":Usuario", $Usuario);
            $statement->bindParam(":Password", $Password);
            $statement->execute();

            if($statement->rowCount() == 1){//Permite verificar la cantidad de datos que se encontro la sentencia prepare al momento de ser ejecutada
                $result = $statement->fetch(); // Obtiene los valores que encontro
                //Guardamos la informacion en la variable $_SESSION
                $_SESSION ['NOMBRE'] = $result['NOMBRE'] . " " . $result['APELLIDO'];
                $_SESSION ['ID'] = $result['ID_USUARIO'];
                $_SESSION ['PERFIL'] = $result['PERFIL'];

                return true;
            }
            return false;
        }
        //=========Funciones abstraccion datos de la session==========
        public function getNombre(){
            return $_SESSION['NOMBRE'];
        }

        public function getId(){
            return $_SESSION['ID'];
        }

        public function getPerfil(){
            return $_SESSION['PERFIL'];
        }
        // ------------------------------------------------------------

        public function authSession(){
            if($_SESSION['ID'] == null){
                //En caso que no haya sesion redirige a la persona a una ubicacion para que inicie sesion
                header('Location: ../../index.php');
            }
        }

        public function authSessionAdmin(){
            if($_SESSION['ID'] != null){
                if($_SESSION['PERFIL'] == 'Docente' || $_SESSION['PERFIL'] == 'Estudiante'){
                    header('Location: ../../Estudiantes/Vista/index.php');
                }
            }
        }

        public function salir(){
            $_SESSION['ID'] = null;
            $_SESSION['NOMBRE'] = null;
            $_SESSION['PERFIL'] = null;
            //Destruimos la session y redireccionamos
            session_destroy();
            header('Location: ../../index.php');
        }
    }
?>