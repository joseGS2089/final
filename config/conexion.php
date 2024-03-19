<?php
class Conexion {
    private $Host;
    private $User;
    private $Password;
    private $Db;
    private $conn;

public function __construct ($host,$user,$password,$db) {
    $this->Host= $host;
    $this->User = $user;
    $this->Password = $password;
    $this->Db = $db;
}
public function Conectar(){

    try{
       $dsn = "mysql:host={$this->Host};dbname={$this->Db};charset=utf8mb4";
       $this->conn = new PDO($dsn,$this->User,$this->Password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $this->conn;
        } 
        catch (PDOException $e) {
        echo "error de conexion: " . $e->getMessage();
        exit;
        } 
    }
    
    public function Desconectar() {
        $this->Conn = null;

    }

}
?>