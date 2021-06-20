<?php

    class Conexion{
        protected $db;
        private $driver = "mysql";
        private $host = "localhost";
        private $ddbb = "notas";
        private $usuario = "root";
        private $clave = "";

        public function __construct(){
            try{
                
                $db = new PDO("{$this->driver}:host={$this->host};dbname={$this->ddbb}", $this->usuario, $this->clave);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $db;

            }catch(PDOException $e){
                echo "Ocurrio un error al tratar de conectarse a la base d datos. " .$e->getMessage();
            }
        }
    }
?>