<?php
include("conexion.php");
function anadirClientes()
{
    $conexion = conectBDD();

    //Guardo los parametros en variables
   
    $nombre = $_POST["nombre"];
    $correoElectronico = $_POST["correo"];
    $nombreUser = $_POST["nombreUser"];
    $contrasena = $_POST["contrasena"];
    $rol = $_POST["Rol"];

    $anadir_usuario = "INSERT INTO usuarios('Nombre', 'correo', 'NombreUsuario', 'Contrasena', 'Rol') 
    VALUES ($nombre,$correoElectronico,$nombreUser,$contrasena,$rol)";
    $resultado = $conexion->query($anadir_usuario);

    if ($resultado) {
        // header("Location:");
        echo "<p>Se ha añadido $conexion->affected_rows registros con exito</p>";
    } else {
        echo "Tuvimos problemas en la insercion, intentelo de nuevo mas tarde";
    }
}
