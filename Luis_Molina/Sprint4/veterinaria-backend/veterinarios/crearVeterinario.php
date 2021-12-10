<?php  

header("Access-Control-Allow-Origin: *");  
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Access-Control-Allow-Methods: POST");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $json = file_get_contents('php://input');
    $params = json_decode($json);

    require("../admin/conexion.php");

    $conectar = conectar();

    $sql = "SELECT * FROM veterinarios WHERE identificacion='$params->identificacion' OR correo='$params->correo'";
    $query = mysqli_query($conectar, $sql);
    $resultado = mysqli_fetch_assoc($query);
    
    if ($resultado){
        http_response_code(400);
        header('Content-Type: application/json'); 
        echo json_encode(array("content" => "User already exist"));
    }else{
        
        $sql = "INSERT INTO veterinarios(
            nombre, identificacion, telefono, correo, contrasena,tipo_usuario) 
            VALUES 
            (
                '$params->nombre',
                '$params->identificacion',
                '$params->telefono',
                '$params->correo',
                '$params->contrasena',
                2)";

        $query = mysqli_query($conectar, $sql);
        if ($query) {
            http_response_code(201);
            header('Content-Type: application/json'); 
            echo json_encode(array("content" => "User created"));
        }
        
    }

}

?>