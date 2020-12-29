<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<?php include "../Backend/Usuarios.php"?>
<body>
    <h1>Acceso</h1>
    <form action="<?php echo $_SERVER["PHP_SELF"]  ?>" method="POST">
        <div>
            <label for="">Correo Electronico:</label>
            <input type="text" name="correo" id="">
        </div>

        <div>
            <label for="">Contraseña:</label>
            <input type="text" name="correo" id="">
        </div>
        <div>
            <input type="submit" value="Entrar" name="acceso">
        </div>
    </form>

    <?php 
    
    if($_POST) {
        iniciarSesion();
    }
    ?>
</body>
</html>