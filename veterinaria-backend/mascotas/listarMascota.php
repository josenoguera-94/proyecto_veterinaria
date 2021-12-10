<?php 
header("Access-Control-Allow-Origin: *");  
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Access-Control-Allow-Methods: GET");


if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    require("../admin/conexion.php");
    $conectar = conectar();

    $sql = "SELECT * FROM mascotas WHERE id=$_GET[id]";
    $query = mysqli_query($conectar, $sql);

    if ($resultado = mysqli_fetch_assoc($query))  {

        http_response_code(200);
        header('Content-Type: application/json');
        echo json_encode($resultado);
    }

}
  
  


  

  
 
?>