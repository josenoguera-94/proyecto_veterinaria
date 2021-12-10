<?php 
header("Access-Control-Allow-Origin: *");  
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Access-Control-Allow-Methods: PUT");

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {

    $json = file_get_contents('php://input');
    $params = json_decode($json);

    require("../admin/conexion.php");

    $conectar = conectar();

    $sql = "UPDATE mascotas SET 
    nombre_mascota='$params->nombre_mascota', 
    veterinario_id='$params->veterinario_id', 
    raza='$params->raza', 
    tipo='$params->tipo', 
    sexo='$params->sexo',
    tamano='$params->tamano',
    edad='$params->edad',
    tipo_servicio='$params->tipo_servicio',
    valor_servicio='$params->valor_servicio',
    motivo='$params->motivo',
    nombre_cliente='$params->nombre_cliente',
    identificacion_cliente='$params->identificacion_cliente',
    telefono='$params->telefono',
    direccion='$params->direccion' 
    WHERE id=$_GET[id]";
    
    $query = mysqli_query($conectar, $sql);

    if ($query) {
        http_response_code(200);
        header('Content-Type: application/json'); 
        echo json_encode(array("content" => "Pet edited"));
    }else{
        http_response_code(400);
        header('Content-Type: application/json'); 
        echo json_encode(array("content" => "Pet can't be edited"));   
    }

}
?>