<?php
include("conexion.php");
include("funciones.php");
function registrarUsuarios()
{
    $conexion = conectBDD();

    $errores = [];
    //Guardo los parametros en variable

    $nombreUser = $_POST['nombreUser'];
    $correoElectronico = $_POST['correo'];
    $contrasena = md5($_POST["contrasena"]);
    $rol = $_POST["rol"];

    $selectNombre = "SELECT NombreUsuario FROM usuarios WHERE NombreUsuario = '$nombreUser'";
    $select = $conexion->query($selectNombre);
    //Regla nombre
    if (empty($_POST['nombreUser'])) {
        $errores[] = "\n Por favor ingrese su nombre.";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $nombreUser)) {
        $errores[] = "\n Sólo se permiten letras y espacios en blanco.";
    } elseif (strlen($_POST['nombreUser']) < 5) {
        $errores[] = "\n Tiene que tener mas de 5 caracteres";
    }elseif($select != null) {
        $errores[] = "\n Nombre de usuario esta en uso";
    } 
    else {  //Caso verdadero obtenemos datos.  
        $nombreUser = $_POST['nombreUser'];
    }

    //Regla email
    if (empty($_POST['correo'])) {
        $errores[] = "\n Por favor ingrese su email. ";
    } elseif (!filter_var($correoElectronico, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "\n email no valido";
    } else { //Caso verdadero obtenemos datos.  
        $correoElectronico = $_POST['correo'];
    }

    //Regla contraseña
    if (empty($_POST['contrasena'])) {
        $errores[] = "\n Por favor ingrese contraseña. ";
    } elseif (strlen($_POST['contrasena']) < 5) {
        $errores[] = "\n Tiene que ser mas de 5 caracteres";
    } else { //Caso verdadero obtenemos datos.  
        $contrasena = md5($_POST["contrasena"]);
    }

    if ($errores) {
        mostrar_errores($errores);
    } else {
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
        mostrar_errores($errores);
    } else {
        $conexion = conectBDD();
        $usuario = $_POST['nombreUser'];
        $contraseña = md5($_POST['contrasena']);


        $select_usuario = "SELECT NombreUsuario FROM usuarios WHERE NombreUsuario = '$usuario' AND Contrasena ='$contraseña'";
        $resultado = $conexion->query($select_usuario);
        //echo $select_usuario;

        if ($resultado->fetch_row()) {
            $_SESSION['usuario'] = $usuario;
            echo "Logeado con exito";
            // header('Location:');
        } else {
            echo "Nombre de usuario o contraseña incorrecta";
        }
    }
}

function recuContrasena()
{
    $conexion = conectBDD();

    $usuario = $_POST['nombreUser'];
    $contrasena = md5($_POST['contrasena']);


    $update_pass = "UPDATE usuarios SET Contrasena = '$contrasena' WHERE NombreUsuario = '$usuario'";
    // echo $update_pass;
    $resultado = $conexion->query($update_pass);
    // echo $select_usuario;
    if ($resultado != null) {
        echo "<script>";
        echo "alert('Cambio de contraseña con exito')";
        echo "</script>";

        // header('Location: /DPP_PROJECT/front/login.php');
    } else {
        echo "Error";
    }
}
