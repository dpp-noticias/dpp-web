<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<?php include "../Backend/Usuarios.php" ?>

<body>
    <h1>Acceso</h1>
    <form action="<?php echo $_SERVER["PHP_SELF"]  ?>" method="POST">
        <div>
            <label for="">Usuario:</label>
            <input type="text" name="nombreUser" id="">
        </div>

        <div>
            <label for="">Contraseña:</label>
            <input type="password" name="contrasena" id="">
        </div>
        <a href="olv_contrasena.php">¿Olvido la contraseña?</a>
        <div>
            <input type="submit" value="Entrar">
        </div>
    </form>
<button><a href="registrar.php">Registrar</a></button>
    <?php

    if ($_POST) {
        iniciarSesion();
    }
    ?>
</body>

</html>