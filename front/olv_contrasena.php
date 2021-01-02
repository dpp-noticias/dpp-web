<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
</head>
<?php include "../Backend/Usuarios.php" ?>

<body>
    <h1>Recuperar contraseña</h1>
    <form action="<?php echo $_SERVER["PHP_SELF"]  ?>" method="POST">
        <div>
            <label for="">Usuario:</label>
            <input type="text" name="nombreUser" id="">
        </div>

        <div>
            <label for="">Nueva Contraseña:</label>
            <input type="password" name="contrasena" id="">
        </div>

        <div>
            <input type="submit" value="Entrar">
        </div>
    </form>

    <?php

    if ($_POST) {
        recuContrasena();
    }
    ?>
</body>

</html>