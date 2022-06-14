<?php
    class Conector{
        private $servidor = "localhost";
        private $usuario = "root";
        private $password = "";
        private $dataBase = "helpdesk";
        public function conexion(){
            try {
                $conexion = mysqli_connect($this -> servidor, $this -> usuario, $this -> password, $this -> dataBase);
                return $conexion;
            } catch (\Throwable $th) {
                echo $th -> getMessage();
            }
        }
    }
?>