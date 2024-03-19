<?php
include_once ('./config/config.php');
include_once ('./config/conexion.php');

class ProductoDAO {
    private $conn;
    public function __construct(){
        
        $this->conn=new Conexion (DB_HOST, DB_USER, DB_PASS, DB_NAME);
        
    }
    public function traerDatosProducto() {
        $db=$this->conn->Conectar();
        
        $consulta= $db->prepare ("SELECT * FROM producto");
        $consulta -> execute ();
        $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }
} 
/*
//conectarse a la base de datos
$conn = new mysqli (DB_HOST, DB_USER, DB_PASS, DB_NAME);

//VERIFICAR LA CONEXION 
if ($conn->connect_error) {
    echo "error de conexion!";
    die ("Error al conectar a la base de datos: " . $conn->connect_error);
}
else {
    echo "Conexion exitosa!";
}
*/
/*
try {
    $dbh = new PDO('mysql:host=localhost;dbname=proyecto','root','');
    echo "conexion exitosa <br/>";
}
catch (PDOException $e) {
    echo "Error de conexion:". $e->getmessage ();
}
/*
/*
$consulta= $dbh->prepare ("SELECT * FROM producto");
$consulta -> execute ();
$resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
print_r ($resultados);
*/
/*
$con = mysqli_connect ("127.0.0.1","root","","proyecto");
$query = "SELECT * FROM producto";
$resultado = mysqli_query ($con, $query);
$datos = mysqli_fetch_all ($resultado, MYSQLI_ASSOC);
$json = json_encode($datos);
echo $json;
mysqli_close ($con);
*/


