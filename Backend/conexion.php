<?php
function conectBDD() {
    $conexion= mysqli_connect("localhost","root","","DPP");
    $error=$conexion->connect_errno;

    if($error !=null) {
        echo "<p>Error $error conectando a la base de datos: $conexion->connect_errno</p>";
        exit();
    }else {
        mysqli_set_charset($conexion,"utf8");
        return $conexion;
    }
}

?>