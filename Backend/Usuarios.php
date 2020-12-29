<?php
include("conexion.php");
function registrarUsuarios()
{
    $conexion = conectBDD();

    //Guardo los parametros en variables
   
    $correoElectronico = $_POST["correo"];
    $nombreUser = $_POST["nombreUser"];
    $contrasena = md5($_POST["contrasena"]);
    $rol = $_POST["rol"];

    $anadir_usuario = "INSERT INTO usuarios(correo, NombreUsuario, Contrasena, Rol) 
    VALUES ('$correoElectronico','$nombreUser','$contrasena','$rol')";
    $resultado = $conexion->query($anadir_usuario);

    // echo $anadir_usuario;
    if ($resultado) {
        // header("Location:");
        echo "<p>Se ha añadido $conexion->affected_rows registros con exito</p>";
    } else {
        echo "Tuvimos problemas en la insercion, intentelo de nuevo mas tarde";
    }
}

function iniciarSesion()
{
    $errores = [];
    if (empty($_POST['nombreUser'])) {
        $errores[] = 'Tiene que rellenar el campo';
    }

    if (empty($_POST['contrasena'])) {
        $errores[] = 'Tiene que rellenar el campo';
    }


    if ($errores) {
        // mostrar_errores($errores);
        // unset($errores);
    } else {
        $conexion = conectBDD();
        $usuario = $_POST['nombreUser'];
        $contraseña = md5($_POST['contrasena']);
        $contraseña = $_POST['contrasena'];


        $select_usuario = "SELECT NombreUsuario FROM usuarios WHERE NombreUsuario = '$usuario' AND Contrasena ='$contraseña'";
        $resultado = $conexion->query($select_usuario);
        echo $select_usuario;

        if ($resultado->fetch_row()) {
            $_SESSION['usuario'] = $usuario;
            echo "Logeado con exito";
            // header('Location:');
        } else {
           
        }
    }
}
