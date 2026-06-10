<?php 
class Conexion{
    public $servidor = "localhost";
    public $usuario = "root";
    public $pass = "";
    public $dbname = "acn2ap";

    public function conectar(){
        try {
            $dsn = "mysql:host=$this->servidor;dbname=$this->dbname";
            $pdo = new PDO($dsn, $this->usuario, $this->pass);
            return $pdo;
        } catch (Exception $e) {
            
        }
    }
}