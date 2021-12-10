<?php

global $enlace;
global $SECRET_KEY;

$SECRET_KEY = "YqPKkEGiYLIjVoKk7BwWzIZqcsufeO6A";

function conectar(){


$enlace = mysqli_connect('localhost', 'root', '', null, 3306); //conexion con la base de datos

if(!$enlace){ //if $enlace esto da siempre true (Si tenemos error en la conexion por eso pone !)
    echo "Error: No se puede conectara MySQL." . PHP_EOL;
    echo "Errno de depuracion: " . mysqli_connect_errno() . PHP_EOL;
    echo "Error de depuracion: " . mysqli_connect_error() . PHP_EOL;
    exit;
} else {
    
    $dataBase = mysqli_select_db($enlace, "veterinaria");

    if(!$dataBase){

        $sql = 'CREATE DATABASE veterinaria';
        $query = mysqli_query($enlace, $sql);

        if($query){

            $enlace = mysqli_connect('localhost', 'root', '', 'veterinaria' , 3306);
            $query = mysqli_query($enlace, $sql);

            $sql = "
            CREATE TABLE IF NOT EXISTS `veterinarios` (
                `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
                `nombre` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
                `identificacion` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
                `telefono` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
                `correo` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
                `contrasena` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
                `tipo_usuario` int(10) unsigned NOT NULL,
                PRIMARY KEY (`id`)
                ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
                ";

            $query = mysqli_query($enlace, $sql);
            

            $sql = "
                CREATE TABLE IF NOT EXISTS `mascotas` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `nombre_mascota` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
                `veterinario_id` int(11) unsigned NOT NULL,
                `raza` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
                `tipo` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
                `sexo` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
                `tamano` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
                `edad` int(11) NOT NULL,
                `tipo_servicio` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
                `valor_servicio` float NOT NULL,
                `motivo` text COLLATE utf8mb4_spanish2_ci NOT NULL,
                `nombre_cliente` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
                `identificacion_cliente` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
                `telefono` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
                `direccion` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
                PRIMARY KEY (`id`),
                KEY `index` (`veterinario_id`),
                CONSTRAINT `FK_veterinario` FOREIGN KEY (`veterinario_id`) REFERENCES `veterinarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
            ";

            $query = mysqli_query($enlace, $sql);


            $sql = "
                INSERT INTO `veterinarios` (`id`, `nombre`, `identificacion`, `telefono`, `correo`, `contrasena`, `tipo_usuario`) VALUES
                (1, 'admin', 'admin', '312584885', 'admin@mfloves.com', 'mfloves2021', 1),
                (2, 'alberto obando', '123465789', '321654789', 'alberto@mfloves.com', '12345679', 2),
                (3, 'lusiano perez', '1237894562', '453212345', 'lusiano@mfloves.com', '987654321', 2);
            ";

            $query = mysqli_query($enlace, $sql);
            
                
            if($query) {
                return $enlace;
            } else {
                echo "Error de depuracion: " . mysqli_connect_error() . PHP_EOL;
                exit;
            }
        }else {
            echo 'Error creating database: ' . mysqli_connect_errno() . "\n";
        }

    }else{

        return mysqli_connect('localhost', 'root', '', 'veterinaria' , 3306);
    }

    return $enlace;
}

}


?>