<?php
function mostrar_campo($campo)
{
    if (isset($_POST[$campo]))
        echo 'value="' . $_POST[$campo] . '"';
}

function mostrar_errores($errores)
{

    echo "<ul>";
    foreach ($errores as $error) {
        echo "<li>$error</li>";
    }
    echo "</ul>";
}
