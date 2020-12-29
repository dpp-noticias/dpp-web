<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<?php include "../Backend/Usuarios.php" ?>

<body>
    <h1>Registrar Usuario</h1>
    <form action="<?php echo $_SERVER["PHP_SELF"]  ?>" method="POST">

        <div>
            <label for="">Nombre de Usuario:</label>
            <input type="text" name="nombreUser" id="">
        </div>

        <div>
            <label for="">Correo Electronico:</label>
            <input type="text" name="correo" id="">
        </div>

        <div>
            <label for="">Contraseña:</label>
            <input type="text" name="contrasena" id="">
        </div>

        <div>
            <label for="">Rol:</label>
            <select name="rol" id="">
                <option value="Administrador">Administrador</option>
                <option value="Usuario">Usuario</option>
            </select>
            
        </div>

        <div>
            <input type="submit" value="Entrar" name="acceso">
        </div>
    </form>

    <?php

    if ($_POST) {
        registrarUsuarios();
    }
    ?>
</body>

</html>