<?php
    require_once('../../Conexion.php');

    class Docentes extends Conexion{

        public function __construct(){
            $this->db = parent::__construct();
        }

        public function add($Nombre, $Apellido, $Usuario, $Password){
            $statement = $this->db->prepare("INSERT INTO usuarios (NOMBRE, APELLIDO, USUARIO, PASSWORD, PERFIL, ESTADO) VALUES (:Nombre, :Apellido, :Usuario, :Password, 'Docente', 'Activo')");
            
            $statement->bindParam(':Nombre', $Nombre);
            $statement->bindParam(':Apellido', $Apellido);
            $statement->bindParam(':Usuario', $Usuario);
            $statement->bindParam(':Password', $Password);

            if($statement->execute()){
                header('Location: ../Vista/index.php');
            }else{
                header('Location: ../Vista/add.php');
            }
        }

        public function get($start, $n_articulos){
            $rows = null;

            $statement = $this->db->prepare("SELECT * FROM usuarios WHERE PERFIL = 'Docente' LIMIT :iniciar, :n_articulos");
            $statement->bindParam(':iniciar' , $start, PDO::PARAM_INT);
            $statement->bindParam(':n_articulos' , $n_articulos, PDO::PARAM_INT);
            $statement->execute();

            while($result = $statement->fetch()){
                $rows[] = $result;
            }
            return $rows;
        }

        public function pagi($paginas){
            $statement = $this->db->prepare("SELECT * FROM usuarios WHERE PERFIL = 'Docente'");
            $statement->execute();
            
            $total_articulos = $statement->rowCount();

            $paginas_totales = $total_articulos / $paginas;
            $paginas_totales = ceil($paginas_totales);

            return $paginas_totales;
        }

        public function getById($Id){
            $rows = null;

            $statement = $this->db->prepare("SELECT * FROM usuarios WHERE PERFIL = 'Docente' AND ID_USUARIO = :Id");
            $statement->bindParam(':Id', $Id);
            $statement->execute();

            while($result = $statement->fetch()){
                $rows[] = $result; 
            }
            return $rows;
        }

        public function update($Id, $Nombre, $Apellido, $Usuario, $Password, $Estado){
            $statement = $this->db->prepare("UPDATE usuarios SET NOMBRE = :Nombre, APELLIDO = :Apellido, USUARIO = :Usuario, PASSWORD = :Password, ESTADO = :Estado WHERE ID_USUARIO = :Id");

            $statement->bindParam(':Id', $Id);
            $statement->bindParam(':Nombre', $Nombre);
            $statement->bindParam(':Apellido', $Apellido);
            $statement->bindParam(':Usuario', $Usuario);
            $statement->bindParam(':Password', $Password);
            $statement->bindParam(':Estado', $Estado);

            if($statement->execute()){
                header('Location: ../Vista/index.php');
            }else{
                header('Location: ../Vista/edit.php');
            }
        }

        public function delete($Id){
            $statement = $this->db->prepare("DELETE FROM usuarios WHERE ID_USUARIO = :Id");
            
            $statement->bindParam(':Id', $Id);
            
            if($statement->execute()){
                header('Location: ../Vista/index.php');
            }else{
                header('Location: ../Vista/delete.php');
            }
        }
        
    }
?>