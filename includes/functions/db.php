
<?php 

    // Credenciales de la base de datos
    define('DB_USUARIO', 'root');
    define('DB_CONTRASEÑA', 'mysql');
    define('DB_HOST', 'localhost');
    define('DB_NOMBRE', 'agendaphp');

    $conexion = new mysqli(DB_HOST, DB_USUARIO, DB_CONTRASEÑA, DB_NOMBRE);

    echo $conexion->ping();