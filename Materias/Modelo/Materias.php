<?php
    require_once('../../Conexion.php');

    class Materias extends Conexion{

        public function __construct(){
            $this->db = parent::__construct();
        }

        public function add($NombreMateria){
            $statement = $this->db->prepare("INSERT INTO materias (MATERIA) VALUE (:NombreMateria)");

            $statement->bindParam(':NombreMateria', $NombreMateria);

            if($statement->execute()){
                header('Location: ../Vista/index.php');
            }else{
                header('Location: ../Vista/add.php');
            }
        }

        public function get(){
            $rows = null;

            $statement = $this->db->prepare("SELECT * FROM materias");
            $statement->execute();

            while($result = $statement->fetch()){
                $rows[] = $result;
            }
            return $rows;
        }

        public function getById($Id){ //Funcion para actualizar.
            $rows = null;

            $statement = $this->db->prepare("SELECT * FROM materias WHERE ID_MATERIA = :Id");
            
            $statement->bindParam(':Id', $Id);
            $statement->execute();

            while($result = $statement->fetch()){
                $rows[] = $result;
            }
            return $rows;
        }

        public function update($Id, $NombreMateria){
            $statement = $this->db->prepare("UPDATE materias SET MATERIA = :NombreMateria WHERE ID_MATERIA = :Id");

            $statement->bindParam(':Id', $Id);
            $statement->bindParam(':NombreMateria', $NombreMateria);

            if($statement->execute()){
                header('Location: ../Vista/index.php');
            }else{
                header('Location: ../Vista/edit.php');
            }
        }

        public function delete($Id){
            $statement = $this->db->prepare("DELETE FROM materias WHERE ID_MATERIA = :Id");

            $statement->bindParam(':Id', $Id);
            
            if($statement->execute()){
                header('Location: ../Vista/index.php');
            }else{
                header('Location: ../Vista/delte.php');
            }
        }
    }
?>