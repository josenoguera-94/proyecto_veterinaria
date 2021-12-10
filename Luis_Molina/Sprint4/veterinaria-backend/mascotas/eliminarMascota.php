<?php 
header("Access-Control-Allow-Origin: *");  
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Access-Control-Allow-Methods: DELETE");
if ($_SERVER['REQUEST_METHOD'] == "DELETE") {

    require("../admin/conexion.php");

    $conectar = conectar();

    $sql = "SELECT * FROM mascotas WHERE id=$_GET[id]";
    $query = mysqli_query($conectar, $sql);

    if ($resultado = mysqli_fetch_assoc($query))  {
        $query = mysqli_query($conectar, "DELETE FROM mascotas WHERE id=$_GET[id]");
        if($query){           
            http_response_code(200);
            header('Content-Type: application/json'); 
            echo json_encode(array("content" => "Pet deleted"));
        }else{            
            http_response_code(400);
            header('Content-Type: application/json'); 
            echo json_encode(array("content" => "Pet can't be deleted"));   
        }
    }else {
        http_response_code(400);
        header('Content-Type: application/json'); 
        echo json_encode(array("content" => "Pet can't be deleted"));   
    }



}
?>