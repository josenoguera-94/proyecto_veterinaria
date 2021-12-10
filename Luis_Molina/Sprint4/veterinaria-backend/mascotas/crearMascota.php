<?php  

header("Access-Control-Allow-Origin: *");  
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Access-Control-Allow-Methods: POST");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $json = file_get_contents('php://input');
    $params = json_decode($json);

    require("../admin/conexion.php");

    $conectar = conectar();
    
      
    $sql = "INSERT INTO mascotas(
        nombre_mascota, 
        veterinario_id, 
        raza, 
        tipo, 
        sexo,
        tamano,
        edad,
        tipo_servicio,
        valor_servicio,
        motivo,
        nombre_cliente,
        identificacion_cliente,
        telefono,
        direccion
        ) 
        VALUES 
        (
            '$params->nombre_mascota', 
            '$params->veterinario_id', 
            '$params->raza', 
            '$params->tipo', 
            '$params->sexo',
            '$params->tamano',
            '$params->edad',
            '$params->tipo_servicio',
            '$params->valor_servicio',
            '$params->motivo',
            '$params->nombre_cliente',
            '$params->identificacion_cliente',
            '$params->telefono',
            '$params->direccion'
        )";

    $query = mysqli_query($conectar, $sql);
    if ($query) {
        http_response_code(201);
        header('Content-Type: application/json'); 
        echo json_encode(array("content" => "Pet created"));
    }else{
        http_response_code(400);
        header('Content-Type: application/json'); 
        echo json_encode(array("content" => "Pet can't be created"));   
    }

}

?> 