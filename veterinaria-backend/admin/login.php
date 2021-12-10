<?php 
header("Access-Control-Allow-Origin: *");  
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Access-Control-Allow-Methods: POST");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $json = file_get_contents('php://input');
    $params = json_decode($json);

    require("conexion.php");

    $conectar = conectar();
    $sql = "SELECT * FROM veterinarios where correo='$params->correo' and contrasena='$params->contrasena'";
    $query = mysqli_query($conectar, $sql);
    $resultado = mysqli_fetch_assoc($query);
    
    if ($resultado){

        // $json = json_encode($resultado);
        http_response_code(200);
        header("Authentication: ". $SECRET_KEY);
        header('Content-Type: application/json'); 
        echo json_encode(array("content" => "Granted Access"));
    }else{
        http_response_code(400);
        header('Content-Type: application/json'); 
        echo json_encode(array("content" => "Access denied"));
        
    }

}


?>